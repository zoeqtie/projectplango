<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ร้านอาหารแนะนำ</title>

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

<section class="food-section">
    <h1>🍜 ร้านอาหารแนะนำ</h1>

    <div class="cards">

       <div class="card">
    <img src="images/food1.jpg">
    <h3>เจ๊โอว ข้าวต้มเป็ด</h3>
    <p>⭐⭐⭐⭐⭐ 4.7</p>
    <p>ร้านดังย่านสามย่าน เปิดดึก</p>
    <p>💰 ราคาเฉลี่ย 300 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','เจ๊โอว ข้าวต้มเป็ด',300)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food2.jpg">
    <h3>ส้มตำเด้อ</h3>
    <p>⭐⭐⭐⭐⭐ 4.6</p>
    <p>อาหารอีสานรสจัด</p>
    <p>💰 ราคาเฉลี่ย 350 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','ส้มตำเด้อ',350)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food3.jpg">
    <h3>Blue Elephant Bangkok</h3>
    <p>⭐⭐⭐⭐⭐ 4.8</p>
    <p>อาหารไทยระดับไฟน์ไดนิ่ง</p>
    <p>💰 ราคาเฉลี่ย 800 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','Blue Elephant Bangkok',800)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food4.jpg">
    <h3>After You Dessert Cafe</h3>
    <p>⭐⭐⭐⭐⭐ 4.6</p>
    <p>ของหวานชื่อดัง</p>
    <p>💰 ราคาเฉลี่ย 250 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','After You',250)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food5.jpg">
    <h3>ร้านปูไข่ดอง เยาวราช</h3>
    <p>⭐⭐⭐⭐⭐ 4.7</p>
    <p>ซีฟู้ดสด ๆ ย่านเยาวราช</p>
    <p>💰 ราคาเฉลี่ย 600 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','ปูไข่ดอง เยาวราช',600)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food6.jpg">
    <h3>Greyhound Café</h3>
    <p>⭐⭐⭐⭐ 4.4</p>
    <p>อาหารฟิวชันสไตล์โมเดิร์น</p>
    <p>💰 ราคาเฉลี่ย 400 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','Greyhound Café',400)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food7.jpg">
    <h3>รุ่งเรืองก๋วยเตี๋ยวหมู</h3>
    <p>⭐⭐⭐⭐⭐ 4.6</p>
    <p>ตำนานก๋วยเตี๋ยวสุขุมวิท</p>
    <p>💰 ราคาเฉลี่ย 120 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','รุ่งเรืองก๋วยเตี๋ยวหมู',120)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food8.jpg">
    <h3>MK Restaurant</h3>
    <p>⭐⭐⭐⭐ 4.3</p>
    <p>สุกี้ยอดนิยม</p>
    <p>💰 ราคาเฉลี่ย 350 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','MK Restaurant',350)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food9.jpg">
    <h3>ครัวอัปษร</h3>
    <p>⭐⭐⭐⭐⭐ 4.7</p>
    <p>อาหารไทยต้นตำรับ</p>
    <p>💰 ราคาเฉลี่ย 250 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','ครัวอัปษร',250)">➕ เพิ่มเข้าทริป</button>
</div>

<div class="card">
    <img src="images/food10.jpg">
    <h3>ร้านบ้านหญิง</h3>
    <p>⭐⭐⭐⭐ 4.4</p>
    <p>อาหารไทยบรรยากาศสบาย</p>
    <p>💰 ราคาเฉลี่ย 300 บาท</p>
    <button class="cute-btn" onclick="addToTrip('food','บ้านหญิง',300)">➕ เพิ่มเข้าทริป</button>
</div>


    </div>
</section>

<script src="script.js"></script>
<div id="notify" class="notify hidden">
    <div class="notify-box">
        <div id="notify-icon" class="notify-icon">✔</div>
        <div id="notify-text">ข้อความแจ้งเตือน</div>
        <button onclick="closeNotify()">ปิด</button>
    </div>
</div>

</body>

</html>
