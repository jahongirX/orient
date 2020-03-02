<?php

$this->title = \common\models\Settings::findOne('title')->getLang('val');

?>

<?=\frontend\widgets\SectionAbout::widget() ?>

<?=\frontend\widgets\SectionProduct::widget() ?>

<?=\frontend\widgets\SectionProductMob::widget() ?>

<?=\frontend\widgets\SectionLogic::widget() ?>

<?=\frontend\widgets\SectionStrength::widget() ?>

<?=\frontend\widgets\SectionStrengthMob::widget() ?>

<?=\frontend\widgets\SectionQuestion::widget() ?>

<?=\frontend\widgets\SectionConsult::widget() ?>
