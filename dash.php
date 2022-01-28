<?php
$mysqli = new mysqli('localhost', 'root', '', 'Commerce') or die(mysqli_error($mysqli));
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
        <div class="container-fluid">
                <div class="row">
                <h2 class="fs-4 col-10 p-4 pt-0 pb-0">Bienvenue à la midoré</h2><br>
             <h4 class="fs-2 col-10 p-4 pt-0 pb-0">Dashboard</h4>
                </div>
            </div>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                <?php
                        $result = $mysqli->query("SELECT count(id_user) as users from user") or die(mysqli_error($mysqli));
                        while ($row = $result->fetch_assoc()) :
                        ?>
                    <div class="col-md-3">
                        <div class="p-2 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $row['users'] ?></h3>
                                <p class="fs-5">Utilisateur</p>
                            </div>
                            <i class="fas fa-user-plus fs-1 primary-text border rounded-full secondary-bg "></i>
                        </div>
                    </div>
<?php endwhile ?>
<?php
                        $result2 = $mysqli->query("SELECT count(product_id) as products from product") or die(mysqli_error($mysqli));
                        while ($row = $result2->fetch_assoc()) :
                        ?>
                    <div class="col-md-3">
                        <div class="p-2 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $row['products'] ?></h3>
                                <p class="fs-5">Produit</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg "></i>
                        </div>
                    </div>
                  
                    <?php endwhile ?>

                    <div class="col-md-3">
                        <div class="p-2 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Commentaire</p>
                            </div>
                            <i class="fas fa-comment fs-1 primary-text border rounded-full secondary-bg "></i>
                        </div>
                    </div>
                    <?php
                        $result3 = $mysqli->query("SELECT count(category_id) as category from category") or die(mysqli_error($mysqli));
                        while ($row = $result3->fetch_assoc()) :
                        ?>
                    <div class="col-md-3">
                        <div class="p-2 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $row['category'] ?></h3>
                                <p class="fs-5">Category de Produit</p>
                            </div>
                            <i class="fas fa-globe fs-1 primary-text border rounded-full secondary-bg "></i>
                        </div>
                    </div>
                </div>
   
                <?php endwhile ?>
                <div class="row my-5">
                  
                    <div class="col-lg-6">

                        <table class="table bg-white rounded shadow-sm  table-hover">
                        <h3 class="fs-4 mb-3">Visitors</h3>
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Television</td>
                                    <td>Jonny</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Laptop</td>
                                    <td>Kenny</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell Phone</td>
                                    <td>Jenny</td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fridge</td>
                                    <td>Killy</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Books</td>
                                    <td>Filly</td>
                                    <td>$120</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gold</td>
                                    <td>Bumbo</td>
                                    <td>$1800</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Pen</td>
                                    <td>Bilbo</td>
                                    <td>$75</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Notebook</td>
                                    <td>Frodo</td>
                                    <td>$36</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Dress</td>
                                    <td>Kimo</td>
                                    <td>$255</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Paint</td>
                                    <td>Zico</td>
                                    <td>$434</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Carpet</td>
                                    <td>Jeco</td>
                                    <td>$1236</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Food</td>
                                    <td>Haso</td>
                                    <td>$422</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                    <h3 class="fs-4 mb-3">Distribution de categorie</h3>
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Television</td>
                                    <td>Jonny</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Laptop</td>
                                    <td>Kenny</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell Phone</td>
                                    <td>Jenny</td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fridge</td>
                                    <td>Killy</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Books</td>
                                    <td>Filly</td>
                                    <td>$120</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gold</td>
                                    <td>Bumbo</td>
                                    <td>$1800</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Pen</td>
                                    <td>Bilbo</td>
                                    <td>$75</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Notebook</td>
                                    <td>Frodo</td>
                                    <td>$36</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Dress</td>
                                    <td>Kimo</td>
                                    <td>$255</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Paint</td>
                                    <td>Zico</td>
                                    <td>$434</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Carpet</td>
                                    <td>Jeco</td>
                                    <td>$1236</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Food</td>
                                    <td>Haso</td>
                                    <td>$422</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

</body>

</html>