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
