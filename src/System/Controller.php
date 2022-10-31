<?php

namespace SerogaGolub\System;

class  Controller
{

    const METHOD = "REQUEST_METHOD";
    const GET = "GET";
    const POST = "POST";

    const CONTENT = "CONTENT";
    const MESSAGE = "MESSAGE";

    protected $model;
    protected $view;
    protected $data;

    protected $viewLayout;
    protected $mainContent;

    protected $arrayData;
    protected $displayMessage;


    public function __construct()
    {
        $this->displayMessage = "";
        $this->viewLayout = "index";
        $this->view = new View();
    }
}