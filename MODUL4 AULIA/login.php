<?php
session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Login</title>
    </head>
    <body class="bg-success bg-opacity-10">
        <div class="container-fluid bg-dark bg-opacity-50 sticky-top">
            <div class="container p-2 navbar navbar-collapse" >
                <a class="link-dark" href="index.php" style="text-decoration: none;"><b>EAD Travel</b></a>
                <div>
                    <a class="link-dark me-3" href="register.php" style="text-decoration: none;">Register</a>
                    <a class="link-dark" href="login.php" style="text-decoration: none;">Login</a>
                </div>
            </div> 
        </div>

        <?php
        if (isset($_SESSION["keluar"])){
            ?>
            <div class="alert alert-success alert-dismissible fade show" id="alertkeluar">
                Berhasil logout
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            session_destroy();
            }
        ?>

        <div class="alert alert-success alert-dismissible fade show" id="alertberhasil">
            Berhasil registrasi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            var berhasil = document.getElementById('alertberhasil');
            berhasil.style.display = 'none'
        </script>

        <?php
        if ( isset($_SESSION["sukses"])){
            echo "
            <script>
                berhasil.style.display = 'block'
            </script>
            ";
            session_destroy();
        }
        ?>

        <div class="alert alert-danger alert-dismissible fade show" id="alertgagal">
            Gagal Login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="d-flex container mt-5 justify-content-center">
            <div class="card rounded-1 bg-white" style="width: 24rem;">
                <h3 class="text-center m-3">Login</h3>
                <hr class="ms-2 me-2 mt-0 mb-0">
                <div class="card-body">
                    <form action="" method="post">
                        <label class="mb-2" for="email">Email</label><br>
                        <input class="form-control mb-2" type="text" name="email" id="email" required placeholder="Alamat E-mail">
                        <label class="mb-2" for="pass">Kata Sandi</label><br>
                        <input class="form-control mb-2" type="Password" name="pass" id="pass" required placeholder="Kata Sandi Anda">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <div class="text-center pt-2 mb-2 mt-2">
                            <button class="btn btn-primary" type="submit" name="submit" onclick="" style="width: 150px">Login</button>
                        </div>
                    </form>
                    <div class="text-center d-flex justify-content-center">
                        <p class="me-1">Anda belum punya akun?</p>
                        <a href="register.php">Daftar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-primary bg-opacity-50 text-center fixed-bottom">
            <p class="m-2">
                2021 Copyright
                <a href="">AULIA_1202194035</a>
            </p>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            var gagal = document.getElementById('alertgagal');
            gagal.style.display = 'none'
        </script>

    </body>
</html>

<?php
$connectsql = mysqli_connect("localhost", "root", "", "wad_modul4");

if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $querygetakun = "SELECT * FROM user WHERE email = '$email'";
    $getakun = mysqli_query($connectsql, $querygetakun);
    $row = mysqli_fetch_assoc($getakun);
    if ( $pass == $row["password"]){
        $_SESSION["newlogin"] = true;
        if (isset($_POST["remember"])){
            setcookie('id', $row["id"], strtotime('+7 days'), '/');
            header("Location: index.php");
            exit;
        }else{
            $_SESSION["sementara"] = $row["id"];
            header("Location: index.php");
            exit;
        }
    }else{
        echo"
        <script>
                gagal.style.display = 'block'
        </script>
        ";
    }
}
?>