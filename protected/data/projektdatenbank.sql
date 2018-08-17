-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: projekt_db
-- ------------------------------------------------------
-- Server version	5.7.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_bgt`
--

DROP TABLE IF EXISTS `tbl_bgt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bgt` (
  `projekt_id` int(11) NOT NULL AUTO_INCREMENT,
  `projekt_titel` varchar(200) NOT NULL,
  `projekt_name` text NOT NULL,
  `projekt_zuwendungsnummer` varchar(45) DEFAULT NULL,
  `projekt_leiter` int(11) DEFAULT NULL,
  `thematische` text,
  `projekt_skizze` date DEFAULT NULL,
  `projekt_antrag` date DEFAULT NULL,
  `aktuellerstatus_id` text,
  `bemerkungen` text,
  `fordermittelgeber_id` text,
  `forderungsquote_gwi` varchar(200) DEFAULT NULL,
  `projektgesamtvolumen` varchar(45) DEFAULT NULL,
  `gwi_anteil` varchar(45) DEFAULT NULL,
  `gwi_ko_finanzierung` varchar(45) DEFAULT NULL,
  `projektpartner_industrie` varchar(45) DEFAULT NULL,
  `pbg` varchar(45) DEFAULT NULL,
  `pba` varchar(45) DEFAULT NULL,
  `projekttyp` int(11) DEFAULT NULL,
  `projektdauer` varchar(45) DEFAULT NULL,
  `projektstart` date DEFAULT NULL,
  `projektende` date DEFAULT NULL,
  `projekt_info` text,
  `link_zur_abschlussbericht` text,
  `link_zur_projekt_internetseite` text,
  `projektpartner_forschung` varchar(45) DEFAULT NULL,
  `letzte_aktualisierung` datetime DEFAULT NULL,
  `kontakt_technisch` varchar(250) DEFAULT NULL,
  `kontakt_kaufmanisch` varchar(250) DEFAULT NULL,
  `projektschöpfer` int(11) DEFAULT NULL,
  `projektkostenabrechnung` int(11) DEFAULT NULL,
  `vertreter` int(11) DEFAULT NULL,
  `interne_nummer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`projekt_id`),
  UNIQUE KEY `projekt_titel_UNIQUE` (`projekt_titel`),
  KEY `fk_projekt_typ_idx` (`projekttyp`),
  KEY `fk_projekt_leiter_id_bgt_idx` (`projekt_leiter`),
  KEY `fk_projektschöpfer_id_bgt_idx` (`projektschöpfer`),
  KEY `fk_vertreter_id_bgt_idx` (`vertreter`),
  CONSTRAINT `fk_projekt_leiter_id_bgt` FOREIGN KEY (`projekt_leiter`) REFERENCES `tbl_user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projekt_typ_bgt` FOREIGN KEY (`projekttyp`) REFERENCES `tbl_projekt_typ` (`pk_projekt_typ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projektschöpfer_id_bgt` FOREIGN KEY (`projektschöpfer`) REFERENCES `tbl_user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vertreter_id_bgt` FOREIGN KEY (`vertreter`) REFERENCES `tbl_user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bgt`
--

LOCK TABLES `tbl_bgt` WRITE;
/*!40000 ALTER TABLE `tbl_bgt` DISABLE KEYS */;
INSERT INTO `tbl_bgt` VALUES (1,'European-wide field trials  for residential fuel cell micro-CHP','ene.field','B135',NULL,'EE,Glas',NULL,'2029-07-20','Bewilligt','GWI Unterauftragnehmer.\r\nwurde kostenneutral um 8 Monate verlängert, bis 30.9.2016; Abschlussbericht März 2017\r\n','','6542875','96873','81358','33258456','IAEW,Gelsenwasser','Pbg test','PbA test',2,'projekt dauer test','2017-07-15','2029-07-20','//test.docx','https://gwi-essen.de/','www.projet-seite.com','GWI,RUB','2017-09-13 13:33:44','','',1,NULL,NULL,NULL),(2,'Virtuelles Institut: Strom zu Gas und  Wärme… (Hauptprojekt)','VI PtG/H  Hauptprojekt','B146',NULL,'Biogas',NULL,NULL,'','','','NRW','779997','','','','','',2,'01.02.2015 - 31.12.2017','2015-02-01','2017-12-31','','https://gwi-essen.de/','','','2017-09-14 14:02:21','','',1,NULL,NULL,NULL),(3,'Integration fluktuierender erneuerbarer  Energien durch konvergente Nutzung von Strom- und Gasnetzen – Konvergenz Strom- und Gasnetze','Konstgas','157749',1,'KWK,',NULL,'2017-08-13',NULL,'\"GWI Unterauftragnehmer.\r\nwurde kostenneutral um 8 Monate verlängert, bis 30.9.2016; Abschlussbericht März 2017\"\r\n',NULL,'Unterauftrag/   Industrieauftrag','284690','','',NULL,'','',1,'01.08.2013 -  31.01.2016','2013-08-01','2016-01-31','','','','KIT,TUB,RUB,TUD,','2017-08-22 14:04:39','','',1,NULL,NULL,NULL),(4,'Innovative large-scale energy STOragE technologies AND Power-to-Gas concepts after Optimisation','STORE&GO ','B150',NULL,'',NULL,'2015-05-05','','11.9.15: Antrag genehmigt\r\nStart: 01.03.2016\r\n','','Call: H2020-LCE-2015-3 (EU Kommission); Förde','27973370','419250','','','','',1,'48 Monate von März 2016 bis Feb 2020','2016-03-01','2020-02-01','','https://gwi-essen.de/','','','2017-09-14 13:46:56','Markus Klein\r\n08743645\r\n48567, Köln','',1,NULL,NULL,NULL),(5,'demoKWK3.0 - Wissenschaftliche Begleitung zur ganzheitlichen Evaluation des Anlagenpools aus !100 KWK-Anlagen in Bottrop\r\n','demoKWK3.0','B151',1,NULL,NULL,'2016-03-10',NULL,'Antrag demoKWK2.0 (14.09.2015) in demoKWK3.0 umgewandelt.\r\nAZ: PRO/0064\r\n',NULL,'Land NRW - MKULNV','186510','186510','',NULL,'','',2,'21.04.2016-31.10.2016','2016-04-21','2016-10-31','','','',NULL,'2017-07-27 14:58:43','','',1,NULL,NULL,NULL),(6,'keine','transfer4.0@KWK.NRW','157750',1,NULL,NULL,'2016-05-04',NULL,'Kick Off hat statt gefunden, Bearbeitung AP 1 und AP 3 läuft, Zwischenbericht wird erstellt (31.1.2017)\r\n',NULL,'','','87400','',NULL,'','',NULL,'01.07.2016-30.06.2017','2016-07-01','2017-06-30','','','',NULL,'2017-09-04 12:14:51','','',1,NULL,NULL,NULL),(7,'Integrierte Betrachtung von Strom-, \r\nGas- und Wärmesystemen zur modellbasierten Optimierung des Energieausgleichs- und Transportbedarfs innerhalb der deutschen Energienetze\"','IntegraNet','',1,NULL,'2015-10-01','2015-11-16',NULL,'Förderquote 85% bestätigt, Rückfragen beantwortet, Bewilligungsbescheid da\r\n',NULL,'','1300000','530','','Fraunhofer UMSICHT,','','',1,'01.07.2016-  30.06.2019','2016-07-01','2019-06-30','','','',NULL,'2017-09-04 12:20:47','','',1,NULL,NULL,NULL),(8,'Modellbasierte Analyse der Integration erneuerbarer Stromüberschüsse durch die Kopplung der Stromversorgung mit Wärme-, Gas- und Verkehrssektor\r\n','MuSeKo','124267',1,' Biogas, Regenerative Energien und Energiesparen,','2015-12-03','2016-01-22',NULL,'22.12.15: Email DrSch: \r\nPTJ bestätigt, dass Projekt genehmigt wird. 01.09.2016: Läuft\r\n',NULL,'','','207000','','Fraunhofer UMSICHT,','','',2,'Apr. 2016 - Mrz. 2019','2016-04-01','2019-03-01','','','',NULL,'2017-09-04 16:21:41','','',1,NULL,NULL,NULL),(9,'LNG: Projekt zur Entwicklung von (regionalen) innovativen Lösungen für die Transport- und Industriesektoren\r\n','LNG PILOTS','',1,'Intrastruktur,','2015-08-15','2016-01-14',NULL,'Einzelne Fragestellungen werden geklärt, das Budget - finalisiert. Austausch mit Projektpartnern angefangen, Fragebogen für LNG eingereicht.\r\n',NULL,'EU über Interreg\r\n','6800000','189377','',NULL,'','',1,'15.01.2016-30.06.2019','2016-01-15','2019-06-30','','','',NULL,'2017-09-04 13:06:07','','',1,NULL,NULL,NULL),(10,'Energieeffiziente Wohnsiedlungen durch \r\nzukunftsfähige Konzepte für den denkmalgeschützten Bestand – Energieoptimiertes Quartier Margarethenhöhe Essen ','EnEff:Stadt (EnQM)','',1,'EE,','2015-07-14','2016-03-07',NULL,'Positive Bewertung der Projektskizze, Antrag wird von Prof. Garrecht vorbereitet\r\n',NULL,'BMWi (über PTJ)\r\n','2989800','530000','',NULL,'','',2,'01.09.2016 –  31.08.2020 ','2016-09-01','2020-08-31','','','',NULL,'2017-09-04 13:09:01','','',1,NULL,NULL,NULL),(11,'optimale Zusammensetzung von Speichertechnologien, um eine möglichst hohe System- und Netzstabilität zu gewährleisten. \r\n','EnerPraxis','',1,NULL,NULL,'2015-09-25',NULL,'Projekt läuft ab 01.12.16\r\n',NULL,'Klimaschutzwettbewerb NRW\r\nFörderquote 83,22 % (da Eigenanteil wegen Investition höher ist)\r\n','1300000','7086145','','GWI,Gelsenwasser,','','',1,'01.12.2016-   31.12.2019','2016-12-01','2019-12-31','','','',NULL,'2017-09-04 13:27:01','','',1,NULL,NULL,NULL),(12,'Dokumentation und vergleichende Bewertung von Demonstratoren hinsichtlich des nutzbaren Flexibilitätspotentials unter besonderer Berücksichtigung der Kraft-Wärme-Kopplung\r\n','DESIGNETZ','',1,NULL,'2015-05-29','2016-02-29',NULL,'',NULL,'BMWi\r\n(90% f. GWI)\r\nFörderquote wurde auf 85% gesetzt. Einspruch hat uns auf 90% gebracht.','40000000','1311297','',NULL,'','',2,'01.01.2017 –  31.12.2020','2017-01-01','2020-12-31','','','',NULL,'2017-09-04 13:29:22','','',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_bgt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ift`
--

DROP TABLE IF EXISTS `tbl_ift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ift` (
  `projekt_id` int(11) NOT NULL AUTO_INCREMENT,
  `projekt_titel` varchar(200) NOT NULL,
  `projekt_name` text NOT NULL,
  `projekt_zuwendungsnummer` varchar(45) DEFAULT NULL,
  `projekt_leiter` int(11) DEFAULT NULL,
  `thematische` text,
  `projekt_skizze` date DEFAULT NULL,
  `projekt_antrag` date DEFAULT NULL,
  `aktuellerstatus_id` text,
  `bemerkungen` text,
  `fordermittelgeber_id` text,
  `forderungsquote_gwi` varchar(200) DEFAULT NULL,
  `projektgesamtvolumen` varchar(45) DEFAULT NULL,
  `gwi_anteil` varchar(45) DEFAULT NULL,
  `gwi_ko_finanzierung` varchar(45) DEFAULT NULL,
  `projektpartner_industrie` varchar(45) DEFAULT NULL,
  `pbg` varchar(45) DEFAULT NULL,
  `pba` varchar(45) DEFAULT NULL,
  `projekttyp` int(11) DEFAULT NULL,
  `projektdauer` varchar(45) DEFAULT NULL,
  `projektstart` date DEFAULT NULL,
  `projektende` date DEFAULT NULL,
  `projekt_info` text,
  `link_zur_abschlussbericht` text,
  `link_zur_projekt_internetseite` text,
  `projektpartner_forschung` varchar(45) DEFAULT NULL,
  `letzte_aktualisierung` datetime DEFAULT NULL,
  `kontakt_technisch` varchar(250) DEFAULT NULL,
  `kontakt_kaufmanisch` varchar(250) DEFAULT NULL,
  `projektschöpfer` int(11) DEFAULT NULL,
  `projektkostenabrechnung` int(11) DEFAULT NULL,
  `vertreter` int(11) DEFAULT NULL,
  `interne_nummer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`projekt_id`),
  UNIQUE KEY `projekt_titel_UNIQUE` (`projekt_titel`),
  KEY `fk_projekt_typ_idx` (`projekttyp`),
  KEY `fk_projektschöpfer_idx_idx` (`projektschöpfer`),
  KEY `fk_projekt_leiter_id_ift_idx` (`projekt_leiter`),
  KEY `fk_vertreter_id_ift_idx` (`vertreter`),
  CONSTRAINT `fk_projekt_leiter_id_ift` FOREIGN KEY (`projekt_leiter`) REFERENCES `tbl_user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projekt_typ_ift` FOREIGN KEY (`projekttyp`) REFERENCES `tbl_projekt_typ` (`pk_projekt_typ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projektschöpfer_id_ift` FOREIGN KEY (`projektschöpfer`) REFERENCES `tbl_user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vertreter_id_ift` FOREIGN KEY (`vertreter`) REFERENCES `tbl_user` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ift`
--

LOCK TABLES `tbl_ift` WRITE;
/*!40000 ALTER TABLE `tbl_ift` DISABLE KEYS */;
INSERT INTO `tbl_ift` VALUES (1,'Entwicklung eines Kombi-Biobrenners zur Erzeugung industrieller Prozesswärme - Kombibrenner für flüssige und gasförmige Biobrennstoffe -','Bio brenner','B-142',NULL,'EE,Glas,E-Eff','2016-06-08','2016-08-05','Bewilligt','bemerkungen test','','798652','89613156','8654','32165487','Fraunhofer UMSICHT','Pbg test','PbA test',1,'dauer test','2017-05-04','2017-09-03','infodatei test','https://gwi-essen.de/','https://www.test-internet-seite.com','KIT,TUB','2017-09-14 15:27:08','test technisch','test kauf',1,NULL,NULL,'B145'),(2,'Untersuchung der Auswirkung von Wasserstoff-Zumischungen ins Erdgasnetz auf industrielle Feuerungsprozesse in thermoprozesstechnischen Anlagen','H2-Substitution','B-143',1,'EE,',NULL,'2014-04-15',NULL,'Zwischenbericht fertiggestellt am 24.02.16 Projekttreffen am 20.10.2016 abgehalten\r\n',NULL,'98651987','499350','249750','0','IAEW,','','',1,'01.12.2014 - 30.04.2017 (31.10.2016)','2014-12-01','2017-04-30','','','',NULL,'2017-07-27 13:45:10','','',1,NULL,NULL,NULL),(5,'Auswirkungen der Zumischung  erneuerbarer Energien im Erdgasnetz auf thermoprozesstechnische Anlagen in der keramischen Industrie','Er-Ker','B-144',1,'EE,Biogas,',NULL,'2014-05-09',NULL,'Zwischenbericht fertiggestellt am 24.02.16\r\n',NULL,'','498900','249440','','Gelsenwasser,','','',NULL,'01.04.2015- 31.03.2017','2015-04-01','2017-03-31','','','',NULL,'2017-07-27 13:56:26','','',1,NULL,NULL,NULL),(6,'Biogasbefeuerung in der Glasproduktion zur Optimierung des Energieeinsatzes und Reduzierung der Schadstoffemissionen -Umsetzung im industriellen Glasherstellungsprozess ','BG-G II','B-145',1,'EE,',NULL,'2014-09-15',NULL,'Zwischenbericht fertiggestellt am 24.02.16\r\n',NULL,'AiF 100%','478800','239780','',NULL,'','',NULL,'01.04.2015- 31.03.2017','2015-04-01','2017-03-31','','','',NULL,'2017-07-27 14:06:14','','',1,NULL,NULL,NULL),(7,'Biogaseigenkonditionierung mittels OCM als Alternative zu fossilen Liquified Petroleum Gas bei der Einspeisung von Biogas ins Erdgasnetz ','INTEBI Teilprojekt: BioEiKon (1. Phase)','B-147',1,'EE,',NULL,'2013-11-27',NULL,'Folgeantrag für \"Phase 2\" ist eingereicht. Begutachtungsergebnisse liegen noch nicht vollständig vor.',NULL,'AiF über DVGW 100 %','484800','75700','','Gelsenwasser,','','',1,'01.05.2015 - 31.01.2017','2015-05-01','2017-01-31','','','',NULL,'2017-07-27 14:18:07','','',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_ift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_projekt_typ`
--

DROP TABLE IF EXISTS `tbl_projekt_typ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_projekt_typ` (
  `pk_projekt_typ` int(11) NOT NULL AUTO_INCREMENT,
  `projekt_typ_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pk_projekt_typ`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_projekt_typ`
--

LOCK TABLES `tbl_projekt_typ` WRITE;
/*!40000 ALTER TABLE `tbl_projekt_typ` DISABLE KEYS */;
INSERT INTO `tbl_projekt_typ` VALUES (1,'F&E'),(2,'Industrie');
/*!40000 ALTER TABLE `tbl_projekt_typ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_ID` int(10) NOT NULL,
  `user_right_ID` int(10) NOT NULL,
  `user_type_ID` int(10) NOT NULL,
  PRIMARY KEY (`user_ID`),
  KEY `role_ID_idx` (`role_ID`),
  KEY `user_right_ID_idx` (`user_right_ID`),
  KEY `fk_user-type_idx` (`user_type_ID`),
  CONSTRAINT `fk_role_ID` FOREIGN KEY (`role_ID`) REFERENCES `tbl_user_roles` (`role_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user-type` FOREIGN KEY (`user_type_ID`) REFERENCES `tbl_user_type` (`user_type_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_right_ID` FOREIGN KEY (`user_right_ID`) REFERENCES `tbl_user_rights` (`user_right_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'Admin','2a0a090e55a5d223720bb194d776565e22d1c60fcc8fe4c0030c6296ea9f5b56f0fc7418913dc2c5a59ba7c5d44c751bb754055b609bd2dae956ecd3fc512ee5',5,2,3),(2,'Dr. Albus','597366337fda8f4f0667d843dbf99d3b07df723d91f04527cf2d66353b644298d5dfe39c8ef7caea00e5517f9c31ab4492bd9b1a80ec42155f9dc489bd810d9d',6,1,3),(3,'Dr. Al-Halbouni','24c68c166d39fcdf6e852ebd52f42e647308df8dc1e33fa6dd9f7f1e34913739146f2492e71cb33fcfeb984a89b8916c1b710806b750f3d0118675fcd1412d94',5,2,3),(4,'Yakovleva','37e1a6dc6abce25ef6bd7ce200b376dcaed5e692d62d015574d0ca866ed7f9d82e694a5ccd7b6b23263242189938c9aac630c79221d3eaedee852b13404a8728',5,2,3),(5,'Röder','986ded161fe954392556ef836035ac0266bb604dd7c57fad4b9c001ef9e46481f1f195835b7bcd5e3de9077eeea4169324a958b53de50944288a900b661720d4',3,2,2),(6,'Fiehl','4a5c04aeef238b391a8b549930cc280c324cd14529fb1f6a989a5b1c26498ab62793d700b65dd222f4abebec816cfcea0a008633d3600c829e62da977a8dd942',3,2,2),(7,'Dr. Nowakowski','487cb69efbe00000c03a6b0715a129b719fb215384ba12ff9aa82245bfbf28e4b0cd0441dec220a83c9556072be68e5fa3762ed8d362a7cf1be5ca7932a25f5e',3,2,2),(8,'Dr. Leicher','138a0c8e1b7456dbf6ff2b98a89808043b7d499d21674e95c260f1eec32e878ab1bb0ee0188cabd774419481959ad86c9ebd7729a11a12d69f871d686a8e536e',3,2,2),(9,'Islami','3b6025ec5c056101dd1559bc2137fc646b256c3eae2dbffdf2bd86f849c17ef75771575bf69fabad43815054841b3cf5d67f3d36a8669a72c220b9b293ce2606',4,1,2),(10,'Schneider','d0a2d065f0da503bf2a7921b027def5057ab412b06107dff1f38030d2c6b59b3cad06818fc89c53f107543886aa59451e07b31b12a6bc29538cccf8a90085f8c',4,1,2),(11,'Dr. Burmeister','d9319fbe2ff615e5692a563c26f4efc1e61dc7e1caab75a5f72a3afba4dc31c27f494de9a75a34d6665f9e6e9ec9cc26b18e06c9b4cc6ddd14e6d9bb9f68aea5',2,2,1),(12,'Tali','7f40b46c0f93fb3aaf17ecff600475af8abd8dbcb0ce0710336ead6e2bd10e991a8acc672a6bc7fb8a906ae34131335eb6da31bc7b9a6ebb4d70520907cbec31',3,2,1),(13,'Feldpausch-Jägers ','80e0fec3651831dcc87867486aaa2cf4aa027891f09163798033cd428ded9c74e7681516eeac2da391a6212421e0b0d93978f9ce4d70c4101398344906b73d40',3,2,1),(14,'Flayyih','bd2eb3f9f78ce1deb182ea52cefbda3e258177d146f6231050b1a616f17ab4c23448d1d9f520bb7dc8aa93810645e2180516a5fd9fc4bf9a1336b00737872db4',3,2,1),(15,'Benthin','05571b2f95afa2a6b0db1def478f21a06f6a6565d2bda9226d08177c7a94303a1ee5f817500a336a2bebd35b33349235ba16a6181311446e60c9009966dc5f7b',3,2,1),(16,'Dr. Lange','841ac85cf75417d5e31be66d1d63c9986c4bd0d41967fabb068415e503b6cfc127a286913f2ee657bfc783621d87d58f5659b4eadd619a3d2caefeeadeac2a91',3,2,1),(17,'Senner','79f6e501e1dab033350ba18cb2ab4a6723dce411ef2699d8cd60d90436919b90c2ca01d6fefde21baebd2b304c08ab63dc655112650d2063eedaa2df051679de',3,2,1),(18,'Imberg','c954a369a13f22837cbb77bb5e0d0a437b73ab73405a037983fd129ecf701171481a6b8b8adb13523462ad2117f5aad5b03d9e5c1f0b296f3d70864a8b59d0dc',3,2,1),(19,'Wortmann','5ee568a8ac3594f3350870ec7cae853a20abd1aee786da2aaa4b4dfe183b95fa81506eb9a20ced4f2a3c4464bdb88848456571d7b977f3ac7b5abbebf9bdc700',4,1,1),(20,'Heyer','3e810e8705df9015c2cb016d60ab38c94edcf0dafb46a8ec5aa0db53358b8c48d6fa45b6937b37dbeefd3f4b6c538c4e57ce013a09c9ccc20fcd1cfced06d5c6',4,1,1),(21,'Dr. Schaffert','fc001a031aa4701dea4eba4cb6fe3f09ad6d89c4c39295748fc760d7ef16368e9d26b2d1e829de347e38019ff95698255866d09c5c74a94ac9613d7321bbfcb5',3,2,1),(22,'Wenzel','2ff5493464bd807d01219b3ef0205a71b829de15d46405f6e1476da3f363bdfd96b3367f974f06e96e7378600c46535991ac444993ca3374c452e0ef38aea0e3',3,2,1),(23,'Lucke','40fa13cbec552e06fef222f2e00760e3c52752b39d098c9d5f33ff441ef6dac920a12e5fdf07ddd4504b12e33a77368c26bc85c3c5e02d0ff0df41aafaeeda21',3,2,1),(24,'Scholten','659846385c1527bfa5a2e78cc7220eb792c2459559fae334bcbb5bf93edd8a7075ff9c39d41e15e7c998a1e458e253a07076b21f7afaa4b99337ca9df3cabee6',3,2,1),(25,'Dr. Giese','2f0da0e02e82a84584ca44c838ca20a73b184f517ed773353c36858fb032eb45655a9925d5bdb95cb523ca51e419ac9f9c54a6f6ae598f7bd4c4ebf7d190387b',2,2,2),(26,'Botor','9f6bd8881818d22a3a4ff8f1fc11c5e9533841b6fd05af567f2d3734f817396eb904f9070497879cb268a749b427c1f7a35492723ec27545e52858687d4cdb4e',5,2,3);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_rights`
--

DROP TABLE IF EXISTS `tbl_user_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_rights` (
  `user_right_ID` int(11) NOT NULL AUTO_INCREMENT,
  `right_name` varchar(45) NOT NULL,
  PRIMARY KEY (`user_right_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_rights`
--

LOCK TABLES `tbl_user_rights` WRITE;
/*!40000 ALTER TABLE `tbl_user_rights` DISABLE KEYS */;
INSERT INTO `tbl_user_rights` VALUES (1,'Lesen'),(2,'Lesen & Schreiben');
/*!40000 ALTER TABLE `tbl_user_rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_roles`
--

DROP TABLE IF EXISTS `tbl_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_roles` (
  `role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` text,
  PRIMARY KEY (`role_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_roles`
--

LOCK TABLES `tbl_user_roles` WRITE;
/*!40000 ALTER TABLE `tbl_user_roles` DISABLE KEYS */;
INSERT INTO `tbl_user_roles` VALUES (2,'Abteilungsleiter'),(3,'Projektleiter'),(4,'Ingenieur'),(5,'F&E-Koordination'),(6,'Vorstand ');
/*!40000 ALTER TABLE `tbl_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_type`
--

DROP TABLE IF EXISTS `tbl_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_type` (
  `user_type_ID` int(10) NOT NULL,
  `user_type_name` varchar(15) NOT NULL,
  PRIMARY KEY (`user_type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_type`
--

LOCK TABLES `tbl_user_type` WRITE;
/*!40000 ALTER TABLE `tbl_user_type` DISABLE KEYS */;
INSERT INTO `tbl_user_type` VALUES (1,'BGT'),(2,'IFT'),(3,'BGT & IFT');
/*!40000 ALTER TABLE `tbl_user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-14 15:53:14
