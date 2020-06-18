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

include('layout/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Min Sida</title>
    

    
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
    
    