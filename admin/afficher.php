<?php
session_start();

if (!isset($_SESSION['yacine'])) {
    header("location:../login.php");
}
if (empty($_SESSION['yacine'])) {
    header("location:../login.php");
}


require("../config/commandes.php");
$Produits = afficher();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MonoShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="supprimer.php"> Suppression </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="afficher.php" style="font-weight:bold ;"> Produits </a>
                    </li>

                </ul>
                <div style="display:flex; justify-content: flex-end">
                    <a href="déconnexion.php" class="btn btn-danger">Se déconnecter</a>
                </div>

            </div>
        </div>
    </nav>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Produits as $Produit) : ?>
                            <tr>
                                <th scope="row"><?= $Produit->id ?></th>
                                <td><img src="<?= $Produit->image ?>" style="width:20% ;"></td>
                                <td><?= $Produit->nom ?></td>
                                <td style="font-weight:bold;color:green;"><?= $Produit->prix ?>€</td>
                                <td><?= substr($Produit->description, 0, 150); ?>...</td>
                                <td>
                                    <a href="editer.php?pdt=<?= $Produit->id ?>"><i class="fa fa-pencil" style="font-size:150%;"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>