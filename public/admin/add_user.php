<?php  
    session_start();
    require('../../src/dbconnect.php');


    $first_name   = '';
    $last_name    = '';
    $email        = '';
    $phone        = '';
    $street       = '';
    $postal_code  = '';
    $city         = '';
    $country      = '';
    $msg          = '';
    if (isset($_POST['register'])) {
        $first_name        = trim($_POST['first_name']);
        $last_name         = trim($_POST['last_name']);
        $email             = trim($_POST['email']);
        $password          = trim($_POST['password']);
        $phone             = trim($_POST['phone']);
        $street            = trim($_POST['street']);
        $postal_code       = trim($_POST['postal_code']);
        $city              = trim($_POST['city']);
        $country           = trim($_POST['country']);

        if (empty($first_name)) {
            $error .= "<li>firt name är obligatoriskt</li>";
        }
        if (empty($last_name)) {
            $error .= "<li>last name är obligatoriskt</li>";
        }
        if (empty($email)) {
            $error .= "<li>email är obligatoriskt</li>";
        }

        if (empty($password)) {
            $error .= "<li>Lösenord är obligatoriskt</li>";
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
                    INSERT INTO users (first_name, last_name, email, password, phone, street, postal_code, city, country)
                    VALUES (:first_name, :last_name, :email, :password, :phone, :street, :postal_code, :city, :country);
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
                $result = $stmt->execute(); // returns true/false
            } catch(\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }

            if ($result) {
                $msg = '<div class="success_msg">Ny användare är skapad</div>';
            } else {
                $msg = '<div class="error_msg">Skapandet av användaren misslyckades. Var snäll och försök igen senare!</div>';
            }
        }
    }       



?>


    <!-- Sidans/Dokumentets huvudsakliga innehåll -->
    <div id="content">
        <article class="border">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Skapa ny användare</legend>
                    
                    <!-- Visa errormeddelanden -->
                    <?=$msg?>
                    
                    <p>
                        <label for="input1">Förnamn:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=htmlentities($first_name)?>">
                    </p>

                    <p>
                        <label for="input1">Efternamn:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=htmlentities($last_name)?>">
                    </p>

                    <p>
                        <label for="input1">E-post:</label> <br>
                        <input type="text" class="text" name="email" value="<?=htmlentities($email)?>">
                    </p>

                    <p>
                        <label for="input2">Lösenord:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>

                    <p>
                        <label for="input1">Telfon nr:</label> <br>
                        <input type="text" class="text" name="phone" value="<?=htmlentities($phone)?>">
                    </p>

                    <p>
                        <label for="input1">Gatuaddres</label> <br>
                        <input type="text" class="text" name="street" value="<?=htmlentities($street)?>">
                    </p>

                    <p>
                        <label for="input1">Postkod</label> <br>
                        <input type="text" class="text" name="postal_code" value="<?=htmlentities($postal_code)?>">
                    </p>

                    <p>
                        <label for="input1">Stad:</label> <br>
                        <input type="text" class="text" name="city" value="<?=htmlentities($city)?>">
                    </p>

                    <p>
                        <label for="input1">Land:</label> <br>
                        <input type="text" class="text" name="country" value="<?=htmlentities($country)?>">
                    </p>

                    <p>
                        <input type="submit" name="register" value="Skapa"> | 
                        <a href="index.php">Tillbaka</a>
                    </p>
                </fieldset>
            </form>
        
            <hr>
        </article>
    </div>

