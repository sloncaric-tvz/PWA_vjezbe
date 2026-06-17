-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2026 at 08:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novine`
--
DROP DATABASE IF EXISTS `novine`;
CREATE DATABASE IF NOT EXISTS `novine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `novine`;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `ime`) VALUES
(1, 'Politika'),
(2, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnickoIme`, `lozinka`, `razina`) VALUES
(6, 'Stjepko', 'Lončarić', 'sloncaric', '$2y$10$PlxCN5y7dwh/OcwD.V7Nlea8zHV/GYiU0k6ayFfq9adcBhUWlLAcy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `sazetak` varchar(100) NOT NULL,
  `tekst` text NOT NULL,
  `slika_url` varchar(255) NOT NULL,
  `idKategorija` int(11) NOT NULL,
  `arhiva` tinyint(1) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `sazetak`, `tekst`, `slika_url`, `idKategorija`, `arhiva`, `datum`) VALUES
(2, 'Nekaj s košarkom', 'Opet košarkaši prave probleme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mi ex, lobortis et libero sed, auctor pellentesque nisi. Sed porta consequat nisi, quis pharetra velit. Phasellus malesuada rhoncus arcu, in fringilla risus viverra vitae. Etiam dapibus efficitur metus vulputate tincidunt. Phasellus aliquam sapien in vehicula vulputate. Maecenas egestas lacinia nibh, non dignissim nibh vestibulum quis. Suspendisse in ligula eros. Vestibulum lacinia, nisi molestie posuere mollis, metus erat dignissim quam, dignissim dapibus nunc tortor et nibh. Sed ut rutrum sapien. Sed sed consectetur tortor. Aenean cursus neque ipsum, nec consequat metus ultricies et. Proin sagittis eros eget mi tincidunt dignissim. Maecenas ultrices ligula lorem, sit amet venenatis metus blandit eu.\r\n\r\nQuisque quis lobortis augue. Sed cursus sapien augue, vitae gravida risus porta egestas. Curabitur non augue at quam rhoncus cursus sed elementum leo. Mauris elit tellus, imperdiet a urna quis, luctus elementum libero. Mauris ut mi eget turpis cursus mollis id ac libero. Ut maximus quam et urna hendrerit elementum. Vivamus eget mauris volutpat, scelerisque odio eu, lobortis tellus. Maecenas ut tellus a mauris elementum aliquam quis sed massa. In volutpat lectus metus, vitae posuere tortor finibus at. Donec rhoncus tincidunt enim in viverra. Integer fringilla lacinia orci, quis accumsan lectus feugiat sit amet. Phasellus sed hendrerit elit, quis convallis diam. Suspendisse fermentum odio at dictum dictum. Curabitur malesuada accumsan auctor. Aenean lobortis sapien in metus tincidunt, sed tristique massa feugiat.\r\n\r\nIn gravida sem eros. Morbi euismod lacus eu odio faucibus sollicitudin. In et elementum mauris. Praesent sit amet nisl augue. Proin dictum leo sapien, sit amet efficitur ante interdum a. Sed vestibulum fringilla nulla, vitae tincidunt massa vestibulum in. Vivamus malesuada molestie neque, sit amet facilisis metus placerat et.\r\n\r\nDuis in scelerisque libero. Nam nisl nulla, consequat vel tincidunt egestas, tristique ac orci. Proin facilisis tortor a bibendum mollis. Cras efficitur, enim non facilisis lobortis, nunc nisi sollicitudin augue, ac iaculis dui nisi a tortor. Praesent nec placerat ex. Aenean consectetur, turpis sit amet pretium imperdiet, risus nisl fermentum magna, sit amet porta felis nisl eu elit. Integer sollicitudin rhoncus nisi, quis pellentesque ipsum vehicula quis.\r\n\r\nDonec vulputate nulla sed lacus malesuada, et condimentum arcu mattis. Quisque aliquet lectus magna, vel malesuada dolor condimentum ac. Suspendisse porta pellentesque quam. Duis porta arcu nec mi mollis dictum. Suspendisse sagittis dapibus purus eget sollicitudin. Curabitur a accumsan sapien, vel placerat lorem. Maecenas consectetur magna sit amet felis varius auctor.', 'assets/img/kosarka.jpg', 2, 0, '2026-06-13 16:46:06'),
(3, 'Pravi hit!', 'Bajs sve popularniji u Nepalu, Pakistanu i Indiji', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mi ex, lobortis et libero sed, auctor pellentesque nisi. Sed porta consequat nisi, quis pharetra velit. Phasellus malesuada rhoncus arcu, in fringilla risus viverra vitae. Etiam dapibus efficitur metus vulputate tincidunt. Phasellus aliquam sapien in vehicula vulputate. Maecenas egestas lacinia nibh, non dignissim nibh vestibulum quis. Suspendisse in ligula eros. Vestibulum lacinia, nisi molestie posuere mollis, metus erat dignissim quam, dignissim dapibus nunc tortor et nibh. Sed ut rutrum sapien. Sed sed consectetur tortor. Aenean cursus neque ipsum, nec consequat metus ultricies et. Proin sagittis eros eget mi tincidunt dignissim. Maecenas ultrices ligula lorem, sit amet venenatis metus blandit eu.\r\n\r\nQuisque quis lobortis augue. Sed cursus sapien augue, vitae gravida risus porta egestas. Curabitur non augue at quam rhoncus cursus sed elementum leo. Mauris elit tellus, imperdiet a urna quis, luctus elementum libero. Mauris ut mi eget turpis cursus mollis id ac libero. Ut maximus quam et urna hendrerit elementum. Vivamus eget mauris volutpat, scelerisque odio eu, lobortis tellus. Maecenas ut tellus a mauris elementum aliquam quis sed massa. In volutpat lectus metus, vitae posuere tortor finibus at. Donec rhoncus tincidunt enim in viverra. Integer fringilla lacinia orci, quis accumsan lectus feugiat sit amet. Phasellus sed hendrerit elit, quis convallis diam. Suspendisse fermentum odio at dictum dictum. Curabitur malesuada accumsan auctor. Aenean lobortis sapien in metus tincidunt, sed tristique massa feugiat.\r\n\r\nIn gravida sem eros. Morbi euismod lacus eu odio faucibus sollicitudin. In et elementum mauris. Praesent sit amet nisl augue. Proin dictum leo sapien, sit amet efficitur ante interdum a. Sed vestibulum fringilla nulla, vitae tincidunt massa vestibulum in. Vivamus malesuada molestie neque, sit amet facilisis metus placerat et.\r\n\r\nDuis in scelerisque libero. Nam nisl nulla, consequat vel tincidunt egestas, tristique ac orci. Proin facilisis tortor a bibendum mollis. Cras efficitur, enim non facilisis lobortis, nunc nisi sollicitudin augue, ac iaculis dui nisi a tortor. Praesent nec placerat ex. Aenean consectetur, turpis sit amet pretium imperdiet, risus nisl fermentum magna, sit amet porta felis nisl eu elit. Integer sollicitudin rhoncus nisi, quis pellentesque ipsum vehicula quis.\r\n\r\nDonec vulputate nulla sed lacus malesuada, et condimentum arcu mattis. Quisque aliquet lectus magna, vel malesuada dolor condimentum ac. Suspendisse porta pellentesque quam. Duis porta arcu nec mi mollis dictum. Suspendisse sagittis dapibus purus eget sollicitudin. Curabitur a accumsan sapien, vel placerat lorem. Maecenas consectetur magna sit amet felis varius auctor.', 'assets/img/biciklisti.jpg', 2, 0, '2026-06-13 17:25:08'),
(4, 'Može uzrokovati velike probleme', 'Ova ozljeda zahvaća većinu igrača, ali od nje nisu sigurni ni oni koji se ne bave ovim sportom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mi ex, lobortis et libero sed, auctor pellentesque nisi. Sed porta consequat nisi, quis pharetra velit. Phasellus malesuada rhoncus arcu, in fringilla risus viverra vitae. Etiam dapibus efficitur metus vulputate tincidunt. Phasellus aliquam sapien in vehicula vulputate. Maecenas egestas lacinia nibh, non dignissim nibh vestibulum quis. Suspendisse in ligula eros. Vestibulum lacinia, nisi molestie posuere mollis, metus erat dignissim quam, dignissim dapibus nunc tortor et nibh. Sed ut rutrum sapien. Sed sed consectetur tortor. Aenean cursus neque ipsum, nec consequat metus ultricies et. Proin sagittis eros eget mi tincidunt dignissim. Maecenas ultrices ligula lorem, sit amet venenatis metus blandit eu.\r\n\r\nQuisque quis lobortis augue. Sed cursus sapien augue, vitae gravida risus porta egestas. Curabitur non augue at quam rhoncus cursus sed elementum leo. Mauris elit tellus, imperdiet a urna quis, luctus elementum libero. Mauris ut mi eget turpis cursus mollis id ac libero. Ut maximus quam et urna hendrerit elementum. Vivamus eget mauris volutpat, scelerisque odio eu, lobortis tellus. Maecenas ut tellus a mauris elementum aliquam quis sed massa. In volutpat lectus metus, vitae posuere tortor finibus at. Donec rhoncus tincidunt enim in viverra. Integer fringilla lacinia orci, quis accumsan lectus feugiat sit amet. Phasellus sed hendrerit elit, quis convallis diam. Suspendisse fermentum odio at dictum dictum. Curabitur malesuada accumsan auctor. Aenean lobortis sapien in metus tincidunt, sed tristique massa feugiat.\r\n\r\nIn gravida sem eros. Morbi euismod lacus eu odio faucibus sollicitudin. In et elementum mauris. Praesent sit amet nisl augue. Proin dictum leo sapien, sit amet efficitur ante interdum a. Sed vestibulum fringilla nulla, vitae tincidunt massa vestibulum in. Vivamus malesuada molestie neque, sit amet facilisis metus placerat et.\r\n\r\nDuis in scelerisque libero. Nam nisl nulla, consequat vel tincidunt egestas, tristique ac orci. Proin facilisis tortor a bibendum mollis. Cras efficitur, enim non facilisis lobortis, nunc nisi sollicitudin augue, ac iaculis dui nisi a tortor. Praesent nec placerat ex. Aenean consectetur, turpis sit amet pretium imperdiet, risus nisl fermentum magna, sit amet porta felis nisl eu elit. Integer sollicitudin rhoncus nisi, quis pellentesque ipsum vehicula quis.\r\n\r\nDonec vulputate nulla sed lacus malesuada, et condimentum arcu mattis. Quisque aliquet lectus magna, vel malesuada dolor condimentum ac. Suspendisse porta pellentesque quam. Duis porta arcu nec mi mollis dictum. Suspendisse sagittis dapibus purus eget sollicitudin. Curabitur a accumsan sapien, vel placerat lorem. Maecenas consectetur magna sit amet felis varius auctor.', 'assets/img/tenis.jpg', 2, 0, '2026-06-13 17:25:56'),
(5, 'Nevjerojatna brzina', 'Obara rekorde na svim natjecanjima, nećete vjerovati kako', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mi ex, lobortis et libero sed, auctor pellentesque nisi. Sed porta consequat nisi, quis pharetra velit. Phasellus malesuada rhoncus arcu, in fringilla risus viverra vitae. Etiam dapibus efficitur metus vulputate tincidunt. Phasellus aliquam sapien in vehicula vulputate. Maecenas egestas lacinia nibh, non dignissim nibh vestibulum quis. Suspendisse in ligula eros. Vestibulum lacinia, nisi molestie posuere mollis, metus erat dignissim quam, dignissim dapibus nunc tortor et nibh. Sed ut rutrum sapien. Sed sed consectetur tortor. Aenean cursus neque ipsum, nec consequat metus ultricies et. Proin sagittis eros eget mi tincidunt dignissim. Maecenas ultrices ligula lorem, sit amet venenatis metus blandit eu.\r\n\r\nQuisque quis lobortis augue. Sed cursus sapien augue, vitae gravida risus porta egestas. Curabitur non augue at quam rhoncus cursus sed elementum leo. Mauris elit tellus, imperdiet a urna quis, luctus elementum libero. Mauris ut mi eget turpis cursus mollis id ac libero. Ut maximus quam et urna hendrerit elementum. Vivamus eget mauris volutpat, scelerisque odio eu, lobortis tellus. Maecenas ut tellus a mauris elementum aliquam quis sed massa. In volutpat lectus metus, vitae posuere tortor finibus at. Donec rhoncus tincidunt enim in viverra. Integer fringilla lacinia orci, quis accumsan lectus feugiat sit amet. Phasellus sed hendrerit elit, quis convallis diam. Suspendisse fermentum odio at dictum dictum. Curabitur malesuada accumsan auctor. Aenean lobortis sapien in metus tincidunt, sed tristique massa feugiat.\r\n\r\nIn gravida sem eros. Morbi euismod lacus eu odio faucibus sollicitudin. In et elementum mauris. Praesent sit amet nisl augue. Proin dictum leo sapien, sit amet efficitur ante interdum a. Sed vestibulum fringilla nulla, vitae tincidunt massa vestibulum in. Vivamus malesuada molestie neque, sit amet facilisis metus placerat et.\r\n\r\nDuis in scelerisque libero. Nam nisl nulla, consequat vel tincidunt egestas, tristique ac orci. Proin facilisis tortor a bibendum mollis. Cras efficitur, enim non facilisis lobortis, nunc nisi sollicitudin augue, ac iaculis dui nisi a tortor. Praesent nec placerat ex. Aenean consectetur, turpis sit amet pretium imperdiet, risus nisl fermentum magna, sit amet porta felis nisl eu elit. Integer sollicitudin rhoncus nisi, quis pellentesque ipsum vehicula quis.\r\n\r\nDonec vulputate nulla sed lacus malesuada, et condimentum arcu mattis. Quisque aliquet lectus magna, vel malesuada dolor condimentum ac. Suspendisse porta pellentesque quam. Duis porta arcu nec mi mollis dictum. Suspendisse sagittis dapibus purus eget sollicitudin. Curabitur a accumsan sapien, vel placerat lorem. Maecenas consectetur magna sit amet felis varius auctor.', 'assets/img/atletika.jpg', 2, 0, '2026-06-13 18:11:57'),
(15, 'Paklena Naranča opet napada', 'Ovaj put su mu ukrali pastele', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mi ex, lobortis et libero sed, auctor pellentesque nisi. Sed porta consequat nisi, quis pharetra velit. Phasellus malesuada rhoncus arcu, in fringilla risus viverra vitae. Etiam dapibus efficitur metus vulputate tincidunt. Phasellus aliquam sapien in vehicula vulputate. Maecenas egestas lacinia nibh, non dignissim nibh vestibulum quis. Suspendisse in ligula eros. Vestibulum lacinia, nisi molestie posuere mollis, metus erat dignissim quam, dignissim dapibus nunc tortor et nibh. Sed ut rutrum sapien. Sed sed consectetur tortor. Aenean cursus neque ipsum, nec consequat metus ultricies et. Proin sagittis eros eget mi tincidunt dignissim. Maecenas ultrices ligula lorem, sit amet venenatis metus blandit eu.\r\n\r\nQuisque quis lobortis augue. Sed cursus sapien augue, vitae gravida risus porta egestas. Curabitur non augue at quam rhoncus cursus sed elementum leo. Mauris elit tellus, imperdiet a urna quis, luctus elementum libero. Mauris ut mi eget turpis cursus mollis id ac libero. Ut maximus quam et urna hendrerit elementum. Vivamus eget mauris volutpat, scelerisque odio eu, lobortis tellus. Maecenas ut tellus a mauris elementum aliquam quis sed massa. In volutpat lectus metus, vitae posuere tortor finibus at. Donec rhoncus tincidunt enim in viverra. Integer fringilla lacinia orci, quis accumsan lectus feugiat sit amet. Phasellus sed hendrerit elit, quis convallis diam. Suspendisse fermentum odio at dictum dictum. Curabitur malesuada accumsan auctor. Aenean lobortis sapien in metus tincidunt, sed tristique massa feugiat.\r\n\r\nIn gravida sem eros. Morbi euismod lacus eu odio faucibus sollicitudin. In et elementum mauris. Praesent sit amet nisl augue. Proin dictum leo sapien, sit amet efficitur ante interdum a. Sed vestibulum fringilla nulla, vitae tincidunt massa vestibulum in. Vivamus malesuada molestie neque, sit amet facilisis metus placerat et.\r\n\r\nDuis in scelerisque libero. Nam nisl nulla, consequat vel tincidunt egestas, tristique ac orci. Proin facilisis tortor a bibendum mollis. Cras efficitur, enim non facilisis lobortis, nunc nisi sollicitudin augue, ac iaculis dui nisi a tortor. Praesent nec placerat ex. Aenean consectetur, turpis sit amet pretium imperdiet, risus nisl fermentum magna, sit amet porta felis nisl eu elit. Integer sollicitudin rhoncus nisi, quis pellentesque ipsum vehicula quis.\r\n\r\nDonec vulputate nulla sed lacus malesuada, et condimentum arcu mattis. Quisque aliquet lectus magna, vel malesuada dolor condimentum ac. Suspendisse porta pellentesque quam. Duis porta arcu nec mi mollis dictum. Suspendisse sagittis dapibus purus eget sollicitudin. Curabitur a accumsan sapien, vel placerat lorem. Maecenas consectetur magna sit amet felis varius auctor.', 'assets/img/orange.jpg', 1, 0, '2026-06-13 21:23:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`ime`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vijesti_FK_1` (`idKategorija`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD CONSTRAINT `vijesti_FK_1` FOREIGN KEY (`idKategorija`) REFERENCES `kategorije` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
