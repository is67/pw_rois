<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko sembarang</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Program Toko sembarang/h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="barang.php">Daftar Barang</a></li>
                <li class="list-group-item"><a href="pelanggan.php">Daftar Pelanggan</a></li>
                <li class="list-group-item"><a href="hasil_pembelian.php">Daftar Pembelian</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <a href="logout.php" class="btn btn-danger">LOGOUT</a>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js script links here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
