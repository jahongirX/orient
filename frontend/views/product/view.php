<?php

$this->title = \common\components\StaticFunctions::getSettings('title') . " - ". $model->name;


?>
<?php
if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product/' . $model->id . '/l_' . $model->image )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product/' . $model->id . '/l_' .  $model->image;

} else {

    $image = '/images/default/m_post.jpg';

}
?>
<section class="page-title pyatno card-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <p>
                    <?=Yii::t('main','Каталог_оборудования_ОТМ')?>
                </p>

                <div class="btnch">
                    <a class="more sweep-to-right text-center" href="<?=yii\helpers\Url::to(['product/catalog'])?>"><?=Yii::t('main','Посмотреть_каталог')?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav>

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?=\yii\helpers\Url::home()?>"> <?=Yii::t('main','home')?></a></li>
                        <li class="breadcrumb-item"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?=yii\helpers\Url::to(['product/catalog'])?>"><?=Yii::t('main','Каталог')?></a></li>
                        <li class="breadcrumb-item"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="#"> <?=\common\models\ProductCategory::findOne([$model->category_id])->name?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-caret-right" aria-hidden="true"></i> <?=$model->name?></li>
                    </ol>

                </nav>


            </div>
        </div>
    </div>
</section>


<div class="product-item-carousel desktop">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="carousel">


                    <div class="owl-carousel" data-slider-id="<?=$model->id?>">
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="<?=$image?>" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="<?=$image?>" alt="product<?=$model->id?>">
                        </div>
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="<?=$image?>" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="<?=$image?>" alt="product<?=$model->id?>">
                        </div>
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="<?=$image?>" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="<?=$image?>" alt="product<?=$model->id?>">
                        </div>
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="<?=$image?>" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="<?=$image?>" alt="product<?=$model->id?>">
                        </div>

                    </div>

                    <div class="owl-thumbs" data-slider-id="<?=$model->id?>">
                        <button class="owl-thumb-item"><img src="<?=$image?>" alt="product<?=$model->id?>"></button>
                        <button class="owl-thumb-item"><img src="<?=$image?>" alt="product<?=$model->id?>"></button>
                        <button class="owl-thumb-item"><img src="<?=$image?>" alt="product<?=$model->id?>"></button>
                        <button class="owl-thumb-item"><img src="<?=$image?>" alt="product<?=$model->id?>"></button>
                    </div>


                </div>
            </div>
            <div class="col-md-5">
                <div class="product-card-info ">

                    <div class="product-item-info">
                        <h4 class="item-title"><?=$model->name?></h4>
                        <h5 class="item-mark"><?=Yii::t('main','articul')?> <?=$model->getLang('articul')?></h5>
                    </div>

                    <div class="product-item-xarakter">

                        <p class="xarakter-header"><?=Yii::t('main','Характеристики:')?></p>
                        <p><?=Yii::t('main','Модель:')?> <span><?=$model->model?></span></p>
                        <p><?=Yii::t('main','depth')?> <span><?=$model->getLang('depth')?></span></p>
                        <p><?=Yii::t('main','butt')?> <span><?=$model->getLang('butt')?></span></p>
                        <p><?=Yii::t('main','Цвет')?> <span><?=$model->getLang('color')?></span></p>

                    </div>

                    <div class="addtocart ">
                        <p><?=Yii::t('main','price')?> </p>
                        <h3><?=$model->getLang('price')?> <span><?=Yii::t('main','$')?></span></h3>

                        <button>
                            <img src="/images/product-cart.png" alt="Product cart"><?=Yii::t('main','Добавить_корзину')?>
                        </button>


                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="description">
                    <div class="description-title">
                        <p><?=Yii::t('main','Описание')?></p>
                    </div>

                    <div class="description-text">

                        <p><?=$model->text?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













