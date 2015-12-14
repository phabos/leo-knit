<?php

namespace Phabos\metaboxes;

class MetaboxPattern {

  public function __construct()
  {
    $this->fireHooks();
  }

  public function fireHooks()
  {
    add_action('add_meta_boxes', array($this, 'PH_add_meta_box'));
    add_action('save_post', array($this, 'PH_on_post_save'));
  }

  public function PH_add_meta_box()
  {
    $screens = array('post', 'page');

    foreach ( $screens as $screen ) {
      add_meta_box(
  			'PH_meta_pattern_id',
  			'Ajouter un pattern PDF',
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

    if( ! empty( $_POST['PH_pattern'] ) ){
      update_post_meta( $post_id, '_ph_pattern', sanitize_text_field( $_POST['PH_pattern'] ) );
    } else {
      delete_post_meta( $post_id, '_ph_pattern' );
    }
  }

  public function PH_build_meta_box($post)
  {

    $html = '';
    $html .= '<div class="add_pattern">';
    $pattern = get_post_meta( $post->ID, '_ph_pattern', true );

    $html .= '<input placeholder="Ajouter un pattern PDF" type="text" name="PH_pattern" id="pdf_pattern" value="' . ( $pattern ? $pattern : '' ) . '" />';

    $html .= '</div>';
    $html .= '</p>';
    ?>
    <script>
    jQuery(document).ready(function($){

        var image_gallery_frame;
        var $pdf_pattern = $('#pdf_pattern');

        jQuery('#pdf_pattern').on( 'click', function( event ) {

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
                title: 'Ajouter le PDF',
                button: {
                    text: 'Ajouter le PDF',
                },
                multiple: false
            });

            // When an image is selected, run a callback.
            image_gallery_frame.on( 'select', function() {

                var selection = image_gallery_frame.state().get('selection');

                selection.map( function( attachment ) {

                    attachment = attachment.toJSON();

                    if ( attachment.id ) {
                         $pdf_pattern.val(attachment.url);
                    }

                } );
            });

            // Finally, open the modal.
            image_gallery_frame.open();
        });

    });
    </script>
    <?php

    echo $html;
  }
}
