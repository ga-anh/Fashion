<?php require_once "header.php"; ?>
<div class="container">
    <div class="login-form">
        <form action="" method="POST">
            <h1>Login</h1>
            <h2 style="color:red">
                <?php
                if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) {
                    echo $_SESSION['tb_dangnhap'];
                    unset($_SESSION['tb_dangnhap']);
                }

                ?>
            </h2>
            <p>
                Already have an account? Login in or
                <a href="<?=BASE_PATH?>/signup">Sign Up</a>
            </p>

            <label for="username">Username</label>
            <input type="text" placeholder="Enter Username" name="username" required />

            <label for="psw">Password</label>
            <input type="password" placeholder="Enter Password" name="password" required />

            <p>
                By creating an account you agree to our
                <a href="#">Terms & Privacy</a>.
            </p>

            <div class="buttons">
                <button type="submit" name="dangnhap" class="signupbtn">Login</button>
            </div>
        </form>
    </div>
</div>
<?php
require_once "footer.php";
?>