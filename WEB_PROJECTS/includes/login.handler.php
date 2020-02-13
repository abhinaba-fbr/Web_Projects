<?php
    //user database.handler.php to connect to database
    require_once("database.handler.php");
    //refine input function
    function refine_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    //check if not tries to acess in an illegal way
    if(isset($_POST["login-btn"])){
        $useridmail=refine_input($_POST["useridmail"]);
        $password=refine_input($_POST["password"]);
        if(!empty($useridmail) && !empty($password)){
            //do work
            $sql="select * from users where username=? or email=?";
            $stmt=$con_obj->stmt_init();
            if($stmt->prepare($sql)) {
                $stmt->bind_param('ss',$useridmail,$useridmail);
                $stmt->execute();
                $query=$stmt->get_result();
                $row=$query->fetch_assoc();
                if($row){
                    if(password_verify($password,$row['password'])){
                        session_start();
                        $_SESSION["useridmail"]=$row['username'];
                        $_SESSION["email"]=$row['email'];
                        $stmt->close();
                        $sql="select status from usersimg where username=?";
                        $stmt=$con_obj->stmt_init();
                        if($stmt->prepare($sql)){
                            $stmt->bind_param('s',$_SESSION['useridmail']);
                            $stmt->execute();
                            $stmt->bind_result($_SESSION['status']);
                            $stmt->fetch();
                            $stmt->close();
                        }
                        else{
                            echo "Opps! Sql error.";
                            $con_obj->close();
                            echo '<a href="../loginPage.php">Return to login Page</a>';
                        }
                        header("Location: ../index2.php?login=sucess");
                        $con_obj->close();
                        exit();
                    }
                    else {
                        header("Location: ../loginPage.php?error=invalidpassword");
                        $stmt->close();
                        $con_obj->close();
                        exit();
                    }
                }
                else{
                    header("Location: ../loginPage.php?error=invaliduseridmail");
                    $stmt->close();
                    $con_obj->close();
                    exit();
                }
            }
            else {
                echo "Opps! Sql error.";
                $con_obj->close();
                echo '<a href="loginPage.php">Return to login Page</a>';
            }
        }
        else if(empty($useridmail) && !empty($password)){
            header("Location: ../loginPage.php?error=useridmailnotspecified");
            exit();
        }
        else if(!empty($useridmail) && empty($password)){
            header("Location: ../loginPage.php?error=passwordnotspecified");
            exit();
        }
        else {
            header("Location: ../loginPage.php?error=fieldsnotspecified");
            exit();
        }
    }
    else{
        // do nothing(tries to login without login-btn set)
    }
?>