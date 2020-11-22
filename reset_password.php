<?php
$message = '';

if (isset($_POST['reset_password'])){
   /* echo '<pre>';
    print_r($_POST);
    echo '</pre>';*/

    include_once 'classes/Login.php';
    $login = new Login();
    $message = $login->resetPassword();
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 offset-md-4 bg-light">
            <div class="col-md-12 text-center">
                <h4 class="text-danger bg-light"><?php echo $message?></h4>
                <hr>
                <h2 class="text-info">Reset your password</h2>
                <hr>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="dob" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                    <label for="cf_password">Repeat New Password</label>
                    <input type="password" name="cf_password" class="form-control" id="cf_password" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="reset_password" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
