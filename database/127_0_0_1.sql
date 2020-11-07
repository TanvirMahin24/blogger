-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 07:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_tanvirmahincse182`
--
CREATE DATABASE IF NOT EXISTS `dev_tanvirmahincse182` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dev_tanvirmahincse182`;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `active`, `user_id`, `created_at`) VALUES
(1, 'This is cool title of mahin', '                            This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy text                        ', 'default.jpg', 0, 1, '2020-07-19 05:09:17'),
(2, 'a title of blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupi', 'analysis-blackboard-board-bubble-355952.jpg', 1, 3, '2020-07-19 07:03:46'),
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupi', 'blue-and-silver-stetoscope-40568.jpg', 1, 1, '2020-07-19 09:42:57'),
(4, 'This is another Cool title', 'This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dumasdasd asd asd asd as', 'default.jpg', 1, 3, '2020-07-19 05:09:17'),
(5, 'This is Cool title 3', 'This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy text', 'communication.jpg', 1, 3, '2020-07-19 05:09:17'),
(6, 'This is another Cool title 4', 'This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dumasdasd asd asd asd as', 'grass-field-1250346.jpg', 1, 5, '2020-07-19 05:09:17'),
(7, 'This is Cool title', 'This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy text', 'editorial.jpg', 1, 4, '2020-07-19 05:09:17'),
(8, 'This is Cool title 3', 'This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy text', 'graphics.jpg', 1, 5, '2020-07-19 05:09:17'),
(9, 'This is another Cool title 4', 'This is dummy text This is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dummy textThis is dumasdasd asd asd asd as', 'default.jpg', 1, 1, '2020-07-19 05:09:17'),
(11, 'My First Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'mac.jpg', 1, 11, '2020-07-21 18:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `blog_id`, `user_id`, `created_at`) VALUES
(4, 'Rem odio magnam laudantium ut in. Eos aperiam fuga dolorum ratione facilis alias. Explicabo cum voluptatibus tenetur fugit voluptates ducimus. Repellendus maiores voluptas ea eius molestiae voluptatem. Magnam suscipit quam dolores ut exercitationem.', 5, 2, '2020-07-21 05:14:48'),
(5, 'Sapiente minus cum itaque accusantium quia consequuntur id optio. Sint magni adipisci sapiente dolor vero harum. Facilis facilis omnis distinctio dicta dolorum. Cum et quas modi quos laboriosam vero. Ducimus velit id quia. Dolorum illo porro inventore natus ducimus. Voluptatum dicta et libero beatae et.', 3, 3, '2020-07-21 05:14:48'),
(6, 'Commodi voluptatem harum ut quae itaque porro quaerat. Vel magni perferendis ut impedit doloremque. Autem illo asperiores sed labore beatae quasi non. Sint corrupti temporibus illum voluptas aut. Fugiat facilis quis nemo nesciunt.', 6, 1, '2020-07-21 05:14:48'),
(7, 'Laudantium fuga facere earum voluptatem eos provident. Incidunt aut nisi ea saepe culpa neque quia eum. Totam sit vel velit reprehenderit exercitationem architecto. Est voluptatem libero rerum ut repellat et non.', 6, 6, '2020-07-21 05:14:48'),
(8, 'Assumenda alias explicabo doloribus nam commodi. Odio eum ducimus ut odit natus et ex eos. Doloribus eos illum ratione adipisci. Praesentium voluptatibus sunt reiciendis expedita aut. Eos et quam aut natus provident dolorem. Et et fugiat dolorem omnis aut.', 6, 1, '2020-07-21 05:14:48'),
(9, 'Voluptas voluptas dolor velit suscipit. Recusandae est pariatur tenetur est sint. Officia et debitis dolorum repellat quidem labore. Modi facere autem tempore et similique ea inventore. Laboriosam cupiditate et et.', 3, 5, '2020-07-21 05:14:48'),
(10, 'Quo molestiae sed saepe suscipit aut officia. Ea ut mollitia modi dolores commodi voluptatem tempora. Vero ad et nesciunt delectus fugit maxime. Sunt ut qui voluptatem ut id et repellendus. Sit necessitatibus unde dolores non voluptate dolor dolorem accusamus. Voluptatem qui et modi et corporis rerum odit sit.', 3, 3, '2020-07-21 05:14:48'),
(11, 'Necessitatibus praesentium expedita et et temporibus. Debitis ea non sint qui maiores rerum cumque. Dolor voluptatem nostrum quis incidunt. Molestiae et veniam molestias dolor illo magni. Eum temporibus ut eum illo quidem. Qui occaecati porro aperiam ad. Tenetur labore occaecati voluptas tenetur et est molestiae.', 6, 4, '2020-07-21 05:14:48'),
(12, 'Sint et dolor architecto quaerat est et alias. Enim in nostrum veritatis repudiandae. Nam quibusdam harum rem. Delectus voluptatem eos voluptatem qui. Nobis est quis sed. Perspiciatis qui sit recusandae.', 3, 1, '2020-07-21 05:14:48'),
(13, 'Eum consectetur alias voluptatem neque eum laudantium delectus enim. Veritatis quasi suscipit natus illum et sit saepe. Quod dolorem odio et ut et sapiente doloribus. Aspernatur asperiores et quis consequuntur repellat ut perferendis. Dolorem molestias at amet recusandae facere. Placeat accusamus voluptates ad adipisci in quisquam alias.', 8, 5, '2020-07-21 05:14:48'),
(14, 'Ipsa et reiciendis molestias. Quia pariatur recusandae molestias consequatur maxime iure totam. Doloremque pariatur quisquam molestias repellat voluptatum. Ea illum possimus mollitia aut atque nihil. Quia numquam ut quia. At ducimus ut dolorum occaecati beatae.', 8, 2, '2020-07-21 05:14:48'),
(15, 'Ea velit voluptatem incidunt et quaerat officiis sed. Molestias tenetur soluta id dolores ex. Omnis ipsam qui magni nulla ut. Consequatur vero voluptatem rem rerum. Temporibus minus saepe tempora ut dolorem similique.', 5, 5, '2020-07-21 05:14:48'),
(16, 'Sed suscipit non delectus rerum aut. Eum illum id necessitatibus. Fugit ullam eligendi repellendus rem reiciendis et. Itaque necessitatibus eum omnis voluptas aut. Fuga et sit eum qui aliquam est. Minima accusantium labore quam autem. Animi beatae qui consectetur qui.', 8, 1, '2020-07-21 05:14:48'),
(17, 'Nesciunt eum velit non enim nulla rerum. Voluptatum est quae excepturi illum molestiae iste enim. Eos sunt explicabo rerum commodi adipisci dolor eaque. Quis labore aut cum repellat blanditiis. Aliquam quis deleniti corrupti sunt velit sunt.', 1, 6, '2020-07-21 05:14:48'),
(18, 'Consequatur voluptatum est consequatur quos. Vel explicabo voluptas quo dignissimos reprehenderit nihil dolore. Ut neque est eveniet alias consequuntur cupiditate necessitatibus. Recusandae atque minus reiciendis sunt a.', 2, 6, '2020-07-21 05:14:48'),
(19, 'Sunt quo repellat hic porro. Nihil ut illum rem quia. Incidunt sed ipsam aut ad sit. Sed cumque in vel omnis. Quisquam id amet et soluta fuga non.', 8, 5, '2020-07-21 05:14:48'),
(20, 'Molestias iure fugiat neque ratione qui. Dolor iure maxime incidunt non voluptatem architecto et. Ut aspernatur et consectetur fugit repellat. Dolor nesciunt est molestiae natus cumque ut commodi. Aut ad omnis corrupti neque accusantium ut.', 3, 2, '2020-07-21 05:14:48'),
(21, 'Dicta esse ut officiis aperiam est reiciendis nihil. Officia facilis dolores repellendus error corrupti impedit voluptatibus. Aliquam cum et voluptatem repellendus expedita provident minima. Et hic neque ut reprehenderit.', 7, 3, '2020-07-21 05:14:48'),
(22, 'Est qui doloribus recusandae praesentium est. Rerum quibusdam inventore quas quos. Cupiditate labore suscipit qui aliquid perspiciatis repellat. Id iusto qui eos quisquam consequuntur numquam.', 6, 4, '2020-07-21 05:14:48'),
(23, 'Nesciunt est cumque error a consequatur incidunt. Dignissimos quod maiores est pariatur. Laudantium rerum ea odit voluptatum neque sed beatae. Voluptas a quas itaque facere voluptates dolores. Quia placeat alias vero laboriosam eum.', 2, 3, '2020-07-21 05:14:48'),
(24, 'Consequatur adipisci quod quaerat aliquam ratione similique recusandae. Totam minus in laudantium alias. Voluptates quis dolores inventore non magni totam quisquam aliquam. Nihil sed sed alias voluptatum doloremque laboriosam. Ducimus porro dolor asperiores quia rem quo sunt. Autem et sint minus nam nihil.', 3, 2, '2020-07-21 05:14:48'),
(25, 'Quas et mollitia consequatur eum porro mollitia. Optio ratione ea quam. Mollitia quae eum distinctio eos modi vel at. Est ut vel quo et voluptatem veniam quisquam. Minima et asperiores pariatur deleniti minus est.', 8, 6, '2020-07-21 05:14:48'),
(26, 'Non exercitationem omnis non ex impedit. Quia omnis odio optio itaque eum reprehenderit. Et dignissimos eum nisi eveniet. Amet voluptatem et dolor assumenda sunt beatae ipsum. Repellat ipsum ratione repellendus quia voluptates voluptatem.', 9, 5, '2020-07-21 05:14:48'),
(27, 'Aut iure est eveniet provident nesciunt adipisci. Et ut quo voluptatum delectus. Blanditiis earum minima sed voluptatem velit. Aliquam nulla et et eaque et recusandae.', 3, 6, '2020-07-21 05:14:48'),
(28, 'Suscipit quidem qui harum laborum quidem perspiciatis dignissimos consequuntur. Possimus doloribus iusto incidunt dolores modi. Est enim quasi ut debitis. At vitae eum adipisci natus totam sit numquam voluptatibus. Sapiente vel ea doloremque harum aut minus. Rerum magni eligendi in beatae iste voluptas impedit.', 4, 1, '2020-07-21 05:14:48'),
(29, 'Quos consequatur aut nihil et. Ipsam totam rem explicabo harum est aut. Recusandae aliquid eos saepe cupiditate beatae temporibus. Quasi esse quae perspiciatis enim perferendis rerum. Facilis maiores dolore iure consequatur molestias. Facere dolore ut omnis qui non. Veniam qui itaque unde placeat.', 8, 2, '2020-07-21 05:14:48'),
(30, 'Deleniti ut autem rerum et quidem perspiciatis nulla. Quia rerum nulla at aut hic asperiores. Aut necessitatibus enim suscipit et et facere culpa nobis. Voluptas maiores nobis velit voluptas occaecati distinctio quos voluptate. Officiis placeat asperiores delectus soluta.', 4, 3, '2020-07-21 05:14:48'),
(31, 'Corrupti et laboriosam eum nobis aspernatur quisquam. Explicabo ut veritatis dolorum sunt ex. Similique rerum non veritatis aliquid alias accusamus. Excepturi rem ab ad veniam illum. Sit dolores esse odio. Aspernatur et pariatur voluptas tempore reprehenderit vitae et.', 8, 5, '2020-07-21 05:14:48'),
(32, 'Voluptatem qui omnis neque iusto. Exercitationem accusantium qui porro molestias et sit. Rem velit deserunt blanditiis earum. Iure ea magnam maxime sint. Ullam reiciendis qui sit.', 8, 5, '2020-07-21 05:14:48'),
(33, 'Libero debitis aperiam aspernatur expedita. Quidem pariatur voluptate aut autem. Iure voluptas delectus voluptas unde. Laudantium reiciendis officiis enim tenetur.', 8, 4, '2020-07-21 05:14:48'),
(34, 'Aut id nihil fuga voluptatem non et quasi. Atque in illum dolorum ducimus ipsum harum veniam. Labore magnam voluptatem voluptas et error. Autem nesciunt similique quod iste consectetur et aliquid. Fugit atque maxime magni a ullam. Totam repellendus ducimus aliquam aut id. Corporis quidem libero ab voluptatibus.', 4, 3, '2020-07-21 05:14:48'),
(35, 'Veritatis voluptatibus voluptates dolores et ipsum sit. Molestiae vitae ut vel illo voluptas quo. Ipsam dolorem aut aut nesciunt quia ut. Aspernatur nostrum ut voluptas eos dolorem et in. Expedita consequatur facere cupiditate aliquam iste. Vel ut quis quia.', 6, 2, '2020-07-21 05:14:48'),
(36, 'Sint aliquid optio blanditiis necessitatibus reprehenderit corrupti temporibus velit. Et voluptatem et iusto neque enim qui. Nostrum eius pariatur commodi eum optio suscipit quis. Dignissimos nesciunt doloremque dolorem voluptate voluptatem. Dolores dolorum pariatur voluptatem est quo.', 5, 4, '2020-07-21 05:14:48'),
(37, 'Non animi rem laudantium est enim ut. Omnis illo aperiam voluptas cupiditate ea incidunt eum. Est a non eius eveniet odit rem. Voluptatem provident est eligendi commodi eum dolorem hic.', 3, 5, '2020-07-21 05:14:48'),
(38, 'Nobis in non explicabo corporis. Vel et et corrupti nemo officiis omnis. In dolorum et qui aperiam molestias dolores. Molestiae fugiat quis repellat autem eveniet impedit est. Nisi fuga eaque aliquid earum debitis. Adipisci incidunt et nisi libero dolorem.', 2, 4, '2020-07-21 05:14:48'),
(39, 'Fugiat id consequuntur ut molestias exercitationem deserunt. Aperiam illum inventore rerum mollitia eos quos accusantium. Natus inventore harum non sit quia et tempora. Placeat et aut quia accusantium.', 9, 5, '2020-07-21 05:14:48'),
(40, 'Sit omnis placeat nisi commodi aut. Vitae ut laboriosam omnis praesentium. Blanditiis sit labore suscipit repellendus atque et aut magni. Molestiae nobis sapiente voluptate numquam. Dolore harum asperiores deserunt rem nam voluptas autem. Dignissimos maxime incidunt iure pariatur impedit esse.', 10, 3, '2020-07-21 05:14:48'),
(41, 'Tenetur est odit temporibus odit facilis voluptates. Temporibus aspernatur a dolorem. Beatae qui soluta necessitatibus facere accusantium fuga recusandae nemo. Suscipit quia nihil id quo. Deleniti nobis nulla sit eaque repellat necessitatibus magni.', 2, 1, '2020-07-21 05:14:48'),
(42, 'Quia qui facere libero odit vitae. Minima quia architecto facere. Qui culpa id esse esse cumque quibusdam. Sed distinctio et voluptates dolores. Et sint ea eum non. Fugit rerum consequatur maiores soluta veniam.', 8, 5, '2020-07-21 05:14:48'),
(43, 'Doloremque odit sit eos quo. Rerum ipsum minima animi ut. Libero labore unde magnam molestias autem dolor. Aut explicabo fugiat voluptas sequi. Aut est sit sint sit. Iure inventore accusamus dolores quo.', 8, 5, '2020-07-21 05:14:48'),
(44, 'Ut qui architecto id ut placeat eos. Dolor exercitationem consequatur aut rerum. Magni laborum illum incidunt ducimus. Dolorem laboriosam voluptatibus expedita neque modi. Et voluptates animi culpa quod est minus.', 2, 5, '2020-07-21 05:14:48'),
(45, 'Blanditiis nostrum magni et maxime laborum. Sed sapiente aliquam tenetur debitis. Alias rem et eaque quae non et. Itaque autem id sed rerum maiores laborum consequatur veritatis. Eos qui odio exercitationem tempore delectus.', 1, 6, '2020-07-21 05:14:48'),
(46, 'Est eius aut fuga cum. At quis quo totam facere illum ducimus. Quo magni facere laboriosam consequatur odio aperiam error. Officia distinctio esse doloremque et enim.', 4, 4, '2020-07-21 05:14:48'),
(47, 'Et totam ea culpa rerum molestiae. Corrupti sit nihil eum nostrum blanditiis. Dolores vel quasi ratione dolorem. Quaerat autem vel et eum.', 2, 2, '2020-07-21 05:14:48'),
(48, 'Consequatur aut qui ad enim voluptatem consectetur. Et quia sint assumenda aliquid quia consequatur est laudantium. Ad non harum blanditiis consequatur et exercitationem. Vitae similique officiis et necessitatibus molestias praesentium fugiat. Eius rerum doloribus aperiam.', 2, 5, '2020-07-21 05:14:48'),
(49, 'Velit id dignissimos aperiam distinctio dignissimos consectetur quis. Delectus odio qui et aut. Distinctio expedita magni possimus explicabo molestiae cupiditate. Expedita et occaecati repellat corrupti ducimus modi magnam. Quisquam vel sapiente deserunt. Culpa excepturi minus quam officiis excepturi.', 8, 5, '2020-07-21 05:14:48'),
(50, 'Aliquid at voluptatem quia quia magnam. Corporis animi est possimus qui sapiente distinctio. Consequatur rerum adipisci repellendus vero temporibus aut. Est quaerat deserunt modi nihil corrupti excepturi aut qui. At sit eligendi molestiae eos cum. Temporibus quibusdam laborum sint sunt ad quidem.', 7, 5, '2020-07-21 05:14:48'),
(51, 'Perspiciatis sapiente nemo ad possimus et rem. Rerum minima enim aut voluptas magnam nisi quos. Est assumenda consequatur hic impedit id. Et nesciunt sed enim accusamus officiis dolores assumenda similique. Adipisci sit voluptates vel numquam. Occaecati aut aut nulla.', 10, 4, '2020-07-21 05:14:48'),
(52, 'Quibusdam aut consectetur nihil quaerat et. Sed excepturi ut facilis facilis accusamus. Perspiciatis et ut iste sed voluptas ut ratione. Fuga delectus ut est non et dicta et.', 3, 2, '2020-07-21 05:14:48'),
(53, 'Consequatur suscipit inventore aut. Quia ad nostrum error quis aliquam assumenda. Sit ea rerum doloremque accusantium. Dolore expedita et quia dicta quas. Et ipsum ea delectus. Sunt accusantium alias vitae et modi unde quam et. Et sed repellat et corporis nisi.', 7, 6, '2020-07-21 05:14:48'),
(54, 'Nice blog\r\n', 2, 1, '2020-07-21 12:21:42'),
(55, 'Good blog', 11, 1, '2020-07-22 17:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `user_id`, `blog_id`) VALUES
(1, 2, 1),
(3, 3, 1),
(10, 1, 4),
(12, 1, 1),
(28, 1, 11),
(29, 4, 3),
(30, 4, 4),
(31, 4, 11),
(32, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower_id`, `user_id`) VALUES
(3, 1, 3),
(5, 1, 6),
(6, 11, 4),
(7, 11, 1),
(8, 4, 1),
(9, 3, 1),
(10, 2, 1),
(11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `blog_id`) VALUES
(2, 2, 1),
(4, 5, 1),
(6, 5, 3),
(7, 4, 4),
(11, 1, 4),
(12, 1, 9),
(13, 1, 3),
(18, 1, 1),
(19, 8, 1),
(20, 8, 6),
(21, 11, 3),
(22, 11, 6),
(23, 11, 4),
(24, 1, 4),
(25, 1, 2),
(26, 1, 5),
(33, 1, 11),
(34, 4, 7),
(35, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone` tinytext,
  `password` tinytext NOT NULL,
  `address` tinytext,
  `job` text,
  `image` tinytext,
  `bio` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `address`, `job`, `image`, `bio`, `created_at`) VALUES
(1, 'Tanvir Mahin', 'tm24', 'tanvirmahin24@gmail.com', '01676708851', '$2y$10$D3bgccahidurg8rB/gF0KeMDB9icUrwZn9gI.2YTFmy5HDWL/KlrO', 'Lalkuthi, Rangpur', 'Student at RUET', 'mahin.jpg', 'I am tanvir mahin. I am a student of Rajshahi University of Engineering and Technology. I love web development. I am a MERN stack developer                          ', '2020-07-17 05:18:18'),
(3, 'Azmi Angkon', 't1', 'test01@test.com', '01676708851', '$2y$10$Bd9FgtVWrrFSF0OC9QVMtuTmf6QDYu/5GyjJ2u/Y6C5am4pYr776e', 'dhap, house: 23, road: 01 (CS road)', 'Student at HSTU', 'DSC_0008.jpg', '                                                                This is my awsome bio                                                                                                                                ', '2020-07-17 15:34:13'),
(4, 'Utshab Kundu', 'ut', 'utshab777@gmail.com', '0111111111111', '$2y$10$Zx7LiAJIqXb9H9YMflprHOs6EcJXGLHpglqenhh3l6QhWVws7xSrS', 'Dhaka', 'Student', 'download.jpg', 'Simple boy', '2020-07-19 03:00:06'),
(5, 'Test 01', 'test01', 'test@test.com', NULL, '$2y$10$VDCOlzDTQ/Ecb/VsB/M8SuJaLey9I5rcLn.H84FLycgxYFI5YxyOa', NULL, NULL, 'images.jpg', NULL, '2020-07-19 03:01:18'),
(6, 'test02', 'test2', 'test02@test.com', NULL, '$2y$10$J1Z0IvNQYlZcOipn191rneistwqC61Qgt8PM4pz3Va.YqFhm2MCUK', NULL, NULL, 'download (2).jpg', NULL, '2020-07-19 03:01:38'),
(7, 'Azmi', 'azmi', 'azmi@gmail.com', NULL, '$2y$10$nT.fjUP8HJuAd8v6Atu5gOGdOdnYiM3dppwo3cNPLcWlSDEZSSeyy', NULL, NULL, 'blank.png', NULL, '2020-07-19 03:03:45'),
(11, 'Noor Solaiman', 'noor', 'n.solaiman@gmail.com', '0123456789', '$2y$10$Cq9WzdPEAyvrXIYFTCEEsegtIJgNyZ/8ZKLYVZxW0mIk5zPDawfmO', 'Rangpur, BD', 'Businessman at Prince Enterprise', 'images (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.                                ', '2020-07-21 18:18:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
