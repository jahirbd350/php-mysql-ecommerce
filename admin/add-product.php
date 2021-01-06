<?php

namespace App\classes;
use App\classes\Category;

$message='';
include 'header_admin.php';

$category = new Category();
$allCategory = $category->allActiveCategory();

if (isset($_POST['add_product'])){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Add New Product</h4>

                            <h4 class="text-center"><?php echo $message; ?></h4>
                            <h4 class="text-center text-danger"><?php if (isset($_SESSION['message'])){  echo $_SESSION['message']; unset($_SESSION['message']);} ?></h4>


                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group row mb-4">
                                    <label for="category_name" class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <select id="category_name" class="form-control" data-live-search="true" name="category_name" required>
                                            <?php if (mysqli_num_rows($allCategory)>0){
                                            echo '<option disabled selected value="">--Select Category--</option>';
                                             while ($categoryInfo = mysqli_fetch_assoc($allCategory)){ ?>
                                                <option value="<?php echo $categoryInfo['category_id']; ?>"><?php echo $categoryInfo['category_name']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_name" class="col-sm-3 col-form-label">Sub Category name</label>
                                    <div class="col-sm-9">
                                        <select id="sub_category_name" class="form-control" name="sub_category_name" data-live-search="true">
                                            <option value="">--Select Category First--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_code" class="col-sm-3 col-form-label">Product Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="product_code" name="product_code" class="form-control"  placeholder="Product Code will be generated automatically" value=""/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_brand" class="col-sm-3 col-form-label">Product Brand</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="product_brand" name="product_brand" class="form-control"  placeholder="Enter Product brand"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_model" class="col-sm-3 col-form-label">Product Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_model" class="form-control" id="product_model" placeholder="Enter Product Model"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_size" class="col-sm-3 col-form-label">Product Size/Unit</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_size" class="form-control" id="product_size" placeholder="Enter Product Size or Unit"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_color" class="col-sm-3 col-form-label">Product Color</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_color" class="form-control" id="product_color" placeholder="Enter Product Color"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_price" class="col-sm-3 col-form-label">Product Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter Product price"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_description" class="col-sm-3 col-form-label">Product Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_description" class="form-control" id="product_description" placeholder="Enter Product Description"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="product_image" class="col-sm-3 col-form-label">Product Images</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="product_image" class="form-control-file" id="product_image" placeholder="Enter Product Images"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" name="add_product" class="btn btn-primary w-md">Add New Product</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'footer_admin.php';
?>
        <script type="text/javascript">
            $(document).ready(function(){
                // Country dependent ajax
                $("#category_name").on("change",function(){
                    var categoryId = $(this).val();
                    if (categoryId) {
                        $.ajax({
                            url :"load_category.php",
                            type:"POST",
                            cache:false,
                            data:{categoryId:categoryId},
                            success:function(data){
                                $("#sub_category_name").html(data);
                            }
                        });
                    }else{
                        $('#sub_category_name').html('<option value="">Select Category First</option>');
                    }
                    $("#sub_category_name").on("change",function() {
                        var subCategoryId = $(this).val();
                        const randomNum = Math.floor(1000 + Math.random() * 9000);
                        $("#product_code").val(categoryId + '-' + subCategoryId + '-' +randomNum);
                    });
                });
            });
        </script>
