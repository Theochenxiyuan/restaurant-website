<?php
$title = "Reservation";
require_once('sections/header.php');
?>

<main class="my-2 p-1">
    <div class="container">
        <h2 class="text-center my-1">Reservation</h2>
        <div class="reservation-form">
            <form action="reservation.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="guests">#of Guests</label>
                    <input type="range" id="guests" name="guests" min="1" max="8" value="1">
                    <span class="guestsOutput">1</span>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" min="10:00" max="21:00" required disabled>
                    <span class="time-tip">Please select a date first</span>
                </div>
                <div class="form-group">
                    <label for="special-requests">Special Requests</label>
                    <textarea id="special-requests" name="special-requests"></textarea>
                </div>
                <button type="submit" class="btn my-1">Confirm</button>
            </form>
        </div>
    </div>
</main>

<?php require_once('sections/footer.php') ?>