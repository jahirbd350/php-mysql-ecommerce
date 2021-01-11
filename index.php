<?php
session_start();

require 'vendor/autoload.php';
use App\classes\Login;
use App\classes\Category;
use App\classes\Product;

if (isset($_SESSION['user_role'])){
    if ($_SESSION['user_role']=='admin'){
        header('location: admin/dashboard.php');
    }
}

if (isset($_GET['status'])){
    if ($_GET['status'] == 'logout'){
        $login = new Login();
        $message = $login->userLogout();
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "deleteCartItem")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                //echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

$category = new Category();
$allCategory = $category->allActiveCategory();
$topCategory = $category->allActiveCategory();

$product = new Product();
$allProducts = $product->allActiveProduct();
include 'header.php';
?>


<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp  All category</strong></a>
                    <div class="dropdown-menu">
                        <?php while ($categoryInfo = mysqli_fetch_assoc($allCategory)) {?>
                        <a class="dropdown-item" href="#"><?php echo $categoryInfo['category_name'] ?></a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>

                    </div>
                </li>
                <?php while ($topcategoryInfo = mysqli_fetch_assoc($topCategory)) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $topcategoryInfo['category_name'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div> <!-- collapse .// -->
    </div> <!-- container .// -->
</nav>

<section class="section-intro padding-y-sm">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/slider/Slider-1.jpg" class="d-block w-100 slider-height" height="350 px" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/slider/Slider-2.png" class="d-block w-100 slider-height" height="350 px" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/slider/Slider-3.jpg" class="d-block w-100 slider-height" height="350 px" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div> <!-- container //  -->
</section>

<section class="section-content padding-y-sm">
    <div class="container">
        <article class="card card-body">


            <div class="row">
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Fast delivery</h5>
                            <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure  class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-landmark"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">Creative Strategy</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure  class="item-feature">
                        <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">High secured </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div> <!-- col // -->
            </div>
        </article>

    </div> <!-- container .//  -->
</section>

<section class="section-content">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Popular products</h3>
        </header><!-- sect-heading -->


        <div class="row">
            <?php while ($popularProducts = mysqli_fetch_assoc($allProducts)) {?>
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="product_details.php?id=<?php echo $popularProducts['product_id']; ?>" class="text-center"> <img src="admin/<?php echo $popularProducts['product_image'];?>" alt="" height="220 px" width="220 px"> </a>
                    <figcaption class="info-wrap">
                        <a href="product_details.php?id=<?php echo $popularProducts['product_id']; ?>" class="title"><?php echo $popularProducts['product_name']; ?></a>
                        <div class="price mt-1">Product code: <?php echo $popularProducts['product_code']; ?></div> <!-- price-wrap.// -->
                        <div class="price mt-1"><?php echo $popularProducts['unit_price']; ?> BDT</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <?php } ?>

            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/2.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Some item name here</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/3.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Great product name here</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/4.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Just another product name</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>

<section class="section-content">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">New arrived</h3>
        </header><!-- sect-heading -->

        <div class="row">
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/5.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Just another product name</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/6.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Some item name here</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/7.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Great product name here</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/9.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Just another product name</a>

                        <div class="rating-wrap">
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <span class="label-rating text-muted"> 34 reviws</span>
                        </div>
                        <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>

<section class="section-content padding-bottom-sm">
    <div class="container">

        <header class="section-heading">
            <a href="#" class="btn btn-outline-primary float-right">See all</a>
            <h3 class="section-title">Recommended</h3>
        </header><!-- sect-heading -->

        <div class="row">
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/1.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Just another product name</a>
                        <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/2.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Some item name here</a>
                        <div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/3.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Great product name here</a>
                        <div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            <div class="col-md-3">
                <div href="#" class="card card-product-grid">
                    <a href="#" class="img-wrap"> <img src="assets/images/items/4.jpg"> </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">Just another product name</a>
                        <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>

<section class="section-name bg padding-y-sm">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Our Brands</h3>
        </header><!-- sect-heading -->

        <div class="row">
            <div class="col-md-2 col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo1.png"></a>
                    <figcaption class="border-top pt-2">36 Products</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo2.png"></a>
                    <figcaption class="border-top pt-2">980 Products</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo3.png"></a>
                    <figcaption class="border-top pt-2">25 Products</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo4.png"></a>
                    <figcaption class="border-top pt-2">72 Products</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo5.png"></a>
                    <figcaption class="border-top pt-2">41 Products</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
            <div class="col-md-2  col-6">
                <figure class="box item-logo">
                    <a href="#"><img src="assets/images/logos/logo2.png"></a>
                    <figcaption class="border-top pt-2">12 Products</figcaption>
                </figure> <!-- item-logo.// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>
<?php
include 'footer.php';
?>