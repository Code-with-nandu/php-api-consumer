<?php
// consume.php

function fetchEmployees($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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

// Fetch all employees
$employees = fetchEmployees($apiUrl);

// Sort employees in descending order by ID (or any other field you prefer)
if (!empty($employees)) {
    usort($employees, function($a, $b) {
        return $b['id'] <=> $a['id']; // Change 'id' to another field if needed
    });
}

// Include the view file to display employees
include('view.php');
?>
