<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function add_custom_post_type_to_query( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', array('post', 'yoyo_tricks','kendama_tricks','begleri_tricks') );
    }
}
add_action( 'pre_get_posts', 'add_custom_post_type_to_query' );

function sendContactFormToSiteAdmin () {
  try {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
      throw new Exception('Bad form parameters. Check the markup to make sure you are naming the inputs correctly.');
    }
    if (!is_email($_POST['email'])) {
      throw new Exception('Email address not formatted correctly.');
    }

    $subject = 'Contact Form: '.$reason.' - '.$_POST['name'];
    $headers = 'From: My Blog Contact Form <contact@myblog.com>';
    $send_to = "benjamminredden@gmail.com";
    $subject = "New Contact Form ($reason): ".$_POST['name'];
    $message = "Message from ".$_POST['name'].": \n\n ". $_POST['message'] . " \n\n Reply to: " . $_POST['email'];

    if (wp_mail($send_to, $subject, $message, $headers)) {
      echo json_encode(array('status' => 'success', 'message' => 'Contact message sent.'));
      exit;
    } else {
      throw new Exception('Failed to send email. Check AJAX handler.');
    }
  } catch (Exception $e) {
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    exit;
  }
}
add_action("wp_ajax_contact_send", "sendContactFormToSiteAdmin");
add_action("wp_ajax_nopriv_contact_send", "sendContactFormToSiteAdmin");
?>
