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
        table{
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Add Product</h1>
    <br><br>
    <div class="cruzcon">
        <div class="cruzcard">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan='2'><input type="file" name="img" style="padding: 5px; font-size: 15px;"></td>
                        </tr>
                        <tr>
                            <td><p>Product Name: </p></td>
                            <td><input type="text" name="cruzprodname" required></td>
                        </tr>
                        <tr>
                            <td><p>Unit: </p></td>
                            <td><input type="text" name="cruzunit" required></td>
                        </tr>
                        <tr>
                            <td><p>Price per Unit: </p></td>
                            <td><input type="text" name="cruzpriceunit" required></td>
                        </tr>
                        <tr>
                            <td><button class="cruzviewbtn" name="cruzaddbtn" type="submit" style="background-color: green">Add</button></td>
                            <td><button class="cruzviewbtn" style="background-color: blue" onclick="window.location.href='cruzAdminProduct.php'">Cancel</button></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>

    <?php
        session_start();
        include "cruzConnection.php";

        if (isset($_POST['cruzaddbtn']) && isset($_FILES['img'])) {
            $cruzprodname = $_POST['cruzprodname'];
            $cruzunit = $_POST['cruzunit'];
            $cruzpriceunit = $_POST['cruzpriceunit'];
            $cruzimage = file_get_contents($_FILES['img']['tmp_name']);

            $stmt = $cruzConn->prepare("INSERT INTO cruzproducts (cruz_ProductName, cruz_Unit, cruz_PriceperUnit, cruz_Image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssb", $cruzprodname, $cruzunit, $cruzpriceunit, $null);

            $null = NULL;
            $stmt->send_long_data(3, $cruzimage);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Added successfully');
                        setTimeout(() => { window.location.href = 'cruzAddProduct.php'; }, 3000);
                    </script>";
            }
            $stmt->close();
        }

    ?>
</body>
</html>