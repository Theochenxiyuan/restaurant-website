<?php
$delete_reserv = '';
if (isset($_GET['$delete_reserv'])) {
    $delete_reserv = $_GET['$delete_reserv'];
    echo $delete_reserv;
}

if (!empty($delete_reserv)) {
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

    if (isset($reservations[$delete_reserv - 1])) {
        unset($reservations[$delete_reserv - 1]);
        $handle = fopen($reservation_file, 'w');
        foreach ($reservations as $reservation) {
            fputcsv($handle, $reservation);
        }
        fclose($handle);
        header('Location: admin.php');
    } else {
        echo "Invalid line number.";
    }
}
