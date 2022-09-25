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
                        <a class="nav-link " aria-current="page" href="../admin/">Nouveau</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="supprimer.php" style="font-weight:bold ;"> Suppression </a>
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
                        <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>
                        <input type="number" class="form-control" name=" idproduit" required>
                    </div>


                    <button type="submit" name="valider" class="btn btn-warning">Supprimer le produit</button>
                </form>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($Produits as $produit) :  ?>

                    <div class="col">
                        <div class="card shadow-sm">


                            <img src="<?= $produit->image ?>">
                            <h3><?= $produit->id ?></h3>

                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>

            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['valider'])) {
    if (isset($_POST['idproduit'])) {
        if (!empty($_POST['idproduit']) and is_numeric($_POST['idproduit'])) {

            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

            try {
                supprimer($idproduit);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}
?>