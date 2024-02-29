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

// 2. simpan data form ke variabel
$namapelanggan = $_GET['namapelanggan'];
$alamat = $_GET['alamat'];
$nomortelepon = $_GET['nomortelepon'];
$pelangganid = $_GET['pelangganid'];

// 3. buat sql simpan data
$sql = "UPDATE pelanggan SET namapelanggan=?, alamat=?, nomortelepon=? WHERE pelangganid=?";

// 4. execute sql
$statement = $pdo->prepare($sql);

try {
    $statement->execute([
        $namapelanggan,
        $alamat,
        $nomortelepon,
        $pelangganid,
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Berhasil mengubah data pelanggan</h1>

    <a href="pelanggan-daftar.php">Lihat Daftar Pelanggan</a>
</body>
</html>