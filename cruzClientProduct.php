<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cruzStyle_1.css">
    <title>Document</title>
    <style>
        body{
            padding: 50px;
        }
        .cruzcon{
            display: flex;
            flex-direction: row;
            padding: 20px;
            flex-wrap: wrap;
            gap: 50px;
        }
        .cruzcard{
            display: flex;
            flex-direction: column;
            padding: 30px;
            justify-content: center;
            align-items: center;
            gap: 20px;
            background-color: whitesmoke;
            border-radius: 20px;
        }
        .cruzviewbtn{
            padding: 7px;
            background-color: red;
            color: whitesmoke;
        }
        p{
            color: black;
        }
    </style>
</head>
<body>
    <h1>Available Products</h1>
    <br><br>
    <div class="cruzcon">
        <?php
        session_start();
        include "cruzConnection.php";

        $sql = "SELECT * FROM cruzproducts";
        $ressql = mysqli_query($cruzConn, $sql);

        if(mysqli_num_rows($ressql)>0){
            while($cruzprod = mysqli_fetch_assoc($ressql)){
                echo '
                    <div class="cruzcard">
                        <img src="data:image/jpeg;base64,' . base64_encode($cruzprod['cruz_Image']) . '" width="200">
                        <h5><p>' . $cruzprod['cruz_ProductName'] . '</p></h5>
                        <button class="cruzviewbtn" onclick="window.location.href=\'cruzBuyProduct.php?cruzprodid='. $cruzprod['id'] .'\'">Buy</button>
                    </div>
                ';
            }
        }
    ?>
    </div>
</body>
</html>