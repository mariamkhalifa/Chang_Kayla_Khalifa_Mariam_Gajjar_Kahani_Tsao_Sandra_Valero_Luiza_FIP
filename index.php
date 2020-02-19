<?php include 'template/head.php'; ?>

<title>Keep It Neutral Campaign - Home</title>
</head>

<body>
    <main id="app">
    <?php include 'template/header.php'; ?>

    <section class="hero">
        <h1 class="hidden">hero</h1>
        <div class="hero-img"></div>
        <div class="hero-text">
            <h2>Have</h2>
            <h1>Safer Sex</h1>
        </div>
    </section>

    <section class="about">
        <div class="about-header">
            <div class="line"></div>
        </div>
        <img src="images/girl3.jpg">
        <h1>HIV Neutral</h1>
        <ul>
            <li>Keep it Neutral is designed to help people have open, healthy, and thoughtful conversations about HIV and AIDS. We envision a world that’s “HIV Neutral” -- where HIV is no longer transmittable or stigmatized.</li>
            <li>We bring you ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV. Let’s Keep it Neutral.</li>
        </ul>
    </section>

    <section class="about">
        <div class="about-header">
            <div class="line"></div>
        </div>
        <div class="video-wrapper">
            <img class="video-icon" src="images/play_icon.svg" alt="play video icon">
            <video class="video">
                <source src="" type="video/mp4">
            </video>
        <h1>Stories of HIV/AIDS</h1>
        <p>Be the one who shares a story. Start the big change now.</p>
    </section>

    <section class="h-faq">
        <h1>Frequently Asked Questions</h1>
        <p>Do you have any questions? We help you find the answers!</p>
        <div>
            <!-- FAQ component -->        
        </div>
        <a href="facts.php">See More</a>
    </section>

    <section class="testing">
        <h1>Get Tested</h1>
        <p>Find HIV Testing locations and care services close to you.</p>
        <div class="locations-wrapper">
            <div class="location">
                <h4>Regional HIV/AIDS Connections</h4>
                <ul>
                    <li>186 King St #30</li>
                    <li>London, ON N6A 1C7</li>
                </ul>
            </div>
            <div class="location">
                <h4>London InterCommunity Health Centre</h4>
                <ul>
                    <li>659 Dundas St</li>
                    <li>London, ON N5W 2Z1</li>
                </ul>
            </div>
            <div class="location">
                <h4>Anova</h4>
                <ul>
                    <li>101 Wellingtion Rd</li>
                    <li>London, ON N6C 4M7</li>
                </ul>
            </div>
        </div>
        <p>For more information on where to get tested:</p>
        <a href="" target="_blank">Go to HIV/AIDS Connections</a>
    </section>

    <?php include 'template/footer.php'; ?>
    </main>

    <script defer src="js/main.js"></script>
</body>
</html>