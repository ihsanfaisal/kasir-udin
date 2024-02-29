<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="p-4">
    <h1>Form Tambah Produk</h1>

    <form action="produk-tambah.php" class="mb-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input name="namaproduk" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
            <input name="harga" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stok</label>
            <input name="stok" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="produk-daftar.php">Kembali ke Daftar Produk</a>
</body>

</html>