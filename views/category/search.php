<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="<?= \yii\helpers\Url::home() ?>">Home</a>
                <span>|</span>
            </li>
            <li>Поиск</li>
        </ul>
    </div>
</div>
<div class="banner">
    <?= $this->render('//layouts/includes/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3>Best Deals For New Products<span class="blink_me"></span></h3>
        </div>
        <div class="w3ls_w3l_banner_nav_right_grid">
            <? if ( !empty($q) ): ?>
                <h3>Поиск: "<?= \yii\helpers\Html::encode($q) ?>"</h3>
            <? endif; ?>
            <?php if (!empty($products)): ?>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    <h6>food</h6>
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-3 w3ls_w3l_banner_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                    <? if ($product->is_offer): ?>
                                        <div class="agile_top_brand_left_grid_pos">
                                            <?= \yii\helpers\Html::img(
                                                "@web/images/offer.png",
                                                ['class' => 'img-responsive']
                                            ) ?>
                                        </div>
                                    <? endif; ?>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                                        <?= \yii\helpers\Html::img(
                                                            "@web/images/{$product->img}",
                                                            ['alt' => $product->title]
                                                        ) ?>
                                                    </a>
                                                    <p><?= $product->title ?></p>
                                                    <h4>
                                                        $<?= $product->price ?>
                                                        <?= $product->old_price > 0 ? "<span>\${$product->old_price}</span>" : "" ?>
                                                    </h4>
                                                </div>
                                                <div class="snipcart-details">
                                                    <a
                                                            href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>"
                                                            data-id="<?= $product->id ?>"
                                                            class="button js-add-to-cart"
                                                    >Add to cart</a>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <? if ( !empty($pages) ): ?>
                        <div class="col-md-12 text-center">
                            <?= \yii\widgets\LinkPager::widget([
                                'pagination' => $pages
                            ]) ?>
                        </div>
                    <? endif; ?>
                </div>
            <?php else: ?>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    <h6>По вашему запросу ничего не найдено</h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>