--
-- Database: `roomManager`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_reservation` varchar(255) NOT NULL,
  `arrival_date` timestamp NOT NULL,
  `departure_date` timestamp NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT 0,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `reference_reservation`, `arrival_date`, `departure_date`, `confirmed`, `id_customer`, `id_room`, `created_at`, `updated_at`) VALUES
(8, 'RES202502261530021', '2025-02-25 23:00:00', '2025-03-04 23:00:00', 1, 3, 4, '2025-02-26 14:30:28', '2025-02-28 14:45:48'),
(9, 'RES202502261530341', '2025-02-26 23:00:00', '2025-02-27 23:00:00', 0, 4, 6, '2025-02-26 14:30:49', '2025-02-26 14:30:49'),
(10, 'RES202502261530541', '2025-02-26 23:00:00', '2025-02-27 23:00:00', 0, 5, 4, '2025-02-26 14:31:10', '2025-02-26 14:31:10'),
(11, 'RES202503051437211', '2025-03-04 23:00:00', '2025-03-20 23:00:00', 1, 3, 3, '2025-03-05 13:39:15', '2025-03-05 13:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `connection_histories`
--

CREATE TABLE `connection_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connection_histories`
--

INSERT INTO `connection_histories` (`id`, `ip`, `browser`, `platform`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-13 14:59:36', '2024-08-13 14:59:36'),
(2, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 07:25:23', '2024-08-14 07:25:23'),
(3, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 11:00:28', '2024-08-14 11:00:28'),
(4, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 11:05:18', '2024-08-14 11:05:18'),
(5, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 11:07:31', '2024-08-14 11:07:31'),
(6, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 11:28:15', '2024-08-14 11:28:15'),
(7, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 11:29:50', '2024-08-14 11:29:50'),
(8, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-14 12:07:42', '2024-08-14 12:07:42'),
(9, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-20 08:54:39', '2024-08-20 08:54:39'),
(10, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-20 09:15:19', '2024-08-20 09:15:19'),
(11, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-20 10:56:56', '2024-08-20 10:56:56'),
(12, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-21 09:05:28', '2024-08-21 09:05:28'),
(13, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-22 07:03:16', '2024-08-22 07:03:16'),
(14, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-22 10:37:43', '2024-08-22 10:37:43'),
(15, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-23 07:18:20', '2024-08-23 07:18:20'),
(16, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-26 07:11:14', '2024-08-26 07:11:14'),
(17, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-26 08:23:18', '2024-08-26 08:23:18'),
(18, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-27 07:16:48', '2024-08-27 07:16:48'),
(19, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-08-28 07:29:20', '2024-08-28 07:29:20'),
(20, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-09-03 07:44:34', '2024-09-03 07:44:34'),
(21, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-10-29 06:27:53', '2024-10-29 06:27:53'),
(22, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-11-05 07:15:46', '2024-11-05 07:15:46'),
(23, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-11-26 08:11:06', '2024-11-26 08:11:06'),
(24, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-11-27 08:06:26', '2024-11-27 08:06:26'),
(25, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-11-28 08:34:14', '2024-11-28 08:34:14'),
(26, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-11-29 06:39:28', '2024-11-29 06:39:28'),
(27, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-05 08:09:35', '2024-12-05 08:09:35'),
(28, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-11 13:16:01', '2024-12-11 13:16:01'),
(29, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-12 07:01:53', '2024-12-12 07:01:53'),
(30, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-13 06:49:48', '2024-12-13 06:49:48'),
(31, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-16 06:39:09', '2024-12-16 06:39:09'),
(32, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-17 06:59:38', '2024-12-17 06:59:38'),
(33, '127.0.0.1', 'Chrome', 'Linux', 1, '2024-12-19 06:29:38', '2024-12-19 06:29:38'),
(34, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-04 06:31:43', '2025-02-04 06:31:43'),
(35, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-05 07:18:02', '2025-02-05 07:18:02'),
(36, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-06 07:15:07', '2025-02-06 07:15:07'),
(37, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-06 12:32:22', '2025-02-06 12:32:22'),
(38, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-25 06:53:33', '2025-02-25 06:53:33'),
(39, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-26 06:25:54', '2025-02-26 06:25:54'),
(40, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-26 08:03:30', '2025-02-26 08:03:30'),
(41, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-26 16:59:02', '2025-02-26 16:59:02'),
(42, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-02-28 12:30:49', '2025-02-28 12:30:49'),
(43, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-03-03 07:24:54', '2025-03-03 07:24:54'),
(44, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-03-04 11:57:39', '2025-03-04 11:57:39'),
(45, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-03-05 10:01:50', '2025-03-05 10:01:50'),
(46, '127.0.0.1', 'Chrome', 'Linux', 1, '2025-03-06 06:54:15', '2025-03-06 06:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` int(11) NOT NULL,
  `reference_cust` varchar(255) NOT NULL,
  `firtName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `emailAddr` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `reference_number`, `reference_cust`, `firtName`, `lastName`, `address`, `phoneNumber`, `emailAddr`, `created_at`, `updated_at`) VALUES
(3, 1, 'CUST0000001', 'Jean', 'Kevin', '12, rue', '0898765432', 'jeankevine@gsmail.com', '2024-08-22 08:05:04', '2024-08-22 08:18:41'),
(4, 2, 'CUST0000002', 'Roland', 'Buchet', NULL, '098876554', 'rolandbuchet@gmail.com', '2024-08-22 08:28:27', '2024-08-22 08:28:27'),
(5, 3, 'CUST0000003', 'Gogo', 'lilila', NULL, '098765443', 'gogo@gmail.com', '2024-08-22 10:34:05', '2024-08-22 10:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `devises`
--

CREATE TABLE `devises` (
  `id` int(10) UNSIGNED NOT NULL,
  `motto` varchar(255) NOT NULL,
  `currency_symbol` varchar(255) NOT NULL,
  `iso_code` varchar(255) NOT NULL,
  `motto_en` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devises`
--

INSERT INTO `devises` (`id`, `motto`, `currency_symbol`, `iso_code`, `motto_en`) VALUES
(1, 'Dinar algérien', 'dinar', 'DZD', 'Algerian dinar'),
(2, 'Livre égyptienne', 'E£', 'EGP', 'Egyptian pound'),
(3, 'Dinar libyen', 'dinar', 'LYD', 'Libyan dinar'),
(4, 'Dirham marocain', 'dirham', 'MAD', 'Moroccan Dirham'),
(5, 'Ouguiya', 'ouguiya', 'MRU', 'Ouguiya'),
(6, 'Livre soudanaise', 's£, sudan pounds', 'SDG', 'Sudanese pound'),
(7, 'Dinar tunisien', 'DT', 'TND', 'Tunisian Dinar'),
(8, 'Franc CFA (UEMOA)', 'F CFA, franc', 'XOF', 'CFA Franc (UEMOA)'),
(10, 'Escudo du Cap-Vert', 'escudo', 'CVE', 'Cape Verde Escudo'),
(11, 'Dalasi', 'dalasi', 'GMD', 'Dalasi'),
(12, 'Cedi', 'cedi', 'GHS', 'Cedi'),
(13, 'Franc guinéen', 'F, franc', 'GNF', 'Guinean Franc'),
(14, 'Dollar libérien', 'dollar', 'LRD', 'Liberian dollar'),
(15, 'Naira', 'N, naira', 'NGN', 'Naira'),
(16, 'Leone', 'leone', 'SLL', 'Leone'),
(17, 'Franc CFA (CEMAC)', 'F CFA, franc', 'XAF', 'CFA Franc (CEMAC)'),
(18, 'Franc congolais', 'F/FC, franc', 'CDF', 'Congolese Franc'),
(19, 'Dobra', 'dobra', 'STD', 'Dobra'),
(20, 'Franc burundais', 'F, franc', 'BIF', 'Burundian Franc'),
(21, 'Franc de Djibouti', 'F, franc', 'DJF', 'Djiboutian Franc'),
(22, 'Nakfa', 'nakfa', 'ERN', 'Nakfa'),
(23, 'Birr', 'Birr', 'ETB', 'Birr'),
(24, 'Shilling kényan', 'shilling', 'KES', 'Kenyan shilling'),
(25, 'Shilling ougandais', 'shilling', 'UGX', 'Ugandan shilling'),
(26, 'Franc rwandais', 'F, franc', 'RWF', 'Rwandan Franc'),
(27, 'Roupie seychelloise', 'roupie', 'SCR', 'Seychellois rupee'),
(28, 'Shilling somalien', 'shilling', 'SOS', 'Somali shilling'),
(29, 'Livre sud-soudanaise', 'South Sudanese pound', 'SSP', 'South Sudanese pound'),
(30, 'Shilling tanzanien', 'shilling', 'TZS', 'Tanzanian shilling'),
(31, 'Rand', 'R, rand', 'ZAR', 'Rand'),
(32, 'Kwanza', 'Kz, kwanza', 'AOA', 'Kwanza'),
(33, 'Pula', 'pula', 'BWP', 'Pula'),
(34, 'Couronne norvégienne', 'krone', 'NOK', 'Norwegian crown'),
(35, 'Franc comorien', 'FC, franc', 'KMF', 'Comorian Franc'),
(36, 'Euro', '€', 'EUR', 'Euro'),
(37, 'Loti', 'loti', 'LSL', 'Loti'),
(38, 'Ariary', 'ariary', 'MGA', 'Ariary'),
(39, 'Kwacha malawien', 'kwacha', 'MWK', 'Malawian Kwacha'),
(40, 'Roupie mauricienne', 'roupie', 'MUR', 'Mauritian rupee'),
(41, 'Metical', 'MTn, metical', 'MZN', 'Metical'),
(42, 'Dollar namibien', 'dollar', 'NAD', 'Namibian dollar'),
(43, 'Livre de Sainte-Hélène', '£', 'SHP', 'Saint Helena pound'),
(44, 'Lilangeni', 'lilangeni', 'SZL', 'Lilangeni'),
(45, 'Kwacha de Zambie', 'kwacha', 'ZMW', 'Zambian Kwacha'),
(46, 'Dollar du Zimbabwe', 'dollar', 'ZWL', 'Zimbabwe dollar'),
(47, 'Tenge', 'tenge', 'KZT', 'Tenge'),
(48, 'Som', 'som', 'KGS', 'Som'),
(49, 'Sum', 'sum', 'UZS', 'Sum'),
(50, 'Somoni', 'somoni', 'TJS', 'Somoni'),
(51, 'Manat turkmène', 'manat', 'TMT', 'Turkmen manat'),
(52, 'Dram', 'dram', 'AMD', 'Dram'),
(53, 'Manat azerbaïdjanais', 'manat', 'AZN', 'Azerbaijani manat'),
(54, 'Lari', 'lari', 'GEL', 'Lari'),
(55, 'Rouble russe', 'rouble', 'RUB', 'Russian ruble'),
(56, 'Yuan renminbi', 'renminbi', 'CNY', 'Yuan renminbi'),
(57, 'Won nord-coréen', 'Wn.', 'KPW', 'North Korean won'),
(58, 'Won sud-coréen', 'W.', 'KRW', 'South Korean won'),
(59, 'Dollar de Hong Kong', 'dollar, $', 'HKD', 'Hong Kong dollar'),
(60, 'Yen', 'yen', 'JPY', 'Yen'),
(61, 'Pataca', 'pataca', 'MOP', 'Pataca'),
(62, 'Tugrik', 'tugrik', 'MNT', 'Tugrik'),
(63, 'Nouveau dollar de Taïwan', 'NT$, dollar, yuan', 'TWD', 'New Taiwan Dollar'),
(64, 'Afghani', 'afghani', 'AFN', 'Afghani'),
(65, 'Riyal saoudien', 'riyal', 'SAR', 'Saudi Riyal'),
(66, 'Dinar de Bahreïn', 'dinar', 'BHD', 'Bahraini Dinar'),
(67, 'Dirham des Émirats arabes unis', 'DH, dirham émirati', 'AED', 'United Arab Emirates Dirham'),
(68, 'Rial iranien', 'rial', 'IRR', 'Iranian rial'),
(69, 'Dinar irakien', 'dinar', 'IQD', 'Iraqi dinar'),
(70, 'Shekel', 'shekel', 'ILS', 'Shekel'),
(71, 'Dinar jordanien', 'dinar', 'JOD', 'Jordanian Dinar'),
(72, 'Dinar koweïtien', 'dinar', 'KWD', 'Kuwaiti dinar'),
(73, 'Livre libanaise', 'livre', 'LBP', 'Lebanese pound'),
(74, 'Rial omanais', 'rial', 'OMR', 'Rial omanais'),
(75, 'Riyal qatari', 'rial', 'QAR', 'Qatari Riyal'),
(76, 'Livre syrienne', 'livre', 'SYP', 'Syrian pound'),
(77, 'Livre turque', 'livre', 'TRY', 'Turkish lira'),
(78, 'Riyal yéménite', 'rial', 'YER', 'Yemeni Riyal'),
(79, 'Kyat', 'kyat', 'MMK', 'Kyat'),
(80, 'Dollar de Brunei', 'B$', 'BND', 'Brunei dollar'),
(81, 'Riel', 'riel', 'KHR', 'Riel'),
(82, 'Rupiah', 'roupie', 'IDR', 'Rupiah'),
(83, 'Kip', 'kip', 'LAK', 'Kip'),
(84, 'Ringgit', 'RM, ringgit', 'MYR', 'Ringgit'),
(85, 'Peso philippin', 'peso, piso', 'PHP', 'Philippine peso'),
(86, 'Dollar de Singapour', 'S$', 'SGD', 'Singapore dollar'),
(87, 'Baht', 'bath', 'THB', 'Baht'),
(88, 'Dollar américain', '$', 'USD', 'American dollar'),
(89, 'Dong', 'dong', 'VND', 'Dong'),
(90, 'Taka', 'taka', 'BDT', 'Taka'),
(91, 'Ngultrum', 'Nu', 'BTN', 'Ngultrum'),
(92, 'Roupie indienne', 'Re', 'INR', 'Indian rupee'),
(93, 'Rufiyaa', 'rf', 'MVR', 'Rufiyaa'),
(94, 'Roupie népalaise', 'roupie', 'NPR', 'Nepalese rupee'),
(95, 'Roupie pakistanaise', 'Rs', 'PKR', 'Pakistani rupee'),
(96, 'Roupie srilankaise', 'Rs', 'LKR', 'Sri Lankan Rupee'),
(97, 'Dollar des Bermudes', 'BD$', 'BMD', 'Bermuda Dollar'),
(98, 'Dollar canadien', '$ CA', 'CAD', 'Canadian dollar'),
(99, 'Couronne danoise', 'kroner, kr', 'DKK', 'Danish Crown'),
(100, 'Peso mexicain', '$, peso', 'MXN', 'Mexican peso'),
(101, 'Dollar de Belize', 'BZ$', 'BZD', 'Belize Dollar'),
(102, 'Colon du Costa Rica', 'colón', 'CRC', 'Costa Rica Colon'),
(103, 'Quetzal', 'quetzal', 'GTQ', 'Quetzal'),
(104, 'Lempira', 'lempira', 'HNL', 'Lempira'),
(105, 'Córdoba oro', 'córdoba', 'NIO', 'Córdoba oro'),
(106, 'Balboa', 'balboa', 'PAB', 'Balboa'),
(107, 'Dollar des Caraïbes orientales', 'EC$', 'XCD', 'East Caribbean dollar'),
(108, 'Florin arubais', 'AFL', 'AWG', 'Florin Arubais'),
(109, 'Dollar des Bahamas', 'B$', 'BSD', 'Bahamian dollar'),
(110, 'Dollar barbadien', 'Bds$', 'BBD', 'Barbadian dollar'),
(111, 'Dollar des îles Caïmans', 'CI$', 'KYD', 'Cayman Islands dollar'),
(112, 'Peso cubain', 'peso', 'CUP', 'Cuban peso'),
(113, 'Peso cubain convertible', 'peso', 'CUC', 'Cuban convertible peso'),
(114, 'Florin des Antilles néerlandaises', 'NAf', 'ANG', 'Netherlands Antillean guilder'),
(115, 'Peso dominicain', 'peso', 'DOP', 'Dominican Peso'),
(116, 'Gourde haïtienne', 'gourde', 'HTG', 'Haitian gourde'),
(117, 'Dollar jamaïcain', 'J$', 'JMD', 'Jamaican dollar'),
(118, 'Dollar trinidadien', 'TTD', 'TTD', 'Trinidadian dollar'),
(119, 'Peso argentin', 'peso', 'ARS', 'Argentine peso'),
(120, 'Boliviano bolivien', 'boliviano', 'BOB', 'Bolivian boliviano'),
(121, 'Réal brésilien', 'R$', 'BRL', 'Brazilian real'),
(122, 'Peso chilien', 'peso', 'CLP', 'Chilean peso'),
(123, 'Peso colombien', 'peso', 'COP', 'Colombian peso'),
(124, 'Livre des Îles Malouines', '£', 'FKP', 'Falklands Pound'),
(125, 'Dollar guyanien', 'G$', 'GYD', 'Guyanese dollar'),
(126, 'Guaraní paraguayen', 'guaraní', 'PYG', 'Paraguayan Guaraní'),
(127, 'Nuevo sol péruvien', 'S/.', 'PEN', 'Peruvian Nuevo Sol'),
(128, 'Dollar du Suriname', 'dollar', 'SRD', 'Suriname dollar'),
(129, 'Peso uruguayen', '$, dollar', 'UYU', 'Uruguayan peso'),
(130, 'Bolívar vénézuélien', 'bolívar', 'VEF', 'Venezuelan bolívar'),
(131, 'Lev bulgare', 'lev', 'BGN', 'Bulgarian Lev'),
(132, 'Kuna croate', 'kuna', 'HRK', 'Croatian Kuna'),
(133, 'Couronne danoise', 'kroner', 'DKK', 'Danish Crown'),
(134, 'Forint hongrois', 'forint', 'HUF', 'Hungarian Forint'),
(135, 'Zioty polonais', 'zioty', 'PLN', 'Polish Zioty'),
(136, 'Livre sterling', '£', 'GBP', 'Pound sterling'),
(137, 'Livre de Gibraltar', 'Gibraltar pound', 'GIP', 'Gibraltar pound'),
(138, 'Couronne suédoise', 'krona', 'SEK', 'Swedish crown'),
(139, 'Couronne tchèque', 'koruna', 'CZK', 'Czech crown'),
(140, 'Leu roumain', 'leu', 'RON', 'Romanian leu'),
(141, 'Lek albanais', 'lek', 'ALL', 'Albanian lek'),
(142, 'Rouble biélorusse', 'Br.', 'BYN', 'Belarusian ruble'),
(143, 'Mark convertible', 'MK', 'BAM', 'Convertible Mark'),
(144, 'Couronne islandaise', 'króna', 'ISK', 'Icelandic krone'),
(145, 'Franc suisse', 'Fr', 'CHF', 'Swiss franc'),
(146, 'Denar', 'denar', 'MKD', 'Denar'),
(147, 'Leu moldave', 'leu', 'MDL', 'Moldovan leu'),
(148, 'Couronne norvégienne', 'krone', 'NOK', 'Norwegian crown'),
(149, 'Dinar serbe', 'dinar', 'RSD', 'Serbian dinar'),
(150, 'Hryvnia', 'hryvnia', 'UAH', 'Hryvnia'),
(151, 'Dollar australien', '$, $ AUD, dollar', 'AUD', 'Australian dollar'),
(152, 'Dollar néo-zélandais', 'dollar', 'NZD', 'New Zealand dollar'),
(153, 'Dollar de Fidji', '$, $ FJ, dollar	', 'FJD', 'Fiji dollar'),
(154, 'Franc pacifique', 'franc, F, franc CFP', 'XPF', 'Pacific Franc'),
(155, 'Kina', 'kina', 'PGK', 'Kina'),
(156, 'Dollar des îles Salomon', '$, $ SI, dollar', 'SBD', 'Solomon Islands dollar'),
(157, 'Tala', 'tala', 'WST', 'Tala'),
(158, 'Pa\'anga', 'pa\'anga', 'TOP', 'Pa\'anga'),
(159, 'Vatu', 'vatu', 'VUV', 'Vatu');

-- --------------------------------------------------------

--
-- Table structure for table `devise_gestions`
--

