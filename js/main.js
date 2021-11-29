// Modal
let modal = document.getElementById("myModal");
let btn = document.getElementById("cart");
let close = document.getElementsByClassName("close")[0];
let close_footer = document.getElementsByClassName("close-footer")[0];
const order = document.getElementsByClassName("order")[0];
btn.onclick = function () {
    modal.style.display = "block";
}
close.onclick = function () {
    modal.style.display = "none";
}
close_footer.onclick = function () {
    modal.style.display = "none";
}
order.onclick = function () {
    var cartItems = [];
    if (localStorage.getItem("cartData") != null){
        cartItems = localStorage.getItem("cartData");
        cartItems = JSON.parse(cartItems);
    }
    if (cartItems.length == 0){
        alert("Không có sản phẩm nào trong giỏ hàng");
        return;
    }
    localStorage.setItem("cartData", JSON.stringify([]));
    alert("Cảm ơn bạn đã thanh toán đơn hàng");
    window.location.reload();
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function total(cart){
    let result = 0;
    for(let i = 0; i < cart.length; i++){
        let price = cart[i].price;
        price = parseFloat(price.slice(0, -1));
        result += price;
    }
    return result;
}
function removeItem(id){
    let cartItems = localStorage.getItem("cartData");
    cartItems = JSON.parse(cartItems);
    for (let i = 0; i < cartItems.length; i++){
        if (id === cartItems[i].id){
            cartItems.splice(i, 1);
        }
    }
    localStorage.setItem("cartData", JSON.stringify(cartItems));
    window.location.reload();
    modal.style.display = "block";

}
function displayCart(){
    var cartItems = [];
    if (localStorage.getItem("cartData") != null){
        cartItems = localStorage.getItem("cartData");
        cartItems = JSON.parse(cartItems);
    }
    document.getElementsByClassName("cart-items")[0].innerHTML = `
    ${cartItems.map(function(cart){
        return`
        <div class="cart-row">
            <div class="cart-item cart-column">
                <img class="cart-item-image" src="${cart.image}" width="100" height="100">
                <span class="cart-item-title">${cart.name}</span>
            </div>
            <span class="cart-price cart-column">${cart.price}</span>
            <div class="cart-quantity cart-column">
                <button class="btn btn-danger" type="button" onclick="removeItem(${cart.id})">Xóa</button>
            </div>
        </div>
    `
    }).join('')}`
    document.getElementsByClassName("cart-total-price")[0].innerHTML = total(cartItems);
}
function AddToCart(product_id){
    if (localStorage.getItem("username") === ""){
        window.location = "./game_info.php?id=" + product_id + "&error=notlogin";
        return;
    }
    var cartItems = [];
    if (localStorage.getItem("cartData") != null){
        cartItems = localStorage.getItem("cartData");
        cartItems = JSON.parse(cartItems);
    };
    var img = document.getElementsByClassName("img-prd")[0].src
    var title = document.getElementsByClassName("content-product-h1")[0].innerText
    var price = document.getElementsByClassName("price")[0].innerText
    
    for (let i=0; i < cartItems.length; i++){
        if (product_id === cartItems[i].id){
            alert('Sản Phẩm Đã Có Trong Giỏ Hàng');
            return;
        }
    }
    cartItems.push({id: product_id, name: title, image: img, price: price});
    localStorage.setItem("cartData", JSON.stringify(cartItems));
    alert("The product has been added to cart")
    window.location.reload();
}
displayCart();