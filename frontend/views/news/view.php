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
                <h3 class="titler littler">Условное название статьи, которое придумал дизайнер</h3>
            </div>

            <div class="col-md-12 statya-text">
                <p>
                    Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Не следует, однако забывать, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям.
                </p>

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
                <p>
                    Повседневная практика показывает, что консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации соответствующий условий активизации. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет выполнять важные задания по разработке соответствующий условий активизации.
                </p>

                <ul>Равным образом сложившаяся структура организации в значительной:
                    <li>Степени обуславливает создание дальнейших направлений развития. </li>
                    <li>С другой стороны начало повседневной работы по формированию позиции позволяет выполнять.</li>
                    <li>Важные задания по разработке существенных финансовых и административных условий.</li>
                </ul>

                <p>
                    Разнообразный и богатый опыт новая модель организационной деятельности представляет собой интересный эксперимент проверки соответствующий условий активизации. Таким образом реализация намеченных плановых заданий влечет за собой процесс внедрения и модернизации соответствующий
                </p>
            </div>

            <div class="col-md-12">
                <h3 class="mini-titler">Равным образом сложившаяся структура организации в значительной </h3>
            </div>
            <div class="col-md-12 statya-text">
                <p>
                    Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Не следует, однако забывать, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям.
                </p>

                <p>
                    Повседневная практика показывает, что консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации соответствующий условий активизации.
                </p>

                <p>
                    Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям.
                </p>
                <p>
                    Повседневная практика показывает, что консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации соответствующий условий активизации.
                </p>


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
                    <a class="more sweep-to-right text-center" href="#"><?=Yii::t('main','goCatalog')?></a>
                </div>

            </div>











        </div>



    </div>
</section> 
