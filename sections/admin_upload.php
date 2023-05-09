<?php
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
?>


<section id="photos" class="bg-light py-5">
    <div class="container-lg">
        <h1 class="text-center">Photos</h1>
        <div class="accordion" id="pictures">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#foodPictures" aria-expanded="true" aria-controls="collapseOne">
                        Food Pictures
                    </button>
                </h2>
                <div id="foodPictures" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#pictures">
                    <div class="accordion-body row justify-content-center">
                        <?php
                        foreach ($food_pictures as $file) {
                            if ($file != "." && $file != "..") {
                                echo '<div class="col-6 col-sm-4 col-md-3 col-xl-2"> <figure class="figure w-100 m-1 position-relative">';
                                echo "<img src='" . $food_folder_path . "/" . $file . "' alt='picture of food' class='figure-img img-fluid' loading='lazy'>";
                                echo "<figcaption class='figure-caption text-center text-break'>$file</figcaption>";
                                echo "<a href='delete.php?\$file_to_delete=$food_folder_path/$file' class='btn btn-danger position-absolute top-0 end-0'><i class='bi bi-x-lg'></i></a>";
                                echo "</figure></div>";
                            }
                        }
                        ?>
                        <form class="mb-3" method="POST" action="admin.php" enctype="multipart/form-data">
                            <label for="food-upload" class="form-label">Upload pictures of food: </label>
                            <input class="form-control w-100 mb-2" type="file" id="food-upload" name="food-upload" required>
                            <input type="submit" value="Upload" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#interiorPictures" aria-expanded="false" aria-controls="collapseTwo">
                        Interior Pictures
                    </button>
                </h2>
                <div id="interiorPictures" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#pictures">
                    <div class="accordion-body row justify-content-center">
                        <?php
                        foreach ($interior_pictures as $file) {
                            if ($file != "." && $file != "..") {
                                echo '<div class="col-6 col-sm-4 col-md-3 col-xl-2"> <figure class="figure w-100 m-1 position-relative">';
                                echo "<img src='" . $interior_folder_path . "/" . $file . "' alt='picture of interior' class='figure-img img-fluid' loading='lazy'>";
                                echo "<figcaption class='figure-caption text-center text-break'>$file</figcaption>";
                                echo "<a href='delete.php?\$file_to_delete=$interior_folder_path/$file' class='btn btn-danger position-absolute top-0 end-0'><i class='bi bi-x-lg'></i></a>";
                                echo "</figure></div>";
                            }
                        }
                        ?>
                        <form class="mb-3" method="POST" action="admin.php" enctype="multipart/form-data">
                            <label for="interior-upload" class="form-label"> Upload pictures of interiors: </label>
                            <input class="form-control w-100 mb-2" type="file" id="interior-upload" name="interior-upload" required>
                            <input type="submit" value="Upload" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>