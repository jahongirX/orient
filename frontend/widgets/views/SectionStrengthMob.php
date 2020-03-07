<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:41
 */
?>
<?php if (!empty($models)): ?>
<section class="strength hidden-block-for-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main', 'Преимущества')?></h3>
            </div>
        </div>

        <div class="row strength-carousel owl-carousel">

            <?php foreach ($models as $model): ?>
                <?php
                if($model->img && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'benefits/' . $model->id . '/l_' . $model->img )) {

                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'benefits/' . $model->id . '/l_' .  $model->img;

                } else {

                    $image = '/images/default/m_post.jpg';

                }
                ?>
            <div class="strength-item">
                <div class="item">
                    <img src="<?=$image ?>" alt="Strength">
                    <p><?=$model->name ?></p>
                </div>
            </div>
            <?php endforeach; ?>


        </div>

        <div class="row">
            <div class="col-md-12 text-center btnch callme">
                <a class="more text-center" href="#"><?=Yii::t('main', 'заявку_Преимущества')?></a>
            </div>
        </div>

    </div>
</section>
<?php endif; ?>
