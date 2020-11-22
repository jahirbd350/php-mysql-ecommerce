<?php
$message = '';

if(isset($_POST['signUp'])){
    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';*/

    include_once 'classes/Login.php';
    $login = new Login();
    $message = $login->userRegistration();
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign Up</title>
</head>
<body>
<div class="container">
    <div class="row py-5">
        <div class="col-md-8 offset-md-2">
            <div class="col-md-12 text-center">
                <h3 class="text-danger bg-light"><?php echo $message?></h3>
                <hr>
                <h2 class="text-info">Sign-Up Form</h2>
                <hr>
            </div>

            <form class="needs-validation bg-light py-2" novalidate method="POST">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" name="firstName" class="form-control" id="validationCustom01" placeholder="First name" required>
                        <div class="valid-feedback">
                            Correct First Name
                        </div>
                        <div class="invalid-feedback">
                            Please provide First name.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" name="lastName" class="form-control" id="validationCustom02" placeholder="Last Name" required>
                        <div class="valid-feedback">
                            Correct Last Name
                        </div>
                        <div class="invalid-feedback">
                            Please provide Last Name.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="validationCustom01">Gender</label>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="others">
                            <label class="form-check-label" for="inlineRadio3">Others</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Date of Birth</label>
                        <input type="date" name="dateOfBirth" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Correct date!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid date!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Email Address</label>
                        <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="Email-address" required>
                        <div class="valid-feedback">
                            Correct email address!
                        </div>
                        <div class="invalid-feedback">
                            Please provide an Email Address.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Phone No</label>
                        <input type="number" name="phoneNo" class="form-control" id="validationCustom01" placeholder="Phone No" required>
                        <div class="valid-feedback">
                            Correct Mobile No!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Phone No.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Address</label>
                        <input type="text" name="address" class="form-control" id="validationCustom01" placeholder="Address" required>
                        <div class="valid-feedback">
                            Correct Address
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Address.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">City</label>
                        <input type="text" name="city" class="form-control" id="validationCustom03" placeholder="Ex: Dhaka" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Division</label>
                        <select class="custom-select" name="division" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Mymensing">Mymensing</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Khulna">Khulna</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Post Code</label>
                        <input type="text" name="postCode" class="form-control" id="validationCustom05" placeholder="Ex: 1206" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Password</label>
                        <input type="password" name="password" class="form-control" id="validationCustom01" placeholder="Password" required>
                        <div class="valid-feedback">
                            Correct Password!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Password.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Confirm Password</label>
                        <input type="text" name="confirmPassword" class="form-control" id="validationCustom01" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button class="btn btn-primary" name="signUp" type="submit">Sign Up</button>
                </div>
            </form>
        </div>


        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



<!------ Include the above in your HEAD tag ---------->


