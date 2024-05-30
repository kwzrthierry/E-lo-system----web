<?php
include '../db_conn.php';

// Check if the form is submitted and request-id is set
if (isset($_POST['request-id'])) {
    $request_id = $_POST['request-id'];
    
    // Fetch the Staff_id associated with the request
    $stmt = $conn->prepare("SELECT Staff_id FROM requests WHERE Request_id = ?");
    $stmt->bind_param("s", $request_id);
    $stmt->execute();
    $stmt->bind_result($staff_id);
    $stmt->fetch();
    $stmt->close();

    // If Staff_id is found, fetch the corresponding staff information
    if ($staff_id) {
        $stmt = $conn->prepare("SELECT First_name, Last_name, Email FROM staff WHERE Staff_id = ?");
        $stmt->bind_param("s", $staff_id);
        $stmt->execute();
        $stmt->bind_result($firstname, $lastname, $email);
        $stmt->fetch();
        $stmt->close();

        // If staff information is found, construct the response
        if ($firstname && $lastname && $email) {
            $response = "Assigned Officer: " . $firstname . " " . $lastname . " (" . $email . ")";
            echo $response;
        } else {
            echo "No assigned officer found for the given request ID";
        }
    } else {
        echo "No staff assigned for the given request ID";
    }
}
$conn->close();
?>
