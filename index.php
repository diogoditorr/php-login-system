<?php 
    $title = 'PHP | Home Page';
    $css['locations'] = [
        'public/css/main.css',
        'public/css/navigation.css',
        'public/css/pages/main-page.css'
    ];
    include('layouts/header.php'); 
?>

<div id="main-page">
    
    <?php include('layouts/navigation.php'); ?>

    <main>
        <div class="container">
            <h1>Home Page</h1>

            <div class="boxes">
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
            </div>
        </div>
    </main>
</div>

<?php include('layouts/footer.php'); ?>