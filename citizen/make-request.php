<?php
session_start();
    // Include the database connection file
    include '../db_conn.php';

    // Check if the session variable is set
    if(isset($_SESSION['Username'])) {
        $Username = $_SESSION['Username'];
        // Fetch the citizen_id associated with the username
        $stmt = $conn->prepare("SELECT citizen_id FROM login_citizen WHERE Username = ?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $stmt->bind_result($citizen_id);
        $stmt->fetch();
        $stmt->close();

        $_SESSION['citizen_id'] = $citizen_id;

        // Check if citizen_id is found
        if($citizen_id) {
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get request type from POST request
                $request_type = $_POST['request-type'];

                // Get current date in yy-mm-dd format
                $current_date = date("Y-m-d");

                // Insert into the requests table
                $stmt = $conn->prepare("INSERT INTO requests (citizen_id, Request, Date) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $citizen_id, $request_type, $current_date);
                $stmt->execute();
                $stmt->close();

                // Show success message and redirect after a delay
                echo "<script>
                        setTimeout(function() {
                            alert('Request submitted successfully');
                            window.location.href = 'index.php';
                        }, 500); // 2000 milliseconds = 0.5 seconds
                      </script>";
            }
        } else {
            // Redirect to login page if citizen_id not found
            echo "There is no citizen_id";
        }
    } else {
        // Redirect to login page if session variable not set
        echo "there is no session variable";
    }
    ?>