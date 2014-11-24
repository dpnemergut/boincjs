<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: index.php
 *
 *  This is the main page that will load the main controller.
 */

ini_set('display_errors', '1');
require_once('controllers/MainController.php');

$mainController = new MainController();

echo $_GET['jsoncallback'] . '(' . json_encode($mainController->start('init')) . ')';
