<?php include 'template/head.php'; ?>

<title>Keep It Neutral Campaign - Community</title>
</head>

<body>
    <div id="app">
    <h1 class="hidden">Community Page</h1>

    <?php include 'template/header.php'; ?>

    <img class="comm-banner" src="images/banner_symbol3.svg" alt="">
    
    <section class="comm-intro">
        <h2>Find Amazing Events Happening Around You</h2>
        <p>We help you to stay up to date with all the recent amazing events.</p>
    </section>

    <section>
        <h2>Events in London</h2>

        <!-- Database -->
        
        <section class="event">
            <p class="event-date"> 
                <span class="month">April</span> <!-- column -->
                <span class="day">01</span> <!-- column -->
            </p>

            <img class="event-img" src="images/coffee_cups.jpg" alt="coffee cups"> <!-- column -->
            
            <h3 class="event-heading">Coffee Drop-In</h3> <!-- column -->
            
            <p class="event-time">Wednesday Mornings, 10:00 AM - 11:30 AM</p> <!-- column -->
            
            <p class="event-desc">Join us for coffee and support. For people living with HIV.</p> <!-- column -->
            
            <div class="event-location">
                <p>Location:</p>
                <p>RHAC Boardroom, #30-186 King St.</p> <!-- column -->
            </div>
            
            <div class="see-more-info">
                <p>See more information:</p>
                <a href="www.hivaidsconnection.ca/events" target="_blank">www.hivaidsconnection.ca/events</a> <!-- column -->
            </div>

        </section>

    </section>

    <?php include 'template/footer.php'; ?>
    </div>

   <script src="js/main.js" type="module"></script>
</body>
</html>