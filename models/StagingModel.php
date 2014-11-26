<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: models/StagingModel.php
 *
 *  This model inserts data into and fetches data from the staging table
 */

class StagingModel extends AbstractModel {

    function __construct() {
        $this->tableName = 'staging';
        parent::__construct();
    }

    /**
     * Inserts the computed data into the staging database for further evaluation.
     * After the insert, it increments the distributed count in the raw data table.
     * It then calls the review controller if the distributed count is over the threshold.
     * When this is done, it returns a new data set to pass to the browser.
     *
     * @param $rawId
     * @param $stagingData
     * @return array
     */
    public function enterData($rawId, $stagingData) {
        $sth = $this->dbh->prepare('INSERT INTO ' . $this->tableName . ' (raw_data) VALUES(' . $stagingData . ')');
        $sth->execute();

        require_once('models/InitModel.php');
        $initModel = new InitModel();

        $initModel->incrementDistributedCount($rawId);

        if($initModel->isDistributedCountAtThreshold($rawId)) {
            require_once('controllers/ReviewController.php');
            $reviewController = new ReviewController();

            $reviewController->review($this, $rawId);
        }

        return $initModel->fetchNewData();
    }

    /**
     * Loads all the staging data that has been calculated for a raw ID.
     *
     * @param $rawId
     * @return array
     */
    public function loadAllStagingDataForId($rawId) {
        $sth = $this->dbh->prepare('SELECT * FROM ' . $this->tableName . ' WHERE raw_id = ' . $rawId);
        $sth->execute();
        $stagingData = $sth->fetchAll();

        return $stagingData;
    }

}
