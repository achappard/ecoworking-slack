<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Mdl_slack extends CI_Model {

    /**
     * @todo : restaurant in a Yaml file
     * @var array
     */
    private static $restaurants_list = array(
        array(
            'name'      =>  'Doma',
            'address'   =>  '11 Rue Lanterne, 69001 Lyon',
            'url'       =>  'http://www.domalyon.fr/'
        ),
        array(
            'name'      =>  'Yaffa',
            'address'   =>  '17 rue d\'Algérie, 69001 LYON',
            'url'       =>  'http://www.yaafa.fr/'
        ),
        array(
            'name'      =>  'Picard',
            'address'   =>  '18 rue Constantine, 69001 LYON',
            'url'       =>  'http://www.picard.fr/',
        ),
        array(
            'name'      =>  'La boulangerie Kaiser',
            'address'   =>  '15 Place Louis Pradel, 69001 Lyon',
            'url'       =>  'http://www.maison-kayser.com/fr/',
        ),
        array(
            'name'      =>  'Best Bagels',
            'address'   =>  '1 Place Tobie Robatel, 69001 Lyon',
            'url'       =>  'http://www.bestbagels.fr/',
        ),
        array(
            'name'      =>  'Adonys',
            'address'   =>  '13 Rue Puits Gaillot, 69001 Lyon',
            'url'       =>  'http://www.petitpaume.com/etablissement/adonys.htm',
        ),
        array(
            'name'      =>  'Tralala',
            'address'   =>  '8 Rue Saint-Polycarpe, 69001 Lyon',
            'url'       =>  'http://www.petitpaume.com/etablissement/tralala.htm',
        ),
        array(
            'name'      =>  'Komé',
            'address'   =>  '4 Rue Lanterne, 69001 Lyon',
            'url'       =>  'http://www.sushikome.fr/',
        ),
        array(
            'name'      =>  'Le Comptoir du poulet',
            'address'   =>  '14 Rue Constantine, 69001 Lyon',
            'url'       =>  'https://www.facebook.com/lecomptoirdupoulet/',
        ),
        array(
            'name'      =>  'Boulangerie de la Martinière',
            'address'   =>  '24 Rue de la Martinière, 69001 Lyon',
            'url'       =>  'http://www.petitpaume.com/etablissement/la-boulangerie-de-la-martiniere.htm',
        ),
        array(
            'name'      =>  'Crok\'n Roll',
            'address'   =>  '1 Rue Désirée, 69001 Lyon',
            'url'       =>  'http://www.thecrocknroll.fr',
        ),
        array(
            'name'      =>  'Konditori',
            'address'   =>  '9 rue des Capucins, 69001 Lyon',
            'url'       =>  'http://www.konditori.fr/',
        ),
        array(
            'name'      =>  'Yomogi',
            'address'   =>  '1 Rue Hippolyte Flandrin, 69001 Lyon',
            'url'       =>  'http://www.yomogilyon.com/',
        ),
        array(
            'name'      =>  'Bangkok Royal',
            'address'   =>  '40 Rue Sergent Blandan, 69001 Lyon',
            'url'       =>  'http://www.bangkok-royal.fr/',
        ),
        array(
            'name'      =>  'Gourmix',
            'address'   =>  '22 Rue de la Platière, 69001 Lyon',
            'url'       =>  'http://www.gourmix.fr/',
        ),
        array(
            'name'      =>  'Yabio',
            'address'   =>  '19 Rue du Garet, 69001 Lyon',
            'url'       =>  'http://yabio.fr/',
        ),
        array(
            'name'      =>  'La Focaccia',
            'address'   =>  '6 Rue Désirée, 69001 Lyon',
            'url'       =>  'http://www.pizzerialafocaccia.fr/',
        ),
        array(
            'name'      =>  'Wazza',
            'address'   =>  '17 Rue Désirée, 69001 Lyon',
            'url'       =>  'http://www.wazza.pizza/',
        ),
        array(
            'name'      =>  'Athina',
            'address'   =>  '3 Rue Romarin, 69001 Lyon',
            'url'       =>  'http://www.petitpaume.com/etablissement/athina.htm',
        ),
        array(
            'name'      =>  'Edo Sushi',
            'address'   =>  '9 Rue Sainte-Catherine, 69001 Lyon',
            'url'       =>  'http://edolyon.fr/',
        ),
        array(
            'name'      =>  'Cocoo Thai',
            'address'   =>  '7 Rue Neuve, 69001 Lyon',
            'url'       =>  'http://cocoo.fr/',
        ),
        array(
            'name'      =>  'Croc\'o Green',
            'address'   =>  '13 Rue Terraille, 69001 Lyon',
            'url'       =>  'http://www.crocogreen.fr/',
        ),
        array(
            'name'      =>  'La Marsa',
            'address'   =>  '16 Rue d\'Algérie, 69001 Lyon',
            'url'       =>  'http://www.restaurant-lamarsa.fr/',
        ),
        array(
            'name'      =>  'Frite Alors!',
            'address'   =>  '20 Rue Terme, 69001 Lyon',
            'url'       =>  'http://fritealors.fr/',
        ),
        array(
            'name'      =>  'La bicycletterie',
            'address'   =>  '16 Rue Romarin, 69001 Lyon',
            'url'       =>  'http://www.la-bicycletterie.com',
        ),
        array(
            'name'      =>  'Chez Jules',
            'address'   =>  '4, Rue Joseph Serlin, 69001 Lyon',
            'url'       =>  'http://boulangeriechezjules.fr/',
        ),
        array(
            'name'      =>  'Tandoori, l\'indien à côté du Sun',
            'address'   =>  '8 Rue Sainte-Marie-des-Terreaux, 69001 Lyon',
            'url'       =>  '',
        ),
    );



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