<?php
    session_start();

    include "cruzConnection.php";

    if(isset($_POST['cruzLogIn'])){
        $cruzuname = $_POST['uname'];
        $cruzpass = $_POST['pass'];

        $cruzverifysql =  "SELECT * FROM cruzregistration WHERE cruz_Username = '$cruzuname'";

        $cruzverify = mysqli_query($cruzConn,$cruzverifysql);

        if(mysqli_num_rows($cruzverify)===1)
        {
            $cruzuser = mysqli_fetch_assoc($cruzverify);

            $cruzvpass = $cruzuser['cruz_Password'];
            $cruzusername = $cruzuser['cruz_Username'];
            $cruztype = $cruzuser['cruz_Type'];
            $cruzstatus = $cruzuser['cruz_Status'];
            $cruzfname = $cruzuser['cruz_Fname'];
            
            if ($cruzpass === $cruzvpass) {

                switch($cruztype){
                    case '0':
                        if($cruzstatus === '1'){

                            $_SESSION['cruzusername']=$cruzusername;
                            echo "<script>
                                alert('Successful Log in. Welcome, Client {$cruzfname}.');

                                parent.frames['nav_column'].location.href = 'cruzClientNav.php';
                                parent.frames['mid_column'].location.href = 'cruzClientProduct.php';
                            </script>";
                        }
                        else{
                            header("Location: cruzLogin.php?message=Your account is still not approved by the admin.");
                            exit(); 
                        }
                        break;
                    case '1':
                        $_SESSION['cruzusername']=$cruzusername;
                        echo "<script>
                            alert('Successful Log in. Welcome, Admin {$cruzfname}.');

                            parent.frames['nav_column'].location.href = 'cruzAdminNav.php';
                            parent.frames['mid_column'].location.href = 'cruzAdminProduct.php';
                        </script>";
                        break;
                    default:
                        header("Location: cruzGuestProduct.php");
                }
                exit();
            }
            else{
                header("Location: cruzLogin.php?message=Incorrect Password");
                exit();
            }
        }
        else{
            header("Location: cruzLogin.php?message=User does not exist");
            exit();
        }
    }
?>