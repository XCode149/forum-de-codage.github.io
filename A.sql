CREATE DATABASE forum;
USE forum;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE discussions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    discussion_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (discussion_id) REFERENCES discussions(id)
);