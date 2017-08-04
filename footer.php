<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

</section>
<div id="footer" class="footer-container" data-sticky-footer>
    <footer class="footer">
        <?php do_action('foundationpress_before_footer'); ?>
        <?php dynamic_sidebar('footer-widgets'); ?>
        <div class="medium-3 columns logo-container">
            <img class="big-logo" src="<?php echo get_template_directory_uri() ?>/assets/images/plain_logo_rbg_cropped.svg">
            <ul class="quick-links">
                <li><a class="yellow" href="about">About</a></li>
                <li><a class="yellow" href="contact">Contact Us</a></li>
                <li><a class="yellow" href="terms">Terms</a></li>
                <li><a class="yellow" href="privacy">Privacy</a></li>
            </ul>
        </div>
        <div class="medium-9  columns">
            <p>The Western Pennsylvania Regional Data Center supports key community initiatives by making public
                information easier to find and use. The Data Center provides a technological and legal
                infrastructure for data sharing to support a growing ecosystem of data providers and data users.
                The Data Center maintains Allegheny County and the City of Pittsburgh’s open data portal, and
                provides a number of services to data publishers and users. The Data Center also hosts datasets
                from these and other public sector agencies, academic institutions, and non-profit
                organizations. The Data Center is managed by the University of Pittsburgh’s Center for Social
                and Urban Research, and is a partnership of the University, Allegheny County and the City of
                Pittsburgh.</p>
        </div>
        <?php do_action('foundationpress_after_footer'); ?>
    </footer>

    <div class="subfooter">
        <p class="text-center" style="margin: 0">&copy; 2017 University of Pittsburgh, UCSUR, Western Pennsylvania Regional Data Center</p>
    </div>
</div>


<?php do_action('foundationpress_layout_end'); ?>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
    </div><!-- Close off-canvas content -->
    </div><!-- Close off-canvas wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action('foundationpress_before_closing_body'); ?>
</body>
</html>
