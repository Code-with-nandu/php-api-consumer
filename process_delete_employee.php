<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
 // Determine the environment (local or live)
 $isLocal = false; // Set to true for local testing

 // Set the API URL based on the environment
 $apiUrl = $isLocal ? 'http://localhost/1_api/php_api/employee?id=' . $id : 'https://krishnendudalui.in.net/PHI_API_PROVIDER/employee?id=' . $id;


    // Initialize cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Check response
    $responseData = json_decode($response, true);
    if (isset($responseData['status']) && $responseData['status'] === 1) {
        echo "<p>Employee deleted successfully!</p>";
    } else {
        echo "<p>Error deleting employee.</p>";
    }

    // Link back to employee list
    echo '<p><a href="consume.php">View Employee List</a></p>';
}
?>
