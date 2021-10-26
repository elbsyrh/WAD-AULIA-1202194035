<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESD VENUE BOOKING</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/book.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Booking <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
        $method_selected = '';
        $image_selected = '';
        $hotel1_bk = isset($_POST['card10']);
        $hotel2_bk = isset($_POST['card2']);
        $hotel3_bk = isset($_POST['card3']);
        $img_src = [
            "hotel1.jpg",
            "hotel2.jpg",
            "hotel.jpg"
        ];
        if ($hotel1_bk) {
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value=""Hotel Satu">"Hotel Satu</option>
                <input type="hidden" name="roomtype" value=""Hotel Satu">
                </select>';
            $image_selected = $img_src[0];
        } else if ($hotel2_bk){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Hotel Dua">Hotel Dua</option>
                <input type="hidden" name="roomtype" value="Hotel Dua">
                </select>';
            $image_selected = $img_src[1];
        }else if ($hotel3_bk){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Hotel Tiga">Hotel Tiga</option>
                <input type="hidden" name="roomtype" value="Hotel Tiga">
                </select>';
            $image_selected = $img_src[2];
        }else {
            $method_selected = '
                <select class="custom-select" name="roomtype">
                <option value="Hotel Satu">Hotel Satu</option>
                <option value="Hotel Dua">Hotel Dua</option>
                <option value="Hotel Tiga">Hotel Tiga</option>
                </select>';
            $image_selected = $img_src[0];
        }
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">

            <div class="col-md-6">
                <form action="mybooking.php" method="post">
                    <div class="form-group">
                        Name
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        Event Date
                        <input type="date" class="form-control" name="eventdate">
                    </div>
                    <div class="form-group">
                        Start Time 
                        <input type="time" class="form-control" name="starttime">
                    </div>
                    <div class="form-group">
                        Duration(hours)
                        <input type="number" class="form-control" name="duration" aria-describedby="dur_info" value=0>
                    </div>
                    <div class="form-group">
                        Building Type
                        <?=$method_selected?>
                    </div>
                    <div class="form-group">
                        Phone Number
                        <input type="number" class="form-control" name="phone_num">
                        <br>
                    <div class="form-group">
                        Add Service(s)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service[]" value="Room Services"
                                id="service_check1">
                            Catering / $700
                            <br/>
                            <input class="form-check-input" type="checkbox" name="service[]" value="Breakfast"
                                id="service_check2">
                            Decoration / $450
                            <br/>
                            <input class="form-check-input" type="checkbox" name="service[]" value="Room Services"
                                id="service_check1">
                            Sound System / $250
                            <br/>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Book"></input>
                    </div>
                </form>
            </div>
            <div class="col-md-auto">
                <img src=<?=$image_selected?> alt="Preview Bedroom" class="image-preview">
            </div>

        </div>
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