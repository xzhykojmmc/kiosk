<?php
    include "cruzConnection.php";
    session_start();

    $cruzprodid = $_GET['cruzprodid'];

    $sql = "DELETE FROM cruzproducts WHERE id = '$cruzprodid'";

    if(mysqli_query($cruzConn, $sql)){
        header("location: cruzAdminProduct.php");
    }
?>