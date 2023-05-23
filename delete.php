<?php
$delete_reserv = '';
if (isset($_GET['$delete_reserv'])) {
    $delete_reserv = $_GET['$delete_reserv'];
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

$file_to_delete = '';
if (isset($_GET['$file_to_delete'])) {
    $file_to_delete = $_GET['$file_to_delete'];
}

if (!empty($file_to_delete)) {
    if (file_exists($file_to_delete)) {
        if (unlink($file_to_delete)) {
            echo "Image deleted successfully.";
            header('Location: admin.php');
        } else {
            echo "Unable to delete the image.";
        }
    } else {
        echo "Image not found.";
    }
}

$delete_item = '';
if (isset($_GET['$delete_item'])) {
    $delete_item = $_GET['$delete_item'];
}

if (!empty($delete_item)) {
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

    if (isset($menu_items[$delete_item - 1])) {
        unset($menu_items[$delete_item - 1]);
        $handle = fopen($menu_file, 'w');
        foreach ($menu_items as $menu_item) {
            fputcsv($handle, $menu_item);
        }
        fclose($handle);
        header('Location: admin.php');
    } else {
        echo "Invalid line number.";
    }
}