<div class="product-item-carousel mobile hidden-block-for-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-item-info text-center">
                    <h4 class="item-title"><?=$model->name?></h4>
                    <h5 class="item-mark"><?=Yii::t('main','articul')?> <?=$model->getLang('articul')?></h5>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="carousel">



                    <div class="owl-carousel" data-slider-id="<?=$model->id?>">
                        <!-- <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="images/card-carousel-img.png" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="/images/card-carousel-img.png" alt="product1">
                        </div>
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="images/card-carousel-img.png" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="/images/card-carousel-img.png" alt="product2">
                        </div> -->
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="<?=$image?>" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="<?=$image?>" alt="product<?=$model->id?>">
                        </div>
                        <div class="item">
                            <a class="image-popup-no-margins carousel-zoomer" href="<?=$image?>" width="55" height="55">
                                <img src="/images/carousel-zoomer.png">
                            </a>
                            <img src="<?=$image?>" alt="product<?=$model->id?>">
                        </div>

                    </div>

                    <div class="owl-thumbs" data-slider-id="<?=$model->id?>">
                        <button class="owl-thumb-item"><img src="<?=$image?>" alt="product<?=$model->id?>"></button>
                        <button class="owl-thumb-item"><img src="<?=$image?>" alt="product<?=$model->id?>"></button>
                        <!-- <button class="owl-thumb-item"><img src="/images/card-carousel-img.png" alt="product3"></button> -->
                        <!-- <button class="owl-thumb-item"><img src="/images/card-carousel-img.png" alt="product4"></button> -->
                    </div>


                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="product-card-info ">

                    <div class="product-item-xarakter">

                        <p class="xarakter-header text-center"><?=Yii::t('main','Характеристики:')?></p>
                        <p><?=Yii::t('main','Модель:')?> <span><?=$model->model?></span></p>
                        <p><?=Yii::t('main','depth')?> <span><?=$model->getLang('depth')?></span></p>
                        <p><?=Yii::t('main','butt')?> <span><?=$model->getLang('butt')?></span></p>
                        <p><?=Yii::t('main','Цвет')?> <span><?=$model->getLang('color')?></span></p>

                    </div>

                    <div class="addtocart ">
                        <div class="pricing-text text-center">
                            <p><?=Yii::t('main','price')?> </p>
                            <h3><?=$model->getLang('price')?> <span><?=Yii::t('main','$')?></span></h3>
                        </div>

                        <button>
                            <img src="/images/product-cart.png" alt="Product cart"> <?=Yii::t('main','Добавить_корзину')?>
                        </button>


                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="description">
                    <div class="description-title">
                        <p><?=Yii::t('main','Описание')?></p>
                    </div>

                    <div class="description-text">

                        <p><?=$model->text?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






















<section class="strength card-description">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Here is empty place for adding somethings -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-6 strength-item">
                <div class="item">
                    <img src="/images/strength-1.png" alt="Strength">
                    <p>Собственное производсто</p>
                </div>
            </div>

            <div class="col-md-3 col-6 strength-item">
                <div class="item">
                    <img src="/images/strength-4.png" alt="Strength">
                    <p>Оперативное выполнение</p>
                </div>
            </div>

            <div class="col-md-3 col-6 strength-item">
                <div class="item">
                    <img src="/images/strength-5.png" alt="Strength">
                    <p>Гарантия по договору</p>
                </div>
            </div>

            <div class="col-md-3 col-6 strength-item">
                <div class="item">
                    <img src="/images/strength-3.png" alt="Strength">
                    <p>Доставка по РФ</p>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="product showing">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main','Вас_может_заинтересовать')?></h3>
            </div>
        </div>
        <?php $categories = \common\models\ProductCategory::find()->all();?>
        <?php if (!empty($categories)): ?>

            <div class="row">
                <?php foreach ($categories as $category) :?>
                    <?php

                    if($category->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product-category/' . $category->id . '/l_' . $category->image)) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product-category/' . $category->id . '/l_' .  $category->image;

                    }else{

                        $image = '/images/default/m_post.jpg';

                    }
                    ?>

                        <div class="col production-item" data-filter="<?=$category->name?>">
                            <img src="<?=$image?>" alt="production1">
                            <h5><?=$category->description?></h5>
                        </div>


                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel row">
                <?php $products = \common\models\Product::find()->where(['status'=>1])->all(); ?>
                    <?php foreach ($products as $product) :?>

                        <?php

                        if($product->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product/' . $product->id . '/l_' . $product->getLang('image') )) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product/' . $product->id . '/l_' .  $product->getLang('image');

                        }else{

                            $image = '/images/default/m_post.jpg';

                        }
                        ?>

                        <div class="col-md-3 product-item <?=\common\models\ProductCategory::findOne([$product->category_id])->getLang('name')?>">
                            <div class="item">
                                <p class="product-title"><?=$product->name?></p>
                                <p class="product-mark"><?=Yii::t('main','articul')?> <?=$product->getLang('articul')?></p>
                                <p class="product-img"><img src="<?=$image?>" alt="Product"></p>
                                <p class="product-weight"><?=Yii::t('main','articul')?> <?=$product->getLang('articul')?></p>
                                <p class="product-height"><?=Yii::t('main','depth')?> <?=$product->getLang('depth')?></p>
                                <p class="product-construction"><?=Yii::t('main','butt')?> <?=$product->getLang('butt')?></p>
                                <p class="product-price"><?=Yii::t('main','price')?> <span class="price-count"><?=$product->getLang('price')?></span> <span class="rubl-icon"><?=Yii::t('main','$')?></span> </p>

                                <a href="<?=yii\helpers\Url::to(['product/view','id'=>$product->id])?>">
                                    <button>
                                        <img src="/images/product-cart.png" alt="Product cart"> <?=Yii::t('main','korzina')?>
                                    </button>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <!-- 
        
            <div class="row">
                <div class="col-md-12 text-center btnch">
                    <a class="more sweep-to-right text-center" href="#">Перейти в каталог</a>
                </div>
            </div> 

        -->


    </div>
