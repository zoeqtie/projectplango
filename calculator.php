<?php
session_start();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณค่าใช้จ่ายทริป</title>
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

   <section class="calculator center-page">
    <div class="form-center">
    <h2>📊 คำนวณค่าใช้จ่ายทริป</h2>
<!-- แสดงสิ่งที่เลือกมาจาก card -->
<div id="selected-info" style="margin-bottom:15px; font-size:14px;"></div>

    <label>จำนวนวัน</label>
    <input type="number" id="days" value="0">

    <label>จำนวนคน</label>
    <input type="number" id="people" value="0">

    <label>🚗 วิธีเดินทาง</label>
<select id="transport">
    <option value="grab_car">Grab Car (14 บาท/กม.)</option>
    <option value="grab_bike">Grab Bike (8 บาท/กม.)</option>
    <option value="bolt_car">Bolt Car (11 บาท/กม.)</option>
    <option value="car">รถยนต์ (4 บาท/กม.)</option>
    <option value="motorbike">มอเตอร์ไซค์ (2.5 บาท/กม.)</option>
</select>

<div id="selected-list"></div>

<button class="btn-hero" onclick="calculateTrip()">คำนวณ</button>



    <div id="result"></div>
</div>
<div id="selected-list" class="result-box"></div>




</section>


    <footer>
        <p>&copy; Plan Go💖</p>
    </footer>

    <script src="script.js"></script>
    <script>
<script>
function calculateTrip(){

    let days = parseInt(document.getElementById("days").value) || 1;
    let people = parseInt(document.getElementById("people").value) || 1;
    let transport = document.getElementById("transport").value;

    // 🔥 ดึงราคารวมจาก selected-list (ที่ card ส่งมา)
    let items = document.querySelectorAll("#selected-list .price");
    let baseCost = 0;

    items.forEach(item => {
        baseCost += parseFloat(item.dataset.price);
    });

    // --------- ค่าเดินทาง ----------
    let rate = 0;

    if(transport === "grab_car") rate = 14;
    else if(transport === "grab_bike") rate = 8;
    else if(transport === "bolt_car") rate = 11;
    else if(transport === "car") rate = 4;
    else if(transport === "motorbike") rate = 2.5;

    // สมมติค่าเดินทางเฉลี่ย 20 กม./วัน
    let travelCost = rate * 20 * days;

    // --------- รวมทั้งหมด ----------
    let totalCost = (baseCost * days) + travelCost;
    let perPerson = totalCost / people;

    document.getElementById("result").innerHTML = `
        🏨 ค่าที่พัก/กิจกรรม: ${(baseCost * days).toFixed(2)} บาท <br>
        🚗 ค่าเดินทาง: ${travelCost.toFixed(2)} บาท <br>
        -------------------------------- <br>
        💰 รวมทั้งหมด: <b>${totalCost.toFixed(2)}</b> บาท <br>
        👥 ตกคนละ: <b>${perPerson.toFixed(2)}</b> บาท
    `;

    showNotify("คำนวณสำเร็จ ✔");
}
</script>

    </script>
<div id="notify" class="notify hidden">
    <div class="notify-box">
        <div id="notify-icon" class="notify-icon">✔</div>
        <p id="notify-text">แจ้งเตือน</p>
        <button onclick="closeNotify()">ปิด</button>
    </div>
</div>

</body>
</html>
