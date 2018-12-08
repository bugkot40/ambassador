<?php


namespace app\controllers;


use yii\web\Controller;

class AmbassadorController extends Controller
{
    public $layout = 'ambassador/main';

    public function actionIndex()
    {
        return $this->render('index', [
                'hello' => 'Ambassador'
            ]
        );
    }
}