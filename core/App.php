<?php 


class App{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct(){
        $url = $this->parse_url(); //it returns an array
        $file = "controller/" . $this->controller . ".php"; //declare file

        //CONTROLLER CHECKING SECTION.
        if (file_exists($file)){
            $this->controller = $url[0];
            $file = "./controller/" . $this->controller . ".php";
            unset($url[0]);
        }
        include $file; //include the controller file.


        //METHOD CHECKING SECTION.
        if (isset($url[1])){

            //check if the class and the method exists. (pattern: UserController, methodname)
            if (method_exists($this->controller, $url[1])){ 
                $this->method = $url[1]; //set the method to be called later.
                unset($url[1]);
            }
        }

        /*
         * We've taken our $url out 'til now (it's empty.) and if the url don't have parameters, it's empty otherwise,
         * it has something as parameters.
         * 
         * $url[2,3,...] are our parameters and we have to pass it to the method.
         */
        


        //PARAMS SECTION.

        /*
         * We're going to pass the values of $url array to the params if it's not empty.
         */
        $this->params = $url ? array_values($url) : []; //rebase indexes. 
        unset($url); //free url values
        $this->controller = new $this->controller; //declare a variable to have an object into itself.
        call_user_func_array([$this->controller, $this->method], $this->params); //calling the method.



    }

    public function parse_url(){
        $url = $_GET["url"];
        if (isset($url)){
            $trimmed_url = rtrim($url, '/'); //trim url if it has some weird slashes at the begining/end  :D
            $splitted_url = explode("/", $trimmed_url); //split url into sections according to the / character.
            return $splitted_url;
        }
    }

}
?>
