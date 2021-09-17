<!doctype html>
<html lang="en">

<head>
    <title><?= CONFIG['app']['name'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.1/quartz/bootstrap.min.css" integrity="sha512-vt+ChsCC6nCPKc8uMQmws/zkZI6s8+4r/6UaU8DNev7L7PHpiVNsvjL0FDbMu/OJ2bijJIj22XTGMETnQyAg3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body style="background-image: none" >
<!-- <body style='background-image:  url("../upload/background_diamond.gif")!important;background-size: 100%; background-color: hsla(50, 33%, 25%, 0.75)' > -->

<!-- https://thumbs.gfycat.com/DecentWavyIndigowingedparrot-size_restricted.gif
https://gfycat.com/decentwavyindigowingedparrot
https://gfycat.com/decentwavyindigowingedparrot -->

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark ps-3">
        <a class="navbar-brand" href="<?= BASE_PATH ?>"><?= CONFIG['app']['name'] ?></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto">
                <?php if (!empty($_SESSION['panier'])): ?>
                <li>
                    <a href="<?= BASE_PATH.'panier/list' ?>" class="btn btn-light">See the cart</a>
                </li>

                <?php endif; ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php if (!empty($_SESSION['membre'])  ): ?>
                <div class="nav-item  dropdown ms-5 me-5 pe-5">
                    <a class="nav-link  dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-2x"></i></a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownId">
                    <?php if (!empty($_SESSION['membre']) && $_SESSION['membre']['role']=='ROLE_ADMIN'):?>
                        <a class="dropdown-item" href="<?= BASE_PATH.'produits/list' ?>">Products management</a>
                        <a class="dropdown-item" href="<?= BASE_PATH.'categories/list' ?>">Categories management</a>
                        <a class="dropdown-item" href="<?= BASE_PATH.'produits/recap' ?>">Orders management</a>

                        <?php else: ?>


                            <?php endif; if (!empty($_SESSION['membre'])):?>
                        <div class="dropdown-divider"></div>
                        <a class="btn btn-success ms-2" href="<?= BASE_PATH.'user/connexion?action=deconnexion'?>">Logout</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            
                <?php if (empty($_SESSION['membre'])):?>
                <li><a class="btn btn-info ms-2" href="<?= BASE_PATH.'user/inscription'?>">Sign up</a></li>
                <li><a class="btn btn-success ms-2" href="<?= BASE_PATH.'user/connexion'?>">Sign in</a></li>
                <?php endif; ?>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="row">
            <div  class="col">
                <?php if (isset($_SESSION['messages'])) : ?>
                <?php foreach ($_SESSION['messages'] as $type => $messages) : ?>
                    <?php foreach ($messages as $message) : ?>
                        <div class="alert alert-<?= $type ?>"><?= $message ?></div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <?php unset($_SESSION['messages']); ?>
<?php endif; ?>
