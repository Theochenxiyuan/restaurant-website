<?php
$title = "Gallery";
require_once('sections/header.php');

$food_folder_path = "img/food";
$food_pictures = scandir($food_folder_path);
shuffle($food_pictures);

$interior_folder_path = "img/interior";
$interior_pictures = scandir($interior_folder_path);
shuffle($interior_pictures);
?>



<div class="overlay hidden"></div>
<div class="enlarged flex hidden"></div>


<main class="my-2 p-1">
    <div class="container">
        <div class="grid gallery-nav">
            <button class="food active">Foods</button>
            <button class="interior">Interior</button>
        </div>

        <div class="grid gallery my-1 food">
            <?php
            foreach ($food_pictures as $file) {
                if ($file != "." && $file != "..") {
                    echo "<div><img src='img/food/" . $file . "'></div>";
                }
            }
            ?>
        </div>

        <div class="grid gallery my-1 interior hidden">
            <?php
            foreach ($interior_pictures as $file) {
                if ($file != "." && $file != "..") {
                    echo "<div><img src='img/interior/" . $file . "'></div>";
                }
            }
            ?>
        </div>
    </div>
</main>

<?php require_once('sections/footer.php') ?>