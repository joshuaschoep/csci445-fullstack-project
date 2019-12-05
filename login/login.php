<link rel="stylesheet" href="login.css" type="text/css">
<script src="./sha512.js"></script>
<script src="./signup.js"></script>
<form id="login" action="../index.php" onsubmit="return loginInfo()">
    <fieldset>
        <h4>Log in</h4>
        <div class="email">
            <label for="email"><i class="fas fa-at"></i></label>
            <input id="uid_email" type="email" name="email" placeholder="Email Address or Username">
        </div>
        <div class="password">
            <label for="password"><i class="fas fa-lock"></i></label>
            <input id="upass" type="password" name="password" placeholder="Password">
        </div>
        <div class="submit">
            <input type="submit" value="Submit"></input>
        </div>
    </fieldset>
</form>