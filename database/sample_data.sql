USE ecommerce_db;

-- Sample products
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Premium Wireless Headphones', 'Electronics', 199.99, 50, 'product1.jpg', 'High-quality wireless headphones with noise cancellation'),
('Smart Watch Pro', 'Electronics', 299.99, 30, 'product2.jpg', 'Advanced smartwatch with health monitoring features'),
('Designer Handbag', 'Fashion', 149.99, 20, 'product3.jpg', 'Elegant designer handbag made from premium materials'),
('Bluetooth Speaker', 'Electronics', 79.99, 100, 'product4.jpg', 'Portable Bluetooth speaker with amazing sound quality'),
('Summer Collection Dress', 'Fashion', 59.99, 40, 'product5.jpg', 'Beautiful summer dress with floral pattern'),
('Running Shoes', 'Fashion', 89.99, 60, 'product6.jpg', 'Comfortable running shoes with advanced cushioning');

-- Sample admin user
INSERT INTO `users` (`name`, `email`, `password`, `user_type`) VALUES
('Admin', 'admin@example.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- Sample customer
INSERT INTO `users` (`name`, `email`, `password`, `address`, `user_type`) VALUES
('John Doe', 'john@example.com', '527bd5b5d689e2c32ae974c6229ff785', '123 Main St, City, Country', 'user');
