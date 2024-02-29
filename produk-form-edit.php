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

// 2. buat variabel untuk menyimpan parameter id produk dari URL
$produkid = $_GET['produkid'];

// 3. buat sql ambil data
$sql = "SELECT * FROM produk WHERE produkid = ?";

// 4. execute sql
$statement = $pdo->prepare($sql);

try {
    $statement->execute([
        $produkid,
    ]);

    $produk = $statement->fetch();

    // var_dump($produk);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// 5. tampilkan data di form edit

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="p-4">
    <h1>Form Edit Produk</h1>

    <form action="produk-edit.php" class="mb-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input name="namaproduk" value="<?php echo $produk['namaproduk'] ?>" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
            <input name="harga" value="<?php echo $produk['harga'] ?>" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stok</label>
            <input name="stok" value="<?php echo $produk['stok'] ?>" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <input type="hidden" name="produkid" value="<?php echo $produk['produkid'] ?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="produk-daftar.php">Kembali ke Daftar Produk</a>
</body>

</html>