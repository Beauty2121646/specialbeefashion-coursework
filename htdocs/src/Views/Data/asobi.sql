-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--

-- Host: localhost:3306
-- Generation Time: Mar 25, 2023 at 05:07 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.4.30
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
    time_zone = "+00:00";
--

-- Database: `mvp_library`
--

DROP
    DATABASE IF EXISTS `mvp_library`;
CREATE DATABASE IF NOT EXISTS `mvp_library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE
    `mvp_library`;
-- --------------------------------------------------------
--

-- Table structure for table `Analyse_Sales`
--

DROP TABLE IF EXISTS
    `Analyse_Sales`;
CREATE TABLE IF NOT EXISTS `Analyse_Sales`
(
    `ID`            INT(11)        NOT NULL AUTO_INCREMENT,
    `Country_ID`    INT(11)        NOT NULL,
    `Customer_ID`   INT(11)        NOT NULL,
    `Employee_ID`   INT(11)        NOT NULL,
    `Order_ID`      INT(11)        NOT NULL,
    `Product_ID`    INT(11)        NOT NULL,
    `Customer_Name` VARCHAR(1)     NOT NULL,
    `Employee_Name` VARCHAR(1)     NOT NULL,
    `Product_Name`  VARCHAR(1)     NOT NULL,
    `Country`       CHAR(5)        NOT NULL,
    `Amount`        DECIMAL(15, 4) NOT NULL,
    `Time`          VARCHAR(50)    NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `Analyse_Sales_IDs` (
                             `Country_ID`,
                             `Customer_ID`,
                             `Employee_ID`,
                             `Order_ID`,
                             `Product_ID`
        ),
    KEY `Country` (`Country`),
    KEY `Amount` (`Amount`),
    KEY `FK_Customer` (`Customer_ID`),
    KEY `FK_Employee` (`Employee_ID`),
    KEY `FK_Order` (`Order_ID`),
    KEY `FK_Product` (`Product_ID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `author`
--

DROP TABLE IF EXISTS
    `author`;
