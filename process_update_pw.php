<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($new_password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit();
    }

    // Hash the new password
    $hashed_password = $new_password;

    
    $sql = "UPDATE register SET password = '$hashed_password' WHERE name = '$username'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Password successfully reset!');
                window.location.href = 'login.html';
              </script>";
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $conn->close();
}
?>
