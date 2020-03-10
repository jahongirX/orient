<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " .Yii::t('main', 'all-news');

?>

<section class="page-title pyatno news-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <p>
                    <?=Yii::t('main','newsCompany')?>
                </p>

                <div class="btnch">
                    <a class="more sweep-to-right text-center" href="<?=yii\helpers\Url::to(['product/catalog'])?>"><?=Yii::t('main','viewCatalog')?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="calc-text news-text" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 about-text">

                <div class="img">
                    <img src="/images/calc-text-img.png" alt="img">
                </div>

                <div class="text">
                    <p>
                        Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Не следует, однако забывать, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям.
                    </p>

                    <p>
                        Повседневная практика показывает, что консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации соответствующий условий активизации. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет выполнять важные задания по разработке соответствующий условий активизации.
                    </p>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="news" >
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main','newsMoment')?></h3>
            </div>


            <div class="col-md-3 catalog-form">

                <?= \frontend\widgets\AllNewsSidebar::widget();?>

            </div>

            <div class="col-md-9 catalog-result news-sorting">
                <div class="result-title">
                    <a href="#" class="responsive-radio-modal" data-toggle="modal" data-target="#archive-modal"><img src="/images/responsive/news-modal-form-btn.png" alt="btn"></a>
                    <p class="sort-by"><?=Yii::t('main','filter')?>
                        <a href="#" id="sortbydate"><span><?=Yii::t('main','asDate')?></span> <img src="/images/catalog-sort-icon.png" class="mr-25" alt="icon"></a>
                        <a href="#" id="sortbyrate"><span><?=Yii::t('main','asReyting')?></span> <img src="/images/catalog-sort-icon.png" alt="icon"></a>
                    </p>
                </div>

                <div class="news-items">
                    <?php if (!empty($models)): ?>

                        <div class="row">
                            <?php foreach ($models as $model) :?>
                                <?php

                                if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'News/' . $model->id . '/l_' . $model->getLang('main_image') )) {

                                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'News/' . $model->id . '/l_' .  $model->getLang('main_image');

                                }else{

                                    $image = '/images/default/m_post.jpg';

                                }
                                ?>
                                <?php if(!empty($model->getLang('id'))): ?>

                                <div class="col-md-4 col-sm-6">
                                    <div class="item">
                                        <div class="news-item-act">
                                            <div class="news-item-theme">
                                                <p><?=\common\models\NewsCategory::findOne($model->category)->getLang('name')?></p>
                                            </div>
                                            <div class="news-item-share">
                                                <img class="share" src="/images/news-share.png" alt="share">
                                                <img class="heart" src="/images/news-heart.png" alt="heart">
                                            </div>
                                        </div>

                                        <div class="news-item-title">
                                            <p class="title"><?=$model->getLang('title')?></p>
                                            <p class="date"><?=$model->getLang('event_date')?></p>
                                        </div>

                                        <div class="news-item-text">
                                            <?=$model->getLang('second_title')?>
                                        </div>

                                        <div class="text-center btnch">
                                            <a class="more sweep-to-right text-center" href="<?=yii\helpers\Url::to(['news/view','id'=>$model->id])?>"><?=Yii::t('main','read-more')?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                <div class="catalog-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php echo LinkPager::widget(['pagination' => $pagination]);?>

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</section>
            <?= \frontend\widgets\SectionConsult::widget();?>

