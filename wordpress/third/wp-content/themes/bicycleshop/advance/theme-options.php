<?php
function bicycleshop_setup_theme_options() {
	global $bicycleshop_a13;

	//get all cursors
	$cursors = array(
		'christmas.png'         => 'christmas.png',
		'empty_black.png'       => 'empty_black.png',
		'empty_black_white.png' => 'empty_black_white.png',
		'superior_cursor.png'   => 'superior_cursor.png'
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'cursors', $cursors );

	//get all menu effects
	$menu_effects = array(
		'none'      => esc_html__( 'None', 'bicycleshop' ),
		'ferdinand' => 'ferdinand'
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'menu_effects', $menu_effects );

	//get all custom sidebars
	$header_sidebars = $bicycleshop_a13->get_option( 'custom_sidebars' );
	if ( ! is_array( $header_sidebars ) ) {
		$header_sidebars = array();
	}
	//create 2 arrays for different purpose
	$header_sidebars            = array_merge( array( 'off' => esc_html__( 'Off', 'bicycleshop' ) ), $header_sidebars );
	$header_sidebars_off_global = array_merge( array( 'G' => esc_html__( 'Global settings', 'bicycleshop' ) ), $header_sidebars );
	//re-indexing these arrays
	array_unshift( $header_sidebars, null );
	unset( $header_sidebars[0] );
	array_unshift( $header_sidebars_off_global, null );
	unset( $header_sidebars_off_global[0] );
	$bicycleshop_a13->bicycleshop_set_settings_set( 'header_sidebars', $header_sidebars );
	$bicycleshop_a13->bicycleshop_set_settings_set( 'header_sidebars_off_global', $header_sidebars_off_global );

	$on_off = array(
		'on'  => esc_html__( 'Enable', 'bicycleshop' ),
		'off' => esc_html__( 'Disable', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'on_off', $on_off );

	$font_weights = array(
		'100'    => esc_html__( '100', 'bicycleshop' ),
		'200'    => esc_html__( '200', 'bicycleshop' ),
		'300'    => esc_html__( '300', 'bicycleshop' ),
		'normal' => esc_html__( 'Normal 400', 'bicycleshop' ),
		'500'    => esc_html__( '500', 'bicycleshop' ),
		'600'    => esc_html__( '600', 'bicycleshop' ),
		'bold'   => esc_html__( 'Bold 700', 'bicycleshop' ),
		'800'    => esc_html__( '800', 'bicycleshop' ),
		'900'    => esc_html__( '900', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'font_weights', $font_weights );

	$font_transforms = array(
		'none'      => esc_html__( 'None', 'bicycleshop' ),
		'uppercase' => esc_html__( 'Uppercase', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'font_transforms', $font_transforms );

	$text_align = array(
		'left'   => esc_html__( 'Left', 'bicycleshop' ),
		'center' => esc_html__( 'Center', 'bicycleshop' ),
		'right'  => esc_html__( 'Right', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'text_align', $text_align );

	$image_fit = array(
		'cover'    => esc_html__( 'Cover', 'bicycleshop' ),
		'contain'  => esc_html__( 'Contain', 'bicycleshop' ),
		'fitV'     => esc_html__( 'Fit Vertically', 'bicycleshop' ),
		'fitH'     => esc_html__( 'Fit Horizontally', 'bicycleshop' ),
		'center'   => esc_html__( 'Just center', 'bicycleshop' ),
		'repeat'   => esc_html__( 'Repeat', 'bicycleshop' ),
		'repeat-x' => esc_html__( 'Repeat X', 'bicycleshop' ),
		'repeat-y' => esc_html__( 'Repeat Y', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'image_fit', $image_fit );

	$content_layouts = array(
		'center'        => esc_html__( 'Center fixed width', 'bicycleshop' ),
		'left'          => esc_html__( 'Left fixed width', 'bicycleshop' ),
		'left_padding'  => esc_html__( 'Left fixed width + padding', 'bicycleshop' ),
		'right'         => esc_html__( 'Right fixed width', 'bicycleshop' ),
		'right_padding' => esc_html__( 'Right fixed width + padding', 'bicycleshop' ),
		'full_fixed'    => esc_html__( 'Full width + fixed content', 'bicycleshop' ),
		'full_padding'  => esc_html__( 'Full width + padding', 'bicycleshop' ),
		'full'          => esc_html__( 'Full width', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'content_layouts', $content_layouts );

	$parallax_types = array(
		"tb"   => esc_html__( 'top to bottom', 'bicycleshop' ),
		"bt"   => esc_html__( 'bottom to top', 'bicycleshop' ),
		"lr"   => esc_html__( 'left to right', 'bicycleshop' ),
		"rl"   => esc_html__( 'right to left', 'bicycleshop' ),
		"tlbr" => esc_html__( 'top-left to bottom-right', 'bicycleshop' ),
		"trbl" => esc_html__( 'top-right to bottom-left', 'bicycleshop' ),
		"bltr" => esc_html__( 'bottom-left to top-right', 'bicycleshop' ),
		"brtl" => esc_html__( 'bottom-right to top-left', 'bicycleshop' ),
	);

	$content_under_header = array(
		'content' => esc_html__( 'Yes, hide the content', 'bicycleshop' ),
		'title'   => esc_html__( 'Yes, hide the content and add top padding to the outside title bar.', 'bicycleshop' ),
		'off'     => esc_html__( 'Turn it off', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'content_under_header', $content_under_header );

	$social_colors = array(
		'black'            => esc_html__( 'Black', 'bicycleshop' ),
		'color'            => esc_html__( 'Color', 'bicycleshop' ),
		'white'            => esc_html__( 'White', 'bicycleshop' ),
		'semi-transparent' => esc_html__( 'Semi transparent', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'social_colors', $social_colors );

	$bricks_hover = array(
		'cross'      => esc_html__( 'Show cross', 'bicycleshop' ),
		'drop'       => esc_html__( 'Drop', 'bicycleshop' ),
		'shift'      => esc_html__( 'Shift', 'bicycleshop' ),
		'pop'        => esc_html__( 'Pop text', 'bicycleshop' ),
		'border'     => esc_html__( 'Border', 'bicycleshop' ),
		'scale-down' => esc_html__( 'Scale down', 'bicycleshop' ),
		'none'       => esc_html__( 'None', 'bicycleshop' ),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'bricks_hover', $bricks_hover );

	//tags allowed in descriptions
	$valid_tags = array(
		'a'      => array(
			'href' => array(),
		),
		'br'     => array(),
		'code'   => array(),
		'em'     => array(),
		'strong' => array(),
	);
	$bicycleshop_a13->bicycleshop_set_settings_set( 'valid_tags', $valid_tags );
	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

//GENERAL SETTINGS
	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'    => esc_html__( 'General settings', 'bicycleshop' ),
		'desc'     => '',
		'id'       => 'section_general_settings',
		'icon'     => 'el el-adjust-alt',
		'priority' => 3,
		'fields'   => array()
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Front page', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_general_front_page',
		'icon'       => 'fa fa-home',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'fp_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'What to show on the front page?', 'bicycleshop' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you choose <strong>Page</strong> then make sure that in <a href="%s">WordPress Homepage Settings</a> you have selected <strong>A static page</strong>, that you wish to use as the front page.', 'bicycleshop' ), $valid_tags ), 'javascript:wp.customize.section( \'static_front_page\' ).focus();' ),
				'options'     => array(
					'page'         => esc_html__( 'Page', 'bicycleshop' ),
					'blog'         => esc_html__( 'Blog', 'bicycleshop' ),
				),
				'default'     => 'page',

			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'General layout', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_main_settings',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'appearance_body_image',
				'type'    => 'image',
				'title'   => esc_html__( 'Background image', 'bicycleshop' ),
				'partial' => array(
					'selector'            => '.page-background',
					'container_inclusive' => true,
					'settings'            => array(
						'appearance_body_image',
						'appearance_body_image_fit',
						'appearance_body_bg_color',
					),
					'render_callback'     => 'bicycleshop_page_background',
				),
			),
			array(
				'id'      => 'appearance_body_image_fit',
				'type'    => 'select',
				'title'   => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options' => $image_fit,
				'default' => 'cover',
				'partial' => true,
			),
			array(
				'id'      => 'appearance_body_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#999999',
				'partial' => true,
			),
			array(
				'id'          => 'layout_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Layout', 'bicycleshop' ),
				'options'     => array(
					'full' => esc_html__( 'Full width', 'bicycleshop' ),
				),
				'default'     => 'full',
			),
			array(
				'id'      => 'custom_cursor',
				'type'    => 'radio',
				'title'   => esc_html__( 'Mouse cursor', 'bicycleshop' ),
				'options' => array(
					'default' => esc_html__( 'Normal', 'bicycleshop' ),
					'select'  => esc_html__( 'Predefined', 'bicycleshop' ),
					'custom'  => esc_html__( 'Custom', 'bicycleshop' ),
				),
				'default' => 'default',
				'js'      => true,
			),
			array(
				'id'       => 'cursor_select',
				'type'     => 'select',
				'title'    => esc_html__( 'Cursor', 'bicycleshop' ),
				'options'  => $cursors,
				'default'  => 'empty_black_white.png',
				'required' => array( 'custom_cursor', '=', 'select' ),
				'js'       => true,
			),
			array(
				'id'       => 'cursor_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Custom cursor image', 'bicycleshop' ),
				'required' => array( 'custom_cursor', '=', 'custom' ),
				'js'       => true,
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Page preloader', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_page_preloader',
		'icon'       => 'fa fa-spinner',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'preloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Page preloader', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
				'js'          => true,
			),
			array(
				'id'          => 'preloader_hide_event',
				'type'        => 'radio',
				'title'       => esc_html__( 'Hide event', 'bicycleshop' ),
				'description' => wp_kses( __( '<strong>On load</strong> is called when the whole site, with all the images, is loaded, which can take a lot of time on heavier sites, and even more time on mobile devices. Also,  it can sometimes hang and never hide the preloader, when there is a problem with some resource. <br /><strong>On DOM ready</strong> is called when the whole HTML with CSS is loaded, so after the preloader is hidden, you can still see the loading of images. This is a much safer option.', 'bicycleshop' ), $valid_tags ),
				'options'     => array(
					'ready' => esc_html__( 'On DOM ready', 'bicycleshop' ),
					'load'  => esc_html__( 'On load', 'bicycleshop' ),
				),
				'default'     => 'ready',
				'required'    => array( 'preloader', '=', 'on' ),
				'js'          => true,
			),
			array(
				'id'       => 'preloader_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#preloader',
					'container_inclusive' => true,
					'settings'            => array(
						'preloader_bg_image',
						'preloader_bg_image_fit',
						'preloader_bg_color',
						'preloader_type',
						'preloader_color',
					),
					'render_callback'     => 'bicycleshop_page_preloader',
				),
			),
			array(
				'id'       => 'preloader_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Type', 'bicycleshop' ),
				'options'  => array(
					'none'              => esc_html__( 'none', 'bicycleshop' ),
					'atom'              => esc_html__( 'Atom', 'bicycleshop' ),
					'flash'             => esc_html__( 'Flash', 'bicycleshop' ),
					'indicator'         => esc_html__( 'Indicator', 'bicycleshop' ),
					'radar'             => esc_html__( 'Radar', 'bicycleshop' ),
					'circle_illusion'   => esc_html__( 'Circle Illusion', 'bicycleshop' ),
					'square_of_squares' => esc_html__( 'Square of squares', 'bicycleshop' ),
					'plus_minus'        => esc_html__( 'Plus minus', 'bicycleshop' ),
					'hand'              => esc_html__( 'Hand', 'bicycleshop' ),
					'blurry'            => esc_html__( 'Blurry', 'bicycleshop' ),
					'arcs'              => esc_html__( 'Arcs', 'bicycleshop' ),
					'tetromino'         => esc_html__( 'Tetromino', 'bicycleshop' ),
					'infinity'          => esc_html__( 'Infinity', 'bicycleshop' ),
					'cloud_circle'      => esc_html__( 'Cloud circle', 'bicycleshop' ),
					'dots'              => esc_html__( 'Dots', 'bicycleshop' ),
					'jet_pack_man'      => esc_html__( 'Jet-Pack-Man', 'bicycleshop' ),
					'circle'            => 'Circle'
				),
				'default'  => 'infinity',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Animation color', 'bicycleshop' ),
				'required' => array(
					array( 'preloader', '=', 'on' ),
					array( 'preloader_type', '!=', 'tetromino' ),
					array( 'preloader_type', '!=', 'blurry' ),
					array( 'preloader_type', '!=', 'square_of_squares' ),
					array( 'preloader_type', '!=', 'circle_illusion' ),
				),
				'default'  => '',
				'partial'  => true,
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Theme Header', 'bicycleshop' ),
		'desc'       => esc_html__( 'Theme header is a place where you usually find the logo of your site, main menu, and a few other elements.', 'bicycleshop' ),
		'id'         => 'subsection_header',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Theme Header', 'bicycleshop' ),
				'description' => esc_html__( 'If you do not plan to use theme header or want to replace it with something else, just disable it here.', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			)
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Footer', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_footer',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'footer_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Footer', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
				'partial'     => array(
					'selector'            => '#footer',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_switch',
						'footer_widgets_columns',
						'footer_text',
						'footer_privacy_link',
						'footer_content_width',
						'footer_content_style',
						'footer_bg_color',
						'footer_lower_bg_color',
						'footer_lower_bg_color',
						'footer_widgets_color',
						'footer_font_size',
						'footer_widgets_font_size',
						'footer_font_color',
						'footer_link_color',
						'footer_hover_color',
					),
					'render_callback'     => 'bicycleshop_theme_footer',
				),
			),
			array(
				'id'          => 'footer_logo',
				'type'        => 'image',
				'title'       => esc_html__( 'Footer Logo', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_logo_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Footer Logo Link', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'       => 'footer_widgets_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Widgets columns number', 'bicycleshop' ),
				'options'  => array(
					'1' => esc_html__( '1', 'bicycleshop' ),
					'2' => esc_html__( '2', 'bicycleshop' ),
					'3' => esc_html__( '3', 'bicycleshop' ),
					'4' => esc_html__( '4', 'bicycleshop' ),
					'5' => esc_html__( '5', 'bicycleshop' ),
				),
				'default'  => '4',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_text',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'bicycleshop' ),
				'description' => esc_html__( 'You can use HTML here.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_privacy_link',
				'type'        => 'radio',
				'title'       => esc_html__( 'Privacy Policy Link', 'bicycleshop' ),
				'description' => esc_html__( 'Since WordPress 4.9.6 there is an option to set Privacy Policy page. If you enable this option it will display a link to it in the footer after footer content.', 'bicycleshop' ).' <a href="'.esc_url( admin_url( 'options-privacy.php' ) ).'">'.esc_html__( 'Here you can set your Privacy Policy page', 'bicycleshop' ).'</a>',
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'bicycleshop' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'bicycleshop' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => array(
					'selector'            => '.f-links',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_socials',
						'footer_socials_color',
						'footer_socials_color_hover',
					),
					'render_callback'     => 'footer_socials'
				),
			),
			array(
				'id'       => 'footer_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ),
				'options'  => $social_colors,
				'default'  => 'white',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content', 'bicycleshop' ). ' : ' .esc_html__( 'Width', 'bicycleshop' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'bicycleshop' ),
					'full'   => esc_html__( 'Full width', 'bicycleshop' ),
				),
				'default'  => 'narrow',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content', 'bicycleshop' ). ' : ' .esc_html__( 'Style', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'classic',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_socials_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Social Icon Background color', 'bicycleshop' ),
				'default'  => '#000000',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),			
			array(
				'id'       => 'footer_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => '#151c29',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_lower_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Lower part', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'desc'     => esc_html__( 'If you want to have a different color in the lower part than in the footer widgets.', 'bicycleshop' ),
				'default'  => '#151c29',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_color',
				'type'     => 'radio',
				'title'    => esc_html__( 'Widgets colors', 'bicycleshop' ),
				'desc'     => esc_html__( 'Depending on what background you have set up, choose proper option.', 'bicycleshop' ),
				'options'  => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'bicycleshop' ),
					'light-sidebar' => esc_html__( 'On light', 'bicycleshop' ),
				),
				'default'  => 'dark-sidebar',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Lower part', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Widgets part', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_font_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'bicycleshop' ),
				'default'     => '#ffffff',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_link_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'bicycleshop' ). ' : ' .esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'bicycleshop' ). ' : ' .esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Hidden sidebar', 'bicycleshop' ),
		'desc'       => esc_html__( 'It is active only if it contains active widgets. After activation, displays the opening button in the header.', 'bicycleshop' ),
		'id'         => 'subsection_hidden_sidebar',
		'icon'       => 'fa fa-columns',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'hidden_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'hidden_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'bicycleshop' ),
				'default' => 10,
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'          => 'hidden_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'bicycleshop' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'bicycleshop' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'bicycleshop' ),
					'light-sidebar' => esc_html__( 'On light', 'bicycleshop' ),
				),
				'default'     => 'dark-sidebar',
			),
			array(
				'id'      => 'hidden_sidebar_side',
				'type'    => 'radio',
				'title'   => esc_html__( 'Side', 'bicycleshop' ),
				'options' => array(
					'left'  => esc_html__( 'Left', 'bicycleshop' ),
					'right' => esc_html__( 'Right', 'bicycleshop' ),
				),
				'default' => 'left',
			),
			array(
				'id'      => 'hidden_sidebar_effect',
				'type'    => 'select',
				'title'   => esc_html__( 'Opening effect', 'bicycleshop' ),
				'options' => array(
					'1' => esc_html__( 'Slide in on top', 'bicycleshop' ),
					'2' => esc_html__( 'Reveal', 'bicycleshop' ),
					'3' => esc_html__( 'Push', 'bicycleshop' ),
					'4' => esc_html__( 'Slide along', 'bicycleshop' ),
					'5' => esc_html__( 'Reverse slide out', 'bicycleshop' ),
					'6' => esc_html__( 'Fall down', 'bicycleshop' ),
				),
				'default' => '2',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Fonts settings', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_fonts_settings',
		'icon'       => 'fa fa-font',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'nav_menu_fonts',
				'type'        => 'font',
				'title'       => esc_html__( 'Font for main navigation menu and overlay menu:', 'bicycleshop' ),
				'default'     => array(
					'font-family'    => 'Poppins',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'          => 'titles_fonts',
				'type'        => 'font',
				'title'       => esc_html__( 'Font for Titles/Headings:', 'bicycleshop' ),
				'default'     => array(
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'          => 'normal_fonts',
				'type'        => 'font',
				'title'       => esc_html__( 'Font for normal(content) text:', 'bicycleshop' ),
				'default'     => array(
					'font-family'    => 'Poppins',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'logo_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for text logo:', 'bicycleshop' ),
				'default' => array(
					'font-family'    => 'Poppins',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Headings', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_heading_styles',
		'icon'       => 'fa fa-header',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'headings_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'bicycleshop' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'headings_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'bicycleshop' ),
				'options' => $font_transforms,
				'default' => 'none',
			),
			array(
				'id'      => 'page_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Main titles', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'default' => 36,
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
			),
			array(
				'id'          => 'page_title_font_size_768',
				'type'        => 'slider',
				'title'       => esc_html__( 'Main titles', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ). ' - ' .esc_html__( 'on mobile devices', 'bicycleshop' ),
				'description' => esc_html__( 'It will be used on devices less than 768 pixels wide.', 'bicycleshop' ),
				'min'         => 10,
				'max'         => 60,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 32,
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Content', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_content_styles',
		'icon'       => 'fa fa-align-left',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'content_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'bicycleshop' ),
				'description' => esc_html__( 'It will change the default white background color that is set under content on pages, blog, posts', 'bicycleshop' ),
				'default'     => '#ffffff',
			),
			array(
				'id'      => 'content_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'content_link_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'content_link_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'content_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'bicycleshop' ),
				'default' => 16,
				'min'     => 10,
				'step'    => 1,
				'max'     => 30,
				'unit'    => 'px',
			),
			array(
				'id'          => 'first_paragraph',
				'type'        => 'radio',
				'title'       => esc_html__( 'First paragraph', 'bicycleshop' ). ' : ' .esc_html__( 'Highlight', 'bicycleshop' ),
				'description' => esc_html__( 'If enabled, it highlights(font size and color) the first paragraph in the content(blog, post, page).', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'       => 'first_paragraph_color',
				'type'     => 'color',
				'title'    => esc_html__( 'First paragraph', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'first_paragraph', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Social icons', 'bicycleshop' ),
		'desc'       => esc_html__( 'These icons will be used in various places across theme if you decide to activate them.', 'bicycleshop' ),
		'id'         => 'section_social',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'socials_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type of icons', 'bicycleshop' ),
				'options' => array(
					'squares'    => esc_html__( 'Squares', 'bicycleshop' ),
					'circles'    => esc_html__( 'Circles', 'bicycleshop' ),
					'icons-only' => esc_html__( 'Only icons', 'bicycleshop' ),
				),
				'default' => 'squares',
			),
			array(
				'id'          => 'social_services',
				'type'        => 'socials',
				'title'       => esc_html__( 'Links', 'bicycleshop' ),
				'description' => esc_html__( 'Drag and drop to change order of icons. Only filled links will show up as social icons.', 'bicycleshop' ),
				'label'       => false,
				'options'     => $bicycleshop_a13->bicycleshop_get_social_icons_list( 'names' ),
				'default'     => $bicycleshop_a13->bicycleshop_get_social_icons_list( 'empty' )
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Lightbox settings', 'bicycleshop' ),
		'desc'       => esc_html__( 'If you wish to use some other plugin/script for images and items, you can switch off default theme lightbox. If you are planning to use different lightbox script instead, then you will have to do some extra work with scripting to make it work in every theme place.', 'bicycleshop' ),
		'id'         => 'subsection_lightbox',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'skt_lightbox',
				'type'        => 'radio',
				'title'       => esc_html__( 'Theme lightbox', 'bicycleshop' ),
				'options'     => array(
					'lightGallery' => esc_html__( 'Light Gallery', 'bicycleshop' ),
					'off'          => esc_html__( 'Disable', 'bicycleshop' ),
				),
				'default'     => 'lightGallery',
			),
			array(
				'id'          => 'lightbox_single_post',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use theme lightbox for images in posts', 'bicycleshop' ),
				'description' => esc_html__( 'If enabled, the theme will use a lightbox to display images in the post content. To work properly, Images should link to "Media File".', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'skt_lightbox', '=', 'lightGallery' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Widgets', 'bicycleshop' ),
		'id'         => 'subsection_widgets',
		'icon'       => 'fa fa-puzzle-piece',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'widgets_top_margin',
				'type'        => 'radio',
				'title'       => esc_html__( 'Top margin', 'bicycleshop' ),
				'description' => esc_html__( 'It only affects the widgets in the vertical sidebars.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'widget_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Main titles', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 20,
			),
			array(
				'id'          => 'widget_font_size',
				'type'        => 'slider',
				'title'       => esc_html__( 'Content', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'description' => esc_html__( 'It only affects the widgets in the vertical sidebars.', 'bicycleshop' ),
				'min'         => 5,
				'max'         => 30,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 16,
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'To top button', 'bicycleshop' ),
		'id'         => 'subsection_to_top',
		'icon'       => 'fa fa-chevron-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'to_top',
				'type'        => 'radio',
				'title'       => esc_html__( 'To top button', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'to_top_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#524F51',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#fe495c',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ),
				'default' => '#cccccc',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#ffffff',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Icon', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
				'default' => 13,
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'          => 'to_top_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon', 'bicycleshop' ),
				'default'     => 'chevron-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required' => array( 'to_top', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Buttons', 'bicycleshop' ),
		'desc'       => esc_html__( 'You can change here colors of buttons that submit forms. For shop buttons, go to the shop settings.', 'bicycleshop' ),
		'id'         => 'subsection_buttons',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_submit_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_submit_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_submit_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_submit_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_submit_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'bicycleshop' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_submit_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'bicycleshop' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_submit_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'bicycleshop' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_submit_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'bicycleshop' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
			array(
				'id'          => 'button_submit_radius',
				'type'        => 'slider',
				'title'       => esc_html__( 'Border radius', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 20,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 20,
			),
		)
	) );

//HEADER SETTINGS
	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'    => esc_html__( 'Header settings', 'bicycleshop' ),
		'desc'     => '',
		'id'       => 'section_header_settings',
		'icon'     => 'el el-magic',
		'priority' => 6,
		'fields'   => array()
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Type, variant, background', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_header_type',
		'icon'       => 'fa fa-cogs',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type', 'bicycleshop' ),
				'options'     => array(
					'horizontal' => esc_html__( 'Horizontal', 'bicycleshop' ),
				),
				'default'     => 'horizontal',
			),
			array(
				'id'       => 'header_horizontal_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Sticky version', 'bicycleshop' ),
				'options'  => array(
					'sticky-no-hiding'   => esc_html__( 'No hiding sticky', 'bicycleshop' ),
					'no-sticky no-fixed' => esc_html__( 'Disabled, show only default header(not fixed)', 'bicycleshop' ),
					'no-sticky'          => esc_html__( 'Disabled, show only default header fixed', 'bicycleshop' )
				),
				'default'  => 'no-sticky no-fixed',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'header_horizontal_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Variant', 'bicycleshop' ),
				'options'     => array(
					'one_line'               => esc_html__( 'One line, logo on side', 'bicycleshop' ),
					'one_line_menu_centered' => esc_html__( 'One line, menu centered', 'bicycleshop' ),
				),
				'default'     => 'one_line',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'header_color_variants',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variants', 'bicycleshop' ),
				'description' => esc_html__( 'If you want to use theme header color variants(light and dark variants) or the sticky header variant, then enable this option. Some settings of the header can then be overridden in color & sticky variants.', 'bicycleshop' ),
				'options'     => array(
					'sticky' => esc_html__( 'Turn on only for a sticky variant', 'bicycleshop' ),
					'off'    => esc_html__( 'Disable', 'bicycleshop' ),
				),
				'default'     => 'sticky',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content width', 'bicycleshop' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'bicycleshop' ),
					'full'   => esc_html__( 'Full width', 'bicycleshop' ),
				),
				'default'  => 'full',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width_narrow_bg',
				'type'     => 'radio',
				'title'    => esc_html__( 'Narrow the entire header as well', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_content_width', '=', 'narrow' )
				),
			),
			array(
				'id'      => 'header_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#ffffff',
			),
			array(
				'id'          => 'header_bg_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'description' => esc_html__( 'Useful in special cases, like when you make a transparent header.', 'bicycleshop' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'header_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'header_separators_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator and lines color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Logo', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_logo',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'logo_from_variants',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use logos from header variants', 'bicycleshop' ),
				'description' => esc_html__( 'If you want to be able to change the logo in header color variants (light and dark variants) or in the sticky header variant, then enable this option.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_color_variants', '!=', 'off' ),
				)
			),
			array(
				'id'      => 'logo_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'bicycleshop' ),
				'options' => array(
					'image' => esc_html__( 'Image', 'bicycleshop' ),
					'text'  => esc_html__( 'Text', 'bicycleshop' ),
				),
				'default' => 'image',
			),
			array(
				'id'          => 'logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Image', 'bicycleshop' ),
				'description' => esc_html__( 'Upload an image for logo.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Image for HIGH DPI screen', 'bicycleshop' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'bicycleshop' ) . ' ' . esc_html__( 'Upload an image for logo.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width', 'bicycleshop' ). ' - ' .esc_html__( 'on desktop', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'bicycleshop' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width', 'bicycleshop' ). ' - ' .esc_html__( 'on mobile devices', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'bicycleshop' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
				)
			),
			array(
				'id'          => 'logo_image_height',
				'type'        => 'slider',
				'title'       => esc_html__( 'Height', 'bicycleshop' ),
				'description' => esc_html__( 'Leave empty if you do not need anything fancy', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_normal_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '1.00',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_hover_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '0.50',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_text',
				'type'        => 'text',
				'title'       => esc_html__( 'Text', 'bicycleshop' ),
				'description' => wp_kses( __( 'If you use more than one word in the logo, you can use <code>&amp;nbsp;</code> instead of a white space, so the words will not break into many lines.', 'bicycleshop' ), $valid_tags ).
				                 /* translators: %s: Customizer JS URL */
				                 '<br />'.sprintf( wp_kses( __( 'If you want to change the font for logo go to <a href="%s">Font settings</a>.', 'bicycleshop' ), $valid_tags ), 'javascript:wp.customize.control( \''.BICYCLESHOP_OPTIONS_NAME.'[logo_fonts]\' ).focus();' ),
				'default'     => get_bloginfo( 'name' ),
				'required'    => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'bicycleshop' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 26,
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'bicycleshop' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'          => 'logo_padding',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding', 'bicycleshop' ). ' - ' .esc_html__( 'on desktop', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'bicycleshop' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '25px',
					'padding-bottom' => '35px',
					'units'          => 'px'
				)
			),
			array(
				'id'          => 'logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding', 'bicycleshop' ). ' - ' .esc_html__( 'on mobile devices', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'bicycleshop' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Main Menu', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_header_menu',
		'icon'       => 'fa fa-bars',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'menu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'bicycleshop' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Bar', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => '#fe495c',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),			
			array(
				'id'       => 'menu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '#ffffff',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover/active', 'bicycleshop' ),
				'default'  => '#efff1d',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'bicycleshop' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'bicycleshop' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'bicycleshop' ). ' : ' .esc_html__( 'Font weight', 'bicycleshop' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'bicycleshop' ). ' : ' .esc_html__( 'Text transform', 'bicycleshop' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Sticky header', 'bicycleshop' ). ' - ' .esc_html__( 'Override normal settings', 'bicycleshop' ),
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ) .' '. esc_html__( 'You can change some options here to modify the appearance of the sticky header(if it is enabled).', 'bicycleshop' ),
		'id'         => 'subsection_header_sticky',
		'icon'       => 'fa fa-thumb-tack',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_sticky_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Image', 'bicycleshop' ),
				'description' => esc_html__( 'Upload an image for logo.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'bicycleshop' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'bicycleshop' ) . ' ' . esc_html__( 'Upload an image for logo.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Max width', 'bicycleshop' ). ' - ' .esc_html__( 'on desktop', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'bicycleshop' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Max width', 'bicycleshop' ). ' - ' .esc_html__( 'on mobile devices', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'bicycleshop' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_sticky_logo_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Padding', 'bicycleshop' ). ' - ' .esc_html__( 'on desktop', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'bicycleshop' ),
				'mode'    => 'padding',
				'sides'   => array( 'top', 'bottom' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'          => 'header_sticky_logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Padding', 'bicycleshop' ). ' - ' .esc_html__( 'on mobile devices', 'bicycleshop' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'bicycleshop' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'       => 'header_sticky_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_sticky_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'bicycleshop' ). ' : ' .esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'header_sticky_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'bicycleshop' ). ' : ' .esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover/active', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'bicycleshop' ). ' : ' .esc_html__( 'Links', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover/active', 'bicycleshop' ),
				'description' => esc_html__( 'It works only for first level links.', 'bicycleshop' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_sticky_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'header_sticky_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_sticky_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_sticky_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'bicycleshop' ). ' : ' .esc_html__( 'Separator and lines color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'bicycleshop' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_sticky_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover/active', 'bicycleshop' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'bicycleshop' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_sticky_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Border color', 'bicycleshop' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Border color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Tools icons', 'bicycleshop' ). ' - ' .esc_html__( 'General settings', 'bicycleshop' ),
		'id'         => 'subsection_header_tools',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'bicycleshop' ),
				'default'     => '#000000',
			),
			array(
				'id'          => 'header_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'bicycleshop' ). ' : ' .esc_html__( 'Color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover/active', 'bicycleshop' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'bicycleshop' ),
				'default'     => '#fe495c',
			),
			array(
				'id'      => 'header_search',
				'type'    => 'radio',
				'title'   => esc_html_x( 'Search', 'tool', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'off',
			),			
			array(
				'id'          => 'header_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Text', 'bicycleshop' ),
				'description' => esc_html__( 'If left empty then the text will not be displayed.', 'bicycleshop' ),
				'default'     => '',
				'partial' => array(
					'selector' => '.tools_button',
					'container_inclusive' => true,
					'settings' => array(
						'header_button',
						'header_button_link',
						'header_button_link_target',
						'header_button_font_size',
						'header_button_weight',
						'header_button_bg_color',
						'header_button_bg_color_hover',
						'header_button_display_on_mobile',
					),
					'render_callback' => 'bicycleshop_header_button',
				)
			),
			array(
				'id'       => 'header_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Link', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'          => 'header_button_link_target',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Open link in new tab', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Font size', 'bicycleshop' ),
				'min'      => 5,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '12',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Font weight', 'bicycleshop' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'          => 'header_button_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button', 'bicycleshop' ). ' - ' .esc_html__( 'Display it on mobiles', 'bicycleshop' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),				
		)
	) );

