CREATE DATABASE IF NOT EXISTS crud_db;

USE crud_db;

CREATE TABLE students (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
	email VARCHAR(150) NOT NULL,
	phone VARCHAR(20),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO students(first_name,last_name,email,phone)
VALUES
('John','Doe','john@example.com','0771234567'),
('Jane','Smith','jane@example.com','0719876543');
