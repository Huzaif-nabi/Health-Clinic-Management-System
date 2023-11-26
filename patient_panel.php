<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_clinic_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patientLoginId =  $_SESSION['PatientloginId'];

// Fetch patient records based on the logged-in patient's ID
$sql = "SELECT * FROM patient WHERE Patient_Id = '$patientLoginId'";
$result = $conn->query($sql);

// Logout logic
if (isset($_POST['Logout'])) {
    // Close the database connection
    $conn->close();

    // Destroy the session
    session_destroy();

    // Redirect to the logout page
    header("location: logic.php");
    exit(); // Ensure that no further code is executed after the header is sent
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
            padding: 10px;
            color: white;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        nav .navbar-right {
            float: right;
        }

        nav button {
            background-color: #ddd;
            color: black;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
        }

        nav button:hover {
            background-color: #555;
            color: white;
        }

        .container {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 400px; /* Adjust the width as needed */
            margin: 20px;
        }

        .card-header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .patient-info {
            margin-bottom: 15px;
        }

        /* Add scroll bar for description */
        .description-scroll {
            max-height: 100px;
            overflow-y: auto;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav>
        <a href="#">Report of patient: <?php echo $patientLoginId?></a>
        <div class="navbar-right">
            <form method="POST">
                <button name="Logout">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Content Container -->
    <div class="container">
        <!-- Display Patient Records -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>
                        <div class='card-header'>Patient Report</div>
                        <div class='card-body'>
                            <div class='patient-info'>
                                <strong>Patient Name:</strong> {$row['Patient_Name']}
                            </div>
                            <div class='patient-info'>
                                <strong>Address:</strong> {$row['Address']}
                            </div>
                            <div class='patient-info'>
                                <strong>Age:</strong> {$row['Age']}
                            </div>
                            <div class='patient-info'>
                                <strong>Gender:</strong> {$row['Gender']}
                            </div>
                            <div class='patient-info'>
                                <strong>Blood Group:</strong> {$row['Blood Group']}
                            </div>
                            <div class='patient-info'>
                                <strong>Disease:</strong> {$row['Disease']}
                            </div>
                            <div class='patient-info'>
                                <strong>Allergy:</strong> {$row['Allergy']}
                            </div>
                            <div class='patient-info'>
                                <strong>Previous History:</strong> {$row['Previous History']}
                            </div>
                            <div class='patient-info description-scroll'>
                                <strong>Description:</strong> " . nl2br($row['Description']) . "
                            </div>
                            <div class='patient-info'>
                                <strong>Medicine Prescribed:</strong> {$row['Medicine Prescribed']}
                            </div>
                            <div class='patient-info'>
                                <strong>Medicine Dosage:</strong> {$row['Medicine Dosage']}
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "No records found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>



</body>

</html>