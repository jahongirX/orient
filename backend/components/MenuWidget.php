<?php

namespace backend\components;


use yii\bootstrap\Widget;

class MenuWidget extends Widget
{
    public $items = [];

    public function run()
    {
        return $this->render('menu', ['items' => $this->items]);
    }
}