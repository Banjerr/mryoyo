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

<div class="lightboxBG"></div>
<div class="lightbox">
  <button class="closeBtn" onclick="closeContactLightbox();"><i class="fa fa-times"></i></button>
  <div class="wrap">
    <h2 class="bioRhyme">Just Say "YO"!</h2>
    <form action="">
      <div class="inputWrap">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="inputWrap">
        <label for="email">Email</label>
        <input type="text" name="email">
      </div>
      <div class="inputWrap">
        <label for="message">Message</label>
        <textarea name="message" rows="8" cols="80"></textarea>
      </div>
      <button type="submit">
        SAY YO! <i class="fa fa-circle-o-notch"></i>
      </button>
    </form>
  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
