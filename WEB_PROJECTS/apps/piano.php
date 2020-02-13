<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" tyep="text/css" href="pianoStyle1.css"/>
        <title>Piano</title>
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
                <h1>Piano</h1>
                <p>Enter any following key to listen to sounds</p>
            </div>
            <div class="keys-container">
                <ul>
                    <li>
                        <p>A</br>(C note)</p>
                        <audio src="../audio/C.mp3">audio1</audio>
                    </li>
                    <li>
                        <p>W</br>(C# note)</p>
                        <audio src="../audio/C1.mp3"></audio>
                    </li>
                    <li>
                        <p>S</br>(D note)</p>
                        <audio src="../audio/D.mp3">audio2</audio>
                    </li>
                    <li>
                        <p>E</br>(D# note)</p>
                        <audio src="../audio/D1.mp3"></audio>
                    </li>
                    <li>
                        <p>D</br>(E note)</p>
                        <audio src="../audio/E.mp3">audio3</audio>
                    </li>
                    <li>
                        <p>F</br>(F note)</p>
                        <audio src="../audio/F.mp3">audio4</audio>
                    </li>
                    <li>
                        <p>T</br>(F# note)</p>
                        <audio src="../audio/F1.mp3"></audio>
                    </li>
                    <li>
                        <p>G</br>(G note)</p>
                        <audio src="../audio/G.mp3">audio5</audio>
                    </li>
                    <li>
                        <p>Y</br>(G# note)</p>
                        <audio src="../audio/G1.mp3"></audio>
                    </li>
                    <li>
                        <p>H</br>(A note)</p>
                        <audio src="../audio/A.mp3">audio6</audio>
                    </li>
                    <li>
                        <p>U</br>(A# note)</p>
                        <audio src="../audio/A1.mp3"></audio>
                    </li>
                    <li>
                        <p>J</br>(B note)</p>
                        <audio src="../audio/B.mp3">audio7</audio>
                    </li>
                </ul>
            </div>
            <div class="effects-container">Effects</div>
        </div>
        <script src="pianoScript.js"></script>
        <script src="../scripts/viewLablesScript1.js"></script>
    </body>
</html>