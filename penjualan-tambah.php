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

// 2. buat sql untuk mengambil data pelanggan
$sql = "SELECT * FROM pelanggan";

// 3. execute sql pelanggan
$statement = $pdo->query($sql);
$daftarpelanggan = $statement->fetchAll(PDO::FETCH_ASSOC);

// 4. tampilkan data pelanggan di form select pelanggan

// 5. buat sql untuk mengambil data produk
$sql = "SELECT * FROM produk";

// 6. execute sql produk
$statement = $pdo->query($sql);
$daftarproduk = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="m-4">
    <h1>Tambah Penjualan</h1>

    <form action="penjualan-simpan.php">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Pelanggan</label>
            <div class="col-sm-10">
                <select name="pelangganid" id="" class="form-select">
                    <?php
                    foreach ($daftarpelanggan as $key => $value) {
                    ?>
                        <option value="<?php echo $value['pelangganid'] ?>"><?php echo $value['namapelanggan'] ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input name="tanggalpenjualan" type="text" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Total Harga</label>
            <div class="col-sm-10">
                <input name="totalharga" id="totalharga" type="text" class="form-control" readonly>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select name="produkid1" id="produkid1" class="form-select">
                            <option value="">pilih produk</option>
                            <?php

                            foreach ($daftarproduk as $key => $value) {
                            ?>
                                <option value="<?php echo $value['produkid'] ?>"><?php echo $value['namaproduk'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </td>
                    <td>
                        <p id="hargaproduk1"></p>
                    </td>
                    <td>
                        <input type="number" name="jumlahproduk1" id="jumlahproduk1" class="form-control" min="1">
                    </td>
                    <td>
                        <input type="number" name="subtotal1" id="subtotal1" class="form-control" readonly>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select name="produkid2" id="produkid2" class="form-select">
                            <option value="">pilih produk</option>
                            <?php

                            foreach ($daftarproduk as $key => $value) {
                            ?>
                                <option value="<?php echo $value['produkid'] ?>"><?php echo $value['namaproduk'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </td>
                    <td>
                        <p id="hargaproduk2"></p>
                    </td>
                    <td>
                        <input type="number" name="jumlahproduk2" id="jumlahproduk2" class="form-control" min="1">
                    </td>
                    <td>
                        <input type="number" name="subtotal2" id="subtotal2" class="form-control" readonly>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <select name="produkid3" id="produkid3" class="form-select">
                            <option value="">pilih produk</option>
                            <?php

                            foreach ($daftarproduk as $key => $value) {
                            ?>
                                <option value="<?php echo $value['produkid'] ?>"><?php echo $value['namaproduk'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </td>
                    <td>
                        <p id="hargaproduk3"></p>
                    </td>
                    <td>
                        <input type="number" name="jumlahproduk3" id="jumlahproduk3" class="form-control" min="1">
                    </td>
                    <td>
                        <input type="number" name="subtotal3" id="subtotal3" class="form-control" readonly>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="menu.php">Kembali ke Menu</a>

    <script>
        $(document).ready(function() {

            function totalHarga() {
                let total = 0;

                total = (parseInt($('#subtotal1').val()) || 0) +
                    (parseInt($('#subtotal2').val()) || 0) +
                    (parseInt($('#subtotal3').val()) || 0);

                $('#totalharga').val(parseInt(total));
            }

            $('#produkid1').change(function() {
                $.get('produk-api.php', {
                    produkid: $(this).val()
                }).done(function(produk) {
                    $('#hargaproduk1').text(produk.harga);
                    let harga = $('#hargaproduk1').text();
                    $('#subtotal1').val(harga * $('#jumlahproduk1').val());

                    totalHarga();
                })
            })

            $('#produkid2').change(function() {
                $.get('produk-api.php', {
                    produkid: $(this).val()
                }).done(function(produk) {
                    $('#hargaproduk2').text(produk.harga);
                    let harga = $('#hargaproduk2').text();
                    $('#subtotal2').val(harga * $('#jumlahproduk2').val());

                    totalHarga();
                })
            })

            $('#produkid3').change(function() {
                $.get('produk-api.php', {
                    produkid: $(this).val()
                }).done(function(produk) {
                    $('#hargaproduk3').text(produk.harga);
                    let harga = $('#hargaproduk3').text();
                    $('#subtotal3').val(harga * $('#jumlahproduk3').val());

                    totalHarga();
                })
            })

            $('#jumlahproduk1').change(function() {
                let harga = $('#hargaproduk1').text();
                $('#subtotal1').val(harga * $(this).val());

                totalHarga();
            })

            $('#jumlahproduk2').change(function() {
                let harga = $('#hargaproduk2').text();
                $('#subtotal2').val(harga * $(this).val());

                totalHarga();
            })

            $('#jumlahproduk3').change(function() {
                let harga = $('#hargaproduk3').text();
                $('#subtotal3').val(harga * $(this).val());

                totalHarga();
            })

        })
    </script>

</body>

</html>