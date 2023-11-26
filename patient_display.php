<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .btn-container {
            margin-bottom: 20px;
        }

        .patient-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .patient-table th,
        .patient-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .patient-box {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-update,
        .btn-delete {
            margin-right: 10px;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="post" action="logic.php">
            <button type="submit" class="btn btn-primary logout-btn" name="Logout">Logout</button>
        </form>

        <div class="btn-container">
            <button class="btn btn-primary"><a href="patient_add.php" class="text-light">Add Patient</a></button>
        </div>
        <table class="patient-table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Address</th>
                    <th>Disease</th>
                    <th>Allergy</th>
                    <th>Previous History</th>
                    <th>Description</th>
                    <th>Medicine Prescribed</th>
                    <th>Medicine Dosage</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * from `patient`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row["Patient_Id"];
                        $name = $row["Patient_Name"];
                        $age = $row["Age"];
                        $gender = $row["Gender"];
                        $blood_group = $row["Blood Group"];
                        $address = $row["Address"];
                        $disease = $row["Disease"];
                        $allergy = $row["Allergy"];
                        $previous_history = $row["Previous History"];
                        $description = $row["Description"];
                        $medicine_name = $row["Medicine Prescribed"];
                        $medicine_dosage = $row["Medicine Dosage"];

                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $age . '</td>
                        <td>' . $gender . '</td>
                        <td>' . $blood_group . '</td>
                        <td>' . $address . '</td>
                        <td>' . $disease . '</td>
                        <td>' . $allergy . '</td>
                        <td class="scrollable-content">' . $previous_history . '</td>
                        <td class="scrollable-content">' . $description . '</td>
                        <td>' . $medicine_name . '</td>
                        <td>' . $medicine_dosage . '</td>
                        <td>
                        <button class="btn btn-primary btn-update"><a href="patient_update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                        <button class="btn btn-danger btn-delete"><a href="patient_delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>

