<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('main', 'Services');

$js = <<<JS

    

    var submited = false;

    $('#services-request-form').on('beforeSubmit', function(event, jqXHR, settings) 
    {
        var form = $(this);
        if( form.find('.has-error').length ) 
        {
            return false;
        }
        
        if (submited == false )
        {
            submited = true;
        
            $('#service_request_submit').attr('disabled', true);
    
            $.ajax({
                url: '/site/service-request-form',
                type: 'POST',
                data: form.serialize(),
                success: function(data) 
                {
                    if( data['success'] == true )
                    {
                        $('#services-request').iziModal('close');
                        $('#success-modal').iziModal('open');
                        form[0].reset();
            
                        $('#service_request_submit').attr('disabled', false);
                        
                    }
                    
                    submited = false;
                }
            });
            
        }

        return false;
        
    }).on('submit', function(e)
    {
        e.preventDefault();
    });
    
    $('.serviceRequestBtn').on('click', function(e) {
        
        var id = $(this).attr('data-id');
        
        $('#servicerequest-service_id').val( id );
    });
    
    $(document).on('opened', '#services-request', function (e) {
        $('#services-request-form').find('.form-group').removeClass('has-error');
    });
    
    $(document).on('closing', '#services-request', function (e) {
        $('#services-request-form')[0].reset();
        $('#services-request-form').find('.form-group').removeClass('has-error');
    });

JS;

$this->registerJs($js);

?>

<section class="page-content services-page">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <h2 class="services__title"><?= Yii::t('main', 'Services') ?></h2>

                <p class="services__subtitle"><?= Yii::t('main', 'services-section-subtitle') ?></p>

            </div>

        </div>

        <div class="services__page-filter-container">

            <button class="btn" type="button" data-filter="all"><?=Yii::t('main','all-services')?></button>

            <?php

            foreach ($ServiceCategories as $serviceCategory):

                ?>

                <button class="btn" type="button" data-filter=".cat-<?= $serviceCategory->id ?>"><?= $serviceCategory->getLang('name') ?></button>

            <?php endforeach; ?>

        </div>

        <div class="services__page-items">

            <div class="row">

                <?php

                foreach ($models as $model):

                    $image = '';
                    $imageMini = '';

                    if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'services/' . $model->id . '/m_' . $model->image )) {

                        $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'services/' . $model->id . '/m_' . $model->image;

                    } else {

                        $image = '/images/default/m_post.jpg';

                    }

                    if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'services/' . $model->id . '/s_' . $model->image )) {

                        $imageMini = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'services/' . $model->id . '/s_' . $model->image;

                    }

                ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 services__item mix cat-<?= $model->category ?>">

                        <div>

                            <div class="services__item-image lazy-image" style="background-image: url('<?= $imageMini ?>')" data-src="<?= $image ?>"></div>

                            <div class="services__item-content">

                                <div class="services__item-text"><?= $model->title ?></div>

                            </div>

                            <div class="services__item-footer">

                                <a class="btn btn__blue serviceRequestBtn" data-id="<?= $model->id ?>" data-izimodal-open="#services-request"><?=Yii::t('main','services-request')?></a>
                                <a class="btn btn__yellow" href="/services/view/<?= $model->id ?>"><?=Yii::t('main','read-more')?></a>

                            </div>

                        </div>

                    </div>

                <?php

                endforeach;

                ?>

            </div>

        </div>

    </div>

</section>

<?= \frontend\widgets\SectionBooks::widget();?>


<div class="iziModal" id="services-request">

    <div class="modal__inner">

        <div class="modal__close" data-izimodal-close></div>

        <div class="modal__title"><?=Yii::t('main','send-service-request')?></div>
        <div class="modal__subtitle"><?=Yii::t('main','service-request-subtitle')?></div>

        <div class="row">

            <?php $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'options'=>[
                    'id' => 'services-request-form'
                ]
            ]); ?>

            <div class="col-sm-6">

                <?= $form->field($request, 'name',[
                    'template' => "{input}{label}"
                ]) ?>

            </div>

            <div class="col-sm-6">

                <?= $form->field($request, 'email',[
                    'template' => "{input}{label}"
                ]) ?>

            </div>

            <div class="col-sm-6">

                <?= $form->field($request, 'phone',[
                    'template' => "{input}{label}"
                ]) ?>

            </div>

            <div class="col-sm-6">

                <?= $form->field($request, 'subject',[
                    'template' => "{input}"
                ])->dropDownList([
                    'Вопросы 1',
                    'Вопросы 2',
                    'Вопросы 3'
                ],[
                    'class' => 'nice-select'
                ]) ?>

            </div>

            <div class="col-md-12">

                <?= $form->field($request, 'company',[
                    'template' => "{input}{label}"
                ]) ?>

            </div>

            <div class="col-md-12">

                <?= $form->field($request, 'message',[
                    'template' => "{input}{label}"
                ])->textarea() ?>

            </div>

            <?= $form->field($request, 'service_id', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <div class="col-md-12">

                <?= Html::submitButton(Yii::t('main','submit'), ['class' => 'btn btn__yellow-2', 'id' => 'service_request_submit']) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
