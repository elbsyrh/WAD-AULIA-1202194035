<?php
session_start();
$id = $_GET["id"];
$connectsql = mysqli_connect("localhost", "root", "", "wad_modul4");
$qakun = "SELECT * FROM user WHERE id ='$id'";
$getakun = mysqli_query($connectsql, $qakun);
$sort = mysqli_fetch_assoc($getakun);
$nama = $sort["nama"];
$email = $sort["email"];
$nohp = $sort["no_hp"];
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Profile</title>
    </head>
    <body class="bg-warning bg-opacity-10">

        <!-- Navbar -->
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

        <!-- alert berhasil pesan update -->
        <div class="alert alert-success alert-dismissible fade show" id="alertupdate">
            Berhasil update profile
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- script hide alert update-->
        <script>
            var updateprofile = document.getElementById('alertupdate');
            updateprofile.style.display = 'none'
        </script>

        <?php
        if ( isset($_SESSION["updatealert"])){
            echo "
            <script>
                updateprofile.style.display = 'block'
            </script>
            ";
            session_destroy();
        }
        ?>

        <!-- Alert jika gagal update -->
        <div class="alert alert-danger alert-dismissible fade show" id="gagaledit">
            Ada Kesalahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            var salah = document.getElementById('gagaledit');
            salah.style.display = 'none'
        </script>

        <!-- Form update -->
        <div class="mt-5 container bg-white rounded-1 shadow">
            <h2 class="text-center p-3">Profile</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="container d-flex align-items-center mb-3">
                    <label class="mb-2 col-2" for="email">email</label>
                    <input class="form-control" type="text" name="email" id="email" readonly value="<?= $email;?>" placeholder="Masukkan nama lengkap">
                </div>
                <div class="container d-flex align-items-center mb-3">
                    <label class="mb-2 col-2" for="nama">Nama</label>
                    <input class="form-control" type="text" name="nama" id="nama" required value="<?= $nama;?>" placeholder="Masukkan nama lengkap">
                </div>
                <div class="container d-flex align-items-center mb-3">
                    <label class="mb-2 col-2" for="nohp">Nomor Handphone</label>
                    <input class="form-control" type="text" name="nohp" id="nohp" required value="<?= $nohp;?>" placeholder="Masukkan nomor handphone">
                </div>
                <hr>
                <div class="container d-flex align-items-center mb-3">
                    <label class="mb-2 col-2" for="pass">Kata Sandi</label>
                    <input class="form-control" type="password" name="pass" id="pass" required placeholder="Kata Sandi">
                </div>
                <div class="container d-flex align-items-center mb-3">
                    <label class="mb-2 col-2" for="repass">Konfirmasi Kata Sandi</label>
                    <input class="form-control" type="password" name="repass" id="repass" required placeholder="Konfirmasi Kata Sandi">
                </div>
                <div class="container d-flex align-items-center mb-3">
                    <label class="mb-2 col-2" for="theme">Warna Navbar</label>
                    <select class="form-select" name="theme" id="theme">
                        <option selected="selected" value="ocean">Blue Ocean</option>
                        <option value="boba">Dark Boba</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center pb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="ms-2 btn btn-warning">Cancel</a>
                    
                </div>
            </form>
        </div>

        <div class="container-fluid bg-primary bg-opacity-50 text-center fixed-bottom">
            <p class="m-2">
                2021 Copyright
                <a href="#createdby" data-bs-toggle="modal">Aulia_1202194035</a>
            </p>
        </div>

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

<?php
if(isset($_POST["theme"])){
    $namecookie = "theme";
    $valuecookie = "boba";
    if($_POST["theme"] == "Dark Boba"){
        setcookie($namecookie, $valuecookie, strtotime('+7 days'), '/');
    } else{
        setcookie($namecookie, $valuecookie, strtotime('-7 days'), '/');
    }
}
?>

<?php
if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];
    $pass = $_POST["pass"];
    $repass = $_POST["repass"];
    if($pass == $repass){
        $qupdate = "UPDATE user SET
                        nama = '$nama',
                        no_hp = '$nohp',
                        password = '$pass'
                        WHERE id = $id
                    ";
        mysqli_query($connectsql, $qupdate);
        if (mysqli_affected_rows($connectsql)) {
            $_SESSION["updatealert"] = true;
            echo"
                <script>
                    document.location.href = './profile.php?id=$id';
                </script>
            ";
        } else {
            echo"
            <script>
                    salah.style.display = 'block'
            </script>
            ";
        }
    } else {
        echo"
        <script>
                salah.style.display = 'block'
        </script>
        ";
    }
}
?>