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

// 2. buat variabel untuk menyimpan parameter form
// var_dump($_GET);
$pelangganid = $_GET['pelangganid'];
$tanggalpenjualan = $_GET['tanggalpenjualan'];
$totalharga = $_GET['totalharga'];

$produkid1 = $_GET['produkid1'];
$jumlahproduk1 = $_GET['jumlahproduk1'];
$subtotal1 = $_GET['subtotal1'];

$produkid2 = $_GET['produkid2'];
$jumlahproduk2 = $_GET['jumlahproduk2'];
$subtotal2 = $_GET['subtotal2'];

$produkid3 = $_GET['produkid3'];
$jumlahproduk3 = $_GET['jumlahproduk3'];
$subtotal3 = $_GET['subtotal3'];

// 3. buat sql input data penjualan
$sql1 = "INSERT INTO penjualan (tanggalpenjualan, totalharga, pelangganid) VALUES (?, ?, ?)";

// 4. execute sql data penjualan
$statement = $pdo->prepare($sql1);

$statement->execute([
    $tanggalpenjualan,
    $totalharga,
    $pelangganid
]);

$penjualanid = $pdo->lastInsertId();

// 5. buat sql untuk input data detail penjualan
$sql2 = "INSERT INTO detailpenjualan (penjualanid, produkid, jumlahproduk, subtotal)
            VALUES (?, ?, ?, ?)";

// 6. execute sql data detail penjualan
$statement = $pdo->prepare($sql2);

try {
    if ($jumlahproduk1 > 0) {
        $statement->execute([
            $penjualanid,
            $produkid1,
            $jumlahproduk1,
            $subtotal1
        ]);
    }

    if ($jumlahproduk2 > 0) {
        $statement->execute([
            $penjualanid,
            $produkid2,
            $jumlahproduk2,
            $subtotal2
        ]);
    }

    if ($jumlahproduk3 > 0) {
        $statement->execute([
            $penjualanid,
            $produkid3,
            $jumlahproduk3,
            $subtotal3
        ]);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil Menambah Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Berhasil menambah penjualan</h1>

    <a href="penjualan-daftar.php">Lihat Daftar Penjualan</a>
</body>
</html>