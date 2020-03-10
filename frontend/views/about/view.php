<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - ". $model->name;


?>

<section class="page-title pyatno about-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <p>
                    <?=Yii::t('main','О_компании')?>
                </p>

                <div class="btnch">
                    <a class="more sweep-to-right text-center" href="#"><?=Yii::t('main','Посмотреть_каталог')?></a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-info-tabs">
    <?php if (!empty($models)): ?>
    <?php $count = 1; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="list-group" id="list-tab" role="tablist">
                <?php foreach ($models as $model): ?>
                    <?php
                    if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'about/' . $model->id . '/l_' . $model->main_image )) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'about/' . $model->id . '/l_' .  $model->main_image;

                    } else {

                        $image = '/images/default/s_post.jpg';

                    }
                    ?>
                    <a class="list-group-item list-group-item-action <?=($count == 1)? 'active': '';?>" id="list-about-tab-<?=$model->id?>" data-toggle="list" data-id="<?=$model->id?>" href="#list-pane-tab-<?=$model->id?>" role="tab" aria-controls="techniuqe">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="item">
                                    <img src="<?=$image?>" alt="Question1">
                                    <p><?=$model->title?></p>
                                </div>
                            </div>
                        </div>

                    </a>
                    <?php $count++ ?>
                <?php endforeach; ?>
                </div>

            </div>


            <div class="col-md-12 mt-50">
                <div class="tab-content" id="nav-tabContent">
                    <?php foreach ($models as $model): ?>
                        <div class="tab-pane fade show  <?=($count == 1)? ' active': '';?>" id="list-pane-tab-<?=$model->id?>" role="tabpanel" aria-labelledby="list-techniuqe-question">
                            <div class="pane-item">
                                <img src="/images/about-pan-img.png" alt="Pan stick">
                                <div class="about-pane-text">
                                    <p><?=$model->info?></p>
                                </div>
                            </div>
                        </div>
                    <?php $count++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>




<section class="statistics">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="titler text-center">Наши показатели</h3>
            </div>




            <!-- HERE DIAGRAM CODE -->




        </div>
    </div>
</section>






<section class="calc-text mini-about-text" >
    <div class="container">
        <div class="col-md-12 about-text">

            <div class="img">
                <img src="/images/mini-about-text-img.png" alt="img">
            </div>

            <div class="text">

                <p>
                    Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Не следует, однако забывать, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям и модернизации соответствующий условий активизации.
                </p>

            </div>

        </div>

    </div>
</section>


<?=\frontend\widgets\Testimonials::widget() ?>

<?=\frontend\widgets\SectionConsult::widget() ?>