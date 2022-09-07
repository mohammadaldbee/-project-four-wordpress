<?php
/**
 * TGMPA plugin installer config
 */
function bicycleshop_register_required_plugins() {
	/**
	 * Array of configuration settings. Amend each line as needed.
	 */

	tgmpa(
		array(
			array(
				'name'               => esc_html__( 'SKT Templates – Elementor & Gutenberg templates', 'bicycleshop' ),
				'slug'               => 'skt-templates',
				'required'           => false,
				'version'            => BICYCLESHOP_MIN_COMPANION_VERSION,
				'force_activation'   => false,
				'force_deactivation' => false,
			)
		)
	);
}


add_action('tgmpa_register', 'bicycleshop_register_required_plugins');