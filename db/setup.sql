/**
 * Import with the following statement:
 * mysql < setup.sql
 *
 * Revert with the following statement:
 * mysql < DROP DATABASE boincjs_db;
 */

CREATE SCHEMA IF NOT EXISTS boincjs_db;

USE boincjs_db;
SELECT '<Starting DB startup kit...>' AS ' ';

DROP TABLE IF EXISTS rejected;
DROP TABLE IF EXISTS accepted;
DROP TABLE IF EXISTS staging;
DROP TABLE IF EXISTS raw;
SELECT '<Creating table raw...>' AS ' ';
CREATE TABLE raw (
    raw_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    distributed_count int NOT NULL DEFAULT 0,
    raw_data text NOT NULL DEFAULT ''
);

SELECT '<Creating table staging...>' AS ' ';
CREATE TABLE staging (
    staging_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    raw_id int NOT NULL,
    results text NOT NULL DEFAULT '',
    FOREIGN KEY (raw_id) REFERENCES raw(raw_id)
);

SELECT '<Creating table accepted...>' AS ' ';
CREATE TABLE accepted (
    accepted_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    raw_id int NOT NULL,
    FOREIGN KEY (raw_id) REFERENCES raw(raw_id)
);

SELECT '<Creating table rejected...>' AS ' ';
CREATE TABLE rejected (
    rejected_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    raw_id int NOT NULL,
    FOREIGN KEY (raw_id) REFERENCES raw(raw_id)
);

SELECT '<Inserting raw data...>' AS ' ';
INSERT INTO raw (raw_data) VALUES
    ('{10}'),
    ('{20}'),
    ('{30}');
