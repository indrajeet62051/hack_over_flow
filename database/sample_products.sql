USE ecommerce_db;

-- Electronics Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Premium Wireless Headphones', 'Electronics', 199.99, 50, 'product1.jpg', 'High-quality wireless headphones with active noise cancellation, 30-hour battery life, and premium sound quality.'),
('Smart Watch Pro', 'Electronics', 299.99, 30, 'product2.jpg', 'Advanced smartwatch with health monitoring, GPS, heart rate sensor, and 5-day battery life.'),
('4K Ultra HD Smart TV', 'Electronics', 899.99, 15, 'product7.jpg', '55-inch 4K Smart TV with HDR, built-in streaming apps, and voice control.'),
('Wireless Gaming Mouse', 'Electronics', 79.99, 100, 'product8.jpg', 'RGB gaming mouse with 16000 DPI sensor and programmable buttons.'),
('Bluetooth Speaker', 'Electronics', 129.99, 45, 'product9.jpg', 'Portable waterproof speaker with 24-hour battery life and deep bass.'),
('Laptop Pro 15', 'Electronics', 1299.99, 20, 'product10.jpg', '15-inch laptop with Intel i7, 16GB RAM, 512GB SSD, and dedicated graphics.');

-- Fashion Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Designer Handbag', 'Fashion', 149.99, 25, 'product3.jpg', 'Elegant designer handbag made from premium vegan leather with gold hardware.'),
('Summer Collection Dress', 'Fashion', 59.99, 40, 'product4.jpg', 'Beautiful summer dress with floral pattern, perfect for any occasion.'),
('Running Shoes', 'Fashion', 89.99, 60, 'product5.jpg', 'Comfortable running shoes with advanced cushioning and breathable mesh.'),
('Men\'s Classic Watch', 'Fashion', 199.99, 30, 'product11.jpg', 'Elegant stainless steel watch with leather strap and automatic movement.'),
('Women\'s Sunglasses', 'Fashion', 129.99, 40, 'product12.jpg', 'Designer sunglasses with UV protection and polarized lenses.'),
('Leather Wallet', 'Fashion', 49.99, 75, 'product13.jpg', 'Genuine leather wallet with RFID protection and multiple card slots.');

-- Home & Living Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Smart Home Hub', 'Home', 199.99, 35, 'product6.jpg', 'Control your entire home with voice commands and smartphone app.'),
('Coffee Maker Pro', 'Home', 149.99, 25, 'product14.jpg', 'Programmable coffee maker with built-in grinder and thermal carafe.'),
('Robot Vacuum Cleaner', 'Home', 299.99, 20, 'product15.jpg', 'Smart robot vacuum with mapping technology and automatic charging.'),
('Bedding Set', 'Home', 89.99, 50, 'product16.jpg', 'Luxury cotton bedding set including duvet cover and pillowcases.'),
('Kitchen Mixer', 'Home', 249.99, 30, 'product17.jpg', 'Professional stand mixer with multiple attachments and 5L bowl.'),
('Smart LED Bulbs', 'Home', 39.99, 100, 'product18.jpg', 'Color-changing smart LED bulbs with voice control support.');

-- Books Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('The Art of Coding', 'Books', 29.99, 50, 'product19.jpg', 'Comprehensive guide to modern programming practices and principles.'),
('Business Strategy', 'Books', 24.99, 40, 'product20.jpg', 'Learn successful business strategies from industry leaders.'),
('Healthy Living Guide', 'Books', 19.99, 60, 'product21.jpg', 'Complete guide to healthy living, nutrition, and wellness.'),
('Mystery Collection', 'Books', 34.99, 25, 'product22.jpg', 'Collection of bestselling mystery novels from top authors.'),
('Photography Basics', 'Books', 27.99, 35, 'product23.jpg', 'Master the fundamentals of photography with this detailed guide.'),
('Cooking Encyclopedia', 'Books', 39.99, 30, 'product24.jpg', 'Comprehensive cookbook with over 1000 recipes and techniques.');
