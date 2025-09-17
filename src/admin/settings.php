<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: /login.php');
    exit();
}

// Load configuration
require_once '../config.php';

// Initialize settings
$siteTitle = '';
$siteDescription = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $siteTitle = $_POST['site_title'] ?? '';
    $siteDescription = $_POST['site_description'] ?? '';

    // Save settings to a configuration file or database
    // This is a placeholder for actual saving logic
    // For example, you could save to a database or a config file

    // Redirect to avoid resubmission
    header('Location: settings.php');
    exit();
}

// Load existing settings (if any)
// This is a placeholder for loading logic
// For example, you could load from a database or a config file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>Admin Settings</h1>
    <form method="POST" action="settings.php">
        <label for="site_title">Site Title:</label>
        <input type="text" id="site_title" name="site_title" value="<?php echo htmlspecialchars($siteTitle); ?>" required>
        
        <label for="site_description">Site Description:</label>
        <textarea id="site_description" name="site_description" required><?php echo htmlspecialchars($siteDescription); ?></textarea>
        
        <button type="submit">Save Settings</button>
    </form>
</body>
</html>