<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แผนที่สถานที่ท่องเที่ยว</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
   <nav class="navbar">
    <div class="logo">🌏Plan go</div>
    <ul class="nav-links">
        <li><a href="index.php">สถานที่ท่องเที่ยว</a></li>
        <li><a href="map.php">แผนที่</a></li>
        <li><a href="food.php">ร้านอาหาร</a></li>
        <li><a href="hotel.php">โรงแรม</a></li>
        <li><a href="calculator.php">คำนวณค่าใช้จ่าย</a></li>
        <li><a href="my_bookings.php">📋 การจองของฉัน</a></li>
        <?php if(isset($_SESSION['username'])): ?>
    <li>👤 <?php echo $_SESSION['username']; ?></li>
    <li><a href="logout.php">ออกจากระบบ</a></li>
<?php else: ?>
    <li><a href="login.php">เข้าสู่ระบบ</a></li>
<?php endif; ?>
</nav>

<!-- ⭐ ฟอร์มกลางจอ -->
<section class="center-page">
    <div class="form-card">

        <h1>🗺️ แผนที่สถานที่ท่องเที่ยว</h1>
        <p class="desc">เลือกดูตำแหน่งจาก Google Maps</p>

        <iframe
            id="map-frame"
            src="https://www.google.com/maps?q=Bangkok&output=embed"
            loading="lazy">
        </iframe>

    </div>
</section>

<footer>
    <p>&copy; 2026 Plan Go 💖</p>
</footer>

<script src="script.js"></script>
<script>
const params = new URLSearchParams(window.location.search);
const place = params.get("place");

const locations = {
    watphrakaew: "วัดพระแก้ว",
    asiatique: "Asiatique The Riverfront",
    watarun: "วัดอรุณราชวราราม",
    yaowarat: "เยาวราช",
    centralpark: "Central Park กรุงเทพ",
    charoenkrung: "Street Art เจริญกรุง",
    giantswing: "เสาชิงช้า",
    lhong1919: "ล้ง1919",
    TalingChanFloatingMarket: "ตลาดน้ำตลิ่งชัน",
    IconSiam: "ไอคอนสยาม",
    lumpini: "สวนลุมพินี",
    khaosan: "ถนนข้าวสาร"
};

if(place && locations[place]){
    document.getElementById("map-frame").src =
        "https://www.google.com/maps?q=" + encodeURIComponent(locations[place]) + "&output=embed";
}
</script>

</body>
</html>
