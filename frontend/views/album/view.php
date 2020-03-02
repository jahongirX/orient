<?php

use yii\widgets\LinkPager;

$this->title = \common\models\Settings::findOne('title')->getLang('val') . " - ". Yii::t('main','Albums') . " - " . $album->getLang('name');

$js = <<<JS
    $('.albums-page-box').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        gallery: {
            enabled: true
        }
    });
JS;

$this->registerJs($js);


?>

<div class="inner-page-banner-area" style="background-image: url('/img/featured/back.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1><?=$album->getLang('name')?></h1>
            <ul>
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('main','home')?></a> -</li>
                <li><a href="<?=\yii\helpers\Url::to(['album/index'])?>"><?=Yii::t('main','Albums')?></a> -</li>
            </ul>
        </div>
    </div>
</div>

<section class="page-content albums-page">

    <div class="container">

        <h2 class="albums-page-title"><?=$album->getLang('name')?></h2>

        <div class="row">

            <div class="albums-page-box row">

                <?php

                foreach($models as $model):


                if($model->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/m_' . $model->guid ))
                {
                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/l_' . $model->guid;

                } else {

                    $image = '/images/default/l_post.jpg';

                }

                ?>

                <div class="col-3 col-md-3">

                        <a href="<?=$image?>" class="albums-item-page">

                            <img src="<?=$image?>" alt="">

                        </a>
                </div>


                    <?php

                endforeach;

                ?>


            </div>

        </div>

        <?= LinkPager::widget([
            'pagination' => $pagination
        ]); ?>

    </div>

</section>
