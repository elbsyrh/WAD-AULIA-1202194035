<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Tambah Buku</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid justify-content-between">
                <img class="navbar-brand" src="img/logo-ead.png" alt="LogoEAD" style="height: 50px;">
                <a href="Alif_Tambah.php" class="btn btn-primary">Tambah Buku</a>
            </div>
        </nav>

        <div class="mt-5 container rounded-1 shadow">
            <p class="pt-3 pb-3 text-center" style="font-size:30px"><b>Tambah Data Buku</b></p>
            <ul type="none">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="p-3">
                        <li class="mb-2">
                            <label for="judul"><b>Judul Buku</b></label><br>
                            <input class="form-control" type="text" name="judul" id="judul" placeholder="Contoh: Pemrograman Web Bersama EAD">
                        </li>
                        <li class="mb-2">
                            <label for="penulis"><b>Penulis</b></label>
                            <input class="form-control" type="text" name="penulis" id="penulis" value="Alif_1202190187" readonly>
                        </li>
                        <li class="mb-2">
                            <label for="tahun"><b>Tahun Terbit</b></label>
                            <input class="form-control" type="text" name="tahun" id="tahun" placeholder="Contoh: 1990">
                        </li>
                        <li class="mb-2">
                            <label for="desc"><b>Deskripsi</b></label>
                            <textarea class="form-control" name="desc" id="desc" cols="30" rows="5" placeholder="Contoh: Buku ini menjelaskan tentang.."></textarea>
                        </li>
                        <li class="mb-2">
                            <label for="bahasa"><b>Bahasa</b></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa" value="Indonesia">
                                <label class="form-check-label" for="Indonesia">Indonesia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa" value="Lainnya">
                                <label class="form-check-label" for="Lainnya">Lainnya</label>
                            </div>
                        </li>
                        <li class="mb-2">
                            <label for="tag"><b>Tag</b></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="Pemrograman" value="Pemrograman">
                                <label class="form-check-label" for="Pemrograman">Pemrograman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="Website" value="Website">
                                <label class="form-check-label" for="Website">Website</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="Java" value="Java">
                                <label class="form-check-label" for="Java">Java</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="OOP" value="OOP">
                                <label class="form-check-label" for="OOP">OOP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="MVC" value="MVC">
                                <label class="form-check-label" for="MVC">MVC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="Kalkulus" value="Kalkulus">
                                <label class="form-check-label" for="Kalkulus">Kalkulus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="Lainnya" value="Lainnya">
                                <label class="form-check-label" for="Lainnya">Lainnya</label>
                            </div>
                        </li>
                        <li class="mb-2">
                            <label for="gambar"><b>Gambar</b></label>
                            <input class="form-control" type="file" name="gambar" id="gambar">
                        </li>
                        <li class="text-center mb-2">
                            <button class="btn btn-primary" type="submit" name="submit" style="width: 300px">+ Tambah</button>
                        </li>
                    </div>
                </form>
            </ul>
        </div>

        <div class="text-center container-fluid bg-light justify-content-center">
            <img class="mt-2 mx-auto d-block" src="img/logo-ead.png" alt="logo ead" style="height: 50px">
            <p class="mt-1 mb-1" style="font-size: 20px"><b>Perpustakaan EAD</b></p>
            <p>Alif_1202100187</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>


<?php

$conn = mysqli_connect("localhost:3316", "root", "", "modul3");

if (isset($_POST["submit"])){
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahun = $_POST["tahun"];
    $desc = $_POST["desc"];
    $bahasa = implode(",", $_POST["bahasa"]);
    $tag = implode(",", $_POST["tag"]);
    $gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './asset/';

    move_uploaded_file($source, $folder.$gambar);

    $query = "INSERT INTO buku_table
        VALUES
        ('', '$judul', '$penulis', $tahun, '$desc', '$gambar', '$tag', '$bahasa')
        ";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = './index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Terdapat kesalahan')
        </script>";
    }
}
?>

<!-- // $query = "UPDATE buku_table SET
        //     judul_buku = '$newjudul',
        //     tahun_terbit = $tahun,
        //     deskripsi = '$desc',
        //     tag = '$tag',
        //     bahasa = '$bahasa'
        //     WHERE id_buku = $idbook
        // ";
        // mysqli_query($conn, $query); -->