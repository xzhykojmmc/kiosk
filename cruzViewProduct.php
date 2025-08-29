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
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 50px;
        }
        .cruzcard{
            display: flex;
            flex-direction: row;
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
            width: 100px;
        }
        p{
            color: black;
        }
        input{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>Admin Product</h1>
    <br><br>
    <div class="cruzcon">
        <?php
        session_start();
        include "cruzConnection.php";
        
        $cruzprodid = $_GET['cruzprodid'];

        $sql = "SELECT * FROM cruzproducts WHERE id = '$cruzprodid'";
        $ressql = mysqli_query($cruzConn, $sql);

        if(mysqli_num_rows($ressql)===1){
            $cruzprod = mysqli_fetch_assoc($ressql);
            echo '
                    <div class="cruzcard">
                        <img src="data:image/jpeg;base64,' . base64_encode($cruzprod['cruz_Image']) . '" width="200">
                        <div>
                            <table>
                                <tr>
                                    <td><p>Product Name: </p></td>
                                    <td><input type="text" name="cruzprodname" value="'. $cruzprod['cruz_ProductName'] .'"disabled></td>
                                </tr>
                                <tr>
                                    <td><p>Unit: </p></td>
                                    <td><input type="text" name="cruzunit" value="'. $cruzprod['cruz_Unit'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit: </p></td>
                                    <td><input type="text" name="cruzpriceunit" value="'. $cruzprod['cruz_PriceperUnit'] .'" disabled></td>
                                </tr>
                                <tr>
                                    <td><button class="cruzviewbtn" style="background-color: green" onclick="window.location.href=\'cruzEditProduct.php?cruzprodid='. $cruzprod['id'] .'\'">Edit</button></td>
                                    <td><button class="cruzviewbtn" onclick="window.location.href=\'cruzDeleteProduct.php?cruzprodid='. $cruzprod['id'] .'\'">Delete</button></td>
                                </tr>
                                <tr>
                                    <td><button class="cruzviewbtn" style="background-color: blue" onclick="window.location.href=\'cruzAdminProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ';
        }
    ?>
    </div>
</body>
</html>