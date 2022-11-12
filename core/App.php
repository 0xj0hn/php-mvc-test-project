<?php 


class App{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct(){
        $url = $this->parse_url();
        $file = "controller/" . $this->controller . ".php";

        //CONTROLLER CHECKING SECTION.
        if (file_exists($file)){
            $this->controller = $url[0];
            $file = "./controller/" . $this->controller . ".php";
            unset($url[0]);
        }
        include $file;


        //METHOD CHECKING SECTION.
        if (isset($url[1])){

            if (method_exists($this->controller, $url[1])){ 
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        


        //PARAMS SECTION.

        $this->params = $url ? array_values($url) : []; //rebase indexes. 
        unset($url);
        $this->controller = new $this->controller;
        call_user_func_array([$this->controller, $this->method], $this->params);



    }

    public function parse_url(){
        $url = $_GET["url"];
        if (isset($url)){
            $trimmed_url = rtrim($url, '/');
            $splitted_url = explode("/", $trimmed_url);
            return $splitted_url;
        }
    }

}
?>
