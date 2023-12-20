<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Pelanggan</title>
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
    <a href="index.php" class="btn btn-primary">Home</a>
    <a href="barang.php" class="btn btn-primary">Barang</a>
    <a href="hasil_pembelian.php" class="btn btn-primary">Pembelian</a>
    <h2>Data Pelanggan</h2>

    <?php
    include 'config.php';

    $sql = "SELECT * FROM pelanggans";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>ID</th><th>Nama Pelanggan</th><th>Alamat Pelanggan</th><th>Nomor Telepon</th><th>Action</th></tr>";
        echo "</thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_pelanggan"] . "</td>";
            echo "<td>" . $row["nama_pelanggan"] . "</td>";
            echo "<td>" . $row["alamat_pelanggan"] . "</td>";
            echo "<td>" . $row["nomor_telepon"] . "</td>";
            echo "<td><a href='update_plgn.php?id=" . $row["id_pelanggan"] . "' class='btn btn-warning'>Edit</a> | <a href='delete_plgn.php?id=" . $row["id_pelanggan"] . "' class='btn btn-danger'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Tidak ada data pelanggan.";
    }
    $mysqli->close();
    ?>

    <a href="create_plgn.php" class="btn btn-success">Tambah Pelanggan</a>
</div>

<!-- Add Bootstrap JS and Popper.js script links here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
