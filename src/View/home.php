<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Cinetech</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/home.css">

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script src="script/home.js"></script>
</head>
<body>
    <div id="main-wrapper">
        <h1><?= $title ?></h1>

        <div id="popular-container" class="slider-container">
            <h2>Popular movies</h2>
        </div>

        <div id="trending-tv-container" class="slider-container">
            <h2>Trending TV shows</h2>
        </div>
    </div>
</body>
</html>
