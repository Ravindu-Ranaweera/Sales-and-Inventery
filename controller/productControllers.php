<?php
session_start();
require '../config/db.php';

// Read shop data
$sql = "SELECT * FROM products";
$product = mysqli_query($conn,$sql);
if($product) {
    $product_details = mysqli_fetch_all($product,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 


//add product


//add invoice

if (isset($_POST['addProduct'])){
    // var_dump($_POST);
    

    $product_name = $_POST['product_name'];
    $category = $_POST['cat'];
    $price = $_POST['price'];
    $dsc = $_POST['desc'];

    $query = "INSERT INTO products (product_id, product_name , 	product_catogery, 	sell_unit_price,	product_des , image_path ) 
        VALUES ( NULL,'{$product_name}', '{$category}', '{$price}', '{$dsc}','../assets/img/product')";

        // echo $query;
        // exit;
          $result = mysqli_query($conn, $query);

    $file = $_FILES['file'];
            // print_r($file);
            // exit();
        
    $filename = $_FILES['file']['name'];
    $filetmp_name = $_FILES['file']['tmp_name'];
            // echo  $filetmp_name;
            // exit();
    $filesize = $_FILES['file']['size'];
    $fileerror = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];
        
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
            // echo $fileActualExt;
    $allowed = array('jpg', 'jpeg', 'png' );
        
    if (in_array($fileActualExt, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 1000000) {
                $fileNewName = $product_name.".".$fileActualExt;
                $path = __DIR__.'/../assets/img/product/'.$fileNewName;
                // echo __DIR__.'../assets/img/product';
                // exit();
                if (file_exists(__DIR__.'/../assets/img/product/'.$fileNewName)) {
                    unlink(__DIR__.'/../assets/img/product/'.$fileNewName);
                    
                }
                    move_uploaded_file($filetmp_name, $path);
                   

            }else{
                echo "noo";
            }
        
        }else{
            echo "Your file too big";
        }
    }else{
            echo "There was an error";
    }
      
        
        header('location: tables.php');
  
    

}