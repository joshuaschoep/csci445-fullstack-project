CREATE DATABASE IF NOT EXISTS csci445_fullstack_project;

USE csci445_fullstack_project;

CREATE TABLE IF NOT EXISTS USERS (
    user_id INT NOT NULL AUTO_INCREMENT,
    public_name VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255), 
    password VARCHAR(255),
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
    PRIMARY KEY(card_id)
);