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

    if(isset($_POST['signin-btn'])){
        $username=refine_input($_POST['username']);
        $email=refine_input($_POST['email']);
        $password=refine_input($_POST['password']);
        $conPassword=refine_input($_POST['confirm-password']);

        if(!empty($username) && !empty($email) && !empty($password) && !empty($conPassword)){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header("Location: ../signinPage.php?error=invalidmail");
                exit();
            }
            $sql="select * from users where username=? or email=?;";
            $stmt=$con_obj->stmt_init();
            if($stmt->prepare($sql)){
                $stmt->bind_param('ss',$username,$email);
                $stmt->execute();
                $query=$stmt->get_result();
                $result=$query->fetch_all(MYSQLI_ASSOC);
                if(sizeof($result)==0){
                    if($password==$conPassword){
                        $stmt->close();
                        $password=password_hash($password,PASSWORD_DEFAULT);
                        $sql="insert into users(username,email,password) values(?,?,?);";
                        $stmt=$con_obj->stmt_init();
                        if($stmt->prepare($sql)){
                            $stmt->bind_param('sss',$username,$email,$password);
                            $stmt->execute();
                            $stmt->close();
                            $sql="insert into usersimg(username,status) values(?,0)";
                            $stmt=$con_obj->stmt_init();
                            if($stmt->prepare($sql)){
                                $stmt->bind_param('s',$username);
                                $stmt->execute();
                                $stmt->close();
                            }
                            else{
                                echo "Opps! Sql error.";
                                $con_obj->close();
                                exit();
                            }
                            header("Location: ../signinPage.php?signin=sucess");
                            $con_obj->close();
                            exit();
                        }
                        else {
                            echo "Opps! Sql error.";
                            $con_obj->close();
                            exit();
                        }
                    }
                    else {
                        header("Location: ../signinPage.php?error=passwordconfirmpasswordnotmatching");
                        $stmt->close();
                        $con_obj->close();
                        exit();
                    }
                }
                else {
                    foreach($result as $row){
                        if($row['username']==$username){
                            header("Location: ../signinPage.php?error=useridalreadytaken");
                            $stmt->close();
                            $con_obj->close();
                            exit();
                        }
                        else if($row['email']==$email){
                            header("Location: ../signinPage.php?error=mailalreadytaken");
                            $stmt->close();
                            $con_obj->close();
                            exit();
                        }
                    }
                }
            }
            else {
                echo "Opps! Sql error.";
                $con_obj->close();
                exit();
            }
        }
        else if(empty($username) && !empty($email) && !empty($password) && !empty($conPassword)){
            header("Location: ../signinPage.php?error=useridnotspecified");
            exit();
        }
        else if(!empty($username) && empty($email) && !empty($password) && !empty($conPassword)){
            header("Location: ../signinPage.php?error=mailnotspecified");
            exit();
        }
        else if(!empty($username) && !empty($email) && empty($password) && !empty($conPassword)){
            header("Location: ../signinPage.php?error=passwordnotspecified");
            exit();
        }
        else if(!empty($username) && !empty($email) && !empty($password) && empty($conPassword)){
            header("Location: ../signinPage.php?error=confirmpasswordnotspecified");
            exit();
        }
        else {
            header("Location: ../signinPage.php?error=fieldsnotspecified");
            exit();
        }
    }
    else {
        //do nothing (illegally acessed)
    }
?>