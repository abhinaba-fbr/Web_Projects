<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/profileStyle.css"/>
        <title>Profile Page</title>
    </head>
    <body>
        <div class="header-container">
            <?php
                session_start();
                if(isset($_SESSION["useridmail"]) && !empty($_SESSION["useridmail"])){
                    $username=$_SESSION["useridmail"];
                    echo '<a href="index2.php"><h2>Hello '.$username.'</h2></a>';
                    echo '<p id="viewLabel1">Home</p>';
                }
                else {
                    header("Location: loginPage.php?error=logedout");
                    exit();
                }
            ?>
            <button onclick="location.href='includes/logout.handler.php'">LOG OUT</button>
        </div>
        <div class="dp-container">
            <?php
                if($_SESSION['status']==0){
                    echo '<i class="material-icons hide">close</i>';
                    echo '<img id="image" src="uploads/default.jpg" width="300px" height="300px"/>';
                    echo '<form action="includes/adddp.handler.php" method="POST" enctype="multipart/form-data"><div class="inputs">
                                <input type="file" name="file"/>
                                <input class="hide" type="submit" value="Confirm Change" name="upload"/>
                            </div></form>';
                }
                else{
                    //code for correct profile image
                    $file="uploads/".$_SESSION['useridmail']."."."*";
                    $fileinfo=glob($file);
                    $file=strtolower($fileinfo[0]);
                    $fileext=explode(".",$file);
                    $fileExt=end($fileext);
                    $file="uploads/".$_SESSION['useridmail'].".".$fileExt;
                    echo '<img src="'.$file.'" width="300px" height="300px"/>';
                    echo '<form action="includes/removedp.handler.php" method="POST">
                                <input type="submit" value="Remove Dp" name="remove"/>
                            </form>';
                }
            ?>
        </div>
        <div class="alert-container">
            <?php
                if(isset($_GET['upload'])){
                    $uploadStatus=$_GET['upload'];
                    if($uploadStatus=='sucess')
                        echo '<p>Sucessfully Changed</p>';
                    else if($uploadStatus=='error')
                        echo '<p>Error in uploading! Try again</p>';
                    else if($uploadStatus=='largesize')
                        echo '<p>File size is larger than 1MB, upload a smaller sized image</p>';
                    else if($uploadStatus=='wrongformat')
                        echo '<p>Unsupported image format</p>';
                    else if($uploadStatus=='removed')
                        echo '<p>Sucessfully Removed Dp</p>';
                    else if($uploadStatus=='removeerror')
                        echo '<p>Error in removing! Try again</p>';
                    else if($uploadStatus=='nothingattached')
                        echo '<p>Please select an image</p>';
                }
            ?>
        </div>
        <div class="info-container">
            <p>___________________________________________</p>
            <?php
                echo '<h1>'.$_SESSION['useridmail'].'</h1>';
                echo '<h1>'.$_SESSION['email'].'</h1>';
            ?>
        </div>
        <script src="scripts/profileScript2.js"></script>
        <script src="scripts/viewLablesScript1.js"></script>
    </body>
</html>