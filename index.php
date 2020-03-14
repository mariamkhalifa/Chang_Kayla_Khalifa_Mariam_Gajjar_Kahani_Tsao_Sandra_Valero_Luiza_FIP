<?php include 'template/head.php'; ?>

<title>Keep It Neutral Campaign - Home</title>
</head>

<body>
    <main id="app">
    <?php include 'template/header.php'; ?>

    <section class="hero">
    
        <h1 class="hidden">hero</h1>
            
            <div class="hero-img1"><img src="images/asian_girl3.jpg" alt="asian girl"></div>
            
            <div class="hero-text1">
                <p>
                    <span class="small-txt">Have<br></span>
                    <span class="large-txt">Safer<br>Sex</span>
                </p>
            </div>
            
            <div class="hero-img2"><img src="images/blondie_boy3.jpg" alt="blond boy"></div>
            
            <div class="hero-text2">
                <p>
                    <span class="small-txt">What's<br></span>
                    <span class="large-txt">Your<br>Status</span>
                </p>
            </div>
            
            <div class="hero-img3"><img src="images/happiness_girl3.jpg" alt="african girl"></div>
            
            <div class="hero-text3">
                <p>
                    <span class="small-txt">Let's<br></span>
                    <span class="large-txt">Talk</span>
                </p>
            </div>

            <div class="alt-hero-wrapper">
                <div class="alt-hero-grid">

                    <div class="alt-hero-img1"><img src="images/dark_skin_teenager3.jpg" alt="african boy"></div>
                
                    <div class="alt-hero-text1">
                        <p>
                            <span class="small-txt">Take<br></span>
                            <span class="large-txt">PrEp<br></span>
                            <span class="small-txt">or<br></span>
                            <span class="large-txt">PEP</span>
                        </p>
                    </div>

                    <div class="alt-hero-img2"><img src="images/thinking_girl3.jpg" alt="dark haired girl"></div>
                
                    <div class="alt-hero-text2">
                        <p>
                            <span class="small-txt">It's<br></span>
                            <span class="large-txt">Neutral</span>
                        </p>
                    </div>

                    <div class="alt-hero-img3"><img src="images/curly_haired_girl3.jpg" alt="red haired girl"></div>
                
                    <div class="alt-hero-text3">
                        <p>
                            <span class="small-txt">With<br></span>
                            <span class="large-txt">Pride</span>
                        </p>
                    </div>

                </div>
            </div>

    </section>

    <section class="about">
        <div class="about-top">
            <div class="line"></div>
        </div>
        <div class="about-img">
            <picture>
                <source media="(min-width: 598px)" srcset="images/girl7.jpg">
                <img src="images/girl3.jpg" alt="girl">
            </picture>
        </div>
        <div class="about-text">
            <h2>What's HIV Neutral?</h2>
            <ul>
                <li>We at Keep it Neutral want to create a community that openly talks about HIV/AIDS. Our goal is a world that’s “HIV Neutral” — where HIV is no longer transmittable or stigmatized.</li>
                <li>Here you’ll find ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV. <span>Let’s Keep it Neutral.</span></li>
            </ul>
        </div>
    </section>

    <section class="video-section">
        <div class="vid-grid">
            <div class="video-top">
                <div class="line"></div>
            </div>
            <div class="video-wrapper">
                <img class="temp" src="images/temporary_video3.jpg" alt="temporary video">
                <div class="video-icon"><img src="images/play_icon.svg" alt="play video icon"></div>
                <video class="video">
                    <source src="" type="video/mp4">
                </video>
            </div>
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
                    <div v-on:mouseover="revealAnswer" v-else class="plus">+</div>
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
                <h3>Regional HIV/AIDS Connections</h3>
                <ul>
                    <li>186 King St #30</li>
                    <li>London, ON N6A 1C7</li>
                </ul>
            </div>
            <div class="location">
                <h3>London InterCommunity Health Centre</h3>
                <ul>
                    <li>659 Dundas St</li>
                    <li>London, ON N5W 2Z1</li>
                </ul>
            </div>
            <div class="location">
                <h3>Anova</h3>
                <ul>
                    <li>101 Wellingtion Rd</li>
                    <li>London, ON N6C 4M7</li>
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