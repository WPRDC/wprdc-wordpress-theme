<?php
/*
Template Name: Front
*/
get_header(); ?>


    <!-- Get Showcase Posts -->
    <section class="front-hero" role="banner"
             style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/bg.png)">
        <div class="orbit bg-orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-timer-delay="7000"
             data-anim-in-from-right="fade-in" data-anim-out-to-right="fade-out"
             data-anim-in-from-left="fade-in" data-anim-out-to-left="fade-out">
            <div class="orbit-wrapper">
                <div class="orbit-controls">
                    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i class="material-icons">keyboard_arrow_left</i></button>
                    <button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="material-icons">keyboard_arrow_right</i></button>
                </div>
                <ul class="orbit-container">
                    <?php if ($posts = wp_get_recent_posts(array('numberposts' => 4, 'category' => get_cat_ID('showcase')), OBJECT)) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <li class="orbit-slide" id="post-<?php echo $post - ID; ?>"
                                    style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ),url(<?php echo get_the_post_thumbnail_url($post); ?>">
                                    <div class="showcase-info">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <span class="showcase-title"><?php echo $post->post_title; ?></span>
                                            <p>
                                                <span class="showcase-desc"><?php echo wp_trim_words($post->post_content, 12); ?></span>
                                            </p>
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="orbit-slide"
                            style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ),url(<?php echo get_template_directory_uri() ?>/assets/images/bg.png)">
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        <div class="marketing-container">
            <div class="marketing">
                <h1>The Region's Open Data at your Fingertips!</h1>
                <p>Some happy text about how great it is to have all of this open data at your fingertips!</p>
                <?php if ($response = ckan_api_get('action/package_search')) : ?>
                    <p>Search through the
                        <a><?php echo $response->count; ?>
                            dataset<?php echo($response->count > 1 ? 's' : ''); ?></a> available.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>


<?php
# URLS FOR THIS SECTION
$noobs_url = "";
$wizards_url = "";
$publishers_url = "";

$news_url = esc_url(get_category_link(get_cat_ID('news')));
$events_url = home_url('/events/');
$tools_url = 'https://tools.wprdc.org';
$contact_url = home_url('/contact/');

$tutorials_url = home_url('/tutorials/');
$guides_url = '';
$newsletter_signup_url = esc_url(get_option('wprdc_theme_setting_newsletter_signup_url'));
$newsletter_issues_url = esc_url(get_option('wprdc_theme_setting_newsletter_issues_url'));
$news_url = esc_url(get_category_link(get_cat_ID('news')));

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
                            <h3 class="text-center">Data Noobs</h3>
                        </a>
                        <p class="text-center">New to open data, or data in general? Take a look at
                            these <a href="<?php echo $tutorials_url ?>">tutorials</a> to get
                            started down your path of data mastery.</p>
                    </div>

                    <!-- Data Wizards -->
                    <!------------------>
                    <div class="info-box wide">
                        <a class="landing-page-link" href="<?php echo $wizards_url ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/rocket.png"/>
                            <h3 class="text-center">Data Wizards</h3>
                        </a>

                        <p class="text-center">Familiair with open data? See our <a href="<?php echo $api_doc_url ?>">API
                                documentation</a></p>
                    </div>
                    <!-- Publishers -->
                    <!---------------->
                    <div class="info-box wide">
                        <a class="landing-page-link" href="<?php echo $publishers_url ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/blimp.png"/>
                            <h3 class="text-center">Publishers</h3>
                        </a>
                        <p class="text-center">Do you publish open data? Or do you want to? Look at
                            our <a href="#">
                                publisher resources</a>.</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Blog, Newsletter, Events, Twitter -->
        <!--------------------------------------->
        <div class="outreach-container">
            <div class="info-row">
                <!-- Blog -->
                <!---------->
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $news_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/news.png"/>
                        <h3 class="text-center">News</h3>
                    </a>
                    <p class="text-center">Check out our <a
                                href="<?php echo $news_url; ?>">blog</a>, <a
                                href="<?php echo $newsletter_signup_url; ?>">sign
                            up</a> for our newsletter or browse <a
                                href="<?php echo $newsletter_issues_url; ?>">past editions</a>.</p>
                </div>

                <!-- Events -->
                <!------------>
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $events_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/calendar.png"/>
                        <h3 class="text-center">Events</h3>
                    </a>
                    <p class="text-center">Wanna check out some data-related <a
                                href="<? echo $events_url; ?>">happenings</a>? We try to collect them all.</p>
                </div>

                <!-- Tools -->
                <!----------->
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $tools_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/tools.png"/>
                        <h3 class="text-center">Tools</h3>
                    </a>
                    <p class="text-center">We've built <a href="<?php echo $tools_url; ?>"> several
                            tools </a> to help you access data. We also like to show off <a href="">your work</a>.</p>
                </div>


                <!-- Contact -->
                <!------------->
                <div class="info-box ">
                    <a class="landing-page-link" href="<?php echo $wizards_url ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/megaphone2.png"/>
                        <h3 class="text-center">Contact Us</h3>
                    </a>
                    <p class="text-center"><a href="<?php echo $newsletter_signup_url; ?>">Ask
                            us questions</a>
                        or <a href="<?php echo $newsletter_issues_url; ?>">request new data</a>.</p>
                </div>
            </div>
        </div>
    </section>


<?php get_footer();
