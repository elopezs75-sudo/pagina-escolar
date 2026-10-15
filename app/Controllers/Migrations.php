<?php

namespace App\Controllers;

class Migrations extends BaseController
{
    public function index()
    {
        $migrate = \Config\Services::migrations();

        try {
            $migrate->latest();
            echo "migrations";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}