-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myt_imagen`
--

CREATE TABLE IF NOT EXISTS `myt_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrearchivo` varchar(200) COLLATE utf8_bin NOT NULL,
  `alt` varchar(300) COLLATE utf8_bin NOT NULL,
  `idtotal` int(11) NOT NULL,
  `tabla` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myt_locale`
--

CREATE TABLE IF NOT EXISTS `myt_locale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` text COLLATE utf8_bin NOT NULL,
  `tabla` varchar(200) COLLATE utf8_bin NOT NULL,
  `nombrecampo` varchar(200) COLLATE utf8_bin NOT NULL,
  `idtotal` int(11) NOT NULL,
  `locale` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tabla` (`tabla`,`idtotal`,`locale`),
  KEY `tabla_2` (`tabla`,`nombrecampo`,`idtotal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;
