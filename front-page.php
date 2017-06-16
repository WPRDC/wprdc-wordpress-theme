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
                        few</p>
                    <?php if ($response = ckan_api_get("action/package_search")) : ?>
                        <p>In fact,
                            there <?php echo($response->count > 1 ? 'are' : 'is'); ?> currently
                            <b><?php echo $response->count; ?>
                                dataset<?php echo($response->count > 1 ? 's' : ''); ?></b>, and we're adding more all
                            the time!</p>
                    <?php endif; ?>

                    <!-- Data Alert -->
                    <!---------------->
                    <?php if(get_option('wprdc_theme_setting_alert_text')):?>
                    <p class="data-alert">
                        <i class="material-icons ">warning</i>
                        <a href="<?php echo get_option('wprdc_theme_setting_alert_url', '#') ?>" target="_blank">
                            <span><?php echo stripslashes(get_option('wprdc_theme_setting_alert_text', '')); ?></span>
                        </a>
                    </p>
                    <?php endif;?>
                </div>
            </div>

            <!-- Showcase Zone -->
            <!------------------->
            <div class="orbit showcase-zone" role="region" aria-label="Showcase" data-orbit
                 data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                <ul class="orbit-container">
                    <?php if ($posts = wp_get_recent_posts(array('numberposts' => 4, 'category' => get_cat_ID('showcase')), OBJECT)) : ?>
                        <?php $slide_count = 0; ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <li class="<?php if (!$slide_count) echo 'is-active '; ?> orbit-slide">
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <div  class="panel"
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
                    <?php if ($posts = wp_get_recent_posts(array('numberposts' => 4, 'category' => get_cat_ID('showcase')), OBJECT)) : ?>
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

    <section class="section-divider-container" style="padding: 10px 0;">
        <div class="section-divider" >
            <img height="30px" width="1200px" src="<?php echo get_template_directory_uri()?>/assets/images/sparkline.png"/>
        </div>
        <div id="ticker"></div>
    </section>

    <!-- Guides, Tutorials, Tools -->
    <section class="technical">
        <div class="technical-stuff">
            <div class="tutorials medium-4 columns">
                <div class="">
                    <img src="http://s2.quickmeme.com/img/8c/8ce42182fbd5ac09a617ac2a62942a56fdf47ccc978eb78b7eda81187b9b8cf0.jpg"
                         style="display:block; margin:auto; height:120px;"/>
                    <h3 class="text-center" style="font-weight: 600;">Data Noobs</h3>
                    <p class="text-center" style="font-size: 14pt;">Here's some stuff about things. Relly cool things
                        doncha know.</p>
                </div>
            </div>

            <div class="stuff medium-4 columns">
                <div class="">
                    <img src="https://ih1.redbubble.net/image.336794630.9839/st%2Csmall%2C215x235-pad%2C210x230%2Cf8f8f8.lite-1u4.jpg"
                         style="display:block; margin:auto;height:120px;"/>
                    <h3 class="text-center" style="font-weight: 600;">Data Wizards</h3>
                    <p class="text-center" style="font-size: 14pt;">Here's some stuff about things. Relly cool things
                        dadfasdfasdf asd faoncha know.</p>
                </div>

            </div>
            <div class="tools medium-4 columns">
                <div class="">
                    <img src="https://static.wixstatic.com/media/38eabc_65b5fc3cada942848c335df1b2f2cbcb~mv2.png/v1/fill/w_190,h_190,al_c,lg_1/38eabc_65b5fc3cada942848c335df1b2f2cbcb~mv2.png"
                         style="display:block; margin:auto;height:120px;"/>
                    <h3 class="text-center" style="font-weight: 600;">Tools</h3>
                    <p class="text-center" style="font-size: 14pt;">Here's some stuff abf gsdfgsdf gout things. Relly
                        cool things doncha know.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="outreach-container">

        <!-- Blog, Newsletter, Events, Twitter -->
        <div class="outreach-stuff" data-equalizer="outreach" data-equalize-on="medium" id="outreach-eq">
            <div class="news medium-3 columns">
                <div class="" data-equalizer-watch="outreach">
                    <i class="logo material-icons">markunread_mailbox</i>
                    <?php if ($posts = wp_get_recent_posts(array('post_status' => 'publish', 'numberposts' => 3, 'category__not_in' => get_cat_ID('showcase')), OBJECT)) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <div class="post-line">
                                <p>
                                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                                </p>
                            </div>
                        <?php endforeach; ?>
                        <div class="post-line">
                            <p><a href="<?php # echo get_category_link(get_category_by_slug( 'news' )->term_id);?>">More...</a>
                            </p>
                        </div>
                    <?php else : ?>
                        <div id="no-posts">
                            <p>Nothing has been posted yet.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="blog medium-3 columns">
                <div class=" " data-equalizer-watch="outreach">

                    <i class="logo material-icons">chat_bubble</i>

                    <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
                </div>
            </div>
            <div class="events medium-3 columns">
                <div class="" data-equalizer-watch="outreach">

                    <i class="logo material-icons">event</i>
                    <div class="events-orbit" data-orbit="events-orbit">
                        <ul class="orbit-container" data-timer-delay="2000">
                            <?php if ($events = tribe_get_events(array('posts_per_page' => 5, 'start_date' => date('Y-m-d H:i:s')))): ?>
                                <?php foreach ($events as $event) : ?>
                                    <li class="orbit-slide">
                                        <div class="event">
                                            <p class="event-title"><a
                                                        href="<?php echo get_permalink($event); ?>"><?php echo $event->post_title; ?></a>
                                            </>
                                            <p class="event-date"><?php echo tribe_get_start_date($event, true, "F j, Y, g:i a"); ?></p>
                                            <p class="event-description"><?php echo wp_trim_words($event->post_content, 20); ?></p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li><p>An issue has occurred retrieving the latest events.</p></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="twitter medium-3 columns">
                <div class="" data-equalizer-watch="outreach">

                    <i class="logo icon ion-social-twitter"></i>
                    <div class="tweets-orbit" data-orbit="tweets-orbit">
                        <ul class="orbit-container" data-timer-delay="1000">
                            <?php if ($tweets = Twitter::getTweets()) : ?>
                                <?php foreach ($tweets as $tweet) : ?>
                                    <li class="orbit-slide">
                                        <div>
                                            <p><?php echo $tweet; ?></p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li><p>An issue has occurred retrieving the latest tweets.</p></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <p class="bottom-note">
                        <a href="https://twitter.com/<?php echo get_option('wprdc_theme_setting_twitter', 'WPRDC'); ?>"
                           target="_blank">
                            Follow <?php echo get_option('wprdc_theme_setting_twitter', 'WPRDC'); ?>
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </section>
    <style>
        .sparkline {
            fill: none;
            stroke: #000;
            stroke-width: 0.5px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>
    <script>
        var width = 100;
        var height = 25;
        var x = d3.scale.linear().range([0, width]);
        var y = d3.scale.linear().range([height, 0]);
        var parseDate = d3.time.format("%b %d, %Y").parse;
        var line = d3.svg.line()
            .x(function(d) { return x(d.date); })
            .y(function(d) { return y(d.close); });

        function sparkline(elemId, data) {
            data.forEach(function(d) {
                d.date = parseDate(d.Date);
                d.close = +d.Close;
            });
            x.domain(d3.extent(data, function(d) { return d.date; }));
            y.domain(d3.extent(data, function(d) { return d.close; }));

            d3.select(elemId)
                .append('svg')
                .attr('width', width)
                .attr('height', height)
                .append('path')
                .datum(data)
                .attr('class', 'sparkline')
                .attr('d', line);
        }

        sparkline('#spark_goog', [{1: 2, 2: 5, 3: 15}]);
    </script>


<?php get_footer();
