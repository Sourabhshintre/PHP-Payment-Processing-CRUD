CREATE DATABASE reso;

USE reso;

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    payment_amount DECIMAL(10, 2) NOT NULL,
    gst BOOLEAN NOT NULL,
    total_payable_amount DECIMAL(10, 2) NOT NULL
);
