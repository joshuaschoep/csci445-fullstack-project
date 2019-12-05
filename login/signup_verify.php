<?php
$servername = 'localhost';
$username = 'tlucas';
$password = 'KIOKYMKU';
$dbname = 'f19_tlucas';
echo 'get email: ' . $_GET['e'] . "<br>";
echo 'get hash: ' . $_GET["h"] . "<br>"; 
if(isset($_GET["e"]) && !empty($_GET['e']) AND isset($_GET["h"]) && !empty($_GET['h'])) {
    echo 'inside if'; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    // check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $email = mysqli_real_escape_string($conn, $_GET["e"]);
    $hash = mysqli_real_escape_string($conn, $_GET["h"]);

    // if email and hash match an entry, activate
    $user_query = "SELECT user_id,hash FROM USERS WHERE email=$email";
    $check_hash = $conn->query($user_query)->fetch_assoc()["hash"];
    $user_id = $conn->query($user_query)->fetch_assoc()["user_id"];
    echo 'check hash: ' . $check_hash . "<br>";
    echo 'email: ' . $email . "<br>"; 
    if ($hash == $check_hash) {
        // prepare update statement and execute
        $update_user_active = $conn->prepare("UPDATE USERS SET active=? WHERE user_id=?");
        $update_user_active->bind_param("ii", $a, $uid);
        
        $a = 1;
        $uid = $user_id;
        $update_user_active->execute();
        $update_user_active->close();
    }
    
    $conn->close();

}

?>