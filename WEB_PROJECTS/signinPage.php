<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/signinStyle.css">
        <title>SignIn</title>
    </head>
    <body>
        <div class="container">
            <div class="container-top">
                <h1>Sign In</h1>
                <div class="alert-container">
                    <?php
                        if(isset($_GET['error'])){
                            $error=$_GET['error'];
                            if($error=="useridnotspecified")
                                echo "<p>Please enter Username</p>";
                            else if($error=="mailnotspecified")
                                echo "<p>Please enter Email Id</p>";
                            else if($error=="passwordnotspecified")
                                echo "<p>Please create your password</p>";
                            else if($error=="confirmpasswordnotspecified")
                                echo "<p>Confirm your password</p>";
                            else if($error=="invalidmail")
                                echo "<p>Enter a valid Email Id</p>";
                            else if($error=="useridalreadytaken")
                                echo "<p>Username already taken</p>";
                            else if($error=="mailalreadytaken")
                                echo "<p>Email Id already taken</p>";
                            else if($error=="passwordconfirmpasswordnotmatching")
                                echo "<p>Confirm your password correctly</p>";
                            else 
                                echo "<p>Enter all the fields</p>";
                        }
                        else if(isset($_GET['signin'])){
                            $signin=$_GET['signin'];
                            if($signin=="sucess")
                                echo "<p>Signed in sucessfully, can login now.</p>";
                            else 
                                echo "<p>Sign in failed.</p>";
                        }
                    ?>
                </div>
                <form  action="includes/signin.handler.php" method="post">
                    <input type="text" name="username" placeholder="Username"/>
                    <input type="email" name="email" placeholder="Email Id"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="confirm-password" placeholder="Confirm password"/>
                    <input type="submit" name="signin-btn" value="SIGN IN"/>
                </form>
            </div>
            <div class="container-bottom">
                <h3>Already have an account</h3>
                <a href="loginPage.php">LogIn here</a>
            </div>
        </div>
        <script src="scripts/signinScript.js"></script>
    </body>
</html>