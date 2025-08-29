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

        table{
            width: 100%;
            text-align: center;
        }
        table, th, td{
            border: 1px solid whitesmoke;
            border-collapse: collapse;
        }
        th{
            background-color: powderblue;
            font-size: 20px;
            font-family: Helvetica;
            color: green;
        }
        th, td{
            padding: 5px;
            text-align: center;
            
        }
        p{
            text-align: center;
        }
        .cruzappbtn{
             background-color: yellowgreen;
            border-color: green;
            color: white;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>View Orders</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Buyer Name</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Account</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "cruzConnection.php";

                $cruzsql = "SELECT * FROM cruzorders";
                $cruzres = mysqli_query($cruzConn,$cruzsql);

                if(mysqli_num_rows($cruzres)>0){
                    while($cruzusers = mysqli_fetch_assoc($cruzres)){
                        echo "<tr>
                        <td><p>{$cruzusers['order_id']}</p></td>
                        <td><p>{$cruzusers['cruz_BuyerName']}</p></td>
                        <td><p>{$cruzusers['cruz_ProductName']}</p></td>
                        <td><p>{$cruzusers['cruz_ProductPrice']}</p></td>
                        <td><p>{$cruzusers['cruz_Quantity']}</p></td>
                        <td><p>{$cruzusers['cruz_TotalPrice']}</p></td>
                        <td><p>{$cruzusers['cruz_Account']}</p></td>
                        </tr>";
                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='9'>No clients found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>

    <?php
    ?>
</body>
</html>