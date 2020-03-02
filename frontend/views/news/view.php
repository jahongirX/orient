<?php

$this->title = \common\models\NewsCategory::findOne($model->category)->getLang('name') . "-" . $model->getLang('title');


?>
<?php
if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->getLang('main_image') )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->getLang('main_image');

} else {

    $image = '/images/default/m_post.jpg';

}
?>

<div class="inner-page-banner-area" style="background-image: url('<?=$image?>');">
    <div class="container">
        <div class="pagination-area">
            <h1><?=$model->getLang('title')?></h1>
            <ul>
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('main','home')?></a> -</li>
                <li><a href="<?=\yii\helpers\Url::to(['news/by-cat','id'=>$model->category])?>"><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="news-details-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row news-details-page-inner">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="news-img-holder">
                            <div class="img-responsive" style="background-image: url('<?=$image?>')"></div>
                            <ul class="news-date1">
                                <li><?=date('d',strtotime($model->event_date))?> <?=date('M',strtotime($model->event_date))?></li>
                                <li><?=date('Y',strtotime($model->event_date))?></li>
                            </ul>
                        </div>
                        <h2 class="title-default-left-bold-lowhight"><a href="#"><?=$model->getLang('title')?></a></h2>
                        <ul class="title-bar-high news-comments">
                            <li><a href="<?=\yii\helpers\Url::to(['news/by-cat','id'=>$model->category])?>"><i class="fa fa-tags" aria-hidden="true"></i><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></a></li>

                        </ul>
                        <div>
                            <?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?>
                        </div>
                        <ul class="news-social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>

            <?= \frontend\widgets\Sidebar::widget();?>

        </div>
    </div>
</div>
