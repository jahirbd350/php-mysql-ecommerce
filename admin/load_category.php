<?php

require '../vendor/autoload.php';
use App\classes\Database;

$link = Database::db_connect();

$categoryId = $_POST['categoryId'];

if (!empty($categoryId)) {
    // Fetch state name base on country id
    $query = "SELECT * FROM sub_category WHERE category_id = {$categoryId} AND sub_category_is_active = 1";

    $result = mysqli_query($link,$query);

    if (mysqli_num_rows($result) > 0) {
        echo '<option disabled selected value="">--Select Sub Category--</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row['sub_category_id'].'">'.$row['sub_category_name'].'</option>';
        }
    }else{
        echo '<option value="">Sub Category not available</option>';
    }
}else{
        echo '<option value="">City not available</option>';
    }