CREATE TABLE IF NOT EXISTS `author`
(
    `sid`      TINYINT(12) UNSIGNED                       NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `uid`      TINYINT(12)                                NOT NULL COMMENT 'User identifier',
    `title`    VARCHAR(24) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Author title',
    `names`    VARCHAR(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Author names',
    `viewable` TINYINT(1)                                 NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `author_unique` (`names`),
    KEY `author_index` (`title`, `names`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci COMMENT = 'Authors table';
-- --------------------------------------------------------
--

-- Table structure for table `author_meta`
--

DROP TABLE IF EXISTS
    `author_meta`;
CREATE TABLE IF NOT EXISTS `author_meta`
(
    `sid`        TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`        TINYINT(12) UNSIGNED NOT NULL COMMENT 'Relative identifier',
    `uid`        TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `meta_key`   VARCHAR(64)          NOT NULL COMMENT 'Metal key',
    `meta_value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci COMMENT 'Metal value',
    `viewable`   TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `author_meta_unique` (`meta_key`),
    KEY `author_meta_index` (`rid`, `meta_key`),
    KEY `FK_author_meta` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Author meta table';
-- --------------------------------------------------------
--

-- Table structure for table `book`
--

DROP TABLE IF EXISTS
    `book`;
CREATE TABLE IF NOT EXISTS `book`
(
    `sid`           TINYINT(12) UNSIGNED                       NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`           TINYINT(12) UNSIGNED                       NOT NULL COMMENT 'Relative identifier',
    `rid_author`    TINYINT(12) UNSIGNED                       NOT NULL COMMENT 'Relative identifier for author',
    `rid_category`  TINYINT(12) UNSIGNED                       NOT NULL COMMENT 'Relative identifier for category',
    `rid_genre`     TINYINT(12) UNSIGNED                       NOT NULL COMMENT 'Relative identifier for genre',
    `rid_publisher` TINYINT(12) UNSIGNED                       NOT NULL COMMENT 'Relative identifier for publisher',
    `uid`           TINYINT(12)                                NOT NULL COMMENT 'User identifier',
    `title`         VARCHAR(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Book title',
    `added`         TIMESTAMP                                  NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Book added to database date',
    `published`     DATE                                       NOT NULL COMMENT 'Book published date',
    `revision`      INT(11)                                    NOT NULL DEFAULT '0' COMMENT 'Book revision number',
    `viewable`      TINYINT(1)                                 NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `book_unique` (`title`),
    KEY `book_index` (`title`, `published`),
    KEY `FK_book_shelve` (`rid`),
    KEY `FK_book_genre` (`rid_genre`),
    KEY `FK_book_author` (`rid_author`),
    KEY `FK_book_category` (`rid_category`),
    KEY `FK_book_publisher` (`rid_publisher`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci COMMENT = 'Books table';
-- --------------------------------------------------------
--

-- Table structure for table `chefs`
--

DROP TABLE IF EXISTS
    `chefs`;
CREATE TABLE IF NOT EXISTS `chefs`
(
    `ID`         BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `names`      BIGINT(20) UNSIGNED NOT NULL,
    `about`      TINYTEXT COLLATE utf8mb4_unicode_ci,
    `registered` DATETIME            NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status`     INT(2)              NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    KEY `username` (`names`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Address`
--

DROP TABLE IF EXISTS
    `Dim_Address`;
CREATE TABLE IF NOT EXISTS `Dim_Address`
(
    `ID`      INT(11)     NOT NULL AUTO_INCREMENT,
    `City_ID` INT(11)     NOT NULL,
    `Line_1`  VARCHAR(50) NOT NULL,
    `Line_2`  VARCHAR(50) NOT NULL,
    `Phone`   VARCHAR(24) DEFAULT NULL,
    PRIMARY KEY (`ID`),
    KEY `City_ID` (`City_ID`),
    KEY `Phone` (`Phone`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_City`
--

DROP TABLE IF EXISTS
    `Dim_City`;
CREATE TABLE IF NOT EXISTS `Dim_City`
(
    `ID`         INT(11)     NOT NULL AUTO_INCREMENT,
    `Country_ID` INT(11)     NOT NULL,
    `Name`       VARCHAR(50) NOT NULL,
    `Code`       CHAR(5)     NOT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `UK_City_Name` (`Name`),
    KEY `Country_ID` (`Country_ID`),
    KEY `Name` (`Name`),
    KEY `Code` (`Code`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Country`
--

DROP TABLE IF EXISTS
    `Dim_Country`;
CREATE TABLE IF NOT EXISTS `Dim_Country`
(
    `ID`   INT(11)     NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(50) NOT NULL,
    `Code` CHAR(5)     NOT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `UK_Country_Name` (`Name`),
    KEY `Name` (`Name`),
    KEY `Code` (`Code`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Customer`
--

DROP TABLE IF EXISTS
    `Dim_Customer`;
CREATE TABLE IF NOT EXISTS `Dim_Customer`
(
    `ID`         INT(11)     NOT NULL AUTO_INCREMENT,
    `Address_ID` INT(11)     NOT NULL,
    `First_Name` VARCHAR(50) NOT NULL,
    `Last_Name`  VARCHAR(50) DEFAULT NULL,
    `Phone`      VARCHAR(24) DEFAULT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `UK_Customer_Phone` (`Phone`),
    KEY `Address_ID` (`Address_ID`),
    KEY `First_Name` (`First_Name`),
    KEY `Last_Name` (`Last_Name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Employee`
--

DROP TABLE IF EXISTS
    `Dim_Employee`;
CREATE TABLE IF NOT EXISTS `Dim_Employee`
(
    `ID`         INT(11)     NOT NULL AUTO_INCREMENT,
    `Address_ID` INT(11)     NOT NULL,
    `First_Name` VARCHAR(50) NOT NULL,
    `Last_Name`  VARCHAR(50)          DEFAULT NULL,
    `Date_Hire`  DATETIME(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    PRIMARY KEY (`ID`),
    KEY `Address_ID` (`Address_ID`),
    KEY `Date_Hire` (`Date_Hire`),
    KEY `First_Name` (`First_Name`),
    KEY `Last_Name` (`Last_Name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Order`
--

DROP TABLE IF EXISTS
    `Dim_Order`;
CREATE TABLE IF NOT EXISTS `Dim_Order`
(
    `ID`          INT(11)        NOT NULL AUTO_INCREMENT,
    `Address_ID`  INT(11)        NOT NULL,
    `Customer_ID` INT(11)        NOT NULL,
    `Employee_ID` INT(11)        NOT NULL,
    `Product_ID`  INT(11)        NOT NULL,
    `Date_Order`  DATETIME(3)    NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
    `Unit_Price`  DECIMAL(15, 4) NOT NULL DEFAULT '0.0000',
    `Quantity`    SMALLINT(6)    NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    KEY `Dim_Order_IDs` (
                         `Address_ID`,
                         `Customer_ID`,
                         `Employee_ID`,
                         `Product_ID`
        ),
    KEY `Date_Order` (`Date_Order`),
    KEY `Quantity` (`Quantity`),
    KEY `Unit_Price` (`Unit_Price`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Product`
--

DROP TABLE IF EXISTS
    `Dim_Product`;
CREATE TABLE IF NOT EXISTS `Dim_Product`
(
    `ID`            INT(11)        NOT NULL AUTO_INCREMENT,
    `Supplier_ID`   INT(11)        NOT NULL,
    `Product_Name`  VARCHAR(50)    NOT NULL,
    `Unit_Price`    DECIMAL(15, 4) NOT NULL,
    `Stocked_Units` SMALLINT(6)    NOT NULL,
    `Ordered_Units` SMALLINT(6)    NOT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `UK_Product_Name` (`Product_Name`),
    KEY `Supplier_ID` (`Supplier_ID`),
    KEY `Unit_Price` (`Unit_Price`),
    KEY `Stocked_Units` (`Stocked_Units`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `Dim_Supplier`
--

DROP TABLE IF EXISTS
    `Dim_Supplier`;
CREATE TABLE IF NOT EXISTS `Dim_Supplier`
(
    `ID`           INT(11)     NOT NULL AUTO_INCREMENT,
    `Address_ID`   INT(11)     NOT NULL,
    `Company_Name` VARCHAR(50) NOT NULL,
    `Contact_Name` VARCHAR(50) NOT NULL,
    `Phone`        VARCHAR(24) DEFAULT NULL,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `UK_Supplier_Company_Name` (`Company_Name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Table structure for table `genre`
--

DROP TABLE IF EXISTS
    `genre`;
CREATE TABLE IF NOT EXISTS `genre`
(
    `sid`      TINYINT(12) UNSIGNED                       NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `uid`      TINYINT(12)                                NOT NULL COMMENT 'User identifier',
    `genre`    VARCHAR(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Genre names',
    `viewable` TINYINT(1)                                 NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `genre_unique` (`genre`),
    KEY `genre_index` (`genre`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci COMMENT = 'Genres table';
-- --------------------------------------------------------
--

-- Table structure for table `genre_meta`
--

DROP TABLE IF EXISTS
    `genre_meta`;
CREATE TABLE IF NOT EXISTS `genre_meta`
(
    `sid`        TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`        TINYINT(12) UNSIGNED NOT NULL COMMENT 'Relative identifier',
    `uid`        TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `meta_key`   VARCHAR(64)          NOT NULL COMMENT 'Metal key',
    `meta_value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci COMMENT 'Metal value',
    `viewable`   TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `genre_meta_unique` (`meta_key`),
    KEY `genre_meta_index` (`rid`, `meta_key`),
    KEY `FK_genre_meta` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Genre meta table';
-- --------------------------------------------------------
--

-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS
    `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients`
(
    `ID`          BIGINT(20) UNSIGNED                    NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `description` TINYTEXT COLLATE utf8mb4_unicode_ci,
    `registered`  DATETIME                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status`      INT(2)                                 NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `username` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `library`
--

DROP TABLE IF EXISTS
    `library`;
CREATE TABLE IF NOT EXISTS `library`
(
    `sid`      TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `uid`      TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `name`     VARCHAR(64)          NOT NULL COMMENT 'Library name',
    `summary`  TINYTEXT COMMENT 'Description of the library',
    `viewable` TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `library_unique` (`name`),
    KEY `library_index` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Library table';
-- --------------------------------------------------------
--

-- Table structure for table `library_meta`
--

DROP TABLE IF EXISTS
    `library_meta`;
CREATE TABLE IF NOT EXISTS `library_meta`
(
    `sid`        TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`        TINYINT(12) UNSIGNED NOT NULL COMMENT 'Relative identifier',
    `uid`        TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `meta_key`   VARCHAR(64)          NOT NULL COMMENT 'Metal key',
    `meta_value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci COMMENT 'Metal value',
    `viewable`   TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `library_meta_unique` (`meta_key`),
    KEY `library_meta_index` (`rid`, `meta_key`),
    KEY `FK_library_meta` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Library meta table';
-- --------------------------------------------------------
--

-- Table structure for table `meals`
--

DROP TABLE IF EXISTS
    `meals`;
CREATE TABLE IF NOT EXISTS `meals`
(
    `ID`         BIGINT(20) UNSIGNED                    NOT NULL AUTO_INCREMENT,
    `chefs`      BIGINT(20) UNSIGNED                    NOT NULL,
    `recipes`    BIGINT(20) UNSIGNED                    NOT NULL,
    `name`       VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `about`      TINYTEXT COLLATE utf8mb4_unicode_ci,
    `registered` DATETIME                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status`     INT(2)                                 NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `name` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `measures`
--

DROP TABLE IF EXISTS
    `measures`;
CREATE TABLE IF NOT EXISTS `measures`
(
    `ID`         BIGINT(20) UNSIGNED                    NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `registered` DATETIME                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status`     INT(2)                                 NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `username` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `names`
--

DROP TABLE IF EXISTS
    `names`;
CREATE TABLE IF NOT EXISTS `names`
(
    `ID`         BIGINT(20) UNSIGNED                    NOT NULL AUTO_INCREMENT,
    `first`      VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `last`       VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `other`      VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `registered` DATETIME                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`ID`),
    INDEX `names` (`first`, `last`, `other`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
--

-- Dumping data for table `names`
--

INSERT INTO `names`(`ID`,
                    `first`,
                    `last`,
                    `other`,
                    `registered`,
                    `status`)
VALUES (1,
        'Dickson',
        'Okorodudu',
        '',
        '2023-03-23 12:56:43',
        1);
-- --------------------------------------------------------
--

-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS
    `publisher`;
CREATE TABLE IF NOT EXISTS `publisher`
(
    `sid`      TINYINT(12) UNSIGNED                       NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `uid`      TINYINT(12)                                NOT NULL COMMENT 'User identifier',
    `title`    VARCHAR(24) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Publisher title',
    `names`    VARCHAR(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Publisher names',
    `viewable` TINYINT(1)                                 NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `publisher_unique` (`names`),
    KEY `publisher_index` (`title`, `names`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci COMMENT = 'Publishers table';
-- --------------------------------------------------------
--

-- Table structure for table `publisher_meta`
--

DROP TABLE IF EXISTS
    `publisher_meta`;
CREATE TABLE IF NOT EXISTS `publisher_meta`
(
    `sid`        TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`        TINYINT(12) UNSIGNED NOT NULL COMMENT 'Relative identifier',
    `uid`        TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `meta_key`   VARCHAR(64)          NOT NULL COMMENT 'Metal key',
    `meta_value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci COMMENT 'Metal value',
    `viewable`   TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `publisher_meta_unique` (`meta_key`),
    KEY `publisher_meta_index` (`rid`, `meta_key`),
    KEY `FK_publisher_meta` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Publisher meta table';
-- --------------------------------------------------------
--

-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS
    `recipes`;
CREATE TABLE IF NOT EXISTS `recipes`
(
    `ID`          BIGINT(20) UNSIGNED                    NOT NULL AUTO_INCREMENT,
    `chef`        BIGINT(20) UNSIGNED                    NOT NULL,
    `name`        VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `description` TINYTEXT COLLATE utf8mb4_unicode_ci,
    `registered`  DATETIME                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status`      INT(2)                                 NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `username` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `recipes_ingredient`
--

DROP TABLE IF EXISTS
    `recipes_ingredient`;
CREATE TABLE IF NOT EXISTS `recipes_ingredient`
(
    `ID`          BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `recipes`     BIGINT(20) UNSIGNED          DEFAULT NULL,
    `measures`    BIGINT(20) UNSIGNED          DEFAULT NULL,
    `ingredients` BIGINT(20) UNSIGNED          DEFAULT NULL,
    `amount`      INT(5)                       DEFAULT NULL,
    `registered`  DATETIME            NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status`      INT(2)              NOT NULL DEFAULT '1',
    PRIMARY KEY (`ID`),
    KEY `amount` (`amount`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `roles`
--

DROP TABLE IF EXISTS
    `roles`;
CREATE TABLE IF NOT EXISTS `roles`
(
    `ID`         BIGINT(20) UNSIGNED                     NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(64) COLLATE utf8mb4_unicode_ci  NOT NULL DEFAULT '',
    `password`   VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `registered` DATETIME                                NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`ID`),
    UNIQUE KEY `name` (`name`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `shelve`
--

DROP TABLE IF EXISTS
    `shelve`;
CREATE TABLE IF NOT EXISTS `shelve`
(
    `sid`       TINYINT(12) UNSIGNED                        NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`       TINYINT(12) UNSIGNED                        NOT NULL COMMENT 'Relative identifier',
    `uid`       TINYINT(12)                                 NOT NULL COMMENT 'User identifier',
    `name`      VARCHAR(60) COLLATE utf8mb4_unicode_520_ci  NOT NULL DEFAULT '' COMMENT 'Shelve name',
    `location`  VARCHAR(155) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'Shelve location',
    `book_size` INT(11)                                     NOT NULL DEFAULT '0' COMMENT 'Shelve book size, the number of books on the shelve',
    `viewable`  TINYINT(1)                                  NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `shelve_unique` (`name`),
    KEY `shelve_index` (`name`, `location`),
    KEY `FK_shelve` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci COMMENT = 'Shelves table';
-- --------------------------------------------------------
--

-- Table structure for table `shelve_meta`
--

DROP TABLE IF EXISTS
    `shelve_meta`;
CREATE TABLE IF NOT EXISTS `shelve_meta`
(
    `sid`        TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`        TINYINT(12) UNSIGNED NOT NULL COMMENT 'Relative identifier',
    `uid`        TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `meta_key`   VARCHAR(64)          NOT NULL COMMENT 'Metal key',
    `meta_value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci COMMENT 'Metal value',
    `viewable`   TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `shelve_meta_unique` (`meta_key`),
    KEY `shelve_meta_index` (`rid`, `meta_key`),
    KEY `FK_shelve_meta` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Users meta table';
-- --------------------------------------------------------
--

-- Table structure for table `user`
--

DROP TABLE IF EXISTS
    `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `sid`                 TINYINT(12) UNSIGNED                        NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `uid`                 TINYINT(12)                                 NOT NULL COMMENT 'User identifier',
    `user_login`          VARCHAR(60) COLLATE utf8mb4_unicode_520_ci  NOT NULL DEFAULT '' COMMENT 'User login',
    `user_password`       VARCHAR(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'User password',
    `user_email`          VARCHAR(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'User email',
    `user_registered`     DATETIME                                    NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'User registered',
    `user_activation_key` VARCHAR(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '' COMMENT 'User activation key',
    `viewable`            TINYINT(1)                                  NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `user_unique` (`user_login`),
    KEY `user_index` (`uid`, `user_login`, `user_email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci COMMENT = 'Users table';
-- --------------------------------------------------------
--

CREATE TABLE `users`
(
    `ID`              BIGINT(20) UNSIGNED                       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username`        VARCHAR(64) COLLATE utf8mb4_unicode_ci    NOT NULL,
    `password`        VARCHAR(96) COLLATE utf8mb4_unicode_ci    NOT NULL,
    `user_nicename`   VARCHAR(32) COLLATE utf8mb4_unicode_ci    NULL,
    `email`           VARCHAR(128) COLLATE utf8mb4_unicode_ci   NOT NULL,
    `user_avatar_url` VARCHAR(255) COLLATE utf8mb4_unicode_ci   NULL,
    `registered`      DATETIME                                  NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `user_role`       ENUM ('Administrator', 'Author', 'users') NOT NULL DEFAULT 'users',
    `user_status`     ENUM ('online', 'offline', 'idle')        NOT NULL DEFAULT 'idle',
    UNIQUE KEY `username` (`username`, `user_avatar_url`),
    INDEX `users` (
                   `username`,
                   `user_nicename`,
                   `email`
        )
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;


DROP TABLE IF EXISTS
    `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `ID`           BIGINT(20) UNSIGNED                     NOT NULL AUTO_INCREMENT,
    `username`     VARCHAR(64) COLLATE utf8mb4_unicode_ci  NOT NULL DEFAULT '',
    `password`     VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `email`        VARCHAR(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `registered`   DATETIME                                NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `activated`    INT(1)                                  NOT NULL DEFAULT '0',
    `status`       INT(2)                                  NOT NULL DEFAULT '0',
    `display_name` VARCHAR(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `username` (`username`),
    KEY `email` (`email`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--

-- Table structure for table `user_meta`
--

DROP TABLE IF EXISTS
    `user_meta`;
CREATE TABLE IF NOT EXISTS `user_meta`
(
    `sid`        TINYINT(12) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Security identifier',
    `rid`        TINYINT(12) UNSIGNED NOT NULL COMMENT 'Relative identifier',
    `uid`        TINYINT(12)          NOT NULL COMMENT 'User identifier',
    `meta_key`   VARCHAR(64)          NOT NULL COMMENT 'Metal key',
    `meta_value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci COMMENT 'Metal value',
    `viewable`   TINYINT(1)           NOT NULL DEFAULT '1' COMMENT 'Column visibility, viewable',
    PRIMARY KEY (`sid`),
    UNIQUE KEY `user_meta_unique` (`meta_key`),
    KEY `user_meta_index` (`rid`, `meta_key`),
    KEY `FK_user_meta` (`rid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT = 'Users meta table';
--

-- Constraints for dumped tables
--

--

-- Constraints for table `Analyse_Sales`
--

ALTER TABLE
    `Analyse_Sales`
    ADD CONSTRAINT `FK_Country` FOREIGN KEY (`Country_ID`) REFERENCES `Dim_Country` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_Customer` FOREIGN KEY (`Customer_ID`) REFERENCES `Dim_Customer` (`ID`)
        ON
            DELETE NO ACTION ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_Employee` FOREIGN KEY (`Employee_ID`) REFERENCES `Dim_Employee` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_Order` FOREIGN KEY (`Order_ID`) REFERENCES `Dim_Order` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_Product` FOREIGN KEY (`Product_ID`) REFERENCES `Dim_Product` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
--

-- Constraints for table `author_meta`
--

ALTER TABLE
    `author_meta`
    ADD CONSTRAINT `FK_author_meta` FOREIGN KEY (`rid`) REFERENCES `author` (`sid`) ON UPDATE CASCADE;
--

-- Constraints for table `book`
--

ALTER TABLE
    `book`
    ADD CONSTRAINT `FK_book_author` FOREIGN KEY (`rid_author`) REFERENCES `author` (`sid`) ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_book_genre` FOREIGN KEY (`rid_genre`) REFERENCES `genre` (`sid`)
        ON
            UPDATE CASCADE,
    ADD CONSTRAINT `FK_book_shelve` FOREIGN KEY (`rid`) REFERENCES `shelve` (`sid`)
        ON
            UPDATE CASCADE
;
--

-- Constraints for table `genre_meta`
--

ALTER TABLE
    `genre_meta`
    ADD CONSTRAINT `FK_genre_meta` FOREIGN KEY (`rid`) REFERENCES `genre` (`sid`) ON UPDATE CASCADE;
--

-- Constraints for table `library_meta`
--

ALTER TABLE
    `library_meta`
    ADD CONSTRAINT `FK_library_meta` FOREIGN KEY (`rid`) REFERENCES `library` (`sid`) ON UPDATE CASCADE;
--

-- Constraints for table `publisher_meta`
--

ALTER TABLE
    `publisher_meta`
    ADD CONSTRAINT `FK_publisher_meta` FOREIGN KEY (`rid`) REFERENCES `publisher` (`sid`) ON UPDATE CASCADE;
--

-- Constraints for table `shelve`
--

ALTER TABLE
    `shelve`
    ADD CONSTRAINT `FK_shelve` FOREIGN KEY (`rid`) REFERENCES `library` (`sid`) ON UPDATE CASCADE;
--

-- Constraints for table `shelve_meta`
--

ALTER TABLE
    `shelve_meta`
    ADD CONSTRAINT `FK_shelve_meta` FOREIGN KEY (`rid`) REFERENCES `shelve` (`sid`) ON UPDATE CASCADE;
--

-- Constraints for table `user_meta`
--

ALTER TABLE
    `user_meta`
    ADD CONSTRAINT `FK_user_meta` FOREIGN KEY (`rid`) REFERENCES `user` (`sid`) ON UPDATE CASCADE;
