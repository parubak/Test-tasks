<?php

namespace SerogaGolub\System;

class  Controller
{

    protected $model;
    protected $view;
    protected $data;

    public function __construct()
    {
        $this->view=new View();
    }
}