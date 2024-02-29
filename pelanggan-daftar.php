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
$sql = "SELECT * FROM pelanggan";

// 3. execute sql
$statement = $pdo->query($sql);

$daftarpelanggan = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($daftarpelanggan);

// 4. tampilkan data di tabel html

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="p-3">
    <h1>Daftar Pelanggan</h1>

    <a href="pelanggan-form-tambah.php">Tambah Pelanggan</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $nomor = 1;
            foreach ($daftarpelanggan as $pelanggan) {
            ?>

                <tr>
                    <th scope="row"><?php echo $nomor ?></th>
                    <td><?php echo $pelanggan['namapelanggan'] ?></td>
                    <td><?php echo $pelanggan['alamat'] ?></td>
                    <td><?php echo $pelanggan['nomortelepon'] ?></td>
                    <td>
                        <a href="pelanggan-form-edit.php?pelangganid=<?php echo $pelanggan['pelangganid'] ?>">ubah</a>
                        <a class="mx-2" href="pelanggan-hapus.php?pelangganid=<?php echo $pelanggan['pelangganid'] ?>">hapus</a>
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