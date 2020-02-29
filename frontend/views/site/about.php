<?php

$this->title = Yii::t('main', 'О компании');

?>
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="title title-page"><?=Yii::t('main', 'О компании')?></h2>

            </div>
        </div>
    </div>
</section>
<section class="info-block">

    <div class="container">

        <div class="row">
        <div class="col-md-8">
        <span></span>

            <h2><?= Yii::t('main', 'О компании')?></h2>

            <p><?= Yii::t('main', 'about-text')?></p>

        </div>
        <div class="col-md-4">
            <div class="banner-box owl-carousel">
                <?php if(isset($adverts)):?>
                    <?php foreach ($adverts as $advert):?>
                        <?php

                        if($advert->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'advertise/' . $advert->id . '/l_' . $advert->getLang('image')))
                        {
                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'advertise/' . $advert->id . '/l_' . $advert->getLang('image');

                        } else {

                            $image = '/images/default/l_post.jpg';

                        }
                        ?>
                        <?php if($advert->getLang('image')):?>
                            <div class="item">

                                <a href="htpp://<?=$advert->url?>"><img src="<?=$image?>"></a>

                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>

        </div>
    </div>
</section>