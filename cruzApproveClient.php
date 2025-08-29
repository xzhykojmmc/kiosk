<?php
    session_start();

    include "cruzConnection.php";

    $cruzid = $_GET['cruzid'];

    $updatesql = "UPDATE cruzregistration SET cruz_Status = '1' WHERE id = '$cruzid'";

    $res = mysqli_query($cruzConn, $updatesql);

    if($res){
        echo "<script>alert('Approved');</script>";

        sleep(3);

        header("location: cruzViewClients.php");
    }
    else{
        echo "<script>alert('Something went wrong please try again.');</script>";

        sleep(3);

        header("location: cruzViewClients.php");
    }
?>