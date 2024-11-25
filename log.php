<?php
session_start();
if (isset($_POST['login'])) {    
    include('db_connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' && Password='$password'";
    $data=mysqli_query($conn,$query);
    $total=mysqli_num_rows($data);
    if($total<1)
    {
        echo "<script> var confirmation = confirm('You did not fill the form.');
        if(confirmation){
            window.location.href ='reghtml.html'
        }
        </script>";
    }
    else{        
        $user_data = mysqli_fetch_assoc($data);
        $_SESSION['user_data'] = $user_data;         
        header("Location: profile.php");
        exit();
    } 
}
?>