<?php
    require_once 'load.php';
   
    $tbl_home = 'tbl_home';
    $getHero = getHero($tbl_home);
    $getTest = getTest($tbl_home);
    $getMap = getHero($tbl_home);
    $getHero2 = getHero2($tbl_home);
    $getHero3 = getHero3($tbl_home);
    $getHero4 = getHero4($tbl_home);
    $getHero5 = getHero5($tbl_home);
    $getHero6 = getHero6($tbl_home);
    $tbl_faq = 'tbl_faq';
    $getFaq = getFaq($tbl_home, $tbl_faq);
?>

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
                <?php while($row = $getHero->fetch(PDO::FETCH_ASSOC)):?>
                <p>
                    <span class="small-txt"><?php echo $row['hero_s_text'];?><br></span>
                    <span class="large-txt"><?php echo $row['hero_l_text'];?></span>
                </p>
                <?php endwhile;?>
            </div>
            
            <div class="hero-img2"><img src="images/blondie_boy3.jpg" alt="blond boy"></div>
            
            <div class="hero-text2">
                <?php while($row = $getHero2->fetch(PDO::FETCH_ASSOC)):?>
                <p>
                    <span class="small-txt"><?php echo $row['hero_s_text'];?><br></span>
                    <span class="large-txt"><?php echo $row['hero_l_text'];?></span>
                </p>
                <?php endwhile;?>
            </div>
            
            <div class="hero-img3"><img src="images/happiness_girl3.jpg" alt="african girl"></div>
            
            <div class="hero-text3">
                <?php while($row = $getHero3->fetch(PDO::FETCH_ASSOC)):?>
                <p>
                    <span class="small-txt"><?php echo $row['hero_s_text'];?><br></span>
                    <span class="large-txt"><?php echo $row['hero_l_text'];?></span>
                </p>
                <?php endwhile;?>
            </div>

            <div class="alt-hero-wrapper">
                <div class="alt-hero-grid">

                    <div class="alt-hero-img1"><img src="images/dark_skin_teenager3.jpg" alt="african boy"></div>
                
                    <div class="alt-hero-text1">
                        <?php while($row = $getHero4->fetch(PDO::FETCH_ASSOC)):?>
                        <p>
                            <span class="small-txt"><?php echo $row['hero_s_text'];?><br></span>
                            <span class="large-txt"><?php echo $row['hero_l_text'];?></span>
                        </p>
                        <?php endwhile;?>
                    </div>

                    <div class="alt-hero-img2"><img src="images/thinking_girl3.jpg" alt="dark haired girl"></div>
                
                    <div class="alt-hero-text2">
                        <?php while($row = $getHero5->fetch(PDO::FETCH_ASSOC)):?>
                        <p>
                            <span class="small-txt"><?php echo $row['hero_s_text'];?><br></span>
                            <span class="large-txt"><?php echo $row['hero_l_text'];?></span>
                        </p>
                        <?php endwhile;?>
                    </div>

                    <div class="alt-hero-img3"><img src="images/curly_haired_girl3.jpg" alt="red haired girl"></div>
                
                    <div class="alt-hero-text3">
                        <?php while($row = $getHero6->fetch(PDO::FETCH_ASSOC)):?>
                        <p>
                            <span class="small-txt"><?php echo $row['hero_s_text'];?><br></span>
                            <span class="large-txt"><?php echo $row['hero_l_text'];?></span>
                        </p>
                        <?php endwhile;?>
                    </div>
                    
                </div>
            </div>
            
    </section>

    <?php while($row = $getHero->fetch(PDO::FETCH_ASSOC)):?>
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
            <h2><?php echo $row['about_heading'];?></h2>
            <ul>
                <li><?php echo $row['about_p'];?></li>
                <li><?php echo $row['about_p_sub'];?> <span><?php echo $row['about_p_highlight'];?></span></li>
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
            <h2><?php echo $row['stories_heading'];?></h2>
            <p><?php echo $row['stories_p'];?></p>
        </div>
    </section>
    <?php endwhile;?>

    
    <section class="h-faq">
        <h2>Frequently Asked Questions</h2>
        <p>Do you have any questions? We can help you find the answers!</p>
            <!-- FAQ component -->
        <!-- <template v-for="card in faqdata"> -->
        <?php while($row = $getFaq->fetch(PDO::FETCH_ASSOC)):?>
            <div class="faq-card">
                <div class="question-card">
                    <img class="card-top" src="images/top_card.svg" alt="top decoration">
                    <h4 class="question"><?php echo $row['question'];?></h4>
                    <div class="minus">-</div>
                    <div class="plus">+</div>
                </div>
                <div class="answer-card hidden">    
                    <p class="answer"><?php echo $row['answer'];?></p>
                    <img class="card-bottom" src="images/bottom_card.svg" alt="bottom decoration">
                </div>
            </div>
        <?php endwhile;?>
        <!-- </template> -->
        <a href="facts.php" class="button">See More</a>
    </section>

    
    <section class="testing">
        <h2>Get Tested</h2>
        <p>Find HIV Testing locations and care services close to you.</p>
        <!-- might add google maps API instead of iframe -->
        <?php while($row = $getMap->fetch(PDO::FETCH_ASSOC)):?>
            <iframe class="map" src="<?php echo $row['map_location'];?>" allowfullscreen=""></iframe>
        <?php endwhile;?>
        <div class="locations-wrapper">
            <?php while($row = $getTest->fetch(PDO::FETCH_ASSOC)):?>
            <div class="location">
                <h3><?php echo $row['test_place'];?></h3>
                <ul>
                    <li><?php echo $row['test_address'];?></li>
                    <li><?php echo $row['test_address_2'];?></li>
                </ul>
            </div>
            <?php endwhile;?>
        </div>
        <p>For more information on where to get tested:</p>
        <a href="https://hivaidsconnection.ca/get-facts/get-tested/where-get-tested" target="_blank" class="testing-link">Go to HIV/AIDS Connections</a>
    </section>
    

    <?php include 'template/footer.php'; ?>
    </main>

    <script defer src="js/main.js"></script>
</body>
</html>