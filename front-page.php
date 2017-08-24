<?php
/*
Template Name: Front
*/
get_header(); ?>


    <!-- Get Showcase Posts -->
    <section class="front-hero" role="banner"
             style="background-image: url(<?php echo esc_url(get_option('wprdc_theme_setting_mobile_hero_image')) ?> ">
        <div class="orbit bg-orbit" role="region" aria-label="Favorite Space Pictures" data-orbit
             data-timer-delay="7000"
             data-anim-in-from-right="fade-in" data-anim-out-to-right="fade-out"
             data-anim-in-from-left="fade-in" data-anim-out-to-left="fade-out">
            <div class="orbit-wrapper">
                <div class="orbit-controls">
                    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i
                                class="material-icons">keyboard_arrow_left</i></button>
                    <button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="material-icons">keyboard_arrow_right</i>
                    </button>
                </div>
                <ul class="orbit-container">
                    <?php if ($posts = wp_get_recent_posts(array('numberposts' => 5, 'category' => get_cat_ID('showcase')), OBJECT)) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <li class="orbit-slide" id="post-<?php echo $post - ID; ?>"
                                    style="background: linear-gradient( rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.8) ),url(<?php echo get_the_post_thumbnail_url($post); ?>);
                                            background-size: cover;">
                                    <div class="showcase-info">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <span class="showcase-title"><?php echo $post->post_title; ?></span>
                                            <p>
                                                <span class="showcase-desc"><?php echo wp_trim_words($post->post_content, 20); ?></span>
                                            </p>
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="orbit-slide"
                            style="background: linear-gradient( rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.8) ),url(<?php echo get_template_directory_uri() ?>/assets/images/bg.png)">
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        <div class="marketing-container">
            <div class="marketing">
                <h1><?php echo bloginfo('description') ?></h1>
                <?php if ($response = ckan_api_get('action/package_search')) : ?>
                    <p>Now serving <?php echo $response->count; ?>
                        dataset<?php echo($response->count > 1 ? 's' : ''); ?>  and counting.</p>
                <?php endif; ?>
                <a href="https://data.wprdc.org" class="button large browse-button">Browse the Data!</a>

            </div>
        </div>
    </section>


<?php
# URLS FOR THIS SECTION
$noobs_url = home_url('/beginners/');
$wizards_url = home_url('/data-wizards/');
$publishers_url = home_url('/publishers/');

$news_url = esc_url(get_category_link(get_cat_ID('news')));
$events_url = home_url('/events/list/');
$tools_url = 'https://tools.wprdc.org';
$contact_url = home_url('/contact/');

$beginners_url = home_url('/beginners/');
$guides_url = '';
$newsletter_signup_url = esc_url(get_option('wprdc_theme_setting_newsletter_signup_url'));
$newsletter_issues_url = esc_url(get_option('wprdc_theme_setting_newsletter_issues_url'));
$news_url = esc_url(get_category_link(get_cat_ID('news')));
$twitter_url = "https://www.twitter.com/WPRDC";
$request_url = ckan_url($url = 'datarequest');

?>
    <!-- Guides, Tutorials, Tools -->
    <!------------------------------>
    <section class="info-container">
        <div class="usercategories-container">
            <div class="row column medium-10 medium-centered">
                <div class="info-row">
                    <!-- Data Noobs -->
                    <!---------------->
                    <div class="info-box wide">
                        <a class="landing-page-link" href="<?php echo $noobs_url ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/scooter.png"/>
                            <h3 class="text-center">Data Beginners</h3>
                        </a>
                        <p class="text-center">New to open data, and looking to build your skills? We have
                            <a href="<?php echo $beginners_url ?>">tutorials and other resources</a> that will help you
                            get started.
                        </p>
                    </div>

                    <!-- Data Wizards -->
                    <!------------------>
                    <div class="info-box wide">
                        <a class="landing-page-link" href="<?php echo $wizards_url ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/rocket.png"/>
                            <h3 class="text-center">Data Wizards</h3>
                        </a>

                        <p class="text-center">Are you an experienced data user and looking to get the most out of open
                            data? Check out our <a href="<?php echo $wizards_url ?>">FAQ’s, API
                                documentation, and other resources</a>.</p>
                    </div>
                    <!-- Publishers -->
                    <!---------------->
                    <div class="info-box wide">
                        <a class="landing-page-link" href="<?php echo $publishers_url ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/blimp.png"/>
                            <h3 class="text-center">Publishers</h3>
                        </a>
                        <p class="text-center">Do you already publish open data, or are you interested in becoming a
                            publisher? We have assembled <a href="<?php echo $publishers_url ?>">
                                everything you need to know </a>in one place.</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Blog, Newsletter, Events, Twitter -->
        <!--------------------------------------->
        <div class="outreach-container">
            <div class="info-row">
                <!-- News -->
                <!---------->
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $news_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/news.png"/>
                        <h3 class="text-center">News</h3>
                    </a>
                    <p class="text-center"><a href="<?php echo $newsletter_issues_url; ?>">Read</a> and <a
                                href="<?php echo $newsletter_signup_url; ?>">subcribe to</a> our newsletter, view our <a
                                href="<?php echo $news_url; ?>">blog posts</a>, and visit us on <a
                                href="<?php echo $twitter_url; ?>"> Twitter</a>.
                    </p>
                </div>

                <!-- Events -->
                <!------------>
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $events_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/calendar.png"/>
                        <h3 class="text-center">Events</h3>
                    </a>
                    <p class="text-center">We maintain a <a
                                href="<? echo $events_url; ?>">calendar</a>? of civic technology
                        and open data events, trainings, workshops, talks, and activities offered by us and a number of
                        partners.</p>
                </div>

                <!-- Tools -->
                <!----------->
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $tools_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/tools.png"/>
                        <h3 class="text-center">Tools</h3>
                    </a>
                    <p class="text-center">Take a look at our growing <a href="<?php echo $tools_url; ?>">collection of
                            tools</a>
                        designed to help you visualize, access, and manipulate data.</p>
                </div>


                <!-- Contact -->
                <!------------->
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $wizards_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/megaphone2.png"/>
                        <h3 class="text-center">Contact Us</h3>
                    </a>
                    <p class="text-center">Please let us know <a href="<?php echo $contact_url; ?>">let us know</a> if
                        you have a question or want to share your work with us. We can also help you make a<a
                                href="<?php echo $request_url; ?>">data request</a>.</p>
                </div>
            </div>
        </div>
    </section>


<?php get_footer();
