<?php
session_start();
if(isset($_COOKIE["id"])){ // jika login menggunakan cookie
    $_SESSION["login"] = true;
    $id = $_COOKIE["id"];
    $connectsql = mysqli_connect("localhost", "root", "", "wad_modul4");
    $qakun = "SELECT * FROM user WHERE id ='$id'";
    $getakun = mysqli_query($connectsql, $qakun);
    $sort = mysqli_fetch_assoc($getakun);
    $nama = $sort["nama"];
}elseif(isset($_SESSION["sementara"])){ // jika login biasa
    $id = $_SESSION["sementara"];
    $connectsql = mysqli_connect("localhost", "root", "", "wad_modul4");
    $qakun = "SELECT * FROM user WHERE id ='$id'";
    $getakun = mysqli_query($connectsql, $qakun);
    $sort = mysqli_fetch_assoc($getakun);
    $nama = $sort["nama"];
}
?>

<?php
$listbooking = "SELECT * FROM bookings WHERE user_id ='$id'";
$query = mysqli_query($connectsql, $listbooking);
$rowlist = mysqli_fetch_all($query);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Bookings</title>
    </head>
    <body class="bg-warning bg-opacity-10">

        <!-- navbar -->
        <div class="container-fluid bg-primary bg-opacity-50 sticky-top">
            <div class="container p-2 navbar navbar-collapse" >
                <a class="link-dark" href="index.php" style="text-decoration: none;"><b>EAD Travel</b></a>
                <div class="d-flex align-items-center">
                    <a href="bookings.php"><img src="img/cart.png" alt="cart" height="20px"></a>
                    <div type="none" class="m-0">
                        <div class="nav-item dropdown">
                            <a class="nav-link link-dark dropdown-toggle" href="#" id="datadrop" data-bs-toggle="dropdown" aria-expanded="false"><?= $nama?></a>
                            <ul class="dropdown-menu" aria-labelledby="datadrop">
                                <li><a class="dropdown-item" href="profile.php?id=<?= $id;?>">Pengaturan Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="alert alert-success alert-dismissible fade show" id="hapusdata">
            Berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- script hide alert -->
        <script>
            var hapustiket = document.getElementById('hapusdata');
            hapustiket.style.display = 'none'
        </script>
        
        <!-- php display alert -->
        <?php
        if ( isset($_SESSION["terhapus"])){
            echo "
            <script>
                hapustiket.style.display = 'block'
            </script>
            ";
            unset($_SESSION["terhapus"]);
        } else{
            echo "
            <script>
                hapustiket.style.display = 'none'
            </script>
            ";
        }
        ?>

        <!-- Table -->
        <div class="container rounded mt-5 bg-white p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Tempat</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tinggal Perjalanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-light align-content-center">
                    <?php
                        $number = 1;
                        foreach ($rowlist as $row):?>
                    <tr class="mb-0">
                        <th><?= $number?></th>
                        <td><?= $row[2]?></td>
                        <td><?= $row[3]?></td>
                        <td><?= $row[5]?></td>
                        <td>Rp. <?= number_format($row[4])?></td>
                        <td>
                            <a href="deletebookings.php?id=<?= $row['0']?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                         $number++;
                        endforeach;
                    ?>
                    <tr>
                        <th colspan="4">Total</th>
                        <th>
                            <?php
                                $total = 0;
                                foreach ($rowlist as $row){
                                    $total += $row[4];
                                }
                                echo "Rp. ".number_format($total);
                            ?>
                        </th>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="container-fluid bg-primary bg-opacity-50 text-center fixed-bottom">
            <p class="m-2">
                2021 Copyright
                <a href="#createdby" data-bs-toggle="modal">AULIA_1202194035</a>
            </p>
        </div>

        <!-- modal Footer -->
        <div class="modal fade" id="createdby" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createdbysaha" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createdbysaha">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>NAMA</td>
                            <td>&nbsp:&nbsp</td>
                            <td>Aulia Basyirah</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>&nbsp:&nbsp</td>
                            <td>1202194035</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>