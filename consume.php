<?php
function fetchEmployees($url, $token) {
    $ch = curl_init($url);
    
    // Set the necessary cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Set the Authorization header
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token
    ]);
    
    $response = curl_exec($ch);
    
    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
        return []; // Return an empty array on error
    }
    
    curl_close($ch);
    return json_decode($response, true);
}

// Determine the environment (local or live)
$isLocal = false; // Set to false when deploying to live

// Set the API URL based on the environment
$apiUrl = $isLocal ? 'http://localhost/1_api/php_api/employee' : 'https://krishnendudalui.in.net/PHI_API_PROVIDER/employee';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the Bearer token from the form input
    $bearerToken = trim($_POST['bearer_token']);

    // Fetch all employees with authentication
    $employees = fetchEmployees($apiUrl, $bearerToken);

    // Sort employees in descending order by ID (or any other field you prefer)
    if (!empty($employees)) {
        usort($employees, function($a, $b) {
            return $b['id'] <=> $a['id']; // Change 'id' to another field if needed
        });
    }

    // Include the view file to display employees
    include('view.php');
} else {
    // Display the form for entering the Bearer token
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API Consumer</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: auto;
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            h1 {
                text-align: center;
            }
            label {
                display: block;
                margin: 10px 0 5px;
            }
            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>API Consumer</h1>
            <form method="post" action="">
                <label for="bearer_token">Please enter your Bearer token:</label>
                <input type="text" id="bearer_token" name="bearer_token" required>
                <input type="submit" value="Fetch Employees">
            </form>
        </div>
    </body>
    </html>';
}
?>
