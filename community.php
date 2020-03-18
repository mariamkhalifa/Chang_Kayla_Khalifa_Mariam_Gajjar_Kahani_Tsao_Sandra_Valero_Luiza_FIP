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
        <p>Stay up to date with all the recent amazing events.</p>
    </section>

    <section class="comm-events">
        <h2>Events in London</h2>

        <!-- Database -->
        <div class="events-grid">
            <template v-for="event in events">

                <section class="event-card">
                    <p class="event-date"> 
                        <span class="month">{{ event.month }}</span> <!-- column -->
                        <span class="day">{{ event.day }}</span> <!-- column -->
                    </p>

                    <img class="event-img" :src="'images/' + event.img" alt=""> <!-- column -->
                    
                    <h3 class="event-heading">{{ event.heading }}</h3> <!-- column -->
                    
                    <p class="event-time">{{ event.time }}</p> <!-- column -->
                    
                    <p class="event-desc">{{ event.desc }}</p> <!-- column -->
                    
                    <div class="event-location">
                        <p>Location:</p>
                        <p>{{ event.location }}</p> <!-- column -->
                    </div>
                
                    <div class="see-more-info">
                        <p>See more information:</p>
                        <a :href="event.link" target="_blank">{{ event.link }}</a> <!-- column -->
                    </div>
                </section>

            </template>
        </div>

    </section>

    <section class="more-community">

        <h2>More Community</h2>

        <div class="insta-feed">
            <img class="comm-img" src="images/i_asian_girl.jpg" alt="asian girl">
            <div class="quote">
                <p>Let us give publicity to HIV/AIDS and not hide it. beacuse that is the only way to make it appear like a normal illness.<br><span>-Nelson Mandela</span></p>
                <i class="fas fa-quote-right"></i>
                <img class="quote-logo" src="images/kin_symbol.svg" alt="">
            </div>

            <img class="comm-img" src="images/i_blondie_teenger.jpg" alt="blond boy">
            <div class="quote">
                <p>It is bad enough that people are dying of AIDS, but no one should die of ignorance.<br><span>-Elizabeth Taylor</span></p>
                <i class="fas fa-quote-right"></i>
            </div>

            <img class="comm-img" src="images/supporters.jpg" alt="supporters">
            <div class="quote">
                <p>HIV does not make people dangerous to know, so you can shake their hands and give them a hug: Heaven knows they need it.<br><span>-Princess Diana</span></p>
                <i class="fas fa-quote-right"></i>
            </div>

            <img class="comm-img" src="images/i_african_american.jpg" alt="african boy">
            <div class="quote">
                <p>I tell you, it’s funny because the only time I think about HIV is when I have to take my medicine twice a day.<br><span>-Magic Johnson</span></p>
                <i class="fas fa-quote-right"></i>
            </div>

            <img class="comm-img" src="images/i_girl_thinking.jpg" alt="thinking girl">
            <div class="quote">
                <p>Education, awareness and prevention are the key, but stigmatisation and exclusion from family is what makes people suffer most.<br><span>-Ralph Fiennes</span></p>
                <i class="fas fa-quote-right"></i>
            </div>

            <img class="comm-img" src="images/group_supporters.jpg" alt="asian girl">
            <div class="quote">
                <p>HIV infection and AIDS is growing- but so too is public apathy. We have already lost too many friends and collegues.<br><span>-David Geffen</span></p>
                <i class="fas fa-quote-right"></i>
            </div>

            <img class="comm-img" src="images/high_school_teenagers.jpg" alt="friends">
            
            <img class="comm-img" src="images/fun_teenagers.jpg" alt="teens cheering">

            <img class="comm-img" src="images/girls.jpg" alt="girls">
        </div>

        <a href="#" target="_blank" class="button">See More Instagram</a>

    </section>

    <section class="share-story">
        <h2>Share Your Story</h2>
        <p>We provide people living with HIV and their close ones with the opportunity to share their life changing stories with Canada and the world. We respect your privacy. Your story can be submitted anonymously.</p>

        <form class="story-form" action="" method="post">
            <img class="top-form" src="images/top_card.svg" alt="">
            <label for="story">What's Your Story?</label>
            <textarea id="story" name="story" rows="11" placeholder="My story is..." required></textarea>
            <input class="button" type="submit" value="Submit">
            <img class="bottom-form" src="images/bottom_card.svg" alt="">
        </form>
    </section>

    <section class="comm-help">
        <h2>Helplines and Anonymous Services for HIV</h2>
        <p>Peer-to-peer support group for individuals or family living with HIV, newly diagnosed to long-term survivors.</p>
        <img class="help-icon" src="images/contact.svg" alt="contact icon">
        <p class="help-small-text">Contact to Regional HIV/AIDS Connection</p>
        <a class="help-link" href="www.hivaidsconnection.ca/contact" target="_blank">www.hivaidsconnection.ca/contact</a>
    </section>

    <?php include 'template/footer.php'; ?>
    </div>

   <script src="js/main.js" type="module"></script>
</body>
</html>