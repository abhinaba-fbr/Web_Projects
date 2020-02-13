<?php
    include_once 'database.handler.php';
    session_start();
    $file="../uploads/".$_SESSION['useridmail']."."."*";
    $fileinfo=glob($file);
    $file=strtolower($fileinfo[0]);
    $fileinfo=explode(".",$file);
    $fileExt=end($fileinfo);
    $file="../uploads/".$_SESSION['useridmail'].".".$fileExt;
    if(unlink($file)){
        $sql='update usersimg set status=0 where username="'.$_SESSION['useridmail'].'";';
        if($con_obj->query($sql)){
            $_SESSION['status']=0;
            header("Location: ../profile.php?upload=removed");
            $con_obj->close();
            exit();
        }
        else{
            echo "Opps! SQL error.</br>";
            echo '<a href="../profile.php">Return to login Page</a>';
            exit();
        }
    }
    else{
        header("Location: ../profile.php?upload=removeerror");
        exit();
    }

?>