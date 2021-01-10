<?php /* @var $this \yii\web\View */ ?>

<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="<?= \yii\helpers\Url::home() ?>">Home</a>
                <span>|</span>
            </li>
            <li>
                <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>">
                    <?= $product->category->title ?>
                </a>
                <span>|</span>
            </li>
            <li><?= $product->title ?></li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/includes/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <div class="agileinfo_single">
            <h5><?= $product->title ?></h5>
            <div class="col-md-4 agileinfo_single_left">
                <?= \yii\helpers\Html::img(
                    "@web/images/{$product->img}",
                    ['alt' => $product->title, 'id' => 'okzoom']
                ) ?>
            </div>
            <div class="col-md-8 agileinfo_single_right">
                <div class="w3agile_description">
                    <? if (!empty($product->content)): ?>
                        <h4>Description :</h4>
                        <p><?= $product->content ?></p>
                    <? endif; ?>
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <h4>
                            $<?= $product->price ?>
                            <?= $product->old_price > 0 ? "<span>\${$product->old_price}</span>" : "" ?>
                        </h4>
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                        <a
                            href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>"
                            data-id="<?= $product->id ?>"
                            class="button js-add-to-cart"
                        >Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->