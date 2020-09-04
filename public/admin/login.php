<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="author" content="Andreas Ronvall">
    <meta name="description" content="Andreas Ronvall Logga in i 4-shoppen">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Logga In i 4 shopen</title>
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

    // session_start();

//print_r($_SESSION["products_shopping"]);




    $msg = "";
    if (isset($_GET['mustLogin'])) {
        $msg = '<div class="error_message">Du MÅSTE Logga in.</div>';

}

    if (isset($_POST['Login'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];
        
        
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

         if ($user && $password === $user['password']) {

            $_SESSION['email'] = $user['email'];
            header('Location: mypage.php');

            exit;
        } else {

            $msg = '<div class="error_message">Något blev FEL. FÖRSÖK igen.</div>';
        }
    }
?>  




    <div id="content">
        <article class="border">
            <form method="POST" action="login.php">
                <fieldset>
                    <legend>Logga in i 4 shopen</legend>
                    
                   
                    <?=$msg?>
                    
                    <p>
                        <label for="input1">MAILADRESS:</label> <br>
                        <input type="text" class="text" name="email">
                    </p>

                    <p>
                        <label for="input2">LÖSENORD:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>

                    <p>
                        <input type="submit" name="Login" value="Loggain">
                    </p>
                </fieldset>
            </form>
        
            <hr>
        </article>
    </div>
</body>

<?php include('../layout/footer.php'); ?>

</html>