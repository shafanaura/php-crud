<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Add Users</title>
</head>

<body>
    <div class="container">
        <a href="index.php"><button class="btn btn-primary mb-4 mt-4">Home</button></a>

        <form action="add.php" method="post" name="form1">
            <table width="25%">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Keterangan</label>
                <input type="text-area" class="form-control" name="keterangan">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Harga</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah</label>
                <input type="number" class="form-control" name="jumlah">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right" name="Submit" value="Add">Add</button>
            </div>
            </table>
        </form>
    </div>
    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_produk = $_POST['nama_produk'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO produk(nama_produk,keterangan,harga,jumlah) VALUES('$nama_produk','$keterangan','$harga','$jumlah')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>

</html>