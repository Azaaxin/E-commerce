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
            $error .= "<li>Förnamn är obligatoriskt</li>";
        }
        if (empty($last_name)) {
            $error .= "<li>Efternamn är obligatoriskt</li>";
        }
        if (empty($email)) {
            $error .= "<li>Email är obligatoriskt</li>";
        }

        if (empty($password)) {
            $error .= "<li>Lösenord är obligatoriskt</li>";
        }

        if (empty($phone)) {
            $error .= "<li>Telefon nr är obligatoriskt</li>";
        }

        if (empty($street)) {
            $error .= "<li>Gatuaddres är obligatoriskt</li>";
        }

        if (empty($postal_code)) {
            $error .= "<li>Postnummer är obligatoriskt</li>";
        }

        if (empty($city)) {
            $error .= "<li>Stad är obligatoriskt</li>";
        }

        if (empty($country)) {
            $error .= "<li>Land är obligatoriskt</li>";
        }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "<li>Ogiltig e-post</li>";
        }
        

        if ($error) {
            $msg = "<ul class='error_msg bg-danger'>{$error}</ul>";
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
                $msg = '<div class="success_msg bg-success">Användaren är uppdaterad</div>';
            } else {
                $msg = '<div class="error_msg bg-danger">Uppdateringen av användaren misslyckades. Var snäll och försök igen senare!</div>';
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
    <!DOCTYPE html>
    <html>
    <head>
        <title>Update user</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <h3 style="text-align: center;">Uppdatera Användare</h3>
        
            <div class="row justify-content-center">
                <div class="col-6">
                    <form method="POST" action="#" id="addUser-form">

                    <?=$msg?>

                      <div class="form-row">
                        <div class="col-6">
                          <input type="text" class="form-control" name="first_name" placeholder="Förnamn" value="<?=htmlentities($user['first_name'])?>">
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="last_name" value="<?=htmlentities($user['last_name'])?>" placeholder="Efternamn">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-6">
                          <input type="text" class="form-control" name="email" value="<?=htmlentities($user['email'])?>" placeholder="Email">
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="password" placeholder="Lösenord">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-6">
                          <input type="text" class="form-control" name="phone" value="<?=htmlentities($user['phone'])?>" placeholder="Telefon nr">
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="street" value="<?=htmlentities($user['street'])?>" placeholder="Gatuaddres">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-6">
                          <input type="text" class="form-control" name="postal_code" value="<?=htmlentities($user['postal_code'])?>" placeholder="Postnummer">
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="city" value="<?=htmlentities($user['city'])?>" placeholder="Stad">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-6">
                          <input type="text" class="form-control" name="country" value="<?=htmlentities($user['country'])?>" placeholder="Land">
                        </div>
                      </div>

                        <div class="row justify-content-center">
                            <div class="col-0">
                                <p>
                                    <button type="submit" name="update" class="btn btn-success">Uppdatera</button>
                                    <a class="btn btn-info" href="index.php" role="button">Tillbaka</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
