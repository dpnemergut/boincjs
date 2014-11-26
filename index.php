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

// Get parameters from the AJAX request
$method = $_GET['method'];
$rawId = null;
$stageData = null;

if(isset($_GET['jsData'])) {
    $jsData = json_decode($_GET['jsData']);
    $rawId = $jsData['raw_id'];
    $stageData = $jsData['raw_data'];
}

// Use the JSON callback function to send the response to the proper URL
echo $_GET['jsoncallback'] . '(' . json_encode($mainController->start($method, $rawId, $stageData)) . ')';
