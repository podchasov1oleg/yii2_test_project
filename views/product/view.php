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
                        <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="pulao basmati rice" />
                                <input type="hidden" name="amount" value="21.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <input type="submit" name="submit" value="Add to cart" class="button" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->