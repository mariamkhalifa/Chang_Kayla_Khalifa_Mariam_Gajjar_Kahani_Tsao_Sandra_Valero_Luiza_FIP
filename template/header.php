<header class="header">
    <h1 class="hidden">Main Navigation</h1>
    <a href="index.php" class="logo">
        <picture>
            <source srcset="images/kin_logo.svg" media="(min-width: 767px)">
            <img src="images/kin_symbol.svg" alt="logo">
        </picture>
    </a>
    <img v-on:click="expandBurger" class="burger" :class="{'rotated':burger.isExpanded}" src="images/burger_menu.svg" alt="burger menu">
    <div class="nav-wrapper" :class="{'visible':burger.isExpanded}">
        <div class="title-close">
            <h3>Keep It Nuetral</h3>
            <p v-on:click="closeBurger" class="close-nav">X</p>
        </div>
        <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="community.php">Facts</a></li>
            <li><a href="community.php">Community</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <ul class="h-social-media">
            <li><a href="#" target="_blank"><img src="images/bl_instagram.svg" alt="instagram"></a></li>
            <li><a href="#" target="_blank"><img src="images/bl_snapchat.svg" alt="snapchat"></a></li>
            <li><a href="#" target="_blank"><img src="images/bl_youtube.svg" alt="youtube"></a></li>
            <li><a href="#" target="_blank"><img src="images/bl_twitter.svg" alt="twitter"></a></li>
        </ul>
    </div>
</header>