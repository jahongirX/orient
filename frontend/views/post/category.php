<?php

use yii\widgets\LinkPager;

$this->title = \common\models\Settings::findOne('title')->getLang('val') . " - " . $category->getLang('name');

?>

<div class="inner-page-banner-area" style="background-image: url('/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1><?=$category->getLang('name')?></h1>
            <ul>
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('main','home')?></a> -</li>
                <li><?=$category->getLang('name')?></li>
            </ul>
        </div>
    </div>
</div>

<div class="news-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row">

                    <?php if(!empty($models)): ?>

                        <?php foreach ($models as $model) :?>

                            <?php if(!empty($model->getLang('id'))): ?>

                                <?php
                                if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/l_' . $model->getLang('main_image') )) {

                                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/l_' .  $model->getLang('main_image');

                                } else {

                                    $image = '/images/default/m_post.jpg';

                                }
                                ?>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="news-box">
                                        <div class="news-img-holder">
                                            <img src="<?=$image?>" class="img-responsive" alt="research">
                                        </div>
                                        <h3 class="title-news-left-bold">
                                            <a href="<?=\yii\helpers\Url::to(['post/view','id'=>$model->id])?>"><?=$model->getLang('title')?></a>
                                        </h3>

                                        <p><?=$model->getLang('anons')?></p>
                                    </div>
                                </div>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php endif; ?>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php echo LinkPager::widget(['pagination' => $pagination]);?>
                    </div>
                </div>
            </div>
            <?= \frontend\widgets\Sidebar::widget();?>
        </div>
    </div>
</div>

