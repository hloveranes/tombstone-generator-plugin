<?php 

namespace TGen;

class TombCore {

    public function __construct(){
        add_shortcode('generate_tombstone', array($this, 'tombstone_generator'));
        add_action('wp_enqueue_scripts', array($this, 'ts_custom_enqueue'));
    }
    
    public function ts_custom_enqueue(){
        //wp_enqueue_style('string $handle', mixed $src, array $deps, mixed $ver, string $meida );
        wp_enqueue_style('ts-gen-tyle', plugins_url().'/tombstone-generator/app/css/baseStyle.css', array(), '1.4.2', 'all' );
        //wp_enqueue_style('string $handle', mixed $src, array $deps, mixed $ver, bol $in_footer );
        wp_enqueue_script('ts-gen-contextJSON', plugins_url().'/tombstone-generator/app/js/contextJSON.js', array(), '3.1.1', 'true' );
        wp_enqueue_script('ts-gen-dragndrop', plugins_url().'/tombstone-generator/app/js/dragndrop.js', array(), '3.1.2', 'true' );
        wp_enqueue_script('ts-gen-editor', plugins_url().'/tombstone-generator/app/js/editor.js', array(), '3.2.3', 'true' );

        // for capturing screen
        wp_enqueue_script('ts-gen-screencapture', plugins_url().'/tombstone-generator/app/js/html2canvas.min.js', array(), '2.1.3', 'true' );
    }

    public function tombstone_generator($tgen){
        // $a = plugins_url().'/tombstone-generator';
        // return $a;
        return require_once __DIR__.'/../app/index.php';
    }

}

// define('test', 'you\'re using test method');

// const test = 'you\'re using test method const';

?>