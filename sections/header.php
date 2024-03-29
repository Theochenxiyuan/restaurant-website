<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Szechuan Restaurant Melbourne">
    <meta name="keywords" content="Sichuan, Szechuan, Restaurant, Chinese, Melbourne, Reservation">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Szechuan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/utilities.css">


    <script src="js/menuBtn.js" defer></script>

    <?php
    $file_name = basename($_SERVER['PHP_SELF']);
    if ($file_name === 'index.php') {
        echo '<script src="js/carousel.js" defer></script>';
        echo '<link rel="stylesheet" href="css/home.css">';
    } elseif ($file_name === 'gallery.php') {
        echo '<script src="js/gallery.js" defer></script>';
        echo '<link rel="stylesheet" href="css/gallery.css">';
    } elseif ($file_name === 'reservation.php') {
        echo '<script src="js/reservation.js" defer></script>';
        echo '<link rel="stylesheet" href="css/reservation.css">';
    } elseif ($file_name === 'about.php') {
        echo '<link rel="stylesheet" href="css/about.css">';
    } elseif ($file_name === 'reviews.php') {
        echo '<link rel="stylesheet" href="css/reviews.css">';
        echo '<script src="js/reviews.js" defer></script>';
    } elseif ($file_name === 'menu.php') {
        echo '<link rel="stylesheet" href="css/menu.css">';
        echo '<script src="js/menu.js" defer></script>';
    }
    ?>
</head>

<body>
    <div class="overlay hidden"></div>
    <nav class="menu">
        <ul class="flex flex-col">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="reservation.php">Reservation</a></li>
            <li><a href="gallery.php">Photo Gallery</a></li>
            <li><a href="reviews.php">Reviews</a></li>
        </ul>
        <a href="#">Log In</a>
    </nav>

    <header>
        <div class="container flex">
            <nav>
                <ul class="flex flex-col">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="menu.php">Menu</a></li>
                </ul>
            </nav>

            <img src="img/logo.webp" alt="logo">

            <nav>
                <ul class="flex flex-col">
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="gallery.php">Photo Gallery</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <button class="menu" aria-label="Menu Button"><i class="bi bi-list"></i></button>