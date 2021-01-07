<?php


namespace app\controllers;


use app\components\MenuWidget;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    public function actionView($id)
    {
        $category = Category::findOne($id);
        if ( empty($category) ) {
            throw new NotFoundHttpException("Такой категории нет");
        }

        $query = Product::find()->where(['category_id' => $id]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $breadcrumbs = array_reverse(MenuWidget::getBreadcrumbs($category->id));

        $this->setMeta(
            "{$category->title} :: " . \Yii::$app->name,
            $category->keywords,
            $category->description
        );

        return $this->render('view', compact('products', 'category', 'breadcrumbs', 'pages'));
    }
}