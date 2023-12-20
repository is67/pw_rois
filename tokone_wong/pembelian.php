<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_barang = $_POST['id_barang'];
    $quantitas = $_POST['quantitas'];
    
    // Menambah tanggal pembelian
    $tanggal_pembelian = date('Y-m-d');

    // Mendapatkan harga barang dari tabel "barang"
    $sql_barang = "SELECT harga FROM barangs WHERE id_barang = $id_barang";
    $result_barang = $mysqli->query($sql_barang);

    if ($result_barang->num_rows > 0) {
        $row_barang = $result_barang->fetch_assoc();
        $harga_barang = $row_barang['harga'];

        // Menghitung total pembelian
        $total_harga = $quantitas * $harga_barang;

        // Menyimpan data pembelian ke tabel pembelian (contoh tabel)
        $sql_pembelian = "INSERT INTO pembelians (id_pelanggan, id_barang, quantitas, total_harga, tanggal_pembelian) 
                          VALUES ($id_pelanggan, $id_barang, $quantitas, $total_harga, '$tanggal_pembelian')";

        if ($mysqli->query($sql_pembelian) === TRUE) {
            echo "Pembelian berhasil ditambahkan. Total Pembelian: $" . number_format($total_harga, 2);
            echo "klik untuk <a href='hasil_pembelian.php'>Kembali ke Pembelian</a>";
        } else {
            echo "Error: " . $sql_pembelian . "<br>" . $mysqli->error;
        }
    } else {
        echo "Barang tidak ditemukan.";
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2>Pembelian Barang</h2>

    <form action="pembelian.php" method="POST">
        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan</label>
            <input type="number" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
        </div>
        <div class="form-group">
            <label for="id_barang">ID Barang</label>
            <input type="number" class="form-control" id="id_barang" name="id_barang" required>
        </div>
        <div class="form-group">
            <label for="quantitas">Quantitas</label>
            <input type="number" class="form-control" id="quantitas" name="quantitas" required>
        </div>
        <button type="submit" class="btn btn-primary">Proses Pembelian</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