CREATE TABLE `devise_gestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taux` double NOT NULL,
  `default_cur_manage` int(11) NOT NULL DEFAULT 0,
  `id_devise` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devise_gestions`
--

INSERT INTO `devise_gestions` (`id`, `taux`, `default_cur_manage`, `id_devise`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 88, '2024-09-03 08:35:46', '2024-09-03 08:35:46'),
(2, 2900, 0, 18, '2024-09-03 08:56:21', '2024-09-03 08:56:21'),
(4, 0.91, 0, 36, '2024-09-03 10:07:40', '2024-09-03 10:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `encaissements`
--

CREATE TABLE `encaissements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `reference_enc` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `id_pay_meth` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encaissements`
--

INSERT INTO `encaissements` (`id`, `description`, `reference_enc`, `amount`, `id_pay_meth`, `created_at`, `updated_at`) VALUES
(5, 'invoice.collection_of_the_invoice', 'INV2025022615555481', 200, 1, '2025-02-26 15:06:18', '2025-02-26 15:06:18'),
(6, 'invoice.collection_of_the_invoice', 'INV2025022615555481', 325, 1, '2025-02-28 14:45:48', '2025-02-28 14:45:48'),
(7, 'invoice.collection_of_the_invoice', 'INV20250305143933111', 400, 1, '2025-03-05 13:39:49', '2025-03-05 13:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_service_included` double NOT NULL,
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `reference`, `price`, `price_service_included`, `id_booking`, `created_at`, `updated_at`) VALUES
(11, 'INV2025022615555481', 350, 175, 8, '2025-02-26 15:06:18', '2025-02-26 15:06:18'),
(12, 'INV20250305143933111', 320, 400, 11, '2025-03-05 13:39:49', '2025-03-05 13:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `item_room_invoices`
--

CREATE TABLE `item_room_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_cat_name` varchar(255) NOT NULL,
  `room_price` double NOT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_room_invoices`
--

INSERT INTO `item_room_invoices` (`id`, `room_number`, `room_cat_name`, `room_price`, `id_room`, `id_invoice`, `created_at`, `updated_at`) VALUES
(1, 'A141', 'Chambre double', 50, 4, 11, '2025-02-26 15:06:18', '2025-02-26 15:06:18'),
(2, 'A145', 'Chambre simple', 20, 3, 12, '2025-03-05 13:39:49', '2025-03-05 13:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `item_service_invoices`
--

CREATE TABLE `item_service_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_service_invoices`
--

INSERT INTO `item_service_invoices` (`id`, `name`, `price`, `id_service`, `id_invoice`, `created_at`, `updated_at`) VALUES
(11, 'Diner', 15, 2, 11, '2025-02-26 15:06:18', '2025-02-26 15:06:18'),
(12, 'Petit déjeuné', 10, 3, 11, '2025-02-26 15:06:18', '2025-02-26 15:06:18'),
(13, 'Diner', 15, 2, 12, '2025-03-05 13:39:49', '2025-03-05 13:39:49'),
(14, 'Petit déjeuné', 10, 3, 12, '2025-03-05 13:39:49', '2025-03-05 13:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_08_13_131624_add_new_attribute_to_user_table', 1),
(7, '2024_08_13_144939_create_roles_table', 1),
(8, '2024_08_13_145512_create_new_attribute_to_user_table', 1),
(9, '2024_08_13_152222_create_new_attribute_to_user_table', 2),
(10, '2024_08_13_155238_create_connection_histories_table', 3),
(11, '2024_08_14_091944_add_new_attribute_to_user_table', 4),
(17, '2024_08_20_125220_create_customers_table', 5),
(18, '2024_08_22_132124_create_room_categories_table', 6),
(19, '2024_08_22_132550_create_rooms_table', 7),
(20, '2024_08_27_082710_edit_rooms_table_attribute', 8),
(21, '2024_08_27_112131_delete_price_input', 9),
(22, '2024_08_27_112440_add_price_attribute', 10),
(24, '2024_08_28_091941_create_devise_gestions_table', 11),
(27, '2024_11_05_085708_create_services_table', 12),
(28, '2024_11_26_092415_add_new_attribute_to_room_caterories_tables', 13),
(29, '2024_11_28_154235_create_service_assign_reservations_table', 14),
(30, '2024_12_13_083659_create_bookings_table', 15),
(31, '2024_12_17_144400_create_payment_methods_table', 16),
(32, '2024_12_18_092829_create_encaissements_table', 17),
(33, '2024_12_19_095108_create_invoices_table', 18),
(34, '2025_02_25_084615_create_item_service_invoices_table', 18),
(35, '2025_02_26_114705_add_new_attribute_to_item_service_invoices_table', 19),
(36, '2025_02_26_115220_add_new_attribute_to_invoices_table', 20),
(37, '2025_02_26_153314_create_item_room_invoices_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `default` int(11) NOT NULL DEFAULT 0,
  `institution_name` varchar(255) DEFAULT '-',
  `iban` varchar(255) DEFAULT '-',
  `account_number` varchar(255) DEFAULT '-',
  `bic_swiff` varchar(255) DEFAULT '-',
  `id_currency` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `designation`, `default`, `institution_name`, `iban`, `account_number`, `bic_swiff`, `id_currency`, `created_at`, `updated_at`) VALUES
(1, 'cash', 1, '-', '-', '-', '-', 1, '2024-12-17 15:11:56', '2024-12-17 15:11:56'),
(2, 'Carte Bancaire', 0, NULL, NULL, NULL, NULL, 1, '2024-12-18 09:04:40', '2024-12-18 10:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-08-13 15:06:39', '2024-08-13 15:06:39'),
(2, 'user', '2024-08-13 15:06:39', '2024-08-13 15:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `id_cat` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `id_cat`, `created_at`, `updated_at`) VALUES
(3, 'A145', 7, '2025-02-26 14:29:36', '2025-02-26 14:29:36'),
(4, 'A141', 8, '2025-02-26 14:29:42', '2025-02-26 14:29:42'),
(5, 'A243', 9, '2025-02-26 14:29:48', '2025-02-26 14:29:48'),
(6, 'AOZI', 10, '2025-02-26 14:29:55', '2025-02-26 14:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `people_number` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `description`, `price`, `people_number`, `created_at`, `updated_at`) VALUES
(7, 'Chambre simple', 20, 1, '2024-08-27 10:58:15', '2024-08-27 10:58:15'),
(8, 'Chambre double', 50, 2, '2024-08-27 10:58:29', '2024-11-26 09:05:09'),
(9, 'Chambre trible', 100, 3, '2024-08-27 10:58:39', '2024-11-26 09:05:16'),
(10, 'Chambre Quatruple', 120, 4, '2024-11-26 09:05:51', '2024-11-26 09:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` int(11) NOT NULL,
  `reference_service` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `reference_number`, `reference_service`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 'SERV0000001', 'Diner', 'Restauration', 15, '2024-11-05 09:17:07', '2024-11-05 09:17:07'),
