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


    <link rel="stylesheet" href="CSS/daftarstyle.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="signUp">
        <h1 class="form-title">Register</h1>

        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="post" action="">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                <label for="fullname">Full Name</label>
            </div>

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

            <div class="input-group gender-group">
                <label class="gender-label">Jenis Kelamin:</label>
                <table>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="radio" name="gender" value="Perempuan"> Perempuan
                            </label>
                        </td>
                    </tr>
                </table>
            </div>

            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>

        <p class="or">--------Or--------</p>

        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>

        <div class="links">
            <p style>Punya Akun?</p>
            <form action="login.php" method="get">
                <button type="submit" id="signInButton">Masuk</button>
            </form>
        </div>
    </div>

</body>
</html>
