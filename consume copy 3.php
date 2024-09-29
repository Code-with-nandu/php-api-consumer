<?php
// consume.php

function fetchEmployees($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Replace with the actual URL of your API project
$apiUrl = 'https://krishnendudalui.in.net/PHI_API_PROVIDER/employee'; // Adjust the path accordingly

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
