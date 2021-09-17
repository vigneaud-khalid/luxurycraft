<?php

class CategoriesController
{

    public static function add()
    {
        if (isset($_GET['id'])):
            $categorie=Categorie::find([
                'id'=>$_GET['id']
            ]);
            endif;
        include (VIEWS.'categories/add.php');
    }

    public static function save()
    {


        Categorie::create([
            'id'=>$_POST['id'],
            'nom'=>$_POST['nom'],
        ]);

        $_SESSION['messages']['success'][]='Category successfully added ';

        header('location:../categories/list');
        exit();
    }

    public static function list()
    {

        $categories=Categorie::findAll();

        include(VIEWS.'categories/list.php');
    }

    public static function delete()
    {

        Categorie::delete([
            'id'=> $_GET['id']]);

        $_SESSION['messages']['success'][] = 'Category successfully deleted';

        header('location:../categories/list');
        exit();    
    }

}
