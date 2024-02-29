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

// 2. buat variabel untuk menyimpan parameter url
$produkid = $_GET['produkid'];

// 3. buat sql untuk mengambil data produk
$sql = "SELECT * FROM produk WHERE produkid = ?";

// 4. execute sql
$statement = $pdo->prepare($sql);

try {
    $statement->execute([
        $produkid,
    ]);

    $produk = $statement->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

// 5. output produk dalam bentuk json
header('Content-Type: application/json; charset=utf-8');
echo json_encode($produk);
