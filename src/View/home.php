<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?= $title ?> | Cinetech</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/home.css">

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script src="script/home.js"></script>
</head>
<body>
    <?php require_once 'includes' . DIRECTORY_SEPARATOR . 'header.php' ?>

    <main>
        <div id="main-wrapper">
            <h1><?= $title ?></h1>
            <?php //var_dump($_SERVER) ?>

    
            <div id="popular-container" class="slider-container">
                <h2>Popular movies</h2>
            </div>
    
            <div id="trending-tv-container" class="slider-container">
                <h2>Trending TV shows</h2>
            </div>
        </div>
    </main>

    <?php require_once 'includes' . DIRECTORY_SEPARATOR . 'footer.php' ?>
</body>
</html>
