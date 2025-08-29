<?php
    session_start();

    include "cruzConnection.php";

    if(isset($_POST['cruzupdatebtn'])){
        $cruzprodid = $_GET['cruzprodid'];
        $cruzprodname = $_POST['cruzprodname'];
        $cruzunit = $_POST['cruzunit'];
        $cruzpriceunit = $_POST['cruzpriceunit'];
        $query = "UPDATE cruzproducts SET cruz_ProductName='$cruzprodname', cruz_Unit='$cruzunit', cruz_PriceperUnit='$cruzpriceunit' WHERE id='$cruzprodid'";

        if(mysqli_query($cruzConn, $query)){
            header("location: cruzViewProduct.php?cruzprodid={$cruzprodid}");
        }
    }

?>