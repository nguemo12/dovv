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
    <style>
                .small-container {
            max-width: 1080px;

            padding-left: 25px;
            padding-right: 25px;
        }

       

        .title {
            text-align: center;
            margin: 0 auto 50px;
            position: relative;
            line-height: 60px;
            color: #555;

        }

        .title::after {
            content: '';
            background: aqua;
            width: 80px;
            height: 5px;
            border-radius: 5px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .try img{
           width: 150%;
           height: 100%;
       }
    

    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Page Content -->
        <div id="page-content-wrapper">
       
            <div class="container-fluid px-4">
                <div class="row my-5">
                <form action="Products_Process.php" method="post" enctype="multipart/form-data">
<div class="row">

        <div class="col-lg-4">
            <div class="form-group">    
            <span>ID</span> <input type="text" name="id" placeholder="ex:1" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">    
            <span>Nom du Produit</span> <input type="text" name="phone" placeholder="ex:mboyo" class="form-control" required>
            </div>
        </div>
         <div class="col-lg-4">
        <input type="submit" name="save" class="btn btn-success" value="Rechercher" required>
        </div>
            </div> 
</form>
<div class="small-container">
            <h2 class="title">Liste des Produit</h2>
            <div class="row">
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'Commerce') or die(mysqli_error($mysqli));
            $result = $mysqli->query("select * from product") or die(mysqli_error($mysqli));
            while ($row = $result->fetch_assoc()) :
            ?>
               
               <div class="panel info-box panel-white">
                   <div class="panel-body">
                <div class="col-lg-2 try">
               
                    <img src="<?php echo $row['product_image']; ?>">
                    <h4><?php echo $row['product_name']; ?></h4><br>
                    <p><?php echo $row['product_description']; ?></p>
                    <a  href="Products_Process.php?delete=<?php echo $row['product_id']; ?>" class="btn btn-danger"><i class="fas fa-trash me-2"></i>Supprimer</a><br><br> <a href="view.php?view=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-block" > Details</a>
                    
                </div>
                </div>
               </div>
                <?php
            endwhile;
            ?>
            </div>
                 
                           
                    
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

</body>

</html>