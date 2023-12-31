<?php
/**
 * UserEcho Latest Questions Widget
 * 
 *          @wordpress-plugin
 *          Plugin Name: UserEcho Latest Questions Widget
 *          Plugin URI: https://www.imh.com/
 *          Description: A widget that displays the latest Topics from a specific category.
 *          Version: 1.0.0
 *          Author: IMH
 *          Author URI: https://www.imh.com/
 *          License: GPL-2.0+
 *          License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *          Text Domain: ue-latest-questions
 *          Domain Path: /languages
 *
 **/

 // Creating the widget
class ue_latest_questions_widget extends WP_Widget {
 
	function __construct() {
	parent::__construct(
	 
	// Base ID of your widget
	'ue_latest_questions_widget', 
	 
	// Widget name will appear in UI
	__('UserEcho Latest Questions Widget', 'ue_latest_questions_domain'), 
	 
	// Widget description
	array( 'description' => __( 'Widget to display Latest Questions from a UserEcho category', 'ue_latest_questions_domain' ), )
	);
	}
	 
	// Creating widget front-end
	 
	public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	 
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	 
	// This is where you run the code and display the output
	echo __( 'Hello, World!', 'ue_latest_questions_domain' );
	echo $args['after_widget'];
	}
	 
	// Widget Backend
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'New title', 'wpb_widget_domain' );
	}
	// Widget admin form
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'category-id' ); ?>"><?php _e( 'Category ID:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category-id' ); ?>" name="<?php echo $this->get_field_name( 'category-id' ); ?>" type="text" value="<?php echo esc_attr( $category_id ); ?>" />
	</p>
	<?php
	}
	 
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}
	 
	// Class wpb_widget ends here
	} 
	 
	// Register and load the widget
	function wpb_load_widget() {
		register_widget( 'wpb_widget' );
	}
	add_action( 'widgets_init', 'wpb_load_widget' );