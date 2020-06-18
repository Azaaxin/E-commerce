<?php

    
	require('../src/config.php');
    include('layout/header.php');


    $pageTitle = "Login";
    $pageId = "";

   

    $msg = "";
    if (isset($_GET['Loginneccesary'])) {
        $msg = '<div class="error_message">Du MÅSTE Logga in.</div>';
   

    

    if (isset($_POST['Login'])) {
        $mail    = $_POST['mail'];
        $password = $_POST['password'];

        try {
            $query = "
                SELECT * FROM users
                WHERE mail = :mail;
            ";

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':mail', $mail);
            $stmt->execute(); 

            $user = $stmt->fetch(); 

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }


        if ($user && $password === $user['password']) {

            $_SESSION['mail'] = $user['mail'];
            header('Location: mypage.php');

            exit;
        } else {

            $msg = '<div class="error_message">Något blev FEL. FÖRSÖK igen.</div>';
        }
    }
?>

    <div id="content">
        <article class="border">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Logga in i 4 shopen</legend>
                    
                   
                    <?=$msg?>
                    
                    <p>
                        <label for="input1">MAILADRESS:</label> <br>
                        <input type="text" class="text" name="mail">
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

<?php include('layout/footer.php'); ?>