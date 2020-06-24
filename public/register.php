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
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/style.css">
<link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <script src="js/phone_menu.js"></script>
</head>
<body>
<?php 

    include "../layout/header.php";
    include "../layout/phone_menu.php";

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
                    INSERT INTO users ( `first_name`, `last_name`, `password`, `email`, `phone`, `street`, `postal_code`, `city`, `country`)
                    VALUES ( :firstname, :lastname, :password, :email, :mobile, :street, :postalcode, :city, :country);";

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
                session_start();
                $_SESSION["successmsg"]=$email;
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
<div class="regwrapper">
  <div class="contact">
  <h1>Registrera dig hos oss</h1>
      <div class="select">
        <form method="POST" action="#">
      <select name="country" required>
        <option value="">Välj land</option>
        <option value="1">Sverige</option>
        <option value="2">Danmark</option>
        <option value="3">Finland</option>
        <option value="4">Storbritannien</option>
        <option value="5">Norge</option>
      </select>
      <input type="text" required name="firstname" value="<?=htmlentities($firstname)?>" placeholder="Förnamn">
        <input type="text" required name="lastname" value="<?=htmlentities($lastname)?>" placeholder="Efternamn">
        <input type="text" required name="email" value="<?=htmlentities($email)?>" placeholder="E-post">
        <input type="password" name="password" value="<?=htmlentities($password)?>" required placeholder="Lösenord">
        <input type="password" name="confirmPass" value="<?=htmlentities($confirmPass)?>" required placeholder="Lösenord igen">
        <input type="text" name="mobile" value="<?=htmlentities($mobile)?>" required placeholder="Mobil">
        <input type="text" name="street" value="<?=htmlentities($street)?>" required placeholder="Gata">
        <input type="text" name="postalcode" value="<?=htmlentities($postalcode)?>" required placeholder="Postnummer">
        <input type="text" name="postalcode" value="<?=htmlentities($postalcode)?>" required placeholder="Stad">
        <input type="text" name="postalcode" value="<?=htmlentities($postalcode)?>" required placeholder="Postnummer">
        <input type="submit" name="register" value="Registrera">
        </form>

        <input action="users.php?" type="submit" name="signup" value="Uppdatera">
        
    </div>
    </div>
  </div>
  <?php include "layout/footer.php";?>
</body>
</html>