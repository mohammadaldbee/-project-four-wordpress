<?php
add_action('widgets_init', 'ts_mailchimp_subscription_load_widgets');

function ts_mailchimp_subscription_load_widgets()
{
	register_widget('TS_Mailchimp_Subscription_Widget');
}

if( !class_exists('TS_Mailchimp_Subscription_Widget') ){
	class TS_Mailchimp_Subscription_Widget extends WP_Widget {

		function __construct() {
			$widgetOps = array('classname' => 'mailchimp-subscription', 'description' => esc_html__('Display Mailchimp Subscription Form', 'themesky'));
			parent::__construct('ts_mailchimp_subscription', esc_html__('TS - Mailchimp Subscription', 'themesky'), $widgetOps);
		}

		function widget( $args, $instance ) {
			extract($args);
			
			$defaults = $this->get_default_values();
			
			$instance = wp_parse_args($instance, $defaults);
			
			extract($instance);
			
			$title = apply_filters('widget_title', $title);
			
			if( !$form ){
				return;
			}
			
			if( !$before_widget ){ /* Added by Elementor */
				$before_widget = '<div class="mailchimp-subscription">';
				$after_widget = '</div>';
			}
			
			if( $bg_img ){
				$before_widget = str_replace('>', ' style="background: url(' . esc_url($bg_img) . ')">', $before_widget);
			}
			
			echo $before_widget;
			
			if( $title ){
				echo $before_title . $title . $after_title;
			}
			?>
			<div class="subscribe-widget" >
				
				<?php if( $intro_text != '' ): ?>
				<div class="newsletter">
					<p><?php echo esc_html($intro_text); ?></p>
				</div>
				<?php endif; ?>
				
				<?php echo do_shortcode('[mc4wp_form id="'.$form.'"]'); ?>
			</div>

			<?php
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance 				= $old_instance;		
			$instance['title'] 		= $new_instance['title'];
			$instance['intro_text'] = $new_instance['intro_text'];
			$instance['form'] 		= $new_instance['form'];
			$instance['bg_img'] 	= $new_instance['bg_img'];
			return $instance;
		}

		function get_default_values(){
			return array(
				'title' 			=> 'Newsletter' 
				,'intro_text' 		=> 'Enjoy our newsletter to stay updated with the latest news and special sales. Let\'s your email address here!'
				,'form' 			=> ''
				,'bg_img' 			=> ''
			);
		}

		function form( $instance ) {
			$defaults = $this->get_default_values();
		
			$instance = wp_parse_args( (array) $instance, $defaults );
			$mc_forms = $this->get_mailchimp_forms();
		?>
			<p>
				<label for="<?php echo $this->get_field_id('form'); ?>"><?php esc_html_e('Select Form', 'themesky'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('form'); ?>" name="<?php echo $this->get_field_name('form'); ?>">
					<option value="" <?php selected($instance['form'], '') ?>></option>
					<?php foreach( $mc_forms as $mc_form ): ?>
					<option value="<?php echo esc_attr($mc_form['id']) ?>" <?php selected($instance['form'], $mc_form['id']) ?>><?php echo esc_html($mc_form['title']) ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Enter title', 'themesky'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('intro_text'); ?>"><?php esc_html_e('Enter intro text', 'themesky'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('intro_text'); ?>" name="<?php echo $this->get_field_name('intro_text'); ?>" value="<?php echo esc_attr($instance['intro_text']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('bg_img'); ?>"><?php esc_html_e('Background image', 'themesky'); ?></label>
				<input class="widefat upload_field" type="text" id="<?php echo $this->get_field_id('bg_img'); ?>" name="<?php echo $this->get_field_name('bg_img'); ?>" value="<?php echo esc_attr($instance['bg_img']); ?>" />
				<input type="button" class="ts_meta_box_upload_button button-primary" value="<?php esc_attr_e('Select Image', 'themesky'); ?>">
				<input type="button" class="ts_meta_box_clear_image_button button-secondary" value="<?php esc_attr_e('Clear Image', 'themesky'); ?>" <?php echo !$instance['bg_img']?'disabled="disabled"':''; ?>>
				<?php if( $instance['bg_img'] ): ?>
				<img class="preview-image" src="<?php echo esc_url($instance['bg_img']) ?>" />
				<?php endif; ?>
			</p>
			<?php 
		}
		
		function get_mailchimp_forms(){
			$results = array();
			
			$args = array(
				'post_type'			=> 'mc4wp-form'
				,'post_status'		=> 'publish'
				,'posts_per_page'	=> -1
			);
			
			$forms = new WP_Query( $args );
			if( !empty( $forms->posts ) && is_array( $forms->posts ) ){
				foreach( $forms->posts as $p ){
					$results[] = array(
						'id'		=> $p->ID
						,'title'	=> $p->post_title
					);
				}
			}
			
			return $results;
		}
	}
}

