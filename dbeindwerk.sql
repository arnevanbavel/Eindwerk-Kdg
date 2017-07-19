-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jun 2017 om 21:26
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbeindwerk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sendedToId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `friends`
--

INSERT INTO `friends` (`id`, `members_id`, `status`, `sendedToId`) VALUES
(2, 30, 'pending', 28);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `voornaam` varchar(50) CHARACTER SET utf8 NOT NULL,
  `achternaam` varchar(50) CHARACTER SET utf8 NOT NULL,
  `industry` varchar(50) CHARACTER SET utf8 NOT NULL,
  `memberSince` varchar(50) CHARACTER SET utf8 NOT NULL,
  `avatarUrl` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cv` varchar(100) CHARACTER SET utf8 NOT NULL,
  `scroldown` text CHARACTER SET utf8 NOT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `linkedin_link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `googlePlus_link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `youtube_link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `header_section` varchar(50) CHARACTER SET utf8 NOT NULL,
  `header_image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `header_bigSentence` varchar(255) CHARACTER SET utf8 NOT NULL,
  `header_smallSentence` varchar(255) CHARACTER SET utf8 NOT NULL,
  `profiel_section` varchar(50) CHARACTER SET utf8 NOT NULL,
  `profiel_background_color` varchar(255) CHARACTER SET utf8 NOT NULL,
  `profiel_aboutMe` varchar(300) CHARACTER SET utf8 NOT NULL,
  `skill_section` varchar(50) CHARACTER SET utf8 NOT NULL,
  `skill_background` varchar(50) CHARACTER SET utf8 NOT NULL,
  `skill_color` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ervaring_section` varchar(50) CHARACTER SET utf8 NOT NULL,
  `portfolio_section` varchar(50) CHARACTER SET utf8 NOT NULL,
  `portfolio_background_color` varchar(50) CHARACTER SET utf8 NOT NULL,
  `portfolio_color` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `salt`, `role`, `email`, `voornaam`, `achternaam`, `industry`, `memberSince`, `avatarUrl`, `cv`, `scroldown`, `facebook_link`, `linkedin_link`, `googlePlus_link`, `youtube_link`, `header_section`, `header_image`, `header_bigSentence`, `header_smallSentence`, `profiel_section`, `profiel_background_color`, `profiel_aboutMe`, `skill_section`, `skill_background`, `skill_color`, `ervaring_section`, `portfolio_section`, `portfolio_background_color`, `portfolio_color`) VALUES
