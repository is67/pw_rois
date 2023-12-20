<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pembelian</title>
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
    <h2>Update Pembelian</h2>

    <?php
    include "config.php";
    ?>

    <?php
    // Mendapatkan id_pembelian dari URL
    $pembelian_id = $_GET['id'];

    // Mengambil data pembelian dari tabel pembelian (contoh tabel)
    $sql_select_pembelian = "SELECT * FROM pembelians WHERE pembelian_id = $pembelian_id";
    $result_select_pembelian = $mysqli->query($sql_select_pembelian);

    if ($result_select_pembelian->num_rows > 0) {
        $row_select_pembelian = $result_select_pembelian->fetch_assoc();
        ?>

        <form action="update_process_pembelian.php" method="POST">
            <div class="form-group">
                <label for="id_pelanggan">ID Pelanggan</label>
                <input type="number" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $row_select_pembelian['id_pelanggan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input type="number" class="form-control" id="id_barang" name="id_barang" value="<?php echo $row_select_pembelian['id_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantitas">Quantitas</label>
                <input type="number" class="form-control" id="quantitas" name="quantitas" value="<?php echo $row_select_pembelian['quantitas']; ?>" required>
            </div>
            <input type="hidden" name="pembelian_id" value="<?php echo $row_select_pembelian['pembelian_id']; ?>">
            <button type="submit" class="btn btn-primary">Update Pembelian</button>
        </form>

        <?php
    } else {
        echo "<p>Data pembelian tidak ditemukan.</p>";
    }
    ?>
</div>

<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
