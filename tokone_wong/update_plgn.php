<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pelanggan</title>
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
    <?php
    include 'config.php';

    $id = $_GET['id']; // ID dari buku yang akan diupdate

    $sql = "SELECT * FROM pelanggans WHERE id_pelanggan=$id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <form action="update_process_plgn.php" method="POST">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat_pelanggan">Alamat Pelanggan</label>
                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" value="<?php echo $row['alamat_pelanggan']; ?>">
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id_pelanggan']; ?>">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <?php
    } else {
        echo "<p>Data tidak ditemukan.</p>";
    }

    $mysqli->close();
    ?>
</div>

<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
