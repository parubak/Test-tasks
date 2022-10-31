<?php

namespace SerogaGolub\Controllers;

use SerogaGolub\Models\ConferenceModel;
use SerogaGolub\System\Controller;

class ConferenceController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ConferenceModel();
    }

    /**
     * @throws \ErrorException
     */
    public function actionAdd()
    {
        if ($_SERVER[self::METHOD] === self::POST) {
            if (!empty($_POST)) {
                $this->model->addData($_POST);

                $_POST = null;
            }
        } else {
            $fileMain = 'add';

            $this->mainContent = $this->view->loadView($fileMain, ["nowDate" => gmdate("Y-m-d")]);
            $this->arrayData = [
                self::CONTENT => [
                    "main" => $this->mainContent
                ]
            ];

            $this->view->renderLayout($this->viewLayout, $this->arrayData);
        }
    }

    /**
     * @throws \ErrorException
     */
    public function actionInfo()
    {
        if ($_SERVER[self::METHOD] === self::GET) {

            if (empty($_GET["id"])){
                throw new \ErrorException("Error info! No parameter id");
            }

            $conference=$this->model->selectById($_GET["id"]);

            if (empty($conference)){
                throw new \ErrorException("Error info! No conference #".$_GET["id"]);
            }

            $fileMain = 'info';

            $this->mainContent = $this->view->loadView(
                $fileMain
                , [self::CONTENT => $conference]
            );

            $this->arrayData = [
                self::CONTENT => [
                    "main" => $this->mainContent
                ],
                self::MESSAGE => $this->displayMessage
            ];

            $this->view->renderLayout($this->viewLayout, $this->arrayData);
        }
    }

    /**
     * @throws \ErrorException
     */
    public function actionEdit()
    {
        if ($_SERVER[self::METHOD] === self::POST) {
            if (!empty($_POST)) {
                $this->model->updateData($_POST);
                $_POST = null;
            }
        } else {
            if (empty($_GET["id"])){
                throw new \ErrorException("Error edit! No parameter id");
            }

            $conference=$this->model->selectById($_GET["id"]);

            if (empty($conference)){
                throw new \ErrorException("Error edit! No conference #".$_GET["id"]);
            }
            $fileMain = 'edit';

            $this->mainContent = $this->view->loadView($fileMain, [
                self::CONTENT => $conference,
                "nowDate" => gmdate("Y-m-d")
            ]);

            $this->arrayData = [
                self::CONTENT => [
                    "main" => $this->mainContent
                ],
                self::MESSAGE => $this->displayMessage
            ];


            $this->view->renderLayout($this->viewLayout, $this->arrayData);
        }
    }

    /**
     * @throws \ErrorException
     */
    public function actionDelete()
    {
        if ($_SERVER[self::METHOD] === self::POST) {
            if (!empty($_POST["id"])) {
                $this->model->deleteById($_POST["id"]);
            }
        }
    }
}