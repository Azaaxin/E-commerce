<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="author" content="Andreas Ronvall">
    <meta name="description" content="Andreas Ronvall Register 4-sidan">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registrera dig</title>
    <link rel="stylesheet" href="css/register.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/phone_menu.css">
<link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <script src="js/phone_menu.js"></script>
</head>
<body>
<?php 
    include "../layout/header.php";
    include "../layout/phone_menu.php";
?> 


<?php

    
    require('../../src/config.php');
    require('../../src/dbconnect.php');
    
    //checkLoginSession();

  

  
    if (isset($_POST['deleteBtn'])) {
 
        if(empty($users)){
            try {
                $query = "
                DELETE FROM users
                WHERE id = :id;
                ";
      
                $stmt = $dbconnect->prepare($query);
                $stmt->bindValue(':id', $_POST['id']);
                $result = $stmt->execute();
          }     catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
          }
            session_start();
            $_SESSION["successmsg"]='Användare raderad';
            session_destroy();
            header('Location: index.php');
            exit;

        }
    }



    $pageTitle = "REGISTRERING";
    $pageId = "";


    $firstname      = '';
    $lastname       = '';
    $email           = '';
    $mobile           = '';
    $street          = '';
    $postalcode     = '';
    $city            = '';
    $country         = '';
    $error           = '';
    $msg             = '';
    if (isset($_POST['register'])) {
        $firstname        = trim($_POST['firstname']);
        $lastname         = trim($_POST['lastname']);
        $email             = trim($_POST['email']);
        $password          = trim($_POST['password']);
        $confirmPass        = trim($_POST['confirmPass']);
        $mobile            = trim($_POST['mobile']);
        $street            = trim($_POST['street']);
        $postalcode       = trim($_POST['postalcode']);
        $city              = trim($_POST['city']);
        $country           = trim($_POST['country']);

        if (empty($firstname)) {
            $error .= "<li>Du MÅSTE ange ett FÖRNAMN</li>";
        }
        if (empty($lastname)) {
            $error .= "<li>Du MÅSTE ange ett EFTERNAMN</li>";
        }
        if (empty($email)) {
            $error .= "<li>Du MÅSTE ange en MAILADRESS</li>";
        }
        if (empty($mobile)) {
            $error .= "<li>Du MÅSTE ange ett MOBILNUMMER</li>";
        }
        if (empty($street)) {
            $error .= "<li>Du MÅSTE ange en ADRESS</li>";
        }
        if (empty($postalcode)) {
            $error .= "<li>Du MÅSTE ange ett POSTNUMMER</li>";
        }
        if (empty($city)) {
            $error .= "<li>Du MÅSTE ange en STAD</li>";
        }
        if (empty($country)) {
            $error .= "<li>Du MÅSTE ange ett LAND</li>";
        }
        if (!empty($password) && strlen($password) < 6) {
            $error .= "<li>Lösenordet MÅSTE vara längre än 6 tecken (och helst ej Jordan ;) )</li>";
        }
        if ($confirmPass !== $password) {
            $error .= "<li>Lösenordet STÄMMER EJ överrens</li>";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "<li>Mailadressen är OGILTIG</li>";
        }
        

        if ($error) {
            $msg = "<ul class='error_msg'>{$error}</ul>";
        }

        if (empty($error)) {
            try {
                $query = "
                    INSERT INTO users ( `firstname`, `lastname`, `password`, `email`, `mobile`, `street`, `postalcode`, `city`, `country`)
                    VALUES ( :firstname, :lastname, :password, :email, :mobile, :street, :postalcode, :city, :country);
                ";

                $stmt = $dbconnect->prepare($query);
                $stmt->bindValue(':firstname', $firstname);
                $stmt->bindValue(':lastname', $lastname);
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':mobile', $mobile);
                $stmt->bindValue(':street', $street);
                $stmt->bindValue(':postalcode', $postalcode);
                $stmt->bindValue(':city', $city);
                $stmt->bindValue(':country', $country);
                $result = $stmt->execute(); 
            } catch(\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }


            if ($result) {
                $msg = '<div class="success_msg">Gratulerar. Ditt konto är skapat. Nu kan du köpa de skor du vill ha!</div>';
            } else {
                $msg = '<div class="error_msg">Tyvärr misslyckades registering av nån anledning. Försök igen för att kunna köpa just den skon du vill ha</div>';
            }
        }
    }

?>


 
    <div id="content">
        <article class="border">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Registrera dig för att kunna köpa de skor du vill ha!</legend>
                    
                    
                    <?=$msg?>
                    
                    <p>
                        <label for="input1">Ditt Förnamn:</label> <br>
                        <input type="text" class="text" name="firstname" value="<?=htmlentities($firstname)?>">
                    </p>

                    <p>
                        <label for="input1">Ditt Efternamn:</label> <br>
                        <input type="text" class="text" name="lastname" value="<?=htmlentities($lastname)?>">
                    </p>

                    <p>
                        <label for="input1">Din M@iladress:</label> <br>
                        <input type="text" class="text" name="email" value="<?=htmlentities($email)?>">
                    </p>

                    <p>
                        <label for="input1">Ditt Lösenord (Fler än 6 tecken och ej Jordan :)):</label> <br>
                        <input type="password" class="text" name="password" value="<?=htmlentities($password)?>">
                    </p>

                    <p>
                        <label for="input1">Bekräfta ditt Lösenord (Fler än 6 tecken):</label> <br>
                        <input type="password" class="text" name="confirmPass" value="<?=htmlentities($confirmPass)?>">
                    </p>

                    <p>
                        <label for="input2">Ditt Mobilnummer:</label> <br>
                        <input type="text" class="text" name="mobile" value="<?=htmlentities($mobile)?>">
                    </p>

                    <p>
                        <label for="input1">Din Gatuadress:</label> <br>
                        <input type="text" class="text" name="street" value="<?=htmlentities($street)?>">
                    </p>

                    <p>
                        <label for="input1">Ditt Postnummer:</label> <br>
                        <input type="text" class="text" name="postalcode" value="<?=htmlentities($postalcode)?>">
                    </p>

                    <p>
                        <label for="input1">Din Stad du går omkring med dina skor i:</label> <br>
                        <input type="text" class="text" name="city" value="<?=htmlentities($city)?>">
                    </p>

                    <p>
                        <label for="input1">Ditt Land du går omkring med dina skor i:</label> <br>
                        <input type="text" class="text" name="country" value="<?=htmlentities($country)?>">
                    </p>

                    <p>
                        <input type="submit" name="register" value="Registrera">
                    </p>
                </fieldset>
            </form>
        
            <hr>
        </article>
    </div>



 
            <p>
                <input action="users.php?" type="submit" name="signup" value="Uppdatera">
            </p>
            
            <form action="index.php?" method="POST">
                <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                <input type="submit" name="deleteBtn" value="Ta bort användaren">
            </form>
           
        </form>
    </div> 
    
</body>
<?php include('../layout/footer.php'); ?>

</html>