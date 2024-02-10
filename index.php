<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login_signup.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-commerce Landing page Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="searchbarcss.css">
    <link rel="stylesheet" href="dark.css">
    <script src="https://apis.google.com/js/api.js"></script>
</head>

<body>

    <header>
        <div class="newnav">
            <img src="Image/logo.png" alt="Logo" class="logo">
            <div class="nav-links">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#contact">Contact</a>
                <select id="languageSelect" onchange="translatePage()" style="padding:5px; border-radius:15px">
                    <option class="lang" value="en">English</option>
                    <option class="lang" value="hi">Hindi</option>
                    <option class="lang" value="bn">Bengali</option>
                    <option class="lang" value="te">Telugu</option>
                    <option class="lang" value="mr">Marathi</option>
                    <option class="lang" value="ta">Tamil</option>
                    <option class="lang" value="gu">Gujarati</option>
                    <option class="lang" value="kn">Kannada</option>
                    <option class="lang" value="ur">Urdu</option>
                    <option class="lang" value="pa">Punjabi</option>
                    <option class="lang" value="ml">Malayalam</option>
                    <option class="lang" value="bho">Bhojpuri</option>
                </select>
            </div>
            <div class="checkbox-wrapper-54">
                <label class="switch">
                    <input type="checkbox" id="toggle-dark-mode">
                    <span class="slider"></span>
                </label>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="Search..."
                    oninput="searchProducts()">
                <div class="icons-container">
                    <button class="voice-button" onclick="startVoiceSearch()">
                        <img src='Image/voice.jpg' alt="Voice Search" class="voice-icon">
                    </button>
                    <div class="camera-div">
                        <label for="imageUpload" class="camera-button">
                            <img src='Image/search.jpg' alt="Camera Search" class="camera-icon" id="camera_img">
                        </label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none;"
                            onchange="startImageSearch(event)">
                    </div>
                </div>
                <div class="extracted-text" id="extractedText"></div>
            </div>
        </div>

        <div id="header-hero">
            <div class="header-bg"> <img src="Image/bg.jpg" alt="header-image" /> </div>
            <div class="header-content">
                <p class="heading-1" style="margin-top:-50px;" data-translate="Summer Collection 2024">Summer Collection
                    2024</p>
                <h1 style="margin-top:50px;">Welcome to indibazaary our user
                    <?php echo $_SESSION["fname"]; ?>
                </h1>
                <p class="description"
                    data-translate="Indulge in Elegance, Shop in Every Language!
                  Discover IndicBazaar Shop - where style knows no limits. Own or rent products that speak to your taste, all available in your preferred Indic language. Elevate your shopping experience - it's not just a purchase, it's a statement. Join us at Brandy Shop, where fashion meets language diversity">
                    Indulge in Elegance, Shop in Every Language!
                    Discover IndicBazaar Shop - where style knows no limits. Own or rent products that speak to your
                    taste, all available in your preferred Indic language. Elevate your shopping experience - it's not
                    just a purchase, it's a statement. Join us at Brandy Shop, where fashion meets language diversity
                </p>
                <div class="button">
                    <p data-translate>Shop Now</p>
                </div>
            </div>
        </div>
    </header>
    <section id="summer-collection">
        <div class="container">
            <div class="sc-content">
                <h1 data-translate>Summer Collection</h1>
                <p class="description"
                    data-translate="Indulge in Elegance, Shop in Every Language!
                  Discover IndicBazaar Shop - where style knows no limits. Own or rent products that speak to your taste, all available in your preferred Indic language. Elevate your shopping experience - it's not just a purchase, it's a statement. Join us at Brandy Shop, where fashion meets language diversity">
                    Indulge in Elegance, Shop in Every Language!
                    Discover IndicBazaar Shop - where style knows no limits. Own or rent products that speak to your
                    taste, all available in your preferred Indic language. Elevate your shopping experience - it's not
                    just a purchase, it's a statement. Join us at Brandy Shop, where fashion meets language diversity
                </p>
                <a href="#" data-translate>Discover Now</a>
            </div>
            <div class="sc-media">
                <div class="sc-media-bg"> <img src="Image/cold-fashion-man-women_3x.jpg" alt="sc-image" /> </div>
            </div>
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="products-header">
                <h2 data-translate>Popular Products</h2>
                <p data-translate>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="product product-1">
                <figure onclick="handleProductClick(20)">
                    <img src="Image/product-1-img_3x.jpg" alt="product-image">
                    <figcaption data-translate>Men Shirt</figcaption>
                    <figcaption>$ 56.00</figcaption>
                </figure>
            </div>
            <div class="product product-4">
                <figure onclick="handleProductClick(21)">
                    <img src="Image/product-4-img_3x.jpg" alt="product-image">
                    <figcaption data-translate>Men Fashion</figcaption>
                    <figcaption>$ 89.00</figcaption>
                </figure>
            </div>
            <div class="product product-3" >
                <figure onclick="handleProductClick(22)">
                    <img src="Image/product-2-img_3x.jpg" alt="product-image">
                    <figcaption data-translate>Women Fashion</figcaption>
                    <figcaption>$ 48.00</figcaption>
                </figure>
            </div>
            <div class="product product-3">
                <figure onclick="handleProductClick(23)">
                    <img src="Image/product-3-img_3x.jpg" alt="product-image">
                    <figcaption data-translate>Women Fashion</figcaption>
                    <figcaption>$ 48.00</figcaption>
                </figure>
            </div>
        </div>
    </section>
    <section id="collections">
        <div class="container">
            <div class="c-1">
                <div class="c-1-image-holder"> <img src="Image/suit-collection-img_3x.jpg" alt="image"> </div>
            </div>
            <div class="c-2">
                <h2 data-translate>Featured Collection</h2>
                <hr />
                <div class="c-2-image-holder"> <img class="left" src="Image/collection-2-img_3x.jpg" alt=""><img
                        class="right" src="Image/collection-1-img_3x.jpg" alt=""></div>
                <p class="button" data-translate>View All Collections</p>
            </div>
        </div>
    </section>
    <section id="blog">
        <div class="container" id="bloginside">
            <div class="blog-header">
                <h2 data-translate>Latest from Blog</h2>
                <p data-translate>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="blog-content">
                <div class="blog-1">
                    <div class="blog-1-image-holder"> <img src="Image/blog-2-img_3x.jpg" alt="image"> </div>
                    <div class="blog-1-content">
                        <h4 data-translate>Lorem Ipsum</h4>
                        <h3 data-translate>Lorem ipsum dolor sit amet.</h3>
                        <p class="description" data-translate>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                        <p class="button" data-translate>View Post</p>
                    </div>
                </div>
                <div class="blog-2">
                    <div class="blog-2-image-holder"> <img src="Image/blog-1-img_3x.jpg" alt="image"> </div>
                    <div class="blog-2-content">
                        <h4 data-translate>Lorem Ipsum</h4>
                        <h3 data-translate>Lorem ipsum dolor sit amet.</h3>
                        <p class="description" data-translate>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                        <p class="button" data-translate>View Post</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <h4 data-translate>Contact Us</h4>
            <p>Team Umeed-Mumbai</p>
            <p>+ 91-9999999999</p>
            <p>xyz@gmail.com</p>
            <p class="email" data-translate>Email Us <span><img src="Image/gmail.webp" alt="email-image"></span></p>
        </div>
    </section>
    <div class="social-icons">
        <a href="#" target="_blank"><img class="instagram-icon" src="Image/instagram.webp" alt="Instagram"></a>
        <a href="#" target="_blank"><img class="twitter-icon" src="Image/twitter.webp" alt="twitter"></a>
        <a href="#" target="_blank"><img class="facebook-icon" src="Image/Facebook.webp" alt="Facebook"></a>
    </div>
    <div class="follow-us">
        <h3 data-translate>Follow Us</h3>
    </div>
    <footer>
        <div class="footer-section">
        </div>
        <div class="footer-bottom">
            <p class="copy-right" data-translate>© 2024 IndiBazaary. All Rights Reserved</p>
            <div class="footer-links">
                <a href="#" data-translate>Privacy Policy</a>
                <a href="#" data-translate>Terms of Service</a>
                <a href="#" data-translate>Accessibility</a>
            </div>
        </div>
    </footer>
    <div class="back-to-top"><a href="#nav"> <img title="Back to Top." src="Image/back_top.png" alt="back to top"></a>
    </div>
    <script>
    function translatePage(language) {
        translateNode(document.body, language);
    }

    function translateNode(node, language) {
        if (node.nodeType === Node.TEXT_NODE) {
            translateText(node, language);
        } else if (node.nodeType === Node.ELEMENT_NODE) {
            node.childNodes.forEach(child => {
                translateNode(child, language);
            });
        }
    }

    function translateText(node, language) {
        const text = node.textContent.trim();
        if (text !== '') {
            translateElement(node, text, language)
                .then(translatedText => {
                    node.textContent = translatedText;
                })
                .catch(error => {
                    console.error('Translation error:', error);
                });
        }
    }

    async function translateElement(element, text, language) {
        const apiKey = 'AIzaSyBy7BBULtWvrA8A89XyItUyH1_A6Zq63Fs';
        const response = await fetch(`https://translation.googleapis.com/language/translate/v2?key=${apiKey}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                q: text,
                target: language
            })
        });
        if (!response.ok) {
            throw new Error('Translation request failed');
        }
        const data = await response.json();
        if (data && data.data && data.data.translations && data.data.translations.length > 0) {
            return data.data.translations[0].translatedText;
        } else {
            throw new Error('Translation data not found');
        }
    }

    function setLanguagePreference(language) {
        localStorage.setItem('selectedLanguage', language);
    }

    function getLanguagePreference() {
        return localStorage.getItem('selectedLanguage') || 'en';
    }

    const darkMode = localStorage.getItem('darkMode');

    function setBackgroundForDarkMode() {
        const body = document.body;
        const headerBg = document.querySelector('.header-bg img');
        const contactSection = document.getElementById('contact');
        const blogSection = document.getElementById('blog');
        const blogInsideSection = document.getElementById('bloginside');

        if (body.classList.contains('dark-mode')) {
            headerBg.src = 'Image/dark2.jpg';
            contactSection.style.backgroundColor = 'black';
            blogSection.style.backgroundColor = 'gray';
            blogInsideSection.style.backgroundColor = 'gray';
        } else {
            headerBg.src = 'Image/bg.jpg';
            contactSection.style.backgroundColor = '';
            blogSection.style.backgroundColor = '';
            blogInsideSection.style.backgroundColor = '';
        }
    }

    const toggleDarkModeButton = document.getElementById('toggle-dark-mode');
    if (darkMode === 'true') {
        toggleDarkModeButton.checked = true;
    }

    if (darkMode === 'true') {
        document.body.classList.add('dark-mode');
    }

    setBackgroundForDarkMode();

    toggleDarkModeButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        setBackgroundForDarkMode();

        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDarkMode ? 'true' : 'false');
    });

    const savedLanguage = getLanguagePreference();
    document.getElementById('languageSelect').value = savedLanguage;

    translatePage(savedLanguage);

    document.getElementById('languageSelect').addEventListener('change', function () {
        const selectedLanguage = this.value;
        setLanguagePreference(selectedLanguage);
        translatePage(selectedLanguage);
    });

    var searchTimeout;

    function searchProducts() {
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {
            var input = document.getElementById("searchInput");
            var searchQuery = input.value.trim();
            var selectedLanguage = getLanguagePreference();

            if (searchQuery !== '') {
                window.location.href = 'search_products.php?search=' + encodeURIComponent(searchQuery) + '&lang=' + encodeURIComponent(selectedLanguage);
            }
        }, 4000);
    }

    function showSearchBar() {
        var searchBar = document.getElementById("productSearch");
        searchBar.style.opacity = "1";
        searchBar.style.pointerEvents = "auto";
    }

    function handleProductClick(productId) {
        const selectedLanguage = getLanguagePreference();
        setLanguagePreference(selectedLanguage);
        window.location.href = `newprod.html?id=${productId}&lang=${selectedLanguage}`;
    }
</script>

<script src="https://code.responsivevoice.org/responsivevoice.js?key=AIzaSyBy7BBULtWvrA8A89XyItUyH1_A6Zq63Fs"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="searchbar.js"></script>
</body>

</html>
