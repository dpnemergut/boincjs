<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: models/RejectedModel.php
 *
 *  This model inserts results into the rejected table
 */

class AcceptedModel {

    private $dbHost;
    private $dbName;
    private $tableName;
    private $dbUser;
    private $dbPass;

    private $dbh;

    function __construct() {
        $this->dbHost = 'localhost';
        $this->dbName = 'boincjs_db';
        $this->tableName = 'rejected';
        $this->dbUser = 'root';
        $this->dbPass = 'root';

        $this->dbh = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
    }

}
