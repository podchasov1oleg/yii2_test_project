<?php

namespace app\modules\admin\controllers;

class MainController extends AdminAppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
