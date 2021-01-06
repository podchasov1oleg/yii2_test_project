<li class="<?= $category['children'] ? 'dropdown' : '' ?>">
    <a
        <?= $category['children'] ? 'class="dropdown-toggle" data-toggle="dropdown"' : '' ?>
        href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>"
    >
        <?= $category['title'] ?>
    </a>
    <? if ($category['children']): ?>
        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
            <div class="w3ls_vegetables">
                <ul>
                    <?= $this->getMenuHtml($category['children']) ?>
                </ul>
            </div>
        </div>
    <? endif; ?>
</li>