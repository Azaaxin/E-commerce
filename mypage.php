<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Min Sida</title>
    <link rel="stylesheet" href="css/register.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src="js/phone_menu.js"></script>
</head>
<body>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?> 



<?php
require('src/config.php');
require('src/dbconnect.php'); 


if (!isset($_SESSION['first_name'])) {
        //header('login.php?mustLogin');
        header('Location: login.php?mustLogin');
        exit;
}


if (isset($_SESSION['firstname'])){
    $user = fetchUsersById($_SESSION['id']);
}


?>

    

    
<body>
	<section id ="userinfo">
        <h2>Min Kontoinformation</h2>
        <div class="row">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>User Id: </b><?php echo $user['id']?></li>
                <li class="list-group-item"><b>Förnamn: </b><?=htmlentities(ucfirst($user['firstname']));?></li>
                <li class="list-group-item"><b>Efternamn: </b><?=htmlentities(ucfirst($user['lastname']));?></li>
                <li class="list-group-item"><b>E-post: </b><?=htmlentities(ucfirst($user['mail']));?></li>
                <li class="list-group-item"><b>Mobil: </b><?=htmlentities($user['mobile']);?></li>
                <li class="list-group-item"><b>Adress: </b><?=htmlentities(ucfirst($user['street']));?></li>
                <li class="list-group-item"><b>Postnummer: </b><?=htmlentities($user['postalcode']);?></li>
                <li class="list-group-item"><b>Stad: </b><?=htmlentities(ucfirst($user['city']));?></li>
                <li class="list-group-item"><b>Land: </b><?=htmlentities(ucfirst($user['country']));?></li>
                <li class="list-group-item"><b>Register Date: </b><?=htmlentities($user['register_date']);?></li>
            </ul>
        </div>
        <div class="submitBtns">
            <form action="update-user.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="submit" value="UPDATE">
            </form>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="submit" name="deleteUserBtn" value="Radera detta konto">
	</section>
    
    