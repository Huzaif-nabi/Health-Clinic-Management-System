<?php
include 'connection.php';
session_start();
$ndc=$_GET['updateid'];

if (isset($_POST['submit'])) {
    $medicine_name = $_POST['medname'];
    $expiry_date = $_POST['expirydate'];
    $manufacturer = $_POST['manufacturer'];
    $form = $_POST['form'];
    $frequency = $_POST['frequency'];
    $precaution_and_warning = $_POST['pnw'];

    $sql = "update `medicine` set `Medicine Name` = '$medicine_name',`Expiry Date` = '$expiry_date', Manufacturer = '$manufacturer',Form = '$form',Frequency ='$frequency',`Precaution and Warning` = '$precaution_and_warning'where `National Drug Code` = '$ndc' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:medicine_display.php");
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
            <!-- <div class="form-group">
                <label for="patientid">National Drug Code</label>
                <input type="text" class="form-control" id="patientid" placeholder="Enter unique National drug Code" name="ndc" autocomplete="off" required>
            </div> -->
            <div class="form-group">
                <label for="password">Medicine Name</label>
                <input type="text" class="form-control" id="password" placeholder="Enter Medicine Name" name="medname" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="name">Expiry Date</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Expiry Date" name="expirydate" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="age">Manufacturer</label>
                <input type="text" class="form-control" id="age" placeholder="Enter Manufacturer" name="manufacturer" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="gender">Form</label>
                <input type="text" class="form-control" id="gender" placeholder="Enter Medicine Form" name="form" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="bloodgroup">Frequency</label>
                <input type="text" class="form-control" id="bloodgroup" placeholder="Enter Frequency" name="frequency" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="address">Preacution and Warning</label>
                <textarea class="form-control" id="address" placeholder="Precaution and Warning" name="pnw" autocomplete="off" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>