<?php

use yii\widgets\LinkPager;

$this->title = Yii::t('main','Testimonials');

$js = <<<JS

    var grid = $('.testimonials-page .grid');

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

<section class="page-content testimonials-page">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <h2 class="testimonials-page-title"><?= $this->title ?></h2>

                <div class="grid masonry">

                    <?php

                    foreach($models as $model):

                        if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'testimonials/' . $model->id . '/l_' . $model->image ))
                        {
                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'testimonials/' . $model->id . '/l_' . $model->image;
                        } else {

                            $image = 'images/default/m_post.jpg';

                        }

                        ?>

                        <div class="grid-item">

                            <div class="testimonials__item">
                                <div class="testimonials__item-image" style="background-image: url('<?= $image ?>')"></div>
                                <div class="testimonials__item-name"><?= $model->name ?></div>
                                <div class="testimonials__item-position"><?= $model->position ?></div>
                                <div class="testimonials__item-text"><?= $model->message ?></div>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>

            </div>

            <div class="col-md-3">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

        <div style="display: none;">

            <?= LinkPager::widget(['pagination' => $pagination]);?>

        </div>

    </div>

</section>