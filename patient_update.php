<?php
include 'connection.php';
$id=$_GET['updateid'];

if (isset($_POST['submit'])) {

    $password = $_POST['password'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $disease = $_POST['disease'];
    $allergy = $_POST['allergy'];
    $previous_history = $_POST['previoushistory'];
    $description = $_POST['description'];
    $medicine_name = $_POST['medicinename'];
    $medical_dosage = $_POST['medicaldosage'];

    $sql = "update `patient` set Patient_Password = '$password',Patient_Name = '$name', Age = $age,Gender = '$gender',`Blood Group` ='$blood_group',Address = '$address',Disease = '$disease',Allergy = '$allergy',`Previous History` = '$previous_history',Description = '$description',`Medicine Prescribed`='$medicine_name',`Medicine Dosage`='$medical_dosage' where Patient_Id = '$id' ";

    $result = mysqli_query($conn, $sql);
    

    if ($result) {
        // echo "updated successfully";
        header("location:patient_display.php");
    } else {
        die(mysqli_error($conn));
    }
}

if (isset($_POST['Logout'])) {
    session_destroy();
    header("location: logic.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <form method="post">
        <!-- <div class="form-group">
                <label>Patient Id</label>
                <input type="text" class="form-control" placeholder="Enter unique Patient Id" name="patientid"
                    autocomplete="off">
            </div> -->
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Enter your Password" name="password"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Name</label>-
                <input type="text" class="form-control" placeholder="Enter your Name" name="name" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter your Age" name="age" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" class="form-control" placeholder="Enter your Gender" name="gender"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Blood Group</label>
                <input type="text" class="form-control" placeholder="Enter your Blood Group" name="bloodgroup"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" placeholder="Enter your Address" name="address" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label>Disease</label>
                <textarea class="form-control" placeholder="Enter the disease" name="disease" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label>Allergy</label>
                <textarea class="form-control" placeholder="Enter the Allergies" name="allergy" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label>Previous History</label>
                <textarea class="form-control" placeholder="Previous History of Patient" name="previoushistory" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Enter Description" name="description" autocomplete="off"></textarea>
            </div>
            <label>Medicine Prescribed</label>
                <input type="text" class="form-control" placeholder="Medicine Prescribed" name="medicinename"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Medical Dosage</label>
                <input type="text" class="form-control" placeholder="Medical Dosage" name="medicaldosage"
                    autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>