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
<form action="Products_Process.php" method="post" enctype="multipart/form-data">
<div class="row">
<h2>Ajouter un Produit</h2>
        <div class="col-lg-4">
            <div class="form-group">    
            <span>Nom du Produit</span> <input type="text" name="login" placeholder="ex:mboyo" class="form-control" required>
            </div>
            <div class="form-group">   
            <span>Quantité</span><input type="text" name="quantity"  class="form-control" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">    
            <span>Image du Produit</span> <input type="file" name="my_image" placeholder="Ajouter une Image" class="form-control" required>
            </div>
            <div class="form-group">   
            <span>Prix Unitaire</span><input type="text" name="prix"  class="form-control" required>
            </div>
        </div>
         <div class="col-lg-4">
            <div class="form-group">    
            <span>Categorie du produit</span> <div class="form-group">
              <select class="form-control form-control-sm" name="category" >
              <?php 
              $mysqli = new mysqli('localhost', 'root', '', 'Commerce') or die(mysqli_error($mysqli));
              $result3 = $mysqli->query("SELECT category_name FROM category") or die(mysqli_error($mysqli));
              while ($row=$result3->fetch_assoc()):?>
                             <option value="<?php echo $row['category_name']; ?>"><?php  echo $row['category_name'];?></option>
                            <?php endwhile;?>
              </select>
            </div>
            </div>
            <div class="form-group">  
            <span>Description du produit</span> <textarea name="Description" cols="30" rows="6"></textarea>
                </div><br>
                <input type="submit" name="save" class="btn btn-success" value="Ajouter" required>
        </div>
            </div> 
</form>
</body>
</html>