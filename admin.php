<?php
session_start();
$username = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
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
    <style>
        .tooltip-inner {
            width: 500px !important;
        }
    </style>
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
                        <a class="nav-link" href="#photos">Upload Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Manage Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php require_once('sections/admin_reserv.php'); ?>
    <?php require_once('sections/admin_upload.php'); ?>
    <?php require_once('sections/admin_menu.php'); ?>

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
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

        const reservation = document.getElementById('reservation');
        const deleteReservBtn = document.querySelector('#deleteReserv a')

        const itemDetail = document.getElementById('item-detail');
        const menu = document.getElementById('menu');

        reservation.addEventListener('click', (e) => {
            if (e.target.matches("[data-bs-target='#deleteReserv']")) {
                deleteReservBtn.href = "delete.php?" + "$delete_reserv=" + e.target.dataset.reserv;
            }
        })

        menu.addEventListener('click', (e) => {
            if (e.target.matches("[data-bs-target='#item-detail']")) {
                const name = e.target.closest('.card').querySelector('.card-title').innerText;
                const itemData = e.target.closest('.card').querySelector('.item-data').innerHTML;

                itemDetail.querySelector('.modal-body').innerHTML = itemData;

                itemDetail.querySelector('.modal-title').innerText = name;
            }
        })
    </script>
</body>

</html>