</section>














<section class="product calc hidden-block-for-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center titler">Вас может заинтересовать</h3>
            </div>
        </div>


        <div class="row">

            <div class="col-md-12">
                <div class="product-mobile-carousel owl-carousel">

                    <div class="production">
                        <div class="products">
                            <div class="product-item">
                                <div class="item">
                                    <p class="product-title">Цистерна ассенизаторская</p>
                                    <p class="product-mark">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-img"><img src="/images/product1.jpg" alt="Product"></p>
                                    <p class="product-weight">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-height">Толщина металла: 4 мм</p>
                                    <p class="product-construction">Конструктив: сферы</p>
                                    <p class="product-price">Цена: <span class="price-count">58 650</span> <span class="rubl-icon">₽</span> </p>

                                    <button>
                                        <img src="/images/product-cart.png" alt="Product cart"> В корзину
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="production">
                        <div class="products">
                            <div class="product-item">
                                <div class="item">
                                    <p class="product-title">Цистерна ассенизаторская</p>
                                    <p class="product-mark">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-img"><img src="/images/product1.jpg" alt="Product"></p>
                                    <p class="product-weight">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-height">Толщина металла: 4 мм</p>
                                    <p class="product-construction">Конструктив: сферы</p>
                                    <p class="product-price">Цена: <span class="price-count">58 650</span> <span class="rubl-icon">₽</span> </p>

                                    <button>
                                        <img src="/images/product-cart.png" alt="Product cart"> В корзину
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="production">
                        <div class="products">
                            <div class="product-item">
                                <div class="item">
                                    <p class="product-title">Цистерна ассенизаторская</p>
                                    <p class="product-mark">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-img"><img src="/images/product1.jpg" alt="Product"></p>
                                    <p class="product-weight">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-height">Толщина металла: 4 мм</p>
                                    <p class="product-construction">Конструктив: сферы</p>
                                    <p class="product-price">Цена: <span class="price-count">58 650</span> <span class="rubl-icon">₽</span> </p>

                                    <button>
                                        <img src="/images/product-cart.png" alt="Product cart"> В корзину
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="production">
                        <div class="products">
                            <div class="product-item">
                                <div class="item">
                                    <p class="product-title">Цистерна ассенизаторская</p>
                                    <p class="product-mark">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-img"><img src="/images/product1.jpg" alt="Product"></p>
                                    <p class="product-weight">Артикул: МАЗ-3-0,4/ОТМ</p>
                                    <p class="product-height">Толщина металла: 4 мм</p>
                                    <p class="product-construction">Конструктив: сферы</p>
                                    <p class="product-price">Цена: <span class="price-count">58 650</span> <span class="rubl-icon">₽</span> </p>

                                    <button>
                                        <img src="/images/product-cart.png" alt="Product cart"> В корзину
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>















<section class="consult">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="consult-form">
                    <h1 class="text-center">Остались вопросы или требуется консультация?</h1>
                    <form action="">
                        <input type="text" name="name" placeholder="Ваше имя">
                        <input type="phone" name="phone" placeholder="Ваш телефон">
                        <button type="submit" placeholder="Ваше имя">Оставить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="card pyatno-1">
    <img src="/images/pyatno-1.png" alt="pyatno" >
</div>
<div class="card pyatno-2">
    <img src="/images/pyatno-2.png" alt="pyatno" >
</div>
<div class="pyatno-5">
    <img src="/images/pyatno-5.png" alt="pyatno" >
</div>