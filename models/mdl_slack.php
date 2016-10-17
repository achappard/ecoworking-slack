<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Mdl_slack extends CI_Model {

    public static $restaurants_list = array(
        'Doma',
        'Yaffa',
        'Picard',
        'La boulangerie Kaiser',
        'Best Bagels',
        'Adonys',
        'Tralala',
        'Komé',
        'Comptoir du poulet',
        'La Martinière',
        'Crok\'n Roll',
        'Konditori',
        'Yomogi',
        'Bangkok Royal',
        'Gourmix',
        'Le comptoir du poulet',
        'Yabio',
        'Casa Lola',
        'Focaccia',
        'Wazza',
        'Athina',
        'Edo Sushi',
        'Gourmix',
        'Cocoo Thai',
        'Croc\'o Green',
        'La Marsa',
        'Frite Alors',
        'La bicycletterie',
        'Chez Jules',
        'L\'indien à côté du Sun',
    );

    public static $message = array(
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
        $restaurant_key = array_rand(self::$restaurants_list, 1);
        return self::$restaurants_list[$restaurant_key] ;
    }

    /**
    *   Get random message format
    */
    public function getRandomMessage(){
        $message_key = array_rand(self::$message, 1);
        return self::$message[$message_key];
    }
}