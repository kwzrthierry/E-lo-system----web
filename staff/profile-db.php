<?php
session_start();

// Include the database connection file
include '../db_conn.php';

// Initialize variables
$first_name = "";
$last_name = "";
$email = "";
$phone_number = "";
$position = "";

// Check if the session variable is set

if(isset($_SESSION['staff']) && isset($_SESSION['staff']['username_staff'])) {
    $username_staff = $_SESSION['staff']['username_staff'];
    // Include the database connection file
    include '../db_conn.php';

    // Fetch the staff_id associated with the username
    $stmt = $conn->prepare("SELECT Staff_id FROM login_data_staff WHERE Username = ?");
    $stmt->bind_param("s", $username_staff);
    $stmt->execute();
    $stmt->bind_result($Staff_id);
    $stmt->fetch();
    $stmt->close();

    // Fetch the user's profile information from the staff table using staff ID
    $stmt = $conn->prepare("SELECT * FROM staff WHERE Staff_id = ?");
    $stmt->bind_param("i", $Staff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // Check if data is fetched
    if ($row) {
        // Assign fetched data to variables
        $first_name = $row['First_name'];
        $last_name = $row['Last_name'];
        $email = $row['Email'];
        $phone_number = $row['Phone_number'];
        $position = $row['Position'];
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get edited phone number from POST request
        $phone = $_POST['phone'];

        // Update the phone number in the database
        $stmt = $conn->prepare("UPDATE staff SET Phone_number = ? WHERE Staff_id = ?");
        $stmt->bind_param("si", $phone, $Staff_id);
        $stmt->execute();
        $stmt->close();

        // Redirect to profile page after updating
        header("Location: profile.php");
        exit();
    }
} else {
    echo "<script>alert('Session variable user_info is not set');</script>";
}
?>
