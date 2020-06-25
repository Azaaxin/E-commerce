<?php  
	session_start();

	require('../src/dbconnect.php');


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

	<br>
	<div class="container justify-content-center mb-4">
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
			<?php 
			
				$product_array = $_SESSION["products_shopping"];
			foreach($product_array as $key=>$val){
				?>
		    <tr>
		      <td><?=$val->title; ?></td>
		      <td><?=$val->description;?></td>
		      <td>
		      	<form class="justify-content-center col-md-6" action="delete-cart-item.php" method="POST">
		      		<input type="hidden" name="" value="<?="$key"?>">
					<button type="submit" class="btn">
				      	<svg class="bi bi-trash-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  	<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
					  	</svg>
					</button>
		      	</form>
			  </td>		      
		      <td><?=$val->price; ?></td>
		      <td><?=$val->price;?></td>
		    </tr>
			<?php } ?>
		  </tbody>
		</table>
	</div>
	<!--
	<div>	
		<form action="create-order.php" method="POST">
			<br>
			  <div class="form-row">
			    <div class="form-group col-4">
			      <label for="inputEmail4">Förnamn</label>
			      <input type="text" class="form-control" name="first_name" id="inputEmail4" placeholder="Förnamn">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputPassword4">Efternamn</label>
			      <input type="text" class="form-control" name="last_name" id="inputPassword4" placeholder="Efternamn">
			    </div>
			  </div>
			  <div class="form-row">
				  <div class="form-group col-md-4">
				    <label for="inputAddress">Epost</label>
				    <input type="text" class="form-control" name="email" id="inputAddress" placeholder="1234 Main St">
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword4">Lösenord</label>
				    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Lösenord">
				  </div>
				</div>
				<div class="form-row">
				  <div class="form-group col-md-4">
				    <label for="inputAddress">Adress</label>
				    <input type="text" class="form-control" name="street" id="inputAddress" placeholder="Adress">
				  </div>
				  	<div class="form-group col-md-4">
				    <label for="inputPassword4">Telefon</label>
				    <input type="number" class="form-control" name="phone" id="inputPhone" placeholder="Telefon">
				  </div>
				</div>
			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="inputCity">Stad</label>
			      <input type="text" class="form-control" name="city" id="inputCity">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputState">Land</label>
			      <select id="inputState" name="country" class="form-control">
			        <option selected>Välj</option>
			        <option>Sverige</option>
			      </select>
			    </div>
			    <div class="form-group col-md-2">
			      <label for="inputZip">Postnummer</label>
			      <input type="text" class="form-control" name="postal_code" id="inputZip">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" id="gridCheck">
			      <label class="form-check-label" for="gridCheck">
			        Check me out
			      </label>
			    </div>
			  </div>
			  <button type="submit" name="createOrderBtn" class="btn btn-primary">Köp</button>
		</form>
	</div> -->
	<div class="row justify-content-center">
                <div class="col-6">               
                    <form method="POST" action="create-order.php">
                        <fieldset>
                          <div id="form-row" class="form-row">
                            <div class="col-6">
                              <input type="text" class="form-control" name="first_name" placeholder="Förnamn" value="<?=htmlentities($first_name)?>">
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="last_name" value="<?=htmlentities($last_name)?>" placeholder="Efternamn">
                            </div>
                          </div>
                          <div id="form-row" class="form-row">
                            <div class="col-6">
                              <input type="text" class="form-control" name="email" value="<?=htmlentities($email)?>" placeholder="Email">
                            </div>
                            <div class="col-6">
                              <input type="password" class="form-control" name="password" placeholder="Lösenord">
                            </div>
                          </div>
                          <div id="form-row" class="form-row">
                            <div class="col-6">
                              <input type="text" class="form-control" name="phone" value="<?=htmlentities($phone)?>" placeholder="Telefon nr">
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="street" value="<?=htmlentities($street)?>" placeholder="Gatuaddres">
                            </div>
                          </div>
                          <div id="form-row" class="form-row">
                            <div class="col-6">
                              <input type="text" class="form-control" name="postal_code" value="<?=htmlentities($postal_code)?>" placeholder="Postnummer">
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="city" value="<?=htmlentities($city)?>" placeholder="Stad">
                            </div>
                          </div>
                          <div id="form-row" class="form-row">
                            <div class="col-6">
                              <input type="text" class="form-control" name="country" value="<?=htmlentities($country)?>" placeholder="Land">
                            </div>
                            <div class="col-6">
                              <input type="text" class="form-control" name="country" value="<?=htmlentities($country)?>" placeholder="Postnummer">
                            </div>
                          </div>
                            <div class="">
                                <div>     
                                        <button type="submit" name="register" class="btn btn-success" value="register">Genomför köp</button>
                                        <a class="btn btn-info" href="index.php" role="button">Tillbaka</a>      
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>


	




</body>
</html>