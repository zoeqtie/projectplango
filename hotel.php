<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>โรงแรมแนะนำ</title>

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
    <h1>🏨 โรงแรมแนะนำ</h1>

    <div class="cards">

        <div class="card">
    <img src="images/hotel1.jpg">
    <h3>The Berkeley Hotel Pratunam</h3>
    <p>⭐⭐⭐⭐⭐ 4.6</p>
    <p>ใกล้แหล่งช้อปปิ้ง</p>
    <p>💰 ราคา 2,200 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','The Berkeley Hotel',2200)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel2.jpg">
    <h3>Eastin Grand Hotel Sathorn</h3>
    <p>⭐⭐⭐⭐⭐ 4.8</p>
    <p>ติด BTS สุรศักดิ์</p>
    <p>💰 ราคา 3,500 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Eastin Grand Hotel',3500)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel3.jpg">
    <h3>Ibis Bangkok Riverside</h3>
    <p>⭐⭐⭐⭐ 4.4</p>
    <p>วิวแม่น้ำ ราคาประหยัด</p>
    <p>💰 ราคา 1,800 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Ibis Riverside',1800)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel4.jpg">
    <h3>Pullman Bangkok Hotel</h3>
    <p>⭐⭐⭐⭐⭐ 4.7</p>
    <p>โรงแรมหรูใจกลางเมือง</p>
    <p>💰 ราคา 4,000 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Pullman Bangkok',4000)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>


<div class="card">
    <img src="images/hotel5.jpg">
    <h3>Asia Hotel Bangkok</h3>
    <p>⭐⭐⭐⭐ 4.3</p>
    <p>เชื่อม BTS ราชเทวี</p>
    <p>💰 ราคา 1,500 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Asia Hotel',1500)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel6.jpg">
    <h3>Amari Watergate</h3>
    <p>⭐⭐⭐⭐⭐ 4.6</p>
    <p>ใกล้ Platinum Fashion Mall</p>
    <p>💰 ราคา 3,200 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Amari Watergate',3200)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel7.jpg">
    <h3>Novotel Bangkok Siam</h3>
    <p>⭐⭐⭐⭐⭐ 4.5</p>
    <p>ใจกลางสยาม</p>
    <p>💰 ราคา 3,800 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Novotel Siam',3800)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel8.jpg">
    <h3>Prince Palace Hotel</h3>
    <p>⭐⭐⭐⭐ 4.2</p>
    <p>โรงแรมใหญ่ ราคาดี</p>
    <p>💰 ราคา 1,600 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Prince Palace',1600)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel9.jpg">
    <h3>Mandarin Hotel Bangkok</h3>
    <p>⭐⭐⭐⭐⭐ 4.7</p>
    <p>ใกล้สามย่าน</p>
    <p>💰 ราคา 2,900 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Mandarin Hotel',2900)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>

<div class="card">
    <img src="images/hotel10.jpg">
    <h3>Centara Grand CentralWorld</h3>
    <p>⭐⭐⭐⭐⭐ 4.8</p>
    <p>หรู วิวเมือง</p>
    <p>💰 ราคา 4,500 บาท / คืน</p>
    <button class="cute-btn" onclick="addToTrip('hotel','Centara Grand',4500)">➕ เพิ่มเข้าทริป</button>
    <form action="book_hotel.php" method="POST">
    <input type="hidden" name="hotel_name" value="Bangkok View Hotel">
    <input type="hidden" name="price" value="1200">
    <button type="submit" class="cute-btn">
        🛏 จองเลย
    </button>
</form>
</div>


        </div>

    </div>
</section>

<script src="script.js"></script>
<!-- Popup แจ้งเตือน -->
<div id="notify" class="notify hidden">
    <div class="notify-box">
        <div id="notify-icon" class="notify-icon">✔</div>
        <p id="notify-text">เพิ่มเข้าทริปแล้ว</p>
        <button onclick="closeNotify()">ปิด</button>
    </div>
</div>

</body>

</html>
