CREATE DATABASE IF NOT EXISTS taskdb
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE taskdb;

CREATE TABLE IF NOT EXISTS tblusers (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  useractive ENUM('Y', 'N') NOT NULL DEFAULT 'Y',
  loginattempts INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_tblusers_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tbltasks (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description MEDIUMTEXT NULL,
  deadline DATETIME NULL,
  completed ENUM('Y', 'N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (id),
  KEY idx_tbltasks_completed (completed),
  KEY idx_tbltasks_deadline (deadline)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tblsessions (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  userid BIGINT UNSIGNED NOT NULL,
  accesstoken VARCHAR(255) NOT NULL,
  accesstokenexpiry DATETIME NOT NULL,
  refreshtoken VARCHAR(255) NOT NULL,
  refreshtokenexpiry DATETIME NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_tblsessions_accesstoken (accesstoken),
  UNIQUE KEY uq_tblsessions_refreshtoken (refreshtoken),
  KEY idx_tblsessions_userid (userid),
  CONSTRAINT fk_tblsessions_userid
    FOREIGN KEY (userid) REFERENCES tblusers (id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
