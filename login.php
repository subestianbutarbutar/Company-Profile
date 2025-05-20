<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($email === "admin@gmail.com" && $password === "admin123") {
        $_SESSION['loggedin'] = true;
        $_SESSION['time'] = time(); 
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/img/Logo Rumah Impian.png" type="image/x-icon">
    <title>Rumah Impian</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/loginstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="signIn">
        <h1 class="form-title">Login</h1>

        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <?php if (isset($_GET['timeout'])): ?>
            <p style="color:orange;">Sesi Anda telah berakhir. Silakan login kembali.</p>
        <?php endif; ?>

        <form method="post" action="">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <p class="recover"><a href="#">Lupa Kata Sandi?</a></p>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>

        <p class="or">--------Or--------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>

        <div class="links">
            <p>Belum Punya Akun?</p>
            <form action="daftar.php" method="get">
                <button type="submit" id="signUpButton">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>
