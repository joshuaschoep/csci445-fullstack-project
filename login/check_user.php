<?php
require '../secrets.php';

if (isset($_GET["uname"]) && !empty($_GET["uname"])) {
    
    // connect to the mysql instance and db
    $conn = new mysqli($servername, $username, $password, $dbname);
    // check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $check_uname = mysqli_real_escape_string($conn, $_GET["uname"]);

    $uname_query = $conn->prepare("SELECT * FROM USERS WHERE username=?");
    $uname_query->bind_param("s", $u);

    $u = $check_uname;

    $uname_query->execute();
    $result = $uname_query->get_result();

    $conn->close();

    if ($result->num_rows > 0) {
        echo "repeat";
    }


}

?>