<?php

    require('../../src/dbconnect.php');
    





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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center;">Användare</h1>

    <div id="content" style="">
        <article class="admin-page">
        
        <a class="btn btn-success ml-1 mb-3" href="add_user.php" role="button">Skapa ny Användare</a>
           
            <table class="table table-striped">
              <thead style="background-color: #67539E; color: white; margin-top: 50px;">
                <tr>  
                  <th scope="col">#Id</th>
                  <th scope="col">Förnamn</th>
                  <th scope="col">Efternamn</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Lösenord</th>
                  <th scope="col">Telefon nr</th>
                  <th scope="col">Gatuaddres</th>
                  <th scope="col">Postkod</th>
                  <th scope="col">Stad</th>
                  <th scope="col">Land</th>
                  <th scope="col"></th>
                  <th scope="col"></th>

                </tr>

              </thead>
                
                <?php foreach ($users as $key => $user) { ?>
              <tbody>

                <tr>
                
                  <th scope="row"><?=htmlentities($user['id'])?></th>
                  <td><?=htmlentities($user['first_name'])?></td>
                  <td><?=htmlentities($user['last_name'])?></td>
                  <td><?=htmlentities($user['email'])?></td>
                  <td><?=htmlentities($user['password'])?></td>
                  <td><?=htmlentities($user['phone'])?></td>
                  <td><?=htmlentities($user['street'])?></td>
                  <td><?=htmlentities($user['postal_code'])?></td>
                  <td><?=htmlentities($user['city'])?></td>
                  <td><?=htmlentities($user['country'])?></td>
                  <td>
                      <form action="update_user.php" method="GET">
                            <input type="hidden" name="id" value="<?=$user['id']?>">
                            <button type="submit" name="register" class="btn btn-info" value="register">Redigera</button>
                     </form>
                  </td>
                  <td>
                      <form action="" method="POST">
                            <input type="hidden" name="userId" value="<?=$user['id']?>">
                            <button type="submit" name="deleteUserBtn" class="btn btn-danger" value="register">Radera</button>
                     </form>

                     

                  </td>
                </tr>

                   


              </tbody>
              <?php } ?>
            </table>
          

        </article>



</body>
</html>