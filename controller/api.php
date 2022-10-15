<?php 
include "./core/Controller.php";

class Api extends Controller{
    public function coronavirus(){
        $model = $this->model('api');
        $corona = $model->get_corona_info();
        echo $corona; //return a json encoded corona virus statistics to the terminal. 
    }

    public function doginfo(){
        $model = $this->model('api');
        $dog = $model->get_dog_info();
        echo $dog; //return random dog info.
    }

    public function test(...$params){
        print_r($params);
    }
}



?>
