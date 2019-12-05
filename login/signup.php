<link rel="stylesheet" href="signup.css" type="text/css">
<script src="./sha512.js"></script>
<script src="./signup.js"></script>
<form id="register" action="./signup_submit.php" method="post" onsubmit="return checkUserInfo()">
    <fieldset>
        <h4>Register</h4>
        <div class="email">
            <label for="email"><i class="fas fa-at"></i></label>
            <input type="email" 
                pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$"
                title="Only emails of the form <email>@<blah>.<blah> accepted" 
                name="email" placeholder="Email Address">
        </div>
        <div class="username">
            <label for="username"><i class="fas fa-user"></i></label>
            <input id = "uname" type="text" 
                pattern="[a-zA-Z0-9]+" title="Only numbers and letters accepted for usernames"
                name="username" placeholder="Username">
        </div>
        <div class="password">
            <label for="password"><i class="fas fa-lock"></i></label>
            <input id="pw" type="password" 
                pattern="[a-zA-Z0-9$@#%&]+" title="Only numbers, letters, and special characters $, @, #, %, & accepted for password"
                name="password" placeholder="Create Password">
        </div>
        <div class="repeat">
            <label for="password"><i class="fas fa-redo"></i></label>
            <input id="pw-repeat" type="password" 
                pattern="[a-zA-Z0-9$@#%&]+" title="Only numbers, letters, and special characters $, @, #, %, & accepted for password"
                name="repeat" placeholder="Repeat Password">
        </div>
        <div class="submit">
            <input id="checkMatch" type="submit" value="Submit"></input>
        </div>
    </fieldset>
</form>