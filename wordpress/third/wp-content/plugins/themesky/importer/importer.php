<?php 
if( !class_exists('TS_Importer') ){
	class TS_Importer{

		function __construct(){
			add_filter( 'ocdi/plugin_page_title', array($this, 'import_notice') );
			
			add_filter( 'pt-ocdi/plugin_page_setup', array($this, 'import_page_setup') );
			add_action( 'pt-ocdi/before_widgets_import', array($this, 'before_widgets_import') );
			add_filter( 'pt-ocdi/import_files', array($this, 'import_files') );
			add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
			add_action( 'pt-ocdi/after_import', array($this, 'after_import_setup') );
			
			add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
		}
		
		function import_notice( $plugin_title ){
			$allowed_html = array(
				'a' => array( 'href' => array(), 'target' => array() )
			);
			ob_start();
			?>
			<div class="ts-ocdi-notice-info">
				<p>
					<i class="fas fa-exclamation-circle"></i>
					<span><?php echo wp_kses( __('If you have any problem with importer, please read this article <a href="https://ocdi.com/import-issues/" target="_blank">https://ocdi.com/import-issues/</a> and check your hosting configuration, or contact our support team here <a href="https://skygroup.ticksy.com/" target="_blank">https://skygroup.ticksy.com/</a>.', 'themesky'), $allowed_html ); ?></span>
				</p>
			</div>
			<?php
			$plugin_title .= ob_get_clean();
			return $plugin_title;
		}
		
		function import_page_setup( $default_settings ){
			$default_settings['parent_slug'] = 'themes.php';
			$default_settings['page_title']  = esc_html__( 'GoStore - Import Demo Content' , 'themesky' );
			$default_settings['menu_title']  = esc_html__( 'GoStore Importer' , 'themesky' );
			$default_settings['capability']  = 'import';
			$default_settings['menu_slug']   = 'gostore-importer';
			return $default_settings;
		}
		
		function before_widgets_import(){
			global $wp_registered_sidebars;
			$file_path = dirname(__FILE__) . '/data/custom_sidebars.txt';
			if( file_exists($file_path) ){
				$file_url = plugin_dir_url(__FILE__) . 'data/custom_sidebars.txt';
				$custom_sidebars = wp_remote_get( $file_url );
				$custom_sidebars = maybe_unserialize( trim( $custom_sidebars['body'] ) );
				update_option('ts_custom_sidebars', $custom_sidebars);
				
				if( is_array($custom_sidebars) && !empty($custom_sidebars) ){
					foreach( $custom_sidebars as $name ){
						$custom_sidebar = array(
											'name' 			=> ''.$name.''
											,'id' 			=> sanitize_title($name)
											,'description' 	=> ''
											,'class'		=> 'ts-custom-sidebar'
										);
						if( !isset($wp_registered_sidebars[$custom_sidebar['id']]) ){
							$wp_registered_sidebars[$custom_sidebar['id']] = $custom_sidebar;
						}
					}
				}
			}
		}
		
		function import_files(){
			return array(
				array(
					'import_file_name'           => 'Demo Import',
					'import_file_url'            => plugin_dir_url( __FILE__ ) . 'data/content.xml',
					'import_widget_file_url'     => plugin_dir_url( __FILE__ ) . 'data/widget_data.wie',
					'import_redux'               => array(
						array(
							'file_url'    => plugin_dir_url( __FILE__ ) . 'data/redux.json',
							'option_name' => 'gostore_theme_options',
						),
					)
				)
			);
		}
		
		function after_import_setup(){
			set_time_limit(0);
			$this->woocommerce_settings();
			$this->menu_locations();
			$this->set_homepage();
			$this->import_revslider();
			$this->change_url();
			$this->set_elementor_site_settings();
			$this->update_product_category_id_in_homepage_content();
			$this->update_mega_menu_content();
			$this->update_page_options();
			$this->delete_transients();
			$this->update_woocommerce_lookup_table();
			$this->update_menu_term_count();
		}
		
		/* WooCommerce Settings */
		function woocommerce_settings(){
			$woopages = array(
				'woocommerce_shop_page_id' 			=> 'Shop Page'
				,'woocommerce_cart_page_id' 		=> 'Cart'
				,'woocommerce_checkout_page_id' 	=> 'Checkout'
				,'woocommerce_myaccount_page_id' 	=> 'My Account'
				,'yith_wcwl_wishlist_page_id' 		=> 'Wishlist'
			);
			foreach( $woopages as $woo_page_name => $woo_page_title ) {
				$woopage = get_page_by_title( $woo_page_title );
				if( isset( $woopage->ID ) && $woopage->ID ) {
					update_option($woo_page_name, $woopage->ID);
				}
			}
			
			if( class_exists('YITH_Woocompare') ){
				update_option('yith_woocompare_compare_button_in_products_list', 'yes');
			}
			
			if( class_exists('YITH_WCWL') ){
				update_option('yith_wcwl_show_on_loop', 'yes');
			}

			if( class_exists('WC_Admin_Notices') ){
				WC_Admin_Notices::remove_notice('install');
			}
			delete_transient( '_wc_activation_redirect' );
			
			flush_rewrite_rules();
		}
		
		/* Menu Locations */
		function menu_locations(){
			$locations = get_theme_mod( 'nav_menu_locations' );
			$menus = wp_get_nav_menus();

			if( $menus ){
				foreach( $menus as $menu ){
					if( $menu->name == 'Main menu' ){
						$locations['primary'] = $menu->term_id;
					}
					if( $menu->name == 'Shop By Categories' ){
						$locations['vertical'] = $menu->term_id;
					}
					if( $menu->name == 'Menu mobile' ){
						$locations['mobile'] = $menu->term_id;
					}
				}
			}
			set_theme_mod( 'nav_menu_locations', $locations );
		}
		
		/* Set Homepage */
		function set_homepage(){
			$homepage = get_page_by_title( 'Electronic 01' );
			if( isset( $homepage->ID ) ){
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID);
			}
		}
		
		/* Import Revolution Slider */
		function import_revslider(){
			if ( class_exists( 'RevSliderSliderImport' ) ) {
				$rev_directory = dirname(__FILE__) . '/data/revslider/';
			
				foreach( glob( $rev_directory . '*.zip' ) as $file ){
					$import = new RevSliderSliderImport();
					$import->import_slider(true, $file);  
				}
			}
		}
		
		/* Change url */
		function change_url(){
			global $wpdb;
			$wp_prefix = $wpdb->prefix;
			$import_url = 'https://demo.theme-sky.com/gostore-import';
			$site_url = get_option( 'siteurl', '' );
			$wpdb->query("update `{$wp_prefix}posts` set `guid` = replace(`guid`, '{$import_url}', '{$site_url}');");
			$wpdb->query("update `{$wp_prefix}posts` set `post_content` = replace(`post_content`, '{$import_url}', '{$site_url}');");
			$wpdb->query("update `{$wp_prefix}posts` set `post_title` = replace(`post_title`, '{$import_url}', '{$site_url}') where post_type='nav_menu_item';");
			$wpdb->query("update `{$wp_prefix}postmeta` set `meta_value` = replace(`meta_value`, '{$import_url}', '{$site_url}');");
			$wpdb->query("update `{$wp_prefix}postmeta` set `meta_value` = replace(`meta_value`, '" . str_replace( '/', '\\\/', $import_url ) . "', '" . str_replace( '/', '\\\/', $site_url ) . "') where `meta_key` = '_elementor_data';");
			
			$option_name = 'gostore_theme_options';
			$option_ids = array(
						'ts_logo'
						,'ts_logo_mobile'
						,'ts_logo_sticky'
						,'ts_favicon'
						,'ts_custom_loading_image'
						,'ts_header_link_info'
						,'ts_store_notice'
						,'ts_header_feature_icon_1'
						,'ts_header_feature_icon_2'
						,'ts_header_feature_icon_3'
						,'ts_header_feature_link_1'
						,'ts_header_feature_link_2'
						,'ts_header_feature_link_3'
						,'ts_bg_breadcrumbs'
						,'ts_prod_placeholder_img'
						);
			$theme_options = get_option($option_name);
			if( is_array($theme_options) ){
				foreach( $option_ids as $option_id ){
					if( isset($theme_options[$option_id]) ){
						$theme_options[$option_id] = str_replace($import_url, $site_url, $theme_options[$option_id]);
					}
				}
				update_option($option_name, $theme_options);
			}
			
			$widgets = array(
				'media_image' 					=> array('url')
				,'ts_mailchimp_subscription' 	=> array('bg_img')
			);
			foreach( $widgets as $base => $fields ){
				$widget_instances = get_option( 'widget_' . $base, array() );
				if( is_array($widget_instances) ){
					foreach( $widget_instances as $number => $instance ){
						if( $number == '_multiwidget' ){
							continue;
						}
						foreach( $fields as $field ){
							if( isset($widget_instances[$number][$field]) ){
								$widget_instances[$number][$field] = str_replace($import_url, $site_url, $widget_instances[$number][$field]);
							}
						}
					}
					update_option( 'widget_' . $base, $widget_instances );
				}
			}
		}
		
		/* Set Elementor Site Settings */
		function set_elementor_site_settings(){
			$id = 0;
			
			$args = array(
				'post_type' 		=> 'elementor_library'
				,'post_status' 		=> 'public'
				,'posts_per_page'	=> 1
				,'orderby'			=> 'date'
				,'order'			=> 'ASC' /* Date is not changed when import. Use imported post */
			);
			
			$posts = new WP_Query( $args );
			if( $posts->have_posts() ){
				$id = $posts->post->ID;
				update_option('elementor_active_kit', $id);
			}
			
			if( $id ){ /* Fixed width, space, ... if query does not return the imported post */
				$page_settings = get_post_meta($id, '_elementor_page_settings', true);
			
				if( !is_array($page_settings) ){
					$page_settings = array();
				}
					
				if( !isset($page_settings['container_width']) ){
					$page_settings['container_width'] = array();
				}
				
				$page_settings['container_width']['unit'] = 'px';
				$page_settings['container_width']['size'] = 1320;
				$page_settings['container_width']['sizes'] = array();
				
				if( !isset($page_settings['space_between_widgets']) ){
					$page_settings['space_between_widgets'] = array();
				}
				
				$page_settings['space_between_widgets']['unit'] = 'px';
				$page_settings['space_between_widgets']['size'] = 20;
				$page_settings['space_between_widgets']['sizes'] = array();
				
				$page_settings['stretched_section_container'] = '#main';
				
				update_post_meta($id, '_elementor_page_settings', $page_settings);
			}
			
			/* Use color, font from theme */
			update_option('elementor_disable_color_schemes', 'yes');
			update_option('elementor_disable_typography_schemes', 'yes');
		}
		
		/* Update Product Category Id In Homepage Content */
		function update_product_category_id_in_homepage_content(){
			global $wpdb;
			$wp_prefix = $wpdb->prefix;
			
			$product_cats = get_terms( array(
							'taxonomy'		=> 'product_cat'
							,'hide_empty'	=> true
							,'orderby'		=> 'count'
							,'order'		=> 'desc'
							,'fields'		=> 'ids'
						)
					);
					
			if( is_array($product_cats) && count($product_cats) > 0 ){
				$pages = array(
					'Electronic 01'	=> array(
							array('395,403,396,404,405,406,400,398,399')
							,array('553,557,546,547,419,523,422,522,424,524')
							,array('535,407,417,409,416,410,418,415,411,408,413')
					)
					,'Electronic 02'	=> array(
							array('266')
							,array('535,293')
							,array('545,552,271')
					)
					,'Electronic 04'	=> array(
							array('395,403,404,396')
							,array('535,407,416,417')
							,array('546,547,553,419')
							,array('ids' => '395,403,396,404,405')
							,array('ids' => '526,531,530,528,529')
							,array('ids' => '395,403,396,404,405')
							,array('ids' => '546,547,548,549,550')
							,array('ids' => '553,554,555,556,557')
							,array('ids' => '407,411,413,410,416')
					)
					,'Electronic 05'	=> array(
							array('266,525,535,545')
					)
					,'Electronic 06'	=> array(
							array('266')
							,array('535,293')
							,array('546,547,553,419')
							,array('ids' => '395,403,396,404,405')
							,array('ids' => '526,531,530,528,529')
							,array('ids' => '395,403,396,404,405')
							,array('ids' => '546,547,548,549,550')
							,array('ids' => '553,554,555,556,557')
							,array('ids' => '407,411,413,410,416')
					)
					,'Electronic 07'	=> array(
							array('266,525,535,545')
					)
					,'Electronic 08'	=> array(
							array('266,525,535,545')
							,array('ids' => '395,403,396,404,405')
							,array('ids' => '526,531,530,528,529')
							,array('ids' => '395,403,396,404,405')
							,array('ids' => '546,547,548,549,550')
							,array('ids' => '553,554,555,556,557')
							,array('ids' => '407,411,413,410,416')
					)
				);
				
				foreach( $pages as $page_title => $need_replaced_cats ){
					$page = get_page_by_title( $page_title );
					if( is_object( $page ) ){
						$index = 0;
						foreach( $need_replaced_cats as $need_replaced_cat ){
							$key = key($need_replaced_cat);
							$need_replaced_cat = array_map('trim', explode(',', current($need_replaced_cat)));
							$num_cat = count( $need_replaced_cat );
							$replaced_cats = array();
							for( $i = 0; $i < $num_cat; $i++ ){
								if( !isset($product_cats[$index]) ){
									$index = 0;
								}
								$replaced_cats[] = $product_cats[$index];
								$index++;
							}
							$replaced_cats = array_unique($replaced_cats);
							
							if( is_numeric($key) ){
								$key = 'product_cats';
							}
							
							if( $key == 'product_cats' || $key == 'ids' ){
								$old_string = '"' . $key . '":["' . implode('","', $need_replaced_cat) . '"]';
								$new_string = '"' . $key . '":["' . implode('","', $replaced_cats) . '"]';
							}
							else{ /* one value */
								$old_string = '"' . $key . '":"' . implode('","', $need_replaced_cat) . '"';
								$new_string = '"' . $key . '":"' . implode('","', $replaced_cats) . '"';
							}
							
							$wpdb->query("update `{$wp_prefix}postmeta` set `meta_value` = replace(`meta_value`, '" . $old_string . "', '" . $new_string . "') where `meta_key` = '_elementor_data' and post_id=" . $page->ID . ";");
						}
					}
				}
			}
		}
		
		/* Update Mega Menu Content */
		function update_mega_menu_content(){
			global $wpdb;
			$wp_prefix = $wpdb->prefix;
			
			$mega_menus = array(
				'Accessories'				=> array(435 => 'Sub Accessories')
				,'Electronic & Houseware'	=> array(436 => 'Sub Electronic & Housewares')
				,'Cameras & Photos'			=> array(563 => 'Sub Cameras & Photos')
				,'Games & Accessories'		=> array(562 => 'Sub Games & Accessories')
				,'TV & Audio'				=> array(561 => 'Sub TV & Audio')
				,'Computers & Laptops'		=> array(560 => 'Sub Computers & Laptops')
				,'Smartphone & Tablet'		=> array(431 => 'Sub Smartphone & Tablet')
				,'Shop Menu'				=> array(289 => 'Menu shop layouts', 291 => 'Menu product types', 609 => 'Menu product details layouts')
				,'Page Menu'				=> array(309 => 'Menu page 01', 310 => 'Menu page 02')
			);
			
			foreach( $mega_menus as $title => $menus ){
				$mega_menu_post = get_page_by_title( $title, OBJECT, 'ts_mega_menu' );
				if( is_object( $mega_menu_post ) ){
					foreach( $menus as $old_id => $menu_name ){
						$menu = get_term_by( 'name', $menu_name, 'nav_menu' );
						if( isset($menu->term_id) ){
							$old_string = '"nav_menu":"' . $old_id . '"';
							$new_string = '"nav_menu":"' . $menu->term_id . '"';
							$wpdb->query("update `{$wp_prefix}postmeta` set `meta_value` = replace(`meta_value`, '" . $old_string . "', '" . $new_string . "') where `meta_key` = '_elementor_data' and post_id=" . $mega_menu_post->ID . ";");
						}
					}
				}
			}
		}
		
		/* Update Page Options */
		function update_page_options(){
			$vertical_menu = get_term_by( 'name', 'All Departments', 'nav_menu' );
			if( isset($vertical_menu->term_id) ){
				$pages = array('Electronic 02', 'Electronic 03', 'Electronic 04', 'Electronic 05', 'Electronic 06');
				foreach( $pages as $page_title ){
					$page = get_page_by_title( $page_title );
					if( is_object( $page ) ){
						update_post_meta( $page->ID, 'ts_vertical_menu_id', $vertical_menu->term_id );
					}
				}
			}
		}
		
		/* Delete transient */
		function delete_transients(){
			delete_transient('ts_mega_menu_custom_css');
			delete_transient('ts_product_deals_ids');
			delete_transient('wc_products_onsale');
		}
		
		/* Update WooCommerce Loolup Table */
		function update_woocommerce_lookup_table(){
			if( function_exists('wc_update_product_lookup_tables_is_running') && function_exists('wc_update_product_lookup_tables') ){
				if( !wc_update_product_lookup_tables_is_running() ){
					if( !defined('WP_CLI') ){
						define('WP_CLI', true);
					}
					wc_update_product_lookup_tables();
				}
			}
		}
		
		/* Update Menu Term Count - Keep this function until One Click Demo Import fixed */
		function update_menu_term_count(){
			$args = array(
						'taxonomy'		=> 'nav_menu'
						,'hide_empty'	=> 0
						,'fields'		=> 'ids'
					);
			$menus = get_terms( $args );
			if( is_array($menus) ){
				wp_update_term_count_now( $menus, 'nav_menu' );
			}
		}
	}
	new TS_Importer();
}
?>