<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nama_produk=$_POST['nama_produk'];
    $keterangan=$_POST['keterangan'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama_produk',keterangan='$keterangan', harga='$harga',jumlah='$jumlah' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama_produk = $user_data['nama_produk'];
    $keterangan = $user_data['keterangan'];
    $harga = $user_data['harga'];
    $jumlah = $user_data['jumlah'];
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit User Data</title>
</head>

<body>
    <div class="container">
        <a href="index.php"><button class="btn btn-primary mb-4 mt-4">Home</button></a>
        
        <form name="update_user" method="post" action="edit.php">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" value=<?php echo $nama_produk;?>>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value=<?php echo $keterangan;?>>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" class="form-control" name="harga" value=<?php echo $harga;?>>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value=<?php echo $jumlah;?>>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id'];?>>
                    <button type="hidden" class="btn btn-success float-right" name="update" value="Update">Update</button>
                </div>
        </form>
    </div>
</body>

</html>