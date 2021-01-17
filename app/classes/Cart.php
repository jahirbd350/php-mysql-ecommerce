<?php


namespace App\classes;


class Cart
{
    public function addToCart(){
        $product = new Product();
        $produtById = $product->ProductDetailsInfo($_POST['product_id']);
        $produtInfoById = mysqli_fetch_assoc($produtById);

        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if(!in_array($_POST["product_id"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'       =>  $produtInfoById["product_id"],
                    'item_name'     =>  $produtInfoById["product_name"],
                    'item_price'    =>  $produtInfoById["unit_price"],
                    'item_quantity' =>  $_POST["itemQty"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            }
            else
            {
                echo '<script>alert("Item Already Added")</script>';
                //echo '<script>window.location="index.php"</script>';
            }
        }
        else
        {
            $item_array = array(
                'item_id'       =>  $produtInfoById["product_id"],
                'item_name'     =>  $produtInfoById["product_name"],
                'item_price'    =>  $produtInfoById["unit_price"],
                'item_quantity' =>  $_POST["itemQty"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    public function removeFromCart(){
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["product_id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                //echo '<script>alert("Item Removed")</script>';
                //echo '<script>window.location="product_details.php"</script>';
                $category_id = $_GET['category_id'];
            }
        }
    }

}