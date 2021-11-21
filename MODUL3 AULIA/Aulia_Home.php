<?php

$conn = mysqli_connect("localhost:3316", "root", "", "modul3");

?>

<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Home</title>
    </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
                <div class="container-fluid justify-content-between">
                    <img class="navbar-brand" src="img/logo-ead.png" alt="LogoEAD" style="height: 50px;">
                    <a href="Alif_Tambah.php" class="btn btn-primary">Tambah Buku</a>
                </div>
            </nav>

            <div>
                <?php
                    $show = "SELECT * FROM buku_table";
                    $query = mysqli_query($conn, $show);
                    $row = mysqli_num_rows($query);

                    if($row == 0){
                        ?>
                        <div class="container justify-content-center text-center mt-5 pt-5">
                            <P style="font-size: 40px">Belum Ada Buku</P>
                            <p>Silahkan Menambahkan Buku</p>
                        </div>
                        <?php
                        }
                    else{
                        ?>
                        <div class="container d-flex justify-content-center">
                            <?php
                            while($data = mysqli_fetch_array($query)){
                                ?>
                                <div class="card mx-1" style="width:18rem;">
                                    <img src="asset/<?php echo $data['gambar']?>" alt="gambar" class="card-img-top">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $data['judul_buku']?></h4>
                                        <p class=""><?= $data['deskripsi']?></p>
                                        <button class="btn btn-primary" type="submit"><a href="Alif_Detail.php?judul=<?= $data['judul_buku']?>" style="color: white; text-decoration: none;">Tampilkan lebih lanjut</a></button>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        
                <?php }?>
            </div>

            <div class="text-center container-fluid bg-light justify-content-center">
                <img class="mt-2 mx-auto d-block" src="img/logo-ead.png" alt="logo ead" style="height: 50px">
                <p class="mt-1 mb-1" style="font-size: 20px"><b>Perpustakaan EAD</b></p>
                <p>Alif_1202100187</p>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
    </html>
