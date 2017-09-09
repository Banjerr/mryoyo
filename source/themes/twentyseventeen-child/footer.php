<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

    <button onclick="openContactLightbox();" class="fab-btn hvr-rectangle-in hvr-float-shadow">
      Get In Touch! <i class="fa fa-envelope-o"></i>
    </button>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->

<div class="lightboxBG" onclick="closeContactLightbox();"></div>
<div class="lightbox">
  <button class="closeBtn" onclick="closeContactLightbox();"><i class="fa fa-times"></i></button>
  <div class="wrap">
    <h2 style="text-align: center; display: block;" class="bioRhyme">Just Say "YO"!</h2>
    <?php echo do_shortcode('[contact-form-7 id="59" title="Contact form"]'); ?>
  </div>
</div>

<script>
  jQuery(document).ready(function() {
    jQuery('#contact-form').submit(function (e) {
      if (is_sending || !validateInputs()) {
        return false; // Don't let someone submit the form while it is in-progress...
      }
      e.preventDefault(); // Prevent the default form submit
      var $this = jQuery(this); // Cache this
      jQuery.ajax({
        url: '<?php echo admin_url("admin-ajax.php") ?>', // Let WordPress figure this url out...
        type: 'post',
        dataType: 'JSON', // Set this so we don't need to decode the response...
        data: jQuery.this.serialize(), // One-liner form data prep...
        beforeSend: function () {
          is_sending = true;
          // You could do an animation here...
        },
        error: handleFormError,
        success: function (data) {
          if (data.status === 'success') {
            // Here, you could trigger a success message
          } else {
            handleFormError(); // If we don't get the expected response, it's an error...
          }
        }
      });
    });
  });
</script>

<?php wp_footer(); ?>

</body>
</html>
