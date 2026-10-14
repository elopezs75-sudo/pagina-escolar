<?php namespace App\Controllers;

class Tareas extends BaseController
{
    public function index()
    {
        echo view("Tareas/index");
    }
}