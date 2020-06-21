<?php

	require('../../src/dbconnect.php');

    echo "<pre>";
    echo print_r($_POST);
    echo "</pre>";


    echo "<pre>";
    echo print_r($_GET);
    echo "</pre>";



	try {
	    $query = "
	        SELECT * FROM users
	    ";

	    $stmt = $dbconnect->query($query);
	    $users = $stmt->fetchAll();
	} catch (\PDOException $e) {
	    throw new \PDOException($e->getMessage(), (int) $e->getCode());
	}


    if (isset($_POST['deleteUserBtn'])) {
        $id = $_POST['userId'];

        try {
            $query = "
                DELETE FROM users
                WHERE id = :id;
            ";
            $stmt = $dbconnect->prepare($query); 
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h1>Admin page</h1>

	<div id="content" style="">
        <article class="admin-page">
        <a href="add_user.php">Skapa Användare</a> 
        <hr>
        	<tbody>

                <?php foreach ($users as $key => $user) { ?>

                <div id="border-content">
                	<h4>Id: <?=htmlentities($user['id'])?></h4>
                    <hr>
                    <h4>Förnamn: <?=htmlentities($user['first_name'])?></h4>   
                    <p><b>Efternamn: <?=$user['last_name']?></b></p>
                    <p><b>email: <?=$user['email']?></b></p>
                    <p><b>Lösenord: <?=$user['password']?></b></p>
                    <p><b>Telfon nr: <?=$user['phone']?></b></p>
                    <p><b>Gatuadress: <?=$user['street']?></b></p>
                    <p><b>Postkod: <?=$user['postal_code']?></b></p>
                    <p><b>Stad: <?=$user['city']?></b></p>
                    <p><b>Land: <?=$user['country']?></b></p>
                    <p><b>Registrerings datum: <?=$user['register_date']?></b></p>

                    <form action="update_user.php" method="GET">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <input id="submit-edit" type="submit" class="editUserBtn" name="editUserBtn" value="Edit">
                    </form>
                    <form action="" method="POST">
                        <input type="hidden" name="userId" value="<?=$user['id']?>">
                        <input id="submit-delete" type="submit" name="deleteUserBtn" value="Radera Användare">
                    </form>

                   <hr>

                </div>     
            <?php } ?>
        	</tbody>      
        </article>



</body>
</html>
