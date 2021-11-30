-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 11:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thth_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL DEFAULT 'avatar.png',
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phonenumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `fullname`, `image`, `password`, `email`, `birthday`, `phonenumber`, `about`, `permission`, `status`) VALUES
('thongminh', '', 'avatar.png', 'th123456', 'thongminh@gmail.com', '2000-01-02', '0987654322', NULL, 1, 1),
('tronghoang', 'Nguyễn Trọng Hoàng', 'avatar.png', 'th123456', 'tronghoang@gmail.com', '2000-07-11', '0987654321', 'Bioooo Ahihi\r\n', 0, 1),
('tronghoang197', '', 'yo7ZzWz.jpg', 'th123456', 'tronghoang123@gmail.com', '2021-11-05', '0999999999', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `news_id` int(5) NOT NULL,
  `account_id` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `commentday` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`news_id`, `account_id`, `content`, `commentday`) VALUES
(2, 'tronghoang', 'how are you?', '2021-11-28 00:00:00'),
(2, 'tronghoang', 'where are you?', '2021-11-28 12:01:53'),
(2, 'tronghoang', 'hello', '2021-11-28 16:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `account_id` varchar(20) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(5) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `postday` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `description`, `postday`, `image`) VALUES
(1, 'Dragon Age 4\'s senior creative director has left BioWare', '<p>Matt Goldman, senior creative director of Dragon Age 4, has left BioWare after 23 years.</p>\r\n\r\n<p>BioWare boss Gary McKay announced Goldman\'s departure in an email sent out to staff, which read: \"Hi everyone, I hope you are well. I\'m writing to inform you all that Matt Goldman is leaving BioWare. We have mutually agreed to part ways, and his last day is today.</p>\r\n<p>We understand that Matt\'s departure has an impact on you,\" McKay wrote, \"as well as the game\'s development. Rest assured our commitment to a high-quality Dragon Age game has not waivered, and we will not ship a game that is not up to BioWare\'s standards.</p>\r\n\r\nWe understand that Matt\'s departure has an impact on you,\" McKay wrote, \"as well as the game\'s development. Rest assured our commitment to a high-quality Dragon Age game has not waivered, and we will not ship a game that is not up to BioWare\'s standards.', '2021-11-27', 'news001.jpg'),
(2, 'Sweden wants Europe to ban Bitcoin mining', '<p>Crypto mining is hitting the world pretty hard right now. Whether you’re trying to get a graphics card for your new gaming beast, or just care about the environment, you’ve probably run into concerns with crypto.</p>\r\n\r\n<p>Well if so, you’re not alone according to Euronews. The directors of the Swedish Financial Supervisory Authority and the Swedish Environmental Protection Agency, Erik Thedéen and Bjorn Risinger have raised concerns about the country’s ability to meet climate obligations.</p>', '2021-11-27', 'news002.jpg'),
(3, 'Battlefield 2042 May Have Even More Fixes On The Way', '<p>While Battlefield 2042 returns the franchise to its Battlefield 3 heyday with a modern setting and modern weapons, the game has also fallen victim to several bugs and technical issues. Thankfully, players won\'t have to deal with at least a few of those problems for much longer, as DICE is reportedly looking into them.</p>\r\n<p>A post from the fan-run Twitter account Battlefield Bulletin claims that DICE is currently tackling four issues that Battlefield 2042 players have reported. Those issues range from players\' rubber banding when they get hit by rockets from a jet or helicopter and missile relock not working to options for changing the transparency and size of various icons.</p>\r\n<p>However, the post doesn\'t detail when players can expect these issues to be fixed. Similarly, the Battlefield Direct Communication account, which is run by Battlefield developers and regularly posts when updates are coming out and what their contents will be, hasn\'t mentioned any of these issues yet.\r\nWhile Battlefield 2042 has had a rough launch, the game is slowly being fixed by developers DICE and Ripple Effect. One upcoming patch for the game will address issues with players failing to be revived and balancing problems with two of the game\'s vehicles as well as the UAV-1.\r\nFor players, fixes for Battlefield 2042 are arriving far too late. The game has been panned on Steam, where it has a \"mostly negative\" aggregate score. At the moment, 33,000 of the game\'s 44,000 reviews are negative, with players citing bugs and a lack of features compared to past titles.</p>\r\n\r\n', '2021-11-29', 'news003.jpg'),
(4, 'Halo Infinite -- Xbox Boss Discusses High-Level Staff Departures', '<p>Xbox Game Studios boss Matt Booty has commented on the many changes to senior leaders on Halo Infinite\'s development team, saying turnover is natural in a field like game development. He also suggested that some of the developers who left the team might have had a vision for Halo Infinite that ran counter to what others wanted.</p>\r\n<p>Speaking to The New York Times, Booty discussed the departures of creative director Tim Longo and executive producer Mary Olson, as well as former studio head for FPS, Chris Lee.</p>\r\n<p>\"There\'s always going to be turnover of leaders--it\'s inevitable,\" Booty said. He added that sometimes \"the momentum of the project is going one way, and that person has a vision that\'s going the other way</p>\r\n<p>Booty\'s comment is intriguing to think about, but it doesn\'t include any specifics about a different direction for Halo Infinite that might have been considered during development. GameSpot has followed up with Microsoft in an attempt to get more details.</p>\r\n\r\n<p>Microsoft veteran Joseph Staten stepped in to lead the Halo Infinite development team after Lee left. Following Lee\'s departure, Xbox boss Phil Spencer said he believes turnover in a creative field like game development is actually a good thing. \"I don\'t have any specific concern about 343. I actually think in the long run, turnover is a healthy thing because we want people who are really motivated by the things that they\'re working on,\" Spencer said.</p>\r\n\r\n<p>Halo Infinite\'s multiplayer beta was released on November 15, and it\'s been received very positively thus far. The campaign is scheduled to release on December 8, and it will be available on Game Pass.</p>\r\n\r\n<p>GameSpot recently played some of Halo Infinite\'s early story missions, and you can watch the video above and read our Halo Infinite campaign impressions to learn more.</p>\r\n\r\n', '2021-11-29', 'news004.jpg'),
(5, 'Steam Had Its Highest Concurrent Players Ever Over Thanksgiving Weekend 2021', '<p>Over Thanksgiving weekend 2021, Steam broke a new record as it reached an all-time peak of 27,384,959 concurrent players using games on its service.</p>\r\n\r\n<p>SteamDB revealed that this new record for concurrent players occurred on Sunday, November 28, and this peak is just one of the many times in 2021 that Steam has accomplished this feat.</p>\r\n\r\n<p>As of this writing, the top five most played games on Steam are Counter-Strike: Global Offensive, Dota 2, New World, Halo Infinite, and Team Fortress 2. Halo Infinite surely contributed to the cause, as it is free-to-play and has been long-awaited by many around the world. Since its launch, it has seen an all-time peak of 272,586 players on Steam alone.</p>\r\n\r\n<p>Another big factor in Steam achieving this new all-time peak is that its Autumn Sale has begun, and it will offer fans big discounts on a ton of different games until December 1.</p>\r\n\r\n<p>Steam\'s concurrent player record has been constantly on the rise for some time now, and its new 27 million milestones are 10 million more than the 17,155,417 it was in November 2019.</p>\r\n\r\n<p>Steam\'s impressive 2021 is built on the games that live in its store, and they have also shared in the platform\'s success this year. For example, Team Fortress 2 broke its Steam concurrent record after 14 years in 2021, and Final Fantasy 14 did the same without releasing anything new. Of course, there are many factors beyond just being on Steam that accounted for these achievements, but it\'s worth applauding nonetheless.</p>', '2021-11-29', 'news005.jpg'),
(6, 'Life is Strange: True Colors for Nintendo Switch Gets December Release Date', '<p>We already knew that Square Enix was planning to release Life is Strange: True Colors on Nintendo Switch. Today, we finally know that the Switch version will be released on December 7.</p>\r\n\r\n<p>As noted in a new tweet, the Switch port will arrive digitally via the Nintendo eShop on December 7. Those looking to pick up a physical cartridge will have to wait until February 25, 2022.</p>\r\n\r\n<p>Life is Strange: True Colors was originally released on September 10 on all major platforms, but ahead of its release, developer Deck Nine games confirmed that the Switch version would not release alongside the other versions.</p>\r\n\r\n<p>We reviewed Life is Strange: True Colors last September on IGN, which we gave a 9, noting that the latest entry was also the best in the series. The game also received a prequel DLC set one year before the events of the base game called Wavelengths, which was released on September 30.</p>\r\n\r\n', '2021-11-29', 'news006.jpg'),
(7, 'Nick Fury Is the Latest Marvel Character to Join Fortnite', '<p>While it may not be Samuel L. Jackson (yet!), Marvel\'s Nick Fury has arrived in Fortnite as part of a S.H.I.E.L.D. Set in the game\'s Item Shop.</p>\r\n\r\n<p>Announced by The Fortnite Team, Nick Fury - the director of S.H.I.E.L.D. - has sneaked onto Fortnite\'s Island to \"root out Cube corruption.\"</p>\r\n\r\n<p>Players have the option to purchase the Outfit (which comes with the Back Bling), Pickaxe, and Glider individually or as a complete set in the Nick Fury Bundle. Those who opt for the bundle will also unlock the Quinjets in Flight Loading Screen.</p>\r\n\r\n<p>Fury arrives just as Fortnite\'s Chapter 2 is set to come to a close. This ending will see players facing off against The Cube Queen in a one-time-only in-game event called \"The End.\"</p>', '2021-11-29', 'news007.jpg'),
(8, 'Xbox Knows It Needs to Improve Its Video Capture and Sharing Features', '<p>Jason Ronald, Xbox\'s director of project management, has both acknowledged that the Xbox Series X/S\' video capture and sharing features still have a long way to go while also confirming it is a priority for the team to get them right.</p>\r\n<p>As reported by VGC, Ronald was speaking on the Iron Lords podcast and was asked if the company was still focused on improving Xbox Series X/S\' Game DVR/in-game recording capabilities.</p>\r\n<p>“I will definitely say that Game DVR is the one area – the capture and share experience – that I wish we were able to make more progress [on] this year than we were able to,” Ronald replied. “It is definitely a priority for us.</p>\r\n<p>“We definitely hear the feedback. We have made some changes and we have made some improvements to the reliability and the quality of the captures but we know we still have work to do here. So that is definitely a priority for us and something that we’re going to continue to iterate on.\"</p>\r\n<p>Ronald also recommended that people check out the Xbox Insider Program, as that is where the team tests out new features and improvements and is a great place to have their feedback heard.</p>\r\n<p>“You know, the best thing I can recommend is if you’re not in the [Xbox] Insider rings, get on the Insider rings so that as we bring new capabilities and improvements, we want that feedback to know where we’re meeting the bar, and where we’re not meeting the bar,\" Ronald said. “But definitely, message heard, and as I said, it’s definitely an area that I wish we\'re able to make more progress this year than we did but it will definitely be a priority for 2022.”\r\nRonald shared that the team had heard the complaints back in January 2021 and, as with many things, these problems can take some time to solve.</p>\r\n<p>For more on Xbox, check out all the best Xbox Games and Accessories Black Friday deals and the wonderful Xbox Virtual Museum Exhibit that shows your history with the platform. Additionally, it also contains the letter Microsoft sent to Nintendo when it tried to purchase the company in 1999.</p>\r\n\r\n', '2021-11-29', 'news008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` text DEFAULT NULL,
  `rating` int(10) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 0,
  `os` varchar(50) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `memory` int(4) NOT NULL,
  `storage` int(4) NOT NULL,
  `graphics` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `image`, `name`, `price`, `description`, `rating`, `quantity`, `os`, `processor`, `memory`, `storage`, `graphics`) VALUES
(1, 'game001.jpg', 'Super Hero', 200, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda provident ipsam repellat omnis harum soluta itaque ullam eos, enim quidem reprehenderit fuga dolorum? Aliquid perspiciatis optio assumenda, sit nostrum, eligendi explicabo deserunt cum consectetur atque modi possimus voluptatibus aliquam doloremque, sunt molestiae nihil nesciunt quasi alias eum ullam illum! Voluptates?', 45, 0, 'Windows 10', 'Intel Core i7', 8, 4, 'NVIDIA GeForce GTX 260 / ATI Radeon HD 4870'),
(2, 'game002.jpg', 'Grand Theft Auto V', 40, 'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.', 0, 100, 'Windows 10 64 Bit, Windows 8.1 64 Bit, Windows 8 6', 'Intel Core 2 Quad CPU Q6600 @ 2.40GHz (4 CPUs) / A', 4, 90, 'NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.1,'),
(3, 'game003.jpg', 'The Witcher 3: Wild Hunt - Game of the Year Edition', 50, 'The Witcher: Wild Hunt is a story-driven open world RPG set in a visually stunning fantasy universe full of meaningful choices and impactful consequences. In The Witcher, you play as professional monster hunter Geralt of Rivia tasked with finding a child of prophecy in a vast open world rich with merchant cities, pirate islands, dangerous mountain passes, and forgotten caverns to explore.', 0, 100, '64-bit Windows 7, 64-bit Windows 8 (8.1) or 64-bit', 'Intel CPU Core i5-2500K 3.3GHz / AMD CPU Phenom II', 6, 77, 'Nvidia GPU GeForce GTX 660 / AMD GPU Radeon HD 787'),
(4, 'game004.jpg', 'Alan Wake', 20, 'When the wife of the best-selling writer Alan Wake disappears on their vacation, his search turns up pages from a thriller he doesn’t even remember writing. A Dark Presence stalks the small town of Bright Falls, pushing Wake to the brink of sanity in his fight to unravel the mystery and save his love.', 0, 100, 'Windows XP SP2', 'Dual Core 2GHz Intel or 2.8GHz AMD', 2, 8, 'DirectX 10 compatible with 512MB RAM'),
(5, 'game005.jpg', 'Ori and the Blind Forest', 4.99, 'The forest of Nibel is dying. After a powerful storm sets a series of devastating events in motion, an unlikely hero must journey to find his courage and confront a dark nemesis to save his home. “Ori and the Blind Forest” tells the tale of a young orphan destined for heroics, through a visually stunning action-platformer crafted by Moon Studios for PC. Featuring hand-painted artwork, meticulously animated character performance, and a fully orchestrated score, “Ori and the Blind Forest” explores a deeply emotional story about love and sacrifice, and the hope that exists in us all.', 0, 100, 'Windows 7', 'Intel Core 2 Duo E4500 @ 2.2GHz or AMD Athlon 64 X', 4, 8, 'GeForce 240 GT or Radeon HD 6570 – 1024 MB (1 gig)'),
(6, 'game006.jpg', 'Ori and the Will of the Wisps', 10.99, 'The little spirit Ori is no stranger to peril, but when a fateful flight puts the owlet Ku in harm’s way, it will take more than bravery to bring a family back together, heal a broken land, and discover Ori’s true destiny. From the creators of the acclaimed action-platformer Ori and the Blind Forest comes the highly anticipated sequel. Embark on an all-new adventure in a vast world filled with new friends and foes that come to life in stunning, hand-painted artwork. Set to a fully orchestrated original score, Ori and the Will of the Wisps continues the Moon Studios tradition of tightly crafted platforming action and deeply emotional storytelling', 0, 100, 'Windows 10 Version 18362.0 or higher', 'AMD Athlon X4 | Intel Core i5 4460', 8, 20, 'Nvidia GTX 950 | AMD R7 370'),
(7, 'game007.jpg', 'Cuphead', 10.25, 'Cuphead is a classic run and gun action game heavily focused on boss battles. Inspired by cartoons of the 1930s, the visuals and audio are painstakingly created with the same techniques of the era, i.e. traditional hand drawn cel animation, watercolor backgrounds, and original jazz recordings', 0, 100, 'Windows 7', 'Intel Core2 Duo E8400, 3.0GHz or AMD Athlon 64 X2 ', 3, 4, ' Geforce 9600 GT or AMD HD 3870 512MB or higher'),
(8, 'game008.jpg', 'Dead Cells', 5.5, 'Dead Cells is a rogue-lite, metroidvania inspired, action-platformer. You\'ll explore a sprawling, ever-changing castle... assuming you’re able to fight your way past its keepers in 2D souls-lite combat. No checkpoints. Kill, die, learn, repeat.', 0, 100, 'Windows 7+', 'Intel i5+', 2, 1, 'Nvidia 450 GTS / Radeon HD 5750 or better'),
(9, 'game009.jpg', 'Stardew Valley', 10.2, 'You\'ve inherited your grandfather\'s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. Can you learn to live off the land and turn these overgrown fields into a thriving home?', 0, 100, 'Windows Vista or greater', '2 Ghz Processor', 2, 1, '256 mb video memory, shader model 3.0+'),
(10, 'game010.jpg', 'Hades', 20.4, 'Defy the god of the dead as you hack and slash out of the Underworld in this rogue-like dungeon crawler from the creators of Bastion, Transistor, and Pyre.', 0, 100, 'Windows 7 SP1', 'Dual Core 2.4 GHz', 4, 15, '1GB VRAM / DirectX 10+ support'),
(11, 'game011.jpg', 'Read Dead Redemption 2', 50, 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, RDR2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age. Also includes access to the shared living world of Red Dead Online.', 0, 100, 'Windows 7 - Service Pack 1 (6.1.7601)', 'Intel® Core™ i5-2500K / AMD FX-6300', 8, 150, 'Nvidia GeForce GTX 770 2GB / AMD Radeon R9 280 3GB'),
(12, 'game012.jpg', 'Detroit: Become Human', 20.67, 'Detroit: Become Human puts the destiny of both mankind and androids in your hands, taking you to a near future where machines have become more intelligent than humans. Every choice you make affects the outcome of the game, with one of the most intricately branching narratives ever created.', 0, 100, 'Windows 10 (64 bit)', 'Intel Core i5-2300 @ 2.8 GHz or AMD Ryzen 3 1200 @', 8, 55, 'Nvidia GeForce GTX 780 or AMD HD 7950 with 3GB VRA'),
(13, 'game013.jpg', 'Hoa', 8, 'Hoa is a beautiful puzzle-platforming game that features breathtaking hand-painted art, lovely music, and a peaceful, relaxing atmosphere.', 0, 100, 'Windows 7 (64bit)', 'AMD / Intel CPU running at 2.8 GHz or higher', 4, 8, 'AMD/NVIDIA graphic card, with at least 2GB of dedi'),
(14, 'game014.jpg', 'Outer Wilds', 6.7, 'Named Game of the Year 2019 by Giant Bomb, Polygon, Eurogamer, and The Guardian, Outer Wilds is a critically-acclaimed and award-winning open world mystery about a solar system trapped in an endless time loop.', 0, 100, 'Windows 7', 'Intel Core i5-2300 | AMD FX-4350', 6, 8, 'Nvidia GeForce GTX 660, 2 GB | AMD Radeon HD 7870,'),
(15, 'game015.jpg', 'Devil May Cry 5', 20.2, 'The Devil you know returns in this brand new entry in the over-the-top action series available on the PC. Prepare to get downright demonic with this signature blend of high-octane stylized action and otherworldly & original characters the series is known for. Director Hideaki Itsuno and the core team have returned to create the most insane, technically advanced and utterly unmissable action experience of this generation!', 0, 100, 'WINDOWS® 7, 8.1, 10 (64-BIT Required)', 'Intel® Core™ i5-4460, AMD FX™-6300, or better', 8, 35, 'NVIDIA® GeForce® GTX 760 or AMD Radeon™ R7 260x wi'),
(16, 'game016.jpg', 'Blasphemous', 3.17, 'Blasphemous is a brutal action-platformer with skilled hack’n slash combat set in the nightmare world of Cvstodia. Explore, upgrade your abilities, and perform savage executions on the hordes of enemies that stand between you and your quest to break eternal damnation', 0, 100, 'Windows 7 64-bit', 'Intel Core2 Duo E8400 or AMD Phenom II x2 550', 4, 4, 'GeForce GTX 260 or Radeon HD 4850'),
(17, 'game017.jpg', 'Journey', 6.24, 'Explore the ancient, mysterious world of Journey as you soar above ruins and glide across sands to discover its secrets.', 0, 100, 'Windows 7', 'Intel Core i3-2120 | AMD FX-4350', 4, 4, 'Nvidia GTS 450 | AMD Radeon HD 5750'),
(18, 'game018.jpg', 'Among Us', 2.5, 'Play with 4-15 player online or via local WiFi as you attempt to prepare your spaceship for departure, but beware as one or more random players among the Crew are Impostors bent on killing everyone!', 0, 100, 'Windows 7 SP1+', 'SSE2 instruction set support', 1, 0, ''),
(19, 'game019.jpg', 'Death Stranding', 25.6, 'From legendary game creator Hideo Kojima comes an all-new, genre-defying experience. Sam Bridges must brave a world utterly transformed by the Death Stranding. Carrying the disconnected remnants of our future in his hands, he embarks on a journey to reconnect the shattered world one step at a time.', 0, 100, 'Windows® 10', 'Intel® Core™ i5-3470 or AMD Ryzen™ 3 1200', 8, 80, 'GeForce GTX 1050 3 GB or AMD Radeon™ RX 560 4 GB'),
(20, 'game020.jpg', 'Horizon Zero Dawn™ Complete Edition', 15.87, 'Experience Aloy’s legendary quest to unravel the mysteries of a future Earth ruled by Machines. Use devastating tactical attacks against your prey and explore a majestic open world in this award-winning action RPG!', 0, 100, 'Windows 10 64-bits', 'Intel Core i5-2500K@3.3GHz or AMD FX 6300@3.5GHz', 8, 100, 'Nvidia GeForce GTX 780 (3 GB) or AMD Radeon R9 290');

-- --------------------------------------------------------

--
-- Table structure for table `productbuy`
--

CREATE TABLE `productbuy` (
  `account_id` varchar(20) NOT NULL,
  `product_id` int(5) NOT NULL,
  `boughtdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
