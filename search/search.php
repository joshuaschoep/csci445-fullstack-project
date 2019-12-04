<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$connection) {
    die("DB Connection failed " . mysqli_connect_error());
}

$QUERY = $connection->prepare("");

if($QUERY->execute()) {
    $response = "";
    $results = $QUERY->get_result();
    if($results->num_rows > 0) {

    } else {
        echo "No results found!";
    }
}

$search_param = $_GET['q'];
