<?php
use Elementor\Controls_Manager;

class TS_Elementor_Widget_Products extends TS_Elementor_Widget_Base{
	public function get_name(){
        return 'ts-products';
    }
	
	public function get_title(){
        return esc_html__( 'TS Products', 'themesky' );
    }
	
	public function get_categories(){
        return array( 'ts-elements', 'woocommerce-elements' );
    }
	
	public function get_icon(){
		return 'eicon-products';
	}
	
	protected function register_controls(){
		$this->start_controls_section(
            'section_general'
            ,array(
                'label' 	=> esc_html__( 'General', 'themesky' )
                ,'tab'   	=> Controls_Manager::TAB_CONTENT
            )
        );
		
		$this->add_title_and_style_controls();
		
		$this->add_control(
            'product_type'
            ,array(
                'label' 		=> esc_html__( 'Product type', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'recent'
				,'options'		=> array(
									'recent' 			=> esc_html__('Recent', 'themesky')
									,'sale' 			=> esc_html__('Sale', 'themesky')
									,'featured' 		=> esc_html__('Featured', 'themesky')
									,'best_selling' 	=> esc_html__('Best Selling', 'themesky')
									,'top_rated' 		=> esc_html__('Top Rated', 'themesky')
									,'mixed_order' 		=> esc_html__('Mixed Order', 'themesky')
									,'recently_viewed' 	=> esc_html__('Recently Viewed', 'themesky')
								)		
                ,'description' 	=> esc_html__( 'Select type of product', 'themesky' )
            )
        );
		
		$this->add_control(
            'viewed_by_all_users'
            ,array(
                'label' 		=> esc_html__( 'Viewed by all users', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '1'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> esc_html__( 'Get products which were viewed by all users or only the current user', 'themesky' )
				,'condition'	=> array( 'product_type' => 'recently_viewed' )
            )
        );
		
		$this->add_control(
            'columns'
            ,array(
                'label'     	=> esc_html__( 'Columns', 'themesky' )
                ,'type'     	=> Controls_Manager::NUMBER
				,'default'  	=> 4
				,'min'      	=> 1
            )
        );
		
		$this->add_control(
            'limit'
            ,array(
                'label'     	=> esc_html__( 'Limit', 'themesky' )
                ,'type'     	=> Controls_Manager::NUMBER
				,'default'  	=> 4
				,'min'      	=> 1
				,'description' 	=> esc_html__( 'Number of Products', 'themesky' )
            )
        );
		
		$this->add_control(
            'product_cats'
            ,array(
                'label' 		=> esc_html__( 'Product categories', 'themesky' )
                ,'type' 		=> 'ts_autocomplete'
                ,'default' 		=> array()
				,'options'		=> array()
				,'autocomplete'	=> array(
					'type'		=> 'taxonomy'
					,'name'		=> 'product_cat'
				)
				,'multiple' 	=> true
				,'sortable' 	=> false
				,'label_block' 	=> true
            )
        );
		
		$this->add_control(
            'ids'
            ,array(
                'label' 		=> esc_html__( 'Specific products', 'themesky' )
                ,'type' 		=> 'ts_autocomplete'
                ,'default' 		=> array()
				,'options'		=> array()
				,'autocomplete'	=> array(
					'type'		=> 'post'
					,'name'		=> 'product'
				)
				,'multiple' 	=> true
				,'label_block' 	=> true
				,'condition'	=> array( 'product_type!' => 'recently_viewed' )
            )
        );
		
		$this->add_product_meta_controls();
		
		$this->add_product_color_swatch_controls();
		
		$this->add_control(
            'view_more_text'
            ,array(
                'label' 		=> esc_html__( 'View more button text', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> ''		
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'view_more_link'
            ,array(
                'label' 		=> esc_html__( 'View more link', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> ''		
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'banner'
            ,array(
                'label' 		=> esc_html__( 'Banner', 'themesky' )
                ,'type' 		=> Controls_Manager::MEDIA
                ,'default' 		=> array( 'id' => '', 'url' => '' )
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'mobile_banner'
            ,array(
                'label' 		=> esc_html__( 'Mobile Banner', 'themesky' )
                ,'type' 		=> Controls_Manager::MEDIA
                ,'default' 		=> array( 'id' => '', 'url' => '' )
                ,'description' 	=> esc_html__( 'Use this banner for mobile. If not selected, it will show banner above', 'themesky' )
            )
        );
		
		$this->add_control(
            'banner_position'
            ,array(
                'label' 		=> esc_html__( 'Banner position', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'banner-right'
				,'options'		=> array(
									'banner-left'	=> esc_html__( 'Left', 'themesky' )
									,'banner-right'	=> esc_html__( 'Right', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'banner_link'
            ,array(
                'label'     	=> esc_html__( 'Banner link', 'themesky' )
                ,'type'     	=> Controls_Manager::URL
				,'default'  	=> array( 'url' => '', 'is_external' => true, 'nofollow' => true )
				,'show_external'=> true
            )
        );
		
		$this->end_controls_section();
		
		$this->start_controls_section(
            'section_slider'
            ,array(
                'label' 	=> esc_html__( 'Slider', 'themesky' )
                ,'tab'   	=> Controls_Manager::TAB_CONTENT
            )
        );
		
		$this->add_control(
            'is_slider'
            ,array(
                'label' 		=> esc_html__( 'Show in a carousel slider', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'only_slider_mobile'
            ,array(
                'label' 		=> esc_html__( 'Only show slider on mobile', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> esc_html__( 'Show Grid on desktop and only enable Slider on mobile', 'themesky' )
            )
        );
		
		$this->add_control(
            'rows'
            ,array(
                'label' 		=> esc_html__( 'Rows', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '1'
				,'options'		=> array(
									'1'		=> '1'
									,'2'	=> '2'
									,'3'	=> '3'
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'show_nav'
            ,array(
                'label' 		=> esc_html__( 'Show navigation button', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
									
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'nav_style'
            ,array(
                'label' 		=> esc_html__( 'Navigation style', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> ''
				,'options'		=> array(
									''			=> esc_html__( 'Default', 'themesky' )
									,'nav-text'	=> esc_html__( 'Text', 'themesky' )
								)		
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'prev_nav_text'
            ,array(
                'label' 		=> esc_html__( 'Previous navigation button text', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> 'PREV'		
                ,'description' 	=> ''
                ,'condition' 	=> array( 'nav_style' => 'nav-text' )
            )
        );
		
		$this->add_control(
            'next_nav_text'
            ,array(
                'label' 		=> esc_html__( 'Next navigation button text', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> 'NEXT'		
                ,'description' 	=> ''
                ,'condition' 	=> array( 'nav_style' => 'nav-text' )
            )
        );
		
		$this->add_control(
            'auto_play'
            ,array(
                'label' 		=> esc_html__( 'Auto play', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'disable_slider_responsive'
            ,array(
                'label' 		=> esc_html__( 'Disable slider responsive', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> esc_html__( 'You should only enable this option when Columns is 1 or 2', 'themesky' )
            )
        );

		$this->end_controls_section();
	}
	
	protected function render(){
		$settings = $this->get_settings_for_display();
		
		$default = array(
			'title'						=> ''
			,'title_style'				=> 'title-default'
			,'product_type'				=> 'recent'
			,'viewed_by_all_users'		=> 1
			,'columns' 					=> 4
			,'limit' 					=> 4
			,'product_cats'				=> array()
			,'ids'						=> array()
			,'show_image' 				=> 1
			,'show_title' 				=> 1
			,'show_sku' 				=> 0
			,'show_price' 				=> 1
			,'show_short_desc'  		=> 0
			,'show_rating' 				=> 0
			,'show_label' 				=> 1	
			,'show_categories'			=> 0	
			,'show_add_to_cart' 		=> 1
			,'show_color_swatch'		=> 0
			,'number_color_swatch'		=> 3
			,'view_more_text'			=> ''
			,'view_more_link'			=> ''
			,'banner'					=> array( 'id' => '', 'url' => '' )
			,'mobile_banner'			=> array( 'id' => '', 'url' => '' )
			,'banner_position'			=> 'banner-right'
			,'banner_link'				=> array( 'url' => '', 'is_external' => true, 'nofollow' => true )
			,'is_slider'				=> 0
			,'only_slider_mobile'		=> 0
			,'rows' 					=> 1
			,'show_nav'					=> 0
			,'nav_style'				=> ''
			,'prev_nav_text' 			=> 'PREV'
			,'next_nav_text' 			=> 'NEXT'
			,'auto_play'				=> 0
			,'disable_slider_responsive'=> 0
		);
		
		$settings = wp_parse_args( $settings, $default );
		
		extract( $settings );
		
		if ( !class_exists('WooCommerce') ){
			return;
		}
		
		if( $only_slider_mobile && !wp_is_mobile() ){
			$is_slider = false;
		}
		
		$options = array(
				'show_image'			=> $show_image
				,'show_label'			=> $show_label
				,'show_title'			=> $show_title
				,'show_sku'				=> $show_sku
				,'show_price'			=> $show_price
				,'show_short_desc'		=> $show_short_desc
				,'show_categories'		=> $show_categories
				,'show_rating'			=> $show_rating
				,'show_add_to_cart'		=> $show_add_to_cart
				,'show_color_swatch'	=> $show_color_swatch
				,'number_color_swatch'	=> $number_color_swatch
			);
		ts_remove_product_hooks( $options );
		
		$args = array(
			'post_type'				=> 'product'
			,'post_status' 			=> 'publish'
			,'ignore_sticky_posts'	=> 1
			,'posts_per_page' 		=> $limit
			,'orderby' 				=> 'date'
			,'order' 				=> 'desc'
			,'meta_query' 			=> WC()->query->get_meta_query()
			,'tax_query'           	=> WC()->query->get_tax_query()
		);
		
		ts_filter_product_by_product_type($args, $product_type);

		if( is_array($product_cats) && count($product_cats) > 0 ){
			$args['tax_query'][] = array(
										'taxonomy' 	=> 'product_cat'
										,'terms' 	=> $product_cats
										,'field' 	=> 'term_id'
									);
		}
		
		if( $product_type == 'recently_viewed' ){
			$ids = ts_get_recently_viewed_products( $viewed_by_all_users );
		}
		
		if( is_array($ids) && count($ids) > 0 ){
			$args['post__in'] = $ids;
			$args['orderby'] = 'post__in';
		}
		
		global $post;
		if( (int)$columns <= 0 ){
			$columns = 5;
		}
		
		$old_woocommerce_loop_columns = wc_get_loop_prop('columns');
		wc_set_loop_prop('columns', $columns);
		
		$has_banner = !empty( $banner['id'] );

		$products = new WP_Query( $args );
		
		$classes = array();
		$classes[] = 'ts-product-wrapper ts-shortcode ts-product woocommerce';
		$classes[] = 'columns-' . $columns;
		$classes[] = $product_type;
		if( $show_color_swatch ){
			$classes[] = 'show-color-swatch';
		}
		if( $has_banner ){
			$classes[] = $banner_position;
		}
		
		if( $is_slider ){
			$classes[] = 'ts-slider';
			$classes[] = 'rows-' . $rows;
			if( $show_nav ){
				$classes[] = 'show-nav';
				if( !$nav_style ){
					$prev_nav_text 	= '';
					$next_nav_text 	= '';
					$classes[] = 'nav-middle';
					if( $rows < 2){
						$classes[] = 'middle-thumbnail';
					}
				}
				$classes[] = $nav_style;
			}
		}
		
		$data_attr = array();
		if( $is_slider ){
			$data_attr[] = 'data-nav="'.$show_nav.'"';
			$data_attr[] = 'data-autoplay="'.$auto_play.'"';
			$data_attr[] = 'data-columns="'.$columns.'"';
			$data_attr[] = 'data-disable_responsive="'.$disable_slider_responsive.'"';
			$data_attr[] = 'data-prev_nav_text="'.$prev_nav_text.'"';
			$data_attr[] = 'data-next_nav_text="'.$next_nav_text.'"';
		}
		
		if( $products->have_posts() ): 
		?>
		<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" <?php echo implode(' ', $data_attr) ?>>
		
			<?php if( $title ): ?>
			<header class="shortcode-heading-wrapper">
				<h2 class="shortcode-title">
					<?php echo esc_html($title); ?>
				</h2>
			</header>
			<?php endif; ?>
			
			<?php if( $has_banner ){ ?>
			<div class="group-content">
			<?php } ?>
			
				<div class="content-wrapper <?php echo ($is_slider)?'loading':'' ?>">
					<?php
					$count = 0;
					woocommerce_product_loop_start();
					while( $products->have_posts() ){ 
						$products->the_post();	
						if( $is_slider && $rows > 1 && $count % $rows == 0 ){
							echo '<div class="product-group">';
						}
						wc_get_template_part( 'content', 'product' );
						if( $is_slider && $rows > 1 && ($count % $rows == $rows - 1 || $count == $products->post_count - 1) ){
							echo '</div>';
						}
						$count++;
					}

					woocommerce_product_loop_end();
					?>
				</div>
				
				<?php
				if( $has_banner ){
					$banner_link_attr = $this->generate_link_attributes( $banner_link );
				?>
				<div class="banner">
					<?php
					if( $banner_link_attr ){
						echo '<a ' . implode(' ', $banner_link_attr) . '>';
					}
					
					if( !empty( $mobile_banner['id'] ) && ( wp_is_mobile() || wp_doing_ajax() || ( isset($_GET['action']) && $_GET['action'] == 'elementor' ) ) ){
						echo wp_get_attachment_image( $mobile_banner['id'], 'full', false, array( 'class' => 'mobile-banner' ) );
					}
					
					echo wp_get_attachment_image( $banner['id'], 'full', false, array( 'class' => 'main-banner' ) );
					
					if( $banner_link_attr ){
						echo '</a>';
					}
					?>
				</div>
				<?php } ?>
			
			<?php if( $has_banner ){ ?>
			</div>
			<?php } ?>
			
			<?php if( $view_more_text && $view_more_link ): ?>
			<a class="view-more" href="<?php echo esc_url($view_more_link); ?>"><?php echo esc_html($view_more_text) ?></a>
			<?php endif; ?>
			
		</div>
		<?php
		endif;
		
		wp_reset_postdata();

		/* restore hooks */
		ts_restore_product_hooks();

		wc_set_loop_prop('columns', $old_woocommerce_loop_columns);
	}
}

$widgets_manager->register_widget_type( new TS_Elementor_Widget_Products() );