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
        <!-- Page Content -->
        <div id="page-content-wrapper">
       
            <div class="container-fluid px-4">
                <div class="row my-5">
                <form action="InsertUser.php" method="post" enctype="multipart/form-data">
<div class="row">

        <div class="col-lg-4">
            <div class="form-group">    
            <span>ID</span> <input type="text" name="id" placeholder="ex:1" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">    
            <span>Nom d'utilisateur</span> <input type="text" name="phone" placeholder="ex:mboyo" class="form-control" required>
            </div>
        </div>
         <div class="col-lg-4">
        <input type="submit" name="save" class="btn btn-success" value="Rechercher" required>
        </div>
            </div> 
</form>
                        <table class="table table-responsive bg-white rounded shadow-sm  table-hover">
                        <h3 class="fs-4 mb-3">Liste des Utilisateur</h3>
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Heure</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $mysqli = new mysqli('localhost', 'root', '', 'Commerce') or die(mysqli_error($mysqli));
                                 $result = $mysqli->query("SELECT * FROM user") or die(mysqli_error($mysqli));
                                 while ($row = $result->fetch_assoc()) :
                                ?>
                                <tr>
                                    <td> <?php echo $row['id_user'] ?></td>
                                    <td> <?php echo $row['fullname'] ?></td>
                                    <td> <?php echo $row['phone'] ?></td>
                                    <td> <?php echo $row['email'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                    <td><?php echo $row['Today'] ?></td>
                                    <td><?php echo $row['Now'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><div class="dropdown">
                <a href="#" class=" list-group-item-action" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-ellipsis-v me-2"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="InsertUser.php?delete=<?php echo $row['id_user']; ?>"><i class="fas fa-trash me-2"></i>Supprimer</a></li>
    <li><a class="dropdown-item" href="#">Modifier</a></li>
  </ul>
                        </div></td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

</body>

</html>