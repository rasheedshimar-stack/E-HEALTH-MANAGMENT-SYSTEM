<?php
session_start();
include 'db_connect.php';

$errors = [];
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '') {
        $errors[] = 'Full name is required.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email is required.';
    }
    if ($phone === '') {
        $errors[] = 'Phone number is required.';
    }
    if ($password === '' || strlen($password) < 6) {
        $errors[] = 'Password is required and must be at least 6 characters.';
    }

    if (empty($errors)) {
        $stmt = $conn->prepare('SELECT id FROM users WHERE email = ? OR phone = ?');
        $stmt->bind_param('ss', $email, $phone);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = 'Email or phone already registered.';
        } else {
            $stmt->close();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare('INSERT INTO users (fullname, email, phone, password) VALUES (?, ?, ?, ?)');
            $stmt->bind_param('ssss', $name, $email, $phone, $passwordHash);
            if ($stmt->execute()) {
                $success = 'Registration successful. You can now <a href="login.php">login</a>.';
                $name = $email = $phone = '';
            } else {
                $errors[] = 'Registration failed. Please try again.';
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health Register</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family: Arial, sans-serif;}
        body{background:#f2f2f2;}
        .top-bar{background:#10c4d8;text-align:center;padding:12px;font-weight:bold;color:#000;}
        .navbar{background:#6c6666;display:flex;justify-content:space-between;align-items:center;padding:15px 20px;}
        .logo{display:flex;align-items:center;gap:15px;}
        .circle{width:35px;height:35px;background:#d9d9d9;border-radius:50%;}
        .logo h1{font-size:28px;font-weight:bold;color:#000;}
        .menu{display:flex;gap:25px;}
        .menu a{text-decoration:none;color:#000;font-size:14px;font-weight:bold;}
        .container{width:100%;display:flex;justify-content:center;padding-top:40px;}
        .register-box{width:420px;text-align:center;}
        .register-box h2{font-size:60px;margin-bottom:30px;font-weight:bold;color:#000;}
        .input-box{width:100%;padding:14px;margin-bottom:18px;border:1px solid #888;border-radius:4px;font-size:18px;}
        .register-btn{width:100%;padding:14px;border:none;border-radius:5px;background:#18b9dc;color:#fff;font-size:20px;font-weight:bold;cursor:pointer;}
        .login-link{margin-top:20px;}
        .login-link a{text-decoration:none;color:#008cff;font-size:20px;font-weight:bold;}
        .message{margin-bottom:20px;padding:14px;border-radius:6px;text-align:left;}
        .error{background:#ffd6d6;color:#900;border:1px solid #f5a2a2;}
        .success{background:#d8ffd9;color:#116600;border:1px solid #9ee29e;}
        @media(max-width:768px){.navbar{flex-direction:column;gap:15px;}.menu{flex-wrap:wrap;justify-content:center;gap:15px;}.register-box{width:90%;}.register-box h2{font-size:45px;}}
    </style>
</head>
<body>
   
    <div class="container">
        <div class="register-box">
            <h2>Create Account</h2>
            <?php if (!empty($errors)): ?>
                <div class="message error"><ul><?php foreach ($errors as $error) { echo '<li>'.htmlspecialchars($error).'</li>'; } ?></ul></div>
            <?php endif; ?>
            <?php if ($success !== ''): ?>
                <div class="message success"><?php echo $success; ?></div>
            <?php endif; ?>
            <form method="post" action="register.php">
                <input type="text" name="fullname" placeholder="Full Name" class="input-box" value="<?php echo htmlspecialchars($name ?? ''); ?>">
                <input type="email" name="email" placeholder="Email" class="input-box" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                <input type="text" name="phone" placeholder="Phone" class="input-box" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                <input type="password" name="password" placeholder="Password" class="input-box">
                <button type="submit" class="register-btn">Register</button>
            </form>
            <div class="login-link"><a href="login.php">Login Here</a></div>
        </div>
    </div>
</body>
</html>
