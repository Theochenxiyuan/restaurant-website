<?php
$title = "About";
require_once('sections/header.php');
?>

<main>
    <section class="exterior flex">
        <div class="big-picture flex">
            <img src="img/exterior.png" alt="">
        </div>
        <div class="container">
            <div class="flex flex-col p-3">
                <h2 class="text-center my-1">About Us</h2>
            </div>
        </div>
    </section>

    <section class="about my-2 p-1">

        <div class="container">
            <h2>Welcome to Szechuan Restaurant!</h2>
            <p>At Szechuan Restaurant, we pride ourselves on offering the best in traditional and modern Szechuan cuisine. Our menu features a wide variety of dishes made with fresh ingredients and authentic Szechuan spices, ensuring that every bite is bursting with flavor.</p>

            <p>Our chefs are passionate about creating dishes that are both delicious and visually stunning. Whether you're a fan of spicy dishes or prefer something milder, we have something for everyone.</p>

            <p>We believe that dining out should be a memorable experience, which is why we go the extra mile to make sure that every guest feels welcomed and valued. From our warm and inviting atmosphere to our attentive service, we strive to make every visit to Szechuan Restaurant a special one.</p>

            <h2>Our History</h2>
            <p>Szechuan Restaurant has been a fixture in the community for over 20 years. Our founders, Jack and Lily, have a deep love and appreciation for Szechuan cuisine, and they wanted to share that love with others. They opened the restaurant with the goal of creating a space where people could come together to enjoy delicious food in a welcoming atmosphere.</p>
            <p>Over the years, Szechuan Restaurant has become known for its exceptional cuisine and outstanding service. Our loyal customers keep coming back, and we are proud to be a part of the community.</p>

            <h2>Our Philosophy</h2>
            <p>At Szechuan Restaurant, we believe that great food is about more than just taste. It's about creating an experience that engages all of your senses, from the smell of the spices to the texture of the ingredients.</p>
            <p>We take great care in sourcing the freshest ingredients, and we use traditional Szechuan cooking techniques to ensure that every dish is made to perfection. Our chefs are always experimenting with new flavors and techniques, pushing the boundaries of what Szechuan cuisine can be.</p>
            <p>But we also believe that dining out is about more than just the food. It's about creating a sense of community, where people can come together to enjoy a meal and each other's company. That's why we strive to create a warm and inviting atmosphere, where everyone feels welcome.</p>
            <h2>Our Promise</h2>
            <p>At Szechuan Restaurant, we are committed to providing our guests with an exceptional dining experience. From the moment you walk in the door to the last bite of your meal, we want you to feel valued and appreciated.</p>
            <p>We promise to always use the freshest ingredients and traditional Szechuan cooking techniques to create dishes that are both delicious and visually stunning. We promise to provide attentive service and a warm and inviting atmosphere, where you can relax and enjoy your meal.</p>
            <p>We are passionate about Szechuan cuisine, and we want to share that passion with you. Thank you for choosing Szechuan Restaurant, and we look forward to serving you soon!</p>
        </div>
    </section>

    <section class="kitchen flex">
        <div class="big-picture flex">
            <img src="img/kitchen.png" alt="">
        </div>
    </section>

    <section class="location my-4">
        <div class="container">
            <h2 class="text-center my-1">Location</h2>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1576.207460406565!2d144.96672477211743!3d-37.80374921434803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642d1ec56055b%3A0xc13a69325a398297!2s121%20Drummond%20St%2C%20Carlton%20VIC%203053!5e0!3m2!1szh-CN!2sau!4v1681226170418!5m2!1szh-CN!2sau" style="border:0; width: 100%; min-height: 40vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

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