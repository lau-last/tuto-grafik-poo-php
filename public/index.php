<?php
session_start();
\error_reporting(E_ALL);
\ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

\define('ROOT', \dirname(__DIR__));

$page = $_GET['page'] ?? 'home';

\ob_start();
if ($page === 'home') {
    require ROOT . '/pages/posts/home.php';
} elseif ($page === 'posts.category') {
    require ROOT . '/pages/posts/category.php';
}elseif ($page === 'posts.show'){
    require ROOT . '/pages/posts/show.php';
}elseif ($page === 'login'){
    require ROOT . '/pages/users/login.php';
}
$content = \ob_get_clean();
require ROOT . '/pages/templates/default.php';
