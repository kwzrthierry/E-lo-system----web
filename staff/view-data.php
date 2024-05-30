<?php
session_start();

// Include the database connection file
include '../db_conn.php';

// Check if the session variable is set
if(isset($_SESSION['staff']) && isset($_SESSION['staff']['username_staff'])) {
    $username_staff = $_SESSION['staff']['username_staff'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['citizen_id'])) {
        // Retrieve citizen ID from the form
        $citizen_id = $_POST['citizen_id'];

        // Fetch citizen data from the database
        $stmt = $conn->prepare("SELECT * FROM citizen WHERE citizen_id = ?");
        $stmt->bind_param("i", $citizen_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if data is fetched
        if ($result->num_rows > 0) {
            // Fetch and display citizen data
            $row = $result->fetch_assoc();
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $phone_number = $row['phone_number'];
            $email = $row['email'];
            $birth_date = $row['birth_date'];
            $national_id = $row['national_id'];
            $address = $row['address'];
            $marital_status = $row['marital_status'];
            $sex = $row['sex'];

            // Close the database connection
            $stmt->close();

            // Add JavaScript to display the popup when data is fetched
            echo "<script>openPopup();</script>";
        } else {
            echo "<script>alert('No data found for the provided citizen ID');</script>";
        }
    }
} else {
    // Redirect to login page if session variable not set
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Citizen</title>
    <link rel="stylesheet" href="../css/dashboard-citizen.css">
    <style>
        /* Style for the form */
        .form-container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        .form-box {
            width: 60%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form-group input[type="text"]:focus {
            outline: none;
            border-color: #1aa3ff;
            box-shadow: 0 0 5px rgba(26, 163, 255, 0.5);
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #1aa3ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #007acc;
        }

        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            z-index: 999;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            border: 1px solid #888;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding: 20px;
            max-width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h2><span style="color: #1aa3ff;">E-</span>Lo Platform</h2>
            </div>
            <ul class="nav-links">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="contact.html" class="nav-link">Contact</a></li>
                <li><a href="profile.php" class="nav-link">Profile</a></li>
            </ul>
        </nav>
    </header>

    <div class="form-container">
        <div class="form-box">
            <h2 class="form-title">View Citizen</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="citizen_id">Enter Citizen ID:</label>
                    <input type="text" id="citizen_id" name="citizen_id" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-btn">View</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Popup for displaying citizen data -->
    <div id="popup" class="popup">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2>Citizen Information</h2>
        <p><strong>First Name:</strong> <?php echo isset($first_name) ? $first_name : ''; ?></p>
        <p><strong>Last Name:</strong> <?php echo isset($last_name) ? $last_name : ''; ?></p>
        <p><strong>Phone Number:</strong> <?php echo isset($phone_number) ? $phone_number : ''; ?></p>
        <p><strong>Email:</strong> <?php echo isset($email) ? $email : ''; ?></p>
        <p><strong>Birth Date:</strong> <?php echo isset($birth_date) ? $birth_date : ''; ?></p>
        <p><strong>National ID:</strong> <?php echo isset($national_id) ? $national_id : ''; ?></p>
        <p><strong>Address:</strong> <?php echo isset($address) ? $address : ''; ?></p>
        <p><strong>Marital Status:</strong> <?php echo isset($marital_status) ? $marital_status : ''; ?></p>
        <p><strong>Sex:</strong> <?php echo isset($sex) ? $sex : ''; ?></p>
    </div>

    <footer>
        <p class="footer-copyright">&copy; 2024 E-Lo Platform. All rights reserved.</p>
    </footer>

    <script>
        // Function to open popup
        function openPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        // Function to close popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>
