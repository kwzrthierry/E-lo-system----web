<?php
include 'profile-db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/dashboard-citizen.css">
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 150px); /* Adjust based on header and footer height */
        }

        .form-box {
            margin-top: 20px;
            width: 400px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 20px;
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
            display: inline-block;
            width: 45%; /* Adjust as needed */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: calc(100% - 20px); /* Adjust based on label width and margin */
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

        .form-group input[type="text"][readonly] {
            background-color: #f9f9f9;
        }

        .update-btn {
            width: 100%;
            padding: 10px;
            background-color: #1aa3ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .update-btn:hover {
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
            <h2 class="form-title">Edit Profile</h2>
            <form id="profile-form" class="profile-form" action="profile-db.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="address">Position:</label>
                    <input type="text" id="Position" name="Position" value="<?php echo $position; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone_number; ?>">
                </div>
                <button type="submit" class="update-btn">Update</button>
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
