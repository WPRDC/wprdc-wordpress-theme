<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>


<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content full-width main-wrap') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php foundationpress_entry_meta(); ?>
		</header>

		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
            <?php if (has_tag() ) : ?>
                <span class="tags-title">Tags:</span>
                <ul class="tags-list">
                    <?php the_tags('<li class="tag">', '</li><li class="tag">','</li>'); ?>
                </ul>
            <?php endif; ?>

<!--            <div class="nav-links">-->
<!--                <div class="nav-previous">-->
<!--                        --><?php // previous_post_link('<div class="small-1 columns">&laquo</div><div class="small-11 columns">%link</div>'); ?>
<!--                </div>-->
<!--                <div class="nav-next">-->
<!--                    --><?php // next_post_link('<div class="small-11 columns">%link</div><div class="small-1 columns">&raquo</div>'); ?>
<!--                </div>-->
<!--            </div>-->
		</footer>
        <?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer();
