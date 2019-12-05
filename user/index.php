 <?php
session_start();

if(!$_SESSION['logged_in']) {
    echo "<script>window.location='../login/index.php';</script>";
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
    $search_param = $_GET['uid'];
    $QUERY = $connection->prepare("SELECT * FROM USERS WHERE user_id LIKE ?");
    $QUERY->bind_param("i", $search_param);
    if($QUERY->execute) {
        $cards = "";
        $results = $QUERY->get_result();
        if($results->num_rows == 1) {
            $row = $results->fetch_row();
            $CARD_QUERY = $connection->prepare("SELECT * FROM WEBPAGEDATA WHERE user_id LIKE " . $row[0]);
            if($CARD_QUERY->execute) {
                $results2 = $CARD_QUERY->get_result();
                if($results2->num_rows > 0) {
                    while($row = $results2->fetch_row()) {
                        if($_SESSION['uid'] === $row[1])
                        $cards .= "<link rel=\"stylesheet\" href=\"/user/card.css\" type=\"text/css\">
<div class=\"card-wrapper\">
    <a href=\"" . $row[2] . "\">
    <article>
        <img class=\"label\" src=\"\" height=\"180px\" width=\"480px\">
        <section class=\"card-body\">
            <h1>" . $row[4] . "</h1>
            <p>" . $row[3] . "</p>        
        </section>
    </article>
    </a>
</div>
";
                    }
                }
            }
        }
    }
}
?>

<head>
    <title><?php echo $_GET['name']; ?> on Resum&eacute;</title>
    <link rel="stylesheet" href="users.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2a4e989807.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include '../generic-header.php'?>
    <section class="content">
        <?php echo $cards; ?>
        <a id="add-card" href="add-card"><i class="fas fa-plus-circle"></i></a>
    </section>
</body>
