<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="jumpingBallsStyle1.css"/>
        <title>Jump Balls</title>
    </head>
    <body>
        <div class="header-container">
            <?php
                session_start();
                if(isset($_SESSION["useridmail"]) && !empty($_SESSION["useridmail"])){
                    $username=$_SESSION["useridmail"];
                    echo '<a href="../index2.php"><h2>Hello '.$username.'</h2></a>';
                    echo '<p id="viewLabel1">Home</p>';
                }
                else {
                    header("Location: ../loginPage.php?error=logedout");
                    exit();
                }
            ?>
            <div class="log-container">
                <?php
                    if($_SESSION['status']==0){
                        echo '<p id="viewLabel2">View Profile</p>';
                        echo '<a href="../profile.php"><img src="../uploads/default.jpg" width="40px" height="40px"/></a>';
                    }
                    else{
                        echo '<p id="viewLabel2">View Profile</p>';
                        //code for correct profile image
                        $file="../uploads/".$_SESSION['useridmail']."."."*";
                        $fileinfo=glob($file);
                        $file=strtolower($fileinfo[0]);
                        $fileext=explode(".",$file);
                        $fileExt=end($fileext);
                        $file="../uploads/".$_SESSION['useridmail'].".".$fileExt;
                        echo '<a href="../profile.php"><img src="'.$file.'" width="40px" height="40px"/></a>';
                    }
                ?>
                <button onclick="location.href='../includes/logout.handler.php'">LOG OUT</button>
            </div>
        </div>
        <div class="container">
           <div class="header">
               <h1>Jumping Balls</h1>
               <p>Tap on the boxes bellow.</p>
           </div> 
           <div class="balls">Animating balls</div>
           <div class="boxes">
               <div id="box1"></div>
               <div id="box2"></div>
               <div id="box3"></div>
               <div id="box4"></div>
               <div id="box5"></div>
           </div>
        </div>
        <script src="jumpingBallsScript.js"></script>
        <script src="../scripts/viewLablesScript1.js"></script>
    </body>
</html>