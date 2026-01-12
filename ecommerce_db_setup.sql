-- १. डेटाबेस तयार करा आणि तो निवडा (हे सर्वात महत्वाचे आहे)
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

-- २. युजर्स टेबल तयार करा
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ३. लॉगिनसाठी डेटा भरा 
-- (टीप: लॉगिन करताना Username: admin आणि Password: password123 वापरा)
INSERT INTO users (username, password) VALUES 
('admin', 'admin');
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10, 2),
    description TEXT,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    customer_email VARCHAR(100),
    address TEXT,
    total_price DECIMAL(10, 2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, price, description, image) VALUES
('Monitor', 45000.00, '4K Ultra HD resolution monitor with high refresh rate.', 'monitor.jpg'),
('Smartwatch', 15000.00, 'Smart fitness tracker with heart rate and sleep monitoring.', 'smartwatch.jpg'),
('Wired Earphones', 2500.00, 'High-quality wired earphones with deep bass and microphone.', 'earphones.jpg'),
('Gaming Headphones', 12000.00, 'Pro gaming headset with surround sound and noise cancellation.', 'headphones.jpg'),
('Wireless Keyboard', 3500.00, 'Ergonomic wireless keyboard with long battery life.', 'keyboard.jpg'),
('Digital Camera', 1800.00, 'Compact digital camera with high-resolution lens.', 'camera.jpg');