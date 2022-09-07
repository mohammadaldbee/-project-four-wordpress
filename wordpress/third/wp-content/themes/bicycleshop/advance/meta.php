<?php
function bicycleshop_meta_boxes_post() {
	$meta = array(
		/*
		 *
		 * Tab: Posts list
		 *
		 */
		'posts_list' => array(
			array(
				'name' => __('Posts list', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'bicycleshop' ),
				'description' => __( 'What should be the width of this post on the Posts list?', 'bicycleshop' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
		),


		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'bicycleshop' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'bicycleshop' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured Image ', 'bicycleshop' ). ' : ' . __( 'Parallax', 'bicycleshop' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'bicycleshop' ),
					'off' => __( 'Disable', 'bicycleshop' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Area height', 'bicycleshop' ),
				'description' => __( 'This limits the height of the image so that the parallax can work.', 'bicycleshop' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'bicycleshop' ),
				'description'   => __( 'Works only with the horizontal header.', 'bicycleshop' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'bicycleshop' ),
					'content' => __( 'Yes, hide the content', 'bicycleshop' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'bicycleshop' ),
					'off'     => __( 'Turn it off', 'bicycleshop' ),
				),
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'bicycleshop' ),
				'description' => __( 'You can use global settings or override them here', 'bicycleshop' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'bicycleshop' ),
					'custom' => __( 'Use custom settings', 'bicycleshop' ),
					'off'    => __( 'Turn it off', 'bicycleshop' ),
				),
			),
			array(
				'name'        => __( 'Position', 'bicycleshop' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before the content', 'bicycleshop' ),
					'inside'  => __( 'Inside the content', 'bicycleshop' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'bicycleshop' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'bicycleshop' ),
					'centered' => __( 'Centered', 'bicycleshop' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'bicycleshop' ),
					'boxed' => __( 'Boxed', 'bicycleshop' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'bicycleshop' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'bicycleshop' ),
					'contain'  => __( 'Contain', 'bicycleshop' ),
					'fitV'     => __( 'Fit Vertically', 'bicycleshop' ),
					'fitH'     => __( 'Fit Horizontally', 'bicycleshop' ),
					'center'   => __( 'Just center', 'bicycleshop' ),
					'repeat'   => __( 'Repeat', 'bicycleshop' ),
					'repeat-x' => __( 'Repeat X', 'bicycleshop' ),
					'repeat-y' => __( 'Repeat Y', 'bicycleshop' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'bicycleshop' ),
					'off' => __( 'Disable', 'bicycleshop' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'bicycleshop' ). ' : ' . __( 'Type', 'bicycleshop' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'bicycleshop' ),
					"bt"   => __( 'bottom to top', 'bicycleshop' ),
					"lr"   => __( 'left to right', 'bicycleshop' ),
					"rl"   => __( 'right to left', 'bicycleshop' ),
					"tlbr" => __( 'top-left to bottom-right', 'bicycleshop' ),
					"trbl" => __( 'top-right to bottom-left', 'bicycleshop' ),
					"bltr" => __( 'bottom-left to top-right', 'bicycleshop' ),
					"brtl" => __( 'bottom-right to top-left', 'bicycleshop' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'bicycleshop' ). ' : ' . __( 'Speed', 'bicycleshop' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'bicycleshop' ),
				'description' => __( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
		),

	);

	return apply_filters( 'bicycleshop_meta_boxes_post', $meta );
}



function bicycleshop_meta_boxes_page() {
	$sidebars = array_merge(
		array(
			'default' => __( 'Default for pages', 'bicycleshop' ),
		),
		bicycleshop_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Layout &amp; Sidebar
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout &amp; Sidebar', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'bicycleshop' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'page_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'bicycleshop' ),
					'center'        => __( 'Center fixed width', 'bicycleshop' ),
					'left'          => __( 'Left fixed width', 'bicycleshop' ),
					'left_padding'  => __( 'Left fixed width + padding', 'bicycleshop' ),
					'right'         => __( 'Right fixed width', 'bicycleshop' ),
					'right_padding' => __( 'Right fixed width + padding', 'bicycleshop' ),
					'full_fixed'    => __( 'Full width + fixed content', 'bicycleshop' ),
					'full_padding'  => __( 'Full width + padding', 'bicycleshop' ),
					'full'          => __( 'Full width', 'bicycleshop' ),
				),
			),
			array(
				'name'        => esc_html__( 'Content', 'bicycleshop' ). ' : ' .esc_html__( 'Top/bottom padding', 'bicycleshop' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'bicycleshop' ),
					'top'    => __( 'Only top', 'bicycleshop' ),
					'bottom' => __( 'Only bottom', 'bicycleshop' ),
					'off'    => __( 'Both off', 'bicycleshop' ),
				),
			),
			array(
				'name'        => __( 'Content', 'bicycleshop' ). ' : ' .esc_html__( 'Left/right padding', 'bicycleshop' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'bicycleshop' ),
					'off'    => __( 'Both off', 'bicycleshop' ),
				),
			),
			array(
				'name'          => __( 'Sidebar', 'bicycleshop' ),
				'id'            => 'widget_area',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_sidebar',
				'options'       => array(
					'G'                     => __( 'Global settings', 'bicycleshop' ),
					'left-sidebar'          => __( 'Sidebar on the left', 'bicycleshop' ),
					'left-sidebar_and_nav'  => __( 'Children Navigation', 'bicycleshop' ) . ' + ' . __( 'Sidebar on the left', 'bicycleshop' ),
					/* translators: %s: Children Navigation */
					'left-nav'             => sprintf( __( 'Only %s on the left', 'bicycleshop' ), __( 'Children Navigation', 'bicycleshop' ) ),
					'right-sidebar'         => __( 'Sidebar on the right', 'bicycleshop' ),
					'right-sidebar_and_nav' => __( 'Children Navigation', 'bicycleshop' ) . ' + ' . __( 'Sidebar on the right', 'bicycleshop' ),
					/* translators: %s: Children Navigation */
					'right-nav'             => sprintf( __( 'Only %s on the right', 'bicycleshop' ), __( 'Children Navigation', 'bicycleshop' ) ),
					'off'                   => __( 'Off', 'bicycleshop' ),
				),
				'type'          => 'select',
			),
			array(
				'name'     => __( 'Sidebar to show', 'bicycleshop' ),
				'id'       => 'sidebar_to_show',
				'default'  => 'default',
				'options'  => $sidebars,
				'type'     => 'select',
				'required' => array( 'widget_area', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'bicycleshop' ),
				'description'   => __( 'Works only with the horizontal header.', 'bicycleshop' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'bicycleshop' ),
					'content' => __( 'Yes, hide the content', 'bicycleshop' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'bicycleshop' ),
					'off'     => __( 'Turn it off', 'bicycleshop' ),
				),
			),
			array(
				'name'          => __( 'Show header from the Nth row', 'bicycleshop' ),
				'description'   => __( 'Works only with the horizontal header.', 'bicycleshop' ). '<br />' . __( 'If you use Elementor or WPBakery Page Builder, then you can decide to show header after the content is scrolled to Nth row. Thanks to that you can have a clean welcome screen.', 'bicycleshop' ),
				'id'            => 'horizontal_header_show_header_at',
				'default'       => '0',
				'type'          => 'select',
				'options'       => array(
					'0' => __( 'Show always', 'bicycleshop' ),
					'1' => __( 'from 1st row', 'bicycleshop' ),
					'2' => __( 'from 2nd row', 'bicycleshop' ),
					'3' => __( 'from 3rd row', 'bicycleshop' ),
					'4' => __( 'from 4th row', 'bicycleshop' ),
					'5' => __( 'from 5th row', 'bicycleshop' ),
				),
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'bicycleshop' ),
				'description' => __( 'You can use global settings or override them here', 'bicycleshop' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'bicycleshop' ),
					'custom' => __( 'Use custom settings', 'bicycleshop' ),
					'off'    => __( 'Turn it off', 'bicycleshop' ),
				),
			),
			array(
				'name'        => __( 'Position', 'bicycleshop' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before the content', 'bicycleshop' ),
					'inside'  => __( 'Inside the content', 'bicycleshop' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'bicycleshop' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'bicycleshop' ),
					'centered' => __( 'Centered', 'bicycleshop' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'bicycleshop' ),
					'boxed' => __( 'Boxed', 'bicycleshop' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'bicycleshop' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'bicycleshop' ),
					'contain'  => __( 'Contain', 'bicycleshop' ),
					'fitV'     => __( 'Fit Vertically', 'bicycleshop' ),
					'fitH'     => __( 'Fit Horizontally', 'bicycleshop' ),
					'center'   => __( 'Just center', 'bicycleshop' ),
					'repeat'   => __( 'Repeat', 'bicycleshop' ),
					'repeat-x' => __( 'Repeat X', 'bicycleshop' ),
					'repeat-y' => __( 'Repeat Y', 'bicycleshop' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'bicycleshop' ),
					'off' => __( 'Disable', 'bicycleshop' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'bicycleshop' ). ' : ' . __( 'Type', 'bicycleshop' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'bicycleshop' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'bicycleshop' ),
					"bt"   => __( 'bottom to top', 'bicycleshop' ),
					"lr"   => __( 'left to right', 'bicycleshop' ),
					"rl"   => __( 'right to left', 'bicycleshop' ),
					"tlbr" => __( 'top-left to bottom-right', 'bicycleshop' ),
					"trbl" => __( 'top-right to bottom-left', 'bicycleshop' ),
					"bltr" => __( 'bottom-left to top-right', 'bicycleshop' ),
					"brtl" => __( 'bottom-right to top-left', 'bicycleshop' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'bicycleshop' ). ' : ' . __( 'Speed', 'bicycleshop' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'bicycleshop' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'bicycleshop' ),
				'description' => __( 'Will be placed above the image(if used)', 'bicycleshop' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'bicycleshop' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
		),

		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'bicycleshop' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'bicycleshop' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured Image ', 'bicycleshop' ). ' : ' . __( 'Parallax', 'bicycleshop' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'bicycleshop' ),
					'off' => __( 'Disable', 'bicycleshop' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => esc_html__( 'Parallax', 'bicycleshop' ). ' : ' . esc_html__( 'Area height', 'bicycleshop' ),
				'description' => __( 'This limits the height of the image so that the parallax can work.', 'bicycleshop' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Sticky one page mode
		 *
		 */
		'sticky_one_page' => array(
			array(
				'name' => __('Sticky One Page mode', 'bicycleshop'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-anchor'
			),
			array(
				'name'        => __( 'Sticky One Page mode', 'bicycleshop' ),
				'description' => __( 'This works only when page is designed with WPBakery Page Builder. With this option enabled, the page will turn into a vertical slider to the full height of the browser window, and each row created in the WPBakery Page Builder is a single slide.', 'bicycleshop' ),
				'id'          => 'content_sticky_one_page',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'bicycleshop' ),
					'off' => __( 'Disable', 'bicycleshop' ),
				),
			),
			array(
				'name'     => __( 'Color of navigation bullets', 'bicycleshop' ),
				'id'       => 'content_sticky_one_page_bullet_color',
				'default'  => 'rgba(0,0,0,1)',
				'type'     => 'color',
				'required' => array(
					array( 'content_sticky_one_page', '=', 'on' )
				)
			),
			array(
				'name'        => __( 'Default bullets icon', 'bicycleshop' ),
				'id'          => 'content_sticky_one_page_bullet_icon',
				'default'     => '',
				'type'        => 'text',
				'input_class' => 'a13-fa-icon a13-full-class',
				'required'    => array(
					array( 'content_sticky_one_page', '=', 'on' )
				)
			),
		),
	);

	return apply_filters( 'bicycleshop_meta_boxes_page', $meta );
}

function bicycleshop_meta_boxes_images_manager() {
	return apply_filters( 'bicycleshop_meta_boxes_images_manager', array('images_manager' => array()) );
}



function bicycleshop_get_socials_array() {
	global $bicycleshop_a13;

	$tmp_arr = array();
	$socials = $bicycleshop_a13->bicycleshop_get_social_icons_list();
	foreach ( $socials as $id => $social ) {
		array_push( $tmp_arr, array( 'name' => $social, 'id' => $id, 'type' => 'text' ) );
	}
	return $tmp_arr;
}



function bicycleshop_meta_boxes_people() {
	$meta =
		array(
			/*
			 *
			 * Tab: General
			 *
			 */
			'general' => array(
				array(
					'name' => __('General', 'bicycleshop'),
					'type' => 'fieldset',
					'tab'   => true,
					'icon'  => 'fa fa-wrench'
				),
				array(
						'name'        => __( 'Subtitle', 'bicycleshop' ),
						'description' => __( 'You can use HTML here.', 'bicycleshop' ),
						'id'          => 'subtitle',
						'default'     => '',
						'type'        => 'text'
				),
				array(
						'name'    => __( 'Testimonial', 'bicycleshop' ),
						'desc'    => '',
						'id'      => 'testimonial',
						'default' => '',
						'type'    => 'textarea'
				),
				array(
						'name'        => __( 'Overlay color', 'bicycleshop' ),
						'id'          => 'overlay_bg_color',
						'default'     => 'rgba(0,0,0,0.5)',
						'type'        => 'color'
				),
				array(
						'name'        => __( 'Overlay', 'bicycleshop' ). ' : ' .esc_html__( 'Text color', 'bicycleshop' ),
						'id'          => 'overlay_font_color',
						'default'     => 'rgba(255,255,255,1)',
						'type'        => 'color'
				),
			),

			/*
			 *
			 * Tab: Socials
			 *
			 */
			'socials' => array_merge(
				array(
					array(
						'name' => __('Social icons', 'bicycleshop'),
						'type' => 'fieldset',
						'tab'   => true,
						'icon'  => 'fa fa-facebook-official'
					),
				),
				bicycleshop_get_socials_array()
			),
		);

	return $meta;
}