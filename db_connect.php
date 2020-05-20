<?php
    $servername = "mysql686.loopia.se";
    $username = "ecom@l276199";
    $password = "cmeducations19";
    $dbname = "ludvigolausson_se";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
?>