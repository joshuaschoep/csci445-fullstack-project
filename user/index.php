<?php
session_start();

if(!$_SESSION['logged_in']) {
    echo "<script>window.location='login/index.php';</script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'ntodtenhagen');
    define('DB_PASSWORD', 'CCAOSESG');
    define('DB_NAME', 'f19_ntodtenhagen');

    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die("DB Connection failed " . mysqli_connect_error());
    }
    $search_param = $_GET['username'];
    $QUERY = $connection->prepare("SELECT * FROM USERS WHERE username LIKE ?");
    $QUERY->bind_param("s", $search_param);
    if($QUERY->execute) {
        $cards = "";
        $results = $QUERY->get_result();
        if($results->num_rows == 1) {
            $row = $results->fetch_row();
            $CARD_QUERY = $connection->prepare("SELECT * FROM WEBPAGEDATA WHERE user_id LIKE " . $row[0]);
            if($CARD_QUERY->execute) {
                $results2 = $CARD_QUERY->get_result();
                if($results2->num_rows > 0) {

                }
            }
        }
    }
}
?>

<head>
    <title>Resum&eacute; for <?php echo $_GET['name']; ?> on Resum&eacute;</title>
    <link rel="stylesheet" href="users.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include '../generic-header.php'?>
    <section class="content">
        <?php include './card.php'?>
        <?php include './card.php'?>
    </section>
</body>
