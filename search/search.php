<?php
session_start();

if(!$_SESSION['logged_in']) {
    die("Please log in first!");
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ntodtenhagen');
define('DB_PASSWORD', 'CCAOSESG');
define('DB_NAME', 'f19_ntodtenhagen');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$connection) {
    die("DB Connection failed " . mysqli_connect_error());
}
$search_param = $_GET['q'];
$QUERY = $connection->prepare("SELECT * FROM USERS WHERE public_name LIKE '%" . $search_param . "%'");

if($QUERY->execute()) {
    $response = "";
    $results = $QUERY->get_result();
    if($results->num_rows > 0) {
        while($row = $results->fetch_row()) {
            print_r($row);
            $response .= "<a class='queryResult' href='user/index.php?uid=" . $row[0] . "'>" . $row[1] . "</a><br>";
        }
    } else {
        echo "No results found!";
        return;
    }
}

echo $response;
