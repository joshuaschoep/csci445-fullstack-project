<!doctype html>
<head>
    <title>Account Verified for Resum&eacute;</title>
    <link rel="icon" href="../images/Logo.png">
    <link rel="stylesheet" href="./styles.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2a4e989807.js" crossorigin="anonymous"></script>
</head>

<?php
$servername = 'localhost';
$username = 'tlucas';
$password = 'KIOKYMKU';
$dbname = 'f19_tlucas';
// echo 'get email: ' . $_GET['e'] . "<br>";
// echo 'get hash: ' . $_GET["h"] . "<br>"; 
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
    $user_query = "SELECT user_id,hash FROM USERS WHERE email='$email'";
    $check_hash = $conn->query($user_query)->fetch_assoc()["hash"];
    $user_id = $conn->query($user_query)->fetch_assoc()["user_id"];
    // echo 'check hash: ' . $check_hash . "<br>";
    // echo 'email: ' . $email . "<br>"; 
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

<body>
    <header>
        <h1>Account Verified for Resum&eacute;</h1>
    </header>
    <article id="centerpiece">
        <section class="left">
            <h2>Account Active</h2>
            <div>
                <p>
                    Thank you for activating your Resum&eacute; account! 
                    You can now login at the <a id="signup" href="../">Resum&eacute; home page</a>.
                </p>
            </div>   
        </section>
    </article>
</body>