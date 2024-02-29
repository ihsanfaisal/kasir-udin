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

// 2. buat sql ambil data penjualan dan pelanggan
$sql1 = "SELECT * FROM penjualan
            LEFT JOIN pelanggan ON penjualan.pelangganid = pelanggan.pelangganid";

// 3. execute sql yg no 1
$statement = $pdo->query($sql1);
$daftarpenjualan = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="p-3">
    <h1>Daftar Penjualan</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Total</th>
                <th scope="col">Daftar Produk</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($daftarpenjualan as $key => $value) {
                // buat sql ambil data detail penjualan dan produk
                $sql2 = "SELECT * FROM detailpenjualan
                            LEFT JOIN produk ON detailpenjualan.produkid = produk.produkid
                            WHERE detailpenjualan.penjualanid = ?";

                // execute sql data detail penjualan dan produk
                $statement = $pdo->prepare($sql2);

                try {
                    $statement->execute([
                        $value['penjualanid'],
                    ]);

                    $daftardetail = $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $value['namapelanggan'] ?></td>
                    <td><?php echo $value['tanggalpenjualan'] ?></td>
                    <td><?php echo $value['totalharga'] ?></td>
                    <td>
                        <ul>
                            <?php
                            foreach ($daftardetail as $k => $v) {
                            ?>
                                <li>
                                    <?php echo $v['namaproduk'] ?>,
                                    <?php echo $v['harga'] ?>,
                                    <?php echo $v['jumlahproduk'] ?> buah
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
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