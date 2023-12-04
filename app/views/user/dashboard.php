<?php
// Assuming you have a DashboardController with methods to get dashboard data
$dashboardController = new DashboardController();

// Assuming you have a user ID in the session
$userId = $_SESSION['user_id'];

// Get user-specific dashboard data
$userData = $dashboardController->getUserData($userId);
$recentActivities = $dashboardController->getRecentActivities($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>User Dashboard</h2>
    
    <h3>User Data</h3>
    <p>Age: <?php echo $userData['age']; ?></p>
    <p>Weight: <?php echo $userData['weight']; ?></p>
    <!-- Add other user data fields -->

    <h3>Recent Activities</h3>
    <ul>
        <?php foreach ($recentActivities as $activity): ?>
            <li><?php echo $activity['activity_name']; ?> - <?php echo $activity['date']; ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Add other dashboard components as needed -->
</body>
</html>
