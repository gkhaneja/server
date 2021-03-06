CREATE DATABASE IF NOT EXISTS stranger;
USE stranger;

CREATE TABLE IF NOT EXISTS user (
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
username VARCHAR(255) UNIQUE NOT NULL,
created DATETIME,
lastupd TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
INDEX(username),
PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS request (
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
user_id INT UNSIGNED NOT NULL UNIQUE,
src_lattitude DOUBLE(11,8) DEFAULT 0,
src_longitude DOUBLE(11,8) DEFAULT 0,
dst_lattitude DOUBLE(11,8) DEFAULT 0,
dst_longitude DOUBLE(11,8) DEFAULT 0,
created DATETIME,
lastupd TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
INDEX(user_id),
INDEX(src_lattitude,src_longitude,dst_lattitude,dst_longitude),
PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS response (
id INT UNSIGNED AUTO_INCREMENT NOT NULL,
user_id INT UNSIGNED NOT NULL UNIQUE,
response VARCHAR(255),
created DATETIME,
lastupd TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
INDEX(user_id),
PRIMARY KEY(id)
);

