CREATE DATABASE  IF NOT EXISTS `encuesta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `encuesta`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 52.179.175.88    Database: encuesta
-- ------------------------------------------------------
-- Server version	5.5.57-0+deb7u1

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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Administración en Hotelería y Turismo','2019-08-27 01:37:10','1'),(2,'Arquitectura','2019-08-27 01:37:10','1'),(3,'Artes Contemporáneas','2019-08-27 01:37:10','1'),(4,'Ciencias de la Salud','2019-08-27 01:37:10','1'),(5,'Ciencias Humanas','2019-08-27 01:37:10','1'),(6,'Comunicaciones','2019-08-27 01:37:10','1'),(7,'Derecho','2019-08-27 01:37:10','1'),(8,'Diseño','2019-08-27 01:37:10','1'),(9,'Economía','2019-08-27 01:37:10','1'),(10,'Educación','2019-08-27 01:37:10','1'),(11,'Ingeniería','2019-08-27 01:37:10','1'),(12,'Negocios','2019-08-27 01:37:10','1'),(13,'Psicología','2019-08-27 01:37:10','1');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `texto` varchar(250) DEFAULT NULL,
  `imagen` varchar(200) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,1,'Hotelería y Administración','Conviértete en un especialista en la elaboración y cumplimiento de estrategias de negocios aplicadas a la hotelería.','1.png','2019-08-27 02:04:53','1'),(2,1,'Turismo y Administración','Profesionales que diseñan proyectos turísticos rentables, ambientalmente sostenibles y de gran impacto social y cultural con una visión innovadora.','2.png','2019-08-27 02:05:36','1'),(3,1,'Gastronomía y Gestión Culinaria','Sé un clamado autor de la innovación culinaria. Vive tu pasión por la cocina a través de prestigiosos convenios internacionales, de la mano de Virgilio Martinez, uno de los mejores chefs del mundo.','3.png','2019-08-27 02:05:36','1'),(4,2,'Arquitectura','Toda tu creatividad y pasión para ser el arquitecto de un mundo asombroso.','4.png','2019-08-27 02:06:12','1'),(5,3,'Música','¡Atrévete a potenciar tu mejor talento y vive tu pasión!','5.png','2019-08-27 02:09:55','1'),(6,3,'Artes Escénicas','Prepárate para destacar en el mundo del teatro y la actuación.','6.png','2019-08-27 02:09:55','1'),(7,4,'Medicina','La profesión más noble y apasionante, enseñada como nunca antes.','7.png','2019-08-27 02:09:55','1'),(8,4,'Nutrición y Dietética','Vive de una carrera fascinante en el mundo, capaz de crear una cultura de salud preventiva en nuestro país.','8.png','2019-08-27 02:09:55','1'),(9,4,'Odontología','Tu vocación y talento, más toda la tecnología odontológica, para crear las más bellas sonrisas en las personas.','9.png','2019-08-27 02:09:55','1'),(10,4,'Terapia Física','Devuelve la salud y el bienestar a las personas con una profesión altamente demandada en el mundo y con múltiples campos de aplicación.','10.png','2019-08-27 02:09:55','1'),(11,4,'Medicina Veterinaria','Un programa diferente, integrado, apoyado sólidamente en tecnología y el uso de la simulación.','11.png','2019-08-27 02:09:55','1'),(12,5,'Traducción e Interpretación Profesional','Vive de tu pasión por los idiomas a través de un permanente intercambio de experiencias culturales.','12.png','2019-08-27 06:11:03','1'),(13,6,'Comunicación Audiovisual y Medios Interactivos','Asombra al mundo: lleva la comunicación a niveles inimaginables a través de los medios del futuro.','13.png','2019-08-27 06:11:04','1'),(14,6,'Comunicación e Imagen Empresarial','Imagen corporativa y relación sostenible con el entorno para los retos más apasionantes de las organizaciones de hoy.','14.png','2019-08-27 06:11:04','1'),(15,6,'Comunicación y Marketing','Marketing y comunicación para un nuevo consumidor, una carrera que retará toda tu creatividad y capacidad estratégica.','15.png','2019-08-27 06:11:04','1'),(16,6,'Comunicación y Periodismo','Toda tu audacia y pasión por la investigación para influir positivamente en tu entorno y transformarlo.','16.png','2019-08-27 06:11:04','1'),(17,6,'Comunicación y Publicidad','Creatividad al máximo para los grandes retos de las marcas en un nuevo entorno global y digital.','17.png','2019-08-27 06:11:04','1'),(18,6,'Comunicación y Fotografía','Prepárate para comunicar de manera estratégica, innovadora y única a través de imágenes de alta calidad e impacto.','18.png','2019-08-27 06:11:04','1'),(19,7,'Derecho','Sé un abogado que conoce el mundo, con capacidad para la gestión. Prepárate para resolver de forma innovadora los más apasionantes desafíos.','19.png','2019-08-27 06:19:22','1'),(20,7,'Relaciones Internacionales','Sé un profesional capaz de liderar las relaciones entre estados y otros actores del contexto internacional, promoviendo exitosamente las buenas prácticas internacionales.','20.png','2019-08-27 06:19:22','1'),(21,8,'Diseño Profesional de Interiores','Crea el espacio ideal en el que sueña vivir cada persona.','21.png','2019-08-27 06:19:22','1'),(22,8,'Diseño Profesional Gráfico','Toda tu creatividad y talento para ponerle tu sello a las marcas, productos e iniciativas que van a cambiar el mundo.','22.png','2019-08-27 06:19:22','1'),(23,8,'Diseño y Gestión en Moda','Pon a prueba tu creatividad, conviértete en un referente de la moda y asombra al mundo con tu talento.','23.png','2019-08-27 06:19:22','1'),(24,9,'Economía y Finanzas','Carrera con una visión financiera global para formar a líderes competentes que aspiran a lo más alto.','24.png','2019-08-27 06:19:22','1'),(25,9,'Economía y Negocios Internacionales','La única carrera que combina la pasión por la economía y los negocios internacionales, para que puedas destacar en el mercado local y extranjero.','25.png','2019-08-27 06:19:22','1'),(26,9,'Economía Gerencial','Economía con una visión global e innovadora para alcanzar el liderazgo de las mas grandes corporaciones y organizaciones.','26.png','2019-08-27 06:19:22','1'),(27,9,'Ciencias Políticas','Sé un profesional experto en el análisis de procesos políticos, sociales y económicos de la realidad nacional e internacional, capaz de liderar procesos que transformen el país.','27.png','2019-08-27 06:19:22','1'),(28,10,'Educación y Gestión del Aprendizaje','Vive tu vocación con la formación universitaria más innovadora y las últimas tendencias en el aprendizaje y la pedagogía.','28.png','2019-08-27 06:19:22','1'),(29,11,'Ciencias de la Computación','Vive tu pasión por la creación de nuevos mundos digitales y sé el artífice de una nueva realidad.','29.png','2019-08-27 06:19:22','1'),(30,11,'Ingeniería Civil','Deja tu huella en el mundo y construye un entorno soñado a través de una carrera hecha para este gran momento.','30.png','2019-08-27 06:19:22','1'),(31,11,'Ingeniería de Gestión Empresarial','Ingeniería y gestión para gerenciar la innovación en las organizaciones.','31.png','2019-08-27 06:19:22','1'),(32,11,'Ingeniería de Gestión Minera','Vive de una profesión soñada que te llevará a gerenciar el desarrollo sostenible de todo un país.','32.png','2019-08-27 06:19:22','1'),(33,11,'Ingeniería de Sistemas de Información','El poder de la información digital de las organizaciones en tus manos.','33.png','2019-08-27 06:19:22','1'),(34,11,'Ingeniería de Software','Sé un ingeniero creativo que transforma el mundo con soluciones de software y aplicaciones revolucionarias.','34.png','2019-08-27 06:19:22','1'),(35,11,'Ingeniería Electrónica','Conviértete en el creador de las tecnologías más asombrosas del futuro.','35.png','2019-08-27 06:19:22','1'),(36,11,'Ingeniería Industrial','Sé el gerente estratégico de las operaciones y los procesos clave de las organizaciones del futuro.','36.png','2019-08-27 06:19:22','1'),(37,11,'Ingeniería Mecatrónica','Atrévete a cambiar el mundo, la sociedad y la calidad de vida de las personas con los proyectos de ingeniería más asombrosos.','37.png','2019-08-27 06:19:22','1'),(38,11,'Ingeniería Ambiental','Haz posible un mundo sostenible para las futuras generaciones.','38.png','2019-08-27 06:19:22','1'),(39,12,'Administración y Agronegocios','Transforma la forma de crear, comercializar y exportar productos a través del apasionante mundo de la agroindustria internacional.','39.png','2019-08-27 06:21:35','1'),(40,12,'Administración y Finanzas','Conviértete en un exitoso gerente de las finanzas corporativas internacionales.','40.png','2019-08-27 06:21:35','1'),(41,12,'Administración y Marketing','Elabora estrategias de marketing global y digital para las grandes oportunidades de negocio en una apasionante carrera.','41.png','2019-08-27 06:21:35','1'),(42,12,'Administración y Negocios del Deporte','Convierte tu pasión por el deporte en una profesión de alcance internacional.','42.png','2019-08-27 06:21:35','1'),(43,12,'Administración y Negocios Internacionales','Sé un gerente del mundo, trabaja en grandes empresas transnacionales o desempéñate como un exitoso empresario de los negocios internacionales.','43.png','2019-08-27 06:21:35','1'),(44,12,'Administración y Recursos Humanos','En tus manos, la gestión del más valioso capital de todas las organizaciones: el talento humano.','44.png','2019-08-27 06:21:35','1'),(45,12,'Contabilidad y Administración','Conoce una contabilidad estratégica y gerencial para grandes retos corporativos y mundiales.','45.png','2019-08-27 06:21:35','1'),(46,12,'Administración y Gerencia del Emprendimiento','Desarrolla iniciativas empresariales y negocios propios para ser exitosos haciendo lo que más te gusta.','46.png','2019-08-27 06:21:35','1'),(47,13,'Psicología','Explota tu talento para conocer a las personas y sé capaz de transformar y mejorar vidas, sociedades y organizaciones.','47.png','2019-08-27 06:22:01','1');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-28  0:06:50
