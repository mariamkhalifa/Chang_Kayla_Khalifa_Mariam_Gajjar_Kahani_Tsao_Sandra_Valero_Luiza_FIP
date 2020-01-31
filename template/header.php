<header class="header">
    <h1 class="hidden">Main Navigation</h1>
    <a class="logo"><img src="images/logo.svg" alt="logo"></a>
    <i v-on:click="expandBurger" class="fa fa-bars"></i>
    <ul class="nav" :class=" {'visible':isExpanded}">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</header>