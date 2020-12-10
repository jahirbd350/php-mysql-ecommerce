<?php

namespace App\classes;

class Category extends Database
{
    protected static function uploadImage() {
        $pictureName = $_FILES['category_image']['name'];
        $directory = '../assets/images/category/';
        $targetFile = $directory . $pictureName;
        $fileType = pathinfo($pictureName, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['category_image']['tmp_name']);
        if ($check) {
            if (!file_exists($targetFile)) {
                if ($fileType == 'jpg' || $fileType == 'png') {
                    if ($_FILES['category_image']['size'] < 1000000) {
                        move_uploaded_file($_FILES['category_image']['tmp_name'], $targetFile);
                        return $targetFile;
                    } else {
                        $_SESSION['message'] = 'Your file size is too large. Thanks !!!';
                    }
                } else {
                    $_SESSION['message'] = 'Please use jpg or png image file. Thanks !!!';
                }
            } else {
                $_SESSION['message'] = 'File already exist. Thanks !!!';
            }
        } else {
            $_SESSION['message'] = 'Please use an image file. Thanks !!!';
        }
    }

    public static function saveCategoryIngo() {
        $link = Database::db_connect();
        $targetFile = Category::uploadImage();
        if (!$targetFile){
            return $targetFile;
        } else {
            $sql = "INSERT INTO category (category_name, category_description, category_image) VALUES ('$_POST[category_name]','$_POST[category_description]', '$targetFile')";

            if (mysqli_query($link, $sql)) {
                return "Category info saved successfully";
            } else {
                die('Query Problem' . mysqli_error($link));
            }
        }


    }

    public static function allCategoryInfo()
    {
        $link = Database::db_connect();
        $sql = "SELECT * FROM category";
        if (mysqli_query($link,$sql)){
            $allCategory = mysqli_query($link,$sql);
            return $allCategory;
        } else {
            die('All Category Info Query Error : '.mysqli_error($link));
        }
    }

    public static function unpublishCategory($id){
        $link = Database::db_connect();
        $sql = "UPDATE category SET category_is_active=0 WHERE category_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Category Info Unpublished successfully!';
        } else {
            die('Unpublish Category query error : '.mysqli_error($link));
        }
    }

    public static function publishCategory($id){
        $link = Database::db_connect();
        $sql = "UPDATE category SET category_is_active=1 WHERE category_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Category Info Unpublished successfully!';
        } else {
            die('Publish Category query error : '.mysqli_error($link));
        }
    }

    public static function deleteCategoryInfo($id){
        $link = Database::db_connect();
        $sql = "DELETE FROM category WHERE category_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Category Info Deleted Successfully!';
        } else {
            die('Category delete query problem : '.mysqli_error($link));
        }
    }

    public static function updateCategoryInfo(){
        $link = Database::db_connect();
        if ($_FILES['category_image']['size']>0){
            $targetFile = Category::uploadImage();
            if (!$targetFile){
                $sql = "UPDATE category SET 
                category_name = '$_POST[category_name]',
                category_description = '$_POST[category_description]'
                WHERE category_id='$_POST[update_id]'";

                if (mysqli_query($link,$sql)){
                    return 'Category Info Updated successfully!';
                } else {
                    die('Category Update query error : '.mysqli_error($link));
                }
            } else {
                $sql = "UPDATE category 
                SET 
                category_name = '$_POST[category_name]',
                category_description = '$_POST[category_description]',
                category_image = '$targetFile'
                WHERE category_id='$_POST[update_id]'";

                if (mysqli_query($link,$sql)){
                    return 'Category Info Updated successfully!';
                } else {
                    die('Category Update query error : '.mysqli_error($link));
                }
            }
        } else {
            $sql = "UPDATE category SET 
                category_name = '$_POST[category_name]',
                category_description = '$_POST[category_description]'
                WHERE category_id='$_POST[update_id]'";

            if (mysqli_query($link,$sql)){
                return 'Category Info Updated successfully!';
            } else {
                die('Category Update query error : '.mysqli_error($link));
            }
        }
    }
}