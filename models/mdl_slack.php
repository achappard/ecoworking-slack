<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Mdl_slack extends CI_Model {

    private static $message = array(
        '%s bien sûr !',
        '%s, car ça fait longtemps non ?',
        '%s comme d\'hab non ?',
        'Pourquoi pas %s ?',
        '%s me donne envie aujourd\'hui !',
        '%s me fait saliver !',
        '%s, oh oui !',
        '%s encore une fois ?',
        '%s, je suis sûr que ça rend pas malade.',
        '%s est validé par Écowo évidemment !',
        '%s serait adapté à cette journée pourrie.',
        '%s serait adapté à cette journée géniale.',
        '%s, ça change du MacDo.',
        '%s, c\'est pas trop loin.',
        '%s, ça nous fera sortir.',
        '%s, ou alors fallait ramener votre bouffe.',
        '%s. Et si vous êtes pas contents, c\'est pareil.',
        '%s. Hé ouais, tant pis pour vous.',
        '%s est pas mal aussi...',
        'Y\'en a qui ont essayé %s...',
        '%s, et c\'est comme ça.',
        '%s, trop cool !!',
        '%s. Ou *Doma*, sinon.',
    );

    function __construct() {
        parent::__construct();
    }

    /**
    *   Get random restaurant
    */
    public function getRandomRestaurant(){
        // Load restaurant list
        $this->load->library('yaml');
        $file = "restaurants.yml";
        $template_module_dir = dirname(__DIR__) . '/datas/' .$file;
        $restaurants_list = $this->yaml->load($template_module_dir );
        
        $restaurant_key = array_rand($restaurants_list, 1);
        return $restaurants_list[$restaurant_key] ;
    }

    /**
    *   Get random message format
    */
    public function getRandomMessage(){
        $message_key = array_rand(self::$message, 1);
        return self::$message[$message_key];
    }
}