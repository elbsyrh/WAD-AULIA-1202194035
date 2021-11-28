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
};
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>EAD Travel</title>
    </head>
    <body class="bg-success bg-opacity-10">

        <!-- navbar -->
        <div class="container-fluid bg-dark bg-opacity-50 sticky-top">
            <div class="container p-2 navbar navbar-collapse" >
                <a class="link-dark" href="index.php" style="text-decoration: none;"><b>EAD Travel</b></a>
                
                <?php
                    // jika sudah login
                    if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
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
                <?php
                    }
                    
                    // jika belum login
                    else { ?>
                        <div>
                            <a class="link-dark me-3" href="register.php" style="text-decoration: none;">Register</a>
                            <a class="link-dark" href="login.php" style="text-decoration: none;">Login</a>
                        </div>
                <?php }
                ?>

            </div> 
        </div>
        
        <!-- alert berhasil login -->
        <div class="alert alert-success alert-dismissible fade show" id="alertberhasil">
            Berhasil Login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- script hide alert -->
        <script>
            var berhasil = document.getElementById('alertberhasil');
            berhasil.style.display = 'none'
        </script>
        
        <!-- php display alert -->
        <?php
        if ( isset($_SESSION["newlogin"])){
            echo "
            <script>
                berhasil.style.display = 'block'
            </script>
            ";
            unset($_SESSION["newlogin"]);
        } else{
            echo "
            <script>
                berhasil.style.display = 'none'
            </script>
            ";
        }
        ?>

        <!-- alert berhasil pesan tiket -->
        <div class="alert alert-success alert-dismissible fade show" id="alertpesantiket">
            Berhasil memesan tiket
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- script hide alert  tiket-->
        <script>
            var hasiltiket = document.getElementById('alertpesantiket');
            hasiltiket.style.display = 'none'
        </script>
        
        <!-- Banner -->
        <div class="container p-xl-4 mt-2 mb-2 text-center bg-primary bg-opacity-25">
            <h1>
                <b>EAD Travel</b>
            </h1>
        </div>

        <!-- Card wisata -->
        <div class="container d-flex justify-content-around">
            <!-- Labuan Bajo -->
            <div class="card" style="width: 22rem;">
                <img src="img/bajo.jpg" class="card-img-top" alt="labuan bajo">
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title">Labuan Bajo, Nusa Tenggara Barat</h5>
                    <p class="card-text">Destinasi ini menyimpan keindahan alam yang menakjubkan dan hewan purba yang mendunia. Mulai dari hewan endemik komodo di Taman Nasional Komodo, deretan pulau eksotis, keragaman hayati bawah laut, hingga pantai indah.</p>
                    <h5 class="card-text">Rp. 3.000.000</h5>
                    <div class="text-center">
                        <?php
                            // jika sudah login
                            if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikjadwal1" style="width: 300px">Pesan Tiket</button>
                        <?php
                            }
                            
                            // jika belum login
                            else { ?>
                                <a href="login.php" class="btn btn-primary" style="width: 300px">Pesan Tiket</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Rinjani -->
            <div class="card" style="width: 22rem;">
                <img src="img/rinjani.jpg" class="card-img-top" alt="bromo">
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title">Rinjani, Lombok</h5>
                    <p class="card-text">Pesona yang dimiliki oleh Gunung Rinjani nyaris sempurna sehingga tidak diragukan lagi jika Rinjani menjadi daya tarik yang mampu memikat minat para wisatawan mancanegara maupun nusantara untuk mendakinya.</p>
                    <h5 class="card-text">Rp. 2.000.000</h5>
                    <div class="text-center">
                        <?php
                            // jika sudah login
                            if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikjadwal2" style="width: 300px">Pesan Tiket</button>
                        <?php
                            }
                            
                            // jika belum login
                            else { ?>
                                <a href="login.php" class="btn btn-primary" style="width: 300px">Pesan Tiket</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Pink Beach -->
            <div class="card" style="width: 22rem;">
                <img src="img/pink.jpg" class="card-img-top" alt="bali">
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title">Pink Beach, Lombok</h5>
                    <p class="card-text">Pantai Tangsi atau Pantai Pink memiliki hamparan pasir putih lembut yang berwarna pink. Warnanya yang pink diakibatkan pecahan terumbu karang yang berwarna merah bercampur dengan pasir yang berwarna putih.</p>
                    <h5 class="card-text">Rp. 1.500.000</h5>
                    <div class="text-center">
                        <?php
                            // jika sudah login
                            if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikjadwal3" style="width: 300px">Pesan Tiket</button>
                        <?php
                            }
                            
                            // jika belum login
                            else { ?>
                                <a href="login.php" class="btn btn-primary" style="width: 300px">Pesan Tiket</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Bajo -->
        <div class="modal fade" id="tarikjadwal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitjadwal1" class="btn btn-primary">tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Rinjani -->
        <div class="modal fade" id="tarikjadwal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitjadwal2" class="btn btn-primary">tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Pink Beach -->
        <div class="modal fade" id="tarikjadwal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitjadwal3" class="btn btn-primary">tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="container-fluid bg-primary bg-opacity-50 text-center fixed-bottom">
            <p class="m-2">
                2021 Copyright
                <!-- php buat udah login atau belum -->
                <?php
                    if(isset($_COOKIE["id"]) or isset($_SESSION["sementara"])){ ?>
                    <a href="#createdby" data-bs-toggle="modal">AULIA_1202194035</a>
                <?php
                    }else{ ?>
                    <a href="#">AULIA_1202194035</a>
                <?php
                    }
                ?>
                
            </p>
        </div>

        <!-- modal Footer -->
        <div class="modal fade" id="createdby" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createdby" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createdby">Created By</h5>
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

<?php
if (isset($_POST["submitjadwal1"])):
    $tanggal = $_POST["tanggal"];
    $harga = 7000000;
    $tempat = "Labuan Bajo";
    $lokasi = "Nusa Tenggara Barat";
elseif (isset($_POST["submitjadwal2"])):
    $tanggal = $_POST["tanggal"];
    $harga = 2000000;
    $tempat = "Rinjani";
    $lokasi = "Lombok";
elseif (isset($_POST["submitjadwal3"])):
    $tanggal = $_POST["tanggal"];
    $harga = 5000000;
    $tempat = "Pink Beach";
    $lokasi = "Lombok";
endif;

$bookingquery = "INSERT INTO bookings VALUES ('', '$id', '$tempat', '$lokasi', $harga, '$tanggal')";
mysqli_query($connectsql, $bookingquery);

if (mysqli_affected_rows($connectsql) > 0){
    echo"
    <script>
            hasiltiket.style.display = 'block'
    </script>
    ";
}
?>