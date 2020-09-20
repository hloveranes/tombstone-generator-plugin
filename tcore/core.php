<?php 

namespace TGen;

class TombCore {

    public function __construct(){

        add_shortcode('generate_tombstone', array($this, 'tombstone_generator'));
    }
    
    public function tombstone_generator(){
        return 'Hello Rworld';
    }

}

// define('test', 'you\'re using test method');

// const test = 'you\'re using test method const';

?>