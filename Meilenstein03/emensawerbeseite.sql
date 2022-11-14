-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: emensawerbeseite
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB

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
  `code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Offizieller Abkürzungsbuchstabe für das Allergen.',
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name des Allergens, wie "Glutenhaltigens Getreide"',
  `typ` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Gibt den Typ an. Standard: "allergen"',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergen`
--

LOCK TABLES `allergen` WRITE;
/*!40000 ALTER TABLE `allergen` DISABLE KEYS */;
/*!40000 ALTER TABLE `allergen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht`
--

DROP TABLE IF EXISTS `gericht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht` (
  `id` bigint(20) NOT NULL COMMENT 'Primärschlüssel',
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name des Gerichts. Ein Name ist eindeutig.',
  `beschreibung` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Beschreibung des Gerichts',
  `erfasst_am` date NOT NULL COMMENT 'Zeitpunkt der ersten Erfassung des Gerichts.',
  `vegetarisch` tinyint(1) NOT NULL COMMENT 'Markierung, ob das Gericht vegetarisch ist. Standard: Nein.',
  `vegan` tinyint(1) NOT NULL COMMENT 'Markierung, ob das Gericht vegan ist. Standard: Nein.',
  `preis_intern` double NOT NULL COMMENT 'Preis für interne Personen (wie Studierende). Es gilt immer preis_intern > 0.',
  `preis_extern` double NOT NULL COMMENT 'Preis für externe Personen (wie Gastdozent:innen).',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht`
--

LOCK TABLES `gericht` WRITE;
/*!40000 ALTER TABLE `gericht` DISABLE KEYS */;
/*!40000 ALTER TABLE `gericht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_allergen`
--

DROP TABLE IF EXISTS `gericht_hat_allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_allergen` (
  `code` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Referenz auf Allergen',
  `gericht_id` bigint(20) NOT NULL COMMENT 'Referenz auf das Gericht'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_allergen`
--

LOCK TABLES `gericht_hat_allergen` WRITE;
/*!40000 ALTER TABLE `gericht_hat_allergen` DISABLE KEYS */;
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
  `kategorie_id` bigint(20) NOT NULL COMMENT 'Referenz auf Kategorie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_kategorie`
--

LOCK TABLES `gericht_hat_kategorie` WRITE;
/*!40000 ALTER TABLE `gericht_hat_kategorie` DISABLE KEYS */;
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
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name der Kategorie, z.B. "Hauptgerichtz.B. „Hauptgericht“, „Vorspeise“, „Salat“, "Sauce" oder "Käsegericht".',
  `eltern_id` bigint(20) DEFAULT NULL COMMENT 'Referenz auf eine (Eltern-)Kategorie. Es soll eine Baumstruktur\ninnerhalb der Kategorien abgebildet werden. Zum Beispiel\nenthält die Kategorie „Hauptgericht“ alle Kategorien, denen\nGerichte zugeordnet sind, die als Hauptgang vorgesehen sind.',
  `bildname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Name der Bilddatei, die eine Darstellung der Kategorie enthält.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-07 21:59:10
