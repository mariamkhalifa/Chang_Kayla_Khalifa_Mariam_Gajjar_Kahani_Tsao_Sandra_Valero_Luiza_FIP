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
        <div class="about-top">
            <div class="line"></div>
        </div>
        <img src="images/girl3.jpg">
        <div class="about-text">
            <h2>HIV Neutral</h2>
            <ul>
                <li>Keep it Neutral is designed to help people have open, healthy, and thoughtful conversations about HIV and AIDS. We envision a world that’s “HIV Neutral” -- where HIV is no longer transmittable or stigmatized.</li>
                <li>We bring you ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV. Let’s Keep it Neutral.</li>
            </ul>
        </div>
    </section>

    <section class="video-section">
        <div class="video-top">
            <div class="line"></div>
        </div>
        <div class="video-wrapper">
            <img class="video-icon" src="images/play_icon.svg" alt="play video icon">
            <video class="video">
                <source src="" type="video/mp4">
            </video>
        </div>
        <div class="video-text">
            <h2>Stories of HIV/AIDS</h2>
            <p>Start by listening to real stories from people who speak openly about their experience with HIV/AIDS.</p>
        </div>
    </section>

    <section class="h-faq">
        <h2>Frequently Asked Questions</h2>
        <p>Do you have any questions? We can help you find the answers!</p>
            <!-- FAQ component -->
        <template v-for="card in faqdata">
            <div class="faq-card">
                <div class="question-card">
                    <img class="card-top" src="images/top_card.svg" alt="top decoration">
                    <h4 class="question">{{ card.question }}</h4>
                    <div v-on:click="revealAnswer" v-if="plus.revealed" class="minus">-</div>
                    <div v-on:click="revealAnswer" v-else class="plus">+</div>
                </div>
                <div class="answer-card" :class="{'revealed':plus.revealed}">    
                    <p class="answer">{{ card.answer }}</p>
                    <img class="card-bottom" src="images/bottom_card.svg" alt="bottom decoration">
                </div>
            </div>
        </template>
        <a href="facts.php" class="button">See More</a>
    </section>

    <section class="testing">
        <h2>Get Tested</h2>
        <p>Find HIV Testing locations and care services close to you.</p>
        <!-- might add google maps API instead of iframe -->
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2918.769633654516!2d-81.25054408514464!3d42.98312610351882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882ef21cf012e81d%3A0xc2124c8409950117!2s186%20King%20St%2C%20London%2C%20ON%20N6A%201C7!5e0!3m2!1sen!2sca!4v1582313402657!5m2!1sen!2sca" allowfullscreen=""></iframe>
        <div class="locations-wrapper">
            <div class="location">
                <h4>Regional HIV/AIDS Connections</h4>
                <ul>
                    <li>186 King St #30</li>
                    <li>London, ON <br>N6A 1C7</li>
                </ul>
            </div>
            <div class="location">
                <h4>London InterCommunity Health Centre</h4>
                <ul>
                    <li>659 Dundas St</li>
                    <li>London, ON <br>N5W 2Z1</li>
                </ul>
            </div>
            <div class="location">
                <h4>Anova</h4>
                <ul>
                    <li>101 Wellingtion Rd</li>
                    <li>London, ON <br>N6C 4M7</li>
                </ul>
            </div>
        </div>
        <p>For more information on where to get tested:</p>
        <a href="https://hivaidsconnection.ca/get-facts/get-tested/where-get-tested" target="_blank" class="testing-link">Go to HIV/AIDS Connections</a>
    </section>

    <?php include 'template/footer.php'; ?>
    </main>

    <script defer src="js/main.js"></script>
</body>
</html>