<?php 


class Controller {

    protected $controller = "home";
    protected $method = "index";
    protected $params = [];
    public function __construct(){
        if (isset($_GET["url"])){
            $this->route_maker();
        }
    }

    public function parse_url(){
        $url = $_GET["url"];
        $trimmed_url = rtrim($url, '/'); //trim url if it has some weird slashes at the begining/end  :D
        $splitted_url = explode("/", $trimmed_url); //split url into sections according to the / character.
        return $splitted_url;
    }

    public function route_maker(){
        $arr_url = $this->parse_url(); //parse url: it returns an array containing controller, method and params
        $this->controller = $arr_url[0]; //declare controller.
        $file = "../controller/" . $this->controller . "_controller.php"; //declare including.
        if (file_exists($file)){ //if the file exists do the following:
            require_once $file; //including controller.
            unset($arr_url[0]); //deleting the value of $arr_url[0] to zero :D
        }
    }
}





?>
