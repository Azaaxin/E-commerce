<?php
    require('../src/dbconnect.php');
    //require(SRC_PATH . 'dbconnect.php');
    error_reporting(0);



    function writeProd($conn, $select, $from, $where) {
        $sth = $conn->prepare("SELECT $select FROM $from WHERE $where");
        
        $sth->execute();
        /* Fetch all of the remaining rows in the result set */
       // print("Fetch all of the remaining rows in the result set:\n");
        $result = $sth->fetchAll();
        //print_r($result);
        //return $result;
        $myJSON = json_encode($result);
        return $myJSON;
    }
    if($_GET['data'] == "main_prod"){
        echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "1");
    }
    
?>