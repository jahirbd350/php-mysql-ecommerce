<?php
$message='';
include 'header_admin.php';

include '../vendor/autoload.php';
use App\classes\Category;
use App\classes\SubCategory;

$subCategory = new SubCategory();
$subCategory = $subCategory->allActiveSubCategory();

if (isset($_POST['submit'])){
}



if (isset($_GET['status'])){
    if ($_GET['status']=='unpublish'){
        $message = SubCategory::unPublishSubCategory($_GET['id']);
    }

    if ($_GET['status']=='publish'){
        $message = SubCategory::publishSubCategory($_GET['id']);
    }
    if ($_GET['status']=='delete'){
        $message = SubCategory::deleteSubCategoryInfo($_GET['id']);
    }
}
$subCategory = new SubCategory();
$subCategory = $subCategory->allSubCategory();


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 col-sm-9 offset-sm-3">Sub Category Info</h4>

                            <h4 class="text-center text-info"><?php echo $message; ?></h4>
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
                                    <label for="sub_category_description" class="col-sm-3 col-form-label">Sub Category
                                        Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="sub_category_description" name="sub_category_description" class="form-control"  placeholder="Sub Category Description"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="sub_category_image" class="col-sm-3 col-form-label">Sub Category
                                        Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="sub_category_image" class="form-control-file" id="sub_category_image"/>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="text-center">
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Sub Category Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if (mysqli_num_rows($subCategory)>0) {
                                        $ser_no = 0;
                                        while ($allSubCategoryInfo = mysqli_fetch_assoc($subCategory)){
                                            $ser_no += 1;
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $ser_no ?></td>
                                                <td><?php echo $allSubCategoryInfo['category_name']; ?></td>
                                                <td><?php echo $allSubCategoryInfo['sub_category_name']; ?></td>
                                                <td><?php echo $allSubCategoryInfo['sub_category_description']; ?></td>
                                                <td class="text-center"><img src="<?php echo $allSubCategoryInfo['sub_category_image']; ?>" id="" alt="" height="50"/></td>
                                                <td class="text-center"><?php if  ($allSubCategoryInfo['sub_category_is_active']==1) { echo 'Active'; } else { echo 'Inactive';} ?></td>
                                                <td class="text-center">
                                                    <?php if  ($allSubCategoryInfo['sub_category_is_active']==1) { ?>
                                                        <a href="?status=unpublish&&id=<?php echo $allSubCategoryInfo['sub_category_id']; ?>" class="btn btn-sm btn-info sub-category-status"
                                                           id="" title="Published Sub Category">
                                                            <i id="" class="fas fa-arrow-alt-circle-up"></i>
                                                        </a>
                                                    <?php } else { ?>

                                                        <a href="?status=publish&&id=<?php echo $allSubCategoryInfo['sub_category_id']; ?>" class="btn btn-sm btn-warning sub-category-status"
                                                           id="" title="Unpublished Sub Category">
                                                            <i id="" class="fas fa-arrow-alt-circle-down"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <a href="" class="btn btn-sm btn-success edition"
                                                       id="" title="Edit Category" data-toggle="modal" data-id="<?php echo $allSubCategoryInfo['category_id']; ?>" data-target="#editModel">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="?status=delete&&id=<?php echo $allSubCategoryInfo['sub_category_id']; ?>" class="btn btn-sm btn-danger delete-sub-category"
                                                       id="" title="Delete Sub Category">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-example-modal-center" id="editModel" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Update Category Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 id="updateCategoryImageError" class="text-center text-danger"></h5>
                            <form action="" method="POST" enctype="multipart/form-data" id="updateCategoryForm">

                                <div class="form-group row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="inputName"/>
                                        <span id="nameUpdateError"></span>
                                        <input type="hidden" name="id" class="form-control" id="inputId"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control-file" id="imageInput"/>
                                        <img src="" alt="" height="80" width="120" id="inputImage"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Update Category</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include 'footer_admin.php';
            ?>

