<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->context->layout = 'grocery';
?>

<div class="banner">
    <?= $this->render('//layouts/includes/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>

            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
