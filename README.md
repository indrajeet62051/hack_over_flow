# E-Commerce Platform

A minimalist e-commerce platform built with PHP and MySQL.

## Features

- User Authentication & Role-Based Access Control
- Product Catalog with Categories
- Shopping Cart & Checkout
- Order Management
- Admin Dashboard
- Product Reviews & Ratings
- Email Notifications
- Responsive Design

## Requirements

- PHP 7.4+
- MySQL 5.7+
- Apache Web Server
- XAMPP (recommended)

## Installation

1. Clone this repository to your XAMPP's htdocs directory
2. Import the database schema from `database/ecommerce.sql`
3. Configure database connection in `components/connect.php`
4. Start Apache and MySQL services in XAMPP
5. Access the application at `http://localhost/y-not`

## Directory Structure

```
y-not/
├── admin/             # Admin dashboard files
├── components/        # Reusable components
├── css/              # Stylesheets
├── database/         # Database schema
├── images/           # Category and banner images
├── js/              # JavaScript files
├── uploaded_img/     # Product images
└── README.md         # Documentation
```

## Usage

1. Register a new account or login
2. Browse products by category
3. Add items to cart
4. Proceed to checkout
5. View order history
6. Admin can manage products, orders, and users

## Contributing

1. Fork the repository
2. Create a new branch
3. Make your changes
4. Submit a pull request

## License

This project is licensed under the MIT License.
