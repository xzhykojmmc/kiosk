<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cruzStyle_1.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        $cruzres = $_SESSION['cruzres'];

        if($cruzres === 1){
    ?>
        <h1>Registered successfully</h1>
        <?php
            $cruzfname = $_SESSION['cruzfname'];
        ?>
        <h2>Hello, <span style="color: red;"><?php echo $cruzfname; ?></span>! You are now registered, please wait for the admin to approve your account.</h2>
        <br>
    <?php
        }

        else{
    ?>
        <h1>Registration failed.</h1>
        <h2>Passwords should match. Please try again.</h2>
        <br>
    <?php
        }

        session_destroy();
    ?>
    
    <a href="cruzRegister.php"><button class="cruzClear">Return</button></a>
</body>
</html>