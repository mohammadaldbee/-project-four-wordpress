<?php
class Bicycleshop_Main_Framework{
	function __construct(){
		//get Bicycleshop Universal first so it could fire its actions first
		/** @noinspection PhpIncludeInspection */
 		get_template_part('advance/bicycleshop_uni');
		add_action( 'customize_register', array( $this, 'customizer_pro_section' ) );

		if(is_admin()){
			//check on what page we are
			$current_page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
			$current_subpage = isset( $_GET['subpage'] ) ? sanitize_text_field( wp_unslash( $_GET['subpage'] ) ) : '';

			//always registered in admin
			add_filter( 'bicycleshop_is_import_allowed', array( $this, 'is_import_allowed' ) );
			add_action( 'init', array( $this, 'import_notice_check' ), 9 );

			//only for import design page
			if( $current_page === 'bicycleshopinfopage' && $current_subpage === 'import' ){
				add_action( 'admin_enqueue_scripts', array( $this, 'designs_import_inline_style' ), 28 );
			}
		}
	}

	function is_import_allowed(){
		return true;
	}


	function designs_import_inline_style(){
		$css = '
.demo_grid_item[data-categories~=pro] img{
    opacity: .2;
	transition: opacity 0.3s ease;
}
.demo_grid_item[data-categories~=pro]:hover img{
    opacity: 1;
}
.demo_grid_item.open img{
    opacity: 1;
	transition: none;
}
.top_bar_button.try-button {
    right: 20px;
}';
		wp_add_inline_style( 'bicycleshop-admin-css', bicycleshop_minify_css( $css ) );
	}
	
	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function customizer_pro_section( $manager ) {

		// Load custom section.
		get_template_part('advance/inc/customizer/sections/bicycleshop-class-a13-customize-section-pro');

		// Register custom section types.
		$manager->register_section_type( 'Bicycleshop_A13_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Bicycleshop_A13_Customize_Section_Pro(
				$manager,
				'bicycleshop-pro-theme',
				array(
					'title'    => esc_html__( 'Find Our Other Themes', 'bicycleshop' ),
					'pro_text' => esc_html__( 'Our Themes',         'bicycleshop' ),
					'pro_url'  => 'https://www.sktthemes.org/themes/',
					'priority' => 0
				)
			)
		);
	}	

	function import_notice_check(){
		$plugin_path = 'skt-templates/skt-templates.php';
		include_once ABSPATH . 'wp-admin/includes/plugin.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		if ( is_plugin_active( $plugin_path ) ){
			return;
		}

		if( !bicycleshop_is_admin_notice_active( 'fresh_import' ) ){
			return;
		}

		remove_action('tgmpa_register', 'bicycleshop_register_required_plugins');
		add_action( 'bicycleshop_theme_notices', array( $this, 'import_notice' ) );
 	}

	function import_notice(){
		echo '<div class="a13fe-admin-notice notice notice-warning is-dismissible" data-notice_id="fresh_import">';
		/* translators: %s: Theme name */
		echo '<h3>'.sprintf( esc_html__( 'Welcome to %s Theme', 'bicycleshop' ), esc_html(BICYCLESHOP_OPTIONS_NAME_PART )).'</h3>';
		echo '<p>'.esc_html__( 'Click on the button below to complete theme installation process..', 'bicycleshop' ).'</p>';
		echo '<p><a class="button button-primary" href="'.esc_url( admin_url( 'themes.php?page=bicycleshopinfopage&amp;subpage=info' ) ).'">'.esc_html__( 'Complete Installation', 'bicycleshop').'</a></p>';
		echo '</div>';
	}
}

//run
new Bicycleshop_Main_Framework();