<?php

namespace SerogaGolub\Controllers;

use SerogaGolub\Models\CrudModel;
use SerogaGolub\System\Controller;

/**
 * Главный контроллер приложения
 */
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new CrudModel();
        $this->data = $this->model->readData();
    }

    /**
     * @throws \ErrorException
     */
    public function actionMain()
    {
        // Рендер главной страницы портала
//        $fileBody='news';
        $fileHead = 'head';
//
//
//        $bodyContent=$this->view->loadView($fileBody);
        $headContent = $this->view->loadView($fileHead);
        $arrayData = [
            "data" => $this->data,
            "content" => [
                "head" => $headContent
            ]
        ];

        $this->view->renderLayout('list', $arrayData);
    }


}