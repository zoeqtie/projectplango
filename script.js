// ================= Smooth Scroll =================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector(this.getAttribute('href'))?.scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// ================= Modal =================
function openModal(id){
    const modal = document.getElementById(id);
    if(modal) modal.style.display = "flex";
}

function closeModal(id){
    const modal = document.getElementById(id);
    if(modal) modal.style.display = "none";
}

window.addEventListener("click", function(e){
    document.querySelectorAll(".modal").forEach(modal => {
        if(e.target === modal){
            modal.style.display = "none";
        }
    });
});

// ================= ไปหน้าแผนที่ =================
function goMap(place){
    window.location.href = "map.html?place=" + place;
}

// ================= เพิ่มเข้าทริป =================
function addToTrip(type, name, price, transport) {
    let trip = JSON.parse(localStorage.getItem("trip")) || {
        food: [],
        hotel: []
    };

    trip[type].push({
    name: name,
    price: Number(price),
    transport: transport
});


    localStorage.setItem("trip", JSON.stringify(trip));
    showNotify(`เพิ่ม ${name} เข้าทริปแล้ว`, "success");
}

// ================= คำนวณค่าใช้จ่าย =================
function calculateTrip() {
    const days = Number(document.getElementById("days").value);
    const people = Number(document.getElementById("people").value);
    const transportType = document.getElementById("transport").value;

    if (days <= 0 || people <= 0) {
        showNotify("⚠️ กรุณากรอกจำนวนวันและจำนวนคน", "error");
        return;
    }

    const trip = JSON.parse(localStorage.getItem("trip")) || { food: [], hotel: [] };

    let foodCost = 0;
    let hotelCost = 0;
    let transportCost = 0;

    // ===== อาหาร =====
    trip.food.forEach(f => {
        foodCost += f.price * people * days;
    });

    // ===== โรงแรม =====
    trip.hotel.forEach(h => {
        hotelCost += h.price * days;
    });

    // ===== ค่าเดินทาง (อ้างอิงจริง กทม.) =====
    // ===== ค่าเดินทาง (เรทปัจจุบันโดยประมาณ) =====
if (transportType === "grab_car") {
    transportCost = 14 * 10 * days; 
}
else if (transportType === "grab_bike") {
    transportCost = 8 * 10 * days;
}
else if (transportType === "bolt_car") {
    transportCost = 11 * 10 * days;
}
else if (transportType === "car") {
    transportCost = 4 * 10 * days;
}
else if (transportType === "motorbike") {
    transportCost = 2.5 * 10 * days;
}


    const total = foodCost + hotelCost + transportCost;
    const perPerson = total / people;

    const resultHTML = `
        📅 จำนวนวัน: ${days} วัน <br>
        👥 จำนวนคน: ${people} คน <br>
        <hr>
        🍜 ค่าอาหารรวม: ${foodCost.toLocaleString()} บาท <br>
        🏨 ค่าโรงแรมรวม: ${hotelCost.toLocaleString()} บาท <br>
        🚗 ค่าเดินทางรวม: ${transportCost.toLocaleString()} บาท <br>
        <hr>
        💰 รวมทั้งหมด: <b>${total.toLocaleString()} บาท</b> <br>
        👤 <b>ตกคนละ: ${perPerson.toLocaleString()} บาท</b>
    `;

    document.getElementById("result").innerHTML = resultHTML;
    showNotify(resultHTML, "success", true);
}


function showSelectedList() {
    const box = document.getElementById("selected-list");
    if (!box) return;

    const trip = JSON.parse(localStorage.getItem("trip")) || { food: [], hotel: [] };

    let html = "<h3>📋 รายการที่เลือก</h3>";

    trip.food.forEach((f, i) => {
        html += `
            🍜 ${f.name} (${f.price} บาท)
            <button onclick="removeFromTrip('food',${i})">❌</button><br>
        `;
    });

    trip.hotel.forEach((h, i) => {
        html += `
            🏨 ${h.name} (${h.price} บาท)
            <button onclick="removeFromTrip('hotel',${i})">❌</button><br>
        `;
    });

    box.innerHTML = html || "ยังไม่ได้เลือกอะไร";
}

window.addEventListener("load", () => {
    showSelectedList();
    initSlider();
});


function showNotify(text, type = "success", isHTML = false) {
    const notify = document.getElementById("notify");
    const icon = document.getElementById("notify-icon");
    const txt = document.getElementById("notify-text");

    if (isHTML) {
        txt.innerHTML = text;   // ⭐ สำคัญ
    } else {
        txt.innerText = text;
    }

    if (type === "success") {
        icon.innerText = "✔";
        icon.style.color = "green";
    } else {
        icon.innerText = "✖";
        icon.style.color = "red";
    }

    notify.classList.remove("hidden");
}


function closeNotify() {
    document.getElementById("notify").classList.add("hidden");
}
function removeFromTrip(type, index) {
    let trip = JSON.parse(localStorage.getItem("trip")) || { food: [], hotel: [] };

    trip[type].splice(index, 1);

    localStorage.setItem("trip", JSON.stringify(trip));

    showNotify("ลบออกจากทริปแล้ว", "error");
    showSelectedList();
}
let currentSlide = 0;

function initSlider() {
    const slides = document.getElementById("slides");
    const dotsBox = document.getElementById("dots");

    if (!slides || !dotsBox) return;

    dotsBox.innerHTML = "";

    for (let i = 0; i < slides.children.length; i++) {
        const dot = document.createElement("span");
        dot.onclick = () => showSlide(i);
        dotsBox.appendChild(dot);
    }

    showSlide(0);
}

function showSlide(index) {
    const slides = document.getElementById("slides");
    const dots = document.querySelectorAll(".dots span");
    const total = slides.children.length;

    if (index < 0) currentSlide = total - 1;
    else if (index >= total) currentSlide = 0;
    else currentSlide = index;

    slides.style.transform = `translateX(-${currentSlide * 100}%)`;

    dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === currentSlide);
    });
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}
function bookHotel(name, price) {

    const user = JSON.parse(localStorage.getItem("user"));

    if (!user) {
        showNotify("กรุณาเข้าสู่ระบบก่อนจอง", "error");
        return;
    }

    const booking = {
        hotel: name,
        price: price,
        date: new Date().toLocaleString()
    };

    localStorage.setItem("booking", JSON.stringify(booking));

    showNotify(`จอง ${name} สำเร็จแล้ว 🎉`, "success");
}
function register() {
    const user = document.getElementById("username").value;
    const pass = document.getElementById("password").value;

    if (!user || !pass) {
        showNotify("กรอกข้อมูลให้ครบ", "error");
        return;
    }

    localStorage.setItem("user", JSON.stringify({ user, pass }));
    showNotify("สมัครสมาชิกสำเร็จ", "success");
}

function login() {
    const user = document.getElementById("username").value;
    const pass = document.getElementById("password").value;

    const savedUser = JSON.parse(localStorage.getItem("user"));

    if (savedUser && savedUser.user === user && savedUser.pass === pass) {
        showNotify("เข้าสู่ระบบสำเร็จ", "success");
    } else {
        showNotify("ชื่อหรือรหัสผ่านไม่ถูกต้อง", "error");
    }
}

function logout() {
    localStorage.removeItem("user");
    showNotify("ออกจากระบบแล้ว", "success");
}
