<?php
/*
Template Name: Front
*/
get_header(); ?>
    <!-- This demo uses flex grid but you can use float grid too -->


    <!-- Where the search and showcase will live -->
    <section class="front-hero" role="banner">
        <div class="marketing" data-equalize-on="medium" id="main-panel-eq">

            <div class="search-zone">

                <!-- Search bar -->
                <!---------------->
                <div class="searchbar input-group">
                    <input id="main-data-search" class="input-group-field" type="text" placeholder="Search for data!">
                    <div class="input-group-button">
                        <button type="button" class="button"><i class="material-icons search-icon">&#xE8B6;</i></button>
                    </div>
                </div>
                <div class="searchbar-comment">
                    <p>You can search a whole bunch of crap: dog's, murders, potholes - and that's just to name a
                        few!</p>
                    <?php if ($response = ckan_api_get('action/package_search')) : ?>
                        <p>In fact,
                            there <?php echo($response->count > 1 ? 'are' : 'is'); ?> currently
                            <b><?php echo $response->count; ?>
                                dataset<?php echo($response->count > 1 ? 's' : ''); ?></b>, and we're adding more all
                            the time!</p>
                    <?php endif; ?>

                    <!-- Data Alert -->
                    <!---------------->
                    <?php if (get_option('wprdc_theme_setting_alert_text')) : ?>
                        <div class="alert-container">
                            <img class="alert-icon"
                                 src="<?php echo get_template_directory_uri() ?>/assets/images/caution.png">
                            <span class="alert-text">
                                <a href="<?php echo get_option('wprdc_theme_setting_alert_url', '#') ?>"
                                   target="_blank"><?php echo stripslashes(get_option('wprdc_theme_setting_alert_text', '')); ?>
                                </a>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Showcase Zone -->
            <!------------------->
            <div class="orbit showcase-zone" role="region" aria-label="Showcase" data-orbit
                 data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                <ul class="orbit-container">
                    <?php if ($posts = wp_get_recent_posts(array(
                        'numberposts' => 4,
                        'category' => get_cat_ID('showcase'),
                    ), OBJECT)
                    ) : ?>
                        <?php $slide_count = 0; ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <li class="<?php if (!$slide_count) {
                                    echo 'is-active ';
                                } ?> orbit-slide">
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <div class="panel"
                                             style="background-image: url(<?php the_post_thumbnail_url() ?>);">
                                            <div class="showcase-title-container">
                                                <span class="showcase-title"><?php echo get_the_title($post->ID); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php $slide_count++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <nav class="orbit-bullets">
                    <?php if ($posts = wp_get_recent_posts(array(
                        'numberposts' => 4,
                        'category' => get_cat_ID('showcase'),
                    ), OBJECT)
                    ) : ?>
                        <?php $slide_count = 0; ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php if (has_post_thumbnail()) : ?>

                                <button <?php if (!$slide_count) {
                                    echo 'class="is-active" ';
                                }; ?>data-slide=<?php echo $slide_count; ?>>
                                    <span class="show-for-sr">First slide details.</span><span
                                            class="show-for-sr"></span></button>
                                <?php $slide_count++; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </section>


    <!-- Sparklines -->
    <!---------------->
    <!--    <section class="sparkline-group-container" style="padding: 10px 0;">-->
    <!--        <div class="row">-->
    <!--            <div class="sparkline-container">-->
    <!--                <p class="sparkline-title">A Sparkline</p>-->
    <!--                <div id="sparkline1"></div>-->
    <!--            </div>-->
    <!--            <div class="sparkline-container">-->
    <!--                <p class="sparkline-title">Another Sparkline</p>-->
    <!--                <div id="sparkline2"></div>-->
    <!--            </div>-->
    <!---->
    <!--            <div class="sparkline-container">-->
    <!--                <p class="sparkline-title">A Longer Sparkline</p>-->
    <!--                <div id="sparkline3"></div>-->
    <!--            </div>-->
    <!---->
    <!--            <div class="sparkline-container">-->
    <!--                <p class="sparkline-title">A Cooler Sparkline</p>-->
    <!--                <div id="sparkline4"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->

    <!-- Guides, Tutorials, Tools -->
    <!------------------------------>
    <section class="technicalstuff-container">
        <div class="info-row">
            <!-- Data Noobs -->
            <div class="tutorials medium-4 columns">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/scooter.png"
                     style="display:block; margin:auto; height:120px;"/>
                <h3 class="text-center" style="font-weight: 600;">Data Noobs</h3>
                <p class="text-center" style="font-size: 14pt;">Take a look at these <a href="">tutorials</a> to get
                    started down your path of data mastery.</p>
            </div>

            <!-- Data Wizards -->
            <div class="stuff medium-4 columns">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/rocket.png"
                     style="display:block; margin:auto;height:120px;"/>
                <h3 class="text-center" style="font-weight: 600;">Data Wizards</h3>
                <p class="text-center" style="font-size: 14pt;">Familiair with open data? Check out <a href="#">these
                        guides</a> for data scientists, programmers and wizards.</p>
            </div>

            <!-- Tools -->
            <div class="tools medium-4 columns">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/tools.png"
                     style="display:block; margin:auto;height:120px;"/>
                <h3 class="text-center" style="font-weight: 600;">Tools</h3>
                <p class="text-center" style="font-size: 14pt;">We've built <a href="https://tools.wprdc.org"> several tools </a> to help you
                    access the
                    data you need.</p>
            </div>
        </div>
    </section>

    <!-- Blog, Newsletter, Events, Twitter -->
    <!--------------------------------------->
    <section class="outreach-container">
        <div class="info-row" data-equalizer="outreach" data-equalize-on="medium" id="outreach-eq">

            <!-- News -->
            <!---------->
            <div class="news medium-3 columns">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/mail.png"
                     style="display:block; margin:auto; height:120px;"/>
                <h3 class="text-center" style="font-weight: 600;">Newsletter</h3>
                <p class="text-center" style="font-size: 14pt;"><a href="">Sign up</a> for our newsletter. Or browse <a
                            href="">past editions</a>.</p>
            </div>

            <!-- Blog -->
            <!---------->
            <div class="blog medium-3 columns">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/news.png"
                     style="display:block; margin:auto; height:120px;"/>
                <h3 class="text-center" style="font-weight: 600;">News</h3>
                <p class="text-center" style="font-size: 14pt;">Bob makes us write <a href="">blog posts</a> about the stuff we do.</p>
            </div>

            <!-- Events -->
            <!------------>
            <div class="events medium-3 columns">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/calendar.png"
                     style="display:block; margin:auto; height:120px;"/>
                <h3 class="text-center" style="font-weight: 600;">Events</h3>
                <p class="text-center" style="font-size: 14pt;">Wanna check out some data-related <a href="">happenings</a>? We've try to collect them all.</p>
            </div>

            <!-- Twitter -->
            <!------------->
            <div class="twitter medium-3 columns">
                <div class="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/barchart.png"
                         style="display:block; margin:auto; height:120px;"/>
                    <h3 class="text-center" style="font-weight: 600;">Showcase</h3>
                    <p class="text-center" style="font-size: 14pt;">Browse all the different
                        <a href="category/showcase">visualizations and tools </a> folks have made with our data.</p>
                </div>
            </div>

        </div>
    </section>

<?php get_footer();
