<?php
use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Application;
use JobQueueExample;

ini_set('display_errors', true);
chdir(__DIR__);

$previousDir = '.';

while (!file_exists('config/application.config.php')) {
    $dir = dirname(getcwd());

    if ($previousDir === $dir) {
        throw new RuntimeException(
            'Unable to locate "config/application.config.php": ' .
            'is JobQueueExample in a subdir of your application skeleton?'
        );
    }

    $previousDir = $dir;
    chdir($dir);
}

if (file_exists('init_autoloader.php')) {
    require 'init_autoloader.php';
} else if (!(@include_once __DIR__ . '/../vendor/autoload.php') && !(@include_once __DIR__ . '/../../../autoload.php')) {
    throw new RuntimeException('Error: vendor/autoload.php could not be found. Did you run php composer.phar install?');
}

Zend\Mvc\Application::init(require 'config/application.config.php')->run();