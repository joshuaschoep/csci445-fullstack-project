<?php
session_start();
$_SESSION['logged_in'] = true;
?>

<!DOCTYPE html>
<head>
    <title>Final Project</title>
    <link rel="icon" href="./images/Logo.png">
    <link rel="stylesheet" href="./styles.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="search/search.js"></script>
</head>
<body>
    <div class="content">
        <nav>
            <a id="signup" href="./login">Sign in / Sign up</a>
        </nav>
        <section id="centerpiece">
            <img src="./images/Logo.png" id="logo">
            <h1>Welcome to Resum&eacute;</h1>
            <form id="search">
                <input type="text" placeholder="Search users" onkeyup="searchUsers(this.value)"><input type="submit" value="Search">
            </form>
        </section>
    </div>
</body>