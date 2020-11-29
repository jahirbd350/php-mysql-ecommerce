<?php

include 'header_admin.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Sub Category Info</h4>

                            <h4 class="text-center">Message</h4>

                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group row mb-4">
                                    <label for="category_name" class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <select id="category_name" class="form-control" name="category_id">
                                            <option> --- Select Category Name ---</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category
                                        name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="horizontal-firstname-input"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Sub Category
                                        Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control-file" id="horizontal-email-input"/>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">New Sub Category</button>
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
                            <h4 class="text-center" id="resultMessage"></h4>
                            <table id="category-datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td id=""></td>
                                    <td><img src="" id="" alt="" height="50" width="80"/>
                                    </td>
                                    <td id=""></td>
                                    <td>

                                        <a href="" class="btn btn-sm btn-info sub-category-status"
                                           id="{{ $sub_category->id }}" title="Published Sub Category">
                                            <i id="" class="fas fa-arrow-alt-circle-up"></i>
                                        </a>

                                        <a href="" class="btn btn-sm btn-warning sub-category-status"
                                           id="{{ $sub_category->id }}" title="Unpublished Sub Category">
                                            <i id="" class="fas fa-arrow-alt-circle-down"></i>
                                        </a>

                                        <a href="" class="btn btn-sm btn-success edit-sub-category"
                                           id="{{ $sub_category->id }}" title="Edit Sub Category">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-sm btn-danger delete-sub-category"
                                           id="{{ $sub_category->id }}" title="Delete Sub Category">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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

