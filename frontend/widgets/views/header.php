<?php

use common\components\StaticFunctions;
use common\models\Menu;
use yii\widgets\ActiveForm;

function renderMenu($id){


    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li><a href="#">';
        $out .= $menu->title . '</a>';
        $out .= '<ul>';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $out .= renderMenu($item->id);
        }

        $out .= '</ul></li>';

    } else {

        $out .= '<li><a href="' .$menu->url. '">';
        $out .= $menu->title.'</a></li>';

    }


    return $out;

}

function renderMenu2($id){


    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li class="nav-item"><a class="nav-link" href="#">';
        $out .= $menu->title . '</a>';
        $out .= '<ul>';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $out .= renderMenu($item->id);
        }

        $out .= '</ul></li>';

    } else {

        $out .= '<li class="nav-item"><a class="nav-link" href="' .$menu->url. '">';
        $out .= $menu->title.'</a></li>';

    }


    return $out;

}
?>



<header>
    <div class="index">


        <div class="mobile-menu">
            <div id="overlay" class="nav">


                <div class="header-menu">

                    <div class="phone">

                        <div class="phone-info">
                            <p><?=StaticFunctions::getSettings('телефон'); ?></p>
                        </div>

                        <div class="phone-title">
                            <a href="tel:<?=StaticFunctions::getSettings('телефон'); ?>">
                                <img src="/images/mobilemenu/phone-icon.png" alt="Place-Marker">
                                <p><?=Yii::t('main', 'Бесплатный-звонок') ?></p>
                            </a>
                        </div>
                    </div>


                    <div class="buttons">
                        <a href="#" class="cart" data-toggle="modal" data-target="#mobile-cart-modal">
                            <img src="/images/mobilemenu/cart-icon.png" alt="cart-ico">
                        </a>

                        <button alt="menu" class="close-button" id="close-menu">
                            <img src="/images/mobilemenu/menu-icon.png" alt="close-ico">
                        </button>
                    </div>

                </div>


                <ul>
                    <?php

                    foreach ($models as $model) {

                        echo renderMenu( $model->id );

                    }

                    ?>
                </ul>

                <div class="social-network">
                    <?php if (\common\models\Settings::findOne('vk')):?>
                        <a href="<?=\common\models\Settings::findOne('vk')->getLang('url')?>"><img src="/images/social-vkontakte.png" alt="Vkontakte"></a>
                    <?php endif; ?>
                    <?php if (\common\models\Settings::findOne('ok')):?>
                        <a href="<?=\common\models\Settings::findOne('ok')->getLang('url')?>"><img src="/images/social-odnoklassniki.png" alt="Odnoklassniki"></a>
                    <?php endif; ?>
                    <?php if (\common\models\Settings::findOne('fb')):?>
                        <a href="<?=\common\models\Settings::findOne('fb')->getLang('url')?>"><img src="/images/social-facebook.png" alt="Facebook"></a>
                    <?php endif; ?>
                    <?php if (\common\models\Settings::findOne('instagram')):?>
                        <a href="<?=\common\models\Settings::findOne('instagram')->getLang('url')?>"><img src="/images/social-instagram.png" alt="Instagram"></a>
                    <?php endif; ?>
                    <?php if (\common\models\Settings::findOne('twitter')):?>
                        <a href="<?=\common\models\Settings::findOne('twitter')->getLang('url')?>"><img src="/images/social-twitter.png" alt="Twitter"></a>
                    <?php endif; ?>
                </div>


                <div class="work-info">
                    <div class="city">
                        <div class="city-title">
                            <p><?=Yii::t('main', 'Ваш город')?></p>
                        </div>

                        <div class="city-info">
                            <img src="/images/place-marker.png" alt="Place-Marker">
                            <p>Москва</p>
                        </div>
                    </div>

                    <div class="work-time">

                        <div class="work-time-title">
                            <p><?=Yii::t('main', 'Режим') ?></p>
                        </div>

                        <div class="work-time-info">
                            <img src="/images/time-marker.png" alt="Time-Marker">
                            <p><?=\common\models\Settings::findOne('Режим-время')->getLang('val')?></p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="nav-mobile">
                <a class="navbar-brand" href="/"><img src="/images/logo-dark.png" alt="logo-dark"></a>
                <div class="buttons">
                    <a href="#" class="cart" data-toggle="modal" data-target="#cart-modal">
                        <img src="/images/mobilemenu/mobile-cart-icon.png" alt="cart-ico">
                    </a>

                    <button alt="menu" class="menu-btn" id="open-menu">
                        <img src="/images/mobilemenu/mobile-menu-icon.png" alt="Logo">
                    </button>
                </div>

            </div>
        </div>


        <div class="sticky-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"><img src="/images/logo-dark.png" alt="logo-dark"></a>

                    <a href="#" class="cart order-12" data-toggle="modal" data-target="#cart-modal">
                        <img src="/images/cart-icon.png" alt="cart-ico">
                    </a>


                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="/images/menu-icon.png" alt="Logo">
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <?php

                            foreach ($models as $model) {

                                echo renderMenu2( $model->id );

                            }

                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="header-info">

                        <div class="logo">
                            <a href="#"><img src="/images/logo.png" alt="Logo"></a>
                        </div>

                        <div class="city">
                            <div class="city-title">
                                <p><?=Yii::t('main', 'Ваш город')?></p>
                            </div>

                            <div class="city-info">
                                <img src="/images/place-marker.png" alt="Place-Marker">
                                <p>Москва</p>
                            </div>
                        </div>

                        <div class="work-time">
                            <div class="work-time-title">
                                <p><?=Yii::t('main', 'Режим') ?></p>
                            </div>

                            <div class="work-time-info">
                                <img src="/images/time-marker.png" alt="Time-Marker">
                                <p><?=\common\models\Settings::findOne('Режим-время')->getLang('val')?></p>
                            </div>
                        </div>

                        <div class="social-network">
                            <?php if (\common\models\Settings::findOne('vk')):?>
                                <a href="<?=\common\models\Settings::findOne('vk')->getLang('url')?>"><img src="/images/social-vkontakte.png" alt="Vkontakte"></a>
                            <?php endif; ?>
                            <?php if (\common\models\Settings::findOne('ok')):?>
                                <a href="<?=\common\models\Settings::findOne('ok')->getLang('url')?>"><img src="/images/social-odnoklassniki.png" alt="Odnoklassniki"></a>
                            <?php endif; ?>
                            <?php if (\common\models\Settings::findOne('fb')):?>
                                <a href="<?=\common\models\Settings::findOne('fb')->getLang('url')?>"><img src="/images/social-facebook.png" alt="Facebook"></a>
                            <?php endif; ?>
                            <?php if (\common\models\Settings::findOne('instagram')):?>
                                <a href="<?=\common\models\Settings::findOne('instagram')->getLang('url')?>"><img src="/images/social-instagram.png" alt="Instagram"></a>
                            <?php endif; ?>
                            <?php if (\common\models\Settings::findOne('twitter')):?>
                                <a href="<?=\common\models\Settings::findOne('twitter')->getLang('url')?>"><img src="/images/social-twitter.png" alt="Twitter"></a>
                            <?php endif; ?>
                        </div>

                        <div class="phone">
                            <div class="phone-info">
                                <p><?=\common\models\Settings::findOne('телефон')->getLang('val')?></p>
                            </div>

                            <div class="phone-title">
                                <a href="tel:<?=StaticFunctions::getSettings('телефон'); ?>">
                                    <img src="/images/mobilemenu/phone-icon.png" alt="Place-Marker">
                                    <p><?=Yii::t('main', 'Бесплатный-звонок') ?></p>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="index-nav">
                        <div class="menus">
                            <ul>
                                <?php

                                    foreach ($models as $model) {

                                        echo renderMenu( $model->id );

                                    }

                                ?>
                            </ul>
                        </div>

                        <div class="shop-icons">
                            <a href="#" data-toggle="modal" data-target="#cart-modal"><img src="/images/cart-icon.png" alt="Cart"></a>
                            <a href="#" data-toggle="modal" data-target="#order-modal"><img src="/images/menu-icon.png" alt="Menu"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">

            <div class="index-carousel">

                <div class="item">
                    <div class="item-info">
                        <div class=" carousel-info">
                            <p>Полный цикл производства <br>
                                <span id="typing"></span><br>
                                компанией «ОТМ»</p>
                            <a href="<?=yii\helpers\Url::to(['product/catalog'])?>"><?=Yii::t('main','goCatalog')?></a>
                        </div>

                        <div class=" carousel-img">
                            <img src="/images/sisterna1.png" alt="sisterna">
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="container">
            <div class="arrow">
                <a href="#about"><img src="/images/link-down.png" alt="link-down"></a>
            </div>
        </div>



    </div>

</header>
