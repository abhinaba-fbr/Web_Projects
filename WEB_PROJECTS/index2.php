<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/index6Style.css"/>
        <title>mainPage</title>
    </head>
    <body>
        <div class="header-container">
            <?php
                session_start();
                if(isset($_SESSION["useridmail"]) && !empty($_SESSION["useridmail"])){
                    $username=$_SESSION["useridmail"];
                    echo '<a href="#"><h2>Hello '.$username.'</h2></a>';
                    echo '<p id="viewLabel1">Home</p>';
                }
                else {
                    header("Location: loginPage.php?error=logedout");
                    exit();
                }
            ?>
            <div class="log-container">
                <?php
                    if($_SESSION['status']==0){
                        echo '<p id="viewLabel2">View Profile</p>';
                        echo '<a href="profile.php"><img src="uploads/default.jpg" width="40px" height="40px"/></a>';
                    }
                    else{
                        //code for correct profile image
                        $file="uploads/".$_SESSION['useridmail']."."."*";
                        $fileinfo=glob($file);
                        $file=strtolower($fileinfo[0]);
                        $fileext=explode(".",$file);
                        $fileExt=end($fileext);
                        $file="uploads/".$_SESSION['useridmail'].".".$fileExt;
                        echo '<p id="viewLabel2">View Profile</p>';
                        echo '<a href="profile.php"><img src="'.$file.'" width="40px" height="40px"/></a>';
                    }
                ?>
                <button onclick="location.href='includes/logout.handler.php'">LOG OUT</button>
            </div>
        </div>
        <div class="design-container">
            <h1>Site Name</h1>
        </div>
        <div class="apps-container">
            <h2>Apps</h2>
            <ul>
                <li style="background: url(img/piano.jpg); background-size: contain"><a href="apps/piano.php">Play Piano</a></li>
                <li style="background: url(img/balls.jpg); background-size: cover"><a href="apps/jumpingBalls.php">Jumping Balls</a></li>
            </ul>                        
        </div>
        <script src="scripts/logout.js"></script>
        <script src="scripts/viewLablesScript1.js"></script>
        <script src="scripts/clearCache.js"></script>
    </body>
<html>