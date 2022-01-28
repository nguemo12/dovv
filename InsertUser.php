<?php
  
  session_start();
  $mysqli = new mysqli('localhost', 'root', '', 'Commerce') or die(mysqli_error($mysqli));
  

$update = false;
$id = 0;
if (isset($_POST['save'])) {
    $fullname = $_POST['login'];
    $password = $_POST['password'];
    $Email = $_POST['email'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    
    $mysqli->query("INSERT INTO `user`(`fullname`,  `email`,`password`,  `role`,  `phone`, `status`) VALUES ('$fullname',   '$Email', '$password', '$role',  '$phone','offline')") or die($mysqli->error);   
    $_SESSION['message'] = "Utilisateur Ajouté";
    $_SESSION['msg_type'] = "success";
    header("location: dashboard.php?page=Addusers");
    ?>
    <script language="JavaScript">
        alert("Your records were entered successfully");
        header("location: data.php");
        </script>
        <?php
        
    
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE  FROM user WHERE id_user=$id") or die($mysqli->error);
   
    $_SESSION['message'] = "Record has been Deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location:dashboard.php?page=DisplayUsers");
}


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM Participate WHERE  member_id=$id") or die($mysqli->error);

    $row = $result->fetch_array();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $DOB = $_POST['DOB'];
    $Email = $_POST['Email'];
    $gender = $_POST['gender'];
   $Contribution = $_POST['contribution'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
  
   
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $DOB = $_POST['DOB'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $confpass = $_POST['confpass'];
   // $gender = $_POST['gender'];
    $country = $_POST['country'];
    $religion = $_POST['religion'];
    $city = $_POST['city'];
    $pscode = $_POST['pscode'];
    $phone = $_POST['phone'];
    //$avatar = $_POST['avatar'];
        $mysqli->query("UPDATE Doctor SET firstname='$firstname',  lastname = '$lastname', DOB='$DOB', Email='$Email', confpass= '$confpass', password='$password', country='$country', city= '$city', religion='$religion', symptoms='$symptoms', pscode='$pscode', phone='$phone' WHERE id=$id ") or die($mysqli->error);
    

    $_SESSION['message'] = "Record Has been Updated";
    $_SESSION['msg_type'] = "warning";


    header('location: admin.php');
}

if (isset($_GET['treat'])) {
    $id = $_GET['treat'];
    $result = $mysqli->query("SELECT * FROM member WHERE  member_id=$id") or die($mysqli->error);

    $row = $result->fetch_array();
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $DOB = $_POST['DOB'];
    $Email = $_POST['Email'];
    $gender = $_POST['gender'];
   $Contribution = $_POST['contribution'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
  

  
}
?>

