<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $sql = "DELETE FROM register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "<script>alert('Account deleted successfully'); 
        window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error deleting account'); 
        window.location.href = 'login.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
