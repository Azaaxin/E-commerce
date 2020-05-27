<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Trailstop | Rocky Mountain Altitude</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/reparation.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/phone_menu.js"></script>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php"; 
?>

<main class="container-fluid">

    <section class="row">
        <img class="col-12 p-0" src="img/SSC.png" alt="Shimano Service Center">
    </section>

    <div class="row mx-lg-5 px-xl-5">
        <section class="col-12 col-md-7 col-xl-9 p-4">
            <form>
            <h2 class="col-12 text-center">Serviceformulär</h2>
            <ul class="p-0">
                <div class="form-group">
                <label for="name">Namn</label>
                <input type="text" class="form-control" id="name" placeholder="Skriv ditt fullständiga namn">
                </div>
                <div class="form-group">
                <label for="phone">Telefonnummer</label>
                <input type="tel" class="form-control" id="phone" placeholder="Inklusive riktnummer">
                </div>
                <div class="form-group">
                <label for="brand">Märke</label>
                <input type="brand" class="form-control" id="brand" placeholder="Cykelns märke">
                </div>
                <div class="form-group">
                <label for="model">Modell</label>
                <input type="text" class="form-control" id="model" placeholder="Modell inklusive årsmodell">
                </div>
                <div class="form-group">
                <label for="message">Ärende</label>
                <textarea rows="6" id="message" class="form-control" placeholder="Beskriv ditt problem här"></textarea>
                </div>
                <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-dark">Skicka</button>
                </div>
            </ul>
            </form>
        </section>

        <aside class="p-4 col-md-5 col-xl-3">
            <div class="col-12">
                <h2 class="w-100 text-center">Service Partners</h2>
            </div>
            <section class="d-flex flex-md-column py-md-5 flex-wrap">
                <img class="col-6 col-md-12 align-self-center" src="img\rockshox.jpg" alt="Rockshox">
                <img class="col-6 col-md-12" src="img\Ohlins_logo.png" alt="Öhlins">
                <img class="col-6 col-md-12" src="img\fox.jpg" alt="Fox Racing Shox">
                <img class="col-6 col-md-12" src="img\1491987590096.jpg" alt="Shimano Service Center">
            </section>
        </aside>
    </div>
</main>

</body>
</html>