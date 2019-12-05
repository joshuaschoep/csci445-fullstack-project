<?php
session_start();

if (!$_SESSION['logged_in']) {
    echo "<script>window.location='../login/index.php';</script>";
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ntodtenhagen');
define('DB_PASSWORD', 'CCAOSESG');
define('DB_NAME', 'f19_ntodtenhagen');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die("DB Connection failed " . mysqli_connect_error());
}

if ($_GET['method'] === "update") {
    $QUERY = $connection->prepare("SELECT * FROM WEBPAGEDATA WHERE card_id=?");
    $QUERY->bind_param("i", $_GET["card_id"]);
    if ($QUERY->execute) {
        $row = $QUERY->get_result()->fetch_row();

    }
} else if ($_GET['method'] === "delete") {
    $QUERY = $connection->prepare("DELETE FROM WEBPAGEDATA WHERE card_id=?");
    $QUERY->bind_param("i", $_GET["card_id"]);
    if($QUERY->execute) {
        die();
    }
}

?>


<head>
    <title>Resum&eacute;</title>
    <link rel="stylesheet" href="add-card.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2a4e989807.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include '../../generic-header.php' ?>
<section class="content">
    <form>
        <label for="title">Title</label>
        <input type="text" placeholder="Title me!" value="<?php if ($_GET['method'] === "update") echo $row[4]; ?>">
        <label for="description">Description</label>
        <input type="textarea" value="<?php if ($_GET['method'] === "update") echo $row[3]; ?>">
        <label for="link">Link</label>
        <input type="url" placeholder="Link to your project's website">
        <input type="submit" value="<?php if ($_GET['method'] === "update") echo $row[2] ?>">
    </form>
</section>
</body>
