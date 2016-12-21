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
    <div class="site-description">
      <div class="site-description__avatar">
        <?php echo get_avatar( '1', '400' ); ?>
      </div>
      <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) { ?>
          <p class="site-description__text"><?php echo $description; /* WPCS: xss ok. */ ?></p>
      <?php } ?>
      <div class="site-description__links">
        <nav>
          <a href="https://twitter.com/actualgabe" title="twitter.com/actualgabe" class="site-description__link">
            <span class="text">Twitter</span>
            <span class="icon">
              <svg viewBox="0 0 32 32" width="16" height="16" class="icon-svg icon-twitter">
                <use xlink:href="#icon-twitter" />
              </svg>
            </span>
          </a>
          <a href="https://github.com/fstop" title="github.com/fstop" class="site-description__link">
            <span class="text">Github</span>
            <span class="icon">
              <svg viewBox="0 0 32 32" width="16" height="16" class="icon-svg icon-github">
                <use xlink:href="#icon-github" />
              </svg>
            </span>
          </a>
          <a href="https://twitter.com/actualgabe" title="twitter.com/actualgabe" class="site-description__link">
            <span class="text">Codepen</span>
            <span class="icon">
              <svg viewBox="0 0 32 32" width="16" height="16" class="icon-svg icon-twitter">
                <use xlink:href="#icon-codepen" />
              </svg>
            </span>
          </a>
          <a href="https://twitter.com/actualgabe" title="twitter.com/actualgabe" class="site-description__link">
            <span class="text">LinkedIn</span>
            <span class="icon">
              <svg viewBox="0 0 32 32" width="16" height="16" class="icon-svg icon-linkedin">
                <use xlink:href="#icon-linkedin" />
              </svg>
            </span>
          </a>
        </nav>
      </div>
      <a href="#" class="site-description__toggle">
        <span class="show hidden">who?</span>
        <span class="hide">hide this</span>
      </a>
    </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
