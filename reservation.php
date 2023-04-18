<?php
require_once('sections/tools.php');
$errors = array('name' => '', 'phone' => '', 'email' => '', 'guests' => '', 'date' => '', 'time' => '');
$name = $phone = $email = $guests = $date = $time = $special = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $errors['name'] = 'Please enter your name. ';
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors['name'] = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["phone"])) {
        $errors['phone'] = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^\d{10}$/", $phone)) {
            $errors['phone'] = "Invalid phone number format";
        }
    }
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }
    }
    if (empty($_POST["guests"])) {
        $errors['guests'] = "Number of guests is required";
    } else {
        $guests = test_input($_POST["guests"]);
    }

    if (empty($_POST["date"])) {
        $errors['date'] = "Date is required";
    } else {
        $date = test_input($_POST["date"]);
        if (strtotime($date) < time()) {
            $errors['date'] = "Date must be in the future";
        }
    }

    if (empty($_POST["time"])) {
        $errors['time'] = "Time is required";
    } else {
        $time = test_input($_POST["time"]);
    }

    $special = test_input($_POST["special"]);

    if ($errors == ['name' => '', 'phone' => '', 'email' => '', 'guests' => '', 'date' => '', 'time' => '']) {
        date_default_timezone_set('Australia/Melbourne');
        $current_date = date('Y-m-d h:i:s A', time());
        $reservation = [$current_date, $name, $phone, $email, $guests, $date, $time, $special];
        $reservData = 'spreadsheets/reservation.txt';
        if (file_exists($reservData)) {
            $handle = fopen($reservData, 'a+');
            fputcsv($handle, $reservation);
            fclose($handle);
        }
    }
}
?>


<?php
$title = "Reservation";
require_once('sections/header.php');

?>

<main class="my-2 p-1">
    <h2 class="text-center my-1">Reservation</h2>
    <div class="reservation-form">
        <form action="reservation.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <span class="error-text"> <?php echo $errors['name']  ?></span>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <span class="error-text"> <?php echo $errors['phone']  ?></span>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span class="error-text"> <?php echo $errors['email']  ?></span>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="guests">#of Guests</label>
                <span class="error-text"> <?php echo $errors['guests']  ?></span>
                <input type="range" id="guests" name="guests" min="1" max="8" value="1">
                <span class="guestsOutput">1</span>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <span class="error-text"> <?php echo $errors['date']  ?></span>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <span class="error-text"> <?php echo $errors['time']  ?></span>
                <input type="time" id="time" name="time" min="10:00" max="21:00" required disabled>
                <span class="time-tip">Please select a date first</span>
            </div>
            <div class="form-group">
                <label for="special">Special Requests</label>
                <textarea id="special" name="special"></textarea>
            </div>
            <input class="btn" name="submit" type="submit" value="Confirm">
            <input class="btn" name="submit" type="submit" value="No Validate" formnovalidate>
        </form>
    </div>
</main>

<?php require_once('sections/footer.php') ?>