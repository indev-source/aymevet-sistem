/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : eymevet

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 10/01/2020 18:03:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bussines
-- ----------------------------
DROP TABLE IF EXISTS `bussines`;
CREATE TABLE `bussines`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_exterior` int(11) NOT NULL,
  `numero_interior` int(11) NOT NULL DEFAULT 0,
  `tarjeta` double NOT NULL,
  `estatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bussines
-- ----------------------------
INSERT INTO `bussines` VALUES (1, 'Bodega', 'colinas', 'Las aguilas', 'Chiapas', 'Tuxtla', 'Mexico', 0, 164, 5.5, 'activo', NULL, NULL);
INSERT INTO `bussines` VALUES (4, 'Ruta Costa', 'Conocido Tonala', 'Arriaga', 'Tapachula', 'costa', 'mexico', 1, 0, 3, 'activo', NULL, NULL);
INSERT INTO `bussines` VALUES (5, 'Ruta Altos Fraylesca', 'Conocido', 'Chiapa de corzo', 'Chicomuselo', 'Ocosingo', 'México', 1, 0, 3, 'activo', NULL, NULL);
INSERT INTO `bussines` VALUES (6, 'Ruta Centro', 'Rizo de oro cintalapa', 'cuentas clave', 'Vicente Guerrero', 'Tuxtla GTtz', 'México', 1, 0, 3, 'activo', NULL, NULL);
INSERT INTO `bussines` VALUES (7, 'aguascalientes', 'Pozo de Zafiro', 'Fracc pozo bravo', 'Aguascalientes', 'Aguascalientes', 'México', 1, 0, 3, 'activo', NULL, NULL);

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'sales minerales orales', '2019-07-18 10:36:28', '2019-07-18 10:36:28');
INSERT INTO `categorias` VALUES (2, 'Antibioticos  inyectables', '2019-07-18 10:59:46', '2019-07-18 10:59:46');
INSERT INTO `categorias` VALUES (3, 'Antibioticos orales', '2019-07-18 11:00:01', '2019-07-18 11:00:01');
INSERT INTO `categorias` VALUES (4, 'Vitaminicos inyectables', '2019-07-18 11:00:15', '2019-07-18 11:00:15');
INSERT INTO `categorias` VALUES (5, 'Antiparasitarios inyectables', '2019-07-18 11:00:31', '2019-07-18 11:00:31');
INSERT INTO `categorias` VALUES (6, 'Antiparasitarios Orales', '2019-07-18 11:00:45', '2019-07-18 11:00:45');
INSERT INTO `categorias` VALUES (7, 'Garrapaticidas', '2019-07-18 11:01:47', '2019-07-18 11:01:47');
INSERT INTO `categorias` VALUES (8, 'jeringas intramamrias', '2019-07-18 11:02:58', '2019-07-18 11:02:58');
INSERT INTO `categorias` VALUES (9, 'hormonales', '2019-07-18 11:03:12', '2019-07-18 11:03:12');
INSERT INTO `categorias` VALUES (10, 'instrumental', '2019-07-18 11:03:25', '2019-07-18 11:03:25');
INSERT INTO `categorias` VALUES (11, 'cicatrizantes', '2019-07-22 09:56:58', '2019-07-22 09:56:58');
INSERT INTO `categorias` VALUES (12, 'minerales inyectables', '2019-07-29 10:48:32', '2019-07-29 10:48:32');
INSERT INTO `categorias` VALUES (13, 'vitaminas reconstituyentes', '2019-07-29 10:48:49', '2019-07-29 10:48:49');
INSERT INTO `categorias` VALUES (14, 'premezclas', '2019-07-29 10:49:01', '2019-07-29 10:49:01');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credito_autorizado` double NOT NULL,
  `direccion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `estatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'autorizado',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, 'Kevin Yiovani Mendoza Lopez', 'kevioyioa@gmail.com', '1256766', 1000, 'Calle colinas no 164 fraccionamiento las aguilas', 1, 'autorizado', '2019-07-20 00:24:59', '2019-07-20 00:24:59');
INSERT INTO `clientes` VALUES (2, 'Adan Zebadua', 'adan@hotmail.com', '1256766', 20000, 'rancho la herradura . camino ocozocuautla vicente guerrero', 1, 'autorizado', '2019-07-24 10:05:51', '2020-01-09 17:38:33');

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total` double NOT NULL,
  `tipo_compra` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_pago` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `estatus` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compras
-- ----------------------------
INSERT INTO `compras` VALUES (1, '2019-10-08', 100, 'contado', NULL, '2019-10-08 11:03:20', '2019-10-08 11:03:20', 'pagado');
INSERT INTO `compras` VALUES (2, '2019-10-08', 2, 'contado', NULL, '2019-10-08 11:07:11', '2019-10-08 11:07:11', 'pagado');

-- ----------------------------
-- Table structure for creditos
-- ----------------------------
DROP TABLE IF EXISTS `creditos`;
CREATE TABLE `creditos`  (
  `venta` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `estatus` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'adeudo',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of creditos
-- ----------------------------
INSERT INTO `creditos` VALUES (20, 1, '2020-01-08', 'pagado', '2020-01-09 16:26:20', '2020-01-09 16:26:20');
INSERT INTO `creditos` VALUES (22, 2, '2020-01-09', 'pagado', '2020-01-09 16:13:31', '2020-01-09 16:13:31');
INSERT INTO `creditos` VALUES (23, 3, '2020-01-09', 'pagado', '2020-01-09 16:29:43', '2020-01-09 16:29:43');
INSERT INTO `creditos` VALUES (34, 4, '2020-01-09', 'pagado', '2020-01-09 17:43:07', '2020-01-09 17:43:07');
INSERT INTO `creditos` VALUES (42, 5, '2020-01-09', 'pagado', '2020-01-09 17:42:53', '2020-01-09 17:42:53');

-- ----------------------------
-- Table structure for inventarios
-- ----------------------------
DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE `inventarios`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `existencia` int(11) NOT NULL,
  `costo` double NOT NULL,
  `porcentaje1` double NOT NULL,
  `porcentaje2` double NOT NULL,
  `porcentaje3` double NOT NULL,
  `precio1` double NOT NULL,
  `precio2` double NOT NULL,
  `precio3` double NOT NULL,
  `bussine_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `estatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `iva` double NOT NULL,
  `clave_unidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave_producto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ieps` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `caducidad` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `inventarios_categoria_id_foreign`(`categoria_id`) USING BTREE,
  INDEX `inventarios_bussine_id_foreign`(`bussine_id`) USING BTREE,
  CONSTRAINT `inventarios_bussine_id_foreign` FOREIGN KEY (`bussine_id`) REFERENCES `bussines` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `inventarios_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventarios
