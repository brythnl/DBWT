-- MariaDB dump 10.19  Distrib 10.9.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: emensawerbeseite
-- ------------------------------------------------------
-- Server version	10.9.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allergen`
--

DROP TABLE IF EXISTS `allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allergen` (
  `code` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Offizieller Abkürzungsbuchstabe für das Allergen.',
  `name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name des Allergens, wie "Glutenhaltigens Getreide"',
  `typ` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Gibt den Typ an. Standard: "allergen"',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergen`
--

LOCK TABLES `allergen` WRITE;
/*!40000 ALTER TABLE `allergen` DISABLE KEYS */;
INSERT INTO `allergen` VALUES
('a','Getreideprodukte','Getreide (Gluten)'),
('a1','Weizen','Allergen'),
('a2','Roggen','Allergen'),
('a3','Gerste','Allergen'),
('a4','Dinkel','Allergen'),
('a5','Hafer','Allergen'),
('a6','Kamut','Allergen'),
('b','Fisch','Allergen'),
('c','Krebstiere','Allergen'),
('d','Schwefeldioxid/Sulfit','Allergen'),
('e','Sellerie','Allergen'),
('f','Milch und Laktose','Allergen'),
('f1','Butter','Allergen'),
('f2','Käse','Allergen'),
('f3','Margarine','Allergen'),
('g','Sesam','Allergen'),
('h','Nüsse','Allergen'),
('h1','Mandeln','Allergen'),
('h2','Haselnüsse','Allergen'),
('h3','Walnüsse','Allergen'),
('i','Erdnüsse','Allergen');
/*!40000 ALTER TABLE `allergen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `benutzer`
--

DROP TABLE IF EXISTS `benutzer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `benutzer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Eindeutige ID, Auto-Inkrement',
  `NAME` varchar(200) NOT NULL COMMENT 'Name, der auch auf der Oberfläche dargestellt wird',
  `email` varchar(100) NOT NULL COMMENT 'Eindeutige E-Mail der Benutzer:in. Teil der Anmeldung',
  `passwort` varchar(200) NOT NULL COMMENT 'Speicherung des Passwort-Hashs mit SHA-1',
  `ADMIN` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Markierung, ob es sich um einen Administrator handelt\r\noder nicht. Standard: false',
  `anzahlfehler` int(11) NOT NULL DEFAULT 0 COMMENT 'Zähler, wie oft hintereinander eine Anmeldung\r\nerfolglos durchgeführt wurde. Standard: 0',
  `anzahlanmeldungen` int(11) NOT NULL COMMENT 'Zähler, wie oft eine Anmeldung insgesamt erfolgreich\r\ndurchgeführt wurde',
  `letzteanmeldung` datetime DEFAULT NULL COMMENT 'Zeitpunkt, an dem sich der/die Benutzer:in zuletzt\r\nerfolgreich angemeldet hat',
  `letzterfehler` datetime DEFAULT NULL COMMENT 'Zeitpunkt, an dem sich der/die Benutzer:in zuletzt\r\nerfolglos angemeldet hat',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benutzer`
--

LOCK TABLES `benutzer` WRITE;
/*!40000 ALTER TABLE `benutzer` DISABLE KEYS */;
INSERT INTO `benutzer` VALUES
(1,'Bryan','admin@emensa.example','59b3e8d637cf97edbe2384cf59cb7453dfe30789',1,0,0,NULL,NULL);
/*!40000 ALTER TABLE `benutzer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `besucher`
--

DROP TABLE IF EXISTS `besucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `besucher` (
  `anzahl` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `besucher`
--

LOCK TABLES `besucher` WRITE;
/*!40000 ALTER TABLE `besucher` DISABLE KEYS */;
INSERT INTO `besucher` VALUES
(24);
/*!40000 ALTER TABLE `besucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht`
--

DROP TABLE IF EXISTS `gericht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht` (
  `id` bigint(20) NOT NULL COMMENT 'Primärschlüssel',
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name des Gerichts. Ein Name ist eindeutig.',
  `beschreibung` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Beschreibung des Gerichts',
  `erfasst_am` date NOT NULL COMMENT 'Zeitpunkt der ersten Erfassung des Gerichts.',
  `vegetarisch` tinyint(1) NOT NULL COMMENT 'Markierung, ob das Gericht vegetarisch ist. Standard: Nein.',
  `vegan` tinyint(1) NOT NULL COMMENT 'Markierung, ob das Gericht vegan ist. Standard: Nein.',
  `preis_intern` double NOT NULL COMMENT 'Preis für interne Personen (wie Studierende). Es gilt immer preis_intern > 0.',
  `preis_extern` double NOT NULL COMMENT 'Preis für externe Personen (wie Gastdozent:innen).',
  `bildname` varchar(200) DEFAULT NULL COMMENT 'Name der BIlddatei, die das Gericht darstellt. Standard: null.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `name_asc` (`name`),
  CONSTRAINT `preis_check` CHECK (`preis_intern` <= `preis_extern`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht`
--

LOCK TABLES `gericht` WRITE;
/*!40000 ALTER TABLE `gericht` DISABLE KEYS */;
INSERT INTO `gericht` VALUES
(1,'Bratkartoffeln mit Speck und Zwiebeln','Kartoffeln mit Zwiebeln und gut Speck','2020-08-25',0,0,2.3,4,'01_bratkartoffel.jpg'),
(3,'Bratkartoffeln mit Zwiebeln','Kartoffeln mit Zwiebeln und ohne Speck','2020-08-25',1,1,2.3,4,'03_bratkartoffel.jpg'),
(4,'Grilltofu','Fein gewürzt und mariniert','2020-08-25',1,1,2.5,4.5,'04_tofu.jpg'),
(5,'Lasagne','Klassisch mit Bolognesesoße und Creme Fraiche','2020-08-24',0,0,2.5,4.5,NULL),
(6,'Lasagne vegetarisch','Klassisch mit Sojagranulatsoße und Creme Fraiche','2020-08-24',1,0,2.5,4.5,'06_lasagne.jpg'),
(7,'Hackbraten','Nicht nur für Hacker','2020-08-25',0,0,2.5,4,NULL),
(8,'Gemüsepfanne','Gesundes aus der Region, deftig angebraten','2020-08-25',1,1,2.3,4,NULL),
(9,'Hühnersuppe','Suppenhuhn trifft Petersilie','2020-08-25',0,0,2,3.5,'09_suppe.jpg'),
(10,'Forellenfilet','mit Kartoffeln und Dilldip','2020-08-22',0,0,3.8,5,'10_forelle.jpg'),
(11,'Kartoffel-Lauch-Suppe','der klassische Bauchwärmer mit frischen Kräutern','2020-08-22',1,0,2,3,'11_soup.jpg'),
(12,'Kassler mit Rosmarinkartoffeln','dazu Salat und Senf','2020-08-23',0,0,3.8,5.2,'12_kassler.jpg'),
(13,'Drei Reibekuchen mit Apfelmus','grob geriebene Kartoffeln aus der Region','2020-08-23',1,0,2.5,4.5,'13_reibekuchen.jpg'),
(14,'Pilzpfanne','die legendäre Pfanne aus Pilzen der Saison','2020-08-23',1,0,3,5,NULL),
(15,'Pilzpfanne vegan','die legendäre Pfanne aus Pilzen der Saison ohne Käse','2020-08-24',1,1,3,5,'15_pilze.jpg'),
(16,'Käsebrötchen','schmeckt vor und nach dem Essen','2020-08-24',1,0,1,1.5,NULL),
(17,'Schinkenbrötchen','schmeckt auch ohne Hunger','2020-08-25',0,0,1.25,1.75,'17_broetchen.jpg'),
(18,'Tomatenbrötchen','mit Schnittlauch und Zwiebeln','2020-08-25',1,1,1,1.5,NULL),
(19,'Mousse au Chocolat','sahnige schweizer Schokolade rundet jedes Essen ab','2020-08-26',1,0,1.25,1.75,'19_mousse.jpg'),
(20,'Suppenkreation á la Chef','was verschafft werden muss, gut und günstig','2020-08-26',0,0,0.5,0.9,'20_suppe.jpg'),
(21,'Currywurst mit Pommes','Bratwurst mit Currysauce und gefrittierte Pommes','2022-11-11',0,0,2.8,5,NULL);
/*!40000 ALTER TABLE `gericht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_allergen`
--

DROP TABLE IF EXISTS `gericht_hat_allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_allergen` (
  `code` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Referenz auf Allergen',
  `gericht_id` bigint(20) NOT NULL COMMENT 'Referenz auf das Gericht',
  KEY `gericht_id` (`gericht_id`),
  KEY `code` (`code`),
  CONSTRAINT `gericht_hat_allergen_ibfk_1` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`),
  CONSTRAINT `gericht_hat_allergen_ibfk_2` FOREIGN KEY (`code`) REFERENCES `allergen` (`code`),
  CONSTRAINT `gericht_hat_allergen_ibfk_3` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`) ON DELETE CASCADE,
  CONSTRAINT `gericht_hat_allergen_ibfk_4` FOREIGN KEY (`code`) REFERENCES `allergen` (`code`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_allergen`
--

LOCK TABLES `gericht_hat_allergen` WRITE;
/*!40000 ALTER TABLE `gericht_hat_allergen` DISABLE KEYS */;
INSERT INTO `gericht_hat_allergen` VALUES
('h',1),
('a3',1),
('a4',1),
('f1',3),
('a6',3),
('i',3),
('a3',4),
('f1',4),
('a4',4),
('h3',4),
('d',6),
('h1',7),
('a2',7),
('h3',7),
('c',7),
('a3',8),
('h3',10),
('d',10),
('f',10),
('f2',12),
('h1',12),
('a5',12),
('c',1),
('a2',9),
('i',14),
('f1',1),
('a1',15),
('a4',15),
('i',15),
('f3',15),
('h3',15);
/*!40000 ALTER TABLE `gericht_hat_allergen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_kategorie`
--

DROP TABLE IF EXISTS `gericht_hat_kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_kategorie` (
  `gericht_id` bigint(20) NOT NULL COMMENT 'Referenz auf Gericht',
  `kategorie_id` bigint(20) NOT NULL COMMENT 'Referenz auf Kategorie',
  PRIMARY KEY (`gericht_id`,`kategorie_id`),
  UNIQUE KEY `uq_gericht_hat_kategorie` (`gericht_id`,`kategorie_id`),
  KEY `gericht_hat_kategorie_ibfk_2` (`kategorie_id`),
  CONSTRAINT `gericht_hat_kategorie_ibfk_1` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`),
  CONSTRAINT `gericht_hat_kategorie_ibfk_2` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`id`),
  CONSTRAINT `gericht_hat_kategorie_ibfk_3` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_kategorie`
--

LOCK TABLES `gericht_hat_kategorie` WRITE;
/*!40000 ALTER TABLE `gericht_hat_kategorie` DISABLE KEYS */;
INSERT INTO `gericht_hat_kategorie` VALUES
(1,3),
(3,3),
(4,3),
(5,3),
(6,3),
(7,3),
(9,3),
(16,4),
(16,5),
(17,4),
(17,5),
(18,4),
(18,5),
(21,3);
/*!40000 ALTER TABLE `gericht_hat_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorie` (
  `id` bigint(20) NOT NULL COMMENT 'Primärschlüssel',
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name der Kategorie, z.B. "Hauptgerichtz.B. „Hauptgericht“, „Vorspeise“, „Salat“, "Sauce" oder "Käsegericht".',
  `eltern_id` bigint(20) DEFAULT NULL COMMENT 'Referenz auf eine (Eltern-)Kategorie. Es soll eine Baumstruktur\ninnerhalb der Kategorien abgebildet werden. Zum Beispiel\nenthält die Kategorie „Hauptgericht“ alle Kategorien, denen\nGerichte zugeordnet sind, die als Hauptgang vorgesehen sind.',
  `bildname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name der Bilddatei, die eine Darstellung der Kategorie enthält.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;
INSERT INTO `kategorie` VALUES
(1,'Aktionen',NULL,'kat_aktionen.png'),
(2,'Menus',NULL,'kat_menu.gif'),
(3,'Hauptspeisen',2,'kat_menu_haupt.bmp'),
(4,'Vorspeisen',2,'kat_menu_vor.svg'),
(5,'Desserts',2,'kat_menu_dessert.pic'),
(6,'Mensastars',1,'kat_stars.tif'),
(7,'Erstiewoche',1,'kat_erties.jpg');
/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wunschgericht`
--

DROP TABLE IF EXISTS `wunschgericht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wunschgericht` (
  `NAME` varchar(200) NOT NULL,
  `beschreibung` varchar(800) NOT NULL,
  `erstellungsdatum` date NOT NULL,
  `nummer` bigint(20) NOT NULL AUTO_INCREMENT,
  `erstellername` varchar(80) NOT NULL DEFAULT 'anonym',
  `ersteller_email` varchar(200) NOT NULL,
  PRIMARY KEY (`nummer`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wunschgericht`
--

LOCK TABLES `wunschgericht` WRITE;
/*!40000 ALTER TABLE `wunschgericht` DISABLE KEYS */;
INSERT INTO `wunschgericht` VALUES
('Gericht1','Beschreibung1','2022-01-01',4,'Name1','email1@example.com'),
('Gericht2','Beschreibung2','2022-01-02',5,'Name2','email2@example.com'),
('Gericht3','Beschreibung3','2022-01-03',6,'Name3','email3@example.com'),
('Gericht4','Beschreibung4','2022-01-04',7,'Name4','email4@example.com'),
('Gericht5','Beschreibung5','2022-01-05',8,'Name5','email5@example.com'),
('','','1970-01-01',9,'',''),
('Bryan','Gebratener Reis','2022-01-03',10,'Name1','bryanathanaelj@gmail.com');
/*!40000 ALTER TABLE `wunschgericht` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-13 17:50:01
