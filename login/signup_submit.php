<!-- email, username, password, repeat -->
<?php 
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$repeat = $_POST["repeat"];

echo $email;
echo $username;
echo $password;
echo $repeat;

echo hash('sha512', $password);

?>