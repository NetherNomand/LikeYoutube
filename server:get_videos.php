<?php
$directory = '../uploads/';
$videos = array_diff(scandir($directory), array('..', '.'));

$response = array_map(function($filename) {
    return ['filename' => $filename];
}, $videos);

header('Content-Type: application/json');
echo json_encode($response);
?>
