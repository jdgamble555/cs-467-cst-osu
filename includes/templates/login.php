<h2>Login</h2>
<div class="container">
    <p>Your browser must allow cookies in order to log in.</p>
    <form action="login.php" method="post">
        <!--     User Log In     -->

        <label for="email"><b>Email Address</b></label>
        <input type="text" placeholder="Enter Email" name="email" size="20" maxlength="60" required>

        <label for="pass"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" size="20" required>

        <input type="submit" class="buttons" name="submit" value="Sign in">

        <!--     User Forgot Password     -->
        <p class="psw"><a href="forgot.php">Forgot password?</a></p>

        <!--     New User Sign Up     -->
        <p class="signup">Not enrolled?<a href="register.php"> Sign up now.</a></p>
    </form>
</div>