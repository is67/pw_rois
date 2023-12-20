<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Update query
    $sql = "UPDATE barangs SET nama_barang='$nama_barang', harga=$harga, stok=$stok WHERE id_barang=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "update berhasil, klik  <a href='barang.php'>Kembali ke Daftar Barang</a> ";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
} else {
    echo "Invalid request.";
}

$mysqli->close();

?>
