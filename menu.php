<?php
$title = "Menu";
require_once('sections/header.php');

$menu_file = 'spreadsheets/menu.txt';
$menu_items = [];
if (file_exists($menu_file)) {
    $handle = fopen($menu_file, 'r');
    while (!feof($handle)) {
        $line = fgetcsv($handle);
        if (!empty($line)) {
            array_push($menu_items, $line);
        }
    }
    fclose($handle);
}
?>


<div class="item-details">
    <div class="detail-content">

    </div>
    <button class="close">Back</button>

</div>
<main class="my-2 p-1">
    <div class="container">
        <div class="category shadow">
            <ul class="category-group">
                <li class="active-category">All</li>
                <li>Meat dishes</li>
                <li>Vegetable dishes</li>
                <li>Seafood</li>
                <li>Rice and noodles</li>
                <li>Soups</li>
                <li>Other</li>
                <div class="expand-btn"><i class="bi bi-chevron-compact-down"></i></div>
            </ul>
        </div>
        <div class="menu-group grid my-2">
            <?php
            foreach ($menu_items as $item) {
                $name = $item[0];
                $price = $item[1];
                $category = str_replace(' ', '', $item[2]);
                $picture = $item[3];
                $description = $item[4];
                echo "<div class='menu-item' data-category='$category'>
                <img class='item-picture' src='img/food/$picture' alt='dan dan noodle picture'>
                <div class='item-name'>$name</div>
                <div class='item-price'>\$$price</div>
                <div class='item-desc'>$description</div>
            </div>";
            }
            ?>
        </div>
    </div>
</main>

<?php require_once('sections/footer.php') ?>