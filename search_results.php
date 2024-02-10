<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="Search Results">Search Results</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Add your CSS styling for the search results */
        body  {    font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    h2 {
        text-align: center;
        margin-top: 20px;
    }

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px;
    }

    .product {
        border: 1px solid #ddd;
        background-color: #fff;
        padding: 15px;
        width: 250px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
        margin-left: 500px;
        margin-bottom: 20px;
    }

    .product:hover {
        transform: scale(1.05);
    }

    .product img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .product h3 {
        margin-bottom: 10px;
        font-size: 1.2em;
        color: #333;
    }

    .product p {
        color: #666;
        margin: 5px 0;
    }

    .buy-button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }

    body.dark-mode {
        background-color: #000;
        /* Set the background color to black in dark mode */
        color: #fff;
        /* Set the text color to white in dark mode */
    }

    .product.dark-mode {
        background-color: #333;
        /* Set the background color of each product in dark mode */
        border-color: #555;
        /* Set the border color of each product in dark mode */
        color: #fff;
        /* Set the text color of each product in dark mode */
    }

    /* Logo styling */
    .logo-container {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    /* Back arrow styling */
    .back-arrow-container {
        position: absolute;
        top: 10px;
        left: 40px;
        cursor: pointer;
    }

    .back-arrow {
        width: 30px;
        height: 30px;
        border: solid blue; /* Change the color to blue */
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 3px;
        transform: rotate(135deg);
        margin-top: 25px;
    }
        #logo{
            margin-left: 150px;
            width: 100px;
            height: 80px;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <div class="logo-container">
        <img id="logo" src="Image/logo.png" alt="Logo" width="50" height="50">
    </div>

    <!-- Back arrow -->
    <div class="back-arrow-container" onclick="goBack()">
        <div class="back-arrow">
            
        </div>
    </div>

    <?php
    // Read the search query and selected language from the URL parameters
    $searchQuery = urldecode($_GET['search']);
    $selectedLanguage = $_GET['lang'];

    // Decode the JSON-encoded search results
    $matchingProducts = json_decode($searchQuery, true);

    // Load products from the JSON file
    $productsJson = file_get_contents('product.json');
    $products = json_decode($productsJson, true);

    // Function to translate text using Google Translate API
    function translateText($text, $targetLanguage)
    {
        // Replace 'YOUR_GOOGLE_API_KEY' with your actual Google Translate API key
        $apiKey = 'AIzaSyBy7BBULtWvrA8A89XyItUyH1_A6Zq63Fs';

        $baseUrl = 'https://translation.googleapis.com/language/translate/v2';
        $url = "$baseUrl?key=$apiKey";

        $data = array(
            'q' => $text,
            'target' => $targetLanguage,
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            // Handle error
            return $text; // Return the original text on translation error
        }

        $json = json_decode($result, true);

        if (isset($json['data']['translations'][0]['translatedText'])) {
            return $json['data']['translations'][0]['translatedText'];
        } else {
            return $text; // Return the original text if translation is not available
        }
    }

    // Display the matching products
    foreach ($matchingProducts as $product) {
        // Dynamically add 'dark-mode' class to each product div
        $productClass = 'product';
        if (isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] == 'true') {
            $productClass .= ' dark-mode';
        }
        echo '<div class="' . $productClass . '">';

        // Translate the product name
        $translatedName = translateText($product['title'], $selectedLanguage);
        echo '<img src="' . $product['image'] . '" alt="' . $translatedName . '" data-translate="' . $translatedName . '">';
        echo '<h3 data-translate="' . $translatedName . '">' . $translatedName . '</h3>';

        // Translate the category label and value
        $translatedCategoryLabel = translateText("Category", $selectedLanguage);
        $translatedCategory = translateText($product['category'], $selectedLanguage);
        echo '<p data-translate="' . $translatedCategoryLabel . '">' . $translatedCategoryLabel . ': ' . $translatedCategory . '</p>';

        // Translate the price label and value
        $translatedPriceLabel = translateText("Price", $selectedLanguage);
        $translatedPrice = translateText($product['price'], $selectedLanguage);
        echo '<p data-translate="' . $translatedPriceLabel . '">' . $translatedPriceLabel . ': ' . $translatedPrice . '</p>';

        // Buy Now button
        echo '<button class="buy-button" onclick="handleProductClick(' . $product['id'] . ')">Buy Now</button>';

        echo '</div>';
    }
    ?>

    <script>
        // Function to apply dark mode styles based on user's preference
        function applyDarkModeStyles() {
            const storedDarkMode = localStorage.getItem('darkMode');
            const body = document.body;

            if (storedDarkMode === 'true') {
                body.classList.add('dark-mode');
            } else {
                body.classList.remove('dark-mode');
            }
        }

        // Apply dark mode styles based on user's preference
        applyDarkModeStyles();

        // Go back function
        function goBack() {
            window.history.back();
        }
    </script>
    <!-- JavaScript for handling product click -->
    <script>
        const selectedLanguage = '<?php echo $selectedLanguage; ?>';

        // Store the selected language in local storage
        localStorage.setItem('selectedLanguage', selectedLanguage);

        function handleProductClick(productId) {
            // Read the selected language from local storage
            const storedLanguage = localStorage.getItem('selectedLanguage');

            // Redirect to the product page with the stored language
            window.location.href = `newprod.html?id=${productId}&lang=${storedLanguage}`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Apply dark mode styles based on user's preference when the page is loaded
            applyDarkModeStyles();
        });
    </script>

</body>

</html>
