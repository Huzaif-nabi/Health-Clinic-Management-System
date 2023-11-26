<?php

include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `patient` where Patient_Id = '$id'";
    $result =mysqli_query($conn,$sql);
    if($result){
        header('location: patient_display.php');
    }else{
        die(mysqli_error($conn));
    } 

}

?>