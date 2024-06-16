<?php
session_start();
require "connect.php";
include "header.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Insurance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
        }
        .header .logo {
            height: 40px;
        }
        .header .menu {
            display: flex;
            gap: 15px;
        }
        .header .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .header-image {
            width: 100%;
            overflow: hidden; /* Memastikan gambar tidak keluar dari container */
        }

        .header-image img {
            width: 100%;
            display: block;
        }
        .main-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #00aaff;
            color: #fff;
        }
        .main-section .title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .main-section .subtitle {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .main-section .apps {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .insurance-types {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background-color: #fff;
        }
        .insurance-types .type {
            text-align: center;
        }
        .insurance-types .type img {
            width: 50px;
            height: 50px;
        }
        .insurance-types .type.highlight {
            border-bottom: 2px solid #00aaff;
        }

        /* Gaya tambahan untuk form dan komponen-komponennya */
        
        .form-container {
            background-color: #fff; /* Kotak putih di dalam container */
            padding: 20px;
            background-color: #00aaff;
            border-radius: 25px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Sesuaikan lebarnya sesuai kebutuhan */
            margin: 0 auto; /* Untuk membuatnya berada di tengah */
            min-height: 10px; /* Misalnya, tetapkan tinggi minimum */
            box-sizing: border-box;
        }

        .form-container .text-gold {
            color: gold;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .form-container .form-group {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="number"],
        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            font-size: 14px;
        }

        .form-container select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.707 5.293a1 1 0 0 0-1.414 0L10 11.586 3.707 5.293a1 1 0 0 0-1.414 1.414l7 7a1 1 0 0 0 1.414 0l7-7a1 1 0 0 0 0-1.414z"/></svg>');
            background-repeat: no-repeat;
            background-position-x: calc(100% - 10px);
            background-position-y: center;
            background-size: 14px;
        }

        .form-container button[type="submit"] {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result-container {
        background-color: #fff;
        margin-top: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }   
        .result-container h3 {
            margin-bottom: 10px;
        }
        .result-container p {
            font-size: 18 px;
            font-weight: bold;
        }
        .container2 {
            margin-top: 20px;
        }
        .texts {
            margin-bottom: 20px;
        }
        .contents {
            text-align: center;
            padding: 20px;
        }
        .content-info {
            flex-grow: 1;
            padding-top: 20px;
            padding-left: 40px;
            padding-right: 40px;
            background-color: #fff;
        }
        .container3 {
            display: grid;
            grid-template-columns: 1fr 3fr; /* Membagi layout menjadi 1 bagian untuk sidebar dan 3 bagian untuk konten */
            gap: 20px; /* Jarak antara sidebar dan konten */
        }
        .sidebar {
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            width: 250px;
            height: 100vh;
            /* background-color: #f1f1f1; */
            padding: 10px;
            /* box-shadow: 2px 0 5px rgba(0,0,0,0.1); */
            flex-shrink: 0;
        }
        .container4 {
            width: 80%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        .dropdown {
            margin-bottom: 10px;
        }
        .dropdown-title {
            cursor: pointer;
            background-color: #fff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 5px;
        }
        .dropdown-title::after {
            content: '';
            background-image: url('data:image/svg+xml;charset=utf8,<svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.707 5.293a1 1 0 0 0-1.414 0L10 11.586 3.707 5.293a1 1 0 0 0-1.414 1.414l7 7a1 1 0 0 0 1.414 0l7-7a1 1 0 0 0 0-1.414z"/></svg>');
            /* background-repeat: no-repeat; */
            background-position: right 10px center;
            background-size: 14px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
            width: 14px; /* Adjust size of arrow icon */
            height: 14px; /* Adjust size of arrow icon */
        }
        .dropdown-content {
            display: none;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .arrow {
            font-size: 24px;
            transition: transform 0.3s ease;
        }
        .dropdown-title.active .arrow {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <div class="bg-body-index">
        <div class="container">
            <div class="content">
                <div class="text">
                    <h1 class="display-6 fst-italic">Protect Your Ride with Car Rental Insurance</h1>
                    <p class="lead my-3">Rental car insurance can be confusing, complicated and costly.
                        We've created a solution to save you time and money at the car rental counter.
                        Protecting your rental car has never been this easy.</p>
                </div>
                <div class="form-container bg-white p-4 text-black">
                    <div class="text-gold">
                        <h2>Cek Harga</h2>
                    </div>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="provinsi">Provinsi:</label>
                            <select class="form-control" name="provinsi" id="provinsi" required>
                                <option value="">Pilih Provinsi</option>
                            <!-- Add all provinces options here -->
                                <?php
                                // Query to retrieve all provinces from the database
                                $sql = "SELECT DISTINCT provinsi FROM car_insurance";
                                $result = mysqli_query($connection, $sql);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . htmlspecialchars($row['provinsi']) . '">' . htmlspecialchars($row['provinsi']) . '</option>';
                                    }
                                }
                                ?>
                                <!-- <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                                <option value="Sumatra Utara">Sumatra Utara</option>
                                <option value="Sumatra Selatan">Sumatra Selatan</option>
                                <option value="Sumatra Barat">Sumatra Barat</option>
                                <option value="Bengkulu">Bengkulu</option>
                                <option value="Riau">Riau</option>
                                <option value="Kepulauan Riau">Kepulauan Riau</option>
                                <option value="Jambi">Jambi</option>
                                <option value="Lampung">Lampung</option>
                                <option value="Bangka Belitung">Bangka Belitung</option>
                                <option value="Kalimantan Barat">Kalimantan Barat</option>
                                <option value="Kalimantan Timur">Kalimantan Timur</option>
                                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                <option value="Kalimantan Utara">Kalimantan Utara</option>
                                <option value="Banten">Banten</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                                <option value="Bali">Bali</option>
                                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                <option value="Gorontalo">Gorontalo</option>
                                <option value="Sulawesi Barat">Sulawesi Barat</option>
                                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                <option value="Maluku Utara">Maluku Utara</option>
                                <option value="Maluku">Maluku</option>
                                <option value="Papua Barat">Papua Barat</option>
                                <option value="Papua">Papua</option>
                                <option value="Papua Tengah">Papua Tengah</option>
                                <option value="Papua Pegunungan">Papua Pegunungan</option>
                                <option value="Papua Selatan">Papua Selatan</option> -->
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="durasi">Durasi (hari):</label>
                            <input type="number" name="durasi" id="durasi" min="1" max="366" required>
                        </div>
                        <button type="submit" name="submit">Cek Harga</button>
                    </form>
                    <?php
                    // Proses form ketika disubmit
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                        $provinsi = $_POST['provinsi'];
                        $durasi = intval($_POST['durasi']);

                        // Query untuk mengambil harga asuransi berdasarkan provinsi dan durasi
                        $sql = "SELECT * FROM car_insurance WHERE provinsi = '$provinsi'";
                        $result = mysqli_query($connection, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            // Mendapatkan harga berdasarkan durasi
                            if ($durasi >= 1 && $durasi <= 4) {
                                $harga = $row['1-4'];
                            } elseif ($durasi >= 5 && $durasi <= 6) {
                                $harga = $row['5-6'];
                            } elseif ($durasi >= 7 && $durasi <= 8) {
                                $harga = $row['7-8'];
                            } elseif ($durasi >= 9 && $durasi <= 10) {
                                $harga = $row['9-10'];
                            } elseif ($durasi >= 11 && $durasi <= 15) {
                                $harga = $row['11-15'];
                            } elseif ($durasi >= 16 && $durasi <= 20) {
                                $harga = $row['16-20'];
                            } elseif ($durasi >= 21 && $durasi <= 25) {
                                $harga = $row['21-25'];
                            } elseif ($durasi >= 26 && $durasi <= 30) {
                                $harga = $row['26-30'];
                            } elseif ($durasi == 366) {
                                $harga = $row['366'];
                            } else {
                                // Handle jika durasi tidak sesuai dengan kategori yang ada
                                echo "Durasi tidak valid.";
                                // Anda bisa tambahkan redirect atau pesan kesalahan lain sesuai kebutuhan
                                exit;
                            }

                            // Tampilkan hasil harga ke pengguna
                            echo '<div class="result-container">';
                            echo '<h3>Harga Asuransi Rental Mobil untuk Provinsi ' . htmlspecialchars($provinsi) . ' selama ' . $durasi . ' hari adalah:</h3>';
                            echo '<p>Rp ' . number_format($harga, 0, ',', '.') . '</p>';
                            echo '</div>';
                        } else {
                            // Handle jika data provinsi tidak ditemukan dalam tabel
                            echo "Data provinsi tidak ditemukan.";
                            // Anda bisa tambahkan redirect atau pesan kesalahan lain sesuai kebutuhan
                            exit;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container2">
        <div>
        </div>
        <div class="contents">
            <div class="texts">
                <h1 class="display-6 fst-italic">ASURANSI RENTAL MOBIL DI INDONESIA </h1>
            </div>
        </div>
        <div class="content-info">
            <div class="texts">
            <p class="lead my-3">Sekarang adalah saat yang tepat bagi Anda untuk mendapatkan perlindungan dari mitra asuransi mobil rental kami. 
                    Kami mengerti bahwa asuransi mobil rental memiliki berbagai persyaratan yang perlu Anda ketahui sebelum mengambil keputusan. 
                    Meskipun mobil rental Anda sudah terdaftar di salah satu perusahaan asuransi mobil, mari kita coba jawab beberapa pertanyaan ini. 
                    Apa yang sebenarnya dicakup? Berapa biayanya? Mengapa biayanya begitu mahal? 
                    Bagaimana cara mengajukan klaim? Dan Anda pasti memiliki banyak pertanyaan lainnya tentang asuransi.
                </p>
                <p class="lead my-3">Namun setidaknya Anda perlu memiliki pengetahuan dasar terkait asuransi mobil rental ini. 
                    Anda akan membutuhkannya di masa depan. Bahkan Anda bisa menggunakannya untuk memilih asuransi terbaik untuk mobil Anda saat diperlukan. 
                    Biarkan Asuransi kami menjadi mitra perusahaan asuransi terbaik Anda.
                </p>           
            </div>
        </div>
    </div>

    <div class="header-image">
        <img src="images/HI.png" alt="Header Image" style="width: 100%; height: 250px; display: block;">
    </div>


    <div id="detail">
        <div class="container4">
            <div class="dropdown">
                <div class="dropdown-title">Mengapa Asuransi Kami?</div>
                <div class="dropdown-content">
                    <h2 class="lead my-3">1. Kenyamanan</h2>
                    <p class="lead my-3">Tidak perlu janji temu survei secara langsung. Cukup isi detail mobil rental Anda pada aplikasi.</p>
                    <h2 class="lead my-3">2. Cepat</h2>
                    <p class="lead my-3">Dapatkan persetujuan dalam waktu 24 jam setelah Anda mengirimkan pengajuan.</p>
                    <h2 class="lead my-3">3. Terjangkau</h2>
                    <p class="lead my-3">Temukan rencana asuransi yang ramah di kantong untuk mobil rental Anda.</p>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Kriteria Kelayakan dan Cakupan Asuransi</div>
                <div class="dropdown-content">
                    <p class="lead my-3">Penjelasan tentang kriteria apa saja yang harus dipenuhi untuk mendapatkan asuransi, serta cakupan perlindungan yang diberikan.</p>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Cara Daftar Asuransi</div>
                <div class="dropdown-content">
                <h2 class="lead my-3">1. Buka Aplikasi</h2>
                    <p class="lead my-3">Mulai dengan membuka produk Asuransi di aplikasi.</p>
                    <h2 class="lead my-3">2. Isi Jangka Waktu Rental Mobil Anda</h2>
                    <p class="lead my-3">Beritahu kami berapa lama perjalanan akan Anda lakukan.</p>
                    <h2 class="lead my-3">3. Pilih Rencana yang Anda Inginkan</h2>
                    <p class="lead my-3">Temukan rencana asuransi yang ramah di kantong untuk mobil rental Anda.</p>
                    <h2 class="lead my-3">4. Selesaikan Pembayaran Anda</h2>
                    <p class="lead my-3">Pilih metode pembayaran yang Anda sukai dan ikuti petunjuk serta instruksi yang ada di layar.</p>
                    <h2 class="lead my-3">5. Dapatkan Persetujuan</h2>
                    <p class="lead my-3">Anda akan menerima polis asuransi mobil rental dan sertifikatnya melalui email dalam waktu 24 jam.</p>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Cara Klaim Asuransi</div>
                <div class="dropdown-content">
                    <p class="lead my-3">Prosedur yang harus diikuti ketika ingin melakukan klaim asuransi.</p>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Frequently Asked Questions (FAQ)</div>
                <div class="dropdown-content">
                    <p class="lead my-3">Pertanyaan-pertanyaan umum dan jawabannya terkait asuransi mobil rental.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.querySelectorAll('.dropdown-title').forEach(title => {
        title.addEventListener('click', () => {
            const content = title.nextElementSibling;
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
            title.classList.toggle('active');
        });
    });
</script>
    <!-- <div id="detail">
        <div class="container4">
            <div class="sidebar">
                <ul>
                    <li><a href="#mengapa-asuransi-kami" class="lead my-3">Mengapa Asuransi Kami?</a></li>
                    <li><a href="#kriteria-dan-cakupan" class="lead my-3">Kriteria Kelayakan dan Cakupan Asuransi</a></li>
                    <li><a href="#cara-daftar" class="lead my-3">Cara Daftar Asuransi</a></li>
                    <li><a href="#cara-klaim" class="lead my-3">Cara Klaim Asuransi</a></li>
                    <li><a href="#faq" class="lead my-3">Frequently Asked Questions (FAQ)</a></li>
                </ul>
            </div>

            <div class="content-info">
                <div class="texts" id="mengapa-asuransi-kami">
                    <h1 class="display-6">Mengapa Asuransi Kami?</h1>
                    <h2 class="lead my-3">1. Kenyamanan</h2>
                    <p class="lead my-3">Tidak perlu janji temu survei secara langsung. Cukup isi detail mobil rental Anda pada aplikasi.</p>
                    <h2 class="lead my-3">2. Cepat</h2>
                    <p class="lead my-3">Dapatkan persetujuan dalam waktu 24 jam setelah Anda mengirimkan pengajuan.</p>
                    <h2 class="lead my-3">3. Terjangkau</h2>
                    <p class="lead my-3">Temukan rencana asuransi yang ramah di kantong untuk mobil rental Anda.</p>
                </div>

                <div class="texts" id="kriteria-dan-cakupan">
                    <h1 class="display-6">Kriteria Kelayakan dan Cakupan Asuransi</h1>
                    <p class="lead my-3">Penjelasan tentang kriteria apa saja yang harus dipenuhi untuk mendapatkan asuransi, serta cakupan perlindungan yang diberikan.</p>
                </div>

                <div class="texts" id="cara-daftar">
                    <h1 class="display-6">Cara Daftar Asuransi</h1>
                    <p class="lead my-3">Langkah-langkah untuk mendaftar asuransi mobil rental dari perusahaan Anda.</p>
                </div>

                <div class="texts" id="cara-klaim">
                    <h1 class="display-6">Cara Klaim Asuransi</h1>
                    <p class="lead my-3">Prosedur yang harus diikuti ketika ingin melakukan klaim asuransi.</p>
                </div>

                <div class="texts" id="faq">
                    <h1 class="display-6">Frequently Asked Questions (FAQ)</h1>
                    <p class="lead my-3">Pertanyaan-pertanyaan umum dan jawabannya terkait asuransi mobil rental.</p>
                </div>
            </div>
        </div>
    </div> -->
    <?php 
    include "footer.php"
?>
</body>
</html>