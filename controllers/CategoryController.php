<?php


namespace app\controllers;


use app\components\MenuWidget;
use app\models\Category;
use app\models\Product;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    public function actionView($id)
    {
        $category = Category::findOne($id);
        if ( empty($category) ) {
            throw new NotFoundHttpException("Такой категории нет");
        }

        $products = Product::find()->where(['category_id' => $id])->all();

        $breadcrumbs = array_reverse(MenuWidget::getBreadcrumbs($category->id));

        $this->setMeta(
            "{$category->title} :: " . \Yii::$app->name,
            $category->keywords,
            $category->description
        );

        return $this->render('view', compact('products', 'category', 'breadcrumbs'));
    }
}