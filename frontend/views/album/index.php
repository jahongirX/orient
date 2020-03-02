<?php

use yii\widgets\LinkPager;

$this->title = \common\models\Settings::findOne('title')->getLang('val') . " - " . Yii::t('main', 'Albums');

?>

<div class="inner-page-banner-area" style="background-image: url('/img/featured/back.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1><?=Yii::t('main', 'Albums')?></h1>
            <ul>
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('main','home')?></a> -</li>
            </ul>
        </div>
    </div>
</div>

<section class="page-content albums-page">

    <div class="container">

        <h2 class="albums-page-title row"><?=Yii::t('main','Albums')?> </h2>

        <div class="row">

            <div class="albums-page-box row">



                    <?php

                    foreach($models as $model):

                        $imageModel = \common\models\Image::find()->where('status=1 AND album=' . $model->id )->limit(1)->one();

                        if($imageModel->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $imageModel->album . '/m_' . $imageModel->guid ))
                        {
                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $imageModel->album . '/l_' . $imageModel->guid;

                        } else {

                            $image = '/images/default/l_post.jpg';

                        }

                         ?>

                            <div class="col-12 col-md-4">

                                    <a href="/album/view/<?= $model->id ?>" class="albums-page-item">

                                        <div class="albums-page-item-image lazy-image" style="background-image:url('<?= $image ?>')" data-src="<?= $image ?>"></div>
                                        <div class="albums-page-item-caption"><?= $model->getLang('name') ?></div>

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
