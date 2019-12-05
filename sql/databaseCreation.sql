-- CREATE DATABASE IF NOT EXISTS csci445_fullstack_project;

USE f19_tlucas;

CREATE TABLE IF NOT EXISTS USERS (
    user_id INT NOT NULL AUTO_INCREMENT,
    public_name VARCHAR(255) NOT NULL DEFAULT ' ',
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    hash VARCHAR(32) NOT NULL,
    active INT(1) NOT NULL DEFAULT '0',
    PRIMARY KEY(user_id) 
);

CREATE TABLE IF NOT EXISTS USERSESSIONS (
    session_id INT NOT NULL AUTO_INCREMENT,
    timeout DATETIME,
    user_id INT, 
    session_key INT, 
    PRIMARY KEY(session_id)
);

CREATE TABLE IF NOT EXISTS WEBPAGEDATA (
    card_id INT NOT NULL AUTO_INCREMENT,
    user_id INT,
    link_to VARCHAR(255),
    description VARCHAR(255),
    title VARCHAR(255),
    PRIMARY KEY(card_id),
    FOREIGN KEY(user_id) REFERENCES USERS(user_id)
);
