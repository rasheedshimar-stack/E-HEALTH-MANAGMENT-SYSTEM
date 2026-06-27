<?php 
session_start();
include 'db_connect.php';

$errors = [];
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login === '') {
        $errors[] = 'Email or phone is required.';
    }
    if ($password === '') {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {
        $stmt = $conn->prepare('SELECT id, fullname, password FROM users WHERE email = ? OR phone = ? LIMIT 1');
        $stmt->bind_param('ss', $login, $login);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows === 1) {
            $stmt->bind_result($userId, $fullname, $passwordHash);
            $stmt->fetch();
            if (password_verify($password, $passwordHash)) {
                $_SESSION['user_id'] = $userId;
                $_SESSION['user_name'] = $fullname;
                header('Location: dashboard.php');
                exit;
            } else {
                $errors[] = 'Incorrect password.';
            }
        } else {
            $errors[] = 'No user found with that email or phone.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>E-Health Login</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family: Arial, sans-serif;}
        body{background:#f2f2f2;}
        .top-bar{background:#11c5d9;color:#000;text-align:center;padding:12px;font-weight:bold;}
        .navbar{background:#6b6666;display:flex;align-items:center;justify-content:space-between;padding:15px 25px;}
        .logo{display:flex;align-items:center;gap:15px;color:#000;}
        .logo-circle{width:35px;height:35px;background:#d9d9d9;border-radius:50%;}
        .logo h1{font-size:28px;font-weight:bold;}
        .menu{display:flex;gap:25px;}
        .menu a{text-decoration:none;color:#000;font-size:14px;font-weight:bold;}
        .login-container{width:100%;display:flex;justify-content:center;align-items:center;padding-top:60px;}
        .login-box{width:400px;text-align:center;}
        .login-box h2{font-size:60px;margin-bottom:30px;font-weight:bold;}
        .input-box{width:100%;padding:14px;margin-bottom:20px;border:1px solid #888;border-radius:5px;font-size:18px;}
        .forgot{text-align:right;margin-bottom:20px;}
        .forgot a{text-decoration:none;color:#000;font-size:16px;}
        .login-btn{width:100%;padding:14px;border:none;background:blue;color:#fff;font-size:20px;font-weight:bold;border-radius:5px;cursor:pointer;}
        .register{margin-top:30px;}
        .register a{text-decoration:none;color:#008cff;font-size:22px;font-weight:bold;}
        .message{margin-bottom:20px;padding:14px;border-radius:6px;text-align:left;}
        .error{background:#ffd6d6;color:#900;border:1px solid #f5a2a2;}
        @media(max-width:768px){.navbar{flex-direction:column;gap:15px;}.menu{flex-wrap:wrap;justify-content:center;gap:15px;}.login-box{width:90%;}.login-box h2{font-size:45px;}}
    </style>
</head>
<body>
    
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <?php if (!empty($errors)): ?>
                <div class="message error"><ul><?php foreach ($errors as $error) { echo '<li>'.htmlspecialchars($error).'</li>'; } ?></ul></div>
            <?php endif; ?>
            <form method="post" action="login.php">
                <input type="text" name="login" placeholder="Email or Phone" class="input-box" value="<?php echo htmlspecialchars($login ?? ''); ?>">
                <input type="password" name="password" placeholder="Password" class="input-box">
                <div class="forgot"><a href="#">Forget Password?</a></div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="register"><a href="register.php">Register Now</a></div>
        </div>
    </div>
   
</body>
</html>
