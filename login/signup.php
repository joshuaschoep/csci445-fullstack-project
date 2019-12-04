<link rel="stylesheet" href="signup.css" type="text/css">
<form id="register" action="./signup_submit.php" method="post">
    <fieldset>
        <h4>Register</h4>
        <div class="email">
            <label for="email"><i class="fas fa-at"></i></label><input type="email" name="email" placeholder="Email Address">
        </div>
        <div class="username">
            <label for="username"><i class="fas fa-user"></i></label><input type="username" name="username" placeholder="User Name">
        </div>
        <div class="password">
            <label for="password"><i class="fas fa-lock"></i></label><input type="password" name="password" placeholder="Create Password">
        </div>
        <div class="repeat">
            <label for="password"><i class="fas fa-redo"></i></label><input type="password" name="repeat" placeholder="Repeat Password">
        </div>
        <div class="submit">
            <input type="submit" value="Submit"></input>
        </div>
    </fieldset>
</form>