<?php

$userController = new UserController();

$userId = $_SESSION['user_id'];
$userProfile = $userController->getUserProfile($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>User Profile</h2>
    <p>Username: <?php echo $userProfile['username']; ?></p>
    <p>Email: <?php echo $userProfile['email']; ?></p>
    
</body>
</html>
