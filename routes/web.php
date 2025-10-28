<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$path = $_SERVER['REQUEST_URI'];

switch ($path) {
    case '/dashboard':
        echo $twig->render('dashboard/index.twig');
        break;

    case '/ticket':
        echo $twig->render('dashboard/ticket.twig');
        break;

    default:
        echo $twig->render('home.twig');
        break;
}