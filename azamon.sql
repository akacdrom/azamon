-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2020 at 07:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azamon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@azamon.com', 'g$9W6tV38g4$*Z$%6W^S');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `author_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_img`) VALUES
(1, 'Victor Hugo', 'Victor_Hugo.jpg'),
(2, 'J. R. R. Tolkien', '702088-352x500.jpg'),
(3, 'George R. R. Martin', 'x500.JPG'),
(4, 'J. K. Rowling', '8c3795af737d17c5d984b62b8fcc09b6.jpg'),
(5, 'Chuck Palahniuk', '604300-352x500.jpg'),
(6, 'Jan Brzechwa', 'janbrzechwa.jpg'),
(10, 'Andrzej Sapkowski', '123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(200) DEFAULT NULL,
  `book_descr` longtext DEFAULT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_genre` varchar(50) DEFAULT NULL,
  `book_img` varchar(200) DEFAULT NULL,
  `book_price` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_descr`, `book_author`, `book_genre`, `book_img`, `book_price`) VALUES
(1, 'Les Misérables', 'Introducing one of the most famous characters in literature, Jean Valjean—the noble peasant imprisoned for stealing a loaf of bread—Les Misérables ranks among the greatest novels of all time. In it, Victor Hugo takes readers deep into the Parisian underworld, immerses them in a battle between good and evil, and carries them to the barricades during the uprising of 1832 with a breathtaking realism that is unsurpassed in modern prose. Within his dramatic story are themes that capture the intellect and the emotions: crime and punishment, the relentless persecution of Valjean by Inspector Javert, the desperation of the prostitute Fantine, the amorality of the rogue Thénardier, and the universal desire to escape the prisons of our own minds. Les Misérables gave Victor Hugo a canvas upon which he portrayed his criticism of the French political and judicial systems, but the portrait that resulted is larger than life, epic in scope—an extravagant spectacle that dazzles the senses even as it touches the heart.', 'Victor Hugo', 'Novel', '24280.jpg', '20'),
(2, 'The Hobbit', 'In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to eat: it was a hobbit-hole, and that means comfort.\r\nWritten for J.R.R. Tolkien’s own children, The Hobbit met with instant critical acclaim when it was first published in 1937. Now recognized as a timeless classic, this introduction to the hobbit Bilbo Baggins, the wizard Gandalf, Gollum, and the spectacular world of Middle-earth recounts of the adventures of a reluctant hero, a powerful and dangerous ring, and the cruel dragon Smaug the Magnificent. The text in this 372-page paperback edition is based on that first published in Great Britain by Collins Modern Classics (1998), and includes a note on the text by Douglas A. Anderson (2001).', 'J. R. R. Tolkien', 'Science-Fiction', '5907.jpg', '50'),
(3, 'A Game of Thrones', 'Here is the first volume in George R. R. Martin’s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin’s stunning series is destined to stand as one of the great achievements of imaginative fiction.', 'George R. R. Martin', 'Detective', '51DA1hQNnJL._SX324_BO1,204,203,200_.jpg', '25'),
(4, 'Harry Potter and the Sorcerer\'s Stone', 'Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he\'s a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry.\r\n\r\nAfter a lifetime of bottling up his magical powers, Harry finally feels like a normal kid. But even within the Wizarding community, he is special. He is the boy who lived: the only person to have ever survived a killing curse inflicted by the evil Lord Voldemort, who launched a brutal takeover of the Wizarding world, only to vanish after failing to kill Harry.', 'J. K. Rowling', 'Detective', '3._SY475_.jpg', '34'),
(5, 'Fight Club', 'It follows the experiences of an unnamed protagonist struggling with insomnia. Inspired by his doctor\'s exasperated remark that insomnia is not suffering, the protagonist finds relief by impersonating a seriously ill person in several support groups. Then he meets a mysterious man named Tyler Durden and establishes an underground fighting club as radical psychotherapy.', 'Chuck Palahniuk', 'Self-Improvement', '5759.jpg', '54'),
(6, 'The Silmarillion', 'A number-one New York Times bestseller when it was originally published, THE SILMARILLION is the core of J.R.R. Tolkien\'s imaginative writing, a work whose origins stretch back to a time long before THE HOBBIT.\r\nTolkien considered THE SILMARILLION his most important work, and, though it was published last and posthumously, this great collection of tales and legends clearly sets the stage for all his other writing. The story of the creation of the world and of the the First Age, this is the ancient drama to which the characters in THE LORD OF THE RINGS look back and in whose events some of them, such as Elrond and Galadriel, took part. The three Silmarils were jewels created by Feanor, most gifted of the Elves. Within them was imprisoned the Light of the Two Trees of Valinor before the Trees themselves were destroyed by Morgoth, the first Dark Lord. Thereafter, the unsullied Light of Valinor lived on only in the Silmarils, but they were seized by Morgoth and set in his crown, which was guarded in the impenetrable fortress of Angband in the north of Middle-earth. THE SILMARILLION is the history of the rebellion of Feanor and his kindred against the gods, their exile from Valinor and return to Middle-earth, and their war, hopeless despite all their heroism, against the great Enemy.\r\nThis second edition features a letter written by J.R.R. Tolkien describing his intentions for the book, which serves as a brilliant exposition of his conception of the earlier Ages of Middle-earth.', 'J. R. R. Tolkien', 'Science', '41SAdzmroEL._SX327_BO1,204,203,200_.jpg', '65'),
(7, 'The Lord of the Rings', 'In ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell by chance into the hands of the hobbit Bilbo Baggins.\r\n\r\nFrom Sauron\'s fastness in the Dark Tower of Mordor, his power spread far and wide. Sauron gathered all the Great Rings to him, but always he searched for the One Ring that would complete his dominion.\r\n\r\nWhen Bilbo reached his eleventy-first birthday he disappeared, bequeathing to his young cousin Frodo the Ruling Ring and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord, and destroy the Ring by casting it into the Cracks of Doom.\r\n', 'J. R. R. Tolkien', 'Novel', '33.jpg', '22'),
(8, 'Akademia Pana Kleksa', 'Jest to pierwsza część baśniowej trylogii Jana Brzechwy, arcydzieło, do przeczytania którego nikogo nie trzeba zachęcać. Tytułową Akademię, położoną w ogromnym parku pełnym jarów i wąwozów, otacza wysoki mur, w którym jedna obok drugiej mieszczą się żelazne furtki, zamknięte na srebrne kłódeczki, a każda z nich to drzwi do innej bajki... Wraz z Panem Kleksem - niezwykłym nauczycielem i wynalazcą - bohaterowie opowieści odwiedzają baśniowe królestwa i przeżywają niewiarygodne przygody, a z każdej wyprawy wracają mądrzejsi.', 'Jan Brzechwa', 'Comic-Book', '1692524.jpg', '34'),
(9, ' Blood of Elves', 'The New York Times bestselling series that inspired the international hit video game: The Witcher.\r\nFor over a century, humans, dwarves, gnomes, and elves have lived together in relative peace. But times have changed, the uneasy peace is over, and now the races are fighting once again. The only good elf, it seems, is a dead elf.\r\n\r\nGeralt of Rivia, the cunning assassin known as The Witcher, has been waiting for the birth of a prophesied child. This child has the power to change the world - for good, or for evil.\r\n\r\nAs the threat of war hangs over the land and the child is hunted for her extraordinary powers, it will become Geralt\'s responsibility to protect them all - and the Witcher never accepts defeat.\r\n\r\nThe Witcher returns in this sequel to The Last Wish, as the inhabitants of his world become embroiled in a state of total war.', 'Andrzej Sapkowski', 'History', 'Blood_of_Elves_UK.jpg', '43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_surname`, `user_email`, `user_password`) VALUES
(1, 'ahmet', 'akkus', 'ahmet@wsb.poznan.pl', '41eb1fc81956aa81c6be226defff79fe'),
(2, 'ahmet2', 'akkus2', 'ahmet2@wsb.poznan.pl', '12d4edadbef0a522f77b1cda9161d45d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
