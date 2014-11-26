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

    /**
     * Load the correct model according to the request type and pass control to that.
     * Always returns a new set of data to pass to the browser.
     *
     * @param $requestType
     * @param null $rawId
     * @param null $stagingData
     * @return array
     */
    public function start($requestType, $rawId = null, $stagingData = null) {
        require_once('models/AbstractModel.php');

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
                    $newData = $this->model->enterData($rawId, $stagingData);

                    return $newData;
                }
                break;
        }
    }

}
