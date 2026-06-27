<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>E-Health Dashboard</title>
    <style>
        body{font-family:Arial, sans-serif;background:#f2f2f2;color:#222;margin:0;}
        .header{background:#11c5d9;color:#000;padding:20px;text-align:center;}
        .content{max-width:800px;margin:40px auto;padding:20px;background:#fff;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.1);}
        .logout{display:inline-block;margin-top:20px;padding:10px 16px;background:#11c5e6;color:#fff;text-decoration:none;border-radius:5px;}
    </style>
</head>
<body>
    <div class="header"><h1>Welcome to E-Health</h1></div>
    <div class="content">
        <h2>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>
        <p>You are now logged in.</p>
        <p>Use the navigation links to continue.</p>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
