<?php

class ProduitsController
{

    public static function add()
    {

        if (isset($_GET['id'])) :
            $produit = Produit::find([
                'id' => $_GET['id']
            ]);

        endif;

        $categories = Categorie::findAll();

        include(VIEWS . 'produits/add.php');
    }

    public static function save()
    {

        // $_FILES contient toutes les informations des inputs type FILE, var_dump() nous permet de les afficher et die() permet de stopper le traitement en cours
        //die(var_dump($_FILES));

        if (!empty($_FILES['photo']['name'])) :

            $photoname = $_FILES['photo']['name'];
            copy($_FILES['photo']['tmp_name'], PUBLIC_FOLDER . '/upload/' . $_FILES['photo']['name']);
        endif;
        if (!empty($_FILES['photo_update']['name'])) :

            $photoname = $_FILES['photo_update']['name'];
            copy($_FILES['photo_update']['tmp_name'], PUBLIC_FOLDER . '/upload/' . $_FILES['photo_update']['name']);
            unlink(PUBLIC_FOLDER . '/upload/' . $_POST['photo_actuelle']);
        endif;
        if (empty($_FILES['photo_update']['name']) && empty($_FILES['photo']['name'])) {

            $photoname = $_POST['photo_actuelle'];
        }



        Produit::create([
            'id' => $_POST['id'],
            'nom' => $_POST['nom'],
            'descriptif' => $_POST['descriptif'],
            'photo' => $photoname,
            'prix' => $_POST['prix'],
            'stock' => $_POST['stock'],
            'categorie_id' => $_POST['categorie_id']
        ]);

        $_SESSION['messages']['success'][] = 'Product successfully added ';

        header('location:../produits/list');
        exit();
    }

    public static function list()
    {

        $categories = Categorie::findAll();
        $produits = Produit::findAll();

        include(VIEWS . 'produits/list.php');
    }

    public static function delete()
    {

        Produit::delete([
            'id' => $_GET['id']
        ]);

        $_SESSION['messages']['success'][] = 'Product successfully removed';

        header('location:../produits/list');
        exit();
    }

    public static function commande()
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION['panier']['id']); $i++) :
            $total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
        endfor;


        $date = date_format(new DateTime('now'), 'Y-m-d');
        $reponse = Commande::create([
            'date' => $date,
            'statut' => 0,
            'montant' => $total,
            'utilisateur_id' => $_SESSION['membre']['id']
        ]);

        for ($i = 0; $i < count($_SESSION['panier']['id']); $i++) :

            Detail::create([
                'produit_id' => $_SESSION['panier']['id'][$i],
                'commande_id' => $reponse,
                'montant' => $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i],
                'quantite' => $_SESSION['panier']['quantite'][$i]

            ]);
        endfor;

        unset($_SESSION['panier']);
        $_SESSION['messages']['success'][] = 'Thank you for your confidence, your order has been taken into account';
        header('location:../');
        exit();
        // die(var_dump($reponse));
    }

    public static function recap()
    {
        $commandes = Commande::findAll();

        $details = [];
        if (!empty($_GET['id'])) :

            $details = Detail::find(['commande_id' => $_GET['id']]);

        endif;
        if (!empty($_GET['action'])) :

            $details = [];
        endif;


        include(VIEWS . 'produits/recap.php');
    }
}
