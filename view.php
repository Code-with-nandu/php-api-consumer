<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
</head>
<body>
    <div class="container">
        <h1>Employee List (REST API PHP Project)</h1>

    <a href="https://docs.google.com/document/d/1ApVI0Lue2hgxE6yhT7yt3vaWxici0VCh/edit" class="btn" target="_blank" >Step By Step Guide </a>
    <a href="https://github.com/Code-with-nandu/PHI_API_PROVIDER" class="btn" target="_blank" > API Provider in GITHUB  </a>
    <a href="https://github.com/Code-with-nandu/PHI_API_PROVIDER"class="btn"target="_blank">  API consumer Link GITHUB  </a>
    <a href="https://krishnendudalui.in.net/PHI_API_PROVIDER/employee" class="btn"target="_blank">JSON View </a>
    <br><br>
     
        <a href="add_employee.php" class="btn">Add New Employee</a>

        <?php if (!empty($employees)): ?>
            <ul class="employee-list">
                <?php foreach ($employees as $employee): ?>
                    <li class="employee-item">
                        <strong>ID:</strong> <?= htmlspecialchars($employee["id"]) ?> <br>
                        <strong>Name:</strong> <?= htmlspecialchars($employee["name"]) ?> <br>
                        <strong>Email:</strong> <?= htmlspecialchars($employee["email"]) ?><br>
                        <strong>Profile Pic:</strong> 
                        <?php if (!empty($employee["profile_pic"])): ?>
                            <img src="<?= htmlspecialchars($employee["profile_pic"]) ?>" alt="<?= htmlspecialchars($employee["name"]) ?>" class="profile-pic">
                        <?php else: ?>
                            <span>No image available</span>
                        <?php endif; ?>
                        <form action="process_delete_employee.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($employee["id"]) ?>">
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this employee?');">
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No employees found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
