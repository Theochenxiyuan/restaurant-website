<?php

$reservation_file = 'spreadsheets/reservation.txt';
$reservations = [];
if (file_exists($reservation_file)) {
    $handle = fopen($reservation_file, 'r');

    while (!feof($handle)) {
        $line = fgetcsv($handle);
        if (!empty($line)) {
            array_push($reservations, $line);
        }
    }
    fclose($handle);
}
?>

<section id="reservation" class="bg-light py-5">
    <div class="container-lg">
        <h1 class="text-center">Reservations</h1>
        <div class="row justify-content-center p-2">
            <?php
            if (empty($reservations)) {
                echo 'No reservation.';
            } else {
                $delete_reserv = 1;
                foreach ($reservations as $reservation) {
                    $name = $reservation[1];
                    $phone = $reservation[2];
                    $email = $reservation[3];
                    $guests = $reservation[4];
                    $date = date_format(date_create("{$reservation[5]}"), 'l, jS F Y');
                    $time = $reservation[6];
                    if (empty($reservation[7])) {
                        $request = 'No special request';
                    } else {
                        $request = $reservation[7];
                    }
                    echo "<div class='col-md-6 col-lg-4 my-2'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title fw-bold'>$name</h5>
                                <p class='card-text text-muted'>$request</p>
                            </div>
                            <ul class='list-group list-group-flush'>
                                <li class='list-group-item'>$phone</li>
                                <li class='list-group-item'>$email</li>
                                <li class='list-group-item'>$guests people</li>
                                <li class='list-group-item'>$date</li>
                                <li class='list-group-item'>$time</li>
                            </ul>
                            <div class='card-body'>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteReserv' data-reserv = '$delete_reserv'>
                                Delete 
                                </button>
                            </div>
                        </div>
                    </div>";
                    $delete_reserv++;
                }
            }

            ?>
        </div>

    </div>
</section>