(28, 'arninio123', '5481fb974afdc6c1d61bc40c4ec2f04defc8eb836a87a749e038b574fde45be2172ab99305094532006464c52514ae893e755be39ec6559605f31e76a0336a99', '168120764459386d069f9af0.60571401', 'admin', 'arne.vanbavel@hotmail.com', 'Arne', 'Van Bavel', '', '07 June 2017', 'profile_arninio123.jpg', 'cv_arninio123.pdf', 'yes', '', '', '', '', 'default_tmp', './assets/img/header_backgrounds/default_tmp.jpg', 'Hi, I\'m Arne Van Bavel', 'Scroll down to learn more about me', 'spectral_tmp', '', 'Hello visitor, My name is Arne. planet.Hello visitor, My name is Arne. I create websites that help people succeed. When i\'m not working I like toHello visitor, My name is Arne. planet.Hello visitor, My name is Arne. I create websites that help people succeed. When i\'m not working I like toHello vis ', 'default_tmp', '#00bd86', '#ffffff', 'default_tmp', 'default_tmp', '#ffffff', '#000000'),
(30, 'jasperp', '2b413939788c898f51ee05df118d892c27df6e3b9993ca4999f01952ddd9359a65c8b92997a81a38294698e20fc38c898389d807694789fb3ce2d2fd08801cb6', '1224754824593ed9e211d1c8.84432561', 'user', 'jasper@hotmail.com', 'Jasper', 'Perkens', '', '12 June 2017', 'profile_jasperp.jpg', '', 'yes', '', '', '', '', 'default_tmp', './assets/img/header_backgrounds/default_tmp.jpg', 'Hello, welcome on my page', 'Scroll down to learn more about me', 'default_tmp', '', 'Hello visitor, My name is Jasper. I create websites that help people succeed. When i\'m not working I like to explorer our beautifull planet.', 'default_tmp', '#ffffff', '#000000', 'default_tmp', 'default_tmp', '#f9f9f9', '#000000'),
(32, 'eric.johnsen', '9c6d299d7ec2a8ae30d490bb9180aff92fd5944effc18390fd1a721cbcf7f4cd738202eb3ca7d62aad1a85300f48610a6a306c98a6888cbacbe7a3fb9227ddd7', '6585522835946a65cb6bc44.66491491', 'user', 'eric.johnsen@hotmail.com', 'Eric', 'Johnsen', 'Designer', '18 June 2017', 'profile_eric.johnsen.jpg', '', 'yes', '', '', '', '', 'hipster_tmp', './upload/private/headerBG_eric.johnsen.jpg', 'Hi, I\'m Eric', 'Scroll down to learn more about me', 'spectral_reversed_tmp', '', 'Hello visitor, My name is Eric. I create websites that help people succeed. When i\'m not working I like to explorer our beautifull planet. Scroll even more down to chech out my skills and portfolio', 'default_tmp', '#384958', '#f5f5f5', 'default_tmp', 'default_tmp', '#2e3842', '#ffffff'),
(33, 'jacqueline.nelson', '6bc29bf5ae874ba873c535f0df5a9d6735dc674dd94860d0534977633e9b490ddb32123f71c59f29d1dc8b5cbdeabd96e2b366a5258929cb2cbb8a1e2c8052c3', '12385178935946ad834e89d5.05120094', 'user', 'jacqueline@nelson.com', 'jacqueline', 'nelson', 'Lawyer', '18 June 2017', 'profile_jacqueline.nelson.jpg', '', 'yes', '', '', '', '', 'rocky_tmp', './upload/private/headerBG_jacqueline.nelson.jpg', 'Hi, I\'m jacqueline', 'Scroll down to learn more about me', 'cool_reversed_tmp', '', 'Hello visitor, My name is jacqueline. I create websites that help people succeed. When i\'m not working I like to explorer our beautifull planet. Scroll even more down to chech out my skills and portfolio', 'default_tmp', '#ffffff', '#3f4c55', 'default_tmp', 'default_tmp', '#f2f2f2', '#3f4c55'),
(34, 'kristian.watts', '9372440d92dc7742c0b05c60473ea0b5d8acd5d3255438b89e71a6b7ed229c74b42386a3d9fceaaa1c0f4d7812580bfcbc54e4ec32258f44b55663b8d1f0bd40', '14146160535946c61317ef91.05306595', 'user', 'kristain@watts.com', 'kristian', 'watts', 'Photograpy', '18 June 2017', 'profile_kristian.watts.jpg', '', 'yes', '', '', '', '', 'night_tmp', './upload/private/headerBG_kristian.watts.jpg', 'Hi, I\'m kristian', 'Scroll down to learn more about me', 'spectral_tmp', '', 'Hello visitor, My name is kristian. I create websites that help people succeed. When i\'m not working I like to explorer our beautifull planet. Scroll even more down to chech out my skills and portfolio', 'default_tmp', '#3f4c55', '#ffffff', 'default_tmp', 'oscar_tmp', '#4c687b', '#ffffff'),
(35, 'eva.junes', 'daeb921e73b78de16cc916111118da97c7277a0b6f02bccf9e9a8d1a22ae5652d18a6216836551fe6a1d4541c3bc768bd5a3470379f62672301f7dd345f3d104', '20871138835946c7d05b4d16.47566648', 'user', 'eva@junes.com', 'Eva', 'Junes', 'Art', '18 June 2017', 'profile_eva.junes.jpg', '', 'yes', '', '', '', '', 'night_tmp', './upload/private/headerBG_eva.junes.jpg', 'Hi, I\'m Eva', 'Scroll down to learn more about me', 'cool_reversed_tmp', '', 'Hello visitor, My name is Eva. I create websites that help people succeed. When i\'m not working I like to explorer our beautifull planet. Scroll even more down to chech out my skills and portfolio', 'default_tmp', '#00bd86', '#ffffff', 'default_tmp', 'flower_tmp', '#e67e22', '#ffffff');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `caption` varchar(100) CHARACTER SET utf8 NOT NULL,
  `extra` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `portfolios`
--

