<?php 

class Load {

    public string $view;
    public array $data = [];
    public bool $default = true;   

    public function view($views = null, $data = array(), $default = true)
    {
        !empty($data) ? extract($data) : null;

        if($default):
            require_once("./views/templates/header.php");
        endif;
        
        if($views) {
            if(is_array($views)){
                foreach($views as $view){
                    require('./views/'.$view.'.php');
                }
            } else {
                require('./views/'.$views.'.php');
            }
        }
        
        
        if($default):
            require_once("./views/templates/footer.php");
        endif;
    }
}