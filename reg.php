<?php
// Include your database connection code here
include('db_connect.php');

// Check if the form is submitted
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
    // Get user input

 if($_POST['rg'])  
 {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    $query="INSERT INTO USERS(username,Email,Password) VALUES('$username','$email','$password')";
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo "data recorded";
        header("Location: lghtml.html");

    }
    else{
        echo "failed";
    }

 }






/*
    // Validate user input (you may want to add more validation)
    if (empty($username) || empty($email) || empty($password)) {
        $error = "Please enter username, email, and password.";
    } 






















    else {
        // Check if the username or email is already taken
        $query = "SELECT * FROM users WHERE username=? OR email=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username or email already taken. Choose another.";
        } else {
            // Insert user data into the database
            $query = "INSERT INTO users (User Name, Email, Password) VALUES (?,?,?)";
            $stmt = $conn->prepare($query);
            // Note: In a real-world application, you should use password_hash() when storing passwords
            $hashed_password = md5($password); // This is just for demonstration, not recommended for production
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            $stmt->execute();

            // Redirect to the login page
            header("Location: index.html");
            exit();
        }

        // Close the database connection
        $stmt->close();
    }*/

?>
