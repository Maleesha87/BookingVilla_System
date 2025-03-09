<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT * FROM register WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid email or password.";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare SQL statement.";
    }
}

$conn->close()
?>