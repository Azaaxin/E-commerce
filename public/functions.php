<?php
    require('../src/dbconnect.php');
    error_reporting(0);
    function delete_prod($conn){
        $sth = $conn->prepare("DELETE FROM `products` WHERE `id` = :id;");
        $sth->bindParam(':id', $_POST['id']);
        $sth->execute();
        echo "Destroyed";
    }
    if($_GET['delete']=="true"){
        delete_prod($dbconnect);
    }

    function editProd($conn){
        $edit_title = htmlspecialchars($_POST['title']);
        $edit_desc = $_POST['desc'];
        $edit_price = htmlspecialchars($_POST['price']);
        $edit_img = htmlspecialchars($_POST['img']);
        $edit_id = htmlspecialchars($_POST['id']);

        $sth = $conn->prepare("UPDATE `products` SET `title` = :title, `description` = :description, `price` = :price, `img_url` = :img_url WHERE `id` = :id;");
        $sth->bindParam(':title', $edit_title);
        $sth->bindParam(':description', $edit_desc);
        $sth->bindParam(':price', $edit_price);
        $sth->bindParam(':img_url', $edit_img);
        $sth->bindParam(':id', $edit_id);
        $sth->execute();
    }
    if($_GET['edit']=="true"){
        editProd($dbconnect);
    }
    
    function createProd($conn){
        $create_title = htmlspecialchars($_POST['title']);
        $create_desc = $_POST['desc'];
        $create_price = htmlspecialchars($_POST['price']);
        $create_img = htmlspecialchars($_POST['img']);

        $sth = $conn->prepare("INSERT INTO `products` (`title`, `description`, `price`, `img_url`) VALUES (:title, :description, :price, :img_url)");
        $sth->bindParam(':title', $create_title);
        $sth->bindParam(':description', $create_desc);
        $sth->bindParam(':price', $create_price);
        $sth->bindParam(':img_url', $create_img);
        $sth->execute();
        echo "success";
    }
    if($_GET['create']=="true"){
        createProd($dbconnect);
    }

    function writeProd($conn, $select, $from, $where, $like, $like2, $like3) {
        if($like == "" || $like == null && $like2 == null && $like3 == null){
            $sth = $conn->prepare("SELECT $select FROM $from WHERE $where");
        }else{
          $sth = $conn->prepare("SELECT $select FROM $from WHERE $where LIKE $like OR $where LIKE $like2 OR $where LIKE $like3");
        }
        $sth->execute();
        $result = $sth->fetchAll();
        $myJSON = json_encode($result);
        return $myJSON;
    }
    if($_GET['data'] == "main_prod"){
        echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "1", null, null, null);
    }elseif($_GET['data'] == "rec_prod"){
        echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "`title`", "'%oneplus%'", "'%iphone%'", "'%NOKIA%'");
    }elseif($_GET['data'] == "front_brand"){
        $brandFilter = $_GET['filter'];
        echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "`title`", "'%" . $brandFilter . "%'", "NULL", "NULL");
    }elseif($_GET['data'] == "prod"){
        $id = $_GET['id'];
        $brandFilter = $_GET['filter'];
        echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "`id`=". $id ."", null, null, null);
    }elseif($_GET['data'] == "search"){
        $search = $_GET['search'];
        $brandFilter = $_GET['filter'];
        echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "`title`", "'%" . $search . "%'", "NULL", "NULL");
    }

    function shopping_cart($dbconnect){
        session_start();
        if(!empty($_GET['id'])){
        $fromDB = writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "`id`=". $_GET['id'] ."", null, null, null);
        $array_dump = $_SESSION["products_shopping"];
            if($_SESSION["products_shopping"] == NULL){
               // $_SESSION["products_shopping"] = array(json_decode(writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "`id`=". $_GET['id'] ."", null, null, null)));
                $filler = [];
                $_SESSION["products_shopping"] = array_merge($filler, json_decode($fromDB));
            }else{ 
                $_SESSION["products_shopping"] = array_merge($array_dump, json_decode($fromDB));
            }
        }
            echo json_encode($_SESSION["products_shopping"]);
            if($_GET['s_d'] == "true")
                session_destroy();
    }
    if($_GET['cart']=="true"){
        shopping_cart($dbconnect);
    }
    function remove_from_shoppingcart(){
        session_start();
        // $res = array_filter($_SESSION["products_shopping"], function($x) {
        //     $id = '2';
        //     return $x["id"] != $id;
        // });
        
        // print_r($res);
            
    
         $arrays = array($_SESSION["products_shopping"]);  
         $flat = call_user_func_array('array_merge', $arrays);
         $res = array_filter($flat, function($x) {
             $id = '5';
             return $x["id"] == '2';
         });
 
          echo json_encode($res);
    }
    if($_GET['del_cart']=="true"){
        remove_from_shoppingcart();
    }
?>

