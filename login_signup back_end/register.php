<?php
// Include the database connection file
include '../db_conn.php';

// Get form data and sanitize inputs
$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$firstName = htmlspecialchars($_POST['firstname']);
$lastName = htmlspecialchars($_POST['lastname']);
$ID = htmlspecialchars($_POST['nationalId']);
$BDate = htmlspecialchars($_POST['birthDate']);
$sex = htmlspecialchars($_POST['gender']);
$status = htmlspecialchars($_POST['maritalStatus']);

// Prepare SQL statements to prevent SQL injection
$emailCheckQuery = $conn->prepare("SELECT * FROM citizen WHERE email=?");
$emailCheckQuery->bind_param("s", $email);
$emailCheckQuery->execute();
$emailCheckResult = $emailCheckQuery->get_result();

// Check if email already exists
if ($emailCheckResult->num_rows > 0) {
    echo "Error: Email is already registered";
    exit();
} else {
    // Prepare SQL statements to prevent SQL injection
    $usernameCheckQuery = $conn->prepare("SELECT * FROM login_citizen WHERE Username=?");
    $usernameCheckQuery->bind_param("s", $username);
    $usernameCheckQuery->execute();
    $usernameCheckResult = $usernameCheckQuery->get_result();

    // Check if username already exists
    if ($usernameCheckResult->num_rows > 0) {
        echo "Error: Username is already taken";
        exit();
    } else {
        // Prepare SQL statement to prevent SQL injection
        $insertCitizenQuery = $conn->prepare("INSERT INTO citizen (first_name, last_name, email, birth_date, marital_status, sex, national_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertCitizenQuery->bind_param("sssssss", $firstName, $lastName, $email, $BDate, $status, $sex, $ID);

        // Execute the query to insert data into citizen table
        if ($insertCitizenQuery->execute()) {
            // Retrieve the generated ID
            $citizen_id = $conn->insert_id;

            // Prepare SQL statement to prevent SQL injection
            $insertLoginQuery = $conn->prepare("INSERT INTO login_citizen (Username, Password, Citizen_id) VALUES (?, ?, ?)");
            $insertLoginQuery->bind_param("ssi", $username, $password, $citizen_id);

            // Execute the query to insert data into login_citizen table
            if ($insertLoginQuery->execute()) {
                // Close prepared statements
                $insertCitizenQuery->close();
                $insertLoginQuery->close();

                // Close the database connection
                $conn->close();

                // Show success message and redirect after a delay
                echo "<script>
                        setTimeout(function() {
                            alert('Registration successful');
                            window.location.href = '../citizen/index.php';
                        }, 2000); // 2000 milliseconds = 2 seconds
                      </script>";
                exit(); // Stop further execution
            } else {
                echo "Error: " . $insertLoginQuery->error;
            }
        } else {
            echo "Error: " . $insertCitizenQuery->error;
        }
    }
}
?>
