<?php  
	session_start();
	require('../src/dbconnect.php');

	echo "<pre>";
	print_r($_SESSION["products_shopping"]);
	echo "<pre>";


	try {
	    $query = "
	        SELECT * FROM products
	    ";

	    $stmt = $dbconnect->query($query);
	    $products = $stmt->fetchAll();
	} catch (\PDOException $e) {
	    throw new \PDOException($e->getMessage(), (int) $e->getCode());
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Out</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<table class="table table-borderless">
		  <thead>
		    <tr>
		      <th style="width: 10%;" scope="col">Produkt</th>
		      <th style="width: 50%;" scope="col">Info</th>
		      <th style="width: 10%;" scope="col"></th>
		      <th style="width: 10%;" scope="col">Antal</th>
		      <th style="width: 10%;" scope="col">Pris per produkt</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php foreach  ($_SESSION["products_shopping"] as $productId => $product) {?> 
		    <tr>
		      <td><?=$productId['title']?></td>
		      <td><?=$productId['description']?></td>
		      <td>
		      	<form action="delete-cart-item.php" method="POST">
		      		<input type="hidden" name="" value="">
					<button type="submit" class="btn">
				      	<svg class="bi bi-trash-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  	<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
					  	</svg>
					</button>
		      	</form>
			  </td>		      
		      <td><?=$productId['description']?></td>
		      <td><?=$productId['price']?></td>
		    </tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>

	




</body>
</html>