INSERT INTO `portfolios` (`id`, `members_id`, `title`, `caption`, `extra`, `image`, `link`) VALUES
(238, 30, 'Rain Forest', 'Photgraphy', ':-)', './assets/img/placeholder.png', ''),
(239, 30, 'Startup Framework', 'Website Design', ':-)', './assets/img/placeholder.png', ''),
(240, 30, 'Houses', 'Graphic Design', ':-)', './assets/img/placeholder.png', ''),
(424, 28, 'Rain Forest', ' Photography', 'Example', './upload/private/portfolio_arninio123_0.jpg', 'http://www.mkyong.com/regular-expressions/how-to-validate-hex-color-code-with-regular-expression/'),
(425, 28, 'Startup Framework', 'Website Design', ':-)', './upload/private/portfolio_arninio123_1.jpg', ''),
(426, 28, 'Title for project3', 'Caption for project3', 'Description for project3', './upload/private/portfolio_arninio123_2.jpg', ''),
(427, 28, 'Title for project4', 'Caption for project4', 'Description for project4', './upload/private/portfolio_arninio123_3.jpg', ''),
(428, 28, 'Title for project5', 'Caption for project5', 'Description for project5', './upload/private/portfolio_arninio123_4.jpg', ''),
(429, 28, 'Title for project6', 'Caption for project6', 'Description for project6', './upload/private/portfolio_arninio123_5.jpg', ''),
(463, 32, 'Rain Forest', 'Photgraphy', ':-)', './upload/private/portfolio_eric.johnsen_0.jpg', ''),
(464, 32, 'Startup Framework', 'Website Design', ':-)', './upload/private/portfolio_eric.johnsen_1.jpg', ''),
(465, 32, 'Houses', 'Graphic Design', ':-)', './upload/private/portfolio_eric.johnsen_2.jpg', ''),
(466, 32, 'Title for project4', 'Caption for project4', 'Description for project4', './upload/private/portfolio_eric.johnsen_3.jpg', ''),
(467, 32, 'Title for project5', 'Caption for project5', 'Description for project5', './upload/private/portfolio_eric.johnsen_4.jpg', ''),
(468, 32, 'Title for project6', 'Caption for project6', 'Description for project6', './upload/private/portfolio_eric.johnsen_5.jpg', ''),
(481, 33, 'Money', ' ', ':-)', './upload/private/portfolio_jacqueline.nelson_0.jpg', ''),
(482, 33, 'Divorces', ' ', ':-)', './upload/private/portfolio_jacqueline.nelson_1.jpg', ''),
(483, 33, 'Accindents', ' ', ':-)', './upload/private/portfolio_jacqueline.nelson_2.jpg', ''),
(502, 34, ' ', 'Photgraphy', ':-)', './upload/private/portfolio_kristian.watts_0.jpg', ''),
(503, 34, ' ', 'Website Design', ':-)', './upload/private/portfolio_kristian.watts_1.jpg', ''),
(504, 34, ' ', 'Graphic Design', ':-)', './upload/private/portfolio_kristian.watts_2.jpg', ''),
(505, 34, ' ', 'Caption for project4', 'Description for project4', './upload/private/portfolio_kristian.watts_3.jpg', ''),
(506, 34, ' ', 'Caption for project5', 'Description for project5', './upload/private/portfolio_kristian.watts_4.jpg', ''),
(507, 34, ' ', 'Caption for project6', 'Description for project6', './upload/private/portfolio_kristian.watts_5.jpg', ''),
(511, 35, 'World of warcraft', 'Photgraphy', ':-)', './upload/private/portfolio_eva.junes_0.jpg', ''),
(512, 35, 'Joda', 'Website Design', ':-)', './upload/private/portfolio_eva.junes_1.jpg', ''),
(513, 35, 'star trek', 'Graphic Design', ':-)', './upload/private/portfolio_eva.junes_2.jpg', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `skill_position` varchar(11) CHARACTER SET utf8 NOT NULL,
  `skill_title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `skill_score` varchar(11) CHARACTER SET utf8 NOT NULL,
  `skill_color` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `skills`
--

INSERT INTO `skills` (`id`, `members_id`, `skill_position`, `skill_title`, `skill_score`, `skill_color`) VALUES
(15529, 30, '1', 'Dancing', '90', '#67b0d1'),
(15530, 30, '1', 'Problem Solving', '85', '#67b0d1'),
(15531, 30, '1', 'Photgrapy', '65', '#67b0d1'),
(15532, 30, '1', 'Html 5', '75', '#67b0d1'),
(15533, 30, '1', 'Sharing Love', '100', '#67b0d1'),
(15554, 28, '1', 'Dancing', '90', '#f1c40f'),
(15555, 28, '1', 'Problem Solving', '85', '#f1c40f'),
(15556, 28, '1', 'Photgrapy', '65', '#f1c40f'),
(15557, 28, '1', 'Html 5', '75', '#f1c40f'),
(15558, 28, '1', 'Sharing Love', '100', '#f1c40f'),
(15579, 32, '1', 'Dancing', '90', '#3498db'),
(15580, 32, '1', 'Problem Solving', '85', '#3498db'),
(15581, 32, '1', 'Photgrapy', '65', '#3498db'),
(15582, 32, '1', 'Html 5', '75', '#3498db'),
(15583, 32, '1', 'Sharing Love', '100', '#3498db'),
(15584, 33, '1', 'Dancing', '90', '#01b888'),
(15585, 33, '1', 'Problem Solving', '85', '#01b888'),
(15586, 33, '1', 'Photgrapy', '65', '#01b888'),
(15587, 33, '1', 'Html 5', '75', '#01b888'),
(15588, 33, '1', 'Sharing Love', '100', '#01b888'),
(15594, 34, '1', 'Dancing', '90', '#01b888'),
(15595, 34, '1', 'Problem Solving', '85', '#01b888'),
(15596, 34, '1', 'Photgrapy', '65', '#01b888'),
(15597, 34, '1', 'Html 5', '75', '#01b888'),
(15598, 34, '1', 'Sharing Love', '100', '#01b888'),
(15604, 35, '1', 'Dancing', '90', '#3498db'),
(15605, 35, '1', 'Problem Solving', '85', '#3498db'),
(15606, 35, '1', 'Photgrapy', '65', '#3498db'),
(15607, 35, '1', 'Html 5', '75', '#3498db'),
(15608, 35, '1', 'Sharing Love', '100', '#3498db');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`members_id`);

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`members_id`);

--
-- Indexen voor tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`members_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT voor een tabel `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;
--
-- AUTO_INCREMENT voor een tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15609;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_ibfk_1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