//BLOG SETTINGS
	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'    => esc_html__( 'Blog settings', 'bicycleshop' ),
		'desc'     => esc_html__( 'Posts list refers to Blog, Search and Archives pages', 'bicycleshop' ),
		'id'       => 'section_blog_layout',
		'icon'     => 'fa fa-pencil',
		'priority' => 9,
		'fields'   => array()
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Background', 'bicycleshop' ),
		'id'         => 'subsection_blog_bg',
		'desc'       => esc_html__( 'This will be the default background for pages related to the blog.', 'bicycleshop' ),
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Posts list', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_blog',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'blog_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'bicycleshop' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'blog_content_padding',
				'type'    => 'select',
				'title'   => esc_html__( 'Content', 'bicycleshop' ). ' : ' .esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'options' => array(
					'both'   => esc_html__( 'Both on', 'bicycleshop' ),
					'top'    => esc_html__( 'Only top', 'bicycleshop' ),
					'bottom' => esc_html__( 'Only bottom', 'bicycleshop' ),
					'off'    => esc_html__( 'Both off', 'bicycleshop' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'bicycleshop' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'bicycleshop' ),
					'right-sidebar' => esc_html__( 'Right', 'bicycleshop' ),
					'off'           => esc_html__( 'Off', 'bicycleshop' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_post_look',
				'type'    => 'select',
				'title'   => esc_html__( 'Post look', 'bicycleshop' ),
				'options' => array(
					'vertical_no_padding' => esc_html__( 'Vertical no padding', 'bicycleshop' ),
					'vertical_padding'    => esc_html__( 'Vertical with padding', 'bicycleshop' ),
					'vertical_centered'   => esc_html__( 'Vertical centered', 'bicycleshop' ),
					'horizontal'          => esc_html__( 'Horizontal', 'bicycleshop' ),
				),
				'default' => 'vertical_padding',
			),
			array(
				'id'          => 'blog_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'bicycleshop' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'bicycleshop' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'bicycleshop' ),
					'fitRows' => esc_html__( 'Each row from new line', 'bicycleshop' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'blog_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'bicycleshop' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'bicycleshop' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => '',
				'default'     => 2,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'bicycleshop' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'bicycleshop' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 1920,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'bicycleshop' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'blog_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'bicycleshop' ),
					'auto'   => esc_html__( 'On scroll', 'bicycleshop' ),
				),
				'default'  => 'button',
				'required' => array( 'blog_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'blog_read_more',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display "Read more" link', 'bicycleshop' ),
				'description' => esc_html__( 'Should "Read more" link be displayed after excerpts on blog list/search results.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_excerpt_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type of post excerpts', 'bicycleshop' ),
				'description' => wp_kses( __(
					'In the Manual mode, excerpts are used only if you add the "Read More Tag" (&lt;!--more--&gt;).<br /> In the Automatic mode, if you will not provide the "Read More Tag" or explicit excerpt, the content of the post will be truncated automatically.<br /> This setting only concerns blog list, archive list, search results.', 'bicycleshop' ), $valid_tags ),
				'options'     => array(
					'auto'   => esc_html__( 'Automatic', 'bicycleshop' ),
					'manual' => esc_html__( 'Manual', 'bicycleshop' ),
				),
				'default'     => 'auto',
			),
			array(
				'id'          => 'blog_excerpt_length',
				'type'        => 'slider',
				'title'       => esc_html__( 'Number of words to cut post', 'bicycleshop' ),
				'description' => esc_html__( 'After this many words post will be cut in the automatic mode.', 'bicycleshop' ),
				'min'         => 3,
				'max'         => 200,
				'step'        => 1,
				'unit'        => '',
				'default'     => 40,
				'required'    => array( 'blog_excerpt_type', '=', 'auto' ),
			),
			array(
				'id'          => 'blog_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'bicycleshop' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of the post brick.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_videos',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display of posts video', 'bicycleshop' ),
				'description' => esc_html__( 'You can set to display videos as featured image on posts list. This can speed up loading of pages with many posts(blog, archive, search results) when the videos are used.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Date of publish or last update', 'bicycleshop' ),
				'description' => esc_html__( 'You can\'t use both dates, because the Search Engine will not know which date is correct.', 'bicycleshop' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'bicycleshop' ),
					'updated' => esc_html__( 'Updated', 'bicycleshop' ),
					'off'     => esc_html__( 'Disable', 'bicycleshop' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'blog_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Author', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Comments number', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Categories', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'blog_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'bicycleshop' ),
				'description' => esc_html__( 'Displays list of post tags under a post content.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Posts list', 'bicycleshop' ). ' - ' .esc_html__( 'Title bar', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_blog_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'centered',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'bicycleshop' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'bicycleshop' ),
					'boxed' => esc_html__( 'Boxed', 'bicycleshop' ),
				),
				'default'  => 'full',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Speed', 'bicycleshop' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'bicycleshop' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'default'     => '#ffffff',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'blog_title', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Single post', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_post',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'post_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'post_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'bicycleshop' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'post_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'bicycleshop' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'bicycleshop' ),
					'right-sidebar' => esc_html__( 'Right', 'bicycleshop' ),
					'off'           => esc_html__( 'Off', 'bicycleshop' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'          => 'post_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'bicycleshop' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of the post.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_author_info',
				'type'        => 'radio',
				'title'       => esc_html__( 'Author info', 'bicycleshop' ),
				'description' => esc_html__( 'Will show information about author below post content.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'post_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Date of publish or last update', 'bicycleshop' ),
				'description' => esc_html__( 'You can\'t use both dates, because the Search Engine will not know which date is correct.', 'bicycleshop' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'bicycleshop' ),
					'updated' => esc_html__( 'Updated', 'bicycleshop' ),
					'off'     => esc_html__( 'Disable', 'bicycleshop' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'post_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Author', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Comments number', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'bicycleshop' ). ' : ' .esc_html__( 'Categories', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'post_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'bicycleshop' ),
				'description' => esc_html__( 'Displays list of post tags under a post content.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_navigation',
				'type'        => 'radio',
				'title'       => esc_html__( 'Posts navigation', 'bicycleshop' ),
				'description' => esc_html__( 'Links to next and prev post.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Single post', 'bicycleshop' ). ' - ' .esc_html__( 'Title bar', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_post_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'post_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'post_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'bicycleshop' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'bicycleshop' ),
					'inside'  => esc_html__( 'Inside the content', 'bicycleshop' ),
				),
				'default'  => 'inside',
				'required' => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'bicycleshop' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'bicycleshop' ),
					'boxed' => esc_html__( 'Boxed', 'bicycleshop' ),
				),
				'default'  => 'full',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'bicycleshop' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Speed', 'bicycleshop' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'bicycleshop' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'     => '',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

//SHOP SETTINGS
	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'    => esc_html__( 'Shop(WooCommerce) settings', 'bicycleshop' ),
		'desc'     => '',
		'id'       => 'section_shop_general',
		'icon'     => 'fa fa-shopping-cart',
		'priority' => 12,
		'woocommerce_required' => true,//only visible with WooCommerce plugin being available
		'fields'   => array()
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Background', 'bicycleshop' ),
		'desc'       => esc_html__( 'These options will work for all shop pages - product list, single product and other.', 'bicycleshop' ),
		'id'         => 'subsection_shop_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'shop_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'bicycleshop' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Products list', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_shop',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_search',
				'type'        => 'radio',
				'title'       => esc_html__( 'Search in products instead of pages', 'bicycleshop' ),
				'description' => esc_html__( 'It will change WordPress default search function to make shop search. So when this is activated search function in header or search widget will act as WooCommerece search widget.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'shop_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'bicycleshop' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'shop_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'bicycleshop' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'bicycleshop' ),
					'right-sidebar' => esc_html__( 'Right', 'bicycleshop' ),
					'off'           => esc_html__( 'Off', 'bicycleshop' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'shop_products_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Look of products on list', 'bicycleshop' ),
				'options' => array(
					'overlay' => esc_html__( 'Text as overlay', 'bicycleshop' ),
					'under'   => esc_html__( 'Text under photo', 'bicycleshop' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'shop_products_subvariant',
				'type'     => 'select',
				'title'    => esc_html__( 'Look of products on list', 'bicycleshop' ),
				'options'  => array(
					'left'   => esc_html__( 'Texts to left', 'bicycleshop' ),
					'center' => esc_html__( 'Texts to center', 'bicycleshop' ),
					'right'  => esc_html__( 'Texts to right', 'bicycleshop' ),
				),
				'default'  => 'center',
				'required' => array( 'shop_products_variant', '=', 'under' ),
			),
			array(
				'id'      => 'shop_products_second_image',
				'type'    => 'radio',
				'title'   => esc_html__( 'Show second image of product on hover', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'shop_products_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'bicycleshop' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'bicycleshop' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'bicycleshop' ),
					'fitRows' => esc_html__( 'Each row from new line', 'bicycleshop' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'shop_products_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'bicycleshop' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'bicycleshop' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => '',
				'default'     => 4,
			),
			array(
				'id'      => 'shop_products_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'bicycleshop' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'products',
				'default' => 12,
			),
			array(
				'id'      => 'shop_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'bicycleshop' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 20,
			),
			array(
				'id'      => 'shop_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'bicycleshop' ),
					'auto'   => esc_html__( 'On scroll', 'bicycleshop' ),
				),
				'default'  => 'auto',
				'required' => array( 'shop_lazy_load', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Products list', 'bicycleshop' ). ' - ' .esc_html__( 'Title bar', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_shop_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'bicycleshop' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'bicycleshop' ),
					'boxed' => esc_html__( 'Boxed', 'bicycleshop' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Speed', 'bicycleshop' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'bicycleshop' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_title', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Single product', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_product',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'product_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'product_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'bicycleshop' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
			array(
				'id'      => 'product_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'bicycleshop' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'bicycleshop' ),
					'right-sidebar' => esc_html__( 'Right', 'bicycleshop' ),
					'off'           => esc_html__( 'Off', 'bicycleshop' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'          => 'product_custom_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Theme thumbnails', 'bicycleshop' ),
				'description' => esc_html__( 'If disabled it will display standard WooCommerce thumbnails.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'product_related_products',
				'type'        => 'radio',
				'title'       => esc_html__( 'Related products', 'bicycleshop' ),
				'description' => esc_html__( 'Should related products be displayed on single product page.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Single product', 'bicycleshop' ). ' - ' .esc_html__( 'Title bar', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_product_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'product_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'product_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'bicycleshop' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'bicycleshop' ),
					'inside'  => esc_html__( 'Inside the content', 'bicycleshop' ),
				),
				'default'  => 'inside',
				'required' => array( 'product_title', '=', 'on' ),
			),
			array(
				'id'       => 'product_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'product_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
					array( 'product_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'product_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Speed', 'bicycleshop' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
					array( 'product_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'product_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'bicycleshop' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'default'     => '',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'product_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'     => '',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Other shop pages', 'bicycleshop' ),
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'bicycleshop' ),
		'id'         => 'subsection_shop_no_major_pages',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_no_major_pages_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_no_major_pages_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'bicycleshop' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'bicycleshop' ),
		'title'      => esc_html__( 'Other shop pages', 'bicycleshop' ). ' - ' .esc_html__( 'Title bar', 'bicycleshop' ),
		'id'         => 'subsection_shop_no_major_pages_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_no_major_pages_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'bicycleshop' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'bicycleshop' ),
					'boxed' => esc_html__( 'Boxed', 'bicycleshop' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Speed', 'bicycleshop' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'bicycleshop' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Pop up basket', 'bicycleshop' ),
		'desc'       => esc_html__( 'When WooCommerce is activated, button opening this basket will appear in the header. There also have to be some active widgets in "Basket sidebar" for this.', 'bicycleshop' ),
		'id'         => 'subsection_basket_sidebars',
		'icon'       => 'fa fa-shopping-basket',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'basket_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '',
			),
			array(
				'id'      => 'basket_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'bicycleshop' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'          => 'basket_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'bicycleshop' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'bicycleshop' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'bicycleshop' ),
					'light-sidebar' => esc_html__( 'On light', 'bicycleshop' ),
				),
				'default'     => 'light-sidebar',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Buttons', 'bicycleshop' ),
		'desc'       => esc_html__( 'You can change here the colors of buttons used in the shop. Alternative buttons colors are used in various places in the shop.', 'bicycleshop' ),
		'id'         => 'subsection_buttons_shop',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_shop_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_alt_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_alt_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'bicycleshop' ). ' : ' .esc_html__( 'Background color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_alt_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_alt_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ). ' - ' .esc_html__( 'on hover', 'bicycleshop' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'bicycleshop' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_shop_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'bicycleshop' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_shop_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'bicycleshop' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_shop_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'bicycleshop' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
		)
	) );

//PAGE SETTINGS
	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'    => esc_html__( 'Page settings', 'bicycleshop' ),
		'desc'     => '',
		'id'       => 'section_page',
		'icon'     => 'el el-file-edit',
		'priority' => 15,
		'fields'   => array()
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Single page', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_page',
		'icon'       => 'el el-file-edit',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'page_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'bicycleshop' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'bicycleshop' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'page_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'bicycleshop' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'          => 'page_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar', 'bicycleshop' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'bicycleshop' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'bicycleshop' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'bicycleshop' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'bicycleshop' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'bicycleshop' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'bicycleshop' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'bicycleshop' ),
					'off'                   => esc_html__( 'Off', 'bicycleshop' ),
				),
				'default'     => 'off',
			),
			array(
				'id'      => 'page_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'page_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'bicycleshop' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Single page', 'bicycleshop' ). ' - ' .esc_html__( 'Title bar', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_page_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'bicycleshop' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'page_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'bicycleshop' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'bicycleshop' ),
					'inside'  => esc_html__( 'Inside the content', 'bicycleshop' ),
				),
				'default'  => 'outside',
				'required' => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'bicycleshop' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'bicycleshop' ),
					'centered' => esc_html__( 'Centered', 'bicycleshop' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'bicycleshop' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'bicycleshop' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Type', 'bicycleshop' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Speed', 'bicycleshop' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'bicycleshop' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'default'     => '',
				'required'    => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'bicycleshop' ),
				'default'     => '',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( '404 page template', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_404_page',
		'icon'       => 'fa fa-exclamation-triangle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'page_404_template_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type', 'bicycleshop' ),
				'options'     => array(
					'default' => esc_html__( 'Default', 'bicycleshop' ),
				),
				'default'     => 'default',
			),
			array(
				'id'       => 'page_404_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change the background image', 'bicycleshop' ),
				'required' => array( 'page_404_template_type', '=', 'default' ),
			),
		)
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Password protected page template', 'bicycleshop' ),
		'id'         => 'subsection_password_page',
		'icon'       => 'fa fa-lock',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'page_password_template_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type', 'bicycleshop' ),
				'options'     => array(
					'default' => esc_html__( 'Default', 'bicycleshop' ),
				),
				'default'     => 'default',
			),
			array(
				'id'       => 'page_password_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change the background image', 'bicycleshop' ),
				'required' => array( 'page_password_template_type', '=', 'default' ),
			),
		)
	) );

//MISCELLANEOUS
	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'    => esc_html__( 'Miscellaneous', 'bicycleshop' ),
		'desc'     => '',
		'id'       => 'section_miscellaneous',
		'icon'     => 'fa fa-question',
		'priority' => 24,
		'fields'   => array(),
	) );

	$bicycleshop_a13->bicycleshop_set_sections( array(
		'title'      => esc_html__( 'Anchors', 'bicycleshop' ),
		'desc'       => '',
		'id'         => 'subsection_anchors',
		'icon'       => 'fa fa-external-link',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'anchors_in_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display anchors in address bar', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'scroll_to_anchor',
				'type'        => 'radio',
				'title'       => esc_html__( 'Scroll to anchor handling', 'bicycleshop' ),
				'description' => esc_html__( 'If enabled it will scroll to anchor after it is clicked on the same page. It can, however, conflict with plugins that uses the same mechanism, and the page can scroll in a weird way. In such case disable this feature.', 'bicycleshop' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	/*
 * <--- END SECTIONS
 */

	do_action( 'bicycleshop_additional_theme_options' );
}

bicycleshop_setup_theme_options();