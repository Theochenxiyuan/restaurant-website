<?php
$title = "Home";
require_once('sections/header.php');
?>

<main>
    <section class="welcome flex">
        <div class="big-picture flex">
            <img src="img/big-picture.png" alt="">
        </div>
        <div class="container">
            <div class="flex flex-col p-3">
                <span class="my-2">Authentic and flavorful Chinese cuisine that will transport your taste buds
                    straight to
                    the
                    heart
                    of
                    Sichuan province</span>
                <div class="grid">
                    <a href="#" class="btn">View Menu</a>
                    <a href="reservation.php" class="btn">Reservation</a>
                </div>
            </div>
        </div>
    </section>

    <!--   <section class="signup p-2">
        <div class="container flex flex-col">
            <span>
                Log in or sign up to order your pickup meal
            </span>
            <div class="grid my-1">
                <a href="#" class="btn mx-1">Login</a>
                <a href="#" class="btn mx-1">Sign Up</a>
            </div>
        </div>
    </section> -->

    <section class="gallery my-2">
        <div class="container">
            <h2 class="text-center my-1">Eat. See. Enjoy.</h2>
            <div class="carousel" data-carousel="">
                <button class="carousel-button prev" data-carousel-button="prev" aria-label="Carousel Button Left"><i class="bi bi-caret-left-fill"></i></button>
                <button class="carousel-button next" data-carousel-button="next" aria-label="Carousel Button Right"><i class="bi bi-caret-right-fill"></i></button>
                <ul data-slides="">
                    <li class="slide" data-active="true">
                        <img src="img/food/sichuanmalachicken.png" alt="image of the food">
                    </li>

                    <li class="slide">
                        <img src="img/food/dryfriedgreenbeans.png" alt="image of the food">
                    </li>

                    <li class="slide">
                        <img src="img/food/sichuaneggplant.png" alt="image of the food">
                    </li>

                    <li class="slide">
                        <img src="img/food/hotandsoursoup.png" alt="image of the food">
                    </li>
                </ul>
            </div>
            <div class="w-100 text-center my-3"> <a href="gallery.php" class="btn">See More</a></div>
        </div>
    </section>

    <section class="reviews">
        <div class="container">
            <h2 class="text-center my-1">See what our satisfied customers are saying about us</h2>
            <div class="review-group flex">
                <div class="review-card">
                    <div class="review-card__header">
                        <h3 class="review-card__title">Jason Lu</h3>
                        <span class="review-card__date">April 8, 2023</span>
                    </div>
                    <div class="review-card__content">
                        <div class="review-card__rating">
                            <span class="review-card__stars">★★★★★</span>
                        </div>
                        <p class="review-card__text">This is hands down the best Chinese restaurant I have ever been
                            to! The food is amazing, the service is exceptional, and the ambiance is lovely. I
                            highly recommend the Kung Pao chicken and the hot and sour soup.</p>
                    </div>
                </div>

                <div class="review-card">
                    <div class="review-card__header">
                        <h3 class="review-card__title">Jason Lu</h3>
                        <span class="review-card__date">April 8, 2023</span>
                    </div>
                    <div class="review-card__content">
                        <div class="review-card__rating">
                            <span class="review-card__stars">★★★★★</span>
                        </div>
                        <p class="review-card__text">This is hands down the best Chinese restaurant I have ever been
                            to! The food is amazing, the service is exceptional, and the ambiance is lovely. I
                            highly recommend the Kung Pao chicken and the hot and sour soup.</p>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card__header">
                        <h3 class="review-card__title">Jason Lu</h3>
                        <span class="review-card__date">April 8, 2023</span>
                    </div>
                    <div class="review-card__content">
                        <div class="review-card__rating">
                            <span class="review-card__stars">★★★★★</span>
                        </div>
                        <p class="review-card__text">This is hands down the best Chinese restaurant I have ever been
                            to! The food is amazing, the service is exceptional, and the ambiance is lovely. I
                            highly recommend the Kung Pao chicken and the hot and sour soup.</p>
                    </div>
                </div>
            </div>
            <div class="w-100 text-center my-3"><a href="#" class="btn">Read More</a></div>

        </div>
    </section>
</main>

<?php require_once('sections/footer.php') ?>