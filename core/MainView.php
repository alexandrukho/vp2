<?php
namespace App;

class MainView
{
    public function render(String $filename, $data = null)
    {
        require_once 'views/'.$filename.'.php';
    }
}