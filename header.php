<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package F-Stop_Design
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part('template-parts/svg-icons'); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gl' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header__top">
			<h1 class="site-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo__link" rel="home">
          <span class="site-logo__gabriel">gabriel</span>
          <span class="site-logo__luethje">luethje</span>
        </a>
        <span class="site-description__toggle hidden">
          <span class="who">who?</span>
          <span class="hide">close</span>
        </span>
      </h1>
      <nav id="site-navigation" class="site-nav" role="navigation">
        <?php
          $menuParameters = array(
            'theme_location' => 'primary',
            'container'       => false,
            'echo'            => false,
            'items_wrap'      => '%3$s',
            'depth'           => 0,
            'link_before'     => '<span class="text">',
            'link_after'      => '</span>',
          );

          echo strip_tags(wp_nav_menu( $menuParameters ), '<a><span>' );
        ?>
      </nav>
		</div>
    <div class="site-description hidden">
      <div class="site-description__avatar">
        <?php echo get_avatar( '1', '400' ); ?>
      </div>
      <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) { ?>
          <p class="site-description__text"><?php echo $description; /* WPCS: xss ok. */ ?></p>
      <?php } ?>
      <div class="site-description__links">
        <?php gl_hm_get_template_part('template-parts/social-links', ['classname' => 'social-links']); ?>
      </div>
    </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
