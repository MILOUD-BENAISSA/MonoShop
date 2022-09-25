<?php
function modifier($image, $nom, $prix, $desc, $id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("UPDATE produits SET `image`=?, nom=?, prix=?, `description`=? where id=? ");

        $req->execute(array($image, $nom, $prix, $desc, $id));

        $req->closeCursor();
    }
}
function getProduit($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } else {
            return false;
        }

        $req->closeCursor();
    }
}
function getAdmin($email, $password)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?");
        $req->execute(array($email, $password));

        if ($req->rowCount() == 1) {
            $data = $req->fetchAll();
            return $data;
        } else {
            return false;
        }

        $req->closeCursor();
    }
}

function ajouter($image, $nom, $prix, $desc)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO produits(image, nom, prix, description) VALUES(:image, :nom, :prix, :desc)");

        $req->execute(array(
            'image' => $image,
            'nom' => $nom,
            'prix' => $prix,
            'desc' => $desc
        ));


        $req->closeCursor();
    }
}
function afficher()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC ");

        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function supprimer($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("DELETE  FROM  produits WHERE id =?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}
