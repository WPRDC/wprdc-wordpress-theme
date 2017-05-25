<?php
/*
Template Name: Front
*/
get_header(); ?>

    <!-- Where the search and showcase will live -->
    <header class="front-hero" role="banner">
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
    </header>

    <!-- Blog, Newsletter, Events, Twitter -->
    <section class="outreach-stuff">

    </section>

    <div class="section-divider">
        <hr/>
    </div>

    <!-- Guides, Tutorials, Tools -->
    <section class="technical-stuff">
        <p> this is a change!</p>
    </section>

<?php get_footer();
