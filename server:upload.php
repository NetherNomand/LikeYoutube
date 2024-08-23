<?php
$uploadDir = '../uploads/';
$uploadFile = $uploadDir . basename($_FILES['video']['name']);

if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadFile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
?>
