<?php
$title = "Reviews";
require_once('sections/header.php');
?>

<div class="enlarged flex hidden"></div>

<div class="review-overlay">
    <div class="review-form">
        <h3>Write a Review</h3>
        <form>
            <div class="form-group">
                <label for="my-name">Name:</label>
                <input type="text" id="my-name" name="my-name" required>
            </div>
            <div class="form-group">
                <label for="my-rating">Rating:</label>
                <select id="my-rating" name="my-rating" required>
                    <option value="" disabled selected>Select a rating</option>
                    <option value="5">5 stars ★★★★★</option>
                    <option value="4">4 stars ★★★★</option>
                    <option value="3">3 stars ★★★</option>
                    <option value="2">2 stars ★★</option>
                    <option value="1">1 star ★</option>
                </select>
            </div>
            <div class="form-group">
                <label for="my-text">Review:</label>
                <textarea id="my-text" name="my-text" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="my-images" class="upload-btn">Upload Image</label>
                <input type="file" id="my-images" name="my-images[]" accept="image/*" multiple>
                <div class="uploaded-images grid"></div>
            </div>
            <div class="btn-group grid">
                <button type="submit" class="btn">Submit Review</button>
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