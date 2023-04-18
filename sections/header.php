<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    }
    ?>
</head>

<body>
    <button class="menu"><i class="bi bi-list"></i></button>
    <div class="overlay hidden"></div>
    <nav class="menu">
        <ul class="flex flex-col">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="reservation.php">Reservation</a></li>
            <li><a href="gallery.php">Photo Gallery</a></li>
            <li><a href="#">Reviews</a></li>
            <li class="hidden"><a href="#">Account</a></li>
        </ul>
        <a href="#">Log In</a>
    </nav>

    <header>
        <div class="container flex">
            <img src="img/logo.png" alt="logo">
        </div>
    </header>