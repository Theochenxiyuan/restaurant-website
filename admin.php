<?php
session_start();
$username = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page - Szechuan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-white shadow-sm navbar-expand-sm sticky-top">
        <div class="container-lg">
            <span class="navbar-brand text-center text-danger fw-bold fs-4">
                <?php echo $username ?>
            </span>
            <a href="logout.php" class="btn btn-danger">
                Logout
            </a>
            <button class="navbar-toggler btn-danger bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list text-bg-danger"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#reservation">View Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Manage Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#photos">Upload Photos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    <section id="menu" class="bg-white py-5">
        <div class="container-lg">
            <h1 class="text-center">Menu</h1>
        </div>
    </section>

    <div class="modal fade" id="deleteReserv" tabindex="-1" aria-labelledby="deleteNotification" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteReserv">Deleting Reservation Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this? This process can not be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a class='card-link btn btn-danger'>Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        const reservation = document.getElementById('reservation');
        const deleteReservBtn = document.querySelector('#deleteReserv a')

        reservation.addEventListener('click', (e) => {
            if (e.target.matches("[data-bs-target='#deleteReserv']")) {
                deleteReservBtn.href = "delete.php?" + "$delete_reserv=" + e.target.dataset.reserv;
            }
        })
    </script>
</body>

</html>