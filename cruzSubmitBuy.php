<?php
    session_start();
    include "cruzConnection.php";

    if(isset($_POST['cruzbuybtn'])){
        $cruzusername = $_SESSION['cruzusername'];

        $cruzbuyername = $_POST['cruzbuyername'];
        $cruzquantity = $_POST['cruzquantity'];
        $cruzprodid = $_GET['id'];

        $sql = "SELECT * FROM cruzproducts WHERE id ='$cruzprodid'";
        $cruzbuyq = mysqli_query($cruzConn,$sql);

        if(mysqli_num_rows($cruzbuyq)===1){
            $cruzprod = mysqli_fetch_assoc($cruzbuyq);

            $cruzproductname = $cruzprod['cruz_ProductName'];
            $cruzpriceperunit = $cruzprod['cruz_PriceperUnit'];

            $cruztotalprice = $cruzpriceperunit * $cruzquantity;

            $cruzinsertbuy = "INSERT INTO cruzorders (cruz_BuyerName,cruz_ProductName,cruz_ProductPrice,cruz_Quantity,cruz_TotalPrice, cruz_Account) VALUES ('$cruzbuyername','$cruzproductname','$cruzpriceperunit','$cruzquantity','$cruztotalprice','$cruzusername')";

            if(mysqli_query($cruzConn,$cruzinsertbuy)){
                header("location: cruzClientProduct.php");
            }
            else{
                header("location: cruzClientProduct.php");
            }
        }

    }
?>