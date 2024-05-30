<?php
session_start();

// Include the database connection file
include '../db_conn.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['request_id']) && isset($_POST['response'])) {
    // Check if the session variable is set
    if(isset($_SESSION['staff']) && isset($_SESSION['staff']['username_staff'])) {
        // Retrieve form data
        $request_id = $_POST['request_id'];
        $response = $_POST['response'];

        // Prepare and execute SQL statement to insert response into requests table
        $stmt = $conn->prepare("UPDATE requests SET responses = ? WHERE request_id = ?");
        $stmt->bind_param("si", $response, $request_id);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            // Close the database connection
            $stmt->close();
            // Redirect back to the form page with a success message
            echo "<script>alert('Responded successfully');</script>";
            header("Location: provide.php");
            exit();
        } else {
            // Close the database connection
            $stmt->close();
            // Redirect back to the form page with an error message
            header("Location: respond.php?success=false");
            exit();
        }
    } else {
        // Redirect to login page if session variable not set
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respond to Request</title>
    <link rel="stylesheet" href="../css/dashboard-citizen.css">
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 150px); /* Adjust based on header and footer height */
        }

        .form-box {
            width: 400px;
            padding: 30px;
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

        .form-group input[type="text"],
        .form-group textarea {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form-group input[type="text"]:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #1aa3ff;
            box-shadow: 0 0 5px rgba(26, 163, 255, 0.5);
        }

        .submit-btn {
            width: 80%;
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
            <h2 class="form-title">Respond to Request</h2>
            <form id="request-form" class="request-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="request-id">Request ID:</label>
                    <input type="text" name="request_id" required>
                </div>
                <div class="form-group">
                    <label for="response">Response:</label>
                    <textarea name="response" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
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
