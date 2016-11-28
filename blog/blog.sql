-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2016 at 01:54 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `article_content` text CHARACTER SET latin1 NOT NULL,
  `article_img` varchar(25) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `keywords` varchar(50) NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_content`, `article_img`, `user_id`, `post_date`, `keywords`) VALUES
(1, 'Par saveta za kupovinu laptopa', 'Posedovati laptop sve vise postaje potreba, ne samo za informaticke geekove, vec i za ostale profesije. Pretpostavljam da oni koji se koliko-toliko razumeju u kompjuterski hardver vec znaju sta treba, a sta ne treba kupovati i sta je bitno, a sta nebitno kad se kupuje laptop.Sto se tice ostalih, ovde cu izneti par zapazanja, saveta koja su licno moja i mogu se smatrati i subjektivnim, ali s obzirom na broj laptopova kojima sam zavirio ispod haube i na broj i raznovrsnost racunara koje sam probao, smatram da mogu da iznesem misljenje na ovu temu, pa makar bilo i subjetivno.\r\nPrvo, da krenem od toga sta treba pogledati, kad se kupuje laptop, nezavisno od toga koji je proizvodjac u pitanju.\r\n', 'slika.jpg', 1, '2016-09-28', 'savet,kupovina,laptop'),
(2, 'Hosting provajderi - iskustva', 'Sajt  koji se nalazi kod jednog domaceg provajdera malo-malo pa misteriozno se obori iako nema veliki broj poseta, mozda 100-tinak dnevno jer je u pitanju obicna staticka prezentacija, nema 404-greske nit ko skenira sajt onim fensi Kali Linux alatima i pokusava da ga obori.', 'slide.png', 2, '2016-09-06', 'hosting,provajder,iskustva'),
(3, 'Bolovi usled rada na racunaru - odmor', 'Za sprecavanje nastanka ovakvih bolova, od presudnog znacaja je adekvatan polozaj za vreme rada na racunaru. Sedeti treba tako da stopala celom svojom povrsinom leze na podu, a kolena treba da su direktno iznad stopala (pod uglom od 90 stepeni ili nesto vecim). Karlica treba da je lako zabacena, u ravni sa kolenima, ili malo iznad njih. Ledja moraju biti pravilno naslonjena, ramena opustena, vrat relaksiran i oslonjen na kicmeni stub, a glava uspravna, tako da se njome moze lako balansirati.\r\n\r\nTastatura treba da je postavljena iznad prepona, tako da ruke budu blizu tela, a podlaktice paralelne sa podlogom. Laktovi i ramena moraju biti pod uglom od 90 stepeni ili nesto vecim. Mis treba da je sa strane tastature, i u istoj ravni sa njom. Navika odredjenog broja ljudi da misa postavljaju ispod nivoa tastature izuzetno je pogresna! Monitor mora biti direktno ispred glave, a oci u visini ili nesto malo ispod gornje ivice ekrana. Monitor nikada ne treba postavljati tako da se vrat mora kriviti prilikom rada!\r\n\r\nJos jedna znacajna preventivna mera je doziranje rada. Ovo podrazumeva odgovarajuci ritam rada i pauza, te odgovarajuce vezbe u pauzama. Preporucuju se blago razgibavanje, narocito ledja i rucnih zglobova, zatim kratka setnja, boravak na otvorenom itd. Zdrav stil zivota (pravilna ishrana, redovan san, rekreacija, izbegavanje stresa), takodje su dobra prevencija oboljenja koja nastaju usled rada na kompjuteru.', 'slika.jpg', 3, '2016-09-27', 'bolovi,racunar,odmor,rad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `last_log_time` timestamp NOT NULL,
  `acces_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `last_log_time`, `acces_level`) VALUES
(1, 'Petar', 'sifra123', '2016-10-18 13:22:50', 1),
(2, 'Bojana', 'boka', '2016-10-18 13:22:50', 2),
(3, 'Milica', 'milica123', '2016-10-18 13:22:50', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
