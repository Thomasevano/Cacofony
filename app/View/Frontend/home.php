<?php

use Cacofony\Helper\AuthHelper;
use App\Entity\Post;

?>

<?php if (AuthHelper::isLoggedIn()) : ?>
    <p class="alert alert-success" role="alert">
        Bonjour <?= AuthHelper::getLoggedUser()->getFirstName(); ?>, vous êtes connecté !
    </p>
<?php else: ?>
    <p class="alert alert-danger" role="alert">
        Vous n'êtes pas connecté !
    </p>
<?php endif; ?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mx-auto">
            <h1 class="text-center mt-5 mb-5">Je suis la page d'accueil</h1>
            <?php
            /** @var $posts Post */
            foreach ($posts as $post): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->getTitle();?></h5>
                        <p class="card-text"><?= substr($post->getContent(), -150);?></p>
                        <a href="/article/<?= $post->getId();?>" class="btn btn-primary">Lire l'article</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>


