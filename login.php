<?php
session_start();
$errors = array('uname' => '', 'psw' => '');
$uname = $psw = '';

if (isset($_POST['login'])) {
    if (empty($_POST['uname'])) {
        $errors['uname'] = 'Please enter your username. ';
    } else {
        $uname = $_POST['uname'];
        if (empty($_POST['psw'])) {
            $errors['psw'] = 'Please enter your password. ';
        } else {
            $psw = $_POST['psw'];
            $input = array($uname, $psw);
            $users_txt = 'spreadsheets/users.txt';
            if (file_exists($users_txt)) {
                $users = array_map('str_getcsv', file($users_txt));
                if (in_array($input, $users)) {
                    $_SESSION['user'] = $input[0];
                    header('Location: admin.php');
                } else {
                    $errors['uname'] = 'The username or password you entered was incorrect.';
                    date_default_timezone_set('Australia/Melbourne');
                    $current_date = date('d-m-Y h:i:s A', time());
                    $attempt = [$current_date, $input[0], $input[1]];
                    $accessattempts = 'spreadsheets/accessattempts.txt';
                    if (file_exists($accessattempts)) {
                        $handle = fopen($accessattempts, 'a+');
                        fputcsv($handle, $attempt);
                        fclose($handle);
                    }
                }
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Szechuan Admin Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4">
                <h3 class="text-center mt-4">Szechuan Admin Login</h3>
                <form action="login.php" method="post" class="mt-4">
                    <div class="mb-3">
                        <label for="uname" class="form-label">Username</label>
                        <span class="text-danger"><?php echo $errors['uname']  ?></span>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="psw" class="form-label">Password</label>
                        <span class="text-danger"><?php echo $errors['psw']  ?></span>
                        <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter your password">
                    </div>
                    <div class="mb-3 text-center">
                        <input name="login" type="submit" class="btn btn-danger" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>