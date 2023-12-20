<?php
include 'config.php';

$id = $_GET['id']; // ID dari buku yang akan dihapus
$sql = "DELETE FROM barangs WHERE id_barang=$id";
if ($mysqli->query($sql) === TRUE) {
    header("Location: barang.php"); // Redirect ke tampilan Read setelah berhasil hapus data
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?><?php
include 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID
if ($id <= 0) {
    echo "ID tidak valid";
    exit;
}

$sql = "DELETE FROM barangs WHERE id_barang=?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: barang.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
