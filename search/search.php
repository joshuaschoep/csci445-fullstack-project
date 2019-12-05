<?php
session_start();

if(!$_SESSION['logged_in']) {
    die("Please log in first!");
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'csci445_fullstack_project');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$connection) {
    die("DB Connection failed " . mysqli_connect_error());
}
$search_param = $_GET['q'];
$QUERY = $connection->prepare("SELECT * FROM USERS WHERE username LIKE '%" . $search_param . "'");

if($QUERY->execute()) {
    $response = "";
    $results = $QUERY->get_result();
    if($results->num_rows > 0) {
        while($row = $results->fetch_row()) {
            $response .= "<a class='queryResult' href='user.php?name=" . $row[1] . "'>" . $row[0] . "</a><br>";
        }
    } else {
        echo "No results found!";
    }
}

