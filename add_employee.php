<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
</head>
<body>
    <div class="container">
        <h1>Add New Employee</h1>
        <form action="process_add_employee.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="profilePic">Profile Picture (URL):</label>
            <input type="text" id="profilePic" name="profilePic"><br><br>

            <input type="submit" value="Add Employee">
        </form>
    </div>
</body>
</html>
