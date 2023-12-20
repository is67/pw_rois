<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id = $_POST['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $nomor_telepon = $_POST['nomor_telepon'];

    // Validate inputs
    if (empty($nama_pelanggan) || empty($alamat_pelanggan) || !is_numeric($nomor_telepon)) {
        echo "Invalid input data.";
        exit;
    }

    // Update query
    $sql = "UPDATE pelanggans SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', nomor_telepon=$nomor_telepon WHERE id_pelanggan=$id";

    // Execute the query
    if ($mysqli->query($sql) === TRUE) {
        echo "Update Berhasil. , klik  <a href='pelanggan.php'>Kembali ke Daftar Pelanggan</a> ";
    } else {
        echo "Update Error: " . $mysqli->error;
    }
} else {
    echo "Invalid request.";
}

$mysqli->close();

?>
