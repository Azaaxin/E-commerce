<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="author" content="Andreas Ronvall">
    <meta name="description" content="Andreas Ronvall Min sida 4-sidan">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Min Sida</title>
    <link rel="stylesheet" href="css/register.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
error_reporting(-1);
ini_set('display_errors', -1);
 include "parts/header.php"; 
    include "../layout/phone_menu.php";
?> 


<?php 

    
    require('../../src/config.php');
    require('../../src/dbconnect.php');

if (!isset($_SESSION['email'])) {
        //header('login.php?mustLogin');
        header('location: login.php?mustLogin');
       
}


if (isset($_SESSION['email'])){
    // $user = fetchUsersById($_SESSION['id']);


try {
            $query = "
                SELECT * FROM users
                WHERE email = :email;
            ";

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute(); 
            $user = $stmt->fetch(); 

        }

         catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

}


$first_name  = '';
$last_name   = '';
$email       = '';
$password    = '';
$phone       = '';
$street      = '';
$postal_code = '';
$city        = '';
$country     = '';
$error       = '';
$msg         = '';

if (isset($_POST['update'])) {
    $first_name      = trim($_POST['first_name']);
    $last_name       = trim($_POST['last_name']);
    $email           = trim($_POST['email']);
    $password        = trim($_POST['password']);
    $phone          = trim($_POST['phone']);
    $street          = trim($_POST['street']);
    $postal_code     = trim($_POST['postal_code']);
    $city            = trim($_POST['city']);
    $country         = trim($_POST['country']);
    
    
    if (empty($first_name)) {
        $error .= "<li>Du MÅSTE ange ett FÖRNAMN</li>";
    }
    if (empty($last_name)) {
        $error .= "<li>Du MÅSTE ange ett EFTERNAMN</li>";
    }
    if (empty($email)) {
         $error .= "<li>Du MÅSTE ange en MAILADRESS</li>";
    }
    if (empty($password)) {
        $error .= "<li>Lösenord är obligatoriskt</li>";
    }
    if (!empty($password) && strlen($password) < 6) {
        $error .= "<li>Lösenordet MÅSTE vara längre än 6 tecken  </li>";
    }
    if (empty($phone)) {
        $error .= "<li>Du MÅSTE ange ett MOBILNUMMER</li>";
    }
    if (empty($street)) {
        $error .= "<li>Du MÅSTE ange en ADRESS</li>";
    }
    if (empty($postal_code)) {
        $error .= "<li>Du MÅSTE ange ett POSTNUMMER</li>";
    }
    if (empty($city)) {
       $error .= "<li>Du MÅSTE ange en STAD</li>";
    }
    if (empty($country)) {
        $error .= "<li>Du MÅSTE ange ett LAND</li>";
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
                SET first_name = :first_name, last_name = :last_name, password = :password, email = :email, phone = :phone, street = :street, postal_code = :postal_code, city = :city, country = :country
                WHERE email = :email
            ";

            

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':street', $street);
            $stmt->bindValue(':postal_code', $postal_code);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':country', $country);
            
            $result = $stmt->execute(); 
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

        if ($result) {
            $msg = '<div class="success_msg">Dina uppgifter har uppdaterats</div>';
        } else {
            $msg = '<div class="error_msg">Uppdateringen av användaren misslyckades. Var snäll och försök igen senare!</div>';
        }
    }
}


try {
    
    $query = "SELECT * FROM users 
              WHERE email = :email;";
    $stmt = $dbconnect->prepare($query);
    $stmt->bindvalue(':email', $_SESSION['email']);
    $stmt->execute();
    $user = $stmt->fetch();
}   catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
       }



    if (isset($_POST['deleteUserBtn'])) {
        try {
                        $query = "
                        DELETE FROM users
                        WHERE email = :email;
                        ";

                        $stmt = $dbconnect->prepare($query);
                        $stmt->bindValue(':email', $_POST['email']);
                        $stmt->execute();
                        session_destroy();
                        header('Location: index.php?logout');
                        exit;
               }        catch (\PDOException $e) {
                        throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }
}
?>

    

	<section id ="userinfo">
        <h2>Min Kontoinformation</h2>
        <div class="row">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>User Id: </b><?php echo $user['id']?></li>
                <li class="list-group-item"><b>Förnamn: </b><?=htmlentities(ucfirst($user['first_name']));?></li>
                <li class="list-group-item"><b>Efternamn: </b><?=htmlentities(ucfirst($user['last_name']));?></li>
                <li class="list-group-item"><b>E-post: </b><?=htmlentities($user['email']);?></li>
                <li class="list-group-item"><b>Mobil: </b><?=htmlentities($user['phone']);?></li>
                <li class="list-group-item"><b>Adress: </b><?=htmlentities(ucfirst($user['street']));?></li>
                <li class="list-group-item"><b>Postnummer: </b><?=htmlentities($user['postal_code']);?></li>
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
    
</body>

<?php include('../layout/footer.php'); ?>

</html>