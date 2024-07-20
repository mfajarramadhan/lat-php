<?php
class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
    // tidak perlu di instansiasi karena isinya hanya file html

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    // harus di instansiasin karena berisi class
}
