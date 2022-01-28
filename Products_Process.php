<?php
use function mysql_xdevapi\expression;
include('connection.php');


if (isset($_POST['save'])&& isset($_FILES['my_image'])){

echo "<pre>";
print_r($_FILES['my_image']);
echo "</pre>";

$product_name=$_POST['login'];
$price = $_POST['prix'];
$product_des = $_POST['Description'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$img_name =$_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_namee = $_FILES['my_image']['tmp_name'];
$error = $_FILES['my_image']['error'];
if($error===0){
    if($img_size > 125000){
        $em ="sorry, your file is too large";
        $_SESSION['message'] = "sorry, your file is too large!";
        $_SESSION['msg_type'] = "danger";
        header("Location: dashboard.php?fileSize=sorry file is too large");
      
    }else{
     $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
     $img_ex_lc = strtolower($img_ex);
     $allowed_exs= array("jpg","jpeg","png");
     if(in_array($img_ex_lc,$allowed_exs)){
        $new_img_name= $_POST['login'].'.'.$img_ex_lc;
        $img_upload_path ='products/'.$new_img_name;
        move_uploaded_file($tmp_namee,$img_upload_path);
        $sql= "insert into product(product_name,category, product_image, unit_price, product_description,quantity) values ('$product_name','$category','$img_upload_path','$price','$product_des','$quantity')";
        if(mysqli_query($connect, $sql)){
            $_SESSION['name'] = $firstname;
            $_SESSION['category']=$category;
            $_SESSION['message'] = "Insertion successful!";
            $_SESSION['msg_type'] = "success";
             header("Location: dashboard.php?page=DisplayProduct" );
        }
     }else{
         $em = "You can't upload this file type";
         $_SESSION['message'] = "Can't upload this file!";
         $_SESSION['msg_type'] = "danger";
         header("location: dashboard.php?fileSize=$em");
       
     }
    }

}else{
   $em = "unknown error occured";
   $_SESSION['message'] = "Insertion failed!";
   $_SESSION['msg_type'] = "danger";
    header("Location: dashboard.php?page=NewProduct " );
 

}
}else{
    header("Location:dashboard.php?page=NewProduct " );
}
?>
