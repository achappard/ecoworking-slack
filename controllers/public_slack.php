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
            $json = array(
                "response_type" => "in_channel",
                "text"          => sprintf($message, "*" . $restaurant . "*")
            );
            echo json_encode($json);
        }else{
            return;
        }
    }
    
}
