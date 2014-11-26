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

}
