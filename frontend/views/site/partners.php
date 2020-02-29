<?php

use yii\widgets\LinkPager;

$this->title = Yii::t('main','Partners');

$js = <<<JS

    var grid = $('.partners-page .grid');

    grid.masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        visibleStyle: { transform: 'translateY(0)', opacity: 1 },
        hiddenStyle: { transform: 'translateY(150px)', opacity: 0 },

    });

    var msnry = grid.data('masonry');

    if( $('.pagination .next a').length !== 0)
    {
        grid.infiniteScroll({
            path: '.pagination .next a',
            append: '.grid .grid-item',
            history: false,
            outlayer: msnry
        });
       
        grid.on( 'request.infiniteScroll', function( event, path ) 
        {
            $('.loader-ellips').show();
        });
            
       
        grid.on( 'load.infiniteScroll', function( event, response, path ) 
        {
            $('.loader-ellips').hide();
        });
    }

JS;

$this->registerJs($js);

?>

<section class="page-content partners-page">

    <div class="container">

        <div class="row">

            <div class="col-md-9 same-size">

                <h2 class="partners-page-title"><?= $this->title ?></h2>

                <p class="partners-page-subtitle"><?= Yii::t('main', 'partner-section-subtitle') ?></p>

                <div class="grid masonry">

                    <?php

                    foreach($models as $model):

                        if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'partner/' . $model->id . '/l_' . $model->image )) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'partner/' . $model->id . '/l_' .  $model->image;

                        } else {

                            $image = '/images/default/l_post.jpg';

                        }

                        ?>

                        <div class="grid-item">

                            <a target="_blank" href="<?= $model->link ?>">

                                <div class="partners__item-image" style="background-image: url('<?= $image ?>')"></div>

                                <div class="partners__item-label"><?= $model->title ?></div>

                            </a>

                        </div>

                        <?php

                    endforEach;

                    ?>

                </div>

                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>

            </div>

            <div class="col-md-3 same-size">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

        <div style="display: none;">

            <?= LinkPager::widget(['pagination' => $pagination]);?>

        </div>

    </div>

</section>
