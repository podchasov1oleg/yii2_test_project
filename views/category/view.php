<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <?php foreach ($breadcrumbs as $key => $item): ?>
                <? if ($item['home']): ?>
                    <li>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <a href="<?= \yii\helpers\Url::home() ?>">Home</a>
                        <span>|</span>
                    </li>
                <? else: ?>
                    <li>
                        <? if (empty($item['children']) && $item['id'] != $category->id): ?>
                            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $item['id']]) ?>">
                                <?= $item['title'] ?>
                            </a>
                        <? else: ?>
                            <?= $item['title'] ?>
                        <? endif; ?>
                        <? if ($key != count($breadcrumbs) - 1): ?>
                            <span>|</span>
                        <? endif; ?>
                    </li>
                <? endif; ?>
            <?php endforeach; ?>
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
            <h3><?= $category->title ?></h3>
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
                                                    <form action="#" method="post">
                                                        <fieldset>
                                                            <input type="hidden" name="cmd" value="_cart"/>
                                                            <input type="hidden" name="add" value="1"/>
                                                            <input type="hidden" name="business" value=" "/>
                                                            <input type="hidden" name="item_name"
                                                                   value="knorr instant soup"/>
                                                            <input type="hidden" name="amount" value="3.00"/>
                                                            <input type="hidden" name="discount_amount" value="1.00"/>
                                                            <input type="hidden" name="currency_code" value="USD"/>
                                                            <input type="hidden" name="return" value=" "/>
                                                            <input type="hidden" name="cancel_return" value=" "/>
                                                            <input type="submit" name="submit" value="Add to cart"
                                                                   class="button"/>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <div class="col-md-12 text-center">
                        <?= \yii\widgets\LinkPager::widget([
                            'pagination' => $pages
                        ]) ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    <h6>Здесь пока нет товаров</h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>