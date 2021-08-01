<?php 
    $title = 'PHP | Sign Up Page';
    $css['locations'] = [
        'public/css/main.css',
        'public/css/navigation.css',
        'public/css/pages/signup-page.css',
        'public/css/form.css',
    ];
    include('layouts/header.php'); 
?>

<div id="signup-page">
    
    <?php include('layouts/navigation.php'); ?>

    <main>
        <div class="container">

            <div class="form-styled">
                <h2>Sign Up</h2>
                
                <form action="src/signup.inc.php" method="post">
                    <input type="text" name="name" placeholder="Full name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="username_id" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="password_repeat" placeholder="Repeat Password">
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>

            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyInput") {
                        echo "?";
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