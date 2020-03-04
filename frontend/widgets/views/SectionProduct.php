<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:10
 */
?>

<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main','products')?></h3>
            </div>
        </div>
        <?php if (!empty($models)): ?>

            <div class="row">
                <?php foreach ($models as $model) :?>
                <?php

                if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product-category/' . $model->id . '/l_' . $model->getLang('image'))) {

                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product-category/' . $model->id . '/l_' .  $model->getLang('image');

                }else{

                    $image = '/images/default/m_post.jpg';

                }
                ?>
                <?php if(!empty($model->getLang('id'))): ?>
                    <div class="col production-item" data-filter="<?=$model->getLang('name')?>">
                        <img src="<?=$image?>" alt="production1">
                        <h5><?=$model->getLang('description')?></h5>
                    </div>

                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($products)): ?>

        <div class="row">

            <div class="col-md-12">
                <div class="product-carousel row">
                    <?php foreach ($products as $product) :?>

                    <?php

                    if($product->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product/' . $product->id . '/l_' . $product->getLang('image') )) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product/' . $product->id . '/l_' .  $product->getLang('image');

                    }else{

                        $image = '/images/default/m_post.jpg';

                    }
                    ?>
                    <?php if(!empty($model->getLang('id'))): ?>
                    <div class="col-md-3 product-item <?=\common\models\ProductCategory::findOne([$product->category_id])->getLang('name')?>">
                        <div class="item">
                            <p class="product-title"><?=$product->getLang('name')?></p>
                            <p class="product-mark"><?=Yii::t('main','articul')?> <?=$product->getLang('articul')?></p>
                            <p class="product-img"><img src="<?=$image?>" alt="Product"></p>
                            <p class="product-weight"><?=Yii::t('main','articul')?> <?=$product->getLang('articul')?></p>
                            <p class="product-height"><?=Yii::t('main','depth')?> <?=$product->getLang('depth')?></p>
                            <p class="product-construction"><?=Yii::t('main','butt')?> <?=$product->getLang('butt')?></p>
                            <p class="product-price"><?=Yii::t('main','price')?> <span class="price-count"><?=$product->getLang('price')?></span> <span class="rubl-icon"><?=Yii::t('main','$')?></span> </p>

                            <a href="<?=yii\helpers\Url::to(['product-cart/view','id'=>$model->id])?>">
                                <button>
                                    <img src="images/product-cart.png" alt="Product cart"> <?=Yii::t('main','korzina')?>
                                </button>
                            </a>
                        </div>
                    </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php endif; ?>


        <div class="row">
            <div class="col-md-12 text-center btnch">
                <a class="more sweep-to-right text-center" href="#"><?=Yii::t('main','goCatalog')?></a>
            </div>
        </div>
    </div>
</section>
