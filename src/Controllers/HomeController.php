<?php

namespace SerogaGolub\Controllers;

use SerogaGolub\Models\HomeModel;
use SerogaGolub\System\Controller;

/**
 * Главный контроллер приложения
 */
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new HomeModel();
        $this->data = $this->model->readData();
    }

    /**
     * @throws \ErrorException
     */
    public function actionMain()
    {
        // Рендер главной страницы портала

        $fileMain = 'list';

        $this->mainContent = $this->view->loadView($fileMain,[self::CONTENT=>$this->data]);
        $this->arrayData = [
            self::CONTENT => [
                "main"=> $this->mainContent
            ],
            self::MESSAGE=>$this->displayMessage
        ];

        $this->view->renderLayout($this->viewLayout, $this->arrayData);
    }


}