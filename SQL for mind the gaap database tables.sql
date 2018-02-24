-- Database: mindthegaap

-- mindthegaap.info/phpmyadmin
-- username: tylerdurden
-- password: QxCrlmfP269g13


-- “Account” table in database:
CREATE TABLE `mindthegaap`.`Accounts` ( `account` INT NOT NULL , `accountName`VARCHAR(40) NOT NULL , `category` VARCHAR(40) NOT NULL , `subcategory`VARCHAR(40) NOT NULL , `accountOrder` INT(40) NOT NULL , `normalSide`VARCHAR(5) NOT NULL , `comments` VARCHAR(280) NOT NULL , `creationDate`DATETIME NOT NULL , `creator` INT NOT NULL , `systemId` INT NOT NULL ) ENGINE= InnoDB;

ALTER TABLE `Accounts` ADD PRIMARY KEY(`account`);


-- “Users” table in database:
CREATE TABLE `mindthegaap`.`Users` ( `userId` INT NOT NULL , `firstName`VARCHAR(40) NOT NULL , `lastName` INT(40) NOT NULL , `position` VARCHAR(20)NOT NULL , `username` VARCHAR(20) NOT NULL , `password` VARCHAR(40) NOT NULL ,`systemId` INT NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `Users` ADD PRIMARY KEY(`userId`);


-- “SystemId” table in database:
CREATE TABLE `mindthegaap`.`SystemId` ( `systemId` INT NOT NULL , `tableRelation`VARCHAR(20) NOT NULL , `id` INT NOT NULL ) ENGINE = InnoDB COMMENT = 'id -> user/account id';

ALTER TABLE `SystemId` ADD PRIMARY KEY(`systemId`);


-- “ChartOfAccounts” table in database:
CREATE TABLE `mindthegaap`.`ChartOfAccounts` ( `accountId` INT NOT NULL ,`accountName` VARCHAR(40) NOT NULL , `active` BOOLEAN NOT NULL , `balance`DOUBLE NOT NULL , `comments` VARCHAR(280) NOT NULL , `initiated` DATETIME NOTNULL , `initiator` INT NOT NULL , `systemId` INT NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `ChartOfAccounts` ADD PRIMARY KEY(`accountId`);


-- EventLog” table in database:
CREATE TABLE `mindthegaap`.`EventLog` ( `eventId` INT NOT NULL , `tablename`VARCHAR(40) NOT NULL , `systemId` INT NOT NULL , `changeField` VARCHAR(40) NOTNULL , `beforeValue` VARCHAR(280) NOT NULL , `afterValue` VARCHAR(280) NOTNULL , `time` DATETIME NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `EventLog` ADD PRIMARY KEY(`eventId`);
