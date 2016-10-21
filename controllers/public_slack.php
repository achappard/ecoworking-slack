<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Public_slack extends MY_Controller {
    
    
   
    public function __construct()
    {
        parent::__construct();
        
        // Load Slack config file
        $this->load->config('slack');

    }
    
    /**
    * Slash command for ecowo
    * Where do we eat today ?
    */
    public function onmangeou() {
        $token = $this->input->post('token');
        if( $token == $this->config->item('slack_token_onmangeou') ){

            $this->load->model('slack/mdl_slack');
            $restaurant =  $this->mdl_slack->getRandomRestaurant();
            $message =  $this->mdl_slack->getRandomMessage();

            header('Content-Type: application/json');

            // Generates the name of the restaurant with (or not) the link to the website
            $randomName = $restaurant['name'];

            if( isset( $restaurant['url'] ) && !empty($restaurant['url']) ){
                $restaurant_name = "*<" . $restaurant['url'] . "|" . $randomName . ">*";
            }else{
                $restaurant_name = "*" . $randomName . "*";
            }
            $slack_str = sprintf($message, $restaurant_name);

            // Generate google maps preview
            if ( isset($restaurant['address']) ){
                $slack_str .= "\n";
                $slack_str .= "<";
                $restaurantPinLabel = substr( ucfirst( $restaurant['name'] ),0,1 );
                $gmaps_url = "http://maps.googleapis.com/maps/api/staticmap?center=place%20des%20terreaux,%2069001%20Lyon&zoom=17&size=800x600&markers=color:red%7Clabel:" . $restaurantPinLabel . "%7C" . urlencode($restaurant['address']) . "&markers=color:0x67AC23%7Clabel:E%7C27%20rue%20romarin,%2069001%20Lyon";
                $gmaps_url .= "&key=".$this->config->item('gmaps_slack_key');
                $slack_str .= $gmaps_url;
                $slack_str .= "| >";
                $slack_str .= "(<https://www.google.com/maps/place/" . urlencode($restaurant['address']) . "|Voir sur Google Maps>)";
            }


            $json = array(
                "mrkdwn"        => true,
                "response_type" => "in_channel",
                "text"          => $slack_str
            );
            echo json_encode($json);
        }else{
            return;
        }
    }
}