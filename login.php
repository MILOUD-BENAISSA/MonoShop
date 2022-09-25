<?php
session_start();

if (isset($_SESSION['yacine'])) {
    if (!empty($_SESSION['yacine'])) {
        header("location: admin/");
    }
}


include "config/commandes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - MonoShop</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class='row'>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control" name='email' style="width: 80%; ;">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name='motdepasse' style="width: 80%; ;">
                    </div>

                    <input type="submit" class="btn btn-danger" name='envoyer' value="Se connecter">
                </form>


            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

</body>

</html>
<?php
if (isset($_POST['envoyer'])) {
    if (!empty($_POST['email']) and !empty($_POST['motdepasse'])) {
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        $admin = getAdmin($email, $motdepasse);
        if ($admin) {

            $_SESSION['yacine'] = $admin;
            header("Location: admin/");
        } else {
            echo "Il y a un problème !";
        }
    }
}
?>