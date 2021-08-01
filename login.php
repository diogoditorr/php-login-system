<?php 
    $title = 'PHP | Login Page';
    $css['locations'] = [
        'public/css/main.css',
        'public/css/navigation.css',
        'public/css/pages/login-page.css',
        'public/css/form.css'
    ];
    include('layouts/header.php'); 
?>

<div id="login-page">
    
    <?php include('layouts/navigation.php'); ?>

    
    <main>
        <div class="container">
            <div class="form-styled">
                <h2>Log In</h2>
                
                <form action="src/login.inc.php" method="post">
                    <input type="text" name="username_id" placeholder="Username/Email">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="submit">Log in</button>
                </form>
            </div>

            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrongLogin") {
                        echo "Username/Email or password incorrect";
                    } else if ($_GET['error'] == "invalidUsernameId") {
                        echo "?";
                    } else if ($_GET['error'] == "usernameIdTaken") {
                        echo "?";
                    }
                    // ...
                }
            ?>
        </div>
    </main>
</div>

<?php include('layouts/footer.php'); ?>