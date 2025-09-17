<?php
require_once __DIR__ . '/src/db_crud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'user_username' => $_POST['user_username'],
        'user_password' => password_hash($_POST['user_password'], PASSWORD_DEFAULT),
        'user_fullname' => $_POST['user_fullname'],
        'user_level'    => $_POST['user_level'],
        'user_approve'  => $_POST['user_approve'],
        'user_adddate'  => date('Y-m-d'),
        'user_profile'  => $_POST['user_profile']
    ];

    $result = db_create('tbl_users', $data);

    if ($result) {
        echo '<div class="alert alert-success mt-3">Register success!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Error: Register failed.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Register</h4>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="user_username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="user_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="user_fullname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <input type="text" name="user_level" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Approve</label>
                    <input type="text" name="user_approve" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile</label>
                    <textarea name="user_profile" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>