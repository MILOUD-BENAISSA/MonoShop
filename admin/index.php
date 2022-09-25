<?php

session_start();

if (!isset($_SESSION['yacine'])) {
    header("location:../login.php");
}
if (empty($_SESSION['yacine'])) {
    header("location:../login.php");
}

require("../config/commandes.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                        <a class="nav-link active" aria-current="page" href="../admin/" style="font-weight:bold;">Nouveau</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="supprimer.php"> Suppression </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="afficher.php"> Produits </a>
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
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
                        <input type="name" class="form-control" name="image" required>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prix</label>
                            <input type="number" class="form-control" name=" prix" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" required></textarea>
                        </div>

                        <button type="submit" name="valider" class="btn btn-success">Ajouter un nouveau produit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<?php
if (isset($_POST['valider'])) {
    if (isset($_POST['image']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['desc'])) {
        if (!empty($_POST['image']) and !empty($_POST['nom']) and !empty($_POST['prix']) and !empty($_POST['desc'])) {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));

            try {
                ajouter($image, $nom, $prix, $desc);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}
?>