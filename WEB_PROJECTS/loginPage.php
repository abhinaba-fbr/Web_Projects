<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/loginStyle.css"/>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="container-top">
                <h1>Login</h1>
                <div class="alert-container">
                    <!-- <p>alert container</p> -->
                    <?php 
                        if(isset($_GET['error'])){
                            $error = $_GET['error'];
                            if($error=="fieldsnotspecified")
                                echo('<p>Please fill in the fields</p>');
                            else if($error=="useridmailnotspecified")
                                echo('<p>Please enter the Username/Email</p>');
                            else if($error=="passwordnotspecified")
                                echo('<p>Please enter the password</p>');
                            else if($error=="invalidpassword")
                                echo('<p>Invalid password</p>');
                            else if($error=="invaliduseridmail")
                                echo('<p>Invalid Username/Email</p>');
                            else if($error=="logedout")
                                echo('<p>You are logged out!</p>');
                        }
                    ?>
                </div>
                <form action="includes/login.handler.php" method="post">
                    <input type="text" name="useridmail" placeholder="username or email"/>
                    <input type="password" name="password" placeholder="password"/>
                    <input type="submit" name="login-btn" value="LOGIN"/>
                </form>
            </div>
            <div class="container-bottom">
                <h3>New User</h3>
                <a href="signinPage.php">SignIn here</a>
            </div>
        </div>
        <script src="scripts/loginScript.js"></script>
    </body>
</html>