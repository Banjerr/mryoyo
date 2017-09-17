<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

    <?php
    if ( is_front_page() ) {
    ?>
      <div class="cta">
        <h2 class="bungee">School Fundraiser?</h2>
        <h4>Does your school leadership team want to fundraise for a charity?<br />
				Do you need to raise money for school projects, trips and more?</h4>
        <h4>Why not <span class="bungee largeText">yoyos!</span></h4>
      </div>
    <?php
    }
    ?>

		<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<div class="home-banner">
          <h1 class="site-title"><a class="monoton" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div>
			<?php else : ?>
				<p class="site-title"><a class="monoton" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
	<?php endif; ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
