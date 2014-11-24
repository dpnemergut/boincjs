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

    public function start($requestType, $rawId = null, $stagingData = null) {
        require_once('models/AbstractModel.php');
        //$var = json_encode(array('test' => 'data'));
        //return $var;
        // Determine which model to load
        switch ($requestType) {
	        case 'init':
                require_once('models/InitModel.php');
                $this->model = new InitModel();
                $newData = $this->model->fetchNewData();
                return $newData;
	        case 'staging':
                if($stagingData !== null) {
                    require_once('models/StagingModel.php');
                    $this->model = new StagingModel();
                    $this->model->enterData($rawId, $stagingData);
                }
                break;
        }
    }

}
