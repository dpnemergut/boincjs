<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: controllers/MainController.php
 *
 *  This controller handles all requests coming in.
 */

class MainController {

    protected $model;

    public function start($requestType, $stagingData = null) {
        //$var = json_encode(array('test' => 'data'));
        //return $var;
        // Determine which model to load
        switch ($requestType) {
	    case 'init':
                require_once('models/InitModel.php');
                $this->model = new InitModel();
                $newData = $this->model->fetchNewData();
	        break;
	    case 'staging':
                if($stagingData !== null) {
                    require_once('models/StagingModel.php');
                    $this->model = new StagingModel();
                    $this->model->enterData($stagingData);
                }
                break;
        }
    }

}
