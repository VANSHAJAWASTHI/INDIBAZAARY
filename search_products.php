<?php
// Read the search query from the user
$searchQuery = $_GET['search'];
$selectedLanguage = $_GET['lang'];

// Debugging statements
echo "Search Query: $searchQuery<br>";
echo "Selected Language: $selectedLanguage<br>";

// Load products from the JSON file
$productsJson = file_get_contents('product.json');
$products = json_decode($productsJson, true);

// Filter products based on the search query
$matchingProducts = array_filter($products, function ($product) use ($searchQuery) {
    return stripos($product['name'], $searchQuery) !== false;
});

// Debugging statement
echo "Matching Products: ";
print_r($matchingProducts);

// Redirect to a page displaying the matching products
header("Location: search_results.php?search=" . urlencode(json_encode($matchingProducts)) . "&lang=" . urlencode($selectedLanguage));
exit();
?>
