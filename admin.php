<?php
session_start();

$name = "Zankado";
$password = "Zankado123";
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $userpassword = $_POST['password'] ?? '';

    if ($username === $name && $userpassword === $password) {
        $_SESSION['username'] = $username;
        header('Location: dashboard2.php');
        exit();
    }

    $error = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <p> Sign In</p>

        <?php if ($error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="options">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
                <a href="#"> Forgot password </a>
            </div>

            <button type="submit"> Login</button>
        </form>

        <div class="footer">
            <p>&copy; 2026 Admin Panel. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
