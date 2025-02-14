-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 07-02-2025 a las 12:42:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_bidaia_gestoreafroga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentzia`
--
drop database if exists db_bidaia_gestorea;
create database if not exists db_bidaia_gestorea;
use db_bidaia_gestorea;

CREATE TABLE `agentzia` (
  `KODEA` int(11) NOT NULL,
  `Langile_Kopuru_Kodea` varchar(5) DEFAULT NULL,
  `LOGOA` longtext DEFAULT NULL,
  `MARKAREN_KOLOREA` varchar(250) DEFAULT NULL,
  `izena` varchar(50) DEFAULT NULL,
  `agentzia_m_kodea` varchar(3) DEFAULT NULL,
  `pasahitza` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agentzia`
--

INSERT INTO `agentzia` (`KODEA`, `Langile_Kopuru_Kodea`, `LOGOA`, `MARKAREN_KOLOREA`, `izena`, `agentzia_m_kodea`, `pasahitza`) VALUES
(1, NULL, 'https://static.vecteezy.com/system/resources/previews/015/665/684/non_2x/man-with-the-inscription-admin-icon-outline-style-vector.jpg', NULL, 'admin', NULL, 'admin'),
(2, 'L3', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqRuP9NzjwMdy64A-2qfuTJU6pBKLyRJqXBg&s', '#F00000', 'EroskiTravel', 'A1', 'EroskiTravel'),
(3, 'L1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MLp_J94GZCi_ikNpyKLLFRhwVjmQexGQ6w&s', '#2f9c28', 'ViajesElCorteIngles', 'A1', '1234'),
(5, 'L3', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF4_wkKdkl4K9x6E_kRhzTcKpScQUnOdwJJA&s', '#004dff', 'Vueling', 'A1', 'Vueling'),
(9, 'L3', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnvvyZ9BIeU4nun173k2eAWjaizbGuQreVZg&s', '#009999', 'SkyScanner', 'A1', 'SkyScanner'),
(10, 'L2', 'asdasd#009999', 'asdasd#009999', 'asdasd#009999', 'A3', 'asdasd#009999'),
(11, 'L1', 'asdasd#009999', 'asdasd', NULL, 'A2', 'perolachupamal'),
(12, 'L1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnvvyZ9BIeU4nun173k2eAWjaizbGuQreVZg&s', '#004dff', 'admin2', 'A2', 'admin2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentzia_motak`
--

CREATE TABLE `agentzia_motak` (
  `KODEA` varchar(3) NOT NULL,
  `DESKRIBAPENA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agentzia_motak`
--

INSERT INTO `agentzia_motak` (`KODEA`, `DESKRIBAPENA`) VALUES
('A1', 'Mayorista'),
('A2', 'Minorista'),
('A3', 'Mayorista-minorista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `airelineak`
--

CREATE TABLE `airelineak` (
  `AIRELINEA_KODEA` varchar(5) NOT NULL,
  `AIRELINEA_IZENA` varchar(500) DEFAULT NULL,
  `HERRIALDE_KODEA` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `airelineak`
--

INSERT INTO `airelineak` (`AIRELINEA_KODEA`, `AIRELINEA_IZENA`, `HERRIALDE_KODEA`) VALUES
('2K', 'AVIANCA-Ecuador dba AVIANCA', 'EC'),
('3P', 'World 2 Fly PT, S.A.', 'PT'),
('6B*', 'TUIfly Nordic AB', 'CN'),
('A.C.', 'Air France ', 'FR'),
('A0', 'BA Euroflyer Limited dba British Airways', 'GB'),
('AA', 'American Airlines', 'USA'),
('AM', 'Aerovias de Mexico SA de CV dba AeroMexico', 'MX'),
('AR', 'Aerolineas Argentinas S.A.', 'AR'),
('AV', 'Aerovias del Continente Americano S.A. AVIANCA', 'CO'),
('AY', 'Finnair ', 'FI'),
('AZ', 'Alitalia', 'IT'),
('BA', 'British Airways PLC', 'GB'),
('CL', 'Lufthansa CityLine GmbH', 'DE'),
('DE', 'Condor Flugdienst GmbH', 'DE'),
('DL', 'Delta Air Lines Inc', 'USA'),
('DS', 'Easyjet CH S.A', 'CH'),
('GL', 'Air GRL', 'GRL'),
('JJ', 'Tam Linhas Aereas SA dba Latam Airlines Brasil', 'BR'),
('KL', 'KLM', 'NL'),
('KN', 'CN United Airlines', 'CN'),
('LH', 'Lufthansa', 'DE'),
('LX', 'SWISS Internation Air Lines Ltd', 'CH'),
('M3', 'BSA - Aerolinhas Brasileiras S.A dba LATAM Cargo Br', 'BR'),
('MS', 'Egyptair', 'EG'),
('MT', 'MT Air Travel Ltd dba MT MedAir', 'MT'),
('N0', 'Norse Atlantic Airways AS', 'NO'),
('OU', 'HR Airlines d.d.', 'HR'),
('PC', 'Pegasus Airlines', 'TR'),
('QR', 'QA Airways Group Q.C.S.C dba QA Airways', 'QA'),
('RJ', 'Alia - The Royal JOn Airlines dba Royal JOn', 'JO'),
('RK', 'RYNAIR', 'GB'),
('S4', 'SATA Internacional - Azores Airlines, S.A.', 'PT'),
('SN', 'Brussels Airlines', 'BE'),
('SP', 'SATA (Air Acores)', 'PT'),
('TK', 'Turkish Airlines Inc', 'TR'),
('TP', 'TAP PT', 'PT'),
('TS', 'Air Transat', 'CA'),
('U2', 'EASYJET UK LIMITED', 'GB'),
('UA', 'United Airlines Inc', 'USA'),
('UX', 'Air Europa Lineas Aereas, S.A.', 'ES'),
('VOY', 'Aerolínea Vueling SA', 'ES'),
('VS', 'Virgin Atlantic Airways Ltd', 'GB'),
('WA', 'KLM Cityhopper', 'NL'),
('WFL', 'World2Fly', 'ES'),
('WK', 'Edelweiss Air AG', 'CH'),
('X3*', 'TUIfly Gmbh', 'DE'),
('X7', 'Challenge Airlines (BE) S.A.', 'BE'),
('YW', 'Air Nostrum, Lineas aereas del Mediterra neo SA', 'ES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beste_batzuk`
--

CREATE TABLE `beste_batzuk` (
  `Zerbitzu_kodea` int(11) NOT NULL,
  `Egun` date DEFAULT NULL,
  `Deskribapena` varchar(50) DEFAULT NULL,
  `Prezioa` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `beste_batzuk`
--

INSERT INTO `beste_batzuk` (`Zerbitzu_kodea`, `Egun`, `Deskribapena`, `Prezioa`) VALUES
(4, '2025-02-15', 'asdf', 154.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bidaia`
--

CREATE TABLE `bidaia` (
  `KODEA` int(11) NOT NULL,
  `Bidaiaren_izena` varchar(250) DEFAULT NULL,
  `Deskribapena` varchar(250) DEFAULT NULL,
  `Ez_barne` varchar(250) DEFAULT NULL,
  `bidai_hasiera` date DEFAULT NULL,
  `bidai_amaiera` date DEFAULT NULL,
  `Herrialde_kodea` varchar(4) DEFAULT NULL,
  `Bidaia_m_kodea` varchar(3) DEFAULT NULL,
  `Agentzia_kodea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bidaia`
--

INSERT INTO `bidaia` (`KODEA`, `Bidaiaren_izena`, `Deskribapena`, `Ez_barne`, `bidai_hasiera`, `bidai_amaiera`, `Herrialde_kodea`, `Bidaia_m_kodea`, `Agentzia_kodea`) VALUES
(1, 'king kong', 'una azafata cachonda', 'viva el vino', '2025-02-20', '2025-02-27', 'HK ', 'B4', 1),
(2, 'Eroski1', 'EroskiTravel', 'EroskiTravel', '2025-02-07', '2025-02-23', 'CN ', 'B4', 2),
(3, 'EroskiTravel2', 'EroskiTravel2', 'EroskiTravel2', '2025-02-17', '2025-07-17', 'TH ', 'B3', 2),
(4, 'Vueling1', 'Vueling1', 'Vueling1', '2025-02-13', '2025-02-16', 'TN ', 'B3', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bidaia_motak`
--

CREATE TABLE `bidaia_motak` (
  `KODEA` varchar(3) NOT NULL,
  `DESKRIBAPENA` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bidaia_motak`
--

INSERT INTO `bidaia_motak` (`KODEA`, `DESKRIBAPENA`) VALUES
('B1', 'Ezkongaiak'),
('B2', 'Senior'),
('B3', 'Taldeak'),
('B4', 'Bidaia handiak (helmuga exotikoak + hegaldia + ostatua)'),
('B5', 'Eskapada'),
('B6', 'Familiak (haur txikiekin)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hegaldia`
--

CREATE TABLE `hegaldia` (
  `Zerbitzu_kodea` int(11) NOT NULL,
  `Hegaldi_kodea` varchar(5) DEFAULT NULL,
  `Irteera_data` date DEFAULT NULL,
  `Irteera_ordutegia` time DEFAULT NULL,
  `Bidaiaren_iraupena` time DEFAULT NULL,
  `Prezioa` decimal(6,2) DEFAULT NULL,
  `Jatorrizko_aireportua` varchar(50) DEFAULT NULL,
  `Helmugako_aireportua` varchar(50) DEFAULT NULL,
  `AIRELINEA_KODEA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hegaldia`
--

INSERT INTO `hegaldia` (`Zerbitzu_kodea`, `Hegaldi_kodea`, `Irteera_data`, `Irteera_ordutegia`, `Bidaiaren_iraupena`, `Prezioa`, `Jatorrizko_aireportua`, `Helmugako_aireportua`, `AIRELINEA_KODEA`) VALUES
(1, 'H1', '2025-02-07', '13:13:09', '01:13:09', 109.00, 'DUS', 'ATH', 'WK'),
(2, 'H2', '2025-02-12', '08:38:14', '07:38:14', 1643.00, 'BCN', 'BCN', 'A.C.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herrialdeak`
--

CREATE TABLE `herrialdeak` (
  `KODEA` varchar(4) NOT NULL,
  `HELMUGA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herrialdeak`
--

INSERT INTO `herrialdeak` (`KODEA`, `HELMUGA`) VALUES
('AR ', 'ARGENTINA'),
('AT ', 'AUSTRIA'),
('BE', ' BÉLGICA'),
('BR ', 'BRASIL'),
('CA ', 'CANADA'),
('CH ', 'SUIZA'),
('CN ', 'CHINA'),
('CU', 'CUBA'),
('CY ', 'CHIPRE'),
('CZ ', 'REPUBLICA CHECA'),
('DE ', 'ALEMANIA'),
('DK ', 'DINAMARCA'),
('EE ', 'ESTONIA'),
('EG ', 'EGIPTO'),
('ES ', 'ESPAÑA'),
('FI ', 'FINLANDIA'),
('FR ', 'FRANCIA'),
('GB ', 'REINO UNIDO'),
('GR ', 'GRECIA'),
('GT ', 'GUATEMALA'),
('HK ', 'HONG-KONG'),
('HR ', 'CROACIA'),
('HU ', 'HUNGRIA'),
('ID ', 'INDONESIA'),
('IE ', 'IRLANDA'),
('IL ', 'ISRAEL'),
('IN ', 'INDIA'),
('IS ', 'ISLANDIA'),
('IT ', 'ITALIA'),
('JM ', 'JAMAICA'),
('JP ', 'JAPÓN'),
('KE ', 'KENIA'),
('LU ', 'LUXEMBURGO'),
('MA', 'MARRUECOS'),
('MC ', 'MÓNACO'),
('MT', 'MALTA'),
('MV ', 'MALDIVAS'),
('MX', 'MEXICO'),
('NL ', 'PAISES BAJOS'),
('NO ', 'NORUEGA'),
('PA ', 'PANAMÁ'),
('PE ', 'PERÚ'),
('PL ', 'POLONIA'),
('PR ', 'PUERTO RICO'),
('PT ', 'PORTUGAL'),
('QA ', 'QATAR'),
('RO ', 'RUMANIA'),
('RU ', 'RUSIA'),
('SC ', ' SEYCHELLES'),
('SE ', 'SUECIA'),
('SG ', 'SINGAPUR'),
('TH ', 'TAILANDIA'),
('TN ', 'TÚNEZ'),
('TR ', 'TURQUIA'),
('TZ ', 'TANZANIA (INCLUYE ZANZIBAR)'),
('US ', 'ESTADOS UNIDOS'),
('VE ', 'VENEZUELA'),
('VN ', 'VIETNAM'),
('ZA ', 'SUDÁFRICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iata`
--

CREATE TABLE `iata` (
  `AIREPORTUA` varchar(4) NOT NULL,
  `HIRIA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `iata`
--

INSERT INTO `iata` (`AIREPORTUA`, `HIRIA`) VALUES
('ACA', 'MÉXICO (ACAPULCO)'),
('ACE', 'Lanzarote '),
('AGP', 'MALAGA'),
('ALC', 'Alicante '),
('AMM', 'JO (Ammán ) AMM'),
('AMS', 'HOLANDA Amsterdam '),
('ATH', 'GRECIA ( Atenas)'),
('BCN', 'barcelona'),
('BER', 'ALEMANIA (Berlín )'),
('BIO', 'Bilbao'),
('BJZ', 'Badajoz '),
('BKK', 'TAILANDIA Bagkok '),
('BOG', 'COLOMBIA Bogotá '),
('BOS', 'Boston '),
('BRU', 'BELGICA (Bruselas )'),
('BSB', 'BRASIL (brasilia)'),
('BUE', 'Buenos Aires '),
('CAI', ' EG El Cairo '),
('CAS', ' MARRUECOS (Casablanca) '),
('CCS', 'VENEZUELA ( CARACAS)'),
('CDG', 'FRANCIA,París (aeropuerto Charles de Gaulle)'),
('CPH', 'DINAMARCA '),
('DTT', 'DETROIT'),
('DUB', 'IRLANDA (DUBLIN)'),
('DUS', 'ALEMANIA (Dusseldorf )'),
('EAS', 'SAN SEBASTIAN'),
('FRA', 'ALEMANIA (Frankfurt )'),
('FUE', 'FUERTEVENTURA'),
('GMZ', 'LA GOMERA'),
('GRO', 'Gerona '),
('GRX', 'Granada '),
('GVA', 'SUIZA (Ginebra )'),
('HAM', 'ALEMANIA (hamburgo)'),
('HEL', 'FINLANDIA (Helsinki )'),
('HOU', 'Houston '),
('IBZ', 'Ibiza '),
('IST', 'TR (ESTAMBUL)'),
('JFK', 'Nueva York '),
('KIN', 'JAMAICA (kingston)'),
('LAX', 'LOS ANGELES'),
('LBG', 'FRANCIA ,Le Bourget,'),
('LCG', 'La Coruña LCG'),
('LGH', 'LONDRES (GATWICK)'),
('LHR', 'LONDRES Heathrow'),
('LIM', 'PERU ( Lima)'),
('LIS', 'PT (lisboa)'),
('LPA', 'GRAN CANARIA '),
('LYS', 'FRANCIA (lyon)'),
('MAD', 'Madrid'),
('MAH', 'MAHON'),
('MEL', ' AUSTRALIA Melbourne '),
('MEX', ' México D.F.'),
('MIA', 'Miami'),
('MIL', ' ITALIA (Milán )'),
('MJV', 'Murcia '),
('MOW', ' RUSIA (Moscú ) MOW '),
('MRS', 'FRANCIA (Marsella)'),
('MUC', 'ALEMANIA (Munich )'),
('NBO', 'KENIA ( Nairobi)'),
('ODB', 'Córdoba '),
('ORY', 'FRANCIA (ORLY)'),
('OSL', 'NORUEGA (oslo)'),
('OVD', 'Asturias '),
('PHL', 'Philadelphia PHL '),
('PMI', 'PALMA DE MALLORCA'),
('PNA', 'Pamplona '),
('PRG', 'REPUBLICA CHECA (Praga )'),
('RAK', 'MARRUECOS (Marrakech)'),
('REU', 'REUS'),
('RIO', 'BRASIL (Rio de Janeiro )'),
('SAO', ' BRASIL (Sao Paulo )'),
('SCQ', 'Santiago de Compostela '),
('SDQ', ' REPUBLICA DOMINICANA (Santo Domingo) '),
('SDR', 'SANTANDER'),
('SEA', 'Seattle '),
('SFO', 'SAN FRANCISCO'),
('SLM', 'Salamanca '),
('SPC', 'Santa Cruz de la Palma '),
('STN', 'LONDRES ( Stanted)'),
('STO', 'SUECIA (Estocolmo)'),
('STR', 'ALEMANIA (Stuttgart) '),
('SYD', 'AUSTRALIA (SIYNEY)'),
('TFN', 'Tenerife Norte '),
('TFS', 'Tenerife Sur '),
('TUN', 'Túnez '),
('VDE', 'HIERRO '),
('VGO', 'Vigo '),
('VIE', 'AUSTRIA (Viena )'),
('VIT', 'VITORIA'),
('VLC', 'Valencia '),
('WAS', 'WASHINGTON'),
('WAW', 'POLONIA (Varsovia ) WAW '),
('XRY', 'JEREZ DE LA FRONTERA'),
('YMQ', 'Montreal, Québec '),
('YOW', ' CA Ottawa, Ontario YOW'),
('YTO', 'CA Toronto, Ontario YTO'),
('YVR', 'CA VANCOUVER  '),
('ZAZ', 'Zaragoza'),
('ZRH', 'SUIZA (Zurich)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `joan_eta_etorri`
--

CREATE TABLE `joan_eta_etorri` (
  `Zerbitzu_kodea` int(11) NOT NULL,
  `Hegaldi_kodea_etorri` varchar(3) DEFAULT NULL,
  `Itzulera_ordua` time DEFAULT NULL,
  `Etorria_eguna` date DEFAULT NULL,
  `bueltako_iraupena` time DEFAULT NULL,
  `Jatorrizko_aireportua` varchar(50) DEFAULT NULL,
  `Helmugako_aireportua` varchar(50) DEFAULT NULL,
  `Bueltako_AIRELINEA_KODEA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `joan_eta_etorri`
--

INSERT INTO `joan_eta_etorri` (`Zerbitzu_kodea`, `Hegaldi_kodea_etorri`, `Itzulera_ordua`, `Etorria_eguna`, `bueltako_iraupena`, `Jatorrizko_aireportua`, `Helmugako_aireportua`, `Bueltako_AIRELINEA_KODEA`) VALUES
(2, 'H1', '20:14:37', '2025-02-14', '02:14:37', 'ALC', 'BCN', 'AY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lang_kopurua`
--

CREATE TABLE `lang_kopurua` (
  `Kodea` varchar(5) NOT NULL,
  `Deskribapena` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lang_kopurua`
--

INSERT INTO `lang_kopurua` (`Kodea`, `Deskribapena`) VALUES
('L1', '5 gehienez ( 1 - 5 bitartean)'),
('L2', '10 gehienez (1 - 10 bitartean)'),
('L3', '20 gehienez (1 - 20 bitartean)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logela_motak`
--

CREATE TABLE `logela_motak` (
  `KODEA` varchar(4) NOT NULL,
  `DESKRIBAPENA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logela_motak`
--

INSERT INTO `logela_motak` (`KODEA`, `DESKRIBAPENA`) VALUES
('DB', 'Bikoitza'),
('DUI', 'Bikoitza, erabilpen indibiduala'),
('SIN', 'Indibiduala'),
('TPL', 'Hirukoitza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ostatua`
--

CREATE TABLE `ostatua` (
  `Zerbitzu_kodea` int(11) NOT NULL,
  `Prezioa` decimal(6,2) DEFAULT NULL,
  `Sarrera_eguna` date DEFAULT NULL,
  `Irtera_eguna` date DEFAULT NULL,
  `hiria` varchar(50) DEFAULT NULL,
  `izena` varchar(50) DEFAULT NULL,
  `logela_m_kodea` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ostatua`
--

INSERT INTO `ostatua` (`Zerbitzu_kodea`, `Prezioa`, `Sarrera_eguna`, `Irtera_eguna`, `hiria`, `izena`, `logela_m_kodea`) VALUES
(3, 123.00, '2025-02-14', '2025-02-22', 'asdaa', 'asdasd', 'SIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zerbitzuak`
--

CREATE TABLE `zerbitzuak` (
  `Kodea` int(11) NOT NULL,
  `Izena` varchar(30) DEFAULT NULL,
  `Bidaiaren_kodea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zerbitzuak`
--

INSERT INTO `zerbitzuak` (`Kodea`, `Izena`, `Bidaiaren_kodea`) VALUES
(1, 'Hegaldia', 3),
(2, 'Joan_Etorri', 3),
(3, 'Ostatua', 3),
(4, 'Beste', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agentzia`
--
ALTER TABLE `agentzia`
  ADD PRIMARY KEY (`KODEA`),
  ADD KEY `Langile_Kopuru_Kodea` (`Langile_Kopuru_Kodea`),
  ADD KEY `agentzia_m_kodea` (`agentzia_m_kodea`);

--
-- Indices de la tabla `agentzia_motak`
--
ALTER TABLE `agentzia_motak`
  ADD PRIMARY KEY (`KODEA`);

--
-- Indices de la tabla `airelineak`
--
ALTER TABLE `airelineak`
  ADD PRIMARY KEY (`AIRELINEA_KODEA`);

--
-- Indices de la tabla `beste_batzuk`
--
ALTER TABLE `beste_batzuk`
  ADD PRIMARY KEY (`Zerbitzu_kodea`);

--
-- Indices de la tabla `bidaia`
--
ALTER TABLE `bidaia`
  ADD PRIMARY KEY (`KODEA`),
  ADD KEY `Herrialde_kodea` (`Herrialde_kodea`),
  ADD KEY `Bidaia_m_kodea` (`Bidaia_m_kodea`),
  ADD KEY `Agentzia_kodea` (`Agentzia_kodea`);

--
-- Indices de la tabla `bidaia_motak`
--
ALTER TABLE `bidaia_motak`
  ADD PRIMARY KEY (`KODEA`);

--
-- Indices de la tabla `hegaldia`
--
ALTER TABLE `hegaldia`
  ADD PRIMARY KEY (`Zerbitzu_kodea`),
  ADD KEY `Jatorrizko_aireportua` (`Jatorrizko_aireportua`),
  ADD KEY `Helmugako_aireportua` (`Helmugako_aireportua`),
  ADD KEY `AIRELINEA_KODEA` (`AIRELINEA_KODEA`);

--
-- Indices de la tabla `herrialdeak`
--
ALTER TABLE `herrialdeak`
  ADD PRIMARY KEY (`KODEA`);

--
-- Indices de la tabla `iata`
--
ALTER TABLE `iata`
  ADD PRIMARY KEY (`AIREPORTUA`);

--
-- Indices de la tabla `joan_eta_etorri`
--
ALTER TABLE `joan_eta_etorri`
  ADD PRIMARY KEY (`Zerbitzu_kodea`),
  ADD KEY `Jatorrizko_aireportua` (`Jatorrizko_aireportua`),
  ADD KEY `Helmugako_aireportua` (`Helmugako_aireportua`),
  ADD KEY `Bueltako_AIRELINEA_KODEA` (`Bueltako_AIRELINEA_KODEA`);

--
-- Indices de la tabla `lang_kopurua`
--
ALTER TABLE `lang_kopurua`
  ADD PRIMARY KEY (`Kodea`);

--
-- Indices de la tabla `logela_motak`
--
ALTER TABLE `logela_motak`
  ADD PRIMARY KEY (`KODEA`);

--
-- Indices de la tabla `ostatua`
--
ALTER TABLE `ostatua`
  ADD PRIMARY KEY (`Zerbitzu_kodea`),
  ADD KEY `logela_m_kodea` (`logela_m_kodea`);

--
-- Indices de la tabla `zerbitzuak`
--
ALTER TABLE `zerbitzuak`
  ADD PRIMARY KEY (`Kodea`),
  ADD KEY `Bidaiaren_kodea` (`Bidaiaren_kodea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agentzia`
--
ALTER TABLE `agentzia`
  MODIFY `KODEA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `bidaia`
--
ALTER TABLE `bidaia`
  MODIFY `KODEA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zerbitzuak`
--
ALTER TABLE `zerbitzuak`
  MODIFY `Kodea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agentzia`
--
ALTER TABLE `agentzia`
  ADD CONSTRAINT `agentzia_ibfk_1` FOREIGN KEY (`Langile_Kopuru_Kodea`) REFERENCES `lang_kopurua` (`Kodea`),
  ADD CONSTRAINT `agentzia_ibfk_2` FOREIGN KEY (`agentzia_m_kodea`) REFERENCES `agentzia_motak` (`KODEA`);

--
-- Filtros para la tabla `beste_batzuk`
--
ALTER TABLE `beste_batzuk`
  ADD CONSTRAINT `beste_batzuk_ibfk_1` FOREIGN KEY (`Zerbitzu_kodea`) REFERENCES `zerbitzuak` (`Kodea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bidaia`
--
ALTER TABLE `bidaia`
  ADD CONSTRAINT `bidaia_ibfk_1` FOREIGN KEY (`Herrialde_kodea`) REFERENCES `herrialdeak` (`KODEA`),
  ADD CONSTRAINT `bidaia_ibfk_2` FOREIGN KEY (`Bidaia_m_kodea`) REFERENCES `bidaia_motak` (`KODEA`),
  ADD CONSTRAINT `bidaia_ibfk_3` FOREIGN KEY (`Agentzia_kodea`) REFERENCES `agentzia` (`KODEA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hegaldia`
--
ALTER TABLE `hegaldia`
  ADD CONSTRAINT `hegaldia_ibfk_1` FOREIGN KEY (`Zerbitzu_kodea`) REFERENCES `zerbitzuak` (`Kodea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hegaldia_ibfk_2` FOREIGN KEY (`Jatorrizko_aireportua`) REFERENCES `iata` (`AIREPORTUA`),
  ADD CONSTRAINT `hegaldia_ibfk_3` FOREIGN KEY (`Helmugako_aireportua`) REFERENCES `iata` (`AIREPORTUA`),
  ADD CONSTRAINT `hegaldia_ibfk_4` FOREIGN KEY (`AIRELINEA_KODEA`) REFERENCES `airelineak` (`AIRELINEA_KODEA`);

--
-- Filtros para la tabla `joan_eta_etorri`
--
ALTER TABLE `joan_eta_etorri`
  ADD CONSTRAINT `joan_eta_etorri_ibfk_1` FOREIGN KEY (`Zerbitzu_kodea`) REFERENCES `zerbitzuak` (`Kodea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joan_eta_etorri_ibfk_2` FOREIGN KEY (`Jatorrizko_aireportua`) REFERENCES `iata` (`AIREPORTUA`),
  ADD CONSTRAINT `joan_eta_etorri_ibfk_3` FOREIGN KEY (`Helmugako_aireportua`) REFERENCES `iata` (`AIREPORTUA`),
  ADD CONSTRAINT `joan_eta_etorri_ibfk_4` FOREIGN KEY (`Bueltako_AIRELINEA_KODEA`) REFERENCES `airelineak` (`AIRELINEA_KODEA`);

--
-- Filtros para la tabla `ostatua`
--
ALTER TABLE `ostatua`
  ADD CONSTRAINT `ostatua_ibfk_1` FOREIGN KEY (`Zerbitzu_kodea`) REFERENCES `zerbitzuak` (`Kodea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ostatua_ibfk_2` FOREIGN KEY (`logela_m_kodea`) REFERENCES `logela_motak` (`KODEA`);

--
-- Filtros para la tabla `zerbitzuak`
--
ALTER TABLE `zerbitzuak`
  ADD CONSTRAINT `zerbitzuak_ibfk_1` FOREIGN KEY (`Bidaiaren_kodea`) REFERENCES `bidaia` (`KODEA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
