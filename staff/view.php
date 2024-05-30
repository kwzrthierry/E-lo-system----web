<?php
session_start();

// Include the database connection file
include '../db_conn.php';

// Check if the session variable is set
if(isset($_SESSION['staff']) && isset($_SESSION['staff']['username_staff'])) {
    $username_staff = $_SESSION['staff']['username_staff'];

    // Fetch the staff_id associated with the username
    $stmt = $conn->prepare("SELECT Staff_id FROM login_data_staff WHERE Username = ?");
    $stmt->bind_param("s", $username_staff);
    $stmt->execute();
    $stmt->bind_result($Staff_id);
    $stmt->fetch();
    $stmt->close();

    // Fetch requests assigned to the staff_id from the requests table
    $stmt = $conn->prepare("SELECT Request, Date, Status, Citizen_id FROM requests WHERE Staff_id = ?");
    $stmt->bind_param("i", $Staff_id);
    $stmt->execute();
    $stmt->bind_result($request, $date, $status, $citizen_id);

    // Fetch the first row of data
    $stmt->fetch();
    $stmt->close();
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
    <title>View Requests</title>
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
            <h2 class="form-title">View Requests</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="status">Citizen ID:</label>
                    <input type="text" id="status" name="status" value="<?php echo $citizen_id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="request">Request:</label>
                    <input type="text" id="request" name="request" value="<?php echo $request; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="text" id="date" name="date" value="<?php echo $date; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" id="status" name="status" value="<?php echo $status; ?>" readonly>
                </div>
            </form>
        </div>
    </div>

    <button class="logout-btn" onclick="logout()">Logout</button>
    <footer>
        <p class="footer-copyright">&copy; 2024 E-Lo Platform. All rights reserved.</p>
    </footer>
    <script src="../js/dashboard-citizen.js"></script>
</body>
</html>
