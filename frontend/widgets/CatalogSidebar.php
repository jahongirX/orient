<?php


namespace frontend\widgets;


use yii\base\Widget;

class CatalogSidebar extends Widget
{
    public function run()
    {
        return $this->render('catalogSidebar');
    }

}