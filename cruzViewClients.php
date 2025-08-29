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
    <h1>View Clients</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Password</th>
                <th>Confirmed Password</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "cruzConnection.php";

                $cruzsql = "SELECT * FROM cruzregistration WHERE cruz_Type = 0";
                $cruzuserres = mysqli_query($cruzConn,$cruzsql);

                if(mysqli_num_rows($cruzuserres)>0){
                    while($cruzusers = mysqli_fetch_assoc($cruzuserres)){
                        echo "<tr>
                        <td><p>{$cruzusers['id']}</p></td>
                        <td><p>{$cruzusers['cruz_Fname']}</p></td>
                        <td><p>{$cruzusers['cruz_Lname']}</p></td>
                        <td><p>{$cruzusers['cruz_Email']}</p></td>
                        <td><p>{$cruzusers['cruz_Username']}</p></td>
                        <td><p>{$cruzusers['cruz_Password']}</p></td>
                        <td><p>{$cruzusers['cruz_ConfirmedPassword']}</p></td>
                        <td><p>Client</p></td>";

                    if ($cruzusers['cruz_Status'] === '0') {
                        echo "<td><button class='cruzappbtn' onclick=\"window.location.href='cruzApproveClient.php?cruzid=" . $cruzusers['id'] . "'\">Approve</button></td>";
                    } else {
                        echo "<td><p>Approved</p></td>";
                    }

                    echo "</tr>";

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