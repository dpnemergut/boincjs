<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: models/RejectedModel.php
 *
 *  This model inserts results into the rejected table.
 */

class RejectedModel extends AbstractModel {

    function __construct() {
        $this->tableName = 'rejected';
        parent::__construct();
    }

    /**
     * Inserts rejected data into the rejected table.
     *
     * @param $rawId
     * @param $data
     */
    public function process($rawId, $data) {
        $sth = $this->dbh->prepare('INSERT INTO ' . $this->tableName . ' (raw_id, rejected_data) VALUES(' . $rawId . ', ' . $data . ')');
        $sth->execute();
    }

}
