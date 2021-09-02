<?php


namespace App\classes;


class Product
{
    protected $link;

    public function __construct(){
        $this->link = Database::db_connect();
    }

    protected static function uploadFile() {
        $pictureName = $_FILES['file']['name'];
        $directory = 'assets/img/products/';
        $fileType = pathinfo($pictureName, PATHINFO_EXTENSION);
        $targetFile = $directory . $_POST['product_code'].'.'.$fileType;
        $check = filesize($_FILES['file']['tmp_name']);
        if ($check) {
            if (!file_exists($targetFile)) {
                if ($fileType == 'jpg' || $fileType == 'png' || $fileType == 'jpeg') {
                    if ($_FILES['file']['size'] < 536870912) {
                        move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
                        return $targetFile;
                    } else {
                        $_SESSION['message'] = 'Your file size is too large. Maximum File size is 100MB. Thanks !!!';
                    }
                } else {
                    $_SESSION['message'] = 'Please use jpg, jpeg, png, pdf, doc, docx, xlsx, xlx and ppt file. Thanks !!!';
                }
            } else {
                $_SESSION['message'] = 'File Name already exist. Please Rename and upload again. Thanks !!!';
            }
        } else {
            $_SESSION['message'] = 'Problem with the file! Please another file. Thanks !!!';
        }
    }

    public function addNewProduct(){
        $targetFile = Product::uploadFile();
        if (!$targetFile){
            return 'Product Image Upload Error!';
        } else {
            $sql = "INSERT INTO products
                    (category_id , sub_category_id, product_code, product_brand, product_model, product_name, product_size, product_color, unit_price, quantity, product_description, product_image) 
                    VALUES 
                    ('$_POST[category_name]', '$_POST[sub_category_name]', '$_POST[product_code]', '$_POST[product_brand]', '$_POST[product_model]', '$_POST[product_name]', '$_POST[product_size]', '$_POST[product_color]', '$_POST[unit_price]', '$_POST[quantity]', '$_POST[product_description]', '$targetFile')
                    ";
            if (mysqli_query($this->link, $sql)){
                return 'New Product Added Successfully';
            } else {
                die('addNewProduct Query error : '.mysqli_error($this->link));
            }
        }
    }

    public function allActiveProduct(){
        $sql ="SELECT * FROM products WHERE product_is_active=1";
        if (mysqli_query($this->link, $sql)){
            return mysqli_query($this->link, $sql);
        } else {
            die('allActiveProduct Query error : '.mysqli_error($this->link));
        }
    }

    public function ProductDetailsInfo($product_id){
        $sql ="SELECT * FROM products, category, sub_category WHERE product_is_active=1 AND product_id='$product_id' AND products.category_id = category.category_id AND products.sub_category_id = sub_category.sub_category_id";
        if (mysqli_query($this->link, $sql)){
            return mysqli_query($this->link, $sql);
        } else {
            die('ProductDetailsInfo Query error : '.mysqli_error($this->link));
        }
    }

    public function productByCategory($category_id){
        $sql ="SELECT * FROM products WHERE product_is_active=1 AND category_id='$category_id'";
        if (mysqli_query($this->link, $sql)){
            return mysqli_query($this->link, $sql);
        } else {
            die('allActiveProduct Query error : '.mysqli_error($this->link));
        }
    }

    public static function unpublishProduct($id){
        $link = Database::db_connect();
        $sql = "UPDATE products SET product_is_active=0 WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Product Info Unpublished successfully!';
        } else {
            die('Unpublish Product query error : '.mysqli_error($link));
        }
    }

    public static function publishProduct($id){
        $link = Database::db_connect();
        $sql = "UPDATE products SET product_is_active=1 WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Product Info Unpublished successfully!';
        } else {
            die('Publish Product query error : '.mysqli_error($link));
        }
    }

    public static function deleteProductInfo($id){
        $link = Database::db_connect();
        $sql = "DELETE FROM products WHERE product_id=$id";
        if (mysqli_query($link,$sql)){
            return 'Product Info Deleted Successfully!';
        } else {
            die('Product delete query problem : '.mysqli_error($link));
        }
    }

    public static function allProductInfo()
    {
        $link = Database::db_connect();
        $sql = "SELECT * FROM products";
        if (mysqli_query($link,$sql)){
            return mysqli_query($link,$sql);
        } else {
            die('All Product Info Query Error : '.mysqli_error($link));
        }
    }
}