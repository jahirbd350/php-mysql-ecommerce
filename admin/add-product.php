<?php
$message='';
include 'header_admin.php';
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
                                        <select id="category_name" class="form-control" name="category_id">
                                            <option disabled selected> --- Select Category Name ---</option>
                                            <?php while ($categoryInfo = mysqli_fetch_assoc($category)){ ?>
                                                <option value="<?php echo $categoryInfo['category_id']; ?>"><?php echo $categoryInfo['category_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category
                                        name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_name" class="form-control" id="horizontal-firstname-input" placeholder="Sub Category Name"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_description" class="col-sm-3 col-form-label">Product Brand</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="sub_category_description" name="sub_category_description" class="form-control"  placeholder="Sub Category Description"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Product Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Product Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Product Color</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Product Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Product Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" name="submit" class="btn btn-primary w-md">New Sub Category</button>
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
