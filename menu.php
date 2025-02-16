<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products - Your E-Commerce Store</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style1.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="products">
   <h1 class="title">OUR PRODUCTS</h1>

   <div class="box-container-filters">
      <div class="filters">
         <h3>Filter Products</h3>
         <form action="" method="get">
            <div class="filter-group">
               <label>Category:</label>
               <select name="category" class="box">
                  <option value="">All Categories</option>
                  <option value="Electronics" <?= isset($_GET['category']) && $_GET['category'] == 'Electronics' ? 'selected' : ''; ?>>Electronics</option>
                  <option value="Fashion" <?= isset($_GET['category']) && $_GET['category'] == 'Fashion' ? 'selected' : ''; ?>>Fashion</option>
                  <option value="Home" <?= isset($_GET['category']) && $_GET['category'] == 'Home' ? 'selected' : ''; ?>>Home & Living</option>
                  <option value="Books" <?= isset($_GET['category']) && $_GET['category'] == 'Books' ? 'selected' : ''; ?>>Books</option>
               </select>
            </div>
            
            <div class="filter-group">
               <label>Price Range:</label>
               <select name="price" class="box">
                  <option value="">All Prices</option>
                  <option value="0-50" <?= isset($_GET['price']) && $_GET['price'] == '0-50' ? 'selected' : ''; ?>>$0 - $50</option>
                  <option value="50-100" <?= isset($_GET['price']) && $_GET['price'] == '50-100' ? 'selected' : ''; ?>>$50 - $100</option>
                  <option value="100-200" <?= isset($_GET['price']) && $_GET['price'] == '100-200' ? 'selected' : ''; ?>>$100 - $200</option>
                  <option value="200+" <?= isset($_GET['price']) && $_GET['price'] == '200+' ? 'selected' : ''; ?>>$200+</option>
               </select>
            </div>
            
            <div class="filter-group">
               <label>Sort By:</label>
               <select name="sort" class="box">
                  <option value="newest" <?= isset($_GET['sort']) && $_GET['sort'] == 'newest' ? 'selected' : ''; ?>>Newest First</option>
                  <option value="price_low" <?= isset($_GET['sort']) && $_GET['sort'] == 'price_low' ? 'selected' : ''; ?>>Price: Low to High</option>
                  <option value="price_high" <?= isset($_GET['sort']) && $_GET['sort'] == 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
               </select>
            </div>
            
            <div class="filter-group">
               <input type="submit" value="Apply Filters" class="btn">
               <a href="menu.php" class="option-btn">Clear Filters</a>
            </div>
         </form>
      </div>
   </div>

   <div class="box-container">
      <?php
         $category = isset($_GET['category']) ? $_GET['category'] : '';
         $price_range = isset($_GET['price']) ? $_GET['price'] : '';
         $sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
         
         $where_conditions = [];
         $params = [];
         
         if (!empty($category)) {
            $where_conditions[] = "category = ?";
            $params[] = $category;
         }
         
         if (!empty($price_range)) {
            switch($price_range) {
               case '0-50':
                  $where_conditions[] = "price BETWEEN 0 AND 50";
                  break;
               case '50-100':
                  $where_conditions[] = "price BETWEEN 50 AND 100";
                  break;
               case '100-200':
                  $where_conditions[] = "price BETWEEN 100 AND 200";
                  break;
               case '200+':
                  $where_conditions[] = "price >= 200";
                  break;
            }
         }
         
         $where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";
         
         $order_by = "ORDER BY id DESC"; // default newest first
         if ($sort == 'price_low') {
            $order_by = "ORDER BY price ASC";
         } elseif ($sort == 'price_high') {
            $order_by = "ORDER BY price DESC";
         }
         
         $select_products = $conn->prepare("SELECT * FROM `products` $where_clause $order_by");
         $select_products->execute($params);
         
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="<?= $fetch_products['name']; ?>" class="product-image">
         
         <div class="category"><?= $fetch_products['category']; ?></div>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
            <div class="stock <?= $fetch_products['stock'] > 0 ? 'in' : 'out'; ?>">
               <?= $fetch_products['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
            </div>
         </div>
         
         <div class="flex-btn">
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
            <?php if($fetch_products['stock'] > 0): ?>
               <input type="submit" name="add_to_cart" value="Add to Cart" class="btn">
            <?php else: ?>
               <input type="button" value="Out of Stock" class="btn" disabled>
            <?php endif; ?>
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No products found!</p>';
         }
      ?>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>