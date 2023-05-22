<?php
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

<section id="menu" class="bg-light py-5">
    <div class="container-lg">
        <h1 class="text-center">Menu</h1>
        <div class="text-center"> <button type="button" class="btn-lg btn btn-danger" data-bs-toggle="modal" data-bs-target="#add-item">Add Item</button></div>

        <div class="row justify-content-center align-items-center p-2">
            <?php foreach ($menu_items as $item) {
                echo '<div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-2 my-1">
                <div class="card">';
                echo "<img src='img/food/{$item[3]}' class='card-img-top' alt='...'>";
                echo "<div class='card-body'>
                <div class='card-title fw-bold'>$item[0]</div>
                <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#item-detail'>Detail</button>
                </div>";
                echo '<div class="d-none item-data">';
                echo "<p class='item-price'><span class='fw-bold'>Price: </span> \${$item[1]}  </p>";
                echo "<p class='item-category'><span class='fw-bold'>Category: </span> {$item[2]} </p>";
                echo "<p class='item-description'><span class='fw-bold'>Description: </span>{$item[4]}</p>";
                echo "<p class='item-image-file'><span class='fw-bold'>Linked Image: </span>{$item[3]}</p>";
                echo "</div></div></div>";
            }
            ?>

        </div>
    </div>
</section>

<div class="modal fade" id="item-detail" tabindex="-1" aria-labelledby="item-detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="item-price"></p>
                <p class="item-category"></p>
                <p class="item-description"></p>
                <p class="item-image-file"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-item" data-bs-backdrop="static" tabindex="-1" aria-labelledby="add-item" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="admin.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name:</label>
                        <span class="text-danger"> <?php echo $errors['item_name']; ?></span>
                        <input type="name" class="form-control" id="name" name="name" required value='<?php echo $item_name ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Item Price:</label>
                        <span class="text-danger"> <?php echo $errors['price']; ?></span>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" id="price" name="price" aria-label="price" required value='<?php echo $price ?>'>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <span class="text-danger"> <?php echo $errors['category']; ?></span>
                        <select id="category" name="category" class="form-select" aria-label="category">
                            <option value="" selected disabled>Select a category</option>
                            <option value="meat dishes" <?php if ($category === 'meat dishes') echo 'selected' ?>>Meat dishes</option>
                            <option value="vegetable dishes" <?php if ($category === 'vegetable dishes') echo 'selected' ?>>Vegetable dishes</option>
                            <option value="seafood" <?php if ($category === 'seafood') echo 'selected' ?>>Seafood</option>
                            <option value="rice and noodles" <?php if ($category === 'rice and noodles') echo 'selected' ?>>Rice and noodles</option>
                            <option value="soups" <?php if ($category === 'soups') echo 'selected' ?>>Soups</option>
                            <option value="other" <?php if ($category === 'other') echo 'selected' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image-file" class="form-label">Linked Image:</label>
                        <span class="text-danger"> <?php echo $errors['image_file']; ?></span>
                        <input type="text" class="form-control" id="image-file" name="image-file" placeholder="Image file name" required value='<?php echo $image_file ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <span class="text-danger"> <?php echo $errors['description']; ?></span>
                        <textarea class="form-control" id="description" rows="3" name="description" required><?php echo $description ?></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-danger" value="Confirm">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>