
show databases;
CREATE DATABASE employee;
USE employee;

drop table employees;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    job VARCHAR(20),
    bank_no VARCHAR(20) NOT NULL,
    date_joining DATE NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL
);


