<?php
session_start();
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Login - Plan Go</title>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="center-page">
    <div class="auth-card">
        <h2>เข้าสู่ระบบ</h2>
        <p class="auth-desc">เข้าสู่ระบบเพื่อใช้งาน Plan Go</p>

        <?php
        if(isset($_GET['error'])){
            echo "<p style='color:red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
        }
        ?>

        <form action="auth.php" method="POST">
            <div class="input-group">
                <label>ชื่อผู้ใช้</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>รหัสผ่าน</label>
                <input type="password" name="password" required>
            </div>

            <div class="auth-buttons">
                <button type="submit" class="btn-login">Login</button>
                <a href="register.php" class="btn-register" style="text-align:center; line-height:36px;">สมัครสมาชิก</a>
            </div>
        </form>

        <br>
        <a href="index.php">← กลับหน้าแรก</a>
    </div>
</div>

</body>
</html>
