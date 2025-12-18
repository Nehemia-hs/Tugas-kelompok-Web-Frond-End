-- database_setup.sql - SQL script to create database and tables

-- Create database
CREATE DATABASE IF NOT EXISTS kopi_kita;

-- Use the database
USE kopi_kita;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create order_items table
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Insert sample users
INSERT INTO users (username, email, password) VALUES
('admin', 'admin@kopikita.com', '$2y$10$fsJ.kt/UOMu5z6h6F6v/A.H23OCYwWpoOeK.4YH2tWJrlg72jfSPK');

-- INSERT INTO products (name, description, price, stock, image) VALUES
-- ('Espresso', 'Kopi hitam klasik', 15000, 50, 'Image/menu/2.avif'),
-- ('Latte', 'Kopi dengan susu', 20000, 30, 'Image/menu/2.avif'),
-- ('Cappuccino', 'Kopi dengan foam susu', 18000, 40, 'Image/menu/2.avif');