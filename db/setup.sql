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

SELECT '<Creating table raw...>' AS ' ';
CREATE TABLE raw (
    raw_id int NOT NULL AUTO_INCREMENT PRIMARY KEY
);

SELECT '<Creating table staging...>' AS ' ';
CREATE TABLE staging (
    staging_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    raw_id int NOT NULL,
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
