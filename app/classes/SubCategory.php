<?php


namespace App\classes;


class SubCategory
{
    protected static function uploadImage() {
        $pictureName = $_FILES['sub_category_image']['name'];
        $directory = '../assets/images/sub_categories/';
        $targetFile = $directory . $pictureName;
        $fileType = pathinfo($pictureName, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['sub_category_image']['tmp_name']);
        if ($check) {
            if (!file_exists($targetFile)) {
                if ($fileType == 'jpg' || $fileType == 'png' || $fileType == 'jpeg') {
                    if ($_FILES['sub_category_image']['size'] < 5242880) {
                        move_uploaded_file($_FILES['sub_category_image']['tmp_name'], $targetFile);
                        return $targetFile;
                    } else {
                        $_SESSION['message'] = 'Your file size is too large. Thanks !!!';
                    }
                } else {
                    $_SESSION['message'] = 'Please use jpg, jpeg or png image file. Thanks !!!';
                }
            } else {
                $_SESSION['message'] = 'File already exist. Thanks !!!';
            }
        } else {
            $_SESSION['message'] = 'Please use an image file. Thanks !!!';
        }
    }

    public static function saveSubCategoryInfo() {
        $link = Database::db_connect();
        $targetFile = SubCategory::uploadImage();
        if (!$targetFile){
            return $targetFile;
        } else {
            $sql = "INSERT INTO sub_category (category_id, sub_category_name, sub_category_description, sub_category_image) VALUES ('$_POST[category_id]','$_POST[sub_category_name]','$_POST[sub_category_description]', '$targetFile')";

            if (mysqli_query($link, $sql)) {
                return "Sub Category info saved successfully";
            } else {
                die('Sub Category Query Problem' . mysqli_error($link));
            }
        }
    }

    public function allSubCategory(){
        $link = Database::db_connect();
        $sql = "SELECT * FROM sub_category LEFT JOIN category ON (sub_category.category_id)=(category.category_id) ORDER BY category.category_id";
        if (mysqli_query($link, $sql)) {
            return mysqli_query($link,$sql);
        } else {
            die('Sub Category Query Problem ' . mysqli_error($link));
        }
    }
    public static function publishSubCategory($id){
        $link = Database::db_connect();
        $sql = "UPDATE sub_category SET sub_category_is_active=1 WHERE sub_category_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Sub Category Info Published successfully!';
        } else {
            die('Publish Sub Category query error : '.mysqli_error($link));
        }
    }

    public static function unPublishSubCategory($id){
        $link = Database::db_connect();
        $sql = "UPDATE sub_category SET sub_category_is_active=0 WHERE sub_category_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Sub Category Info Unpublished successfully!';
        } else {
            die('Unpublish Sub Category query error : '.mysqli_error($link));
        }
    }

    public static function deleteSubCategoryInfo($id){
        $link = Database::db_connect();
        $sql = "DELETE FROM sub_category WHERE sub_category_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Sub Category Info Deleted successfully!';
        } else {
            die('Sub Category Info Delete query error : '.mysqli_error($link));
        }
    }

}