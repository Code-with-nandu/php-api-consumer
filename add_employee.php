<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
    <style>
        body {
            background-image: url('https://gurudev.artofliving.org/wp-content/uploads/2022/10/270-Gurudev-Sri-Sri-Ravi-Shankar.jpg'); /* Background image */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            color: #f0f0f0; /* Light text color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Dark semi-transparent background */
            padding: 30px;
            border-radius: 15px; /* Rounded corners */
            max-width: 500px; /* Limit width */
            margin: 100px auto; /* Center the container with top margin */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5); /* Add shadow */
            text-align: center; /* Center text */
        }

        h1 {
            margin-bottom: 20px; /* Space below heading */
            font-size: 2em; /* Larger heading */
        }

        label {
            display: block; /* Make labels block elements */
            margin: 15px 0 5px; /* Add some margin */
            font-weight: bold; /* Bold labels */
        }

        input[type="text"],
        input[type="email"] {
            width: calc(100% - 20px); /* Full width with padding */
            padding: 10px; /* Padding for inputs */
            margin-bottom: 15px; /* Space below inputs */
            border: 1px solid #ccc; /* Light border */
            border-radius: 5px; /* Rounded corners */
            font-size: 1em; /* Font size */
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #4CAF50; /* Green border on focus */
            outline: none; /* Remove outline */
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            border: none; /* Remove default border */
            padding: 12px; /* Padding for button */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            width: 100%; /* Full width button */
            font-size: 1em; /* Font size */
            transition: background-color 0.3s; /* Smooth transition */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        @media (max-width: 600px) {
            .container {
                width: 90%; /* Responsive width */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Employee</h1>
        <form action="process_add_employee.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="profilePic">Profile Picture (URL):</label>
            <input type="text" id="profilePic" name="profilePic" placeholder="Optional">

            <input type="submit" value="Add Employee">
        </form>
    </div>
</body>
</html>
