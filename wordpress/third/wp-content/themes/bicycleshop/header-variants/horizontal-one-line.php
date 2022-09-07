<?php
global $bicycleshop_a13;

$variant         = $bicycleshop_a13->get_option( 'header_horizontal_variant' );

$header_content_width = $bicycleshop_a13->get_option( 'header_content_width' );
$header_width = ' ' . $header_content_width;
if($header_content_width === 'narrow' && $bicycleshop_a13->get_option( 'header_content_width_narrow_bg') === 'on' ){
	$header_width .= ' narrow-header';
}

$header_classes = 'to-move a13-horizontal header-type-one_line a13-'.bicycleshop_horizontal_header_color_variant().'-variant header-variant-' . $variant . $header_width;

$menu_on        = $bicycleshop_a13->get_option( 'header_main_menu' ) === 'on';
$socials        = $bicycleshop_a13->get_option( 'header_socials' ) === 'on';

$icons_no     = 0;
$header_tools = bicycleshop_get_header_toolbar( $icons_no );
if ( ! $icons_no ) {
	$header_classes .= ' no-tools';
} else {
	$header_classes .= ' tools-icons-' . $icons_no; //number of icons
}

//how sticky version will behave
$header_classes .= ' '.$bicycleshop_a13->get_option( 'header_horizontal_sticky' );

//hide until it is scrolled to
$show_header_at = $bicycleshop_a13->bicycleshop_get_meta('_horizontal_header_show_header_at' );
if(strlen($show_header_at) && $show_header_at > 0){
	$header_classes .= ' hide-until-scrolled-to';
}
?>
<header id="header" class="<?php echo esc_attr( $header_classes ); ?>"<?php bicycleshop_schema_args( 'header' ); ?>>
	<div class="head">
		<div class="logo-container"<?php bicycleshop_schema_args('logo'); ?>><?php bicycleshop_header_logo(); ?></div>
        <div class="main-menu-area">
        <center>
        <div id="navigation">
            <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_html_e('Menu','bicycleshop'); ?></a>
            </div><!-- toggle --> 	
            <nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">		
                <?php wp_nav_menu( array('theme_location' => 'header-menu') ); ?>
                </nav>
            </div><!-- navigation -->
            </center>
        </div>
		<!-- #access -->
		<?php echo wp_kses_post($header_tools ); //escaped layout part ?>
       <?php
       $header_search = $bicycleshop_a13->get_option( 'header_search' ) === 'on';
			if ( $header_search ) {
	   ?>
        <div class="header-search-toggle" title="Search"><i class="fa fa-search" aria-hidden="true"></i></div>
        <div class="header-search-form">
            <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search'); ?>" name="<?php echo esc_attr( 's'); ?>" />
              <input type="submit" class="search-submit" value="<?php echo esc_attr( 'Search' ); ?>" />
            </form>
          </div>
          <?php } ?>
	</div>
    <div class="clear"></div>    
</header> 