<?php


namespace app\components;


use app\models\Category;
use app\models\Product;
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
            $this->tree = $this->setData()->getTree();

            $this->menuHtml = "<ul class='{$this->ul_class}'>{$this->getMenuHtml($this->tree)}</ul>";
            \Yii::$app->cache->set('top_menu', $this->menuHtml, 86400);
        }

        return $this->menuHtml;
    }

    private function setData()
    {
        $this->data = Category::find()
            ->select(['id', 'parent_id', 'title'])
            ->indexBy('id')
            ->asArray()
            ->all();

        return $this;
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

    public static function getBreadcrumbs($categoryId)
    {
        $self = new self;
        $tree = $self->setData()->getTree();
        $breadcrumbs = [];
        self::collectBreadcrumbsRecursive($categoryId, $tree, $breadcrumbs);

        return $breadcrumbs;
    }

    private static function collectBreadcrumbsRecursive($categoryId, $tree, &$result)
    {
        foreach ($tree as $item) {
            if ( !empty($item['children']) ) {
                $parent_id = self::collectBreadcrumbsRecursive($categoryId, $item['children'], $result);
                if ($parent_id > 0 && $parent_id == $item['id'] && $item['parent_id'] == 0) {
                    array_push($result, $item, ['home' => true]);
                } elseif ($parent_id > 0 && $parent_id == $item['id'] && $item['parent_id'] != 0) {
                    array_push($result, $item);
                }
            }
            if ($item['id'] == $categoryId) {
                if ( empty($item['children']) ) {
                    if ($item['parent_id'] == 0) {
                        array_push($result, $item, ['home' => true]);
                    } else {
                        array_push($result, $item);
                        return $item['parent_id'];
                    }
                }
            }
        }
    }
}