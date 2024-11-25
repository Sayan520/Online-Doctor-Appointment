<?php
include('db_connect.php');
if ($_POST['appointment']) {   
    $username = $_POST['username'];
    $date = $_POST['date'];
    $physician = $_POST['physician'];
    $time = $_POST['time'];
    $apt_title = $_POST['apt_title'];    
    $user_check_query = "SELECT * FROM users WHERE username='$username'";
    $user_check_result = mysqli_query($conn, $user_check_query);

    if (mysqli_num_rows($user_check_result) > 0) {      
        $apt_id = rand(10000, 99999);       
        $query = "INSERT INTO appointment_details (username, apt_id, date, physician, time, apt_title) 
                  VALUES ('$username', '$apt_id', '$date', '$physician', '$time', '$apt_title')";       
        $result = mysqli_query($conn, $query);        
        if ($result) {
            echo "<script>
            alert('Appointment added successfully.');
            window.location.href = 'profile.php';
          </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {        
        echo "<script>alert('Username incorrect.');</script>";
    }
}
mysqli_close($conn);
?>
