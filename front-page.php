<?php
/*
Template Name: Front
*/
get_header(); ?>
    <!-- Where the search and showcase will live -->
    <section class="front-hero" role="banner">
        <div class="marketing" data-equalize-on="medium" id="main-panel-eq">
            <div class="search-container">

                <div class="search-comment">
                    <p>You can browse for data by <a>organizations</a> or <a>topic</a> or by using the search bar above!
                    </p>
                    <?php if ($response = ckan_api_get('action/package_search')) : ?>
                        <p>In fact,
                            there <?php echo($response->count > 1 ? 'are' : 'is'); ?> currently
                            <a><?php echo $response->count; ?>
                                dataset<?php echo($response->count > 1 ? 's' : ''); ?></a>, and we're adding more all
                            the time!</p>
                    <?php endif; ?>


                </div>

                <!-- Search bar -->
                <!---------------->
                <div class="searchbar input-group">
                    <input id="main-data-search" class="input-group-field" type="text"
                           placeholder="Search for open data!">
                    <div class="input-group-button">
                        <button type="button" class="button"><i class="material-icons search-icon">&#xE8B6;</i></button>
                    </div>
                </div>
            </div>

            <!-- Showcase Zone -->
            <!------------------->
            <div class="orbit showcase-zone" role="region" aria-label="Showcase" data-orbit data-auto-play="false"
                 data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                <ul class="orbit-container">
                    <?php if ($posts = wp_get_recent_posts(array(
                        'numberposts' => 4,
                        'category' => get_cat_ID('showcase'),
                    ), OBJECT)
                    ) : ?>
                        <?php $slide_count = 0;
                        foreach ($posts as $post) : ?>
                            <?php
                            if (($img_url = get_post_meta($post->ID, 'showcase_img', true))) {
                                # If custom image is set - preferred
                            } elseif (has_post_thumbnail($post)) {
                                # Backup to thumbnail - Ok
                                $img_url = get_the_post_thumbnail_url($post);
                            } else {
                                # Placeholder - don't want this to happen
                                $img_url = "http://via.placeholder.com/400x240";
                            }
                            ?>

                            <li class="<?php if (!$slide_count) {
                                # mark first one as active
                                echo 'is-active ';
                            } ?> orbit-slide">
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <div class="panel-shade">
                                        <div class="showcase-text-container">
                                            <h3> <?php echo get_the_title($post) ?></h3>
                                            <p><?php echo get_the_excerpt($post); ?></p>
                                        </div>
                                    </div>
                                    <div class="panel"
                                         style="background-image: url(<?php echo $img_url; ?>);">
                                    </div>
                                </a>
                            </li>
                            <?php $slide_count++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                <!--                <nav class="orbit-bullets">-->
                <!--                    --><?php //if ($posts = wp_get_recent_posts(array(
                //                        'numberposts' => 4,
                //                        'category' => get_cat_ID('showcase'),
                //                    ), OBJECT)
                //                    ) : ?>
                <!--                        --><?php //$slide_count = 0; ?>
                <!--                        --><?php //foreach ($posts as $post) : ?>
                <!--                            --><?php //if (has_post_thumbnail()) : ?>
                <!---->
                <!--                                <button --><?php //if (!$slide_count) {
                //                                    echo 'class="is-active" ';
                //                                }; ?><!--data-slide=--><?php //echo $slide_count; ?>
                <!--                                    <span class="show-for-sr">First slide details.</span><span-->
                <!--                                            class="show-for-sr"></span></button>-->
                <!--                                --><?php //$slide_count++; ?>
                <!---->
                <!--                            --><?php //endif; ?>
                <!--                        --><?php //endforeach; ?>
                <!--                    --><?php //endif; ?>
                <!--                </nav>-->
            </div>
        </div>
    </section>

    <!-- Guides, Tutorials, Tools -->
    <!------------------------------>
<?php
# URLS FOR THIS SECTION
$tutorials_url = '';
$guides_url = '';
$tools_url = 'https://tools.wprdc.org';
$newsletter_signup_url = esc_url(get_option('wprdc_theme_setting_newsletter_signup_url'));
$newsletter_issues_url = esc_url(get_option('wprdc_theme_setting_newsletter_issues_url'));
$news_url = esc_url(get_category_link(get_cat_ID('news')));
$events_url = 'events';
?>


    <section class="technicalstuff-container">
        <div class="row column medium-10 medium-centered">
            <div class="info-row">
                <!-- Data Noobs -->
                <!---------------->
                <div class="info-box wide">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/scooter.png"/>
                    <h3 class="text-center">Data Noobs</h3>
                    <p class="text-center">New to open data, or data in general? Take a look at
                        these <a href="">tutorials</a> to get
                        started down your path of data mastery.</p>
                </div>

                <!-- Data Wizards -->
                <!------------------>
                <div class="info-box wide">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/rocket.png"/>
                    <h3 class="text-center">Data Wizards</h3>
                    <p class="text-center">Familiair with open data? Check out <a href="#">these
                            guides</a> for data scientists, programmers and all around data wizards.</p>
                </div>
                <!-- Publishers -->
                <!---------------->
                <div class="info-box wide">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/blimp.png"/>
                    <h3 class="text-center">Publishers</h3>
                    <p class="text-center">Do you publish open data? Or do you want to? Look at
                        our <a href="#">
                            publisher resources</a>.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Blog, Newsletter, Events, Twitter -->
    <!--------------------------------------->
    <section class="outreach-container">
        <div class="info-row">
            <!-- Blog -->
            <!---------->
            <div class="info-box ">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/news.png"/>
                <h3 class="text-center">News</h3>
                <p class="text-center">Check out our <a
                            href="<?php echo $news_url; ?>">blog</a>, <a
                            href="<?php echo $newsletter_signup_url; ?>">sign
                        up</a> for our newsletter or browse <a
                            href="<?php echo $newsletter_issues_url; ?>">past editions</a>.</p>
            </div>

            <!-- Events -->
            <!------------>
            <div class="info-box ">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/calendar.png"/>
                <h3 class="text-center">Events</h3>
                <p class="text-center">Wanna check out some data-related <a
                            href="<? echo $events_url; ?>">happenings</a>? We try to collect them all.</p>
            </div>

            <!-- Tools -->
            <!----------->
            <div class="info-box ">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/tools.png"/>
                <h3 class="text-center">Tools</h3>
                <p class="text-center">We've built <a href="<?php echo $tools_url; ?>"> several
                        tools </a> to help you access data. We also like to show off <a href="">your work</a>./p>
            </div>


            <!-- Contact -->
            <!------------->
            <div class="info-box ">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/megaphone2.png"/>
                <h3 class="text-center">Contact Us</h3>
                <p class="text-center"><a href="<?php echo $newsletter_signup_url; ?>">Ask
                        us questions</a>
                    or <a href="<?php echo $newsletter_issues_url; ?>">request new data</a>.</p>
            </div>
        </div>
    </section>

<?php get_footer();
