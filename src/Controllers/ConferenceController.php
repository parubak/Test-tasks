<?php

namespace SerogaGolub\Controllers;

use SerogaGolub\Models\AddModel;
use SerogaGolub\System\Controller;

class ConferenceController extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->model = new AddModel();
    }

    public function  actionAdd(){
        if ($_SERVER[self::METHOD]===self::POST) {

            if (! empty($_POST)){
              if ($this->model->addData($_POST)){
                  $this->displayMessage="OK";
              }else{
                  $this->displayMessage="ERROR";
              };
              $_POST=null;
              dd( $this->displayMessage);
                exit(200);
            }
            exit(404);
        }

        $fileMain = 'add';

        $this->mainContent = $this->view->loadView($fileMain,["nowDate"=>date("Y-m-d")]);
        $this->arrayData = [
            self::CONTENT => [
                "main"=> $this->mainContent
            ],
            self::MESSAGE=>$this->displayMessage
        ];

        $this->view->renderLayout($this->viewLayout, $this->arrayData);
    }
    public function  actionUpdata(){
        if ($_SERVER[self::METHOD]===self::POST) {
            var_dump($_POST);
            if (! empty($_POST["send"])){
                $this->displayMessage=$_POST["send"];
                $_POST=null;
            }

            return;
        }else {
            echo self::GET;
            var_dump($_GET);
        }

        $fileMain = 'updata';

        $this->mainContent = $this->view->loadView($fileMain,["nowDate"=>date("Y-m-d")]);
        $this->arrayData = [
            self::CONTENT => [
                "updata"=> $this->mainContent
            ],
            self::MESSAGE=>$this->displayMessage
        ];

        $this->view->renderLayout($this->viewLayout, $this->arrayData);

    }
    public function  actionDelete(){
        if ($_SERVER[self::METHOD]===self::POST) {
            if (! empty($_POST["id"])){



                exit(200);
            }
        }
    }
}