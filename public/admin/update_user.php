<?php
	session_start();
	require('../../src/dbconnect.php');
    
    echo "<pre>";
    echo print_r($_POST);
    echo "</pre>";


    echo "<pre>";
    echo print_r($_GET);
    echo "</pre>";






    $first_name   = '';
    $last_name    = '';
    $email        = '';
    $phone        = '';
    $street       = '';
    $postal_code  = '';
    $city         = '';
    $country      = '';
    $error        = '';
    $msg          = '';
    if (isset($_POST['update'])) {
        $first_name     = trim($_POST['first_name']);
        $last_name      = trim($_POST['last_name']);
        $email          = trim($_POST['email']);
        $password       = trim($_POST['password']);
        $phone          = trim($_POST['phone']);
        $street         = trim($_POST['street']);
        $postal_code    = trim($_POST['postal_code']);
        $city           = trim($_POST['city']);
        $country        = trim($_POST['country']);

        if (empty($first_name)) {
            $error .= "<li>first_name är obligatoriskt</li>";
        }
        if (empty($last_name)) {
            $error .= "<li>last_name är obligatoriskt</li>";
        }
        if (empty($email)) {
            $error .= "<li>email är obligatoriskt</li>";
        }

        if (empty($password)) {
            $error .= "<li>password är obligatoriskt</li>";
        }

        if (empty($phone)) {
            $error .= "<li>phone är obligatoriskt</li>";
        }

        if (empty($street)) {
            $error .= "<li>street är obligatoriskt</li>";
        }

        if (empty($postal_code)) {
            $error .= "<li>postal_code är obligatoriskt</li>";
        }

        if (empty($city)) {
            $error .= "<li>city är obligatoriskt</li>";
        }

        if (empty($country)) {
            $error .= "<li>country är obligatoriskt</li>";
        }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "<li>Ogiltig e-post</li>";
        }
        

        if ($error) {
            $msg = "<ul class='error_msg'>{$error}</ul>";
        }

        if (empty($error)) {
            try {
                $query = "
                    UPDATE users
                    SET first_name = :first_name, last_name = :last_name, email = :email, password = :password, phone = :phone, street = :street, postal_code = :postal_code, city = :city, country = :country
                    WHERE id = :id
                ";

                $stmt = $dbconnect->prepare($query);
                $stmt->bindValue(':first_name', $first_name);
                $stmt->bindValue(':last_name', $last_name);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':street', $street);
                $stmt->bindValue(':postal_code', $postal_code);
                $stmt->bindValue(':city', $city);
                $stmt->bindValue(':country', $country);
                $stmt->bindValue(':id', $_GET['id']);
                $result = $stmt->execute(); // returns true/false
            } catch(\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }

            if ($result) {
                $msg = '<div class="success_msg">Användaren är uppdaterad</div>';
            } else {
                $msg = '<div class="error_msg">Uppdateringen av användaren misslyckades. Var snäll och försök igen senare!</div>';
            }
        }
    }


    // Fetch user by id
    try {
        $query = "
            SELECT * FROM users
            WHERE id = :id;
        ";

        $stmt = $dbconnect->prepare($query);
        $stmt->bindvalue(':id', $_GET['id']);
        $stmt->execute();
        // fetch() fetches 1 record, fetchAll() fetches alla records 
        $user = $stmt->fetch();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

?>

	<div>
        <article style="margin-top: 50px;">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Update User</legend>
                    
                    <?=$msg?>
                    
                    <p>
                        <label for="input1">Förnamn</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=htmlentities($user['first_name'])?>">
                    </p>

                    <p>
                        <label for="input1">Efternamn</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=htmlentities($user['last_name'])?>">
                    </p>

                    <p>
                        <label for="input1">Email</label> <br>
                        <input type="text" class="text" name="email" value="<?=htmlentities($user['email'])?>">
                    </p>

                    <p>
                        <label for="input2">Lösenord:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>

					<p>
                        <label for="input1">Telefon nr</label> <br>
                        <input type="text" class="text" name="phone" value="<?=htmlentities($user['phone'])?>">
                    </p>
                    <p>
                        <label for="input1">Gatuaddres</label> <br>
                        <input type="text" class="text" name="street" value="<?=htmlentities($user['street'])?>">
                    </p>
                    <p>
                        <label for="input1">Postkod</label> <br>
                        <input type="text" class="text" name="postal_code" value="<?=htmlentities($user['postal_code'])?>">
                    </p>
                    <p>
                        <label for="input1">Stad</label> <br>
                        <input type="text" class="text" name="city" value="<?=htmlentities($user['city'])?>">
                    </p>
                    <p>
                        <label for="input1">Land</label> <br>
                        <input type="text" class="text" name="country" value="<?=htmlentities($user['country'])?>">
                    </p>


                    <p>
                        <input id="edit-new" type="submit" name="update" value="Update">
                        <a class="back" href="index.php">Back</a>
                    </p>

                </fieldset>
            </form>
        </article>
    </div>