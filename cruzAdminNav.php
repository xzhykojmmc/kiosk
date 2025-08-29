<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cruzStyle_1.css">
    <title>Document</title>
    <style>
        body{
            background-color: lightsalmon;
            text-align: center;
            margin-top: 5px;
        }
        .adminbtn{
            background-color: red;
            border-color: green;
            color: white;
            font-size: 12px;
            width: 130px;
            height: 30px;
            margin: 2px;
        }
        .cruzlogout{
            background-color: green;
            border-color: green;
            color: white;
            font-size: 12px;
            width: 130px;
            height: 30px;
            margin: 2px;
        }
    </style>
</head>
<body>
    <a href="cruzViewOrders.php" target="mid_column"><button class="adminbtn">View Orders</button></a>
    <a href="cruzViewClients.php" target="mid_column"><button class="adminbtn">View Clients</button></a>
    <a href="cruzAdminProduct.php" target="mid_column"><button class="adminbtn">View Products</button></a>
    <a href="cruzAddProduct.php" target="mid_column"><button class="adminbtn">Add Products</button></a>
    <a href="cruzLogout.php" target="_parent"><button class="cruzlogout">Logout</button></a>
</body>
</html> 