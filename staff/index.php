<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer's portal</title>
    <link rel="stylesheet" href="../css/dashboard-citizen.css">
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

    <section class="cards">
        <div class="card">
            <h3>View received request</h3>
            <p>Easily access and review requests submitted by citizens for various governmental services or assistance. Whether it's permit applications, issue reports, or information inquiries, stay informed about citizen needs effortlessly.</p>
            <button onclick="location.href='view.php'">View</button>
        </div>
        <div class="card">
            <h3>View citizen Data</h3>
            <p>Track the progress of submitted requests or inquiries from citizens and view relevant data. Stay updated on the status of applications or concerns and respond promptly to citizen needs.</p>
            <button onclick="location.href='view-data.php'">View</button>
        </div>
        <div class="card">
            <h3>Provide response</h3>
            <p>Access information about assigned tasks and responsibilities. Communicate with citizens effectively by providing timely responses and updates on their requests. Ensure citizen satisfaction by addressing their specific needs promptly.</p>
            <button onclick="location.href='provide.php'">Provide</button>
        </div>
    </section>

    <button class="logout-btn" onclick="logout()">Logout</button>
    <footer>
        <p class="footer-copyright">&copy; 2024 E-Lo Platform. All rights reserved.</p>
    </footer>
    <script src="../js/dashboard-citizen.js"></script>
</body>
</html>
