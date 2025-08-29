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
    <h1>Edit Product</h1>
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
                            <form action="cruzUpdateProduct.php?cruzprodid='. $cruzprod['id'] .'" method="post">
                                <table>
                                <tr>
                                    <td><p>Product Name: </p></td>
                                    <td><input type="text" name="cruzprodname" value="'. $cruzprod['cruz_ProductName'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Unit: </p></td>
                                    <td><input type="text" name="cruzunit" value="'. $cruzprod['cruz_Unit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit: </p></td>
                                    <td><input type="text" name="cruzpriceunit" value="'. $cruzprod['cruz_PriceperUnit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><button class="cruzviewbtn" name="cruzupdatebtn" type="submit" style="background-color: green">Update</button></td>
                                    <td><button class="cruzviewbtn" style="background-color: blue" onclick="window.location.href=\'cruzAdminProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
                ';
        }
    ?>
    </div>
</body>
</html>