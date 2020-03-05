<?php
use common\models\Menu;

function renderFooterMenu($id)
{

    $out = '';

    //$menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $menus = Menu::find()->where('status=1')->andWhere(['type'=>1])->andWhere(['id' => $id])->all();

    foreach ($menus as $menu) {
        $out .= '<li>';
        $out .= '<a href="' . $menu->url . '">' . $menu->name . '</a>';

        if ($menu->type)

            $out .= '</li>';
    }

    return $out;
}


function renderFooterMenu2($id)
{

    $out = '';

    //$menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $menus = Menu::find()->where('status=1')->andWhere(['type'=>2])->andWhere(['id' => $id])->all();

//    echo "<pre>";
//    print_r($menus);die();

    foreach ($menus as $menu) {
        $out .= '<li>';
        $out .= '<a href="' . $menu->url . '">' . $menu->name . '</a>';

        if ($menu->type)

            $out .= '</li>';
    }

    return $out;
}
 ?>


<footer>
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-logo">
                        <a href="#"><img src="/images/footer-logo.png" alt="Logo"></a>
                    </div>
                    <div class="company-direction">
                        <?=\common\components\StaticFunctions::getSettings('Доставка') ?>
                    </div>
                    <div class="footer-contacts">
                        <h3><?=Yii::t('main','Конакты')?></h3>
                        <div class="contact-info">
                            <div class="phone-info">
                                <p><?=\common\components\StaticFunctions::getSettings('телефон')?></p>
                            </div>
                            <div class="phone-title">
                                <a href="tel:<?=\common\components\StaticFunctions::getSettings('телефон')?>">
                                    <img src="/images/phone-marker.png" alt="Place-Marker">
                                    <p><?=Yii::t('main', 'Бесплатный-звонок') ?></p>
                                </a>
                            </div>
                            <div class="email-info">
                                <a href="mailto:<?=\common\components\StaticFunctions::getSettings('электронной почте') ?> ">
                                    <img src="/images/email-marker.png" alt="Place-Marker">
                                    <p><?=\common\components\StaticFunctions::getSettings('электронной почте') ?></p>
                                </a>
                            </div>
                            <div class="copyright">
                                <?=\common\components\StaticFunctions::getSettings('авторское право') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 urls">

                    <ul><?=Yii::t('main', 'Изготовление')?>
                        <?php

                        foreach ($models as $model) {

                            echo renderFooterMenu( $model->id );

                        }

                        ?>
                    </ul>

                    <ul><?=Yii::t('main', 'Услуги')?>
                        <?php

                        foreach ($models2 as $model) {

                            echo renderFooterMenu2( $model->id );

                        }

                        ?>
                    </ul>


                </div>

                <div class="col-md-4">
                    <div class="company-news">
                        <h3><?=Yii::t('main', 'Новости компании')?></h3>

                        <?php if (!empty($news)): ?>
                        <?php foreach ($news as $item): ?>
                            <div class="news news1">
                                <div class="news-date">
                                    <p><?=Yii::t('main', 'Новости') ?></p>
                                    <p class="date"><?=$item->created_date?></p>
                                </div>

                                <div class="news-info">
                                    <h4><?=$item->title ?></h4>
                                    <h5><?=$item->anons ?></h5>
                                </div>

                                <div class="news-url">
                                    <a href="<?=\yii\helpers\Url::to(['news/view', 'id'=> $item->id ])?>">
                                        <p><?=Yii::t('main', 'Читать статью')?></p>
                                        <img src="/images/news-url-icon.png" alt="news-url">
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                        <a href="<?=\yii\helpers\Url::to(['news/view-all']) ?>" class="hidden-button-for-mobile"><?=Yii::t('main', 'Все новости')?></a>

                        <div class="footer-contacts hidden-block-for-mobile">
                            <h3><?=Yii::t('main','Конакты')?></h3>
                            <div class="contact-info">
                                <div class="phone-info">
                                    <p><?=\common\components\StaticFunctions::getSettings('телефон')?></p>
                                </div>
                                <div class="phone-title">
                                    <a href="tel:<?=\common\components\StaticFunctions::getSettings('телефон')?>">
                                        <img src="/images/phone-marker.png" alt="Place-Marker">
                                        <p><?=Yii::t('main', 'Бесплатный-звонок') ?></p>
                                    </a>
                                </div>
                                <div class="email-info">
                                    <a href="mailto:<?=\common\components\StaticFunctions::getSettings('электронной почте') ?> ">
                                        <img src="/images/email-marker.png" alt="Place-Marker">
                                        <p><?=\common\components\StaticFunctions::getSettings('электронной почте') ?></p>
                                    </a>
                                </div>
                                <div class="copyright">
                                    <?=\common\components\StaticFunctions::getSettings('авторское право') ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-notice">
        <div class="container text-center">
            <p><?=\common\components\StaticFunctions::getSettings('условий')?></p>
        </div>
    </div>


</footer>