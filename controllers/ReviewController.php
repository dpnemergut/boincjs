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

    /**
     * Determines whether the calculated data should be accepted or rejected.
     * It then loads the appropriate model to store the data.
     *
     * @param $rawId
     */
    public function review($rawId) {
        // Load all the calculated data from the staging table
        $this->stagingModel = new StagingModel();
        $stagingData = $this->stagingModel->loadAllStagingDataForId($rawId);

        // Get an average of the results
    }

}
