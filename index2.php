<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'voltage');
if (!$koneksi) {
    die("Tidak Terhubung: " . mysqli_connect_error());
}

// Mengambil nilai potensial dari parameter URL
if (isset($_GET['potensial'])) {
    $dataPotensial = $_GET['potensial'];

    // Periksa apakah dataPotensial ada dalam tabel
    $checkExistingData = mysqli_query($koneksi, "SELECT * FROM voltage");
    $rowCount = mysqli_num_rows($checkExistingData);

    if ($rowCount > 0) {
        // Jika data sudah ada, lakukan UPDATE
        $sql = "UPDATE voltage SET potensial = $dataPotensial";
    } else {
        // Jika data belum ada, lakukan INSERT
        $sql = "INSERT INTO voltage (potensial) VALUES ($dataPotensial)";
    }

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil diubah/simpan";
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Parameter potensial tidak ditemukan pada URL";
}

mysqli_close($koneksi);
?>