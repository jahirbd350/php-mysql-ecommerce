<?php


class Category
{
    protected $link;

    public function __construct(){
        $this->link = mysqli_connect('localhost', 'root', '', 'isd_ecommerce');
    }

    protected function uploadImage() {
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
                        echo ('Your file size is too large. Thanks !!!');
                    }
                } else {
                    echo ('Please use jpg or png image file. Thanks !!!');
                }
            } else {
                echo ('File already exist. Thanks !!!');
            }
        } else {
            echo ('Please use an image file. Thanks !!!');
        }
    }

    public function saveCategoryIngo() {
        $targetFile = Category::uploadImage();
        if (!$targetFile){
            return $targetFile;
        } else {
            $sql = "INSERT INTO category (category_name, category_description, category_image) VALUES ('$_POST[category_name]','$_POST[category_description]', '$targetFile')";

            if (mysqli_query($this->link, $sql)) {
                return "Category info saved successfully";
            } else {
                die('Query Problem' . mysqli_error($this));
            }
        }


    }



}