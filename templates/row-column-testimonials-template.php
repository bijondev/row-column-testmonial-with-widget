<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

function rct_get_testimonial( $atts, $content = null ){
     ob_start();
     $defaults = apply_filters( 'rct_testimonials_default_args', array(
		'limit' 			=> -1,
		'design'            => 'design-1',
		'per_row' 			=> null,
		'orderby' 			=> 'post_date',
		'order' 			=> 'DESC',
		'id' 				=> 0,
		'category' 			=> 0,
		'display_client' 	=> true,
		'display_avatar' 	=> true,
		'display_job' 		=> true,
		'display_company' 	=> true,
		'image_style'       => 'circle',
		'size' 				=> 100,
		'display_quotes'	=> 'true'
	) );
     
    $args = shortcode_atts( $defaults, $atts );
	$testimonialsdesign = $args['design'];
	if ( isset( $args['limit'] ) ) $args['limit'] = intval( $args['limit'] );
	if ( isset( $args['size'] ) &&  ( 0 < intval( $args['size'] ) ) ) $args['size'] = intval( $args['size'] );
	if ( isset( $args['category'] ) && is_numeric( $args['category'] ) ) $args['category'] = intval( $args['category'] );
	
        foreach ( array( 'display_client','display_job','display_company', 'display_avatar', 'display_quotes' ) as $k => $v ) {
		if ( isset( $args[$v] ) && ( 'true' == $args[$v] ) ) {
			$args[$v] = true;
		} else {
			$args[$v] = false;
		}
	}	
	$query = rct_get_testimonials($args);

	?>
     	<div class="testimonials-list <?php echo $testimonialsdesign; ?>">
     	<?php
		if(!empty($query)){
          $count = 0;
          $class = '';
			foreach ( $query as $post ) { 
                                $count++;
				$css_class = 'quote';
				if ( ( is_numeric( $args['per_row'] ) && ( $args['per_row'] > 0 ) && ( 0 == ( $count - 1 ) % $args['per_row'] ) ) || 1 == $count ) { $css_class .= ' first'; }
				if ( ( is_numeric( $args['per_row'] ) && ( $args['per_row'] > 0 ) && ( 0 == $count % $args['per_row'] ) ) || count( $query ) == $count ) { $css_class .= ' last'; }

				// Add a CSS class if no image is available.
				if ( isset( $post->image ) && ( '' == $post->image ) ) {
					$css_class .= ' no-image';
				}
				if ( is_numeric( $args['per_row'] ) ) {
					if($args['per_row'] == 2){
						$per_row = 6;
					}
					else if($args['per_row'] == 3){
						$per_row = 4;	
					}
					else if($args['per_row'] == 4){
						$per_row = 3;
					}
					 else{
                        $per_row = $args['per_row'];
                    }
					$class = 'wp-medium-'.$per_row.' wpcolumns';
				}
				
				switch ($testimonialsdesign) {
				 case "design-1":
					include('designs/design-1.php');
					break;
				 case "design-2":
					include('designs/design-2.php');
					break;
				case "design-3":
					include('designs/design-3.php');
					break;
				case "design-4":
					include('designs/design-4.php');
					break;	
				
				 default:		 

						include('designs/design-1.php');

					}
				} 
			} ?>
             </div>
             
             <?php  
             return ob_get_clean();
	}

add_shortcode('rct_testimonials','rct_get_testimonial');

?>