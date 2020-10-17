<?php 

namespace TGen;

class TombCore {

    public function __construct(){
        add_shortcode('generate_tombstone', array($this, 'tombstone_generator'));
        add_action('wp_enqueue_scripts', array($this, 'ts_custom_enqueue'));
    }
    
    public function ts_custom_enqueue(){
        // change plugins_url to this
        // plugin_dir_url

        wp_enqueue_style('ts-gen-tyle', plugins_url().'/tombstone-generator/app/css/tcore-base-style.css', array(), '1.4.2', 'all' );
        // wp_enqueue_style('ts-gen-tyle', plugin_dir(dirname( __FILE__ )).'app/css/tcore-base-style.css', array(), '1.4.2', 'all' );

        wp_enqueue_script('ts-gen-contextJSON', plugins_url().'/tombstone-generator/app/js/contextJSON.js', array(), '3.1.1', 'true' );
        // wp_enqueue_script('ts-gen-contextJSON', plugin_dir(dirname( __FILE__ )).'app/js/contextJSON.js', array(), '3.1.1', 'true' );
        
        wp_enqueue_script('ts-gen-dragndrop', plugins_url().'/tombstone-generator/app/js/dragndrop.js', array(), '3.1.2', 'true' );
        // wp_enqueue_script('ts-gen-dragndrop', plugin_dir_url(dirname( __FILE__ )).'app/js/dragndrop.js', array(), '3.1.2', 'true' );
        
        wp_enqueue_script('ts-gen-editor', plugins_url().'/tombstone-generator/app/js/editor.js', array(), '3.2.3', 'true' );
        // wp_enqueue_script('ts-gen-editor', plugin_dir(dirname( __FILE__ )).'app/js/editor.js', array(), '3.2.3', 'true' );

        // for capturing screen
        wp_enqueue_script('ts-gen-screencapture', plugins_url().'/tombstone-generator/app/js/html2canvas.min.js', array(), '2.1.3', 'true' );
        // wp_enqueue_script('ts-gen-screencapture', plugin_dir_url(dirname( __FILE__ )).'app/js/html2canvas.min.js', array(), '2.1.3', 'true' );
    }

    public function tombstone_generator($tgen){
        return require_once __DIR__.'/../app/index.php';
    }


    // reserved for now
    // not used 
    // insert data to tombstone table
    public function add_data_to_tombstone(){
    }

    // update tombstone table 
    public function update_data_to_tombstone(){
    }
    // delete data in tombstone table
    public function delete_data_to_tombstone(){
    }
}
?>