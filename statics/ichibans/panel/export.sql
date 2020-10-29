DROP TABLE IF EXISTS `banners`;
#
#
CREATE TABLE `banners` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `fichero` varchar(150) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `dimensiones` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners` VALUES ("1", "2012-05-17 12:15:37", "2013-10-07 02:12:28", NULL, "1", "logo", "Ichiban Systems", "ban_1337274934.jpg", "/", "311x147", "1");
#
#
INSERT INTO `banners` VALUES ("3", "2012-05-29 23:54:32", "2012-05-29 23:54:32", NULL, "1", "header_telefono", NULL, "ban_1338353670.jpg", NULL, NULL, "1");
#
#
DROP TABLE IF EXISTS `banners2_fotos`;
#
#
CREATE TABLE `banners2_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(20) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners2_fotos` VALUES ("1", "2012-05-03 20:20:49", "2012-05-17 11:35:49", NULL, "0", NULL, "MANTENIMIENTOS", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("2", "2012-05-03 20:20:56", "2012-05-04 09:57:24", NULL, "0", NULL, "Servicio Técnico", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("3", "2012-05-03 20:21:03", "2012-05-17 11:31:07", NULL, "0", NULL, "LOGISTICA", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("4", "2012-05-17 11:36:08", "2012-06-10 00:34:04", NULL, "1", NULL, "Mantenimiento de carretillas Hidráulicas Nextel: 51*631*8984", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("5", "2012-05-17 11:36:17", "2012-06-10 00:36:35", NULL, "1", NULL, "Mantenimiento de Puertas Seccionales Nextel: 51*631*8984", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("6", "2012-05-17 11:36:25", "2012-06-10 00:35:17", NULL, "1", NULL, "Venta de Carretillas Hidráulicas Nextel: 51*631*8984", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("7", "2012-05-17 11:36:33", "0000-00-00 00:00:00", NULL, "1", NULL, "Stock de Repuestos para  Carretillas Hidráulicas", "1");
#
#
INSERT INTO `banners2_fotos` VALUES ("8", "2012-05-17 11:36:41", "0000-00-00 00:00:00", NULL, "1", NULL, "Mantenimientos a puertas", "1");
#
#
DROP TABLE IF EXISTS `banners2_fotos_fotos`;
#
#
CREATE TABLE `banners2_fotos_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `url` varchar(160) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("24", "2012-05-17 11:36:57", "2012-05-17 11:37:11", NULL, "1", "4", "banfot2_1337272616_421x236.jpg", "Mantenimiento de carretillas Hidráulicas ", NULL, "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("25", "2012-05-17 11:38:10", "0000-00-00 00:00:00", NULL, "1", "5", "banfot2_1337272690_417x253.jpg", "Mantenimiento de Puertas Seccionales ", NULL, "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("16", "2012-05-04 09:58:59", "2012-05-04 10:17:45", NULL, "1", "2", "banfot2_1336143539_473x293.jpg", NULL, "http://mecatronicsystems.com/textos_items/2/servicio-tecnico", "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("15", "2012-05-04 09:57:55", "2012-05-04 10:17:40", NULL, "1", "2", "banfot2_1336143474_436x327.jpg", NULL, "http://mecatronicsystems.com/textos_items/2/servicio-tecnico", "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("18", "2012-05-04 10:17:07", "2012-05-04 10:17:18", NULL, "1", "3", "banfot2_1336144625_400x267.jpg", NULL, "http://mecatronicsystems.com/textos_items/3/logistica", "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("17", "2012-05-04 10:00:54", "2012-05-04 10:01:21", NULL, "1", "3", "banfot2_1336143653_474x280.jpg", NULL, "http://mecatronicsystems.com/textos_items/3/logistica", "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("28", "2012-05-17 11:47:34", "0000-00-00 00:00:00", NULL, "1", "8", "banfot2_1337273253_280x380.jpg", "Mantenimientos a puertas", NULL, "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("27", "2012-05-17 11:43:06", "0000-00-00 00:00:00", NULL, "1", "7", "banfot2_1337272986_441x315.jpg", "Stock de Repuestos para Carretillas Hidráulicas", NULL, "1");
#
#
INSERT INTO `banners2_fotos_fotos` VALUES ("26", "2012-05-17 11:38:32", "2012-05-17 11:38:39", NULL, "1", "6", "banfot2_1337272712_421x236.jpg", "Mantenimientos a Carretillas Hidráulicas", NULL, "1");
#
#
DROP TABLE IF EXISTS `banners_fotos`;
#
#
CREATE TABLE `banners_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners_fotos` VALUES ("2", "2012-05-29 22:20:57", "0000-00-00 00:00:00", NULL, "1", "banner", "1");
#
#
INSERT INTO `banners_fotos` VALUES ("3", "2014-09-19 04:31:39", "0000-00-00 00:00:00", NULL, "1", "marcas", "1");
#
#
INSERT INTO `banners_fotos` VALUES ("4", "2014-09-19 04:31:39", "0000-00-00 00:00:00", NULL, "1", "clientes", "1");
#
#
DROP TABLE IF EXISTS `banners_fotos_fotos`;
#
#
CREATE TABLE `banners_fotos_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("6", "2012-05-04 10:38:08", "2012-05-04 10:38:32", NULL, "1", "1", "banfot_1336145880_1200x777.jpg", "Ingeniería Industrial", NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("5", "2012-05-17 11:53:33", "2013-10-06 23:50:54", NULL, "1", "1", "banfot_1337273613_200x150.jpg", "Servicio las 24 horas NEXTEL: 51*631*8984  /  41*157*8435", NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("11", "2012-05-29 23:33:19", "0000-00-00 00:00:00", NULL, "1", "2", "banfot_1338352398_708x250.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("10", "2012-05-29 23:31:00", "0000-00-00 00:00:00", NULL, "1", "2", "banfot_1338352260_708x250.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("12", "2012-06-10 18:10:40", "2012-06-10 18:10:39", NULL, "1", "2", "banfot_1339369839_708x250.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("13", "2012-06-10 18:09:53", "2012-06-10 18:09:53", NULL, "1", "2", "banfot_1339369793_708x250.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("14", "2014-09-21 15:26:06", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331166_268x64.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("15", "2014-09-21 15:26:18", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331178_280x129.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("16", "2014-09-21 15:26:28", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331188_350x118.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("17", "2014-09-21 15:26:39", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331199_400x302.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("18", "2014-09-21 15:26:52", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331212_527x153.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("19", "2014-09-21 15:27:12", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331232_332x169.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("20", "2014-09-21 15:27:23", "0000-00-00 00:00:00", NULL, "1", "4", "banfot_1411331243_1027x165.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("31", "2014-09-21 15:40:03", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411332000_400x302.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("28", "2014-09-21 15:39:20", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411331960_268x64.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("29", "2014-09-21 15:39:36", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411331976_280x129.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("30", "2014-09-21 15:39:50", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411331990_350x118.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("32", "2014-09-21 15:40:12", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411332012_527x153.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("33", "2014-09-21 15:40:24", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411332024_332x169.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("34", "2014-09-21 15:40:37", "0000-00-00 00:00:00", NULL, "1", "3", "banfot_1411332037_1027x165.jpg", NULL, NULL, "1");
#
#
DROP TABLE IF EXISTS `blog_actividades`;
#
#
CREATE TABLE `blog_actividades` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `blog_fotos`;
#
#
CREATE TABLE `blog_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `blog_fotos_fotos`;
#
#
CREATE TABLE `blog_fotos_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `blog_noticias`;
#
#
CREATE TABLE `blog_noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `blog_videos`;
#
#
CREATE TABLE `blog_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `blog_videos` VALUES ("1", "2012-05-03 18:45:48", "0000-00-00 00:00:00", NULL, "1", "2012-02-12 00:00:00", "Vehiculos Incapower", "1");
#
#
DROP TABLE IF EXISTS `blog_videos_videos`;
#
#
CREATE TABLE `blog_videos_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `codigo` varchar(150) DEFAULT NULL,
  `texto` longtext,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `blog_videos_videos` VALUES ("1", "2012-05-03 18:47:40", "0000-00-00 00:00:00", NULL, "1", "1", "PANEL INCA POWER", "cqHykmVQcXM", NULL, "1");
#
#
INSERT INTO `blog_videos_videos` VALUES ("2", "2012-05-03 18:48:36", "0000-00-00 00:00:00", NULL, "1", "1", "Spot Inca Power", "C_kvjbDbRPs", NULL, "1");
#
#
INSERT INTO `blog_videos_videos` VALUES ("3", "2012-05-03 18:49:35", "0000-00-00 00:00:00", NULL, "1", "1", "Vehículos BAW, FORLAND Y GONOW", "RG0avybuSPc", NULL, "1");
#
#
DROP TABLE IF EXISTS `boletines`;
#
#
CREATE TABLE `boletines` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `campains`;
#
#
CREATE TABLE `campains` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `asunto` varchar(250) DEFAULT NULL,
  `fronname` varchar(80) DEFAULT NULL,
  `replayto` varchar(80) DEFAULT NULL,
  `enviar_texto` varchar(80) DEFAULT NULL,
  `enviar_firma` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `file` varchar(150) DEFAULT NULL,
  `publicado` varchar(80) DEFAULT NULL,
  `n_solicitados` float DEFAULT NULL,
  `n_enviados` float DEFAULT NULL,
  `n_leidos` float DEFAULT NULL,
  `n_linkeados` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `campains_fotos`;
#
#
CREATE TABLE `campains_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `bloque` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `clientes`;
#
#
CREATE TABLE `clientes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `genero` varchar(80) DEFAULT NULL,
  `id_status` int(10) DEFAULT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `telefono_oficina` varchar(80) DEFAULT NULL,
  `celular_claro` varchar(80) DEFAULT NULL,
  `celular_movistar` varchar(80) DEFAULT NULL,
  `nextel` varchar(80) DEFAULT NULL,
  `rpm` varchar(80) DEFAULT NULL,
  `rpc` varchar(80) DEFAULT NULL,
  `empresa` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `clientes_status`;
#
#
CREATE TABLE `clientes_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `configuraciones`;
#
#
CREATE TABLE `configuraciones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `variable` varchar(80) DEFAULT NULL,
  `valor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `configuraciones` VALUES ("1", "2012-05-03 11:50:11", "0000-00-00 00:00:00", NULL, "1", "0", "direccion_email", NULL);
#
#
INSERT INTO `configuraciones` VALUES ("2", "2012-05-03 11:50:11", "2013-10-07 00:07:04", NULL, "1", "0", "emails_admin", "info@Ichibansystems.com");
#
#
INSERT INTO `configuraciones` VALUES ("3", "2012-05-03 11:50:11", "2012-05-03 11:55:05", NULL, "1", "0", "telefonos_email", "(511) 2618859");
#
#
INSERT INTO `configuraciones` VALUES ("4", "2012-05-03 11:50:11", "2013-10-07 00:06:00", NULL, "1", "0", "direccion_publica", "av");
#
#
INSERT INTO `configuraciones` VALUES ("5", "2012-05-03 11:50:11", "2012-05-11 18:31:55", NULL, "1", "0", "emails_publicos", "info@Ichibansystems.com");
#
#
INSERT INTO `configuraciones` VALUES ("6", "2012-05-03 11:50:11", "2013-10-07 00:06:26", NULL, "1", "0", "telefonos_publicos", NULL);
#
#
DROP TABLE IF EXISTS `configuraciones_root`;
#
#
CREATE TABLE `configuraciones_root` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `variable` varchar(80) DEFAULT NULL,
  `valor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `configuraciones_root` VALUES ("1", "2012-05-03 11:50:08", "2012-05-11 18:31:42", NULL, "1", "0", "titulo_web", "Ichiban Systems");
#
#
INSERT INTO `configuraciones_root` VALUES ("2", "2012-05-03 11:50:08", "2013-10-07 00:25:44", NULL, "1", "0", "nombre_empresa", "Ichiban Systems");
#
#
INSERT INTO `configuraciones_root` VALUES ("3", "2012-05-03 11:50:08", "2012-05-03 11:56:22", NULL, "1", "0", "simbolo_moneda", "S/.");
#
#
INSERT INTO `configuraciones_root` VALUES ("4", "2012-05-03 11:50:08", "2013-10-07 00:07:56", NULL, "1", "0", "email_from", "info@Ichibansystems.com");
#
#
INSERT INTO `configuraciones_root` VALUES ("5", "2012-05-03 11:50:08", "2012-05-30 23:01:39", NULL, "1", "0", "email_fromname", "Ichiban Systems");
#
#
INSERT INTO `configuraciones_root` VALUES ("6", "2012-05-03 11:50:08", "2012-05-03 12:02:34", NULL, "1", "0", "email_logo", "particular/header/logo.jpg");
#
#
INSERT INTO `configuraciones_root` VALUES ("7", "2012-05-03 11:50:08", "2013-10-07 00:08:06", NULL, "1", "0", "emails_admin", "wtavara@prodiserv.com");
#
#
INSERT INTO `configuraciones_root` VALUES ("8", "2012-05-03 11:50:08", "2012-05-11 18:31:24", NULL, "1", "0", "titulo_home", "Ichiban Systems");
#
#
DROP TABLE IF EXISTS `contacto`;
#
#
CREATE TABLE `contacto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `empresa` varchar(80) DEFAULT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `comentario` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `contacto` VALUES ("1", "2012-05-04 10:54:43", "2012-05-04 10:54:43", NULL, "1", "2012-05-04 10:54:43", "walter tavara", "PRODISERV", "lima", "peru", "998920047", "wtavara@hotmail.com", "VEAMOS VEAMOS SI FUNCIONA");
#
#
INSERT INTO `contacto` VALUES ("2", "2014-02-05 06:43:25", "2014-02-05 06:43:25", NULL, "1", "2014-02-05 06:43:25", "eder aspillaga", "", "chachapoyas", "peru", "", "eder_aspillaga@outlook.com", "COTIZACIÓN DE PROYECTOR MARCA BENQ MODELO ::MP512:: Y EL MODELO ::MS517:: ");
#
#
INSERT INTO `contacto` VALUES ("3", "2014-04-01 13:31:08", "2014-04-01 13:31:08", NULL, "1", "2014-04-01 13:31:08", "yumiko", "la granosa", "Lima-Lima", "peru", "555555555", "yumiki@hotmail.com", "a donde llega esta mail===?????");
#
#
INSERT INTO `contacto` VALUES ("4", "2014-04-01 13:49:31", "2014-04-01 13:49:31", NULL, "1", "2014-04-01 13:49:31", "Fiorella Higa", "", "", "", "", "fiori85_6@hotmail.com", "prueba");
#
#
DROP TABLE IF EXISTS `contacto_canales`;
#
#
CREATE TABLE `contacto_canales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `cuentas`;
#
#
CREATE TABLE `cuentas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `usuario` varchar(80) DEFAULT NULL,
  `ordenprove` float DEFAULT NULL,
  `proveedor` varchar(80) DEFAULT NULL,
  `clave` varchar(80) DEFAULT NULL,
  `relays` float DEFAULT NULL,
  `enabled` varchar(80) DEFAULT NULL,
  `time_0` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `emails_grupos`;
#
#
CREATE TABLE `emails_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `emails_items`;
#
#
CREATE TABLE `emails_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_grupo` int(10) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `enabled` varchar(80) DEFAULT NULL,
  `tipo_disabled` varchar(80) DEFAULT NULL,
  `comprobado` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `enlaces_items`;
#
#
CREATE TABLE `enlaces_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `enlaces_items` VALUES ("1", "2012-05-03 22:20:54", "0000-00-00 00:00:00", NULL, "1", "RPP Noticias", "http://www.rpp.com.pe/", "<p>Cadena radial, la más importante del país y que ahora también ofrece sus contenidos vía cable tv.</p>\n<p> </p>", "0");
#
#
INSERT INTO `enlaces_items` VALUES ("2", "2012-05-03 22:23:07", "2012-05-03 22:28:07", NULL, "1", "El Comercio", "http://www.elcomercio.pe/", "<p>Periódico que ha sido testigo de una gran \nparte de la vida republicana del país, y que informa de todo lo que \nsucede en el Perú y en el mundo.</p>\n<p> </p>", "0");
#
#
INSERT INTO `enlaces_items` VALUES ("3", "2012-05-03 22:27:26", "2012-05-03 22:28:24", NULL, "1", "Marca Perú", "http://www.peru.info/", "<p>Sitio web dedicado a dar a conocer y difundir lo que es el Perú y lo que ofrece al mundo.</p>\n<p> </p>", "0");
#
#
INSERT INTO `enlaces_items` VALUES ("4", "2012-05-03 22:27:44", "2012-05-03 22:28:39", NULL, "1", "La Mula", "http://www.lamula.pe/", "<p>Portal donde encontrará blogs, columnas de \nopinión y artículos de diferentes personalidades reconocidas en el medio\n y que escriben sobre diversos temas de actualidad en el Perú y en el \nmundo.</p>\n<p> </p>", "0");
#
#
DROP TABLE IF EXISTS `envios_cuentas`;
#
#
CREATE TABLE `envios_cuentas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `server` varchar(80) DEFAULT NULL,
  `port` varchar(80) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `dominio` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `geo_departamentos`;
#
#
CREATE TABLE `geo_departamentos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `geo_distritos`;
#
#
CREATE TABLE `geo_distritos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_provincia` int(10) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `geo_provincias`;
#
#
CREATE TABLE `geo_provincias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `id_departamento` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `lista_envio`;
#
#
CREATE TABLE `lista_envio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_grupo` int(10) DEFAULT NULL,
  `id_email` int(10) DEFAULT NULL,
  `enviado` varchar(80) DEFAULT NULL,
  `leido` float DEFAULT NULL,
  `fallido` float DEFAULT NULL,
  `linkeado` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `menus`;
#
#
CREATE TABLE `menus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `menus` VALUES ("1", "2012-04-29 13:57:05", "0000-00-00 00:00:00", NULL, "1", "main", "1");
#
#
DROP TABLE IF EXISTS `menus_items`;
#
#
CREATE TABLE `menus_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `menus_items` VALUES ("1", "2012-04-29 13:57:23", "2012-05-01 12:22:54", NULL, "1", "1", "Inicio", "modulo=app&tab=home", "1");
#
#
INSERT INTO `menus_items` VALUES ("2", "2012-04-29 13:57:46", "2012-05-01 12:23:14", NULL, "1", "1", "Empresa", "modulo=app&tab=pages&page=empresa", "1");
#
#
INSERT INTO `menus_items` VALUES ("3", "2012-04-29 13:57:53", "0000-00-00 00:00:00", NULL, "1", "1", "Servicios", "/", "1");
#
#
INSERT INTO `menus_items` VALUES ("4", "2012-04-29 13:58:17", "0000-00-00 00:00:00", NULL, "1", "1", "Enlaces de Interés", "/", "1");
#
#
INSERT INTO `menus_items` VALUES ("5", "2012-04-29 13:58:52", "2012-05-01 12:22:38", NULL, "1", "1", "Contácenos", "modulo=formularios&tab=contacto", "1");
#
#
DROP TABLE IF EXISTS `paginas`;
#
#
CREATE TABLE `paginas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `pagina` varchar(80) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pagina` (`pagina`),
  UNIQUE KEY `titulo` (`titulo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `paginas` VALUES ("1", "2012-05-30 10:53:04", "2014-09-16 20:58:05", NULL, "1", "bienvenido", "Bienvenido", "<p style=\"text-align: justify;\">Nos es grato saludarlos\ny presentarnos a Ustedes como una Empresa con sólidos conocimientos\nMantenimientos a Carretillas Hidráulicas Manuales o Transpaletas y Puertas para zonas climatizadas.</p>\n<div style=\"text-align: justify;\">Ofrecemos Servicios Corporativos en diversas áreas del ramo en Mantenimientos Preventivos, Correctivos, aplicando técnicas de Japón.&nbsp;</div><div style=\"text-align: justify;\"><br /></div><div style=\"text-align: justify;\">Ventas de repuestos, mecánicos y electromecánicos, contamos con personal altamente especializado.</div><p> </p>", "pag_1338393183_500x350.jpg", NULL, "1");
#
#
INSERT INTO `paginas` VALUES ("2", "2012-05-30 10:53:04", "2014-09-16 20:56:17", NULL, "1", "empresa", "Empresa", "<p style=\"text-align: justify;\">En <strong>ICHIBAN SYSTEMS SAC</strong> nos preocupamos por la mejora continua de su Organización, trabajando en equipo con Ustedes para lograr objetivos notables en su Empresa.&nbsp;En la actualidad estamos trabajando con empresas de prestigio a nivel nacional, estas nos presentan como una opción en el mercado por mantener un servicio de calidad.Y nos gustaría ser parte de su selecta lista de proveedores.</p>\n<p style=\"text-align: justify;\">Somos una empresa con personal especializado conformado por Ingenieros y Técnicos con experiencia en el rubro Industrial.</p>\n<p><strong><br /></strong></p>\n<p> </p>", "pag_1338393184_708x267.jpg", NULL, "1");
#
#
INSERT INTO `paginas` VALUES ("3", "2014-09-19 04:29:18", "0000-00-00 00:00:00", NULL, "1", "division_de_mantenimiento", NULL, NULL, NULL, NULL, "1");
#
#
INSERT INTO `paginas` VALUES ("4", "2014-09-19 04:29:18", "0000-00-00 00:00:00", NULL, "1", "alquiler", NULL, NULL, NULL, NULL, "1");
#
#
DROP TABLE IF EXISTS `pedidos`;
#
#
CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `id_usuario` int(10) DEFAULT NULL,
  `envgen_nombre` varchar(80) DEFAULT NULL,
  `envgen_apellido_paterno` varchar(80) DEFAULT NULL,
  `envgen_apellido_materno` varchar(80) DEFAULT NULL,
  `envgen_direccion` varchar(80) DEFAULT NULL,
  `envgen_departamento` int(10) DEFAULT NULL,
  `envgen_provincia` int(10) DEFAULT NULL,
  `envgen_distrito` int(10) DEFAULT NULL,
  `envgen_telefono_fijo` varchar(80) DEFAULT NULL,
  `envgen_telefono_celular` varchar(80) DEFAULT NULL,
  `envgen_ref_lugar` longtext,
  `envgen_fecha_entrega` datetime DEFAULT '0000-00-00 00:00:00',
  `envgen_intervalo_entrega` varchar(80) DEFAULT NULL,
  `envgen_si_empresa` longtext,
  `envgen_comentario` longtext,
  `pedido` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_bloques`;
#
#
CREATE TABLE `productos_bloques` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_carrocerias`;
#
#
CREATE TABLE `productos_carrocerias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_colores`;
#
#
CREATE TABLE `productos_colores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_comentarios`;
#
#
CREATE TABLE `productos_comentarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `empresa` varchar(80) DEFAULT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `id_item` int(10) DEFAULT NULL,
  `comentario` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_filtros`;
#
#
CREATE TABLE `productos_filtros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `id_subgrupo` int(10) DEFAULT NULL,
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_fotos`;
#
#
CREATE TABLE `productos_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_item` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_grupos`;
#
#
CREATE TABLE `productos_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_items`;
#
#
CREATE TABLE `productos_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `codigo` varchar(80) DEFAULT NULL,
  `marca` varchar(80) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `id_subgrupo` int(10) DEFAULT NULL,
  `id_filtro` int(10) DEFAULT NULL,
  `descripcion` longtext,
  `moneda` varchar(80) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `oferta` varchar(80) DEFAULT NULL,
  `precio_oferta` float DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_items_tipos`;
#
#
CREATE TABLE `productos_items_tipos` (
  `id_productos_tipos` int(10) NOT NULL DEFAULT '0',
  `id_productos_items` int(10) NOT NULL DEFAULT '0',
  `orden` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_productos_tipos`,`id_productos_items`),
  KEY `id_productos_tipos` (`id_productos_tipos`),
  KEY `id_productos_items` (`id_productos_items`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_marcas`;
#
#
CREATE TABLE `productos_marcas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_ptoventa`;
#
#
CREATE TABLE `productos_ptoventa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_status`;
#
#
CREATE TABLE `productos_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_stock`;
#
#
CREATE TABLE `productos_stock` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `codigo` varchar(80) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `id_item` int(10) DEFAULT NULL,
  `chasis` varchar(80) DEFAULT NULL,
  `motor` varchar(80) DEFAULT NULL,
  `id_color` int(10) DEFAULT NULL,
  `transmision` varchar(80) DEFAULT NULL,
  `id_carroceria` int(10) DEFAULT NULL,
  `ubicacion` varchar(80) DEFAULT NULL,
  `id_ptoventa` int(10) DEFAULT NULL,
  `id_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_subfiltros`;
#
#
CREATE TABLE `productos_subfiltros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `id_filtro` int(10) DEFAULT NULL,
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_subgrupos`;
#
#
CREATE TABLE `productos_subgrupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `ver_home` varchar(80) DEFAULT NULL,
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `productos_tipos`;
#
#
CREATE TABLE `productos_tipos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `products_fotos`;
#
#
CREATE TABLE `products_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `products_fotos_fotos`;
#
#
CREATE TABLE `products_fotos_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `publicidad_videos`;
#
#
CREATE TABLE `publicidad_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `publicidad_videos` VALUES ("1", "2012-05-03 20:01:25", "2012-05-04 09:39:45", NULL, "1", "Videos");
#
#
DROP TABLE IF EXISTS `publicidad_videos_videos`;
#
#
CREATE TABLE `publicidad_videos_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `texto` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `codigo` varchar(150) DEFAULT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `publicidad_videos_videos` VALUES ("13", "2012-05-30 11:33:43", "0000-00-00 00:00:00", NULL, "1", "1", "Puerta Seccional para Garage", NULL, NULL, "r2C3-bC77lM", NULL);
#
#
INSERT INTO `publicidad_videos_videos` VALUES ("10", "2012-05-30 10:07:15", "2012-05-30 10:13:34", NULL, "1", "1", "Hablando de Nuestras Carretillas Hidráulicas", NULL, NULL, "e84ulEoobAE", NULL);
#
#
INSERT INTO `publicidad_videos_videos` VALUES ("11", "2012-05-30 10:27:26", "0000-00-00 00:00:00", NULL, "1", "1", "Uso Correcto de Carretillas y Apiladores", NULL, NULL, "EhaFKXJPQx8", NULL);
#
#
INSERT INTO `publicidad_videos_videos` VALUES ("15", "2012-05-30 11:42:50", "0000-00-00 00:00:00", NULL, "1", "1", "Repuestos y Variedad Puertas Seccionales", NULL, NULL, "I9by_a4EArE", NULL);
#
#
INSERT INTO `publicidad_videos_videos` VALUES ("16", "2012-05-30 12:01:54", "0000-00-00 00:00:00", NULL, "1", "1", "Puertas Seccionales Industriales", NULL, NULL, "fwpD_aI1CxU", NULL);
#
#
DROP TABLE IF EXISTS `recomendar`;
#
#
CREATE TABLE `recomendar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre_amigo` varchar(80) DEFAULT NULL,
  `email_amigo` varchar(80) DEFAULT NULL,
  `nombre_usuario` varchar(80) DEFAULT NULL,
  `email_usuario` varchar(80) DEFAULT NULL,
  `nombre_pagina` varchar(80) DEFAULT NULL,
  `url_pagina` varchar(80) DEFAULT NULL,
  `foto_pagina` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `recomendar` VALUES ("1", "2012-05-30 20:18:46", "2012-05-30 20:18:46", NULL, "1", "2012-05-30 20:18:46", "Walter", "wtavara@prodiserv.com", NULL, NULL, "Ichiban Systems", "http://ichibansystems.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("2", "2012-05-30 23:39:38", "2012-05-30 23:39:38", NULL, "1", "2012-05-30 23:39:38", "Walter", "wtavara@hotmail.com", NULL, NULL, "Ichiban Systems", "http://ichibansystems.com/", NULL);
#
#
DROP TABLE IF EXISTS `solicitudes`;
#
#
CREATE TABLE `solicitudes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_grupo` int(10) DEFAULT NULL,
  `id_emails_grupos` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `speeches`;
#
#
CREATE TABLE `speeches` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `textos_grupos`;
#
#
CREATE TABLE `textos_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `textos_grupos` VALUES ("1", "2012-04-29 13:39:19", "0000-00-00 00:00:00", NULL, "1", "Servicios", "<p> </p>", NULL, NULL, "0");
#
#
DROP TABLE IF EXISTS `textos_items`;
#
#
CREATE TABLE `textos_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `id_subgrupo` int(10) DEFAULT NULL,
  `calificacion` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `textos_items` VALUES ("1", "2012-04-29 15:54:34", "2012-05-29 19:20:09", NULL, "1", "Tipos de Mantenimientos", "<p style=\"text-align: justify;\"><strong>En Carretillas Hidráulicas,</strong> Mantenimientos preventivos y correctivos a todo tipo de equipos transpaleta que sirven para el traslado de cargas pesadas, con atención en plantas industriales, contamos&nbsp; con stock de repuestos para todas las marcas, BAUER, STOCKA, PALETRANS, ECONOMIY, CROWN, CLARCK, BULLI, HISTER. Provistas de material acero inoxidable o en fierro carbonatado.</p>\n<p style=\"text-align: justify;\"><strong>En Puertas Seccionales,</strong> Mantenimientos. preventivos y correctivos a puertas no automatizadas que sirven para el cierre hermético en plantas &nbsp;refrigeradas que cuentan con grado sanitario, ofrecemos la atención directa en plantas industriales.&nbsp;</p>\n<div style=\"text-align: justify;\"><strong>Atención Específica:</strong></div><div style=\"text-align: justify;\">- Urgencias&nbsp; en equipos industriales,&nbsp;</div><div style=\"text-align: justify;\">- Venta y Mantenimiento de carretillas hidráulicas en todas las marcas y tipos.</div><div style=\"text-align: justify;\">- Venta, montajes y mantenimientos de puertas para cámaras frigoríficas,</div><div style=\"text-align: justify;\">&nbsp; o termo aisladas de tipo seccional,&nbsp;contamos&nbsp; con repuestos,</div><div style=\"text-align: justify;\">- Asesorías en proyectos afines,</div><p> </p>", NULL, NULL, "1", NULL, "0");
#
#
INSERT INTO `textos_items` VALUES ("2", "2012-04-29 15:54:48", "2012-05-27 07:50:22", NULL, "1", "Servicio Técnico", "<p>Contamos con un selecto personal especializado en el trabajo requerido para el mantenimiento en equipos hidráulicos y puertas industriales (carretillas hidráulicas - transpallets y puertas para zonas climatizadas o refrigeradas).</p>\n<p>Nuestro personal ha sido capacitado en en el lejano país de Japón y mantienen una capacitación constante, buscando ofrecerles el mejor servicio que sus equipos requieren.</p>\n<p>Por que sabemos la necesidad de mantener a sus equipos en buen estado para el trabajo forzado del día a día, somos su mejor alternativa en mantenimientos especializados, nuestros clientes de alto prestigio a nivel nacional nos respaldan.&nbsp;</p>\n<p> </p>\n<p><strong>Misión</strong><br />\n\"Ser líderes en el campo de servicios a equipos específicos para ayudar al\néxito de nuestros clientes con soluciones personalizadas, ofreciendo un buen\nsoporte y garantía&nbsp; en nuestro servicio de cada día que lo beneficiará\nnotablemente a su organización\".</p>\n<p><strong><span style=\"font-size: 9pt; \">Visión</span></strong><span style=\"font-size: 9pt; \"><br />\n“Brindar soluciones, con conocimiento aplicando soluciones que se caractericen\nnotablemente por ser confiables, con total garantía y con proyección al futuro\ncumpliendo siempre con los acuerdos iniciales pactados con nuestros\nclientes\".</span></p>\n<p> </p>", NULL, NULL, "1", NULL, "0");
#
#
INSERT INTO `textos_items` VALUES ("3", "2012-05-03 19:32:27", "2012-05-17 11:14:02", NULL, "1", "Logística", "<p>Contamos con un área logística de&nbsp; pensar moderno que interactúa&nbsp; rápidamente con nuestros especialistas y empresas desde cualquier lugar del país brindándoles el apoyo necesario solucionando los problemas de su empresa a la brevedad posible.</p>", "tex_1336091546_474x280.jpg", NULL, "1", NULL, "0");
#
#
DROP TABLE IF EXISTS `textos_subgrupos`;
#
#
CREATE TABLE `textos_subgrupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `usuarios`;
#
#
CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `apellidos_paterno` varchar(80) DEFAULT NULL,
  `apellidos_materno` varchar(80) DEFAULT NULL,
  `genero` varchar(80) DEFAULT NULL,
  `dni` varchar(80) DEFAULT NULL,
  `fecha_nacimiento` datetime DEFAULT '0000-00-00 00:00:00',
  `direccion` varchar(80) DEFAULT NULL,
  `departamento` int(10) DEFAULT NULL,
  `provincia` int(10) DEFAULT NULL,
  `distrito` int(10) DEFAULT NULL,
  `forma_contacto` varchar(80) DEFAULT NULL,
  `telefono_casa` varchar(80) DEFAULT NULL,
  `telefono_oficina` varchar(80) DEFAULT NULL,
  `telefono_celular` varchar(80) DEFAULT NULL,
  `promociones` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `usuarios_acceso`;
#
#
CREATE TABLE `usuarios_acceso` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `permisos` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `usuarios_acceso` VALUES ("1", "2012-05-02 12:46:20", "0000-00-00 00:00:00", NULL, "1", "0", "administrador", "prodiserv", NULL);
#
#
DROP TABLE IF EXISTS `variables`;
#
#
CREATE TABLE `variables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `variable` varchar(80) DEFAULT NULL,
  `valor` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `ventas_cuentas`;
#
#
CREATE TABLE `ventas_cuentas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `relays` float DEFAULT NULL,
  `enabled` varchar(80) DEFAULT NULL,
  `time_0` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `ventas_items`;
#
#
CREATE TABLE `ventas_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_cliente` int(10) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `id_item` int(10) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `id_status` int(10) DEFAULT NULL,
  `id_canal` int(10) DEFAULT NULL,
  `id_cuenta_email` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `ventas_mensajes`;
#
#
CREATE TABLE `ventas_mensajes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `id_grupo` int(10) DEFAULT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `ventas_status`;
#
#
CREATE TABLE `ventas_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `web_config`;
#
#
CREATE TABLE `web_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `proyecto` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
