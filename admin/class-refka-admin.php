<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       refka-mahdouani
 * @since      1.0.0
 *
 * @package    Refka
 * @subpackage Refka/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Refka
 * @subpackage Refka/admin
 * @author     refka-mahdouani <refkamahdouani2013@gmail.com>
 */
class Refka_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

	

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/refka-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Refka_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Refka_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'refka_main_js', plugin_dir_url( __FILE__ ) . 'dist/main/index.js', array(), $this->version, false );

		wp_register_script( 'ajax_envoyer', plugin_dir_url( __FILE__ ) . 'dist/main/ajax.js', array('refka_main_js') );
		wp_localize_script( 'ajax_envoyer', 'refka_ajax_envoyer_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			//'postID' => $post->ID,
			'nonce' => wp_create_nonce('ajax-envoyer-nonce')
		) );
		 wp_enqueue_script( 'ajax_envoyer' );



	}
	public function wp_senpai_admin(){

		add_menu_page( 
			'refka', 
			'refka', 
			'manage_options',
			'refka', 
			array($this,'showAdminPage'), 
			'dashicons-plugins-checked',
			4);
	}
	public function showAdminPage() {
		$dir = plugin_dir_path( __FILE__ );
		include $dir . 'partials/refka-admin-display.php';
	}

	public function senpai_refka() {

		$nonce = $_POST['nonce'];
		
		if ( ! wp_verify_nonce( $nonce, 'ajax-envoyer-nonce' ) ){
			$respond = array(
				'success' => 0,
				'msg'=>'something went wrong'
			);
			$output = json_encode($respond);
			echo $output;
			die ();
		}

		$nom = $_POST['nom'];
		$mail = $_POST['mail'];
		$password = $_POST['password'];
		$tel = $_POST['tel'];
		$msg = $_POST['msg'];
		error_log(print_r($_POST,1));


			global $wpdb;
			$now = current_time( 'mysql' );
			$table_name = $wpdb->prefix . "refka_test";
			$i = $wpdb->insert( 
				$table_name, 
				array( 
					'nom' => $nom, 
					'mail' => $mail, 
					'password' => $password,
					'tel' => $tel,
					'msg'  => $msg,
				)
			);

			$refkaId = $wpdb->insert_id;
			$respond = array(
				'success' => 1,
				'msg'=>$refkaId
			);

	$output = json_encode($respond);
	echo $output;
	die ();

	}


}


