<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id DESC");
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Homepage</title>
</head>

<body>
    <div class="container">
        <a href="add.php"><button class="btn btn-primary float-right mb-4 mt-4">Add New User</button></a>
        <table width='80%' class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Produk</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  
        while($user_data = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$user_data['nama_produk']."</td>";
            echo "<td>".$user_data['keterangan']."</td>";
            echo "<td>".$user_data['harga']."</td>";    
            echo "<td>".$user_data['jumlah']."</td>";    
            echo "<td>
                    <a href='edit.php?id=$user_data[id]'>
                        <button class='btn btn-warning'>Edit</button>
                    </a> | 
                    <a href='delete.php?id=$user_data[id]'>
                        <button class='btn btn-danger'>Hapus</button>
                    </a>
                </td>
                </tr>";        
        }
        ?>
            </tbody>
        </table>
    </div>
</body>

</html>