<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');
    exit();
}

$uploadDir = '../images/';
$uploadFile = $uploadDir . basename($_FILES['profile_image']['name']);

if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadFile)) {
    // Save profile information to the database
    // Assuming a database connection and update logic here
    $name = $_POST['name'];
    // Update user profile in the database
    // Example: updateUserProfile($_SESSION['user_id'], $name, $uploadFile);
}

header('Location: ../profile.html');
?>
