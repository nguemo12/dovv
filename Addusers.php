<?php 
session_start();
if (isset($_SESSION['username'])) {
} else {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="dashboard.css" />
    <title>Ecommerce</title>
  <link href="css/forms.css" rel="stylesheet">
  </head>
  <body style="background-color: #f5f5f5;">
<div class="contactForm">
<?php

if (isset($_SESSION['message'])) :
?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?> ">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif; ?>
<form action="InsertUser.php" method="post" enctype="multipart/form-data">
<div class="row">
<h2>Ajouter un utilisateur</h2>
        <div class="col-lg-4">
            <div class="form-group">    
            <span>Nom</span> <input type="text" name="login" placeholder="ex:mboyo" class="form-control" required>
            </div>
            <div class="form-group">   
            <span>Mot de passe</span><input type="password" name="password"  class="form-control" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">    
            <span>Tel</span> <input type="text" name="phone" placeholder="672901356" class="form-control" required>
            </div>
            <div class="form-group">   
            <span>Confirmez le Mot de passe</span><input type="password" name="password"  class="form-control" required>
            </div>
        </div>
         <div class="col-lg-4">
            <div class="form-group">    
            <span>Email</span> <input type="email" name="email" placeholder="ex:mboyo@gmail.com" class="form-control" required>
            </div>
            <div class="form-group">  
            <span>Role</span> <select name="role" class="form-control">
                     <option value="Utilisateur">Utilisateur</option>
                    <option value="Boss">Boss</option>
                </select>
                </div><br>
                <input type="submit" name="save" class="btn btn-success" value="Ajouter" required>
        </div>
            </div> 
</form>
</body>
</html>