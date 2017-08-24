<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();
function get( &$var, $default = null ) {
    return isset($var) ? $var : $default;
}

$category = get_the_category()[0]->slug;
$thumbnail_sizes = array(
    'showcase' => array(800, 600),
    'news' => array(125, 125),
);
$queried_object = get_queried_object();
?>

    <div class="main-wrap" role="main">
        <article class="main-content archive">
            <h1 class="entry-title"><?php single_cat_title(); ?></h1>
            <?php if (have_posts() ) : ?>
                <?php /* Start the Loop */ ?>


                <?php while (have_posts() ) : the_post(); ?>
                    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php /* Showcase and News */ ?>
                        <div class="category-item clearfix">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><a></h3>
                            <?php if ('showcase' !== $category) : ?>
                                <div class="clearfix byline">
                                    <p class="left">
                                        by <?php the_author(); ?>
                                    </p>
                                    <p class="right">
                                        <?php the_date(); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if (has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail-wrapper <?php if ('showcase' !== $category) {
                                    echo 'left';
                                }
                                echo ' ' . $category ?> thumbnail">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), get($thumbnail_sizes[ $category ], array(125, 125))); ?>
                                </div>
                            <?php endif; ?>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; // End have_posts() check. ?>

            <?php /* Display navigation to next/previous pages when applicable */ ?>
            <?php
            if (function_exists('foundationpress_pagination') ) :
                foundationpress_pagination();
            elseif (is_paged() ) :
                ?>
                <nav id="post-nav">
                    <div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'foundationpress')); ?></div>
                    <div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'foundationpress')); ?></div>
                </nav>
            <?php endif; ?>

        </article>
        <?php get_sidebar(); ?>

    </div>

<?php get_footer();
