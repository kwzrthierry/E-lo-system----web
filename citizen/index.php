<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen's portal</title>
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
            <h3>Make a request</h3>
            <p>Submit your requests for various governmental services or assistance conveniently through our platform. Whether it's applying for permits, reporting issues, or seeking information, make your needs known effortlessly.</p>
            <button onclick="location.href='request.php'">Request</button>
        </div>
        <div class="card">
            <h3>View request or response</h3>
            <p>Track the progress of your submitted requests or inquiries and view responses from the relevant authorities. Stay informed about the status of your applications or concerns and receive timely updates.</p>
            <button onclick="location.href='response.php'">View</button>
        </div>
        <div class="card">
            <h3>View officer assigned</h3>
            <p>Identify the dedicated officer assigned to handle your requests or queries. Get to know the contact details and status updates from the officer responsible for addressing your specific needs or issues.</p>
            <button onclick="location.href='officer-ass.php'">View</button>
        </div>
    </section>

    <button class="logout-btn" onclick="logout()">Logout</button>
    <footer>
        <p class="footer-copyright">&copy; 2024 E-Lo Platform. All rights reserved.</p>
    </footer>
    <script src="../js/dashboard-citizen.js"></script>
</body>
</html>
