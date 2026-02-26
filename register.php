<?php
session_start();
require 'config.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // เช็คว่ากรอกครบไหม
    if (empty($username) || empty($email) || empty($password)) {
        $message = "กรุณากรอกข้อมูลให้ครบ";
    } else {

        // เช็คว่าซ้ำไหม
        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "ชื่อผู้ใช้นี้มีอยู่แล้ว";
        } else {

            // เข้ารหัสรหัสผ่าน
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // เพิ่มข้อมูล
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                $message = "เกิดข้อผิดพลาดในการสมัคร";
            }

            $stmt->close();
        }

        $check->close();
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Register - Plan Go</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="center-page">
    <div class="auth-card">
        <h2>สมัครสมาชิก</h2>

        <?php if($message != "") echo "<p style='color:red;'>$message</p>"; ?>

        <form method="POST">

            <div class="input-group">
                <label>ชื่อผู้ใช้</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>อีเมล</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>รหัสผ่าน</label>
                <input type="password" name="password" required>
            </div>

            <div class="auth-buttons">
                <button type="submit" class="btn-login">สมัครสมาชิก</button>
                <a href="login.php" class="btn-register" style="text-align:center; line-height:36px;">กลับไป Login</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>
