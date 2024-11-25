<?php
session_start();
if (!isset($_SESSION['user_data'])) {
    header("Location: login.html");
    exit();
}
include('db_connect.php');
$user_data = $_SESSION['user_data'];
$username = $user_data['username']; 
$query = "SELECT * FROM appointment_details WHERE username = '$username'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="login.css">
    <style>
        body{
            background-size: cover;
            background-position: center;
            background-image: url('bigstock-Medical-physician-doctor-woma-101147165.jpg');
        }
        .user-appointments li {
            cursor: pointer;
        }
        .appointment-details {
            display: none;
            padding-left: 20px;
        }
        .login-container {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    vertical-align: middle;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
}
.login-container h1 {
    text-align: center;
    color:darkred;
}
.login-container h2 {
    text-align: center;
    color: #4a0ac0;
}
.login-container label {
    display: block;
    margin: 10px 0;
}
.login-container input {
    width: 100%;
    padding: 8px;
    margin: 5px 0 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.login-container button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}
.login-container button:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
    <div class="login-container">
        <h1>User Profile</h1>

        
        <section class="user-info">
            <h2>Your Profile Information:</h2>
            <p><strong>Username:</strong> <?php echo $user_data['username']; ?></p>
            
        </section>

      
        <section class="user-appointments">
            
            <ul>
               <button onclick="location.href='but.php'">Previous Appointment</button>
            </ul>
        </section>

        <button onclick="location.href='appointment.html'">Add Appointment</button>

       
        <a href="logout.php">Logout</a>
    </div>

    <script>
        function toggleDetails(item) {
            var details = item.querySelector('.appointment-details');
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
