<?php
    session_start();
    if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
        $fileName=$_FILES['file']['name'];
        $fileLoc=$_FILES['file']['tmp_name'];
        $fileError=$_FILES['file']['error'];
        if(!$fileError){
            $fileinfo=explode('.',$fileName);
            $fileExt=end($fileinfo);
            $fileExt=strtolower($fileExt);
            $newName=$_SESSION['useridmail'].uniqid().".".$fileExt;
            $fileDest="cache/".$newName;
            move_uploaded_file($fileLoc,"../".$fileDest);
            echo "$fileDest";
        }
        else {
            echo "uploading error";
        }
    }
    else {
        echo "Not Set";
    }
?>