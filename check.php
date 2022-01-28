<?php
include("connection.php");
session_start();
if (isset($_POST)&&!empty($_POST['login'])&&!empty($_POST['password'])){
    extract($_POST);
$sql="select password from user where fullname='".$login."'";
$query= mysqli_query($connect,$sql) or die('error on query');
$data= mysqli_fetch_assoc($query);

if ($data['password']!=$password) {
    ?>
    <script language="JavaScript">
        alert("login or password incorrect. Please re-enter your login and password. If you are not a member please pay your registration to the 699027926 and you will recieve an email shortly for you to Login");
        document.location.replace("login.php");
        </script>
        <?php
}else {
    $_SESSION['username']=trim($_POST['login']);
    $pabs=$_SESSION['username'];
    $sql3="update user set status='online' where fullname='".$pabs."'";
    $query= mysqli_query($connect,$sql3) or die('error on query');
    header("location:dashboard.php");
}
}else {
    ?>
      <script language="JavaScript">
      alert("login or password empty. Please enter login and password");
      document.location.replace("login.php");
      </script>
    <?php
}


?>