<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: models/AbstractModel.php
 *
 *  This model is to set the global SQL parameters for other models.
 */

abstract class AbstractModel {

    protected $dbHost;
    protected $dbName;
    protected $dbUser;
    protected $dbPass;
    protected $tableName;

    protected $dbh;

    function __construct() {
        $this->dbHost = 'localhost';
        $this->dbName = 'boincjs_db';
        $this->dbUser = 'root';
        $this->dbPass = '';

        $this->dbh = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
    }

}
