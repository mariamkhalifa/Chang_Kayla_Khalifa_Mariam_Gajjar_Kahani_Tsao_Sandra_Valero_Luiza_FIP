<?php include 'template/head.php'; ?>

<title>Keep It Neutral Campaign - Contact</title>
</head>

<body>
    <main id ="app">
        <?php include 'template/header.php'; ?>

        <img class="cont-banner" src="images/banner_symbol2.svg" alt="banner symbol">
        <div class="contact-wrapper">
            <section class="contact">
                <h2>Contact Us</h2>
                <p>We’re here to help. Got questions? Want to use stuff from our campaign? Please don’t hesitate to reach out &#9786</p>
            </section>

            <form class="cont-form" action="" method="post">
                <label for="name">Your name</label>
                <input id="name" name="name" type="text" required>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required>
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="tel">
                <label for="msg">Message</label>
                <textarea id="msg" name="msg" type="text"  rows="10" required></textarea>
                <input id="contact-submit" type="submit" value="submit">
            </form>

            <section class="info">
                <h2 class="hidden">Contact info</h2>
                
                <section class="cont-social-media-wrapper">
                    <h3>Social media</h3>
                    <p>Follow us here!</p>
                    <ul class="cont-social-media">
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a><li>
                        <li><a href="#" target="_blank"><i class="fab fa-snapchat"></i></a><li>
                        <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a><li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a><li>
                    </ul>
                    <p>All social media accounts are updated and monitored Monday to Friday from 8 a.m. to 8 p.m. EST/EDT. </p>
                </section>

                <section class="contact-info-wrapper">
                    <h3>Contact information</h3>
                    <div class="info-text">
                        <h4>Address</h4>
                        <p>683 King Street,<br>London, ON,<br>W2C 8QX</p>
                    </div>
                    <div class="info-text">
                        <h4>Phone</h4>
                        <p>519-230-6781</p>
                    </div>
                    <div class="info-text">
                        <h4>Email</h4>
                        <p>support@keepitneutral.ca</p>
                    </div>
                </section>
            </section>
        </div>
    </main>

   <?php include 'template/footer.php'; ?>

   <script defer src="js/main.js"></script>
</body>
</html>