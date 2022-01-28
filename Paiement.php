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
                <div class="row">
                    <div class="col-lg-4 ml-4">
                    <a class="btn btn-success btn-block" href="#">Faire un nouveau Paiement</a>
                    </div>
                </div>
                <form action="Paiement_process.php" method="post" enctype="multipart/form-data">
                
<div class="row">

        <div class="col-lg-3">
            <div class="form-group">    
            <span>From</span> <input type="date" name="Sdate"  class="form-control" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">    
            <span>To</span> <input type="date" name="Idate" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">    
            <span>Laisse status</span> <div class="form-group">
             
              <select class="form-control" name="status">
                <option>Choisir</option>
                <option>online</option>
                <option>offline</option>
              </select>
            </div>
            </div>
        </div>
         <div class="col-lg-3">
             <div class="form-group">
         <span>Recherche</span><input type="submit" name="save" class="btn btn-success" value="Recherche" required>
             </div>
        </div>
            </div> 
</form>
                        <table class="table table-responsive bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>     
                                    <th scope="col">#</th>
                                    <th scope="col">Numero du Paiement</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date Créé</th>
                                    <th scope="col">Date Payment</th>
                                    <th scope="col">Clients</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Recu</th> 
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $mysqli = new mysqli('localhost', 'root', '', 'Commerce') or die(mysqli_error($mysqli));
                                 $result = $mysqli->query("SELECT * FROM category") or die(mysqli_error($mysqli));
                                 while ($row = $result->fetch_assoc()) :
                                ?>
                                <tr>
                                 
                                    <td> <?php echo $row['category_id'] ?></td>
                                    <td> <?php echo $row['category_name'] ?></td>
                                    <td> <?php echo $row['date_created'] ?></td>
                                    <td> <?php echo $row['hour_created'] ?></td>
                                    <td><div class="dropdown">
                <a href="#" class=" list-group-item-action " id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" ><i
                        class="fas fa-ellipsis-v me-2"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="Category_process.php?delete=<?php echo $row['category_id']; ?>"><i class="fas fa-trash me-2"></i>Supprimer</a></li>
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