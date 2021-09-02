<?php
$message='';
include 'header_admin.php';

require '../vendor/autoload.php';
use App\classes\Product;


if (isset($_GET['status'])){
    if ($_GET['status']=='unpublish'){
        $message = Product::unpublishProduct($_GET['id']);
    }

    if ($_GET['status']=='publish'){
        $message = Product::publishProduct($_GET['id']);
    }
    if ($_GET['status']=='delete'){
        $message = Product::deleteProductInfo($_GET['id']);
    }
}
$allProduct = Product::allProductInfo();
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Manage Product Info
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Sl NO</th>
                                        <th>Product Name</th>
                                        <th>Product Brand</th>
                                        <th>Product Model</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sl NO</th>
                                        <th>Product Name</th>
                                        <th>Product Brand</th>
                                        <th>Product Model</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if (mysqli_num_rows($allProduct)>0) {
                                        $ser_no = 0;
                                        while ($allProductInfo = mysqli_fetch_assoc($allProduct)){
                                            $ser_no += 1;

                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $ser_no ?></td>
                                                <td><?php echo $allProductInfo['product_name']; ?></td>
                                                <td><?php echo $allProductInfo['product_brand']; ?></td>
                                                <td><?php echo $allProductInfo['product_model']; ?></td>
                                                <td class="text-center"><img src="<?php echo $allProductInfo['product_image']; ?>" id="" alt="" height="50"/></td>
                                               
                                                <td class="text-center">
                                                    <?php if  ($allProductInfo['product_is_active']==1) { ?>
                                                        <a href="?status=unpublish&&id=<?php echo $allProductInfo['product_id']; ?>" class="btn btn-sm btn-info sub-category-status"
                                                           id="" title="Published Sub Category">
                                                            <i id="" class="fas fa-arrow-alt-circle-up"></i>
                                                        </a>
                                                    <?php } else { ?>

                                                        <a href="?status=publish&&id=<?php echo $allProductInfo['product_id']; ?>" class="btn btn-sm btn-warning sub-category-status"
                                                           id="" title="Unpublished Sub Category">
                                                            <i id="" class="fas fa-arrow-alt-circle-down"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <a href="" class="btn btn-sm btn-success edition"
                                                       id="" title="Edit Category" data-toggle="modal" data-id="<?php echo $allProductInfo['product_id']; ?>" data-target="#editModel">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="?status=delete&&id=<?php echo $allProductInfo['product_id']; ?>" class="btn btn-sm btn-danger delete-sub-category"
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
                                <input type="hidden" name="update_id" class="form-control" id="update_id"/>
                                <div class="form-group row mb-4">
                                    <label for="category_name" class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category_name" class="form-control" id="category_name"/>
                                        <span id="nameUpdateError"></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="category_description" class="col-sm-3 col-form-label">Category description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category_description" class="form-control" id="category_description"/>
                                        <span id="nameUpdateError"></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="category_image" class="form-control-file" id="category_image"/>
                                        <hr>
                                        <label class="">Old Category Image</label><br>
                                        <img src="" alt="Can not load image!" height="80" width="120" id="inputImage"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" name="update" class="btn btn-primary w-md">Update Category</button>
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

            <script>
                $(document).ready(function (){
                    $('.edition').on('click',function (){
                        $('#editModel').modal('show');

                        var id=$(this).data('id');

                        $.ajax({
                            url:"fetchCategory.php",
                            method:"POST",
                            data:{id:id},
                            dataType:"JSON",
                            success:function(data)
                            {
                                $('#update_id').val(data.category_id);
                                $('#category_name').val(data.category_name);
                                $('#category_description').val(data.category_description);
                                $('#inputImage').attr('src', data.category_image);
                                //console.log(data);
                            }
                        })
                    });
                });
            </script>