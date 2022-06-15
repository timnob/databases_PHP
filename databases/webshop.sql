/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `accounts` (`id`, `username`, `password`) VALUES (1,'Tim','123'),(2,'Quinten','123');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` float(6,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total_price` double(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `display_order` int DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `product_images` (`id`, `product_id`, `img`, `display_order`, `is_featured`) VALUES (1,1,'whey.png',1,1),(5,2,'creatine.png',1,1),(7,3,'buffel.png',1,1);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `full_description` text,
  `price` double(4,2) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `products` (`id`, `product_name`, `product_slug`, `short_description`, `full_description`, `price`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES (1,'Whey Proteine','whey-proteine','','\r\nWhey Protein is bedoeld voor de Groei-Maten die het maximale uit hun trainingen willen halen en meerdere malen per dag een shake nemen om optimaal te kunnen groeien! Voor het opbouwen van spiermassa is het raadzaam om iedere dag minimaal 2,3 gram eiwit per kilo lichaamsgewicht tot je te nemen. Naast het opbouwen van spiermassa, zorgen de eiwitten voor herstel van spierweefsel.\r\n\r\nWhey Protein bestaat uit de meest zuivere kwaliteit whey proteïne isolaat, ultra gefiltreerd whey proteïne concentraat en het exclusieve whey eiwit hydrolisaat (di- en tri peptides).\r\n\r\nSamenstelling Whey Protein per 30 gram\r\n– 24 gram eiwit\r\n– 5160 mg Glutamine\r\n– 6600 mg BCAA (Branched Chain Amino Acids)\r\n– 13650 mg Essentiële aminozuren per dosering.\r\n– Aspartaam en cyclamaat vrij\r\n\r\nVoordelen Whey Protein\r\nMade in Holland\r\nZuiverste Whey Proteïne\r\nNatuurlijke eiwitbron\r\nRomig en vol van smaak\r\nLost goed op in water, melk, vruchtensap',8.00,0,1,'2021-02-11 22:02:17','2021-02-11 22:02:21'),(2,'Creatine Pot','creatine-pot','','Creatine verbetert de prestaties bij explosieve krachtsinspanningen en is daarom het meest gebruikte product onder (kracht)sporters die zware korte krachtsinspanningen doen zoals bankdrukken. Deze effecten worden bereikt bij een dagelijkse inname van 3 gram Creatine.',5.00,0,1,'2021-02-11 22:02:50','2021-02-11 22:02:53'),(3,'Buffel Breakfast','buffel-breakfast','','Voor de echte buffel met trek die geen zin heeft om eten te maken. Even snel een shake en grazen maar. Deze bevat maar liefst 60% eiwit, 30% Havermout en is verrijkt met vitaminen & mineralen zodat jij de hele dag kan buffelen.\r\n\r\nDe Havermout is ultra-fine en zorgt ervoor dat je geen vlokken in je shake hebt. Je bereidt de shake net als een normale eiwit shake. Het voordeel van havermout is dat deze langzaam energie afgeeft zodat je meerdere uren kan grazen.\r\n\r\nOok is Buffel Breakfast perfect om andere gerechten te maken zoals proteïne pannenkoeken. Maar let dan wel op! Een buffeltje schiet nog wel eens uit met de stroop!\r\n\r\nBuffel Breakfast gebruik voor een goed ontbijt:\r\n– 2 Scoops Buffel Breakfast (60gr)\r\n– 200ml Water of Melk\r\n\r\n60% eiwit\r\n30% Havermout\r\nMet vitaminen & mineralen',10.00,0,1,'2021-02-11 22:03:21','2021-02-11 22:03:24');
