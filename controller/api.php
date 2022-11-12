<?php 
include "./core/Controller.php";

class Api extends Controller{
    public function coronavirus(){
        $model = $this->model('api');
        $json_corona = $model->get_corona_info();
        echo $json_corona;
    }

    public function doginfo(){
        $model = $this->model('api');
        $json_dog = $model->get_dog_info();
        echo $json_dog;
    }

    public function test(...$params){
        print_r($params);
    }
}



?>
