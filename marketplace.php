<?php
// Simulated database for products
$products = [
    1 => ['name' => 'Product 1', 'price' => 10.99, 'stock' => 100],
    2 => ['name' => 'Product 2', 'price' => 24.99, 'stock' => 50],
    3 => ['name' => 'Product 3', 'price' => 7.99, 'stock' => 75],
];

// Display the list of products
function displayProducts($products) {
    echo "<h2>Products</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Action</th></tr>";

    foreach ($products as $id => $product) {
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>{$product['name']}</td>";
        echo "<td>{$product['price']}</td>";
        echo "<td>{$product['stock']}</td>";
        echo "<td><a href='?action=buy&id=$id'>Buy</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Handle purchasing products
function buyProduct($id, $products) {
    if (isset($products[$id])) {
        if ($products[$id]['stock'] > 0) {
            $products[$id]['stock']--;
            echo "Product '{$products[$id]['name']}' purchased successfully!";
        } else {
            echo "Product '{$products[$id]['name']}' is out of stock.";
        }
    } else {
        echo "Product not found.";
    }
}

// Main logic
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action === 'buy') {
        buyProduct($id, $products);
    }
}

displayProducts($products);
?>
