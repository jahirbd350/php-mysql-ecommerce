<?php
session_start();
include "vendor/autoload.php";
use App\classes\Product;
/*echo '<pre>';
print_r($_SESSION);
echo '</pre>';*/
if(isset($_GET["action"]))
{
    if($_GET["action"] == "deleteCartItem")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["product_id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                //echo '<script>alert("Item Removed")</script>';
                //echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

include 'header.php';
?>


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page text-center">Shopping cart</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">
    <?php if (count($_SESSION["shopping_cart"])>0) { ?>
        <div class="row">
            <main class="col-md-9">
                <div class="card">
                    <table id="shoppingCart" class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th scope="col">Product</th>
                            <th scope="col" width="120">Quantity</th>
                            <th scope="col" width="120">Price</th>
                            <th scope="col" class="text-right" width="200"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($_SESSION["shopping_cart"] as $row) {
                            $product = new Product();
                            $productInfo = $product->ProductDetailsInfo($row["item_id"]);
                            $productDetails = mysqli_fetch_assoc($productInfo);
                            ?>
                        <tr>
                            <td>
                                <figure class="itemside">
                                    <div class="aside"><img src="admin/<?php echo $productDetails['product_image'] ?>" class="img-sm"></div>
                                    <figcaption class="info">
                                        <a href="#" class="title text-dark"><?php echo $row["item_name"]?></a>
                                        <p class="text-muted small">Size: XL, Color: blue, Brand: Gucci</p>
                                    </figcaption>
                                </figure>
                            </td>
                            <td>
                                <div class="form-group col-md flex-grow-0">
                                    <div class="input-group mb-3 input-spinner">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-minus"> - </button>
                                        </div>
                                        <input type="text" id="itemQty" name="itemQty" class="form-control itemQty" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                        </div>
                                    </div>
                                </div> <!-- col.// -->
                            </td>
                            <td>
                                <div class="price-wrap">
                                    <p class="d-inline" >BDT </p><var class="itemPrice price" id="itemPrice" style="display: inline"><?php echo $productDetails['unit_price'] ?></var>
                                    <p class="d-inline small" >BDT </p><small class="text-muted" id="unitPrice"> <?php echo $productDetails['unit_price'] ?></small>
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td class="text-right">
                                <a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-outline-primary" data-toggle="tooltip">
                                    <i class="fa fa-heart"></i></a>
                                <a href="?action=deleteCartItem&&id=<?php echo $row["item_id"]?>" class="btn btn-outline-primary"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="card-body border-top">
                        <a href="#" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
                        <a href="index.php" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                    </div>
                </div> <!-- card.// -->

                <div class="alert alert-success mt-3">
                    <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
                </div>

            </main> <!-- col.// -->
            <aside class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="" placeholder="Coupon code">
                                    <span class="input-group-append">
							<button class="btn btn-primary">Apply</button>
						</span>
                                </div>
                            </div>
                        </form>
                    </div> <!-- card-body.// -->
                </div>  <!-- card .// -->
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right" id="totalPrice"></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right" id="discount">BDT 0</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right h6" id="grandTotal"></dd>
                        </dl>
                        <hr>
                        <p class="text-center mb-3">
                            <img src="assets/images/misc/payments.png" height="26">
                        </p>

                    </div> <!-- card-body.// -->
                </div>  <!-- card .// -->
            </aside> <!-- col.// -->
        </div>
    <?php } else { ?>
        <h1 class="text-primary">Nothing in the shopping Cart !</h1>
    <?php } ?>
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y">
<div class="container">
<h6>Payment and refund policy</h6>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->

<?php
    include 'footer.php';
?>
<script>
    $(document).ready(function (){
        calculateSum();

        $('#shoppingCart tr').each(function(){
            $(this).find('#button-minus').on('click',function () {
                var parent_element = $(this).closest("tr");
                var qty = $(parent_element).find("#itemQty").val();
                if (qty > 1) {
                    qty--;
                    $(parent_element).find("#itemQty").val(qty);
                }
                var unitprice = $(parent_element).find('#unitPrice').text();

                $(parent_element).find('#itemPrice').text(qty * unitprice);
                calculateSum();
            })

            $(this).find('#button-plus').on('click',function () {
                var parent_element = $(this).closest("tr");
                var qty = $(parent_element).find("#itemQty").val();
                qty++;
                $(parent_element).find("#itemQty").val(qty);
                var unitprice = $(parent_element).find('#unitPrice').text();

                $(parent_element).find('#itemPrice').text(qty * unitprice);
                calculateSum();
            })
        })
        function calculateSum() {
            var total = 0;
            var discount = 0;
            var grandTotal = 0;
            $('.itemPrice').each(function () {
                var unitprice = parseFloat($(this).text());
                total += unitprice;
                $('#totalPrice').text('BDT '+total);
            })
            grandTotal =total-discount;
            $('#discount').text('BDT '+discount);
            $('#grandTotal').text('BDT '+grandTotal);
        }
    });
</script>
