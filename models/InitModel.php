<?php
/**
 *  Project: boincjs
 *  Author: Daniel Nemergut
 *  File: models/InitModel.php
 *
 *  This model fetches data from the raw table.
 */

class InitModel {

    protected $dbHost;
    protected $dbName;
    protected $tableName;
    protected $dbUser;
    protected $dbPass;

    protected $dbh;

    protected $threshold = 5;

    function __construct() {
        $this->dbHost = 'localhost';
        $this->dbName = 'boincjs_db';
        $this->tableName = 'raw';
        $this->dbUser = 'root';
        $this->dbPass = 'root';

        $this->dbh = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
    }

    /**
     *  Returns a JSON object from the database to pass to the browser to perform computations.
     */
    public function fetchNewData() {
        // Fetch one row of data that has not been distributed more than the threshold
        $sth = $this->dbh->prepare('SELECT * FROM ' . $this->tableName . ' WHERE distributed_count <' . $this->threshold . ' LIMIT 1');
        $sth->execute();
        $newData = $sth->fetchAll();

        return $newData;
    }

    /**
     *  Increments the distributed count of a raw data item.
     *  The distributed count is meant to increment after it is inserted into the staging table.
     */
    public function incrementDistributedCount($rawId) {
        $sth = $this->dbh->prepare('UPDATE ' . $this->dbName . ' SET distributed_count = distributed_count + 1 WHERE raw_id = ' . $rawId);
        $sth->execute();
    }

    /**
     *  Returns whether or not the distributed count for a given raw data item is at the threshold
     */
    public function isDistributedCountAtThreshold($rawId) {
        $sth = $this->dbh->prepare('SELECT distributed_count FROM ' . $this->tableName . ' WHERE raw_id = ' . $rawId);
        $distributedCount = $sth->execute();

        return $distributedCount >= $this->threshold;
    }

}