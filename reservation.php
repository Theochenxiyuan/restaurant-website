<?php
require_once('sections/tools.php');
$errors = array('name' => '', 'phone' => '', 'email' => '', 'guests' => '', 'date' => '', 'time' => '');
$name = $phone = $email = $date = $time = $special = '';
$guests = '1';
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
            $errors['date'] = "Please select a date in the future";
        } else {
            // Validate time based on selected date
            if (empty($_POST["time"])) {
                $errors['time'] = "Time is required";
            } else {
                $time = test_input($_POST["time"]);
                $dayOfWeek = date('l', strtotime($date));
                $openingTime = ($dayOfWeek == 'Thursday' || $dayOfWeek == 'Friday') ? '10:00' : '10:00';
                $closingTime = ($dayOfWeek == 'Thursday' || $dayOfWeek == 'Friday') ? '21:00' : '19:00';
                if (strtotime($time) < strtotime($openingTime) || strtotime($time) > strtotime($closingTime)) {
                    $errors['time'] = "Please select a time between $openingTime and $closingTime on $dayOfWeek";
                }
            }
        }
    }


    $special = test_input($_POST["special"]);

    if ($errors == ['name' => '', 'phone' => '', 'email' => '', 'guests' => '', 'date' => '', 'time' => '']) {
        date_default_timezone_set('Australia/Melbourne');
        $current_date = date('Y-m-d h:i:s A', time());
        $reservation = [$current_date, $name, $phone, $email, $guests, $date, $time, $special];
        $reserv_data = 'spreadsheets/reservation.txt';
        if (file_exists($reserv_data)) {
            $handle = fopen($reserv_data, 'a+');
            fputcsv($handle, $reservation);
            fclose($handle);
            $thankyou = '<div class="thankyou flex">
            <div class="card">
            <p>Thank you for choosing to dine with us! We have received your restaurant reservation and will be in touch with you soon to confirm whether your table has been secured. We look forward to welcoming you to our restaurant.</p>
            <a href="index.php" class="btn">Back</a>
            </div>
            </div>';
        }
    }
}
?>


<?php
$title = "Reservation";
require_once('sections/header.php');
echo $thankyou;
?>

<main class="my-2 p-1">
    <h2 class="text-center my-1">Reservation</h2>
    <div class="reservation-form card">
        <form action="reservation.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <span class="error-text"> <?php echo $errors['name']  ?></span>
                <input type="text" id="name" name="name" required value='<?php echo $name ?>'>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <span class="error-text"> <?php echo $errors['phone']  ?></span>
                <input type="tel" id="phone" name="phone" required value='<?php echo $phone ?>'>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span class="error-text"> <?php echo $errors['email']  ?></span>
                <input type="email" id="email" name="email" required value='<?php echo $email ?>'>
            </div>
            <div class="form-group">
                <label for="guests">#of Guests</label>
                <span class="error-text"> <?php echo $errors['guests']  ?></span>
                <select name="guests" id="guests" required>
                    <option value="" disabled selected>Please select</option>
                    <option value="1-2" <?php if ($guests === '1-2') echo 'selected' ?>>1-2 people</option>
                    <option value="3-4" <?php if ($guests === '3-4') echo 'selected' ?>>3-4 people</option>
                    <option value="5-6" <?php if ($guests === '5-6') echo 'selected' ?>>5-6 people</option>
                    <option value="7-8" <?php if ($guests === '7-8') echo 'selected' ?>>7-8 people</option>
                    <option value="9+" <?php if ($guests === '9+') echo 'selected' ?>>9+ people</option>
                </select>
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
                <textarea id="special" name="special"><?php echo $special ?></textarea>
            </div>
            <input class="btn" name="submit" type="submit" value="Confirm">
            <input class="btn" name="submit" type="submit" value="No Validate" formnovalidate>
        </form>
    </div>
</main>

<?php require_once('sections/footer.php') ?>