<?php
 require '../vendor/autoload.php';
 use App\classes\Database;

 $link = Database::db_connect();

 $id = $_POST["id"];

 $sql = "SELECT * FROM category WHERE category_id=$id";
 if (mysqli_query($link,$sql)){
     $data = mysqli_query($link,$sql);
     $result = mysqli_fetch_assoc($data);
     echo json_encode($result);
 } else {
     die('Fetch Category Data Query Problem : '.mysqli_error($link));
 }

