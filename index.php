<?php
session_start();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan go</title>
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

    <!-- Hero Section -->
   <section class="hero-slider">
    <!-- ปุ่มซ้าย -->
    <button class="slide-btn left" onclick="prevSlide()">❮</button>

    <!-- รูป -->
    <div class="slides" id="slides">
        <img src="images/slide1.jpg">
        <img src="images/slide2.jpg">
        <img src="images/slide3.jpg">
    </div>

    <!-- ปุ่มขวา -->
    <button class="slide-btn right" onclick="nextSlide()">❯</button>

    <!-- ข้อความ -->
    <div class="hero-text">
        <h1>ยินดีต้อนรับสู่ทริปกรุงเทพ!</h1>
        <p>วางแผนทริปของคุณได้ง่าย ๆ ในที่เดียว</p>
    </div>

    <!-- จุดกลม -->
    <div class="dots" id="dots"></div>
</section>



    

    <!-- Popular Places -->
    <section class="places">
    <br><h2>สถานที่แนะนำในกรุงเทพ</h2></br>
    <div class="cards">

        <!-- Card วัดพระแก้ว -->
        <div class="card" onclick="openModal('modal1')">
            <img src="images/images1.jpg" alt="วัดพระแก้ว">
            <h3>วัดพระแก้ว</h3>
            <p>สัมผัสวัฒนธรรมไทยและศิลปะสวยงาม</p>
        </div>

        <!-- Card Asiatique -->
        <div class="card" onclick="openModal('modal3')">
            <img src="images/images3.jpg" alt="Asiatique" style="width:100%; border-radius:10px;">
            <h3>Asiatique</h3>
            <p>เดินเล่นริมน้ำ ช้อปปิ้งและชมวิวสวย ๆ</p>
        </div>
        <!-- วัดอรุณราชวราราม -->
        <div class="card" onclick="openModal('modal4')">
            <img src="images/images4.jpg" alt="วัดอรุณราชวราราม" style="width:100%; border-radius:10px;">
            <h3>วัดอรุณราชวราราม</h3>
            <p>เป็นพุทธศาสนสถานในประเทศไทย</p>
        </div>
        <!-- เยาวราช -->
        <div class="card" onclick="openModal('modal5')">
            <img src="images/images5.jpg" alt="เยาวราช" style="width:100%; border-radius:10px;">
            <h3>เยาวราช</h3>
            <p>ย่านเก่าแก่ของชุมชนชาวจีนในกรุงเทพฯ</p>
        </div>
        <!-- สวนลอยฟ้า Central Park กรุงเทพ -->
        <div class="card" onclick="openModal('modal6')">
            <img src="images/images6.jpg" alt="สวนลอยฟ้า Central Park กรุงเทพ" style="width:100%; border-radius:10px;">
            <h3>สวนลอยฟ้า Central Park กรุงเทพ</h3>
            <p>มีสวนลอยฟ้าที่ใหญ่ที่สุดในไทย</p>
        </div>
        <!-- Street Art เจริญกรุง -->
        <div class="card" onclick="openModal('modal7')">
            <img src="images/images7.jpg" alt="Street Art เจริญกรุง" style="width:100%; border-radius:10px;">
            <h3>Street Art เจริญกรุง</h3>
            <p>ย่านเก่าของกรุงเทพฯ ที่แสนจะมีเอกลักษณ์</p>
        </div>
        <!-- เสาชิงช้า -->
        <div class="card" onclick="openModal('modal8')">
            <img src="images/images8.jpg" alt="เสาชิงช้า" style="width:100%; border-radius:10px;">
            <h3>เสาชิงช้า</h3>
            <p>เสาชิงช้า แลนด์มาร์คกลางใจกรุงเทพฯ</p>
        </div>
        <!-- ล้ง 1919 -->
        <div class="card" onclick="openModal('modal9')">
            <img src="images/images9.jpg" alt="ล้ง 1919" style="width:100%; border-radius:10px;">
            <h3>ล้ง 1919</h3>
            <p>ที่เที่ยวกรุงเทพสไตล์จีน ริมแม่น้ำเจ้าพระยา</p>
        </div>
        <!-- ตลาดน้ำตลิ่งชัน -->
        <div class="card" onclick="openModal('modal10')">
            <img src="images/images10.jpg" alt="ตลาดน้ำตลิ่งชัน" style="width:100%; border-radius:10px;">
            <h3>ตลาดน้ำตลิ่งชัน</h3>
            <p>ตลาดน้ำในกรุงเทพฯ ที่ยังคงความเป็นธรรมชาติ และวิถีชีวิตชาวบ้านริมน้ำ</p>
        </div>
        <!-- ไอคอนสยาม -->
        <div class="card" onclick="openModal('modal11')">
            <img src="images/images11.jpg" alt="ไอคอนสยาม" style="width:100%; border-radius:10px;">
            <h3>ไอคอนสยาม</h3>
            <p>ไอคอนสยาม ห้างขนาดใหญ่ที่ตั้งอยู่ริมแม่น้ำเจ้าพระยา</p>
        </div>
        <!-- สวนลุมพินี -->
        <div class="card" onclick="openModal('modal12')">
        <img src="images/images12.jpg" alt="สวนลุมพินี" style="width:100%; border-radius:10px;">
        <h3>สวนลุมพินี</h3>
        <p>สวนสาธารณะใจกลางเมือง</p>
        </div>
        <!-- ถนนข้าวสาร -->
        <div class="card" onclick="openModal('modal13')">
        <img src="images/images13.jpg" alt="ถนนข้าวสาร" style="width:100%; border-radius:10px;">
        <h3>ถนนข้าวสาร</h3>
        <p>แหล่งท่องเที่ยวยามค่ำคืน</p>
