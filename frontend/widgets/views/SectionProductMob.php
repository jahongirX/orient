<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:20
 */
?>

<section class="product hidden-block-for-mobile">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main','products')?></h3>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="accordion" id="accordionExample">

                    <?php if (!empty($models)): ?>
                    <?php $count = 1; ?>
                        <?php foreach ($models as $model): ?>

                            <?php

                            if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product-category/' . $model->id . '/l_' . $model->getLang('image'))) {

                                $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product-category/' . $model->id . '/l_' .  $model->getLang('image');

                            }else{

                                $image = '/images/default/m_post.jpg';

                            }
                            ?>
                                <div class="card">
                                    <div class="card-header" id="heading<?=$model->id ?>">
                                        <h2 class="mb-0">

                                            <div class="col production-item" data-filter="<?=$model->name ?>" data-toggle="collapse" data-target="#collapse<?=$model->id ?>" aria-expanded="true" aria-controls="collapse<?=$model->id ?>">
                                                <img src="<?=$image ?>" alt="production1">
                                                <h5><?=$model->name ?></h5>
                                            </div>

                                        </h2>
                                    </div>

                                    <div id="collapse<?=$model->id ?>" class="collapse <?=($count == 1)? 'show': '';?>" aria-labelledby="heading<?=$model->id ?>" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="product-mobile-carousel owl-carousel <?=$model->name ?>">
                                                <?php $products = \common\models\Product::find()->where(['status'=>1, 'category_id'=>$model->id])->all(); ?>
                                                <?php foreach ($products as $product): ?>

                                                    <?php

                                                    if($product->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product/' . $product->id . '/l_' . $product->getLang('image') )) {

                                                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product/' . $product->id . '/l_' .  $product->getLang('image');

                                                    }else{

                                                        $image = '/images/default/m_post.jpg';

                                                    }
                                                    ?>
                                                    <div class="production">
                                                        <div class="products">
                                                            <div class="product-item">
                                                                <div class="item">
                                                                    <p class="product-title"><?=$product->name ?></p>
                                                                    <p class="product-mark"><?=Yii::t('main','articul')?> <?=$product->getLang('articul')?></p>
                                                                    <p class="product-img"><img src="<?=$image ?>" alt="Product"></p>
                                                                    <p class="product-weight"><?=Yii::t('main','articul')?> <?=$product->getLang('articul')?></p>
                                                                    <p class="product-height"><?=Yii::t('main','depth')?> <?=$product->getLang('depth')?></p>
                                                                    <p class="product-construction"><?=Yii::t('main','butt')?> <?=$product->getLang('butt')?></p>
                                                                    <p class="product-price"><?=Yii::t('main','price')?> <span class="price-count"><?=$product->getLang('price')?></span> <span class="rubl-icon"><?=Yii::t('main','$')?></span> </p>

                                                                    <a href="<?=yii\helpers\Url::to(['product/view','id'=>$product->id])?>">
                                                                        <button>
                                                                            <img src="images/product-cart.png" alt="Product cart"> <?=Yii::t('main','korzina')?>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>

        </div>



        <div class="row">
            <div class="col-md-12 text-center btnch">
                <a class="more sweep-to-right text-center" href="#"><?=Yii::t('main','goCatalog')?></a>
            </div>
        </div>
    </div>
</section>

