<?php

$app = \App\App::getInstance();
$categorie = $app->getTable(\App\Table\CategoryTable::class)->find($_GET['id']);

if ($categorie === false) {
    App\App::notFound();
}

$articles = $app->getTable(\App\Table\PostTable::class)->lastByCategory($_GET['id']);
$categories = $app->getTable(\App\Table\CategoryTable::class)->all();
?>
<h1><?= $categorie->getTitre(); ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($articles as $post): ?>

            <h2><a href="<?= $post->getUrl(); ?>"><?= $post->getTitre(); ?></a></h2>

            <p><em><?= $post->categorie; ?></em></p>

            <p><?= $post->getExtrait(); ?></p>

        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <?php foreach ($categories as $categorie): ?>
            <li><a href="<?= $categorie->getUrl(); ?>"><?= $categorie->getTitre(); ?></a></li>
        <?php endforeach; ?>
    </div>
</div>

