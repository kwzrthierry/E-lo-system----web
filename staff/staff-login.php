<?php
session_start();
// Include the database connection file
include '../db_conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from POST request
    $username_staff = $_POST['username_staff'];
    $password = $_POST['Password'];

    // Verify login credentials
    if (!empty($username_staff) && !empty($password)) {
        if (verifyLogin($conn, $username_staff, $password)) {
            $_SESSION['staff'] = array(
                'username_staff' => $username_staff
            );
            // Show success message and redirect after a delay
            echo "<script>
                    setTimeout(function() {
                        alert('Login successful');
                        window.location.href = 'index.php';
                    }, 500); // 500 milliseconds = 0.5 seconds
                  </script>";
            exit(); // Stop further execution
        } else {
            // Show error message
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // Show error message if fields are empty
        echo "<script>alert('Username and password are required');</script>";
    }
}

// Function to verify user login
function verifyLogin($conn, $username_staff, $password) {
    // Sanitize input to prevent SQL injection
    $username_staff = $conn->real_escape_string($username_staff);
    $password = $conn->real_escape_string($password);

    // Query to verify login credentials
    $sql = "SELECT * FROM login_data_staff WHERE Username='$username_staff' AND Password='$password'";
    $result = $conn->query($sql);

    // Check if a row with the given username and password exists
    if ($result->num_rows > 0) {
        // Login successful
        return true;
    } else {
        // Login failed
        return false;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>officer's portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="wrapper">
        <div class="inner">
            <div class="image-holder" style="margin-top: 30px;">
                <img src="../img/1.png" alt="" style="border-radius: 20px;">
            </div>
            <form id="loginForm" method="POST" style="margin-top: 90px;">
                <h3>OFFICER'S Portal</h3>
                <div class="form-wrapper">
                    <input id="usernameInput" type="text" name="username_staff" placeholder="Username" class="form-control" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input id="passwordInput" type="password" name="Password" placeholder="Password" class="form-control" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button id="loginButton" type="submit">Log In
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

</body>
</html>
