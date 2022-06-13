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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `qty`, `total_price`) VALUES (1,3,1,'Black T-shirt',10.00,1,9.50),(2,3,3,'Maroon T-shirt',10.00,5,47.50),(3,3,4,'Orange T-shirt',10.00,6,57.00),(4,4,1,'Black T-shirt',9.50,1,9.50),(5,5,1,'Black T-shirt',9.50,5,47.50),(6,5,2,'Blue T-shirt',9.50,2,19.00),(7,5,3,'Maroon T-shirt',9.50,3,28.50);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `total_price` float(6,2) NOT NULL DEFAULT '0.00',
  `order_status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `address`, `address2`, `country`, `state`, `zipcode`, `total_price`, `order_status`, `created_at`, `updated_at`) VALUES (4,'ff','ff','you@example.com','f','f','United States','California','111',9.50,'confirmed','2022-06-12 22:23:21','2022-06-12 22:23:21'),(5,'t','t','you@ex.jg','ff','ff','United States','California','ff',95.00,'confirmed','2022-06-12 23:04:21','2022-06-12 23:04:21');
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
INSERT INTO `product_images` (`id`, `product_id`, `img`, `display_order`, `is_featured`) VALUES (1,1,'black-tshirt-1.jpg',1,1),(2,1,'black-tshirt-2.jpg',2,0),(3,1,'black-tshirt-3.jpg',3,0),(4,1,'black-tshirt-4.jpg',4,0),(5,2,'blue-tshirt-1.jpg',1,1),(6,2,'blue-tshirt-2.jpg',2,0),(7,3,'maroon-tshirt.jpg',1,1),(8,4,'orange-tshirt-1.jpg',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `products` (`id`, `product_name`, `product_slug`, `short_description`, `full_description`, `price`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES (1,'Black T-shirt','black-tshirt','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.',9.50,0,1,'2021-02-11 22:02:17','2021-02-11 22:02:21'),(2,'Blue T-shirt','blue-tshirt','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.',9.50,0,1,'2021-02-11 22:02:50','2021-02-11 22:02:53'),(3,'Maroon T-shirt','maroon-tshirt','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.',9.50,0,1,'2021-02-11 22:03:21','2021-02-11 22:03:24'),(4,'Orange T-shirt','orange-tshirt','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.','Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.',9.50,0,1,'2021-02-11 22:03:50','2021-02-11 22:03:53');
