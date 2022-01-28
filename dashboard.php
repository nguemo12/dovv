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
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">Super Marché</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php?page=dash" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-user me-2"></i>Utilisateur</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="dashboard.php?page=DisplayUsers">Afficher les utilisateur</a></li>
    <li><a class="dropdown-item" href="dashboard.php?page=modifyUser">Modifier Un Utilisateur</a></li>
    <li><a class="dropdown-item" href="dashboard.php?page=Addusers">Ajouter les utilisateur</a></li>
  </ul>
                        </div>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comments me-2"></i>Commentaire</a>
                        <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-envelope me-2"></i>Email</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Ecrire un Mail</a></li>
  </ul>
                        </div>
                        <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-money-bill-alt me-2"></i>Recu</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="dashboard.php?page=Paiement">Paiement</a></li>
  
  </ul>
                        </div>
                        <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-gift me-2"></i>Categorie</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="dashboard.php?page=NewCategory">AJouter une category</a></li>
    <li><a class="dropdown-item" href="#">Modifier une category</a></li>
  </ul>
                        </div>
                        <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-gift me-2"></i>Gestion de Stock</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="dashboard.php?page=DisplayProduct">Afficher les Produit</a></li>
    <li><a class="dropdown-item" href="dashboard.php?page=NewProduct">Ajouter un Produit</a></li>
    <li><a class="dropdown-item" href="dashboard.php?page=ModifyProduct">Modifier un Produit</a></li>
  </ul>
                        </div>
                        <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-igloo me-2"></i>Parametres </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Mon Profile</a></li>
    
  </ul>
                        </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                  
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <form method="POST" action="search.php">
                        <i class="fas fa-search me-2"></i><input type="text" name="search" placeholder="search_here...">
                        </form>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php
                               
                                            if (isset($_SESSION['username'])) {
                                                echo trim($_SESSION['username']);
                                            }

                                            ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="signout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
          
            
            <div class="container-fluid px-4">
               
            <?php
   $p=$_GET['page'];
   $page = $p.".php";
   if (file_exists($page)){
       include($page);
   }elseif($p==""){
       echo "this is the page";
   }
   else{
       echo "page don't exist";
    }
   ?>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>