<?php

namespace plugins\ImgGal;

class ImgGalAdmin{
  public function __construct(){
    $this->fireHooks();
  }

  public function fireHooks()
  {
    add_action('add_meta_boxes', array($this, 'PH_add_meta_box'));
    add_action('admin_enqueue_scripts', array($this, 'PH_load_css'));
    add_action('save_post', array($this, 'PH_on_post_save'));
  }

  public function PH_load_css()
  {
    wp_register_style( 'ph_admin_css', plugin_dir_url( __FILE__ ) . '../css/PH_img_gal_admin.css', false, '1.0.0' );
    wp_enqueue_style( 'ph_admin_css' );
  }

  public function PH_add_meta_box()
  {
    $screens = array('post', 'page');

    foreach ( $screens as $screen ) {
      add_meta_box(
  			'PH_meta_id',
  			'Ajouter une gallerie d\'image',
  			array($this, 'PH_build_meta_box'),
  			$screen
  		);
    }
  }

  public function PH_on_post_save($post_id)
  {
    /* Check security token */
    //if (!isset($_POST['PH_image_gal']) || !wp_verify_nonce( $_POST['ph_img_gal_nonce'], 'ph_img_gal_nonce' ) )
    //  return;

    if(!empty($_POST['PH_image_gal'])){
      $attachment_ids = array_filter($_POST['PH_image_gal']);
      $attachment_ids =  implode( ',', $attachment_ids );
      $attachment_ids = sanitize_text_field($attachment_ids);

      update_post_meta( $post_id, '_ph_img_gal', $attachment_ids );
    } else {
      delete_post_meta( $post_id, '_ph_img_gal' );
    }
  }

  public function PH_build_meta_box($post)
  {

    $html = '';
    $html .= '<div id="gallery_images_container">';
    $html .= '<ul class="gallery_images">';
    $image_gallery = get_post_meta( $post->ID, '_ph_img_gal', true );
    $attachments = array_filter( explode( ',', $image_gallery ) );
    if ( $attachments ) {
        foreach ( $attachments as $attachment_id ) {
            $html .= '<li class="image attachment details" data-attachment_id="' . $attachment_id . '">'
                     . '<div class="attachment-preview">'
                     .   '<div class="thumbnail">'
                     .     wp_get_attachment_image( $attachment_id, 'thumbnail' )
                     .   '</div>'
                     .   '<a href="#" class="delete check" title="Supprimer l\'image">'
                     .     '<div class="media-modal-icon"></div>'
                     .   '</a>'
                     . '</div>'
                     . '<input type="hidden" id="image_gallery" name="PH_image_gal[]" value="' . $attachment_id . '" />'
                     .'</li>';
        }
    }
    $html .= '</ul>';
    //$html .= wp_nonce_field( 'ph_img_gal_nonce');
    $html .= '</div>';
    $html .= '<p class="add_gallery_images hide-if-no-js">';
    $html .= '<a href="#">Choisir une image à ajouter</a>';
    $html .= '</p>';
    ?>
    <script>
    jQuery(document).ready(function($){

        // Uploading files
        var image_gallery_frame;
        var $gallery_images = $('#gallery_images_container ul.gallery_images');

        jQuery('.add_gallery_images').on( 'click', 'a', function( event ) {

            var $el = $(this);

            event.preventDefault();

            // If the media frame already exists, reopen it.
            if ( image_gallery_frame ) {
                image_gallery_frame.open();
                return;
            }

            // Create the media frame.
            image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                // Set the title of the modal.
                title: 'Ajouter l\'image à la galerie',
                button: {
                    text: 'Ajouter l\'image galerie',
                },
                multiple: true
            });

            // When an image is selected, run a callback.
            image_gallery_frame.on( 'select', function() {

                var selection = image_gallery_frame.state().get('selection');

                selection.map( function( attachment ) {

                    attachment = attachment.toJSON();

                    if ( attachment.id ) {
                         $gallery_images.append('\
                            <li class="image attachment details" data-attachment_id="' + attachment.id + '">\
                                <div class="attachment-preview">\
                                    <div class="thumbnail">\
                                        <img src="' + attachment.url + '" />\
                                    </div>\
                                    <input type="hidden" id="image_gallery" name="PH_image_gal[]" value="' + attachment.id + '" />\
                                   <a href="#" class="delete check" title="Supprimer l image"><div class="media-modal-icon"></div></a>\
                                </div>\
                            </li>');

                    }

                } );
            });

            // Finally, open the modal.
            image_gallery_frame.open();
        });

        // Image ordering
        $gallery_images.sortable({
            items: 'li.image',
            cursor: 'move',
            scrollSensitivity:40,
            forcePlaceholderSize: true,
            forceHelperSize: false,
            helper: 'clone',
            opacity: 0.65,
            placeholder: 'eig-metabox-sortable-placeholder',
            start:function(event,ui){
                ui.item.css('background-color','#f6f6f6');
            },
            stop:function(event,ui){
                ui.item.removeAttr('style');
            },
            update: function(event, ui) {
                var attachment_ids = '';

                $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                    var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

            }
        });

        // Remove images
        $('#gallery_images_container').on( 'click', 'a.delete', function() {

            $(this).closest('li.image').remove();

            var attachment_ids = '';

            $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                attachment_ids = attachment_ids + attachment_id + ',';
            });

            return false;
        } );

    });
    </script>
    <?php

    echo $html;
  }
}
