CREATE TABLE IF NOT EXISTS `car_insurance` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(50) NOT NULL,
  `1-4` int(11) NOT NULL,
  `5-6` int(11) NOT NULL,
  `7-8` int(11) NOT NULL,
  `9-10` int(11) NOT NULL,
  `11-15` int(11) NOT NULL,
  `16-20` int(11) NOT NULL,
  `21-25` int(11) NOT NULL,
  `26-30` int(11) NOT NULL,
  `366` int(11) NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota_kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `id_car_insurance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=515 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `kategori_asuransi` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `pembayaran_asuransi` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_bayar` float NOT NULL,
  `pajak` float NOT NULL,
  `jenis_pembayaran` int(11) NOT NULL,
  `nomor_kartu` varchar(16) DEFAULT NULL,
  `nomor_rekening` varchar(20) DEFAULT NULL,
  `nomor_telepon` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `pembelian_asuransi` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_booking` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tipe_asuransi` int(11) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pembayaran` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `travel_insurance` (
  `id_travel` int(11) NOT NULL AUTO_INCREMENT,
  `wilayah` int(1) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `1-4` int(11) NOT NULL,
  `5-6` int(11) NOT NULL,
  `7-8` int(11) NOT NULL,
  `9-10` int(11) NOT NULL,
  `11-15` int(11) NOT NULL,
  `16-20` int(11) NOT NULL,
  `21-25` int(11) NOT NULL,
  `26-30` int(11) NOT NULL,
  `366` int(11) NOT NULL,
  PRIMARY KEY (`id_travel`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
