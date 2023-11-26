<?php

require("connection.php");

if (isset($_POST['SignIn_Admin'])) {
  $query = "SELECT * FROM `admin` WHERE `Admin_Id` = '$_POST[AdminId]' AND `Admin_Password` = '$_POST[AdminPassword]'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['AdminLoginId'] = $_POST['AdminId'];
    header('location: patient_display.php');
    exit();
  } else {
    echo "<script>alert('Admin: Incorrect Credentials');</script>";
  }
}

if (isset($_POST['SignIn_Patient'])) {
  $query = "SELECT * FROM `patient` WHERE `Patient_Id` = '$_POST[PatientId]' AND `Patient_Password` = '$_POST[PatientPassword]'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['PatientloginId'] = $_POST['PatientId'];
    header('location: patient_panel.php');
    exit();
  } else {
    echo "<script>alert('Patient: Incorrect Credentials');</script>";
  }
}

if (isset($_POST['SignIn_Doctor'])) {
  $query = "SELECT * FROM `doctor` WHERE `Doctor_Id` = '$_POST[DoctorId]' AND `Doctor_Password` = '$_POST[DoctorPassword]'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['DoctorLoginId'] = $_POST['DoctorId'];
    header('location: doctor_panel.php');
    exit();
  } else {
    echo "<script>alert('Doctor: Incorrect Credentials');</script>";
  }
}
  ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Clinic Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-wvvilKBT/ztz9lgVsabGfWJ6A9GZOX33sFmDJ32/70I+T+uLw+yKNgXpZ6JBxJzo18prYq8HkvJ9fjsqdo2T0w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('img.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: 'Arial', sans-serif;
    }

    #header {
      text-align: center;
      margin-bottom: 20px;
      position: absolute;
      top: 5%;
      left: 50%;
      transform: translateX(-50%);
      color: #fff;
      font-size: 24px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    #forms-container {
      display: flex;
      flex-direction: row;
      align-items: center;
    }

    form {
      margin: 10px;
      overflow: hidden;
      opacity: 0.9;
      transition: opacity 0.3s, transform 0.3s;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    form:hover {
      opacity: 1;
      transform: scale(1.05);
    }

    .input-field {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      opacity: 0;
      transition: opacity 0.3s;
    }

    form:hover .input-field {
      opacity: 1;
    }

    .input-field i {
      margin-right: 10px;
      font-size: 18px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #4caf50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      opacity: 0;
      transition: opacity 0.3s;
    }

    form:hover button {
      opacity: 1;
    }

    button:hover {
      background-color: #45a049;
      opacity: 1;
    }
  </style>
</head>

<body>
  <div id="header">
    <h1>HEALTH CLINIC MANAGEMENT</h1>
  </div>

  <div id="forms-container">
    <form id="Admin_loginform" method="POST">
      <h3>Admin</h3>
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="AdminId" name="AdminId">
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="AdminPassword" name="AdminPassword">
      </div>
      <button type="submit" name="SignIn_Admin">Sign In</button>
    </form>

    <form id="Patient_loginform" method="POST">
      <h3>Patient</h3>
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="PatientId" name="PatientId">
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="PatientPassword" name="PatientPassword">
      </div>
      <button type="submit" name="SignIn_Patient">Sign In</button>
    </form>

    <form id="Doctor_loginform" method="POST" >
      <h3>Doctor</h3>
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="DoctorId" name="DoctorId">
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="DoctorPassword" name="DoctorPassword">
      </div>
      <button type="submit" name="SignIn_Doctor">Sign In</button>
    </form>
  </div>
</body>

</html>