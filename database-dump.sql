-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: master
-- ------------------------------------------------------
-- Server version	5.5.58-0ubuntu0.14.04.1

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
-- Table structure for table `CART`
--

DROP TABLE IF EXISTS `CART`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CART` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CART`
--

LOCK TABLES `CART` WRITE;
/*!40000 ALTER TABLE `CART` DISABLE KEYS */;
/*!40000 ALTER TABLE `CART` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCTS`
--

DROP TABLE IF EXISTS `PRODUCTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCTS` (
  `id_product` int(11) NOT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `productDescription` varchar(1000) DEFAULT NULL,
  `price` varchar(32) DEFAULT NULL,
  `stock` varchar(14) DEFAULT NULL,
  `ingredients` varchar(200) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `conditions` varchar(100) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTS`
--

LOCK TABLES `PRODUCTS` WRITE;
/*!40000 ALTER TABLE `PRODUCTS` DISABLE KEYS */;
INSERT INTO `PRODUCTS` VALUES (1,'Absolut de Iasomnie','Notele florale ale iasomiei aduc aminte de florile de crin ori liliac, cu aroma mai cruda si mai putin greoaie. Mirosul extractului din iasomie de sambac este mai fin si mai dulce decat cel extras din iasomia grandiflorum. Parfumantul se poate include si in compozitii cosmetice, innobileaza si confera o nota eleganta cremelor, uleiurilor sau lotiunilor. Absolutul de iasomie este recomandat pentru formularea parfumurilor feminine florale.','59,20 LEI','5','jasminum sambac flower extract','2 ml','recipientul se va pastra ferit de lumina directa, la temperaturi preferabil sub 25C, inchis etans','img/product1.jpg'),(2,'Absolut de Trandafir de Damasc','O esenta fermecatoare, distincta si rafinata, cu un parfum unic, indispensabila in parfumerie. Un parfum floral de exceptie, pretios si captivant! Trandafirul, si cu atat mai mult extractul din trandafiri simbolizeaza esenaa feminitatii, iubirea si armonia. Utilizare in parfumerie: absolutul de trandafiri este o materie prima des regasita in parfumurile celebre.','42,30 LEI','8','rosa damascena flower extract','2 ml',' inchis etans, in loc uscat si racoros, ferit de lumina','img/product2.jpg'),(3,'Brad balsamic ulei esential','Extras din ramurile unei specii de brad originar in Canada, uleiul esential de brad balsamic este foarte apreciat datorita parfumului sau agreabil, proaspat, ce miroase ca bradul de Craciun. Alaturi de beneficiile olfactive, acest ulei esential este folosit si pentru ameliorarea unor afectiuni ale cailor respiratorii, atenuarea durerilor reumatismale, a crampelor si a contractiilor musculare.','10,70 LEI','9',' abies balsamea oil','10 ml',' inchis etans, in loc uscat si racoros, ferit de lumina','img/product3.jpg'),(4,'Grapefruit, ulei esential pur','Grapefruitul este nativ in Asia si Indiile de Vest, cultivat in special in Statele Unite, America de sud, Brazilia si Israel. Copacul de aproximativ 10 metri are frunze lucioase, flori albe si fructe mari, de la galben pal pana la roz in functie de soi. Fructele sunt asezate in forma de ciorchine, din englezescul, grape, derivandu-i astfel numele. Glandele uleioase se regasesc in coaja proaspata a fructului, din care se preseaza uleiul esential. Proprietati: decongestionant cutanat, astringent, drenant, lipolitic, fortifiant capilar, pozitivant, relaxant.','9,70 LEI','6','citrus paradisi peel oil','10 ml',' inchis etans, in loc uscat si racoros, ferit de lumina','img/product4.jpg'),(5,'Lavanda, ulei esential pur','Din maruntele flori mov-albastrui care ne incanta prin parfumul lor se extrage uleiul esential poate cel mai raspandit si utilizat in intreaga lume. Calitatile sale aromatice au fost descoperite cu mult timp in urma, si sunt si azi valorificate in domeniul terapeutic, cosmetic si in parfumerie. Uleiul esential de lavanda veritabila este un produs de exceptie, superior calitativ uleiurilor extrase din alte soiuri sau hibrizi de lavanda si are un continut ridicat de principii active pe care le putem valorifica in felurite moduri. Proprietatile uleiului de lavanda: regenerator celular si reparator cutanat, cicatrizant, ajuta la refacerea pielii ranite.','11,30 LEI','5','lavandula angustifolia oil','10 ml',' inchis etans, in loc uscat si racoros, ferit de lumina','img/product5.jpg'),(6,'Portocala dulce BIO* ulei esential','Mirosul uleiului esential de portocala dulce aduce seninatate si buna dispozitie in casa, ajuta la relaxare, induce un somn linistit inclusiv pentru copii. Se poate folosi pentru parfumarea produselor de igiena corporala, pentru parfumarea incaperilor si este de nelipsit in perioada sarbatorilor de iarna pentru a crea o atmosfera veritabila de Craciun. Proprietatile uleiului de portocale: reconfortant, optimizant, echilibrant al sistemului nervos, detensionant, relaxant, favorizeaza somnul, inclusiv la copiii mici, usor tonic cutanat, antiseptic aerian lejer, parfumant fructat, foarte placut.','6,70 LEI','7','citrus aurantium dulcis peel oil*, *toate ingredientele provin din agricultura organica','10 ml',' inchis etans, in loc uscat si racoros, ferit de lumina','img/product6.jpg');
/*!40000 ALTER TABLE `PRODUCTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RECORDS`
--

DROP TABLE IF EXISTS `RECORDS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RECORDS` (
  `id_record` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RECORDS`
--

LOCK TABLES `RECORDS` WRITE;
/*!40000 ALTER TABLE `RECORDS` DISABLE KEYS */;
/*!40000 ALTER TABLE `RECORDS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USERS`
--

DROP TABLE IF EXISTS `USERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USERS` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) DEFAULT NULL,
  `lastName` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USERS`
--

LOCK TABLES `USERS` WRITE;
/*!40000 ALTER TABLE `USERS` DISABLE KEYS */;
INSERT INTO `USERS` VALUES (1,'Simona','Bacanu','simona.bacanu93@gmail.com','parola','Str. Romana','0746060898'),(2,'b','b','b','b','b','b');
/*!40000 ALTER TABLE `USERS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-22 21:06:48
