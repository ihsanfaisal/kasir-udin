<?php

// 1. buka koneksi ke database
$host = 'localhost';
$db = 'dbkasir100';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);

    if ($pdo) {
        // echo "Berhasil koneksi ke database $db!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

// 2. buat sql ambil data
$sql = "SELECT * FROM produk";

// 3. execute sql
$statement = $pdo->query($sql);

$daftarproduk = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="p-3">
    <h1>Daftar Produk</h1>

    <a href="produk-form-tambah.php">Tambah Produk</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $nomor = 1;
            foreach ($daftarproduk as $produk) {
            ?>

                <tr>
                    <th scope="row"><?php echo $nomor ?></th>
                    <td><?php echo $produk['namaproduk'] ?></td>
                    <td><?php echo $produk['harga'] ?></td>
                    <td><?php echo $produk['stok'] ?></td>
                    <td>
                        <a href="produk-form-edit.php?produkid=<?php echo $produk['produkid'] ?>">ubah</a>
                        <a class="mx-2" href="produk-hapus.php?produkid=<?php echo $produk['produkid'] ?>">hapus</a>
                    </td>
                </tr>

            <?php
                $nomor++;
            }
            ?>
        </tbody>
    </table>

    <a href="menu.php">Kembali ke Menu</a>
</body>

</html>