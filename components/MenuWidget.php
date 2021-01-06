<?php


namespace app\components;


use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        $this->ul_class = $this->ul_class ?? 'menu';

        $this->tpl = $this->tpl ?? 'menu';
        $this->tpl .= '.php';
    }

    public function run()
    {
        if ( \Yii::$app->cache->get('top_menu') ) {
            $this->menuHtml = \Yii::$app->cache->get('top_menu');
        } else {
            $this->data = Category::find()
                ->select(['id', 'parent_id', 'title'])
                ->indexBy('id')
                ->asArray()
                ->all();

            $this->tree = $this->getTree();

            $this->menuHtml = "<ul class='{$this->ul_class}'>{$this->getMenuHtml($this->tree)}</ul>";
            \Yii::$app->cache->set('top_menu', $this->menuHtml, 86400);
        }

        return $this->menuHtml;
    }

    public function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$item) {
            if ( intval($item['parent_id']) > 0 ) {
                $this->data[$item['parent_id']]['children'][$item['id']] = &$item;
            } else {
                $tree[$id] = &$item;
            }
        }

        return $tree;
    }

    private function getMenuHtml($tree)
    {
        $resultStr = "";
        foreach ($tree as $category) {
            $resultStr .= $this->categoryToTemplate($category);
        }

        return $resultStr;
    }

    private function categoryToTemplate($category)
    {
        ob_start();
        include __DIR__ . "/menu_tpl/{$this->tpl}";

        return ob_get_clean();
    }
}