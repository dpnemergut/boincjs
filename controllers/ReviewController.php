<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: controllers/ReviewController.php
 *
 *  This controller handles the logic of whether or not to accept a set of staging data.
 */

class ReviewController {

    protected $stagingModel;
    protected $finalModel;
    protected $acceptData = false;

    /**
     * Determines whether the calculated data should be accepted or rejected.
     * It then loads the appropriate model to store the data.
     * Returns true if the data was accepted or false if it was rejected.
     *
     * @param $stagingModel StagingModel
     * @param $rawId
     * @return bool
     */
    public function review($stagingModel, $rawId) {
        // Load all the calculated data from the staging table
        $this->stagingModel = $stagingModel;
        $stagingData = $this->stagingModel->loadAllStagingDataForId($rawId);

        // Determine if the computed data should be accepted or rejected
        $this->acceptData = true;

        // Insert the data into the corresponding table
        // This is up to the project and could be an average of the staging data, all of it, excluding outliers, etc.
        if($this->acceptData === true) {
            require_once('models/AcceptedModel');
            $this->finalModel = new AcceptedModel();
        } else {
            require_once('models/RejectedModel');
            $this->finalModel = new RejectedModel();
        }

        $this->finalModel->process($rawId, $stagingData);

        return $this->acceptData;
    }

}
