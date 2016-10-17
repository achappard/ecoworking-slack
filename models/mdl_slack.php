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
        'La martinière',
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

    public static $end_message = array(
        'bien sûr !',
        'car ça fait longtemps non ?',
        'comme d\'hab non ?',
        'pourquoi pas ?',
        'me donne envie aujourd\'hui !',
        'me fait saliver !',
        ', oh oui !',
        'encore une fois ?',
        ', je suis sûr que ça rend pas malade',
        'est validé par Écowo évidemment !',
        'serait adapté à cette journée pourrie',
        'serait adapté à cette journée géniale',
        ', ça change du MacDo',
        ', c\'est pas trop loin',
        ', ça nous fera sortir',
        'ou alors fallait ramener votre bouffe',
        'si vous êtes pas contents, c\'est pareil',
        ', hé ouais, tant pis pour vous',
        'est pas mal aussi...',
        'y\'en a qui ont essayé...',
        'et c\'est comme ça',
        ', trop cool !!',
        ', ou *Doma*, sinon'
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
    *   Get random end message
    */
    public function getRandomEndMessage(){
        $end_message_key = array_rand(self::$end_message, 1);
        return self::$end_message[$end_message_key];
    }
}