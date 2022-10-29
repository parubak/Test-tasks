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

            $this->mainContent = $this->view->loadView($fileMain, ["nowDate" => date("Y-m-d")]);
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

            if (isset($_GET["id"])) {
                $fileMain = 'info';

                $this->mainContent = $this->view->loadView(
                    $fileMain
                    ,
                    [self::CONTENT => $this->model->selectById($_GET["id"])]
                );
            }

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

            $fileMain = 'edit';

            $this->mainContent = $this->view->loadView($fileMain, [
                self::CONTENT => $this->model->selectById($_GET["id"]),
                "nowDate" => date("Y-m-d")
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

    public function actionDelete()
    {
        if ($_SERVER[self::METHOD] === self::POST) {
            if (!empty($_POST["id"])) {
                $this->model->deleteById($_POST["id"]);

                exit(200);
            }
        }
    }
}