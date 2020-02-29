<?php

use common\models\Settings;
use yii\helpers\Url;

$this->title = Yii::t('main', 'Admissions');
$this->params['breadcrumbs'][] = $this->title;

?>


<section class="page-content headquarters-page">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <h2 class="headquarters-page-title"><?= $this->title ?></h2>

                <div class="row">

                    <?php

                    foreach($models as $model):

                        $image = '';
                        $imageMini = '';

                        if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'admission/' . $model->id . '/m_' . $model->image )) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'admission/' . $model->id . '/m_' . $model->image;

                        } else {

                            $image = '/images/default/m_post.jpg';

                        }

                        if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'admission/' . $model->id . '/s_' . $model->image )) {

                            $imageMini = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'admission/' . $model->id . '/s_' . $model->image;

                        } else {

                            $imageMini = '/images/default/s_post.jpg';

                        }

                        ?>

                        <div class="col-sm-6 col-md-6 col-lg-4">

                            <div class="headquarters-page-item">

                                <a class="headquarters-page-item-image lazy-image" style="background-image:url('<?= $imageMini ?>')" data-src="<?= $image ?>"></a>

                                <a class="headquarters-page-item-name"><?= $model->name ?></a>

                                <div class="headquarters-page-item-position"><?= $model->level_name ?></div>

                                <div class="headquarters-page-item-days">

                                    <div class="headquarters-page-item-days-title"><?=Yii::t('main','headquarters-page-item-days-title')?></div>

                                    <ul>
                                        <li><?= $model->reception_days ?></li>
                                    </ul>

                                </div>

                                <div class="headquarters-page-item-contacts">

                                    <div class="headquarters-page-item-contacts-title"><?=Yii::t('main','contacts-title')?></div>

                                    <ul>
                                        <li>Телефон: <?= $model->phone ?></li>

                                        <li>Факс: <?= $model->fax ?></li>

                                        <li>E-mail: <?= $model->email ?></li>

                                    </ul>

                                </div>

                                <div class="headquarters-page-item-footer">

                                    <a class="btn btn__blue" href=""><?=Yii::t('main','headquarters-page-write')?></a>
                                    <a class="btn btn__yellow" href=""><?=Yii::t('main','virtual-reception')?></a>

                                </div>
                            </div>
                        </div>

                        <?php

                    endforEach;

                    ?>



                </div>

            </div>

            <div class="col-md-3">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>
        </div>
    </div>
</section>