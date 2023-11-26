<?php
include 'connection.php';
session_start();

if (isset($_POST['submit'])) {
    $patient_id = $_POST['patientid'];
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

    $sql = "INSERT INTO `patient` (Patient_Id, Patient_Password, Patient_Name, Age, Gender, `Blood Group`, Address, Disease, Allergy, `Previous History`, Description, `Medicine Prescribed`, `Medicine Dosage`) VALUES ('$patient_id','$password','$name','$age','$gender','$blood_group','$address','$disease','$allergy','$previous_history','$description','$medicine_name','$medical_dosage')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
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
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="patientid">Patient Id</label>
                <input type="text" class="form-control" id="patientid" placeholder="Enter unique Patient Id" name="patientid" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" placeholder="Enter your Password" name="password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" placeholder="Enter your Age" name="age" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" placeholder="Enter your Gender" name="gender" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="bloodgroup">Blood Group</label>
                <input type="text" class="form-control" id="bloodgroup" placeholder="Enter your Blood Group" name="bloodgroup" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" placeholder="Enter your Address" name="address" autocomplete="off" required></textarea>
            </div>
            <div class="form-group">
                <label for="disease">Disease</label>
                <textarea class="form-control" id="disease" placeholder="Enter the disease" name="disease" autocomplete="off" required></textarea>
            </div>
            <div class="form-group">
                <label for="allergy">Allergy</label>
                <textarea class="form-control" id="allergy" placeholder="Enter the Allergies" name="allergy" autocomplete="off" required></textarea>
            </div>
            <div class="form-group">
                <label for="previoushistory">Previous History</label>
                <textarea class="form-control" id="previoushistory" placeholder="Previous History of Patient" name="previoushistory" autocomplete="off" required></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="Enter Description" name="description" autocomplete="off" required></textarea>
            </div>
            <div class="form-group">
                <label for="medicinename">Medicine Prescribed</label>
                <input type="text" class="form-control" id="medicinename" placeholder="Medicine Prescribed" name="medicinename" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="medicaldosage">Medical Dosage</label>
                <input type="text" class="form-control" id="medicaldosage" placeholder="Medical Dosage" name="medicaldosage" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>