<?php
    require('../src/dbconnect.php');
    error_reporting(1);



    function editProd($conn){
        $edit_title = htmlspecialchars($_POST['title']);
        $edit_desc = $_POST['desc'];
        $edit_price = htmlspecialchars($_POST['price']);
        $edit_img = htmlspecialchars($_POST['img']);
        $edit_id = htmlspecialchars($_POST['id']);

        $sth = $conn->prepare("UPDATE `products` SET `title` = '$edit_title', `description` = '$edit_desc', `price` = '$edit_price', `img_url` = '$edit_img'  WHERE `id` = '$edit_id';");
        $sth->execute();
    }
    if($_GET['edit']=="true"){
        editProd($dbconnect);
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
?>

