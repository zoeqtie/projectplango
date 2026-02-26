<?php
session_start();
require 'config.php';

// 🔒 เช็คว่า login แล้วไหม
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// 🔥 ลบการจอง (ทำงานก่อน HTML)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);
    $stmt->execute();

    header("Location: my_bookings.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>การจองของฉัน</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">🌏Plan go</div>
    <ul class="nav-links">
        <li><a href="index.php">สถานที่ท่องเที่ยว</a></li>
        <li><a href="map.php">แผนที่</a></li>
        <li><a href="food.php">ร้านอาหาร</a></li>
        <li><a href="hotel.php">โรงแรม</a></li>
        <li><a href="calculator.php">คำนวณค่าใช้จ่าย</a></li>
        <li><a href="my_bookings.php" class="active">📋 การจองของฉัน</a></li>
        <li class="user-name">👤 <?php echo htmlspecialchars($username); ?></li>
        <li><a href="logout.php" class="logout-btn">ออกจากระบบ</a></li>
    </ul>
</nav>

<section class="center-page">
<div class="my-bookings-wrapper">

<?php if($result->num_rows > 0): ?>
    
    <h2 class="page-title">📋 การจองของฉัน</h2>

    <?php while($row = $result->fetch_assoc()): ?>
        <div class="booking-card">
            
            <div class="booking-info">
                <h3><?php echo htmlspecialchars($row['hotel_name']); ?></h3>
                <p>📅 Check-in: <?php echo $row['checkin']; ?></p>
                <p>📅 Check-out: <?php echo $row['checkout']; ?></p>
            </div>

            <div class="btn-group">
                <a href="my_bookings.php?delete=<?php echo $row['id']; ?>"
                   onclick="return confirm('ต้องการยกเลิกการจองใช่ไหม?')"
                   class="btn-book danger">
                   ❌ ยกเลิกการจอง
                </a>

                <a href="index.php" class="btn-back">
                    🏠 กลับหน้าแรก
                </a>
            </div>

        </div>
    <?php endwhile; ?>

<?php else: ?>
    <p class="no-booking">ยังไม่มีการจอง</p>
<?php endif; ?>

</div>
</section>

</body>
</html>