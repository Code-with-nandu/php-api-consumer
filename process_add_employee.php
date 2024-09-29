<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $profilePic = $_POST["profilePic"];

// Determine the environment (local or live)
$isLocal = false; // Set to false when deploying to live

// Set the API URL based on the environment
$apiUrl = $isLocal ? 'http://localhost/1_api/php_api/employee' : 'https://krishnendudalui.in.net/PHI_API_PROVIDER/employee';



    // Prepare data to be sent
    $data = json_encode([
        "name" => $name,
        "email" => $email,
        "profilePic" => $profilePic
    ]);

    // Initialize cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ]);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Check response
    $responseData = json_decode($response, true);
    if (isset($responseData['status']) && $responseData['status'] === 1) {
        echo "<p>Employee added successfully!</p>";
    } else {
        echo "<p>Error adding employee.</p>";
    }

    // Link back to employee list
    echo '<p><a href="consume.php">View Employee List</a></p>';
}
?>
