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
            <button class="btn btn-primary"><a href="medicine_add.php" class="text-light">Add Medicine</a></button>
        </div>
        <table class="patient-table">
            <thead>
                <tr>
                    <th>National Drug Code</th>
                    <th>Medicine Name</th>
                    <th>Expiry date</th>
                    <th>Manufacturer</th>
                    <th>Form</th>
                    <th>Frequency</th>
                    <th>Precaution and Warning</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * from `medicine`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        $ndc = $row["National Drug Code"];
                        $name = $row["Medicine Name"];
                        $expiry_date = $row["Expiry Date"];
                        $manufacturer = $row["Manufacturer"];
                        $form= $row["Form"];
                        $frequency= $row["Frequency"];
                        $precaution_and_warning= $row["Precaution and Warning"];
                       

                        echo '<tr>
                        <td>' . $ndc . '</td>
                        <td>' . $name . '</td>
                        <td>' . $expiry_date . '</td>
                        <td>' . $manufacturer . '</td>
                        <td>' . $form . '</td>
                        <td>' . $frequency . '</td>
                        <td>' . $precaution_and_warning . '</td>
                        <td>
                        <button class="btn btn-primary btn-update"><a href="medicine_update.php?updateid=' . $ndc . '" class="text-light">Update</a></button>
                        <button class="btn btn-danger btn-delete"><a href="medicine_delete.php?deleteid=' . $ndc . '" class="text-light">Delete</a></button>
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

