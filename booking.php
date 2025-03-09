<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $roomType = $conn->real_escape_string($_POST['roomType']);
    $roomPrice = floatval($_POST['roomPrice']);
    $checkin = $conn->real_escape_string($_POST['checkin']);
    $checkout = $conn->real_escape_string($_POST['checkout']);
    $totalPrice = floatval($_POST['totalPrice']); 

    
    $sql = "INSERT INTO bookings (name, email, roomType, roomPrice, checkin, checkout, totalPrice) 
            VALUES ('$name', '$email', '$roomType', '$roomPrice', '$checkin', '$checkout', '$totalPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
        header("Location: index.html"); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
