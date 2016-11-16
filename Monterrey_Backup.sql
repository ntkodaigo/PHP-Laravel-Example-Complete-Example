-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema monterrey
--

CREATE DATABASE IF NOT EXISTS monterrey;
USE monterrey;

--
-- Definition of table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE `almacen` (
  `idcompra` varchar(10) NOT NULL,
  `idproveedor` varchar(8) NOT NULL,
  `idcategoriaproducto` int(10) unsigned NOT NULL,
  `idsubcategoriaproducto` int(10) unsigned NOT NULL,
  `idproducto` int(10) unsigned NOT NULL,
  `fechaalmacen` datetime NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `lote` varchar(45) NOT NULL,
  PRIMARY KEY  (`idcompra`,`idproveedor`,`idcategoriaproducto`,`idsubcategoriaproducto`,`idproducto`),
  CONSTRAINT `FK_almacen_compra` FOREIGN KEY (`idcompra`, `idproveedor`, `idcategoriaproducto`, `idsubcategoriaproducto`, `idproducto`) REFERENCES `compra` (`idcompra`, `idproveedor`, `idcategoriaproducto`, `idsubcategoriaproducto`, `idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `almacen`
--

/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;


--
-- Definition of table `anexotelefono`
--

DROP TABLE IF EXISTS `anexotelefono`;
CREATE TABLE `anexotelefono` (
  `idpersona` varchar(8) NOT NULL,
  `idtipotelefono` int(10) unsigned NOT NULL,
  `idpersonatelefono` int(10) unsigned NOT NULL,
  `idanexo` int(10) unsigned NOT NULL,
  `numeroanexotelefono` varchar(6) NOT NULL,
  PRIMARY KEY  (`idpersona`,`idtipotelefono`,`idpersonatelefono`,`idanexo`),
  CONSTRAINT `FK_anexotelefono_personatelefono` FOREIGN KEY (`idpersona`, `idtipotelefono`, `idpersonatelefono`) REFERENCES `personatelefono` (`idpersona`, `idtipotelefono`, `idpersonatelefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anexotelefono`
--

/*!40000 ALTER TABLE `anexotelefono` DISABLE KEYS */;
/*!40000 ALTER TABLE `anexotelefono` ENABLE KEYS */;


--
-- Definition of table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `idarticulo` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idarticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulo`
--

/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;


--
-- Definition of table `categoriaproducto`
--

DROP TABLE IF EXISTS `categoriaproducto`;
CREATE TABLE `categoriaproducto` (
  `idcategoriaproducto` int(10) unsigned NOT NULL auto_increment,
  `nombrecategoriaproducto` varchar(200) NOT NULL,
  PRIMARY KEY  (`idcategoriaproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoriaproducto`
--

/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` (`idcategoriaproducto`,`nombrecategoriaproducto`) VALUES 
 (1,'abarth'),
 (2,'alfa romeo'),
 (3,'aston martin'),
 (4,'audi'),
 (5,'bentley'),
 (6,'bmw'),
 (7,'bugatti'),
 (8,'byd'),
 (9,'cadillac'),
 (10,'caterham'),
 (11,'citroen'),
 (12,'dacia'),
 (13,'ds'),
 (14,'ferrari'),
 (15,'fiat'),
 (16,'ford'),
 (17,'honda'),
 (18,'hyundai'),
 (19,'infiniti'),
 (20,'isuzu'),
 (21,'jaguar'),
 (22,'jeep'),
 (23,'kia'),
 (24,'lada'),
 (25,'lamborghini'),
 (26,'lancia'),
 (27,'land rover'),
 (28,'lexus'),
 (29,'mahindra'),
 (30,'maserati'),
 (31,'mazda'),
 (32,'mclaren'),
 (33,'mercedes'),
 (34,'mini'),
 (35,'mitsubishi'),
 (36,'morgan'),
 (37,'nissan'),
 (38,'opel'),
 (39,'peugeot'),
 (40,'porsche'),
 (41,'renault'),
 (42,'rolls-royce'),
 (43,'seat'),
 (44,'skoda'),
 (45,'smart'),
 (46,'ssangyong'),
 (47,'subaru'),
 (48,'suzuki'),
 (49,'tata'),
 (50,'tesla'),
 (51,'toyota'),
 (52,'volkswagen'),
 (53,'volvo');
/*!40000 ALTER TABLE `categoriaproducto` ENABLE KEYS */;


--
-- Definition of table `categoriaservicio`
--

DROP TABLE IF EXISTS `categoriaservicio`;
CREATE TABLE `categoriaservicio` (
  `idcategoriaservicio` int(10) unsigned NOT NULL auto_increment,
  `nombrecategoriaservicio` varchar(200) NOT NULL,
  PRIMARY KEY  (`idcategoriaservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoriaservicio`
--

/*!40000 ALTER TABLE `categoriaservicio` DISABLE KEYS */;
INSERT INTO `categoriaservicio` (`idcategoriaservicio`,`nombrecategoriaservicio`) VALUES 
 (1,'revision'),
 (2,'mantenimiento'),
 (3,'reparacion'),
 (4,'modificacion');
/*!40000 ALTER TABLE `categoriaservicio` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` varchar(8) NOT NULL,
  PRIMARY KEY  (`idcliente`),
  CONSTRAINT `FK_cliente_persona` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `clientevehiculo`
--

DROP TABLE IF EXISTS `clientevehiculo`;
CREATE TABLE `clientevehiculo` (
  `idcliente` varchar(8) NOT NULL,
  `idmarca` int(10) unsigned NOT NULL,
  `idmodelo` int(10) unsigned NOT NULL,
  `idvehiculo` varchar(8) NOT NULL,
  PRIMARY KEY  (`idcliente`,`idmarca`,`idmodelo`,`idvehiculo`),
  KEY `FK_clientevehiculo_vehiculo` (`idmarca`,`idmodelo`,`idvehiculo`),
  CONSTRAINT `FK_clientevehiculo_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `FK_clientevehiculo_vehiculo` FOREIGN KEY (`idmarca`, `idmodelo`, `idvehiculo`) REFERENCES `vehiculo` (`idmarca`, `idmodelo`, `idvehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientevehiculo`
--

/*!40000 ALTER TABLE `clientevehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientevehiculo` ENABLE KEYS */;


--
-- Definition of table `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `idcompra` varchar(10) NOT NULL,
  `idproveedor` varchar(8) NOT NULL,
  `idcategoriaproducto` int(10) unsigned NOT NULL,
  `idsubcategoriaproducto` int(10) unsigned NOT NULL,
  `idproducto` int(10) unsigned NOT NULL,
  `fechacompra` datetime NOT NULL,
  `cantidadcompra` int(10) unsigned NOT NULL,
  `preciocompra` double NOT NULL,
  PRIMARY KEY  (`idcompra`,`idproveedor`,`idcategoriaproducto`,`idsubcategoriaproducto`,`idproducto`),
  KEY `FK_compra_proveedorproducto` (`idproveedor`,`idcategoriaproducto`,`idsubcategoriaproducto`,`idproducto`),
  CONSTRAINT `FK_compra_proveedorproducto` FOREIGN KEY (`idproveedor`, `idcategoriaproducto`, `idsubcategoriaproducto`, `idproducto`) REFERENCES `proveedorproducto` (`idproveedor`, `idcategoriaproducto`, `idsubcategoriaproducto`, `idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;


--
-- Definition of table `correoelectronico`
--

DROP TABLE IF EXISTS `correoelectronico`;
CREATE TABLE `correoelectronico` (
  `idpersona` varchar(8) NOT NULL,
  `idcorreoelectronico` int(10) unsigned NOT NULL,
  `direccioncorreoelectronico` varchar(200) NOT NULL,
  PRIMARY KEY  (`idpersona`,`idcorreoelectronico`),
  CONSTRAINT `FK_correoelectronico_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `correoelectronico`
--

/*!40000 ALTER TABLE `correoelectronico` DISABLE KEYS */;
/*!40000 ALTER TABLE `correoelectronico` ENABLE KEYS */;


--
-- Definition of table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `idpais` int(10) unsigned NOT NULL,
  `iddepartamento` int(10) unsigned NOT NULL,
  `nombredepartamento` varchar(100) NOT NULL,
  PRIMARY KEY  (`idpais`,`iddepartamento`),
  CONSTRAINT `FK_departamento_pais` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


--
-- Definition of table `direccionpersona`
--

DROP TABLE IF EXISTS `direccionpersona`;
CREATE TABLE `direccionpersona` (
  `idpersona` varchar(8) NOT NULL,
  `idpais` int(10) unsigned NOT NULL,
  `iddepartamento` int(10) unsigned NOT NULL,
  `idprovincia` int(10) unsigned NOT NULL,
  `iddistrito` int(10) unsigned NOT NULL,
  `iddireccionpersona` int(10) unsigned NOT NULL,
  `nombredireccionpersona` varchar(400) NOT NULL,
  PRIMARY KEY  (`idpersona`,`idpais`,`iddepartamento`,`idprovincia`,`iddistrito`,`iddireccionpersona`),
  KEY `FK_direccionpersona_distrito` (`idpais`,`iddepartamento`,`idprovincia`,`iddistrito`),
  CONSTRAINT `FK_direccionpersona_distrito` FOREIGN KEY (`idpais`, `iddepartamento`, `idprovincia`, `iddistrito`) REFERENCES `distrito` (`idpais`, `iddepartamento`, `idprovincia`, `iddistrito`),
  CONSTRAINT `FK_direccionpersona_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direccionpersona`
--

/*!40000 ALTER TABLE `direccionpersona` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccionpersona` ENABLE KEYS */;


--
-- Definition of table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `idpais` int(10) unsigned NOT NULL,
  `iddepartamento` int(10) unsigned NOT NULL,
  `idprovincia` int(10) unsigned NOT NULL,
  `iddistrito` int(10) unsigned NOT NULL,
  `nombredistrito` varchar(100) NOT NULL,
  PRIMARY KEY  (`idpais`,`iddistrito`,`idprovincia`,`iddepartamento`),
  KEY `FK_distrito_provincia` (`idpais`,`iddepartamento`,`idprovincia`),
  CONSTRAINT `FK_distrito_provincia` FOREIGN KEY (`idpais`, `iddepartamento`, `idprovincia`) REFERENCES `provincia` (`idpais`, `iddepartamento`, `idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distrito`
--

/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;


--
-- Definition of table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `idfactura` varchar(10) NOT NULL,
  `idcliente` varchar(8) NOT NULL,
  `idarticulo` int(10) unsigned NOT NULL,
  `fechaemision` datetime NOT NULL,
  `ordencompra` varchar(45) NOT NULL,
  `documentoreferencial` varchar(45) NOT NULL,
  `guiaremision` varchar(45) NOT NULL,
  `condicionventa` varchar(60) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `preciounitario` double NOT NULL,
  `descuento` double NOT NULL,
  `igv` double NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY  (`idfactura`,`idcliente`,`idarticulo`),
  KEY `FK_factura_cliente` (`idcliente`),
  KEY `FK_factura_articulo` (`idarticulo`),
  CONSTRAINT `FK_factura_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK_factura_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factura`
--

/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;


--
-- Definition of table `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `idgenero` int(10) unsigned NOT NULL auto_increment,
  `nombregenero` varchar(45) NOT NULL,
  PRIMARY KEY  (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genero`
--

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`idgenero`,`nombregenero`) VALUES 
 (1,'masculino'),
 (2,'femenino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;


--
-- Definition of table `impuestofecha`
--

DROP TABLE IF EXISTS `impuestofecha`;
CREATE TABLE `impuestofecha` (
  `idimpuestofecha` int(10) unsigned NOT NULL auto_increment,
  `idtipoimpuesto` int(10) unsigned NOT NULL,
  `porcentajeimpuesto` double NOT NULL,
  `fechaimpuesto` datetime NOT NULL,
  PRIMARY KEY  (`idimpuestofecha`,`idtipoimpuesto`),
  KEY `FK_impuestofecha_tipoimpuesto` (`idtipoimpuesto`),
  CONSTRAINT `FK_impuestofecha_tipoimpuesto` FOREIGN KEY (`idtipoimpuesto`) REFERENCES `tipoimpuesto` (`idtipoimpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impuestofecha`
--

/*!40000 ALTER TABLE `impuestofecha` DISABLE KEYS */;
/*!40000 ALTER TABLE `impuestofecha` ENABLE KEYS */;


--
-- Definition of table `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `idmarca` int(10) unsigned NOT NULL auto_increment,
  `nombremarca` varchar(100) NOT NULL,
  PRIMARY KEY  (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marca`
--

/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


--
-- Definition of table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE `modelo` (
  `idmarca` int(10) unsigned NOT NULL,
  `idmodelo` int(10) unsigned NOT NULL,
  `nombremodelo` varchar(100) NOT NULL,
  PRIMARY KEY  (`idmarca`,`idmodelo`),
  CONSTRAINT `FK_modelo_marca` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modelo`
--

/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;


--
-- Definition of table `nacimientocreacion`
--

DROP TABLE IF EXISTS `nacimientocreacion`;
CREATE TABLE `nacimientocreacion` (
  `idpersona` varchar(8) NOT NULL,
  `fechanacimientocreacion` datetime NOT NULL,
  PRIMARY KEY  (`idpersona`),
  CONSTRAINT `FK_nacimientocreacion_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nacimientocreacion`
--

/*!40000 ALTER TABLE `nacimientocreacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `nacimientocreacion` ENABLE KEYS */;


--
-- Definition of table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `idpais` int(10) unsigned NOT NULL auto_increment,
  `nombrepais` varchar(100) NOT NULL,
  PRIMARY KEY  (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pais`
--

/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`idpais`,`nombrepais`) VALUES 
 (2,'Argelia'),
 (3,'Armenia'),
 (4,'Australia'),
 (5,'Alemania');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;


--
-- Definition of table `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `idpersona` varchar(8) NOT NULL,
  PRIMARY KEY  (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


--
-- Definition of table `personajuridica`
--

DROP TABLE IF EXISTS `personajuridica`;
CREATE TABLE `personajuridica` (
  `idpersonajuridica` varchar(8) NOT NULL,
  `razonsocial` varchar(400) NOT NULL,
  `ruc` varchar(15) NOT NULL,
  PRIMARY KEY  (`idpersonajuridica`),
  CONSTRAINT `FK_personajuridica_persona` FOREIGN KEY (`idpersonajuridica`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personajuridica`
--

/*!40000 ALTER TABLE `personajuridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `personajuridica` ENABLE KEYS */;


--
-- Definition of table `personajuridicaimpuestofecha`
--

DROP TABLE IF EXISTS `personajuridicaimpuestofecha`;
CREATE TABLE `personajuridicaimpuestofecha` (
  `idpersonajuridica` varchar(8) NOT NULL,
  `idtipoimpuesto` int(10) unsigned NOT NULL,
  `idimpuestofecha` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idpersonajuridica`,`idtipoimpuesto`,`idimpuestofecha`),
  KEY `FK_personajuridicaimpuestofecha_impuestofecha` (`idimpuestofecha`,`idtipoimpuesto`),
  CONSTRAINT `FK_personajuridicaimpuestofecha_impuestofecha` FOREIGN KEY (`idimpuestofecha`, `idtipoimpuesto`) REFERENCES `impuestofecha` (`idimpuestofecha`, `idtipoimpuesto`),
  CONSTRAINT `FK_personajuridicaimpuestofecha_personajuridica` FOREIGN KEY (`idpersonajuridica`) REFERENCES `personajuridica` (`idpersonajuridica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personajuridicaimpuestofecha`
--

/*!40000 ALTER TABLE `personajuridicaimpuestofecha` DISABLE KEYS */;
/*!40000 ALTER TABLE `personajuridicaimpuestofecha` ENABLE KEYS */;


--
-- Definition of table `personanatural`
--

DROP TABLE IF EXISTS `personanatural`;
CREATE TABLE `personanatural` (
  `idpersonanatural` varchar(8) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellido_paterno` varchar(45) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  PRIMARY KEY  (`idpersonanatural`),
  CONSTRAINT `FK_personanatural_personanatural` FOREIGN KEY (`idpersonanatural`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personanatural`
--

/*!40000 ALTER TABLE `personanatural` DISABLE KEYS */;
/*!40000 ALTER TABLE `personanatural` ENABLE KEYS */;


--
-- Definition of table `personanaturalgenero`
--

DROP TABLE IF EXISTS `personanaturalgenero`;
CREATE TABLE `personanaturalgenero` (
  `idpersonanatural` varchar(8) NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idpersonanatural`,`idgenero`),
  KEY `FK_personanaturalgenero_genero` (`idgenero`),
  CONSTRAINT `FK_personanaturalgenero_genero` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`idgenero`),
  CONSTRAINT `FK_personanaturalgenero_personanatural` FOREIGN KEY (`idpersonanatural`) REFERENCES `personanatural` (`idpersonanatural`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personanaturalgenero`
--

/*!40000 ALTER TABLE `personanaturalgenero` DISABLE KEYS */;
/*!40000 ALTER TABLE `personanaturalgenero` ENABLE KEYS */;


--
-- Definition of table `personanaturaltipodocumento`
--

DROP TABLE IF EXISTS `personanaturaltipodocumento`;
CREATE TABLE `personanaturaltipodocumento` (
  `idpersonanatural` varchar(8) NOT NULL,
  `idtipodocumento` int(10) unsigned NOT NULL,
  `numerodocumento` varchar(45) NOT NULL,
  PRIMARY KEY  (`idpersonanatural`,`idtipodocumento`),
  KEY `FK_personanaturaltipodocumento_tipodocumento` (`idtipodocumento`),
  CONSTRAINT `FK_personanaturaltipodocumento_personanatural` FOREIGN KEY (`idpersonanatural`) REFERENCES `personanatural` (`idpersonanatural`),
  CONSTRAINT `FK_personanaturaltipodocumento_tipodocumento` FOREIGN KEY (`idtipodocumento`) REFERENCES `tipodocumento` (`idtipodocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personanaturaltipodocumento`
--

/*!40000 ALTER TABLE `personanaturaltipodocumento` DISABLE KEYS */;
/*!40000 ALTER TABLE `personanaturaltipodocumento` ENABLE KEYS */;


--
-- Definition of table `personanaturaltipoprofesion`
--

DROP TABLE IF EXISTS `personanaturaltipoprofesion`;
CREATE TABLE `personanaturaltipoprofesion` (
  `idpersonanatural` varchar(8) NOT NULL,
  `idtipoprofesion` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idpersonanatural`,`idtipoprofesion`),
  KEY `FK_personanaturaltipoprofesion_tipoprofesion` (`idtipoprofesion`),
  CONSTRAINT `FK_personanaturaltipoprofesion_personanatural` FOREIGN KEY (`idpersonanatural`) REFERENCES `personanatural` (`idpersonanatural`),
  CONSTRAINT `FK_personanaturaltipoprofesion_tipoprofesion` FOREIGN KEY (`idtipoprofesion`) REFERENCES `tipoprofesion` (`idtipoprofesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personanaturaltipoprofesion`
--

/*!40000 ALTER TABLE `personanaturaltipoprofesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `personanaturaltipoprofesion` ENABLE KEYS */;


--
-- Definition of table `personatelefono`
--

DROP TABLE IF EXISTS `personatelefono`;
CREATE TABLE `personatelefono` (
  `idpersona` varchar(8) NOT NULL,
  `idtipotelefono` int(10) unsigned NOT NULL,
  `idpersonatelefono` int(10) unsigned NOT NULL,
  `numeropersonatelefono` varchar(15) NOT NULL,
  PRIMARY KEY  (`idpersona`,`idtipotelefono`,`idpersonatelefono`),
  KEY `FK_personatelefono_tipotelefono` (`idtipotelefono`),
  CONSTRAINT `FK_personatelefono_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `FK_personatelefono_tipotelefono` FOREIGN KEY (`idtipotelefono`) REFERENCES `tipotelefono` (`idtipotelefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personatelefono`
--

/*!40000 ALTER TABLE `personatelefono` DISABLE KEYS */;
/*!40000 ALTER TABLE `personatelefono` ENABLE KEYS */;


--
-- Definition of table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idcategoriaproducto` int(10) unsigned NOT NULL,
  `idsubcategoriaproducto` int(10) unsigned NOT NULL,
  `idproducto` int(10) unsigned NOT NULL,
  `codigoproducto` varchar(45) NOT NULL,
  `nombreproducto` varchar(200) NOT NULL,
  `marcaproducto` varchar(45) NOT NULL,
  `modeloproducto` varchar(45) NOT NULL,
  `descripcionproducto` varchar(400) NOT NULL,
  PRIMARY KEY  (`idcategoriaproducto`,`idsubcategoriaproducto`,`idproducto`),
  KEY `FK_producto_articulo` (`idproducto`),
  CONSTRAINT `FK_producto_articulo` FOREIGN KEY (`idproducto`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK_producto_subcategoriaproducto` FOREIGN KEY (`idcategoriaproducto`, `idsubcategoriaproducto`) REFERENCES `subcategoriaproducto` (`idcategoriaproducto`, `idsubcategoriaproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Definition of table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `idproveedor` varchar(8) NOT NULL,
  PRIMARY KEY  (`idproveedor`),
  CONSTRAINT `FK_proveedor_persona` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


--
-- Definition of table `proveedorproducto`
--

DROP TABLE IF EXISTS `proveedorproducto`;
CREATE TABLE `proveedorproducto` (
  `idproveedor` varchar(8) NOT NULL,
  `idcategoriaproducto` int(10) unsigned NOT NULL,
  `idsubcategoriaproducto` int(10) unsigned NOT NULL,
  `idproducto` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idproveedor`,`idcategoriaproducto`,`idsubcategoriaproducto`,`idproducto`),
  KEY `FK_proveedorproducto_producto` (`idcategoriaproducto`,`idsubcategoriaproducto`,`idproducto`),
  CONSTRAINT `FK_proveedorproducto_producto` FOREIGN KEY (`idcategoriaproducto`, `idsubcategoriaproducto`, `idproducto`) REFERENCES `producto` (`idcategoriaproducto`, `idsubcategoriaproducto`, `idproducto`),
  CONSTRAINT `FK_proveedorproducto_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedorproducto`
--

/*!40000 ALTER TABLE `proveedorproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedorproducto` ENABLE KEYS */;


--
-- Definition of table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `idpais` int(10) unsigned NOT NULL,
  `iddepartamento` int(10) unsigned NOT NULL,
  `idprovincia` int(10) unsigned NOT NULL,
  `nombreprovincia` varchar(100) NOT NULL,
  PRIMARY KEY  (`idpais`,`iddepartamento`,`idprovincia`),
  CONSTRAINT `FK_provincia_departamento` FOREIGN KEY (`idpais`, `iddepartamento`) REFERENCES `departamento` (`idpais`, `iddepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provincia`
--

/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;


--
-- Definition of table `revision`
--

DROP TABLE IF EXISTS `revision`;
CREATE TABLE `revision` (
  `idrevision` varchar(10) NOT NULL,
  `idtecnico` varchar(8) NOT NULL,
  `idcliente` varchar(8) NOT NULL,
  `idvehiculo` varchar(8) default NULL,
  `idcategoriaservicio` int(10) unsigned NOT NULL,
  `idsubcategoriaservicio` int(10) unsigned NOT NULL,
  `idservicio` int(10) unsigned NOT NULL,
  `kilometrajerevision` double NOT NULL,
  `estadorevision` varchar(45) NOT NULL,
  `tiemporeparacion` int(10) unsigned NOT NULL,
  `fecharevision` datetime NOT NULL,
  `fecharevisionposterior` datetime NOT NULL,
  `periodorevision` varchar(100) NOT NULL,
  `idmarca` int(10) unsigned NOT NULL,
  `idmodelo` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idrevision`),
  KEY `FK_revision_tecnico` (`idtecnico`),
  KEY `FK_revision_clientevehiculo` (`idcliente`,`idmarca`,`idmodelo`,`idvehiculo`),
  KEY `FK_revision_servicio` (`idcategoriaservicio`,`idsubcategoriaservicio`,`idservicio`),
  CONSTRAINT `FK_revision_clientevehiculo` FOREIGN KEY (`idcliente`, `idmarca`, `idmodelo`, `idvehiculo`) REFERENCES `clientevehiculo` (`idcliente`, `idmarca`, `idmodelo`, `idvehiculo`),
  CONSTRAINT `FK_revision_servicio` FOREIGN KEY (`idcategoriaservicio`, `idsubcategoriaservicio`, `idservicio`) REFERENCES `servicio` (`idcategoriaservicio`, `idsubcategoriaservicio`, `idservicio`),
  CONSTRAINT `FK_revision_tecnico` FOREIGN KEY (`idtecnico`) REFERENCES `tecnico` (`idtecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revision`
--

/*!40000 ALTER TABLE `revision` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision` ENABLE KEYS */;


--
-- Definition of table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `idcategoriaservicio` int(10) unsigned NOT NULL,
  `idsubcategoriaservicio` int(10) unsigned NOT NULL,
  `idservicio` int(10) unsigned NOT NULL,
  `nombreservicio` varchar(200) NOT NULL,
  PRIMARY KEY  (`idcategoriaservicio`,`idsubcategoriaservicio`,`idservicio`),
  KEY `FK_servicio_articulo` (`idservicio`),
  CONSTRAINT `FK_servicio_articulo` FOREIGN KEY (`idservicio`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `FK_servicio_subcategoriaservicio` FOREIGN KEY (`idcategoriaservicio`, `idsubcategoriaservicio`) REFERENCES `subcategoriaservicio` (`idcategoriaservicio`, `idsubcategoriaservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicio`
--

/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;


--
-- Definition of table `subcategoriaproducto`
--

DROP TABLE IF EXISTS `subcategoriaproducto`;
CREATE TABLE `subcategoriaproducto` (
  `idcategoriaproducto` int(10) unsigned NOT NULL,
  `idsubcategoriaproducto` int(10) unsigned NOT NULL,
  `nombresubcategoriaproducto` varchar(200) NOT NULL,
  PRIMARY KEY  (`idcategoriaproducto`,`idsubcategoriaproducto`),
  CONSTRAINT `FK_subcategoriaproducto_categoriaproducto` FOREIGN KEY (`idcategoriaproducto`) REFERENCES `categoriaproducto` (`idcategoriaproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategoriaproducto`
--

/*!40000 ALTER TABLE `subcategoriaproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcategoriaproducto` ENABLE KEYS */;


--
-- Definition of table `subcategoriaservicio`
--

DROP TABLE IF EXISTS `subcategoriaservicio`;
CREATE TABLE `subcategoriaservicio` (
  `idcategoriaservicio` int(10) unsigned NOT NULL,
  `idsubcategoriaservicio` int(10) unsigned NOT NULL,
  `nombresubcategoriaservicio` varchar(200) NOT NULL,
  PRIMARY KEY  (`idcategoriaservicio`,`idsubcategoriaservicio`),
  CONSTRAINT `FK_subcategoriaservicio_categoriaservicio` FOREIGN KEY (`idcategoriaservicio`) REFERENCES `categoriaservicio` (`idcategoriaservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategoriaservicio`
--

/*!40000 ALTER TABLE `subcategoriaservicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcategoriaservicio` ENABLE KEYS */;


--
-- Definition of table `sugerenciaprecioarticulo`
--

DROP TABLE IF EXISTS `sugerenciaprecioarticulo`;
CREATE TABLE `sugerenciaprecioarticulo` (
  `idsugerenciaprecioarticulo` int(10) unsigned NOT NULL,
  `idarticulo` int(10) unsigned NOT NULL,
  `fechaarticulo` datetime NOT NULL,
  `preciosugerido` double NOT NULL,
  `descuentosugerido` double NOT NULL,
  PRIMARY KEY  (`idsugerenciaprecioarticulo`,`idarticulo`),
  KEY `FK_sugerenciaprecioarticulo_articulo` (`idarticulo`),
  CONSTRAINT `FK_sugerenciaprecioarticulo_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sugerenciaprecioarticulo`
--

/*!40000 ALTER TABLE `sugerenciaprecioarticulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sugerenciaprecioarticulo` ENABLE KEYS */;


--
-- Definition of table `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
CREATE TABLE `tecnico` (
  `idtecnico` varchar(8) NOT NULL,
  PRIMARY KEY  (`idtecnico`),
  CONSTRAINT `FK_tecnico_personanatural` FOREIGN KEY (`idtecnico`) REFERENCES `personanatural` (`idpersonanatural`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tecnico`
--

/*!40000 ALTER TABLE `tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tecnico` ENABLE KEYS */;


--
-- Definition of table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
CREATE TABLE `tipodocumento` (
  `idtipodocumento` int(10) unsigned NOT NULL auto_increment,
  `nombretipodocumento` varchar(45) default NULL,
  PRIMARY KEY  (`idtipodocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipodocumento`
--

/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` (`idtipodocumento`,`nombretipodocumento`) VALUES 
 (1,'DNI'),
 (2,'Carnet de extranjeria'),
 (3,'Pasaporte'),
 (4,'Partida de nacimiento');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;


--
-- Definition of table `tipoimpuesto`
--

DROP TABLE IF EXISTS `tipoimpuesto`;
CREATE TABLE `tipoimpuesto` (
  `idtipoimpuesto` int(10) unsigned NOT NULL auto_increment,
  `nombretipoimpuesto` varchar(45) NOT NULL,
  PRIMARY KEY  (`idtipoimpuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoimpuesto`
--

/*!40000 ALTER TABLE `tipoimpuesto` DISABLE KEYS */;
INSERT INTO `tipoimpuesto` (`idtipoimpuesto`,`nombretipoimpuesto`) VALUES 
 (1,'igv'),
 (2,'retencion'),
 (3,'detraccion'),
 (4,'renta');
/*!40000 ALTER TABLE `tipoimpuesto` ENABLE KEYS */;


--
-- Definition of table `tipoprofesion`
--

DROP TABLE IF EXISTS `tipoprofesion`;
CREATE TABLE `tipoprofesion` (
  `idtipoprofesion` int(10) unsigned NOT NULL auto_increment,
  `nombretipoprofesion` varchar(45) default NULL,
  PRIMARY KEY  (`idtipoprofesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoprofesion`
--

/*!40000 ALTER TABLE `tipoprofesion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoprofesion` ENABLE KEYS */;


--
-- Definition of table `tipotelefono`
--

DROP TABLE IF EXISTS `tipotelefono`;
CREATE TABLE `tipotelefono` (
  `idtipotelefono` int(10) unsigned NOT NULL auto_increment,
  `nombretipotelefono` varchar(45) default NULL,
  PRIMARY KEY  (`idtipotelefono`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipotelefono`
--

/*!40000 ALTER TABLE `tipotelefono` DISABLE KEYS */;
INSERT INTO `tipotelefono` (`idtipotelefono`,`nombretipotelefono`) VALUES 
 (1,'movistar'),
 (2,'fijo'),
 (3,'nextel'),
 (4,'rpm'),
 (5,'rpc'),
 (6,'bitel'),
 (7,'entel');
/*!40000 ALTER TABLE `tipotelefono` ENABLE KEYS */;


--
-- Definition of table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `idmarca` int(10) unsigned NOT NULL,
  `idmodelo` int(10) unsigned NOT NULL,
  `idvehiculo` varchar(8) NOT NULL,
  `añovehiculo` int(10) unsigned NOT NULL,
  `numeroplacavehivulo` varchar(45) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  PRIMARY KEY  (`idmarca`,`idmodelo`,`idvehiculo`),
  CONSTRAINT `FK_vehiculo_modelo` FOREIGN KEY (`idmarca`, `idmodelo`) REFERENCES `modelo` (`idmarca`, `idmodelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiculo`
--

/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
