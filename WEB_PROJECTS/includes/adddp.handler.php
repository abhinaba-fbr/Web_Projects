<?php
    include_once 'database.handler.php';
    session_start();
    if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
        $file=$_FILES['file'];
        $filename=$file['name'];
        $fileLoc=$file['tmp_name'];
        $filesize=$file['size'];
        $fileerror=$file["error"];

        $fileinfo=explode(".",$filename);
        $fileExt=end($fileinfo);
        $fileExt=strtolower($fileExt);

        if($fileExt=='png' || $fileExt=='jpeg' || $fileExt=="jpg"){
            if($filesize<1000000){
                if($fileerror==0){
                    $sql='update usersimg set status=1 where username="'.$_SESSION['useridmail'].'";';
                    if($con_obj->query($sql)){
                        $_SESSION['status']=1;
                        $fileDes="../uploads/".$_SESSION['useridmail'].".".$fileExt;
                        move_uploaded_file($fileLoc,$fileDes);
                        header("Location: ../profile.php?upload=sucess");
                        exit();
                    }
                    else{
                        echo "Opps! SQL error.</br>";
                        echo '<a href="../profile.php">Return to login Page</a>';
                        exit();
                    }
                }
                else{
                    header("Location: ../profile.php?upload=error");
                    exit();
                }
            }
            else{
                header("Location: ../profile.php?upload=largesize");
                exit();
            }
        }
        else{
            header("Location: ../profile.php?upload=wrongformat");
            exit();
        }
    }
    else {
        header("Location: ../profile.php?upload=nothingattached");
        exit();
    }
?>