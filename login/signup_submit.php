<!-- email, username, password, repeat -->
<!doctype html>
<head>
    <title>Register with Resum&eacute;</title>
    <link rel="icon" href="../images/Logo.png">
    <link rel="stylesheet" href="./styles.css" type="text/css">
    <link rel="stylesheet" href="./signup-submit.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/2a4e989807.js" crossorigin="anonymous"></script>
</head>

<?php 

$domain = 'luna.mines.edu';
$domain_path = 'fall_2019/tlucas';
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'csci_fullstack_project';

// make sure username email and password are not null and not empty
if(isset($_POST["username"]) && !empty($_POST["username"]) AND
   isset($_POST["email"]) && !empty($_POST["email"]) AND
   isset($_POST["password"]) && !empty($_POST["password"])) {
    // echo "made it into if <br>";
    // connect to the mysql instance and db
    $conn = new mysqli($servername, $username, $password, $dbname);
    // check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // as long as the info is populated, store as local variables
    // password is already a hash but username and email not
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    // generate hash to send to email to activate
    $hash = md5(rand(0,1000));

    // prepared statement to insert info into db
    $insert_user = $conn->prepare("INSERT INTO USERS (username, email, password, hash) VALUES (?, ?, ?, ?)");
    if(!$insert_user){
        die($conn->error);
    }
    $insert_user->bind_param("ssss", $u, $e, $p, $h);
    
    $u = $username;
    $e = $email;
    $p = $password;
    $h = $hash;

    // just for debugging
    // echo $u . "<br>";
    // echo $e . "<br>";
    // echo $p . "<br>";
    // echo $h . "<br>";

    // no need to verify if user already exists as this is handled with ajax on submit
    // insert into db
    $insert_user->execute();
    // echo "inserted user... " . $uid . "<br>";

    // close db connection
    $conn->close();

    $success_msg = "Your account has been created but still must be activated before you can login. Please verify your email by clicking the activation link sent to you.";
    
    // now send email with hash to verify
    $to = $email;
    $subject = 'Resume: Account Verification';
    $headers = 'From:noreply@' . $domain;
    $message = '
    
    Congratulations on signing up for Resume!
    An account has been created for you, but you still need to activate it. 
    Please make sure the following information is correct and follow the instructions below.

    Username: ' . $username . '
    Email: ' . $email . '

    Please click the following link to activate your account:
    http://' . $domain . '/' . $domain_path . '/login/signup_verify.php?e=' . $email . '&h=' . $hash . ' 
    
    ';

    $message = wordwrap($message, 100, "\r\n");

    mail($to, $subject, $message, $headers);
    // echo "sent email to: " . $email_to . "<br>";
   }
# when user first submits, should use ajax to query if username/email etc already exists
# if user already exists, indicate and reset form otherwise signup_submit 
# onsubmit password should be hashed before post for max security.
# at this point signup_submit displays message that email has been sent to user email
# and the user must verify the email before the account is active. 
?>



<body>
    <header>
        <h1>Register with Resum&eacute;</h1>
    </header>
    <article id="centerpiece">
        <h2>Welcome!</h2>
        <p>
            Thank you <?php echo $username; ?> for registering with Resum&eacute;. 
            We are very excited for you to join, but your account is not active yet. 
            An email has been sent to <?php echo $email; ?> with instructions on how to 
            proceed. Once you have completed the following steps you will be able to login.
        </p>   
    </article>
</body>