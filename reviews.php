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
                // Generate a unique identifier for the image file name
                $new_file_name = uniqid() . '_' . str_replace(' ', '_', $name) . '.webp';
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
        $current_date = date('Y-m-d H:i:s', time());
        $my_review = [$name, $rating, $review, $current_date, implode(',', $image_names)];
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

$reviews_data = 'spreadsheets/reviews.txt';
$reviews = [];
if (file_exists($reviews_data)) {
    $handle = fopen($reviews_data, 'r');
    while (!feof($handle)) {
        $line = fgetcsv($handle);
        if (!empty($line)) {
            array_push($reviews, $line);
        }
    }
    fclose($handle);
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
            <?php foreach ($reviews as $review) {
                $name = $review[0];
                $rating = $review[1];
                $text = $review[2];
                $date = date_format(date_create("{$review[3]}"), 'd-m-Y H:i:s');
                $images = $review[4] ? explode(',', $review[4]) : array();
                echo '<div class="review">';
                echo '<div class="review-header">';
                echo '<h3 class="review-title">' . $name . '</h3>';
                echo '<span class="review-time">' . $date . '</span>';
                echo '</div>';
                echo '<div class="review-content">';
                echo '<div class="review-rating">';
                echo '<span class="review-stars">';
                for ($i = 1; $i <= $rating; $i++) {
                    echo '★';
                }
                echo '</span>';
                echo '</div>';
                echo '<div class="review-images flex">';

                foreach ($images as $image) {
                    if (!empty($image)) {
                        echo '<img src="img/reviews/' . $image . '" alt="Photo of the review">';
                    }
                }
                echo '</div>';
                echo '<p class="review-text">' . $text . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
</main>

<?php require_once('sections/footer.php') ?>