</div>
</div>
    </div>
</section>

<!-- Modals -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal1')">&times;</span>
        <h2>วัดพระแก้ว</h2>
        <p>วัดพระศรีรัตนศาสดาราม หรือที่เรียกกันว่าวัดพระแก้ว เป็นวัดสำคัญและสวยงามตั้งอยู่ในพระบรมมหาราชวัง กรุงเทพมหานคร</p>
        <img src="images/images1.jpg" alt="วัดพระแก้ว" style="width:100%; border-radius:10px;">
    <a href="map.php?place=watphrakaew" class="cute-btn">
    📍 ดูแผนที่
</a>
    </div>
</div>

<div id="modal3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal3')">&times;</span>
        <h2>Asiatique</h2>
        <p>Asiatique The Riverfront เป็นแหล่งช้อปปิ้งและท่องเที่ยวริมน้ำเจ้าพระยา มีทั้งร้านอาหาร ร้านค้าต่างๆ และการแสดงศิลปวัฒนธรรม</p>
        <img src="images/images3.jpg" alt="Asiatique" style="width:100%; border-radius:10px;">
        <a href="map.php?place=asiatique" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal4" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal4')">&times;</span>
        <h2>วัดอรุณราชวราราม</h2>
        <p>เป็นพุทธศาสนสถานในประเทศไทย มีสถานะเป็นพระอารามหลวงชั้นเอก ชนิดราชวรมหาวิหาร ตั้งอยู่ริมฝั่งแม่น้ำเจ้าพระยา</p>
        <img src="images/images4.jpg" alt="วัดอรุณราชวราราม" style="width:100%; border-radius:10px;">
        <a href="map.php?place=watarun" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal5" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal5')">&times;</span>
        <h2>เยาวราช</h2>
        <p> เป็นแหล่งรวมวัฒนธรรม อาหารอร่อย (โดยเฉพาะสตรีทฟู้ด) และธุรกิจการค้า มีบรรยากาศคึกคักทั้งกลางวันและกลางคืน</p>
        <img src="images/images5.jpg" alt="เยาวราช" style="width:100%; border-radius:10px;">
        <a href="map.php?place=yaowarat" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal6" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal6')">&times;</span>
        <h2>สวนลอยฟ้า Central Park กรุงเทพ</h2>
        <p>พื้นที่สีเขียว แลนด์มาร์คใหม่สำหรับคนทุกเจนที่ Central Park กรุงเทพ ห้างที่ตอบโจทย์ทุกไลฟ์สไตล์ทั้ง ร้านค้า ร้านอาหารดัง คาเฟ่สุดฮิต และยังมี สวนลอยฟ้า ที่ใหญ่ที่สุดในไทยอย่าง สวนดุสิตอรุณ ที่มาให้คนเมืองได้พักใจ ท่ามกลางต้นไม้สีเขียว ธรรมชาติสวยๆ และเสียงน้ำตก</p>
        <img src="images/images6.jpg" alt="สวนลอยฟ้า Central Park กรุงเทพ" style="width:100%; border-radius:10px;">
        <a href="map.php?place=centralpark" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal7" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal7')">&times;</span>
        <h2>Street Art เจริญกรุง</h2>
        <p>ลวดลาย Street Art ตามกำแพงในตรอกซอกซอยต่างๆ ตั้งแต่ต้นถนนไปจนสุด รวมถึงสถาปัตยกรรมของตึกรามบ้านช่อง</p>
        <img src="images/images7.jpg" alt="Street Art เจริญกรุง" style="width:100%; border-radius:10px;">
        <a href="map.php?place=charoenkrung" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal8" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal8')">&times;</span>
        <h2>เสาชิงช้า</h2>
        <p>สถานที่แห่งนี้เคยเป็นสถานที่ใช้ในการประกอบ “ พิธีโล้ชิงช้า” ซึ่งเป็นพิธีตามความเชื่อทางศาสนาพราหมณ์ เพื่อเสริมความเป็นสิริมงคลให้กับชีวิต</p>
        <img src="images/images8.jpg" alt="เสาชิงช้า" style="width:100%; border-radius:10px;">
        <a href="map.php?place=giantswing" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal9" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal9')">&times;</span>
        <h2>ล้ง 1919</h2>
        <p>เป็นแหล่งท่องเที่ยวเชิงประวัติศาสตร์ ที่ทำให้คนรุ่นใหม่ได้เข้าใจถึงเรื่องราวประวัติศาสตร์ไทย-จีน</p>
        <img src="images/images9.jpg" alt="ล้ง 1919" style="width:100%; border-radius:10px;">
        <a href="map.php?place=lhong1919" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal10" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal10')">&times;</span>
        <h2>ตลาดน้ำตลิ่งชัน</h2>
        <p>วิถีชีวิตชาวบ้านริมน้ำ สองฝั่งคลอง แวดล้อมไปด้วยสวนกล้วยไม้สวนผัก บรรยากาศดีๆ ของชาวบ้านฝั่งธนฯ และอาหารรสชาติอร่อยแบบท้องถิ่น ห่างไกลจากมลพิษบนท้องถนน</p>
        <img src="images/images10.jpg" alt="ตลาดน้ำตลิ่งชัน" style="width:100%; border-radius:10px;">
        <a href="map.php?place=TalingChanFloatingMarket" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal11" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal11')">&times;</span>
        <h2>ไอคอนสยาม</h2>
        <p>ไอคอนสยาม (ICONSIAM) เป็นศูนย์การค้าขนาดใหญ่ใจกลางเมืองที่ตั้งอยู่ริมแม่น้ำเจ้าพระยาฝั่งธนบุรี</p>
        <img src="images/images11.jpg" alt="ไอคอนสยาม" style="width:100%; border-radius:10px;">
        <a href="map.php?place=IconSiam" class="cute-btn">📍 ดูแผนที่</a>
    </div>
</div>
<div id="modal12" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal12')">&times;</span>
    <h2>สวนลุมพินี</h2>
    <p>สวนสาธารณะขนาดใหญ่ เหมาะพักผ่อนและออกกำลังกาย</p>
    <img src="images/images12.jpg" alt="สวนลุมพินี" style="width:100%; border-radius:10px;">
    <a href="map.php?place=lumpini" class="cute-btn">📍 ดูแผนที่</a>
  </div>
</div>
<div id="modal13" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal13')">&times;</span>
    <h2>ถนนข้าวสาร</h2>
    <p>ถนนชื่อดังสำหรับนักท่องเที่ยวกลางคืน</p>
    <img src="images/images13.jpg" alt="ถนนข้าวสาร" style="width:100%; border-radius:10px;">
    <a href="map.php?place=khaosan" class="cute-btn">📍 ดูแผนที่</a>
  </div>
</div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Plan Go💖</p>
    </footer>

    <script src="script.js"></script>
    
</body>
</html>
