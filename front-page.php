<?php
/*
Template Name: Front
*/
get_header(); ?>

    <!-- Where the search and showcase will live -->
    <section class="front-hero" role="banner">
        <div class="marketing" data-equalizer data-equalize-on="medium" id="main-panel-eq">

            <div class="search-zone" data-equalizer-watch>
                <!-- Search bar -->
                <div class="searchbar input-group">
                    <input id="main-data-search" class="input-group-field" type="text" placeholder="Search for data!">
                    <div class="input-group-button">
                        <button type="button" class="button"><i class="material-icons search-icon">&#xE8B6;</i></button>
                    </div>
                </div>

            </div>

            <div class="showcase-zone" data-equalizer-watch>
                <!-- Showcase -->
                <div class="showcase-holder ">
                    <img src="http://placehold.it/480x320" style="display:block; margin:auto;"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog, Newsletter, Events, Twitter -->
    <section class="outreach-stuff">
        <div class="news medium-3 columns">
            <div class="callout">
                <p class="text-center">News</p>
                <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
            </div>
        </div>
        <div class="blog medium-3 columns">
            <div class="callout ">

                <p class="text-center">Blog</p>

                <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
            </div>
        </div>
        <div class="events medium-3 columns">
            <div class="callout">

                <p class="text-center">Events</p>

                <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
            </div>
        </div>
        <div class="twitter medium-3 columns">
            <div class="callout">

                <p class="text-center">Twitter</p>

                <img src="http://placehold.it/200x120" style="display:block; margin:auto;"/>
            </div>
        </div>
    </section>

    <div class="section-divider">
        <hr/>
    </div>

    <!-- Guides, Tutorials, Tools -->
    <section class="technical-stuff">
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
    </section>

<?php get_footer();
