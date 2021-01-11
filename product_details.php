<?php
session_start();
$product_id = $_GET['id'];

include 'vendor/autoload.php';
use App\classes\Product;
$product = new Product();
$productInfo = $product->ProductDetailsInfo($product_id);
$productDetails = mysqli_fetch_assoc($productInfo);
/*echo '<pre>';
print_r($productDetails);
echo '</pre>';*/

if(isset($_POST["add_to_cart"]))
{
    /*echo '<pre>';
print_r($_POST);
print_r($productDetails);
print_r($_SESSION);
echo '</pre>';*/
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $productDetails["product_id"],
                'item_name'               =>     $productDetails["product_name"],
                'item_price'          =>     $productDetails["unit_price"],
                'item_quantity'          =>     $_POST["itemQty"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            //echo '<script>window.location="index.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'               =>     $productDetails["product_id"],
            'item_name'               =>     $productDetails["product_name"],
            'item_price'          =>     $productDetails["unit_price"],
            'item_quantity'          =>     $_POST["itemQty"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                //echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

include "header.php";
?>

<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo $productDetails['category_name']?></a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo $productDetails['sub_category_name']?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $productDetails['product_name']?></li>
    </ol>
  </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div class="container">

<!-- ============================ ITEM DETAIL ======================== -->
	<div class="row">
		<aside class="col-md-6">
<div class="card">
<article class="gallery-wrap"> 
	<div class="img-big-wrap">
	  <div> <a href="#"><img src="images/items/15.jpg"></a></div>
	</div> <!-- slider-product.// -->
	<div class="thumbs-wrap">
	  <a href="#" class="item-thumb"> <img src="images/items/15.jpg"></a>
	  <a href="#" class="item-thumb"> <img src="images/items/15-1.jpg"></a>
	  <a href="#" class="item-thumb"> <img src="images/items/15-2.jpg"></a>
	  <a href="#" class="item-thumb"> <img src="images/items/15-1.jpg"></a>
	</div> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
</div> <!-- card.// -->
		</aside>
		<main class="col-md-6">
<article class="product-info-aside">

<h2 class="title mt-3"><?php echo $productDetails['product_name']?></h2>

<div class="rating-wrap my-3">
	<ul class="rating-stars">
		<li style="width:80%" class="stars-active"> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> 
		</li>
		<li>
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
			<i class="fa fa-star"></i> 
		</li>
	</ul>
	<small class="label-rating text-muted">132 reviews</small>
	<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
</div> <!-- rating-wrap.// -->

<div class="mb-3"> 
	<var class="price h4">BDT <?php echo $productDetails['unit_price']?></var>
	<span class="text-muted">BDT <?php echo $productDetails['unit_price']?> incl. VAT</span>
</div> <!-- price-detail-wrap .// -->

<p><?php echo $productDetails['product_description']?></p>


<dl class="row">
  <dt class="col-sm-3">Manufacturer</dt>
  <dd class="col-sm-9"><a href="#"><?php echo $productDetails['product_brand']?></a></dd>

  <dt class="col-sm-3">Article number</dt>
  <dd class="col-sm-9">596 065</dd>

  <dt class="col-sm-3">Guarantee</dt>
  <dd class="col-sm-9">2 year</dd>

  <dt class="col-sm-3">Delivery time</dt>
  <dd class="col-sm-9">3-4 days</dd>

  <dt class="col-sm-3">Availabilty</dt>
  <dd class="col-sm-9">in Stock</dd>
</dl>

	<div class="form-row  mt-4">
        <form class="d-inline-flex" action="" method="post">
            <div class="form-group col-md flex-grow-0">
                <div class="input-group mb-3 input-spinner">
                  <div class="input-group-prepend">
                    <button class="btn btn-light" type="button" id="button-plus"> + </button>
                  </div>
                  <input type="text" id="itemQty" name="itemQty" class="form-control" value="1">
                  <div class="input-group-append">
                    <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
                  </div>
                </div>
            </div> <!-- col.// -->
            <div class="form-group col-md">
                <button class="btn btn-primary" type="submit" name="add_to_cart"><i class="fas fa-shopping-cart"></i> <span class="text">Add to cart</span></button>
            </div> <!-- col.// -->
        </form>
	</div> <!-- row.// -->

</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->

<!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
<div class="container">

<div class="row">
	<div class="col-md-8">
		<h5 class="title-description">Description</h5>
		<p><?php echo $productDetails['product_description']?>
		</p>
		<ul class="list-check">
		<li>Material: Stainless steel</li>
		<li>Weight: 82kg</li>
		<li>built-in drip tray</li>
		<li>Open base for pots and pans</li>
		<li>On request available in propane execution</li>
		</ul>

		<h5 class="title-description">Specifications</h5>
		<table class="table table-bordered">
			<tr> <th colspan="2">Basic specs</th> </tr>
			<tr> <td>Type of energy</td><td>Lava stone</td> </tr>
			<tr> <td>Number of zones</td><td>2</td> </tr>
			<tr> <td>Automatic connection	</td> <td> <i class="fa fa-check text-success"></i> Yes </td></tr>

			<tr> <th colspan="2">Dimensions</th> </tr>
			<tr> <td>Width</td><td>500mm</td> </tr>
			<tr> <td>Depth</td><td>400mm</td> </tr>
			<tr> <td>Height	</td><td>700mm</td> </tr>

			<tr> <th colspan="2">Materials</th> </tr>
			<tr> <td>Exterior</td><td>Stainless steel</td> </tr>
			<tr> <td>Interior</td><td>Iron</td> </tr>

			<tr> <th colspan="2">Connections</th> </tr>
			<tr> <td>Heating Type</td><td>Gas</td> </tr>
			<tr> <td>Connected load gas</td><td>15 Kw</td> </tr>

		</table>
	</div> <!-- col.// -->
	
	<aside class="col-md-4">

		<div class="box">
		
		<h5 class="title-description">Files</h5>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>

    <h5 class="title-description">Videos</h5>
      

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="images/posts/3.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">How to use this item</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="images/posts/2.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="images/posts/1.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>


		
	</div> <!-- box.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="padding-y-lg bg-light border-top">
<div class="container">

<p class="pb-2 text-center">Delivering the latest product trends and industry news straight to your inbox</p>

<div class="row justify-content-md-center">
  <div class="col-lg-4 col-sm-6">
<form class="form-row">
    <div class="col-8">
    <input class="form-control" placeholder="Your Email" type="email">
    </div> <!-- col.// -->
    <div class="col-4">
    <button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
    </div> <!-- col.// -->
</form>
<small class="form-text">We’ll never share your email address with a third-party. </small>
  </div> <!-- col-md-6.// -->
</div>
  

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->

<?php
include 'footer.php';
?>
