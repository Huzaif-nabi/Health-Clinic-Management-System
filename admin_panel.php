<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Clinic Management</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradient background */
        }

        .container {
            text-align: center;
        }

        .button-box {
            width: 200px;
            height: 200px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ffffff; /* White border */
            border-radius: 10px;
            display: inline-block;
            background-color: #ffffff; /* White background color */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .button-box:hover {
            transform: scale(1.1);
            border: 1px solid #ffffff; /* White border on hover */
            background-color: #f0f0f0; /* Light grey background color on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .button-box a {
            text-decoration: none;
            color: #000000; /* Black text color */
        }

        h3 {
            margin-bottom: 15px;
            color: #000000; /* Black text color */
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="patient_display.php">
            <div class="button-box patient">
                <h3>Patient</h3>
            </div>
        </a>
       
        <a href="doctor_display.php">
            <div class="button-box doctor">
                <h3>Doctor</h3>
            </div>
        </a>
       
        <a href="medicine_display.php">
            <div class="button-box medicine">
                <h3>Medicine</h3>
            </div>
        </a>
    </div>
</body>
</html>
