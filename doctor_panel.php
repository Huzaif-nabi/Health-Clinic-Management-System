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

$doctorLoginId = $_SESSION['DoctorLoginId'];

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

// Fetch doctor records based on the logged-in doctor's ID
$sql = "SELECT * FROM doctor WHERE Doctor_Id = '$doctorLoginId'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        nav {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        h2 {
            color: #333;
        }

        div.container {
            margin: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: #d9534f;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav>
        <div>
            Welcome to Doctor's Panel | DOCTOR ID: 2022
            <form method="post" action="">
                <input type="hidden" name="DoctorId" value="<?php echo $doctorLoginId; ?>">
                <button type="submit" name="Logout" class="logout-btn">Logout</button>
            </form>
        </div>
        <!-- Add more navigation links or buttons as needed -->
    </nav>

    <!-- Display Doctor Details -->
    <div class="container">
        <h2>Doctor Details</h2>
        <?php
        // Check if there is a result from the query
        if ($result->num_rows > 0) {
            // Output data of each row
            $doctor = $result->fetch_assoc();
            ?>
            <p>Name: <?php echo $doctor['Name']; ?></p>
            <p>Address: <?php echo $doctor['Address']; ?></p>
            <p>Department: <?php echo $doctor['Department']; ?></p>
            <p>Phone Number: <?php echo $doctor['Phone number']; ?></p>
            <?php
        } else {
            echo "No records found";
        }
        ?>
    </div>
</body>

</html>