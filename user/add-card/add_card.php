<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET' and $_SESSION['logged_in']) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'ntodtenhagen');
    define('DB_PASSWORD', 'CCAOSESG');
    define('DB_NAME', 'f19_ntodtenhagen');

    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die("DB Connection failed " . mysqli_connect_error());
    }
    $title = $_GET['title'];
    $description = $_GET['description'];
    $link = $_GET['link'];

    $QUERY = $connection->prepare("INSERT INTO WEBPAGEDATA(user_id, link_to, description, title) VALUES (?, ?, ?, ?)");
    $QUERY->bind_params("isss", $_SESSION['uid'], $link, $description, $title);

    if($QUERY->execute) {
        return;
    } else {
        die("Failed to add card");
    }
}