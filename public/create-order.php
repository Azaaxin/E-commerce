<?php 

echo "<pre>";
print_r($_POST);
echo "</pre>";

	
	require('../src/dbconnect.php');

	echo "<pre>";
	print_r($_SESSION["products_shopping"]);
	echo "<pre>";



if (isset($_POST['createOrderBtn']));{
	$firstName 		= trim($_POST['firstName']);
    $lastName 		= trim($_POST['lastName']);
    $email 			= trim($_POST['email']);
    $password 		= trim($_POST['password']);
    $phone 			= trim($_POST['phone']);
    $street 		= trim($_POST['street']);
    $city 			= trim($_POST['city']);
    $country 		= trim($_POST['country']);
    $postalCode 	= trim($_POST['postalCode']);

    try {
    	$query = "
    		SELECT * FROM users
    		WHERE email = :email
    	";

    	$stmt = $dbconnect->prepare($query);
    	$stmt->bindValue(':email', $email);
    	$stmt->execute();
    	$user = $stmt->fetch();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }



    if($user) {
    	$userId = $user['id'];
    } else {
    	try {
            $query = "
                INSERT INTO users (first_name, last_name, email, password, phone, street, postal_code, city, country)
                VALUES (:firstName, :lastName, :email, :password, :phone, :street, :postalCode, :city, :country);
            ";

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':street', $street);
            $stmt->bindValue(':postalCode', $postalCode);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':country', $country); 
            $stmt->execute();
            $userId = $dbconnect->lastInsertId();
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    


    try {
        $query = "
            INSERT INTO orders (user_id, total_price, billing_full_name, billing_street, billing_postal_code, billing_city, billing_country)
            VALUES (:userId, :last_name, :phone, :street, :postal_code, :city, :country);
        ";

        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':userId', $userId);
        $stmt->bindValue(':totalPrice', $totalPrice);
        $stmt->bindValue(':fullName', "{$firstName} {$lastName}");
        $stmt->bindValue(':street', $street);
        $stmt->bindValue(':postalCode', $postalCode);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':country', $country);
        $stmt->execute();
        $orderId = $dbconnect->lastInsertId();
    } catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }


    try {
        $query = "
            INSERT INTO orders (user_id, total_price, billing_full_name, billing_street, billing_postal_code, billing_city, billing_country)
            VALUES (:userId, :last_name, :phone, :street, :postal_code, :city, :country);
        ";

        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':userId', $userId);
        $stmt->bindValue(':totalPrice', $totalPrice);
        $stmt->bindValue(':fullName', "{$firstName} {$lastName}");
        $stmt->bindValue(':street', $street);
        $stmt->bindValue(':postalCode', $postalCode);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':country', $country);
        $stmt->execute();
        $orderId = $dbconnect->lastInsertId();
    } catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
    
    $product_array = $_SESSION["products_shopping"];
	foreach($product_array as $key=>$val)
		try {
	        $query = "
	            INSERT INTO order_items (order_id, product_id, quantity, unit_price, product_title)
	            VALUES (:orderId, :productId, :quantity, :price, :title);
	        ";

	        $stmt = $dbconnect->prepare($query);
	        $stmt->bindValue(':orderId', $userId);
	        $stmt->bindValue(':productId', $val->id);
	        $stmt->bindValue(':quantity', $val->quantity);
	        $stmt->bindValue(':price', $val->price);
	        $stmt->bindValue(':title', $val->title);
	        $stmt->execute();
	    } catch(\PDOException $e) {
	        throw new \PDOException($e->getMessage(), (int) $e->getCode());
	    }

	unset($_SESSION["products_shopping"]);
	header('location: order-confirmation.php');
	exit;
   
	} 


}

header('location: checkout.php');
exit;












