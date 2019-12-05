<?php
require '../secrets.php';

if (isset($_GET["uid_email"]) && !empty($_GET["uid_email"]) AND isset($_GET["upass"]) && !empty($_GET["upass"])) {
    // connect to the mysql instance and db
    $conn = new mysqli($servername, $username, $password, $dbname);
    // check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $uid_email = mysqli_real_escape_string($conn, $_GET["uid_email"]);
    $upass = mysqli_real_escape_string($conn, $_GET["upass"]);

    $uid_query = $conn->prepare("SELECT user_id, username, password, active FROM USERS WHERE username=?");
    $uemail_query = $conn->prepare("SELECT user_id, username, password, active FROM USERS WHERE email=?");

    $uid_query->bind_param("s", $u);
    $uemail_query->bind_param("s", $e);

    $u = $uid_email;
    $e = $uid_email;

    $uid_query->execute();
    $uid_result = $uid_query->get_result();

    $uemail_query->execute();
    $uemail_result = $uemail_query->get_result();

    if ($uid_result->num_rows > 0) {
        $row = $uid_result->fetch_assoc();

        if ($row["active"] == 1 && $upass == $row["password"]) {
            $_SESSION['logged_in'] = true;
            $_SESSION['uid'] = $row["user_id"];
            echo "success";
        }

    }

    else if ($uemail_result->num_rows > 0) {
        $row = $uemail_result->fetch_assoc();
        if ($row["active"] == 1 && $upass == $row["password"]) {
            $_SESSION['logged_in'] = true;
            $_SESSION['uid'] = $row["user_id"];
            echo "success";
        }
    }

    $conn->close();

}

?>