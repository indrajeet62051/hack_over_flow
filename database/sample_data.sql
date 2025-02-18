USE ecommerce_db;

SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE products;
SET FOREIGN_KEY_CHECKS=1;

-- Electronics Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Premium Wireless Headphones', 'Electronics', 199.99, 50, 'product7.jpg', 'High-quality wireless headphones with noise cancellation, 30-hour battery life, and premium sound quality.'),
('4K Smart TV 55-inch', 'Electronics', 699.99, 20, 'product8.jpg', 'Crystal clear 4K resolution, smart features with built-in streaming apps, HDR support, and slim design.'),
('Gaming Laptop Pro', 'Electronics', 1299.99, 15, 'product9.jpg', 'Powerful gaming laptop with RTX 3060, 16GB RAM, 512GB SSD, and 144Hz display.'),
('Smart Watch Pro', 'Electronics', 299.99, 40, 'product10.jpg', 'Advanced smartwatch with health tracking, GPS, and cellular connectivity.'),
('Bluetooth Speaker', 'Electronics', 79.99, 60, 'product11.jpg', 'Portable speaker with 360° sound and 20-hour battery life.'),
('Digital Camera DSLR', 'Electronics', 899.99, 25, 'product12.jpg', 'Professional DSLR camera with 24MP sensor and 4K video.'),
('Wireless Earbuds', 'Electronics', 149.99, 100, 'product13.jpg', 'True wireless earbuds with active noise cancellation.'),
('Gaming Console Pro', 'Electronics', 499.99, 30, 'product14.jpg', 'Next-gen gaming console with 4K gaming support.'),
('Tablet Pro 12.9', 'Electronics', 899.99, 35, 'product15.jpg', 'Professional tablet with M1 chip and Liquid Retina XDR display.');

-- Fashion Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Classic Leather Jacket', 'Fashion', 129.99, 40, 'product16.jpg', 'Genuine leather jacket with quilted lining and multiple pockets.'),
('Designer Denim Jeans', 'Fashion', 79.99, 100, 'product17.jpg', 'Premium quality denim jeans with perfect fit and stylish wash.'),
('Formal Business Suit', 'Fashion', 299.99, 25, 'product18.jpg', 'Elegant business suit made from premium wool blend.'),
('Running Shoes Pro', 'Fashion', 89.99, 60, 'product19.jpg', 'Lightweight and comfortable running shoes with advanced cushioning.'),
('Designer Handbag', 'Fashion', 199.99, 30, 'product20.jpg', 'Luxury handbag with genuine leather and gold hardware.'),
('Summer Dress Collection', 'Fashion', 59.99, 80, 'product21.jpg', 'Lightweight summer dresses in various patterns.'),
('Winter Coat', 'Fashion', 149.99, 45, 'product22.jpg', 'Warm winter coat with faux fur lining.'),
('Athletic Wear Set', 'Fashion', 69.99, 70, 'product23.jpg', 'Matching athletic wear set for gym and sports.'),
('Designer Sunglasses', 'Fashion', 129.99, 50, 'product24.jpg', 'UV protected designer sunglasses.');

-- Home & Living Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Modern Sofa Set', 'Home & Living', 899.99, 10, 'product1.jpg', 'Contemporary 3-seater sofa with premium fabric upholstery.'),
('Smart LED Desk Lamp', 'Home & Living', 49.99, 75, 'product2.jpg', 'Adjustable LED desk lamp with multiple brightness levels.'),
('Kitchen Mixer Pro', 'Home & Living', 259.99, 30, 'product3.jpg', 'Professional grade kitchen mixer with 5L bowl.'),
('Queen Size Bed Set', 'Home & Living', 599.99, 15, 'product4.jpg', 'Complete queen size bed set with memory foam mattress.'),
('Smart Home Hub', 'Home & Living', 149.99, 50, 'product5.jpg', 'Central hub for controlling all smart home devices.'),
('Coffee Maker Pro', 'Home & Living', 199.99, 40, 'product6.jpg', 'Professional coffee maker with built-in grinder.'),
('Air Purifier Plus', 'Home & Living', 299.99, 35, 'product7.jpg', 'HEPA air purifier for large rooms.'),
('Robot Vacuum Cleaner', 'Home & Living', 399.99, 25, 'product8.jpg', 'Smart robot vacuum with mapping technology.'),
('Standing Desk', 'Home & Living', 449.99, 20, 'product9.jpg', 'Electric standing desk with memory settings.');

-- Books Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('The Art of Programming', 'Books', 49.99, 100, 'product10.jpg', 'Comprehensive guide to modern programming practices.'),
('Business Strategy Guide', 'Books', 34.99, 80, 'product11.jpg', 'Expert insights into business strategy and leadership.'),
('Creative Writing Masterclass', 'Books', 29.99, 120, 'product12.jpg', 'Learn the art of storytelling and creative writing.'),
('Data Science Handbook', 'Books', 44.99, 90, 'product13.jpg', 'Complete guide to data science and analytics.'),
('Cooking Masterclass', 'Books', 39.99, 70, 'product14.jpg', 'Professional cooking techniques and recipes.'),
('Photography Guide', 'Books', 29.99, 85, 'product15.jpg', 'Master the art of photography.'),
('Financial Planning', 'Books', 34.99, 95, 'product16.jpg', 'Personal finance and investment strategies.'),
('Fitness & Nutrition', 'Books', 24.99, 110, 'product17.jpg', 'Complete guide to fitness and nutrition.'),
('Travel Photography', 'Books', 39.99, 75, 'product18.jpg', 'Guide to travel photography techniques.');

-- Gadgets Category
INSERT INTO `products` (`name`, `category`, `price`, `stock`, `image`, `description`) VALUES
('Smart Home Camera', 'Gadgets', 79.99, 60, 'product19.jpg', '1080p smart security camera with night vision.'),
('Fitness Tracker Pro', 'Gadgets', 89.99, 80, 'product20.jpg', 'Advanced fitness tracker with heart rate monitoring.'),
('Wireless Charger Pad', 'Gadgets', 29.99, 120, 'product21.jpg', 'Fast wireless charging pad for smartphones.'),
('Smart Door Lock', 'Gadgets', 199.99, 40, 'product22.jpg', 'Fingerprint and code enabled smart door lock.'),
('Portable Power Bank', 'Gadgets', 49.99, 100, 'product23.jpg', '20000mAh power bank with fast charging.'),
('Smart Light Bulbs', 'Gadgets', 39.99, 150, 'product24.jpg', 'Color changing smart LED bulbs.');
