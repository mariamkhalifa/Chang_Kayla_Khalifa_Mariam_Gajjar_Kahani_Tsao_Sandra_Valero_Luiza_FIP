<?php
    require_once 'load.php';
   
    $tbl_commu = 'tbl_community';
    $getEvents = getEvents($tbl_commu);
?>

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
            <!-- <template v-for="event in events"> -->
            <?php while($row = $getEvents->fetch(PDO::FETCH_ASSOC)):?>
                <section class="event-card">
                    <p class="event-date"> 
                        <span class="month"><?php echo $row['e_month'];?></span> <!-- column -->
                        <span class="day"><?php echo $row['e_day'];?></span> <!-- column -->
                    </p>

                    <picture>
                        <source srcset="images/<?php echo $row['e_img'];?>" media="(min-width: 1000px)">
                        <source srcset="images/<?php echo $row['e_img2'];?>" media="(min-width: 500px)">
                        <img class="event-img" src="images/<?php echo $row['e_img'];?>" alt=""> <!-- column -->
                    </picture>

                    <h3 class="event-heading"><?php echo $row['e_heading'];?></h3> <!-- column -->
                    
                    <p class="event-time"><?php echo $row['e_time'];?></p> <!-- column -->
                    
                    <p class="event-desc"><?php echo $row['e_desc'];?></p> <!-- column -->
                    
                    <div class="event-location">
                        <p>Location:</p>
                        <p><?php echo $row['e_location'];?></p> <!-- column -->
                    </div>
                
                    <div class="see-more-info">
                        <p>See more information:</p>
                        <a href="<?php echo $row['e_link'];?>" target="_blank"><?php echo $row['e_link'];?></a> <!-- column -->
                    </div>
                </section>
            <?php endwhile;?>
            <!-- </template> -->
        </div>

    </section>

    <section class="more-community">

        <h2>Join our Community on Instagram</h2>

        <div class="insta-feed">
            <template v-for="feed in instagram">
                <img class="comm-img" :src="'images/' + feed.img"  alt="">
                <div class="quote">
                    <p>{{ feed. quote }}<br><span>-{{ feed.author }}</span></p>
                    <i class="fas fa-quote-right"></i>
                    <img class="quote-logo" src="images/kin_symbol.svg" alt="">
                </div>
            </template>

            <img class="comm-img" src="images/i_girl_thinking.jpg"  alt="">
            
        </div>

        <a href="#" target="_blank" class="button insta-link">More Instagram</a>

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