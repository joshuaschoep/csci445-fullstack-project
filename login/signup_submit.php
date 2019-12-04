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

# when user first submits, should use ajax to query if username/email etc already exists
# if user already exists, indicate and reset form otherwise signup_submit 
# onsubmit password should be hashed before post for max security.
# at this point signup_submit displays message that email has been sent to user email
# and the user must verify the email before the account is active. 



?>