<?php
/** @var $users \App\Entity\User */
?>


<div class="container">
    <h1 class="h1 text-center">Show one User</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Admin?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <th scope="row"><?= $user->getId(); ?></th>
                <td><?= $user->getFirstName(); ?></td>
                <td><?= $user->getLastName(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td>
                <?php if($user->isAdmin()) : ?>
                    Oui
                <?php else: ?>
                    Non
                <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
