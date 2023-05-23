<?php
require_once('sections/tools.php');
session_start();
$username = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$food_folder_path = "img/food";
$food_pictures = scandir($food_folder_path);

$interior_folder_path = "img/interior";
$interior_pictures = scandir($interior_folder_path);

// Handle food image upload
if (isset($_FILES['food-upload'])) {
    $errors = array();
    $file_name = uniqid() . "." . strtolower(end(explode('.', $_FILES['food-upload']['name'])));
    $file_size = $_FILES['food-upload']['size'];
    $file_tmp = $_FILES['food-upload']['tmp_name'];
    $file_type = $_FILES['food-upload']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['food-upload']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $food_folder_path . "/" . $file_name);
        header("Location: admin.php"); // Redirect to avoid form resubmission
        exit();
    } else {
        print_r($errors);
    }
}

// Handle interior image upload
if (isset($_FILES['interior-upload'])) {
    $errors = array();
    $file_name = uniqid() . "." . strtolower(end(explode('.', $_FILES['interior-upload']['name'])));
    $file_size = $_FILES['interior-upload']['size'];
    $file_tmp = $_FILES['interior-upload']['tmp_name'];
    $file_type = $_FILES['interior-upload']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['interior-upload']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $interior_folder_path . "/" . $file_name);
        header("Location: admin.php"); // Redirect to avoid form resubmission
        exit();
    } else {
        print_r($errors);
    }
}

$errors = array('item_name' => '', 'price' => '', 'category' => '', 'image_file' => '', 'description' => '');
$item_name = $price = $category = $image_file = $description = '';

if (isset($_POST['submit'])) {
    if (empty($_POST["item-name"])) {
        $errors['item_name'] = "Item name is required";
    } else {
        $item_name = test_input($_POST["item-name"]);
    }
    if (empty($_POST["price"])) {
        $errors['price'] = "Item price is required";
    } else {
        if (is_numeric($_POST["price"])) {
            $price = test_input($_POST["price"]);
        } else {
            $errors['price'] = "Item price must be a number";
        }
    }
    if (empty($_POST["category"])) {
        $errors['category'] = "Item category is required.";
    } else {
        $category = test_input($_POST["category"]);
    }
    if (empty($_POST["image-file"])) {
        $errors['image_file'] = "Image file name is required";
    } else {
        if (preg_match('/^(?=.*\.)[^.].*[^.]$/', $_POST["image-file"])) {
            $image_file = test_input($_POST["image-file"]);
        } else {
            $errors['image_file'] = "Invalid file name";
        }
    }
    if (empty($_POST["description"])) {
        $errors['description'] = "Item description is required.";
    } else {
        $description = test_input($_POST["description"]);
    }
    if ($errors === ['item_name' => '', 'price' => '', 'category' => '', 'image_file' => '', 'description' => '']) {
        $item_data = [$item_name, $price, $category, $image_file, $description];
        $menu_file = 'spreadsheets/menu.txt';
        if (file_exists($menu_file)) {
            $handle = fopen($menu_file, 'a+');
            fputcsv($handle, $item_data);
            fclose($handle);
            header('Location: admin.php');
            exit();
        }
    }
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


    <footer class="shadow-sm py-4 bg-danger text-bg-danger">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center"> Admin Page for Szechuan restaurant</p>
                    <p class="text-center">© 2023 Xiyuan Chen</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

        const reservation = document.getElementById('reservation');
        const deleteReservBtn = document.querySelector('#deleteReserv .delete')

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
                console.log(itemDetail);
                itemDetail.querySelector('.delete').href = "delete.php?" + "$delete_item=" + e.target.dataset.item;
            }
        })
    </script>
</body>

</html>