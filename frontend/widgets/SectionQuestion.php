<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:39
 */

namespace frontend\widgets;


use yii\base\Widget;

class SectionQuestion extends Widget
{
    public function run()
    {
       return $this->render('SectionQuestion');
    }
}