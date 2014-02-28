<?php
/**
 * Created by PhpStorm.
 * User: mince
 * Date: 2/28/14
 * Time: 4:57 PM
 */
class ScriptKiddie{

    var $arr = array(
        'current_client_id' =>  1337,
        'member_uniq_id' =>  3371,
        'session_identity' =>  7133
    );
    var $client_ip = '';

    /**
     * Detection of script kiddie/automated vulnerability scan tool.
     * @return bool
     */
    function detect_kiddie(){
        if(!$_POST)
            return false;
        while (list($key, $value) = each($_POST)){
            if(array_key_exists($key, $this->arr)){
                if($this->arr[$key] != $value){ // Yeah request is coming from script kiddie/automated tool.
                    $this->client_ip = $this->_get_client_ip();
                    $this->_action_for_hacker($this->client_ip);
                    return False;
                }
            }
        }
        return TRUE;
    }
    /**
     * Get ip address of client who want to find vulnerability
     * @return string
     */
    private function _get_client_ip(){
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * It's an action for what you want to do with suspicious client
     * @param $ip
     */
    private function _action_for_hacker($ip){
        /*
         * Do what ever you want with suspicious client
         */
        echo "You kiddo!";
    }
}