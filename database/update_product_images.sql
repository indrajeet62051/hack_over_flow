USE ecommerce_db;

-- Update Electronics products
UPDATE `products` SET `image` = 'electronics1.jpg' WHERE `category` = 'Electronics' AND `name` LIKE '%Headphones%';
UPDATE `products` SET `image` = 'electronics2.jpg' WHERE `category` = 'Electronics' AND `name` LIKE '%Watch%';
UPDATE `products` SET `image` = 'electronics3.jpg' WHERE `category` = 'Electronics' AND `name` LIKE '%TV%';
UPDATE `products` SET `image` = 'electronics1.jpg' WHERE `category` = 'Electronics' AND `name` LIKE '%Mouse%';
UPDATE `products` SET `image` = 'electronics2.jpg' WHERE `category` = 'Electronics' AND `name` LIKE '%Speaker%';
UPDATE `products` SET `image` = 'electronics3.jpg' WHERE `category` = 'Electronics' AND `name` LIKE '%Laptop%';

-- Update Fashion products
UPDATE `products` SET `image` = 'fashion1.jpg' WHERE `category` = 'Fashion' AND `name` LIKE '%Handbag%';
UPDATE `products` SET `image` = 'fashion2.jpg' WHERE `category` = 'Fashion' AND `name` LIKE '%Dress%';
UPDATE `products` SET `image` = 'fashion3.jpg' WHERE `category` = 'Fashion' AND `name` LIKE '%Shoes%';
UPDATE `products` SET `image` = 'fashion1.jpg' WHERE `category` = 'Fashion' AND `name` LIKE '%Watch%';
UPDATE `products` SET `image` = 'fashion2.jpg' WHERE `category` = 'Fashion' AND `name` LIKE '%Sunglasses%';
UPDATE `products` SET `image` = 'fashion3.jpg' WHERE `category` = 'Fashion' AND `name` LIKE '%Wallet%';

-- Update Home products
UPDATE `products` SET `image` = 'home1.jpg' WHERE `category` = 'Home' AND `name` LIKE '%Hub%';
UPDATE `products` SET `image` = 'home2.jpg' WHERE `category` = 'Home' AND `name` LIKE '%Coffee%';
UPDATE `products` SET `image` = 'home3.jpg' WHERE `category` = 'Home' AND `name` LIKE '%Vacuum%';
UPDATE `products` SET `image` = 'home1.jpg' WHERE `category` = 'Home' AND `name` LIKE '%Bedding%';
UPDATE `products` SET `image` = 'home2.jpg' WHERE `category` = 'Home' AND `name` LIKE '%Mixer%';
UPDATE `products` SET `image` = 'home3.jpg' WHERE `category` = 'Home' AND `name` LIKE '%Bulbs%';

-- Update Books products
UPDATE `products` SET `image` = 'book1.jpg' WHERE `category` = 'Books' AND `name` LIKE '%Coding%';
UPDATE `products` SET `image` = 'book2.jpg' WHERE `category` = 'Books' AND `name` LIKE '%Strategy%';
UPDATE `products` SET `image` = 'book3.jpg' WHERE `category` = 'Books' AND `name` LIKE '%Living%';
UPDATE `products` SET `image` = 'book1.jpg' WHERE `category` = 'Books' AND `name` LIKE '%Mystery%';
UPDATE `products` SET `image` = 'book2.jpg' WHERE `category` = 'Books' AND `name` LIKE '%Photography%';
UPDATE `products` SET `image` = 'book3.jpg' WHERE `category` = 'Books' AND `name` LIKE '%Cooking%';
