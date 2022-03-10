<?php
/** @var $post Post */

use App\Entity\Post;

?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 mx-auto text-center mt-5 mb-5">
            <h2><?php echo $post->getTitle() ?></h2>
            <p>Ecrit par <?php echo $post->getAuthor()->getFirstName() ?> le <?php echo date_format($post->getCreatedAt(),"Y/m/d H:i"); ?></p>
            <p><?php echo $post->getContent() ?></p>
        </div>
    </div>
</div>
