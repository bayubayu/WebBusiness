<?php
/**
 * Adds WebBusiness_Social_Media_Widget widget.
 */
class WebBusiness_Social_Media_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'webbusiness_social_media_widget', // Base ID
			__('Social Media', 'webbusiness'), // Name
			array( 'description' => __( 'A social media widget', 'webbusiness' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		$text_output = "";
		
		foreach (webbusiness_get_social_medias() as $key => $value) {
			if (get_theme_mod( 'socialmedia_'.$key.'_url')) {
				$socialmedia_label = get_theme_mod( 'socialmedia_'.$key.'_label'); 
				if (!$socialmedia_label) {
					$socialmedia_label = $value;
				}
				
				$text_output .= "<li class=\"".$key."\"><a href=\"" . get_theme_mod('socialmedia_'.$key.'_url') . "\"><img src=\"" . get_template_directory_uri() . "/img/".$key.".png\" alt=\"" . $socialmedia_label . "\" /> " .$socialmedia_label."</a></li>";
			}
		}
	
		if ($text_output) {
			$text_output = "<ul class=\"social\">".$text_output."</ul>";
		}
		echo $text_output;
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Social Media', 'webbusiness' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} 

// register Foo_Widget widget
function register_webbusiness_social_media_widget() {
    register_widget( 'WebBusiness_Social_Media_Widget' );
}
add_action( 'widgets_init', 'register_webbusiness_social_media_widget' );
