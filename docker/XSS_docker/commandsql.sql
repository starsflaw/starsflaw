CREATE DATABASE IF NOT EXISTS billsDB;

USE billsDB;

CREATE TABLE bills (

bill_name varchar(255) NOT NULL,

amount int NOT NULL,

dateDue int NOT NULL,

source varchar(255) NOT NULL,

isPaid int NOT NULL

);
SET GLOBAL local_infile=1;

LOAD DATA LOCAL INFILE '/bills.csv'

INTO TABLE bills

FIELDS TERMINATED BY ','

LINES TERMINATED BY '\r\n'

IGNORE 1 ROWS

(bill_name,amount,dateDue,source,isPaid)