<?php

use Cacofony\Helper\AuthHelper;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>
                <?php if (AuthHelper::isLoggedIn()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Mon Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/add-post">Écrire un post</a>
                    </li>
                    <?php if (AuthHelper::getLoggedUser()->isAdmin()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Liste des utilisateurs</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a class="btn btn-danger" href="/logout">Se déconnecter</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="/login">Se connecter</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="btn btn-warning" href="/register">S'inscrire</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<body>

<?= $content; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
