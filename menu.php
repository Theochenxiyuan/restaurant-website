<?php
$title = "Menu";
require_once('sections/header.php');
?>


<div class="item-details">
    <div class="detail-content">

    </div>
    <button class="close">Back</button>

</div>
<main class="my-2 p-1">
    <div class="container">
        <div class="category shadow">
            <ul class="category-group">
                <li class="active-category">All</li>
                <li>Meat dishes</li>
                <li>Vegetable dishes</li>
                <li>Seafood</li>
                <li>Rice and noodles</li>
                <li>Soups</li>
                <li>Other</li>
                <div class="expand-btn"><i class="bi bi-chevron-compact-down"></i></div>
            </ul>
        </div>
        <div class="menu-group grid my-2">
            <div class="menu-item" data-category="riceandnoodles">
                <img class="item-picture" src="img/food/dandannoodle.png" alt="dan dan noodle picture">
                <div class="item-name">dan dan noodle</div>
                <div class="item-price">$20</div>
                <div class="item-desc">
                    Dan Dan noodle is a popular Chinese dish that typically consists of egg noodles served in a spicy sauce made from chili oil, Sichuan peppercorns, soy sauce, and other seasonings. The dish is usually topped with minced pork, scallions, and peanuts, and sometimes includes vegetables like bok choy or bean sprouts. The name "dan dan" refers to the bamboo pole that street vendors traditionally used to carry the noodles and sauce on their backs. Dan dan noodle is known for its complex and bold flavors, and is a favorite among spicy food lovers.
                </div>
            </div>
            <div class="menu-item" data-category="other">
                <img class="item-picture" src="img/food/spicywonton.png" alt="spicy wonton picture">
                <div class="item-name">spicy wonton</div>
                <div class="item-price">$18</div>
                <div class="item-desc">
                    Spicy wontons are a type of Chinese dumpling that are typically filled with seasoned ground pork and served in a spicy chili oil sauce. The wonton wrappers are folded into a small triangle shape, with the filling sealed inside. The spicy sauce is made from a blend of chili oil, soy sauce, sesame oil, garlic, and other seasonings, giving the dish a fiery kick. Spicy wontons can be served as an appetizer or as part of a larger meal, and are a popular dish in Sichuan and other regions of China.
                </div>
            </div>
            <div class="menu-item" data-category="vegetabledishes">
                <img class="item-picture" src="img/food/sichuaneggplant.png" alt="sichuan eggplant picture">
                <div class="item-name">sichuan eggplant</div>
                <div class="item-price">$18</div>
                <div class="item-desc">
                    Sichuan eggplant, also known as "fish-fragrant eggplant" or "Yu Xiang Qie Zi" in Mandarin, is a classic dish from the Sichuan province of China. It is made with eggplant that is first fried until crispy, then stir-fried with a spicy, tangy sauce made with chili bean paste, garlic, ginger, vinegar, soy sauce, and sugar. The sauce is known as "fish-fragrant" because it is a flavor profile that is typically used in fish dishes, but in this case, it is used to season the eggplant. The dish is often garnished with scallions and cilantro and served with steamed rice. Sichuan eggplant is known for its complex and bold flavors, combining sweetness, sourness, spiciness, and umami in one dish.
                </div>
            </div>
            <div class="menu-item" data-category="soups">
                <img class="item-picture" src="img/food/hotandsoursoup.png" alt="hot and sour soup picture">
                <div class="item-name">hot and sour soup</div>
                <div class="item-price">$15</div>
                <div class="item-desc">
                    Hot and sour soup is a traditional Chinese soup that is typically made with chicken or pork broth, black fungus, bamboo shoots, tofu, vinegar, soy sauce, chili oil, and other seasonings. The soup gets its name from its distinct flavor profile, which is both spicy and tangy. It is often garnished with scallions, cilantro, and a beaten egg, which creates a silky texture throughout the soup. The soup is commonly served as a starter or as part of a larger meal, and is known for its ability to warm you up and clear your sinuses due to the spicy and acidic flavors. Hot and sour soup is a popular dish in many Chinese restaurants around the world.
                </div>
            </div>
            <div class="menu-item" data-category="seafood">
                <img class="item-picture" src="img/food/kungpaoshrimp.png" alt="kung pao shrimp picture">
                <div class="item-name">kung pao shrimp</div>
                <div class="item-price">$29</div>
                <div class="item-desc">
                    Kung pao shrimp is a popular dish in Chinese cuisine that is typically made with fresh shrimp that is stir-fried with vegetables, peanuts, and a spicy sauce made from soy sauce, vinegar, sugar, and chili peppers. The dish originates from the Sichuan province of China and is known for its bold and complex flavors, combining sweet, salty, spicy, and sour notes. The sauce is typically thickened with cornstarch and garnished with scallions and sesame seeds. Kung pao shrimp is often served with steamed rice and is a favorite among those who enjoy spicy food. It is a staple in many Chinese restaurants around the world and is a classic dish in Chinese-American cuisine.
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('sections/footer.php') ?>