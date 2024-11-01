<?php 

function video_destacado(){
    $values = get_post_custom( $post->ID );
    $id_video = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';

    $width_video = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
    if(empty($width_video)){ $width_video = 560; }
    $height_video = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
    if(empty($height_video)){ $height_video = 315; }

    if(!empty($id_video)):
    $iframe = "<iframe width='".$width_video."' height='".$height_video."' src='http://www.youtube.com/embed/".$id_video."' frameborder='0' allowfullscreen></iframe>";
    echo $iframe;
    endif;
}

function get_video_destacado(){
	$values = get_post_custom( $post->ID );
    $id_video = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';

    $width_video = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
    if(empty($width_video)){ $width_video = 560; }
    $height_video = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
    if(empty($height_video)){ $height_video = 315; }

    if(!empty($id_video)):
    $iframe = "<iframe width='".$width_video."' height='".$height_video."' src='http://www.youtube.com/embed/".$id_video."' frameborder='0' allowfullscreen></iframe>";
    return $iframe;
    endif;
}