<header>
    <nav>
        <a href="index.php">Home Page</a>
        
        <?php 
            if (isset($_SESSION['username_id'])) {
                echo '
                    <a href="profile.php">Profile</a>
                    <a href="src/logout.inc.php">Log out</a>
                ';
            } else {
                echo '
                    <a href="login.php">Log in</a>
                    <a href="signup.php">Sing Up</a>
                ';
            }
        ?>
    </nav>
</header>