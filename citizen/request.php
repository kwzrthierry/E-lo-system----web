<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a request</title>
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

        .form-group select,
        .form-group button {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .form-group select:focus,
        .form-group button:focus {
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
            <h2 class="form-title">Make a Request</h2>
            <form id="request-form" class="request-form" action="make-request.php" method="POST">
                <div class="form-group">
                    <label for="request-type">Request Type:</label>
                    <select id="request-type" name="request-type">
                        <option value="Request Birth certificate">Request Birth certificate</option>
                        <option value="Request Signatures">Request Signatures</option>
                        <option value="Request Change of Names">Request Change of Names</option>
                        <option value="Request singles certificate">Request singles certificate</option>
                        <option value="Request land mitation services">Request land mitation services</option>
                        <option value="Request property registration">Request property registration</option>
                    </select>
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