-- ----------------------------
INSERT INTO `inventarios` VALUES (1, 'Bovilaza blanca', 'zeo1', 224, 95, 52.6, 68.4, 75, 145, 160, 170, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo1', '01', '0', 'sal mineral adicionada con melaza\r\ncuenta con 13% fósforo y levaduras que ayudan a mejorar la digestibilidad.', 1, 1, '2019-07-18 10:41:50', '2020-01-09 12:42:38', '2020-05-05');
INSERT INTO `inventarios` VALUES (2, 'Bovilaza Roja', 'zeo2', 103, 95, 52.6, 68.4, 75, 145, 160, 170, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo2', '01', '0', 'sal mineralizada con 13% fosforo\r\nideal para mantenimiento de ganado', 1, 1, '2019-07-18 10:44:30', '2020-01-09 17:42:33', '2020-05-05');
INSERT INTO `inventarios` VALUES (3, 'Calphosal Gold SE', 'zeo3', 26, 200, 60, 70, 85, 320, 340, 370, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo3', '01', '0', 'Sal mineral para ganado de alta genetica.\r\nAdicionada con 18% de fosforo y levaduras. que le permiten mejorar la fertilidad del hato y tener mejores parametros reproductivos', 1, 1, '2019-07-18 10:59:01', '2020-01-09 12:42:38', '2019-11-05');
INSERT INTO `inventarios` VALUES (4, 'Calphosal Pro', 'zeo4', 62, 140, 40, 60, 70, 196, 224, 238, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo4', '01', '0', 'Sal mineral adicionada con proteina y monenzina sodica que permite mejorar la digestibilidad dela fibra y ayuda como un coccidicida.', 1, 1, '2019-07-22 10:20:50', '2020-01-09 16:27:04', '2020-02-04');
INSERT INTO `inventarios` VALUES (5, 'zeogan', 'zeo5', 55, 200, 90, 110, 150, 380, 420, 500, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo5', '01', '0', 'sal mineral adicionada con proteina y monencina sodica ademas de promotores el crecimiento', 1, 1, '2019-07-22 10:27:50', '2019-07-22 10:27:50', '2020-04-07');
INSERT INTO `inventarios` VALUES (6, 'zeorumen', 'zeo6', 60, 155, 85.86, 120, 150, 288, 341, 387.5, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo6', '01', '0', 'sal Mineral especializada para desarrollo y engorda de ganado bovino', 1, 1, '2019-07-22 10:31:04', '2019-07-22 10:31:04', '2019-11-06');
INSERT INTO `inventarios` VALUES (7, 'zeorumen', 'zeo6', 145, 155, 85.86, 120, 150, 288, 341, 387.5, 1, NULL, 1, 'activo', 1, 'h-87', 'zeo6', '01', '0', 'sal Mineral especializada para desarrollo y engorda de ganado bovino', 1, 1, '2019-07-22 10:31:04', '2019-07-22 11:21:38', '2019-11-06');
INSERT INTO `inventarios` VALUES (8, 'Nutrimin', 'zeo7', 241, 70, 72, 90, 110, 120, 133, 147, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo7', '01', '0', 'sal mineral adicionada con melaza.\r\nideal para dar sabor a los alimentos y para proveer eequerimientos de mantenimiento.', 1, 1, '2019-07-22 10:36:03', '2019-07-22 10:36:03', '2020-05-05');
INSERT INTO `inventarios` VALUES (9, 'Agromax', 'zeo7', 79, 70, 44, 60, 70, 100.8, 112, 119, 1, NULL, 1, 'inactivo', 0, 'h-87', 'zeo7', '01', '0', 'Sal Mineral de mantenimiento.', 1, 1, '2019-07-22 10:46:00', '2020-01-09 17:42:33', '2020-04-28');
INSERT INTO `inventarios` VALUES (10, 'Ganafhos', 'zeo8', 40, 80, 55, 80, 100, 124, 144, 160, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo7', '01', '0', 'sal mineral adicionada con melaza y es para ganado de mantenimiento', 1, 1, '2019-07-22 10:50:23', '2019-07-22 10:50:23', '2020-01-08');
INSERT INTO `inventarios` VALUES (11, 'Zeorumen H', 'zeo8', 27, 165, 75, 100, 120, 288.75, 330, 363, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo8', '01', '0', 'sal mineral especifica para hembras  adicionada con promotores de crecimiento', 1, 1, '2019-07-22 11:01:07', '2019-07-22 11:01:07', '2020-02-05');
INSERT INTO `inventarios` VALUES (12, 'Calphosal Gold', 'zeo8', 100, 200, 50, 80, 100, 300, 360, 400, 1, NULL, 1, 'activo', 0, 'h-87', 'zeo8', '01', '0', 'Sal Mineral para ganado de alta genetica adicionada con levaduras  que mejoran la eficiencia energetica', 1, 1, '2019-07-22 11:12:35', '2019-07-22 11:12:35', '2019-11-06');
INSERT INTO `inventarios` VALUES (13, 'Leticina 500. ml', 'tor1', 6, 256, 20, 35, 45, 307.2, 345.6, 371.2, 1, NULL, 2, 'activo', 0, 'h-87', 'TOR0025', '1', '0', 'Oxitetraciclina de 50 mg', 21, 3, '2019-07-26 13:26:59', '2019-07-26 13:26:59', '2022-02-22');
INSERT INTO `inventarios` VALUES (14, 'Edo Kolosal de 250 ml', 'edo1', 5, 835, 30, 50, 70, 1085.5, 1252.5, 1419.5, 1, NULL, 4, 'activo', 0, 'h-87', 'edo1', '02', '0', 'vitaminas minerles aminoaciidos y energia', 3, 12, '2019-07-26 13:33:54', '2019-07-26 13:33:54', '2020-03-25');
INSERT INTO `inventarios` VALUES (15, 'Edogen', 'edo2', 3, 900, 40, 50, 60, 1260, 1350, 1440, 1, NULL, 4, 'activo', 0, 'h-87', 'edo2', '02', '0', 'minerales anionicos enfocados a reproduccion.', 3, 12, '2019-07-26 13:39:46', '2020-01-09 12:42:38', '2021-11-30');
INSERT INTO `inventarios` VALUES (16, 'Vitaluade 500 ml', 'marvet', 13, 220, 40, 90, 120, 308, 418, 484, 1, NULL, 4, 'activo', 0, 'h-87', 'mar1', '2', '0', 'Vitaminas ADE', 16, 14, '2019-07-26 14:02:04', '2019-07-26 14:02:04', '2021-06-02');
INSERT INTO `inventarios` VALUES (17, 'Fosel ED', 'lapisa1', 2, 1128, 20, 35, 45, 1353.6, 1522.8, 1635.6, 1, NULL, 4, 'activo', 0, 'h-87', 'lapi2', '1', '0', 'minerales y vitaminas inyectables', 5, 2, '2019-07-26 15:06:23', '2019-07-26 15:06:23', '2021-02-01');
INSERT INTO `inventarios` VALUES (18, 'Suprim 100 ml', 'sup1', 35, 160, 25, 45, 65, 200, 232, 264, 1, NULL, 2, 'activo', 0, 'h-87', 'sup1', '02', '0', 'antibiotico de amplio espectro a base de sulfa trimetropim', 17, 6, '2019-07-26 15:27:53', '2019-07-26 15:27:53', '2022-04-03');
INSERT INTO `inventarios` VALUES (19, 'Phosfonortonic 250 ml', 'veto1', 29, 350, 20, 50, 70, 420, 525, 595, 1, NULL, 4, 'activo', 0, 'h-87', 'veto1', '0003', '0', 'fosforo inyectable', 9, 3, '2019-07-26 15:47:11', '2019-07-26 15:47:11', '2020-03-22');
INSERT INTO `inventarios` VALUES (20, 'Olivitasan 500 ml', '12345678', 44, 785, 40, 60, 80, 1099, 1256, 1413, 1, NULL, 4, 'activo', 0, 'h-87', 'alebet1', '2', '0', 'minerales vitamina y energia inyectable', 9, 11, '2019-07-29 10:47:44', '2019-07-29 10:47:44', '2020-05-30');
INSERT INTO `inventarios` VALUES (21, 'ejemplo (prueba)', '61613164796541', 5, 200, 4, 3, 2, 208, 206, 204, 1, NULL, 10, 'activo', 16, 'h-87', 'qweqweqwe34234r3rwerer', '1', '20', 'esta bien', 4, 4, '2019-08-14 23:48:28', '2019-08-14 23:48:28', '2019-08-15');
INSERT INTO `inventarios` VALUES (22, 'nuevo producto', '10201313012320', 100, 30, 40, 20, 34, 42, 36, 40.2, 1, NULL, 7, 'activo', 0, 'h-87', 'lt90', '023', '33423', 'sin descripción', 13, 8, '2020-01-07 16:20:19', '2020-01-07 16:20:19', '2020-01-31');
INSERT INTO `inventarios` VALUES (23, 'producto nuevo test testing diseños', '10201313012320', 40, 45, 30, 37, 34, 58.5, 61.65, 60.3, 1, NULL, 14, 'activo', 0, 'h-87', 'lt90', '023', '33423', 'sin descripción', 17, 15, '2020-01-07 16:54:05', '2020-01-09 11:00:24', NULL);

-- ----------------------------
-- Table structure for marcas
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES (1, 'Zeocalcico Aymevet', 0, '2019-07-18 10:36:52', '2019-07-18 10:36:52');
INSERT INTO `marcas` VALUES (2, 'Zoetis', 0, '2019-07-18 11:03:48', '2019-07-18 11:03:48');
INSERT INTO `marcas` VALUES (3, 'Laboratorios Edo', 0, '2019-07-18 11:04:07', '2019-07-18 11:04:07');
INSERT INTO `marcas` VALUES (4, 'Pisa', 0, '2019-07-18 11:04:15', '2019-07-18 11:04:15');
INSERT INTO `marcas` VALUES (5, 'Lapisa', 0, '2019-07-18 11:04:23', '2019-07-18 11:04:23');
INSERT INTO `marcas` VALUES (6, 'Bayer', 0, '2019-07-18 11:04:34', '2019-07-18 11:04:34');
INSERT INTO `marcas` VALUES (7, 'Agrovet de México', 0, '2019-07-18 11:04:51', '2019-07-18 11:04:51');
INSERT INTO `marcas` VALUES (8, 'Gortie', 0, '2019-07-18 11:04:59', '2019-07-18 11:04:59');
INSERT INTO `marcas` VALUES (9, 'Vetoquinol', 0, '2019-07-18 11:05:15', '2019-07-18 11:05:15');
INSERT INTO `marcas` VALUES (10, 'Lavet', 0, '2019-07-18 11:05:23', '2019-07-18 11:05:23');
INSERT INTO `marcas` VALUES (11, 'Salud y Bienestar Animal', 0, '2019-07-18 11:05:50', '2019-07-18 11:05:50');
INSERT INTO `marcas` VALUES (12, 'Boheringer', 0, '2019-07-18 11:06:02', '2019-07-18 11:06:02');
INSERT INTO `marcas` VALUES (13, 'Biozoo', 0, '2019-07-18 11:06:10', '2019-07-18 11:06:10');
INSERT INTO `marcas` VALUES (14, 'Syba', 0, '2019-07-18 11:06:22', '2019-07-18 11:06:22');
INSERT INTO `marcas` VALUES (15, 'Ecozoo', 0, '2019-07-18 11:06:29', '2019-07-18 11:06:29');
INSERT INTO `marcas` VALUES (16, 'Wellco', 0, '2019-07-18 11:06:51', '2019-07-18 11:06:51');
INSERT INTO `marcas` VALUES (17, 'Vetilab', 0, '2019-07-18 11:07:08', '2019-07-18 11:07:08');
INSERT INTO `marcas` VALUES (18, 'Promovet', 0, '2019-07-18 11:08:08', '2019-07-18 11:08:08');
INSERT INTO `marcas` VALUES (19, 'Chinoin', 0, '2019-07-18 11:08:17', '2019-07-18 11:08:17');
INSERT INTO `marcas` VALUES (20, 'Microsules', 0, '2019-07-18 11:08:33', '2019-07-18 11:08:33');
INSERT INTO `marcas` VALUES (21, 'Tornel', 0, '2019-07-18 11:08:47', '2019-07-18 11:08:47');
INSERT INTO `marcas` VALUES (22, 'Parfarm', 0, '2019-07-18 11:08:56', '2019-07-18 11:08:56');
INSERT INTO `marcas` VALUES (23, 'MSD', 0, '2019-07-18 11:09:06', '2019-07-18 11:09:06');
INSERT INTO `marcas` VALUES (24, 'Genopharmak', 0, '2019-07-18 11:09:35', '2019-07-18 11:09:35');
INSERT INTO `marcas` VALUES (25, 'Andoci', 0, '2019-07-18 11:09:49', '2019-07-18 11:09:49');
INSERT INTO `marcas` VALUES (26, 'Merial', 0, '2019-07-18 11:10:30', '2019-07-18 11:10:30');
INSERT INTO `marcas` VALUES (27, 'Sanfer', 0, '2019-07-18 11:10:51', '2019-07-18 11:10:51');
INSERT INTO `marcas` VALUES (28, 'Panavet', 0, '2019-07-22 09:53:53', '2019-07-22 09:53:53');
INSERT INTO `marcas` VALUES (29, 'Ourofino', 0, '2019-07-22 09:54:28', '2019-07-22 09:54:28');
INSERT INTO `marcas` VALUES (30, 'Australian Tech', 0, '2019-07-22 09:55:14', '2019-07-22 09:55:14');
INSERT INTO `marcas` VALUES (31, 'Therumo', 0, '2019-07-22 09:55:52', '2019-07-22 09:55:52');
INSERT INTO `marcas` VALUES (32, 'Quimica IQF', 0, '2019-07-22 09:56:13', '2019-07-22 09:56:13');
INSERT INTO `marcas` VALUES (33, 'ale-bet', 0, '2019-07-29 10:48:08', '2019-07-29 10:48:08');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2016_06_01_000001_create_oauth_auth_codes_table', 1);
INSERT INTO `migrations` VALUES (2, '2016_06_01_000002_create_oauth_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1);
INSERT INTO `migrations` VALUES (4, '2016_06_01_000004_create_oauth_clients_table', 1);
INSERT INTO `migrations` VALUES (5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_01_09_211605_create_proveedors_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_01_15_100317_create_clientes_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_01_16_014307_create_categorias_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_01_16_234204_create_bussines_table', 1);
INSERT INTO `migrations` VALUES (10, '2019_01_17_014307_create_inventarios_table', 1);
INSERT INTO `migrations` VALUES (11, '2019_01_17_035732_create_users_table', 1);
INSERT INTO `migrations` VALUES (12, '2019_01_17_035733_create_traspasos_table', 1);
INSERT INTO `migrations` VALUES (13, '2019_01_17_035845_create_orders_table', 1);
INSERT INTO `migrations` VALUES (14, '2019_01_17_040104_create_producto_traspasos_table', 1);
INSERT INTO `migrations` VALUES (15, '2019_01_17_174050_create_compras_table', 1);
INSERT INTO `migrations` VALUES (16, '2019_01_17_174322_create_producto_compras_table', 1);
INSERT INTO `migrations` VALUES (17, '2019_01_17_194258_create_ventas_table', 1);
INSERT INTO `migrations` VALUES (18, '2019_01_17_194346_create_producto_ventas_table', 1);
INSERT INTO `migrations` VALUES (19, '2019_01_18_125633_create_cajas_table', 1);
INSERT INTO `migrations` VALUES (20, '2019_02_12_033646_create_product_orders_table', 1);
INSERT INTO `migrations` VALUES (21, '2019_03_12_211848_create_servicios_table', 1);
INSERT INTO `migrations` VALUES (22, '2019_0_09_211446_create_marcas_table', 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bussine_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `subtotal` double NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pagado',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `orders_bussine_id_foreign`(`bussine_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 1, 1, '2019-05-17', 0, 'terminado', '2019-05-17 19:52:41', '2019-05-17 19:52:41');
INSERT INTO `orders` VALUES (2, 1, 1, '2019-05-27', 41.2, 'terminado', '2019-05-27 23:05:58', '2019-05-27 23:06:08');
INSERT INTO `orders` VALUES (3, 4, 1, '2019-05-28', 391.56000000000006, 'terminado', '2019-05-28 09:01:50', '2019-05-28 09:22:41');
INSERT INTO `orders` VALUES (4, 4, 1, '2019-05-28', 0, 'terminado', '2019-05-28 09:23:02', '2019-05-28 09:23:02');
INSERT INTO `orders` VALUES (5, 1, 1, '2019-07-02', 0, 'proceso', '2019-07-02 17:45:57', '2019-07-02 17:45:57');
INSERT INTO `orders` VALUES (6, 1, 1, '2019-07-04', 0, 'proceso', '2019-07-04 14:36:35', '2019-07-04 14:36:35');
INSERT INTO `orders` VALUES (7, 1, 1, '2019-07-06', 124.8, 'terminado', '2019-07-06 09:43:04', '2019-07-06 09:44:22');
INSERT INTO `orders` VALUES (8, 1, 1, '2019-07-06', 124.8, 'terminado', '2019-07-06 09:44:44', '2019-07-06 09:49:59');
INSERT INTO `orders` VALUES (9, 1, 1, '2019-07-07', 0, 'terminado', '2019-07-07 02:03:07', '2019-07-07 02:05:33');

-- ----------------------------
-- Table structure for pagos
-- ----------------------------
DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos`  (
  `created_at` timestamp(0) NOT NULL,
  `updated_at` timestamp(0) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `credito` int(10) NOT NULL,
  `pago` double NOT NULL,
  `venta` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pagos
-- ----------------------------
INSERT INTO `pagos` VALUES ('2020-01-09 15:53:57', '2020-01-09 15:53:57', 9, 2, 300, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 15:55:03', '2020-01-09 15:55:03', 10, 2, 500, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 15:55:48', '2020-01-09 15:55:48', 11, 2, 450, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 15:56:03', '2020-01-09 15:56:03', 12, 2, 600, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 16:06:57', '2020-01-09 16:06:57', 13, 2, 2, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 16:09:47', '2020-01-09 16:09:47', 14, 2, 10, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 16:13:27', '2020-01-09 16:13:27', 15, 2, 10, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 16:13:31', '2020-01-09 16:13:31', 16, 2, 10, 22);
INSERT INTO `pagos` VALUES ('2020-01-09 16:26:20', '2020-01-09 16:26:20', 17, 1, 112, 20);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:02', '2020-01-09 16:29:02', 18, 3, 60, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:07', '2020-01-09 16:29:07', 19, 3, 35, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:11', '2020-01-09 16:29:11', 20, 3, 27, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:16', '2020-01-09 16:29:16', 21, 3, 638, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:19', '2020-01-09 16:29:19', 22, 3, 60, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:31', '2020-01-09 16:29:31', 23, 3, 930, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:29:43', '2020-01-09 16:29:43', 24, 3, 10, 23);
INSERT INTO `pagos` VALUES ('2020-01-09 16:32:58', '2020-01-09 16:32:58', 25, 4, 450, 34);
INSERT INTO `pagos` VALUES ('2020-01-09 17:42:53', '2020-01-09 17:42:53', 26, 5, 272, 42);
INSERT INTO `pagos` VALUES ('2020-01-09 17:43:07', '2020-01-09 17:43:07', 27, 4, 446, 34);

-- ----------------------------
-- Table structure for product_orders
-- ----------------------------
DROP TABLE IF EXISTS `product_orders`;
CREATE TABLE `product_orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `subtotal` double NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_orders_product_id_foreign`(`product_id`) USING BTREE,
  INDEX `product_orders_order_id_foreign`(`order_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_orders
-- ----------------------------
INSERT INTO `product_orders` VALUES (1, 1, 2, 1, 41.2, 41.2, '2019-05-27 23:06:08', '2019-05-27 23:06:08');
INSERT INTO `product_orders` VALUES (2, 2, 3, 3, 391.56000000000006, 130.52, '2019-05-28 09:22:41', '2019-05-28 09:22:41');

-- ----------------------------
-- Table structure for producto_compras
-- ----------------------------
DROP TABLE IF EXISTS `producto_compras`;
CREATE TABLE `producto_compras`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` double NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `compra_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for producto_traspasos
-- ----------------------------
DROP TABLE IF EXISTS `producto_traspasos`;
CREATE TABLE `producto_traspasos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `traspaso_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `producto_traspasos_traspaso_id_foreign`(`traspaso_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for producto_ventas
-- ----------------------------
DROP TABLE IF EXISTS `producto_ventas`;
CREATE TABLE `producto_ventas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `subtotal` double NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `producto_ventas_venta_id_foreign`(`sale_id`) USING BTREE,
  INDEX `producto_ventas_inventario_id_foreign`(`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto_ventas
-- ----------------------------
INSERT INTO `producto_ventas` VALUES (1, 12, 9, 112, 1, 112, '2020-01-08 15:47:23', '2020-01-08 15:47:23');
INSERT INTO `producto_ventas` VALUES (2, 13, 9, 112, 1, 112, '2020-01-08 16:27:57', '2020-01-08 16:52:20');
INSERT INTO `producto_ventas` VALUES (3, 13, 1, 160, 1, 160, '2020-01-08 16:52:44', '2020-01-08 16:52:44');
INSERT INTO `producto_ventas` VALUES (4, 14, 9, 112, 1, 112, '2020-01-08 17:46:14', '2020-01-08 17:46:14');
INSERT INTO `producto_ventas` VALUES (5, 14, 1, 160, 3, 480, '2020-01-08 17:47:02', '2020-01-08 17:47:02');
INSERT INTO `producto_ventas` VALUES (6, 15, 9, 112, 1, 112, '2020-01-08 17:58:29', '2020-01-08 17:58:29');
INSERT INTO `producto_ventas` VALUES (7, 16, 9, 112, 1, 112, '2020-01-08 17:59:54', '2020-01-08 17:59:54');
INSERT INTO `producto_ventas` VALUES (8, 18, 1, 160, 1, 160, '2020-01-08 18:01:13', '2020-01-08 18:01:13');
INSERT INTO `producto_ventas` VALUES (9, 18, 2, 160, 2, 320, '2020-01-08 18:01:19', '2020-01-08 18:01:19');
INSERT INTO `producto_ventas` VALUES (10, 19, 9, 112, 1, 112, '2020-01-08 18:02:13', '2020-01-08 18:02:13');
INSERT INTO `producto_ventas` VALUES (11, 20, 9, 112, 1, 112, '2020-01-08 18:36:36', '2020-01-08 18:36:36');
INSERT INTO `producto_ventas` VALUES (12, 22, 9, 112, 1, 112, '2020-01-09 12:40:42', '2020-01-09 12:40:42');
INSERT INTO `producto_ventas` VALUES (13, 22, 1, 170, 1, 170, '2020-01-09 12:40:46', '2020-01-09 12:40:46');
INSERT INTO `producto_ventas` VALUES (14, 22, 3, 340, 1, 340, '2020-01-09 12:40:51', '2020-01-09 12:40:51');
INSERT INTO `producto_ventas` VALUES (15, 22, 15, 1260, 1, 1260, '2020-01-09 12:40:59', '2020-01-09 12:40:59');
INSERT INTO `producto_ventas` VALUES (16, 23, 2, 160, 4, 640, '2020-01-09 16:26:50', '2020-01-09 16:26:50');
INSERT INTO `producto_ventas` VALUES (17, 23, 4, 224, 5, 1120, '2020-01-09 16:26:59', '2020-01-09 16:26:59');
INSERT INTO `producto_ventas` VALUES (18, 34, 9, 112, 8, 896, '2020-01-09 16:32:34', '2020-01-09 16:32:34');
INSERT INTO `producto_ventas` VALUES (19, 42, 9, 112, 1, 112, '2020-01-09 17:42:22', '2020-01-09 17:42:22');
INSERT INTO `producto_ventas` VALUES (20, 42, 2, 160, 1, 160, '2020-01-09 17:42:27', '2020-01-09 17:42:27');

-- ----------------------------
-- Table structure for proveedors
-- ----------------------------
DROP TABLE IF EXISTS `proveedors`;
CREATE TABLE `proveedors`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedors
-- ----------------------------
INSERT INTO `proveedors` VALUES (1, 'zeocalcico de mexico,', 'Javiernavarro@zeocalcico.com', '2293307237', '2019-07-18 09:01:30', '2019-07-18 09:01:30');
INSERT INTO `proveedors` VALUES (2, 'AGROVETERINARIA HUIMANGUILLO', 'agroveterinaria_hguillo@hotmail.com', '9373226684', '2019-07-18 09:04:41', '2019-07-18 09:04:41');
INSERT INTO `proveedors` VALUES (3, 'Distribuidor Veterinario EL EDEN', 'eden@hotmail.com', '9612827114', '2019-07-18 09:08:37', '2019-07-18 09:08:37');
INSERT INTO `proveedors` VALUES (4, 'Agroveterinaria Abastos', 'camachito_04@live.com', '9615793688', '2019-07-18 09:10:15', '2019-07-18 09:10:15');
INSERT INTO `proveedors` VALUES (5, 'Farmacia Veterinaria El Bramadero', 'leydi.es@bramadero.com.mx', '9241231484', '2019-07-18 09:14:58', '2019-07-18 09:14:58');
INSERT INTO `proveedors` VALUES (6, 'Ashcam-Accvet', 'ashcamfacturas@gmail.com', '9611559802', '2019-07-18 09:17:03', '2019-07-18 09:17:03');
INSERT INTO `proveedors` VALUES (7, 'Proveedor Veterinario Antonio Hoyos Quiroz', 'atencionprovet@hotmail.com', '6183505', '2019-07-18 09:19:02', '2019-07-18 09:19:02');
INSERT INTO `proveedors` VALUES (8, 'Biozoo comercial', 'VHERNANDEZ@BIOZOO.COM.MX', '9612691266', '2019-07-18 09:21:19', '2019-07-18 09:21:19');
INSERT INTO `proveedors` VALUES (9, 'Comercializadora Ecozoo', 'ventas@ecozoo.com.mx', '9612469612', '2019-07-18 09:23:24', '2019-07-18 09:23:24');
INSERT INTO `proveedors` VALUES (10, 'Nutrysa sa de cv Syva', 'atencion.clientes@nutrysa.com.mx', '9616719843', '2019-07-18 09:25:00', '2019-07-18 09:25:00');
INSERT INTO `proveedors` VALUES (11, 'Agroveterinaria La becerra', 'servidorfacturas@gmail.com', '9231160447', '2019-07-18 09:26:42', '2019-07-18 09:26:42');
INSERT INTO `proveedors` VALUES (12, 'Dipec La Laguna', 'monicamadai@outlook.es', '2871441652', '2019-07-18 09:29:25', '2019-07-18 09:29:25');
INSERT INTO `proveedors` VALUES (13, 'Gortie sa de cv', 'gortiepharma@hotmail.com', '5510632290', '2019-07-18 10:27:54', '2019-07-18 10:27:54');
INSERT INTO `proveedors` VALUES (14, 'WELLCO', 'wellco@hotmail.com', '9611823805', '2019-07-26 13:50:41', '2019-07-26 13:50:41');
INSERT INTO `proveedors` VALUES (15, 'AGROVET DE MEXICO', 'laboratoriosagrovet@gmail.com', '5545117387', '2019-10-14 14:23:09', '2019-10-14 14:23:09');

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_serie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden_servicio` int(11) NOT NULL,
  `tipo_servicio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sin_danios` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sin_odometraje` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_mano_obre` double NOT NULL,
  `precio_consumiblre` double NOT NULL,
  `precio_refacciones` double NOT NULL,
  `total` double NOT NULL,
  `fecha_entrega` date NOT NULL,
  `telefono_cecit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `venta_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `servicios_venta_id_foreign`(`venta_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for traspasos
-- ----------------------------
DROP TABLE IF EXISTS `traspasos`;
CREATE TABLE `traspasos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `envia` int(10) UNSIGNED NOT NULL,
  `recibe` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `estatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enviado',
  `razon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `traspasos_envia_foreign`(`envia`) USING BTREE,
  INDEX `traspasos_recibe_foreign`(`recibe`) USING BTREE,
  INDEX `traspasos_usuario_id_foreign`(`usuario_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of traspasos
-- ----------------------------
INSERT INTO `traspasos` VALUES (1, 1, 1, 1, 'proceso', '-----------', '2020-01-07 17:15:50', '2020-01-07 17:15:50');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bussine_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_bussine_id_foreign`(`bussine_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Jesus Gonzalez', '9615931530', 'jesusgonzalez@outlook.com', '$2y$10$.Q3cdM/VctkTEUHVmw6MCe3QQUNrWauOhN4m.NG8Acw.fFySB0EPG', 'administrador', 1, 'activo', '3yw9WkpwRDbIJINiJhKPwZREKjmS5pTtR8B7eYBvYuRghS7cmCrYi0ZWVw10', NULL, '2019-10-13 12:18:28');
INSERT INTO `users` VALUES (3, 'Andy Cruz', '9611947624', 'andy@gmail.com', '$2y$10$qDe6qnEjdx0/HiSzs9k1vujsZg5Z3Fu13FpzXhSzRNjYtvkF3U2ke', 'administrador', 1, 'activo', 'Sgh0COvgLNwmeUNUI9JoNrfhFCPFoGBwZNSGu6AYMjh7Gw2Z1G6yHQ4ROyJf', '2019-05-27 23:01:37', '2019-07-18 10:50:07');
INSERT INTO `users` VALUES (7, 'Admin', '0000000', 'admin@aymevet.com', '$2y$10$f/TeKXR.Rpt4kyxq.b0kv.QYL20JqUaj7DCo7SWgMHzPT6HZmqLaK', 'administrador', 1, 'activo', NULL, '2019-07-17 09:48:35', NULL);
INSERT INTO `users` VALUES (8, 'Ramon Arreola Mondragon', '9611757891', 'ramonarreola@aymevet.com.mx', '$2y$10$6bkvR10Sy6zlqqMUW11dMOgtvB9lfHApaD7TQP7.CKQ1PY5rxJsku', 'vendedor', 4, 'activo', NULL, '2019-07-18 10:52:53', NULL);
INSERT INTO `users` VALUES (9, 'Marco Antonio Coutiño', '9932426317', 'marcocoutino@aymevet.com.mx', '$2y$10$DqtbcH/NDvOJMzB2lRC6.evV892l2CjBm4KxCqAe.KhyqRfXFQp7O', 'vendedor', 5, 'activo', NULL, '2019-07-18 10:54:14', NULL);
INSERT INTO `users` VALUES (10, 'Ignacio Jonapa Gonzalez', '9612550319', 'ignaciojonapa@aymevet.com', '$2y$10$GfrF69aUNMYZ4.F/zYM1ounRd0TIPDJyJP7Iptt/5GvyHOscpWqfa', 'vendedor', 6, 'activo', NULL, '2019-07-18 10:56:07', NULL);
INSERT INTO `users` VALUES (11, 'Kevin Yeovani Mendoza Lopez', '1256766', 'kevin@gmail.com', '$2y$10$5dhweKvYAW5S.snz.WSege71f9sDE.ERz45x9Qkgw1u60ozRRhaGO', 'administrador', 1, 'activo', NULL, '2019-08-14 11:42:28', NULL);

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cliente` int(11) UNSIGNED NULL DEFAULT NULL,
  `vendedor` int(11) UNSIGNED NOT NULL,
  `sucursal` int(11) UNSIGNED NOT NULL,
  `tipo_venta` enum('contado','credito') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `descuento_p` double NOT NULL DEFAULT 0,
  `descuento_d` double NOT NULL DEFAULT 0,
  `forma_pago` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'proceso',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cliente_relation`(`cliente`) USING BTREE,
  INDEX `sucursal_relation`(`sucursal`) USING BTREE,
  INDEX `vendedor_relation`(`vendedor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ventas
-- ----------------------------
INSERT INTO `ventas` VALUES (1, NULL, 3, 1, NULL, 0, 0, 0, NULL, '2019-07-18', 'proceso', '2019-07-18 23:43:19', '2019-07-18 23:43:19');
INSERT INTO `ventas` VALUES (2, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2019-07-24', 'proceso', '2019-07-24 06:04:03', '2019-07-24 06:04:03');
INSERT INTO `ventas` VALUES (3, NULL, 7, 1, NULL, 0, 0, 0, NULL, '2019-07-24', 'proceso', '2019-07-24 09:50:02', '2019-07-24 09:50:02');
INSERT INTO `ventas` VALUES (4, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2019-07-24', 'proceso', '2019-07-24 10:33:14', '2019-07-24 10:33:14');
INSERT INTO `ventas` VALUES (5, NULL, 7, 1, NULL, 0, 0, 0, NULL, '2019-07-27', 'proceso', '2019-07-27 14:06:39', '2019-07-27 14:06:39');
INSERT INTO `ventas` VALUES (6, NULL, 11, 1, NULL, 0, 0, 0, NULL, '2019-08-14', 'proceso', '2019-08-14 23:44:59', '2019-08-14 23:44:59');
INSERT INTO `ventas` VALUES (7, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2019-10-08', 'proceso', '2019-10-08 11:11:38', '2019-10-08 11:11:38');
INSERT INTO `ventas` VALUES (8, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2019-10-12', 'proceso', '2019-10-12 10:11:27', '2019-10-12 10:11:27');
INSERT INTO `ventas` VALUES (9, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2019-11-30', 'proceso', '2019-11-30 11:49:35', '2019-11-30 11:49:35');
INSERT INTO `ventas` VALUES (10, NULL, 7, 1, NULL, 0, 0, 0, NULL, '2020-01-03', 'proceso', '2020-01-03 10:22:26', '2020-01-03 10:22:26');
INSERT INTO `ventas` VALUES (11, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2020-01-07', 'proceso', '2020-01-07 13:25:05', '2020-01-07 13:25:05');
INSERT INTO `ventas` VALUES (12, 2, 1, 1, NULL, 112, 0, 0, 'contado', '2020-01-08', 'terminado', '2020-01-08 15:46:57', '2020-01-08 15:49:19');
INSERT INTO `ventas` VALUES (13, 2, 1, 1, NULL, 272, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 15:49:20', '2020-01-08 17:41:51');
INSERT INTO `ventas` VALUES (14, 2, 1, 1, 'contado', 592, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 17:44:57', '2020-01-08 17:51:46');
INSERT INTO `ventas` VALUES (15, 2, 1, 1, 'contado', 112, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 17:54:52', '2020-01-08 17:58:37');
INSERT INTO `ventas` VALUES (16, 1, 1, 1, 'contado', 112, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 17:58:38', '2020-01-08 18:00:10');
INSERT INTO `ventas` VALUES (17, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2020-01-08', 'proceso', '2020-01-08 18:00:10', '2020-01-08 18:00:10');
INSERT INTO `ventas` VALUES (18, 2, 1, 1, 'contado', 480, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 18:00:21', '2020-01-08 18:01:23');
INSERT INTO `ventas` VALUES (19, 2, 1, 1, 'contado', 112, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 18:01:24', '2020-01-08 18:02:20');
INSERT INTO `ventas` VALUES (20, 2, 1, 1, 'credito', 112, 0, 0, NULL, '2020-01-08', 'terminado', '2020-01-08 18:02:20', '2020-01-08 18:36:44');
INSERT INTO `ventas` VALUES (21, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2020-01-08', 'proceso', '2020-01-08 18:36:44', '2020-01-08 18:36:44');
INSERT INTO `ventas` VALUES (22, 2, 1, 1, 'credito', 1882, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 12:40:02', '2020-01-09 12:41:04');
INSERT INTO `ventas` VALUES (23, 1, 1, 1, 'credito', 1760, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 12:42:39', '2020-01-09 16:27:04');
INSERT INTO `ventas` VALUES (24, 2, 1, 1, 'contado', 50, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 15:51:13', '2020-01-09 15:52:39');
INSERT INTO `ventas` VALUES (25, 2, 1, 1, 'contado', 300, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 15:53:57', '2020-01-09 15:54:09');
INSERT INTO `ventas` VALUES (26, 2, 1, 1, 'contado', 500, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 15:55:03', '2020-01-09 15:55:03');
INSERT INTO `ventas` VALUES (27, 2, 1, 1, 'contado', 450, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 15:55:48', '2020-01-09 15:55:48');
INSERT INTO `ventas` VALUES (28, 2, 1, 1, 'contado', 600, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 15:56:03', '2020-01-09 15:56:03');
INSERT INTO `ventas` VALUES (29, 2, 1, 1, 'contado', 2, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:06:57', '2020-01-09 16:06:57');
INSERT INTO `ventas` VALUES (30, 2, 1, 1, 'contado', 10, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:09:47', '2020-01-09 16:09:47');
INSERT INTO `ventas` VALUES (31, 2, 1, 1, 'contado', 10, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:13:26', '2020-01-09 16:13:26');
INSERT INTO `ventas` VALUES (32, 2, 1, 1, 'contado', 10, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:13:31', '2020-01-09 16:13:31');
INSERT INTO `ventas` VALUES (33, 2, 1, 1, 'contado', 112, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:26:20', '2020-01-09 16:26:20');
INSERT INTO `ventas` VALUES (34, 1, 1, 1, 'credito', 896, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:27:05', '2020-01-09 16:32:39');
INSERT INTO `ventas` VALUES (35, 1, 1, 1, 'contado', 60, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:02', '2020-01-09 16:29:02');
INSERT INTO `ventas` VALUES (36, 1, 1, 1, 'contado', 35, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:07', '2020-01-09 16:29:07');
INSERT INTO `ventas` VALUES (37, 1, 1, 1, 'contado', 27, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:11', '2020-01-09 16:29:11');
INSERT INTO `ventas` VALUES (38, 1, 1, 1, 'contado', 638, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:15', '2020-01-09 16:29:15');
INSERT INTO `ventas` VALUES (39, 1, 1, 1, 'contado', 60, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:19', '2020-01-09 16:29:19');
INSERT INTO `ventas` VALUES (40, 1, 1, 1, 'contado', 930, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:31', '2020-01-09 16:29:31');
INSERT INTO `ventas` VALUES (41, 1, 1, 1, 'contado', 10, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:29:43', '2020-01-09 16:29:43');
INSERT INTO `ventas` VALUES (42, 1, 1, 1, 'credito', 272, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:32:40', '2020-01-09 17:42:32');
INSERT INTO `ventas` VALUES (43, 1, 1, 1, 'contado', 450, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 16:32:58', '2020-01-09 16:32:58');
INSERT INTO `ventas` VALUES (44, NULL, 1, 1, NULL, 0, 0, 0, NULL, '2020-01-09', 'proceso', '2020-01-09 17:42:33', '2020-01-09 17:42:33');
INSERT INTO `ventas` VALUES (45, 1, 1, 1, 'contado', 272, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 17:42:53', '2020-01-09 17:42:53');
INSERT INTO `ventas` VALUES (46, 1, 1, 1, 'contado', 446, 0, 0, NULL, '2020-01-09', 'terminado', '2020-01-09 17:43:07', '2020-01-09 17:43:07');

-- ----------------------------
-- Procedure structure for get_bussines_index
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_bussines_index`;
delimiter ;;
CREATE PROCEDURE `get_bussines_index`()
select
	id,nombre,tarjeta,estatus
from bussines
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_categories
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_categories`;
delimiter ;;
CREATE PROCEDURE `get_categories`()
select count(*) as numero_productos, categorias.nombre, categorias.id from categorias
left join inventarios on categorias.id = inventarios.categoria_id
group by categorias.nombre
order by numero_productos desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_products_index
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_products_index`;
delimiter ;;
CREATE PROCEDURE `get_products_index`()
select
	inventarios.id,inventarios.nombre,inventarios.codigo,
    concat('number_format('+inventarios.costo+')') as costo,
    inventarios.existencia as stock, inventarios.foto,
	inventarios.clave_producto,inventarios.clave_unidad,inventarios.estatus,
    inventarios.created_at as fecha, bussines.nombre as bussine,
    categorias.nombre as categoria, marcas.nombre as marca, proveedors.nombre_completo as proveedor
from inventarios
inner join bussines on inventarios.bussine_id = bussines.id
inner join categorias on inventarios.categoria_id = categorias.id
inner join marcas on inventarios.marca_id = marcas.id
inner join proveedors on inventarios.proveedor_id = proveedors.id
order by inventarios.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_products_index_seller
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_products_index_seller`;
delimiter ;;
CREATE PROCEDURE `get_products_index_seller`(IN `bussine_id` INT)
select
	inventarios.id, inventarios.nombre, inventarios.codigo,
    inventarios.costo,
    inventarios.iva,
    inventarios.existencia as stock, inventarios.foto,inventarios.created_at as fecha,
    inventarios.clave_unidad, inventarios.clave_producto,
    bussines.nombre as bussine, bussines.id as bussine_id ,
    categorias.nombre as categoria, categorias.id as categoria_id
from inventarios
inner join bussines on inventarios.bussine_id = bussines.id
inner join categorias on inventarios.categoria_id = categorias.id
where inventarios.bussine_id = bussine_id
order by inventarios.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_products_order
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_products_order`;
delimiter ;;
CREATE PROCEDURE `get_products_order`(IN `order_id` INT)
select
	inventarios.nombre as producto,
    product_orders.price,
    product_orders.amount, product_orders.subtotal,
    inventarios.id,
    inventarios.codigo
from orders
inner join product_orders on orders.id = product_orders.order_id
inner join inventarios on product_orders.product_id = inventarios.id
where orders.id = order_id
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_product_by_bussine
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_product_by_bussine`;
delimiter ;;
CREATE PROCEDURE `get_product_by_bussine`(IN `bussine_id` INT)
select
	inventarios.id,inventarios.nombre,inventarios.codigo,
    inventarios.costo,inventarios.marca_id as marca,
    inventarios.proveedor_id as proveedor,
    inventarios.existencia as stock, inventarios.foto,
    categorias.nombre as categoria,bussines.nombre as bussine,
    inventarios.precio1, inventarios.precio2,inventarios.precio3
from inventarios
inner join bussines on inventarios.bussine_id = bussines.id
inner join categorias on inventarios.categoria_id = categorias.id
where inventarios.bussine_id = bussine_id
order by inventarios.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_product_by_category
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_product_by_category`;
delimiter ;;
CREATE PROCEDURE `get_product_by_category`(`category_id` INT)
select
	inventarios.id,inventarios.nombre,inventarios.codigo,
    concat('number_format('+inventarios.costo+')') as costo,
    concat('number_format('+inventarios.precio_Venta+')') as precio,
    inventarios.existencia as stock, inventarios.foto,
    inventarios.created_at as fecha, bussines.nombre as bussine,
    categorias.nombre as categoria, marcas.nombre as marca, proveedors.nombre_completo as proveedor
from inventarios
inner join bussines on inventarios.bussine_id = bussines.id
inner join categorias on inventarios.categoria_id = categorias.id
inner join marcas on inventarios.marca_id = marcas.id
inner join proveedors on inventarios.proveedor_id = proveedors.id
where inventarios.categoria_id = category_id
order by inventarios.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_product_by_code
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_product_by_code`;
delimiter ;;
CREATE PROCEDURE `get_product_by_code`(`code` VARCHAR(100))
select
	inventarios.id,inventarios.nombre,inventarios.codigo,
    inventarios.costo,inventarios.precio_Venta as precio,
    inventarios.existencia as stock, inventarios.foto,
    inventarios.created_at as fecha, bussines.nombre as bussine,
    categorias.nombre as categoria
from inventarios
inner join bussines on inventarios.bussine_id = bussines.id
inner join categorias on inventarios.categoria_id = categorias.id
where inventarios.codigo = code
order by inventarios.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_product_show
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_product_show`;
delimiter ;;
CREATE PROCEDURE `get_product_show`(`product_id` INT)
select
	inventarios.id, inventarios.nombre, inventarios.codigo,
    inventarios.costo,
    inventarios.iva,
    inventarios.existencia as stock, inventarios.foto,inventarios.created_at as fecha,
    inventarios.clave_unidad, inventarios.clave_producto,inventarios.estatus,inventarios.descripcion,
    inventarios.lote,inventarios.ieps,inventarios.caducidad,
    bussines.nombre as bussine, bussines.id as bussine_id ,
    categorias.nombre as categoria, categorias.id as categoria_id,
    marcas.nombre as marca, proveedors.nombre_completo as proveedor,
    marcas.id as marca_id , proveedors.id as proveedor_id,
    inventarios.porcentaje1, inventarios.porcentaje2,inventarios.porcentaje3,
    inventarios.precio1,inventarios.precio2,inventarios.precio3
from inventarios
inner join bussines on inventarios.bussine_id =bussines.id
inner join categorias on inventarios.categoria_id = categorias.id
inner join marcas on inventarios.marca_id = marcas.id
inner join proveedors on inventarios.proveedor_id = proveedors.id
where inventarios.id = product_id
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_sales_index
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_sales_index`;
delimiter ;;
CREATE PROCEDURE `get_sales_index`()
select
	ventas.id,
	ventas.total,ventas.date as fecha,
    bussines.nombre as bussine, users.name as seller,
    ventas.status,ventas.id
from ventas
inner join orders on ventas.order_id = orders.id
inner join bussines on orders.bussine_id = bussines.id
inner join users on orders.user_id = users.id
order by ventas.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_total_general
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_total_general`;
delimiter ;;
CREATE PROCEDURE `get_total_general`()
SELECT
	(select sum(total) from ventas where status = 'pagado') total_ventas,
	sum(inventarios.costo * product_orders.amount ) as inversion,
    ((select sum(total) from ventas where status = 'pagado') - sum(inventarios.costo * product_orders.amount )) as ganancias
FROM distribuidora.ventas
inner join orders on ventas.order_id = orders.id
inner join product_orders on orders.id = product_orders.order_id
inner join inventarios on product_orders.product_id = inventarios.id
where ventas.status = 'pagado'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_usuarios_index
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_usuarios_index`;
delimiter ;;
CREATE PROCEDURE `get_usuarios_index`()
select
	users.id, users.name , users.email, users.status, bussines.nombre as bussine, users.rol
from users
inner join bussines on users.bussine_id = bussines.id
order by users.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for get_usuarios_show
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_usuarios_show`;
delimiter ;;
CREATE PROCEDURE `get_usuarios_show`(IN `user_id` INT)
select
	users.id, users.name , users.email, users.status, bussines.nombre, users.rol,
    users.celular, users.created_at, users.bussine_id
from users
inner join bussines on users.bussine_id = bussines.id
where users.id = user_id
;;
delimiter ;

-- ----------------------------
-- Procedure structure for grafica_ventas
-- ----------------------------
DROP PROCEDURE IF EXISTS `grafica_ventas`;
delimiter ;;
CREATE PROCEDURE `grafica_ventas`(IN `fecha` DATE)
select
 concat('number_format('+sum(ventas.total)+',2,".",",")') as total , bussines.nombre as sucursal
from ventas
inner join bussines on ventas.sucursal = bussines.id
where ventas.estatus = 'pagado' and ventas.fecha = fecha
group by bussines.nombre
;;
delimiter ;

-- ----------------------------
-- Procedure structure for grafica_ventas_index
-- ----------------------------
DROP PROCEDURE IF EXISTS `grafica_ventas_index`;
delimiter ;;
CREATE PROCEDURE `grafica_ventas_index`()
select count(*) as numero_ventas,date as fechas, sum(total) as totales from ventas
where status = 'pagado'
group by date
order by fechas desc
limit 7
;;
delimiter ;

-- ----------------------------
-- Procedure structure for notificaciones_autorizar_traspaso
-- ----------------------------
DROP PROCEDURE IF EXISTS `notificaciones_autorizar_traspaso`;
delimiter ;;
CREATE PROCEDURE `notificaciones_autorizar_traspaso`()
select
	traspasos.id,
    bussines.nombre,
    date(traspasos.created_at ) as fecha
from traspasos
inner join bussines on traspasos.recibe = bussines.id
where traspasos.estatus = 'aceptado'
order by date(traspasos.created_at ) desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for notificaciones_traspasos
-- ----------------------------
DROP PROCEDURE IF EXISTS `notificaciones_traspasos`;
delimiter ;;
CREATE PROCEDURE `notificaciones_traspasos`(`sucursal_recibe` INT)
select count(*) productos, bussines.nombre, traspasos.id,
date(traspasos.created_at) as fecha
 from traspasos
inner join producto_traspasos on traspasos.id = producto_traspasos.traspaso_id
inner join bussines on traspasos.envia = bussines.id
where traspasos.recibe = sucursal_recibe and traspasos.estatus = 'enviado'
group by traspasos.id
order by traspasos.created_at
;;
delimiter ;

-- ----------------------------
-- Procedure structure for search_product_by_something
-- ----------------------------
DROP PROCEDURE IF EXISTS `search_product_by_something`;
delimiter ;;
CREATE PROCEDURE `search_product_by_something`(`something` VARCHAR(100))
select
	inventarios.id,inventarios.nombre,inventarios.codigo,
    inventarios.costo,inventarios.precio_Venta as precio,
    inventarios.existencia as stock, inventarios.foto,
    inventarios.clave_unidad, inventarios.clave_producto,
    inventarios.created_at as fecha, bussines.nombre as bussine,
    categorias.nombre as categoria
from inventarios
inner join categorias on inventarios.categoria_id = categorias.id
inner join bussines on inventarios.bussine_id = bussines.id
where inventarios.nombre LIKE concat('%',something,'%') or
inventarios.codigo LIKE concat('%',something,'%')  or
inventarios.precio_Venta LIKE concat('%',something,'%') or
categorias.nombre LIKE concat('%',something,'%') or
bussines.nombre LIKE concat('%',something,'%')
order by inventarios.id desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for search_product_by_something_seller
-- ----------------------------
DROP PROCEDURE IF EXISTS `search_product_by_something_seller`;
delimiter ;;
CREATE PROCEDURE `search_product_by_something_seller`(`something` VARCHAR(100), `bussine_id` INT)
select
	inventarios.id,inventarios.nombre,inventarios.codigo,
    inventarios.costo,inventarios.precio_Venta as precio,
    inventarios.existencia as stock, inventarios.foto,
    inventarios.clave_unidad, inventarios.clave_producto,
    inventarios.created_at as fecha, bussines.nombre as bussine,
    categorias.nombre as categoria
from inventarios
inner join categorias on inventarios.categoria_id = categorias.id
inner join bussines on inventarios.bussine_id = bussines.id
where (inventarios.nombre LIKE concat('%',something,'%') or
inventarios.codigo LIKE concat('%',something,'%')  or
inventarios.precio_Venta LIKE concat('%',something,'%') or
categorias.nombre LIKE concat('%',something,'%') or
bussines.nombre LIKE concat('%',something,'%')) and inventarios.bussine_id = bussine_id
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
