<?php
$this->title = "Статистика магазина";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
    
            <div class="info-box-content">
                <a href="<?= \yii\helpers\Url::to(['order/index']) ?>" class="info-box-text">Orders</a>
                <span class="info-box-number"><?= $orders ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
    
            <div class="info-box-content">
                <a href="<?= \yii\helpers\Url::to(['product/index']) ?>" class="info-box-text">Products</a>
                <span class="info-box-number"><?= $products ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
    
            <div class="info-box-content">
                <a href="<?= \yii\helpers\Url::to(['category/index']) ?>" class="info-box-text">Categories</a>
                <span class="info-box-number"><?= $categories ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
<!-- /.col -->
<!-- /.col -->
</div>
