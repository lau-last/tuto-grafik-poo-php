<?php
$posts = \App\App::getInstance()->getTable(\App\Table\PostTable::class)->all();
?>
<h1>Administrer les articles</h1>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->getId(); ?></td>
            <td><?= $post->getTitre(); ?></td>
            <td>
                <a class="btn btn-primary" href="?page=posts.edit&id=<?= $post->getId(); ?>">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


