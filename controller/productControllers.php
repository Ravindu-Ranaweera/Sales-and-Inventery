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
                $path = __DIR__.'/../assets/img/product/'.$category.'/'.$fileNewName;
                // echo __DIR__.'../assets/img/product';
                // exit();
                if (file_exists(__DIR__.'/../assets/img/product/'.$category.'/'.$fileNewName)) {
                    unlink(__DIR__.'/../assets/img/product/'.$category.'/'.$fileNewName);
                    
                }
                    move_uploaded_file($filetmp_name, $path);
                    $imgP = '../assets/img/product/'.$category.'/'.$fileNewName;
                    $query = "INSERT INTO products (product_id, product_name , 	product_catogery, 	sell_unit_price,	product_des , image_path ) 
                    VALUES ( NULL,'{$product_name}', '{$category}', '{$price}', '{$dsc}','{$imgP}')";
            
                    // echo $query;
                    // exit;
                      $result = mysqli_query($conn, $query);
                   

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

//add invoice

if (isset($_POST['editProduct'])){
    // var_dump($_POST);
    // exit;
    

    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $category = $_POST['cat'];
    $price = $_POST['price'];
    $dsc = $_POST['desc'];

    $query = "UPDATE products SET product_name ='{$product_name}' , product_catogery ='{$category}', sell_unit_price='{$price}',	product_des='{$dsc} '
        WHERE product_id = '{$product_id}'";

        // echo $query;
        // exit;
          $result = mysqli_query($conn, $query);

    if ($_FILES['file'] != "") {
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
                   
                    $path = __DIR__.'/../assets/img/product/'.$category.'/'.$fileNewName;
                    // echo __DIR__.'../assets/img/product';
                    // exit();
                    if (file_exists(__DIR__.'/../assets/img/product/'.$category.'/'.$fileNewName)) {
                        unlink(__DIR__.'/../assets/img/product/'.$category.'/'.$fileNewName);
                        
                    }
                        move_uploaded_file($filetmp_name, $path);
                        $imgP = '../assets/img/product/'.$category.'/'.$fileNewName;

                        $query = "UPDATE products SET image_path='{$imgP}' WHERE product_id = '{$product_id}'";
                
                        // echo $query;
                        // exit;
                          $result = mysqli_query($conn, $query);

                }else{
                    echo "noo";
                }
            
            }else{
                echo "Your file too big";
            }
        }else{
                echo "There was an error";
        }
    }

    
      
        
        header('location: productView.php?product_id='.$product_id);
  
    

}

if (isset($_POST['productDel'])){
    // var_dump($_POST);
    // exit;

    $rowId = $_POST['product_id'];

    $query = "UPDATE products SET is_delete= '1' WHERE product_id ={$rowId}";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);

    if($result) {   
        
        header('location: tables.php');
    }
    
}