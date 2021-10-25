<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESD VENUE BOOKING</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/home.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">Booking</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        $img_src = [
            "hotel1.jpg",
            "hotel2.jpg",
            "hotel.jpg"
        ];
    ?>

    <div class="container-fluid">
        <h2><b>WELCOME TO ESD VENUE RESERVATION</b></h2><br>
        <div class="container bg-dark">
        <p class="text-light">Find your best deal for your event, here!</p>
        </div>
        
        <form action="booking.php" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[0]?> class="card-img-top" alt="1 Single Bed" height="100%">
                        <div class="card-body text-center">
                        <h5 class="card-title text-left"><b>Hotel Satu</b></h5>
                        <div class="card-text text-primary text-left">
                            Outdoor/indoor <br>
                            <b>$800/hours</b> <br>
                            3000 Capacity
                        </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item" style="color:green; font-weight:bold;">Free Parking</li>
                <li class="list-group-item" style="color:green; font-weight:bold;">Full AC</li>
                <li class="list-group-item" style="color:green; font-weight:bold;">Cleaning Service</li>
                <li class="list-group-item" style="color:green; font-weight:bold;">Covid-19 Health Protocol</li>
            </ul>
                        </div>
                        <div class="card-footer">
                            <button name="" class="btn btn-primary">Hotel dua</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[1]?> class="card-img-top" alt="1 Double Bed" height="100%">
                        <div class="card-body text-center">
                        <h5 class="card-title text-left"><b>Hotel Dua</b></h5>
                        <div class="card-text text-primary text-left">
                            Indoor <br>
                            <b>$500/hours</b> <br>
                            500 Capacity
                        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" style="color:green; font-weight:bold;">Free Parking</li>
                <li class="list-group-item" style="color:green; font-weight:bold;">Full AC</li>
                <li class="list-group-item" style="color:red; font-weight:bold;">Cleaning Service</li>
                <li class="list-group-item" style="color:green; font-weight:bold;">Covid-19 Health Protocol</li>
            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="card2" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[2]?> class="card-img-top" alt="2 Double Bed" height="150%">
                        <div class="card-body text-center">
                        <h5 class="card-title text-left"><b>Hotel Tiga</b></h5>
                        <div class="card-text text-primary text-left">
                            Outdoor <br>
                            <b>$100/hours</b> <br>
                            200 Capacity
                        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" style="color:red; font-weight:bold;">Free Parking</li>
                <li class="list-group-item" style="color:red; font-weight:bold;">Full AC</li>
                <li class="list-group-item" style="color:red; font-weight:bold;">Cleaning Service</li>
                <li class="list-group-item" style="color:green; font-weight:bold;">Covid-19 Health Protocol</li>
            </ul>
                        </div>
                        <div class="card-footer">
                            <button name="card3" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <footer align="center">Dibuat oleh Aulia Basyirah 1202194035 </footer>
    <br>
</body>

</html>