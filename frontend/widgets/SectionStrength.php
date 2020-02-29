<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:33
 */

namespace frontend\widgets;


use yii\base\Widget;

class SectionStrength extends Widget
{
    public function run()
    {
       return $this->render('SectionStrength');
    }
}