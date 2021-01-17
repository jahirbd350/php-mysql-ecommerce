<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
    -->
    <link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title>E-Commerce</title>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <!-- Font awesome 5 -->
    <link href="assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="assets/css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="assets/js/script.js" type="text/javascript"></script>
</head>
<body>

<header class="section-header">

    <nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
        <div class="container">
            <ul class="navbar-nav d-none d-md-flex mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Delivery</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
            </ul>
            <ul class="navbar-nav">
                <li  class="nav-item"><a href="#" class="nav-link"> Call: +99812345678 </a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> English </a>
                    <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
                        <li><a class="dropdown-item" href="#">Arabic</a></li>
                        <li><a class="dropdown-item" href="#">Russian </a></li>
                    </ul>
                </li>
            </ul> <!-- list-inline //  -->
        </div> <!-- container //  -->
    </nav> <!-- header-top-light.// -->

    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="index.php" class="brand-wrap">
                        <img class="logo" src="assets/images/logo.png" alt="Logo">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-12 col-sm-12">
                    <form action="#" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header  mr-3">
                            <div class="dropdown">
                                <button href="#" class="icon icon-sm rounded-circle border" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i></button>
                                <span class="badge badge-pill badge-danger notify">
                                    <?php if (isset($_SESSION["shopping_cart"])) {
                                        echo count($_SESSION["shopping_cart"]);
                                    } else {
                                        echo '0';
                                    } ?>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right" style="width: 400px;">
                                    <?php
                                        if (isset($_SESSION["shopping_cart"])) {
                                            if (count($_SESSION["shopping_cart"])>0) {
                                    ?>
                                                <table class="table table-striped">
                                                    <thead class="text-center">
                                                        <tr class="small text-uppercase">
                                                            <th>Product</th>
                                                            <th>Unit Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($_SESSION["shopping_cart"] as $row) { ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="#" class="title text-dark"><?php echo $row["item_name"]?></a>
                                                                </td>
                                                                <td>
                                                                    <div class="price-wrap">
                                                                        <var class="price"><?php echo $row['item_price'] ?> BDT</var>
                                                                    </div> <!-- price-wrap .// -->
                                                                </td>
                                                                <!--<input type="hidden" name="item_id" value="<?php /*echo $row["item_id"]*/?>">-->
                                                                <td class="text-center">
                                                                    <a href="?action=deleteCartItem&&product_id=<?php echo $row["item_id"]?>"> <i class="fas fa-trash"></i></a>
                                                                    <!--<button type="submit" name="deleteCartItem"></button>-->
                                                                </td>
                                                            </tr>

                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-center" href="shopping-cart.php"><button class="btn btn-outline-primary">Open Cart</button></a>
                                        <?php } else { ?>
                                            <h5 class="text-center text-primary">Nothing in the shopping cart!</h5>
                                    <?php } } else { ?>
                                        <h5 class="text-center text-primary">Nothing in the shopping cart!</h5>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user_id'])){ ?>
                            <div class="widget-header icontext">
                                <div class="text">
                                    <div class="dropdown">
                                        <button class="icon icon-sm rounded-circle border" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                                            <a class="dropdown-item" href="#"><?php echo $_SESSION['name']?></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="user_profile.php">My Account</a>
                                            <a class="dropdown-item" href="?status=logout">Logout</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="widget-header icontext">
                                <div class="text">
                                    <div>
                                        <div class="dropdown">
                                            <button class="icon icon-sm rounded-circle border" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-user"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <form class="px-4 py-3" action="login.php" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormEmail1">Email address</label>
                                                        <input type="email" class="form-control" name="email" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleDropdownFormPassword1">Password</label>
                                                        <input type="password" class="form-control" name="password" id="exampleDropdownFormPassword1" placeholder="Password">
                                                    </div>
                                                    <button type="submit" name="signIn" class="btn btn-primary">Sign in</button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="signup.php">New around here? Sign up</a>
                                                <a class="dropdown-item" href="reset_password.php">Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
</header> <!-- section-header.// -->
