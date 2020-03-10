<?php

use yii\widgets\LinkPager;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " .Yii::t('main', 'goCatalog');


?>

<section class="page-title pyatno catalog-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <p>
                    <?=Yii::t('main','OTM')?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="catalog" >
    <div class="container">
        <div class="row">

            <?= \frontend\widgets\CatalogSidebar::widget();?>


            <div class="col-md-9 catalog-result">
                <div class="result-title">
                    <a href="#" class="responsive-radio-modal" data-toggle="modal" data-target="#catalog-modal"><img src="/images/responsive/news-modal-form-btn.png" alt="btn"></a>
                    <p class="sort-by"><?=Yii::t('main','filter')?> <a href="#" id="sortbyprice"><span><?=Yii::t('main','asPrice')?></span> <img src="/images/catalog-sort-icon.png" alt="icon"></a></p>
                    <p class="result-number"><?=Yii::t('main','Найдено:')?> <span>14 товаров</span></p>
                </div>


                <div class="catalog-items desktop">
                    <?php if (!empty($models)): ?>

                            <div class="row">
                                <?php foreach ($models as $model): ?>
                                <?php

                                if ($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product/' . $model->id . '/l_' . $model->getLang('image'))) {

                                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product/' . $model->id . '/l_' . $model->getLang('image');

                                } else {

                                    $image = '/images/default/s_post.jpg';

                                }

                                ?>
                                <div class="col-md-4">

                                    <div class="item">
                                        <p class="product-title"><?=$model->name?></p>
                                        <p class="product-mark"><?=Yii::t('main','articul')?> <?=$model->articul?></p>
                                        <p class="product-img"><img src="<?=$image?>" alt="Product"></p>
                                        <p class="product-weight"><?=Yii::t('main','articul')?> <?=$model->articul?></p>
                                        <p class="product-height"><?=Yii::t('main','depth')?> <?=$model->depth?></p>
                                        <p class="product-construction"><?=Yii::t('main','butt')?> <?=$model->butt?></p>
                                        <p class="product-price"><?=Yii::t('main','price')?> <span class="price-count"><?=$model->price?></span> <span class="rubl-icon"><?=Yii::t('main','$')?></span> </p>

                                        <a href="<?=yii\helpers\Url::to(['product/view','id'=>$model->id])?>">
                                            <button>
                                                <img src="/images/product-cart.png" alt="Product cart"> <?=Yii::t('main','korzina')?>
                                            </button>
                                        </a>
                                    </div>

                                </div>
                                <?php endforeach; ?>
                            </div>

                    <?endif;?>
                </div>








                <div class="catalog-items hidden-block-for-mobile">


                    <?php if (!empty($models)): ?>

                    <div class="row">
                        <?php foreach ($models as $model): ?>
                        <?php

                        if ($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'product/' . $model->id . '/l_' . $model->getLang('image'))) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'product/' . $model->id . '/l_' . $model->getLang('image');

                        } else {

                            $image = '/images/default/s_post.jpg';

                        }

                        ?>

                        <div class="col-12">
                            <div class="item">
                                <div class="img">
                                    <img src="<?=$image?>" class="product-img" alt="Product">
                                </div>
                                <div class="info">
                                    <p class="product-title"><?=$model->name?></p>
                                    <p class="product-mark"><?=Yii::t('main','articul')?> <?=$model->articul?></p>
                                    <p class="product-weight"><?=Yii::t('main','articul')?> <?=$model->articul?></p>
                                    <p class="product-height"><?=Yii::t('main','depth')?> <?=$model->depth?></p>
                                    <p class="product-construction"><?=Yii::t('main','butt')?> <?=$model->butt?></p>
                                    <p class="product-price"><?=Yii::t('main','price')?> <span class="price-count"><?=$model->price?></span> <span class="rubl-icon"><?=Yii::t('main','$')?></span> </p>

                                    <a href="<?=yii\helpers\Url::to(['product/view','id'=>$model->id])?>">
                                        <button>
                                            <img src="/images/product-cart.png" alt="Product cart"> <?=Yii::t('main','korzina')?>
                                        </button>
                                    </a>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <?endif;?>


                    </div>
                </div>





                <div class="catalog-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">

                            <li class="page-item ">
                                <a class="page-link prev" href="#" tabindex="-1">
                                    <img src="/images/pagination-prev-icon.png" alt="prev">
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span>1</span></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span>2</span></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link active" href="#"><span>3</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span>4</span></a>
                            </li>

                            <li class="page-item">
                                <a class="page-link next" href="#">
                                    <img src="/images/pagination-next-icon.png" alt="next">
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</section>

<?= \frontend\widgets\SectionConsult::widget();?>
<?=\frontend\widgets\Testimonials::widget() ?>
