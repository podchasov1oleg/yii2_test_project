<?php


namespace app\controllers;


use app\models\Product;

class HomeController extends AppController
{
    public function actionIndex()
    {
        if ( \Yii::$app->cache->get('index_hot_offers') ) {
            $offers = \Yii::$app->cache->get('index_hot_offers');
        } else {
            $offers = Product::find()
                ->where(['is_offer' => 1])
                ->limit(4)
                ->all();
            \Yii::$app->cache->set('index_hot_offers', $offers, 86400);
        }


        return $this->render('index', compact('offers'));
    }
}