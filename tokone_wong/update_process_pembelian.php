<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pembelian_id = $_POST['pembelian_id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_barang = $_POST['id_barang'];
    $quantitas = $_POST['quantitas'];

    // Menambah tanggal pembelian
    $tanggal_pembelian = date('Y-m-d');

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt_barang = $mysqli->prepare("SELECT harga FROM barangs WHERE id_barang = ?");
    $stmt_barang->bind_param("i", $id_barang);
    $stmt_barang->execute();
    $stmt_barang->store_result();

    if ($stmt_barang->num_rows > 0) {
        $stmt_barang->bind_result($harga_barang);
        $stmt_barang->fetch();

        // Menghitung total pembelian
        $total_harga = $quantitas * $harga_barang;

        // Menggunakan prepared statement untuk update data pembelian
        $stmt_update_pembelian = $mysqli->prepare("UPDATE pembelians 
                                                  SET id_pelanggan = ?, 
                                                      id_barang = ?, 
                                                      quantitas = ?, 
                                                      total_harga = ?, 
                                                      tanggal_pembelian = ?
                                                  WHERE pembelian_id = ?");
        $stmt_update_pembelian->bind_param("iidssi", $id_pelanggan, $id_barang, $quantitas, $total_harga, $tanggal_pembelian, $pembelian_id);
        
        if ($stmt_update_pembelian->execute()) {
            echo "Pembelian berhasil diupdate. Total harga: $" . number_format($total_harga, 2);
            echo "klik untuk <a href='hasil_pembelian.php'>Kembali ke Daftar Pembelian</a>";
        } else {
            echo "Error: " . $stmt_update_pembelian->error;
        }

        $stmt_update_pembelian->close();
    } else {
        echo "Barang tidak ditemukan.";
    }

    $stmt_barang->close();
    $mysqli->close();
}
?>
