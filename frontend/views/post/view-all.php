<?php

use yii\widgets\LinkPager;

$this->title = Yii::t('main', 'News');

$js = <<<JS

   if( $('.next a').length !== 0)
   {
       var container =  $('.page-content.news__page .news').infiniteScroll({
           path: '.next a',
           append: '.page-content.news__page .news',
           button: '.btn-load-more',
           scrollThreshold: false,
       });
       
       container.on( 'request.infiniteScroll', function( event, path ) {
           $('.btn-load-more').hide();
           $('.loader-ellips').show();
       });
        
       container.on( 'append.infiniteScroll', function( event, response, path ) {
           $('.btn-load-more').show();
           $('.loader-ellips').hide();
           
           $(".lazy-image").lazy();
           
       });
       
       container.on( 'scrollThreshold.infiniteScroll', function( event ) {
           $('.loader-ellips').hide();
        });
       
   } else {
    
       $('.btn-load-more').hide();
       
   }
    
   

JS;

$this->registerJs($js);

?>


<section class="page-content news__page">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <h2 class="services-page-title"><?= Yii::t('main', 'News') ?></h2>

                <p class="services-page-subtitle"><?= Yii::t('main', 'news-section-subtitle') ?></p>

            </div>

        </div>

        <div class="news">

            <div class="news__masonry">

                <?php

                $i = 0;

                foreach($models as $model):

                    if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/m_' . $model->getLang('main_image') )) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/m_' .  $model->getLang('main_image');

                    } else {

                        $image = '/images/default/m_post.jpg';

                    }

                    if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/s_' . $model->getLang('main_image') )) {

                        $imageMini = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/s_' .  $model->getLang('main_image');

                    } else {

                        $imageMini = '/images/default/s_post.jpg';

                    }

                    if($i == 0 || 4 > $i ):

                    ?>

                        <div class="news__item">

                            <div class="news__date">

                                <span><?= date('d', strtotime($model->created_date))?></span>

                                <div>

                                    <span><?= Yii::$app->params['month'][Yii::$app->language][date('n', strtotime($model->created_date))]; ?></span>
                                    <span><?= date('Y', strtotime($model->created_date))?></span>

                                </div>

                            </div>

                            <div class="news__category"><?= $model->categoryName->name; ?></div>

                            <div class="news__image lazy-image" style="background-image: url(<?= $imageMini ?>);" data-src="<?= $image ?>"></div>

                            <div class="news__content">

                                <a href="/post/view/<?= $model->id ?>">

                                    <div class="news__title"><?= $model->getLang('title') ?></div>

                                </a>

                                <div class="news__subtitle"><?= $model->getLang('second_title') ?></div>

                                <a href="/post/view/<?= $model->id ?>" class="news__content-read-more"><?= Yii::t('main', 'Read more') ?></a>
                            </div>

                        </div>

                    <?php

                    endif;

                    $i++;

                endforEach;

                ?>


                <div class="row gutter-14">

                    <?php

                    $i = 0;

                    foreach($models as $model):

                        if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/m_' . $model->getLang('main_image') )) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/l_' .  $model->getLang('main_image');

                        } else {

                            $image = '/images/default/l_post.jpg';

                        }

                        if( 4 <= $i ):

                            ?>

                            <div class="col-md-3">

                                <div class="news__item news-item-mini news-item-mini-<?= $i%4+1 ?>">

                                    <div class="news__date">

                                        <?= date('d', strtotime($model->created_date))?>
                                        <?= Yii::$app->params['month'][Yii::$app->language][date('n', strtotime($model->created_date))]; ?>
                                        <?= date('Y', strtotime($model->created_date))?>

                                    </div>

                                    <div class="news__content">

                                        <a href="/post/view/<?= $model->id ?>" class="news__title"><?= $model->getLang('title') ?></a>

                                    </div>

                                </div>

                            </div>

                            <?php

                        endif;

                        $i++;

                    endforEach;

                    ?>

                </div>

            </div>

        </div>

    </div>

    <div class="loader-ellips">
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
    </div>

    <button class="btn-load-more btn btn__yellow-2"><?=Yii::t('main','btn-load-more')?></button>

    <div style="display:none">

        <?php echo LinkPager::widget(['pagination' => $pagination]);?>

    </div>

</section>