(3, 2, 'SERV0000002', 'Petit déjeuné', 'Restauration', 10, '2024-11-28 14:59:10', '2025-02-04 06:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `service_assign_reservations`
--

CREATE TABLE `service_assign_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_reservation_assgn` varchar(255) NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_assign_reservations`
--

INSERT INTO `service_assign_reservations` (`id`, `ref_reservation_assgn`, `id_service`, `created_at`, `updated_at`) VALUES
(10, 'RES202412050909491', 2, '2024-12-05 08:12:28', '2024-12-05 08:12:28'),
(36, 'RES202412121332091', 2, '2024-12-12 12:33:03', '2024-12-12 12:33:03'),
(37, 'RES202412121332091', 3, '2024-12-12 12:33:20', '2024-12-12 12:33:20'),
(38, 'RES202412121335441', 2, '2024-12-12 12:35:58', '2024-12-12 12:35:58'),
(39, 'RES202412121335441', 3, '2024-12-12 12:36:02', '2024-12-12 12:36:02'),
(46, 'RES202412160739161', 2, '2024-12-16 12:27:27', '2024-12-16 12:27:27'),
(48, 'RES202412161437551', 3, '2024-12-17 07:21:45', '2024-12-17 07:21:45'),
(49, 'RES202412170822341', 2, '2024-12-17 07:23:04', '2024-12-17 07:23:04'),
(50, 'RES202412170906121', 2, '2024-12-17 08:08:01', '2024-12-17 08:08:01'),
(51, 'RES202412170906121', 3, '2024-12-17 08:08:18', '2024-12-17 08:08:18'),
(53, 'RES202502041022241', 3, '2025-02-04 09:22:50', '2025-02-04 09:22:50'),
(54, 'RES202502041033041', 3, '2025-02-04 09:51:13', '2025-02-04 09:51:13'),
(55, 'RES202502041122371', 3, '2025-02-04 10:23:06', '2025-02-04 10:23:06'),
(60, 'RES202502041245401', 3, '2025-02-04 11:46:05', '2025-02-04 11:46:05'),
(62, 'RES202502041249331', 3, '2025-02-04 11:50:48', '2025-02-04 11:50:48'),
(63, 'RES202502041251181', 3, '2025-02-04 11:51:33', '2025-02-04 11:51:33'),
(64, 'RES202502041258261', 3, '2025-02-04 11:58:42', '2025-02-04 11:58:42'),
(65, 'RES202502041300271', 3, '2025-02-04 12:00:39', '2025-02-04 12:00:39'),
(66, 'RES202502041302241', 3, '2025-02-04 12:03:10', '2025-02-04 12:03:10'),
(67, 'RES202502041302241', 2, '2025-02-04 12:03:46', '2025-02-04 12:03:46'),
(78, 'RES202502261530021', 2, '2025-02-26 14:30:20', '2025-02-26 14:30:20'),
(79, 'RES202502261530021', 3, '2025-02-26 14:30:25', '2025-02-26 14:30:25'),
(80, 'RES202502261530541', 2, '2025-02-26 14:31:08', '2025-02-26 14:31:08'),
(98, 'RES202503051437211', 2, '2025-03-05 13:37:52', '2025-03-05 13:37:52'),
(99, 'RES202503051437211', 3, '2025-03-05 13:38:06', '2025-03-05 13:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `photo_profile_url` varchar(255) NOT NULL DEFAULT '0',
  `photo_profile_base64` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `address`, `phone_number`, `photo_profile_url`, `photo_profile_base64`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Horly Andelo', 'horlyandelo@exadgroup.org', NULL, '$2y$12$W.oXXMXT40R83m0mY.Yu6.MFI3JI9dExYJUICo88iez1z7AUdDHDO', '7a46ee650e5f88ffab46d6d39a16a9581450fe1cd2b10605f797d81af7f5d3df65a957b3b', '863086', NULL, NULL, NULL, '987654321', 'upload_profileb41da55b7c1f79ab0cc151f342a5ab041', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAACRyWFlaAAABFAAAABRnWFlaAAABKAAAABRiWFlaAAABPAAAABR3dHB0AAABUAAAABRyVFJDAAABZAAAAChnVFJDAAABZAAAAChiVFJDAAABZAAAAChjcHJ0AAABjAAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAAgAAAAcAHMAUgBHAEJYWVogAAAAAAAAb6IAADj1AAADkFhZWiAAAAAAAABimQAAt4UAABjaWFlaIAAAAAAAACSgAAAPhAAAts9YWVogAAAAAAAA9tYAAQAAAADTLXBhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABtbHVjAAAAAAAAAAEAAAAMZW5VUwAAACAAAAAcAEcAbwBvAGcAbABlACAASQBuAGMALgAgADIAMAAxADb/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCAHgAeADASIAAhEBAxEB/8QAHQAAAQUBAQEBAAAAAAAAAAAAAAMEBQYHAgEICf/EAEUQAAIBAwMCBAMGBAQFAwMEAwECAwAEEQUSITFBBhNRYQcicQgUMoGRoSNCsdEVUsHwJDNi4fEJFnIlQ4IXNFOSGKKy/8QAGgEBAAIDAQAAAAAAAAAAAAAAAAEDAgQFBv/EACgRAAICAgMAAgMBAQEBAAMAAAABAgMRIQQSMRNBBSJRYRQycQYjQv/aAAwDAQACEQMRAD8A/UCiiihmFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFHHc8V47rDG0srBFRSzMeigdSaA9JCglmCgdSTgD86+TvtZ/bGs/h1pv/tX4W6va3niCVmS5uIzuFnjgjPTOe1VH7WP27rLQbbVPh38I7ljqiSm2utdCrJAij8axDPzMTxu6Cvzl1PWbu9WWeS4lneeUu2WzvY9WJ9c80wQSWu+I9V1O6vtU1XUJZ9SvHNxPLM+55XYksxPuc8VV7y6aYKglJCoPmz1BPOKYS3LHO6XPoS3JPfNJ3DqW8rzSoGBj0zTBDYvqFzIJVZN2wKEBHekpJYrkpAsQDDjcp4zSVxdCP/gmVjGDuD9/ypzGYdPMcqBg0g3DjqKBIcTstsfKb5di72VOT+tM7kDy45ZSUkJ3Ak5yp6Uk17Em8oXLSHJXHT86T3z3K+VtUAnt1ArBPezJs7WAb1UNgOexzXV6DZXHkS7V3ED5enPSnCJLaxPbuRvAD5/6TS1hbwTpK9yrOG74yaxcmvSUk/DgpblGEU0TYXDZ7mo9EniheTacBu/7U/nsobdmt1iKsozkjOK8w0kJiyRuOWz3X2rLKDW9jQXkzqA65H+ZucU/YxqkLSBJ44+XCHlvbNNtRgVFja0XETjYQfSl9Ms5prdkjIwjYIPc9qjwKLYnbhZG220LojsfkbkJSt5Ym2CuXbdvyVHYVM2ctuiLp77W3fPKAvf61HXhDOwkLKAxKKOuKjsZdUk2hLTovvTyFMMUXOxjjIpr948uVyFxs4OOuKThcwu5jk5746mnsdq98xwFVSNzsTggUy8hrQk0ouDGBGqFV3bweoH/AJpS3ujkxsFO442k9foe1eI1sscsDMqlB8p6bh2xXEeye6FzAyskceWVuDmrEVvTHVrdtHFIVy7jJEZw3Hrng5rR/hF8YPG3w016DXvCniO40vUEjCF4jkSxkjMbg5DDjvyMmsp3B5VW3jHXgqCG57VIWs3k7J7o4RQ3I60RDP2B+yz9rvw98cdN/wAA8Sy22k+LrQpG0EkqqL/PWSIHHT/L719HKysAQQQRnI6H6V+C3hvXp7C4tNX027eyvrR1mt7iI4aJweCpHOenH1r9K/sjfbKg8daU3gb4qXttY6/pqxpaXnl7I9Qg4UY5P8QHr060ySj6/orwkZIBDEehyK9qSQooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAoFFejv+2f60B4xVI2ldwqICzM3CgDvmvz3+1l9um8v11X4a/DOGKDTnfyLjVy585zG5DoF7AlevoOOtar9uT7TEXww0V/hx4fu92t61aiRXhwzWiBiGEx5K7scDjvX5c6xqE940s05xczu0rBjjljknB6c54owPI9cjg1FtRvGyX3sjFfMCyEHD4PXB5wagdS8QXd9qDO9wJ2AJ3hccfSmksk13Eu91j2g85pEpaiTe7EynA3LySPSoI9OZfuvkrJOfLbG4Njt2FNpNyhJZAuCmSO+D3pXVzFc3BksYiixsFCv3Pem0rSl1R1jCyDYwxwPXFRkYwKtCr7JZm/8AiM9UpZGe+kzH5nl2/QjGcV6kVrNHIjvsC4VHx6Vy8jWARomJSQEsAOcj370zklR0N5M3l6olkMX+UuMFh711cSvaIYHixIHwH9AafXl7DqNlbwPZiKeEbhLjAcnkZ9OlJ3KTXiQwyQM5J3Z2/i7AZ71C/wBDwJXhmneNpIWj3KoLf9OKfWKR28Jzvy54UfiFLW9q6vDbXcLSZyqKTg9Omfau548OWSAxGLAdFbPTuf0rGTyZKKWxOSW1nljuoJZo50JEzYyMfSo65zL5zrIrKjjkcEZqcuZ9PNtFc6dAFM5ZZQf5TioS00p55nkUgcAsGbjr1qF/plLGTsJK1uI5pCYsnAxyD60tBK1orDeQpO73IqTGmuLBri6fAAzF2BPpULLZ3E8fmsm1jweOgqOyZk4uKyOLq5hby0EoSLGQ/RsnrTWd5ZovPWfzQh2qw5pMNbR+XbSwNIy8naf2pVbcRurpJ92ikyyqwIA/vWax9Feci1sFSITTrGvqT/QUjfX2cJbpsJ6E9x3pq8jv/BuWPk5zkHH500kWQvHIVJVweSegBqSHLQur+WPNc5Vs/mPWvY7qZEIjRcsOSByR2/OlOWCpM3ITEeOg+tcStKk0QQ+WWGB7+9StGLWUK2PnQD7yz+WygbSev1HvTt7tZgIbibartuPA+b0/1pIwiUgO7B8Fm9CfSncVsbmLyQvyght2OgHX/SjeAkKRiQsL+1uCJ403MpHBA9BVi0nxM0kkVxbMyGPaysDtYYOcg9Rz/WqwtrcxAIY2Uy5MRzw4HX+tdosas0lurI0XVce3ajwR/h+sX2U/tk6R8R9Pt/CXxBuLbSNVsbWKGCdnxHc4OxcsT+Mjbx3IPrx9XowdQV5B6H1r8FPD2s3izWc9neyWN5aOJop42KNDIpyrDHQggV+q32RPtUr8aNHTwr41iis/FenxCPzdw2aqAD/FQfyuMfMOc5z7VKZk1g+lqKAMcZ6cGipAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAVRPjZ8WdD+Cvw71Lx3rbxO1smy0tXYBrmdvlWNR1PJGcdquGr6vpugaXd61rF2lrZWUTTzzuwUIijJOT09PrivyQ+1h9o/WvjV44vIHX7v4c0u4f8Awm2QHLoMr5smeCxGentQGS/E34keIviN4q1Dxb4ruxd6pe/81/8AKF/DGMY+VRgDvxVHeeO42PNnfsJkz3P+/wClKSTpLeNKpG7O4EjAYfT1603uFaOcXCqCeG2n1oRjIgsc8snmFvLTbwvrXdyhWWIIgRyA2R0ruK3a9vUVnYmU42lgqqf9BSCWr4kW4JCxk5IPJPoKwbM4xGkzfdpxG4yZW3Gk0dbS53eYGQnJAGcD+9SQ0yO9TzpwwkjHyA8YHqaY2un+TNIJ3LN1THIbn+tItBwf2OtOdZJhEE+SQnfuGMKeh/KrJqOh2cwiAvVdYVwoBA4x1qGs7NYonuppA7ynhR/L7GpMEQiGaWALzz9fT6Vg9bLYpPTI2+0gRQwm2nMg3ZLdamtLsdLKWU0ty4cOyyRk/hUDOR75pO81iSe2kt10yOJHAVWj4Ax3q0/D/QEuT97mCvbucEsu44wRn8jVVlnSOWX0Uqc8Irus6fFNJ96sLh5FhU71cbShzSsmnXNlpcd7HaROLmLlm5IGeSK3GL4fWTwbzGgEqfxJNvD/AJdqjtS+HWi2Wnxpb3FyQrZZZcbCM9BWj/3RWjpP8f8AZgkmlC5uYpXVYlU/Ljo2e/FTtpo8djctE7LKF/iKVHDLjpVk8S+Hrmz1AynTo4VkCxxdlA7N/Wom73WkqwOrs6fPG68qQR/2rbjd3X6mjOj4nsXENhcK8f3TzI1hchcZwCfxH0NV+azlLmNVAESduenT61MWs11HCqW1swnuAPmxlSrdc+1WDwz4faSDUhNEnmIgjiOcZznHBrF2qD2TGp2aiZha2MTanLMIhgjgkfzdxTTVJi8aRopR4HIEhOeM9ADWpx+Bb2bR5poiou7eUiWPYS23H4hVOn8K30JFlNZsJN4d2k/lz/Ws4Xwn9mE+JZHxFSstPmvmeN8OR87HoAPWlE0uZpGB3bHGAAO2eK1CP4Zx20c1ta+bNcnuFK4+mf6U3h0WTSnZrna+F2AuPTr9KlciMnhB8NxW0Z4NNB86CYE+UN4IP4frTdbcyCczSJvVcRjv9BUnPLLFqd15Ibypcggim81vdRybTsVGw2SOT9DV0Zf01p140RsC3IDFmMjchATjbT63lkgttwLedu3MO1cmR0iIBDEtgt3FOlil8j+KyruBx71MmV4ObfE4k8+YrGF3KxODuz0FAldSIl8xkDEkgYP615DFAxSJHZHAJJYd/SlY0mWOUycKqknB6e9SmYOLYspli2urrJKzAg9c1d/AvxH8Q+A9Vg1jw9rk9rfQODHNGoMiEHI29uvB9QTVFtr4GEM427FIwBjI9aNPlYOkxfLIMK3Q4/vU5yT4ft59nX4vxfGX4a2PiO5urV9XiQR6gkCNGu//ADBW5AJ/LNah6/XFflR9gz4qX/gr42adot5fTix8RxnTHtpJQsQB5RwW4BDY+tfqv7Zzjvmsk8kBRRRUgKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKMZor0Y/mxtAy2eBgUB8X/+pV8Wp/DXgjS/hlpt3PbvrxN3evGRh4EICxN3GWOfQ7a/NHUPPuENzCqyNGOGDH5h6kGt8+2R8Vbb4qfF/V762VpLbSGfTIpt2WnCMecD5doOQMfrXzzNJJJauyu5DjA7fUf0qMgYSSy7wvDMB26H6UvDBIblUjVpFZMM57H2rmyg8+RR5fQgbcd6tFhocjhYZomDOfkPcH+1Vzlgtqrc2QkulPaMAJfMXGSwGefSm1xBcRzAhM7xyrDgf2q6nT30+RrFkX5sKpHILHqafXPhWd1jmjUwzZAO8/Kwx06da1ndj03Vxs6RUre7ury0SyW3QNFhQzAYNR2r6f8Adb4skyuxAZvLGQp/KrTN4ZvJbz7tEskQwTKrLwG/KrD4c+HR3LNNdqrAbnjKhhkfWnzQhsn/AJpTeEiG8LeEbjV7YTC2PluDjj8Z9/Sp6D4eX7206XdgckYhO7nd6mr1oOknTm8yNcQsQdseBz61aPKWRAygMPU8HFaFvOaeUdGngJrDRl3h34YmWADUfNS334b5fm3H29P71pHhXwhpWiqYIQMYIGBipS3ztH3dlUAYOTya7DFWCqxP/VXPv5k7NHTo4Uavokfu8RVvMzk44HTimktlDLN5RgGxuCTzmlBcM+ITkYOS3rS52Da0b5Ge4rTcmb3REZrPhfR7y3EU9mrggYIHQCqTqPwwZXXVdMbYVVgiHGSxGAuPTrWledEhWORyfccg0k9qjfJlyF5ADc57VdXyZ1PbKLuLGxeGRWfgfWldZUEcSg/xYcjep7deAOtX298EmXS4JoLWOK7CL94VOdwFWW1tbJHJuLVf42N64zlvU1Ks8W4sFIJ4GOMDis7uY5FdPCjApmkeHG0y6uL91DrJGqxqwyQe4wab6x4F07UJGvZ7Pa0qhZE6ZHOCCOhFWa+kMYyAH9+9IvdrIoeUlRjHHNULkSzlGz/zxRHw+HLSC28qLzjOVwpdtwPpmqR4o8FNeTBJIZDIW+UoeMfT65q/teFR5rSEgcDmm0lzHKwypx2bOCKvr5MoPJTbxYzWD5u1zw5PpUzz3SAfiA3dqaR2kl/p8KR2q/wkzuK85reta8M6Jqk7XVwpllUYVDyM/Sq7e+FprZJZI7ZY3fooHykY4x711Ic5Sxk49n4/q9GIXlm6SbY9PJkTDSEL0NcLFHO+Z0GXAwhHHtWmx+Eb9LgSFGWC5BW43Hn6e1Vm58NyW00yNADbxNhGZvmX0HvW5HkRkc6fFktlTv7G4QNPA64B3FQPw+1ETb42DI5kK4XsD9al7u3eIPE1wwRuOE5+lNJ4vOn+7W0rMcYAxzV8Zpo15V48GLwXLCNmgBKn5yOmKb29vIkzpBKZctuC+g9Kk7zT7nyS6IQEGG25AJpLTTtVbtkCBSVUjjP1rOMk9lE4E3petNpGsQ3ls8qPbqjQyKcEsCDz7cdK/ab7P/xDsfid8JdB8U2OwE24tZ0U5CSxjaR7ZwDj3r8P5H8mTeZQ235ge45r9CP/AEzPiDL5mveAGvLcQTlL2OKRmMzSkYPlgcAYXnPHSpTK8fw+/KKB0BGMH0oq0gKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKqvxX8Rad4T+GPinxBqly0Fva6Tc5kUgMGaMqu3JHOSKtQGSPrXyB/6lvjpvD3wl0TwnZ3TR3eu6n5rIpILQxL8wPtlxQH5i6rNL5Zmkl5OXDqMFsnPT9KjkaQhUR8qq7ipHHNPLkBiqOyhQoAJ7ml9M0v7y0mZPLTaAC3AJ9KwbMkm3hBpEaKixrOiTeYGXJ5bByP9f1q0xF7i/jZHdMoQSPU9T/SoyHw1JbXTswE+1cxrnGD61bLKzt5bczzzsJFTap4GW4+U/StW6awdDjQxtjyx0mDUI4jcEOYMbeeWOf/ABT63e+1e8ktlijhhzhi3TI96703S57Iea43O/4MEEYx1/Wp/TbBYcsycE7m7kZ6muZbYdimHb6OLfSYQxYApkAcHOW9adw6LFEp8vpzgentTtLeOM+eM4zkE04iUu7E5yea0JWyZvxoSOIYkto9sSbXUd6c267WADbh1OPWkpbYzKZ4mJIO3Hr9fal44JY1U4OWxwtVPLL1DB4PM8wyFG3E444AFPogxKoDlRzmkobWUBtsBwTjJzgmnsdlPGgPlsV6EgYAP1rBxaLUvo9jVkbk4UnPSlJWOfmYYHIAB6flXXlXAiKIgP7kVwYpIm2sjBsZYZySKGejtWjEKBbeNZATl+dzexz/AL5oncxKVkKbj37iuo4dwI3YY8/N1pteQltryhjEhy2081hPLZOsCsO+RQiSkknlvelxcyKGjkzjGM96NPFtcwGRI/K2nkV5cQpuCqWDH15qtpt5M46RHPtd8BicfvSTIQR5Zbk9KfNaMsm9clxwQvNISxTPg5IIPAxR68DX2MXCAklVUd/rSEkqOMKMDP60+a3diwIXeOSCf9Kbm380KEcL3rJ5xkw90MRKsDgMNyscHHWndxtuIlikQKDgjB5HvXklqqr8uN4PVun5Uzeea1+WT+Jt6lewrOEtlc6ziTS47iR1UMAT1z39areuaJaiYtJbuwbGeKuPnxiNZB8vQkNSEyRzfMSMgcZ6Gtqu5xZpWUJmMeJLAQ3KrAzCMHO3H7ZqBm0yexv1vxCwiZRyR2PcVpHiSzeFzKrb1kblT2NQRtSjefGWEIUlTJzj1rrU3ZRx7qOrZBLdRCylV3d1dtiF15+tQ9wLJNObT4IS0gk3hz0x7VIXcpimMqgsWUgFuOfWoVpJRcgPnc3GV5BrcreDn2p+IaJBGk0UTuzM52nPAr6G+xX42HgP7QXha5uZXjt9QnfS5xEOWEi4XPqMgZr58ZEd/OycYxgnGDVh8O3V1pmrWGoxtMk1jNFcJJGcEFHDDB9eD+9Xpmo1g/eHbtYqeSDgn1oqm/B/x2fiV8OdE8ZmCSI6hBkhwASV4zjsDVyFXJ5KUFFFFCQooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooD0A5yOPevzM/wDUz8QC++M2ieHrXU5J207RIw1oVxHbSSyOdwPcsu3P/wARX6Zivyh/9QOVpvtO64sSo5jsLCPg52/wgcEUYXp81y6UxKmWOQNJKEVcccHk/wBKnYtJghYlAM7xtDNnj1/WmUElzdX1vaO7RiEncx525/8AFSd1ayW8wBnLhOCw/nXB71rzeDbpiSenWFzbIXkuRskOMMuR+R9anIdO8uII0W1SdxDDLD61GJKxs1LqANqtGRnO1eOnqam0u5DC9xAP+YuFOckZ9q59ksnVqgkO9KVHP3dWVsAEEduelWKFGgkyWOxlwAahNDtFibzS2zeMlFHf1qw5G9Y2jO5hnk9K5t8sPR16I6HETecoWNRyNpBPal/KVQSqnptB615FAI0BIAznI7/UU7jtXEa7pMEn8I6kVp52biQjBuEjHKrGoyxA6+1SlraxXTq2CjPyxYcfQCuLS3iOyJoyiMeS3U/7NTmk20Z2PJFuC/N8xwAD0NWR2TqKErTR7lnBmkcRZ4UttJ9AafR27qxWPLQxZ3GTGE/vUvp6W7sXkRRhGwzHdn6e/vRJat92RnkRfOHyR7DnHqSetWtJLRWpNsiJYVfMZYnI3BwuFYemP+9MYra7eQsoZVb5T6Y96sDaUZYS0edijLMp6e3PamU9jIFzvZQq5IPf9K15No2IpMjdiQOSmXI/kB6/nXaWiM3nLCCsnBU9VpWG3w6jySyKf196J4UBZw7BSeFUkYNR3TGBqtksN0ywSExE87hjNEtsDuZeWBBBHenmxlcHy8buhzninQs5WTICLgE5Pf6VXJ7JSIXy4HB2u6uOQR/SkpLZ3JAlRhjOc8g1JGKBwVmjZJDyCvQ0kbWNB5ZYYPRhzWD0Z/8AwiZbcJNvLKCMAn1pBraMyjycrjkg1My2wOBFcCRs5A29Kbm2hlDuJlSZc7kI6+49KnOSJf4QNzE2doHJbOCKZzwSSShgu1c/OMcmp1yAj4bcU7tyaYyZLCVWIxgEdxUrK8IbIyWN3DBR8i8dO1cwxJ5f8QBQTg9+O2KkJ4jLueNyD/l7GmbLmQFFcKuAR/Ws0ymUX6V7WrOXLRlEYfycVT9XgKwCFg6LG3TORWoXaCWNvLQ5Py9OcVUNVhaPMA2qHBIYDrj1rd41mNGhyavtFAk0lrx0uYWxHyCr9R71xPpNnHPFC4AjIJLK3erYNLEiyK8seWXcqx9cEVHXelCx04ulyJGU5Tam4k9xntXUhZs5FtSWyhtZol3JCoMhgY7c8bhSlx94Wa2eMgCZsbSeB9akbyOSC5t5ZYRG8mXLknnjjIxTdLG4uZTO6KUk4DE42n1A/WtxPJzrF7o/WX7C91f3n2btAlv0iDLPcRxFQdzRq+AXJPLZyPoBW/185fYAuZbj7NekRyOrC2v7uGPHXblTz75Y19Gd8VtR8NN+ntFFFSQFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAeqSGGOeenrX5GfbViMX2n/ABmokMqTzQMWJ3H/APbx8D06f1r9c1ODn0r8n/t0aMlh9p7xHbxQRQJc21rdfKcli8I3OfRic8emKMmPpjH+HabLLDFYTjekfmSyAEndjO339DUhJGQINSt7UTI5EUhK58tgOTj86Z6Npr6klt93uQs8Mhj3scBgenFP9Lmlt4ptMZVOxi2DwzN0xnvzWpb4dClJ+k0lrHeQ/dzEY2wu04xjv+le2kE6RyHaQY24J6NjrRLenyyYlDO+AATjAx0H0pW0++C33qRKCdrDHArm2M6tUf4TGjW8ZLvOHDNgj2qdRYHKNjLDjOetVq1upQwC5UA4Jqfs5PNIO0Er0Fc61Ns6lD0SKMSAHjJcN16YFO7d2dxGuCQSdx/pSNtLEsbXEuCQCAue9G+R2VmwjMPlAFUpbNrP0Sdqym6G4KvG3nrj1qctJQ8EMfmmQcRsi/5F4/oKqbR7CziR+gUmndoL5IGCSsobOMHqD2NTFqOyGuxe4ngaRXGY4vKzEAeRzxn96lbcm6ADwebGjBT5cmSRkcAnpWf2DagSI4vMZUwzDtUzHPqHKjUCm7vGduR7YrONsV6Yyqk/C/TaNPeRwrNa/cIhlVLsAdue46ntzio640exs5t0N/DfOvJWAnZ7j6/lUFZy6hIf4moXkm3C/NIQCPQjpUjbExlv4qxwk52Ng8+nAqZTjLxGMYTh6xG6sU87DNK6Mu5Qse0imDGTlPKQhSR+DBNWF0+8cROpOAVCjG305pGbT9R2i6lhjZXO04PIPrVUofaLFPLK15SrJh0IJ5K47U8igSIHzJCynoD0B7Cl7ywdZM713cYI704hSSCJYzEZo2bJJHzKe+DWKw9Mzba8ImSBZnMbxqGPUjlR75pORLKFQpukZ0OGJGOO496kdTsrgxmWGVRvILRtgqV7Z96jnNrNIDe2LIpXBkjT5Wx7Vg1HxkqTfgxe7t4/4sSsARhSBx+uKhp5UIeZSy8Z6dT71LS6dEqZtZ/NXPUZBjHbio+6sJVRlYs2AME96jS0icNkQLnaZDk4JGQoxg0hNc+W7M27a+MN70tNES7Jhtx5x6mk3gP/ACpYskHiiaRDTR2JBEFMLFnPUe/0ppdDc58tWQnk896WKTxrk7TjOPT2pO4lMUaCYgHvjoM1KWzFv6G8soTKFsZHJFR0tvb3eBPHGNvAI70vKVO4Bs5Oc1wijjHCg54q+uLTya1iyVfXNEltsyQSS5z8pUYwDTQfwrfyxIZkT5juG05q6XKqqFpDvDdPaoS+0K2ZZriZmRXGPkG7jrn9q36p59OdfDBC6paaPqVubWLTRJctCCsnmbfoB75FVV41dLx1Uwi22IIi247egXPc8VcdNM6W7LDHBM6O0ce8d2GM/pzVcl0dYoYsyM8jKTJgYGfUe9dKp72cu5aP0x+wIB//AI3aQBb+U4v7sO2OJDuX5h7YwPyr6Kx71gv2Gbf7v9mjwwAPlklu3X6eaR/pW910I+HJfoUUUVJAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAfp+dfl/8A+oPYXsX2lJ7k2gxNotlJCUOTIg3qWb8wR9AK/UDOB/vrX5vf+pHbJYfHHQNSibYbvw7H5mc4O2eVQP0oyY+nzXpc6l03qsJmysqqMKMHg/Xg1PtpkD3M86Ss8EoTyyV/Cy8kioPRGtZ5Db3RxIWUhscsCCMVZtKtZ2uGtAxJgfC5OBt71pXrWTpcZ7SYW9vbXlwvnWvC8jHUn3qX+7lPlwQB0zTueyVNrR4U7SMY70hcMmD82DtwTnvXLszI7UMRQ0WOOPJbIJOakYZVQhRhWI4NRags20H5PUmnCkKuS5x24rVmjbreCZEgZVjaE4yMtn9xUnbXYaTbkO3CjioyyaFgocOeOo6VN2ljB5IMDhnJyeORVLjj0ujLDHS2heIEnCBjlc96lNP0sth3JKjlVX096bQoY3H8RSgUdasOlIsgbaD+DI54FVSg8l0Zof22iyMpZGUnHyADuaeWuh3ewJcoEeRvm+UcY6Z9qmdAFvf7YWiVQuOT1yO9WZLKPykMkAjSVtqyt8yueRzjpWxXR32UWchxeCqW+h3DeZ/w/mKBgkDhRSp0rykUPPh0YCHgAnPfOMH6Grlb6ersW/iJIq43Rtwcds+n5d65aytoklhmiJYfNljkL+WKt/58FX/RkqMmlXloxs7uz5k+aIMQd2T19PypWTSp7dysqLEJOY1frn6gftVult5XgeCGIiNiGjATcBweQeoPWnccZ1GGGSSdUzGsRJjKgMP5mJB5PFT8Gnkxd+zO5NPXYVlcRn/KV4IpD/C3MH8ENKeW/hnKMPf0q1yWChipkeV03bXZcMOf3FMEUrbgBHjZZMjB498+ua1o14byXfLlEBJp8pjM/wB0VJsgso6fUV7HozzZWUIGbnaTjA9R71aYIWV3UIp3euDjNdG3j81XdoykZzuK7axlBYwSrWnopsvhyCNvMjVlk43A9x71G3WglldkUxEZK+h/KtCMFvOrXEhXdztbsfao7U47dYnGYd4GY8Hk1VOtLwzje36ZXeaGTIZEIR2HI96jL21W2iZBGCx6kdc1fNQmty6PMEO38QBAOart5HCNy+UzIehPf6EdKwVbbyix3LGynzxhVOcgr1XtUfcwMy7iRtPfORUtqLQBpCMRuBn+J0Iqo3Oux2c2W+VScHcMqa2Y1v7KJXxydXGM4XP16VzDOsZAz0HSlXuor2HzoWVl6DFRzs6MQ3Iz2q2EcPZTKWdomIJlk4mVdrcfSnAs0DMAud4wBnggiom0Yn5+ox0NTOmSmeUCYdBhfatiMGma1ksrDKXrGgNaPLM92I0bkIvHPQc1VpfOtWl852DTRcc9VXgY+prTfiFZJFLYRlVb+EWCHjJHUk1nMFra391JHLKR5Vu5JY5CnnjP0rpVM5V/p+pH2MY2j+zN4JJlLiSCd1BGNoM78e/Of1raqyD7IbyyfZr8CPLsz9wkA2DAwJ5MfnWv10o+HHl6FFFFSQFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAA/pXwl/6l+gwnWPAHiK4KhJra+sWI5bKlHH/wD2a+7QcEEDntXyT/6jnhhr/wCGvhjxdGoJ0bWTayZ6eVcJyfrmIfrRmUPT8/rLT5Zrhf4iPMHxGy/ifgYWtP8ACtks9m1zcKfvMLeW6sORWfadZQA/epjIqwthQp2jHPfrnJrR/h7JBNp80cEpc7i+XOWb3Oa1ZrKZv1akjq+Kq25jnbwB6VB3Uolfk8d8VOakypIQwBL5yBUQ0CoXcjAIyK5vXOTruekNbfgk5UpnjPWu73UhZqDAQM4ABwSx9AO9RN7qSR3a2/n+WuMuT0H1qIaU6zdF4Z3VImxCu3O9qpVSbyzKVrxhFgs9W1Xzm8m0dWD4PnDGce1XTS9T1JoxcGOBQMBldtq/rWWwzX9zfGyzdyRIeWjLb48HlQOhNSOqwNo11/Ht78liJIzIwdipHG7bwPpWz8cZGrK2aeTZdK1FZCWuLHHJ4X5h9RjORUw98iCOeJl3Z+bbwAKxc/EK6soEMNhCkMowrhyHBA6E0gfiV4gtJA77ZYpFyIYlDAjtn3FYT4jmjKHO6s+jNG125RgUYRso25bGQc8GrBaeKJVgFlc3SqEkLhs/iyOR+p/evl3Tfi5JezhbxmgxxnbwD7+lXGH4gRZWRJVKYBfb/EBHqCK0JUTq8OjDlV3I+gdL8cBJClxGZVXgYIU49ferVa6xbajAi26hJd+fMyOV7r6V8/6T4nsbsRyQSFjLwPUVe9K1u6iIjaYBQQQrAADHeq43yg8SL3RGa7RNUbfKPLSIRhOSrEAkDqfrzxRJPGh2ox2nGAW52njnseM1WRrcUqrPc3KsrHDEfiI9xXt3rFr5flW9z5KkfIOGyffNW/8AVEp+B5wS7T2KSm5WVc/5d2eP6Uk5txFJOu1lbI2cHBqrz6yrS7yy7MjOxQAQO2P9fevTr483eY2cSkbUxtCiqJciJauPInlkS0TzpkCq3OR2+tUnVfELy3kyfecIH4XoCKW17XC2YlBGMHBNZ9ruqzo7TWxVmXJKnpWr8vySwjYVXSPZl2fxXEkscUSxlVXJO7g1B3vimO4mAm3kfyYHA/Sso1X4gNDI4K/MOSqDpVSk8b6mRJexSbSrjaC+Dz071u1cZzZo28lQWjWvEvim0w+yRI9qkhWYcn0B7nio2LXbF40uIbqWRDkMpUERnHQiscvPEuqarcnFnKxHLsu0nrzwOMUjd3mrW8ru9zJsbaCiuUY4HHI4OPpXTr4kIx92cqfLsm/DR9c8SW5jWCSa5J+YEEZT8qqDXyyZwROCeh7D39Kg7SXxXq6vNa2160KMdxcblI9x1/MVxdW2r2l1FqMUjDZhZUdeMdwMdRWLhCBlCVkn4WDTbh4ZGjik/hNkgH1qXDxzj5ZBxxmoWDz2lRkkj2Ou8JICuD3ANc2uqJb3IHl4kUkOjDhh61racso3ctLZZre22rwvOeOal9PjKSom3ljg4pvBGZbVbkH8QypHTHpUlpkJ+9xZ6BgPoT3rY/hS22hn8WmW2s7KLYHlmhKgjqB6VkW4wQyNC7BY4W81gOCSp4+tat8VLS5utUsh94RUMW0Dvn1FZ/Z2Mt4ItIhXc17cwwooXPzPIq59+tbkUsnPt/0/VX7L+jTaB9nzwJpc8UkbrpKTFJPxDzGZx+zCtQpjoenf4RomnaQcf8DZwW3HT5I1Xj9KfV0Y+HIfoUUUVICiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCsc+1/4cHiX7Ovi6BYTLNYQR6hCoGSGikBJ/wD6lq2Oo3xLo8XiDw3q+gzRLImo2FxbMrdDvjIH7kUYTwfjhYTRXwSG2lwLkeYgbja5/wB5q4/D5Hs7iezMiuRD/DcDBxnofXvzVZbTn0+WTSrq3XztMkltsY6FHK4+uFFWDwY1yurSrPHIJVXawc846g49K1pfaOjHSTZMXg8y6kGVA3EAmq1rV/Ks4tLe3Lkc7s4Gas16m25PyfKTn5h3qMksbe/LrKDuJwcdK0ZNRydDcsFNhMtj50VxpxkebP8AExu3Z7D0qb0G0ZYNsUCJOy4eJlwVT29TU1BYJDxIm4LxhxnIqQs4bVHWdY0VgMZ9vSuddd18NyqlNkrYaDZSRRMbJIGQAF4z1/OpaTwnb31rsECgsNrE9W9wfWo+LWdPsV3TXEUSnkqx707T4i6TEoht3e4KgbREjNz+QrWhdNs23VDBRvFHw3uLd3a2ZzbIArQsuDj1z3NVNPCktifJs7hzGxyQ645P9K1vVvGtxMrOfD16y/haVoyNpJwM56VSNW8SEtvl0K8VTxuZPlz6fWt1W2YwzUlTQ2U6bwpqcdx94hjDqpywY9am9Njlth8kbQysMNsUD9ulEfijTXO6ITIhODvGcH3FSlpqEN0ytBLFIpGSRVc5yS2WRqhn9ST8JXdxFKFdAFJxzxj3FaXZXxZMMxJ6HPpWY21zBGR5g8tu3vVhstZZMYmBJ7EVz7svZ0eP+umaXb6hukXa54GOTxSl5cyxxeYJP/xHU1TbLXDGR5hz7U8uNeC27fdgZGxkn/StPE34bT6pktHqMnDoTH32nmnMWsyCPEjhgORmqQ+t3R5W3f5hzSqayVQCRCnHGaxakvTNOD8J7VNVXZvMiqT361nfiO8aRmRt538gIe/vTjV9dRsu2VI4AqtLdXV5cADBI6Z9Ksoi85K7mmsDS7sbie1MO/yN3+UAmoyLwnCW/wCImkdT0XA5+tT95eW9phCWmnY4Ea/6+lR91farFummubSwhAyC5AbHrya69Sm1o5FqhHbF7Pw1dmWNLS2EQX8IC4GPf1qz6R4JvFIF9dxuuMCOSMMoFUrTfHHgm1u0XxL8R7q3hHLfc7fzXHpgcccjv3p3c/GP4WxSf/TPH2qsqqCrT22GJzgjAq/4r3H9Uaju48ZfszWl8M2MUA8kBGEe0hTgGq9quiRWasZLWOSF0IfK5Kn1pjb+JDf2KXvh7xxpuqRscCPdtdTjoQeR+lN7rxteWhKa3Yt5Z4MsZyP0Fc+xWRf+nQqdUtpkVc6PJBZuFMVyoXcoGQ5/XpVUlsnu7rzvKLAjBDDBq+jVtO1az83TJ1cA4BznB+nWmUlirtiSQKB2QVNEpqX7GN0YtaFtC8+205baR1ZXHyk9eO1TukI3mxOepfr24qJha1t4BGTvx0zxzUzpDxhBtYdPXoa6sZKTRz2uuSvfEm4S48SRWrE4itM8cbSeakfghpE3iv40+AbSW3R7c61DIqL+FURS/Ix7DmoPx663XiSZzGGAtlDNkYHYVuP2HPDDa18Zv/cI5g8NaVLI4ZQPmmARB7HCMfoa3YLMkc2+SUWz9BGxvbB6sT+9eV4MqADnoB0OM16DmuickKKKKEhRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBXM11bWUf3u8uYbeFcEyTOEX6ZNMvEOuad4X0G/8SavKI7LTbd7mZ/QKM4HuT096/ND4t/Fnxj8Y9bm1LXNRmjshIzWmmpIywWydhtBAZ+5ZgTkmqrbY1LLNjj8aXJbS+hv9o3wtZ+F/jD4jh0q6t7qy1C7OpWhtpBIvlTAHgjjh1bNVDw8twfEKyXEo3eXjHdj6E9xUd90iiA8iFEIJ/AMZ+uOvWpPwhC0urmSYE+RGSik9DnitSNyslo6E6JVxSZOaoWdyg3N83BA6CouSRo5Chx8vPvUjqZJWUKzI2ckDtUXIqNhnYA45O7Oa0r5dWb9Mcjd9Sa33O7ZHUZqsan401a7uTpuhxpExPz3DjhR7VP6ikZTDDg9OKpGu6XLLaypZGVC5wGj61RDpY/2Lpdox/U7uvGHh3RZt2p38mo3nTb+IlvYDgU21n41eKNCtbW48O+HJbLe4aGa4h2gkc8AjmrH8A/Dfgrw34uiv/GVit2xYLHLKNyoSepBzW+fbA+Et34y8A2fi3wXpy3Y0cedKlqgLPb45KhRzj6VtU1U5zHbNPkTujhS0j42v/FPxs8d6Jq/jC48UXj2WnyxLeCNigV5GGzpgdcACu9Kb4nWepaLpvifWdXs7bU5EltnuFOJI248xN34h71XYLrxRaWV7pemandxafqWw3tmkzLFOUO5fMTOG2kA8jg1tXwyX4j/AGg/HngnwvrMsmow+FII7K02RKFs7RW3EZHXnpk5rqz+GUUo+nJj80LG34avrn2bvi14DB1OytNP8b6S6rIsph2SYZc/MPbkVVdL0Dwpr7vZ2cdzpmsRtifTLglXU9zE3f8A+PpX6B+M9a0Xwj4eafxRqNjplrbW6Rqss2Hl2+idSTXxv8XvFvwo8ffdG0V5X1KyvVaWTTNMdbyeD+bExO3cuPl+Tqec1xr4xbx4dvg2zmv2Wv6UrUPDuq6FAtxc5utNL7BOB80bZxtfuDS9vaPIuY3GW6NXejeK7q/t5fDPjTTb+wXa62N7LGFeVc/Ilxgbc+/HWvbC9jtohE5GAMZ+np7VzL4dXlHXon2ymS2jaTdyOGubjGOmOc1pXhvw1oV5AWlWQvwCR6/Ss80+83bdoY56Y7VofhJpo28wTKrN0zziteuxKWzatr/XQvqWgaLahkkttzr0qn+ILDTzGWhQRhPSrbqQvBLI8sxkYk4wM1RPEjSOrBJGVjwRjHNUWWdmZ1U9dlSudIa7lKrJuA96cxaKY3isbcjzpzhmA/Cvc0wt9Vktp9krHIBGe1K63q98bRbfQ7hYL69At0mJ5iDcFv0NXUwcppfRTyWlF/0f3WjibU4/DHw9sTe6ofknvpBmOFiOQGPU/TpWyfDX7I/g63tj4g+Jhk1fUIwGMfmN5ETH/pP4j+3pVM+G1p478A2cTw/+0vFMdmMmznna1u8sMAq6ld5zzznoa13wb8f9R0W1jt/in8Pb2ygncxG8sszoCoAbcnUgZHPuOtd+rEI+7OFze0kuni9/0/P74s+GfD+ifGXVNO8QQzWWix6qsN2+nw5kht8jJjTGCwTpxzUZpXgL4P69oHj7Wz45msbnQ8SeGba6twkusqW4V1/+2+Oor62+018EfCPxhvl+Ifwa8Y6He6hPEBf6RNdrDNNjGCFb+brwetfOfh77MfxS1vWBpdr4HuLZmba8888ccUeOPmfOMDHaulHkqEOqRybOP2kpNjT7OvwTX4o+I7/RrfWLvSpYbXzYLuInEcmflVh6VJfEbwp8WPgxrTaX4iA1nS0YmK+VSVkHfPcV9W/C7w38NfsyeF5oNV8QWmr+Ib3BvGs5PMxgf8tcdAD3rHviv421D4i6rI89sYrItiKDOcLnqfeuVyOTGLxJHT4nGnNuS0jHdI1+G8nj1vQ91qZOLiDnGfofzrQdMup7wK24kn2qLi8G2Nsxnt4TGepUHODU9ottJGoiA4Hr2rStmtuJ0K69YbHDqQuWHzDnFStmdsUbFgN2OnrTC4jVGO7P605slaRUjUc7vTtVnGl2ZRyI9Voh/GcSnXioK/PaK7e9WH4Z/HL4mfCPTrvS/AVzptimqSi4urmWyWa4chQqrubooA4HuahfG0arqtsyfzWygkDnjtUPIxQgpw5GATxj2rZtvdb/AFKaeNG1fuso+uvgr9srxLda/aaH8UXtrmwvWEP36KERSWrsQFZgMArk8nsK+yVZWAZGVkYBlYdCCOCO2CK/H+xF1JdKfM3Z4YZB46f61+mX2avE994s+DOg3+pOz3Nqj2LuxyX8s4BP5cflW9wuRK1dZenN/J8SNElOCwmafRRRXQOUFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAY99rn7+PgLr33BnVDJbi6294N/wA2fbpmvzTv/E2lW+pPYR35nuwxVoYEaRvccD/fNfr54j8P6f4r8P6l4Z1aES2eqW0lrMh9GUjP1r8g9S8DX/wp+K934d1RCJrG8ksZHIySUb5X99y7W/OuZ+Q/WPZnb/DpWNwbwSei3cF8GQLIrqcFJEKsp79amdIhMF/dzonSDAPoc15B4YuZLqa7a5TzLiVpMjtmntgps7u50+dlMiw59yM1zOPb2tSR2OVVGNT+xrdtJM7q+SXG4nFRM+Y3ETJkHnFSs7NFC6jgk8ZqHuZCz5wefWti6PZmpRLAg8MkieWZCzZODjHHpSsUEdvbgyKGUNkn3pWCMuwBfGOcU9awaaLZGmBnNaraRtpdnggr2wikjNxp+I5nIBB/CVHtVu8EfE3x74CRI4Nfu7K1/DJG0IuodjcAbDggeuDUUuj3oddq9DnpU3aabesFW4CFQMHcuaq7yhtFrrU11aONQ8M+HPHdxP4l1HwN4dlnu1kbzNNkntcMp+aYxYIzgcjI61YvCPirV/h/ojWHgvWdN8PJIrNKun6ewupjx1mcn3HQUtb2GkRRx+YlxJtwCinYpH1FTVtpdtPCq2+mxQxAghclifrVs+ZKSSKY8KCeWiASO01/UTqutyX+tXz/ADGTUJmkBP06Aewqz6cmq+WLeCGz02zi+UfdYFV9v/yPWndtoUVqfOdBuxnBI/aoLxb4mktbd7K0CtcSgptA+VB6n3qvPZ9pMv6qP6wRUPibfWMkK6Dp8srvJIs128jbmZgcgZ7AVUrAy3dyqKCUUnnHenNzp8ksjuzs7s3zHPep7wzoqRHJUjuCarvtWMItopcXsndBspEiDybQOMcdavOiXEVsjEQrKSOcH8JqrI8ayLAqhgpHPap/TpFWBl2nglht7mtCD+2b1i/UeS3SnIXdnknB5Aqsa3aQ3AWRWDZ561MvsR9xzg8n1zUPfyQkExDa46rVc/S2BnvibRJERriFcAen71EaYhvYdrYWWA7lPqKvsym8tZYd2QfWq3baPJDMZFbBJK+mRVtN3X0oup7+Gh+FNS0vxDpqWeq28ZngG3dtAljI9/Snd1o2oWjiTStYvYMAoSZtysjdRznGcDI9hVSsLO8hkW6gJW4XkMP5x6GrjpHiG3uH+73UTRyY+cds1uwvVmmacqZVPPqKRqumXqXjffdBsrxEDbWMW1sEddy4PFN7eKaa13Pozspcgqt3KEPpuXcK1S40+1u1LWjLHIwwufwj6io250G8jj8owoeOSg4NR8kk9MxcIP6MyHh64uIjI8UdnPFlMxKAGX65JP8A3pmdMhtB5UCrnPzEnrWiy+HbmRmCjy8jkGmEnhJiPMduhz0qmTw8mcVjSKhHAfxFOT+LjrXip93lJGAPpVkuNPhswWL5PTBqCvEO4henpWcbFLRXOtx2M7l1cMCAc080oMJIirEbc547VGTM6yhRGSD3qV0tw8oGcYwCPauhx4pM598m0MfFCKupI03O2AfL1Oc1Vdb0+5uES7AYBWG5R6Z61P8AiHWxZeKlt3szcRG3Uhh/KxpxGY3icy4VZOTWhy7f/wB/VHX4NWKVJmO+Ibe7sPGMQ0y8nh+ddwVzggcnI9K/XL7LmgXPh74E+FYL0n71eWxv5gexlOR+2K/Lvwl4TvPHPxbsvDlmrSy3N7HaE4/zsAf/APXJ/Kv2Q0zT7fSNNs9JtVCw2NvHbIAMABBj/Su1+JjLcn9HE/8AyKyOYQX/ANHPaiiiu0eYCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigAeucY5r4o+3F8Kol8Z6L8RbKACPVFW3u2HRbiAjBPu0ZA/wDwr7XBx2rMvtJeFH8XfBzXraAE3Wmw/wCJW5xzuiHIz7qWqjk1q2to2uDc6L4yX9wfA729xdQLcrmMSk7O3HY1BWWh30Pih9Turtm3xNBjPByOK17R9At9X8JabeWoYTNEMKVyRkZBHtgHJ9qrvibwtrHhuwsNd1OzMNre3v3a3kfAMjYLHA6kYGc4xzXmIU2R5EZLw9lbbXOhx+ylXO4534B54A6e1QbwvHJggc8k9etWi9hjbeVyWBwe3NQF0NkwBwUA5PpXVv0snFoeTm2jPLKpGKs2hIshUSrkY5HeoXTVVnVQOCSc9quGk2kUsyomN2Mk1xbp/thHaqhhZLTo3h2GZAVRRnuR1FTA8Hw43bQyk9AOnufautGSZolVMhW4BxjmrHBaXlrBIWZihUg7+/tVkV2MJyaZBW+gWkIX5Y1weQe4p08trbsFEB4OM4GMUHTpYv4lwrn5eFB6A1HXIkkdokDMsZ2jHVqiSUFkyhmeiO1XVGuU8u1YBg5wfSqpeac0skkknLE53ZzzVqe1VGUMuR1GOOvrTS9tEdHiQEbGJB9a15zlM264RrRTTZ/xBGQGOfSpWK3isrTzRwScEZptI3kyNMy4U/hPvTW+vsjykc8Ecdqqaci3CRJQMMs4XJzkCprS5blXaWIYjUYZuoFVGyvJSWCnOeCTU/o11IxCKvU8knFQlj0lftok7qcq+DKDnkHHAzVd1cypOX80MMdRxVgvdkgKkc5qt6k24mNkyB3NVv8A9FkdIj7a8XzWDtjPAp9DDGZEYHC55xVcumENxtVwMHPFSmmaiu5DKCR6npRwxsxU14y56fYoXDlCQOQRTbWrGGFjdYdRvC7lHOTU1ojLKibV+QjPHepG5t5AwhKptIySwyCPT61PVrZh2/8A5ZWLXU7+1kW3uclQMBu/0qy2niKBgouI8BABuIpmbaCUSB413JkMARkUiltb/wDL8tiGA4PTrVkZ5eGVzqWNFhl1mxkUOIldTx9PeoPU5hMCEQ4PTHcVxFGItZttIa2cG6QmJ1GYyRzjPrUzcaWkUQZWAHp3pODxlFScYsznVrV3LEr8uagLxQCV2kkCtB1i0jD+oYZI7iqPqreUzMMFM9RWNTw9mVqUlor8keWJBIOOmakdBO27UlAxx36UxyC7AZxyVPrUpplsxKzZxtG70rt8Z9mcXkr1lV1qOS41Ca/K5QPsyBwOKmdF02XUd8Rb5dhKZ/zAZrjTtZt7XStRspoY5BdPvUsOQRXWiaklulzLMxRRGzgA89D0rmciKd7kzu8aTXFSN6+xF8LINR+IOpfEO7tg8OkrvUuODdyKVXH/AMU3n/8AIV9z8+/51lf2YvC9v4Y+Cvh9Y4tlxqkTajcv1LPIx2nPsgWtU4zwK9bw6lVSor72eE5975F8pP8A+BRRRW0aYUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAU01iw/xXRtR0sjIvLOa3I9d6FcfvTuvVO0g9wcgepqHvQzh5PzP0jxbqPhuNtDiuZoPuM0lqyk/hKSMPzHApj4x1zUdbW2u7i7e6+6kmIyMSEDddo7flV1+038LbjwV8UNTlsh5em66W1W0b+U7uJUHuGGf/AMq+ddZ13xToyma1KvEPlVWGePcV5addtd7Wfs9xVfRbQm/WjS9ViLFWjBAdQcfkP71X7hQu9RgjvxUzbXb3mjWV3JnzJYFZs+uO1RV1hWChc4bnFdDlP9Tl8WOZbErJxbeW2wtk4AHarpoazPsm3ZEg5QdRjpVQghLOblVJ2dKvVhbLDEkqn5cAsrN2I7e9cGx/sd6uOjQdH1JbdEDBRj5R35HfFWmy1mGdAs0YljZgg3jkN3as60dVlUs/mALlAxPJxxk1Yra9u5LK3jijWMIxDNjlh/v+tbFdjSNeytMser3OnWzLbRyeYzkA9sE981VZ7qR7jytMgEkkZO5xwvXGQfWnfmNdKZGhIdAeT028806s7CIN5ITylZMNgYAz3qZPu8smGK0QiaIbpxMzsfKJYr39/rTPVY0jgTexUqpznoD6Grcnkwp8zfOVwCOemf8Aeao/iXVYbC0lmmZJVd23d9prKNXZEO7LM/8AEmpxRzLbB1wvL4qBl1GEOBGWKhSdx7mmkUE2r3s8+CULk474qRXQXkiK4O4j5R2FUuMYSwzZTc45HOjXTzgwIOM8mrtpNkrIuTyarPhjQp4HYvk9z2rXvAvhBtaffO/lIgJJI4b2HvWvL959Yl8Wq49pEQbKBYxGyhlAydvWqzrliI4HYSc9K2u58GeXG8bKVSIgI8Iy2fz6jmqR4r8Iy6UAZk8xHBCPj+tYW1TreZIsrtrt1Fnz/rF61tqEfcHr9K9OsTrb4iVim/KnHIFS3iXw281350arlSeO1CeH3kt1eSIq2B+EcGre8HFFHSXZ5L58Mtfh1q2W1ZwJo+oPBxWiiAO+WIHy44HFfNssuq+ENQh1jTiUdGAYdmHoa+gfBPinT/F2kx3sbAOPlkA7HvVqinHKKpNqWx7/AIUiF2SOKPefn8tc5Pqajrixi3HJPAySBjpU1cB0zLvkUZwcHim0sqO0QKqxA5BPQVqThssU2R0aeT5Vwr7vuxLJn+UkV3c36you/wCYnoBzS80hVyIthQvg5HA/3imrw7YSh5VWLHnjn0o2/DHCbyU7VIp7m7ZvOdApINUnU57q3d1dBJDnHHUZrRNSkQrIUYK2Dt44+lUvWAJgu0qdoy+BUrTTMntYICCNmJKAgqM4NT1nPHbWEkxTLIpJJ+lRJkjLeYilXHympO/xb+G7llXDspx9CDXX4ksnJ5kUkYpP4oN1evBDvZTIRgLgdauvhqxvta1C002CJ3lvZo7dFAPV2C/0JqH8KeFVtXAlj3PMxbB68mvrz7G3wutNc8W3PizVIRNaeGVU24I+Rrtxx9Sq8/8A5VhXR89y6mxyOW+LQ2/paPsrw/pEXh/QNM0GBFWPTrOG1UL0GxAP60/ozkkk59/WivUpdVg8Q228sKKKKkgKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKKKKAKASOlFFAZL9pn4cT/EH4bXD6Vbebq+isb2zUD5nUD+Ig+q/wBK/P2SCwkkaOe3+aUHduXBQ91Poa/VwHBznHGD9M18Xfa/+D1t4SvoviD4esVj0rVJjHfxxrhLe6bo3srn8s1o82hzh2j6dT8ZylXP45+M+eNNGbCOLACRI0YYHP4WOM01lIY/OQSWG4CktEvJYojBwQjMNoHUkk813PG5ugSDhskgdjWnyt1o6HGeJtEhZN5SOFAw3B47VZdOmHlHc/BAI77aq8JEY5c4PFTFjIyKEVsjsPWuDJNM7sGsF2sZgLWIZA3ZkYDkkk/0qzWUrLCWGdrcrgdOORVA0q9ZCWbahAKkkdBVkstSMpECTDEafMM4INZxbMWsk7AQ8g2ZYEFCScZ9q7fVXtkIQNKQCpTOcE1DyXzLMltvEmSCvI2k+vHpTU3aT3BjVg4JwexHvVyeStw/pNS3EssbyB3XecgZ4HHSss8c3M8sk8AAA2hcD+taHc3wgsVO/fzzkciqZq1nHqUc7b1DMNhx1rYjPD6kdMrJAeFLGNYUZgB83IB/rVvUaPYxF72eKM54ZmHWs5++y6Xdy6PJL5XJMLM3UfWq34g+FZ8YpI1142utPnH8RCzM0bewC/lWn8Pe39nou7SjXmPps1hf2BuGSKRDnkAHr9K0Xwp4iuNLVkjI8pxhgefp9DXyH4c8K/EXwPLbOviG11e1llkUWzyHzVRMfMSemc8D2Nbd4W8aWl7A8W/y54jteJ+GU45rC/jy477VvJnTyFeutiwbbc+N5Z5MJbQxg43lc5bjGR6VWPFPiJLqJo5Ji0achelVT/3JDGSofI65FUzx/wDEWx02FbaKXzbq5xHHGvcn19BWtJW3NJmz1rqWUSU+o6Ol15t9dW8MfO4yOAP1rmbxn4LCrbxa1Zu54VY5AxH6Viuo/CLXPGzya94k8Ufd7ZZNnkpKQoQ+gB5qKn+FXh3wtqvmaVrpuYokDbmc5PtW8uFX0/aWzSfKtlPS0bD4wfT7jS3a3mSUMMgoc809+Ek9xpc0sY3eWVznPykn0qi6THPq0EWladD5MQIMkzAgfQVp9gltpVnFbW8ezywCSRyfeqox+OPpsbsZpF9cvPFvjmXJxlT3qCfUnEsyuQpJBj29PcE00t9V863ESvyf1z7VWNS1W6tL9xKjIhyBg9T7isHvbIjHHpf7W4yZJGC+Xjac9zXBu4jHI8TgxgEhTxz6VUtE1Z2AUSEIcZVjzuOec0rd3xjPkFwS52nvj3qtx+zFehqlxsR0U53dx2NVu5kSV2jjOEA545NOr67MzssLfLGMZA61DpdMspVlwX7mowZZE7iIAhYzwDz9aW8RXhtvD7RclpRtGO1JXbxmRVGMsc011iPUdWvIdG0/TLm6nmKQxRQLvd3YgbQo5J6V1eFFyTx6cjnzSay9HHg7TNQ1vVLGxsbVrm6upFghQDkyNwo+v/ev0n+DPw4i+F3gKx8MsySXxJub+Vej3Dfix7DgD2ArG/sv/Zs1LwZexfEDx5aLbajHH/8ATtNYhntywwZZSCV34yAozjrmvpsV2ODxXRFzn6zjfk+ZHkTUIPSPaKKK6JyQooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooApjr2gaN4q0W88O+IbCK907UIjDcQyjIZCP2x2Pan1ejr1oP9Pzt+NvwR1H4L+Kmt7S6++aJqamXTZ3/AOYuOHik/wCoccjqMVmN1KyyRGIsWyVIIxivtf7a+gXN/wCBtD8QxYEGj6gVuG/mCyKAPyyDXwtf6jINWMCPuA4Zj1Y1z+XWsYOxwrW9v0lUkVyCF5z09adwXJjdZGU7lOVJ7VEW5eJwA31FPY2jaUFmYj69K4FkOrPQ1TyiwWsrXMpmB27x3OBmpGzubm0uTIJMKeXD8kg9agba5dIvKKhkJ4PpT+5cW5QTSYyvXPaqy5LI7vtYsdMtZWuHlYyPmMRgt16DI6VxpWqXTamjssb28o+UgEMSR1qq61fGK5H3YrzwAeQffFO9LmaCEZchgMA1ZLSEUWXVdWlnuTEs5BXhkHQD0pBblUbc2BkfXJqDinDyl/MBxx1pyzb8HHTpVcpPJswiuohqWl6fqE4+9R+bIvQj+X2qPn0ZLRRKiT7c5yHOBTxnbDsDsKnOfU1E3niAw3MEVwVKyBtqbsbsdxWce1miqcoVrYy1CWOOSKKGGd4pXwzY+VT1Jz2qd0bw/Y38/wDiIumtbpwFjUvkMPU4qM06+m1C1mu7C2tI4jkEGTeQAfmJHYVI2WoWltPawWV1bpPc7nJSMPtPY+wrYUHjBqfLHOSzS+EdQhAEt1H84yDu4qt6j4T8PLNJLcSC41BUO2QtwvsBU9pWrX91oBu5buOeaORlZWIRs5xkcdM1RNduoJTe2d1aaja6mPmjlOAjfn9QardLl4WK6EHs7tLa2uHltYrqUrC+wpICu0kenfpT628L2kjGUxgE8sM5BrKbXxfqOma5NDLOWVyA0kpyNw44NatpOqrPbW4kuUhkxlgzAEjsefWsbePZW8t6LKOXXYsNFhitBZxCJcjIDYAwM0ok0jR5XPvSUV1I3Dyjcfwg8jH1rl5ZS5ZSPm7DpWnKLN+MovcRa21FoyGc8ryuexHSnWtyRajapfwrh87XB7PUJPHIoy3B68+tObLUTc2r2bjDK2/joTUb6lbxnAzsdUlt5ELuMlgv0NS8N+907TylfmJXpzx/5qo31oHnZurRMcYbFSEV5vtooUYhxzVmMwNdvrIk7hvKBAPA6Coe6ukXcFJBb5QfSnV1KZmG5iNvGPWobVHS2jLnL4JPHUYFKYuTwyu6XVZHS/xZIVlc4iXcSDySOgrZfsp6KdX+OGk3LRQSJYRTXzea+GBCEKyjuQWFYFpcM19bNfCWUysQI493C+5/bFfXP2HNHum8T6/rF3GWWysY7dJHBB3yOD16dFNd/hV4kkee5024Ns+wmyWOT35+tArwdBg9q9rsZOAFFFFCQooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooCm/GPwgPHfwy8QeGxnzprRpoMdfNj+Zf6Yr8yL/T1yl1cQbZXXEgbghh1H61+tShSdr8qflI9QeK/Nf44eEz4M+JGvaDcRhEW6a4tjzgxSkuP3JrV5UW45RvcGeJ9WZizSpOscTBYwOKfRyx/KxOWbrg8UxuJIhL842lTjnoa8SdXXeF+XJXj1rjTh3R6CEnBlkgnKhVkIEZ9D1ov7/wAwquThTjkdfaoW21KOJkjmbYQcAdvrS19I8m0wyZYnOT0FaUo9Xhm9GWVobmfdOfNCll4+vpTiTUY1RYlZgfp3ps6kB2ZfmI79TVd1HV9Pt79Y7q5SLAwE34yfU+lWwqdj0RO5VLLLhauwZckDOSVxzmurvXbW0A86dY+Quc8Lk4yaz0eMvIa6kX5tz+XGVbdkn0qHvZdR1PU9kKM0VuVby5DxK+Rj/Wr4cJ5zI1Z89LUTQdS8Reas8MeoRRyW7AO3Xfxngf61mHiLUNU1LVzcaXP5kcCHylLkYyMnHrU7ZQtqmoTfeFSN4JAshPPOOB/v1qY0zwZNd3OpWENjkW7LKjKcEcc4z1+lXRjCl5KJSnyEJeAfEdvJo5jsZVjmWzcywSDlmz8w578CkvDN0kkJUrLHdXMrSErjMYHGOe3SrXongayitlu3Biv4AchY/wAXJ3K31wKu3hTwd4TkuYNUupJEZ4GUkj/luTyPcVXbdFeGxVx5NbKfb6vZ3FtdWzvsLwmPeqgKcf0PNQc+ueJda0+a2e1SZ7f5JGZf4oQfzKe4xWtXvwu8L210+o2muMYZiGkEfIJ+lL2fh7wro9lePHLLNK6FIRtxtBzyffmtdX9TYfFc0fJy6N5erG+1O5klt4Z96KxwcZGeKv8ArOrXOpW33uysVkiaIbIwg4UcDFXfTvhn4SuGnbVFmnlmcuwJ4A9DTbXfh/NprxR+HICYEXIw2Qg7ZHWrpcmEpJM1o8KdSbiVjwd8Qxe2MulX8iw3kCkQqAfm9B+1WzR/FsdxbsblQXWTa2FwAcVQYPA2vW+qReJdZEUUakKTH1IUYAx24xzSlvqksOrTW0MEkMMrguJByV5yw/0qZ1wueIGMLraVmZoz65Y3iSF5cMAQB7/SmFtfvbXkckDpKrrhxnjnt7Gs6k1z7rNPJHITAzEIXHK47mmul67fzXEGNp3SDcqng++Kr/4cGa/IJySNXu4GlVplVkJP4T0x9KaRnyvnmmw3YAcUtZ3zXNttJIcDBApGdcOEIyuOM9a1FHTRuTnldkOZrsvFvHLgYxUDqNwsgXfDLICdr7O1PWlZV/hFsdOaZJcYmKy/Kz8EjufetimvrtmpdPvpEn4ch8udlaORV4A3d6+8/scaE2n/AA2v9dkldm1jUGKhhghIxgc9xljXw9piSzlYoMmVjsTB5LHgfua/Tj4ceHl8K+AfD/h4AA2VhErgDHzkbm/PJrscCOW5nD/JTwuqLH+QooorpHHQUUUUJCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigCiiigPQcV8t/bb8Btc2Gj/ABGsoMmzzp16VA/Ax3RsfXB3D8xX1HUV4p8M6T4y8PX3hjW4Fls9QhaJsjJQn8Lj0IOCKxnHssFlc/jl2PyiurdTuDrnnI9RTJTH80ZbaT0FXDx74R1LwT4o1Twnqo/4jS7loGJ/mTOUceoKkVUZLbbMk5j5Bz7GuJODrkz0sLFZXk7iIkUqyg4xk4zT1oUCBkkw/GV9aZPJtlBXIJOSFHelXjuUk8xAXU84z3Na9tbey+qzGjlrp1RvNlUiM5weoFZT4ku9KmvZ5JLdXdpC7c5B9vatYvreN7aRCvLKck9Qaz/VPCki2xLJDIZ5GaJ1bngDO4dv/NXcWSi2yjmxc8JFdWOObS/Mt5DbkzggdlXFWHS3J1qwgWfKGD+JIp5L9q4tdAj1cDTEe5tgJAGYp8rnHY1Z0+HEOhpGRqsgyd3mMMtu9K3LJqSNSqpprJIR6JpU+oSXiuyTTYErIcBivqP9at1iUJheaUsYzgEEDI9D7VVI9LmYr/8AXULZwdsWP1qc03w3e3N2kUOss0fG4qn7e1aFlLfrO1Qn4kXS21WxRfLMUKqCOe/50tbXFpHK+1gEc5CdhXuj+A9OlbFzczzEdmfAH6VP/wDsXQoBtVXJ9d5OaqdcX6zpQqs9wQ8k0Ix5fQ9QDSN3e21vksU2kfzdf3q1J4QsLdowolijkGCDyf3pje+CtAXO6J5Nxzh2JqJ1Q/pYq5rRVk1LTmYyRouAMZGOtI3eqx7xtl2HbnOealrrwdoEKsGhdDn+UkYqIuvBenu5P369QAZGDnIrH4YS8ZU4WR+iF1TXbdbWaJolkMi7SwGTWd6t93QMbrKOEIjLdee1XzVvDWm26EnVbwBT04qFh8KaVq92GuDPKikD+I2c1dVCNb9OZylOSw0ZOkFzdaXe2gRWVZDL5hb5hj+UeuaaeFJguqyXV1O6GOHb5WDkseB06Vr3irwfoOi2cn+HS7pC5KoF4GAO9ZWlvONUSb7m7FWLOVOMn0yK3oWJpo49lbg1I1fw1KklszvyGPBJ54FSVxCoG58FwMj6VXvDtvOsqtcD+HtDKqnnOOc1YrqNtgf/ADcY7gVzVDM2jqyn1rSI8yRoSCAVb9jXu2NpMFdyr3x3pGCByzncwXORin9jApnZ5BwPmHHX/fFXKOZYRQ5dVlmvfZn8Ap42+KOlWV2m+ysCdRuh/wBEZBUH6vt/Sv0PJyScY/09qwz7Jvw0k8GeA/8A3NqaAah4k2XIUph4bcZ2Lk/5gd3bqK3L+tdyiHSCR5vl2/LZlBRRRVxrhRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRRQBRRQOaAKa6nqum6NZPqGr3sNrbIeZJGwCfQdz+VKXt5badaTX16/lQ26mR2PsOn1r5p+I/jC78V3Ml3dFxbRBjbwFWUKo/CeQBn1P9qL0h+GU/ay1fw54v8b2viTQY50DWP3aaSWPZ55U/Kw/cc8189TNJkIxyEP6Vcta8WnxQ2s2sku59JvRbkH8WCCQ2OuOMVVcpOvzEb14I9feubyYqVmDtcKTVaf0R2fn3+ZznOMVKRqtxCvmEqwBK4qOe3HnfMCM9DTxW2wbVfD/hOa02s6N5veUJXLtHaMsqFnJJIB/SqlZXBkdo7WIyyRlhIG/lPtU1qiTNZvEszbycbl64qv8AhCU2t9d2t2T5jvlZSMg/n+lYRj1TbLnNzaRe9I0+3vrZYI4k+VAXGeSR64p/e2h8kRvGQMAAZJxiu9FuIoyN+1ATncoHNTMohuLf5QchiSfUdqod5uQ469K/a+HJJVWSDJOckZqzaNINJO2SLDZC+5ptDK0LZOVUDtTiG9eSVWjiZsfiJHaq3cn6bdSlEuugtaXJDPdlGLYbjgVdl07QmiWW3d4yEXcGbdyOp7dayGz8bJoxK+QocHcm5c8e9Sf/AOrkTv8Ax7SEJnnYMAVbCUMFk73nGTXZbzTp5VWJFMZX5QTuOcetN7uxt5YAxKAscBsYrM//ANSbGWH7xbpGq9GYH19DT5PiObvdFJy34iQPl6daxdq+0Z/KpL9WWK+0a1lXLHLZww7fWq1rEcFsHVcnYMACkrvxe5RIYWXcy7gxP+81XLzV7m63OjEHPzAdx7VU5xWyXdJrBH6xYedGZ5iFXOQO+aZR2cTqPKbZ047H1qRuWbjzifmXIz/ak4ldY+ACBk4NVu9fRQ63N5kQ2uWMM1jJZq7CSQdc8D1rJtV0S4027kWOeQYdWTa3BOeTWu6iFLF0BJPcnAHrVS1S3s2ZvPkVG5IJq7j3vOGafJ48Ws/wb6BepGFhmu1mk3DLL3q3Szq0ewAEEcE1kmlXuNV2QXaAQucow688D860oTrLGCykMcFlB6VuOpw2c/5fk/VfQpZD5HhI+YH8jT/T4xNd2tu4+R541YAdRvXim0T28UZkIYoOeBzXPhK5uLvXrYuwEJu4tmTwPnFTUlGSyY2tyWF4j9YNPhit9OtLeCMRxx28Sog6KoQAAD6UvXMSlIYkJGVjQcf/ABFdV3l4eYCiiipAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUUUUAUdMd/aioPxn4hHhrQZr9Cv3iQiG2Df/wAjd/yBzQGf/FnxWb65PhiwuGjhtGU3LJ/9yX/KT6Dv71i3jC5tbaxkmuGjcsmWCLlVJOM/l1/OrPd3xg3STTM4lJLSYyeeOffOfrzWZ/EG8eFby2K/KEBdT1GOePfisvDB/wBPk/wn4gOo/E7x3YLKzwzIskY5/EjDnn2qVurqS2uElRTleSB3rOvhjqwvPjJ4knDMwnjuDzxnA/7VoN42ZyO+T19K4/O/WXY9F+ManW4Mkob6G8iFwi4IOCp/lb0rt1JjaffsI5YYqIs5PucpmwSD+MY4I9aV1OecR7reXajKW3dcjHGaqrasWUXWJ1PD8K14o8SNaMPJciMg8R8kmoTw74pW5uvLuZt5Z+FZcNj1qD8T3trYasd1ysh2K5MfRD7DoetI6THbmeTULnUVR5MbCn4iT7Vu/EumMHO+eStTybpp9wY0Q5ypGcY7VYbDUJVjEZIO/kZ/YVl3h3Xb2a4gtijMqLjOeuO9XWG5DKHRuemAc81wb65QecHpeNeppFqdPOiEue/zCnFrhWwhGCO9Q1rPdyouWxx0qWs4yQSRk4rSm/4dOH+iz6LZXrq0sbA4xkd/rUTd+AYityo8x2myEXdjae1WVFeAg43EgEc9KcpcNIQrqVJ6GphOSMZ1QkZZpOh6l5i6VNA8f3d/mQH8Sg9c1eNN0SRG82KRgxP4WHG30NSk1tJ98S6AAZOvo2fWnLTSgZGxPQDoKtsm5IiqiMGRv+FvBPmTf06AZFcyQrC25cZ6ginzXTyPiOUHAxj3phdCRSdww/XpWpJyL1FLYyupmnzI3DD1phNqLFiEPbtXlxK7OwycHimDxytJgFQFBrOMWyqdiQk91G+5w+/b0XPT8qzzxXrtvLDPZSywxlGLFG/FVo1VzBbSiUJCCSEkDcnNZrKun6vKIZ5C8qSfPIVww9DXU4VST7NHG51v64TGGiSSrrkUsYRUZgG3n5SPUGtisBcup80EsW4+lZLNDJZ38RgWJ40YKWIzlvXHrWr2WvQ2+nxXV2CkxUBV24LNj+ldC5px7M5ND6ycP6Lard/drZLRW+Z/xbeoFOvCmPv0Ea5VRKjZ9wwwf1qqXV69xKZWOXZuSe1WfwpIEu4TjcDIgUEd81oxl2nk6U6/jraP1a8K6n/jHhnS9RKuGls4i24YJIUAn8yDUrnkj0r5/wDh7471XQWjhmlN3arGkRhdywVcdVHbGTW3af4h0vUo1lhuAA/Td3/OvRxkmkeSawySorzORkcg+le1mQFFFFQAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAooooAoooPH5+1AAz2rFvifr51jxEdPgceRpYZFPZnx8xP0NaZ4q8U2Xh3T5pDMjXhXbDCGyd5HBOOmOvNYLc7jJNcyszNMNoO7JYk8kipSMWRd44j2zScZUYIGQSfasu+KMwh0u+nbzBLBCSAoAPII3HJ5rWdQZXCwwMcPECAI8EEYzz3rE/jpK6eHdbMTCNRbOXbOQoCtjP50l4QfCvwPvWf4tXJ37xOt2jnPXhq3C7lc8BRuHA+lfPP2fY2f4kR3Zbok7MR0OVNfRk6KzlwRx39RXJ/IPOj0H4paYxhJ/BcZB5Ge2K6d4rFc3Sh7duvqB7U6KxmNpUUlFGee1csttJblpP4hGDsJ4wciubTa65f4di2pWxwZb41tbaS8MVqIhA7bdwXDAHmqnaxKdRW1tpWjaJ9xLjg8VffFWgSQjz3KyQiQJDuzuwexIqkpLYQX5vb+82vGQioi8gjocd671clOOUeVuTpswywQeMZY2a1maOOdCVBRMEYxz1q9eAvEDz3DQCLESsF8yRsh2OeRxx06VldncXMkyXa26NcxEmSR05PJ/0q/eH5o7S2nNk8zzFlJkKfJE7dHPoOtavJqWMI3uJe+2WzbNPWG7B+7AFRwxzjB71MaRayLK0ZhZ8DP5VmeheJNZ0+yJZIHuCxMiN1Yf5vzrWPCuuw3losyAuwUr+DAz3Ga5L4zi9noK+UpLQ4hsS3/wBs89M0+h8M3EhJnjZVB/DnBxU3osum3ki+fJGhEBuFYd0BweKuMK6cxjaZ41RsHLEYIPAx9eP1rJUL0S5T8M6bRBCvzRsEHAyc0qvhu3uB5kbnI5Hzd6uWoQW9jO4v7hLdJf8AljH4VPc0gkkDL5bWuwRNsL4wW9D+9YOpImPIZUH0CS1LPHEBxkknr9KhtSt7yZWWOEgY5LdqteuambZ0t0iIDvtdm6KuetRetXum6Hta4laOMjcpxuJHc1S4f4XK/K2VVdJfKysqhf6mq34pmt9LO4gnfksy9B7ZqZ13x1Z2AeWEJPkkKAep9/QVl/ifxjNcRyWjRiBRubazAiTIyOf1qyuhyZq3cqMVti8liuoQqI9QSXH4kdcgA9+vUVnmt6c+n6hLDZGWeFCpnkJ/B6En09KanxFPahZLG6kTem7YX4DA8j+lMbrXozC2oGQi6fDsqvgSHPRh3611aOPKt4OLyuVGa0SL66trMWggUq3LyHBx2qxadfPdNG4kyka8d8Z7is4sYNX1e7CWNoxt3YqQxAy3Ugn860fQdNkt7dYTD5cgO1xnOPbNOZiEOqZP46MrbO7JGH+JISoLKDn8qtvhZ1+/QAE43DaMY5zVekjitlEMWOep71L+HZRHdQtknDYOPSubS/2Otf8A+GfXPhTVAkMEsSOcEB3Y8dK1DSdbubKFWhcFG5ZG6H+1YJ4LuzLbRgCRhtGWU9Mdua1TR5/+EA6nBK89x2/eu7CR5GS2zU9I8YS4X7le7HPWFzkH6VZ7HxpaSER6jC0DH+dRlP7isSe5/iiJsCQYKlfWl28TapZKY1ZZpQAypKcbx6A1n2l9ENI+h4J4LqMS20yyoehQ5rs/UE185ad8YorKZhcabe6fLGRuKsDj3IHatG8O/GLTNQVUuHEwx+NVw4+oq2M8+mLjg0cjFFM9P1nTdUQNZ3Sse6Hhh+Rp5j2NZp5MQoooqQFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFFAFFFGOcUAUcdzSV3eWVgm++vIbdT/wDyOAf0qq6r8UvDGnebFbyveTIcBUG1WP8A8v8AtQguGKRuru0sY/OvbqKBP80jBR+9ZBrHxb8Q3DNBZRR2QfAARcuB/wDI/wBqpOp67f6nO0l/eS3TnoZXOF96lIhs2vVvin4W05XW2lkv5VONkQwCf/kap2ofFHxHfgx2wTTwzfJ5XL4/6m/tWfWkN3JGLkKQ0h2gE4B9yO1SeVgmKIvIUKzZ4LVOBkU1K5mvHcyyszsSzyEksxpnOyy2ReOVixQBnBxg57f96UiHml90ZaQHJXOCAP75pGRDGkkXmlfLwrRcYbP5e9TjRA1dYIbd5TKTIIeF/lUY6HHc1hn2h0U/D3VnRpF8yzlSSMf5SM5Fb3JEZpBA0W0fgKRnBOfXNYX9oGK6l8J6uEjKqsEsIQAZCqvLe9YvRC9Phf7OlmI9ba9fq/mBfptIrcptzTYIz7dqyT4KwpaiCcDhmfB/WtfcfxPNBxiuJzJZZ6fgwwkjq2Bt5AVPJ7GlrrSoEiNxZlAHJDLnuemP3pSC3S4t2uFJEqkAJ/mB9+1No7sxyNbyxb1hG9lY/ofrXOWzr5K9rVpJPp/3by42lPyEsOh9R79Kx/xbpOpxar/glzLbk2x3B0AwAedpYdTW+61apdQR3ejM3mq4EqMMk5HpVL8Y6Clxp0t19x/46NQuVXDY9cdzXS4d/R4f2cn8jxfkWY/RmlpdPbxbriR5Bu+SNR6dc/tSp8RXZu/LSaWCKdl3IMhfb61ESS6hZo1rdu6+WT14xzyPz4z9KdRefejz5gNsMZCMTtxj09a6nxp7OBGxx0y8ad4t827MksjiRmWFQfxbR3PrWtaV4wi0WC2txHLsdGwQT+Ik8/oa+edNuja3fnz2wYxsAQoyR7j3PFWa28Wy6rHFFHmOeHMZkY4QDkEZ9a07aG3o6HH5XWO/T6FTxcj6bcag1+sc8LCCyni6kbT8p9c+lNtF+MWpW1+keo7ZYZ4lt3dAMq6n5CVPTB7CsI0jXCLZtN+9SSi2uPMjZT8qnu1TVlf6feO6NcY2kkzjktx/X+9a84OGjfrvjPZ9M3PjTQtX05LK4tlvmV32ozBi5OSevoT0qL0TxULe3ltbS+BtwuwB5CSj54VgTx/4r55GpTvNZyNfypZvN5KvE3zeYDxUvdXo02a5Gq3JKzqPMkY/MH5wePX/AErXlXl4/perc+Gpat4y8RQXEbiO0uoLaRxIYziVAwwQQfxD0qE1P4myatbTRw3kEd3byM6pJldydwP7VkNv4yv5b4tdag05QFV5G4p7ftTXWNUS3H+IwHEkDYbIzkmroUPOGa1vJSTwXvV/GljfRrb33lQTQxtskQZYDtu7enFU281iwmto4dReJ8sArkcc8YOO1V3UdVsb2wWS2mKyTzvJIpTAUEDHOfrx/eo+5uPu93baYkJ3tGom3KTjP8/0wQfpW1CjDNKfJTQSlYRcRRQrmOVsIDnK56KajLmOFyosNzFW5OTnOelLXE9zbyPYWfls8kpjDgZA91PbOOtWzwx4XWeSK6kiKIColBPDyjqw9var5yjTFyZrQhLkTUcaJzwbpweMyLEU83GUbO0HaAW57nFWuVYLOIIm0uDg47+9J7YLNWaF8KSV2+nSm1xLJKAqLkkcnHQV56635JuTPUcer4YKKOmd5WDgDGamtF+SeMsOM9B1zURFAyKMZ9ealdOfyyGA+c8c9qVP9kyb1mLNp+HWqzXllC6qPNEjKxJwOvH9K2rw9dszo8r8S8EOeQwH9K+a/htqKy6fGFuFUCYhEAySWJzz68Vv/h22aS0tkdWeQMW+fooHQj+1dys8jZqTRbrjDFZQylRgcdSe9eSp95RY92xlGUbJz2xXYXdtkKZbaCwJxinkFsHGJlKgHMbDAAHp71fFFb0Qmr+FpdZtRehR95tcl8nAkXH83fFOvC2lDT4BEJSm4q23H4h3OTVt021iMnlyAFmRipJwSen+/rUfHbS2l++nyS7Ypizwx8H5gpz+3P5VZFJMrbF0N7bO81uzK43Pujc44PfNWbSPiXqtjFGb1UvYgAGP84quTW0zB/K3xSkY3BTkkjvnikY9q5MgVpDGPmC9P7Vk1/CE/wCmv6R458O6sqAXa2sj8BJiBk+gNT4wQGByD0IrAvucM67sodqbtijIHvUno3iLWtG8qPTr6RBg/wAKU74v36UTZJtVFUvSPiXp0yomsW5t94BE8Y3Rn3I7Vb7S8s9QhWawuY7hCMgo2f2rIkVoo496KAKKKKAKKKKAKKKKAKKMUncXVtZwvcXdxHDEgyzOwAH+/ahArjvXLsscZlkdUQdXY4UfnWeeIfjBYWe6HQrIXLDKmaf5U+oHU1nev+LNa8RuX1K/lkjwf4aNtQD2A60IbNZ1T4peFtOkaG3mlvpEJUiBeAfqev5VSdX+LfiO9Z10xYbSIjACrl8eu6qKiyvGW2xoowqj+bPpSywK4L/MpHPPcelBkUu9TutQmE97cTXEjjJMj5J+mabFkkZ5GHCkEZHr/SvZLm1wriEu6jaoYcZ7Z96XjjM+5N6uVz8i8kj3oQMwSPL2ROS2RnOScf8Amvfu2QDcBV81dpU8cU8EsVpalCRNIM7YIOSpPZ26L/5qJiaWfVowsMWY4zujVtzA9+elZIFg2sLRgsYMkihsk5wB6UjiVljVW2bQcZBPX/xSzxyQW0W05VvkVR3J64z3pABmItxKM7sMwJ/D6DFSBsfODlg8ohHIwPxN6n+1K3ELGJjcQt8xBU7skgDPQc0uwfDhHdCvK5zhjSdxPttJlnJeaRk8rsMnjP0570AkjusxQFXbbgyE/wApznA7Hp+lZT8ZNIjHhbUEiV2LW0oDZOdu05yMVsNvKjKnnmOPadrbF9sjA/tVO+JVm13pV3tYSSLE6xlexZcAH29RWEgj86/hlGLeOFMcLI/TocMelagx4AYH1rNvB8LWd9dWnANvdzRkDoCGrRYi0qqGOT3GetcDkyy2j1vDWEmSOm3LQSA7sLkZFSF3ptvcxSajHKADwVVT83sajoICp+U5GOhqWsnltXMDP/DYfMB/MO/+lc9vo9nTUe6IiOAI5YtlgMHJ7168ETljMuc8qQeVq12fh3TNYl/4++eCdk2RPkKgP8ufX0qu3dqsO6KfAyCGB/lcdQazeY7TMP1eVIy3xp4MbVzNFbpEu1fLDgfMSTkE/vWWXFhqVnM9lcXEkaQbl+Zeje1fTcybmUSxKp2j+Jt5b2qDn8NaXqeoyK9vH80TBUI4DEcnNdLjc5xXWXhyeV+OjY+0D55XUv8ADPIy4aSInJ3cYAyD9a6XV7qewDRvkpJlVHQhuSTVw8TfCbU7RrkmFgrncpA+XHrnv9KgB8PtehljS3QTK4DHyudo75/1rpxtraymcSXHui8YFdLtWazS7E6x+ZJ5RlJON3XgDk8dfTinVlrMVg7WswTG85kjPDZ6EVxb+D/FtvIqRklIy7R+TyF3ABj+gH6VDz2t7byzRXVnJLJsMajbtCn/ADY71D6T0T0tp3gtFlrIfYsxHlxSiUkggE56ip3xNq8ep6bBcxqiuQeFIYkD1Hb86oumeGfEephDFHKsSvgysvQ+lOb/AEbWEM6zzzlICI/kQ7peP2x/rVXxQ7KWS1XW4xgjXuJYZylvHsllxhW7GlRc6iYiArhN4TDuDznnBrm68O6pey2t1HJcXM0q7GVVOUA6ZNP9O8M37TGO5/hKvDBzuOD3AHer24LeShRsekR1ncC6kH3koqxq0jsOjkc4qSeWfUbo6paTyRyvAApQ5K8bdpz2wcVY2+H8RiG0PHbRrtXHHHqe9ObXSIbW2Nhpj7oQ4bey/Mx9M/rVD5UVnBsQ4c3hyG+geGNPEQ+8gtJEVLc8A8f2q2Wsaea8yBUUnCqnC4+lNNK0trdDEm5sn+b0qXhtXj4MeAeAQMVx+Xe7Jene4fHVaWhQeQo8xgp3HgUpFGGYsByegp1b6TJOg8hCxzknHSn/APhM8CR3KHcSen9c1otnQw2R0gMSkddvApSAFELP6ZPtTuSzmkxu4APSkriPyVPXtkHuKyrllldsf1LV8BLO91FtSZI2eKOcqTtO1WLdeP7V9c6DpUlnbwwlQyxjAfPDcZ6H3rG/sneFgvhC41GdArX1/M6NgE/K2APpwa+h721WNcearTlCf4agBsf2r1FVeIpnir5ZsaELi2McLKVO4txxnJ79KWtY5PIZSPNdWP8A9o42/Q96RnjPnYBLhgGYHpjGc/XrTiEjaqsqKiDPmd29c+lWJFT8HoWPzIDJE0ZwQGwcY681H+ILCd7OSS1UvJbg3Fq4fBMg6p75Bx7jNSUYE826IqUfCtgABcfX6120bzrLAq5Kv8pAHYcfnWeDH7GdhcSapYLe29xN5dwPNBZwMPj5hz05/tSha92RGXyroIdzNt2s3tx1A+lQOk3KWHiLUvDUx/8A3Ki5tIwPwM3Lflk5x71YpIJMRvcy79uUUZ6n6Y9uvvUp5IfoylFpcSH7tM8EwUBYpeDISeQhBwfoaX8xkbyblV3MQrIeMD245NEsUN1EAllkNgFnf5j349xz0ppa3VzZXQiUefAzENFdckL2w3b25o1gD+JShCwtGI+QDJxn0Bz6dK9tLqS2lE0M8tpcRnIKMQQe4HYjp1oE1lNtIiNu3ZJWBVh6Bj3rqeGVdwTcwwFIxu2n6jr2qGSmWjSPiVqFvKttq8P31ATmVV2yKAM8jof2q5aN4q0TXRiwvF80Y3RSDY4JGcYPX8qxspIryOhEn8rLnGSOeprveZpVzG4dRncDgrUonJvB4OCDQDWU6T4y13S0ihF4LyJiB5dwM/L7N1zVw0nx5o99lL53spWOQswwqj/5elMklmorlJElQSRuroeQysCCPWus+o69PepB6ATwKTmmht4mnuZUijHV3YAVU/FHxL0HQEa3tZU1C8wf4UTAhSPU1kPibxprHim5WS9uS0JxshQEIh/LqaEZNP8AEnxa03Ty9voNv99kAIEzf8tT/rWW6z4l1bXJPvWo3ss0jsf5sRqPQAcft2qMdGhVvMcRtnODnhfTAr1IblSCYMEgH5geAe/9KGLPQskzKm4qrZORgsPrmhVhG5QUIyAsY/Fnua7RFBliTzC4XGEHynGOp/WlpItNh+S+vS7OhbybVcmPv87eh46VIPVdVUpFbrtKnzCeucnJz+QrmbeHjaS5jiXk4lbZuHqK5S+ldUFhDFZkMQvBkkYf5eeO/X2oXSd8vnzq88oXKNLzuBOBt9O/6VAOY3jfai27zEDJklGIiO2F6k5706s7e4ncSzErGN4Cq+xfl6ggfi/OlBaTQuFi2D5Su/PYHpknpnvUdeXsdrIBLdpJK5ALAZZevAwenvQC15qNpAn+H2rFZF/Asan8OO56dT6U30qAR3MhK/8AETqM5x8vY5/811aWE0bC6kDbsblZmG0+gPr/ANq4iuRN4jmiE+UhtVkiTZtY/MM9uT1/askCw3WdgtUjVRCgd3BPy5HbP+lIXQWKNZ0UEcFBjAJ9Py/1pS5MpWNY2YkYwrdQp6Ajv9eK5eSZLQSrtd25IfBIJ4OKA4jVbiT5gGCAFWLHBPfP9qSu4XYFVIV2QDaVxsB7n+9LOiJ5UBQhAMSY6EHnr68eleSwtDA6YDxzbckE5BB7Hr+9SBMWrxuY0ZmDDIxyVI6n0wfXrURrVt9+tA7WwkSM4HUhz1+ufrxU+iTDyrqBw1wgKsvQAZwfqabyxqy3Nn93kBmcfNIpwpHXp2Of2rGW9A/OPX9JfQPiZ4l02SMRgajJMif5VcZFWOwdiFZRkrjin/2itHl0f41zT+WEh1PT0mQgYBaNsH9A1M9IHmKrcjd1IrznL/WbR67hfvWmTUdu0ZSUyAo/JBHSnsMIkO5edoxgHn60hGWVdqjKjjnuKdwRLv8AlyFHBwecVzXI6kRe2JgkWfCOEIyr52t7Een51MNdpc28sJjSUSlsxuNwUMf5T16moyTylOGAaMrgYGB+ddxOY1ykeVQfzfjH0Pp7VKngycU/Sv6vYC22wIJAc/IrHK4HYH/faqteXVxbXLIqMQFJfAIxnjFaGbyyvEIuDgE4KMMsGB4I+n+tRGq6TNBMJtRhEcNwDsuuq4PYkf0q6E0nsonDWERPhk2Wq6bJZahKz+Udvzv8yDP4gO9N9e8Ki0Mlzo8pMgGNueHHccexpSPQYbKSO9tZC6uMo6ngj1x2+lFwZbjaltdDzBw6kkAVa7E5aKvi/X9iv2N7NpAUXVk8IEgYRiIsjrnkHuKjpm0u51AzLpOWklaTbET8qk9gfT3q6pcvezzNdt92mKCMlPmj2+u3v0FNptN0FVXUNStryLU432A2hBikX/MfTjsa2YTW9mrZBrGUR93aW02kyWEgdWbZIp2quWB9QM09htLaPSzDcQLJNKCFcyYbJ6ZPJxx2p9DFpc8CG5Z4VIGyUN8wGf8AKRg/kaQuG0uzsLq5vZ97o5SIhRmRe2QM4NU/LNvCZf8AFBLwgorPToFdH2iVT/CHJZm9A3H75rjTtJvLgNPJZJ5pY+Wirgydsk0+0y7ikTzfuSHcMHzVPDZ7elPm8QraXraZZxL5x+dp0cSFR3GRwPpUuya0YfHB7wRV/YXtrAEv3ijlcZyvzBfam1pp62saMU87d+HA6ZpzfC91C7hBmH3fdlkC9asFlYmNNkSbmBAGei1VK7oi2NHdiNjpojBV4yZX/CgHOKsNn4Zt2cJeyeWVUHay8L+dSOkWkOlp95YI8zqRuY8qT3AoubuaTdtdXH83OM+5961JyT2bMYYOGiWGIxbxGg6fLjdimVxbRiMSBgGI/D0pwr70+fJY/hya6EQ37nTL+p5xVLky5LBHS2qFVLDGMZxULrLKGdwD+AkfUVY7wbTjGT1OBVX8XSpa6dczFiBHE2eParqX2kkU26Tf0fUP2Vodvwy0xgdmfPlJJ/GGlfB6e2K3DZPZjyrhAwA/hAt6joMEfvWTfZz01tJ+GHh1Z4N+bFHYA872+bj8m961C7McZjlt5iAkTxlWHzOOox9K9jHUUjwdjzNv/Ru0ihQ0Zxv4B3Hjtg9cGuwkionlKdkqncCckHvik4hiNfMkAZeWA5GffIA7V3HPM88aLGQT8x7AZPft+9RggfQ7vxRr5jquSCAM/nTpy73QjECEttYEbSfQ4/XmmUEccksTARhlYxu4OcA/nz0pW0UvdeSpVlRtiMwxvPtgH9alNmL9IHxNbR2uvaVqjEpiTyncAMwA7ewqemWKSIyxSTyjYxxGNrfi+lR3jfZLHC6IdyzAo+SApHYcDNPbf79LDGY2ZSw5f17/AKdf0pH0l+HNvHcxzQE7oSDnkDkd+ufX+lE9vq8sayMiTxAB2OAPlzjPvjIru9jl3Kw8oOx3CQnOMYyPb/fpXsU0PmLMz5ZAckElcY7Dsf71m9mIwcy2Mvl3lsQUBGRhgo/6v+1LWksds4OlXQjYocKQRGR3yM89T0pa5gUvtVnI2EFXXHPf8iTmmMK+XKI2iMmwFgqHkjuOenXOKwJHUksDEtLB5LBQrFRvUnPYfmad2imeBJLa7WVH/CFxnPXkHmm1uvEY85FcNiRWQg4PuOlCxMwVVVCgOSyxkbQOpBzn/wA1mQPdqBpFmU5VQu5wQAf9KSdMsEklH+UlR+AeooWLMavHcBlRsgElvmJ46/6168kzh1uIIpFyTwCkgbpgN0x+VQyUzuw1XWNEkFxpGotEpbAV2zG//wAl7VcNK+JLOYE122+5sTkvBho3PbIPIHuD+VUeS3Rtstr5jTDh45QMgD6cMPzzTeIvHE8U0LBEf5mHIU9f0qFlE5Kq0QYJc6hICMAhAMfka5Tzr0iK0aS0BYDzFUkj6elKTxyKVhvpCqlVlQMMsRkcfvSjXdwoP3RBbxSfIR+OUgj9BWbMTswvZxm7uZQXJEeHPzv7kdfzxXrXVy+THNC+87iGYnCH2Gc8/wBK8gsUjUyyEIDgqWOXYdgT19eK6ht4N3mJbeZyfOTO3Cn6e4FQBCX/AIby0nLvgkFQPl3YzyBz2pdba6cB0UMm7diPgAH0U+9PoLWaCdJIAkYZ9wVV3fhPB9c8fnSyxttDwxBwCQM5yc9T+dSDhLSWEtGIkIVxyOikdR79uKWlkurQeYjK8qcYQdFPIJyeuaIrZ2bEsrxiM7sD/Mo6c9ep/WkJrq2t4y0c6zBk5GMnrnr04IB/KgIjULsopWWfzZ5DkgHgH/KvbNGj6dJ94W/NshmH4QeQMf60vb2Zup3uXBLqSASQAN3XA6Hk5qWgiCeSHdY0dSVfAGCBg5z0/KoAlNfC5XhBGWALHBA/88darSPPb+I3mRWwwKMwA2heO3U+v5VZYkkIaEQl4E+UyBiRnrgZ9c1WpN66otwb0+QZCqRjjk4H+p61KBb1k3wLKkIDFcseuACeM/3FN0kD5W3ZJYgSuARuHOf9abadNO8MUP3dmVd5ZmboB257/TrSxfyriB1iJJYlmbg4PSssg6juGmTAXDM23JPAA/eiSY5MySpFHgq2fm3cdB2zQiySYFxModpCRhRtUf0rxzCziCQkMhw3GCWzwfWhGx6EePzEYqqzL8pGd65GenWvIy8sayxv5qryqB8OSOuTXNq38JJCwWZxuVTyc8jnt6UoZFmhDmYhWKxum3O1/XP5n9KxaCyfJ32zvDRsovDnjm1iISyvzZ3ORkeVOu0MT7Nt61k2hv5ZEZP0zX2B8cvBDeOvAGt+H0ePN3bNGnGFEiZKHn0IHIr4k8D6pJqGlRfeQFuLdmt5x3EqHDD+lcP8lU1+yPSfiLFKLhk0a0CTxMCMkjHuKeWsamVd+Rt9O4qNspAkgkXJHTjvUzAscpDB8eg6c+9cGTweigkxNHUyMGXIPRfT3paNyFChlIzjb/N9fpS4jCx/MnTgOvUGknUL8oiX5eSRxk+tR2yZtf0b3FjF95++Qths4cY4b3FewXbw20tpIq3EDjJhf8I9xnofpTxWAl2SDzA2M5GB9Kb6hpkTsfKEylVyueGz7+orLtkiUcicXh6B1a70Zy+wb5LR+AB/0miHTtG1CRRLbi3ucfixgkjtj1ri2ndGKSFklVvxA4/OrCr6fqUcceo2iPKpyZcAHH5DrWLfUhRTK4/hkPOfMtlJzgMQUJA+vH702u/B1sztc2wuoQx/iIjgoT6knkZq7waBfMn/ANNuBcQlciM5c59Cv+tLxaFrbqHj0pJGPyghckH644rH5px8Mvjg/TO5/C0TJ5ZgYqpwgZtxx+VNY/DPlMy/d9kfsAST+dadcaNrMoa2GlfMOvOCPc5pm/g3Xdm6e0QcZBAJaojdMn44Iz3/ANvWpP8AFVmx/Jn5efpXg0LT7cbIrVImGM7Vxuq9TeG5WCNJbu45BUcYP+/Wvf8ABBYgyXjxRAD5lHzMKz+aRW6k/op1roaiTbFa8Zy28dP7U5lFvZsIoUPq3HU+v0qY1PUokg+72qeVH1c9GaqzJN50hbG4HoR1xRSbDikOJoWuZleNkwOSQ2Mf79KeDY6A9j1GMc+tI2cWMKiknsKdLBNu2F+nX2rFsywcCHI2oQT/AL70oqAIVzyByc9qfW6KsYXcoBPIpjcuiSu2enBHbFVuWzPA2n2KhKnLEY69qzX4hXEw0qW3D/PezLboO53HHFX6d97F15Ud6zu7tz4s+KfhrwrbS7ka/jZ9voDkmt7gRdlyRo8yxV1SP0E+FemtZeDtKtDOGexs4bVQoBGVQc/vyatON1ouIy4R9pVgCCeehNRnhexaw0pIlby8uzbsEbR68ewHWpDlQDkMcEnhcA9jyMmvYHhJetiFvZzSpMnlRKWLMQ7Ak59MHtToW8coDMrKMmLHKr+n503tVaJdwy7EbmKK3Xv+lLsFzJM7PHna4LKBz7ZHtUDJ6sMECgrII40bK7cYyOKcRNKCrxneFYbcLuAXPQnivEdp4y0ZJVMbHDE5J+hrl1BdHkmUXDNg7CPlPbrQgjvHUSLpco8s7YpMnnAVQeo9CKdadf281pBNAiuWjQv85AHHOBjvx+leeMYFu9Cup33CVICTkYy2fQDkYpn4NuILvw5APvKebb4gLqMY7jP60TwzL6JOeELETDaZXYV4JJc9QKaWxlVY8v5RGQF7gdCCBUqmmLNCxlui4DbQQSMtggD9CaiTaWtoZAzJuYZLBug/yn3qxGJJT3W5cPK6OqjawIwQTxnPSoyaJAXKiQ9WORjOD1BHvipSNkCmSSXeWbB2oDkAdOetNZYI5H/hyeU4KluMBl54x2yaxaA3juyYQwZt4IG4rnPPOaeW06FIjJE5ZVyF7Mc9PbrTdCkG95QSxBDFRkY9KcJdW4kECCVPM/i7l/Cp/wB9qIMcYSdjJGjIGALLtPJB5wRwK5jiV4nVA6Rk4LyPkk5zjjp+ddeXHtLLdybQCSBwx/tXKxb2aNpVUjpvO7afXnipBxdRMsRwqOn4QQT+WCO9ew3I2JFeETRZA2hSJQgHfs39aJ0uIrbMEsTFXALMike54pAJhVeOSMfzBx+EZHpUfYKjHbmcmV52dQdjv+HefYnPHT9aVtWgJDtJNJGmExGoUjbwf/lXMLXBVhJICrAAAjC49+2Rz3p6vk5JxIyxMG3JHtyB0Bz2xxmsmBYwTlhIkcaJnL+YckZ6bR/v8qcLAq5TdsBCnzNo4ywHGO/B9/cUwMpWAzRS/d0jdchsuTxgA9+Dn0zSlqb+c5EVzMiktlU2HdkA7Qe3OelQBaNZzI7nUgWVvwohJb3HuO/58120Em9JSjNECRvkk2555wPTP+zXolis5kjVY4Qoxh3yR17jv/emNxqANyXUK+88NKeEyew9KySApcyo07SzXfmK38pchcY6Z/p+fFMoUQQrFMyJACAiK3zYJ5JPccj9KTkaa8QM1wsikkZ2gL+Q/wC9OobQsDAqySFRyNoAJI4XJ5/8VDYH1qTGE2R7T+FieP8AtSl7922iclDkbflAzk9abCyCqQ8ZhDKSAXLHeOOg6ClEAD+UUG9FALBOCR+dQDtoJxLHO0oC7chmfnPpj8h/aoHURbzXpQF343blGArdsntj/YqxRwoN0hm7F1HU5HUAnGO3t70x1KGPyhMliZJGUFy5AAU9yO/6/malA502ZwskW1d0MoMYAyvPX06/6U7QskzRyt/zCXUs3Rsfh9hxTPSrhj5P3hAzM+0kEAf9PXHr0PPPenk8mXaMoC6NkseCmeO/0rICdsxcCWcE7ZCPl43Djj2r2SfErPuRgMbdy8Z9MD+v9aWHlyN/GXarggEcYIBpOQw7w7M4DAA4wQvGN3rQCm+Ty0WQogXo8ZzkGncOwyC1WXeMBnYE9skHGQD6cimMCFD93aQeWp2rt7+nP/el2dI5VkVd0mNyovIfB5GfWgGetWkk8btDGjMAeccEHrgev9q+Afifoo+HHx01bQliaDTfECDVLHK8LKR/EX9e1fobqELm2lMCI1zKV2KeQTn69Oa+YPtsfDq51vwdD430W3B1TwtIt0AoIYRbsOD7dTWjzKvkgze4FyptTZlVhcZ2jo64yff2qdtrrc4BPHX86ofhXW4fEGh22qWzfNImJAOqP0wf0qx6dLLHGscrA57nvXkrU09ntamnsuFvPjBEgVjzg9DShCMxlURDIKsjjIf6f771Aw3KYxjOOlSdtO5QMOx6df0qjOGbCwOWRMgtGxU925GaWkBWAmMhjkZQn5vyNeQSo6FY2Ifdnn+ldSCzmBRx5bk/hB/cGse2xjBETx7xvY/OOCemacWU5XKxnIOMjqce1Kz280ZAD7ipGAPw+1Npo1+aZD5Tg4IzxWTkQkWrTLlyfNhmlikXgGNtrKO4x1/rUv8A+4buNwslzcFSo5jYRtkdD061UILsyBN0S7lHLBhg0+jnaNVUyyODwAAHGPY1WzJItw8VXRjKS3877RwZEzIB6Fh+IfWml54muzukR5E38/IzAgegGagJpJZ4+Wn6YUAYGPemam7VirYIxgAA5qFky6ofXV/dzHdK7RxtwdzlmIqPvZDBEHLhyem7k0g5ckszgHoc8kflmoq/1EqCvmZxwD61miGML+4eYsrfjY8u3p6UnBC7BUiXk0mIzM+8Dfzk56VJwmOFFdxtZuNx6Vk5Y8Kmv6PbWIW/yFd5AGTngUvIYrdGlVgigZJbjHrXCPGqgqchRn601uQl7E3mgbGPI7YrDs2y3CwKvcRgZU7lPIPrUffXJY+WE/F1+lJzz7SYkVdq4AHoKakSTElSfQ/Spivswk8IjNa1JbGxlkZ9qxgkY702+y54fufFHxefxPJBvt9JieQl/wAIkfhar3xE1RYrc6dGeOrGt7+xr4WksPBt74gZUjk1i5IRnbqi8Dj6g16D8VTiXZnn/wAvfivqj6l8PxxjTFSV0jkeUA70XAGOMcAnp60qRIsoEjkoGJ2gsPXp82BTyyshBHtaRPLjClF4xuxz60lMgYoxUNJvIkOcAL+ld9nlTmNJGY7sBgM5LfJjHXODz6UNC4uYpTI74YcluCD26D2r0fNJcSeWAiphcA+n5DFeqVmJbyhh1GcOoVcAf9Rx+lQSztWCSiDIXjKEDnr054pSFoHumto0cOTtYsoBY/8A9a5REMigtIWhjGxhyMg9enPWlZHZ5lUqCrvuLDO7OPmPbPFSQJeJ1V9GvLWIuQ9qwB6shx17Z71SfhfcQywX+nGXy2ZVlXCct1BJyeOgq7yvE9qZ4guxUAUNwRkdeTVG8EiKy8Qh1tmSSWKSN8oRuIOevpyOawksSRkv/JfonhaQeU6lgSdz5X5cY6dzTTUDGWQSQeWkrFRleo/7Z71KNcQvGyyRCQsCNypgs2MjHpnpUVqF9HLJ/DikAPzZYY4AxxzzzxmrkzE5tEikbCsrENhctggnuB2rtI1E3lzTNIUJB44cd8H16frSNvNEx8h4CFODvI5U/UVKwJK0aR27SSYbdgoCWHtRgZsjBFaK1dJSSAjDnAByKRVQESZQg8tgD1GSRnB9xmniJciQxtcS5UlcJgjHY5J654zXVxFPECom3OnJDoME+hPr71AG62qzeYryRxlwFzg5PXrzXsGmWaSGeeUtIRtKrkfnjn0pQMDIzGKJmTcMo+D2pI3IjkUwwyFwoU4GdgPf3oBSZLNGySx8sHAAAwSMDHrXMSK8gVoNyqMls4JY+vWvJZlnTzZ1PlknYWjyeOO3PUCvIWZvMJjfywmS6YYHHtwR+lYv0n6K4YT5aCO2uTsXg7CpUjOBjt79e3NdqXUpHcXCIinc2CWJbHAO3/T3pnbCSeMrcajM6q4ARVwWXPKk9/qadW8Qc5Glq0jAYlkcNkZ689f36cVmyB4LxmhxbRncq8uqhVT1yep69M+tJSCYRCP70kXIwsbFtx9OPr16UtJFPOvkS+VGkg2ygkAE+pPpwOtIRptwsYaY87sEBRjv9f396MCN01vA4+UebIN2T0Y56D3/AL01IjmufKeERh+UGQW4/pg5onubgEwv93Rc+WCg3yfN2zyRj17V3EiMzEq3ybWeTbx6fXPFPoDqKDy18y1CcncQpGTxz1p5bPG8atJO6s5LBQApBX2r22ghS1CpuYPgbSg5PU8/pS63BJQ29gFYhYwXA/TPWoBxcQKLdoLWKTOdxboSD71yI1O6HykGeYiSTl/p+Z9+KcpDqsyN8zyAYKhWwOnHuMc0lc2ExUJdFRh2IUYwCV6DOeM5PpUpASieaX+FJMrmBmiQKPxHGWIx6fr6iuZYbeGFjG6+UcbgXG4kjnp29TnjjNK3IiMIwhlc7GzGMA8YyfXp0OT7im6yGJTLJbMrqxDOAAM4OPfnqO/bNTnAIZJ1++hYpXUxkOigKAcHjj0+nHvUxcxO80l3kF7lACoPXnmmE1vIl6sMiwDzZPMkUZOeBxzwCevPP1qSuCLiNDvaZY1CsD+LaRnbn2qc5A2cxx3CbZSdxVcFchGzxx7804EKiORAdzNlmjXjGecfSmkUTon3iNyYQAmG5KEHp+9OrQPHJN5s21ZV4fGWQgd6lAWihlMiLtjZXUFgfxD6Y6YrotGW3GXfCyHzBgMAwPXjnPT9a4j3SRmC4BCngEnhu3P+zivVAa3hkMUKCMFNqkZYDjIHf/tUMCzpGWmieTy9oDrGF6YHGOOn/eoXxloqavplxa3VsrpdRlJg6kqysuDkd/p7VMqdq/em2nYAqAqM46c/kTSNzGL2JniCsFYBAVGQPzHNYTXZNEp9dn5oX2i3nwY+Jep+C9QWRNLuZi1o7A7drcqw/XB+lX1LrCqjpyvUYz27Gtb+2N8HZPEfg1fF2k2sh1fw9lnVQd0lseW+uDzx0r58+HHiU65pqW0j7r21AD5OC6Y4I9xXmPyFHV9j1/4zkK2Gy52k5jO7KlW557DuKlrW7i4CHAPAPpVfuIm3gtkDp/3pK3vJI5iSjbFO0+xrktZ2js5Rd1nUopixkc+5pvLfCMsSDIDzmoywvnYEPgqw6r0p5IYZsJjeQPXmq3plg5ttXiiQ/KSno3OKdJcQXOGTYM9qrs0c0TrMhBA4wa6W88t8qSrEZo9+EL0tCWpViURSGH4MdR3xSy77VNoAwO2MEZqJtNWkMQ/CSo/OpK3vwYtrO4yCcHnP51RLKLY4HsTzG3ChQCT1HU1zcOhU+bHJuUj2FN0vbYgeWwGOoGck0SXFsspaV/oo5z9aw7PODNxQwupGZWMaJET6Dmom5tYGX+JuDZySO9TFzMN3mBVRMYJ61ET3UbKHBULjsMk1ZHJVLCArFFGMgY5xjtXsKJcMOPlxwD60xSRpmVmOVzUhburOSwIA46Vb5sw9HcrrHtDY3hQMDpimVxdJH1P6dq4u5cofnA2nrTAyee6bR8u7qahf0n0VSCa7cvtwnoOprvUZYtMtWluDsCruA9cetSlpbuihkjyMnkiqh4+ulGYXcOWGMA96tqXeWEUWyUEUKDStQ8deL7bS7aIt97nWPcqkhVJ5Y+wHNfoL8MvCFn4d0Ow02xt2S1tYUQFeSoAGSB785r5m+zZ4JmWS58c38ai2lZrC1DA7mOfmcD04xmvsnQbZ1jtmRwixptORjBI7cdK9jwqfjgmeM/JX/Jb1RKB45YFYzFeTkdCy596SaJCyJu2Ip5cgGvXWdZnlJjkCsdpGBkYHGMdaVhtpGkCAnfsJaMA/N3yemK22cwaxH5JvxFZPlDZG4+4A/pTmGCT7qkXmeVIRzv3Ywf8AWkpYEih8gKGXy2baucDj3PWkwqxlI1/hrHHuD4XLEngcjrUAcKWGzymRWOVcMRk49zQsKBYVyzyREsEGOB2Bx3ruORQZI5ZFAmySxOMYHtxmlLeaRiqRSEmdtxYMfm47c8VKB7eQ3MaBIdm6SIFucjOPwkfSs78NfeYfEkQkieEh5ArBM8HA6+nFabrNu91aZ2tu8sL8nUH15PNZj4fi1V/Eim2ZWgWSRS2BlcYyOe9Yy/8ASMl4zQpBd7tqxTlHA3yEcYBHQU3ulu7mZIpIWAAI3lflH6/kadQ3s6bnHymMHbk7SQAc9O+KTml81ZIpZGYKuEj3E5A5BPHrVhiRt4r2423EiZbADR9MjvTlLhbfc9xKSqRDILckGm0sjO0dvawvtYbWZUxx2GT/AF9q5iiSW4cBZCSCyFznLcA/SmQSongbKK6kk7wC2Nq44JPUf77Ukb7zZTbC0XIZArserYy2fYAVwLYW6m5RVWTHluTjkDkY/MdKXZxEoMZhkYSFCCoJZW9PQHNAcpNHdogjs4lYkEhh1OcHH6A/nSshmjd4olA27W4ZQAM9P3z+VI7HU74LuRGOWUIn4R0OSOvI/alYbmaWcI+oFCCM7cksQDjI6Ecn9aA4jiv4VlDsQVY4AO4EZ4b07iko4Jdx8hircg7RgHPXj60uYnC7pYM5O0so/rQpjUm5y+7qQq5b8sYrF+k/RS0uppRGokwgbeVA24wRwCD1z3x0Fdb3dXe6g8gIGZASQ4TvhSe/Wmv3rcxkRDCCdrEcOq9B14x/elYrdJXleZHlVnZ90jEnaSeAf7VkQeGGe9n86SZVUP8AKS27C46YHUHtTmGMzIS8TlVCsRJ8oPP7Edj3z0pEXJjVxYxkh1OGReARjGD0HXpnND2NxK6ffbrKhs8NjGecH16VK2D0tFav/GmRTGxaRkHIUHgnHfp69KdW91aRORE5lkEm47VOck8E+oPavbVLdSjDZKHO4soyeD0PYV1LKsUsbwwReUTsJ3DecZ2/tijA9F7AAq+U27AbG3GD0PHb/tSRaUh1jjY46t0Byex9ef2pt/H8wyPNGBKCSsZyxPv6U5a3uRA+ZN6MoKDeuN2QOmeuCaxQFpoLuPD3dyVThSIn/CNvXjqe5rmP7tO4b78jGIbXwCTjtt9c8e/Xg0jFb3Mc2LZNkSMSR0PPrn0/X2rqeV4CLf7xvkYeYxjUEFT1xjsP09xWYF1ZpJgqA7Su4BeAVHHBGe/X9xXYi3uFVgHI+fClgCDnB6jJxjGSO+0UmtwVXMEKGOMBt0gwCB3C9lOTwe/TNdziOeJXkiuBJIflTJRTjHB6ZbBzjrgdDUgjb1rSJi8LyTtEAjoDuZSF4HXGB269/pTvSRDckuodS0YV0PA4HX+9dn7usMvloiFlP8RACXwOuRTbRp0Nz93fJDYUg9zj/X1GaA7eBYUkVmYJMhKAcBsdwf8Az9a7h3MVlUKHUBGUHt346etPbuyERFuWG6E5C5Jbyz/T9qYNAYJvMaUOHBEeOST6ECskASR42N0su5lwoGRxzzx3/brSqpaw3jR5VAcuue59vT96RuLdAWj8vKAiTP4Q3qDngfma9WEOyS5RvJIZAoO7B7g/7FYsDgOYikEzNKcEZ252k/pTlPNCOfIG2MALk8MMDI/1phLcGRjL5nWQKZAQMnuD24z61JmNVVZhJ88iDG8gKCevX6VgCD8T6QL+xljumVkVMELuI2sMEY7jsefSvzm+K/g3Uvg38TJZNNgZbCeQ3Fkw/C6E/Mn5Z/ev0rMMlwVkgnIeIlXjPRwf9/vWJfH34RW3jrw7cxJARfWxaW0dh/y2A5UfWtHm0/LDR0Px/JdFiT8ZgGi6pYeJNIj1O2dTkAFRwyn0IruS2jmj8xhlTyGAwazDwzqN74I12bS9WgdIt+y7hP4kI/m/pWtRhZkMkOJYpYwyMvcGvJ3VyrkezrkprKY1WxeLM0BVSBznoaWW6lJAntHRsfjj5BHrRbzmxl8uZTLCTjIGSv1qwWVhb3IDQMrHhgwPUehqmW2XplduFd0PzliBlSO31phMJGCvuB7fStBn8PK5YqrRSMuQF/C1RV34dhRd2wCRh+LH9RValgy9K1HNcx8oPLKjtzmnkN3e5EjORnpj0+lOH0S4jYJIpXcQA2OKU/we8ik2sA3YECsZSTM0sCcWryBirQAqOue9cXGqsPlELKp9T/SnDaJdlCUfGOzDvTL/AA24fD3CbWHDYPArFYRlnQTXUkqhFc7DyPT86RfylxtbDY79KdLp8EatmQls5Ce1ObLTTcM5VMRrwWcVZlemLRH2yvcP5cSYxyfapJh93i2qm9mHBPGKlbPTEikEAdPlXcSRwR9aZ69EqEsHGE+XIHY1HbZjhLwq+oz3F3crbwBjjgkdM1OeGdE3ymS+O4qOI16E9qNI05Z12RwhVJPznvVsstJSytVkO7cOVA6g+9S39Ixzga6tJDZ2skrSmNTg8dMdhWO6tHdeI9ci0rTY9091MsUY7sWIH5Cr9451V5FCjKpnYAPwg/61MfAfwMNR8SHxRfpIYbEMUfHV8c/pmup+Poc5nO516qrcjc/AXhK28OaTp3hmzANppsSQsx/zEjdk/XvWvaUqJEJSAYUBAV8gj5RjPXvn9ap3hfTNyfeWVT5pwpJ4BPUVegGtbWMup2K2Acgr9Tj/AFr16XVYPDyl2lkjCzi2jUoApLAA43A569fpSxl3HGTukwuVOd+PXr09qIrwXbCdYWkLnBIHHBxxiuwpSRlAdwrsFVckD88cdPWoZiJxiOVgzyBxMvLISMEDrjAx9K5RY5IjkOpjGzlsZOc55Iz9PauVz5rowUAp/K2WHHJ604KvJJGucgNk7TnIA4BHPvzQHsXkSwW3ny7yoLOp6hsng8ninaqokcmFMxruAUYGCOwwaRgtwZEt3875+g28nOeemaXt4WD+bK8pBbyyoz06AnjpWWALakrTacvlkcDbjAQkDuDjNZnojIPFkhjikIQMcbsqTn19eK1Sci6smjIJMWcYznGT61menxsfErlIysEkjqAvUAdf6fvWEvUZLxlzsp0lBFqFVz2YjPJ9++Tn8qdSmWSIu135IjHLMR/QDPXgcik4UgUrKtq6YLAkJuIO3qR/v9qTms3lf5mbOCWxkDjkDpzxzWZiN5hbxnJuTJkY2IcHH0/0FMRPOQwtVjXJ3Zycnn1xxUvLZ2ysNrW+7DOCR7DJ6/WmE3nQQOkTsBGAoMa4AzyM/vQA1rNKN00nyiRd5Y/L14wPzP7UsbCENiGbYNm0gdVH5n96TWRXWOJoDMkqZmIPPHNPI0iDMzSxBY1CqSMtwc4OKAQmuGi8va4k24UEDO71xgihZzJLsAUmI5VFA5UdMnPXk06nJEQlg8louVA2clvb9xmm7LZSxt5lvLGM9MgY45x+eP1oANwrD5wshVyW+bDfn/vtXn363jxG7yBnOFCnPXpzikJIISREbk7wF+UjGCeo469qUWze3nRjcxOhyQNpyOeuaj7JKrE6Eu0kkYWbheOAPfPPB9KV8zT41+83d48oQq/lxr1Uj8JPUDPPFeNZWilZ0SZ5GJYvK3IUdcDsOlJPM8M4iBzOyKjKAX2L26nH6VJA8DK2yNFW1TG4EfO74AwxA/c+wzSckkG7/ms7SKQzc5Zh9OMDNL29ukMEbysY89TkAnJPI/8ABroXW0MtlYSZ7tuwrt+fPT8vpU+AZwTwHd51xsZyCqpGecdcE9vpSsbb51cQTSKpKjdwOOBThnRiu8w24xwu0HH0NJm4jWPY12wjDEkkdDnioArAgKGSfy1kA5VX+UDPXr1pw1xFbHzElEYVSNzOTg+p/wCnpzTG4GnW20pPIz4wwCYyD169egrj75LcoBb6c+xgVVphkk9Bkdxkj0oCRDQGYw3SRuhVi2xcAg8gD39q6NvBcn+HasrJnaXkwMA8HA5P9ajoEuHCx7jHnhggAGD/AK/t7Us6TIgDOmwqq7i/zbgx+XHb19s9s0A4WQxSpGb22R9m9UiXAUHggMf5eAePzr1reIybYUa4I4djxknofbPI44pKOeFMywsQ4+cFFG3uOe5PvnPvXsk/MdvcOwHEjKH6+wI5H0H5g1kgd+TcFFDFVVjsUsAMMFyBk88ZwO9RltNJFqqSOqsrtwY+h7E89T9BT+ecvEJYInTYhUM2CxQHGMnp+XHpjmoO8jZbuMiUxCNcKMB3cY5GT+xzn69pBdnhhyJZd0kkeELtgYXqB6j/AMVHlUhjG6VVBbcybs8t0+gqQ04vcWQwrb5bdcgqNvByMjueMc+tNrqGGEu0cZRhEGPycc9sfWmQMZT96QRvJtmVQfkGMHjOMevHQUhdxn5UBVdhyFzx279M/XmnmdqnJC7pAN7j5d3p/snp0pvcNFNELIKWC5kHTBwTnBxx25AoDhQzMZ5iCeGfavVfb39frTpJS0aSHEjRqRLn5mz68c4qPtngEaRn+T5vl7rno2Oo+pNObGUi5WX+GigEPEmAAp9sY/PFYsDkZjhLWzNgjlQB07Dj2xTXUNJee3cM4LN83kyNgE4Ofrx29qkbGZXgkZJ4mKNkqvIx0yf0/KlnjFzCfMBJL/LuA4b8+Mc1DWVglHyT8bvgfHrEh1XR7WOG6PzRyYxuOD8reufWsg8I65P4cuJvDviGN4o4nMasf/tuDj/+p9a+/tV0SHUYWDx5hOQ0ezp6jHQduRWJeM/g14Y1SbyNetZktZGEaX8Pyvaufw7/AFQ8c1x+X+O+XLgdvg/k/h/Wfhk11YQyxi4gkDLKMhl6H3+lK6Q8qsbU2h+Q4OTjPuK88Y/Dz4gfCtbk2yHWdJtV3PvGHiXrkY6jHeobwr8Q9C1+eOMObK8bACPjDfSuBdx51PEkem4/IhyI9oM0vTYJVTzllkQN0V+VB7U+WKRQ6zRwOG/lGBTbTJQsARVOc9Sev608DOr+YJQAFwYiAQSM8jitKccem0nsjprQrMZ12KNv4GrmKEsB88ac0/e5DsFlOGcYAK1467G+flOnA71Q8li2Np7ecqYg0bZ6MB0+tRzaKZUQTvhiPnKDjNTwjyrBxIMDIAFe7CqbUGSOxXpTA8IC28MxrIxDo/opOKk7TSjEgMkRA3cjHA+lPUhdQRNEzpjPC4H507s51EYdYyuDgYJOPyNZwRDlgYT20MYEqW2EBxkr1qja+/3q9Nu5ACkcDoRV/wBcvVSAxyFs4zknrVGa2aa68xgCSc+1ZrbMV5kktDtIoEVZIizYyABkAVLarcwrZMkZEXy5Y/zGo+G4S2j64DYHyjkUjqFxE0eVJI7v24rYrrzs1psputpNfXUdpbQlpHYLEoGeT049a+lfhn4Ni8M+DIdOlXEtxtV3bPzysc5/IA1RPhr4OhVj4s1GBmmkkMVmrr+Ed5P6Vu1lZS/dbGGVEaU3HMi54xGxHGcYIzXqPxnG+Nd5HlvyvLVj+KBI6ZBHGiW+xjGJOp6g49BUsrGVFitYioZ9pyMcZ5BPpTa3tTC63UxjRS4UHfyG7YAp46SRFnZRGY5D1XJY/nXVOJnIhFC1s7b2BQsV2gdOemT2ptcI8Mim3YBcncqkBcnt/WnU8u3dPkkO+GAAAGcegpk8rrOlrCBtZfxFiOM+xGc1gBRSVX7xGUA8vCgk/L7Z7mnVoxlj8pkLGME5Uc/Q54pnEwRi8uyQyKzKCMjcONo4Jp5G1uu5VjIRsMAR1JPripRP0LupaGKaSSQSrhQ6gYB5+bFOobVEWO4uGO4guSSMk+nHH60KCm6E3Lylo8J85XBJ/wBKLMPHmCVSGIxs3Z/PmsiBXCQ5ZlK8ZIIy3I9qzNUFt4gDzM3l+awcbvU5FaQkqGRAzq5Vj8qenuKyrWL++s/EN1sjzi43LlcgHPX6VhPWDOPhoi3bqUkjuY2QtncjcEBT6/v+VIJfG6GWZsKxwFXnaR3HrzS9jFNMEvTboXkUPtRtowRjp+tOkgRHcMkiyYVPlG75R06dDWfpgxlJcosSSJaSTEqGKsOmTjr+vNJ3t3LsVWsxGxOAg7DuKfee/lO0FiWJXyirDuCSAfamEsd1JHulsyhA3/i4GPT+1AMU8+cfNgqvyBGbbkHsAO9eiNP5FVPNPO04CEcgH157V1HHDKuV8t3V/wCI6jJ7evSnFtLbWZCrEW+YAMcHn6Y6VlgHjFdzwid2kK+bgtuUHjJ4oh+7LGky2jsVU7drkZYnjA6+v6/WnMLh2WOKMRCVzncAoBAJ5B9sfTPB7U4jYzqJQik5ADADnIPbHHT6+ueMYgj7h/LiEvkXULOeQ67wAegyPf8AKlLPDwhZmEyBfl2HaxyOp/70uIGFrtdzEQVUqv4evXjk0l92KYtxbuT5eQS4Cnnpn6VAKaypGXNqJZnkTOC4xjcAwPocdB9ad20sohJiiTzD+E/zden5YolXypDJIscaKWIB42dx9en1pwbWIl5byWKIkFtoY7QM5zjr06E4qWDi2guZSsvkbmP4c4wFIJOSeRg+griZ/OXc0gOMFdzdMcUtN5UbIyyyzqVBaUjHBAxj2pF5bdyI1gHmFwTJkYOemBQDXh5HjuxGFJwuzOcevTjFeqskkuwqHibBUE8Yxzn+9JRW9zK7yeaqs7nIZicEduKkUQwMZ1RRuOdrJu/h+3p3oAS5k5VXgZ+GGCGY9ePbrXSLe7RKqBFc/OzZ5A5wcdOcc/uKJZEYqLaKJC2TEc/MAGyBgeoNdr98aLLO6/MPxHbk56YPJ+nWgPbjzIoxBc3qBMABYk5VT79+f/JrqRLVItj4mKoCqbDu3Z7nruPpjP8A01zuj89o0kO0oWYomNoI5O4/X6cdq8EkPl7bdjxhtzEh27bcnjtn+nWpSATyhYxthSJxk7d3OOp4Gf7fSkZFmaTet2EwDxHByGx6k5BIPTg+ma7i02KO68wCVZDuPdmBxyfbj1ryWSGJXa3fncX6Aqwx+ePr04qQJyW1ykjGFpbldu4EgqWIY9z047bfypHUUu2j85UtoIggBbO7AOemex5HBx15HSpK2BhZobk7W/GiAcK+OBuPP07+nFQmvszWZkkUpD5iyK+flD+pPtxz781ILRol8s2lxSLLukhIG1ctjB4B4z+VSt7E80kTFdru+RtPIBHp1xn2NVHwVcTQ3U1vNIoLo0gQHBPTkAdPy4PbvVyc+YNsrna8e0MRyCOSD396j7BFLZvHEsMqBkBJw2eRnr9fy70jJZ9VSUo+4gOBnnuOOP3qYWVfMZxFsjiG4o3IPbj06U0nd4nEpDKwYMCADnPQ/wDipIRDvbiOdZQNxI2swUBcdx6enamzJshcDHlxZ3Kv+Y9OTj+o+hp8xSXzmRPJlXlsr0bP+tNDJGkbRYy8gyME5XHfP69KhkiVgJgQINy+Y5G49UGBuHTvgdjUxFueB4bdX8xyGO7tg9cdf6VGWrRn/h43JLZO5uN5xx16dD1xUB4r+MHw58Buo8TeMLOyvY0VvuQbfOSD0Crz1I/X2qCVFvwvkc6vGFlRSUJzycdcHjqf0qP1TR11GwmadWEbqYndvwsueFJPH/evnHxx9q/x7rd61r8GPhPcXjO6pLe38ZZcdiEXgZ5HNRnwkH2i7nx/P4m+LutSXdpcxAR6bNOCbY7flMSLwMDAI71DXYy69TeLrS50iXStTWKd7cAKzusokgI/C2DyRyP09K+Nfjx8FZfCGtTeJvDkT/4NPLvCrnfbSE5K8dB1IPsa+1L27huootWt4FZgfKuXTncvZ/Yjp2/aoTxRpunSxNb3ccU1rcoUdchkk3D+uM1o8vjq+OEbvB5cuLPP0fKfwr+IDXvl6Lr8qyyphYJnPDY/lJ9a1dj5sgaEpt6H2rKfiH8Nda8OeIZr0KggZg8EsSBQsY/DkL0I/vVv8A+J5LiNNN1YRPIeEmJHI9D715a6rq8M9lTerUpQLiLcyfK0gyOmO1O3sQEDFMdOSOppRQm0CO33DHQEEipC2Tzk+WIBlHI3c1pSimbPyMaLZqEJbJY8DHf3pRLCQqSwUMRwSalLSB1jCuobJ27m7U4ltJgIvKKAK2WBPJoq8kSnlkBJYny8rIwPTpxXUdlJGB5oBA5BAqdFpPKN8gUoMjPIpJbHfGzSSKiEYznpz71bGDSMe/0VHX7SMt5J+Ynngdqrt1HFaxEKmGI6nsKvV9b2oLRA7yDyc1SvECiLdkBgT0qppplsZKSKleanIkpjQuAoyx6cetSfgqyvPF2uR6PDLmIjzJmBwEQc/vVY1GO5ubgRFG3FsKq9TngD8+lb58NPA9t4Z0mCOVQt3coJbxz0PcRg9setdj8ZxnfZl+I4/wCV5MeNXp7ZaNJt3iitbdxtgRAkSY6L0zj161dkSeHTliwCYNsrGMEswXqfrtJqEntrU20d9YMwilLbSCBxnr3wM5qWs9T/AOGSGD5mAw59hXq1HqeNnLvssJIjiW4hKmOU7YzxgsRkEGu5JVuIg8rMzncD82Qpz6dazTxt8SPEXw1s7K3HhzTtW0yeRk2yStHImQSAG6fTp/Woa1+0z4MuIDFrHhzXrFiMFljE0akdT8mSRyPesXPJHU1xAyoyxKHLZ6EdO55IPpTNFnBfznbcjqiuFIwOo7H+tV/QfiP4O8WJENA8R29yxQM1uuY3Qf8AUrcjn+lTlrITOhkMexGLbQAcn6/Soy34MIc2qG4nBnMeVAckN+HPoMj86fRYhG1pCyQKN5AGPbndTe3gjhh2MmzzOj7uG46CncAaISMkaJJjJ3HcrD6VkiGOCrzfKJo2XhlK8nrkg4P0pzDLGku5lYKcdfxDOc/lScaQxWoeYGNVJAy3QHoT6fnTe71DSbOLD6hCv4d3zhnX3x17jFZED61jCysrADyi+QB8zegrJ/EEkX+OXyoqKhlYszt8yYwMf1q9W/jKxuJTHpVre3UrBmYtEY15JG7c3B/KqbJ4d1y9upJ5LeJmlkZyS6sQpP1quzeMGcXgtehx3J0yK4W5lIZQEXGSydsH9akWkdbg+XJMpkwo2kgn9qYWkM2n2yWgkZ/JTjALYGD6egBp7cTyXMZW2815XVsAnIA/LpWa8MDuNRK7AmQ4bcdpIAJXkdK4mS3jG5YZCWAIw54I4A9O/wCftXq3N1DGqyxF9nZGwxLD/tR94Uxoi+ceTuRT+E9c8cGp+wMZN6/xIR5Sv1yBz6jg9a8tyBKqurhhngHgD3NF9bznCq7IzN/zByvqPz601gs4VkH3iaSUyMFCqTtDe9ZglJPJLqyxRyArlmbBz7n+/T1p4k9x5irvtfXkc+wAHXjP9zTAx/drgeUI4lBym35s+3XnvTkXlxOzP5iqGGcbec/2/asfoCkvnJkxRQupww55Bz2z2pnN500MksjR7mfLCJueD6Y9CKc2ytckAuXVTuAc8v6k+9dy25mxHJIYmT/KoAJ7ftUA/9k=', '2024-08-13 14:13:38', '2024-08-14 11:51:35', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_id_customer_index` (`id_customer`),
  ADD KEY `bookings_id_room_index` (`id_room`);

--
-- Indexes for table `connection_histories`
--
ALTER TABLE `connection_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connection_histories_user_id_index` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devises`
--
ALTER TABLE `devises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devise_gestions`
--
ALTER TABLE `devise_gestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devise_gestions_id_devise_index` (`id_devise`);

--
-- Indexes for table `encaissements`
--
ALTER TABLE `encaissements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encaissements_id_pay_meth_index` (`id_pay_meth`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_id_booking_index` (`id_booking`);

--
-- Indexes for table `item_room_invoices`
--
ALTER TABLE `item_room_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_room_invoices_id_room_index` (`id_room`),
  ADD KEY `item_room_invoices_id_invoice_index` (`id_invoice`);

--
-- Indexes for table `item_service_invoices`
--
ALTER TABLE `item_service_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_service_invoices_id_service_index` (`id_service`),
  ADD KEY `item_service_invoices_id_invoice_index` (`id_invoice`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_methods_id_currency_index` (`id_currency`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_id_cat_index` (`id_cat`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_assign_reservations`
--
ALTER TABLE `service_assign_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_assign_reservations_id_service_index` (`id_service`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `connection_histories`
--
ALTER TABLE `connection_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `devises`
--
ALTER TABLE `devises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `devise_gestions`
--
ALTER TABLE `devise_gestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `encaissements`
--
ALTER TABLE `encaissements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_room_invoices`
--
ALTER TABLE `item_room_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_service_invoices`
--
ALTER TABLE `item_service_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_assign_reservations`
--
ALTER TABLE `service_assign_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `connection_histories`
--
ALTER TABLE `connection_histories`
  ADD CONSTRAINT `connection_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devise_gestions`
--
ALTER TABLE `devise_gestions`
  ADD CONSTRAINT `devise_gestions_id_devise_foreign` FOREIGN KEY (`id_devise`) REFERENCES `devises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `encaissements`
--
ALTER TABLE `encaissements`
  ADD CONSTRAINT `encaissements_id_pay_meth_foreign` FOREIGN KEY (`id_pay_meth`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_id_booking_foreign` FOREIGN KEY (`id_booking`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_room_invoices`
--
ALTER TABLE `item_room_invoices`
  ADD CONSTRAINT `item_room_invoices_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_room_invoices_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_service_invoices`
--
ALTER TABLE `item_service_invoices`
  ADD CONSTRAINT `item_service_invoices_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_service_invoices_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_id_currency_foreign` FOREIGN KEY (`id_currency`) REFERENCES `devise_gestions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_id_cat_foreign` FOREIGN KEY (`id_cat`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_assign_reservations`
--
ALTER TABLE `service_assign_reservations`
  ADD CONSTRAINT `service_assign_reservations_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
