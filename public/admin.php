<?php
\error_reporting(E_ALL);
\ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

\define('ROOT', \dirname(__DIR__));

$page = $_GET['page'] ?? 'home';

$app = \App\App::getInstance();
$auth = new \Core\Auth\DBAuth($app->getDB());
if($auth->logged()){
    $app->forbidden();
}

\ob_start();
if ($page === 'home') {
    require ROOT . '/pages/admin/posts/index.php';
} elseif ($page === 'posts.category') {
    require ROOT . '/pages/admin/posts/category.php';
}elseif ($page === 'posts.show'){
    require ROOT . '/pages/admin/posts/show.php';
}
$content = \ob_get_clean();
require ROOT . '/pages/templates/default.php';
