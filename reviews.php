<?php
require_once('sections/tools.php');
$errors = array('name' => '', 'rating' => '', 'review' => '', 'images' => '');
$name = $rating = $review = '';
$thankyou = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $errors['name'] = 'Please enter your name. ';
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors['name'] = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["rating"])) {
        $errors['rating'] = "Rating is required";
    } else {
        $rating = test_input($_POST["rating"]);
    }

    if (empty($_POST["review"])) {
        $errors['review'] = "Review is required";
    } else {
        $review = test_input($_POST["review"]);
    }

    $image_names = array();
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_size = $_FILES['images']['size'][$key];
            $file_type = $_FILES['images']['type'][$key];
            $file_error = $_FILES['images']['error'][$key];

            if ($file_error === UPLOAD_ERR_OK) {
                $upload_dir = 'img/reviews/';
                // Replace spaces in the file name with underscores
                $new_file_name = str_replace(' ', '_', $name) . '_' . time() . '.webp';
                $upload_path = $upload_dir . $new_file_name;

                // Convert the image to WebP format using the GD library
                $image = imagecreatefromstring(file_get_contents($tmp_name));
                if ($image !== false) {
                    imagepalettetotruecolor($image);
                    imagewebp($image, $upload_path, 80);
                    imagedestroy($image);
                    $image_names[] = $new_file_name;
                } else {
                    $errors['images'] = 'There was an error uploading your image.';
                }
            } else if ($file_error !== UPLOAD_ERR_NO_FILE) {
                $errors['images'] = 'There was an error uploading your image.';
            }
        }
    }
    if ($errors === ['name' => '', 'rating' => '', 'review' => '', 'images' => '']) {
        date_default_timezone_set('Australia/Melbourne');
        $current_date = date('Y-m-d h:i:s A', time());
        $my_review = [$name, $rating, $review, implode(',', $image_names)];
        $reviews_data = 'spreadsheets/reviews.txt';
        if (file_exists($reviews_data)) {
            $handle = fopen($reviews_data, 'a+');
            fputcsv($handle, $my_review);
            fclose($handle);
            $thankyou = '<div class="thankyou flex">
            <div class="card">
            <p>Thank you for reviewing.</p>
            <a href="reviews.php" class="btn">Back</a>
            </div>
            </div>';
        }
    }
}

$title = "Reviews";
require_once('sections/header.php');

echo $thankyou;
?>


<div class="enlarged flex hidden"></div>

<div class="review-overlay" <?php if ($errors !== ['name' => '', 'rating' => '', 'review' => '', 'images' => '']) echo "style='display: block;'" ?>>
    <div class="review-form">
        <h3>Write a Review</h3>
        <form method="POST" action="reviews.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <span class="error-text"> <?php echo $errors['name']  ?></span>
                <input type="text" id="name" name="name" required value='<?php echo $name ?>'>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <span class="error-text"> <?php echo $errors['rating']  ?></span>
                <select id="rating" name="rating" required>
                    <option value="" disabled selected>Select a rating</option>
                    <option value="5" <?php if ($rating === '5') echo 'selected' ?>>5 stars ★★★★★</option>
                    <option value="4" <?php if ($rating === '4') echo 'selected' ?>>4 stars ★★★★</option>
                    <option value="3" <?php if ($rating === '3') echo 'selected' ?>>3 stars ★★★</option>
                    <option value="2" <?php if ($rating === '2') echo 'selected' ?>>2 stars ★★</option>
                    <option value="1" <?php if ($rating === '1') echo 'selected' ?>>1 star ★</option>
                </select>
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <span class="error-text"> <?php echo $errors['review']  ?></span>
                <textarea id="review" name="review" rows="5" required><?php echo $review ?></textarea>
            </div>
            <div class="form-group">
                <span class="error-text"> <?php echo $errors['images']  ?></span>
                <label for="images" class="upload-btn">Upload Image</label>
                <input type="file" id="images" name="images[]" accept="image/*" multiple>
                <div class="uploaded-images grid"></div>
            </div>
            <div class="btn-group grid">
                <input class="btn" name="submit" type="submit" value="Submit">
                <button type="button" class="btn cancel-review">Cancel</button>
            </div>
        </form>
    </div>
</div>

<main class="my-2 p-1">
    <div class="container flex">
        <h2 class="text-center">Reviews</h2>
        <button class="write-review btn">Write Review</button>
    </div>

    <div class="reviews-section card my-2">
        <div class="grid py-1">
            <div class="sort flex">
                <select name="sort" id="sort">
                    <option value="top">Top Reviews</option>
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                </select>
            </div>

            <div class="filter flex">
                <select name="filter" id="filter">
                    <option value="all">All</option>
                    <option value="5-star">5-star</option>
                    <option value="4-star">4-star</option>
                    <option value="3-star">3-star</option>
                    <option value="2-star">2-star</option>
                    <option value="1-star">1-star</option>
                </select>
            </div>
        </div>

        <div class="reviews-list">
            <div class="review">
                <div class="review-header">
                    <h3 class="review-title">Jason Lu</h3>
                    <span class="review-time">10-03-2023 19:20:10</span>
                </div>
                <div class="review-content">
                    <div class="review-rating">
                        <span class="review-stars">★★★★</span>
                    </div>
                    <div class="review-images grid">
                        <img src="img/1.png" alt="Photo of the review">
                        <img src="img/2.png" alt="Photo of the review">
                    </div>
                    <p class="review-text">This is hands down the best Chinese restaurant I have ever been
                        to! The food is amazing, the service is exceptional, and the ambiance is lovely. I
                        highly recommend the Kung Pao chicken and the hot and sour soup.</p>
                </div>
            </div>
            <div class="review">
                <div class="review-header">
                    <h3 class="review-title">Charlie J</h3>
                    <span class="review-time">25-03-2023 19:12:10</span>
                </div>
                <div class="review-content">
                    <div class="review-rating">
                        <span class="review-stars">★★★</span>
                    </div>
                    <div class="review-images grid">
                        <img src="img/1.png" alt="Photo of the review">
                        <img src="img/2.png" alt="Photo of the review">
                    </div>
                    <p class="review-text">I had the pleasure of dining at Szechuan last night, and it exceeded my expectations. The menu had so many options to choose from, and the food was expertly prepared. I particularly enjoyed the crispy pork belly and the dan dan noodles. The ambiance is also great for a date or a family dinner.</p>
                </div>
            </div>
            <div class="review">
                <div class="review-header">
                    <h3 class="review-title">Sarah M</h3>
                    <span class="review-time">25-04-2023 16:12:10</span>
                </div>
                <div class="review-content">
                    <div class="review-rating">
                        <span class="review-stars">★★★★★</span>
                    </div>
                    <div class="review-images grid">
                        <img src="img/1.png" alt="Photo of the review">
                        <img src="img/2.png" alt="Photo of the review">
                    </div>
                    <p class="review-text">If you are looking for authentic Szechuan cuisine, this is the place to go. The flavors are bold and spicy, and the dishes are beautifully presented. The staff is friendly and attentive, and the atmosphere is cozy and inviting.</p>
                </div>
            </div>
        </div>

    </div>
</main>

<?php require_once('sections/footer.php') ?>