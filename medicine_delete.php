<?php

include 'connection.php';
if(isset($_GET['deleteid'])){
    $ndc=$_GET['deleteid'];

    $sql="delete from `medicine` where `National Drug Code` = '$ndc'";
    $result =mysqli_query($conn,$sql);
    if($result){
        header('location: medicine_display.php');
    }else{
        die(mysqli_error($conn));
    } 

}

?>