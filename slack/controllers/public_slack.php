<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Public_slack extends MY_Controller {

    /**
    * Slash command for ecowo
    * On mange où ce midi ?
    */
    public function onmangeou() {

        $token = $this->input->post('token');
        if( $token == $this->config->item('slack_token_onmangeou') ){

            $this->load->model('slack/mdl_slack');
            $restaurant =  $this->mdl_slack->getRandomRestaurant();
            $endMessage =  $this->mdl_slack->getRandomEndMessage();

            header('Content-Type: application/json');
            $json = array(
                "response_type" => "in_channel",
                "text"          => "*" . $restaurant . "* " . $endMessage
            );
            echo json_encode($json);
        }else{
            return;
        }
    }
    
}
