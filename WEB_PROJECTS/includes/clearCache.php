<?php
    session_start();
    $filename="../cache/".$_SESSION['useridmail']."*";
    $fileArr=glob($filename);
    foreach($fileArr as $file){
        if(!unlink($file)){
            echo 'Error is clearin Cache';
            exit();
        }
    }
    echo 'Sucessfully removed Cache';
?>