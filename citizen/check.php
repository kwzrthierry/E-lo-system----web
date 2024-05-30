<?php
include '../db_conn.php';

// Check if the form is submitted and request-id is set
if (isset($_POST['request-id'])) {
    $request_id = $_POST['request-id'];
    $sql = "SELECT responses FROM requests WHERE Request_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $request_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = $row['responses'];
        echo $response; // Send response to AJAX call
    } else {
        echo ""; // No response found
    }
    $stmt->close();
}
$conn->close();
?>
