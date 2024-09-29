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
    
    // Prepare the message
    $message = '';
    if (isset($responseData['status']) && $responseData['status'] === 1) {
        $message = '<p class="success-message">Employee added successfully!</p>';
    } else {
        $message = '<p class="error-message">Error adding employee. Please try again.</p>';
    }

    // Link back to employee list
    $link = '<p><a href="consume.php" class="view-list-link">View Employee List</a></p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
            background-color: #f4f4f4; /* Light background color */
            font-family: Arial, sans-serif; /* Default font */
        }
        .success-message, .error-message {
            padding: 10px;
            border-radius: 5px; /* Rounded corners */
            margin: 10px 0;
        }
        .success-message {
            color: green;
            background-color: rgba(144, 238, 144, 0.2); /* Light green background */
            border: 1px solid green;
        }
        .error-message {
            color: red;
            background-color: rgba(255, 99, 71, 0.2); /* Light red background */
            border: 1px solid red;
        }
        .view-list-link {
            text-decoration: underline;
            color: blue;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php
        // Output the message and link
        if (isset($message)) {
            echo $message;
            echo $link;
        }
        ?>
    </div>
</body>
</html>
