DROP TABLE IF EXISTS `areas`;
#
#
CREATE TABLE `areas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `areas` VALUES ("1", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Educación");
#
#
INSERT INTO `areas` VALUES ("2", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "");
#
#
INSERT INTO `areas` VALUES ("3", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "");
#
#
INSERT INTO `areas` VALUES ("4", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "");
#
#
INSERT INTO `areas` VALUES ("5", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Taller de Investigación II");
#
#
INSERT INTO `areas` VALUES ("6", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Anatomía");
#
#
INSERT INTO `areas` VALUES ("7", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Ciencias");
#
#
INSERT INTO `areas` VALUES ("8", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Física");
#
#
INSERT INTO `areas` VALUES ("9", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Taller de Investigación I");
#
#
INSERT INTO `areas` VALUES ("10", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Metodología de la Investigación");
#
#
INSERT INTO `areas` VALUES ("11", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Religión");
#
#
INSERT INTO `areas` VALUES ("12", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "Arte");
#
#
DROP TABLE IF EXISTS `banner_departamentos_fotos`;
#
#
CREATE TABLE `banner_departamentos_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `banner_servicios_fotos`;
#
#
CREATE TABLE `banner_servicios_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `file` varchar(150) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners` VALUES ("1", "2011-12-06 01:32:24", "2013-07-10 18:47:49", NULL, "1", "header_logo", NULL, "ban_1323153142.jpg", "/", NULL, "1");
#
#
INSERT INTO `banners` VALUES ("2", "2011-12-06 02:57:27", "2011-12-06 02:57:27", NULL, "1", "header_telefono", NULL, "ban_1323158244.jpg", NULL, NULL, "1");
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `banners_boletin`;
#
#
CREATE TABLE `banners_boletin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `fichero` varchar(150) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `url` varchar(80) DEFAULT NULL,
  `dimensiones` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
  `name` varchar(20) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners_fotos` VALUES ("1", "2011-12-06 01:12:51", "2014-04-10 00:41:28", NULL, "1", "banner_main", "Banner Principal", "1");
#
#
INSERT INTO `banners_fotos` VALUES ("122", "2013-08-03 17:03:51", "2013-09-27 17:30:05", NULL, "1", "banner_enlaces", "ENLACE DE ENTIDADES DEL GOBIERNO", "1");
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
  `url` varchar(160) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("16", "2014-05-07 18:55:08", "0000-00-00 00:00:00", NULL, "1", "1", "banfot_1399506907_983x347.jpg", NULL, "http://www.ardyss.com.pe/abdo-men.html", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("3", "2014-04-04 15:40:40", "2014-04-20 21:51:41", NULL, "1", "1", "banfot_1396644037_983x347.jpg", NULL, "https://www.facebook.com/educadoresperu", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("15", "2014-05-07 18:54:29", "0000-00-00 00:00:00", NULL, "1", "1", "banfot_1399506868_983x347.jpg", NULL, "<span><a class=\"smarterwiki-linkify\" href=\"http://www.ardyss.com.pe/abdowomen.html\">http://www.ardyss.com.pe/abdowomen.html</a></span>", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("6", "2014-04-04 16:15:44", "2014-04-20 21:52:38", NULL, "1", "1", "banfot_1396646142_983x347.jpg", NULL, "http://www.prodiserv.com", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("8", "2014-04-20 21:36:48", "2014-05-01 12:00:00", NULL, "1", "1", "banfot_1398047807_960x322.jpg", "Grupo Juvenil de Apoyo y Orientación Social Construyendo Sonrisas", "https://www.facebook.com/gjaoscs.construyendosonrisas", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("10", "2014-05-01 11:54:58", "2014-05-01 12:26:51", NULL, "1", "1", "banfot_1398963287_2002x800.jpg", NULL, "http://educadoresperu.com/index.php?sec=cgtp&modulo=items&tab=news_items&acc=file&id=27&friendly=Dona%20un%20libro", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("26", "2014-09-09 23:49:39", "2014-09-09 23:50:06", NULL, "1", "122", "banfot_1410324579_191x119.jpg", "Oficina Nacional de Procesos Electorales", "http://www.onpe.gob.pe/", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("17", "2014-05-07 19:54:24", "0000-00-00 00:00:00", NULL, "1", "1", "banfot_1399510460_960x638.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("21", "2014-06-07 17:25:29", "2014-06-07 17:31:27", NULL, "1", "1", "banfot_1402179929_259x194.jpg", "Alquiler / Venta Caterpillar 329", "http://educadoresperu.com/index.php?sec=cgtp&modulo=items&tab=news_items&acc=file&id=51&friendly=Alquiler%20/%20Venta%20Caterpillar%20329,%20para%20cualquier%20", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("19", "2014-06-03 23:11:01", "0000-00-00 00:00:00", NULL, "1", "1", "banfot_1401855060_583x496.jpg", NULL, NULL, "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("22", "2014-06-13 00:07:20", "2014-06-13 00:08:10", NULL, "1", "122", "banfot_1402636039_300x239.jpg", "Ministerio de Educación", "http://www.minedu.gob.pe/", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("23", "2014-06-13 00:15:16", "0000-00-00 00:00:00", NULL, "1", "122", "banfot_1402636516_350x180.jpg", "Portal del estado Peruano", "http://www.peru.gob.pe/", "1");
#
#
INSERT INTO `banners_fotos_fotos` VALUES ("25", "2014-08-31 21:53:15", "2014-08-31 21:54:17", NULL, "1", "122", "banfot_1409539994_540x474.jpg", "Beca 18", "http://www.pronabec.gob.pe/", "1");
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `blog_actividades_fotos`;
#
#
CREATE TABLE `blog_actividades_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
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
  `page` int(10) NOT NULL DEFAULT '1',
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `blog_links_adicionales`;
#
#
CREATE TABLE `blog_links_adicionales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
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
  `page` int(10) NOT NULL DEFAULT '1',
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `bloque_agenda`;
#
#
CREATE TABLE `bloque_agenda` (
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `bloque_agenda` VALUES ("1", "2014-07-18 17:44:27", "0000-00-00 00:00:00", NULL, "1", "2014-07-18 17:44:12", "prueba agenda 1", "<p> </p>", NULL, NULL, "1");
#
#
DROP TABLE IF EXISTS `bloque_agenda_fotos`;
#
#
CREATE TABLE `bloque_agenda_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `bloque_centro`;
#
#
CREATE TABLE `bloque_centro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `titulo` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `web` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo` (`titulo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `bloque_enlaces`;
#
#
CREATE TABLE `bloque_enlaces` (
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
  UNIQUE KEY `titulo` (`titulo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `bloque_enlaces` VALUES ("1", "2014-03-31 23:05:41", "2014-03-31 23:06:29", NULL, "1", "http://www.encuentrocientificointernacional.org/", "Encuentro Cientifico Internacional", NULL, "enl_1396325141_150x150.gif", NULL, "1");
#
#
INSERT INTO `bloque_enlaces` VALUES ("2", "2014-04-17 01:48:08", "2014-04-17 02:20:02", NULL, "1", "https://www.facebook.com/profile.php?id=100008168233023", "Facebook Educadores Peru", NULL, "enl_1397717288_257x84.png", NULL, "1");
#
#
INSERT INTO `bloque_enlaces` VALUES ("5", "2014-04-27 21:00:47", "2014-09-02 10:44:36", NULL, "1", "http://www.gjaoscsperu.blogspot.com/", "GJAOSCS Construyendo Sonrisas", NULL, "enl_1398650447_960x322.jpg", NULL, "1");
#
#
INSERT INTO `bloque_enlaces` VALUES ("4", "2014-04-20 22:33:35", "0000-00-00 00:00:00", NULL, "1", "http://profesorgamarra.blogspot.com/", "Prof. César Gamarra D.", NULL, "enl_1398051214_688x688.jpg", NULL, "1");
#
#
INSERT INTO `bloque_enlaces` VALUES ("6", "2014-05-09 20:11:03", "0000-00-00 00:00:00", NULL, "1", "http://canaln.pe/", "Canal N", NULL, "enl_1399684262_354x354.jpg", NULL, "1");
#
#
INSERT INTO `bloque_enlaces` VALUES ("7", "2014-08-11 21:15:43", "0000-00-00 00:00:00", NULL, "1", "http://www.laatarraya.com/", "La Atarraya Cevichería", NULL, "enl_1407809742_390x221.jpg", NULL, "1");
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
DROP TABLE IF EXISTS `boletines_filtros`;
#
#
CREATE TABLE `boletines_filtros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
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
  `file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `centro_grupos`;
#
#
CREATE TABLE `centro_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `centro_grupos` VALUES ("2", "2014-06-04 23:45:42", "0000-00-00 00:00:00", NULL, "1", "Bienvenidos", "ceninf_1401943542_77x56.jpg", NULL, "1");
#
#
INSERT INTO `centro_grupos` VALUES ("3", "2014-06-12 23:48:35", "2014-09-02 11:00:48", NULL, "1", "GJAOSCS", "ceninf_1402634913_960x322.jpg", "Grupo Juvenil de Apoyo y Orientación Social Construyendo Sonrisas", "1");
#
#
DROP TABLE IF EXISTS `centro_items`;
#
#
CREATE TABLE `centro_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `id_subgrupo` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `pdf` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `centro_items` VALUES ("2", "2014-06-04 23:47:43", "0000-00-00 00:00:00", NULL, "1", "2", NULL, "2012-01-01 00:00:00", "Bienvenidos", "<p style=\"text-align: center; \"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><param name=\"movie\" value=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http://vhss-d.oddcast.com/php/vhss_editors/getvoki/chsm=e145d2c6db8c44ae7ba93cbc7606413e%26sc=9970163\"><param name=\"quality\" value=\"high\"><param name=\"allowScriptAccess\" value=\"always\"><param name=\"width\" value=\"200\"><param name=\"height\" value=\"267\"><param name=\"allowNetworking\" value=\"all\"><param name=\"wmode\" value=\"transparent\"><param name=\"allowFullScreen\" value=\"true\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=e145d2c6db8c44ae7ba93cbc7606413e%26sc=9970163\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></object></p>\n<p> </p>", NULL, NULL, NULL, "1");
#
#
INSERT INTO `centro_items` VALUES ("3", "2014-06-12 23:49:22", "0000-00-00 00:00:00", NULL, "1", "3", NULL, NULL, "¿Quiénes somos?", "<p> </p>", NULL, NULL, NULL, "1");
#
#
INSERT INTO `centro_items` VALUES ("4", "2014-06-12 23:50:29", "0000-00-00 00:00:00", NULL, "1", "3", NULL, NULL, "¿Cómo colaborar?", "<p style=\"text-align: center; \">&nbsp;</p>\n<p style=\"text-align: center;\"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><param name=\"movie\" value=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http://vhss-d.oddcast.com/php/vhss_editors/getvoki/chsm=81eac489a621e1fc586aacd450f1439c%26sc=10002446\"><param name=\"quality\" value=\"high\"><param name=\"allowScriptAccess\" value=\"always\"><param name=\"width\" value=\"200\"><param name=\"height\" value=\"267\"><param name=\"allowNetworking\" value=\"all\"><param name=\"wmode\" value=\"transparent\"><param name=\"allowFullScreen\" value=\"true\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=81eac489a621e1fc586aacd450f1439c%26sc=10002446\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></object></p>\n<p style=\"text-align: center;\">&nbsp;E-mail: gjaoscs@gmail.com</p>\n<p> </p>\n<p> </p>", NULL, NULL, NULL, "1");
#
#
INSERT INTO `centro_items` VALUES ("5", "2014-07-18 17:54:15", "0000-00-00 00:00:00", NULL, "1", "3", "1", NULL, "2011", "<p> </p>", NULL, NULL, NULL, "1");
#
#
DROP TABLE IF EXISTS `centro_subgrupos`;
#
#
CREATE TABLE `centro_subgrupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `centro_subgrupos` VALUES ("1", "2014-07-18 17:52:38", "0000-00-00 00:00:00", NULL, "1", "Campañas de Apoyo Social", "3", "1");
#
#
DROP TABLE IF EXISTS `colegios`;
#
#
CREATE TABLE `colegios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `colegios` VALUES ("3", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "San Vicente de Paul", NULL);
#
#
INSERT INTO `colegios` VALUES ("4", "0000-00-00 00:00:00", "2014-08-22 00:17:31", NULL, "1", "0", "Nuestra Señora de Guadalupe", "Av. Alfonso Ugarte - Lima");
#
#
INSERT INTO `colegios` VALUES ("5", "2014-08-24 20:42:28", "0000-00-00 00:00:00", NULL, "1", "0", "Universidad Nacional Mayor de San Marcos", "Cruce de Av. Universitaria y Av. Venezuela");
#
#
INSERT INTO `colegios` VALUES ("6", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "0", "UNMSM", NULL);
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
  `variable` varchar(80) DEFAULT NULL,
  `valor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `configuraciones` VALUES ("1", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "telefonos_publicos", "0000000");
#
#
INSERT INTO `configuraciones` VALUES ("2", "2011-12-04 21:15:43", "2014-03-25 21:38:38", NULL, "1", "emails_publicos", "informes@educadoresperu.com");
#
#
INSERT INTO `configuraciones` VALUES ("3", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "direccion_publica", "av direccion 000");
#
#
INSERT INTO `configuraciones` VALUES ("4", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "telefonos_email", "0000000");
#
#
INSERT INTO `configuraciones` VALUES ("5", "2011-12-04 21:15:43", "2014-03-25 21:38:23", NULL, "1", "emails_admin", "informes@educadoresperu.com");
#
#
INSERT INTO `configuraciones` VALUES ("6", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "direccion_email", "av direccion 000");
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
  `variable` varchar(80) DEFAULT NULL,
  `valor` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `configuraciones_root` VALUES ("1", "2011-12-04 21:15:43", "2014-03-25 21:38:03", NULL, "1", "titulo_home", "EDUCADORES");
#
#
INSERT INTO `configuraciones_root` VALUES ("2", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "emails_admin", "guillermolozan@gmail.com,wtavara@prodiserv.com");
#
#
INSERT INTO `configuraciones_root` VALUES ("3", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "email_logo", "particular/header/logo.jpg");
#
#
INSERT INTO `configuraciones_root` VALUES ("4", "2011-12-04 21:15:43", "2014-03-25 21:37:55", NULL, "1", "email_fromname", "EDUCADORES");
#
#
INSERT INTO `configuraciones_root` VALUES ("5", "2011-12-04 21:15:43", "2014-03-25 21:37:49", NULL, "1", "email_from", "informes@educadoresperu.com");
#
#
INSERT INTO `configuraciones_root` VALUES ("6", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "simbolo_moneda", "S/.");
#
#
INSERT INTO `configuraciones_root` VALUES ("7", "2011-12-04 21:15:43", "2014-03-25 21:37:37", NULL, "1", "nombre_empresa", "EDUCADORES");
#
#
INSERT INTO `configuraciones_root` VALUES ("8", "2011-12-04 21:15:43", "2014-03-25 21:37:31", NULL, "1", "titulo_web", "EDUCADORES");
#
#
INSERT INTO `configuraciones_root` VALUES ("9", "2011-12-04 21:15:43", "0000-00-00 00:00:00", NULL, "1", "anaytics_code", "");
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
  `apellidos` varchar(80) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `celular` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `distrito` varchar(80) DEFAULT NULL,
  `provincia` varchar(80) DEFAULT NULL,
  `como_se_entero` varchar(80) DEFAULT NULL,
  `comentario` longtext,
  `empresa` varchar(80) DEFAULT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `contacto` VALUES ("1", "2014-04-20 23:22:17", "2014-04-20 23:22:17", NULL, "1", "2014-04-20 23:22:17", "Gamarra", "Cesar", "", "", "gamadesupe2@gmail.com", "", "", "5", "msn de prueba", NULL, NULL, NULL);
#
#
DROP TABLE IF EXISTS `convocatoria_items`;
#
#
CREATE TABLE `convocatoria_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_subgrupo` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `convocatoria_subgrupos`;
#
#
CREATE TABLE `convocatoria_subgrupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `cotizaciones`;
#
#
CREATE TABLE `cotizaciones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `ruc` varchar(80) DEFAULT NULL,
  `contacto_nombre` varchar(80) DEFAULT NULL,
  `contacto_cargo` varchar(80) DEFAULT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `celular` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `tipo_servicio` varchar(80) DEFAULT NULL,
  `envio_servicio` varchar(80) DEFAULT NULL,
  `que_enviar` varchar(80) DEFAULT NULL,
  `envio_valor` varchar(80) DEFAULT NULL,
  `envio_frecuencia` varchar(80) DEFAULT NULL,
  `envio_catidad` varchar(80) DEFAULT NULL,
  `tiempo_entrega` varchar(80) DEFAULT NULL,
  `servicios_complementarios` longtext,
  `servicio_requerido` varchar(80) DEFAULT NULL,
  `tramites_frecuencia` varchar(80) DEFAULT NULL,
  `tramite_direccion` varchar(80) DEFAULT NULL,
  `tramite_provincia` varchar(80) DEFAULT NULL,
  `tramite_fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `tramite_observaciones` longtext,
  `outsourcing_mortizados` varchar(80) DEFAULT NULL,
  `outsourcing_mensajero_interno` varchar(80) DEFAULT NULL,
  `outsourcing_mensajero_externo` varchar(80) DEFAULT NULL,
  `outsourcing_coordinador` varchar(80) DEFAULT NULL,
  `oursourcing_tiempo` varchar(80) DEFAULT NULL,
  `outsourcing_observaciones` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `documentos_grupos`;
#
#
CREATE TABLE `documentos_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `documentos_items`;
#
#
CREATE TABLE `documentos_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `fichero` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `feedback`;
#
#
CREATE TABLE `feedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` char(1) DEFAULT NULL,
  `proyecto` varchar(80) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `motivo` varchar(80) DEFAULT NULL,
  `comentario` varchar(800) DEFAULT NULL,
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
  `visibilidad` char(1) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `geo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `geo_departamentos` VALUES ("1", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Amazonas", "01");
#
#
INSERT INTO `geo_departamentos` VALUES ("2", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ancash", "02");
#
#
INSERT INTO `geo_departamentos` VALUES ("3", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Apurimac", "03");
#
#
INSERT INTO `geo_departamentos` VALUES ("4", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Arequipa", "04");
#
#
INSERT INTO `geo_departamentos` VALUES ("5", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ayacucho", "05");
#
#
INSERT INTO `geo_departamentos` VALUES ("6", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cajamarca", "06");
#
#
INSERT INTO `geo_departamentos` VALUES ("7", "0000-00-00 00:00:00", "2012-01-13 10:07:46", NULL, "1", "Cusco", "08");
#
#
INSERT INTO `geo_departamentos` VALUES ("8", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huancavelica", "09");
#
#
INSERT INTO `geo_departamentos` VALUES ("9", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huánuco", "10");
#
#
INSERT INTO `geo_departamentos` VALUES ("10", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ica", "11");
#
#
INSERT INTO `geo_departamentos` VALUES ("11", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Junín", "12");
#
#
INSERT INTO `geo_departamentos` VALUES ("12", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "La Libertad", "13");
#
#
INSERT INTO `geo_departamentos` VALUES ("13", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lambayeque", "14");
#
#
INSERT INTO `geo_departamentos` VALUES ("14", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lima", "15");
#
#
INSERT INTO `geo_departamentos` VALUES ("15", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Loreto", "16");
#
#
INSERT INTO `geo_departamentos` VALUES ("16", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Madre de Dios", "17");
#
#
INSERT INTO `geo_departamentos` VALUES ("17", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Moquegua", "18");
#
#
INSERT INTO `geo_departamentos` VALUES ("18", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pasco", "19");
#
#
INSERT INTO `geo_departamentos` VALUES ("19", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Piura", "20");
#
#
INSERT INTO `geo_departamentos` VALUES ("20", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Puno", "21");
#
#
INSERT INTO `geo_departamentos` VALUES ("21", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Martín", "22");
#
#
INSERT INTO `geo_departamentos` VALUES ("22", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tacna", "23");
#
#
INSERT INTO `geo_departamentos` VALUES ("23", "0000-00-00 00:00:00", "2009-12-02 11:07:55", NULL, "1", "Tumbes", "24");
#
#
INSERT INTO `geo_departamentos` VALUES ("24", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ucayali", "25");
#
#
INSERT INTO `geo_departamentos` VALUES ("26", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, NULL, "Callao", "07");
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
  `visibilidad` char(1) DEFAULT NULL,
  `id_provincia` int(10) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `geo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=1690 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `geo_distritos` VALUES ("2", "0000-00-00 00:00:00", "2011-10-15 01:25:29", NULL, "1", "8", "Ancón", "150102");
#
#
INSERT INTO `geo_distritos` VALUES ("3", "0000-00-00 00:00:00", "2011-10-15 01:25:22", NULL, "0", "8", "Ate", "150103");
#
#
INSERT INTO `geo_distritos` VALUES ("4", "0000-00-00 00:00:00", "2011-10-15 01:25:15", NULL, "1", "8", "Barranco", "150104");
#
#
INSERT INTO `geo_distritos` VALUES ("5", "0000-00-00 00:00:00", "2011-10-15 01:25:09", NULL, "1", "8", "Breña", "150105");
#
#
INSERT INTO `geo_distritos` VALUES ("6", "0000-00-00 00:00:00", "2011-10-15 01:25:01", NULL, "1", "8", "Carabayllo", "150106");
#
#
INSERT INTO `geo_distritos` VALUES ("7", "0000-00-00 00:00:00", "2011-10-15 01:24:51", NULL, "1", "8", "Chaclacayo", "150107");
#
#
INSERT INTO `geo_distritos` VALUES ("8", "0000-00-00 00:00:00", "2011-10-15 01:24:26", NULL, "1", "8", "Chorrillos", "150108");
#
#
INSERT INTO `geo_distritos` VALUES ("9", "0000-00-00 00:00:00", "2011-10-15 01:24:40", NULL, "1", "8", "Cieneguilla", "150109");
#
#
INSERT INTO `geo_distritos` VALUES ("10", "0000-00-00 00:00:00", "2011-10-14 20:30:28", NULL, "1", "8", "Comas", "150110");
#
#
INSERT INTO `geo_distritos` VALUES ("11", "0000-00-00 00:00:00", "2011-10-15 01:24:13", NULL, "1", "8", "El Agustino", "150111");
#
#
INSERT INTO `geo_distritos` VALUES ("12", "0000-00-00 00:00:00", "2011-10-15 01:24:05", NULL, "1", "8", "Independencia", "150112");
#
#
INSERT INTO `geo_distritos` VALUES ("13", "0000-00-00 00:00:00", "2011-10-15 01:23:33", NULL, "1", "8", "Jesús María", "150113");
#
#
INSERT INTO `geo_distritos` VALUES ("14", "0000-00-00 00:00:00", "2011-10-15 01:23:54", NULL, "1", "8", "La Molina", "150114");
#
#
INSERT INTO `geo_distritos` VALUES ("15", "0000-00-00 00:00:00", "2011-10-15 01:23:22", NULL, "1", "8", "La Victoria", "150115");
#
#
INSERT INTO `geo_distritos` VALUES ("16", "0000-00-00 00:00:00", "2011-10-15 01:23:13", NULL, "1", "8", "Lince", "150116");
#
#
INSERT INTO `geo_distritos` VALUES ("17", "0000-00-00 00:00:00", "2011-10-15 01:23:04", NULL, "1", "8", "Los Olivos", "150117");
#
#
INSERT INTO `geo_distritos` VALUES ("18", "0000-00-00 00:00:00", "2011-10-15 01:22:39", NULL, "1", "8", "Chosica", NULL);
#
#
INSERT INTO `geo_distritos` VALUES ("19", "0000-00-00 00:00:00", "2011-10-15 01:22:31", NULL, "1", "8", "Lurin", "150119");
#
#
INSERT INTO `geo_distritos` VALUES ("20", "0000-00-00 00:00:00", "2011-10-15 01:22:12", NULL, "1", "8", "Magdalena del Mar", "150120");
#
#
INSERT INTO `geo_distritos` VALUES ("21", "0000-00-00 00:00:00", "2011-10-15 01:22:18", NULL, "1", "8", "Pueblo Libre", NULL);
#
#
INSERT INTO `geo_distritos` VALUES ("22", "0000-00-00 00:00:00", "2011-10-15 01:22:00", NULL, "1", "8", "Miraflores", "150122");
#
#
INSERT INTO `geo_distritos` VALUES ("23", "0000-00-00 00:00:00", "2011-10-15 01:21:52", NULL, "1", "8", "Pachacámac", "150123");
#
#
INSERT INTO `geo_distritos` VALUES ("24", "0000-00-00 00:00:00", "2011-10-15 01:21:45", NULL, "1", "8", "Pucusana", "150124");
#
#
INSERT INTO `geo_distritos` VALUES ("25", "0000-00-00 00:00:00", "2011-10-15 01:21:36", NULL, "1", "8", "Puente Piedra", "150125");
#
#
INSERT INTO `geo_distritos` VALUES ("26", "0000-00-00 00:00:00", "2011-10-15 01:20:11", NULL, "1", "8", "Punta Hermosa", "150126");
#
#
INSERT INTO `geo_distritos` VALUES ("27", "0000-00-00 00:00:00", "2011-10-15 01:20:02", NULL, "1", "8", "Punta Negra", "150127");
#
#
INSERT INTO `geo_distritos` VALUES ("28", "0000-00-00 00:00:00", "2011-10-15 01:19:55", NULL, "1", "8", "Rímac", "150128");
#
#
INSERT INTO `geo_distritos` VALUES ("29", "0000-00-00 00:00:00", "2011-10-15 01:19:48", NULL, "1", "8", "San Bartolo", "150129");
#
#
INSERT INTO `geo_distritos` VALUES ("30", "0000-00-00 00:00:00", "2011-10-15 01:19:42", NULL, "1", "8", "San Borja", "150130");
#
#
INSERT INTO `geo_distritos` VALUES ("31", "0000-00-00 00:00:00", "2011-10-15 01:19:35", NULL, "1", "8", "San Isidro", "150131");
#
#
INSERT INTO `geo_distritos` VALUES ("32", "0000-00-00 00:00:00", "2011-10-15 01:19:29", NULL, "1", "8", "San Juan de Lurigancho", "150132");
#
#
INSERT INTO `geo_distritos` VALUES ("33", "0000-00-00 00:00:00", "2011-10-15 01:19:23", NULL, "1", "8", "San Juan de Miraflores", "150133");
#
#
INSERT INTO `geo_distritos` VALUES ("34", "0000-00-00 00:00:00", "2011-10-15 01:19:14", NULL, "1", "8", "San Luis", "150134");
#
#
INSERT INTO `geo_distritos` VALUES ("35", "0000-00-00 00:00:00", "2011-10-15 01:19:08", NULL, "1", "8", "San Martín de Porres", "150135");
#
#
INSERT INTO `geo_distritos` VALUES ("36", "0000-00-00 00:00:00", "2011-10-15 01:18:57", NULL, "1", "8", "San Miguel", "150136");
#
#
INSERT INTO `geo_distritos` VALUES ("37", "0000-00-00 00:00:00", "2011-10-15 01:18:41", NULL, "1", "8", "Santa Anita", "150137");
#
#
INSERT INTO `geo_distritos` VALUES ("38", "0000-00-00 00:00:00", "2011-10-15 01:18:29", NULL, "1", "8", "Santa María del Mar", "150138");
#
#
INSERT INTO `geo_distritos` VALUES ("39", "0000-00-00 00:00:00", "2011-10-15 01:18:04", NULL, "1", "8", "Santa Rosa", "150139");
#
#
INSERT INTO `geo_distritos` VALUES ("40", "0000-00-00 00:00:00", "2011-10-15 01:17:19", NULL, "1", "8", "Santiago de Surco", "150140");
#
#
INSERT INTO `geo_distritos` VALUES ("41", "0000-00-00 00:00:00", "2011-10-14 20:24:16", NULL, "1", "8", "Surquillo", "150141");
#
#
INSERT INTO `geo_distritos` VALUES ("42", "0000-00-00 00:00:00", "2011-10-15 01:17:08", NULL, "1", "8", "Villa El Salvador", "150142");
#
#
INSERT INTO `geo_distritos` VALUES ("43", "0000-00-00 00:00:00", "2011-10-15 01:17:01", NULL, "1", "8", "Villa María del Triunfo", "150143");
#
#
INSERT INTO `geo_distritos` VALUES ("46", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Chachapoyas", "010101");
#
#
INSERT INTO `geo_distritos` VALUES ("47", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Asuncion", "010102");
#
#
INSERT INTO `geo_distritos` VALUES ("48", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Balsas", "010103");
#
#
INSERT INTO `geo_distritos` VALUES ("49", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Cheto", "010104");
#
#
INSERT INTO `geo_distritos` VALUES ("50", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Chiliquin", "010105");
#
#
INSERT INTO `geo_distritos` VALUES ("51", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Chuquibamba", "010106");
#
#
INSERT INTO `geo_distritos` VALUES ("52", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Granada", "010107");
#
#
INSERT INTO `geo_distritos` VALUES ("53", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Huancas", "010108");
#
#
INSERT INTO `geo_distritos` VALUES ("54", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "La Jalca", "010109");
#
#
INSERT INTO `geo_distritos` VALUES ("55", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Leimebamba", "010110");
#
#
INSERT INTO `geo_distritos` VALUES ("56", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Levanto", "010111");
#
#
INSERT INTO `geo_distritos` VALUES ("57", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Magdalena", "010112");
#
#
INSERT INTO `geo_distritos` VALUES ("58", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Mariscal Castilla", "010113");
#
#
INSERT INTO `geo_distritos` VALUES ("59", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Molinopampa", "010114");
#
#
INSERT INTO `geo_distritos` VALUES ("60", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Montevideo", "010115");
#
#
INSERT INTO `geo_distritos` VALUES ("61", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Olleros", "010116");
#
#
INSERT INTO `geo_distritos` VALUES ("62", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Quinjalca", "010117");
#
#
INSERT INTO `geo_distritos` VALUES ("63", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "San Francisco De Daguas", "010118");
#
#
INSERT INTO `geo_distritos` VALUES ("64", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "San Isidro De Maino", "010119");
#
#
INSERT INTO `geo_distritos` VALUES ("65", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Soloco", "010120");
#
#
INSERT INTO `geo_distritos` VALUES ("66", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "14", "Sonche", "010121");
#
#
INSERT INTO `geo_distritos` VALUES ("67", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "15", "Bagua", "010201");
#
#
INSERT INTO `geo_distritos` VALUES ("68", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "15", "Aramango", "010202");
#
#
INSERT INTO `geo_distritos` VALUES ("69", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "15", "Copallin", "010203");
#
#
INSERT INTO `geo_distritos` VALUES ("70", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "15", "El Parco", "010204");
#
#
INSERT INTO `geo_distritos` VALUES ("71", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "15", "Imaza", "010205");
#
#
INSERT INTO `geo_distritos` VALUES ("72", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "15", "La Peca", "010206");
#
#
INSERT INTO `geo_distritos` VALUES ("73", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Jumbilla", "010301");
#
#
INSERT INTO `geo_distritos` VALUES ("74", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Chisquilla", "010302");
#
#
INSERT INTO `geo_distritos` VALUES ("75", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Churuja", "010303");
#
#
INSERT INTO `geo_distritos` VALUES ("76", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Corosha", "010304");
#
#
INSERT INTO `geo_distritos` VALUES ("77", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Cuispes", "010305");
#
#
INSERT INTO `geo_distritos` VALUES ("78", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Florida", "010306");
#
#
INSERT INTO `geo_distritos` VALUES ("79", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Jazan", "010307");
#
#
INSERT INTO `geo_distritos` VALUES ("80", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Recta", "010308");
#
#
INSERT INTO `geo_distritos` VALUES ("81", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "San Carlos", "010309");
#
#
INSERT INTO `geo_distritos` VALUES ("82", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Shipasbamba", "010310");
#
#
INSERT INTO `geo_distritos` VALUES ("83", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Valera", "010311");
#
#
INSERT INTO `geo_distritos` VALUES ("84", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "16", "Yambrasbamba", "010312");
#
#
INSERT INTO `geo_distritos` VALUES ("85", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "17", "Nieva", "010401");
#
#
INSERT INTO `geo_distritos` VALUES ("86", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "17", "El Cenepa", "010402");
#
#
INSERT INTO `geo_distritos` VALUES ("87", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "17", "Rio Santiago", "010403");
#
#
INSERT INTO `geo_distritos` VALUES ("88", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Lamud", "010501");
#
#
INSERT INTO `geo_distritos` VALUES ("89", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Camporredondo", "010502");
#
#
INSERT INTO `geo_distritos` VALUES ("90", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Cocabamba", "010503");
#
#
INSERT INTO `geo_distritos` VALUES ("91", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Colcamar", "010504");
#
#
INSERT INTO `geo_distritos` VALUES ("92", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Conila", "010505");
#
#
INSERT INTO `geo_distritos` VALUES ("93", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Inguilpata", "010506");
#
#
INSERT INTO `geo_distritos` VALUES ("94", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Longuita", "010507");
#
#
INSERT INTO `geo_distritos` VALUES ("95", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Lonya Chico", "010508");
#
#
INSERT INTO `geo_distritos` VALUES ("96", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Luya", "010509");
#
#
INSERT INTO `geo_distritos` VALUES ("97", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Luya Viejo", "010510");
#
#
INSERT INTO `geo_distritos` VALUES ("98", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Maria", "010511");
#
#
INSERT INTO `geo_distritos` VALUES ("99", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Ocalli", "010512");
#
#
INSERT INTO `geo_distritos` VALUES ("100", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Ocumal", "010513");
#
#
INSERT INTO `geo_distritos` VALUES ("101", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Pisuquia", "010514");
#
#
INSERT INTO `geo_distritos` VALUES ("102", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Providencia", "010515");
#
#
INSERT INTO `geo_distritos` VALUES ("103", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "San Cristobal", "010516");
#
#
INSERT INTO `geo_distritos` VALUES ("104", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "San Francisco Del Yeso", "010517");
#
#
INSERT INTO `geo_distritos` VALUES ("105", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "San Jeronimo", "010518");
#
#
INSERT INTO `geo_distritos` VALUES ("106", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "San Juan De Lopecancha", "010519");
#
#
INSERT INTO `geo_distritos` VALUES ("107", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Santa Catalina", "010520");
#
#
INSERT INTO `geo_distritos` VALUES ("108", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Santo Tomas", "010521");
#
#
INSERT INTO `geo_distritos` VALUES ("109", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Tingo", "010522");
#
#
INSERT INTO `geo_distritos` VALUES ("110", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "18", "Trita", "010523");
#
#
INSERT INTO `geo_distritos` VALUES ("111", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "San Nicolas", "010601");
#
#
INSERT INTO `geo_distritos` VALUES ("112", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Chirimoto", "010602");
#
#
INSERT INTO `geo_distritos` VALUES ("113", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Cochamal", "010603");
#
#
INSERT INTO `geo_distritos` VALUES ("114", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Huambo", "010604");
#
#
INSERT INTO `geo_distritos` VALUES ("115", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Limabamba", "010605");
#
#
INSERT INTO `geo_distritos` VALUES ("116", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Longar", "010606");
#
#
INSERT INTO `geo_distritos` VALUES ("117", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Mariscal Benavides", "010607");
#
#
INSERT INTO `geo_distritos` VALUES ("118", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Milpuc", "010608");
#
#
INSERT INTO `geo_distritos` VALUES ("119", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Omia", "010609");
#
#
INSERT INTO `geo_distritos` VALUES ("120", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Totora", "010611");
#
#
INSERT INTO `geo_distritos` VALUES ("121", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "19", "Vista Alegre", "010612");
#
#
INSERT INTO `geo_distritos` VALUES ("122", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "Bagua Grande", "010701");
#
#
INSERT INTO `geo_distritos` VALUES ("123", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "Cajaruro", "010702");
#
#
INSERT INTO `geo_distritos` VALUES ("124", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "Cumba", "010703");
#
#
INSERT INTO `geo_distritos` VALUES ("125", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "El Milagro", "010704");
#
#
INSERT INTO `geo_distritos` VALUES ("126", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "Jamalca", "010705");
#
#
INSERT INTO `geo_distritos` VALUES ("127", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "Lonya Grande", "010706");
#
#
INSERT INTO `geo_distritos` VALUES ("128", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "20", "Yamon", "010707");
#
#
INSERT INTO `geo_distritos` VALUES ("129", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Huaraz", "020101");
#
#
INSERT INTO `geo_distritos` VALUES ("130", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Cochabamba", "020102");
#
#
INSERT INTO `geo_distritos` VALUES ("131", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Colcabamba", "020103");
#
#
INSERT INTO `geo_distritos` VALUES ("132", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Huanchay", "020104");
#
#
INSERT INTO `geo_distritos` VALUES ("133", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Jangas", "020106");
#
#
INSERT INTO `geo_distritos` VALUES ("134", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "La Libertad", "020107");
#
#
INSERT INTO `geo_distritos` VALUES ("135", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Pampas", "020109");
#
#
INSERT INTO `geo_distritos` VALUES ("136", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Pariacoto", "020110");
#
#
INSERT INTO `geo_distritos` VALUES ("137", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Pira", "020111");
#
#
INSERT INTO `geo_distritos` VALUES ("138", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "21", "Tarica", "020112");
#
#
INSERT INTO `geo_distritos` VALUES ("139", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "22", "Aija", "020201");
#
#
INSERT INTO `geo_distritos` VALUES ("140", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "22", "Coris", "020202");
#
#
INSERT INTO `geo_distritos` VALUES ("141", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "22", "Huacllan", "020203");
#
#
INSERT INTO `geo_distritos` VALUES ("142", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "22", "La Merced", "020204");
#
#
INSERT INTO `geo_distritos` VALUES ("143", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "22", "Succha", "020205");
#
#
INSERT INTO `geo_distritos` VALUES ("144", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "23", "Llamellin", "020301");
#
#
INSERT INTO `geo_distritos` VALUES ("145", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "23", "Aczo", "020302");
#
#
INSERT INTO `geo_distritos` VALUES ("146", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "23", "Chaccho", "020303");
#
#
INSERT INTO `geo_distritos` VALUES ("147", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "23", "Chingas", "020304");
#
#
INSERT INTO `geo_distritos` VALUES ("148", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "23", "Mirgas", "020305");
#
#
INSERT INTO `geo_distritos` VALUES ("149", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "23", "San Juan De Rontoy", "020306");
#
#
INSERT INTO `geo_distritos` VALUES ("150", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "24", "Chacas", "020401");
#
#
INSERT INTO `geo_distritos` VALUES ("151", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "24", "Acochaca", "020402");
#
#
INSERT INTO `geo_distritos` VALUES ("152", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Chiquian", "020501");
#
#
INSERT INTO `geo_distritos` VALUES ("153", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Abelardo Pardo Lezameta", "020502");
#
#
INSERT INTO `geo_distritos` VALUES ("154", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Antonio Raymondi", "020503");
#
#
INSERT INTO `geo_distritos` VALUES ("155", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Aquia", "020504");
#
#
INSERT INTO `geo_distritos` VALUES ("156", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Cajacay", "020505");
#
#
INSERT INTO `geo_distritos` VALUES ("157", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Canis", "020506");
#
#
INSERT INTO `geo_distritos` VALUES ("158", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Colquioc", "020507");
#
#
INSERT INTO `geo_distritos` VALUES ("159", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Huallanca", "020508");
#
#
INSERT INTO `geo_distritos` VALUES ("160", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Huasta", "020509");
#
#
INSERT INTO `geo_distritos` VALUES ("161", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Huayllacayan", "020510");
#
#
INSERT INTO `geo_distritos` VALUES ("162", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "La Primavera", "020511");
#
#
INSERT INTO `geo_distritos` VALUES ("163", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Mangas", "020512");
#
#
INSERT INTO `geo_distritos` VALUES ("164", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Pacllon", "020513");
#
#
INSERT INTO `geo_distritos` VALUES ("165", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "San Miguel De Corpanqui", "020514");
#
#
INSERT INTO `geo_distritos` VALUES ("166", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "25", "Ticllos", "020515");
#
#
INSERT INTO `geo_distritos` VALUES ("167", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Carhuaz", "020601");
#
#
INSERT INTO `geo_distritos` VALUES ("168", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Acopampa", "020602");
#
#
INSERT INTO `geo_distritos` VALUES ("169", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Amashca", "020603");
#
#
INSERT INTO `geo_distritos` VALUES ("170", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Anta", "020604");
#
#
INSERT INTO `geo_distritos` VALUES ("171", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Ataquero", "020605");
#
#
INSERT INTO `geo_distritos` VALUES ("172", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Marcara", "020606");
#
#
INSERT INTO `geo_distritos` VALUES ("173", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Pariahuanca", "020607");
#
#
INSERT INTO `geo_distritos` VALUES ("174", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "San Miguel De Aco", "020608");
#
#
INSERT INTO `geo_distritos` VALUES ("175", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Shilla", "020609");
#
#
INSERT INTO `geo_distritos` VALUES ("176", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Tinco", "020610");
#
#
INSERT INTO `geo_distritos` VALUES ("177", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "26", "Yungar", "020611");
#
#
INSERT INTO `geo_distritos` VALUES ("178", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "27", "Yauya", "020703");
#
#
INSERT INTO `geo_distritos` VALUES ("179", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "28", "Casma", "020801");
#
#
INSERT INTO `geo_distritos` VALUES ("180", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "28", "Buena Vista Alta", "020802");
#
#
INSERT INTO `geo_distritos` VALUES ("181", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "28", "Comandante Noel", "020803");
#
#
INSERT INTO `geo_distritos` VALUES ("182", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "28", "Yautan", "020804");
#
#
INSERT INTO `geo_distritos` VALUES ("183", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "Corongo", "020901");
#
#
INSERT INTO `geo_distritos` VALUES ("184", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "Aco", "020902");
#
#
INSERT INTO `geo_distritos` VALUES ("185", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "Bambas", "020903");
#
#
INSERT INTO `geo_distritos` VALUES ("186", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "Cusca", "020904");
#
#
INSERT INTO `geo_distritos` VALUES ("187", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "La Pampa", "020905");
#
#
INSERT INTO `geo_distritos` VALUES ("188", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "Yanac", "020906");
#
#
INSERT INTO `geo_distritos` VALUES ("189", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "29", "Yupan", "020907");
#
#
INSERT INTO `geo_distritos` VALUES ("190", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Huari", "021001");
#
#
INSERT INTO `geo_distritos` VALUES ("191", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Anra", "021002");
#
#
INSERT INTO `geo_distritos` VALUES ("192", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Cajay", "021003");
#
#
INSERT INTO `geo_distritos` VALUES ("193", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Chavin De Huantar", "021004");
#
#
INSERT INTO `geo_distritos` VALUES ("194", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Huacachi", "021005");
#
#
INSERT INTO `geo_distritos` VALUES ("195", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Huacchis", "021006");
#
#
INSERT INTO `geo_distritos` VALUES ("196", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Huachis", "021007");
#
#
INSERT INTO `geo_distritos` VALUES ("197", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Huantar", "021008");
#
#
INSERT INTO `geo_distritos` VALUES ("198", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Masin", "021009");
#
#
INSERT INTO `geo_distritos` VALUES ("199", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Paucas", "021010");
#
#
INSERT INTO `geo_distritos` VALUES ("200", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Ponto", "021011");
#
#
INSERT INTO `geo_distritos` VALUES ("201", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Rahuapampa", "021012");
#
#
INSERT INTO `geo_distritos` VALUES ("202", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Rapayan", "021013");
#
#
INSERT INTO `geo_distritos` VALUES ("203", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "San Marcos", "021014");
#
#
INSERT INTO `geo_distritos` VALUES ("204", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "San Pedro De Chana", "021015");
#
#
INSERT INTO `geo_distritos` VALUES ("205", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "30", "Uco", "021016");
#
#
INSERT INTO `geo_distritos` VALUES ("206", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "31", "Huarmey", "021101");
#
#
INSERT INTO `geo_distritos` VALUES ("207", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "31", "Cochapeti", "021102");
#
#
INSERT INTO `geo_distritos` VALUES ("208", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "31", "Culebras", "021103");
#
#
INSERT INTO `geo_distritos` VALUES ("209", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "31", "Huayan", "021104");
#
#
INSERT INTO `geo_distritos` VALUES ("210", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "31", "Malvas", "021105");
#
#
INSERT INTO `geo_distritos` VALUES ("211", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Caraz", "021201");
#
#
INSERT INTO `geo_distritos` VALUES ("212", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Huata", "021203");
#
#
INSERT INTO `geo_distritos` VALUES ("213", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Huaylas", "021204");
#
#
INSERT INTO `geo_distritos` VALUES ("214", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Mato", "021205");
#
#
INSERT INTO `geo_distritos` VALUES ("215", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Pamparomas", "021206");
#
#
INSERT INTO `geo_distritos` VALUES ("216", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Santa Cruz", "021208");
#
#
INSERT INTO `geo_distritos` VALUES ("217", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Santo Toribio", "021209");
#
#
INSERT INTO `geo_distritos` VALUES ("218", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "32", "Yuracmarca", "021210");
#
#
INSERT INTO `geo_distritos` VALUES ("219", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Piscobamba", "021301");
#
#
INSERT INTO `geo_distritos` VALUES ("220", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Casca", "021302");
#
#
INSERT INTO `geo_distritos` VALUES ("221", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Eleazar Guzman Barron", "021303");
#
#
INSERT INTO `geo_distritos` VALUES ("222", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Fidel Olivas Escudero", "021304");
#
#
INSERT INTO `geo_distritos` VALUES ("223", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Llama", "021305");
#
#
INSERT INTO `geo_distritos` VALUES ("224", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Llumpa", "021306");
#
#
INSERT INTO `geo_distritos` VALUES ("225", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Lucma", "021307");
#
#
INSERT INTO `geo_distritos` VALUES ("226", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "33", "Musga", "021308");
#
#
INSERT INTO `geo_distritos` VALUES ("227", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Ocros", "021401");
#
#
INSERT INTO `geo_distritos` VALUES ("228", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Acas", "021402");
#
#
INSERT INTO `geo_distritos` VALUES ("229", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Cajamarquilla", "021403");
#
#
INSERT INTO `geo_distritos` VALUES ("230", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Carhuapampa", "021404");
#
#
INSERT INTO `geo_distritos` VALUES ("231", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Cochas", "021405");
#
#
INSERT INTO `geo_distritos` VALUES ("232", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Congas", "021406");
#
#
INSERT INTO `geo_distritos` VALUES ("233", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Llipa", "021407");
#
#
INSERT INTO `geo_distritos` VALUES ("234", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "San Cristobal De Rajan", "021408");
#
#
INSERT INTO `geo_distritos` VALUES ("235", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "San Pedro", "021409");
#
#
INSERT INTO `geo_distritos` VALUES ("236", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "34", "Santiago De Chilcas", "021410");
#
#
INSERT INTO `geo_distritos` VALUES ("237", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Cabana", "021501");
#
#
INSERT INTO `geo_distritos` VALUES ("238", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Bolognesi", "021502");
#
#
INSERT INTO `geo_distritos` VALUES ("239", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Conchucos", "021503");
#
#
INSERT INTO `geo_distritos` VALUES ("240", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Huacaschuque", "021504");
#
#
INSERT INTO `geo_distritos` VALUES ("241", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Huandoval", "021505");
#
#
INSERT INTO `geo_distritos` VALUES ("242", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Lacabamba", "021506");
#
#
INSERT INTO `geo_distritos` VALUES ("243", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Llapo", "021507");
#
#
INSERT INTO `geo_distritos` VALUES ("244", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Pallasca", "021508");
#
#
INSERT INTO `geo_distritos` VALUES ("245", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "35", "Tauca", "021511");
#
#
INSERT INTO `geo_distritos` VALUES ("246", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "36", "Pomabamba", "021601");
#
#
INSERT INTO `geo_distritos` VALUES ("247", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "36", "Huayllan", "021602");
#
#
INSERT INTO `geo_distritos` VALUES ("248", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "36", "Parobamba", "021603");
#
#
INSERT INTO `geo_distritos` VALUES ("249", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "36", "Quinuabamba", "021604");
#
#
INSERT INTO `geo_distritos` VALUES ("250", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Recuay", "021701");
#
#
INSERT INTO `geo_distritos` VALUES ("251", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Catac", "021702");
#
#
INSERT INTO `geo_distritos` VALUES ("252", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Cotaparaco", "021703");
#
#
INSERT INTO `geo_distritos` VALUES ("253", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Huayllapampa", "021704");
#
#
INSERT INTO `geo_distritos` VALUES ("254", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Llacllin", "021705");
#
#
INSERT INTO `geo_distritos` VALUES ("255", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Marca", "021706");
#
#
INSERT INTO `geo_distritos` VALUES ("256", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Pampas Chico", "021707");
#
#
INSERT INTO `geo_distritos` VALUES ("257", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Pararin", "021708");
#
#
INSERT INTO `geo_distritos` VALUES ("258", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Tapacocha", "021709");
#
#
INSERT INTO `geo_distritos` VALUES ("259", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "37", "Ticapampa", "021710");
#
#
INSERT INTO `geo_distritos` VALUES ("260", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Chimbote", "021801");
#
#
INSERT INTO `geo_distritos` VALUES ("261", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Caceres Del Peru", "021802");
#
#
INSERT INTO `geo_distritos` VALUES ("262", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Coishco", "021803");
#
#
INSERT INTO `geo_distritos` VALUES ("263", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Macate", "021804");
#
#
INSERT INTO `geo_distritos` VALUES ("264", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Moro", "021805");
#
#
INSERT INTO `geo_distritos` VALUES ("265", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Nepeña", "021806");
#
#
INSERT INTO `geo_distritos` VALUES ("266", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Samanco", "021807");
#
#
INSERT INTO `geo_distritos` VALUES ("267", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Santa", "021808");
#
#
INSERT INTO `geo_distritos` VALUES ("268", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "38", "Nuevo Chimbote", "021809");
#
#
INSERT INTO `geo_distritos` VALUES ("269", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Sihuas", "021901");
#
#
INSERT INTO `geo_distritos` VALUES ("270", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Acobamba", "021902");
#
#
INSERT INTO `geo_distritos` VALUES ("271", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Alfonso Ugarte", "021903");
#
#
INSERT INTO `geo_distritos` VALUES ("272", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Cashapampa", "021904");
#
#
INSERT INTO `geo_distritos` VALUES ("273", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Chingalpo", "021905");
#
#
INSERT INTO `geo_distritos` VALUES ("274", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Huayllabamba", "021906");
#
#
INSERT INTO `geo_distritos` VALUES ("275", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Quiches", "021907");
#
#
INSERT INTO `geo_distritos` VALUES ("276", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Ragash", "021908");
#
#
INSERT INTO `geo_distritos` VALUES ("277", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "San Juan", "021909");
#
#
INSERT INTO `geo_distritos` VALUES ("278", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "39", "Sicsibamba", "021910");
#
#
INSERT INTO `geo_distritos` VALUES ("279", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Yungay", "022001");
#
#
INSERT INTO `geo_distritos` VALUES ("280", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Cascapara", "022002");
#
#
INSERT INTO `geo_distritos` VALUES ("281", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Mancos", "022003");
#
#
INSERT INTO `geo_distritos` VALUES ("282", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Matacoto", "022004");
#
#
INSERT INTO `geo_distritos` VALUES ("283", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Quillo", "022005");
#
#
INSERT INTO `geo_distritos` VALUES ("284", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Ranrahirca", "022006");
#
#
INSERT INTO `geo_distritos` VALUES ("285", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Shupluy", "022007");
#
#
INSERT INTO `geo_distritos` VALUES ("286", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "40", "Yanama", "022008");
#
#
INSERT INTO `geo_distritos` VALUES ("287", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Abancay", "030101");
#
#
INSERT INTO `geo_distritos` VALUES ("288", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Chacoche", "030102");
#
#
INSERT INTO `geo_distritos` VALUES ("289", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Circa", "030103");
#
#
INSERT INTO `geo_distritos` VALUES ("290", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Curahuasi", "030104");
#
#
INSERT INTO `geo_distritos` VALUES ("291", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Huanipaca", "030105");
#
#
INSERT INTO `geo_distritos` VALUES ("292", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Lambrama", "030106");
#
#
INSERT INTO `geo_distritos` VALUES ("293", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Pichirhua", "030107");
#
#
INSERT INTO `geo_distritos` VALUES ("294", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "San Pedro De Cachora", "030108");
#
#
INSERT INTO `geo_distritos` VALUES ("295", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "41", "Tamburco", "030109");
#
#
INSERT INTO `geo_distritos` VALUES ("296", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Andahuaylas", "030201");
#
#
INSERT INTO `geo_distritos` VALUES ("297", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Andarapa", "030202");
#
#
INSERT INTO `geo_distritos` VALUES ("298", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Chiara", "030203");
#
#
INSERT INTO `geo_distritos` VALUES ("299", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Huancarama", "030204");
#
#
INSERT INTO `geo_distritos` VALUES ("300", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Huancaray", "030205");
#
#
INSERT INTO `geo_distritos` VALUES ("301", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Huayana", "030206");
#
#
INSERT INTO `geo_distritos` VALUES ("302", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Kishuara", "030207");
#
#
INSERT INTO `geo_distritos` VALUES ("303", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Pacobamba", "030208");
#
#
INSERT INTO `geo_distritos` VALUES ("304", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Pacucha", "030209");
#
#
INSERT INTO `geo_distritos` VALUES ("305", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Pampachiri", "030210");
#
#
INSERT INTO `geo_distritos` VALUES ("306", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Pomacocha", "030211");
#
#
INSERT INTO `geo_distritos` VALUES ("307", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "San Antonio De Cachi", "030212");
#
#
INSERT INTO `geo_distritos` VALUES ("308", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "San Miguel De Chaccrampa", "030214");
#
#
INSERT INTO `geo_distritos` VALUES ("309", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Santa Maria De Chicmo", "030215");
#
#
INSERT INTO `geo_distritos` VALUES ("310", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Talavera", "030216");
#
#
INSERT INTO `geo_distritos` VALUES ("311", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Tumay Huaraca", "030217");
#
#
INSERT INTO `geo_distritos` VALUES ("312", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Turpo", "030218");
#
#
INSERT INTO `geo_distritos` VALUES ("313", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "42", "Kaquiabamba", "030219");
#
#
INSERT INTO `geo_distritos` VALUES ("314", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "Antabamba", "030301");
#
#
INSERT INTO `geo_distritos` VALUES ("315", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "El Oro", "030302");
#
#
INSERT INTO `geo_distritos` VALUES ("316", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "Huaquirca", "030303");
#
#
INSERT INTO `geo_distritos` VALUES ("317", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "Juan Espinoza Medrano", "030304");
#
#
INSERT INTO `geo_distritos` VALUES ("318", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "Oropesa", "030305");
#
#
INSERT INTO `geo_distritos` VALUES ("319", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "Pachaconas", "030306");
#
#
INSERT INTO `geo_distritos` VALUES ("320", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "43", "Sabaino", "030307");
#
#
INSERT INTO `geo_distritos` VALUES ("321", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Chalhuanca", "030401");
#
#
INSERT INTO `geo_distritos` VALUES ("322", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Capaya", "030402");
#
#
INSERT INTO `geo_distritos` VALUES ("323", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Caraybamba", "030403");
#
#
INSERT INTO `geo_distritos` VALUES ("324", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Chapimarca", "030404");
#
#
INSERT INTO `geo_distritos` VALUES ("325", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Cotaruse", "030406");
#
#
INSERT INTO `geo_distritos` VALUES ("326", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Huayllo", "030407");
#
#
INSERT INTO `geo_distritos` VALUES ("327", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Justo Apu Sahuaraura", "030408");
#
#
INSERT INTO `geo_distritos` VALUES ("328", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Lucre", "030409");
#
#
INSERT INTO `geo_distritos` VALUES ("329", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Pocohuanca", "030410");
#
#
INSERT INTO `geo_distritos` VALUES ("330", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "San Juan De Chacña", "030411");
#
#
INSERT INTO `geo_distritos` VALUES ("331", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Sañayca", "030412");
#
#
INSERT INTO `geo_distritos` VALUES ("332", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Soraya", "030413");
#
#
INSERT INTO `geo_distritos` VALUES ("333", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Tapairihua", "030414");
#
#
INSERT INTO `geo_distritos` VALUES ("334", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Tintay", "030415");
#
#
INSERT INTO `geo_distritos` VALUES ("335", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Toraya", "030416");
#
#
INSERT INTO `geo_distritos` VALUES ("336", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "44", "Yanaca", "030417");
#
#
INSERT INTO `geo_distritos` VALUES ("337", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "45", "Tambobamba", "030501");
#
#
INSERT INTO `geo_distritos` VALUES ("338", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "45", "Cotabambas", "030502");
#
#
INSERT INTO `geo_distritos` VALUES ("339", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "45", "Coyllurqui", "030503");
#
#
INSERT INTO `geo_distritos` VALUES ("340", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "45", "Haquira", "030504");
#
#
INSERT INTO `geo_distritos` VALUES ("341", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "45", "Mara", "030505");
#
#
INSERT INTO `geo_distritos` VALUES ("342", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "45", "Challhuahuacho", "030506");
#
#
INSERT INTO `geo_distritos` VALUES ("343", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Chincheros", "030601");
#
#
INSERT INTO `geo_distritos` VALUES ("344", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Anco_Huallo", "030602");
#
#
INSERT INTO `geo_distritos` VALUES ("345", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Cocharcas", "030603");
#
#
INSERT INTO `geo_distritos` VALUES ("346", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Huaccana", "030604");
#
#
INSERT INTO `geo_distritos` VALUES ("347", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Ocobamba", "030605");
#
#
INSERT INTO `geo_distritos` VALUES ("348", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Ongoy", "030606");
#
#
INSERT INTO `geo_distritos` VALUES ("349", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Uranmarca", "030607");
#
#
INSERT INTO `geo_distritos` VALUES ("350", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "46", "Ranracancha", "030608");
#
#
INSERT INTO `geo_distritos` VALUES ("351", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Chuquibambilla", "030701");
#
#
INSERT INTO `geo_distritos` VALUES ("352", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Curpahuasi", "030702");
#
#
INSERT INTO `geo_distritos` VALUES ("353", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Gamarra", "030703");
#
#
INSERT INTO `geo_distritos` VALUES ("354", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Huayllati", "030704");
#
#
INSERT INTO `geo_distritos` VALUES ("355", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Mamara", "030705");
#
#
INSERT INTO `geo_distritos` VALUES ("356", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Micaela Bastidas", "030706");
#
#
INSERT INTO `geo_distritos` VALUES ("357", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Pataypampa", "030707");
#
#
INSERT INTO `geo_distritos` VALUES ("358", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Progreso", "030708");
#
#
INSERT INTO `geo_distritos` VALUES ("359", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "San Antonio", "030709");
#
#
INSERT INTO `geo_distritos` VALUES ("360", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Turpay", "030711");
#
#
INSERT INTO `geo_distritos` VALUES ("361", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Vilcabamba", "030712");
#
#
INSERT INTO `geo_distritos` VALUES ("362", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Virundo", "030713");
#
#
INSERT INTO `geo_distritos` VALUES ("363", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "47", "Curasco", "030714");
#
#
INSERT INTO `geo_distritos` VALUES ("364", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Arequipa", "040101");
#
#
INSERT INTO `geo_distritos` VALUES ("365", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Alto Selva Alegre", "040102");
#
#
INSERT INTO `geo_distritos` VALUES ("366", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Cayma", "040103");
#
#
INSERT INTO `geo_distritos` VALUES ("367", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Cerro Colorado", "040104");
#
#
INSERT INTO `geo_distritos` VALUES ("368", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Characato", "040105");
#
#
INSERT INTO `geo_distritos` VALUES ("369", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Chiguata", "040106");
#
#
INSERT INTO `geo_distritos` VALUES ("370", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Jacobo Hunter", "040107");
#
#
INSERT INTO `geo_distritos` VALUES ("371", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "La Joya", "040108");
#
#
INSERT INTO `geo_distritos` VALUES ("372", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Mariano Melgar", "040109");
#
#
INSERT INTO `geo_distritos` VALUES ("373", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Mollebaya", "040111");
#
#
INSERT INTO `geo_distritos` VALUES ("374", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Paucarpata", "040112");
#
#
INSERT INTO `geo_distritos` VALUES ("375", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Pocsi", "040113");
#
#
INSERT INTO `geo_distritos` VALUES ("376", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Polobaya", "040114");
#
#
INSERT INTO `geo_distritos` VALUES ("377", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Quequeña", "040115");
#
#
INSERT INTO `geo_distritos` VALUES ("378", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Sabandia", "040116");
#
#
INSERT INTO `geo_distritos` VALUES ("379", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Sachaca", "040117");
#
#
INSERT INTO `geo_distritos` VALUES ("380", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "San Juan De Siguas", "040118");
#
#
INSERT INTO `geo_distritos` VALUES ("381", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "San Juan De Tarucani", "040119");
#
#
INSERT INTO `geo_distritos` VALUES ("382", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Santa Isabel De Siguas", "040120");
#
#
INSERT INTO `geo_distritos` VALUES ("383", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Santa Rita De Siguas", "040121");
#
#
INSERT INTO `geo_distritos` VALUES ("384", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Socabaya", "040122");
#
#
INSERT INTO `geo_distritos` VALUES ("385", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Tiabaya", "040123");
#
#
INSERT INTO `geo_distritos` VALUES ("386", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Uchumayo", "040124");
#
#
INSERT INTO `geo_distritos` VALUES ("387", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Vitor", "040125");
#
#
INSERT INTO `geo_distritos` VALUES ("388", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Yanahuara", "040126");
#
#
INSERT INTO `geo_distritos` VALUES ("389", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Yarabamba", "040127");
#
#
INSERT INTO `geo_distritos` VALUES ("390", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Yura", "040128");
#
#
INSERT INTO `geo_distritos` VALUES ("391", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "48", "Jose Luis Bustamante Y Rivero", "040129");
#
#
INSERT INTO `geo_distritos` VALUES ("392", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Camana", "040201");
#
#
INSERT INTO `geo_distritos` VALUES ("393", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Jose Maria Quimper", "040202");
#
#
INSERT INTO `geo_distritos` VALUES ("394", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Mariano Nicolas Valcarcel", "040203");
#
#
INSERT INTO `geo_distritos` VALUES ("395", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Mariscal Caceres", "040204");
#
#
INSERT INTO `geo_distritos` VALUES ("396", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Nicolas De Pierola", "040205");
#
#
INSERT INTO `geo_distritos` VALUES ("397", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Ocoña", "040206");
#
#
INSERT INTO `geo_distritos` VALUES ("398", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Quilca", "040207");
#
#
INSERT INTO `geo_distritos` VALUES ("399", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "49", "Samuel Pastor", "040208");
#
#
INSERT INTO `geo_distritos` VALUES ("400", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Caraveli", "040301");
#
#
INSERT INTO `geo_distritos` VALUES ("401", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Acari", "040302");
#
#
INSERT INTO `geo_distritos` VALUES ("402", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Atico", "040303");
#
#
INSERT INTO `geo_distritos` VALUES ("403", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Atiquipa", "040304");
#
#
INSERT INTO `geo_distritos` VALUES ("404", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Bella Union", "040305");
#
#
INSERT INTO `geo_distritos` VALUES ("405", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Cahuacho", "040306");
#
#
INSERT INTO `geo_distritos` VALUES ("406", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Chala", "040307");
#
#
INSERT INTO `geo_distritos` VALUES ("407", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Chaparra", "040308");
#
#
INSERT INTO `geo_distritos` VALUES ("408", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Huanuhuanu", "040309");
#
#
INSERT INTO `geo_distritos` VALUES ("409", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Jaqui", "040310");
#
#
INSERT INTO `geo_distritos` VALUES ("410", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Lomas", "040311");
#
#
INSERT INTO `geo_distritos` VALUES ("411", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Quicacha", "040312");
#
#
INSERT INTO `geo_distritos` VALUES ("412", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "50", "Yauca", "040313");
#
#
INSERT INTO `geo_distritos` VALUES ("413", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Aplao", "040401");
#
#
INSERT INTO `geo_distritos` VALUES ("414", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Andagua", "040402");
#
#
INSERT INTO `geo_distritos` VALUES ("415", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Ayo", "040403");
#
#
INSERT INTO `geo_distritos` VALUES ("416", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Chachas", "040404");
#
#
INSERT INTO `geo_distritos` VALUES ("417", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Chilcaymarca", "040405");
#
#
INSERT INTO `geo_distritos` VALUES ("418", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Choco", "040406");
#
#
INSERT INTO `geo_distritos` VALUES ("419", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Huancarqui", "040407");
#
#
INSERT INTO `geo_distritos` VALUES ("420", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Machaguay", "040408");
#
#
INSERT INTO `geo_distritos` VALUES ("421", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Orcopampa", "040409");
#
#
INSERT INTO `geo_distritos` VALUES ("422", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Pampacolca", "040410");
#
#
INSERT INTO `geo_distritos` VALUES ("423", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Tipan", "040411");
#
#
INSERT INTO `geo_distritos` VALUES ("424", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Uñon", "040412");
#
#
INSERT INTO `geo_distritos` VALUES ("425", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Uraca", "040413");
#
#
INSERT INTO `geo_distritos` VALUES ("426", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "51", "Viraco", "040414");
#
#
INSERT INTO `geo_distritos` VALUES ("427", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Chivay", "040501");
#
#
INSERT INTO `geo_distritos` VALUES ("428", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Achoma", "040502");
#
#
INSERT INTO `geo_distritos` VALUES ("429", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Cabanaconde", "040503");
#
#
INSERT INTO `geo_distritos` VALUES ("430", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Callalli", "040504");
#
#
INSERT INTO `geo_distritos` VALUES ("431", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Caylloma", "040505");
#
#
INSERT INTO `geo_distritos` VALUES ("432", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Coporaque", "040506");
#
#
INSERT INTO `geo_distritos` VALUES ("433", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Huanca", "040508");
#
#
INSERT INTO `geo_distritos` VALUES ("434", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Ichupampa", "040509");
#
#
INSERT INTO `geo_distritos` VALUES ("435", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Lari", "040510");
#
#
INSERT INTO `geo_distritos` VALUES ("436", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Lluta", "040511");
#
#
INSERT INTO `geo_distritos` VALUES ("437", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Maca", "040512");
#
#
INSERT INTO `geo_distritos` VALUES ("438", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Madrigal", "040513");
#
#
INSERT INTO `geo_distritos` VALUES ("439", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "San Antonio De Chuca", "040514");
#
#
INSERT INTO `geo_distritos` VALUES ("440", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Sibayo", "040515");
#
#
INSERT INTO `geo_distritos` VALUES ("441", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Tapay", "040516");
#
#
INSERT INTO `geo_distritos` VALUES ("442", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Tisco", "040517");
#
#
INSERT INTO `geo_distritos` VALUES ("443", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Tuti", "040518");
#
#
INSERT INTO `geo_distritos` VALUES ("444", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Yanque", "040519");
#
#
INSERT INTO `geo_distritos` VALUES ("445", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "52", "Majes", "040520");
#
#
INSERT INTO `geo_distritos` VALUES ("446", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Andaray", "040602");
#
#
INSERT INTO `geo_distritos` VALUES ("447", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Cayarani", "040603");
#
#
INSERT INTO `geo_distritos` VALUES ("448", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Chichas", "040604");
#
#
INSERT INTO `geo_distritos` VALUES ("449", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Iray", "040605");
#
#
INSERT INTO `geo_distritos` VALUES ("450", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Rio Grande", "040606");
#
#
INSERT INTO `geo_distritos` VALUES ("451", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Salamanca", "040607");
#
#
INSERT INTO `geo_distritos` VALUES ("452", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "53", "Yanaquihua", "040608");
#
#
INSERT INTO `geo_distritos` VALUES ("453", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "54", "Mollendo", "040701");
#
#
INSERT INTO `geo_distritos` VALUES ("454", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "54", "Cocachacra", "040702");
#
#
INSERT INTO `geo_distritos` VALUES ("455", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "54", "Dean Valdivia", "040703");
#
#
INSERT INTO `geo_distritos` VALUES ("456", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "54", "Islay", "040704");
#
#
INSERT INTO `geo_distritos` VALUES ("457", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "54", "Mejia", "040705");
#
#
INSERT INTO `geo_distritos` VALUES ("458", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "54", "Punta De Bombon", "040706");
#
#
INSERT INTO `geo_distritos` VALUES ("459", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Cotahuasi", "040801");
#
#
INSERT INTO `geo_distritos` VALUES ("460", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Alca", "040802");
#
#
INSERT INTO `geo_distritos` VALUES ("461", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Charcana", "040803");
#
#
INSERT INTO `geo_distritos` VALUES ("462", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Huaynacotas", "040804");
#
#
INSERT INTO `geo_distritos` VALUES ("463", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Pampamarca", "040805");
#
#
INSERT INTO `geo_distritos` VALUES ("464", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Puyca", "040806");
#
#
INSERT INTO `geo_distritos` VALUES ("465", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Quechualla", "040807");
#
#
INSERT INTO `geo_distritos` VALUES ("466", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Sayla", "040808");
#
#
INSERT INTO `geo_distritos` VALUES ("467", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Tauria", "040809");
#
#
INSERT INTO `geo_distritos` VALUES ("468", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Tomepampa", "040810");
#
#
INSERT INTO `geo_distritos` VALUES ("469", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "55", "Toro", "040811");
#
#
INSERT INTO `geo_distritos` VALUES ("470", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Ayacucho", "050101");
#
#
INSERT INTO `geo_distritos` VALUES ("471", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Acocro", "050102");
#
#
INSERT INTO `geo_distritos` VALUES ("472", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Acos Vinchos", "050103");
#
#
INSERT INTO `geo_distritos` VALUES ("473", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Carmen Alto", "050104");
#
#
INSERT INTO `geo_distritos` VALUES ("474", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Pacaycasa", "050107");
#
#
INSERT INTO `geo_distritos` VALUES ("475", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Quinua", "050108");
#
#
INSERT INTO `geo_distritos` VALUES ("476", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "San Jose De Ticllas", "050109");
#
#
INSERT INTO `geo_distritos` VALUES ("477", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "San Juan Bautista", "050110");
#
#
INSERT INTO `geo_distritos` VALUES ("478", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Santiago De Pischa", "050111");
#
#
INSERT INTO `geo_distritos` VALUES ("479", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Socos", "050112");
#
#
INSERT INTO `geo_distritos` VALUES ("480", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Tambillo", "050113");
#
#
INSERT INTO `geo_distritos` VALUES ("481", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Vinchos", "050114");
#
#
INSERT INTO `geo_distritos` VALUES ("482", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "56", "Jesus Nazareno", "050115");
#
#
INSERT INTO `geo_distritos` VALUES ("483", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "57", "Cangallo", "050201");
#
#
INSERT INTO `geo_distritos` VALUES ("484", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "57", "Chuschi", "050202");
#
#
INSERT INTO `geo_distritos` VALUES ("485", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "57", "Los Morochucos", "050203");
#
#
INSERT INTO `geo_distritos` VALUES ("486", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "57", "Maria Parado De Bellido", "050204");
#
#
INSERT INTO `geo_distritos` VALUES ("487", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "57", "Paras", "050205");
#
#
INSERT INTO `geo_distritos` VALUES ("488", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "57", "Totos", "050206");
#
#
INSERT INTO `geo_distritos` VALUES ("489", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "58", "Sancos", "050301");
#
#
INSERT INTO `geo_distritos` VALUES ("490", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "58", "Carapo", "050302");
#
#
INSERT INTO `geo_distritos` VALUES ("491", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "58", "Sacsamarca", "050303");
#
#
INSERT INTO `geo_distritos` VALUES ("492", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "58", "Santiago De Lucanamarca", "050304");
#
#
INSERT INTO `geo_distritos` VALUES ("493", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Huanta", "050401");
#
#
INSERT INTO `geo_distritos` VALUES ("494", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Ayahuanco", "050402");
#
#
INSERT INTO `geo_distritos` VALUES ("495", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Huamanguilla", "050403");
#
#
INSERT INTO `geo_distritos` VALUES ("496", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Iguain", "050404");
#
#
INSERT INTO `geo_distritos` VALUES ("497", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Luricocha", "050405");
#
#
INSERT INTO `geo_distritos` VALUES ("498", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Santillana", "050406");
#
#
INSERT INTO `geo_distritos` VALUES ("499", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Sivia", "050407");
#
#
INSERT INTO `geo_distritos` VALUES ("500", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "59", "Llochegua", "050408");
#
#
INSERT INTO `geo_distritos` VALUES ("501", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "60", "Anco", "050502");
#
#
INSERT INTO `geo_distritos` VALUES ("502", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "60", "Ayna", "050503");
#
#
INSERT INTO `geo_distritos` VALUES ("503", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "60", "Chilcas", "050504");
#
#
INSERT INTO `geo_distritos` VALUES ("504", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "60", "Chungui", "050505");
#
#
INSERT INTO `geo_distritos` VALUES ("505", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "60", "Luis Carranza", "050506");
#
#
INSERT INTO `geo_distritos` VALUES ("506", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "60", "Tambo", "050508");
#
#
INSERT INTO `geo_distritos` VALUES ("507", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Puquio", "050601");
#
#
INSERT INTO `geo_distritos` VALUES ("508", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Aucara", "050602");
#
#
INSERT INTO `geo_distritos` VALUES ("509", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Carmen Salcedo", "050604");
#
#
INSERT INTO `geo_distritos` VALUES ("510", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Chaviña", "050605");
#
#
INSERT INTO `geo_distritos` VALUES ("511", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Chipao", "050606");
#
#
INSERT INTO `geo_distritos` VALUES ("512", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Huac-Huas", "050607");
#
#
INSERT INTO `geo_distritos` VALUES ("513", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Laramate", "050608");
#
#
INSERT INTO `geo_distritos` VALUES ("514", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Leoncio Prado", "050609");
#
#
INSERT INTO `geo_distritos` VALUES ("515", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Llauta", "050610");
#
#
INSERT INTO `geo_distritos` VALUES ("516", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Lucanas", "050611");
#
#
INSERT INTO `geo_distritos` VALUES ("517", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Ocaña", "050612");
#
#
INSERT INTO `geo_distritos` VALUES ("518", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Otoca", "050613");
#
#
INSERT INTO `geo_distritos` VALUES ("519", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Saisa", "050614");
#
#
INSERT INTO `geo_distritos` VALUES ("520", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "San Pedro De Palco", "050618");
#
#
INSERT INTO `geo_distritos` VALUES ("521", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Santa Ana De Huaycahuacho", "050620");
#
#
INSERT INTO `geo_distritos` VALUES ("522", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "61", "Santa Lucia", "050621");
#
#
INSERT INTO `geo_distritos` VALUES ("523", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Coracora", "050701");
#
#
INSERT INTO `geo_distritos` VALUES ("524", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Chumpi", "050702");
#
#
INSERT INTO `geo_distritos` VALUES ("525", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Coronel Castañeda", "050703");
#
#
INSERT INTO `geo_distritos` VALUES ("526", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Pacapausa", "050704");
#
#
INSERT INTO `geo_distritos` VALUES ("527", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Pullo", "050705");
#
#
INSERT INTO `geo_distritos` VALUES ("528", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Puyusca", "050706");
#
#
INSERT INTO `geo_distritos` VALUES ("529", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "San Francisco De Ravacayco", "050707");
#
#
INSERT INTO `geo_distritos` VALUES ("530", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "62", "Upahuacho", "050708");
#
#
INSERT INTO `geo_distritos` VALUES ("531", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Pausa", "050801");
#
#
INSERT INTO `geo_distritos` VALUES ("532", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Colta", "050802");
#
#
INSERT INTO `geo_distritos` VALUES ("533", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Corculla", "050803");
#
#
INSERT INTO `geo_distritos` VALUES ("534", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Lampa", "050804");
#
#
INSERT INTO `geo_distritos` VALUES ("535", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Marcabamba", "050805");
#
#
INSERT INTO `geo_distritos` VALUES ("536", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Oyolo", "050806");
#
#
INSERT INTO `geo_distritos` VALUES ("537", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Pararca", "050807");
#
#
INSERT INTO `geo_distritos` VALUES ("538", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "San Javier De Alpabamba", "050808");
#
#
INSERT INTO `geo_distritos` VALUES ("539", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "San Jose De Ushua", "050809");
#
#
INSERT INTO `geo_distritos` VALUES ("540", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "63", "Sara Sara", "050810");
#
#
INSERT INTO `geo_distritos` VALUES ("541", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Querobamba", "050901");
#
#
INSERT INTO `geo_distritos` VALUES ("542", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Belen", "050902");
#
#
INSERT INTO `geo_distritos` VALUES ("543", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Chalcos", "050903");
#
#
INSERT INTO `geo_distritos` VALUES ("544", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Chilcayoc", "050904");
#
#
INSERT INTO `geo_distritos` VALUES ("545", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Huacaña", "050905");
#
#
INSERT INTO `geo_distritos` VALUES ("546", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Morcolla", "050906");
#
#
INSERT INTO `geo_distritos` VALUES ("547", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Paico", "050907");
#
#
INSERT INTO `geo_distritos` VALUES ("548", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "San Pedro De Larcay", "050908");
#
#
INSERT INTO `geo_distritos` VALUES ("549", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "San Salvador De Quije", "050909");
#
#
INSERT INTO `geo_distritos` VALUES ("550", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Santiago De Paucaray", "050910");
#
#
INSERT INTO `geo_distritos` VALUES ("551", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "64", "Soras", "050911");
#
#
INSERT INTO `geo_distritos` VALUES ("552", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Huancapi", "051001");
#
#
INSERT INTO `geo_distritos` VALUES ("553", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Alcamenca", "051002");
#
#
INSERT INTO `geo_distritos` VALUES ("554", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Apongo", "051003");
#
#
INSERT INTO `geo_distritos` VALUES ("555", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Asquipata", "051004");
#
#
INSERT INTO `geo_distritos` VALUES ("556", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Canaria", "051005");
#
#
INSERT INTO `geo_distritos` VALUES ("557", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Cayara", "051006");
#
#
INSERT INTO `geo_distritos` VALUES ("558", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Colca", "051007");
#
#
INSERT INTO `geo_distritos` VALUES ("559", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Huamanquiquia", "051008");
#
#
INSERT INTO `geo_distritos` VALUES ("560", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Huancaraylla", "051009");
#
#
INSERT INTO `geo_distritos` VALUES ("561", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Huaya", "051010");
#
#
INSERT INTO `geo_distritos` VALUES ("562", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Sarhua", "051011");
#
#
INSERT INTO `geo_distritos` VALUES ("563", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "65", "Vilcanchos", "051012");
#
#
INSERT INTO `geo_distritos` VALUES ("564", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Vilcas Huaman", "051101");
#
#
INSERT INTO `geo_distritos` VALUES ("565", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Accomarca", "051102");
#
#
INSERT INTO `geo_distritos` VALUES ("566", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Carhuanca", "051103");
#
#
INSERT INTO `geo_distritos` VALUES ("567", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Concepcion", "051104");
#
#
INSERT INTO `geo_distritos` VALUES ("568", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Huambalpa", "051105");
#
#
INSERT INTO `geo_distritos` VALUES ("569", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Saurama", "051107");
#
#
INSERT INTO `geo_distritos` VALUES ("570", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "66", "Vischongo", "051108");
#
#
INSERT INTO `geo_distritos` VALUES ("571", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Cajamarca", "060101");
#
#
INSERT INTO `geo_distritos` VALUES ("572", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Chetilla", "060103");
#
#
INSERT INTO `geo_distritos` VALUES ("573", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Cospan", "060104");
#
#
INSERT INTO `geo_distritos` VALUES ("574", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Encañada", "060105");
#
#
INSERT INTO `geo_distritos` VALUES ("575", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Jesus", "060106");
#
#
INSERT INTO `geo_distritos` VALUES ("576", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Llacanora", "060107");
#
#
INSERT INTO `geo_distritos` VALUES ("577", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Los Baños Del Inca", "060108");
#
#
INSERT INTO `geo_distritos` VALUES ("578", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Matara", "060110");
#
#
INSERT INTO `geo_distritos` VALUES ("579", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "67", "Namora", "060111");
#
#
INSERT INTO `geo_distritos` VALUES ("580", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "68", "Cajabamba", "060201");
#
#
INSERT INTO `geo_distritos` VALUES ("581", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "68", "Cachachi", "060202");
#
#
INSERT INTO `geo_distritos` VALUES ("582", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "68", "Condebamba", "060203");
#
#
INSERT INTO `geo_distritos` VALUES ("583", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "68", "Sitacocha", "060204");
#
#
INSERT INTO `geo_distritos` VALUES ("584", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Celendin", "060301");
#
#
INSERT INTO `geo_distritos` VALUES ("585", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Chumuch", "060302");
#
#
INSERT INTO `geo_distritos` VALUES ("586", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Cortegana", "060303");
#
#
INSERT INTO `geo_distritos` VALUES ("587", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Huasmin", "060304");
#
#
INSERT INTO `geo_distritos` VALUES ("588", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Jorge Chavez", "060305");
#
#
INSERT INTO `geo_distritos` VALUES ("589", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Jose Galvez", "060306");
#
#
INSERT INTO `geo_distritos` VALUES ("590", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Miguel Iglesias", "060307");
#
#
INSERT INTO `geo_distritos` VALUES ("591", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Oxamarca", "060308");
#
#
INSERT INTO `geo_distritos` VALUES ("592", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Sorochuco", "060309");
#
#
INSERT INTO `geo_distritos` VALUES ("593", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Sucre", "060310");
#
#
INSERT INTO `geo_distritos` VALUES ("594", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "Utco", "060311");
#
#
INSERT INTO `geo_distritos` VALUES ("595", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "69", "La Libertad De Pallan", "060312");
#
#
INSERT INTO `geo_distritos` VALUES ("596", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Chota", "060401");
#
#
INSERT INTO `geo_distritos` VALUES ("597", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Anguia", "060402");
#
#
INSERT INTO `geo_distritos` VALUES ("598", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Chadin", "060403");
#
#
INSERT INTO `geo_distritos` VALUES ("599", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Chiguirip", "060404");
#
#
INSERT INTO `geo_distritos` VALUES ("600", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Chimban", "060405");
#
#
INSERT INTO `geo_distritos` VALUES ("601", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Choropampa", "060406");
#
#
INSERT INTO `geo_distritos` VALUES ("602", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Conchan", "060408");
#
#
INSERT INTO `geo_distritos` VALUES ("603", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Huambos", "060409");
#
#
INSERT INTO `geo_distritos` VALUES ("604", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Lajas", "060410");
#
#
INSERT INTO `geo_distritos` VALUES ("605", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Miracosta", "060412");
#
#
INSERT INTO `geo_distritos` VALUES ("606", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Paccha", "060413");
#
#
INSERT INTO `geo_distritos` VALUES ("607", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Pion", "060414");
#
#
INSERT INTO `geo_distritos` VALUES ("608", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Querocoto", "060415");
#
#
INSERT INTO `geo_distritos` VALUES ("609", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "San Juan De Licupis", "060416");
#
#
INSERT INTO `geo_distritos` VALUES ("610", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Tacabamba", "060417");
#
#
INSERT INTO `geo_distritos` VALUES ("611", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Tocmoche", "060418");
#
#
INSERT INTO `geo_distritos` VALUES ("612", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "70", "Chalamarca", "060419");
#
#
INSERT INTO `geo_distritos` VALUES ("613", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Contumaza", "060501");
#
#
INSERT INTO `geo_distritos` VALUES ("614", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Chilete", "060502");
#
#
INSERT INTO `geo_distritos` VALUES ("615", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Cupisnique", "060503");
#
#
INSERT INTO `geo_distritos` VALUES ("616", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Guzmango", "060504");
#
#
INSERT INTO `geo_distritos` VALUES ("617", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "San Benito", "060505");
#
#
INSERT INTO `geo_distritos` VALUES ("618", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Santa Cruz De Toled", "060506");
#
#
INSERT INTO `geo_distritos` VALUES ("619", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Tantarica", "060507");
#
#
INSERT INTO `geo_distritos` VALUES ("620", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "71", "Yonan", "060508");
#
#
INSERT INTO `geo_distritos` VALUES ("621", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Cutervo", "060601");
#
#
INSERT INTO `geo_distritos` VALUES ("622", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Callayuc", "060602");
#
#
INSERT INTO `geo_distritos` VALUES ("623", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Choros", "060603");
#
#
INSERT INTO `geo_distritos` VALUES ("624", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Cujillo", "060604");
#
#
INSERT INTO `geo_distritos` VALUES ("625", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "La Ramada", "060605");
#
#
INSERT INTO `geo_distritos` VALUES ("626", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Pimpingos", "060606");
#
#
INSERT INTO `geo_distritos` VALUES ("627", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Querocotillo", "060607");
#
#
INSERT INTO `geo_distritos` VALUES ("628", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "San Andres De Cutervo", "060608");
#
#
INSERT INTO `geo_distritos` VALUES ("629", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "San Juan De Cutervo", "060609");
#
#
INSERT INTO `geo_distritos` VALUES ("630", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "San Luis De Lucma", "060610");
#
#
INSERT INTO `geo_distritos` VALUES ("631", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Santo Domingo De La Capilla", "060612");
#
#
INSERT INTO `geo_distritos` VALUES ("632", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Socota", "060614");
#
#
INSERT INTO `geo_distritos` VALUES ("633", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "72", "Toribio Casanova", "060615");
#
#
INSERT INTO `geo_distritos` VALUES ("634", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "73", "Bambamarca", "060701");
#
#
INSERT INTO `geo_distritos` VALUES ("635", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "73", "Chugur", "060702");
#
#
INSERT INTO `geo_distritos` VALUES ("636", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "73", "Hualgayoc", "060703");
#
#
INSERT INTO `geo_distritos` VALUES ("637", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Jaen", "060801");
#
#
INSERT INTO `geo_distritos` VALUES ("638", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Bellavista", "060802");
#
#
INSERT INTO `geo_distritos` VALUES ("639", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Chontali", "060803");
#
#
INSERT INTO `geo_distritos` VALUES ("640", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Colasay", "060804");
#
#
INSERT INTO `geo_distritos` VALUES ("641", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Huabal", "060805");
#
#
INSERT INTO `geo_distritos` VALUES ("642", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Las Pirias", "060806");
#
#
INSERT INTO `geo_distritos` VALUES ("643", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Pomahuaca", "060807");
#
#
INSERT INTO `geo_distritos` VALUES ("644", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Pucara", "060808");
#
#
INSERT INTO `geo_distritos` VALUES ("645", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "Sallique", "060809");
#
#
INSERT INTO `geo_distritos` VALUES ("646", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "San Felipe", "060810");
#
#
INSERT INTO `geo_distritos` VALUES ("647", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "74", "San Jose Del Alto", "060811");
#
#
INSERT INTO `geo_distritos` VALUES ("648", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "San Ignacio", "060901");
#
#
INSERT INTO `geo_distritos` VALUES ("649", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "Chirinos", "060902");
#
#
INSERT INTO `geo_distritos` VALUES ("650", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "Huarango", "060903");
#
#
INSERT INTO `geo_distritos` VALUES ("651", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "La Coipa", "060904");
#
#
INSERT INTO `geo_distritos` VALUES ("652", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "Namballe", "060905");
#
#
INSERT INTO `geo_distritos` VALUES ("653", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "San Jose De Lourdes", "060906");
#
#
INSERT INTO `geo_distritos` VALUES ("654", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "75", "Tabaconas", "060907");
#
#
INSERT INTO `geo_distritos` VALUES ("655", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Pedro Galvez", "061001");
#
#
INSERT INTO `geo_distritos` VALUES ("656", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Chancay", "061002");
#
#
INSERT INTO `geo_distritos` VALUES ("657", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Eduardo Villanueva", "061003");
#
#
INSERT INTO `geo_distritos` VALUES ("658", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Gregorio Pita", "061004");
#
#
INSERT INTO `geo_distritos` VALUES ("659", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Ichocan", "061005");
#
#
INSERT INTO `geo_distritos` VALUES ("660", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Jose Manuel Quiroz", "061006");
#
#
INSERT INTO `geo_distritos` VALUES ("661", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "76", "Jose Sabogal", "061007");
#
#
INSERT INTO `geo_distritos` VALUES ("662", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Bolivar", "061102");
#
#
INSERT INTO `geo_distritos` VALUES ("663", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Calquis", "061103");
#
#
INSERT INTO `geo_distritos` VALUES ("664", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Catilluc", "061104");
#
#
INSERT INTO `geo_distritos` VALUES ("665", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "El Prado", "061105");
#
#
INSERT INTO `geo_distritos` VALUES ("666", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "La Florida", "061106");
#
#
INSERT INTO `geo_distritos` VALUES ("667", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Llapa", "061107");
#
#
INSERT INTO `geo_distritos` VALUES ("668", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Nanchoc", "061108");
#
#
INSERT INTO `geo_distritos` VALUES ("669", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Niepos", "061109");
#
#
INSERT INTO `geo_distritos` VALUES ("670", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "San Gregorio", "061110");
#
#
INSERT INTO `geo_distritos` VALUES ("671", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "San Silvestre De Cochan", "061111");
#
#
INSERT INTO `geo_distritos` VALUES ("672", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Tongod", "061112");
#
#
INSERT INTO `geo_distritos` VALUES ("673", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "77", "Union Agua Blanca", "061113");
#
#
INSERT INTO `geo_distritos` VALUES ("674", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "78", "San Pablo", "061201");
#
#
INSERT INTO `geo_distritos` VALUES ("675", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "78", "San Bernardino", "061202");
#
#
INSERT INTO `geo_distritos` VALUES ("676", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "78", "Tumbaden", "061204");
#
#
INSERT INTO `geo_distritos` VALUES ("677", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Andabamba", "061302");
#
#
INSERT INTO `geo_distritos` VALUES ("678", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Catache", "061303");
#
#
INSERT INTO `geo_distritos` VALUES ("679", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Chancaybaños", "061304");
#
#
INSERT INTO `geo_distritos` VALUES ("680", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "La Esperanza", "061305");
#
#
INSERT INTO `geo_distritos` VALUES ("681", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Ninabamba", "061306");
#
#
INSERT INTO `geo_distritos` VALUES ("682", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Pulan", "061307");
#
#
INSERT INTO `geo_distritos` VALUES ("683", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Saucepampa", "061308");
#
#
INSERT INTO `geo_distritos` VALUES ("684", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Sexi", "061309");
#
#
INSERT INTO `geo_distritos` VALUES ("685", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Uticyacu", "061310");
#
#
INSERT INTO `geo_distritos` VALUES ("686", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "79", "Yauyucan", "061311");
#
#
INSERT INTO `geo_distritos` VALUES ("687", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "198", "Callao", "070101");
#
#
INSERT INTO `geo_distritos` VALUES ("688", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "198", "Carmen De La Legua Reynoso", "070103");
#
#
INSERT INTO `geo_distritos` VALUES ("689", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "198", "La Perla", "070104");
#
#
INSERT INTO `geo_distritos` VALUES ("690", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "198", "La Punta", "070105");
#
#
INSERT INTO `geo_distritos` VALUES ("691", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "198", "Ventanilla", "070106");
#
#
INSERT INTO `geo_distritos` VALUES ("692", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "Cusco", "080101");
#
#
INSERT INTO `geo_distritos` VALUES ("693", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "Ccorca", "080102");
#
#
INSERT INTO `geo_distritos` VALUES ("694", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "Poroy", "080103");
#
#
INSERT INTO `geo_distritos` VALUES ("695", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "San Sebastian", "080105");
#
#
INSERT INTO `geo_distritos` VALUES ("696", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "Santiago", "080106");
#
#
INSERT INTO `geo_distritos` VALUES ("697", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "Saylla", "080107");
#
#
INSERT INTO `geo_distritos` VALUES ("698", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "80", "Wanchaq", "080108");
#
#
INSERT INTO `geo_distritos` VALUES ("699", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Acomayo", "080201");
#
#
INSERT INTO `geo_distritos` VALUES ("700", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Acopia", "080202");
#
#
INSERT INTO `geo_distritos` VALUES ("701", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Acos", "080203");
#
#
INSERT INTO `geo_distritos` VALUES ("702", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Mosoc Llacta", "080204");
#
#
INSERT INTO `geo_distritos` VALUES ("703", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Pomacanchi", "080205");
#
#
INSERT INTO `geo_distritos` VALUES ("704", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Rondocan", "080206");
#
#
INSERT INTO `geo_distritos` VALUES ("705", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "81", "Sangarara", "080207");
#
#
INSERT INTO `geo_distritos` VALUES ("706", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Ancahuasi", "080302");
#
#
INSERT INTO `geo_distritos` VALUES ("707", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Cachimayo", "080303");
#
#
INSERT INTO `geo_distritos` VALUES ("708", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Chinchaypujio", "080304");
#
#
INSERT INTO `geo_distritos` VALUES ("709", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Huarocondo", "080305");
#
#
INSERT INTO `geo_distritos` VALUES ("710", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Limatambo", "080306");
#
#
INSERT INTO `geo_distritos` VALUES ("711", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Mollepata", "080307");
#
#
INSERT INTO `geo_distritos` VALUES ("712", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Pucyura", "080308");
#
#
INSERT INTO `geo_distritos` VALUES ("713", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "82", "Zurite", "080309");
#
#
INSERT INTO `geo_distritos` VALUES ("714", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Calca", "080401");
#
#
INSERT INTO `geo_distritos` VALUES ("715", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Coya", "080402");
#
#
INSERT INTO `geo_distritos` VALUES ("716", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Lamay", "080403");
#
#
INSERT INTO `geo_distritos` VALUES ("717", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Lares", "080404");
#
#
INSERT INTO `geo_distritos` VALUES ("718", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Pisac", "080405");
#
#
INSERT INTO `geo_distritos` VALUES ("719", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "San Salvador", "080406");
#
#
INSERT INTO `geo_distritos` VALUES ("720", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Taray", "080407");
#
#
INSERT INTO `geo_distritos` VALUES ("721", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "83", "Yanatile", "080408");
#
#
INSERT INTO `geo_distritos` VALUES ("722", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Yanaoca", "080501");
#
#
INSERT INTO `geo_distritos` VALUES ("723", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Checca", "080502");
#
#
INSERT INTO `geo_distritos` VALUES ("724", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Kunturkanki", "080503");
#
#
INSERT INTO `geo_distritos` VALUES ("725", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Langui", "080504");
#
#
INSERT INTO `geo_distritos` VALUES ("726", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Layo", "080505");
#
#
INSERT INTO `geo_distritos` VALUES ("727", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Quehue", "080507");
#
#
INSERT INTO `geo_distritos` VALUES ("728", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "84", "Tupac Amaru", "080508");
#
#
INSERT INTO `geo_distritos` VALUES ("729", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "85", "Sicuani", "080601");
#
#
INSERT INTO `geo_distritos` VALUES ("730", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "85", "Checacupe", "080602");
#
#
INSERT INTO `geo_distritos` VALUES ("731", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "85", "Combapata", "080603");
#
#
INSERT INTO `geo_distritos` VALUES ("732", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "85", "Marangani", "080604");
#
#
INSERT INTO `geo_distritos` VALUES ("733", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "85", "Pitumarca", "080605");
#
#
INSERT INTO `geo_distritos` VALUES ("734", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "85", "Tinta", "080608");
#
#
INSERT INTO `geo_distritos` VALUES ("735", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Capacmarca", "080702");
#
#
INSERT INTO `geo_distritos` VALUES ("736", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Chamaca", "080703");
#
#
INSERT INTO `geo_distritos` VALUES ("737", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Colquemarca", "080704");
#
#
INSERT INTO `geo_distritos` VALUES ("738", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Livitaca", "080705");
#
#
INSERT INTO `geo_distritos` VALUES ("739", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Llusco", "080706");
#
#
INSERT INTO `geo_distritos` VALUES ("740", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Quiñota", "080707");
#
#
INSERT INTO `geo_distritos` VALUES ("741", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "86", "Velille", "080708");
#
#
INSERT INTO `geo_distritos` VALUES ("742", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Espinar", "080801");
#
#
INSERT INTO `geo_distritos` VALUES ("743", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Condoroma", "080802");
#
#
INSERT INTO `geo_distritos` VALUES ("744", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Ocoruro", "080804");
#
#
INSERT INTO `geo_distritos` VALUES ("745", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Pallpata", "080805");
#
#
INSERT INTO `geo_distritos` VALUES ("746", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Pichigua", "080806");
#
#
INSERT INTO `geo_distritos` VALUES ("747", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Suyckutambo", "080807");
#
#
INSERT INTO `geo_distritos` VALUES ("748", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "87", "Alto Pichigua", "080808");
#
#
INSERT INTO `geo_distritos` VALUES ("749", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Santa Ana", "080901");
#
#
INSERT INTO `geo_distritos` VALUES ("750", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Echarate", "080902");
#
#
INSERT INTO `geo_distritos` VALUES ("751", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Huayopata", "080903");
#
#
INSERT INTO `geo_distritos` VALUES ("752", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Maranura", "080904");
#
#
INSERT INTO `geo_distritos` VALUES ("753", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Quellouno", "080906");
#
#
INSERT INTO `geo_distritos` VALUES ("754", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Kimbiri", "080907");
#
#
INSERT INTO `geo_distritos` VALUES ("755", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Santa Teresa", "080908");
#
#
INSERT INTO `geo_distritos` VALUES ("756", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "88", "Pichari", "080910");
#
#
INSERT INTO `geo_distritos` VALUES ("757", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Paruro", "081001");
#
#
INSERT INTO `geo_distritos` VALUES ("758", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Accha", "081002");
#
#
INSERT INTO `geo_distritos` VALUES ("759", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Ccapi", "081003");
#
#
INSERT INTO `geo_distritos` VALUES ("760", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Colcha", "081004");
#
#
INSERT INTO `geo_distritos` VALUES ("761", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Huanoquite", "081005");
#
#
INSERT INTO `geo_distritos` VALUES ("762", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Omacha", "081006");
#
#
INSERT INTO `geo_distritos` VALUES ("763", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Paccaritambo", "081007");
#
#
INSERT INTO `geo_distritos` VALUES ("764", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Pillpinto", "081008");
#
#
INSERT INTO `geo_distritos` VALUES ("765", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "89", "Yaurisque", "081009");
#
#
INSERT INTO `geo_distritos` VALUES ("766", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "90", "Paucartambo", "081101");
#
#
INSERT INTO `geo_distritos` VALUES ("767", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "90", "Caicay", "081102");
#
#
INSERT INTO `geo_distritos` VALUES ("768", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "90", "Challabamba", "081103");
#
#
INSERT INTO `geo_distritos` VALUES ("769", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "90", "Colquepata", "081104");
#
#
INSERT INTO `geo_distritos` VALUES ("770", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "90", "Huancarani", "081105");
#
#
INSERT INTO `geo_distritos` VALUES ("771", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "90", "Kosñipata", "081106");
#
#
INSERT INTO `geo_distritos` VALUES ("772", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Urcos", "081201");
#
#
INSERT INTO `geo_distritos` VALUES ("773", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Andahuaylillas", "081202");
#
#
INSERT INTO `geo_distritos` VALUES ("774", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Camanti", "081203");
#
#
INSERT INTO `geo_distritos` VALUES ("775", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Ccarhuayo", "081204");
#
#
INSERT INTO `geo_distritos` VALUES ("776", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Ccatca", "081205");
#
#
INSERT INTO `geo_distritos` VALUES ("777", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Cusipata", "081206");
#
#
INSERT INTO `geo_distritos` VALUES ("778", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Huaro", "081207");
#
#
INSERT INTO `geo_distritos` VALUES ("779", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Marcapata", "081209");
#
#
INSERT INTO `geo_distritos` VALUES ("780", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Ocongate", "081210");
#
#
INSERT INTO `geo_distritos` VALUES ("781", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "91", "Quiquijana", "081212");
#
#
INSERT INTO `geo_distritos` VALUES ("782", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "92", "Urubamba", "081301");
#
#
INSERT INTO `geo_distritos` VALUES ("783", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "92", "Chinchero", "081302");
#
#
INSERT INTO `geo_distritos` VALUES ("784", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "92", "Machupicchu", "081304");
#
#
INSERT INTO `geo_distritos` VALUES ("785", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "92", "Maras", "081305");
#
#
INSERT INTO `geo_distritos` VALUES ("786", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "92", "Ollantaytambo", "081306");
#
#
INSERT INTO `geo_distritos` VALUES ("787", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "92", "Yucay", "081307");
#
#
INSERT INTO `geo_distritos` VALUES ("788", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Huancavelica", "090101");
#
#
INSERT INTO `geo_distritos` VALUES ("789", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Acobambilla", "090102");
#
#
INSERT INTO `geo_distritos` VALUES ("790", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Acoria", "090103");
#
#
INSERT INTO `geo_distritos` VALUES ("791", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Conayca", "090104");
#
#
INSERT INTO `geo_distritos` VALUES ("792", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Cuenca", "090105");
#
#
INSERT INTO `geo_distritos` VALUES ("793", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Huachocolpa", "090106");
#
#
INSERT INTO `geo_distritos` VALUES ("794", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Huayllahuara", "090107");
#
#
INSERT INTO `geo_distritos` VALUES ("795", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Izcuchaca", "090108");
#
#
INSERT INTO `geo_distritos` VALUES ("796", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Laria", "090109");
#
#
INSERT INTO `geo_distritos` VALUES ("797", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Manta", "090110");
#
#
INSERT INTO `geo_distritos` VALUES ("798", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Moya", "090112");
#
#
INSERT INTO `geo_distritos` VALUES ("799", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Nuevo Occoro", "090113");
#
#
INSERT INTO `geo_distritos` VALUES ("800", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Palca", "090114");
#
#
INSERT INTO `geo_distritos` VALUES ("801", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Pilchaca", "090115");
#
#
INSERT INTO `geo_distritos` VALUES ("802", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Vilca", "090116");
#
#
INSERT INTO `geo_distritos` VALUES ("803", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Yauli", "090117");
#
#
INSERT INTO `geo_distritos` VALUES ("804", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Ascension", "090118");
#
#
INSERT INTO `geo_distritos` VALUES ("805", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "93", "Huando", "090119");
#
#
INSERT INTO `geo_distritos` VALUES ("806", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "94", "Caja", "090204");
#
#
INSERT INTO `geo_distritos` VALUES ("807", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "94", "Marcas", "090205");
#
#
INSERT INTO `geo_distritos` VALUES ("808", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "94", "Paucara", "090206");
#
#
INSERT INTO `geo_distritos` VALUES ("809", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "94", "Rosario", "090208");
#
#
INSERT INTO `geo_distritos` VALUES ("810", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Lircay", "090301");
#
#
INSERT INTO `geo_distritos` VALUES ("811", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Anchonga", "090302");
#
#
INSERT INTO `geo_distritos` VALUES ("812", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Callanmarca", "090303");
#
#
INSERT INTO `geo_distritos` VALUES ("813", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Ccochaccasa", "090304");
#
#
INSERT INTO `geo_distritos` VALUES ("814", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Chincho", "090305");
#
#
INSERT INTO `geo_distritos` VALUES ("815", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Congalla", "090306");
#
#
INSERT INTO `geo_distritos` VALUES ("816", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Huanca-Huanca", "090307");
#
#
INSERT INTO `geo_distritos` VALUES ("817", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Huayllay Grande", "090308");
#
#
INSERT INTO `geo_distritos` VALUES ("818", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Julcamarca", "090309");
#
#
INSERT INTO `geo_distritos` VALUES ("819", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "San Antonio De Antaparco", "090310");
#
#
INSERT INTO `geo_distritos` VALUES ("820", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Santo Tomas De Pata", "090311");
#
#
INSERT INTO `geo_distritos` VALUES ("821", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "95", "Secclla", "090312");
#
#
INSERT INTO `geo_distritos` VALUES ("822", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Castrovirreyna", "090401");
#
#
INSERT INTO `geo_distritos` VALUES ("823", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Arma", "090402");
#
#
INSERT INTO `geo_distritos` VALUES ("824", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Aurahua", "090403");
#
#
INSERT INTO `geo_distritos` VALUES ("825", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Capillas", "090404");
#
#
INSERT INTO `geo_distritos` VALUES ("826", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Chupamarca", "090405");
#
#
INSERT INTO `geo_distritos` VALUES ("827", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Cocas", "090406");
#
#
INSERT INTO `geo_distritos` VALUES ("828", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Huachos", "090407");
#
#
INSERT INTO `geo_distritos` VALUES ("829", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Huamatambo", "090408");
#
#
INSERT INTO `geo_distritos` VALUES ("830", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Mollepampa", "090409");
#
#
INSERT INTO `geo_distritos` VALUES ("831", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Tantara", "090412");
#
#
INSERT INTO `geo_distritos` VALUES ("832", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "96", "Ticrapo", "090413");
#
#
INSERT INTO `geo_distritos` VALUES ("833", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "Churcampa", "090501");
#
#
INSERT INTO `geo_distritos` VALUES ("834", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "Chinchihuasi", "090503");
#
#
INSERT INTO `geo_distritos` VALUES ("835", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "El Carmen", "090504");
#
#
INSERT INTO `geo_distritos` VALUES ("836", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "Locroja", "090506");
#
#
INSERT INTO `geo_distritos` VALUES ("837", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "Paucarbamba", "090507");
#
#
INSERT INTO `geo_distritos` VALUES ("838", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "San Miguel De Mayocc", "090508");
#
#
INSERT INTO `geo_distritos` VALUES ("839", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "San Pedro De Coris", "090509");
#
#
INSERT INTO `geo_distritos` VALUES ("840", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "97", "Pachamarca", "090510");
#
#
INSERT INTO `geo_distritos` VALUES ("841", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Huaytara", "090601");
#
#
INSERT INTO `geo_distritos` VALUES ("842", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Ayavi", "090602");
#
#
INSERT INTO `geo_distritos` VALUES ("843", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Cordova", "090603");
#
#
INSERT INTO `geo_distritos` VALUES ("844", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Huayacundo Arma", "090604");
#
#
INSERT INTO `geo_distritos` VALUES ("845", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Laramarca", "090605");
#
#
INSERT INTO `geo_distritos` VALUES ("846", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Ocoyo", "090606");
#
#
INSERT INTO `geo_distritos` VALUES ("847", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Pilpichaca", "090607");
#
#
INSERT INTO `geo_distritos` VALUES ("848", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Querco", "090608");
#
#
INSERT INTO `geo_distritos` VALUES ("849", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Quito-Arma", "090609");
#
#
INSERT INTO `geo_distritos` VALUES ("850", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "San Antonio De Cusicancha", "090610");
#
#
INSERT INTO `geo_distritos` VALUES ("851", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "San Francisco De Sangayaico", "090611");
#
#
INSERT INTO `geo_distritos` VALUES ("852", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Santiago De Chocorvos", "090613");
#
#
INSERT INTO `geo_distritos` VALUES ("853", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Santiago De Quirahuara", "090614");
#
#
INSERT INTO `geo_distritos` VALUES ("854", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "98", "Santo Domingo De Capillas", "090615");
#
#
INSERT INTO `geo_distritos` VALUES ("855", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Acostambo", "090702");
#
#
INSERT INTO `geo_distritos` VALUES ("856", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Acraquia", "090703");
#
#
INSERT INTO `geo_distritos` VALUES ("857", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Ahuaycha", "090704");
#
#
INSERT INTO `geo_distritos` VALUES ("858", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Daniel Hernandez", "090706");
#
#
INSERT INTO `geo_distritos` VALUES ("859", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Huaribamba", "090709");
#
#
INSERT INTO `geo_distritos` VALUES ("860", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Ñahuimpuquio", "090710");
#
#
INSERT INTO `geo_distritos` VALUES ("861", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Pazos", "090711");
#
#
INSERT INTO `geo_distritos` VALUES ("862", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Quishuar", "090713");
#
#
INSERT INTO `geo_distritos` VALUES ("863", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Salcabamba", "090714");
#
#
INSERT INTO `geo_distritos` VALUES ("864", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Salcahuasi", "090715");
#
#
INSERT INTO `geo_distritos` VALUES ("865", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "San Marcos De Rocchac", "090716");
#
#
INSERT INTO `geo_distritos` VALUES ("866", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Surcubamba", "090717");
#
#
INSERT INTO `geo_distritos` VALUES ("867", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "99", "Tintay Puncu", "090718");
#
#
INSERT INTO `geo_distritos` VALUES ("868", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Huanuco", "100101");
#
#
INSERT INTO `geo_distritos` VALUES ("869", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Amarilis", "100102");
#
#
INSERT INTO `geo_distritos` VALUES ("870", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Chinchao", "100103");
#
#
INSERT INTO `geo_distritos` VALUES ("871", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Churubamba", "100104");
#
#
INSERT INTO `geo_distritos` VALUES ("872", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Margos", "100105");
#
#
INSERT INTO `geo_distritos` VALUES ("873", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Quisqui", "100106");
#
#
INSERT INTO `geo_distritos` VALUES ("874", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "San Francisco De Cayran", "100107");
#
#
INSERT INTO `geo_distritos` VALUES ("875", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "San Pedro De Chaulan", "100108");
#
#
INSERT INTO `geo_distritos` VALUES ("876", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Santa Maria Del Valle", "100109");
#
#
INSERT INTO `geo_distritos` VALUES ("877", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Yarumayo", "100110");
#
#
INSERT INTO `geo_distritos` VALUES ("878", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "100", "Pillco Marca", "100111");
#
#
INSERT INTO `geo_distritos` VALUES ("879", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "Ambo", "100201");
#
#
INSERT INTO `geo_distritos` VALUES ("880", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "Cayna", "100202");
#
#
INSERT INTO `geo_distritos` VALUES ("881", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "Colpas", "100203");
#
#
INSERT INTO `geo_distritos` VALUES ("882", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "Conchamarca", "100204");
#
#
INSERT INTO `geo_distritos` VALUES ("883", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "Huacar", "100205");
#
#
INSERT INTO `geo_distritos` VALUES ("884", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "San Francisco", "100206");
#
#
INSERT INTO `geo_distritos` VALUES ("885", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "San Rafael", "100207");
#
#
INSERT INTO `geo_distritos` VALUES ("886", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "101", "Tomay Kichwa", "100208");
#
#
INSERT INTO `geo_distritos` VALUES ("887", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "La Union", "100301");
#
#
INSERT INTO `geo_distritos` VALUES ("888", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Chuquis", "100307");
#
#
INSERT INTO `geo_distritos` VALUES ("889", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Marias", "100311");
#
#
INSERT INTO `geo_distritos` VALUES ("890", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Pachas", "100313");
#
#
INSERT INTO `geo_distritos` VALUES ("891", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Quivilla", "100316");
#
#
INSERT INTO `geo_distritos` VALUES ("892", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Ripan", "100317");
#
#
INSERT INTO `geo_distritos` VALUES ("893", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Shunqui", "100321");
#
#
INSERT INTO `geo_distritos` VALUES ("894", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Sillapata", "100322");
#
#
INSERT INTO `geo_distritos` VALUES ("895", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "102", "Yanas", "100323");
#
#
INSERT INTO `geo_distritos` VALUES ("896", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "103", "Huacaybamba", "100401");
#
#
INSERT INTO `geo_distritos` VALUES ("897", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "103", "Canchabamba", "100402");
#
#
INSERT INTO `geo_distritos` VALUES ("898", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "103", "Pinra", "100404");
#
#
INSERT INTO `geo_distritos` VALUES ("899", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Llata", "100501");
#
#
INSERT INTO `geo_distritos` VALUES ("900", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Arancay", "100502");
#
#
INSERT INTO `geo_distritos` VALUES ("901", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Chavin De Pariarca", "100503");
#
#
INSERT INTO `geo_distritos` VALUES ("902", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Jacas Grande", "100504");
#
#
INSERT INTO `geo_distritos` VALUES ("903", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Jircan", "100505");
#
#
INSERT INTO `geo_distritos` VALUES ("904", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Monzon", "100507");
#
#
INSERT INTO `geo_distritos` VALUES ("905", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Punchao", "100508");
#
#
INSERT INTO `geo_distritos` VALUES ("906", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Puños", "100509");
#
#
INSERT INTO `geo_distritos` VALUES ("907", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Singa", "100510");
#
#
INSERT INTO `geo_distritos` VALUES ("908", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "104", "Tantamayo", "100511");
#
#
INSERT INTO `geo_distritos` VALUES ("909", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "105", "Rupa-Rupa", "100601");
#
#
INSERT INTO `geo_distritos` VALUES ("910", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "105", "Daniel Alomias Robles", "100602");
#
#
INSERT INTO `geo_distritos` VALUES ("911", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "105", "Hermilio Valdizan", "100603");
#
#
INSERT INTO `geo_distritos` VALUES ("912", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "105", "Jose Crespo Y Castillo", "100604");
#
#
INSERT INTO `geo_distritos` VALUES ("913", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "105", "Luyando", "100605");
#
#
INSERT INTO `geo_distritos` VALUES ("914", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "105", "Mariano Damaso Beraun", "100606");
#
#
INSERT INTO `geo_distritos` VALUES ("915", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "106", "Huacrachuco", "100701");
#
#
INSERT INTO `geo_distritos` VALUES ("916", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "106", "Cholon", "100702");
#
#
INSERT INTO `geo_distritos` VALUES ("917", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "106", "San Buenaventura", "100703");
#
#
INSERT INTO `geo_distritos` VALUES ("918", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "107", "Panao", "100801");
#
#
INSERT INTO `geo_distritos` VALUES ("919", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "107", "Chaglla", "100802");
#
#
INSERT INTO `geo_distritos` VALUES ("920", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "107", "Molino", "100803");
#
#
INSERT INTO `geo_distritos` VALUES ("921", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "107", "Umari", "100804");
#
#
INSERT INTO `geo_distritos` VALUES ("922", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "108", "Puerto Inca", "100901");
#
#
INSERT INTO `geo_distritos` VALUES ("923", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "108", "Codo Del Pozuzo", "100902");
#
#
INSERT INTO `geo_distritos` VALUES ("924", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "108", "Honoria", "100903");
#
#
INSERT INTO `geo_distritos` VALUES ("925", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "108", "Tournavista", "100904");
#
#
INSERT INTO `geo_distritos` VALUES ("926", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "108", "Yuyapichis", "100905");
#
#
INSERT INTO `geo_distritos` VALUES ("927", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "109", "Baños", "101002");
#
#
INSERT INTO `geo_distritos` VALUES ("928", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "109", "Jivia", "101003");
#
#
INSERT INTO `geo_distritos` VALUES ("929", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "109", "Queropalca", "101004");
#
#
INSERT INTO `geo_distritos` VALUES ("930", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "109", "Rondos", "101005");
#
#
INSERT INTO `geo_distritos` VALUES ("931", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "109", "San Francisco De Asis", "101006");
#
#
INSERT INTO `geo_distritos` VALUES ("932", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "109", "San Miguel De Cauri", "101007");
#
#
INSERT INTO `geo_distritos` VALUES ("933", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Chavinillo", "101101");
#
#
INSERT INTO `geo_distritos` VALUES ("934", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Cahuac", "101102");
#
#
INSERT INTO `geo_distritos` VALUES ("935", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Chacabamba", "101103");
#
#
INSERT INTO `geo_distritos` VALUES ("936", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Aparicio Pomares", "101104");
#
#
INSERT INTO `geo_distritos` VALUES ("937", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Jacas Chico", "101105");
#
#
INSERT INTO `geo_distritos` VALUES ("938", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Obas", "101106");
#
#
INSERT INTO `geo_distritos` VALUES ("939", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "110", "Choras", "101108");
#
#
INSERT INTO `geo_distritos` VALUES ("940", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Ica", "110101");
#
#
INSERT INTO `geo_distritos` VALUES ("941", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "La Tinguiña", "110102");
#
#
INSERT INTO `geo_distritos` VALUES ("942", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Los Aquijes", "110103");
#
#
INSERT INTO `geo_distritos` VALUES ("943", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Ocucaje", "110104");
#
#
INSERT INTO `geo_distritos` VALUES ("944", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Pachacutec", "110105");
#
#
INSERT INTO `geo_distritos` VALUES ("945", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Parcona", "110106");
#
#
INSERT INTO `geo_distritos` VALUES ("946", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Pueblo Nuevo", "110107");
#
#
INSERT INTO `geo_distritos` VALUES ("947", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Salas", "110108");
#
#
INSERT INTO `geo_distritos` VALUES ("948", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "San Jose De Los Molinos", "110109");
#
#
INSERT INTO `geo_distritos` VALUES ("949", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Subtanjalla", "110112");
#
#
INSERT INTO `geo_distritos` VALUES ("950", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Tate", "110113");
#
#
INSERT INTO `geo_distritos` VALUES ("951", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "111", "Yauca Del Rosario", "110114");
#
#
INSERT INTO `geo_distritos` VALUES ("952", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Chincha Alta", "110201");
#
#
INSERT INTO `geo_distritos` VALUES ("953", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Alto Laran", "110202");
#
#
INSERT INTO `geo_distritos` VALUES ("954", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Chavin", "110203");
#
#
INSERT INTO `geo_distritos` VALUES ("955", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Chincha Baja", "110204");
#
#
INSERT INTO `geo_distritos` VALUES ("956", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Grocio Prado", "110206");
#
#
INSERT INTO `geo_distritos` VALUES ("957", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "San Juan De Yanac", "110208");
#
#
INSERT INTO `geo_distritos` VALUES ("958", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "San Pedro De Huacarpana", "110209");
#
#
INSERT INTO `geo_distritos` VALUES ("959", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Sunampe", "110210");
#
#
INSERT INTO `geo_distritos` VALUES ("960", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "112", "Tambo De Mora", "110211");
#
#
INSERT INTO `geo_distritos` VALUES ("961", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "113", "Nazca", "110301");
#
#
INSERT INTO `geo_distritos` VALUES ("962", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "113", "Changuillo", "110302");
#
#
INSERT INTO `geo_distritos` VALUES ("963", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "113", "El Ingenio", "110303");
#
#
INSERT INTO `geo_distritos` VALUES ("964", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "113", "Marcona", "110304");
#
#
INSERT INTO `geo_distritos` VALUES ("965", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "114", "Palpa", "110401");
#
#
INSERT INTO `geo_distritos` VALUES ("966", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "114", "Llipata", "110402");
#
#
INSERT INTO `geo_distritos` VALUES ("967", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "114", "Tibillo", "110405");
#
#
INSERT INTO `geo_distritos` VALUES ("968", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "Pisco", "110501");
#
#
INSERT INTO `geo_distritos` VALUES ("969", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "Huancano", "110502");
#
#
INSERT INTO `geo_distritos` VALUES ("970", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "Humay", "110503");
#
#
INSERT INTO `geo_distritos` VALUES ("971", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "Paracas", "110505");
#
#
INSERT INTO `geo_distritos` VALUES ("972", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "San Andres", "110506");
#
#
INSERT INTO `geo_distritos` VALUES ("973", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "San Clemente", "110507");
#
#
INSERT INTO `geo_distritos` VALUES ("974", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "115", "Tupac Amaru Inca", "110508");
#
#
INSERT INTO `geo_distritos` VALUES ("975", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Huancayo", "120101");
#
#
INSERT INTO `geo_distritos` VALUES ("976", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Carhuacallanga", "120104");
#
#
INSERT INTO `geo_distritos` VALUES ("977", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Chacapampa", "120105");
#
#
INSERT INTO `geo_distritos` VALUES ("978", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Chicche", "120106");
#
#
INSERT INTO `geo_distritos` VALUES ("979", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Chilca", "120107");
#
#
INSERT INTO `geo_distritos` VALUES ("980", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Chongos Alto", "120108");
#
#
INSERT INTO `geo_distritos` VALUES ("981", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Chupuro", "120111");
#
#
INSERT INTO `geo_distritos` VALUES ("982", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Cullhuas", "120113");
#
#
INSERT INTO `geo_distritos` VALUES ("983", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "El Tambo", "120114");
#
#
INSERT INTO `geo_distritos` VALUES ("984", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Huacrapuquio", "120116");
#
#
INSERT INTO `geo_distritos` VALUES ("985", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Hualhuas", "120117");
#
#
INSERT INTO `geo_distritos` VALUES ("986", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Huancan", "120119");
#
#
INSERT INTO `geo_distritos` VALUES ("987", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Huasicancha", "120120");
#
#
INSERT INTO `geo_distritos` VALUES ("988", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Huayucachi", "120121");
#
#
INSERT INTO `geo_distritos` VALUES ("989", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Ingenio", "120122");
#
#
INSERT INTO `geo_distritos` VALUES ("990", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Pilcomayo", "120125");
#
#
INSERT INTO `geo_distritos` VALUES ("991", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Quichuay", "120127");
#
#
INSERT INTO `geo_distritos` VALUES ("992", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Quilcas", "120128");
#
#
INSERT INTO `geo_distritos` VALUES ("993", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "San Agustin", "120129");
#
#
INSERT INTO `geo_distritos` VALUES ("994", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "San Jeronimo De Tunan", "120130");
#
#
INSERT INTO `geo_distritos` VALUES ("995", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Saño", "120132");
#
#
INSERT INTO `geo_distritos` VALUES ("996", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Sapallanga", "120133");
#
#
INSERT INTO `geo_distritos` VALUES ("997", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Sicaya", "120134");
#
#
INSERT INTO `geo_distritos` VALUES ("998", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Santo Domingo De Acobamba", "120135");
#
#
INSERT INTO `geo_distritos` VALUES ("999", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "116", "Viques", "120136");
#
#
INSERT INTO `geo_distritos` VALUES ("1000", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Andamarca", "120203");
#
#
INSERT INTO `geo_distritos` VALUES ("1001", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Chambara", "120204");
#
#
INSERT INTO `geo_distritos` VALUES ("1002", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Heroinas Toledo", "120207");
#
#
INSERT INTO `geo_distritos` VALUES ("1003", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Manzanares", "120208");
#
#
INSERT INTO `geo_distritos` VALUES ("1004", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Matahuasi", "120210");
#
#
INSERT INTO `geo_distritos` VALUES ("1005", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Mito", "120211");
#
#
INSERT INTO `geo_distritos` VALUES ("1006", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Nueve De Julio", "120212");
#
#
INSERT INTO `geo_distritos` VALUES ("1007", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Orcotuna", "120213");
#
#
INSERT INTO `geo_distritos` VALUES ("1008", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "San Jose De Quero", "120214");
#
#
INSERT INTO `geo_distritos` VALUES ("1009", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "117", "Santa Rosa De Ocopa", "120215");
#
#
INSERT INTO `geo_distritos` VALUES ("1010", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "118", "Chanchamayo", "120301");
#
#
INSERT INTO `geo_distritos` VALUES ("1011", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "118", "Perene", "120302");
#
#
INSERT INTO `geo_distritos` VALUES ("1012", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "118", "Pichanaqui", "120303");
#
#
INSERT INTO `geo_distritos` VALUES ("1013", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "118", "San Luis De Shuaro", "120304");
#
#
INSERT INTO `geo_distritos` VALUES ("1014", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "118", "San Ramon", "120305");
#
#
INSERT INTO `geo_distritos` VALUES ("1015", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "118", "Vitoc", "120306");
#
#
INSERT INTO `geo_distritos` VALUES ("1016", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Jauja", "120401");
#
#
INSERT INTO `geo_distritos` VALUES ("1017", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Acolla", "120402");
#
#
INSERT INTO `geo_distritos` VALUES ("1018", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Apata", "120403");
#
#
INSERT INTO `geo_distritos` VALUES ("1019", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Ataura", "120404");
#
#
INSERT INTO `geo_distritos` VALUES ("1020", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Canchayllo", "120405");
#
#
INSERT INTO `geo_distritos` VALUES ("1021", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Curicaca", "120406");
#
#
INSERT INTO `geo_distritos` VALUES ("1022", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "El Mantaro", "120407");
#
#
INSERT INTO `geo_distritos` VALUES ("1023", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Huamali", "120408");
#
#
INSERT INTO `geo_distritos` VALUES ("1024", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Huaripampa", "120409");
#
#
INSERT INTO `geo_distritos` VALUES ("1025", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Huertas", "120410");
#
#
INSERT INTO `geo_distritos` VALUES ("1026", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Janjaillo", "120411");
#
#
INSERT INTO `geo_distritos` VALUES ("1027", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Julcan", "120412");
#
#
INSERT INTO `geo_distritos` VALUES ("1028", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Leonor Ordoñez", "120413");
#
#
INSERT INTO `geo_distritos` VALUES ("1029", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Llocllapampa", "120414");
#
#
INSERT INTO `geo_distritos` VALUES ("1030", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Marco", "120415");
#
#
INSERT INTO `geo_distritos` VALUES ("1031", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Masma", "120416");
#
#
INSERT INTO `geo_distritos` VALUES ("1032", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Masma Chicche", "120417");
#
#
INSERT INTO `geo_distritos` VALUES ("1033", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Molinos", "120418");
#
#
INSERT INTO `geo_distritos` VALUES ("1034", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Monobamba", "120419");
#
#
INSERT INTO `geo_distritos` VALUES ("1035", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Muqui", "120420");
#
#
INSERT INTO `geo_distritos` VALUES ("1036", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Muquiyauyo", "120421");
#
#
INSERT INTO `geo_distritos` VALUES ("1037", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Paca", "120422");
#
#
INSERT INTO `geo_distritos` VALUES ("1038", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Pancan", "120424");
#
#
INSERT INTO `geo_distritos` VALUES ("1039", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Parco", "120425");
#
#
INSERT INTO `geo_distritos` VALUES ("1040", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Pomacancha", "120426");
#
#
INSERT INTO `geo_distritos` VALUES ("1041", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Ricran", "120427");
#
#
INSERT INTO `geo_distritos` VALUES ("1042", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "San Lorenzo", "120428");
#
#
INSERT INTO `geo_distritos` VALUES ("1043", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "San Pedro De Chunan", "120429");
#
#
INSERT INTO `geo_distritos` VALUES ("1044", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Sausa", "120430");
#
#
INSERT INTO `geo_distritos` VALUES ("1045", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Sincos", "120431");
#
#
INSERT INTO `geo_distritos` VALUES ("1046", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Tunan Marca", "120432");
#
#
INSERT INTO `geo_distritos` VALUES ("1047", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "119", "Yauyos", "120434");
#
#
INSERT INTO `geo_distritos` VALUES ("1048", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "120", "Junin", "120501");
#
#
INSERT INTO `geo_distritos` VALUES ("1049", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "120", "Carhuamayo", "120502");
#
#
INSERT INTO `geo_distritos` VALUES ("1050", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "120", "Ondores", "120503");
#
#
INSERT INTO `geo_distritos` VALUES ("1051", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "120", "Ulcumayo", "120504");
#
#
INSERT INTO `geo_distritos` VALUES ("1052", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Satipo", "120601");
#
#
INSERT INTO `geo_distritos` VALUES ("1053", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Coviriali", "120602");
#
#
INSERT INTO `geo_distritos` VALUES ("1054", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Llaylla", "120603");
#
#
INSERT INTO `geo_distritos` VALUES ("1055", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Mazamari", "120604");
#
#
INSERT INTO `geo_distritos` VALUES ("1056", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Pampa Hermosa", "120605");
#
#
INSERT INTO `geo_distritos` VALUES ("1057", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Pangoa", "120606");
#
#
INSERT INTO `geo_distritos` VALUES ("1058", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Rio Negro", "120607");
#
#
INSERT INTO `geo_distritos` VALUES ("1059", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "121", "Rio Tambo", "120608");
#
#
INSERT INTO `geo_distritos` VALUES ("1060", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "122", "Tarma", "120701");
#
#
INSERT INTO `geo_distritos` VALUES ("1061", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "122", "Huaricolca", "120703");
#
#
INSERT INTO `geo_distritos` VALUES ("1062", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "122", "Huasahuasi", "120704");
#
#
INSERT INTO `geo_distritos` VALUES ("1063", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "122", "Palcamayo", "120707");
#
#
INSERT INTO `geo_distritos` VALUES ("1064", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "122", "San Pedro De Cajas", "120708");
#
#
INSERT INTO `geo_distritos` VALUES ("1065", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "122", "Tapo", "120709");
#
#
INSERT INTO `geo_distritos` VALUES ("1066", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "La Oroya", "120801");
#
#
INSERT INTO `geo_distritos` VALUES ("1067", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Chacapalpa", "120802");
#
#
INSERT INTO `geo_distritos` VALUES ("1068", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Huay-Huay", "120803");
#
#
INSERT INTO `geo_distritos` VALUES ("1069", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Marcapomacocha", "120804");
#
#
INSERT INTO `geo_distritos` VALUES ("1070", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Morococha", "120805");
#
#
INSERT INTO `geo_distritos` VALUES ("1071", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Santa Barbara De Carhuacayan", "120807");
#
#
INSERT INTO `geo_distritos` VALUES ("1072", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Santa Rosa De Sacco", "120808");
#
#
INSERT INTO `geo_distritos` VALUES ("1073", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "123", "Suitucancha", "120809");
#
#
INSERT INTO `geo_distritos` VALUES ("1074", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Chupaca", "120901");
#
#
INSERT INTO `geo_distritos` VALUES ("1075", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Ahuac", "120902");
#
#
INSERT INTO `geo_distritos` VALUES ("1076", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Chongos Bajo", "120903");
#
#
INSERT INTO `geo_distritos` VALUES ("1077", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Huachac", "120904");
#
#
INSERT INTO `geo_distritos` VALUES ("1078", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Huamancaca Chico", "120905");
#
#
INSERT INTO `geo_distritos` VALUES ("1079", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "San Juan De Yscos", "120906");
#
#
INSERT INTO `geo_distritos` VALUES ("1080", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "San Juan De Jarpa", "120907");
#
#
INSERT INTO `geo_distritos` VALUES ("1081", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Tres De Diciembre", "120908");
#
#
INSERT INTO `geo_distritos` VALUES ("1082", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "124", "Yanacancha", "120909");
#
#
INSERT INTO `geo_distritos` VALUES ("1083", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Trujillo", "130101");
#
#
INSERT INTO `geo_distritos` VALUES ("1084", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "El Porvenir", "130102");
#
#
INSERT INTO `geo_distritos` VALUES ("1085", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Florencia De Mora", "130103");
#
#
INSERT INTO `geo_distritos` VALUES ("1086", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Huanchaco", "130104");
#
#
INSERT INTO `geo_distritos` VALUES ("1087", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Laredo", "130106");
#
#
INSERT INTO `geo_distritos` VALUES ("1088", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Moche", "130107");
#
#
INSERT INTO `geo_distritos` VALUES ("1089", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Poroto", "130108");
#
#
INSERT INTO `geo_distritos` VALUES ("1090", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Salaverry", "130109");
#
#
INSERT INTO `geo_distritos` VALUES ("1091", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Simbal", "130110");
#
#
INSERT INTO `geo_distritos` VALUES ("1092", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "125", "Victor Larco Herrera", "130111");
#
#
INSERT INTO `geo_distritos` VALUES ("1093", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Ascope", "130201");
#
#
INSERT INTO `geo_distritos` VALUES ("1094", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Chicama", "130202");
#
#
INSERT INTO `geo_distritos` VALUES ("1095", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Chocope", "130203");
#
#
INSERT INTO `geo_distritos` VALUES ("1096", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Magdalena De Cao", "130204");
#
#
INSERT INTO `geo_distritos` VALUES ("1097", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Paijan", "130205");
#
#
INSERT INTO `geo_distritos` VALUES ("1098", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Razuri", "130206");
#
#
INSERT INTO `geo_distritos` VALUES ("1099", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Santiago De Cao", "130207");
#
#
INSERT INTO `geo_distritos` VALUES ("1100", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "126", "Casa Grande", "130208");
#
#
INSERT INTO `geo_distritos` VALUES ("1101", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "127", "Condormarca", "130303");
#
#
INSERT INTO `geo_distritos` VALUES ("1102", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "127", "Longotea", "130304");
#
#
INSERT INTO `geo_distritos` VALUES ("1103", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "127", "Uchumarca", "130305");
#
#
INSERT INTO `geo_distritos` VALUES ("1104", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "127", "Ucuncha", "130306");
#
#
INSERT INTO `geo_distritos` VALUES ("1105", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "128", "Chepen", "130401");
#
#
INSERT INTO `geo_distritos` VALUES ("1106", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "128", "Pacanga", "130402");
#
#
INSERT INTO `geo_distritos` VALUES ("1107", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "129", "Calamarca", "130502");
#
#
INSERT INTO `geo_distritos` VALUES ("1108", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "129", "Carabamba", "130503");
#
#
INSERT INTO `geo_distritos` VALUES ("1109", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "129", "Huaso", "130504");
#
#
INSERT INTO `geo_distritos` VALUES ("1110", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Otuzco", "130601");
#
#
INSERT INTO `geo_distritos` VALUES ("1111", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Agallpampa", "130602");
#
#
INSERT INTO `geo_distritos` VALUES ("1112", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Charat", "130604");
#
#
INSERT INTO `geo_distritos` VALUES ("1113", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Huaranchal", "130605");
#
#
INSERT INTO `geo_distritos` VALUES ("1114", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "La Cuesta", "130606");
#
#
INSERT INTO `geo_distritos` VALUES ("1115", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Mache", "130608");
#
#
INSERT INTO `geo_distritos` VALUES ("1116", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Paranday", "130610");
#
#
INSERT INTO `geo_distritos` VALUES ("1117", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Salpo", "130611");
#
#
INSERT INTO `geo_distritos` VALUES ("1118", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Sinsicap", "130613");
#
#
INSERT INTO `geo_distritos` VALUES ("1119", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "130", "Usquil", "130614");
#
#
INSERT INTO `geo_distritos` VALUES ("1120", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "131", "San Pedro De Lloc", "130701");
#
#
INSERT INTO `geo_distritos` VALUES ("1121", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "131", "Guadalupe", "130702");
#
#
INSERT INTO `geo_distritos` VALUES ("1122", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "131", "Jequetepeque", "130703");
#
#
INSERT INTO `geo_distritos` VALUES ("1123", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "131", "Pacasmayo", "130704");
#
#
INSERT INTO `geo_distritos` VALUES ("1124", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "131", "San Jose", "130705");
#
#
INSERT INTO `geo_distritos` VALUES ("1125", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Tayabamba", "130801");
#
#
INSERT INTO `geo_distritos` VALUES ("1126", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Buldibuyo", "130802");
#
#
INSERT INTO `geo_distritos` VALUES ("1127", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Chillia", "130803");
#
#
INSERT INTO `geo_distritos` VALUES ("1128", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Huancaspata", "130804");
#
#
INSERT INTO `geo_distritos` VALUES ("1129", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Huaylillas", "130805");
#
#
INSERT INTO `geo_distritos` VALUES ("1130", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Huayo", "130806");
#
#
INSERT INTO `geo_distritos` VALUES ("1131", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Ongon", "130807");
#
#
INSERT INTO `geo_distritos` VALUES ("1132", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Parcoy", "130808");
#
#
INSERT INTO `geo_distritos` VALUES ("1133", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Pataz", "130809");
#
#
INSERT INTO `geo_distritos` VALUES ("1134", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Pias", "130810");
#
#
INSERT INTO `geo_distritos` VALUES ("1135", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Santiago De Challas", "130811");
#
#
INSERT INTO `geo_distritos` VALUES ("1136", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Taurija", "130812");
#
#
INSERT INTO `geo_distritos` VALUES ("1137", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "132", "Urpay", "130813");
#
#
INSERT INTO `geo_distritos` VALUES ("1138", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Huamachuco", "130901");
#
#
INSERT INTO `geo_distritos` VALUES ("1139", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Chugay", "130902");
#
#
INSERT INTO `geo_distritos` VALUES ("1140", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Cochorco", "130903");
#
#
INSERT INTO `geo_distritos` VALUES ("1141", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Curgos", "130904");
#
#
INSERT INTO `geo_distritos` VALUES ("1142", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Marcabal", "130905");
#
#
INSERT INTO `geo_distritos` VALUES ("1143", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Sanagoran", "130906");
#
#
INSERT INTO `geo_distritos` VALUES ("1144", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Sarin", "130907");
#
#
INSERT INTO `geo_distritos` VALUES ("1145", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "133", "Sartimbamba", "130908");
#
#
INSERT INTO `geo_distritos` VALUES ("1146", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Santiago De Chuco", "131001");
#
#
INSERT INTO `geo_distritos` VALUES ("1147", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Angasmarca", "131002");
#
#
INSERT INTO `geo_distritos` VALUES ("1148", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Cachicadan", "131003");
#
#
INSERT INTO `geo_distritos` VALUES ("1149", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Mollebamba", "131004");
#
#
INSERT INTO `geo_distritos` VALUES ("1150", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Quiruvilca", "131006");
#
#
INSERT INTO `geo_distritos` VALUES ("1151", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Santa Cruz De Chuca", "131007");
#
#
INSERT INTO `geo_distritos` VALUES ("1152", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "134", "Sitabamba", "131008");
#
#
INSERT INTO `geo_distritos` VALUES ("1153", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "135", "Cascas", "131101");
#
#
INSERT INTO `geo_distritos` VALUES ("1154", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "135", "Compin", "131103");
#
#
INSERT INTO `geo_distritos` VALUES ("1155", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "135", "Sayapullo", "131104");
#
#
INSERT INTO `geo_distritos` VALUES ("1156", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "136", "Viru", "131201");
#
#
INSERT INTO `geo_distritos` VALUES ("1157", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "136", "Chao", "131202");
#
#
INSERT INTO `geo_distritos` VALUES ("1158", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "136", "Guadalupito", "131203");
#
#
INSERT INTO `geo_distritos` VALUES ("1159", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Chiclayo", "140101");
#
#
INSERT INTO `geo_distritos` VALUES ("1160", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Chongoyape", "140102");
#
#
INSERT INTO `geo_distritos` VALUES ("1161", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Eten", "140103");
#
#
INSERT INTO `geo_distritos` VALUES ("1162", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Eten Puerto", "140104");
#
#
INSERT INTO `geo_distritos` VALUES ("1163", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Jose Leonardo Ortiz", "140105");
#
#
INSERT INTO `geo_distritos` VALUES ("1164", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Lagunas", "140107");
#
#
INSERT INTO `geo_distritos` VALUES ("1165", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Monsefu", "140108");
#
#
INSERT INTO `geo_distritos` VALUES ("1166", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Nueva Arica", "140109");
#
#
INSERT INTO `geo_distritos` VALUES ("1167", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Oyotun", "140110");
#
#
INSERT INTO `geo_distritos` VALUES ("1168", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Picsi", "140111");
#
#
INSERT INTO `geo_distritos` VALUES ("1169", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Pimentel", "140112");
#
#
INSERT INTO `geo_distritos` VALUES ("1170", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Reque", "140113");
#
#
INSERT INTO `geo_distritos` VALUES ("1171", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Saña", "140115");
#
#
INSERT INTO `geo_distritos` VALUES ("1172", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Cayalti", "140116");
#
#
INSERT INTO `geo_distritos` VALUES ("1173", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Patapo", "140117");
#
#
INSERT INTO `geo_distritos` VALUES ("1174", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Pomalca", "140118");
#
#
INSERT INTO `geo_distritos` VALUES ("1175", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Pucala", "140119");
#
#
INSERT INTO `geo_distritos` VALUES ("1176", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "137", "Tuman", "140120");
#
#
INSERT INTO `geo_distritos` VALUES ("1177", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "138", "Ferreñafe", "140201");
#
#
INSERT INTO `geo_distritos` VALUES ("1178", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "138", "Cañaris", "140202");
#
#
INSERT INTO `geo_distritos` VALUES ("1179", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "138", "Incahuasi", "140203");
#
#
INSERT INTO `geo_distritos` VALUES ("1180", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "138", "Manuel Antonio Mesones Muro", "140204");
#
#
INSERT INTO `geo_distritos` VALUES ("1181", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "138", "Pitipo", "140205");
#
#
INSERT INTO `geo_distritos` VALUES ("1182", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Lambayeque", "140301");
#
#
INSERT INTO `geo_distritos` VALUES ("1183", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Chochope", "140302");
#
#
INSERT INTO `geo_distritos` VALUES ("1184", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Illimo", "140303");
#
#
INSERT INTO `geo_distritos` VALUES ("1185", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Jayanca", "140304");
#
#
INSERT INTO `geo_distritos` VALUES ("1186", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Mochumi", "140305");
#
#
INSERT INTO `geo_distritos` VALUES ("1187", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Morrope", "140306");
#
#
INSERT INTO `geo_distritos` VALUES ("1188", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Motupe", "140307");
#
#
INSERT INTO `geo_distritos` VALUES ("1189", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Olmos", "140308");
#
#
INSERT INTO `geo_distritos` VALUES ("1190", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Pacora", "140309");
#
#
INSERT INTO `geo_distritos` VALUES ("1191", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "139", "Tucume", "140312");
#
#
INSERT INTO `geo_distritos` VALUES ("1192", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "8", "Lima Centro", "150101");
#
#
INSERT INTO `geo_distritos` VALUES ("1193", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "8", "Lurigancho", "150118");
#
#
INSERT INTO `geo_distritos` VALUES ("1194", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "8", "Magdalena Vieja", "150121");
#
#
INSERT INTO `geo_distritos` VALUES ("1195", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "1", "Barranca", "150201");
#
#
INSERT INTO `geo_distritos` VALUES ("1196", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "1", "Paramonga", "150202");
#
#
INSERT INTO `geo_distritos` VALUES ("1197", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "1", "Pativilca", "150203");
#
#
INSERT INTO `geo_distritos` VALUES ("1198", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "1", "Supe", "150204");
#
#
INSERT INTO `geo_distritos` VALUES ("1199", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "1", "Supe Puerto", "150205");
#
#
INSERT INTO `geo_distritos` VALUES ("1200", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "2", "Cajatambo", "150301");
#
#
INSERT INTO `geo_distritos` VALUES ("1201", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "2", "Copa", "150302");
#
#
INSERT INTO `geo_distritos` VALUES ("1202", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "2", "Gorgor", "150303");
#
#
INSERT INTO `geo_distritos` VALUES ("1203", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "2", "Huancapon", "150304");
#
#
INSERT INTO `geo_distritos` VALUES ("1204", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "2", "Manas", "150305");
#
#
INSERT INTO `geo_distritos` VALUES ("1205", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "3", "Canta", "150401");
#
#
INSERT INTO `geo_distritos` VALUES ("1206", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "3", "Arahuay", "150402");
#
#
INSERT INTO `geo_distritos` VALUES ("1207", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "3", "Huamantanga", "150403");
#
#
INSERT INTO `geo_distritos` VALUES ("1208", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "3", "Huaros", "150404");
#
#
INSERT INTO `geo_distritos` VALUES ("1209", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "3", "Lachaqui", "150405");
#
#
INSERT INTO `geo_distritos` VALUES ("1210", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "3", "Santa Rosa De Quives", "150407");
#
#
INSERT INTO `geo_distritos` VALUES ("1211", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "San Vicente De Cañete", "150501");
#
#
INSERT INTO `geo_distritos` VALUES ("1212", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Asia", "150502");
#
#
INSERT INTO `geo_distritos` VALUES ("1213", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Calango", "150503");
#
#
INSERT INTO `geo_distritos` VALUES ("1214", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Cerro Azul", "150504");
#
#
INSERT INTO `geo_distritos` VALUES ("1215", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Coayllo", "150506");
#
#
INSERT INTO `geo_distritos` VALUES ("1216", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Imperial", "150507");
#
#
INSERT INTO `geo_distritos` VALUES ("1217", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Lunahuana", "150508");
#
#
INSERT INTO `geo_distritos` VALUES ("1218", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Mala", "150509");
#
#
INSERT INTO `geo_distritos` VALUES ("1219", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Nuevo Imperial", "150510");
#
#
INSERT INTO `geo_distritos` VALUES ("1220", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Pacaran", "150511");
#
#
INSERT INTO `geo_distritos` VALUES ("1221", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Quilmana", "150512");
#
#
INSERT INTO `geo_distritos` VALUES ("1222", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Santa Cruz De Flores", "150515");
#
#
INSERT INTO `geo_distritos` VALUES ("1223", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "4", "Zuñiga", "150516");
#
#
INSERT INTO `geo_distritos` VALUES ("1224", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Huaral", "150601");
#
#
INSERT INTO `geo_distritos` VALUES ("1225", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Atavillos Alto", "150602");
#
#
INSERT INTO `geo_distritos` VALUES ("1226", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Atavillos Bajo", "150603");
#
#
INSERT INTO `geo_distritos` VALUES ("1227", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Aucallama", "150604");
#
#
INSERT INTO `geo_distritos` VALUES ("1228", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Ihuari", "150606");
#
#
INSERT INTO `geo_distritos` VALUES ("1229", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Lampian", "150607");
#
#
INSERT INTO `geo_distritos` VALUES ("1230", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Pacaraos", "150608");
#
#
INSERT INTO `geo_distritos` VALUES ("1231", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "San Miguel De Acos", "150609");
#
#
INSERT INTO `geo_distritos` VALUES ("1232", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Santa Cruz De Andamarca", "150610");
#
#
INSERT INTO `geo_distritos` VALUES ("1233", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Sumbilca", "150611");
#
#
INSERT INTO `geo_distritos` VALUES ("1234", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "5", "Veintisiete De Noviembre", "150612");
#
#
INSERT INTO `geo_distritos` VALUES ("1235", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Matucana", "150701");
#
#
INSERT INTO `geo_distritos` VALUES ("1236", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Antioquia", "150702");
#
#
INSERT INTO `geo_distritos` VALUES ("1237", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Callahuanca", "150703");
#
#
INSERT INTO `geo_distritos` VALUES ("1238", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Carampoma", "150704");
#
#
INSERT INTO `geo_distritos` VALUES ("1239", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Chicla", "150705");
#
#
INSERT INTO `geo_distritos` VALUES ("1240", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Huachupampa", "150707");
#
#
INSERT INTO `geo_distritos` VALUES ("1241", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Huanza", "150708");
#
#
INSERT INTO `geo_distritos` VALUES ("1242", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Huarochiri", "150709");
#
#
INSERT INTO `geo_distritos` VALUES ("1243", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Lahuaytambo", "150710");
#
#
INSERT INTO `geo_distritos` VALUES ("1244", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Langa", "150711");
#
#
INSERT INTO `geo_distritos` VALUES ("1245", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Laraos", "150712");
#
#
INSERT INTO `geo_distritos` VALUES ("1246", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Mariatana", "150713");
#
#
INSERT INTO `geo_distritos` VALUES ("1247", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Ricardo Palma", "150714");
#
#
INSERT INTO `geo_distritos` VALUES ("1248", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Andres De Tupicocha", "150715");
#
#
INSERT INTO `geo_distritos` VALUES ("1249", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Bartolome", "150717");
#
#
INSERT INTO `geo_distritos` VALUES ("1250", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Damian", "150718");
#
#
INSERT INTO `geo_distritos` VALUES ("1251", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Juan De Iris", "150719");
#
#
INSERT INTO `geo_distritos` VALUES ("1252", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Juan De Tantaranche", "150720");
#
#
INSERT INTO `geo_distritos` VALUES ("1253", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Lorenzo De Quinti", "150721");
#
#
INSERT INTO `geo_distritos` VALUES ("1254", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Mateo", "150722");
#
#
INSERT INTO `geo_distritos` VALUES ("1255", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Mateo De Otao", "150723");
#
#
INSERT INTO `geo_distritos` VALUES ("1256", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Pedro De Casta", "150724");
#
#
INSERT INTO `geo_distritos` VALUES ("1257", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "San Pedro De Huancayre", "150725");
#
#
INSERT INTO `geo_distritos` VALUES ("1258", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Sangallaya", "150726");
#
#
INSERT INTO `geo_distritos` VALUES ("1259", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Santa Cruz De Cocachacra", "150727");
#
#
INSERT INTO `geo_distritos` VALUES ("1260", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Santa Eulalia", "150728");
#
#
INSERT INTO `geo_distritos` VALUES ("1261", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Santiago De Anchucaya", "150729");
#
#
INSERT INTO `geo_distritos` VALUES ("1262", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Santiago De Tuna", "150730");
#
#
INSERT INTO `geo_distritos` VALUES ("1263", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Santo Domingo De Los Olleros", "150731");
#
#
INSERT INTO `geo_distritos` VALUES ("1264", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "6", "Surco", "150732");
#
#
INSERT INTO `geo_distritos` VALUES ("1265", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Huacho", "150801");
#
#
INSERT INTO `geo_distritos` VALUES ("1266", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Ambar", "150802");
#
#
INSERT INTO `geo_distritos` VALUES ("1267", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Caleta De Carquin", "150803");
#
#
INSERT INTO `geo_distritos` VALUES ("1268", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Checras", "150804");
#
#
INSERT INTO `geo_distritos` VALUES ("1269", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Hualmay", "150805");
#
#
INSERT INTO `geo_distritos` VALUES ("1270", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Huaura", "150806");
#
#
INSERT INTO `geo_distritos` VALUES ("1271", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Paccho", "150808");
#
#
INSERT INTO `geo_distritos` VALUES ("1272", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Santa Leonor", "150809");
#
#
INSERT INTO `geo_distritos` VALUES ("1273", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Santa Maria", "150810");
#
#
INSERT INTO `geo_distritos` VALUES ("1274", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Sayan", "150811");
#
#
INSERT INTO `geo_distritos` VALUES ("1275", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "7", "Vegueta", "150812");
#
#
INSERT INTO `geo_distritos` VALUES ("1276", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "9", "Oyon", "150901");
#
#
INSERT INTO `geo_distritos` VALUES ("1277", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "9", "Andajes", "150902");
#
#
INSERT INTO `geo_distritos` VALUES ("1278", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "9", "Caujul", "150903");
#
#
INSERT INTO `geo_distritos` VALUES ("1279", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "9", "Cochamarca", "150904");
#
#
INSERT INTO `geo_distritos` VALUES ("1280", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "9", "Navan", "150905");
#
#
INSERT INTO `geo_distritos` VALUES ("1281", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "9", "Pachangara", "150906");
#
#
INSERT INTO `geo_distritos` VALUES ("1282", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Alis", "151002");
#
#
INSERT INTO `geo_distritos` VALUES ("1283", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Ayauca", "151003");
#
#
INSERT INTO `geo_distritos` VALUES ("1284", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Ayaviri", "151004");
#
#
INSERT INTO `geo_distritos` VALUES ("1285", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Azangaro", "151005");
#
#
INSERT INTO `geo_distritos` VALUES ("1286", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Cacra", "151006");
#
#
INSERT INTO `geo_distritos` VALUES ("1287", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Carania", "151007");
#
#
INSERT INTO `geo_distritos` VALUES ("1288", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Catahuasi", "151008");
#
#
INSERT INTO `geo_distritos` VALUES ("1289", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Chocos", "151009");
#
#
INSERT INTO `geo_distritos` VALUES ("1290", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Colonia", "151011");
#
#
INSERT INTO `geo_distritos` VALUES ("1291", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Hongos", "151012");
#
#
INSERT INTO `geo_distritos` VALUES ("1292", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Huampara", "151013");
#
#
INSERT INTO `geo_distritos` VALUES ("1293", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Huancaya", "151014");
#
#
INSERT INTO `geo_distritos` VALUES ("1294", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Huangascar", "151015");
#
#
INSERT INTO `geo_distritos` VALUES ("1295", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Huantan", "151016");
#
#
INSERT INTO `geo_distritos` VALUES ("1296", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Huañec", "151017");
#
#
INSERT INTO `geo_distritos` VALUES ("1297", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Lincha", "151019");
#
#
INSERT INTO `geo_distritos` VALUES ("1298", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Madean", "151020");
#
#
INSERT INTO `geo_distritos` VALUES ("1299", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Omas", "151022");
#
#
INSERT INTO `geo_distritos` VALUES ("1300", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Putinza", "151023");
#
#
INSERT INTO `geo_distritos` VALUES ("1301", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Quinches", "151024");
#
#
INSERT INTO `geo_distritos` VALUES ("1302", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Quinocay", "151025");
#
#
INSERT INTO `geo_distritos` VALUES ("1303", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "San Joaquin", "151026");
#
#
INSERT INTO `geo_distritos` VALUES ("1304", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "San Pedro De Pilas", "151027");
#
#
INSERT INTO `geo_distritos` VALUES ("1305", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Tanta", "151028");
#
#
INSERT INTO `geo_distritos` VALUES ("1306", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Tauripampa", "151029");
#
#
INSERT INTO `geo_distritos` VALUES ("1307", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Tomas", "151030");
#
#
INSERT INTO `geo_distritos` VALUES ("1308", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Tupe", "151031");
#
#
INSERT INTO `geo_distritos` VALUES ("1309", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Viñac", "151032");
#
#
INSERT INTO `geo_distritos` VALUES ("1310", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "10", "Vitis", "151033");
#
#
INSERT INTO `geo_distritos` VALUES ("1311", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Iquitos", "160101");
#
#
INSERT INTO `geo_distritos` VALUES ("1312", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Alto Nanay", "160102");
#
#
INSERT INTO `geo_distritos` VALUES ("1313", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Fernando Lores", "160103");
#
#
INSERT INTO `geo_distritos` VALUES ("1314", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Indiana", "160104");
#
#
INSERT INTO `geo_distritos` VALUES ("1315", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Las Amazonas", "160105");
#
#
INSERT INTO `geo_distritos` VALUES ("1316", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Mazan", "160106");
#
#
INSERT INTO `geo_distritos` VALUES ("1317", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Napo", "160107");
#
#
INSERT INTO `geo_distritos` VALUES ("1318", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Punchana", "160108");
#
#
INSERT INTO `geo_distritos` VALUES ("1319", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Putumayo", "160109");
#
#
INSERT INTO `geo_distritos` VALUES ("1320", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Torres Causana", "160110");
#
#
INSERT INTO `geo_distritos` VALUES ("1321", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "140", "Teniente Manuel Clavero", "160114");
#
#
INSERT INTO `geo_distritos` VALUES ("1322", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "141", "Yurimaguas", "160201");
#
#
INSERT INTO `geo_distritos` VALUES ("1323", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "141", "Balsapuerto", "160202");
#
#
INSERT INTO `geo_distritos` VALUES ("1324", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "141", "Jeberos", "160205");
#
#
INSERT INTO `geo_distritos` VALUES ("1325", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "141", "Teniente Cesar Lopez Rojas", "160211");
#
#
INSERT INTO `geo_distritos` VALUES ("1326", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "142", "Nauta", "160301");
#
#
INSERT INTO `geo_distritos` VALUES ("1327", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "142", "Parinari", "160302");
#
#
INSERT INTO `geo_distritos` VALUES ("1328", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "142", "Tigre", "160303");
#
#
INSERT INTO `geo_distritos` VALUES ("1329", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "142", "Trompeteros", "160304");
#
#
INSERT INTO `geo_distritos` VALUES ("1330", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "142", "Urarinas", "160305");
#
#
INSERT INTO `geo_distritos` VALUES ("1331", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "143", "Ramon Castilla", "160401");
#
#
INSERT INTO `geo_distritos` VALUES ("1332", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "143", "Pebas", "160402");
#
#
INSERT INTO `geo_distritos` VALUES ("1333", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "143", "Yavari", "160403");
#
#
INSERT INTO `geo_distritos` VALUES ("1334", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Requena", "160501");
#
#
INSERT INTO `geo_distritos` VALUES ("1335", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Alto Tapiche", "160502");
#
#
INSERT INTO `geo_distritos` VALUES ("1336", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Capelo", "160503");
#
#
INSERT INTO `geo_distritos` VALUES ("1337", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Emilio San Martin", "160504");
#
#
INSERT INTO `geo_distritos` VALUES ("1338", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Maquia", "160505");
#
#
INSERT INTO `geo_distritos` VALUES ("1339", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Puinahua", "160506");
#
#
INSERT INTO `geo_distritos` VALUES ("1340", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Saquena", "160507");
#
#
INSERT INTO `geo_distritos` VALUES ("1341", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Soplin", "160508");
#
#
INSERT INTO `geo_distritos` VALUES ("1342", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Tapiche", "160509");
#
#
INSERT INTO `geo_distritos` VALUES ("1343", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Jenaro Herrera", "160510");
#
#
INSERT INTO `geo_distritos` VALUES ("1344", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "144", "Yaquerana", "160511");
#
#
INSERT INTO `geo_distritos` VALUES ("1345", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "145", "Contamana", "160601");
#
#
INSERT INTO `geo_distritos` VALUES ("1346", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "145", "Inahuaya", "160602");
#
#
INSERT INTO `geo_distritos` VALUES ("1347", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "145", "Padre Marquez", "160603");
#
#
INSERT INTO `geo_distritos` VALUES ("1348", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "145", "Sarayacu", "160605");
#
#
INSERT INTO `geo_distritos` VALUES ("1349", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "145", "Vargas Guerra", "160606");
#
#
INSERT INTO `geo_distritos` VALUES ("1350", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "146", "Cahuapanas", "160702");
#
#
INSERT INTO `geo_distritos` VALUES ("1351", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "146", "Manseriche", "160703");
#
#
INSERT INTO `geo_distritos` VALUES ("1352", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "146", "Morona", "160704");
#
#
INSERT INTO `geo_distritos` VALUES ("1353", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "146", "Pastaza", "160705");
#
#
INSERT INTO `geo_distritos` VALUES ("1354", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "146", "Andoas", "160706");
#
#
INSERT INTO `geo_distritos` VALUES ("1355", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "147", "Tambopata", "170101");
#
#
INSERT INTO `geo_distritos` VALUES ("1356", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "147", "Inambari", "170102");
#
#
INSERT INTO `geo_distritos` VALUES ("1357", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "147", "Las Piedras", "170103");
#
#
INSERT INTO `geo_distritos` VALUES ("1358", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "147", "Laberinto", "170104");
#
#
INSERT INTO `geo_distritos` VALUES ("1359", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "148", "Manu", "170201");
#
#
INSERT INTO `geo_distritos` VALUES ("1360", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "148", "Fitzcarrald", "170202");
#
#
INSERT INTO `geo_distritos` VALUES ("1361", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "148", "Madre De Dios", "170203");
#
#
INSERT INTO `geo_distritos` VALUES ("1362", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "148", "Huepetuhe", "170204");
#
#
INSERT INTO `geo_distritos` VALUES ("1363", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "149", "Iñapari", "170301");
#
#
INSERT INTO `geo_distritos` VALUES ("1364", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "149", "Iberia", "170302");
#
#
INSERT INTO `geo_distritos` VALUES ("1365", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "149", "Tahuamanu", "170303");
#
#
INSERT INTO `geo_distritos` VALUES ("1366", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "150", "Moquegua", "180101");
#
#
INSERT INTO `geo_distritos` VALUES ("1367", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "150", "Carumas", "180102");
#
#
INSERT INTO `geo_distritos` VALUES ("1368", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "150", "Cuchumbaya", "180103");
#
#
INSERT INTO `geo_distritos` VALUES ("1369", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "150", "Samegua", "180104");
#
#
INSERT INTO `geo_distritos` VALUES ("1370", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "150", "Torata", "180106");
#
#
INSERT INTO `geo_distritos` VALUES ("1371", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Omate", "180201");
#
#
INSERT INTO `geo_distritos` VALUES ("1372", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Chojata", "180202");
#
#
INSERT INTO `geo_distritos` VALUES ("1373", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Coalaque", "180203");
#
#
INSERT INTO `geo_distritos` VALUES ("1374", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Ichuña", "180204");
#
#
INSERT INTO `geo_distritos` VALUES ("1375", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "La Capilla", "180205");
#
#
INSERT INTO `geo_distritos` VALUES ("1376", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Lloque", "180206");
#
#
INSERT INTO `geo_distritos` VALUES ("1377", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Matalaque", "180207");
#
#
INSERT INTO `geo_distritos` VALUES ("1378", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Puquina", "180208");
#
#
INSERT INTO `geo_distritos` VALUES ("1379", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Quinistaquillas", "180209");
#
#
INSERT INTO `geo_distritos` VALUES ("1380", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Ubinas", "180210");
#
#
INSERT INTO `geo_distritos` VALUES ("1381", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "151", "Yunga", "180211");
#
#
INSERT INTO `geo_distritos` VALUES ("1382", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "152", "Ilo", "180301");
#
#
INSERT INTO `geo_distritos` VALUES ("1383", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "152", "El Algarrobal", "180302");
#
#
INSERT INTO `geo_distritos` VALUES ("1384", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "152", "Pacocha", "180303");
#
#
INSERT INTO `geo_distritos` VALUES ("1385", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Chaupimarca", "190101");
#
#
INSERT INTO `geo_distritos` VALUES ("1386", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Huachon", "190102");
#
#
INSERT INTO `geo_distritos` VALUES ("1387", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Huariaca", "190103");
#
#
INSERT INTO `geo_distritos` VALUES ("1388", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Huayllay", "190104");
#
#
INSERT INTO `geo_distritos` VALUES ("1389", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Ninacaca", "190105");
#
#
INSERT INTO `geo_distritos` VALUES ("1390", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Pallanchacra", "190106");
#
#
INSERT INTO `geo_distritos` VALUES ("1391", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "San Francisco De Asis De Yarusyacan", "190108");
#
#
INSERT INTO `geo_distritos` VALUES ("1392", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Simon Bolivar", "190109");
#
#
INSERT INTO `geo_distritos` VALUES ("1393", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Ticlacayan", "190110");
#
#
INSERT INTO `geo_distritos` VALUES ("1394", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Tinyahuarco", "190111");
#
#
INSERT INTO `geo_distritos` VALUES ("1395", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "153", "Vicco", "190112");
#
#
INSERT INTO `geo_distritos` VALUES ("1396", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "Yanahuanca", "190201");
#
#
INSERT INTO `geo_distritos` VALUES ("1397", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "Chacayan", "190202");
#
#
INSERT INTO `geo_distritos` VALUES ("1398", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "Goyllarisquizga", "190203");
#
#
INSERT INTO `geo_distritos` VALUES ("1399", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "Paucar", "190204");
#
#
INSERT INTO `geo_distritos` VALUES ("1400", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "San Pedro De Pillao", "190205");
#
#
INSERT INTO `geo_distritos` VALUES ("1401", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "Santa Ana De Tusi", "190206");
#
#
INSERT INTO `geo_distritos` VALUES ("1402", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "154", "Tapuc", "190207");
#
#
INSERT INTO `geo_distritos` VALUES ("1403", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Oxapampa", "190301");
#
#
INSERT INTO `geo_distritos` VALUES ("1404", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Chontabamba", "190302");
#
#
INSERT INTO `geo_distritos` VALUES ("1405", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Huancabamba", "190303");
#
#
INSERT INTO `geo_distritos` VALUES ("1406", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Palcazu", "190304");
#
#
INSERT INTO `geo_distritos` VALUES ("1407", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Pozuzo", "190305");
#
#
INSERT INTO `geo_distritos` VALUES ("1408", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Puerto Bermudez", "190306");
#
#
INSERT INTO `geo_distritos` VALUES ("1409", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "155", "Villa Rica", "190307");
#
#
INSERT INTO `geo_distritos` VALUES ("1410", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "Piura", "200101");
#
#
INSERT INTO `geo_distritos` VALUES ("1411", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "Castilla", "200104");
#
#
INSERT INTO `geo_distritos` VALUES ("1412", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "Catacaos", "200105");
#
#
INSERT INTO `geo_distritos` VALUES ("1413", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "Cura Mori", "200107");
#
#
INSERT INTO `geo_distritos` VALUES ("1414", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "El Tallan", "200108");
#
#
INSERT INTO `geo_distritos` VALUES ("1415", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "La Arena", "200109");
#
#
INSERT INTO `geo_distritos` VALUES ("1416", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "Las Lomas", "200111");
#
#
INSERT INTO `geo_distritos` VALUES ("1417", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "156", "Tambo Grande", "200114");
#
#
INSERT INTO `geo_distritos` VALUES ("1418", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Ayabaca", "200201");
#
#
INSERT INTO `geo_distritos` VALUES ("1419", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Frias", "200202");
#
#
INSERT INTO `geo_distritos` VALUES ("1420", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Jilili", "200203");
#
#
INSERT INTO `geo_distritos` VALUES ("1421", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Montero", "200205");
#
#
INSERT INTO `geo_distritos` VALUES ("1422", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Pacaipampa", "200206");
#
#
INSERT INTO `geo_distritos` VALUES ("1423", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Paimas", "200207");
#
#
INSERT INTO `geo_distritos` VALUES ("1424", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Sapillica", "200208");
#
#
INSERT INTO `geo_distritos` VALUES ("1425", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Sicchez", "200209");
#
#
INSERT INTO `geo_distritos` VALUES ("1426", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "157", "Suyo", "200210");
#
#
INSERT INTO `geo_distritos` VALUES ("1427", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "Canchaque", "200302");
#
#
INSERT INTO `geo_distritos` VALUES ("1428", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "El Carmen De La Frontera", "200303");
#
#
INSERT INTO `geo_distritos` VALUES ("1429", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "Huarmaca", "200304");
#
#
INSERT INTO `geo_distritos` VALUES ("1430", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "Lalaquiz", "200305");
#
#
INSERT INTO `geo_distritos` VALUES ("1431", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "San Miguel De El Faique", "200306");
#
#
INSERT INTO `geo_distritos` VALUES ("1432", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "Sondor", "200307");
#
#
INSERT INTO `geo_distritos` VALUES ("1433", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "158", "Sondorillo", "200308");
#
#
INSERT INTO `geo_distritos` VALUES ("1434", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Chulucanas", "200401");
#
#
INSERT INTO `geo_distritos` VALUES ("1435", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Buenos Aires", "200402");
#
#
INSERT INTO `geo_distritos` VALUES ("1436", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Chalaco", "200403");
#
#
INSERT INTO `geo_distritos` VALUES ("1437", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "La Matanza", "200404");
#
#
INSERT INTO `geo_distritos` VALUES ("1438", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Morropon", "200405");
#
#
INSERT INTO `geo_distritos` VALUES ("1439", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Salitral", "200406");
#
#
INSERT INTO `geo_distritos` VALUES ("1440", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "San Juan De Bigote", "200407");
#
#
INSERT INTO `geo_distritos` VALUES ("1441", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Santa Catalina De Mossa", "200408");
#
#
INSERT INTO `geo_distritos` VALUES ("1442", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Santo Domingo", "200409");
#
#
INSERT INTO `geo_distritos` VALUES ("1443", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "159", "Yamango", "200410");
#
#
INSERT INTO `geo_distritos` VALUES ("1444", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "Paita", "200501");
#
#
INSERT INTO `geo_distritos` VALUES ("1445", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "Amotape", "200502");
#
#
INSERT INTO `geo_distritos` VALUES ("1446", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "Arenal", "200503");
#
#
INSERT INTO `geo_distritos` VALUES ("1447", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "Colan", "200504");
#
#
INSERT INTO `geo_distritos` VALUES ("1448", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "La Huaca", "200505");
#
#
INSERT INTO `geo_distritos` VALUES ("1449", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "Tamarindo", "200506");
#
#
INSERT INTO `geo_distritos` VALUES ("1450", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "160", "Vichayal", "200507");
#
#
INSERT INTO `geo_distritos` VALUES ("1451", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "161", "Sullana", "200601");
#
#
INSERT INTO `geo_distritos` VALUES ("1452", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "161", "Ignacio Escudero", "200603");
#
#
INSERT INTO `geo_distritos` VALUES ("1453", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "161", "Lancones", "200604");
#
#
INSERT INTO `geo_distritos` VALUES ("1454", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "161", "Marcavelica", "200605");
#
#
INSERT INTO `geo_distritos` VALUES ("1455", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "161", "Miguel Checa", "200606");
#
#
INSERT INTO `geo_distritos` VALUES ("1456", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "161", "Querecotillo", "200607");
#
#
INSERT INTO `geo_distritos` VALUES ("1457", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "162", "Pariñas", "200701");
#
#
INSERT INTO `geo_distritos` VALUES ("1458", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "162", "El Alto", "200702");
#
#
INSERT INTO `geo_distritos` VALUES ("1459", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "162", "La Brea", "200703");
#
#
INSERT INTO `geo_distritos` VALUES ("1460", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "162", "Lobitos", "200704");
#
#
INSERT INTO `geo_distritos` VALUES ("1461", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "162", "Los Organos", "200705");
#
#
INSERT INTO `geo_distritos` VALUES ("1462", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "162", "Mancora", "200706");
#
#
INSERT INTO `geo_distritos` VALUES ("1463", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "163", "Sechura", "200801");
#
#
INSERT INTO `geo_distritos` VALUES ("1464", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "163", "Bellavista De La Union", "200802");
#
#
INSERT INTO `geo_distritos` VALUES ("1465", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "163", "Bernal", "200803");
#
#
INSERT INTO `geo_distritos` VALUES ("1466", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "163", "Cristo Nos Valga", "200804");
#
#
INSERT INTO `geo_distritos` VALUES ("1467", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "163", "Vice", "200805");
#
#
INSERT INTO `geo_distritos` VALUES ("1468", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "163", "Rinconada Llicuar", "200806");
#
#
INSERT INTO `geo_distritos` VALUES ("1469", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Puno", "210101");
#
#
INSERT INTO `geo_distritos` VALUES ("1470", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Acora", "210102");
#
#
INSERT INTO `geo_distritos` VALUES ("1471", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Amantani", "210103");
#
#
INSERT INTO `geo_distritos` VALUES ("1472", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Atuncolla", "210104");
#
#
INSERT INTO `geo_distritos` VALUES ("1473", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Capachica", "210105");
#
#
INSERT INTO `geo_distritos` VALUES ("1474", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Chucuito", "210106");
#
#
INSERT INTO `geo_distritos` VALUES ("1475", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Coata", "210107");
#
#
INSERT INTO `geo_distritos` VALUES ("1476", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Mañazo", "210109");
#
#
INSERT INTO `geo_distritos` VALUES ("1477", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Paucarcolla", "210110");
#
#
INSERT INTO `geo_distritos` VALUES ("1478", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Pichacani", "210111");
#
#
INSERT INTO `geo_distritos` VALUES ("1479", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Plateria", "210112");
#
#
INSERT INTO `geo_distritos` VALUES ("1480", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Tiquillaca", "210114");
#
#
INSERT INTO `geo_distritos` VALUES ("1481", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "164", "Vilque", "210115");
#
#
INSERT INTO `geo_distritos` VALUES ("1482", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Achaya", "210202");
#
#
INSERT INTO `geo_distritos` VALUES ("1483", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Arapa", "210203");
#
#
INSERT INTO `geo_distritos` VALUES ("1484", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Asillo", "210204");
#
#
INSERT INTO `geo_distritos` VALUES ("1485", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Caminaca", "210205");
#
#
INSERT INTO `geo_distritos` VALUES ("1486", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Chupa", "210206");
#
#
INSERT INTO `geo_distritos` VALUES ("1487", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Jose Domingo Choquehuanca", "210207");
#
#
INSERT INTO `geo_distritos` VALUES ("1488", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Muñani", "210208");
#
#
INSERT INTO `geo_distritos` VALUES ("1489", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Potoni", "210209");
#
#
INSERT INTO `geo_distritos` VALUES ("1490", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Saman", "210210");
#
#
INSERT INTO `geo_distritos` VALUES ("1491", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "San Anton", "210211");
#
#
INSERT INTO `geo_distritos` VALUES ("1492", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "San Juan De Salinas", "210213");
#
#
INSERT INTO `geo_distritos` VALUES ("1493", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Santiago De Pupuja", "210214");
#
#
INSERT INTO `geo_distritos` VALUES ("1494", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "165", "Tirapata", "210215");
#
#
INSERT INTO `geo_distritos` VALUES ("1495", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Macusani", "210301");
#
#
INSERT INTO `geo_distritos` VALUES ("1496", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Ajoyani", "210302");
#
#
INSERT INTO `geo_distritos` VALUES ("1497", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Ayapata", "210303");
#
#
INSERT INTO `geo_distritos` VALUES ("1498", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Coasa", "210304");
#
#
INSERT INTO `geo_distritos` VALUES ("1499", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Corani", "210305");
#
#
INSERT INTO `geo_distritos` VALUES ("1500", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Crucero", "210306");
#
#
INSERT INTO `geo_distritos` VALUES ("1501", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Ituata", "210307");
#
#
INSERT INTO `geo_distritos` VALUES ("1502", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Ollachea", "210308");
#
#
INSERT INTO `geo_distritos` VALUES ("1503", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "San Gaban", "210309");
#
#
INSERT INTO `geo_distritos` VALUES ("1504", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "166", "Usicayos", "210310");
#
#
INSERT INTO `geo_distritos` VALUES ("1505", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Juli", "210401");
#
#
INSERT INTO `geo_distritos` VALUES ("1506", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Desaguadero", "210402");
#
#
INSERT INTO `geo_distritos` VALUES ("1507", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Huacullani", "210403");
#
#
INSERT INTO `geo_distritos` VALUES ("1508", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Kelluyo", "210404");
#
#
INSERT INTO `geo_distritos` VALUES ("1509", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Pisacoma", "210405");
#
#
INSERT INTO `geo_distritos` VALUES ("1510", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Pomata", "210406");
#
#
INSERT INTO `geo_distritos` VALUES ("1511", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "167", "Zepita", "210407");
#
#
INSERT INTO `geo_distritos` VALUES ("1512", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "168", "Ilave", "210501");
#
#
INSERT INTO `geo_distritos` VALUES ("1513", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "168", "Capazo", "210502");
#
#
INSERT INTO `geo_distritos` VALUES ("1514", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "168", "Pilcuyo", "210503");
#
#
INSERT INTO `geo_distritos` VALUES ("1515", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "168", "Conduriri", "210505");
#
#
INSERT INTO `geo_distritos` VALUES ("1516", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Huancane", "210601");
#
#
INSERT INTO `geo_distritos` VALUES ("1517", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Cojata", "210602");
#
#
INSERT INTO `geo_distritos` VALUES ("1518", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Huatasani", "210603");
#
#
INSERT INTO `geo_distritos` VALUES ("1519", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Inchupalla", "210604");
#
#
INSERT INTO `geo_distritos` VALUES ("1520", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Pusi", "210605");
#
#
INSERT INTO `geo_distritos` VALUES ("1521", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Rosaspata", "210606");
#
#
INSERT INTO `geo_distritos` VALUES ("1522", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Taraco", "210607");
#
#
INSERT INTO `geo_distritos` VALUES ("1523", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "169", "Vilque Chico", "210608");
#
#
INSERT INTO `geo_distritos` VALUES ("1524", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "170", "Cabanilla", "210702");
#
#
INSERT INTO `geo_distritos` VALUES ("1525", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "170", "Calapuja", "210703");
#
#
INSERT INTO `geo_distritos` VALUES ("1526", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "170", "Nicasio", "210704");
#
#
INSERT INTO `geo_distritos` VALUES ("1527", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "170", "Ocuviri", "210705");
#
#
INSERT INTO `geo_distritos` VALUES ("1528", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "170", "Paratia", "210707");
#
#
INSERT INTO `geo_distritos` VALUES ("1529", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "170", "Vilavila", "210710");
#
#
INSERT INTO `geo_distritos` VALUES ("1530", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Antauta", "210802");
#
#
INSERT INTO `geo_distritos` VALUES ("1531", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Cupi", "210803");
#
#
INSERT INTO `geo_distritos` VALUES ("1532", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Llalli", "210804");
#
#
INSERT INTO `geo_distritos` VALUES ("1533", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Macari", "210805");
#
#
INSERT INTO `geo_distritos` VALUES ("1534", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Nuñoa", "210806");
#
#
INSERT INTO `geo_distritos` VALUES ("1535", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Orurillo", "210807");
#
#
INSERT INTO `geo_distritos` VALUES ("1536", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "171", "Umachiri", "210809");
#
#
INSERT INTO `geo_distritos` VALUES ("1537", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "172", "Moho", "210901");
#
#
INSERT INTO `geo_distritos` VALUES ("1538", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "172", "Conima", "210902");
#
#
INSERT INTO `geo_distritos` VALUES ("1539", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "172", "Huayrapata", "210903");
#
#
INSERT INTO `geo_distritos` VALUES ("1540", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "172", "Tilali", "210904");
#
#
INSERT INTO `geo_distritos` VALUES ("1541", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "173", "Putina", "211001");
#
#
INSERT INTO `geo_distritos` VALUES ("1542", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "173", "Ananea", "211002");
#
#
INSERT INTO `geo_distritos` VALUES ("1543", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "173", "Pedro Vilca Apaza", "211003");
#
#
INSERT INTO `geo_distritos` VALUES ("1544", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "173", "Quilcapuncu", "211004");
#
#
INSERT INTO `geo_distritos` VALUES ("1545", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "173", "Sina", "211005");
#
#
INSERT INTO `geo_distritos` VALUES ("1546", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "174", "Juliaca", "211101");
#
#
INSERT INTO `geo_distritos` VALUES ("1547", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "174", "Cabanillas", "211103");
#
#
INSERT INTO `geo_distritos` VALUES ("1548", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "174", "Caracoto", "211104");
#
#
INSERT INTO `geo_distritos` VALUES ("1549", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Sandia", "211201");
#
#
INSERT INTO `geo_distritos` VALUES ("1550", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Cuyocuyo", "211202");
#
#
INSERT INTO `geo_distritos` VALUES ("1551", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Limbani", "211203");
#
#
INSERT INTO `geo_distritos` VALUES ("1552", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Patambuco", "211204");
#
#
INSERT INTO `geo_distritos` VALUES ("1553", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Phara", "211205");
#
#
INSERT INTO `geo_distritos` VALUES ("1554", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Quiaca", "211206");
#
#
INSERT INTO `geo_distritos` VALUES ("1555", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "San Juan Del Oro", "211207");
#
#
INSERT INTO `geo_distritos` VALUES ("1556", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Yanahuaya", "211208");
#
#
INSERT INTO `geo_distritos` VALUES ("1557", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "Alto Inambari", "211209");
#
#
INSERT INTO `geo_distritos` VALUES ("1558", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "175", "San Pedro De Putina Punco", "211210");
#
#
INSERT INTO `geo_distritos` VALUES ("1559", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Yunguyo", "211301");
#
#
INSERT INTO `geo_distritos` VALUES ("1560", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Anapia", "211302");
#
#
INSERT INTO `geo_distritos` VALUES ("1561", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Copani", "211303");
#
#
INSERT INTO `geo_distritos` VALUES ("1562", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Cuturapi", "211304");
#
#
INSERT INTO `geo_distritos` VALUES ("1563", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Ollaraya", "211305");
#
#
INSERT INTO `geo_distritos` VALUES ("1564", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Tinicachi", "211306");
#
#
INSERT INTO `geo_distritos` VALUES ("1565", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "176", "Unicachi", "211307");
#
#
INSERT INTO `geo_distritos` VALUES ("1566", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "177", "Moyobamba", "220101");
#
#
INSERT INTO `geo_distritos` VALUES ("1567", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "177", "Calzada", "220102");
#
#
INSERT INTO `geo_distritos` VALUES ("1568", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "177", "Habana", "220103");
#
#
INSERT INTO `geo_distritos` VALUES ("1569", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "177", "Jepelacio", "220104");
#
#
INSERT INTO `geo_distritos` VALUES ("1570", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "177", "Soritor", "220105");
#
#
INSERT INTO `geo_distritos` VALUES ("1571", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "177", "Yantalo", "220106");
#
#
INSERT INTO `geo_distritos` VALUES ("1572", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "178", "Alto Biavo", "220202");
#
#
INSERT INTO `geo_distritos` VALUES ("1573", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "178", "Bajo Biavo", "220203");
#
#
INSERT INTO `geo_distritos` VALUES ("1574", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "178", "Huallaga", "220204");
#
#
INSERT INTO `geo_distritos` VALUES ("1575", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "179", "San Jose De Sisa", "220301");
#
#
INSERT INTO `geo_distritos` VALUES ("1576", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "179", "Agua Blanca", "220302");
#
#
INSERT INTO `geo_distritos` VALUES ("1577", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "179", "San Martin", "220303");
#
#
INSERT INTO `geo_distritos` VALUES ("1578", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "179", "Shatoja", "220305");
#
#
INSERT INTO `geo_distritos` VALUES ("1579", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "180", "Saposoa", "220401");
#
#
INSERT INTO `geo_distritos` VALUES ("1580", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "180", "Alto Saposoa", "220402");
#
#
INSERT INTO `geo_distritos` VALUES ("1581", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "180", "El Eslabon", "220403");
#
#
INSERT INTO `geo_distritos` VALUES ("1582", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "180", "Piscoyacu", "220404");
#
#
INSERT INTO `geo_distritos` VALUES ("1583", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "180", "Sacanche", "220405");
#
#
INSERT INTO `geo_distritos` VALUES ("1584", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "180", "Tingo De Saposoa", "220406");
#
#
INSERT INTO `geo_distritos` VALUES ("1585", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Lamas", "220501");
#
#
INSERT INTO `geo_distritos` VALUES ("1586", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Alonso De Alvarado", "220502");
#
#
INSERT INTO `geo_distritos` VALUES ("1587", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Barranquita", "220503");
#
#
INSERT INTO `geo_distritos` VALUES ("1588", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Caynarachi", "220504");
#
#
INSERT INTO `geo_distritos` VALUES ("1589", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Cuñumbuqui", "220505");
#
#
INSERT INTO `geo_distritos` VALUES ("1590", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Pinto Recodo", "220506");
#
#
INSERT INTO `geo_distritos` VALUES ("1591", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Rumisapa", "220507");
#
#
INSERT INTO `geo_distritos` VALUES ("1592", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "San Roque De Cumbaza", "220508");
#
#
INSERT INTO `geo_distritos` VALUES ("1593", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Shanao", "220509");
#
#
INSERT INTO `geo_distritos` VALUES ("1594", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Tabalosos", "220510");
#
#
INSERT INTO `geo_distritos` VALUES ("1595", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "181", "Zapatero", "220511");
#
#
INSERT INTO `geo_distritos` VALUES ("1596", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "182", "Juanjui", "220601");
#
#
INSERT INTO `geo_distritos` VALUES ("1597", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "182", "Campanilla", "220602");
#
#
INSERT INTO `geo_distritos` VALUES ("1598", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "182", "Huicungo", "220603");
#
#
INSERT INTO `geo_distritos` VALUES ("1599", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "182", "Pachiza", "220604");
#
#
INSERT INTO `geo_distritos` VALUES ("1600", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "182", "Pajarillo", "220605");
#
#
INSERT INTO `geo_distritos` VALUES ("1601", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Picota", "220701");
#
#
INSERT INTO `geo_distritos` VALUES ("1602", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Caspisapa", "220703");
#
#
INSERT INTO `geo_distritos` VALUES ("1603", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Pilluana", "220704");
#
#
INSERT INTO `geo_distritos` VALUES ("1604", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Pucacaca", "220705");
#
#
INSERT INTO `geo_distritos` VALUES ("1605", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "San Hilarion", "220707");
#
#
INSERT INTO `geo_distritos` VALUES ("1606", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Shamboyacu", "220708");
#
#
INSERT INTO `geo_distritos` VALUES ("1607", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Tingo De Ponasa", "220709");
#
#
INSERT INTO `geo_distritos` VALUES ("1608", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "183", "Tres Unidos", "220710");
#
#
INSERT INTO `geo_distritos` VALUES ("1609", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Rioja", "220801");
#
#
INSERT INTO `geo_distritos` VALUES ("1610", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Awajun", "220802");
#
#
INSERT INTO `geo_distritos` VALUES ("1611", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Elias Soplin Vargas", "220803");
#
#
INSERT INTO `geo_distritos` VALUES ("1612", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Nueva Cajamarca", "220804");
#
#
INSERT INTO `geo_distritos` VALUES ("1613", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Pardo Miguel", "220805");
#
#
INSERT INTO `geo_distritos` VALUES ("1614", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Posic", "220806");
#
#
INSERT INTO `geo_distritos` VALUES ("1615", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "San Fernando", "220807");
#
#
INSERT INTO `geo_distritos` VALUES ("1616", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Yorongos", "220808");
#
#
INSERT INTO `geo_distritos` VALUES ("1617", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "184", "Yuracyacu", "220809");
#
#
INSERT INTO `geo_distritos` VALUES ("1618", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Tarapoto", "220901");
#
#
INSERT INTO `geo_distritos` VALUES ("1619", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Alberto Leveau", "220902");
#
#
INSERT INTO `geo_distritos` VALUES ("1620", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Cacatachi", "220903");
#
#
INSERT INTO `geo_distritos` VALUES ("1621", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Chazuta", "220904");
#
#
INSERT INTO `geo_distritos` VALUES ("1622", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Chipurana", "220905");
#
#
INSERT INTO `geo_distritos` VALUES ("1623", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Huimbayoc", "220907");
#
#
INSERT INTO `geo_distritos` VALUES ("1624", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Juan Guerra", "220908");
#
#
INSERT INTO `geo_distritos` VALUES ("1625", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "La Banda De Shilcayo", "220909");
#
#
INSERT INTO `geo_distritos` VALUES ("1626", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Morales", "220910");
#
#
INSERT INTO `geo_distritos` VALUES ("1627", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Papaplaya", "220911");
#
#
INSERT INTO `geo_distritos` VALUES ("1628", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Sauce", "220913");
#
#
INSERT INTO `geo_distritos` VALUES ("1629", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "185", "Shapaja", "220914");
#
#
INSERT INTO `geo_distritos` VALUES ("1630", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "186", "Tocache", "221001");
#
#
INSERT INTO `geo_distritos` VALUES ("1631", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "186", "Nuevo Progreso", "221002");
#
#
INSERT INTO `geo_distritos` VALUES ("1632", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "186", "Polvora", "221003");
#
#
INSERT INTO `geo_distritos` VALUES ("1633", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "186", "Shunte", "221004");
#
#
INSERT INTO `geo_distritos` VALUES ("1634", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "186", "Uchiza", "221005");
#
#
INSERT INTO `geo_distritos` VALUES ("1635", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Tacna", "230101");
#
#
INSERT INTO `geo_distritos` VALUES ("1636", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Alto De La Alianza", "230102");
#
#
INSERT INTO `geo_distritos` VALUES ("1637", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Calana", "230103");
#
#
INSERT INTO `geo_distritos` VALUES ("1638", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Ciudad Nueva", "230104");
#
#
INSERT INTO `geo_distritos` VALUES ("1639", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Inclan", "230105");
#
#
INSERT INTO `geo_distritos` VALUES ("1640", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Pachia", "230106");
#
#
INSERT INTO `geo_distritos` VALUES ("1641", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Pocollay", "230108");
#
#
INSERT INTO `geo_distritos` VALUES ("1642", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Sama", "230109");
#
#
INSERT INTO `geo_distritos` VALUES ("1643", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "187", "Coronel Gregorio Albarracin Lanchipa", "230110");
#
#
INSERT INTO `geo_distritos` VALUES ("1644", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "188", "Candarave", "230201");
#
#
INSERT INTO `geo_distritos` VALUES ("1645", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "188", "Cairani", "230202");
#
#
INSERT INTO `geo_distritos` VALUES ("1646", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "188", "Camilaca", "230203");
#
#
INSERT INTO `geo_distritos` VALUES ("1647", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "188", "Curibaya", "230204");
#
#
INSERT INTO `geo_distritos` VALUES ("1648", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "188", "Huanuara", "230205");
#
#
INSERT INTO `geo_distritos` VALUES ("1649", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "188", "Quilahuani", "230206");
#
#
INSERT INTO `geo_distritos` VALUES ("1650", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "189", "Locumba", "230301");
#
#
INSERT INTO `geo_distritos` VALUES ("1651", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "189", "Ilabaya", "230302");
#
#
INSERT INTO `geo_distritos` VALUES ("1652", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "189", "Ite", "230303");
#
#
INSERT INTO `geo_distritos` VALUES ("1653", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Tarata", "230401");
#
#
INSERT INTO `geo_distritos` VALUES ("1654", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Heroes Albarracin", "230402");
#
#
INSERT INTO `geo_distritos` VALUES ("1655", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Estique", "230403");
#
#
INSERT INTO `geo_distritos` VALUES ("1656", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Estique-Pampa", "230404");
#
#
INSERT INTO `geo_distritos` VALUES ("1657", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Sitajara", "230405");
#
#
INSERT INTO `geo_distritos` VALUES ("1658", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Susapaya", "230406");
#
#
INSERT INTO `geo_distritos` VALUES ("1659", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Tarucachi", "230407");
#
#
INSERT INTO `geo_distritos` VALUES ("1660", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "190", "Ticaco", "230408");
#
#
INSERT INTO `geo_distritos` VALUES ("1661", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "191", "Tumbes", "240101");
#
#
INSERT INTO `geo_distritos` VALUES ("1662", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "191", "Corrales", "240102");
#
#
INSERT INTO `geo_distritos` VALUES ("1663", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "191", "La Cruz", "240103");
#
#
INSERT INTO `geo_distritos` VALUES ("1664", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "191", "Pampas De Hospital", "240104");
#
#
INSERT INTO `geo_distritos` VALUES ("1665", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "191", "San Jacinto", "240105");
#
#
INSERT INTO `geo_distritos` VALUES ("1666", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "191", "San Juan De La Virgen", "240106");
#
#
INSERT INTO `geo_distritos` VALUES ("1667", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "192", "Zorritos", "240201");
#
#
INSERT INTO `geo_distritos` VALUES ("1668", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "192", "Casitas", "240202");
#
#
INSERT INTO `geo_distritos` VALUES ("1669", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "192", "Canoas De Punta Sal", "240203");
#
#
INSERT INTO `geo_distritos` VALUES ("1670", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "193", "Zarumilla", "240301");
#
#
INSERT INTO `geo_distritos` VALUES ("1671", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "193", "Aguas Verdes", "240302");
#
#
INSERT INTO `geo_distritos` VALUES ("1672", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "193", "Matapalo", "240303");
#
#
INSERT INTO `geo_distritos` VALUES ("1673", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "193", "Papayal", "240304");
#
#
INSERT INTO `geo_distritos` VALUES ("1674", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Calleria", "250101");
#
#
INSERT INTO `geo_distritos` VALUES ("1675", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Campoverde", "250102");
#
#
INSERT INTO `geo_distritos` VALUES ("1676", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Iparia", "250103");
#
#
INSERT INTO `geo_distritos` VALUES ("1677", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Masisea", "250104");
#
#
INSERT INTO `geo_distritos` VALUES ("1678", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Yarinacocha", "250105");
#
#
INSERT INTO `geo_distritos` VALUES ("1679", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Nueva Requena", "250106");
#
#
INSERT INTO `geo_distritos` VALUES ("1680", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "194", "Manantay", "250107");
#
#
INSERT INTO `geo_distritos` VALUES ("1681", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "195", "Raymondi", "250201");
#
#
INSERT INTO `geo_distritos` VALUES ("1682", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "195", "Sepahua", "250202");
#
#
INSERT INTO `geo_distritos` VALUES ("1683", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "195", "Tahuania", "250203");
#
#
INSERT INTO `geo_distritos` VALUES ("1684", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "195", "Yurua", "250204");
#
#
INSERT INTO `geo_distritos` VALUES ("1685", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "196", "Padre Abad", "250301");
#
#
INSERT INTO `geo_distritos` VALUES ("1686", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "196", "Irazola", "250302");
#
#
INSERT INTO `geo_distritos` VALUES ("1687", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "196", "Curimana", "250303");
#
#
INSERT INTO `geo_distritos` VALUES ("1688", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "197", "Purus", "250401");
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
  `visibilidad` char(1) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `id_departamento` int(10) DEFAULT NULL,
  `geo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `geo_provincias` VALUES ("1", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Barranca", "14", "1502");
#
#
INSERT INTO `geo_provincias` VALUES ("2", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cajatambo", "14", "1503");
#
#
INSERT INTO `geo_provincias` VALUES ("3", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Canta", "14", "1504");
#
#
INSERT INTO `geo_provincias` VALUES ("4", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cañete", "14", "1505");
#
#
INSERT INTO `geo_provincias` VALUES ("5", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huaral", "14", "1506");
#
#
INSERT INTO `geo_provincias` VALUES ("6", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huarochirí", "14", "1507");
#
#
INSERT INTO `geo_provincias` VALUES ("7", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huaura", "14", "1508");
#
#
INSERT INTO `geo_provincias` VALUES ("8", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lima", "14", "1501");
#
#
INSERT INTO `geo_provincias` VALUES ("9", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Oyón", "14", "1509");
#
#
INSERT INTO `geo_provincias` VALUES ("10", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Yauyos", "14", "1510");
#
#
INSERT INTO `geo_provincias` VALUES ("198", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Callao", "26", "0701");
#
#
INSERT INTO `geo_provincias` VALUES ("14", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chachapoyas", "1", "0101");
#
#
INSERT INTO `geo_provincias` VALUES ("15", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Bagua", "1", "0102");
#
#
INSERT INTO `geo_provincias` VALUES ("16", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Bongara", "1", "0103");
#
#
INSERT INTO `geo_provincias` VALUES ("17", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Condorcanqui", "1", "0104");
#
#
INSERT INTO `geo_provincias` VALUES ("18", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Luya", "1", "0105");
#
#
INSERT INTO `geo_provincias` VALUES ("19", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Rodriguez De Mendoza", "1", "0106");
#
#
INSERT INTO `geo_provincias` VALUES ("20", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Utcubamba", "1", "0107");
#
#
INSERT INTO `geo_provincias` VALUES ("21", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huaraz", "2", "0201");
#
#
INSERT INTO `geo_provincias` VALUES ("22", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Aija", "2", "0202");
#
#
INSERT INTO `geo_provincias` VALUES ("23", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Antonio Raymondi", "2", "0203");
#
#
INSERT INTO `geo_provincias` VALUES ("24", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Asuncion", "2", "0204");
#
#
INSERT INTO `geo_provincias` VALUES ("25", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Bolognesi", "2", "0205");
#
#
INSERT INTO `geo_provincias` VALUES ("26", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Carhuaz", "2", "0206");
#
#
INSERT INTO `geo_provincias` VALUES ("27", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Carlos Fermin Fitzcarrald", "2", "0207");
#
#
INSERT INTO `geo_provincias` VALUES ("28", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Casma", "2", "0208");
#
#
INSERT INTO `geo_provincias` VALUES ("29", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Corongo", "2", "0209");
#
#
INSERT INTO `geo_provincias` VALUES ("30", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huari", "2", "0210");
#
#
INSERT INTO `geo_provincias` VALUES ("31", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huarmey", "2", "0211");
#
#
INSERT INTO `geo_provincias` VALUES ("32", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huaylas", "2", "0212");
#
#
INSERT INTO `geo_provincias` VALUES ("33", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Mariscal Luzuriaga", "2", "0213");
#
#
INSERT INTO `geo_provincias` VALUES ("34", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ocros", "2", "0214");
#
#
INSERT INTO `geo_provincias` VALUES ("35", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pallasca", "2", "0215");
#
#
INSERT INTO `geo_provincias` VALUES ("36", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pomabamba", "2", "0216");
#
#
INSERT INTO `geo_provincias` VALUES ("37", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Recuay", "2", "0217");
#
#
INSERT INTO `geo_provincias` VALUES ("38", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Santa", "2", "0218");
#
#
INSERT INTO `geo_provincias` VALUES ("39", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Sihuas", "2", "0219");
#
#
INSERT INTO `geo_provincias` VALUES ("40", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Yungay", "2", "0220");
#
#
INSERT INTO `geo_provincias` VALUES ("41", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Abancay", "3", "0301");
#
#
INSERT INTO `geo_provincias` VALUES ("42", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Andahuaylas", "3", "0302");
#
#
INSERT INTO `geo_provincias` VALUES ("43", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Antabamba", "3", "0303");
#
#
INSERT INTO `geo_provincias` VALUES ("44", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Aymaraes", "3", "0304");
#
#
INSERT INTO `geo_provincias` VALUES ("45", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cotabambas", "3", "0305");
#
#
INSERT INTO `geo_provincias` VALUES ("46", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chincheros", "3", "0306");
#
#
INSERT INTO `geo_provincias` VALUES ("47", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Grau", "3", "0307");
#
#
INSERT INTO `geo_provincias` VALUES ("48", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Arequipa", "4", "0401");
#
#
INSERT INTO `geo_provincias` VALUES ("49", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Camana", "4", "0402");
#
#
INSERT INTO `geo_provincias` VALUES ("50", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Caraveli", "4", "0403");
#
#
INSERT INTO `geo_provincias` VALUES ("51", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Castilla", "4", "0404");
#
#
INSERT INTO `geo_provincias` VALUES ("52", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Caylloma", "4", "0405");
#
#
INSERT INTO `geo_provincias` VALUES ("53", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Condesuyos", "4", "0406");
#
#
INSERT INTO `geo_provincias` VALUES ("54", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Islay", "4", "0407");
#
#
INSERT INTO `geo_provincias` VALUES ("55", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "La Union", "4", "0408");
#
#
INSERT INTO `geo_provincias` VALUES ("56", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huamanga", "5", "0501");
#
#
INSERT INTO `geo_provincias` VALUES ("57", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cangallo", "5", "0502");
#
#
INSERT INTO `geo_provincias` VALUES ("58", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huanca Sancos", "5", "0503");
#
#
INSERT INTO `geo_provincias` VALUES ("59", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huanta", "5", "0504");
#
#
INSERT INTO `geo_provincias` VALUES ("60", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "La Mar", "5", "0505");
#
#
INSERT INTO `geo_provincias` VALUES ("61", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lucanas", "5", "0506");
#
#
INSERT INTO `geo_provincias` VALUES ("62", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Parinacochas", "5", "0507");
#
#
INSERT INTO `geo_provincias` VALUES ("63", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Paucar Del Sara Sara", "5", "0508");
#
#
INSERT INTO `geo_provincias` VALUES ("64", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Sucre", "5", "0509");
#
#
INSERT INTO `geo_provincias` VALUES ("65", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Victor Fajardo", "5", "0510");
#
#
INSERT INTO `geo_provincias` VALUES ("66", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Vilcas Huaman", "5", "0511");
#
#
INSERT INTO `geo_provincias` VALUES ("67", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cajamarca", "6", "0601");
#
#
INSERT INTO `geo_provincias` VALUES ("68", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cajabamba", "6", "0602");
#
#
INSERT INTO `geo_provincias` VALUES ("69", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Celendin", "6", "0603");
#
#
INSERT INTO `geo_provincias` VALUES ("70", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chota", "6", "0604");
#
#
INSERT INTO `geo_provincias` VALUES ("71", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Contumaza", "6", "0605");
#
#
INSERT INTO `geo_provincias` VALUES ("72", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cutervo", "6", "0606");
#
#
INSERT INTO `geo_provincias` VALUES ("73", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Hualgayoc", "6", "0607");
#
#
INSERT INTO `geo_provincias` VALUES ("74", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Jaen", "6", "0608");
#
#
INSERT INTO `geo_provincias` VALUES ("75", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Ignacio", "6", "0609");
#
#
INSERT INTO `geo_provincias` VALUES ("76", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Marcos", "6", "0610");
#
#
INSERT INTO `geo_provincias` VALUES ("77", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Miguel", "6", "0611");
#
#
INSERT INTO `geo_provincias` VALUES ("78", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Pablo", "6", "0612");
#
#
INSERT INTO `geo_provincias` VALUES ("79", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Santa Cruz", "6", "0613");
#
#
INSERT INTO `geo_provincias` VALUES ("80", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Cusco", "7", "0801");
#
#
INSERT INTO `geo_provincias` VALUES ("81", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Acomayo", "7", "0802");
#
#
INSERT INTO `geo_provincias` VALUES ("82", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Anta", "7", "0803");
#
#
INSERT INTO `geo_provincias` VALUES ("83", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Calca", "7", "0804");
#
#
INSERT INTO `geo_provincias` VALUES ("84", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Canas", "7", "0805");
#
#
INSERT INTO `geo_provincias` VALUES ("85", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Canchis", "7", "0806");
#
#
INSERT INTO `geo_provincias` VALUES ("86", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chumbivilcas", "7", "0807");
#
#
INSERT INTO `geo_provincias` VALUES ("87", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Espinar", "7", "0808");
#
#
INSERT INTO `geo_provincias` VALUES ("88", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "La Convencion", "7", "0809");
#
#
INSERT INTO `geo_provincias` VALUES ("89", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Paruro", "7", "0810");
#
#
INSERT INTO `geo_provincias` VALUES ("90", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Paucartambo", "7", "0811");
#
#
INSERT INTO `geo_provincias` VALUES ("91", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Quispicanchi", "7", "0812");
#
#
INSERT INTO `geo_provincias` VALUES ("92", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Urubamba", "7", "0813");
#
#
INSERT INTO `geo_provincias` VALUES ("93", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huancavelica", "8", "0901");
#
#
INSERT INTO `geo_provincias` VALUES ("94", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Acobamba", "8", "0902");
#
#
INSERT INTO `geo_provincias` VALUES ("95", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Angaraes", "8", "0903");
#
#
INSERT INTO `geo_provincias` VALUES ("96", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Castrovirreyna", "8", "0904");
#
#
INSERT INTO `geo_provincias` VALUES ("97", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Churcampa", "8", "0905");
#
#
INSERT INTO `geo_provincias` VALUES ("98", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huaytara", "8", "0906");
#
#
INSERT INTO `geo_provincias` VALUES ("99", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tayacaja", "8", "0907");
#
#
INSERT INTO `geo_provincias` VALUES ("100", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huanuco", "9", "1001");
#
#
INSERT INTO `geo_provincias` VALUES ("101", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ambo", "9", "1002");
#
#
INSERT INTO `geo_provincias` VALUES ("102", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Dos De Mayo", "9", "1003");
#
#
INSERT INTO `geo_provincias` VALUES ("103", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huacaybamba", "9", "1004");
#
#
INSERT INTO `geo_provincias` VALUES ("104", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huamalies", "9", "1005");
#
#
INSERT INTO `geo_provincias` VALUES ("105", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Leoncio Prado", "9", "1006");
#
#
INSERT INTO `geo_provincias` VALUES ("106", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Marañon", "9", "1007");
#
#
INSERT INTO `geo_provincias` VALUES ("107", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pachitea", "9", "1008");
#
#
INSERT INTO `geo_provincias` VALUES ("108", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Puerto Inca", "9", "1009");
#
#
INSERT INTO `geo_provincias` VALUES ("109", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lauricocha", "9", "1010");
#
#
INSERT INTO `geo_provincias` VALUES ("110", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Yarowilca", "9", "1011");
#
#
INSERT INTO `geo_provincias` VALUES ("111", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ica", "10", "1101");
#
#
INSERT INTO `geo_provincias` VALUES ("112", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chincha", "10", "1102");
#
#
INSERT INTO `geo_provincias` VALUES ("113", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Nazca", "10", "1103");
#
#
INSERT INTO `geo_provincias` VALUES ("114", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Palpa", "10", "1104");
#
#
INSERT INTO `geo_provincias` VALUES ("115", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pisco", "10", "1105");
#
#
INSERT INTO `geo_provincias` VALUES ("116", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huancayo", "11", "1201");
#
#
INSERT INTO `geo_provincias` VALUES ("117", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Concepcion", "11", "1202");
#
#
INSERT INTO `geo_provincias` VALUES ("118", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chanchamayo", "11", "1203");
#
#
INSERT INTO `geo_provincias` VALUES ("119", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Jauja", "11", "1204");
#
#
INSERT INTO `geo_provincias` VALUES ("120", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Junin", "11", "1205");
#
#
INSERT INTO `geo_provincias` VALUES ("121", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Satipo", "11", "1206");
#
#
INSERT INTO `geo_provincias` VALUES ("122", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tarma", "11", "1207");
#
#
INSERT INTO `geo_provincias` VALUES ("123", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Yauli", "11", "1208");
#
#
INSERT INTO `geo_provincias` VALUES ("124", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chupaca", "11", "1209");
#
#
INSERT INTO `geo_provincias` VALUES ("125", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Trujillo", "12", "1301");
#
#
INSERT INTO `geo_provincias` VALUES ("126", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ascope", "12", "1302");
#
#
INSERT INTO `geo_provincias` VALUES ("127", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Bolivar", "12", "1303");
#
#
INSERT INTO `geo_provincias` VALUES ("128", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chepen", "12", "1304");
#
#
INSERT INTO `geo_provincias` VALUES ("129", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Julcan", "12", "1305");
#
#
INSERT INTO `geo_provincias` VALUES ("130", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Otuzco", "12", "1306");
#
#
INSERT INTO `geo_provincias` VALUES ("131", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pacasmayo", "12", "1307");
#
#
INSERT INTO `geo_provincias` VALUES ("132", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pataz", "12", "1308");
#
#
INSERT INTO `geo_provincias` VALUES ("133", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Sanchez Carrion", "12", "1309");
#
#
INSERT INTO `geo_provincias` VALUES ("134", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Santiago De Chuco", "12", "1310");
#
#
INSERT INTO `geo_provincias` VALUES ("135", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Gran Chimu", "12", "1311");
#
#
INSERT INTO `geo_provincias` VALUES ("136", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Viru", "12", "1312");
#
#
INSERT INTO `geo_provincias` VALUES ("137", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chiclayo", "13", "1401");
#
#
INSERT INTO `geo_provincias` VALUES ("138", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ferreñafe", "13", "1402");
#
#
INSERT INTO `geo_provincias` VALUES ("139", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lambayeque", "13", "1403");
#
#
INSERT INTO `geo_provincias` VALUES ("140", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Maynas", "15", "1601");
#
#
INSERT INTO `geo_provincias` VALUES ("141", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Alto Amazonas", "15", "1602");
#
#
INSERT INTO `geo_provincias` VALUES ("142", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Loreto", "15", "1603");
#
#
INSERT INTO `geo_provincias` VALUES ("143", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Mariscal Ramon Castilla", "15", "1604");
#
#
INSERT INTO `geo_provincias` VALUES ("144", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Requena", "15", "1605");
#
#
INSERT INTO `geo_provincias` VALUES ("145", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ucayali", "15", "1606");
#
#
INSERT INTO `geo_provincias` VALUES ("146", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Datem Del Marañon", "15", "1607");
#
#
INSERT INTO `geo_provincias` VALUES ("147", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tambopata", "16", "1701");
#
#
INSERT INTO `geo_provincias` VALUES ("148", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Manu", "16", "1702");
#
#
INSERT INTO `geo_provincias` VALUES ("149", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tahuamanu", "16", "1703");
#
#
INSERT INTO `geo_provincias` VALUES ("150", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Mariscal Nieto", "17", "1801");
#
#
INSERT INTO `geo_provincias` VALUES ("151", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "General Sanchez Cerro", "17", "1802");
#
#
INSERT INTO `geo_provincias` VALUES ("152", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ilo", "17", "1803");
#
#
INSERT INTO `geo_provincias` VALUES ("153", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Pasco", "18", "1901");
#
#
INSERT INTO `geo_provincias` VALUES ("154", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Daniel Alcides Carrion", "18", "1902");
#
#
INSERT INTO `geo_provincias` VALUES ("155", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Oxapampa", "18", "1903");
#
#
INSERT INTO `geo_provincias` VALUES ("156", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Piura", "19", "2001");
#
#
INSERT INTO `geo_provincias` VALUES ("157", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Ayabaca", "19", "2002");
#
#
INSERT INTO `geo_provincias` VALUES ("158", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huancabamba", "19", "2003");
#
#
INSERT INTO `geo_provincias` VALUES ("159", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Morropon", "19", "2004");
#
#
INSERT INTO `geo_provincias` VALUES ("160", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Paita", "19", "2005");
#
#
INSERT INTO `geo_provincias` VALUES ("161", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Sullana", "19", "2006");
#
#
INSERT INTO `geo_provincias` VALUES ("162", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Talara", "19", "2007");
#
#
INSERT INTO `geo_provincias` VALUES ("163", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Sechura", "19", "2008");
#
#
INSERT INTO `geo_provincias` VALUES ("164", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Puno", "20", "2101");
#
#
INSERT INTO `geo_provincias` VALUES ("165", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Azangaro", "20", "2102");
#
#
INSERT INTO `geo_provincias` VALUES ("166", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Carabaya", "20", "2103");
#
#
INSERT INTO `geo_provincias` VALUES ("167", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Chucuito", "20", "2104");
#
#
INSERT INTO `geo_provincias` VALUES ("168", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "El Collao", "20", "2105");
#
#
INSERT INTO `geo_provincias` VALUES ("169", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huancane", "20", "2106");
#
#
INSERT INTO `geo_provincias` VALUES ("170", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lampa", "20", "2107");
#
#
INSERT INTO `geo_provincias` VALUES ("171", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Melgar", "20", "2108");
#
#
INSERT INTO `geo_provincias` VALUES ("172", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Moho", "20", "2109");
#
#
INSERT INTO `geo_provincias` VALUES ("173", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Antonio De Putina", "20", "2110");
#
#
INSERT INTO `geo_provincias` VALUES ("174", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Roman", "20", "2111");
#
#
INSERT INTO `geo_provincias` VALUES ("175", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Sandia", "20", "2112");
#
#
INSERT INTO `geo_provincias` VALUES ("176", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Yunguyo", "20", "2113");
#
#
INSERT INTO `geo_provincias` VALUES ("177", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Moyobamba", "21", "2201");
#
#
INSERT INTO `geo_provincias` VALUES ("178", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Bellavista", "21", "2202");
#
#
INSERT INTO `geo_provincias` VALUES ("179", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "El Dorado", "21", "2203");
#
#
INSERT INTO `geo_provincias` VALUES ("180", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Huallaga", "21", "2204");
#
#
INSERT INTO `geo_provincias` VALUES ("181", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Lamas", "21", "2205");
#
#
INSERT INTO `geo_provincias` VALUES ("182", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Mariscal Caceres", "21", "2206");
#
#
INSERT INTO `geo_provincias` VALUES ("183", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Picota", "21", "2207");
#
#
INSERT INTO `geo_provincias` VALUES ("184", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Rioja", "21", "2208");
#
#
INSERT INTO `geo_provincias` VALUES ("185", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "San Martin", "21", "2209");
#
#
INSERT INTO `geo_provincias` VALUES ("186", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tocache", "21", "2210");
#
#
INSERT INTO `geo_provincias` VALUES ("187", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tacna", "22", "2301");
#
#
INSERT INTO `geo_provincias` VALUES ("188", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Candarave", "22", "2302");
#
#
INSERT INTO `geo_provincias` VALUES ("189", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Jorge Basadre", "22", "2303");
#
#
INSERT INTO `geo_provincias` VALUES ("190", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tarata", "22", "2304");
#
#
INSERT INTO `geo_provincias` VALUES ("191", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Tumbes", "23", "2401");
#
#
INSERT INTO `geo_provincias` VALUES ("192", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Contralmirante Villar", "23", "2402");
#
#
INSERT INTO `geo_provincias` VALUES ("193", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Zarumilla", "23", "2403");
#
#
INSERT INTO `geo_provincias` VALUES ("194", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Coronel Portillo", "24", "2501");
#
#
INSERT INTO `geo_provincias` VALUES ("195", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Atalaya", "24", "2502");
#
#
INSERT INTO `geo_provincias` VALUES ("196", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Padre Abad", "24", "2503");
#
#
INSERT INTO `geo_provincias` VALUES ("197", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Purus", "24", "2504");
#
#
DROP TABLE IF EXISTS `news_fotos`;
#
#
CREATE TABLE `news_fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_item` int(10) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `news_fotos` VALUES ("1", "2014-03-30 21:39:40", "0000-00-00 00:00:00", NULL, "1", "1", "newite_1396233580_600x531.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("2", "2014-03-30 22:05:21", "0000-00-00 00:00:00", NULL, "1", "2", "newite_1396235119_973x925.png", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("3", "2014-03-30 23:01:00", "0000-00-00 00:00:00", NULL, "1", "5", "newite_1396238459_400x480.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("4", "2014-03-31 21:17:05", "0000-00-00 00:00:00", NULL, "1", "6", "newite_1396318624_538x717.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("5", "2014-03-31 21:17:19", "0000-00-00 00:00:00", NULL, "1", "6", "newite_1396318638_538x717.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("8", "2014-03-31 22:07:35", "0000-00-00 00:00:00", NULL, "1", "7", "newite_1396321653_2048x1365.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("9", "2014-03-31 22:20:59", "0000-00-00 00:00:00", NULL, "1", "8", "newite_1396322458_1197x774.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("10", "2014-03-31 22:54:56", "0000-00-00 00:00:00", NULL, "1", "10", "newite_1396324495_480x320.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("13", "2014-03-31 23:00:47", "0000-00-00 00:00:00", NULL, "1", "9", "newite_1396324845_598x300.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("12", "2014-03-31 22:57:53", "0000-00-00 00:00:00", NULL, "1", "4", "newite_1396324673_180x252.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("14", "2014-04-01 20:00:10", "0000-00-00 00:00:00", NULL, "1", "11", "newite_1396400410_254x161.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("15", "2014-04-02 23:06:17", "0000-00-00 00:00:00", NULL, "1", "12", "newite_1396497977_517x291.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("16", "2014-04-02 23:50:40", "0000-00-00 00:00:00", NULL, "1", "13", "newite_1396500639_281x320.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("17", "2014-04-03 00:02:58", "0000-00-00 00:00:00", NULL, "1", "14", "newite_1396501377_1063x357.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("18", "2014-04-08 16:38:39", "0000-00-00 00:00:00", NULL, "1", "16", "newite_1396993103_2953x2092.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("21", "2014-04-12 00:58:37", "0000-00-00 00:00:00", NULL, "1", "21", "newite_1397282317_77x56.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("20", "2014-04-11 23:59:42", "0000-00-00 00:00:00", NULL, "1", "18", "newite_1397278779_668x960.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("22", "2014-04-12 01:51:29", "0000-00-00 00:00:00", NULL, "1", "22", "newite_1397285488_600x876.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("23", "2014-04-12 02:12:32", "0000-00-00 00:00:00", NULL, "1", "18", "newite_1397286748_960x746.png", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("24", "2014-04-14 20:14:52", "0000-00-00 00:00:00", NULL, "1", "23", "newite_1397524491_477x311.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("25", "2014-04-16 19:57:48", "0000-00-00 00:00:00", NULL, "1", "24", "newite_1397696265_960x720.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("26", "2014-04-24 19:14:49", "0000-00-00 00:00:00", NULL, "1", "26", "newite_1398384888_814x439.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("27", "2014-05-01 11:57:30", "0000-00-00 00:00:00", NULL, "1", "27", "newite_1398963439_2002x800.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("28", "2014-05-01 13:37:04", "0000-00-00 00:00:00", NULL, "1", "28", "newite_1398969423_415x422.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("29", "2014-05-04 10:44:28", "0000-00-00 00:00:00", NULL, "1", "30", "newite_1399218267_936x470.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("30", "2014-05-05 19:24:57", "0000-00-00 00:00:00", NULL, "1", "32", "newite_1399335896_960x720.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("31", "2014-05-06 18:47:30", "0000-00-00 00:00:00", NULL, "1", "33", "newite_1399420050_500x333.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("32", "2014-05-07 16:41:54", "0000-00-00 00:00:00", NULL, "1", "34", "newite_1399498913_960x678.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("33", "2014-05-07 19:13:37", "0000-00-00 00:00:00", NULL, "1", "35", "newite_1399508015_1370x1388.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("34", "2014-05-09 18:47:11", "0000-00-00 00:00:00", NULL, "1", "37", "newite_1399679231_300x249.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("35", "2014-05-09 19:42:35", "0000-00-00 00:00:00", NULL, "1", "38", "newite_1399682555_164x164.png", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("36", "2014-05-10 23:14:18", "0000-00-00 00:00:00", NULL, "1", "39", "newite_1399781652_2592x1936.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("41", "2014-05-17 23:47:45", "0000-00-00 00:00:00", NULL, "1", "40", "newite_1400388464_889x693.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("38", "2014-05-17 00:05:33", "0000-00-00 00:00:00", NULL, "1", "41", "newite_1400303131_1400x800.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("39", "2014-05-17 09:29:25", "0000-00-00 00:00:00", NULL, "1", "43", "newite_1400336963_1096x899.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("40", "2014-05-17 09:38:10", "0000-00-00 00:00:00", NULL, "1", "42", "newite_1400337489_571x561.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("42", "2014-05-29 21:48:18", "0000-00-00 00:00:00", NULL, "1", "47", "newite_1401418098_856x480.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("44", "2014-05-30 00:21:48", "0000-00-00 00:00:00", NULL, "1", "48", "newite_1401427306_720x960.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("45", "2014-05-30 01:08:47", "0000-00-00 00:00:00", NULL, "1", "49", "newite_1401430127_539x960.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("46", "2014-05-30 01:13:52", "0000-00-00 00:00:00", NULL, "1", "49", "newite_1401430431_960x539.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("47", "2014-06-07 17:29:51", "0000-00-00 00:00:00", NULL, "1", "51", "newite_1402180191_259x194.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("48", "2014-06-11 00:00:43", "0000-00-00 00:00:00", NULL, "1", "52", "newite_1402462840_1740x611.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("49", "2014-06-18 23:50:00", "0000-00-00 00:00:00", NULL, "1", "54", "newite_1403153397_650x697.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("50", "2014-06-19 00:35:51", "0000-00-00 00:00:00", NULL, "1", "55", "newite_1403156149_1223x915.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("51", "2014-06-22 23:56:57", "0000-00-00 00:00:00", NULL, "1", "56", "newite_1403499416_640x480.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("52", "2014-06-24 22:49:20", "0000-00-00 00:00:00", NULL, "1", "57", "newite_1403668157_957x807.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("53", "2014-06-24 23:16:35", "0000-00-00 00:00:00", NULL, "1", "58", "newite_1403669794_957x807.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("54", "2014-06-29 22:37:46", "0000-00-00 00:00:00", NULL, "1", "60", "newite_1404099464_600x509.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("56", "2014-07-13 22:19:18", "0000-00-00 00:00:00", NULL, "1", "62", "newite_1405307958_493x641.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("57", "2014-07-13 23:54:08", "0000-00-00 00:00:00", NULL, "1", "65", "newite_1405313646_960x960.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("58", "2014-07-14 00:13:13", "0000-00-00 00:00:00", NULL, "1", "66", "newite_1405314792_392x395.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("59", "2014-07-17 00:03:01", "0000-00-00 00:00:00", NULL, "1", "68", "newite_1405573376_281x395.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("60", "2014-07-17 00:58:31", "0000-00-00 00:00:00", NULL, "1", "71", "newite_1405576707_1366x768.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("61", "2014-07-18 18:18:56", "0000-00-00 00:00:00", NULL, "1", "72", "newite_1405725535_599x503.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("62", "2014-07-22 08:36:09", "0000-00-00 00:00:00", NULL, "1", "73", "newite_1406036167_599x503.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("63", "2014-08-06 17:22:39", "0000-00-00 00:00:00", NULL, "1", "74", "newite_1407363757_502x960.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("64", "2014-08-06 17:59:17", "0000-00-00 00:00:00", NULL, "1", "76", "newite_1407365956_454x585.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("65", "2014-08-11 22:07:43", "0000-00-00 00:00:00", NULL, "1", "77", "newite_1407812863_390x221.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("66", "2014-08-11 23:08:05", "0000-00-00 00:00:00", NULL, "1", "78", "newite_1407816485_400x276.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("67", "2014-08-12 20:33:30", "0000-00-00 00:00:00", NULL, "1", "79", "newite_1407893610_500x334.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("68", "2014-08-12 21:29:34", "0000-00-00 00:00:00", NULL, "1", "80", "newite_1407896973_391x375.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("69", "2014-08-12 22:17:15", "0000-00-00 00:00:00", NULL, "1", "81", "newite_1407899834_640x422.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("70", "2014-08-17 20:11:38", "0000-00-00 00:00:00", NULL, "1", "83", "newite_1408324297_999x400.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("71", "2014-08-24 22:29:03", "0000-00-00 00:00:00", NULL, "1", "84", "newite_1408937342_919x683.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("72", "2014-09-04 22:20:03", "0000-00-00 00:00:00", NULL, "1", "85", "newite_1409887202_960x720.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("73", "2014-09-04 22:35:10", "0000-00-00 00:00:00", NULL, "1", "82", "newite_1409888110_191x135.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("74", "2014-09-04 23:53:00", "0000-00-00 00:00:00", NULL, "1", "86", "newite_1409892778_1393x1476.jpg", NULL, "1");
#
#
INSERT INTO `news_fotos` VALUES ("75", "2014-09-10 00:24:44", "0000-00-00 00:00:00", NULL, "1", "87", "newite_1410326683_420x300.jpg", NULL, "1");
#
#
DROP TABLE IF EXISTS `news_grupos`;
#
#
CREATE TABLE `news_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `news_grupos` VALUES ("1", "2014-03-30 21:26:35", "0000-00-00 00:00:00", NULL, "1", "Actualidad", "1");
#
#
INSERT INTO `news_grupos` VALUES ("2", "2014-03-30 21:27:33", "0000-00-00 00:00:00", NULL, "1", "Apoyo Social", "1");
#
#
INSERT INTO `news_grupos` VALUES ("3", "2014-03-30 22:49:11", "0000-00-00 00:00:00", NULL, "1", "Educación para todos y todas", "1");
#
#
INSERT INTO `news_grupos` VALUES ("4", "2014-03-31 22:32:53", "0000-00-00 00:00:00", NULL, "1", "Ciencia", "1");
#
#
INSERT INTO `news_grupos` VALUES ("5", "2014-04-10 00:35:53", "0000-00-00 00:00:00", NULL, "1", "Chistes", "1");
#
#
INSERT INTO `news_grupos` VALUES ("6", "2014-04-12 00:14:41", "0000-00-00 00:00:00", NULL, "1", "Reflexiones", "1");
#
#
INSERT INTO `news_grupos` VALUES ("7", "2014-04-21 01:33:09", "2014-04-21 22:52:15", NULL, "1", "PCNP NSG 2014", "1");
#
#
INSERT INTO `news_grupos` VALUES ("8", "2014-04-24 19:10:45", "0000-00-00 00:00:00", NULL, "1", "Arte y Cultura", "1");
#
#
INSERT INTO `news_grupos` VALUES ("9", "2014-05-21 00:59:26", "0000-00-00 00:00:00", NULL, "1", "Música", "1");
#
#
INSERT INTO `news_grupos` VALUES ("10", "2014-06-04 22:54:19", "0000-00-00 00:00:00", NULL, "1", "Salud", "1");
#
#
INSERT INTO `news_grupos` VALUES ("11", "2014-06-13 00:49:12", "0000-00-00 00:00:00", NULL, "1", "Mundial de Futbol Brazil 2014", "1");
#
#
INSERT INTO `news_grupos` VALUES ("12", "2014-06-29 22:21:35", "0000-00-00 00:00:00", NULL, "1", "Anatomía", "1");
#
#
INSERT INTO `news_grupos` VALUES ("13", "2014-07-13 22:33:38", "0000-00-00 00:00:00", NULL, "1", "Apéndice Controversial", "1");
#
#
INSERT INTO `news_grupos` VALUES ("14", "2014-07-17 00:18:45", "0000-00-00 00:00:00", NULL, "1", "Voces", "1");
#
#
DROP TABLE IF EXISTS `news_items`;
#
#
CREATE TABLE `news_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(250) DEFAULT NULL,
  `resumen` longtext,
  `texto` longtext,
  `estructura` varchar(80) DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  FULLTEXT KEY `resumen` (`resumen`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `news_items` VALUES ("1", "2014-03-30 21:38:25", "2014-03-31 22:25:19", NULL, "1", "2", "2014-03-30 21:27:37", "IMPRESIONANTE FOTO", "Por las redes sociales está circulando la foto de la solidaria Angelina Jolie, quien no deja de sorprendernos por su altruista conducta durante una de sus visitas a África.", "<p><span id=\"INSERTION_MARKER\">Por las redes sociales está circulando la foto de la solidaria Angelina Jolie, quien no deja de sorprendernos por su altruista conducta durante una de sus visitas a África.</span><span><br /></span></p>\n<p><span>Angelina Jolie durante una de sus visitas a África encontró a un niño de 7 años de edad que traumatizado por tantos conflictos triviales, y por tener problemas conductuales y presentar estados de agitación, lo mantenían atado todo el tiempo, Angelina lo abrazó y trató con cariño, y el niño poco a poco se calmó.</span></p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("2", "2014-03-30 22:04:49", "2014-05-05 19:42:02", NULL, "1", "1", "2014-03-30 22:02:31", "Inundemos el whatsapp de color azul por el autismo.", "Se envían más de 27 mil millones de mensajes al día por WhatsApp. Ni tan siquiera Twitter presenta estas cifras a diario. Esto confirma el grandísimo poder de difusión que tiene este servicio a lo largo y ancho del mundo, y debemos aprovecharlo. Así pues, no desaprovechemos la oportunidad de difundir; utilizando esta imagen en tu whattsapp y pidiendo a tus contactos que también lo hagan, ayudamos a teñirlo de azul por el Día Mundial del Autismo.", "<p style=\"text-align: justify;\"><span id=\"INSERTION_MARKER\">Se envían más de 27 mil millones de mensajes al día por WhatsApp. Ni tan siquiera Twitter presenta estas cifras a diario. Esto confirma el grandísimo poder de difusión que tiene este servicio a lo largo y ancho del mundo, y debemos aprovecharlo. Así pues, no desaprovechemos la oportunidad de difundir; utilizando esta imagen en tu whattsapp y pidiendo a tus contactos que también lo hagan, ayudamos a teñirlo de azul por el Día Mundial del Autismo.</span></p>\n<p style=\"text-align: justify;\">Para conmemorar el 2 de Abril, declarado por la ONU Día Mundial de Concienciación sobre el Autismo, inundemos el whatsapp de color azul por el autismo. Comparte esta imagen, difunde y úsala como foto de perfil de tu whatsapp hasta el 2 de abril.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("3", "2014-03-30 22:26:08", "2014-05-05 19:45:53", NULL, "1", "1", "2014-03-17 22:00:00", "22 de Marzo, Marcha por la Vida", NULL, "<div class=\"separator\" style=\"clear: both; text-align: center;\">\n<br /></div>\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\n<br /></div>\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\n<a href=\"http://2.bp.blogspot.com/-A45tGWYF3k4/Uye3Vshu1lI/AAAAAAAAAVQ/X2dIbZE-2k0/s1600/marcha+por+la+vida.jpg\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\">\n<img border=\"0\" src=\"http://2.bp.blogspot.com/-A45tGWYF3k4/Uye3Vshu1lI/AAAAAAAAAVQ/X2dIbZE-2k0/s1600/marcha+por+la+vida.jpg\" height=\"116\" width=\"320\" /></a></div>\n<p> </p>\n<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"315\" src=\"//www.youtube.com/embed/XBYOvQlN37g\" width=\"560\"></iframe></p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("4", "2014-03-30 22:46:06", "2014-07-22 08:50:48", NULL, "1", "1", "2011-06-17 22:00:00", "No a la Coima", "Del 20 de Junio al 20 de julio del 2011 podremos observar en las calles de Lima a diversos jóvenes interactuando, con los peatones y conductores, en una campaña muy agradable para el sentir de muchos peruanos:¨NO A LA COIMA¨  ", "<p>Del 20 de Junio al 20 de julio del 2011 podremos observar en las calles de Lima a diversos jóvenes interactuando, con los peatones y conductores, en una campaña muy agradable para el sentir de muchos peruanos:¨NO A LA COIMA¨ &nbsp;</p>\n<p> </p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/Hz2F_3xdyqE\" frameborder=\"0\" allowfullscreen=\"\"></iframe>dadadadada</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("5", "2014-03-30 22:50:19", "2014-03-31 22:24:51", NULL, "1", "3", "2014-03-30 22:49:14", "Algo va mal con la Tv peruana", NULL, "<p>¿Estamos seguros de lo que ven los niños en la Tv ?</p>\n<div class=\"separator\" style=\"text-align: center; clear: both;\"><a href=\"http://2.bp.blogspot.com/-v1Q-aEgltlg/Uwq1EKTrQeI/AAAAAAAAAUo/gt_p9heCICo/s1600/tv+peruana.jpg\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\">\n<img border=\"0\" src=\"http://2.bp.blogspot.com/-v1Q-aEgltlg/Uwq1EKTrQeI/AAAAAAAAAUo/gt_p9heCICo/s1600/tv+peruana.jpg\" height=\"400\" width=\"290\" /></a></div><p> </p>\n<div class=\"MsoNormal\">En definitiva los programas transmitidos en horario familiar y en señal abierta, son poco educativos, incluso llegan a ser denigrantes y desfavorables para la conservación de la cultura y de las buenas costumbres, no solo por presentar a mujeres con ropas muy pequeñas, sino también por presentar situaciones “amorosas” que solo degeneran el desarrollo de la sexualidad del niño y propician malos hábitos en los adolescentes, pues cambiar de pareja es tan común en la tv, como lo es también colocar en los titulares a una mujer tras un varón sin oficio ni beneficio,vulgar, machista y mujeriego. Sin entrar en mayores detalles hay que tener en cuenta entre otras cosas que la mayoría de niños y adolescentes prefieren ver programas absurdos en la tv, pues no tienen la cultura ni el ejemplo en casa para ver programas de investigación, ciencia, cultura, etc; además estos programas son en su mayoría transmitidos en la señal de cable y no en señal abierta en la tv peruana.</div><div class=\"MsoNormal\" style=\"text-align: center; \"><br /></div><div class=\"MsoNormal\" style=\"text-align: center; \"><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"315\" src=\"//www.youtube.com/embed/fA1MSovbu5g\" width=\"420\"></iframe><br /></div>\n<p style=\"text-align: center;\">&nbsp;</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("6", "2014-03-31 21:16:30", "2014-05-05 19:41:47", NULL, "1", "1", "2014-03-31 21:15:49", "Reinauguración de la Capilla del PCNP de Nuestra Señora de Guadalupe", NULL, "<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("7", "2014-03-31 22:06:13", "2014-05-05 19:45:45", NULL, "1", "1", "2014-03-22 22:00:00", "Muchos marcharon por la vida", "El día de hoy 22 de marzo muchas personas se unieron a la marcha por la vida, entre ellos grupos sociales, instituciones educativas y público en general, demostrando de esta manera, un solo sentir : “si a la vida, no al aborto”\n", "<p style=\"text-align: justify;\"><span>El día de hoy 22 de marzo muchas personas se unieron a la marcha por la vida, entre ellos grupos sociales, instituciones educativas y público en general, demostrando de esta manera, un solo sentir : “si a la vida, no al aborto”</span></p>\n<p style=\"text-align: justify;\">La actividad fue organizada por el arzobispado de lima\ncontra una propuesta de algunos congresistas que quieren legalizar el aborto en\nPerú.</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("8", "2014-03-31 22:19:58", "2014-05-05 19:45:35", NULL, "1", "1", "2014-03-30 22:00:00", "Marcha por el día mundial de la concienciación del autismo", "Este martes 1 de abril se realizará la caminata por el día mundial del autismo, cuya concentración será a las 3:30 pm en la plaza San Martín", "<p style=\"text-align: justify;\"><span id=\"INSERTION_MARKER\">Este martes 1 de abril se realizará la caminata por el día mundial del autismo, cuya concentración será a las 3:30 pm en la plaza San Martín.</span></p>\n<p style=\"text-align: justify;\">La Municipalidad Metropolitana de Lima y las organizaciones Olimpiadas Especiales Perú, Asociación de Padres y Amigos de Personas con Autismo del Perú- ASPAU PERU, Autismo Perú, Persevera Inclusión y Soy autista, y que?, realizan una caminata desde la Plaza San Martín hasta el frontis del Palacio Municipal, una Misa de Acción de Gracias en la Iglesia del Sagrario y el Encendido en Azul de Palacio Municipal conmemorando el 2 de Abril “Día Mundial de la concienciación Sobre el Autismo”</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("9", "2014-03-31 22:34:36", "2014-03-31 22:35:31", NULL, "1", "4", "2013-06-28 22:00:00", "Adolescente turca descubre como transformar la celulosa de los plátanos en plástico", "(AFP). Una adolescente turca descubrió una manera de transformar la celulosa de los plátanos en plástico, después de dos años de investigaciones que le valieron un premio de la revista Scientific American dotado con una beca de 50 000 dólares.", "<p> </p>\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\n<a href=\"http://1.bp.blogspot.com/-0GkLwDPZY7Q/Uc2pqyU3KMI/AAAAAAAAAFk/Jl3FEKt49aQ/s625/22288.jpg\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\">\n<img border=\"0\" src=\"http://1.bp.blogspot.com/-0GkLwDPZY7Q/Uc2pqyU3KMI/AAAAAAAAAFk/Jl3FEKt49aQ/s320/22288.jpg\" height=\"227\" width=\"320\" /></a></div>\n<p> </p>\n<div style=\"background-color: white; color: #222222; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin-bottom: 20px; padding: 0px; zoom: 1;\">\n<strong>(<span class=\"caps\">AFP</span>)</strong>. Una adolescente turca descubrió una manera de transformar la celulosa de los plátanos en plástico, después de dos años de investigaciones que le valieron un premio de la revista&nbsp;<strong>Scientific American</strong>&nbsp;dotado con una beca de&nbsp;<strong>50 000 dólares</strong>.</div>\n<div style=\"background-color: white; color: #222222; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin-bottom: 20px; padding: 0px; zoom: 1;\">\n<strong>Elif Bilgrin</strong>, alumna de 16 años originaria de Estambul, afirma con orgullo que “la ciencia es su vocación” y considera que su proyecto “sería potencialmente una solución al problema creciente de la contaminación creada por el plástico de origen petroquímico”.</div>\n<div style=\"background-color: white; color: #222222; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin-bottom: 20px; padding: 0px; zoom: 1;\">\n<strong>El plástico que extrajo de los plátanos podría servir para fabricar un aislante para los cables.</strong></div>\n<div style=\"background-color: white; color: #222222; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin-bottom: 20px; padding: 0px; zoom: 1;\">\nActualmente el plástico se fabrica principalmente a partir del petróleo pero se puede hacer a partir de la celulosa de ciertos desechos alimentarios como las cáscaras de mango.</div>\n<div style=\"background-color: white; color: #222222; font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin-bottom: 20px; padding: 0px; zoom: 1;\">\nAdemás de la beca,&nbsp;<strong>el premio de la revista Scientific American incluye la posibilidad de participar en un concurso científico</strong>&nbsp;organizado por&nbsp;<a href=\"http://publimetro.pe/tag/240/google\" style=\"color: #196711; font-weight: bold; text-decoration: none;\" target=\"_blank\">Google</a>&nbsp;el próximo mes de septiembre.</div>\n<div style=\"background-color: white; color: #222222; font-family: Helvetica, Arial, sans-serif; line-height: 22px; margin-bottom: 20px; padding: 0px; text-align: right; zoom: 1;\">\n<span style=\"font-size: xx-small;\">( Fuente:&nbsp;<a href=\"http://publimetro.pe/actualidad/14767/noticia-adolescente-turca-descubre-como-transformar-platanos-plastico\" style=\"background-color: transparent;\">http://publimetro.pe/actualidad/14767/noticia-adolescente-turca-descubre-como-transformar-platanos-plastico</a>&nbsp;)</span></div>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("10", "2014-03-31 22:41:33", "2014-03-31 22:53:46", NULL, "1", "1", "2013-01-01 22:00:00", "Presentación del libro \"Apogeo y crisis de la izquierda peruana\"", "El pasado martes 21 de febrero del 2011 se presentó el libro \"Apogeo y crisis de la izquierda peruana\".\nLa publicación, es una revisión crítica del apogeo y la crisis de la izquierda peruana, a través de la voz y la reflexión de varios de sus más destacados representantes, a más de dos décadas de disuelto el frente de Izquierda Unida.", "<p>El pasado martes 21 de febrero del 2011\nse presentó el libro \"Apogeo y crisis de la izquierda peruana\".</p>\n<p>La Universidad Antonio Ruiz de\nMontoya (UARM), junto con &nbsp;El Instituto&nbsp;Internacional para la\nDemocracia&nbsp;y<span style=\"background-color: white; background-position: initial initial; background-repeat: initial initial;\">&nbsp;la Asistencia Electoral\n(IDEA&nbsp;Internacional), presentaron el martes 21 de febrero del 2011, el\nlibro \"Apogeo&nbsp;y&nbsp;crisis&nbsp;de la&nbsp;izquierda&nbsp;peruana\". En dicha presentación hablaron\nsus protagonistas.</span></p>\n<p>La publicación, es una revisión crítica del&nbsp;<span style=\"font-size:12.0pt;mso-fareast-&quot;Times New Roman&quot;;\">apogeo&nbsp;y&nbsp;la&nbsp;crisis<span style=\"background:white\">&nbsp;de&nbsp;la&nbsp;</span>izquierda<span style=\"background:white\">&nbsp;peruana, a través de la voz&nbsp;</span>y<span style=\"background:white\">&nbsp;la reflexión de varios de sus más&nbsp;destacados\nrepresentantes, a más de dos décadas de disuelto el frente de&nbsp;</span>Izquierda<span style=\"background:white\">&nbsp;Unida.&nbsp;</span></span></p>\n<p>La&nbsp;crisis<span style=\"background:white\">&nbsp;de la&nbsp;izquierda<span style=\"background-position: initial initial; background-repeat: initial initial;\">&nbsp;peruana representaría su agotamiento\ncomo&nbsp;referente político&nbsp;</span>y&nbsp;el\ncomienzo de un nuevo período caracterizado por la&nbsp;búsqueda de nuevos\nespacios de referencia. En ese camino zigzagueante sus&nbsp;cuadros,\nmilitantes, intelectuales&nbsp;y&nbsp;votantes\nprobaron una rearticulación en&nbsp;el noventa desde el temprano fujimorismo,\nhasta llegar en el año 2011 a&nbsp;recalar en el nacionalismo que ahora está en\nel poder. En palabras del&nbsp;editor de esta obra, Alberto Adrianzén, no se\ntrataría de una continuidad&nbsp;sino de una ruptura que requiere ser\nrepensada. Llegar a conocer las razones&nbsp;de este hecho resulta vital para\npoder alumbrar sus posibilidades futuras&nbsp;dentro de la política peruana.&nbsp;</span></p>\n<p>Las palabras de bienvenida estuvieron a cargo de\nCarmen Ilizarbe, Directora de&nbsp;la Carrera de Ciencias Políticas de la\nUARM&nbsp;y&nbsp;de Percy Medina, Jefe\nde&nbsp;Misión Para el&nbsp;Perú&nbsp;de\nlos Países Andinos &nbsp;de IDEA Internacional.&nbsp;</p>\n<p>La obra fue presentada por Alberto Adrianzén,\nVicepresidente del&nbsp;Parlamento Andino&nbsp;y<span style=\"background:white\">&nbsp;editor de la obra, Anahí Durand, socióloga&nbsp;y<span style=\"background-position: initial initial; background-repeat: initial initial;\">&nbsp;docente de&nbsp;la Universidad Antonio Ruiz de\nMontoya, Ricardo Portocarrero&nbsp;</span>y&nbsp;&nbsp;Antonio&nbsp;Zapata,\nambos historiadores e investigadores.</span></p>\n<p>Durante la presentación cada ponente dio a conocer\nsu punto de vista y explico un poco más sobre la historia de la izquierda en el\nPerú.</p>\n<p style=\"text-align: left;\">A continuación algunos fragmentos de este\nsuceso&nbsp;histórico:</p>\n<p style=\"text-align: center; \"><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/GAYvCy6aCXY\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("11", "2014-04-01 19:44:37", "2014-05-10 14:24:27", NULL, "1", "1", "2014-04-01 19:36:17", "Terremoto de 7.9 grados al norte de Chile", "El sismo se sintió también al sur de Perú entre Arequipa y Tacna y en Bolivia. El 90% de Arica se encentra sin servicio eléctrico y se realizan evacuaciones por alerta de Tsunami que abarca hasta Costa Rica.", "<p style=\"text-align: justify;\">&nbsp;El movimiento telúrico, de 7.9 grados en la escala de Richter, se registró a las 8:46 de la noche (6:46 hora peruana), con epicentro en el mar a 85 km al suroeste Cuya, provincia de Arica. La profundidad fue calculada en 44 km. La USGS de EE.UU. situó la magnitud en 8 grados.</p>\n<p style=\"text-align: justify;\">El 90% de Arica se encentra sin servicio eléctrico y se realizan evacuaciones por alerta de Tsunami que abarca hasta Costa Rica</p>\n<p style=\"text-align: justify;\">&nbsp;</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("12", "2014-04-02 23:04:23", "2014-06-19 00:54:39", NULL, "1", "1", "2014-04-02 22:52:35", "Día Mundial de la Concienciación sobre el Autismo", "El 2 de abril se recuerda el Día Mundial de la Concienciación sobre el Autismo, fecha declarada por la Asamblea General de la ONU para poner en relieve la necesidad de ayudar a mejorar las condiciones de vida de los niños y adultos que sufren este trastorno, promoviendo sus derechos y su bienestar. ", "<p style=\"text-align: justify;\">El 2 de abril se recuerda el Día Mundial de la Concienciación sobre el\nautismo, fecha declarada por la Asamblea General de la ONU para poner en\nrelieve la necesidad de ayudar a mejorar las condiciones de vida de los niños y\nadultos que sufren este trastorno, promoviendo sus derechos y su bienestar. </p>\n<p style=\"text-align: justify;\">El 2 de abril de cada año se celebra el Día Mundial de Concienciación\nsobre el Autismo y tiene como finalidad, no solo generar comprensión, sino que\ntambién es una llamada a la acción. De hecho, el mensaje de este año del\nSecretario General de la Organización de las Naciones Unidas, Ban Ki-moon,\ndice: “Insto a todas las partes interesadas a participar en la promoción de los\navances prestando apoyo a programas de educación, oportunidades de empleo y\notras medidas que ayuden a hacer realidad nuestro ideal común de un mundo más\ninclusivo”.</p>\n<p style=\"text-align: justify;\">Frente a ello, la doctora venezolana Adriana Mendoza –certificada por la\nLiga de Intervención Nutricional para el Autismo en Tratamiento Biomédico para\nlos Trastornos del Espectro Autista, Hiperactividad y Déficit de Atención,\nespecialista en Pediatría y Puericultura y en el Abordaje Biomédico de los\nTrastornos del Desarrollo- quién asegura que el 95% de los pacientes con\nautismo padecen trastornos gastrointestinales que, al tratarse, mejoran\nnotablemente las conductas; ha tomado la iniciativa de difundir el mensaje de\ncómo los pacientes que atienden su condición desde el sistema gastrointestinal\npueden llegar a tener una evolución notable en su desarrollo natural como seres\nhumanos.</p>\n<p style=\"text-align: justify;\">La recomendación principal de Mendoza es que no se puede dejar de lado la\nparte biomédica, porque entonces la evolución del paciente no va a ser tan\nfavorable. Una de las causas del autismo es la intoxicación por metales\npesados, como por ejemplo plomo, mercurio y aluminio. Estos son los principales\nminerales que comúnmente los médicos encuentran en los exámenes de laboratorio.\nLo primero que se debe hacer luego de un diagnóstico oportuno es, entonces,\ndesintoxicar al paciente para sanar al intestino de esa falla gastrointestinal\nsevera que han adquirido por intoxicación ambiental, vacunas, alimentos, entre\notros elementos genéticos y ambientales que han contribuido a su condición.</p>\n<p style=\"text-align: justify;\">Todos los pacientes, dice la doctora Mendoza, deben evaluarse desde el\npunto de vista gastrointestinal siempre de la mano con un gastroenterólogo, ya\nque el 95% de los pacientes está científicamente demostrado que tienen\nalteraciones en su sistema digestivo y esto conlleva a la mala digestión y\nabsorción de los alimentos que llegan al sistema nervioso central y lo\nintoxican.</p>\n<p style=\"text-align: justify;\">Ciertos alimentos como el gluten y a caseína actúan como opioide en el\nsistema nervioso central. Esta mala alimentación genera la inatención, la alta\ntolerancia al dolor, estigmas que son muy característicos en los pacientes con\nautismo como correr en puntillas, el aleteo, el caminar sin sentido, los\ngritos, la autoestimulación que puede ser tocar algo, golpearse.</p>\n<p style=\"text-align: justify;\">Parte de la desinformación que hay en torno al autismo se debe a que las\nmadres no saben cómo actuar frente a una de las más importantes señales de\nalarma, que se produce cuando se dan cuenta de que hay algo en la conducta de\nsu hijo que no está normal. En ese caso, lo más importante es acudir a las\npersonas que estén especializadas en el área porque no todos los pediatras\nestán capacitados para evaluar a los niños con autismo. También es\nimprescindible asistir a la terapia con el especialista adecuado. No todos los psicólogos\nestán capacitados para hacer una evaluación que dé el diagnóstico correcto.\nPero lo importante es que, si la condición se trata de manera adecuada, puede\nmejorar notablemente.</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("13", "2014-04-02 23:50:03", "2014-05-05 19:50:00", NULL, "1", "1", "2013-03-14 23:00:00", "Una sonrisa, un clown", "Con la técnica del clown pueden lograr vencer el miedo al ridículo, el miedo a fracasar; el clown es una herramienta efectiva para el control de las emociones, desarrollo de la creatividad, socialización, atención y concentración del menor”.", "<p style=\"text-align: justify; \">Todos conocemos el poder de una sonrisa\nfrente a las demás personas, y han pensado en el poder que tiene la risa en\nnuestro organismo. Para poner un pequeño ejemplo; 20 segundos de risa equivalen\na 3 minutos de ejercicio constante en el gimnasio. Los músculos de la cara,\ntórax y abdomen se relajan y se contraen con gran velocidad, mejorando su tono.</p>\n<p style=\"text-align: justify;\">Cuando reímos y nos divertimos\nsanamente, nuestros ojos adquieren un brillo característico, aumentan las\nsecreciones lacrimales, de orina y saliva, que son reguladas por el sistema\nnervioso.</p>\n<p style=\"text-align: justify;\">Cuando reímos segregamos endorfinas,\ndurante el acto de reír se liberan endorfinas, los sedantes naturales del\ncerebro, similares a la morfina. Por eso, cinco o seis minutos de risa continua\nactúan como un analgésico. De ahí que se utilice para terapias de convalecencia\nque requieren una movilización rápida del sistema inmunológico.</p>\n<p style=\"text-align: justify;\">En este mundo agitado, lleno de stress\nnos vendría bien un poco de carcajadas, algunos han pensado en vivir una\nexperiencia clown, perder el miedo al ridículo y encontrar al niño que llevamos\ndentro, frente a esto, Antonio Reyes, actor reconocido en varios medios, nos\nhabla un poco del lado terapéutico del Clown, nos dice: “El clown no es\nexagerar es llevar la emoción a su máxima expresión y majestuosidad, nosotros\nque estamos acostumbrados a reprimir todo el tiempo las emociones, vemos esta\nactitud como exagerada y ridícula. El ridículo no es más que todo aquello que\nNO somos capaces de hacer; no es burlarse de uno ni del otro, más bien es\nencontrar otro punto de vista de ti y del mundo. El clown trasciende al ridículo\ntransponiendo esta sensación a un hecho artístico real y sincero.</p>\n<p style=\"text-align: justify;\">El conflicto es una herramienta\nfundamental para encontrar al clown, es donde nuestro clown aparece en su más\nextensa dimensión, cuanto más nos metamos en el problema más sincero y real\nserá nuestro payaso. Este conflicto no debe ser superficial ni actuado, debe\nser interno e intenso, buscando encontrar aquello que nos movilice\nemocionalmente para que a partir de ahí, convertir un estado tragicómico en un\nhecho artístico y poético. La tragedia está directamente relacionada al ser\nhumano y al payaso, la tragedia como dificultad humana se pone en manifiesto en\nla torpeza del hombre de querer ser siempre mejor que él otro, por no querer\nmostrarse ante la sociedad como un perdedor, por no querer mostrar sus\nsentimientos ya que es considerado una acción de “debilidad”; el clown pone en\nevidencia siempre esta particularidad humana, el espectador la identifica\ninternamente como suya y provoca el estado cómico.</p>\n<p style=\"text-align: justify;\">Sucede también que nuestra voluntad\nconsiente bloquea nuestra voluntad inconsciente y es que nuestro inconsciente\ntiene su propia voluntad queriendo salir muchas veces al exterior, el también\nllamado impulso no es más que aquella manifestación de nuestro interior que\nquiere salir a mostrarse, pero nuestra razón la bloquea impidiendo que nuestro\nclown salga en libertad. Esta lucha constante de “pensar y hacer” genera\ntambién un conflicto interno, esta disociación podría usarse para encontrar a\nnuestro clown, el problema es que estamos acostumbrados a que nuestra razón\nsiempre domine nuestro instinto, paralizando todo aquel mundo creativo y fuera\nde prejuicios que el clown debe manifestar.</p>\n<p style=\"text-align: justify;\">Lamentablemente muchas veces no somos\ncapaces de resistir el estado trágico y al conflicto, no queriendo salir de\nnuestra zona de confort, puesto que nuestra autoestima no es tan sólida como\npara ponerla en riesgo; esto trae por consecuencia que busquemos la risa fácil,\nlos personajes estereotipados o como decía Stanislavski el personaje cliché; no\nencontrando a un clown auténtico, interno, de investigación y de proceso.</p>\n<p style=\"text-align: justify;\">Estos recursos de investigación están\ndirigidos a encontrarnos a nosotros mismos, sanando nuestra infancia y todo\naquello que nos provoque bloqueos, de aquí parten los recursos pedagógicos y\nterapéuticos del clown, puesto que nos ayuda a encontrar en nosotros un mejor\nser humano, más libre, con menos problemas existenciales. Como siempre lo diré\n\"la vida del ser humano sería menos complicada con una nariz roja\",\nsuena contraproducente si hablamos que el clown vive y debe vivir en conflicto,\npero es la VOLUNTAD extrema y positiva la que hace al clown superpoderoso ante\nla dificultad, es por eso su atrevimiento de meterse cada vez más en problemas,\nporque el éxito radica en enfrentar los problemas y no en evadirlos, no en\nocultarlos, queriendo escapar de nuestro pasado puesto que esté siempre nos\nalcanzará; me viene a la mente las palabras de Dra. Lowenstein en el Príncipe\nde las mareas \"…Se necesita valor para sentir el dolor\" \"….Cuando\nlas cosas son muy dolorosas o las olvidamos o nos reímos” risa falsa por\ncierto; no la real y sincera, aquella que sana y que nos alimenta el alma.</p>\n<p style=\"text-align: justify;\">En estos tiempos de juegos\nelectrónicos, juegos por Internet, y la señal de cable por televisión, los\nniños viven encerrados en un mundo ajeno a la creatividad, a la sensibilidad,\nal razonamiento, ingresando a un mundo de soledad, de sobrestimulación, de violencia\ngenerada por la temática de algunos juegos y programas de televisión.\nChiquiclaun los sumerge a un mundo mágico de juegos de creatividad, donde\nencontraran los valores esenciales del ser humano puro limpio, del verdadero\nniño interior que habita en cada uno y que está muy escondido en algún lugar de\nnosotros, desarrollando la humildad, la solidaridad, el respeto hacía el\ncompañero, y la no violencia como forma de vida.</p>\n<p style=\"text-align: justify;\">El Clown otorga al menor las\nherramientas necesarias para derribar los muros que se va poniendo en el\ndifícil proceso del crecimiento; buscando encontrar mucho más que el niño\ninterior, encontrando su YO verdadero, su YO creativo, su YO puro, aquel libre\nde poses y barreras emocionales que se ponen por protección para no ser dañados.\nLa frustración que se produce en el crecimiento, el sentir que no es aceptado\nfamiliar y socialmente es neutralizada a través de esta técnica, para\nconvertirla en herramienta de juego, venciendo sus temores y elevando su\nautoestima, reconociendo así que puede descubrirse, sorprenderse y divertirse\nconsigo mismo, aceptándose finalmente.</p>\n<p style=\"text-align: justify;\">Chiquiclaun es un espacio creado para\nque los menores desarrollen la personalidad a través del juego en libertad, por\nmedio de actividades lúdicas, convirtiendo el aprendizaje en un estado\nplacentero. Con la técnica del clown pueden lograr vencer el miedo al ridículo,\nel miedo a fracasar; el clown es una herramienta efectiva para el control de\nlas emociones, desarrollo de la creatividad, socialización, atención y\nconcentración del menor”.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: right; \">Autor: Cesar Gamarra Dulanto</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("14", "2014-04-03 00:02:03", "2014-07-22 08:48:55", NULL, "1", "2", "2013-01-01 00:00:00", "Solidaridad", "Parte de ser humanos es el apoyo social y el bien común", "<p> </p>\n<p> </p>\n<p> </p>\n<p style=\"text-align: center; \"><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/sxcGiGD95Xc\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p style=\"text-align: center;\">&nbsp;</p>", "1", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("15", "2014-04-03 00:17:22", "2014-05-05 19:46:04", NULL, "1", "1", "2013-07-28 00:00:00", "Desfile de Fiestas Patrias en el distrito de Chancay ", "Diversas instituciones educativas se concentraron en la Plaza de Armas del distrito para el desarrollo de las actividades de cívico patrióticas por el Aniversario Patrio.", "<p style=\"text-align: justify;\">En la mañana del 28 de Julio del 2011, se concentraron diversas instituciones educativas en la Plaza de Armas del distrito. La ceremonia inicio con el izamiento del Pabellón Nacional y de la Bandera de Chancay (antes conocido cono Villa de Arnedo). El desfile se inició con la presencia de las instituciones educativas de nivel primario y secundario, posteriormente los institutos superiores y universidades, miembros del Club de la Tercera Edad, trabajadores del municipio, EMAPACH (trabajadores del servicio de agua potable), mototaxistas, y finalmente las autoridades encargadas del orden público y seguridad nacional (escuadrón de serenazgo, policía nacional y escuadrón Atahualpa del ejercito peruano).</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: center; \"><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/JPapTlxIVSU\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p style=\"text-align: left;\">Unas muy felices Fiestas Patrias para todos los peruanos y un saludo especial para los ciudadanos del distrito de Chancay. &nbsp;</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("16", "2014-04-08 16:33:42", "2014-04-08 16:33:42", NULL, "1", "1", "2013-06-11 16:00:00", "Marina de Guerra convoca a profesionales para asimilarse como oficiales de servicio", "Lima, jun. 11 (ANDINA - Agencia Peruana de Noticias). La Marina de Guerra de Perú convoca a los diversos profesionales para que se asimilen y sirvan a esta institución como oficiales de servicio y así amplíen su perspectiva laboral. \nLa Dirección de Intereses Marítimos e Información de la Marina precisó que los interesados pueden hacer las consultas que deseen en los teléfonos de la Escuela Naval: 613-0400, anexos 6111 y 6297 o ingresando en las páginas web: www.marina.mil.pe y www.escuelanaval.edu.pe.", "<p> </p>", "2", "doc_1396992813.pdf", "1");
#
#
INSERT INTO `news_items` VALUES ("17", "2014-04-10 00:38:16", "0000-00-00 00:00:00", NULL, "1", "5", "2014-04-10 00:35:57", "Sí se puede, vamos con fe", "¿Cómo ponerse una talla 34 de pantalón?\nA continuación algunos consejos útiles.", "<div style=\"text-align: center; \">¿Cómo ponerse una talla 34 de pantalón?</div><p> </p>\n<p>A continuación algunos consejos útiles.</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/iP18TJZ9T-k\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("18", "2014-04-11 23:56:00", "2014-05-05 19:41:06", NULL, "1", "1", "2014-04-11 23:50:09", "Paro Nacional del Magisterio", "Educadores y dirigentes: La II Asamblea Nacional de Delegados realizada el viernes 04 de abril, luego de realizado la consulta a las bases del país, ha acordado acatar un paro nacional de 24 horas ante el incumplimiento del gobierno de resolver los problemas de los docentes. Dicho paro se realizará el día 22 de abril del 2014. El SUTEP hizo un llamado a las bases del país a preparar contundentemente la presente medida de fuerza convocando el apoyo de nuestros padres de familia, autoridades locales y la sociedad civil.", "<p style=\"text-align: justify;\">La II Asamblea\nNacional de Delegados realizada el viernes 04 de abril, luego de realizado la\nconsulta a las bases del país, ha acordado acatar un paro nacional de 24 horas\nante el incumplimiento del gobierno de resolver los problemas de los docentes.\nDicho paro se realizará el día 22 de abril del 2014. El SUTEP hizo un llamado a\nlas bases del país a preparar contundentemente la presente medida de fuerza\nconvocando el apoyo de nuestros padres de&nbsp;familia, autoridades locales y la\nsociedad&nbsp;civil.</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("19", "2014-04-12 00:21:35", "2014-04-12 00:22:35", NULL, "1", "6", "2014-04-12 00:14:45", "Héroe Anónimo", "Emotivo vídeo para reflexionar sobre lo que en realidad debería ser una vida feliz plena juntos a nuestro prójimo.", "<p> </p>\n<p style=\"text-align: center; \"><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/ndN3QieDJ-U\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p style=\"text-align: center;\">&nbsp;</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("20", "2014-04-12 00:34:59", "0000-00-00 00:00:00", NULL, "1", "6", "2014-04-12 00:31:03", "Demasiado tarde", "La vida es hermosa, compártela con los que mas quieres, siempre respeta las decisiones de los demás", "<p style=\"text-align: center; \">&nbsp;</p>\n<p style=\"text-align: center;\"><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/Hd_sH2Ij6ug\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("21", "2014-04-12 00:58:15", "2014-06-05 00:03:40", NULL, "1", "1", "2013-01-01 00:00:00", "Bienvenidos educadores del Perú", "Educadoresperu es una web creada para facilitar la labor docente, aminorando la brecha existente entre el estudiante y el profesor.", "<p style=\"text-align: center; \"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=e145d2c6db8c44ae7ba93cbc7606413e%26sc=9970163\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></p>\n<p> </p>", "1", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("22", "2014-04-12 01:50:28", "2014-05-05 19:40:47", NULL, "1", "1", "2014-04-12 01:43:53", "24 de Abril: Marcha contra los programas de formación universitaria de tres años y medio y la creación de nuevas facultades de odontología", "El Dr. Vera Trujillo manifestó que están en contra de la creación de programas de formación universitaria de tres años y medio, y de que se sigan creado más facultades  de Odontología, que perjudican notablemente el desarrollo de la profesión. (Fuente cop.org.pe)", "<p style=\"text-align: justify;\">Este 24 de abril los cirujano dentistas marcharán al Congreso de la república para\nhacerse respetar sus derechos, en la GRAN MARCHA POR LA ODONTOLOGÍA, contra los programas de formación universitaria de tres años y medio y la creación de nuevas facultades de odontología</p>\n<p style=\"text-align: justify;\">El\nDr.&nbsp;Vera Trujillo manifestó que están&nbsp;en contra de la creación de\nprogramas de formación universitaria de tres años y medio, y de que se sigan\ncreado más facultades &nbsp;de Odontología, que perjudican notablemente el\ndesarrollo de la profesión.</p>\n<p style=\"text-align: justify;\">Detalló que la\nproliferación indiscriminada de facultades de Odontología debe parar, ya que si\nno se hace algo ahora, dentro de poco habrá más de 50 mil dentistas en el país,\nlo cual generará más desempleo y sub empleo en la profesión.</p>\n<p style=\"text-align: justify;\">“Antes, nuestra\ncarrera era más respetable. Ahora, con 34 facultades de odontología y más de&nbsp;dos\nmil profesionales que egresan de las aulas anualmente, el desarrollo\nprofesional de muchos cirujano dentistas está en peligro”, expresó.</p>\n<p style=\"text-align: justify;\">Respecto a la\nduración de los estudios universitarios de odontología, el máximo representante\nde los colegiados de Lima consideró que el periodo de estudio debe ser de cinco\no seis años, ya que este tiempo permite a los estudiantes tener una\ncapacitación adecuada, con calidad y acorde a las exigencias actuales.</p>\n<p style=\"text-align: justify;\">En ese sentido,\nexhortó a los colegiados a no permitir que se degrade la odontología con la\ncalidad de profesionales que egresarán de esos centros de estudio. Señaló que\nlo único que se buscan es lucrar con la educación y salud de la población.</p>\n<p style=\"text-align: justify;\">Así mismo, el\nDr. Vera Trujillo invitó a todos los dentistas a participar activamente de la\nGran Marcha por la Odontología, que se realizará este 24 de abril. El lugar de\nconcentración será la Plaza San Martín y de allí todos los cirujano dentistas\nunidos harán escuchar sus voces.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("23", "2014-04-14 20:14:27", "2014-05-29 22:18:44", NULL, "1", "4", "2014-04-14 20:04:12", "Luna Roja", "Atentos a la luna, mañana 15 de Abril del 2014, a partir de la 1 am, Selene se teñirá de rojo", "<p>Mañana tendrá\nlugar un&nbsp;<strong>eclipse total\nde&nbsp;Luna</strong>, el primero de una tétrada de eclipses que se verá\nmejor desde América y Oceanía.&nbsp;Este inusual fenómeno que se produce cada\ndiez años aproximadamente hace que&nbsp;<strong>veamos\nla&nbsp;Luna&nbsp;de color rojo</strong>.</p>\n<p>Precisamente,\npor eso este raro aunque explicable fenómeno ha estado históricamente asociado\na desastres y malos augurios.</p>\n<p>\"Los\neclipses de&nbsp;Luna&nbsp;se producen cuando hay un&nbsp;<strong>alineamiento casi perfecto entre el Sol, la Tierra y la&nbsp;Luna</strong>,\nen fase de&nbsp;Luna&nbsp;llena\", explicó a Efe el astrónomo del\nObservatorio Astronómico Nacional español Mario Tafalla.</p>\n<p>\"El Sol\npasa por detrás de la Tierra y la sombra de nuestro planeta se proyecta sobre\nla&nbsp;Luna, primero de forma parcial y finalmente eclipsándola por\ncompleto\", añadió.</p>\n<p>Sin embargo,\nla&nbsp;Luna&nbsp;no desaparece de la vista, sino que&nbsp;<strong>se tiñe de color rojo porque la atmósfera de la Tierra actúa como\nuna lente</strong>&nbsp;(desvía\nla luz solar) y filtra sus componentes azules dejando pasar solo la\nluz&nbsp;roja, la que se proyecta sobre la&nbsp;Luna.</p>\n<p>\"Es un\nfenómeno muy bonito e interesante porque además no sabemos cómo de rojiza\nserá\", destaca el investigador del Instituto de Astrofísica de Canarias\n(IAC) Miquel Serra-Ricart.</p>\n<p>Para observar\neste eclipse lunar,&nbsp;<strong>un equipo de\ninvestigadores del IAC viajará a Perú para retransmitir en directo este\nfenómeno</strong>.</p>\n<p>A diferencia\nde los eclipses solares,&nbsp;<strong>los\nde&nbsp;Luna&nbsp;son observables desde cualquier parte del planeta</strong>&nbsp;(siempre que sea de noche), aunque\néste primer eclipse se verá mejor desde América y Oceanía.</p>\n<p>\"Los\ntres primeros serán visibles en las Américas y el cuarto se verá desde Europa\nel 28 de septiembre de 2015\", según Serra-Ricart.</p>\n<p>Esta clase de\nfenómenos no son excepcionales pero sí \"algo inusual\", de hecho la\núltima tétrada de Lunas rojas se produjo hace una década aproximadamente y la\nsiguiente será en 2023, precisó.</p>\n<p>En&nbsp;<strong>Europa se podrá apreciar el primer contacto de\nla&nbsp;Luna&nbsp;con la sombra de la Tierra</strong>, lo que se conoce\ncomo \"contacto con la penumbra\" que, según los datos del Anuario del\nObservatorio Astronómico, será a las 06.55 hora española (04.55 GMT) del 15 de\nabril.</p>\n<p>Sin embargo,\nlos cambios en el brillo del satélite serán mínimos y muy difíciles de\ndetectar.</p>\n<p>Cuando\nla&nbsp;Luna&nbsp;entre en la fase más oscura de la sombra terrestre, el\nsatélite ya se habrá escondido para la mayor parte de Europa (estará\namaneciendo), mientras que en América empezarán a disfrutar del espectáculo\nlunar que durante una hora y 18 minutos exactamente, hasta las 06.25 GMT.</p>\n<p>Este eclipse&nbsp;<strong>será además el primero de una tétrada de eclipses totales</strong>&nbsp;que tendrán lugar en un intervalo\naproximado de seis meses. EFE</p>\n<p align=\"right\">(Fuente:\nLa República.pe/ Mundo)</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("24", "2014-04-16 19:57:00", "2014-06-19 00:53:58", NULL, "1", "1", "2014-04-16 19:53:57", "Semana Santa en Chancay", "Ahora pueden vivir este tiempo Santo reconciliado con Dios, donde el pueblo de Chancay da a conocer sus tradiciones expresado en sus pasos procesionales", "<p style=\"text-align: left;\">Ahora pueden vivir este tiempo Santo reconciliado con Dios, donde el pueblo de Chancay da a conocer sus tradiciones expresado en sus pasos procesionales. &nbsp;</p>\n<p> </p>\n<p>&nbsp;<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/XgsujP_5kM4\" frameborder=\"0\" allowfullscreen=\"\"></iframe>Ahora pueden vivir este tiempo Santo reconciliado con Dios, donde el pueblo de Chancay da a conocer sus tradiciones expresado en sus pasos procesionales. &nbsp;\n</p>\n&nbsp;<p> </p>\n<p> </p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/duPXars1sss\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/Gxhitv1zvUA\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n <p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("25", "2014-04-21 01:35:33", "2014-04-30 16:31:11", NULL, "1", "7", "2014-04-21 01:33:13", "Arte", "Archivos del profesor Francis", "<p>Archivos del profesor Francis. Dele clic sobre cada uno para descargar:</p>\n<p> </p>\n<p><!--[if !supportLists]-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"#ff0000\">\nI.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Colores</font></p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Teoria%20y%20practica%20del%20color%20Parramon.pdf\">\n<!--[endif]-->Teoría y Práctica del Color Parramon</a></p>\n<p> </p>\n</blockquote><p><!--[if !supportLists]--><span lang=\"EN-US\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<font color=\"#ff0000\">II.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</font></span><!--[endif]--><font color=\"#ff0000\">Cuerpo\nHumano</font></p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">a.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Art_of_Drawing_the_Human_Body.pdf\">Art of Drawing the Human Body</a></span></p>\n</blockquote><p> </p>\n<p><!--[if !supportLists]-->&nbsp;&nbsp;&nbsp;\n<font color=\"#ff0000\">III.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Dibujo\nde un Retrato</font></p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">a.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Portrait_Drawing._A_Step-By-Step_Art_Instruction_Book.pdf\">Portrait Drawing. A Step-By-Step Art Instruction Book</a></span></p>\n</blockquote><p> </p>\n<p><!--[if !supportLists]-->&nbsp;&nbsp;&nbsp;<font color=\"#ff0000\">\nIV.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Técnica\nde la Historieta</font></p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]--><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Tecnica_de_la_Historieta.pdf\">Técnica de la Historieta</a></p>\n</blockquote><p> </p>\n<p><!--[if !supportLists]-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"#ff0000\">\nV.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Otros</font></p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">a.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/christopher_hart_-_how_to_draw_comic_book_heroes_and_villains.pdf\">How to draw comic book heroes and\nvillains (Christopher Hart)</a></span></p>\n</blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">b.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Andrew_Loomis_-_Figure_Drawing_for_all_it_s_Worth.pdf\"> </a></span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Andrew_Loomis_-_Figure_Drawing_for_all_it_s_Worth.pdf\">Figure Drawing for all it is Worth\n(Andrew Loomis)</a></span></p>\n</blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">c.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Robots_to_Draw_and_Paint.pdf\">Robots to Draw and Paint</a></span></p>\n</blockquote><p> </p>\n<p><!--[if !supportLists]-->&nbsp;&nbsp;&nbsp;\n<font color=\"#ff0000\">VI.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Comics</font></p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">a.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Making%20Comics.pdf\"> </a></span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Making%20Comics.pdf\">Making Comics</a></span></p>\n</blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">b.<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Stan%20Lee%20-%20How%20To%20Draw%20Comics%20The%20Marvel%20Way.pdf\"> </a></span></span><!--[endif]--><span lang=\"EN-US\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Arte%20NSG/Stan%20Lee%20-%20How%20To%20Draw%20Comics%20The%20Marvel%20Way.pdf\">How to Draw Comics the Marvel Way</a></span></p>\n</blockquote>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("26", "2014-04-24 19:14:00", "2014-06-19 00:52:51", NULL, "1", "8", "2014-04-24 19:10:49", "Achikée", "La magia del mundo andino en defensa del medio ambiente.\nPALOSANTO celebra 5 años de su primera función presentando \"Achikée\" escrita y dirigida por Ismael Contreras, inspirada en un mito andino recopilado por don José María Arguedas.", "<p>PALOSANTO celebra 5 años de su\nprimera función presentando \"Achikée\" escrita y dirigida por Ismael\nContreras, inspirada en un mito andino recopilado&nbsp;por don José María\nArguedas.<br />\nDos niños semillas de maíz huyen de&nbsp;\nAchikée, la tierra seca, que los persigue para robarles su calor. La falta de\nlluvia y la contaminación han afectado la tierra&nbsp;y ella intenta\nsobrevivir, pero si consigue a los niños, morirán por lo que escapan con ayuda\nde los animales de la diversidad andina.&nbsp;<br />\nUna experiencia teatral distinta que incluye\nteatro negro, teatro de sombras y teatro de muñecos. Música en vivo, humor y\ndiversión, como para pasar una linda tarde en familia&nbsp;</p>\n<p>Actúan Yasmine Incháustegui, Julio\nCésar Delgado, Fernando Barrera, Daniela Rodriguez y Jorge Bazalar.<br />\nLuces y sonido Marisa Contreras. Música en vivo: Álvaro Arnáez. Asistencia de\nEscena: Alex Nacarino. Producción Cecilia Zapata.<br />\nFunciones: sábados y domingos 5 p.m. en el Centro Cultural CAFAE-SE, avenida\nArequipa 2985 San Isidro.<br />\nEntradas: adultos S/25.00, niños estudiantes y jubilados S/20.00</p>\n<p>\nVenta en Teleticket y en la boletería del teatro.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("27", "2014-05-01 11:56:24", "2014-05-07 19:46:44", NULL, "1", "3", "2014-05-01 11:00:00", "Dona un libro", "Dona un libro, regalémosles un Buen Inicio de Clases, nosotros llegamos donde otros no llegarán, y lo hacemos impulsados por el deseo de regalarles una sonrisa.", "<p>Dona un libro, regalémosles un Buen Inicio de Clases,\nnosotros llegamos donde otros no llegarán, y lo hacemos impulsados por el deseo\nde regalarles una sonrisa.</p>\n<p>El Grupo Juvenil de Apoyo y Orientación Social Construyendo\nSonrisas (GJAOSCS), con el apoyo de la Re d de Educadoresperu (EP), realizan la\ncampaña: “Dona un Libro, regalémosles un Buen Inicio de Clases” , con el lema: “Nosotros\nllegamos donde otros no llegarán, y lo hacemos impulsados por el deseo de\nregalarles una sonrisa”. </p>\n<p>El GJAOSCS pretende llegar con sus donaciones a los lugares\ndonde los libros hacen falta, a los lugares donde las autoridades aun no\nbrindan los libros necesarios para el “Buen Inicio del Año Escolar”. Esta\ncampaña pretende sensibilizar a la población en busca del bienestar común del\npueblo y para el pueblo.</p>\n<p>Pueden colaborar comunicándose con nosotros:</p>\n<p><!--[if !supportLists]--><span lang=\"EN-US\">·<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><!--[endif]-->E-mail\nGJAOSCS: <a href=\"mailto:gjaoscs@gmail.com\">gjaoscs@gmail.com</a></p>\n<p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail Educadoresperu: <a href=\"mailto:informes@educadoresperu.com\"><span lang=\"ES-PE\">informes@educadoresperu.com</span></a></p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("28", "2014-05-01 13:36:36", "0000-00-00 00:00:00", NULL, "1", "5", "2014-05-01 13:35:42", "Los tres peores vinos", "Tenga cuidado al elegir un vino", "<p><span>Tenga cuidado al elegir un vino, estos son los tres peores vinos que puede conseguir.</span></p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("29", "2014-05-01 13:43:07", "0000-00-00 00:00:00", NULL, "1", "1", "2013-07-10 13:00:00", "Municipalidad de Pomabamba: El sector construcción crecería 15% anual hasta el 2016", "El sector construcción crecería 15% anual hasta el 2016. Así lo indicó el presidente del Fondo Mivivienda, Luis Angel Piazón, tras la inauguración de la sexta edición de Casa Show del BCP.", "<p>El sector Construcción crecerá 15% anual hasta el 2016, gracias a\nla demanda habitacional insatisfecha, señaló el presidente del Fondo Mivivienda\n(FMV), Luis Angel Piazón.</p>\n<p>Indicó que de esta manera alcanzarán la meta total\nde&nbsp;viviendas colocadas&nbsp;en el actual periodo gubernamental, entre el\nsector público y privado, de 500 mil unidades habitacionales, lo que incluso\npodría superarse.</p>\n<p>Mencionó que se trabaja en la subasta de nuevos terrenos. Los\nprocesos ya convocados son los correspondientes a la Alameda de Ancón (Lima),\ncon un proyecto de 11,000 viviendas, así como la urbanización La Planicie en La\nLibertad, donde se construirán mil viviendas.</p>\n<p>Próximamente se tendrán los proyectos Jesús Oropeza en San Juan de\nLurigancho (Lima), La Esperanza (La Libertad), Castrovirreyna (Huancavelica),\nPacocha en Ilo (Moquegua), Lomas de Carabayllo (Lima), Cristo Rey (Tacna),\nOasis de Villa en Villa El Salvador (Lima), y Angamos en Ventanilla (Callao),\nrefirió.</p>\n<p>Señaló que en los próximos 12 meses se subastarán por lo menos 20\nterrenos del Estado y que el objetivo este año es la formalización de viviendas\ncon los programas Mi Construcción y Mis Materiales.</p>\n<p>Estas declaraciones las brindó luego de la inauguración de la\nsexta edición</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("30", "2014-05-04 10:39:51", "2014-05-05 19:40:00", NULL, "1", "1", "2014-05-04 10:34:16", "Chancay: Accidente en carretera Panamericana Norte", "El día de ayer, sábado 3 de mayo del 2014 ocurrió un fatídico accidente en el km. 88 de la Panamericana Norte, fue atropellado un hombre de 66 años de edad.", "<p style=\"text-align: justify; \">El día de ayer, sábado 3 de mayo del 2014 ocurrió un fatídico\naccidente en el km. 88 de la Panamericana\n Norte, fue atropellado un hombre de 66 años de edad.</p>\n<p style=\"text-align: justify;\">Un acontecimiento muy doloroso que pudo evitarse de contar\ncon las medidas de seguridad necesarias. Siempre la carretera Panamerica es una\ncarretera de vía rápida, motivo por el cual, a pesar de un transito ligero, se\ndeben tomar las medidas de prevención adecuadas, el uso de puentes peatonales y\nuna mejor educación vial podrían haber evitado este tipo de acontecimiento, ya\nno es tiempo de buscar culpar a algún gobierno presente o anterior, lo que se\ntrata es que se realicen proyectos de gestión pública adecuados, cumplir con el\npueblo, buscar problemas reales y darles solución; nos encontramos frente a un\nproblema real, una mala educación vial en gran parte del país y escasos puentes\npeatonales y señales de transito en muchas ciudades del mismo, el problema es\ngeneral, pero las soluciones pueden darse de a pocos de manera particular.</p>\n<p style=\"text-align: justify;\">Tener en cuenta también los cruces de la panamericana a la\naltura del cementerio municipal de Chancay y de los cruces de Peralvillo y\nChancayllo.</p>\n<p style=\"text-align: justify;\">Nuestro sentido pésame a las familiares de quien en vida fue\nJuan Roberto Ruiz Estación.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("31", "2014-05-05 18:53:13", "2014-05-26 18:23:51", NULL, "1", "7", "2014-05-05 18:48:11", "Ciencias - 4º y 5º de Secundaria - El Universo Elegante", "Profesor César Gamarra Dulanto", "<p><span style=\"text-decoration: underline;\"><strong>Actividad Nº 01</strong></span></p>\n<p>Realice el cuestionario ubicado en el blog del profesor. El cuestionario es referente a la teoría de cuerdas y la forma como entendían el universo, Isaac Newton y Albert Einsteing.</p>\n<p>(<a href=\"http://profesorgamarra.blogspot.com/2014/05/el-universo-elegante-el-sueno-de.html\">ir al blog</a>)</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("32", "2014-05-05 19:11:30", "2014-05-05 19:24:26", NULL, "1", "8", "2014-04-28 19:00:00", "Palosanto celebró 5 años, y lo hizo presentando la obra “Achikée”", "Es mas que seguro que cada uno de los espectadores se llevará a casa una enorme sonrisa en el rostro y una gran responsabilidad en el corazón", "<p style=\"text-align: justify; \">El fin de semana\ntuve la oportunidad de volver a ser espectador de, en mi opinión como profesor,\nuno de los mejores grupos de teatro educativo de Lima, Palosanto. Palosanto\ncelebró 5 años de su primera función, y lo hizo presentando la obra “Achikée”, escrita y dirigida por Ismael Contreras, inspirada en un\nmito andino recopilado por don José María Arguedas, esta obra busca sensibilizar,\na quién la vea, sobre los problemas de contaminación que sufre el ambiente, y\npor ende la Pachamama. Inicia la historia entre cantos y bailes, la Pachamama está\nseca y triste y se convierte en Achikée.</p>\n<p style=\"text-align: justify;\">Achikée no es una bruja, ni un monstruo, es tan solo la Pachamama\nque ya está muy cansada y seca, adolorida por la inconsciencia e insensatez del\nhombre quien la ensucia y contamina. Pobre Achikée esta tan seca que ya ni lágrimas le quedan para llorar. La\nPachamama ama y quiere a todos los seres sobre la Tierra, pero convertida en Achikée, ese amor mataría a cualquiera de hambre y de sed; y es ahí cuando\ninicia la aventura, dos semillitas hermanas huyen de Achikée para no secarse con ella, con una gran moraleja y muchas\nenseñanzas durante cada instante de la obra, es mas que seguro que cada uno de\nlos espectadores se llevará a casa una enorme sonrisa en el rostro y una gran\nresponsabilidad en el corazón: “Debemos cuidar a nuestra madre tierra”</p>\n<p align=\"right\">Autor: Prof.\nCésar Gamarra D.</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("33", "2014-05-06 18:35:28", "2014-05-06 18:42:54", NULL, "1", "8", "2014-05-06 18:34:27", "Danza Moderna", "La danza moderna permite una amplia variedad creativa y desarrollo físico para quién la practique, es admirada a nivel mundial y permite el disfrute de quién la contemple.", "<p style=\"text-align: justify; \">La danza moderna es una expresión corporal artística que nace de la interpretación y visión del bailarín o coreógrafo. Sus movimientos son una expresión libre y fluida de estados, emociones, metáforas o ideas abstractas, rompiendo con las reglas y criterios del ballet clásico.</p>\n<p style=\"text-align: justify;\">La danza moderna no sigue pasos ni movimientos estructurados de antemano. A diferencia del ballet clásico, cuyos movimientos son aéreos y elevados, la danza moderna se arraiga más en la tierra.</p>\n<p style=\"text-align: justify;\">Este estilo de danza evoluciona cada vez que lo hace la creatividad de quien lo realiza, llegando a producir coreografías muy románticas y sensuales sin perder el arte que manifiesta.</p>\n<p style=\"text-align: justify; \">La primera vez que presencié un espectáculo de este tipo fue la representación de La Eneida en la Universidad Nacional Federico Villarreal, hace ya tres años atrás, donde el suelo era parte importante del arte y las sensaciones de roce y sensualidad mantenían atentos a todo el público presente. La danza moderna permite una amplia variedad creativa y desarrollo físico para quién la practique, es admirada a nivel mundial y permite el disfrute de quién la contemple.</p>\n<p align=\"right\" style=\"text-align: right;\">César Gamarra D.</p>\n<p>&nbsp;A\ncontinuación algunos ejemplos para el deleite de los ojos y el corazón</p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Dúo Main Tenant</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/9cqrXa9OilQ\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Dúo Osmose</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/nygpVTVsKRY\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("34", "2014-05-07 16:41:25", "2014-05-29 22:18:20", NULL, "1", "8", "2014-05-07 16:40:01", "Intersecciones entre novela y teatro en la obra de Mario Vargas Llosa", "El lunes 12 de mayo, a las 5 p.m., Elena Guichot (Universidad de Sevilla) dará la conferencia en el auditorio principal de la Facultad de Letras y Ciencias Humanas de laUniversidad Nacional Mayor de San Marcos.", "<p>El lunes 12 de mayo, a las 5 p.m., Elena Guichot (Universidad de Sevilla) dará la conferencia \"Intersecciones entre novela y teatro en la obra de Mario Vargas Llosa\" en el auditorio principal de la Facultad de Letras y Ciencias Humanas de la<a href=\"https://www.facebook.com/1551UNMSM\" data-hovercard=\"/ajax/hovercard/page.php?id=123229551081638\">Universidad Nacional Mayor de San Marcos</a>.<br /><br />Esta conferencia forma parte de las actividades que realiza la Escuela de Literatura y el Curso Internacional Literatura y Cultura Latinoamericana. &nbsp;</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("35", "2014-05-07 19:12:54", "2014-07-22 08:45:40", NULL, "1", "1", "2014-05-07 19:00:02", " Perú Fan Fest 2014 en el C.C del Jockey Club, la fiebre del mundial está por comenzar", "Del 28 de junio al 12 julio, Perú Fan Fest 2014 en el C.C del Jockey Club, la fiebre del mundial está por comenzar y lo podrás celebrar en este gran evento familiar, informes e invitaciones a: informes@educadoresperu.com ", "<p style=\"text-align: justify;\">Disfruta de los mejores partidos del mundial,\nacompañado de tus pata, familiares, de alguien especial, y disfruta de la mejor\nmúsica, comida, espectáculos diversos, canchas sintéticas, guapas anfitrionas,\ndesfiles en ropa deportiva y bikinis, juegos recreativos para niños, y todo lo\nque puedas imaginar en este gran evento del 28 de junio al 12 julio, Perú Fan Fest 2014\nen el C.C del Jockey Club.</p>\n<p style=\"text-align: justify;\">La\nfiebre del mundial está por comenzar y lo podrás celebrar en este gran evento\nfamiliar, informes, auspicios e invitaciones&nbsp;a:\n<a href=\"mailto:informes@educadoresperu.com\">informes@educadoresperu.com</a></p>\n<p style=\"text-align: justify;\">&nbsp;</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("36", "2014-05-08 18:38:34", "2014-05-08 19:14:47", NULL, "1", "7", "2014-05-08 18:24:27", "Práctica de laboratorio: Reconocimiento de Biomoléculas.", "Utilizando diversos reactivos y materiales podremos reconocer glúcidos, carbohidratos, proteínas y pigmentos vegetales.", "<p style=\"text-align: center; \"><b><font color=\"#ff0000\"><u>Práctica de\nlaboratorio: Reconocimiento de Biomoléculas.</u></font></b></p>\n<p>Utilizando diversos\nreactivos y materiales podremos reconocer glúcidos, carbohidratos, proteínas y\npigmentos vegetales.</p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\">\n<ol>\n	<li>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\nUtilizando los reactivos Lugol, Fehling A, Fehling\nB y HCl podremos reconocer diversas biomoléculas orgánicas, como carbohidratos y\nglúcidos.</li>\n	<li>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\nUtilizando un mortero con un poco de alcohol\npodremos separar la clorofila y otros pigmentos de diversas hojas de diferentes\nplantas.</li>\n	<li>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\nUtilizando un mechero podremos identificar el\nolor de las proteínas, comparando los olores del huevo, carne, cabellos y uñas.&nbsp;</li>\n</ol>\n</blockquote>\n<p style=\"text-align: justify; \">Para completar\nla actividad deberá de responder las preguntas del <a href=\"http://profesorgamarra.blogspot.com/2014/05/practica-de-laboratorio-reconocimiento.html\">blog del profesor</a>, para ello\npuede utilizar los siguientes documentos como apoyo:</p>\n<ul><ul>\n	<ul>\n	<li><font color=\"#3366f0\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Ciencias%20NSG/Reconocimiento%20de%20Biomol%C3%A9culas%201.pdf\">Reconocimiento de Biomoléculas</a>.</font></li>\n	<li><font color=\"#3366f0\"><a href=\"https://dl.dropboxusercontent.com/u/49345689/Ciencias%20NSG/reconocimiento%20de%20glucidos.docx\">Reconocimiento de Glúcidos</a>.</font></li>\n</ul>\n	\n</ul>\n</ul>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p> </p>\n</blockquote>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("37", "2014-05-09 18:36:30", "2014-07-22 08:47:43", NULL, "1", "4", "2013-11-01 18:00:00", "La reprogramación en la obtención de células madre pluripotentes inducidas", "Debido a los problemas éticos que se han venido dando por el uso de embriones como fuente de células pluripotentes, se han desarrollado nuevas fuentes para obtener células con las mismas características", "<p style=\"text-align: justify; \">Debido a los problemas éticos que se han venido dando por el\nuso de embriones como fuente de células pluripotentes, se han desarrollado\nnuevas fuentes para obtener células con las mismas características. En esta\nrevisión se discuten algunos métodos de reprogramación que se han sido\nempleados por muchos investigadores alrededor del mundo, partiendo por la\ntrasferencia nuclear y posteriormente con el trabajo de Yamanaka quien empezó a\nusar la introducción de los cuatro factores de transcripción, Oct3 / 4, Sox2,\nKlf4 y c-Myc que origina con éxito la reprogramación de las células somáticas\nen células madre pluripotentes inducidas (iPSC), que poseen características\ngenómicas y fenotípicas de células madre embrionarias, además se describe\nalgunas desventajas que tienen estos métodos y los riesgos que involucran el\nuso del factor de transcripción c-Myc. A pesar de que queda mucho por mejorar\nen este campo, las células iPS muestran un tremendo potencial para la\ninvestigación y sus posibles aplicaciones terapéuticas en la medicina regenerativa.</p>\n<p>Para mayor información pueden revisar el Volumen 10, número\n1 de la Revista ECIPerú de Octubre del 2013.</p>\n<p><a href=\"https://dl.dropboxusercontent.com/u/49345689/Revista%20ECI/La%20reprogramaci%C3%B3n%20en%20la%20obtenci%C3%B3n%20de%20c%C3%A9lulas%20madre%20pluripotentes%20inducidas.pdf\">Descargar pdf el Volumen 10, número 1 de la Revista ECIPerú de\nOctubre del 2013</a>.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("38", "2014-05-09 19:40:15", "0000-00-00 00:00:00", NULL, "1", "4", "2013-05-09 19:00:00", "Ingeniería Extraterrestre", " ¿Qué tipo de ingeniería podrían poseer los extraterrestres?", "<p>&nbsp;¿Qué tipo de ingeniería podrían poseer los extraterrestres?. Descúbralo en el siguiente video:</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/1niQ80EsuTQ\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("39", "2014-05-10 23:00:06", "2014-05-29 22:19:53", NULL, "1", "8", "2014-05-10 22:47:01", "Concurso entradas dobles para el teatro: Tradiciones Peruanas de Ricardo Palma", "Si aún no la viste, no te pierdas esta oportunidad, la red de educadores: Educadoresperu sortea cinco entradas dobles para disfrutar de las tres últimas funciones de esta espectacular adaptación de la conocida directora Luna Espinoza y el Elenco Herman Herman, este viernes 16, sábado 17 y domingo 18 de mayo del 2014.", "<p style=\"text-align: justify;\"><strong>TRADICIONES DE RICARDO PALMA</strong>, Adaptación libre de Herman Sighuas Sandoval<br />Dirección: Luna Espinoza<br />Producción: Killa Producciones y Sandra Sighuas<br />Funciones: Viernes y sábados 8:00 p.m. / Domingos 7:00 p.m.<br />Hasta el 18 de mayo &nbsp; &nbsp;</p>\n<p style=\"text-align: justify;\">Si aún no la viste, no te pierdas esta oportunidad, la red\nde educadores: Educadoresperu sortea cinco entradas dobles para disfrutar de\nlas tres últimas funciones de esta espectacular adaptación de la conocida\ndirectora Luna Espinoza y el Elenco Herman Herman, este viernes 16, sábado 17 y\ndomingo 18 de mayo del 2014.</p>\n<p style=\"text-align: justify;\">Para participar solo debes ingresar al siguiente enlace, hacer\nun comentario sobre una tradición, la que más te agrade de entre todas la\nTradiciones Peruanas del gran Ricardo Palma, compartirlo con tus contactos vía\nfacebook y esperar los resultados del concurso a través de este medio y del\nfacebook de educadoresperu.</p>\n<p style=\"text-align: justify; \"><a href=\"https://www.facebook.com/photo.php?fbid=1403157506633177&amp;set=a.1403157439966517.1073741831.100008168233023&amp;type=3&amp;theater\">Enlace&nbsp;</a></p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("40", "2014-05-10 23:36:48", "2014-05-29 22:20:26", NULL, "1", "8", "2014-05-09 23:00:00", "TRADICIONES DE RICARDO PALMA, Adaptación libre de Herman Sighuas Sandoval", "TRADICIONES DE RICARDO PALMA, Adaptación libre de Herman Sighuas Sandoval\nDirección: Luna Espinoza\nProducción: Killa Producciones y Sandra Sighuas\nFunciones: Viernes y sábados 8:00 p.m. / Domingos 7:00 p.m.\nHasta el 18 de mayo  ", "<p><strong>TRADICIONES DE RICARDO PALMA</strong>, Adaptación libre de Herman Sighuas Sandoval<br />Dirección: Luna Espinoza<br />Producción: Killa Producciones y Sandra Sighuas<br />Funciones: Viernes y sábados 8:00 p.m. / Domingos 7:00 p.m.<br />Hasta el 18 de mayo &nbsp;</p>\n<p>Ricardo Palma (1833 –1919) fue un\nescritor romántico, costumbrista, tradicionista, periodista y político peruano,\nfamoso principalmente por sus relatos cortos de ficción histórica reunidos en\nel libro Tradiciones Peruanas. Las tradiciones teatralizadas en esta\noportunidad son: “Consolación”, “Al rincón quita calzón” y “Don Dimas de la\nTijereta”, a través de las cuales conoceremos su prosa y picardía de la Lima de\nantaño.</p>\n<p>Actúa el Elenco Herman Herman:\nTechi Cornejo, Rafael Dávila, Charo García, Marlon Zubiat, Janet Taboada, Luis\nEnrique Gastelú y Gerardo Vergara<br />\nDiseño de luces: Juan Rondón / Iluminación: Luis Julca</p>\n<p>Precios:<br />\nActivos y Cesantes del Sector Educación:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 6\nnuevos soles<br />\nNiños, estudiantes y jubilados:&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 15 nuevos\nsoles&nbsp;<br />\nPúblico General: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; 25 nuevos soles<br />\n<br />\nBOLETERIA: Centro Cultural CAFAE-SE</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("41", "2014-05-16 23:47:21", "2014-07-22 08:45:14", NULL, "1", "2", "2014-05-01 23:00:00", "Campaña: Dona un Libro", "Dona un libro, regalémosles un Buen Inicio de Clases, nosotros llegamos donde otros no llegarán, y lo hacemos impulsados por el deseo de regalarles una sonrisa.", "<p style=\"text-align: justify;\">Dona un libro, regalémosles un Buen Inicio de Clases,\nnosotros llegamos donde otros no llegarán, y lo hacemos impulsados por el deseo\nde regalarles una sonrisa.</p>\n<p style=\"text-align: justify;\">El Grupo Juvenil de Apoyo y Orientación Social Construyendo\nSonrisas (GJAOSCS), con el apoyo de la Re d de Educadoresperu (EP), realizan la\ncampaña: “Dona un Libro, regalémosles un Buen Inicio de Clases” , con el lema: “Nosotros\nllegamos donde otros no llegarán, y lo hacemos impulsados por el deseo de\nregalarles una sonrisa”. </p>\n<p style=\"text-align: justify;\">El GJAOSCS pretende llegar con sus donaciones a los lugares\ndonde los libros hacen falta, a los lugares donde las autoridades aun no\nbrindan los libros necesarios para el “Buen Inicio del Año Escolar”. Esta\ncampaña pretende sensibilizar a la población en busca del bienestar común del\npueblo y para el pueblo.</p>\n<p style=\"text-align: justify;\">Pueden colaborar comunicándose con nosotros:</p>\n<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p><span lang=\"EN-US\">•<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><!--[endif]-->E-mail\nGJAOSCS: <a href=\"mailto:gjaoscs@gmail.com\">gjaoscs@gmail.com</a></p>\n</blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail Educadoresperu: <a href=\"mailto:informes@educadoresperu.com\"><span lang=\"ES-PE\">informes@educadoresperu.com</span></a></p>\n</blockquote></blockquote>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("42", "2014-05-17 08:24:49", "2014-05-17 09:41:51", NULL, "1", "8", "2013-02-07 08:00:00", "Del maravilloso William Shakespeare: \"Sueño de una Noche de Verano\", bajo la dirección de Carlos Acosta", " La Escuela Nacional Superior de Arte Dramático, bajo la dirección de Carlos Acosta, nos presentan la obra del maravilloso William Shakespeare: \"Sueño de una Noche de Verano\", como parte de la Temporada ENSAD – 2012, el cual es un espectáculo para toda la familia, uno de esos espectáculos que nos permiten pasar un rato agradable con nuestros seres queridos, lejos de la rutina y malestar de la gran Lima.", "<p style=\"text-align: justify; \">El 2012 nos ha presentado un verano algo\nmisterioso y voluble, pero todos merecemos un sueño de una noche de verano, uno\nde esos sueños que nunca se olvidan, un sueño en la mejor compañía. Para todos\nlos amantes del teatro, los alumnos de cuarto año de la carrera profesional de\nactuación de la Escuela Nacional Superior de Arte Dramático, bajo la dirección\nde Carlos Acosta, nos presentan la obra del maravilloso William Shakespeare: \"Sueño\nde una Noche de Verano\", como parte de la Temporada ENSAD – 2012.</p>\n<p style=\"text-align: justify;\">Personalmente me gusto la obra, además no\npague entrada, y no lo hice porque el ingreso es libre, la obra se desarrolla\nen el frontis del teatro La Cabaña, en el Parque de la Exposición, en un mundo\nmágico de hadas, duendes y seres&nbsp;\nmísticos llenos de gracia y vigorosidad, en realidad deben verlo con sus\npropios ojos y gozar de su magia.</p>\n<p> </p>\n<div style=\"text-align: justify;\">Es un espectáculo para toda la familia, uno de\nesos espectáculos que nos permiten pasar un rato agradable con nuestros seres\nqueridos, lejos de la rutina y malestar de la gran Lima.</div>\n<div style=\"text-align: justify;\"><br /></div><p>\nFechas: Martes y Domingos de Enero y Febrero</p>\n<p>\nHora: 6pm<br />\nLugar: ENSAD - Av. Paseo de la República Cuadra 4 S/N Parque de la Exposición \"LA\nCABAÑA\" - Lima, Perú.</p>\n<!--[if !supportLineBreakNewLine]--><p> </p>\n<!--[endif]--><p> </p>\n<p style=\"text-align: right; \">César Gamarra D.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("43", "2014-05-17 09:16:41", "2014-07-22 08:50:10", NULL, "1", "8", "2012-02-04 08:00:00", "\"Un Busto al Cuerpo\", bajo la dirección de Daniel Dillon.", "Cristina 1 catedrática, tiene su amiga, Cristina 2 que quiere aumentarse el busto, a lo que ella se opone por considerar la cirugía estética como inefable; por si fuera poco su hija, Cristina 3 descubre la necesidad de experimentar con su propio cuerpo lo contrario.", "<p>En el 2011 se hablo mucho de la no violencia contra la\nmujer, sabemos que existen muchos tipos de violencia, es decir no solo la\nviolencia física, el 2012 nos trae una nueva visión sobre la dignidad de la\nmujer, la influencia de los medios de comunicación, el cuerpo perfecto, los\ncambios de una niña adolescente y algunas cosas más,&nbsp; pero no nos referimos a un evento de belleza\no a un nuevo talk show, nos referimos a uno de los artes mas humanos, El\nTeatro; las alumnas de cuarto año de la carrera profesional de actuación de la\nEscuela Nacional Superior de Arte Dramático, bajo la dirección de Daniel Dillon,\nnos presentan “Un Busto al Cuerpo”, como parte de la Temporada ENSAD – 2012.</p>\n<p>Personalmente me gustó la obra, además no pague entrada, y\nno lo hice porque el ingreso es libre para todos, &nbsp;la obra se desarrolla en el teatro La Cabaña,\nen el Parque de la Exposición, donde tres mujeres de nombre Cristina, una\ncatedrática, su hija y &nbsp;su amiga, tienen\ndiversos puntos de vista respecto a que una de ellas quiere aumentarse el\nbusto, contándoles un poco el desarrollo de la obra, Cristina, la catedrática,\nse opone por considerar la cirugía estética como inefable; pero su hija,\nCristina, descubre la necesidad de experimentar con su propio cuerpo lo\ncontrario. ¿Cómo actuaria usted frente a una situación similar?</p>\n<p>Es un espectáculo inolvidable, lejos de la rutina y\nmalestar de la gran Lima y hoy es su última función, la cola para el ingreso se\ninicia a las 7pm en la escalera del teatro, la obra inicia a las 7:30pm<br />\n<br />\nFecha: 08 de febrero de 2012<br />\nLugar: Teatro \"LA CABAÑA\" - Lima, Perú. Teatro de la Escuela Superior\nNacional de Arte Dramático, Escuela Nacional Superior de Arte Dramático - ENSAD\nAv. Paseo de la República Cuadra 4 s/n Parque de la Exposición, La Cabaña, Lima</p>\n<p>VIII Ciclo – Actuación</p>\n<p>Dirección:\nDaniel Dillon<br />\n<br />\nUN BUSTO AL CUERPO:<br />\nCristina 1 catedrática, tiene su amiga, Cristina 2 que quiere aumentarse el\nbusto, a lo que ella se opone por considerar la cirugía estética como inefable;\npor si fuera poco su hija, Cristina 3 descubre la necesidad de experimentar con\nsu propio cuerpo lo contrario.<br />\n<br />\nREPARTO:<br />\nCristina 1 : Yasmine Incháustegui<br />\nCristina 2: Lidia Mallqui<br />\nCristina 3: Roxanna López y Angie Rodriguez<br />\n<br />\nTemporada Enero - Febrero:<br />\n17,18,24,25,31 de enero - 01,07,08 febrero<br />\nIngreso es libre!!!</p>\n<p style=\"text-align: right; \">&nbsp;César Gamarra D.</p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("44", "2014-05-21 01:02:06", "0000-00-00 00:00:00", NULL, "1", "9", "2014-04-01 00:00:00", "Baladas del Momento", "Top 7\nDisfrute de las mejores baladas del momento.", "<p> </p>\n<p>Lista de Baladas del momento:</p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Manual – Paty Cantú</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/gY-uaDXTT0k\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p>&nbsp;· &nbsp; &nbsp; &nbsp; &nbsp; Si no te Hubiera Conocido - Luis Fonsi y Cristina Aguilera</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/yw2DFBpQKPE\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p>&nbsp; &nbsp;· &nbsp; &nbsp; &nbsp; &nbsp; Hoy Tengo Ganas de Ti - Alejandro Fernandez, Cristina Aguilera</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/Z81hsLIY1sQ\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Darte un Beso – Prince Royce</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/bdOXnTbyk0g\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->No es Cierto – Danna Paola, Noel Schajris</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/Q-N-nKbGfrA\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->&nbsp;Nuestro Amor Eterno - Luis Fonsi</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/uMQKMWHz4_4\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p>&nbsp; · &nbsp; &nbsp; &nbsp; &nbsp; Si Tú Supieras - Alejandro Fernandez</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/ElF_NuB3LHc\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("45", "2014-05-26 18:26:10", "2014-05-26 18:55:48", NULL, "1", "7", "2014-05-26 18:24:50", "Video 1º Secundaria", "Ver el video y resolver las preguntas del Blog del profesor mediante un comentario.", "<p><strong>Actividad Nº 01</strong></p>\n<p>Realice el cuestionario ubicado en el blog del profesor. El cuestionario es referente a la teoría de cuerdas y la forma como entendían el universo, Isaac Newton y Albert Einsteing.</p>\n<p>(<a href=\"http://profesorgamarra.blogspot.com/2014/05/video-1-secundaria-el-universo-elegante.html\">ir al blog</a>)</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("46", "2014-05-26 19:01:33", "2014-05-26 20:13:15", NULL, "1", "7", "2014-05-26 18:56:07", "Presentación del Informe de Laboratorio", "A continuación mostramos el formato como debe de presentarse el informe de laboratorio.", "<p><span>El informe de laboratorio se presentará a la semana siguiente del desarrollo de la práctica. A continuación mostramos el formato como se debe de presentar el informe de laboratorio:</span></p>\n<ul>\n	<li>Carátula</li>\n	<li>Introducción</li>\n	<li>Hoja de práctica desarrollada en clase.</li>\n	<li>Desarrollo del tema: Explicar detalladamente el procedimiento de todo lo realizado en el laboratorio durante la práctica y vincularlo con experiencias científicas previas, leyes, teorías, etc. También deberá colocar imágenes y/o fotos.</li>\n	<li>Conclusiones</li>\n	<li>Anexos</li>\n</ul>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("47", "2014-05-27 18:53:05", "2014-07-16 23:08:59", NULL, "1", "8", "2014-05-27 18:33:10", "Entrevista a Luna Espinoza - Directora del Elenco Herman Herman", "Las tradiciones de Ricardo Palma – Adaptación\nEntrevista a Luna Espinoza\nDirectora del Elenco Herman Herman.\n\nDemostrando gran sencillez y amor por su trabajo, la persona de Luna Espinoza conversa con nosotros y se refiere a su carrera, vocación y al significado y responsabilidad de ser la directora de un gran elenco, el Elenco Herman Herman.\n", "<p><span style=\"text-align: justify;\">Las tradiciones de Ricardo Palma – Adaptación</span></p>\n<div style=\"text-align: justify;\"><p>Entrevista a Luna Espinoza</p>\n<div style=\"text-align: justify;\">Directora del Elenco Herman Herman</div><div style=\"text-align: justify;\"><br /></div><div style=\"text-align: justify;\">Demostrando gran sencillez y amor por su trabajo, la persona de Luna Espinoza conversa con nosotros y se refiere a su carrera, vocación y al significado y responsabilidad de ser la directora de un gran elenco, el Elenco Herman Herman.</div><div style=\"text-align: justify;\"><br />\n<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/Lvf3AkBw73E\" frameborder=\"0\" allowfullscreen=\"\"></iframe></div><div style=\"text-align: justify;\"><br /></div><div style=\"text-align: justify;\"><br /></div><div style=\"text-align: justify;\">La entrevista se desarrollo de forma muy amena y sincera, puede observar\nla secuencia de la misma, en los siguientes enlaces:<br /></div><div>\n<p> </p>\n</div></div><p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("48", "2014-05-30 00:11:15", "2014-07-16 23:03:39", NULL, "1", "1", "2014-05-30 00:07:12", "Incendio en Mercado de Chancay", "Siendo las 00 horas, 07 minutos del día viernes 30 de mayo del 2014, damos a conocer la terrible noticia que desde hace media hora se ha producido un incendio en el mercado de Chancay.\nLas llamaradas se pueden ver desde diferentes puntos de la ciudad, esperamos no lleguen a mayores y que el fuego pueda ser apaciguado rápidamente por los bomberos\n", "<p>Siendo las 00 horas, 07 minutos del día viernes 30 de mayo\ndel 2014, damos a conocer la terrible noticia que desde hace media hora se ha producido\nun incendio en el mercado de Chancay.</p>\n<p>Las llamaradas se pueden ver desde diferentes puntos de la\nciudad, esperamos no lleguen a mayores y que el fuego pueda ser apaciguado\nrápidamente por los bomberos</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("49", "2014-05-30 01:08:14", "2014-06-19 00:52:21", NULL, "1", "1", "2014-05-30 00:36:40", "Corto Circuito genera Incendio en Chancay", "Alrededor de las 23 horas y 30 minutos del día jueves 29 de mayo se inició un incendio voraz dentro de las instalaciones del Mercado de la ciudad de Chancay.", "<p style=\"text-align: justify;\">Alrededor de las 23 horas y 30 minutos del día jueves 29 de\nmayo se inició un incendio voraz dentro de las instalaciones del Mercado de la\nciudad de Chancay, afectando principalmente la zona cercana a la calle 28 de Julio.</p>\n<p style=\"text-align: justify;\">A &nbsp;través de las redes\nsociales, los pobladores informan que las llamaradas se pueden ver desde\ndiferentes puntos de la ciudad, el siniestro se inicio por el corto circuito de\nun poste ubicado dentro del mercado de abastos, diversas unidades de bomberos\nde la provincia se encuentran luchando contra el fuego intenso, incluso se\nescuchan rumores refiriéndose a que algunas unidades de Lima también se\nencuentran en camino para brindar su apoyo.</p>\n<p style=\"text-align: center;\">\n<img id=\"newfot_file_file_45\" src=\"http://educadoresperu.com/imagenes_dir/newite_imas/2014/05/30/newite_1401430127_539x960_1.jpg\" /></p>\n<p> </p>\n<p style=\"text-align: justify;\">(<a href=\"https://www.facebook.com/profile.php?id=100008168233023&amp;sk=photos&amp;collection_token=100008168233023%3A2305272732%3A69&amp;set=a.1412099439072317.1073741833.100008168233023&amp;type=1\">Ver Fotos</a>)</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("50", "2014-06-04 22:54:59", "0000-00-00 00:00:00", NULL, "1", "10", "2014-06-04 22:54:23", "Higiene Bucal", "Recomendaciones para una Higiene Bucal adecuada", "<p> </p>\n<p>Recomendaciones para una Higiene Bucal adecuada:&nbsp;</p>\n<p> </p>\n<p style=\"text-align: center; \"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><param name=\"movie\" value=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http://vhss-d.oddcast.com/php/vhss_editors/getvoki/chsm=4f1d222b55f0d06d856e10a2bba85a6e%26sc=9969964\"><param name=\"quality\" value=\"high\"><param name=\"allowScriptAccess\" value=\"always\"><param name=\"width\" value=\"200\"><param name=\"height\" value=\"267\"><param name=\"allowNetworking\" value=\"all\"><param name=\"wmode\" value=\"transparent\"><param name=\"allowFullScreen\" value=\"true\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=4f1d222b55f0d06d856e10a2bba85a6e%26sc=9969964\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></object></p>\n<p> </p>\n<p> </p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("51", "2014-06-07 17:28:50", "2014-07-22 08:47:15", NULL, "1", "1", "2014-06-07 17:27:58", "Alquiler / Venta Caterpillar 329, para cualquier lugar del país.", "Alquiler / Venta Caterpillar 329\nAlquiler / Venta de Caterpillars 329, para cualquier lugar del país.\nInformes a: informes@educadoresperu.com o al RPC 992220832", "<p>Alquiler / Venta Caterpillar 329</p>\n<p>Alquiler / Venta de Caterpillars 329, para cualquier lugar del\npaís.</p>\n<p>Informes a: <a href=\"mailto:informes@gmail.com\">informes@educadoresperu.com</a>\no al RPC 992220832</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("52", "2014-06-10 23:59:23", "2014-07-16 23:23:29", NULL, "1", "1", "2014-05-19 23:00:00", "Juramentación de Fiscales Escolares en Colegio Nstra Sra de Guadalupe", "El nuevo fiscal de la nación, el Dr. Carlos Ramos Heredia (promoción G – 72), realizó la juramentación de los fiscales escolares durante el desarrollo de las actividades cívicas correspondientes al día lunes 19 de mayo del 2014.", "<p style=\"text-align: justify; \">El nuevo fiscal de la\nnación, el Dr. Carlos Ramos Heredia (promoción G – 72), realizó la\njuramentación de los fiscales escolares durante el desarrollo de las\nactividades cívicas correspondientes al día lunes 19 de mayo del 2014.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("53", "2014-06-13 00:53:36", "0000-00-00 00:00:00", NULL, "1", "11", "2014-06-13 00:49:28", "Inicio del Campeonato Mundial de Futbol 2014", "Un poco frío se inicia el campeonato mundial Brazil 2014", "<p style=\"text-align: center; \">&nbsp;</p>\n<p style=\"text-align: center; \"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><param name=\"movie\" value=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http://vhss-d.oddcast.com/php/vhss_editors/getvoki/chsm=90feaa4e58427c8a2f4b8f76f930c256%26sc=10002593\"><param name=\"quality\" value=\"high\"><param name=\"allowScriptAccess\" value=\"always\"><param name=\"width\" value=\"200\"><param name=\"height\" value=\"267\"><param name=\"allowNetworking\" value=\"all\"><param name=\"wmode\" value=\"transparent\"><param name=\"allowFullScreen\" value=\"true\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=90feaa4e58427c8a2f4b8f76f930c256%26sc=10002593\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></object></p>\n<p style=\"text-align: center;\">&nbsp;</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("54", "2014-06-18 23:46:05", "2014-06-18 23:52:57", NULL, "1", "7", "2014-06-18 23:42:40", "Historia de la capilla guadalupana", "Cumple 103  años\n\nLa histórica capilla de primer Colegio Nacional de la República de “Nuestra Señora de Guadalupe” cumple 103 años de fructífera vida evangélica, el sacro edificio fue declarado junto con el local del plantel patrimonio histórico y monumental de la nación según R.S.N. Nº 284 – 81 de Instituto Nacional de Cultura.", "<p>La histórica capilla de primer Colegio Nacional de la\nRepública de “Nuestra Señora de Guadalupe” cumple 103 años de fructífera vida\nevangélica, el sacro edificio fue declarado junto con el local del plantel patrimonio\nhistórico y monumental de la nación según R.S.N. Nº 284 – 81 de Instituto\nNacional de Cultura.</p>\n<p>En el altar se venera una hermosa imagen\nde la virgen de Guadalupe traída de Barcelona, España. En 1856 bajo cuya\nadvocación se consagro el histórico colegio, ya que la capilla como institución\nexiste desde la fundación&nbsp; del plantel en\n1840 esta funcionaba en el antiguo local de la Cascarilla, lugar el que fuera\ntraslada al nuevo local del colegio en 1907.</p>\n<p>Esta capilla se inauguró el 15 de Julio de 1911. </p>\n<p>La sagrada imagen fue coronada por su santidad el papa Paulo\nVI como patrona de la juventud estudiantil del Perú en apoteósica ceremonia\nrealizada en el Estadio Nacional el 20 de Noviembre de 1965 donde en\nrepresentación del sumo pontífice actuó el actual cardenal Juan Landázuri y se\nratificó por el estado peruano mediante el decreto supremo Nº 66 firmado por el\npresidente Belaunde.</p>\n<p>La capilla cuenta con exquisitos lienzos que representan a\nSanto Toribio de Mogrovejo, primer arzobispo de Lima, Santa Rosa de Lima, San\nLuis Gonzaga patrono de los estudiantes y San Martin de Porres, obras del\nlaureado artista peruano Juan Guillermo Samanez, quienes las pintara en un\nperiodo de 6 años siendo profesor de Arte Del Colegio<span style=\"font-size:12.0pt;line-height:115%\">.</span></p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("55", "2014-06-19 00:32:16", "0000-00-00 00:00:00", NULL, "1", "3", "2013-05-03 00:00:00", "DIRECTOR DE UGEL 03 SUPERVISA II.EE. DE SU JURISDICCIÓN", "Una serie de visitas inopinadas viene realizado el director de la UGEL 03, Lic. Marco Antonio Arriaga La Rosa, supervisando y monitoreando la labor del docente en el aula de clase.", "<p>Durante la mañana de hoy, 03 de Mayo del 2012, y\nacompañado de la jefa del Área de Gestión Pedagógica, Adela Rodríguez\nMontenegro y del especialista de AGP, Tito Aquino Aquino, recorrió las instalaciones\nde las institución educativa Nuestra Señora de la Visitación, lugar donde\nreciben clases los alumnos del colegio Nuestra Señora de Guadalupe, por motivo\nde refracciones en el colegio ubicado en la avenida Alfonso Ugarte.</p>\n<p>Los funcionarios ingresaron a las aulas y escucharon\nlas clases desarrolladas por los docentes. Luego revisaron las unidades y\nsesiones de aprendizaje elaborados por los maestros. La supervisión concluyó\ncon el llenado de una ficha de monitoreo que ha sido elaborado por AGP de la\nUGEL 03.</p>\n<p>Posteriormente, las autoridades conversaron con los\nalumnos más representativos para enterarse de sus inquietudes y de los\nproblemas, que según ellos, aquejan a sus respectivos centros educativos.</p>\n<p>El recorrido a las Instituciones Educativas se\nseguirá realizando en los próximos días.</p>\n<p> </p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("56", "2014-06-22 23:45:38", "2014-07-16 23:07:28", NULL, "1", "11", "2014-06-20 23:00:00", "La Patadita (publicación 1)", "Sobre el Mundial Brasil 2014.\nMenciono que nuestro País no participa de esta cita mundialista, los motivos son muchos, los cuales citaremos en otra nota, pero mas allá de ese tema que no es secundario, este Mundial nos muestra la alegría de nuestro continente, nos ayuda a conocernos a nosotros mismos, a mejorar los lazos familiares, ya que todos almuerzan viendo el mundial y por ende disfrutándolo, y esos estos detalles que tiene el futbol que le dan una belleza inigualable con respecto a otros deportes.", "<p style=\"text-align: justify;\">Quién les escribe, es Director\nTécnico de Futbol, con 9 años trabajando en este lindo deporte que mueve a todo\nel Mundo, el Futbol, y si, seguramente dirán, son 9 años, que podrían ser toda\nuna vida, pero que en este deporte, aunque ustedes no lo crean, apenas estoy en\nel noveno mes comparándolo con un ser humano por nacer. Y es que normalmente los\nentrenadores, antes de serlo, han sido futbolistas, de diversos niveles, en mi\ncaso, apenas jugador de fulbito en mi barrio, pero si, me arriesgue a tomar la\ncarrera, y cada día que pasa, la amo más.</p>\n<p style=\"text-align: justify;\">Futbol, deporte colectivo, donde\njuegan 11 contra 11 y gana el que mete más goles en el arco contrario. aparentemente fácil, pero en realidad no lo es señores. Hay infinidad de DETALLES que están detrás de un juego,\ntanto así que por organizarse el último mundial, se han dado muchísimos reclamos\ny protestas en un Brasil económicamente golpeado, y es que para albergar un\ncompromiso de tremenda envergadura, se necesitan infinidad de cosas.</p>\n<p style=\"text-align: justify;\">Pare empezar, en un equipo que\nparticipa en un campeonato de liga interna, se debe tener presupuesto para pagar\nentrenador, preparador físico, asistentes, delegados, jugadores, pagos de\ncarnet, de árbitros, de indumentaria, sumado a que hay lesiones y deben\ntratarse entre días, semanas o meses. Esto trasladándose a un campeonato donde\njuegan las mejores selecciones del Mundo, lógicamente que acarrea tremendos\ngastos para el país que los alberga, y eso por eso el reclamo de la gente. Eso\nes visto desde un punto de vista económico; pero del punto de vista emocional,\nno hay mayor alegría para una persona, que gritar un GOL, es cierto, nuestro\npaís no participa en este Mundial, pero no creo equivocarme, todos ustedes que\nestán leyendo estas palabras, han gritado un gol de Costa Rica, o de Uruguay, o\nde cualquier otra selección, y es que este deporte, es realmente muy emotivo.</p>\n<p style=\"text-align: justify;\">Menciono que nuestro País no\nparticipa de esta cita mundialista, los motivos son muchos, los cuales citaremos\nen otra nota, pero mas allá de ese tema que no es secundario, este Mundial nos\nmuestra la alegría de nuestro continente, nos ayuda a conocernos a nosotros\nmismos, a mejorar los lazos familiares, ya que todos almuerzan viendo el\nmundial y por ende disfrutándolo, y esos estos detalles que tiene el futbol que\nle dan una belleza inigualable con respecto a otros deportes.</p>\n<p style=\"text-align: right;\">&nbsp;Autor: Mauro Daniel Portales Vargas.</p>\n<p> </p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("57", "2014-06-24 22:46:59", "2014-07-16 23:06:56", NULL, "1", "1", "2014-06-24 22:40:26", "Gran inauguración Perú Fan Fest Brasil 2014", "Éste domingo 29 de Junio se inaugura el  Perú Fan Fest Brasil 2014, por única fecha el ingreso es libre, acérquese y disfrute con toda su familia y amigos de un agradable espectáculo.", "<p>Éste domingo 29 de Junio se inaugura el&nbsp;Perú Fan Fest Brasil 2014, por única fecha el ingreso es libre, acérquese y disfrute con toda su familia y amigos de un agradable espectáculo. (<a href=\"https://www.facebook.com/photo.php?v=1444264042490586&amp;fref=nf\">Ver Video</a>)&nbsp;</p>\n<p>Seguridad garantizada.&nbsp;</p>\n<p>Le comunicamos que también puede Ingresar al facebook de Educadores Perú y participar del concurso por dos entradas al Perú Fan Fest Brasil 2014.</p>\n<p>(<a href=\"https://www.facebook.com/photo.php?fbid=1425152227767038&amp;set=a.1403157439966517.1073741831.100008168233023&amp;type=1&amp;theater\">Participar del concurso</a>)</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("58", "2014-06-24 23:15:22", "0000-00-00 00:00:00", NULL, "1", "11", "2014-06-24 23:14:27", "Éste domingo 29 de Junio se inaugura el Perú Fan Fest Brasil 2014", "Éste domingo 29 de Junio se inaugura el Perú Fan Fest Brasil 2014, por única fecha el ingreso es libre, acérquese y disfrute con toda su familia y amigos de un agradable espectáculo", "<p style=\"text-align: justify; \">Éste domingo 29 de Junio se inaugura el&nbsp;Perú Fan Fest Brasil 2014, por única fecha el ingreso es libre, acérquese y disfrute con toda su familia y amigos de un agradable espectáculo. (<a href=\"https://www.facebook.com/photo.php?v=1444264042490586&amp;fref=nf\">Ver Video</a>)&nbsp;</p>\n<p>Seguridad garantizada.&nbsp;</p>\n<p>Le comunicamos que también puede Ingresar al facebook de Educadores Perú y participar del concurso por dos entradas al Perú Fan Fest Brasil 2014.</p>\n<p>(<a href=\"https://www.facebook.com/photo.php?fbid=1425152227767038&amp;set=a.1403157439966517.1073741831.100008168233023&amp;type=1&amp;theater\">Participar del concurso</a>)</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("59", "2014-06-26 23:48:44", "0000-00-00 00:00:00", NULL, "1", "7", "2014-06-24 23:00:00", "Escuela de Padres mes de Junio", "Comunicado: Los días jueves 26 y viernes 27 de junio a las 4pm, se llevará a cabo la segunda Escuela para Padres en el auditorio del colegio", "<p style=\"text-align: justify;\">Comunicado: Los días jueves 26 y viernes 27 de junio a las 4pm, se\nllevará a cabo la segunda Escuela para Padres en el auditorio del colegio, donde\nse expondrán los siguientes temas:</p>\n\n<ul>\n	<li>\"Buena Nutrición para Nuestros Hijos\" a cargo del doctor Manuel\nTorres. (Hospital del Niño).</li>\n	<li>\"Comprensión comunicativa con nuestros hijos\" a\ncargo del doctor Luis Alberto canales y el periodista Noel Lara.</li>\n</ul>\n<p> </p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("60", "2014-06-29 22:23:52", "2014-08-21 23:43:32", NULL, "1", "12", "2014-06-29 22:21:44", "Cerebro: Brain Anatomy and Functions", "Anatomía y funciones del cerebro humano", "<p style=\"text-align: center;\"><span id=\"INSERTION_MARKER\"><strong><span style=\"text-decoration: underline;\">Anatomía y funciones del cerebro humano</span></strong></span></p>\n<p style=\"text-align: center; \">&nbsp;<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/HVGlfcP3ATI\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("61", "2014-07-11 13:57:15", "2014-07-16 23:39:53", NULL, "1", "1", "2014-07-11 13:56:13", "Elecciones en el Colegio de Profesores del Perú", "El domingo 13 de julio se realizarán las Elecciones de renovación del decano y juntas directivas regionales.", "<p style=\"text-align: justify;\">El domingo 13 de julio se realizarán\nlas Elecciones de renovación del decano y juntas directivas regionales.</p>\n<p style=\"text-align: justify;\">Se comunica a los educadores\nprofesionales, miembros del colegio de profesores de Lima Metropolitana, lo\nsiguiente:</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]--><span style=\"font-size:10.0pt;line-height:115%;\">1.<span style=\"font-size: 7pt; line-height: normal; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:10.0pt;line-height:115%;\">El 13 de Julio del 2014, se realizarán las\nvotaciones para renovar las Juntas Directivas de 19 Colegios Regionales del\npaís, entre ellos el de Lima Metropolitana.</span></p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]--><span style=\"font-size:10.0pt;line-height:115%;\">2.<span style=\"font-size: 7pt; line-height: normal; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:10.0pt;line-height:115%;\">La base legal de la convocatoria es el Art. 1º\nde la Ley Nº 25231, modificada por ley Nº 28198 y la 1º Disposición\nComplementaria del Estatuto del Colegio de Profesores del Perú, aprobado con\nD.S. Nº 017-2014-ED</span></p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]--><span style=\"font-size:10.0pt;line-height:115%;\">3.<span style=\"font-size: 7pt; line-height: normal; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:10.0pt;line-height:115%;\">De conformidad con el Art.3º del Reglamento de\nElecciones del Colegio de Profesores del Perú, “tienen derecho a voto todos los\nprofesores que figuran en el Padrón electoral confeccionado sobre la base de\ndatos de docentes incorporados al Colegio de Profesores del Perú”</span></p>\n<p style=\"text-align: justify;\">Se recuerda a los profesores\npertenecientes a la UGEL 03, Sector 02 del Cercado de Lima, que el local de\nvotación está ubicado en la cuadra2 de la Av. Colonial. (I.E. Sagrado Corazón\nde Jesús)</p>\n<p style=\"text-align: center; \"><strong><span style=\"text-decoration: underline;\">LOCALES DE VOTACIÓN</span></strong></p>\n<p style=\"text-align: center; \"><strong><span style=\"text-decoration: underline;\"><br /></span></strong></p>\n<p>UGEL 01 <span style=\"font-size: 10pt; border: 1pt none windowtext; padding: 0cm;\">&nbsp;–\n&nbsp;SJM</span></p>\n<p>I.E.P.&nbsp;MI&nbsp;PEQUEÑO&nbsp;HOGAR&nbsp;CALLE&nbsp;J.G.&nbsp;CHARRIARSE&nbsp;437</p>\n<p>(PARQUE VERDE &nbsp;– &nbsp;SJM)</p>\n<p> </p>\n<p>UGEL 02 <span style=\"font-size: 10pt; border: 1pt none windowtext; padding: 0cm;\">–<span style=\"letter-spacing:-.75pt;\">&nbsp;RÍMAC</span></span></p>\n<p>I.E.&nbsp;ROSA&nbsp;MERINO&nbsp;N°&nbsp;2099&nbsp;AV.&nbsp;ALCÁZAR&nbsp;351</p>\n<p>FRENTE AL EX\nCINE&nbsp;MADRID</p>\n<p> </p>\n<p>UGEL 03 - LIMA</p>\n<p>I.E. SAGRADO CORAZÓN DEJESUS&nbsp;CDRA.&nbsp;2&nbsp;AV.&nbsp;COLONIAL&nbsp;262</p>\n<p>PARQUE UNIÓN</p>\n<p> </p>\n<p>UGEL04 - COMAS</p>\n<p>I.E. ESTADOS UNIDOSAV. EL MAESTRO PERUANOS/N&nbsp;–&nbsp;COMAS</p>\n<p>(COSTADO DE L AUGEL 04)</p>\n<p> </p>\n<p>UGEL 05<span style=\"font-size: 10pt; border: 1pt none windowtext; padding: 0cm;\">– SJL</span></p>\n<p>LOCAL SELECCIONADOAV. PRÓCERES DE LAINDEPENDENCIA 3068</p>\n<p>(FRENTE A EDELNOR)</p>\n<p> </p>\n<p>UGEL 06<span style=\"font-size: 10pt; border: 1pt none windowtext; padding: 0cm;\">&nbsp;–\nATE VITARTE</span></p>\n<p>PLAZA DE ARMAS ATE</p>\n<p>(FRENTE A LA I.E. EDELMIRADEL PANDO)CARRETERA CENTRAL KM 7.5<span style=\"font-size: 10pt; border: 1pt none windowtext; padding: 0cm;\">ATE</span></p>\n<p> </p>\n<p>UGEL 07<span style=\"font-size: 10pt; border: 1pt none windowtext; padding: 0cm;\">&nbsp;–&nbsp;SAN BORJA</span></p>\n<p>I.E.&nbsp;6044&nbsp;JORGE&nbsp;CHÁVEZ&nbsp;AV.&nbsp;GRAU&nbsp;N°&nbsp;500</p>\n<p>SANTIAGO DE SURCO</p>\n<p> </p>\n<p>DRELM</p>\n<p>LOCAL&nbsp;SELECCIONADO&nbsp;AV.&nbsp;PASEO&nbsp;COLÓN&nbsp;N°&nbsp;372</p>\n<p>LIMA</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("62", "2014-07-13 22:18:32", "2014-07-22 08:43:11", NULL, "1", "3", "2014-07-01 22:00:00", "Profesores del Sector III de la UGEL 03 no tendrán Asueto por el Día del Maestro", NULL, "<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("63", "2014-07-13 22:41:29", "2014-07-13 22:44:25", NULL, "1", "13", "2013-06-01 22:00:00", "Junio 2011", "Junio es para algunos medios de comunicación un mes de dudas y esperanzas, al parecer muchos no desean que llegue Julio.", "<p style=\"text-align: justify;\">Junio amanece hoy con cielo nublado, algo de frio y\nel ya clásico bochorno limeño generado por la contaminación por gases de\ninvernadero y monóxidos desprendidos de vehículos viejos y/o en mal estado;\nfrente a este clima, ya tan familiar para nosotros, Nilo Peñalosa nos sugiere\nelegantes prendas para vestir en el desfile por inauguración de la tienda\nperuana Topytop en el Centro Comercial Plaza Norte, el pasado Viernes 10, el\ncual conto con la presencia de conocidos modelos y algunos medios de la prensa.\nJunio es también un mes muy deportivo, el Jueves 16 continuaremos alentando a\nnuestra Selección Peruana de Vóley, también continúan los eventos de\nStrikeforce y UFC, para todos los amantes del deporte de contacto, iniciando\nJulio con un festival de artes marciales donde competirán seleccionados de Perú\ny Chile, los detalles los tendremos a disposición en nuestra sección deportiva.</p>\n<p style=\"text-align: justify;\">Junio\nes para algunos medios de comunicación un mes de dudas y esperanzas, al parecer\nmuchos no desean que llegue Julio, por mi parte espero con ansias el “XVIII\nMartial Art Festival” y claro las ceremonias correspondientes a 28 de Julio. El\npasado fin de semana se noto cierta angustia en los medios locales, con\nentrevistas a personas de asentamientos humanos marginales, la mayoría de\nentrevistas fue a personas que estaban en contra del electo presidente Ollanta\nHumala, mencionaron también que es imposible que el precio del gas llegue a 12\nsoles y entre otras cosas, como el posible terremoto que sucederá algún día en\nla ciudad de Lima, alguien mencionó que en Perú lo que falta no es dinero, solo\nque sobran malos funcionarios haciendo notar que se habían devuelto algunos\nmiles de soles por falta de proyectos. Sin embargo ninguno recordó que el 5 de\njunio se cumplió un año más de lo acontecido en de Bagua en el 2009, por\ncoincidencias de la vida, el año pasado 5 de junio fue sábado y se decretó que\ncada primer sábado de Junio se celebraría el día del ron en Perú, este año el\nprimer sábado fue 4 de junio pero no recordamos una celebración tan emotiva\ncomo la del año pasado; en junio hace algunos años se suscitó un acontecimiento\nimpactante en el pueblo de Huanta, producto de lo cual existe ese bonito\nHuayno: Flor de Retama; los hechos a que se refiere la canción sucedieron el 22\nde junio se recuerda que en 1969 el pueblo de﻿ Huanta - Ayacucho se rebeló\ncontra el Gobierno de la Fuerza Armada que dirigía el general Juan Velasco\nAlvarado debido a la dación del Decreto Supremo 006-69 que restringía la\ngratuidad de la educación primaria, secundaria y técnica. EL autor del huayno\n\"Flor de Retama\" hace hincapié que esta inspiración está dada en una\népoca en que las luchas de los pueblos eran reivindicativas; esperemos que los\ndocentes de los prestigiosos centros educativos privados del país generen\nconciencia moral en sus estudiantes y no sólo les inculquen miedos absurdos\ncomo el uniforme único escolar o la misma marca de lápices y lapiceros para\ntodos a partir del 28 de Julio, la labor docente es mejorar la educación de los\neducandos y prepararlos para ser personas de bien y útiles para la sociedad,\ncon amor a la patria, no solo amor a las vanidades de la vida, colegas docentes\nevitemos más respuestas fuera de lugar sobre los héroes y personajes ilustres\nde nuestro país, las universidades particulares son las mejores en\ninfraestructura y acceso a tecnologías, pero que sean también las mejores en\nconciencia moral, cultura general y patriotismo. Compatriotas Peruanos\nesperemos un buen gobierno a partir de 28 de Julio, y si no lo es, el pueblo\nque lo apoyo en marchas en la plaza dos de mayo, los universitarios, los medios\nde comunicación saldremos a protestar, pero no formemos parte del montón que\nsigue a unos cuantos como ovejitas que no tienen conciencia para elegir otro\ncamino, no formemos parte de la prensa amarilla, interesémonos más por ciencia\ny tecnología y menos por farándula y telenovelas que solo distraen nuestra\nmente de la realidad. Saludo de manera muy personal al Dr. Modesto Montoya por\nsu ardua labor científica, esperemos que le den un mayor espacio televisivo no\nsolo en el canal del Estado sino en otros varios canales y tengamos confianza\nque se cumplirán las propuestas planteadas en el Encuentro Científico\nInternacional de Verano (ECI 2011V). &nbsp; &nbsp;</p>\n<p> </p>\n<div style=\"text-align: right;\">César Gamarra Dulanto</div><div style=\"text-align: right;\">(Para el diario virtual Perú Demócrata)&nbsp;</div><p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("64", "2014-07-13 22:53:47", "2014-07-22 08:42:17", NULL, "1", "13", "2014-07-13 22:51:36", "08 de Julio del 2014 Gracias por la \"Grati\"", "Sería interesante suponer como podría vivir un congresista ganando solo lo equivalente a un sueldo mínimo (S/. 750 según ley)", "<p style=\"text-align: justify; \">Amanece el 08 de Julio y lo primero que veo en la pantalla\ndel computador es la gran noticia, “los trabajadores recibirán gratificación\nmás 9% adicional por Fiestas Patrias”; lo que significa otra mentada de madre a\nla pobreza; mientras que un congresista por Fiestas Patrias recibirá alrededor\nde S/.60 000 (sesenta mil nuevos soles), entre otros, algunos trabajadores\npúblicos recibirán alrededor de S/.500 (quinientos nuevos soles). Sería interesante\nsuponer como podría vivir un Ministro de Estado ganando sólo lo equivalente a un sueldo\nmínimo (S/. 750 según ley), siguiendo con las matemáticas, un empleado normal,\ncomún y silvestre podría vivir tranquilamente, por un año, con el sueldo de un ministro,\nen doce meses podría gastar S/.24 000, es decir S/.2 000 por mes, y le sobrarían\nS/. 6 000 que ahorraría para gastos en caso de enfermedad por ejemplo, y\nvanidad, pues también tiene derecho de salir de paseo con su familia en un\nferiado largo cuando todo sube de precio y es más caro hasta en un 90%, pero\ntodo esto es solo una idea, un apéndice a las ideas que podemos tener\ndiariamente, un Apéndice Controversial.</p>\n<p style=\"text-align: right;\">César Gamarra Dulanto</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("65", "2014-07-13 23:53:39", "2014-07-22 08:41:53", NULL, "1", "3", "2014-07-13 23:49:46", "Representación gráfica de la TV Peruana", "El aporte que los programas de televisión como \"Esto es Guerra\", \"Combate\", \"Bienvenida la Tarde: la competencia\", \"Calle 7\" y otros dan al desarrollo y salud mental de los niños.", "<div style=\"text-align: justify;\">El aporte que los programas de televisión como \"Esto es Guerra\", \"Combate\", \"Bienvenida la Tarde: la competencia\", \"Calle 7\" y otros dan al desarrollo y salud mental de los niños.</div><div style=\"text-align: justify;\"><br /></div><p> </p>\n<div style=\"text-align: justify;\">Recuerdo que hace más un año, un profesor nos enseño que las personas tenemos la necesidad de materializar lo que vemos y deseamos vivir: LA EXPERIENCIA de los productos que mantienen la televisión; saber qué se siente utilizarlo, ser parte de ello. En este caso, \"Esto es Guerra\" se ha convertido en la EXPERIENCIA favorita de los niños, y eso es lo que quieren vivir y experimentar por encima de otras cosas junto a la familia. La televisión como gran Psicosocial.</div><p> </p>\n<p><span data-reactid=\".b.1:3:1:$comment1438866503062277_1438866736395587:0.0.$right.0.$left.0.0.1:$comment-body.0.$end:0:$8:0\"><br /></span></p>\n<p><span data-reactid=\".b.1:3:1:$comment1438866503062277_1438866736395587:0.0.$right.0.$left.0.0.1:$comment-body.0.$end:0:$8:0\"><br /></span></p>\n<div style=\"text-align: right; \"><span data-reactid=\".b.1:3:1:$comment1438866503062277_1438866736395587:0.0.$right.0.$left.0.0.1:$comment-body.0.$end:0:$8:0\">Angela Ccanto Buendia</span><p> </p>\n</div>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("66", "2014-07-14 00:12:13", "2014-07-22 08:51:30", NULL, "1", "3", "2014-06-11 00:00:00", "Se informan, se educan.", "La educación es la única forma de rebelarse ante tantas cortinas, acciones de amparo y triquiñuelas que los \"partidos políticos\" y sus caudillos presentan para mecer temas e investigaciones que los pueden hundir más de lo que están", "<p style=\"text-align: justify; \"><span style=\"font-size:10.0pt;line-height:115%;&quot;Helvetica&quot;,&quot;sans-serif&quot;;\ncolor:#333333\">Hoy, mientras\nregresaba a casa por la extensa avenida Arequipa, dos escolares subieron al bus\ny se pararon justo a mi lado - no habían asientos vacíos-, me llamó la atención\nsu conversación. Uno de ellos decía (a su estilo): \"Oe, pero Alan García\nes un Corruptaso, pe\', con eso del TLC, cuánta plata se habrá llevado\". Y\nel otro- con cara no tan crédula, decía: \"Pero, el TLC ni<span class=\"apple-converted-space\">&nbsp;cagando lo iba dejar\nir, si ese es su negocio\". No siempre uno se topa con escolares que\nconversen sobre esos temas y con esas ansias. Ellos se fueron hacia atrás y ya\nno pude escuchar nada. Me hizo pensar que la educación, y como lo he escuchado\nmuchas veces en clase, es la única forma de rebelarse ante tantas cortinas,\nacciones de amparo y triquiñuelas que los \"partidos políticos\" y sus\ncaudillos presentan para mecer temas e investigaciones que los pueden hundir\nmás de lo que están. ¡La educación es un acto de rebeldía!</span></span></p>\n<p style=\"text-align: right; \"><a href=\"https://www.facebook.com/angela.ccantobuendia?fref=photo\" data-hovercard=\"/ajax/hovercard/user.php?id=100001475407151\" aria-owns=\"js_11\" aria-haspopup=\"true\" id=\"js_12\">Angela Ccanto Buendia</a>&nbsp;<span style=\"font-size:10.0pt;line-height:115%;&quot;Helvetica&quot;,&quot;sans-serif&quot;;\ncolor:#333333\"><span class=\"apple-converted-space\"><br /></span></span></p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("67", "2014-07-16 23:49:58", "2014-07-16 23:50:27", NULL, "1", "8", "2014-07-13 23:00:00", "Este fin de semana por cierre de temporada de ACHIKÉE", "Por fin de temporada, la red de Educadores Perú sortea un pase doble para el sábado 19 y uno para el domingo 20, sólo deberá darle “Me Gusta” a esta publicación y compartirla vía facebook.", "<p style=\"text-align: justify;\">Este fin de semana por cierre de temporada de ACHIKÉE en el teatro del\nCentro Cultural CAFAE, se realizaran las dos últimas funciones, con una\npromoción exclusiva, el Sábado 19&nbsp; y el\ndomingo 20 a las 5 p.m los niños y los adultos pagan S/15.00 por entrada; para\nacceder a esta promoción deberán hacer sus reservas a al correo: <a href=\"mailto:palosanto_tc@yahoo.com\">palosanto_tc@yahoo.com</a> y llegar al\nCAFAE por lo menos 20 minutos antes de la función. Esta promoción sólo es\nválida en la Boletería del teatro.</p>\n<p style=\"text-align: justify; \">Por fin de temporada, la red de Educadores Perú sortea un pase doble para\nel sábado 19 y uno para el domingo 20, sólo deberá darle “Me Gusta” a esta publicación\ny compartirla vía facebook.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("68", "2014-07-17 00:01:52", "2014-07-22 08:41:28", NULL, "1", "4", "2014-07-17 00:00:16", "El Cerval (Leptailurus serval)", "El Cerval (Leptailurus serval) es una de las especies en los félidos, fue registrado por Schreber en 1776. Pertenece al grupo de los vertebrados con mandíbulas, carnívoros, poseen un cuerpo con simetría bilateral con respecto al plano sagital.", "<p style=\"text-align: center; \">El Cerval (Leptailurus serval)</p>\n<p><span style=\"text-align: justify;\">El Cerval (Leptailurus serval) es una de las especies en los félidos.\nEsta especie se asigna a los felinos, subfamilia Felinae, en la familia\nFelidae. Fue registrado por Schreber en 1776.</span></p>\n<p style=\"text-align: justify; \">Es natural del África. Su distribución natural comprende el norte del\ncontinente, en Argelia, Túnez y Marruecos, y gran parte del resto del\ncontinente al sur y este del desierto de Sahara, desde Senegal hasta Somalia en\nel norte, continuando su presencia hacia el sur, donde el hábitat lo permite,\nhasta Sudáfrica. En algunas partes de su distribución natural ha sido\nexterminado. Habita en prácticamente todo tipo de sabana donde haya agua.</p>\n<p style=\"text-align: justify;\">A este felino se le documenta desde el nivel del mar hasta elevaciones de\n3,000 metros sobre el nivel del mar. Es más activo durante la noche, pero\ntambién demuestra actividad durante el día.</p>\n<p style=\"text-align: justify;\">Como la mayoría de los otros félidos, es un animal que se mantiene\nsolo. Las madres permanecen con sus cachorros por cierto tiempo y durante el\ncelo las parejas están juntas por unos días, el resto del tiempo hacen una vida\nsolitaria.</p>\n<p style=\"text-align: justify;\">Las madres Cerval &nbsp;tienen de uno a\ntres cachorros, pueden ser hasta cinco. Es posible que críen dos veces al año.\nEl período de gestación es de unos setenta y cinco días.</p>\n<p style=\"text-align: justify;\">En cautiverio han demostrado una longevidad de más de diecinueve años.</p>\n<p style=\"text-align: justify;\">Se alimenta de mamíferos pequeños. Complementa su dieta con mamíferos\nmedianos, aves, reptiles, anfibios e invertebrados.</p>\n<p style=\"text-align: justify;\">Los adultos entre la cabeza y el cuerpo pueden alcanzar 1.0 metro de\nlongitud, más la cola de unos 45 cm. Puede lograr un peso máximo de 19\nKilogramos, aunque usualmente es de 9 a 12 Kilogramos.</p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("69", "2014-07-17 00:22:30", "0000-00-00 00:00:00", NULL, "1", "14", "2014-05-30 00:00:00", "¡Queremos y exigimos viajar en un bus, caminar tranquilas por la calle sin que nos molesten!", " No te quedes callada. Magaly no lo hizo, y ese es un ejemplo. ", "<p style=\"text-align: justify; \">No soy feminista, porque considero que tanto varón como\nmujer merecen el mismo respeto y todo acto de violencia o acoso debe ser denunciado\nen ambas partes. Sin embargo, lo sucedido a Magaly Solier es el pan del día a\ndía en nuestra sociedad, y esto suena más porque ella es una figura pública;\npero pasa a diario, cada hora. Y lo más lamentable es que muchas mujeres por\nvergüenza no DENUNCIAMOS, por falta de carácter y valentía no ponemos en su\nsitio a esos desubicados que creen poder meter la mano o acosar con la mirada\nsin consecuencias. He sido víctima de esos acosos en el bus y en la calle- y lo\npeor que podemos hacer es quedarnos calladitas como si las culpables fuésemos\nnosotras-,y lo mejor que he podido hacer es desenmascarar a esos mal educados\ndelante de todos y buscar a un policía en caso haya uno cerca. Es parte de la\neducación en nuestro país que las mujeres actúen ante estos casos, nuestra\nintegridad se respeta: tú, mujer, debes hacerla respetar. No te quedes callada.\nMagaly no lo hizo, y ese es un ejemplo.&nbsp;</p>\n<h5 style=\"text-align: right; \"><span data-ft=\"{&quot;tn&quot;:&quot;;&quot;}\"><a href=\"https://www.facebook.com/angela.ccantobuendia?hc_location=timeline\" data-hovercard=\"/ajax/hovercard/user.php?id=100001475407151&amp;extragetparams=%7B%22hc_location%22%3A%22timeline%22%7D\" aria-owns=\"js_201\" aria-haspopup=\"true\" id=\"js_204\">Angela Ccanto Buendia</a></span></h5><p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("70", "2014-07-17 00:35:22", "2014-07-22 08:40:19", NULL, "1", "14", "2014-07-17 00:18:50", "Muy pronto en TV nacional se estrenará la mini serie:\" Edita Guerrero, el ángel del pueblo\"", "Edita Guerrero (Corazón Serrano), el caso favorito de la policía, el Poder Judicial, Los noticiarios, Milagros Leiva y los canales de televisión, en especial Frecuencia Latina... Una buena cortina de humo. Ahora se viene el caso Myriam Fefer...Con todo!", "<p>Edita Guerrero (Corazón Serrano), el caso favorito de la\npolicía, el Poder Judicial, Los noticiarios, Milagros Leiva y los canales de\ntelevisión, en especial Frecuencia Latina... Una buena cortina de humo. Ahora\nse viene el caso Myriam Fefer...Con todo!</p>\n<p style=\"text-align: right; \">Angela Ccanto Buendia</p>\n<p> </p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("71", "2014-07-17 00:57:47", "0000-00-00 00:00:00", NULL, "1", "1", "2014-07-15 00:00:00", "103 años de la Capilla del PCNP Nuestra Señora de Guadalupe", "Hoy la Capilla Del PCNP Nuestra Señora de Guadalupe cumple 103 Años de su Fundación desde 1911, época desde la cual cuida y alberga la fe de todos los guadalupanos.", "<p style=\"text-align: justify;\">Hoy la Capilla del PCNP Nuestra Señora de Guadalupe cumple 103 Años de su Fundación desde 1911, época desde la cual cuida y alberga la fe de todos los guadalupanos.</p>\n<p style=\"text-align: justify;\">La capilla de la institución se mantiene preservada a pesar del paso de los años. El objetivo de su creación fue el de velar por nuestra Santa Madre la Virgen de Guadalupe, el guiar los pasos de los hermanos guadalupanos Generación tras Generación.</p>\n<p style=\"text-align: justify; \">Felicitaciones al equipo de profesores de Religión por su esfuerzo de mantener visible para la juventud guadalupana la fe por Dios y nuestra Madre Santísima.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("74", "2014-08-06 17:05:00", "2014-08-06 17:58:26", NULL, "1", "14", "2014-08-02 17:00:00", "Obligan a los trabajadores independientes a aportar a las AFP. ¿Y los más de 700 mil peruanos afectados? ", "¿Hay alguna duda de que tenemos un país vendido al mejor postor?\nEn realidad yo no le veo el lado de que si es mejor o peor algo. El hecho fáctico que sucede en estos momentos es esa ley irregular y mercenaria que el gobierno y el congreso han sacado a delante: el robo a los bolsillos de los peruanos. En tal caso, algo podría resultar \"mejor\". O podría ser que nos estamos acomodando.", "<p>¿Hay alguna duda de que tenemos un país vendido al mejor postor?</p>\n<p style=\"text-align: justify;\">Una de las irregularidades más grandes aprobadas por el Congreso de la\nRepública (Comisión de Protección al Consumidor) y una ley presentada por el\nGobierno: Jaime Delgado, presidente de la Comisión de Protección al Consumidor,\nMaría Solorzano, José Luna, Victor Crisólogo, Agustìn Molina, Hernan de la\nTorre, y otros personajes más que actuaron tácitamente, pero empujaron el\ncarrito de asalto al bolsillo de los peruanos: Luciana León, Fredy Otárola,\nCarmen Omonte y otros: Daniel Abugatas, Martín Rivas, Teófilo Gamara,Victor\nIsla, Renan Espinoza y más.</p>\n<p style=\"text-align: justify;\">En una investigación presentada en IDL-Reporteros se dio a conocer la\njugarreta con la cual actúan las empresas privadas de fondo de pensiones y\nganan dinero con los aportes de los trabajadores -dinero que se ganan con el\nsudor de su frente y estas empresas se la llevan fácil-. De los 30,5 millones\nde peruanos, 5.000.000 aportan al sistema privado de pensiones esperando\nrecibir los \"BENEFICIOS COMPLETOS\" de todo lo aportado ¡durante años!\nPero, no. Según la investigación, hasta el 50% de lo aportado por el trabajador\nno sería devuelto al mismo, por qué, porque la fórmula para conocer cómo estas\nempresas regulan el pago de las pensiones es un GRAN SECRETO.</p>\n<p style=\"text-align: justify;\">Según congresista Andrés García Belaúnde, se pidió a la Superintendencia\nde Banca y Seguros y AFP la fórmula con la cual calculan el pago mensual de los\npensionistas, pero no conoció respuesta: “Se guarda bajo mil llaves. Es una\nfórmula parecida a la Coca-Cola, nadie la conoce”</p>\n<p style=\"text-align: justify;\">Ahora, esto pasa en nuestro país, con nosotros y así permitimos que\npase.</p>\n<p style=\"text-align: justify;\">Se dice que es mejor aportar a la ONP porque, entre otras cosas, ese\ndinero se distribuye equitativamente entre todos los contribuyentes y se te\ndevolverá lo justo y necesario en el momento de la jubilación.</p>\n<p style=\"text-align: justify;\">En realidad yo no le veo el lado de que si es mejor o peor algo. El\nhecho fáctico que sucede en estos momentos es esa ley irregular y mercenaria\nque el gobierno y el congreso han sacado a delante: el robo a los bolsillos de\nlos peruanos. En tal caso, algo podría resultar \"mejor\". O podría ser\nque nos estamos acomodando.</p>\n<div style=\"text-align: right;\">Angela Ccanto Buendia &nbsp;</div><p> </p>\n<p> </p>", "1", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("73", "2014-07-22 08:35:33", "2014-07-22 08:37:32", NULL, "1", "8", "2014-07-16 08:00:00", "Exposición fotográfica", "“La visión de un Perú”, fotografías de Víctor Mallqui en el Colegio de Periodistas de Lima.", "<p style=\"text-align: justify; \"><font color=\"#141823\"><span style=\"font-size: 15px; line-height: 23px;\">Exposición fotográfica</span></font></p>\n<p></p>\n<div style=\"text-align: justify;\"><span style=\"font-size: 11.5pt; line-height: 150%;\">“La visión de un Perú”, fotografías de Víctor Mallqui en el&nbsp;Colegio de Periodistas de Lima.</span></div><p> </p>\n<p><span style=\"color: rgb(20, 24, 35); font-size: 11.5pt; line-height: 150%; text-align: justify;\">El Colegio de Periodistas de Lima a través de su decano el Sr.\nMax Obregón y Víctor Mallqui fundador de Contraste, darán a conocer la\nexposición fotográfica “La visión de un Perú”, fotografías de Víctor Mallqui\n1980 – 2014.</span></p>\n<p style=\"text-align: justify; \"><span style=\"color: rgb(20, 24, 35); font-size: 11.5pt; line-height: 150%;\">“La visión de un Perú”, será inaugurada el 18 de julio, a las 7\np.m. en el primer piso de la sede central del Colegio de Periodistas de Lima. y\npermanecerá DOS SEMANAS en exposición.</span></p>\n<p style=\"text-align: justify; \"><span style=\"font-size:11.5pt;line-height:150%;&quot;Helvetica&quot;,&quot;sans-serif&quot;;\ncolor:#141823\">Les recomendamos no faltar, son 63 fotos muy hermosas.</span></p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("75", "2014-08-06 17:45:26", "0000-00-00 00:00:00", NULL, "1", "14", "2014-08-06 17:42:23", "Primer debate entre candidatos para la alcaldía de Lima.", "Primer debate entre candidatos para la alcaldía de Lima se realizará este 21 de agosto a las 7:00 pm organizado por colegio de periodistas de lima.\n\n ", "<p style=\"text-align: justify; \">Convocan a primer debate de candidatos a Lima: será el 21 de agosto</p>\n<p style=\"text-align: justify; \">&nbsp;</p>\n<p style=\"text-align: justify; \">Primer debate entre candidatos para la alcaldía de Lima se realizará este 21 de\nagosto a las 7:00 pm organizado por colegio de periodistas de lima.</p>\n<p style=\"text-align: justify; \">&nbsp;</p>\n<p style=\"text-align: justify; \">Susana Villarán (Diálogo Vecinal), Salvador Heresi (PPS), Fernán\nAltuve (Vamos Perú), Jaime Zea (PPC) y Alberto Sánchez Aizcorbe (Fuerza\nPopular).</p>\n<p style=\"text-align: justify; \">&nbsp;</p>\n<p style=\"text-align: justify; \">Se hizo la invitación formal a Castañeda Lossio, esperan a la espera\nde su respuesta.</p>\n<p> </p>\n<p style=\"text-align: right; \">(<a href=\"http://canaln.pe/actualidad/primer-debate-candidatos-alcaldia-lima-21-agosto-n147900\">Ver link Canal N</a>)</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("76", "2014-08-06 17:56:56", "0000-00-00 00:00:00", NULL, "1", "14", "2014-08-03 17:00:00", "\"El detalle me sirve como punto de partida para una reflexión generalizadora\"", "Se va la Feria del Libro, y \"El mundo de hoy\" y \"El Imperio\" eran lo que buscaba, se los recomiendo.\n", "<p style=\"text-align: justify; \">Se va la Feria del Libro, y \"El mundo de hoy\" y \"El Imperio\" eran lo que\nbuscaba, se los recomiendo. </p>\n<p style=\"text-align: justify; \">El autorretrato de un gran periodista,&nbsp;\nRyszard\nKapuściński</p>\n<p style=\"text-align: justify; \">Los relatos constituyen una herencia ejemplar de cómo se vivió el\nejercicio del periodismo en la segunda mitad del siglo XX. Y marcada por\neventos históricos como las guerras civiles en el continente africano, las protestas\nen China hasta la Guerra Fría.</p>\n<p style=\"text-align: right; \"><a href=\"https://www.facebook.com/angela.ccantobuendia?fref=photo\" data-hovercard=\"/ajax/hovercard/user.php?id=100001475407151\" aria-owns=\"js_225\" aria-haspopup=\"true\" id=\"js_226\">Angela Ccanto Buendia</a>&nbsp;&nbsp;</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("77", "2014-08-11 21:56:00", "2014-08-11 22:09:21", NULL, "1", "1", "2014-08-11 21:18:52", "La mejor comida marina, en La Atarraya", NULL, "<p> </p>\n<p style=\"text-align: left;\"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><br /></object></p>\n<p style=\"text-align: center;\"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><param name=\"movie\" value=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http://vhss-d.oddcast.com/php/vhss_editors/getvoki/chsm=ca05231e249bbc13ce0aef55f2154bd5%26sc=10127105\"><param name=\"quality\" value=\"high\"><param name=\"allowScriptAccess\" value=\"always\"><param name=\"width\" value=\"200\"><param name=\"height\" value=\"267\"><param name=\"allowNetworking\" value=\"all\"><param name=\"wmode\" value=\"transparent\"><param name=\"allowFullScreen\" value=\"true\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=ca05231e249bbc13ce0aef55f2154bd5%26sc=10127105\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></object></p>\n<p style=\"text-align: left;\"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\">(<a href=\"http://www.laatarraya.com/\">Ir a la Web</a>)</object></p>", "1", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("78", "2014-08-11 23:07:31", "0000-00-00 00:00:00", NULL, "1", "1", "2011-04-08 22:00:00", "Anarquía y caos en el Hospital de Chancay", "Era algo que la población en general venía reclamando y es que cuando el Dr. Carlos Dulanto Valdivieso fue designado como Director del Hospital de Chancay, se levantaron muchísimas voces de protestas.", "<p style=\"text-align: justify; \">Era algo que\nla población en general venía reclamando y es que cuando el Dr. Carlos Dulanto\nValdivieso fue designado como Director del Hospital de Chancay, se levantaron\nmuchísimas voces de protestas.</p>\n<p style=\"text-align: justify; \">Autoridades,\ntrabajadores y población del distrito del Chancay, decidieron desde ese momento\nsolicitar la salida de este energúmeno y mediocre medico.</p>\n<p style=\"text-align: justify; \">Por eso\ncuando por fin el Presidente regional Javier Alvarado decidió remover del cargo\nal mencionado galeno, se empezó a respirar nuevos aires en ese nosocomio.</p>\n<p style=\"text-align: justify; \">Pero le que\nno contaba Alvarado y menos el Director de la Diresa, el Dr. Montoya, que el\nDr. Dulanto, viejo ducho en estos menesteres, ya había armado su sequito de\nadulones en el mal llamado cuerpo médico.</p>\n<p style=\"text-align: justify; \">Y salieron\nestos a generar un ambiente rancio y de malas voluntades y hasta el médico\nDulanto, que hace algunas semanas atrás agradecía y alababa a Javier Alvarado\ncambio de opinión ante su anunciada destitución y mediante diatribas e\ninsultos, decidió poner resistencia a la decisión ejecutiva del actual\npresidente regional.</p>\n<p style=\"text-align: justify; \">La\nprofesional que asumió el cargo para dirigir la gestión del nosocomio\nchancayano la Dra. Isabel Amparo Luque Aguilar, colega de profesión de este mal\nmedico, muy asombrado no podía creer que era avasallado sus derechos como\nprofesional de la salud y como dama y mujer.</p>\n<p style=\"text-align: justify; \">No entendía\ncomo Dulanto que es un incapaz y prepotente, empezó a promover de manera\nabierta una movilización de algunos integrantes del cuerpo médico, a fin de\nevitar su destitución. Este sujeto se creía y se cree el dueño del cargo.</p>\n<p style=\"text-align: justify; \">Con el\npretexto que solo el cuerpo médico puede proponer al nuevo director, usurpaban\nun derecho que le corresponde por ley al Director de la Diresa y al Presidente\nregional.</p>\n<p style=\"text-align: justify; \">¿Acaso\nDulanto Valdivieso y compañía creen que el nosocomio chancayano es de su propiedad o su\nchacra?, con estos hechos dejan mucho que desear estos mal llamados médicos,\npues no cumplen su labor y más bien se dedican a reclamar, creyéndose los\núnicos con derecho a usufructuar los recursos del hospital, lo que ya\nconstituye una afrenta y una vergüenza al pueblo chancayano.</p>\n<p style=\"text-align: justify; \">Lo\nadvertimos desde un principio, cuando el director de la Diresa puso como\nmandamás a Dulanto, que este sujeto iba a destruir la imagen ya alicaída de los\nmédicos de este hospital y el tiempo nos da la razón.</p>\n<p style=\"text-align: justify; \">Pero es mas\nlamentable la posición del decano del colegio médico, que desconociendo toda\nnormatividad vigente ha manifestado que el cuerpo médico pone y saca directores\ncomo si los hospitales fueran una isla sin control ni mando en la región Lima.\nAlgo que es una aberración jurídica que demuestra falta de ética y moral de\nquienes ocasionan la rebeldía medica que indigna al pueblo chancayano.</p>\n<p style=\"text-align: justify; \">Estos\nmédicos han dejado sin servicio a los pacientes y desde el día de hoy son los\nresponsables si alguno de ellos sufre alguna complicación que podría\nocasionarle la muerte, por lo que es importante que el Ministerio Publico haga\nla investigación necesario y denuncie a los malos médicos que caprichosamente\nquieren convertir en su chacra este hospital</p>\n<p style=\"text-align: justify; \">Asimismo,\npedimos que el actual Presidente regional no ceda a los caprichitos y menos a\nlos engreimientos del famoso cuerpo médico, porque se debe de imponer el\nprincipio de autoridad y si estaban acostumbrados a sus berrinches en tiempos\npasados, debemos recordarles que esa época negra ya terminó.</p>\n<p style=\"text-align: justify; \">Los tiempos\ndel reinado del hijito de la ex consejera Tang ya terminaron y jamás volverán.</p>\n<p style=\"text-align: justify; \">Si Alvarado\ncede, nosotros seremos implacables y lo denunciaremos por ser una autoridad\ndébil y sin mando, y por último que sea el ministerio publico el que determine\ny sancione a los responsables del caos y la anarquía medica promovida por el\nmédico Dulanto, quien debería de ser expectorado de este otrora prestigioso hospital.</p>\n<p style=\"text-align: right; \">Publicado\npor Edison Hurtado Leon para El Huarochirano.</p>\n\n<p>( <a href=\"http://elhuarochiranoperu.blogspot.com/2011/04/rebeldia-del-cuerpo-medico-del-hospital.html\">Ver enlace</a>\n)</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("79", "2014-08-12 20:30:11", "0000-00-00 00:00:00", NULL, "1", "1", "2014-08-12 20:25:47", "MINEDU publicó resultados de examen a directores, 56% superó puntaje mínimo en primera fase.", "El 56% de los profesores que participó de la Evaluación Excepcional de Directivos que se aplicó el pasado 3 de agosto, superó el puntaje mínimo de la Prueba de Comprensión de Textos Funcionales al Ejercicio Directivo, informó el Ministerio de Educación (MINEDU).", "<p style=\"text-align: justify; \">El 56% de docentes directores superó\npuntaje mínimo en primera fase de evaluación: Rindieron Prueba de Comprensión\nde Textos Funcionales al Ejercicio Directivo. </p>\n<p style=\"text-align: justify;\">El 56% de los profesores que\nparticipó de la Evaluación Excepcional de Directivos que se aplicó el pasado 3\nde agosto, superó el puntaje mínimo de la Prueba de Comprensión de Textos\nFuncionales al Ejercicio Directivo, informó el Ministerio de Educación (<a href=\"www.minedu.gob.pe\">MINEDU</a>).\n</p>\n<p style=\"text-align: justify;\">Señaló que la referida evaluación\nha permitido medir la capacidad de los directivos de comprender documentos e\ninstrumentos necesarios para la gestión pedagógica. </p>\n<p style=\"text-align: justify;\">Para conocer los resultados hay\nque ingresar al portal institucional del <a href=\"www.minedu.gob.pe\">MINEDU</a>: </p>\n<p style=\"text-align: justify;\">Al terminar esta primera fase de\nla evaluación, se procederá a calificar la Prueba de Solución de Casos, que\npermite medir el liderazgo en la conducción de la escuela y la capacidad de\nresolver los conflictos internos.</p>\n<p style=\"text-align: justify;\">El Minedu afirmó que la\ncalificación de esta prueba estará a cabo por un equipo de evaluadores\ncapacitados en el manejo experto de pautas estandarizadas de corrección. Para\nasegurar la transparencia del procedimiento se ha establecido que los\nevaluadores desconozcan la identidad de los profesores cuyos casos califiquen,\nagregó. </p>\n<p style=\"text-align: justify;\">Se precisó que los directivos de\ncolegios de Educación Intercultural Bilingüe serán evaluados en el dominio oral\nde la lengua materna originaria a través de una entrevista a realizarse del 13\nal 26 de agosto, según el programa establecido por la UGEL correspondiente.</p>\n<p style=\"text-align: justify;\">Mañana 12 de agosto se publicará\nen la web del <a href=\"www.minedu.gob.pe\">MINEDU</a> la relación de profesores sujetos a esta evaluación. </p>\n<p style=\"text-align: justify;\">Los directivos que aprueben la\nevaluación excepcional accederán al cargo por un periodo de tres años; además,\nrecibirán la asignación mensual prevista en la Ley de Reforma Magisterial de\n600 y 800 nuevos soles para los directores de instituciones educativas de uno y\ndos turnos, respectivamente. En el caso de subdirectores la asignación es de\n400 nuevos soles.</p>\n<p style=\"text-align: justify;\">Aquellos directivos que no logren\nacceder a una plaza mediante esta evaluación excepcional, podrán participar en\nel Concurso de Acceso a Cargos Directivos programado para fines de este año,\nindicó el Minedu. </p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">( <a href=\"www.minedu.gob.pe/n/nota.php\">VER RESULTADOS</a> )</p>\n<p style=\"text-align: justify;\">( <a href=\"http://www.educacionenred.pe/noticia/concurso-directores-subdirectores/?portada=58503#ixzz3AENn4Gks\">Ver MÁS</a> )</p>\n\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("80", "2014-08-12 21:27:54", "0000-00-00 00:00:00", NULL, "1", "6", "2014-08-12 21:25:41", "¿Por qué lloran las mujeres?", "- ¿Por qué lloras mamá? – le preguntó un niño a su madre.\n- Porque soy mujer. – le contestó ella.\n- Pero, ¡yo no entiendo! – dijo el niño.\n- “ …Y nunca lo entenderás mi amor”-dijo la madre.\n", "<p style=\"text-align: justify; \">- ¿Por qué lloras mamá? – le preguntó un niño a su madre.</p>\n<p style=\"text-align: justify;\">- Porque soy mujer. – le contestó ella.</p>\n<p style=\"text-align: justify;\">- Pero, ¡yo no entiendo! – dijo el niño.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">Su madre se inclinó hacia él y abrazándolo le dijo: “ …Y nunca lo\nentenderás mi amor”.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">Más tarde el niño le preguntó a su papá: “¿Por qué mamá llora a\nveces sin ninguna razón?”</p>\n<p style=\"text-align: justify;\">- Todas las mujeres lloran siempre por ninguna razón… – fue todo lo\nque el padre le podía contestar.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">El pequeño niño creció y se convirtió en todo un hombre, preguntándose\naún ¿Por qué era que las mujeres lloraban sin razón?</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">Un día el niño convertido en un hombre se arrodilló y le preguntó a\nDIOS: “DIOS… ¿Por qué lloran tan fácilmente las mujeres?”</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">Y DIOS le contestó:</p>\n<p style=\"text-align: justify;\">- Cuando hice a la mujer tenía que crear algo especial. ¡Hice sus\nhombros lo suficientemente fuertes, como para cargar el peso del mundo entero,\npero; a la vez lo suficientemente suaves como para confortarlo! ¡Le di una\ninmensa fuerza interior, para que pudiera soportar el dar a luz y también hasta\nel rechazo, que muchas veces proviene de sus propios hijos. ¡Le di la fortaleza\nque le permite seguir adelante, cuidando de su familia, sin quejarse, a pesar\nde las enfermedades y la fatiga, aún cuando otros se rindan! ¡Le di la\nsensibilidad para amar a sus hijos, bajo cualquier circunstancia, aún cuando\nesos hijos la hallan lastimado mucho… Esa misma sensibilidad, que hace que\ncualquier tristeza, llanto o dolor del niño desaparezca y que le hace compartir\nlas ansiedades, dudas y miedos de la adolescencia.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">- ¡Le di la fuerza suficiente para que pudiera perdonar a su esposo de\nsus faltas, y la moldeé de una de sus costillas para que ella pudiera cuidar de\nsu corazón! ¡Le di sabiduría para saber que un buen esposo nunca lastimaría a\nsu esposa, y también a veces le pongo pruebas para medir su fuerza y\ndeterminación para mantenerse a su lado a pesar de todo!</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">- Pero Hijo… para poder soportarlo todo… ¡Le di las lágrimas y son de\nella exclusivamente para usarlas cuando las necesite, al derramarlas vierte un\npoquito de amor en cada una, que se desvanece en el aire y salva a la humanidad!\nEs su única debilidad… es una lágrima por la humanidad.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">- Gracias Dios por haber creado a la mujer… ahora comprendo el sentir\nde mi madre, hermana, esposa…– respondió el hombre con un fuerte suspiro en sus\nlabios.</p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("81", "2014-08-12 22:14:17", "2014-08-17 22:48:01", NULL, "1", "3", "2014-08-12 22:11:47", "Sobre el pronunciamiento del  Ministro de Educación", "Al contratar a un profesor por dos años le da la posibilidad de una plaza segura de acuerdo a su desempeño laboral, pero no le da la opción de lograr el nombramiento, pertenecer a la carrera pública magisterial, mejorar sus honorarios, mejorar su estilo de vida, etc", "<p style=\"text-align: justify; \">El Ministro de Educación Jaime Saavedra, anunció que a partir del\npróximo año habría la posibilidad de contratar por un año más a los 50,000\nprofesores convocados anteriormente, a fin de darle continuidad a su labor. </p>\n<p style=\"text-align: justify;\">Explicó que actualmente estos contratos son anuales, y luego se\nconvoca a un nuevo concurso, pero en el 2015 los mismos profesores podrán\nampliar ese vínculo por un año más, previa evaluación del director. Sin embargo, no deja en claro la posibilidad\nde obtener el nombramiento, que es lo que todo profesor contratado busca. Al\ncontratar a un profesor por dos años le da la posibilidad de una plaza segura\nde acuerdo a su desempeño laboral, pero no le da la opción de lograr el\nnombramiento, pertenecer a la carrera pública magisterial, mejorar sus\nhonorarios, mejorar su estilo de vida, etc, solo brinda un alivio del examen\nque se debe dar cada año para contrato. Frente a ello, tampoco deja en claro\ncuál sería la situación, en el 2016, de los profesores que no aprobaron el\nexamen en el 2015, ni de los nuevos profesores egresados que no rindieron dicho\nexamen. Debemos\ntener en cuenta además que para el control del desempeño docente debe de\nexistir una comisión encargada de evitar regularidades por parte de los\ndirectivos de las instituciones educativas al decidir la permanencia o no, por\nun año adicional, del profesor contratado, recordemos que en ocasiones\nanteriores, y a través de los años se han venido dando propuestas indecentes,\nde índole sexual y económico para la obtención de la aprobación de los\ndirectores de las instituciones educativas públicas (en tiempos de\nnombramiento, durante la fase de evaluación a cargo de los directivos de las\ndiversas instituciones educativas)</p>\n<p style=\"text-align: justify;\">Por su parte, el Ministro de Educación Jaime Saavedra También anunció\nque el gobierno promulgará en los próximos meses, un decreto supremo que\nimplementa la política del idioma extranjero inglés en las escuelas del Estado.</p>\n<p style=\"text-align: justify;\">En principio, anotó, se pasará de 2 horas a 5 horas, empezando por los\nmil colegios que tendrán secundaria con horario ampliado, lo que implicaría la\nnecesidad de un almuerzo escolar dentro de la institución educativa para lograr\nun optimo rendimiento físico y mental de los estudiantes.</p>\n<p style=\"text-align: justify;\">Precisó que la metodología tendrá una combinación de clases presenciales\ncon clases en línea, lo cual implicará dos horas de aprendizaje y tres de\ntutoría, para lo cual es necesario resaltar que se deben de implementar computadoras\nactualizadas y de buen rendimiento para el uso de profesores y alumnos,\nteniendo en cuenta que no todos cuentan con un computador en casa.</p>\n<p style=\"text-align: justify;\">A partir del 2015 la enseñanza del idioma inglés se extenderá y\nfortalecerá en toda la educación básica peruana, de tal manera que al año 2021\nlos estudiantes que terminen secundaria tengan un nivel de dominio que les\npermita comunicarse bien en dicha lengua, anunció el presidente Ollanta Humala\nen su Mensaje a la Nación por Fiestas Patrias el pasado 28 de julio.</p>\n<p style=\"text-align: justify;\">Por otro lado, Saavedra adelantó que está en preparación la norma para\nejecutar S/. 350 millones en la reparación de los servicios higiénicos de los\ncolegios estatales, de los cuales una parte será manejada por los directores,\nlo cual es bueno, pero también debe ser fiscalizado por un ente ajeno a la\ninstitución educativa y por uno interno a ella, incluso por los padres de\nfamilia, para lograr un mejor desempeño durante la ejecución de la obra.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p>Fuente: <a href=\"http://www.educacionenred.pe/noticia/?portada=58188#.U-EFbfS2WeQ.facebook#ixzz3AElwZ99f\">http://www.educacionenred.pe/noticia/?portada=58188#.U-EFbfS2WeQ.facebook#ixzz3AElwZ99f</a></p>\n<p>Comentarios\nadicionales: César Gamarra Dulanto.</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("82", "2014-08-15 00:38:57", "0000-00-00 00:00:00", NULL, "1", "6", "2014-08-15 00:37:55", "Sobre las relaciones de parejas", "En una relación uno debe comprometerse a que las cosas vayan bien, es importante también tener algún plan o algún sueño, alguna meta compartida, tener un proyecto juntos.", "<p align=\"center\" style=\"text-align: justify;\">En una relación uno debe comprometerse a que las cosas vayan\nbien, es importante también tener algún plan o algún sueño, alguna meta\ncompartida, tener un proyecto juntos.</p>\n<p style=\"text-align: justify;\">El día de hoy, en la tarde, estuve leyendo un poco sobre ese\ntema, era un artículo sobre volver a enamorarse de la persona que es tu pareja,\nes decir, cuando uno ya forma una relación estable de convivencia y luego de\nmatrimonio (porque se recomienda la convivencia antes del matrimonio, para\nevitar divorcios. Es algo así como k me gustaste, te empecé a querer, estuvimos\nde enamorados y me re enamore de ti, y luego paso el tiempo y te ame; después\nun día te vi sin maquillaje, despertando a mi lado y me sentí sumamente\nenamorado de ti, considero k en ese momento me volví a enamorar de ti, o me\nrepotencie en el amor. Era un artículo verdaderamente interesante. </p>\n<p style=\"text-align: justify;\">Entonces k recomienda la autora de dicho artículo, recomienda cinco puntos importantes:</p>\n<p style=\"text-align: justify;\">-Al igual que tu trabajo, el jardín o un carro, todo lo que\ntenemos o \"creemos poseer\"&nbsp; hay\nque cuidarlo. Si no se deteriora. Una relación de pareja requiere de mantenimiento.\nSegún mi interpretación, la frase \"creemos poseer\" se refiere a eso\nmismo, al creer poseer, y es algo inconsciente, porque uno dice mi amor, tu\neres mi amor, tu eres mía, y eso no implica querer apoderarnos o dominar\nplenamente&nbsp; a la otra persona, implica\nmas k otra cosa, a mi entender, la camaradería de la situación, yo soy tuyo y\ntu eres mía porque nos complementamos, porque somos cómplices, etc.</p>\n<p style=\"text-align: justify;\">- La felicidad como el amor se construyen día a día. No se\npuede dar nada por sentado. Cada día es un nuevo comienzo. </p>\n<p style=\"text-align: justify;\">A mi parecer pues en una relación siempre debemos estar\natentos a la necesidad del otro, hasta k sus necesidades sean obvias para cada\nuno, sin que tú me digas que necesitas algo, yo ya lo sé. Sin embargo no\nsiempre es solo dar, sino también hay que recibir, y recibir con mucha humidad\ny gratitud, pues en la vida cada vez que damos algo estamos predispuestos a\nrecibir algo; en un ejemplo simple si le dices hola a una persona, estas\npredispuesto a que al menos te diga hola o te de un gesto a manera de saludo.</p>\n<p style=\"text-align: justify;\">- Crecer juntos es la mejor manera de entender la vida en\npareja. Esa es la clave. Desde mi humilde entendimiento, es por ejemplo el\napoyo en el desarrollo profesional, y no necesariamente un apoyo económico,\n(que sirve mucho pues en el tipo de sociedad que vivimos siempre existen\ndeficiencias económicas) sino un apoyo moral, el deseo de superación personal y\ntambién superación de tu pareja; y sobre todo que la otra persona entienda y se\nsienta segura que si algún día le falta algo, va a recibir tu apoyo, y viceversa,\npues como mencione anteriormente, no solo se trata de dar, sino también de\nrecibir</p>\n<p style=\"text-align: justify;\">Si alguna vez te quedas sin trabajo, no tiene nada de malo\nque tu pareja&nbsp; mantenga el bienestar económico\ndel hogar.</p>\n<p style=\"text-align: justify;\">- Tener un proyecto en común (algo que sea de preferencia\nsolo para los dos). Puedes no tener las mismas aficiones y los mismos gustos,\npero es necesario tener al menos un proyecto de ambos. En otras palabras luchar\njuntos por un mismo ideal, una misma meta, cumplir objetivos, etc.</p>\n<p style=\"text-align: justify;\">-Por último, el quinto consejo que describe Patricia\nSalinas, (autora del artículo Volverse a Enamorar, de la revista Ellos y Ellas\nde Caretas Nº 480 del 10 de julio del 2014) es, los pequeños detalles son los\nque muchas veces hacen la diferencia. Si no quieres que la rutina arruine tu\nrelación, trata de escapar de la rutina y de buscar algo con que sorprender de\ntanto en tanto. A mí me gustan mucho las manualidades, tal vez soy un poco romántico,\nposiblemente por la misma razón que suelo escribir versos, y valoro mucho el\nesfuerzo, tal vez por mi labor de profesor. A veces no es necesario comprar\nalgo caro, es mucho más que suficiente el cortar una flor de un jardín el\nregalar una tarjeta, el dedicar una canción, recitar o escribir algunos versos.\nLa palabra romántica en este contexto se refiere a la corriente delromanticismo, de los sueños, de eso que nos\nmueve justamente para enamorarnos.</p>\n<p style=\"text-align: justify;\">Suelo leer mucho sobre estas cosas de parejas justamente\nporque deseo llevar una bonita relación con mi pareja, y considero que así como\nella me quiere está bien, es su forma de querer, yo no puedo cambiar eso,\nacepto lo que me da, lo acepto con mucha alegría y satisfacción sobre todo\nporque sé que es sincero y que lo brinda con amor. Muchas parejas podrían mejorar\nsus relaciones si de vez en cuando deciden conversar de temas de amor, de\nenamoramiento, o tal vez leer y comentar juntos algún artículo similar al de\nPatricia Salinas o a este que están leyendo en estos momentos, para buscar la armonía\nen la relación. Al conseguir armonía se genera un soporte muy fuerte y\nresistente que servirá para evitar que cualquier problema común (que tiene toda\npareja) derrumbe su relación.</p>\n<p style=\"text-align: right;\">Cesar Gamarra Dulanto</p>\n<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("83", "2014-08-17 20:11:04", "2014-08-22 00:04:00", NULL, "1", "3", "2014-08-17 19:52:31", "Ley Universitaria según el MINEDU", "El Ministerio de Educación propondrá en el corto plazo la Política Nacional para el Aseguramiento de la Calidad en la Educación Superior Universitaria, basada en los 4 pilares que ya han sido hechos de conocimiento público: Sistemas de información, Fomento de la calidad, Licenciamiento y Acreditación.", "<p style=\"text-align: justify;\">En la página\nweb del Ministerio de Educación (<a href=\"http://www.minedu.gob.pe/n/nota_02.php\">http://www.minedu.gob.pe/n/nota_02.php</a>)\nencontramos el siguiente texto respecto a la ley universitaria: La promulgación\nde la Ley Universitaria constituye un primer hito en la reforma de la educación\nsuperior universitaria, a partir del cual el Ministerio de Educación propondrá\npolíticas públicas que tengan como objetivo lograr un servicio educativo universitario,\npúblico y privado, de calidad en nuestro país. La ley es el resultado del\nconsenso respecto a su necesidad y urgencia desde el Estado y la sociedad,\nconciliando los puntos de vista de diversos actores, expuestos y debatidos\npúblicamente durante los últimos dos años desde la Comisión de Educación,\nJuventud y Deporte del Congreso de la República.</p>\n<p style=\"text-align: justify;\">Reformar el\nsistema de la educación superior universitaria nos permitirá contar con\nprofesionales competentes, lo que resulta esencial para empujar el crecimiento\neconómico y mantener sostenible el desarrollo de nuestro país. La nueva ley\ndispone:</p>\n<p style=\"text-align: justify;\">• <b>Docentes\ndedicados a la vida académica y mayor exigencia de formación, en universidades\npúblicas y privadas.</b> La Ley Universitaria establece que, en un plazo de 5\naños, las universidades deberán contar con docentes que, al menos, hayan\nobtenido el grado de maestro (a excepción del docente extraordinario) para\npoder realizar la formación de pregrado (Es importante mencionar que en la Ley\nse reconoce la obtención de maestrías en 2 semestres académicos y al menos 48\ncréditos) ; maestro o doctor para ser docente de maestrías y programas de\nespecialización; y doctor en caso sea docente para la formación en ese nivel\nacadémico. Además, la ley precisa que el 25% del total de docentes de las\nuniversidades esté contratado a tiempo completo. De esta manera se promueve que\nexista un cuerpo docente permanente que desarrolle actividades relacionadas a\nla investigación, la asesoría académica a los alumnos y a la innovación\ninstitucional.</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]-->• <strong>Investigación.</strong>\nLa Ley promueve la investigación, a través de fondos cuyo desembolso estará\nnecesariamente vinculado a la evaluación del desempeño, así como a la\npresentación de proyectos de investigación en gestión, en ciencia y tecnología.</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]-->• <b>Licenciamiento\n(creación de la SUNEDU) y Acreditación (reforma del SINEACE).</b> La Ley\nUniversitaria establece dos procesos fundamentales para el aseguramiento de la\ncalidad (básica y de excelencia) en la educación superior universitaria: el\nLicenciamiento que establece y verifica, permanente y obligatoriamente, la\nexistencia de condiciones básicas de calidad para el funcionamiento del\nservicio universitario (la SUNEDU licencia universidades, filiales, facultades,\nescuelas y programas que permiten obtener grado académico) y la Acreditación\ncomo un proceso voluntario de certificación de la calidad alcanzada por las\nuniversidades o sus programas, conforme a criterios internacionales, bajo\nmecanismos de incentivos.</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]-->• <b>Información\npara discernir y elegir la opción que buscamos.</b> La Ley Universitaria\ndispone que la SUNEDU se encargue de la publicación anual y bienal respecto a\nla utilización de los beneficios otorgados por ley a las universidades y\nrespecto a la realidad universitaria del país, considerando en ella su posición\nen rankings internacionales, número de publicaciones indexadas, características\ncuantitativas de su oferta, entre otras variables. Así, los potenciales alumnos\npodrán tener a su alcance mejores elementos para elegir dónde y qué estudiar.&nbsp;</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">La nueva Ley\nUniversitaria establece nuevos lineamientos que permiten abordar otras\nproblemáticas, también relevantes, de la educación superior universitaria.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]-->• <b>Transparencia\nen la información.</b> La Ley Universitaria establece que las universidades\npúblicas y privadas deberán hacer público un mínimo de información relacionada\na: estados financieros, inversiones, reinversiones, donaciones y cualquier otra\nfuente de recursos. Asimismo, deben hacer pública la información respecto a\nbecas y créditos, y documentos claves de gestión como el Plan Estratégico, su\nreglamento, actas de reuniones de instancias de decisión, número de alumnos por\nfacultades y programas, cuerpo docente, entre otros.</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]-->• <b>Elecciones\nuniversales y ponderadas en las universidades públicas.</b> La Ley\nUniversitaria dispone que todos los miembros de la comunidad universitaria sean\nquienes elijan a sus autoridades. La ponderación equilibra el voto, al\nestablecer que el de los docentes ordinarios tendrá 2/3 de la votación, y 1/3\npara los estudiantes matriculados.</p>\n<p style=\"text-align: justify;\"><!--[if !supportLists]-->•&nbsp;<!--[endif]--><b>Legitimidad\nde las autoridades en las universidades públicas.</b> Las elecciones son\nválidas si participa más del 60% de docentes ordinarios y más del 40% de\nalumnos matriculados. En cuanto a los representantes estudiantiles, la Ley\nUniversitaria define que ahora estos deben pertenecer al tercio superior y\nhaber aprobado al menos 36 créditos (otro requisito es que no deben tener una\nsentencia judicial condenatoria ejecutoriada), dando más claridad y relevancia\na los representantes estudiantiles que participan en el gobierno de la\nuniversidad pública. Adicionalmente, en cuanto a las autoridades, la ley\nestablece que éstas no se pueden reelegir de manera inmediata.</p>\n<p style=\"text-align: justify;\">El\nMinisterio de Educación propondrá en el corto plazo la Política Nacional para\nel Aseguramiento de la Calidad en la Educación Superior Universitaria, basada\nen los 4 pilares que ya han sido hechos de conocimiento público: Sistemas de\ninformación, Fomento de la calidad, Licenciamiento y Acreditación.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p align=\"right\" style=\"text-align: right;\">http://www.minedu.gob.pe/n/nota_02.php</p>\n<p>&nbsp;Entrevista al congresista Daniel Mora:</p>\n<p style=\"text-align: center; \">&nbsp;</p>\n<p style=\"text-align: center;\"><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/OGefiP48SG0\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p style=\"text-align: center;\"><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/WF_jyEtwUqc\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("84", "2014-08-24 22:20:47", "2014-08-24 22:31:55", NULL, "1", "1", "2014-08-19 21:00:00", "Se requiere una televisión con valores", "Entrevista a Angela Ccanto Buendia", "<p>Entrevista a Angela Ccanto Buendia &nbsp; &nbsp; &nbsp;</p>\n<p style=\"text-align: center; \"><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/zxav2Bz3Lmw\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p style=\"text-align: center;\">&nbsp;</p>\n<p> </p>\n<p> </p>\n<p> </p>\n<p> </p>\n<p> </p>", NULL, NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("85", "2014-09-04 22:19:29", "2014-09-04 22:28:08", NULL, "1", "1", "2014-09-02 22:00:00", "Urgente", "Un niño de 10 años y con autismo desapareció hoy", "<div style=\"text-align: justify;\">URGENTE: Un niño de 10 años y con autismo desapareció hoy. Responde al nombre de Geanpiero Cuba. Fue visto por última vez en el mercado del Sector 1, cerca del colegio especial Divina Misericordia en Villa El Salvador.</div><div style=\"text-align: justify;\"><br /></div><div style=\"text-align: justify;\">Lleva un buzo plomo de franela, polo manga larga verde fosforescente y zapatillas negras.</div><div style=\"text-align: justify;\"><br /></div><div style=\"text-align: justify;\">Contacto: Juan Cuba (992 664 678/ 560 9613) &nbsp;</div><p style=\"text-align: right; \">&nbsp;Fuente: RPP Noticias</p>\n<p style=\"text-align: right; \">(<a href=\"https://www.facebook.com/rppnoticias/photos/a.123284421753.125472.32813056753/10152839252271754/?type=1&amp;theater\">ver noticia</a>)</p>", "1", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("86", "2014-09-04 23:52:28", "0000-00-00 00:00:00", NULL, "1", "3", "2014-09-04 23:50:49", "Maestros TICs", "\"Si la vida no te da un ecran ... proyecta tus diapos en la pared, pero no dejes de enseñar\"\n                                                                                                                                   César Gamarra D.", "<p> </p>", "2", NULL, "1");
#
#
INSERT INTO `news_items` VALUES ("87", "2014-09-09 23:55:17", "2014-09-10 00:13:04", NULL, "1", "1", "2014-09-09 23:52:48", "Sepa dónde votar y si es miembro de mesa", "Desde aquí podrá conocer dónde votar y si es miembro de mesa", "<p>(I<a href=\"http://consultamiembrodemesa.onpe.gob.pe/consultamm2014/consulta-miembros-de-mesa.html\">r a la página de consulta</a>)</p>", NULL, NULL, "1");
#
#
DROP TABLE IF EXISTS `obras_fotos`;
#
#
CREATE TABLE `obras_fotos` (
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
DROP TABLE IF EXISTS `obras_fotos2`;
#
#
CREATE TABLE `obras_fotos2` (
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
DROP TABLE IF EXISTS `obras_fotos2_fotos`;
#
#
CREATE TABLE `obras_fotos2_fotos` (
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
DROP TABLE IF EXISTS `obras_fotos_fotos`;
#
#
CREATE TABLE `obras_fotos_fotos` (
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
DROP TABLE IF EXISTS `page_config`;
#
#
CREATE TABLE `page_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `seccion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `paginas` VALUES ("10", "2013-07-09 23:24:19", "2013-10-29 11:20:44", NULL, "1", "alcalde", "ALCALDE DE LA PROVINCIA DE POMABAMBA SEÑOR JUAN VICTOR PONTE CARRANZA", "<p align=\"justify\"><i><b>Al conmemorarse los 152 años de creación política de \nnuestra Provincia, me es sumamente gratificante en calidad de alcalde \nprovincial, invitar a autoridades a la familia pomabambina a participar \ncon orgullo en las diferentes actividades oficiales y propias de la \nprogramación. Dios ha permitido que nuestra generosa ciudad de \nPomabamba, en estos 152 años de creación refleje el esfuerzo de sus \nhijos, con compromiso y esperanza en su futuro.</b></i></p>\n<p> </p>\n<p align=\"justify\"><i><b>Por ello queremos en adelante forjar una actitud de \ngestión realista y eficiente, que oriente y facilite el desarrollo de \nnuestra provincia, es ahí donde anhelo junto a ustedes trabajar y poner \nal máximo mis esfuerzos en su realización por hacer de nuestro querido \nPomabamba una ciudad próspera y moderna, asumiendo nuestras \nresponsabilidades, con honestidad y entereza, pero con un \ncorazón&nbsp;sincero y agradecido de este hermoso pueblo.</b></i></p>\n<p> </p>\n<p align=\"justify\"><em><strong>Hermanos pomabambinos juntos estamos cumpliendo los proyectos que hemos trazado para el desarrollo de nuestra provincia.</strong></em></p>\n<p> </p>\n<p align=\"justify\"><i><b>Nos sentimos felices por compartir con ustedes un año\n mas de la historia de nuestra provincia y compartir esta fecha las \ngrandezas de&nbsp; nuestra hermosa Ciudad de los Cedros: Pomabamba.</b></i></p>\n<p> </p>\n<p align=\"justify\"><i><b>Agradezco por la confianza depositada y con el \nrespeto a la historia y tradición de nuestro pueblo los invito una vez \nmas a participar y a disfrutar de este 152 Aniversario.... ¡VIVA \nPOMABAMBA!</b></i></p>\n<p> </p>", "pag_1373430259_217x169.jpg", NULL, "1");
#
#
DROP TABLE IF EXISTS `proyectos`;
#
#
CREATE TABLE `proyectos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` char(1) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `carpeta` varchar(80) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `descripcion` varchar(800) DEFAULT NULL,
  `dominio` varchar(80) DEFAULT NULL,
  `ftp_user` varchar(80) DEFAULT NULL,
  `ftp_pass` varchar(80) DEFAULT NULL,
  `ftp_root` varchar(80) DEFAULT NULL,
  `seguro` varchar(80) DEFAULT NULL,
  `para_subir` varchar(80) DEFAULT NULL,
  `fecha_acceso` datetime DEFAULT '0000-00-00 00:00:00',
  `calificacion` char(1) DEFAULT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `semilla` int(10) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `archivo` varchar(80) DEFAULT NULL,
  `firma` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `publicaciones_grupos`;
#
#
CREATE TABLE `publicaciones_grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `nombre` varchar(80) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `publicaciones_grupos` VALUES ("1", "2014-07-18 17:43:28", "0000-00-00 00:00:00", NULL, "1", "directorio prueba 1", "1");
#
#
DROP TABLE IF EXISTS `publicaciones_items`;
#
#
CREATE TABLE `publicaciones_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `id_grupo` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `fichero` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `recomendar` VALUES ("1", "2014-03-31 21:01:42", "2014-03-31 21:01:42", NULL, "1", "2014-03-31 21:01:42", "gamadesupe2@gmail.com", "gamadesupe2@gmail.com", NULL, NULL, "TrukMax", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("2", "2014-04-01 19:45:55", "2014-04-01 19:45:55", NULL, "1", "2014-04-01 19:45:55", "dagana", "dagalosk8@hotmail.com", NULL, NULL, "TrukMax", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("3", "2014-04-01 19:51:47", "2014-04-01 19:51:47", NULL, "1", "2014-04-01 19:51:47", "JOSE ROJAS", "jago84@hotmail.com", NULL, NULL, "TrukMax", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("4", "2014-04-01 19:52:26", "2014-04-01 19:52:26", NULL, "1", "2014-04-01 19:52:26", "María LLanos", "pmarly92@hotmail.com", NULL, NULL, "TrukMax", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("5", "2014-04-01 19:53:03", "2014-04-01 19:53:03", NULL, "1", "2014-04-01 19:53:03", "Rosa Villafranca", "rulisvillafranca@hotmail.com", NULL, NULL, "TrukMax", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("6", "2014-04-01 19:53:39", "2014-04-01 19:53:39", NULL, "1", "2014-04-01 19:53:39", "Beatriz Quispe", "bel.q@hotmail.com", NULL, NULL, "TrukMax", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("7", "2014-05-06 09:26:42", "2014-05-06 09:26:42", NULL, "1", "2014-05-06 09:26:42", "gjaoscs", "gjaoscs@gmail.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("8", "2014-08-04 07:49:56", "2014-08-04 07:49:56", NULL, "1", "2014-08-04 07:49:56", "ifdissdse", "htvxpb@vtsacj.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("9", "2014-08-04 15:48:10", "2014-08-04 15:48:10", NULL, "1", "2014-08-04 15:48:10", "dzxebpg", "rnradd@urrxhi.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("10", "2014-08-04 18:23:41", "2014-08-04 18:23:41", NULL, "1", "2014-08-04 18:23:41", "juuessosa", "zdrkda@hyfono.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("11", "2014-08-04 22:48:08", "2014-08-04 22:48:08", NULL, "1", "2014-08-04 22:48:08", "eohzqigoj", "rgidfj@dhmpgr.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("12", "2014-08-05 03:52:10", "2014-08-05 03:52:10", NULL, "1", "2014-08-05 03:52:10", "tmhdfwfa", "aumijc@kpyguu.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("13", "2014-08-05 05:27:10", "2014-08-05 05:27:10", NULL, "1", "2014-08-05 05:27:10", "yyfhjimmif", "vezkte@ewfcln.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("14", "2014-08-05 14:05:21", "2014-08-05 14:05:21", NULL, "1", "2014-08-05 14:05:21", "ulialvnqp", "zeqsoq@zklevi.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("15", "2014-08-11 05:29:24", "2014-08-11 05:29:24", NULL, "1", "2014-08-11 05:29:24", "kjhzsy", "hdolsw@wwhyvg.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("16", "2014-08-11 09:57:14", "2014-08-11 09:57:14", NULL, "1", "2014-08-11 09:57:14", "hfhqbkw", "uifdle@imridi.com", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
INSERT INTO `recomendar` VALUES ("17", "2014-08-17 22:08:37", "2014-08-17 22:08:37", NULL, "1", "2014-08-17 22:08:37", "Amparito Chavez Torrejón", "chavezamparito@hotmail.es", NULL, NULL, "Educadores Perú", "http://educadoresperu.com/", NULL);
#
#
DROP TABLE IF EXISTS `secciones`;
#
#
CREATE TABLE `secciones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `seccion` varchar(80) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `color` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `servicios_items`;
#
#
CREATE TABLE `servicios_items` (
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
  `pdf` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `servicios_items` VALUES ("8", "2014-04-02 19:37:17", "2014-04-02 19:37:17", NULL, "1", NULL, "Educadores Perú", "<p> </p>", "ser_1396485437_200x200.jpg", NULL, "doc_1375551344.pdf", "1");
#
#
INSERT INTO `servicios_items` VALUES ("9", "2014-04-02 22:46:08", "2014-04-02 22:46:08", NULL, "1", NULL, "GJAOSCS", "<p> </p>", "ser_1396496768_1063x357.jpg", "Grupo Juvenil de Apoyo y Orientación Social Construyendo Sonrisas", NULL, "1");
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
  `page` int(10) NOT NULL DEFAULT '1',
  `orden` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `textos_grupos` VALUES ("1", "2014-04-02 23:06:42", "2014-08-21 19:55:02", NULL, "1", "GJAOSCS", "1", "50");
#
#
INSERT INTO `textos_grupos` VALUES ("2", "2014-04-12 00:53:44", "2014-08-21 19:54:49", NULL, "1", "Educadores Perú", "1", "100");
#
#
INSERT INTO `textos_grupos` VALUES ("3", "2014-05-01 11:02:55", "2014-09-09 23:29:52", NULL, "1", "Música", "1", "10");
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
  `id_grupo` int(10) DEFAULT NULL,
  `id_subgrupo` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `foto` varchar(150) DEFAULT NULL,
  `foto_descripcion` varchar(80) DEFAULT NULL,
  `pdf` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  `orden` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `textos_items` VALUES ("1", "2014-04-02 23:16:25", "0000-00-00 00:00:00", NULL, "1", "1", "1", "2011-12-18 00:00:00", "Integrantes del teatro del GJAOSCS", "<p> </p>", "tex_1396498584_945x649.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("2", "2014-04-12 00:56:05", "2014-09-09 22:40:34", NULL, "1", "2", NULL, NULL, "Bienvenidos", "<p style=\"text-align: center;\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=e145d2c6db8c44ae7ba93cbc7606413e%26sc=9970163\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></p>\n<p style=\"text-align: justify;\">Educadoresperu es una web creada para facilitar la labor docente, aminorando la brecha existente entre el estudiante y el profesor.</p>\n<p style=\"text-align: justify; \">La página de Educadoresperu\ncuenta con una aplicación en la cual los profesores pueden subir sus archivos e\ninformación respecto a uno o varios temas dentro de una o varias áreas, esta\ninformación puede ser vista, compartida y descargada por sus estudiantes.\nDentro de esta aplicación los estudiantes pueden comentar o responder a las\npreguntas hechas por los profesores, para ello solo necesitan tener una cuenta\nde Facebook, Hotmail u otros.</p>", "tex_1397282165_77x56.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("3", "2014-04-24 19:09:04", "2014-04-24 19:08:57", NULL, "1", "1", "1", "2011-12-18 00:00:00", "Chocolatada en el frontis de la I.E. Manuel Gonzales Prada - Rimac", "<p><a href=\"https://www.dropbox.com/sh/l15d3iu8tu9cox9/RJwYzniBfb\">Ver fotos</a></p>\n<p> </p>", "tex_1398384538_1920x2560.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("4", "2014-04-24 18:57:09", "0000-00-00 00:00:00", NULL, "1", "1", "1", "2011-12-19 00:00:00", "Chocolatada en el albergue de las madres de la Virgen Niña", "<p>Ver Fotos:</p>\n<ul>\n	<li><a href=\"https://www.dropbox.com/sh/m956nw0gyze89ra/PZpOBOpoks\">Parte 1</a></li>\n	<li><a href=\"https://www.dropbox.com/sh/qdjtz6q9e6nt11e/z9Spd6WXrC\">Parte 2</a></li>\n</ul>\n<p> </p>", "tex_1398383826_2560x1920.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("5", "2014-04-27 21:21:39", "2014-04-27 21:29:04", NULL, "1", "1", "3", NULL, "Campaña A.H. 14 de Febrero", "<p> </p>", "tex_1398651699_1024x768.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("6", "2014-05-01 11:29:53", "2014-05-06 18:09:54", NULL, "1", "3", "4", "2014-05-01 00:00:00", "Baladas del Momento", "<p>Lista de Baladas del momento:</p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Manual – Paty Cantú</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/gY-uaDXTT0k\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p>&nbsp;· &nbsp; &nbsp; &nbsp; &nbsp; Si no te Hubiera Conocido - Luis Fonsi y Cristina Aguilera</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/yw2DFBpQKPE\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p>&nbsp; &nbsp;· &nbsp; &nbsp; &nbsp; &nbsp; Hoy Tengo Ganas de Ti - Alejandro Fernandez, Cristina Aguilera</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/Z81hsLIY1sQ\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->Darte un Beso – Prince Royce</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/bdOXnTbyk0g\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->No es Cierto – Danna Paola, Noel Schajris</p>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/Q-N-nKbGfrA\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p><!--[if !supportLists]-->·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n<!--[endif]-->&nbsp;Nuestro Amor Eterno - Luis Fonsi</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/uMQKMWHz4_4\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<p>&nbsp; · &nbsp; &nbsp; &nbsp; &nbsp; Si Tú Supieras - Alejandro Fernandez</p>\n<p><iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/ElF_NuB3LHc\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>", "tex_1398961792_500x378.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("7", "2014-05-01 13:15:14", "2014-05-01 13:33:01", NULL, "1", "1", "5", "2014-05-01 00:00:00", "Dona un libro, por el buen inicio de clases", "<p>Dona un libro, regalémosles un Buen Inicio de Clases,\nnosotros llegamos donde otros no llegarán, y lo hacemos impulsados por el deseo\nde regalarles una sonrisa.</p>\n<p>El Grupo Juvenil de Apoyo y Orientación Social Construyendo\nSonrisas (GJAOSCS), con el apoyo de la Re d de Educadoresperu (EP), realizan la\ncampaña: “Dona un Libro, regalémosles un Buen Inicio de Clases” , con el lema: “Nosotros\nllegamos donde otros no llegarán, y lo hacemos impulsados por el deseo de\nregalarles una sonrisa”. </p>\n<p>El GJAOSCS pretende llegar con sus donaciones a los lugares\ndonde los libros hacen falta, a los lugares donde las autoridades aun no\nbrindan los libros necesarios para el “Buen Inicio del Año Escolar”. Esta\ncampaña pretende sensibilizar a la población en busca del bienestar común del\npueblo y para el pueblo.</p>\n<p>Pueden colaborar comunicándose con nosotros:</p>\n<p><!--[if !supportLists]--><span lang=\"EN-US\">·<span style=\"font-size: 7pt; font-family: \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><!--[endif]-->E-mail\nGJAOSCS: <a href=\"mailto:gjaoscs@gmail.com\">gjaoscs@gmail.com</a></p>\n<p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail Educadoresperu: <a href=\"mailto:informes@educadoresperu.com\"><span lang=\"ES-PE\">informes@educadoresperu.com</span></a></p>\n<p> </p>", "tex_1398968106_1400x800.jpg", NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("8", "2014-05-06 18:13:20", "0000-00-00 00:00:00", NULL, "1", "3", "4", "2014-05-06 00:00:00", "Baladas Románticas", "<ul>\n	<li>Je t\'aime - Lara\nFabian</li>\n</ul>\n<p><iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/YFRu50mylNU\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p>\n<p> </p>\n<ul>\n	<li>d</li>\n	<li>d</li>\n</ul>", NULL, NULL, NULL, "1", NULL);
#
#
INSERT INTO `textos_items` VALUES ("9", "2014-06-12 23:24:09", "2014-06-12 23:37:55", NULL, "1", "1", "6", "2010-01-01 00:00:00", "¿Cómo colaborar?", "<p style=\"text-align: center; \"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><br /></object></p>\n<p style=\"text-align: center; \"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><param name=\"movie\" value=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http://vhss-d.oddcast.com/php/vhss_editors/getvoki/chsm=81eac489a621e1fc586aacd450f1439c%26sc=10002446\"><param name=\"quality\" value=\"high\"><param name=\"allowScriptAccess\" value=\"always\"><param name=\"width\" value=\"200\"><param name=\"height\" value=\"267\"><param name=\"allowNetworking\" value=\"all\"><param name=\"wmode\" value=\"transparent\"><param name=\"allowFullScreen\" value=\"true\"><embed height=\"267\" width=\"200\" src=\"http://vhss-d.oddcast.com/vhss_editors/voki_player.swf?doc=http%3A%2F%2Fvhss-d.oddcast.com%2Fphp%2Fvhss_editors%2Fgetvoki%2Fchsm=81eac489a621e1fc586aacd450f1439c%26sc=10002446\" quality=\"high\" allowscriptaccess=\"always\" allownetworking=\"all\" wmode=\"transparent\" allowfullscreen=\"true\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" name=\"widget_name\"></object></p>\n<p style=\"text-align: center; \"><object height=\"267\" width=\"200\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\"><br /></object></p>\n<p style=\"text-align: center; \">E-mail: gjaoscs@gmail.com</p>\n", NULL, NULL, NULL, "1", NULL);
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `textos_subgrupos` VALUES ("1", "2014-04-02 23:07:12", "0000-00-00 00:00:00", NULL, "1", "2011", "1", "1");
#
#
INSERT INTO `textos_subgrupos` VALUES ("2", "2014-04-12 01:18:59", "0000-00-00 00:00:00", NULL, "1", "Profesores", "2", "1");
#
#
INSERT INTO `textos_subgrupos` VALUES ("3", "2014-04-27 21:28:48", "0000-00-00 00:00:00", NULL, "1", "2013", "1", "1");
#
#
INSERT INTO `textos_subgrupos` VALUES ("4", "2014-05-01 11:03:06", "2014-09-02 11:02:06", NULL, "1", "Baladas", "3", "1");
#
#
INSERT INTO `textos_subgrupos` VALUES ("5", "2014-05-01 13:13:41", "0000-00-00 00:00:00", NULL, "1", "2014", "1", "1");
#
#
INSERT INTO `textos_subgrupos` VALUES ("6", "2014-06-12 23:21:42", "2014-06-12 23:26:44", NULL, "1", "Colabora con GJAOSCS", "1", "1");
#
#
INSERT INTO `textos_subgrupos` VALUES ("7", "2014-09-02 10:40:28", "2014-09-02 10:42:23", NULL, "1", "¿Cómo colaborar?", "1", "1");
#
#
DROP TABLE IF EXISTS `tramites_items`;
#
#
CREATE TABLE `tramites_items` (
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
  `pdf` varchar(150) DEFAULT NULL,
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#
#
DROP TABLE IF EXISTS `turismo_fotos`;
#
#
CREATE TABLE `turismo_fotos` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `turismo_fotos` VALUES ("2", "2014-04-16 18:17:33", "2014-04-16 18:35:33", NULL, "1", "0000-00-00 00:00:00", "Semana Santa en Chancay", "<p style=\"text-align: justify; \">Ahora pueden vivir este tiempo Santo reconciliado con Dios, donde el pueblo de Chancay da a conocer sus tradiciones expresado en sus pasos procesionales. &nbsp;</p>\n<p><span style=\"text-decoration: underline;\"><strong>VIERNES SANTO:</strong></span></p>\n<p style=\"text-align: justify; \">A las 8pm el anda del Santo Sepulcro es colocada en el patio de la Iglesia Matriz, luego de la melodia de la marcha funebre se acerca el anda del Señor de la Agonia, luego de realizar tres venias, se retira para continuar su recorrido y se acerca el anda de Cristo de la Esperanza que rinde homenaje colocándose frente al Santo Sepulcro, para continuar en procesión, pasa también el anda de &nbsp;nuestra Madre Santa en cuyos brazos descansa su hijo; a continuación empieza su recorrido el anda de la Santa Cruz, luego el Santo Sepulcro seguido de su madre dolorosa vestida con un manto negro, con siete espadas clavadas en el corazón, espadas que representan cada una de las siete caídas de nuestro Señor.</p>\n<p style=\"text-align: right; \">César Gamarra Dulanto.</p>", "1");
#
#
DROP TABLE IF EXISTS `turismo_fotos_fotos`;
#
#
CREATE TABLE `turismo_fotos_fotos` (
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("6", "2014-04-16 19:23:14", "2014-04-16 19:29:45", NULL, "1", "2", "turfot_1397694193_651x643.jpg", "Domingo de Resurrección: Cristo de la Resurrección", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("7", "2014-04-16 19:24:02", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694241_640x480.jpg", "Viernes Santo: Virgen de los Dolores", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("8", "2014-04-16 19:25:10", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694308_720x540.jpg", "Santo Sepulcro", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("5", "2014-04-16 19:03:12", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397692991_960x720.jpg", "Domingo de resurrección: La Virgen de los Dolores se despide de su pueblo.", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("9", "2014-04-16 19:26:46", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694401_1536x2048.jpg", "Santísima Cruz", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("13", "2014-04-16 19:31:58", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694717_720x540.jpg", "El Santo Sepulcro en la puerta de la Iglesia Matriz de Chancay", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("11", "2014-04-16 19:28:31", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694511_540x720.jpg", "Cristo de la Esperanza", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("12", "2014-04-16 19:30:36", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694635_720x540.jpg", "El Señor de la Agonía saluda al Señor del Santo Sepulcro", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("14", "2014-04-16 19:34:13", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694849_2048x1536.jpg", "Presentan el Cuerpo sin vida de Cristo ante su Madre Dolorosa", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("15", "2014-04-16 19:35:09", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397694908_960x720.jpg", "Los fieles acompañan al cuerpo de Cristo luego del descendimiento de la cruz", NULL, "1");
#
#
INSERT INTO `turismo_fotos_fotos` VALUES ("17", "2014-04-16 19:40:14", "0000-00-00 00:00:00", NULL, "1", "2", "turfot_1397695212_707x843.jpg", "Viernes Santo: Descendimiento del cuerpo de Cristo de la cruz", NULL, "1");
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
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `genero` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `departamento` int(10) DEFAULT NULL,
  `provincia` int(10) DEFAULT NULL,
  `distrito` int(10) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(80) DEFAULT NULL,
  `status` varchar(80) DEFAULT NULL,
  `usuarios_acceso_nombre` varchar(80) DEFAULT NULL,
  `usuarios_acceso_password` varchar(80) DEFAULT NULL,
  `usuarios_acceso_id_permisos` varchar(80) DEFAULT NULL,
  `id_sesion` int(10) DEFAULT NULL,
  `area` varchar(80) DEFAULT NULL,
  `cole` varchar(80) DEFAULT NULL,
  `id_colegio` int(10) DEFAULT NULL,
  `codigo` varchar(80) DEFAULT NULL,
  `foto` varchar(80) DEFAULT NULL,
  `tags` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_acceso_nombre` (`usuarios_acceso_nombre`),
  UNIQUE KEY `id_sesion` (`id_sesion`),
  FULLTEXT KEY `tags` (`tags`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `usuarios` VALUES ("1", "2014-07-18 15:19:40", "2014-09-01 22:10:11", NULL, "0", "0", "Guillermo", "Lozán", "1", "<span><a class=\"smarterwiki-linkify\" href=\"mailto:guillermolozan@gmail.com\">guil", "14", "8", "16", "jr huiracocha 2193", "951338719", "1", "Profesor Lozán", "prueba", "3", "5", NULL, NULL, "3", NULL, NULL, "san vicente de paul ");
#
#
INSERT INTO `usuarios` VALUES ("2", "2014-07-18 16:41:27", "2014-09-02 10:01:39", NULL, "1", "0", "Cesar", "Gamarra", "1", "profesorgamarra@educadoresperu.com", "14", "8", "36", "Pedro Benvenuto", "992220832", "1", "Profesor Gamarra", "hakunamatata", "3", "6", "Ciencias", "San Vicente de Paul", "4", "0143172205", NULL, "nuestra señora de guadalupe ");
#
#
INSERT INTO `usuarios` VALUES ("3", "2014-08-21 20:15:47", "2014-08-21 20:28:14", NULL, "0", "0", "Esteban", "Perez", "1", "estebanunifiis@hotmail.com", "14", "8", "11", NULL, NULL, "1", "esteban", "profesor", "3", "7", "Química", "Nuestra Señora de Guadalupe", "4", NULL, "usua_1408670147_480x480.jpg", "nuestra señora de guadalupe ");
#
#
INSERT INTO `usuarios` VALUES ("4", "2014-08-24 21:08:11", "2014-09-01 21:51:43", NULL, "1", "0", "Yrma", "Pozo Reyes", "2", "<span><a class=\"smarterwiki-linkify\" href=\"mailto:yrmapozoreyes@gmail.com\">yrmap", "14", "8", "1192", "Av. Gral M. Vivanco 958 Lima 21", "4603885", "1", "Yrma Pozo", "educacion2408", "3", "8", "Educación", "UNMSM", "6", "07049263", NULL, "unmsm ");
#
#
INSERT INTO `usuarios` VALUES ("5", "2014-09-03 12:08:11", "0000-00-00 00:00:00", NULL, "1", "0", "Erik", "Vera Cornejo", "1", "alexanderik_2@hotmail.com", "14", "8", "1192", "Av. El Olivar S/N", "978016493", "1", "Alexander Vera", "teotokos", "3", "9", "Filosofía y Religión", NULL, "4", "1040542534", NULL, "nuestra señora de guadalupe ");
#
#
INSERT INTO `usuarios` VALUES ("6", "2014-09-04 00:03:17", "2014-09-08 22:46:33", NULL, "1", "0", "Francis", "Urdaniga Huanqui", "1", "sapientia.ank@gmail.com", "14", NULL, NULL, NULL, "986036135", "1", "Francis Urdaniga", "focusrite1986", "3", "10", "Arte", NULL, "4", "104436135", NULL, "nuestra señora de guadalupe ");
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
  `nombre` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `id_permisos` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `usuarios_acceso` VALUES ("1", "2012-04-20 10:57:47", "2014-03-25 22:25:31", NULL, "1", "administrador", "hakunamatata", NULL);
#
#
INSERT INTO `usuarios_acceso` VALUES ("5", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Profesor Lozán", "prueba", "3");
#
#
INSERT INTO `usuarios_acceso` VALUES ("6", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Profesor Gamarra", "hakunamatata", "3");
#
#
INSERT INTO `usuarios_acceso` VALUES ("7", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "esteban", "profesor", "3");
#
#
INSERT INTO `usuarios_acceso` VALUES ("8", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Yrma Pozo", "educacion2408", "3");
#
#
INSERT INTO `usuarios_acceso` VALUES ("9", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Alexander Vera", "teotokos", "3");
#
#
INSERT INTO `usuarios_acceso` VALUES ("10", "0000-00-00 00:00:00", "0000-00-00 00:00:00", NULL, "1", "Francis Urdaniga", "focusrite1986", "3");
#
#
DROP TABLE IF EXISTS `usuarios_permisos`;
#
#
CREATE TABLE `usuarios_permisos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `nombre` varchar(80) DEFAULT NULL,
  `texto` longtext,
  `multiusuario` varchar(80) DEFAULT NULL,
  `per_pages` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `usuarios_permisos` VALUES ("1", "2011-11-27 18:50:46", "2014-07-01 10:34:06", NULL, "1", "0", "master", "PRODUCTOS_ITEMS,\nPRODUCTOS_ITEMS_ITEMS,\nPRODUCTOS_STOCK,\nPRODUCTOS_TRASLADOS,\nPRODUCTOS_VENTAS,\nPRODUCTOS_VENTAS_DOCUMENTOS,\nPRODUCTOS_PROGRAMACION,\nPRODUCTOS_PROGRAMACION_SUBITEMS,\nPRODUCTOS_ENTREGAS,\nPRODUCTOS_DOCUMENTOS,\nPRODUCTOS_WARRANTS,\nPRODUCTOS_WARRANTS_SUBITEMS,\nPRODUCTOS_GARANTIAS,\nPRODUCTOS_FOTOS,\nPRODUCTOS_GRUPOS,\nPRODUCTOS_BLOQUES,\nPLACAS_TEMPORALES,\nPRODUCTOS_COLORES,\nPRODUCTOS_PTOVENTA,\nBANCOS_CUENTAS,\nBANCOS,\nPRODUCTOS_UBICACIONES,\nCHOFERES,\nPROVEEDORES,\nPRODUCTOS_STOCK_STATUS,\nTRASLADOS_STATUS,\nJEFES_GARANTIAS,\nSERVICIO_TECNICO,\nSERVICIO_TECNICO2,\nUSUARIO_IMPORTACIONES,\nTRAMITADORES,\nUSUARIOS_PROGRAMACIONES,\nUSUARIOS_ENTREGAS,\nADMINISTRADORES_VENTAS,\nADMINISTRADORES_GENERALES,\nSUPER_ADMINISTRADORES,\nVENTAS_ITEMS?exportar_excel=1,\nCLIENTES?exportar_excel=1,\nVENTAS_MENSAJES?exportar_excel=1&id_jefe|disabled=0&id_usuario|disabled=0,\nVENTAS_STATUS,\nCLIENTES_STATUS,\nMENSAJES_ALERTAS,\nMENSAJES_STATUS,\nUSUARIOS2,\nUSUARIOS,\nSPEECHES,\nCONTACTO_CANALES,\nSERVICIO_TECNIVO,\nPROGRAMACIONES_OPERACIONES", "1", NULL);
#
#
INSERT INTO `usuarios_permisos` VALUES ("3", "2011-11-27 18:51:07", "2014-07-18 12:41:07", NULL, "1", "0", "PROFESORES", "VENTAS_ITEMS,\nVENTAS_MENSAJES", "0", NULL);
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
  `page` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `variables` VALUES ("1", "2013-07-15 08:07:42", "2014-04-20 21:54:04", NULL, "1", "url_facebook", "https://www.facebook.com/educadoresperu", "1");
#
#
INSERT INTO `variables` VALUES ("2", "2013-07-15 08:07:42", "2013-09-21 12:42:33", NULL, "1", "url_youtube", "http://www.youtube.com/my_videos?o=U", "1");
#
#
INSERT INTO `variables` VALUES ("3", "2013-07-15 08:07:42", "2013-10-29 12:07:50", NULL, "1", "url_twitter", "https://twitter.com/MPomabamba?refsrc=email", "1");
#
#
INSERT INTO `variables` VALUES ("4", "2013-07-15 08:07:42", "2013-10-29 12:27:31", NULL, "1", "url_radio", "https://plus.google.com/109501402827514922939/videos", "1");
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
  `nombre` varchar(80) DEFAULT NULL,
  `tags` longtext,
  `user` int(10) NOT NULL DEFAULT '1',
  `area` varchar(80) DEFAULT NULL,
  `id_area` int(10) DEFAULT NULL,
  `clave` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `tags` (`tags`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `ventas_items` VALUES ("1", "2014-07-18 15:24:26", "2014-07-18 15:25:15", NULL, "1", "0", "la feria del libro", NULL, "5", NULL, NULL, NULL);
#
#
INSERT INTO `ventas_items` VALUES ("2", "2014-07-18 15:24:29", "2014-07-18 15:24:49", NULL, "1", "0", "fiestas patrias", NULL, "5", NULL, NULL, NULL);
#
#
INSERT INTO `ventas_items` VALUES ("25", "2014-09-03 11:59:59", "2014-09-09 23:05:46", NULL, "1", "0", "Fisiología de la Digestión y Absorción", "anatomía ", "6", NULL, "6", "NSG");
#
#
INSERT INTO `ventas_items` VALUES ("21", "2014-09-02 11:33:32", "2014-09-09 23:05:52", NULL, "1", "0", "Archivos de Apoyo para los Estudiantes", "física ", "6", "Física", "8", "NSG");
#
#
INSERT INTO `ventas_items` VALUES ("7", "2014-08-21 19:50:25", "0000-00-00 00:00:00", NULL, "1", "0", "Karate", NULL, "7", NULL, NULL, NULL);
#
#
INSERT INTO `ventas_items` VALUES ("22", "2014-09-02 11:37:33", "0000-00-00 00:00:00", NULL, "1", "0", "1", "taller de investigación ii ", "8", NULL, "5", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("23", "2014-09-02 11:37:55", "0000-00-00 00:00:00", NULL, "1", "0", "1", "taller de investigación i ", "8", "Taller de Investigación I", "9", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("24", "2014-09-02 11:38:15", "0000-00-00 00:00:00", NULL, "1", "0", "1", "metodología de la investigación ", "8", "Metodología de la Investigación", "10", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("20", "2014-09-02 11:30:25", "2014-09-09 23:05:58", NULL, "1", "0", "Exposiciones de los Estudiantes", "ciencias ", "6", "Ciencias", "7", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("19", "2014-09-02 11:22:02", "2014-09-09 23:06:07", NULL, "1", "0", "Archivos de apoyo para las tareas", "anatomía ", "6", "Anatomía", "6", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("26", "2014-09-03 12:10:30", "0000-00-00 00:00:00", NULL, "1", "0", "La Creación", "religión ", "9", "Religión", "11", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("27", "2014-09-04 00:05:08", "0000-00-00 00:00:00", NULL, "1", "0", "Archivos para descargar", "arte ", "10", "Arte", "12", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("28", "2014-09-08 23:00:00", "2014-09-09 23:05:28", NULL, "1", "0", "Sistema Reproductor Humano y Desarrollo Embrionario", "anatomía ", "6", NULL, "6", NULL);
#
#
INSERT INTO `ventas_items` VALUES ("29", "2014-09-08 23:08:56", "2014-09-09 23:25:12", NULL, "1", "0", "Partitura La muñeca e Himno a la alegría", "arte ", "10", NULL, "12", NULL);
#
#
DROP TABLE IF EXISTS `ventas_mensajes`;
#
#
CREATE TABLE `ventas_mensajes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_edicion` datetime DEFAULT '0000-00-00 00:00:00',
  `posicion` int(10) DEFAULT NULL,
  `visibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion` tinyint(2) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime DEFAULT '0000-00-00 00:00:00',
  `id_grupo` int(10) DEFAULT NULL,
  `texto` longtext,
  `adjunto` varchar(150) DEFAULT NULL,
  `user` int(10) NOT NULL DEFAULT '1',
  `tags` longtext,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `tags` (`tags`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
#
#
INSERT INTO `ventas_mensajes` VALUES ("1", "0000-00-00 00:00:00", NULL, "1", "0", "2014-07-18 15:39:56", "2", "la bandera del Perú", "atc_1405715992.jpg", "5", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("2", "0000-00-00 00:00:00", NULL, "1", "0", "2014-07-18 15:41:20", "2", "descripcion de word", "atc_1405716061.docx", "5", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("3", "0000-00-00 00:00:00", NULL, "1", "0", "2014-08-21 19:50:57", "7", "<p>CAMPEONATO DE KARATE EN OCTUBRE</p>\n<p> </p>", NULL, "7", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("4", "0000-00-00 00:00:00", NULL, "1", "0", "2014-08-21 19:51:20", "7", "<p>NUEVA PUBLICACION</p>\n<p> </p>", NULL, "7", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("5", "2014-08-27 01:49:49", NULL, "1", "0", "2014-08-27 01:46:37", "9", "<div style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><strong>Exposiciones de los estudiantes</strong></span></div><div style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><strong><br /></strong></span></div><div style=\"text-align: left;\"><strong>Dar clic para descargar:</strong></div><p> </p>\n<ul>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/Exposiciones%20Estudiantes/Algunas%20Drogas.pptx\">Algunas Drogas</a></li>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/Exposiciones%20Estudiantes/Nervios%20Craneales.pptx\">Nervios Craneales</a></li>\n</ul>\n<p> </p>", NULL, "1", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("6", "0000-00-00 00:00:00", NULL, "1", "0", "2014-08-27 01:55:51", "5", "<div style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><strong>Exposiciones de los estudiantes</strong></span></div><p> </p>\n<p>(Dar clic para descargar)</p>\n<p> </p>\n<p><strong><em>2014</em><em>:</em></strong></p>\n<p> </p>\n<ul>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/Exposiciones%20Estudiantes/Algunas%20Drogas.pptx\">Algunas Drogas</a></li>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/Exposiciones%20Estudiantes/Nervios%20Craneales.pptx\">Nervios Craneales</a></li>\n</ul>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("7", "2014-09-02 11:04:59", NULL, "1", "0", "2014-08-27 23:57:45", "3", "<p>Separatas para compartir:</p>\n<p> </p>\n<ul>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/TEORIA%20FISICA%20Est%C3%A1tica.doc\">Estática</a></li>\n</ul>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("8", "0000-00-00 00:00:00", NULL, "1", "0", "2014-09-01 21:29:10", "4", "<ul>\n	<li>Sistema Nervioso:</li><ul>\n	<li><a href=\"http://educadoresperu.com/news_items/60/cerebro-brain-anatomy-and-functions\">Estructura y Funciones del Cerebro</a></li>\n</ul>\n<p>\n	<li>Aparato Reproductor Humano (<a href=\"https://dl.dropboxusercontent.com/u/49345689/Diapos%20EducadoresPeru/Sistema%20Reproductor%20Humano%20y%20desarrollo%20embrionario.pptx\">Ver Diapositivas</a>)</li>\n</ul>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("9", "0000-00-00 00:00:00", NULL, "1", "0", "2014-09-02 11:24:18", "19", "<p>&nbsp;Diapositivas para descargar:</p>\n<ul>\n	<li>Sistema Nervioso:</li><ul>\n	<li><a href=\"http://educadoresperu.com/news_items/60/cerebro-brain-anatomy-and-functions\">Estructura y Funciones del Cerebro</a></li>\n</ul>\n<p> </p>\n<li>Aparato Reproductor Humano (<a href=\"https://dl.dropboxusercontent.com/u/49345689/Diapos%20EducadoresPeru/Sistema%20Reproductor%20Humano%20y%20desarrollo%20embrionario.pptx\">Ver Diapositivas</a>)</li>\n</ul>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("10", "0000-00-00 00:00:00", NULL, "1", "0", "2014-09-02 11:31:55", "20", "<p> </p>\n<div style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><strong>Exposiciones de los estudiantes</strong></span></div><p> </p>\n<p>Para descargar deberá dar clic sobre el título de su preferencia.</p>\n<p> </p>\n<p><strong><em>2014</em><em>:</em></strong></p>\n<p> </p>\n<ul>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/Exposiciones%20Estudiantes/Algunas%20Drogas.pptx\">Algunas Drogas</a></li>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/Exposiciones%20Estudiantes/Nervios%20Craneales.pptx\">Nervios Craneales</a></li>\n</ul>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("11", "2014-09-03 11:33:07", NULL, "1", "0", "2014-09-02 11:33:52", "21", "<p>Separatas para compartir:</p>\n<p> </p>\n<ul>\n	<li><a href=\"https://dl.dropboxusercontent.com/u/49345689/TEORIA%20FISICA%20Est%C3%A1tica.doc\">Estática</a></li>\n</ul>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("12", "2014-09-09 00:24:04", NULL, "1", "0", "2014-09-03 12:00:47", "25", "<p> </p>\n<p> </p>\n<p>(<a href=\"https://www.dropbox.com/s/vopawjnpvd6ynwf/2%20FISIOLOGIA%20DE%20DIGESTION%20Y%20ABSORCION%20%286%29.pdf?dl=0\">Descargar archivo</a>)</p>\n<p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("13", "2014-09-03 12:17:08", NULL, "1", "0", "2014-09-03 12:15:40", "26", "<p> </p>\n<div style=\"text-align: justify;\">1º día: Dios separa la\nluz de las tinieblas, es la creación del día y la noche. Desde este momento,\ncomienza el tiempo, antes existía sólo Dios en su eternidad.</div><div style=\"text-align: justify;\"><font size=\"3\"><span style=\"line-height: 24px;\"><br /></span></font></div>\n<p><font size=\"3\"><div style=\"text-align: justify;\"><span style=\"line-height: 150%;\">2º día: Dios separa las aguas superiores de las\naguas inferiores, es la creación del agua encima del firmamento y del agua de\nbajo del firmamento.</span></div></font></p>\n<div style=\"text-align: justify;\"><br /></div><p><font size=\"3\"><div style=\"text-align: justify;\"><span style=\"line-height: 150%;\">3º día: Dios separa agua y tierra, es la\ncreación de los océanos y el suelo. Surge pues el aire, el agua y la tierra. Empiezan\na crecer las hierbas y las plantas.</span></div></font></p>\n<div style=\"text-align: justify;\"><br /></div><p><font size=\"3\"><div style=\"text-align: justify;\"><span style=\"line-height: 150%;\">4º día: Dios crea los astros: sol, luna y las\nestrellas.</span></div></font></p>\n<p><font size=\"3\"><div style=\"text-align: justify;\"><span style=\"line-height: 150%;\">(A diferencia de las religiones paganas en las\ncuales Dios y los astros se confunden se enumeran los cuerpos celestiales. Hay\nun único Dios Creador, las demás cosas son criaturas.)</span></div></font></p>\n<div style=\"text-align: justify;\"><br /></div><p><font size=\"3\"><div style=\"text-align: justify;\"><span style=\"line-height: 150%;\">5º día: Dios crea los animales, adorna los mares\nde peces y los aires de aves.</span></div></font></p>\n<div style=\"text-align: justify;\"><br /></div><p><font size=\"3\"><div style=\"text-align: justify;\"><span style=\"line-height: 150%;\">6º día: Dios puebla la tierra, crea los animales\ndomésticos y el hombre a su imagen, le pone encima de todas las criaturas.</span></div></font></p>\n<p> </p>\n<p style=\"text-align: justify;\">\n7º día: Dios descansa.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>", "doc_1409764537.docx", "9", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("14", "0000-00-00 00:00:00", NULL, "1", "0", "2014-09-04 00:05:50", "27", "<ul>\n	<li><a href=\"http://educadoresperu.com/news_items/25/arte\">Dibujo y Pintura</a></li>\n</ul>\n<p> </p>", NULL, "10", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("16", "0000-00-00 00:00:00", NULL, "1", "0", "2014-09-08 23:12:43", "28", "<div style=\"text-align: center;\"><span style=\"text-decoration: underline;\"><strong>Sistema Reproductor Humano y Desarrollo Embrionario</strong></span></div><div style=\"text-align: left;\"><br /></div><div style=\"text-align: left;\"><br /></div><div style=\"text-align: right;\">(<a href=\"https://www.dropbox.com/s/b78tr8o1056k94f/Sistema%20Reproductor%20Humano%20y%20desarrollo%20embrionario.pptx?dl=0\">descargar ppt</a>)</div><p> </p>", NULL, "6", NULL);
#
#
INSERT INTO `ventas_mensajes` VALUES ("18", "2014-09-09 23:25:58", NULL, "1", "0", "2014-09-09 22:53:37", "29", "<p><span style=\"text-align: justify;\">Partitura \"La muñeca\" e \"Himno a la alegría\" en nota Re grave.</span></p>\n<div style=\"text-align: justify;\">A continuación podrá descargar el archivo adjunto:&nbsp;</div>", "doc_1410321212.docx", "10", NULL);
#
#
