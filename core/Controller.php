<?php 

class Controller{
    protected function model($model){
        include "./model/" . $model . ".php";
        $model = $model . "model";
        return new $model; //return an object of the model class.

    }
}



?>
