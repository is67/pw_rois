<?php
include 'config.php';

$id = $_GET['id']; // ID dari buku yang akan dihapus
$sql = "DELETE FROM pembelians WHERE pembelian_id=$id";
if ($mysqli->query($sql) === TRUE) {
    header("Location: hasil_pembelian.php"); // Redirect ke tampilan Read setelah berhasil hapus data
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>