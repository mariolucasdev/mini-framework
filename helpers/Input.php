<?php

class Input {

    public function get($param)
    {
        if(isset($_GET[$param]) && $_GET[$param]):
            return $_GET[$param];
        endif;
    }
    
    public function post($param)
    {
        if(isset($_POST[$param]) && $_POST[$param]):
            return $_POST[$param];
        endif;
    }
}