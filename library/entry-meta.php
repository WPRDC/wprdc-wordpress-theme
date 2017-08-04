<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if (!function_exists('foundationpress_entry_meta')) :
    function foundationpress_entry_meta()
    {
        /* translators: %1$s: current date, %2$s: current time */
        ?>
        <div class="row byline">
            <div class="medium-6 columns">
                <p class="author">
                    <?php echo __('by', 'foundationpress') ?>
                    <a href="<? phpget_author_posts_url(get_the_author_meta('ID')) ?>" rel="author" class="fn">
                        <?php echo get_the_author() ?>
                    </a>
                </p>
            </div>
            <div class="medium-6 columns">
                <p class="text-right">
                    <time class="updated" datetime="<?php echo get_the_time('c') ?>" ">
                    <?php echo sprintf(__('%1$s', 'foundationpress'), get_the_date()) ?>
                    </time>
                </p>

            </div>


        </div>
        <?php
    }
endif;
?>

