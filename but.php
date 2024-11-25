<link rel="stylesheet" href="login.css">
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
    if (mysqli_num_rows($result) > 0) {
        echo "<link rel='stylesheet' type='text/css' href='prev.css'>";        
        echo "<ul class='appointment-list'>";         
        while ($appointment = mysqli_fetch_assoc($result)) {
            echo "<li class='appointment-item' onclick='toggleDetails(this)' >";
            echo "<p><strong>Appointment ID:</strong> " . $appointment['apt_id'] . "</p>";
            echo "<div class='appointment-details'>";
            echo "<p><strong>Date:</strong> " . $appointment['date'] . "</p>";
            echo "<p><strong>Physician:</strong> " . $appointment['physician'] . "</p>";
            echo "<p><strong>Time:</strong> " . $appointment['time'] . "</p>";            
            echo "</div>";
            echo "</li>";
        }    
        echo "</ul>";
    } else {       
        echo "<p>No Previous Appointments</p>";
    }
    ?>

