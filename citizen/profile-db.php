<?php
session_start();

// Include the database connection file
include '../db_conn.php';

// Initialize variables
$first_name = "";
$last_name = "";
$email = "";
$birth_date = "";
$national_id = "";
$marital_status = "";
$sex = "";
$phone_number = "";
$address = "";

// Check if the session variable is set
if(isset($_SESSION['user_info']['Username'])) {
    $Username = $_SESSION['user_info']['Username'];

    // Fetch the citizen_id associated with the username
    $stmt = $conn->prepare("SELECT citizen_id FROM login_citizen WHERE Username = ?");
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $stmt->bind_result($citizen_id);
    $stmt->fetch();
    $stmt->close();

    // Fetch the user's profile information from the citizens table using citizen ID
    $stmt = $conn->prepare("SELECT * FROM citizen WHERE citizen_id = ?");
    $stmt->bind_param("i", $citizen_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // Check if data is fetched
    if ($row) {
        // Assign fetched data to variables
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $birth_date = $row['birth_date'];
        $national_id = $row['national_id'];
        $marital_status = $row['marital_status'];
        $sex = $row['sex'];
        $phone_number = $row['phone_number'];
        $address = $row['address'];
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get edited phone number and address from POST request
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Update the phone number and address in the database
        $stmt = $conn->prepare("UPDATE citizen SET phone_number = ?, address = ? WHERE citizen_id = ?");
        $stmt->bind_param("ssi", $phone, $address, $citizen_id);
        $stmt->execute();
        $stmt->close();

        // Redirect to profile page after updating
        header("Location: profile.php");
        exit();
    }
} else {
    // Redirect to login page if session variable not set
    echo "<script>alert('There is no session variable.');</script>";
}
?>
