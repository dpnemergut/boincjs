<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: models/AcceptedModel.php
 *
 *  This model inserts results into the accepted table.
 */

class AcceptedModel extends AbstractModel {

    function __construct() {
        $this->tableName = 'accepted';
        parent::__construct();
    }

    /**
     * Inserts accepted data into the accepted table.
     *
     * @param $rawId
     * @param $data
     */
    public function process($rawId, $data) {
        $sth = $this->dbh->prepare('INSERT INTO ' . $this->tableName . ' (raw_id, accepted_data) VALUES(' . $rawId . ', ' . $data . ')');
        $sth->execute();
    }

}
