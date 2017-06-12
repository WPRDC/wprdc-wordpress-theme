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
                    <p class="data-alert">
                        <i class="material-icons ">warning</i><span>Holy crap! There's new data!  -- this is where new data alerts go --</span>
                    </p>
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

    <!-- Blog, Newsletter, Events, Twitter -->
    <section class="front-content-container">
        <div class="outreach-stuff" data-equalizer="outreach" data-equalize-on="medium" id="outreach-eq">
            <div class="news medium-3 columns">
                <div class="callout" data-equalizer-watch="outreach">
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
                <div class="callout " data-equalizer-watch="outreach">

                    <i class="logo material-icons">chat_bubble</i>

                    <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
                </div>
            </div>
            <div class="events medium-3 columns">
                <div class="callout" data-equalizer-watch="outreach">

                    <i class="logo material-icons">event</i>
                    <div class="events-orbit" data-orbit="events-orbit">
                        <ul class="orbit-container" data-timer-delay="2000">
                            <?php if ($events = tribe_get_events(array('posts_per_page' => 5, 'start_date' => date('Y-m-d H:i:s')))): ?>
                                <?php foreach ($events as $event) : ?>
                                    <li class="orbit-slide">
                                        <div>
                                            <h5><a href="<?php echo get_permalink($event); ?>"><?php echo $event->post_title; ?></a></h5>
                                            <p><?php echo tribe_get_start_date($event, true, "F j, Y, g:i a"); ?></p>
                                            <p><?php echo wp_trim_words($event->post_content, 20); ?></p>
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
                <div class="callout" data-equalizer-watch="outreach">

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
                </div>
            </div>


            <!-- Guides, Tutorials, Tools -->
            <div class="technical-stuff">
                <div class="tutorials medium-4 columns">
                    <div class="callout">
                        <p class="text-center">Tutorials</p>
                        <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
                    </div>
                </div>
                <div class="tools medium-4 columns">
                    <div class="callout">
                        <p class="text-center">Tools</p>
                        <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
                    </div>

                </div>
                <div class="stuff medium-4 columns">
                    <div class="callout">

                        <p class="text-center">Stuff</p>
                        <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
                    </div>

                </div>
            </div>
    </section>

<?php get_footer();
