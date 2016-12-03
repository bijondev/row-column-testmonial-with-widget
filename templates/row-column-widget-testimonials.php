<?php
if ( ! defined( 'ABSPATH' )) exit;
class rct_testimonials_Widget extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'classname' => 'widget_rct_testimonials', 'description' => __( 'Display testimonials on your site.', 'rc-testimonial-with-widget' ) );
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'rct_testimonials' );
        parent::__construct( 'rct_testimonials', __( 'Row Column Testimonials Slider', 'rc-testimonial-with-widget' ), $widget_ops, $control_ops );
    }
    function widget( $args, $instance ) {

        extract( $args, EXTR_SKIP );
       $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $args = array();
        if ( $title ) {
            $args['title'] = $title;
        }
        if ( isset( $instance['limit'] ) && ( 0 < count( $instance['limit'] ) ) ) { $args['limit'] = intval( $instance['limit'] ); }
        if ( isset( $instance['category'] ) && is_numeric( $instance['category'] ) ) $args['category'] = intval( $instance['category'] );
        if ( isset( $instance['dots'] ) && in_array( $instance['dots'], array_keys( $this->get_other_options() ) ) ) { $args['dots'] = $instance['dots']; }
        if ( isset( $instance['arrows'] ) && in_array( $instance['arrows'], array_keys( $this->get_other_options() ) ) ) { $args['arrows'] = $instance['arrows']; }
        if ( isset( $instance['autoplay'] ) && in_array( $instance['autoplay'], array_keys( $this->get_other_options() ) ) ) { $args['autoplay'] = $instance['autoplay']; }
        if ( isset( $instance['autoplayInterval'] ) && ( 0 < count( $instance['autoplayInterval'] ) ) ) { $args['autoplayInterval'] = intval( $instance['autoplayInterval'] ); }

        if ( isset( $instance['slides_row'] ) && ( 0 < count( $instance['slides_row'] ) ) ) { $args['slides_row'] = intval( $instance['slides_row'] ); }

		if ( isset( $instance['slides_column'] ) && ( 0 < count( $instance['slides_column'] ) ) ) { $args['slides_column'] = intval( $instance['slides_column'] ); }
		if ( isset( $instance['slides_scroll'] ) && ( 0 < count( $instance['slides_scroll'] ) ) ) { $args['slides_scroll'] = intval( $instance['slides_scroll'] ); }
        if ( isset( $instance['speed'] ) && ( 0 < count( $instance['speed'] ) ) ) { $args['speed'] = intval( $instance['speed'] ); }
        if ( isset( $instance['display_client'] ) && ( 1 == $instance['display_client'] ) ) { $args['display_client'] = true; } else { $args['display_client'] = false; }
        if ( isset( $instance['display_avatar'] ) && ( 1 == $instance['display_avatar'] ) ) { $args['display_avatar'] = true; } else { $args['display_avatar'] = false; }
        if ( isset( $instance['display_quotes'] ) && empty($instance['display_quotes']) ) { $args['display_quotes'] = false; } else { $args['display_quotes'] = true; }
        if ( isset( $instance['display_job'] ) && ( 1 == $instance['display_job'] ) ) { $args['display_job'] = true; } else { $args['display_job'] = false; }
        if ( isset( $instance['display_company'] ) && ( 1 == $instance['display_company'] ) ) { $args['display_company'] = true; } else { $args['display_company'] = false; }
        if ( isset( $instance['image_style'] ) && in_array( $instance['image_style'], array_keys( $this->image_style_options() ) ) ) { $args['image_style'] = $instance['image_style']; }
		if ( isset( $instance['design'] ) && in_array( $instance['design'], array_keys( $this->design_options() ) ) ) { $args['design'] = $instance['design']; }
        if ( isset( $instance['orderby'] ) && in_array( $instance['orderby'], array_keys( $this->get_orderby_options() ) ) ) { $args['orderby'] = $instance['orderby']; }
        if ( isset( $instance['order'] ) && in_array( $instance['order'], array_keys( $this->get_order_options() ) ) ) { $args['order'] = $instance['order']; }


    $defaults = apply_filters( 'rct_testimonials_default_args', array(
        'limit'             => -1,
        'orderby'           => 'menu_order',
        'order'             => 'DESC',
        'title'             => '',
        'category'          => 0,
         'slides_row'     => 1,
		 'slides_column'     => 1,
        'slides_scroll'     => 1, 
        'display_client'    => true,
        'display_avatar'    => true,
        'display_quotes'    => true,
        'display_job'       => true,
        'display_company'   => true,
        'image_style'       => "circle",
		'design'       		=> "design-1",
        'dots'              => "true",
        'arrows'            => "true",
        'autoplay'          => "true",      
        'autoplayInterval'  => 3000,                
        'speed'             => 300,
        'size'              => 100,
    ) );
     $args = shortcode_atts( $defaults, $args );
     $unique = rct_get_unique();
    if ( isset( $args['limit'] ) ) $args['limit'] = intval( $args['limit'] );
    if ( isset( $args['size'] ) &&  ( 0 < intval( $args['size'] ) ) ) $args['size'] = intval( $args['size'] );
    if ( isset( $args['category'] ) && is_numeric( $args['category'] ) ) $args['category'] = intval( $args['category'] );
    if ( isset( $args['arrows'] ) ) $args['arrows'] =  $args['arrows'] ;
    if ( isset( $args['autoplay'] ) ) $args['autoplay'] =  $args['autoplay'] ;
	 if ( isset( $args['slides_scroll'] ) ) $args['slides_scroll'] =  $args['slides_scroll'] ;
	  if ( isset( $args['slides_scroll'] ) ) $args['slides_scroll'] =  $args['slides_scroll'] ;
    if ( isset( $args['autoplayInterval'] ) ) $args['autoplayInterval'] = intval( $args['autoplayInterval'] );
    if ( isset( $args['speed'] ) ) $args['speed'] = intval( $args['speed'] );
        foreach ( array( 'display_client', 'display_job','display_company', 'display_avatar', 'display_quotes' ) as $k => $v ) {
        if ( isset( $args[$v] ) && ( 'true' == $args[$v] ) ) {
            $args[$v] = true;
        } else {
            $args[$v] = false;
        }
    }

    $query = rct_get_testimonials($args);
   
    ?>
  
    <aside id="testimonial-1" class="widget widget_rct_testimonials">
        <?php  if ( '' != $args['title'] ) {
                echo '<h2 class="widget-title">' . esc_html( $args['title'] ) . '</h2>' . "\n";
            }?>
        <div class="testimonials-slide-widget-<?php echo $unique; ?> testimonials-slide-widget <?php echo $args['design']?>">
        <?php
          $count = 0;
            foreach ( $query as $post ) { 
                                $count++;
                $css_class = 'quote';
                // Add a CSS class if no image is available.
                if ( isset( $post->image ) && ( '' == $post->image ) ) {
                    $css_class .= ' no-image';
                }
                if($args['design'] == 'design-1'){
                include('designs/design-1.php');
				?>
               
           <?php } else if ($args['design'] == 'design-2'){ ?>
                <?php include('designs/design-2.php');?>
           <?php }  
		   else if ($args['design'] == 'design-3'){ ?>
                <?php include('designs/design-3.php');?>
           <?php }

            } ?>
             </div>
			   <script type="text/javascript">
			   <?php 
                if($args['slides_row'] != "" && $args['slides_row'] != "0"){
                    $slides_row = $args['slides_row'];}
                    else{$slides_row = 1;}

               if($args['slides_column'] != "" && $args['slides_column'] != "0"){
					$slidesToShow = $args['slides_column'];}
                    else{$slidesToShow = 1;}

					if($args['slides_scroll'] != "" && $args['slides_scroll'] != "0"){
					$slidesToScroll = $args['slides_scroll'];}else{$slidesToScroll = 1;}?>
        jQuery(document).ready(function(){
        jQuery('.testimonials-slide-widget-<?php echo $unique; ?>').slick({
            rows: <?php echo $slides_row; ?>,
            dots: <?php echo $instance['dots']?>,
            infinite: true,
            arrows: <?php echo $instance['arrows']?>,
           speed: <?php echo $args['speed']?>,
            autoplay: <?php echo $args['autoplay']?>,                       
            autoplaySpeed: <?php echo $args['autoplayInterval']?>,
            slidesToShow: <?php echo $slidesToShow; ?>,
            slidesToScroll: <?php echo $slidesToScroll; ?>
        });
    });
    </script>
             </aside>
             <?php 
    }

    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']              = strip_tags( $new_instance['title'] );
        $instance['limit']              = intval( $new_instance['limit'] );
        $instance['slides_row']      = intval( $new_instance['slides_row'] );
        $instance['slides_column']      = intval( $new_instance['slides_column'] );
        $instance['slides_scroll']      = intval( $new_instance['slides_scroll'] );
        $instance['category']           = intval( $new_instance['category'] );
        $instance['orderby']            = esc_attr( $new_instance['orderby'] );
        $instance['order']              = esc_attr( $new_instance['order'] );
        $instance['image_style']        = esc_attr( $new_instance['image_style'] );
		$instance['design']        		= esc_attr( $new_instance['design'] );
        $instance['dots']               = esc_attr( $new_instance['dots'] );
        $instance['arrows']             = esc_attr( $new_instance['arrows'] );
        $instance['autoplay']           = esc_attr( $new_instance['autoplay'] );
        $instance['autoplayInterval']   = intval( $new_instance['autoplayInterval'] );
        $instance['speed']              = intval( $new_instance['speed'] );
        $instance['display_client']     = (bool) esc_attr( $new_instance['display_client'] );
        $instance['display_avatar']     = (bool) esc_attr( $new_instance['display_avatar'] );
        $instance['display_quotes']     = (bool) esc_attr( $new_instance['display_quotes'] );
        $instance['display_job']        = (bool) esc_attr( $new_instance['display_job'] );
        $instance['display_company']    = (bool) esc_attr( $new_instance['display_company'] );
        return $instance;
    } 

    function form( $instance ) {
        $defaults = array(
        'limit'             => -1,
        'orderby'           => 'menu_order',
        'order'             => 'DESC',
        'title'             => '',
        'slides_column'     => 1,
        'slides_scroll'     => 1, 
        'category'          => 0,
        'display_client'    => true,
        'display_avatar'    => true,
        'display_quotes'    => true,
        'display_job'       => true,
        'display_company'   => true,
        'image_style'       => 'circle',
		'design'       		=> 'design-1',
        'dots'              => "true",
        'arrows'            => "true",
        'autoplay'          => "true",      
        'autoplayInterval'  => 3000,                
        'speed'             => 300,
        'size'              => 100,
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
?>
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
        </p>
        <!-- Widget Limit: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'limit' ); ?>"  value="<?php echo $instance['limit']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" />
            <label><?php _e( 'Default -1 for all testimonial:', 'wp-testimonial-with-widget' ); ?></label>
        </p>
         <!-- Widget Order: Design Style -->
        <p>
            <label for="<?php echo $this->get_field_id( 'design' ); ?>"><?php _e( 'Design:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'design' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'design' ); ?>">
            <?php foreach ( $this->design_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['design'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>
        <!-- Widget Category: Select Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'wp-testimonial-with-widget' ); ?></label>
            <?php
                $dropdown_args = array('hide_empty' => 0,  'taxonomy' => 'testimonial-category', 'class' => 'widefat', 'show_option_all' => __( 'All', 'wp-testimonial-with-widget' ), 'id' => $this->get_field_id( 'category' ), 'name' => $this->get_field_name( 'category' ), 'selected' => $instance['category'] );
                wp_dropdown_categories( $dropdown_args );
            ?>
        </p>
        <!-- Widget ID:  row -->
        <p>
            <label for="<?php echo $this->get_field_id( 'slides_row' ); ?>"><?php _e( 'Slides Row:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'slides_row' ); ?>"  value="<?php echo $instance['slides_row']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'slides_row' ); ?>" />
        </p>
			 <!-- Widget ID:  col -->
        <p>
            <label for="<?php echo $this->get_field_id( 'slides_column' ); ?>"><?php _e( 'Slides Column:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'slides_column' ); ?>"  value="<?php echo $instance['slides_column']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'slides_column' ); ?>" />
        </p>
		 <!-- Widget ID:  col to scroll -->
        <p>
            <label for="<?php echo $this->get_field_id( 'slides_scroll' ); ?>"><?php _e( 'Slides to Scroll:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'slides_scroll' ); ?>"  value="<?php echo $instance['slides_scroll']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'slides_scroll' ); ?>" />
        </p>
       
        <!-- Widget Order: Select Dots -->
        <p>
            <label for="<?php echo $this->get_field_id( 'dots' ); ?>"><?php _e( 'Dots:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'dots' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'dots' ); ?>">
            <?php foreach ( $this->get_other_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['dots'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>
        <!-- Widget Order: Select Arrows -->
        <p>
            <label for="<?php echo $this->get_field_id( 'arrows' ); ?>"><?php _e( 'Arrows:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'arrows' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'arrows' ); ?>">
            <?php foreach ( $this->get_other_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['arrows'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>

         <!-- Widget Order: Select Auto play -->
        <p>
            <label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Auto Play:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'autoplay' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>">
            <?php foreach ( $this->get_other_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['autoplay'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>
        <!-- Widget ID:  AutoplayInterval -->
        <p>
            <label for="<?php echo $this->get_field_id( 'autoplayInterval' ); ?>"><?php _e( 'Autoplay Interval:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'autoplayInterval' ); ?>"  value="<?php echo $instance['autoplayInterval']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'autoplayInterval' ); ?>" />
        </p>
	
        <!-- Widget ID:  Speed -->
        <p>
            <label for="<?php echo $this->get_field_id( 'speed' ); ?>"><?php _e( 'Speed:', 'wp-testimonial-with-widget' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'speed' ); ?>"  value="<?php echo $instance['speed']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'speed' ); ?>" />
        </p>
         <!-- Widget Order: Image Style -->
        <p>
            <label for="<?php echo $this->get_field_id( 'image_style' ); ?>"><?php _e( 'Image Style:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'image_style' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'image_style' ); ?>">
            <?php foreach ( $this->image_style_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['image_style'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>
        <!-- Widget Display Avatar: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'display_avatar' ); ?>" name="<?php echo $this->get_field_name( 'display_avatar' ); ?>" type="checkbox"<?php checked( $instance['display_avatar'], 1 ); ?> />
            <label for="<?php echo $this->get_field_id( 'display_avatar' ); ?>"><?php _e( 'Display Avatar', 'wp-testimonial-with-widget' ); ?></label>
        </p>
        <!-- Widget Display Quotes: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'display_quotes' ); ?>" name="<?php echo $this->get_field_name( 'display_quotes' ); ?>" type="checkbox"<?php checked( $instance['display_quotes'], 1 ); ?> />
            <label for="<?php echo $this->get_field_id( 'display_quotes' ); ?>"><?php _e( 'Display Quotes', 'wp-testimonial-with-widget' ); ?></label>
        </p>
        <!-- Widget Display Client: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'display_client' ); ?>" name="<?php echo $this->get_field_name( 'display_client' ); ?>" type="checkbox"<?php checked( $instance['display_client'], 1 ); ?> />
            <label for="<?php echo $this->get_field_id( 'display_client' ); ?>"><?php _e( 'Display Client', 'wp-testimonial-with-widget' ); ?></label>
        </p>
        
        <!-- Widget Display Job: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'display_job' ); ?>" name="<?php echo $this->get_field_name( 'display_job' ); ?>" type="checkbox"<?php checked( $instance['display_job'], 1 ); ?> />
            <label for="<?php echo $this->get_field_id( 'display_job' ); ?>"><?php _e( 'Display Job', 'wp-testimonial-with-widget' ); ?></label>
        </p>
        <!-- Widget Display Company: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id( 'display_company' ); ?>" name="<?php echo $this->get_field_name( 'display_company' ); ?>" type="checkbox"<?php checked( $instance['display_company'], 1 ); ?> />
            <label for="<?php echo $this->get_field_id( 'display_company' ); ?>"><?php _e( 'Display Company', 'wp-testimonial-with-widget' ); ?></label>
        </p>
        <!-- Widget Order By: Select Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
            <?php foreach ( $this->get_orderby_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['orderby'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>
        <!-- Widget Order: Select Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order:', 'wp-testimonial-with-widget' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>">
            <?php foreach ( $this->get_order_options() as $k => $v ) { ?>
                <option value="<?php echo $k; ?>"<?php selected( $instance['order'], $k ); ?>><?php echo $v; ?></option>
            <?php } ?>
            </select>
        </p>
        
<?php
    } // End form()

    function get_orderby_options () {
        $args = array(
                    'none' => __( 'No Order', 'wp-testimonial-with-widget' ),
                    'ID' => __( 'ID', 'wp-testimonial-with-widget' ),
                    'title' => __( 'Title', 'wp-testimonial-with-widget' ),
                    'date' => __( 'Date', 'wp-testimonial-with-widget' ),
                    'rand' => __( 'Random', 'wp-testimonial-with-widget' )
                    );
        return $args;
    }
    function get_order_options () {
         $args = array(
                    'ASC' => __( 'Ascending', 'wp-testimonial-with-widget' ),
                    'DESC' => __( 'Descending', 'wp-testimonial-with-widget' )
                    );    
         return $args;
        } 
   function get_other_options () {
         $args = array(
                    'true' => __( 'True', 'wp-testimonial-with-widget' ),
                    'false' => __( 'False', 'wp-testimonial-with-widget' )
                    );    
         return $args;
        }
    function image_style_options () {
         $args = array(
                    'circle' => __( 'Circle', 'wp-testimonial-with-widget' ),
                    'square' => __( 'Square', 'wp-testimonial-with-widget' )
                    );    
         return $args;
        }  
	function design_options(){
		 $args = array(
                    'design-1' => __( 'Design 1', 'wp-testimonial-with-widget' ),
                    'design-2' => __( 'Design 2', 'wp-testimonial-with-widget' ),
					'design-3' => __( 'Design 3', 'wp-testimonial-with-widget' )
                    );    
         return $args;
	}
} // End Class

/* Register the widget. */
add_action( 'widgets_init', create_function( '', 'return register_widget("rct_testimonials_Widget");' ), 1 );
?>