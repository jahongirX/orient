<section class="feedback">
    <div class="container">

        <div class="col-md-12">
            <h3 class="text-center titler feedback-titler"><?=Yii::t('main','Отзывы_наших_клиентов')?></h3>
        </div>
        <?php if (!empty($models)): ?>
        <div class="feedback-carousel owl-carousel">
            <?php foreach ($models as $model): ?>
                <?php

                if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'testimonials/' . $model->id . '/l_' . $model->getLang('image') )) {

                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'testimonials/' . $model->id . '/l_' .  $model->getLang('main_image');

                }else{

                    $image = '/images/default/m_post.jpg';

                }
                ?>
            <div class="item">
                <div class="kavichki">
                    <img src="images/feedback-kavichki.png" alt="kavichki">
                </div>
                <div class="feedback-info">

                    <div class="feedback-title">
                        <p><?=$model->name?></p>


                    </div>

                    <div class="feedback-text">
                        <p><?=$model->message?></p>
                    </div>

                    <div class="feedback-user-info">

                        <?=$model->phone?>

                    </div>

                    <div class="feedback-city">
                        <?=$model->position?>
                    </div>
                </div>
                <div class="avatar">
                    <img src="<?=$image?>" alt="avatar">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
