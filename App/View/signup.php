<?php require_once "header.php"; ?>
<div class="container">
    <div class="login-form">
        <form action="" method="POST">
            <h1>Sign Up</h1>
            <p>
                Please fill in this form to create an account. or
                <a href="<?=BASE_PATH?>/login">Login</a>
            </p>

            <label for="email">Username</label>
            <input type="text" placeholder="Enter Username" name="username" required />

            <label for="email">Email</label>
            <input type="text" placeholder="Enter Email" name="email" required />

            <label for="psw">Password</label>
            <input type="password" placeholder="Enter Password" name="password" required />

            <p>
                By creating an account you agree to our
                <a href="#">Terms & Privacy</a>.
            </p>

            <div class="buttons">
                <button type="submit" name="dangky" class="signupbtn">Sign Up</button>
            </div>
        </form>
    </div>
</div>
<?php
require_once "footer.php";
?>