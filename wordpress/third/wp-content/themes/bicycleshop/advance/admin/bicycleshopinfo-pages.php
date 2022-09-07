<?php
function bicycleshop_sktwb_info() {
	bicycleshop_theme_pages_header();

	global $bicycleshop_a13;
	echo '<h2>'.esc_html__( 'What\'s next?', 'bicycleshop' ).'</h2>';
	//check for companion plugin
	if( bicycleshop_is_companion_plugin_ready( esc_html__( 'This Theme requires an additional plugin before you will be able to use it. ', 'bicycleshop' ) ) ){
		echo '<p class="import_text">'.esc_html__( 'Import your Bicycleshop Template to complete the installation.', 'bicycleshop' ).
		     ' <a class="button import_button" href="'.esc_url( admin_url( 'admin.php?page=skt_template_directory' ) ).'">'.esc_html__( 'Go to SKT Templates', 'bicycleshop').'</a>'.
		     '</p>';

		echo '<p>'.esc_html__( 'Bicycleshop theme options help you with making your site beautiful.', 'bicycleshop' ).
		     ' <a class="button" href="'.esc_url( admin_url( 'customize.php') ).'">'.esc_html__( 'Go to Customizer', 'bicycleshop').'</a>'.
		     '</p>';
	}

	bicycleshop_theme_pages_footer();
}

function bicycleshop_sktwb_help() {
	bicycleshop_theme_pages_header();
	global $bicycleshop_a13;
	?>

	<h2><?php echo esc_html__( 'Where to get help?', 'bicycleshop' ); ?></h2>

	<h3 class="center"><a href="<?php echo esc_url('https://www.sktthemesdemo.net/documentation/bicycleshop-doc');?>" target="_blank"><?php echo esc_html__( 'Online Documentation', 'bicycleshop' ); ?></a></h3>
	<p><?php echo
		esc_html__( 'Online documentation is always most up to date if it comes to explaining how to work with the theme. It will come handy as the first source when you are trying to work out problematic topics.', 'bicycleshop' );
		?></p>

	<h2><?php echo esc_html__( 'Theme requirements:', 'bicycleshop' ); ?></h2>
	<div class="feature-section one-col">
		<div class="col">
			<?php bicycleshop_theme_requirements_table(); ?>
		</div>
	</div>

	<?php
	bicycleshop_theme_pages_footer();
}

function bicycleshop_theme_pages_header(){
	if(!current_user_can('install_plugins')){
		wp_die(esc_html__('Sorry, you are not allowed to access this page.', 'bicycleshop'));
	}
	$pages = array(
		'info' => esc_html__( 'Info', 'bicycleshop' ),
		'help' => esc_html__( 'Get Help', 'bicycleshop' ),
	);

	//check for current tab
	$current_subpage = isset( $_GET['subpage'] ) ? sanitize_text_field( wp_unslash( $_GET['subpage'] ) ) : 'info';
?>
<div class="wrap sktwb-page <?php echo esc_attr( $current_subpage ); ?> about-wrap">
	<h1><?php
		/* translators: %s: Theme name */
		echo sprintf( esc_html__( 'Welcome to %s Theme', 'bicycleshop' ), esc_html( BICYCLESHOP_OPTIONS_NAME_PART ) );
		?></h1>

	<div class="about-text">
		<?php echo esc_html__( 'Thanks for using Bicycleshop! We are glad that you have decided to use bicycleshop theme. We hope it will help you with making your site beautiful!', 'bicycleshop' ); ?><br />
	</div>
	<h2 class="nav-tab-wrapper wp-clearfix">
		<?php
		foreach($pages as $subpage => $title){
			$query_args = array(
				'page' => 'bicycleshopinfopage',
				'subpage' => $subpage
			);

			$is_current = $current_subpage === $subpage;

			echo '<a href="'.esc_url( add_query_arg( $query_args, admin_url( 'themes.php') ) ).'" class="nav-tab'.esc_attr( $is_current ? ' nav-tab-active' : '').'">'.esc_html( $title ).'</a>';
		}
		?>
	</h2>
	<?php
}

function bicycleshop_theme_pages_footer(){
	echo '</div>';
}

function bicycleshop_importer_grid_item($files_directory, $demo ){
	$current_item_categories = '';
	foreach ( $demo['categories'] as $category ) {
		$current_item_categories .= str_replace( ' ', '_', strtolower( $category ) ) . ' ';
	}

	echo '<div class="demo_grid_item" '.
	     'data-main_category="' . esc_attr( str_replace( ' ', '_', strtolower( implode( '|', $demo['categories'] ) ) ) ) . '" '.
	     'data-categories="' . esc_attr( $current_item_categories . ' ' . strtolower( $demo['name'] ) ) . '"'.
	     'data-full="' . esc_url( $files_directory . 'full.jpg' ) . '"'.
	     'data-id="' . esc_attr( $demo['id'] ) . '"'.
	     'data-name="' . esc_attr( $demo['name'] ) . '"'.
	     '>';
	echo '<div>';
	echo '<img class="thumb" src="' . esc_url( $files_directory . 'thumb.jpg' ).'">';
	echo '<div class="demo_grid_item_title" style="'. esc_attr( 'background-color:'.$demo['background'].';color:'.$demo['font_color'].';' ) .'">' . esc_html( implode( ' ', $demo['categories'] ) ) . '</div>';

	echo '<div class="action-bar">';
		echo '<a class="button demo-preview" href="' . esc_url( $demo['demo_url'] ) . '" target="_blank">' .
		     esc_html__( 'Live preview', 'bicycleshop' ) . '</a>'.
		     '<span class="a13_demo_name">' . esc_html( $demo['name'] ) .'</span>';
	if( in_array( 'pro', array_map( 'strtolower', $demo['categories'] ) ) ){
		$query_args = array(
			'page' => 'bicycleshopinfopage'
		);
	}
	else{
		echo '<button class="button button-primary demo-select" data-demo-id="' . esc_attr( $demo['id'] ) . '">' . esc_html__( 'Choose & move to next step', 'bicycleshop' ) . '</button>';
	}
	echo '</div>';//end .action-bar

	echo '</div>';//end .demo_grid_item > div
	echo '</div>';//end .demo_grid_item
}
