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

}
