<?php
// Configuration settings for the application

// Database connection details
define('DB_HOST', 'localhost:3307');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test');

// Site settings
define('SITE_TITLE', 'Your Coop Organization');
define('SITE_DESCRIPTION', 'Welcome to our cooperative organization.');

// Other constants
define('BASE_URL', 'http://localhost/coop-landing-page/');
define('API_ENDPOINT', 'http://localhost/api/');
define('API_KEY', 'your_api_key_here');
// add timezone bangkok
date_default_timezone_set('Asia/Bangkok');

// สร้างการเชื่อมต่อฐานข้อมูล
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>