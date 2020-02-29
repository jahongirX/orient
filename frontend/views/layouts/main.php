<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Сурхондарё вилоят юридик колледжи, Сурхондарё вилоят юридик колледжи сайти, Сурхондарё вилоят юридик колледжи расмий веб сайти">
    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>

<body>

    <?php $this->beginBody() ?>

    <div class="wrapper">

        <?= \frontend\widgets\Header::widget();?>

        <?= $content;?>

        <?= \frontend\widgets\Footer::widget();?>

    </div>

    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title titler" id="exampleModalLabel">Рассчитать доставку</h5>
                    <img src="images/modal-exitter.png" data-dismiss="modal" alt="Modal Closer">
                </div>

                <div class="modal-body">
                    <p class="text-center order-modal-title">Заполните форму ниже и мы перезвоним  <br> Вам в ближайшее время.</p>
                    <form action="">
                        <input type="text" class="text-center" name="name" placeholder="Ваше имя">
                        <input type="phone" class="text-center" name="phone" placeholder="Ваш телефон">
                        <input type="text" class="text-center" name="city" placeholder="Ваш город для доставки">
                        <textarea name="message" id="message" cols="5" rows="3" placeholder="Ваш комментарий"></textarea>

                        <button type="submit" class="btn text-center more">Заказать расчет</button>
                    </form>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="CartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title titler" id="exampleModalLabel">Корзина товаров</h5>
                    <img src="images/modal-exitter.png" data-dismiss="modal" alt="Modal Closer">
                </div>

                <div class="modal-body">

                    <form action="">

                        <div class="item">
                            <div class="row">
                                <div class="col-md-3 product-img">
                                    <img src="images/modal-cart-product-img1.png" alt="Product1">
                                </div>

                                <div class="col-md-9 cart-info">
                                    <div class="product-name">
                                        <div class="product-title">
                                            <p class="naming">Цистерна ассенизаторская</p>
                                            <p>Артикул: МАЗ-3-0,4/ОТМ</p>
                                        </div>
                                        <div class="product-dismission">
                                            <img src="images/product-item-dismiss.png" alt="Dismiss btn">
                                        </div>
                                    </div>

                                    <div class="product-info">

                                        <div class="information">
                                            <p>Объем: 3 куб.м</p>
                                            <p>Толщина металла: 4 мм</p>
                                            <p>Конструктив: сферы</p>
                                        </div>

                                        <div class="price-block">
                                            <p>Цена:</p>
                                            <p class="price">58 650 <span class="rubl">₽</span></p>
                                        </div>

                                        <div class="counter">
                                            <img src="images/count-.png" alt="count">
                                            <input type="text" class="counting" value="1" name="counting" id="counting" readonly>
                                            <img src="images/count+.png" alt="count">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row">
                                <div class="col-md-3 product-img">
                                    <img src="images/modal-cart-product-img1.png" alt="Product1">
                                </div>

                                <div class="col-md-9 cart-info">
                                    <div class="product-name">
                                        <div class="product-title">
                                            <p class="naming">Цистерна ассенизаторская</p>
                                            <p>Артикул: МАЗ-3-0,4/ОТМ</p>
                                        </div>
                                        <div class="product-dismission">
                                            <img src="images/product-item-dismiss.png" alt="Dismiss btn">
                                        </div>
                                    </div>

                                    <div class="product-info">

                                        <div class="information">
                                            <p>Объем: 3 куб.м</p>
                                            <p>Толщина металла: 4 мм</p>
                                            <p>Конструктив: сферы</p>
                                        </div>

                                        <div class="price-block">
                                            <p>Цена:</p>
                                            <p class="price">58 650 <span class="rubl">₽</span></p>
                                        </div>

                                        <div class="counter">
                                            <img src="images/count-.png" alt="count">
                                            <input type="text" class="counting" value="1" name="counting" id="counting">
                                            <img src="images/count+.png" alt="count">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="submittion">
                            <p class="total">Итоговая стоимость: <span class="price">58 650 <span class="rubl">₽</span></span></p>
                            <button type="submit" class="btn more">Заказать товар</button>
                        </div>

                        <div class="logo">
                            <img src="images/modal-logo.png" alt="Logo">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <?php $this->endBody() ?>


    <script>
        new WOW().init();
    </script>
</body>

</html>

<?php $this->endPage() ?>
