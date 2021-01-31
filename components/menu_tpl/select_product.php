<option
    value="<?= $category['id'] ?>"
    <?= $category['id'] == $this->model->category_id ? 'selected' : '' ?>
>
    <?= " {$tab} {$category['title']} " ?>
</option>
<? if ($category['children']): ?>
    <?= $this->getMenuHtml($category['children'], $tab . '-') ?>
<? endif; ?>