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
            <button class="btn btn-primary"><a href="doctor_add.php" class="text-light">Add Doctor</a></button>
        </div>
        <table class="patient-table">
            <thead>
                <tr>
                    <th>Doctor ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * from `doctor`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row["Doctor_Id"];
                        $name = $row["Name"];
                        $department = $row["Department"];
                        $address = $row["Address"];
                        $phone_number= $row["Phone number"];
                       

                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $department . '</td>
                        <td>' . $address . '</td>
                        <td>' . $phone_number . '</td>
                        <td>
                        <button class="btn btn-primary btn-update"><a href="doctor_update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                        <button class="btn btn-danger btn-delete"><a href="doctor_delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
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

