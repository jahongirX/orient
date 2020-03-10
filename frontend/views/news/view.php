<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . \common\models\NewsCategory::findOne($model->category)->getLang('name') . "-" . $model->getLang('title');


?>
<?php
if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' . $model->getLang('main_image') )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'news/' . $model->id . '/l_' .  $model->getLang('main_image');

} else {

    $image = '/images/default/m_post.jpg';

}
?>

<section class="statya">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="titler littler"><?=$model->title?></h3>
            </div>

            <div class="col-md-12 statya-text">
                <p><?=$model->second_title?></p>

            </div>

            <div class="col-md-12">
                <div class="statya-carousel owl-carousel">

                    <div class="item">
                        <img src="/images/staty-carousel-img.png" alt="IMG">
                    </div>

                    <div class="item">
                        <img src="/images/staty-carousel-img.png" alt="IMG">
                    </div>

                    <div class="item">
                        <img src="/images/staty-carousel-img.png" alt="IMG">
                    </div>

                    <div class="item">
                        <img src="/images/staty-carousel-img.png" alt="IMG">
                    </div>

                    <div class="item">
                        <img src="/images/staty-carousel-img.png" alt="IMG">
                    </div>

                    <div class="item">
                        <img src="/images/staty-carousel-img.png" alt="IMG">
                    </div>


                </div>
            </div>

            <div class="col-md-12 statya-text">
                <p><?=$model->body?></p>
            </div>

            <div class="col-md-12 statya-text">
                <div class="col-md-4 sharing">
                    <a href="<?=\common\components\StaticFunctions::getSettings('Blogger')?>"><img src="/images/sm/Blogger.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Facebook')?>"><img src="/images/sm/Facebook.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Google')?>"><img src="/images/sm/Google+.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Instgram')?>"><img src="/images/sm/Instgram.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Odnoklassniki')?>"><img src="/images/sm/Odnoklassniki.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Pinterest')?>"><img src="/images/sm/Pinterest.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Twitter')?>"><img src="/images/sm/Twitter.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('Vkontakte')?>"><img src="/images/sm/Vkontakte.png" alt=""></a>
                    <a href="<?=\common\components\StaticFunctions::getSettings('YouTube2')?>"><img src="/images/sm/YouTube2.png" alt=""></a>
                </div>


                <div class="col-md-12 text-center btnch">
                    <a class="more sweep-to-right text-center" href="<?=yii\helpers\Url::to(['product/catalog'])?>"><?=Yii::t('main','goCatalog')?></a>
                </div>

            </div>











        </div>



    </div>
</section> 
