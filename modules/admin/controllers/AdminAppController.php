<?php


namespace app\modules\admin\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class AdminAppController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }
}