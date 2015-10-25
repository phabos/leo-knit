<?php

namespace plugins\FormulaireContact;

class FormulaireContact {

  public $errors = array();
  public $data;

  public function __construct()
  {
    $this->fireHooks();
  }

  private function fireHooks()
  {
    add_shortcode('p_formulaire_contact', array($this, 'FC_BuildForm'));
    add_action('template_redirect', array($this, 'FC_ProceedData'));
  }

  public function FC_buildForm($atts, $content)
  {
    $html = '';

    if(!empty($this->errors)){
      foreach($this->errors as $error)
      $html .= '<div class="error">'.$error.'</div>';
    }

    if(!empty($this->data) && empty($this->errors)){
      $html .= '<div class="success">Votre message a bien été envoyé</div>';
    }
    /* build html form */
    $html .= '<form action="" method="POST">';
    $html .=   wp_nonce_field('p_contact_form');
    $html .=   '<label>Email</label><br/><input type="text" name="pdata[p_email] " />';
    $html .=   '<label>Message</label><br/><textarea name="pdata[p_message]"></textarea>';
    $html .=   '<div class="clear"></div><br/>';
    $html .=   '<input type="submit" name="envoyer" />';
    $html .= '</form>';

    return $html;
  }

  public function FC_ProceedData()
  {
    /* Check security token */
    if (isset($_POST['p_contact_form']) && !wp_verify_nonce( $_POST['p_contact_form'], 'p_contact_form' ) )
      die( 'Security check' );

    /* Form is submitted */
    if(!empty($_POST['pdata'])){
      $this->data = $_POST['pdata'];
      $this->FC_sanitizeData();
      $this->FC_CheckErrors();

      if(!empty($this->errors)){
        // Proceed
      }
    }
  }

  /* Clean post data */
  public function FC_sanitizeData()
  {
    $this->data['p_email']   = wp_strip_all_tags($this->data['p_email']);
    $this->data['p_message'] = wp_strip_all_tags($this->data['p_message']);
    $this->data['p_email']   = sanitize_email($this->data['p_email']);
  }
  /* check if errors in form post data */
  public function FC_CheckErrors()
  {
    if(!is_email($this->data['p_email'])){
      $this->errors[] = 'email invalide';
    }
  }
}
