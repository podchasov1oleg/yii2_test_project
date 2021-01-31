<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Список категорий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <div class="category-create">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>