<footer class="site-footer">
    <div class="container">
        <div class="footer-content p-1 flex-col">

            <?php
            $file_name = basename($_SERVER['PHP_SELF']);
            if ($file_name !== 'about.php') {
                echo '<div class="footer-section about">
                <h3 class="footer-title">About Us</h3>
                <p>At Szechuan Restaurant, we pride ourselves on offering the best in traditional and modern Szechuan cuisine. Our menu features a wide variety of dishes made with fresh ingredients and authentic Szechuan spices, ensuring that every bite is bursting with flavor. <br><a href="about.php">Read More</a>
                </p>
            </div>';
            }
            ?>

            <div class="footer-section contact">
                <h3 class="footer-title">Contact Us</h3>
                <ul class="contact-info">
                    <li><span><i class="bi bi-geo-alt"></i></span> 121 Drummond St, Calton VIC Australia</li>
                    <li><span><i class="bi bi-phone"></i></span> +61 (0) 415-1234</li>
                    <li><span><i class="bi bi-envelope"></i></span> szhechuanmelb@hotmail.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Szechuan. All Rights Reserved.</p>
        </div>
    </div>
</footer>

</body>

</html>