<?php

include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `doctor` where Doctor_Id = '$id'";
    $result =mysqli_query($conn,$sql);
    if($result){
        header('location: doctor_display.php');
    }else{
        die(mysqli_error($conn));
    } 

}

?>