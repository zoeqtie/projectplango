<?php
session_start();
$message = "";
require 'config.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// ✅ ดึงรายชื่อโรงแรมก่อน (ต้องอยู่นอก POST)
$hotels = $conn->query("SELECT id, name, price FROM hotels ORDER BY name ASC");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_id = $_SESSION['user_id'];
    $hotel_id = $_POST['hotel_id'] ?? '';
    $checkin = $_POST['checkin'] ?? '';
    $checkout = $_POST['checkout'] ?? '';

    if($hotel_id && $checkin && $checkout){

        // ✅ ดึงชื่อโรงแรมจาก id ที่เลือก
        $stmtHotel = $conn->prepare("SELECT name FROM hotels WHERE id = ?");
        $stmtHotel->bind_param("i", $hotel_id);
        $stmtHotel->execute();
        $resultHotel = $stmtHotel->get_result();
        $hotelData = $resultHotel->fetch_assoc();

        $hotel_name = $hotelData['name'];

        // ✅ บันทึกลง bookings
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, hotel_name, checkin, checkout) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $hotel_name, $checkin, $checkout);
        $stmt->execute();

        echo "<script>alert('จองสำเร็จ!'); window.location='my_bookings.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>จองโรงแรม</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="center-page">
<div class="auth-card">

<h2>จองโรงแรม</h2>

<?php if($message != "") echo "<p style='color:green;'>$message</p>"; ?>

<form method="POST">

    <div class="input-group">
        <label>ชื่อโรงแรม</label>
        <select name="hotel_id" required>
    <option value="">-- เลือกโรงแรม --</option>
    <?php while($hotel = $hotels->fetch_assoc()): ?>
        <option value="<?php echo $hotel['id']; ?>">
            <?php echo $hotel['name']; ?> - <?php echo $hotel['price']; ?> บาท/คืน
        </option>
    <?php endwhile; ?>
</select>
    </div>

    <div class="input-group">
        <label>วันเช็คอิน</label>
        <input type="date" name="checkin" required>
    </div>

    <div class="input-group">
        <label>วันเช็คเอาท์</label>
        <input type="date" name="checkout" required>
    </div>

    <div class="auth-buttons">
        <button type="submit" class="btn-login">จองเลย</button>
        <a href="index.php" class="btn-register" style="text-align:center; line-height:36px;">กลับหน้าแรก</a>
    </div>

</form>

</div>
</div>

</body>
</html>
