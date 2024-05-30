<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>officer-assigned</title>
    <link rel="stylesheet" href="../css/dashboard-citizen.css">
    <style type="text/css">
        /* CSS for header, navigation, and footer */
        /* Ensure the header, navigation, and footer styles are already defined in dashboard-citizen.css */
        .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
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
        }

        .form-group {
        margin-bottom: 20px;
        }

        .form-group label {
        display: block;
        margin-bottom: 5px;
        }

        .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            visibility: hidden;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .popup-overlay.active {
            visibility: visible;
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
            <h2 class="form-title">View Officer assigned</h2>
            <form id="response-form" class="response-form">
                <div class="form-group">
                    <label for="request-id">Enter Request ID:</label>
                    <input type="text" id="request-id" name="request-id" required>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>


    <button class="logout-btn" onclick="logout()">Logout</button>
    <footer>
        <p class="footer-copyright">&copy; 2024 E-Lo Platform. All rights reserved.</p>
    </footer>
    <div class="popup-overlay" id="popup">
        <div class="popup-content" id="popup-content">
            <button onclick="closePopup()">Close</button>
            <div id="response-content"></div>
        </div>
    </div>
    <script src="../js/dashboard-citizen.js"></script>
    <script>
        // Function to show popup with response content
        function showPopup(response) {
            // Ensure that the response-content element exists before setting innerHTML
            var responseContent = document.getElementById("response-content");
            if (responseContent) {
                responseContent.innerHTML = response;
                document.getElementById("popup").classList.add("active");
            } else {
                console.error("Element with ID 'response-content' not found.");
            }
        }

        // Function to close popup
        function closePopup() {
            document.getElementById("popup").classList.remove("active");
        }

        // Function to handle form submission
        document.getElementById("response-form").addEventListener("submit", function(event) {
            event.preventDefault();
            var requestID = document.getElementById("request-id").value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (xhr.responseText !== "") {
                            showPopup(xhr.responseText);
                        } else {
                            alert("No response found for the given request ID");
                        }
                    } else {
                        alert("Error fetching response. Please try again.");
                    }
                }
            };
            xhr.open("POST", "response-ci.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("request-id=" + requestID);
        });
    </script>
</body>
</html>
