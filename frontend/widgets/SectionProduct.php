<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:08
 */

namespace frontend\widgets;


use yii\base\Widget;

class SectionProduct extends Widget
{
    public function run()
    {
        return $this->render('SectionProduct');
    }
}