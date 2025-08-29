<?php
    session_start();

    include "cruzConnection.php";

    if(isset($_POST['cruzSignUp'])){
        $cruzfname = $_POST['fname'];
        $cruzlname = $_POST['lname'];
        $cruzemail = $_POST['email'];
        $cruzuname = $_POST['uname'];
        $cruzpass = $_POST['pass'];
        $cruzcpass = $_POST['cpass'];
        $_SESSION['cruzres'] = 0;

        if($cruzpass === $cruzcpass){
            $sql = "INSERT INTO cruzregistration (cruz_Fname,cruz_Lname,cruz_Email,cruz_Username,cruz_Password,cruz_ConfirmedPassword,cruz_Type,cruz_Status) VALUES ('$cruzfname','$cruzlname','$cruzemail','$cruzuname','$cruzpass','$cruzcpass', 0, 0)";

            $regsql = mysqli_query($cruzConn, $sql);

            $_SESSION['cruzfname'] = $cruzfname;
            $_SESSION['cruzres'] = 1;

            header("location: cruzRegisteroutput.php");

        }
        else{
            $_SESSION['cruzres'] = 0;

            header("location: cruzRegisteroutput.php");
        }
    }
?>