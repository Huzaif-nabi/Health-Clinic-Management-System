<?php
include 'connection.php';
$id=$_GET['updateid'];
// session_start();

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $phone_number = $_POST['phonenumber'];

    $sql = "UPDATE `doctor` SET `Doctor_Password` = '$password', `Name` = '$name', `Department` = '$department', `Address` = '$address', `Phone number` = '$phone_number' WHERE `Doctor_Id` = '$id'";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:doctor_display.php");
        exit(); // Added to prevent further execution
    } else {
        die(mysqli_error($conn));
    }
}

if (isset($_POST['Logout'])) {
    session_destroy();
    header("location: logic.php");
    exit(); // Added to prevent further execution
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
            <!-- <div class="form-group">
                <label for="patientid">Doctor Id</label>
                <input type="text" class="form-control" id="patientid" placeholder="Enter unique Doctor Id" name="doctorid" autocomplete="off" required>
            </div> -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="age">Department</label>
                <input type="text" class="form-control" id="age" placeholder="Enter your Department" name="department" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="gender">Address</label>
                <input type="text" class="form-control" id="gender" placeholder="Enter your Address" name="address" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="bloodgroup">Phone Number</label>
                <input type="text" class="form-control" id="bloodgroup" placeholder="Enter your Phone_no" name="phonenumber" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
