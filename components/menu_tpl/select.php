<option
    value="<?= $category['id'] ?>"
    <?= $category['id'] == $this->model->parent_id ? 'selected' : '' ?>
    <?= $category['id'] == $this->model->id ? 'disabled' : '' ?>
>
    <?= " {$tab} {$category['title']} " ?>
</option>
<? if ($category['children']): ?>
    <?= $this->getMenuHtml($category['children'], $tab . '-') ?>
<? endif; ?>