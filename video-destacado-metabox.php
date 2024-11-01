<?php 

add_action( 'add_meta_boxes', 'video_add_metaboxes' );
function video_add_metaboxes(){
    $post_types = get_post_types( array( 'public' => true ) );
    foreach ( $post_types as $post_type ) {
        if ( get_option('video_destacado_'.$post_type) ) {
            add_meta_box( 
                'video_destaque_metabox', 
                __( 'Vídeo Destacado', 'video-destacado' ), 
                'video_destaque_metabox', 
                $post_type,
                'side', 
                'default'
            );
        }
    }
}

function video_destaque_metabox($post){
    $values         = get_post_custom( $post->ID );
    $id_video       = isset( $values['id_video'] ) ? esc_attr( $values['id_video'][0] ) : '';
    $width_video    = isset( $values['width_video'] ) ? esc_attr( $values['width_video'][0] ) : '';
    $height_video   = isset( $values['height_video'] ) ? esc_attr( $values['height_video'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>

        <img style="<?php if(empty($id_video)){echo 'display: none;' ;} else {echo 'display: block' ;}  ?>" class="thumb" src="http://img.youtube.com/vi/<?php echo $id_video; ?>/0.jpg" alt="<?php echo $titulo_video; ?>" />

        <ul id='video-destaque'>
            <li><span><?php _e('ID do Video', 'video-destacado'); ?>:</span> <input type="text" id="id_video" name="id_video" value="<?php echo $id_video; ?>" /><small>Ex: www.youtube.com/watch?v=<b>XdMD4LrC4wY</b></small></li>
            <li>
                <div class="vd-options">
                    <a href="#"><?php _e('More Options', 'video-destacado'); ?></a>
                </div>
                <div class="vd-more">
                    <div class="box">
                        <span><?php _e('Width', 'video-destacado'); ?>:</span>
                        <input type="text" id="width_video" name="width_video" value="<?php echo $width_video; ?>" />
                        <small><?php _e('Default', 'video-destacado'); ?>: <b>560</b></small>
                    </div>
                    <div class="box">
                        <span><?php _e('Height', 'video-destacado'); ?>:</span>
                        <input type="text" id="height_video" name="height_video" value="<?php echo $height_video; ?>" />
                        <small><?php _e('Default', 'video-destacado'); ?>: <b>315</b></small>
                    </div>
                </div>
            </li>
            <li>
                <!-- <input type="button" tabindex="3" value="Adicionar" class="button add">
                <input type="button" tabindex="3" value="Remover" class="button del"> -->
                <?php submit_button(__('Add', 'video-destacado'), 'secondary small', 'add', false); ?>
                <?php submit_button(__('Remove', 'video-destacado'), 'secondary small', 'del', false); ?>
            </li>


        </ul>
  <?php
}

/**
 * video_destaque_metabox_save()
 *
 *
 */

function video_destaque_metabox_save( $post_id ){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    if( !current_user_can( 'edit_post' ) ) return;

    $allowed = array(
    'a' => array(
    'href' => array()
    )
    );

    if( isset( $_POST['texto_meta_box'] ) )
    update_post_meta( $post_id, 'texto_meta_box', wp_kses( $_POST['texto_meta_box'], $allowed ) );
    update_post_meta( $post_id, 'id_video', wp_kses( $_POST['id_video'], $allowed ) );
    update_post_meta( $post_id, 'width_video', wp_kses( $_POST['width_video'], $allowed ) );
    update_post_meta( $post_id, 'height_video', wp_kses( $_POST['height_video'], $allowed ) );
}

add_action( 'save_post', 'video_destaque_metabox_save' );