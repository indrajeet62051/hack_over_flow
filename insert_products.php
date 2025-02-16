<?php
include 'components/connect.php';

$products = [
    [
        'name' => 'Premium Wireless Headphones',
        'category' => 'Electronics',
        'price' => 199.99,
        'stock' => 50,
        'image' => 'electronics1.jpg',
        'description' => 'High-quality wireless headphones with active noise cancellation.'
    ],
    [
        'name' => 'Smart Watch Pro',
        'category' => 'Electronics',
        'price' => 299.99,
        'stock' => 30,
        'image' => 'electronics2.jpg',
        'description' => 'Advanced smartwatch with health monitoring and GPS.'
    ],
    [
        'name' => '4K Ultra HD Smart TV',
        'category' => 'Electronics',
        'price' => 899.99,
        'stock' => 15,
        'image' => 'electronics3.jpg',
        'description' => '55-inch 4K Smart TV with HDR.'
    ],
    [
        'name' => 'Designer Handbag',
        'category' => 'Fashion',
        'price' => 149.99,
        'stock' => 25,
        'image' => 'fashion1.jpg',
        'description' => 'Elegant designer handbag made from premium vegan leather.'
    ],
    [
        'name' => 'Summer Collection Dress',
        'category' => 'Fashion',
        'price' => 59.99,
        'stock' => 40,
        'image' => 'fashion2.jpg',
        'description' => 'Beautiful summer dress with floral pattern.'
    ],
    [
        'name' => 'Running Shoes',
        'category' => 'Fashion',
        'price' => 89.99,
        'stock' => 60,
        'image' => 'fashion3.jpg',
        'description' => 'Comfortable running shoes with advanced cushioning.'
    ],
    [
        'name' => 'Smart Home Hub',
        'category' => 'Home',
        'price' => 199.99,
        'stock' => 35,
        'image' => 'home1.jpg',
        'description' => 'Control your entire home with voice commands.'
    ],
    [
        'name' => 'Coffee Maker Pro',
        'category' => 'Home',
        'price' => 149.99,
        'stock' => 25,
        'image' => 'home2.jpg',
        'description' => 'Programmable coffee maker with built-in grinder.'
    ],
    [
        'name' => 'Robot Vacuum Cleaner',
        'category' => 'Home',
        'price' => 299.99,
        'stock' => 20,
        'image' => 'home3.jpg',
        'description' => 'Smart robot vacuum with mapping technology.'
    ],
    [
        'name' => 'The Art of Coding',
        'category' => 'Books',
        'price' => 29.99,
        'stock' => 50,
        'image' => 'book1.jpg',
        'description' => 'Comprehensive guide to modern programming.'
    ],
    [
        'name' => 'Business Strategy',
        'category' => 'Books',
        'price' => 24.99,
        'stock' => 40,
        'image' => 'book2.jpg',
        'description' => 'Learn successful business strategies.'
    ],
    [
        'name' => 'Healthy Living Guide',
        'category' => 'Books',
        'price' => 19.99,
        'stock' => 60,
        'image' => 'book3.jpg',
        'description' => 'Complete guide to healthy living and wellness.'
    ]
];

try {
    // First, clear existing products
    $conn->exec("TRUNCATE TABLE products");
    
    // Prepare the insert statement
    $stmt = $conn->prepare("INSERT INTO products (name, category, price, stock, image, description) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Insert each product
    foreach ($products as $product) {
        $stmt->execute([
            $product['name'],
            $product['category'],
            $product['price'],
            $product['stock'],
            $product['image'],
            $product['description']
        ]);
    }
    
    echo "Products inserted successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
