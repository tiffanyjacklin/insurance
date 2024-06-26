<?php
session_start();
include "header.php";

// Provinsi
$urlProvinsi = 'http://52.7.154.154:8005/insurance/car_insurance/all';
$chProvinsi = curl_init($urlProvinsi);
curl_setopt($chProvinsi, CURLOPT_RETURNTRANSFER, true);
$responseForProvinsi = curl_exec($chProvinsi);
curl_close($chProvinsi);
$ProvinsiData = json_decode($responseForProvinsi, true);
if ($ProvinsiData === null) {
    echo "Failed to retrieve Provinsi data.";
    exit;
}
$daftarProvinsi = [];
for ($i = 0; $i < count($ProvinsiData); $i++) {
    $daftarProvinsi[] = $ProvinsiData[$i]["provinsi"];
}
$Provinsi = $daftarProvinsi;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Insurance</title>
    <style>
        body {
            margin: 0;
            padding: 0;

        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
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
            overflow: hidden;
            /* Memastikan gambar tidak keluar dari container */
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
            background-color: #fff;
            /* Kotak putih di dalam container */
            padding: 20px;
            background-color: #00aaff;
            border-radius: 25px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            /* Sesuaikan lebarnya sesuai kebutuhan */
            margin: 0 auto;
            /* Untuk membuatnya berada di tengah */
            min-height: 10px;
            /* Misalnya, tetapkan tinggi minimum */
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
            grid-template-columns: 1fr 3fr;
            /* Membagi layout menjadi 1 bagian untuk sidebar dan 3 bagian untuk konten */
            gap: 20px;
            /* Jarak antara sidebar dan konten */
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
            width: 100%;
            max-width: 1000px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        .dropdown {
            margin-bottom: 10px;
            position: relative;
        }

        .dropdown-title {
            cursor: pointer;
            background-color: #fff;
            padding: 15px;
            border-bottom: 1px solid #7b7b7b;
            text-align: left;
            font-size: 36px;
            margin-bottom: 5px;
            font-family: 'Times New Roman', Times, serif;
            position: relative;
        }

        .dropdown-title::after {
            content: '';
            background-image: url('data:image/svg+xml;charset=utf8,<svg fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.707 5.293a1 1 0 0 0-1.414 0L10 11.586 3.707 5.293a1 1 0 0 0-1.414 1.414l7 7a1 1 0 0 0 1.414 0l7-7a1 1 0 0 0 0-1.414z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 14px;
            position: absolute;
            top: 50%;
            transition: transform 0.3s ease;
            transform: translateY(-50%);
            right: 10px;
            width: 30px;
            /* Adjust size of arrow icon */
            height: 30px;
            /* Adjust size of arrow icon */
        }

        .dropdown-content {
            display: none;
            padding: 10px;
            border-bottom: 1px solid #7b7b7b;
            text-align: left;
        }

        .dropdown-content h2 {
            font-size: 25px;
            font-weight: bold;
        }

        .dropdown-content p {
            font-size: 20px;
        }

        .arrow {
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .dropdown-title.active .arrow {
            transform: rotate(180deg);
        }

        .dropdown.active .dropdown-content {
            display: block;
        }

        .lead.my-3 {
            margin: 15px 0;
        }

        .claim-container {
            display: flex;
        }

        .claim-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .claim-right {
            flex: 3;
            padding-left: 20px;
        }

        .claim-left img {
            width: 100%;
            height: auto;
        }

        .faq-item {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .faq-question {
            cursor: pointer;
            font-weight: bold;
            position: relative;
        }

        .faq-question::after {
            content: '';
            background-image: url('data:image/svg+xml;charset=utf8,<svg fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.707 5.293a1 1 0 0 0-1.414 0L10 11.586 3.707 5.293a1 1 0 0 0-1.414 1.414l7 7a1 1 0 0 0 1.414 0l7-7a1 1 0 0 0 0-1.414z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 14px;
            transition: transform 0.3s ease;
            width: 25px;
            height: 25px;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .faq-item.active .faq-question::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            display: none;
            margin-top: 5px;
            color: #555;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .criteria-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .criteria-item {
            flex: 1 1 45%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .criteria-item:hover {
            transform: scale(1.05);
        }

        .criteria-item h3 {
            margin-top: 0;
            font-size: 22px;
            color: #333;
        }

        .criteria-item p {
            margin: 10px 0;
            color: #555;
            font-size: 16px;
        }

        .criteria-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .why-us-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .why-us-item {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .why-us-item:hover {
            transform: scale(1.05);
        }

        .why-us-item h3 {
            margin-top: 0;
            font-size: 22px;
            color: #333;
        }

        .why-us-item p {
            margin: 10px 0;
            color: #555;
            font-size: 16px;
        }

        .steps-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .step-item {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .step-item:hover {
            transform: scale(1.05);
        }

        .step-item h3 {
            margin-top: 0;
            font-size: 22px;
            color: #333;
        }

        .step-item p {
            margin: 10px 0;
            color: #555;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
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
                                <?php
                                // Assuming $Provinsi is populated from your cURL response or other data source
                                $selectedProvinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';
                                if (isset($Provinsi) && is_array($Provinsi)) {
                                    foreach ($Provinsi as $provinsi) {
                                        $selected = ($provinsi === $selectedProvinsi) ? 'selected' : '';
                                        echo '<option value="' . htmlspecialchars($provinsi) . '" ' . $selected . '>' . htmlspecialchars($provinsi) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input class="form-control" type="date" name="start_date" id="start_date" min="<?php echo date('Y-m-d'); ?>"
                                required value="<?php echo isset($_POST['start_date']) ? htmlspecialchars($_POST['start_date']) : ''; ?>"
                                onchange="validateDates()">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input class="form-control" type="date" name="end_date" id="end_date" min="<?php echo date('Y-m-d'); ?>" required
                                value="<?php echo isset($_POST['end_date']) ? htmlspecialchars($_POST['end_date']) : ''; ?>"
                                onchange="validateDates()">
                        </div>
                        <button type="submit" name="submit">Cek Harga</button>
                    </form>
                    <?php
                    
                    // Function to fetch data from the API
                    function fetchDataFromAPI($url)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        return json_decode($response, true);
                    }

                    // URL to fetch the car insurance data
                    $urlInsurance = 'http://52.7.154.154:8005/insurance/car_insurance/all';
                    $insuranceData = fetchDataFromAPI($urlInsurance);

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                        $provinsi = $_POST['provinsi'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];

                        // Convert dates to DateTime objects
                        $start = new DateTime($start_date);
                        $end = new DateTime($end_date);
                        // Calculate the difference between the dates
                        $interval = $start->diff($end);
                        $durasi = $interval->days  + 1;

                        // Find the insurance data for the selected province
                        $insuranceForProvince = null;
                        foreach ($insuranceData as $data) {
                            if ($data['provinsi'] === $provinsi) {
                                $insuranceForProvince = $data;
                                break;
                            }
                        }

                        if ($insuranceForProvince !== null) {
                            // Get the price based on the duration
                            if ($durasi >= 1 && $durasi <= 4) {
                                $harga = $insuranceForProvince['1-4'];
                            } elseif ($durasi >= 5 && $durasi <= 6) {
                                $harga = $insuranceForProvince['5-6'];
                            } elseif ($durasi >= 7 && $durasi <= 8) {
                                $harga = $insuranceForProvince['7-8'];
                            } elseif ($durasi >= 9 && $durasi <= 10) {
                                $harga = $insuranceForProvince['9-10'];
                            } elseif ($durasi >= 11 && $durasi <= 15) {
                                $harga = $insuranceForProvince['11-15'];
                            } elseif ($durasi >= 16 && $durasi <= 20) {
                                $harga = $insuranceForProvince['16-20'];
                            } elseif ($durasi >= 21 && $durasi <= 25) {
                                $harga = $insuranceForProvince['21-25'];
                            } elseif ($durasi >= 26 && $durasi <= 30) {
                                $harga = $insuranceForProvince['26-30'];
                            } elseif ($durasi == 366) {
                                $harga = $insuranceForProvince['366'];
                            } else {
                                // Handle if duration does not match any category
                                echo '<div class="result-container">';
                                echo "<h3>Durasi tidak valid. Silakan masukkan durasi yang benar.</h3>";
                                echo '</div>';
                                // Set harga to null to avoid errors
                                $harga = null;
                            }

                            // Display the price to the user if valid
                            if ($harga !== null) {
                                echo '<div class="result-container">';
                                echo '<p>Harga Asuransi Rental Mobil untuk Provinsi ' . htmlspecialchars($provinsi) . ' dari ' . htmlspecialchars(date_format(new DateTime($start_date), 'd/m/Y')) . ' sampai ' . htmlspecialchars(date_format(new DateTime($end_date), 'd/m/Y')) . ' adalah:</p>';
                                echo '<p>Rp ' . number_format($harga, 0, ',', '.') . '</p>';
                                echo '</div>';
                            }
                        } else {
                            // Handle if the province data is not found in the API response
                            echo '<div class="result-container">';
                            echo "<h3>Data provinsi tidak ditemukan.</h3>";
                            echo '</div>';
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
                <p class="lead my-3">Sekarang adalah saat yang tepat bagi Anda untuk mendapatkan perlindungan dari mitra
                    asuransi mobil rental kami.
                    Kami mengerti bahwa asuransi mobil rental memiliki berbagai persyaratan yang perlu Anda ketahui
                    sebelum mengambil keputusan.
                    Meskipun mobil rental Anda sudah terdaftar di salah satu perusahaan asuransi mobil, mari kita coba
                    jawab beberapa pertanyaan ini.
                    Apa yang sebenarnya dicakup? Berapa biayanya? Mengapa biayanya begitu mahal?
                    Bagaimana cara mengajukan klaim? Dan Anda pasti memiliki banyak pertanyaan lainnya tentang asuransi.
                </p>
                <p class="lead my-3">Namun setidaknya Anda perlu memiliki pengetahuan dasar terkait asuransi mobil
                    rental ini.
                    Anda akan membutuhkannya di masa depan. Bahkan Anda bisa menggunakannya untuk memilih asuransi
                    terbaik untuk mobil Anda saat diperlukan.
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
                    <div class="why-us-container">
                        <div class="why-us-item">
                            <h3>Kenyamanan</h3>
                            <p>Tidak perlu janji temu survei secara langsung. Cukup isi detail mobil rental Anda pada
                                aplikasi.</p>
                        </div>
                        <div class="why-us-item">
                            <h3>Cepat</h3>
                            <p>Dapatkan persetujuan dalam waktu 24 jam setelah Anda mengirimkan pengajuan.</p>
                        </div>
                        <div class="why-us-item">
                            <h3>Terjangkau</h3>
                            <p>Temukan rencana asuransi yang ramah di kantong untuk mobil rental Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Kriteria Kelayakan dan Cakupan Asuransi</div>
                <div class="dropdown-content">
                    <div class="criteria-container">
                        <div class="criteria-item">
                            <img src="images/kelayakan.png" alt="Eligibility Icon" class="criteria-icon">
                            <h3>Kriteria Kelayakan</h3>
                            <p>Mobil rental harus berusia tidak lebih dari 10 tahun dan dalam kondisi baik tanpa
                                kerusakan besar yang tidak diperbaiki.</p>
                        </div>
                        <div class="criteria-item">
                            <img src="images/driver.png" alt="Driver Icon" class="criteria-icon">
                            <h3>Pengemudi yang Memenuhi Syarat</h3>
                            <p>Pengemudi harus memiliki SIM yang sah dan berusia antara 21-65 tahun dengan pengalaman
                                mengemudi minimal 2 tahun.</p>
                        </div>
                        <div class="criteria-item">
                            <img src="images/cakupan.png" alt="Coverage Icon" class="criteria-icon">
                            <h3>Cakupan Asuransi</h3>
                            <p>Asuransi mencakup kerusakan akibat kecelakaan, pencurian, kebakaran, serta kerusakan
                                pihak ketiga yang disebabkan oleh pengemudi.</p>
                        </div>
                        <div class="criteria-item">
                            <img src="images/dokumen.png" alt="Document Icon" class="criteria-icon">
                            <h3>Dokumen yang Diperlukan</h3>
                            <p>Formulir aplikasi yang diisi, salinan SIM dan STNK, serta bukti pembayaran premi
                                asuransi.</p>
                        </div>
                        <div class="criteria-item">
                            <img src="images/exception.png" alt="Exclusions Icon" class="criteria-icon">
                            <h3>Pengecualian</h3>
                            <p>Kerusakan akibat penggunaan mobil untuk balapan, tindakan kriminal, atau kerusakan yang
                                disengaja tidak termasuk dalam cakupan asuransi.</p>
                        </div>
                        <div class="criteria-item">
                            <img src="images/help.png" alt="Roadside Assistance Icon" class="criteria-icon">
                            <h3>Bantuan Darurat di Jalan</h3>
                            <p>Termasuk layanan derek, penggantian ban, pengisian bahan bakar, dan bantuan kunci
                                tertinggal dalam mobil.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Cara Daftar Asuransi</div>
                <div class="dropdown-content">
                    <div class="steps-container">
                        <div class="step-item">
                            <h3>1. Buka Aplikasi</h3>
                            <p>Mulai dengan membuka produk Asuransi di aplikasi.</p>
                        </div>
                        <div class="step-item">
                            <h3>2. Isi Jangka Waktu Rental Mobil Anda</h3>
                            <p>Beritahu kami berapa lama perjalanan akan Anda lakukan.</p>
                        </div>
                        <div class="step-item">
                            <h3>3. Pilih Rencana yang Anda Inginkan</h3>
                            <p>Temukan rencana asuransi yang ramah di kantong untuk mobil rental Anda.</p>
                        </div>
                        <div class="step-item">
                            <h3>4. Selesaikan Pembayaran Anda</h3>
                            <p>Pilih metode pembayaran yang Anda sukai dan ikuti petunjuk serta instruksi yang ada di
                                layar.</p>
                        </div>
                        <div class="step-item">
                            <h3>5. Dapatkan Persetujuan</h3>
                            <p>Anda akan menerima polis asuransi mobil rental dan sertifikatnya melalui email dalam
                                waktu 24 jam.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Cara Klaim Asuransi</div>
                <div class="dropdown-content">
                    <div class="claim-container">
                        <div class="claim-left">
                            <img src="images/blueCar.png" alt="Image description">
                        </div>
                        <div class="claim-right">
                            <p class="lead my-3">Jika Anda baru saja mengalami kecelakaan, pertama pastikan bahwa
                                semuanya tidak apa-apa.
                                Lalu kumpulkan data-data tentang kejadian yang baru saja terjadi, seperti tempat,
                                tanggal, waktu, dan lain-lain.
                                Setelah itu Anda bisa menghubungi kami melalui:
                            </p>
                            <ul class="lead my-3">
                                <li>1. 08xx-xxxx-xxxx</li>
                                <li>2. Aplikasi Asuransi Rental Mobil</li>
                            </ul>
                            <p class="lead my-3">
                                Utamakanlah keselamatan dalam berkendara.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <div class="dropdown-title">Frequently Asked Questions (FAQ)</div>
                <div class="dropdown-content">
                    <div class="faq-item">
                        <div class="faq-question">1. Apa yang harus saya lakukan jika mobil saya mengalami kerusakan?
                        </div>
                        <div class="faq-answer">Anda harus melaporkan klaim melalui aplikasi kami dengan melengkapi
                            formulir klaim dan mengunggah dokumen pendukung seperti foto kerusakan dan laporan polisi.
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">2. Bagaimana cara mengajukan klaim asuransi?</div>
                        <div class="faq-answer">Anda dapat mengajukan klaim melalui aplikasi kami dengan mengisi
                            formulir klaim dan melampirkan dokumen pendukung seperti foto kerusakan dan laporan polisi.
                            Tim kami akan memproses klaim Anda dalam waktu 24 jam.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">3. Berapa lama waktu yang dibutuhkan untuk mendapatkan persetujuan
                            klaim?</div>
                        <div class="faq-answer">Persetujuan klaim akan diberikan dalam waktu 24 jam setelah semua
                            dokumen lengkap diterima.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">4. Apa saja dokumen yang harus saya siapkan untuk klaim asuransi?
                        </div>
                        <div class="faq-answer">Dokumen yang diperlukan meliputi formulir klaim yang telah diisi, foto
                            kerusakan, dan laporan polisi jika ada.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">5. Apakah ada biaya tambahan untuk klaim asuransi?</div>
                        <div class="faq-answer">Tidak, seluruh proses klaim ditangani tanpa biaya tambahan. Anda hanya
                            perlu melengkapi dokumen yang diperlukan.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>

    <script>
        document.querySelectorAll('.dropdown-title').forEach(title => {
            title.addEventListener('click', () => {
                const content = title.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                title.classList.toggle('active');
            });
        });

        document.querySelectorAll('.faq-question').forEach(faqQuestion => {
            faqQuestion.addEventListener('click', () => {
                faqQuestion.parentElement.classList.toggle('active');
            });
        });

        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const durasiInput = document.getElementById('durasi');

        function calculateDuration() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const timeDifference = endDate.getTime() - startDate.getTime();
            const daysDifference = timeDifference / (1000 * 3600 * 24) + 1; // Include end date

            if (daysDifference >= 1) {
                durasiInput.value = daysDifference;
            } else {
                durasiInput.value = 0; // Invalid duration
            }
        }

        startDateInput.addEventListener('change', calculateDuration);
        endDateInput.addEventListener('change', calculateDuration);

        function validateDates() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            if (startDate && endDate && startDate > endDate) {
                alert('End Date must be equal to or after Start Date');
                document.getElementById('end_date').value = '';
            }
        }
    </script>
</body>

</html>