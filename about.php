<?php
$title = "About";
require_once('sections/header.php');
?>

<main>
    <section class="about my-2 p-1">
        <div class="container">
            <h2 class="text-center my-1">About Us</h2>
            <div class="flex w-100 flex flex-wrap">
                <img src="img/exterior.png" class="w-100 m-1 shadow" alt="" style="max-width: 425px;">
                <img src="img/kitchen.png" class="w-100 m-1 shadow" alt="" style="max-width: 425px;">
            </div>
            <p>Szechuan is a family-owned restaurant that specializes in authentic Szechuan cuisine. Our dishes are
                made using traditional techniques and the freshest ingredients to create a unique and flavorful
                dining experience. Our menu features a wide selection of Szechuan dishes, including our famous spicy
                hot pot, mapo tofu, and kung pao chicken. Our chefs are passionate about Szechuan cuisine and are
                committed to delivering the highest quality dishes to our guests. We take pride in our warm and
                welcoming atmosphere, making Szechuan Chinese restaurant the perfect place to gather with friends
                and family for a delicious meal. Come and experience the bold and fiery flavors of Szechuan cuisine
                at our restaurant today!</p>
        </div>
    </section>

    <hr>

    <section class="location my-4">
        <div class="container">
            <h2 class="text-center my-1">Location</h2>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1576.207460406565!2d144.96672477211743!3d-37.80374921434803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642d1ec56055b%3A0xc13a69325a398297!2s121%20Drummond%20St%2C%20Carlton%20VIC%203053!5e0!3m2!1szh-CN!2sau!4v1681226170418!5m2!1szh-CN!2sau" style="border:0; width: 100%; min-height: 40vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <hr>

    <section class="hours my-2 p-1">
        <div class="container">
            <h2 class="text-center my-1">Opening Hours</h2>
            <ul>
                <li>Monday: <span class="float-right">10:00 - 19:00</span></li>
            </ul>
            <ul>
                <li>Tuesday: <span class="float-right">10:00 - 19:00</span></li>
            </ul>
            <ul>
                <li>Wednesday: <span class="float-right">10:00 - 19:00</span></li>
            </ul>
            <ul>
                <li>Thursday: <span class="float-right">10:00 - 21:00</span></li>
            </ul>
            <ul>
                <li>Friday: <span class="float-right">10:00 - 21:00</span></li>
            </ul>
            <ul>
                <li>Saturday: <span class="float-right">10:00 - 19:00</span></li>
            </ul>
            <ul>
                <li>Sunday: <span class="float-right">10:00 - 19:00</span></li>
            </ul>
        </div>
    </section>
</main>

<?php require_once('sections/footer.php') ?>