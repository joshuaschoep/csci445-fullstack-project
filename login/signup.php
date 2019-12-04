<link rel="stylesheet" href="signup.css" type="text/css">
<script src="./signup.js"></script>
<script src="./sha512.js"></script>
<form id="register" action="./signup_submit.php" method="post" onsubmit="return checkPasswordsMatch()">
    <fieldset>
        <h4>Register</h4>
        <div class="email">
            <label for="email"><i class="fas fa-at"></i></label><input type="email" name="email" placeholder="Email Address">
        </div>
        <div class="username">
            <label for="username"><i class="fas fa-user"></i></label><input type="username" name="username" placeholder="User Name">
        </div>
        <div class="password">
            <label for="password"><i class="fas fa-lock"></i></label><input id="pw" type="password" name="password" placeholder="Create Password">
        </div>
        <div class="repeat">
            <label for="password"><i class="fas fa-redo"></i></label><input id="pw-repeat" type="password" name="repeat" placeholder="Repeat Password">
        </div>
        <div class="submit">
            <input id="checkMatch" type="submit" value="Submit"></input>
        </div>
    </fieldset>
</form>