<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: index.php
 *
 *  This is the main page that will load the main controller.
 */

require_once('controllers/MainController.php');

$mainController = new MainController();

$mainController->start('init');
