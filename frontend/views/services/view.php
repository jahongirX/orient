<?php

$this->title = Yii::t('main', 'Services');

?>

<section class="page-content single__news-page">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <h2 class="single__news-page-title"><?=$model->getLang('title')?></h2>

                <div class="single__news-page-content">

                    <?=\common\components\StaticFunctions::kcfinder($model->getLang('description'))?>

                    <a href="/services/print/<?= $model->id ?>" class="single__news-page-content-print">Распечатать</a>

                </div>

            </div>

            <div class="col-md-3">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

    </div>

</section>