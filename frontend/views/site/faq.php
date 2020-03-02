<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('main', 'FAQ');

$js = <<<JS

    var submited = false;

    $('#faq-form').on('beforeSubmit', function(event, jqXHR, settings) 
    {
        var form = $(this);
        if( form.find('.has-error').length ) 
        {
            return false;
        }
        
        if (submited == false )
        {
            submited = true;
            
            $('#submit-btn').attr('disabled', true);
    
            $.ajax({
                url: '/site/faq-form',
                type: 'POST',
                data: form.serialize(),
                success: function(data) 
                {
                    if( data['success'] == true )
                    {
                        form[0].reset();
                        $('#faq-modal').iziModal('close');
                        $('#success-modal').iziModal('open');
                        $('#submit-btn').attr('disabled', false);
                        
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
   
JS;

$this->registerJs($js);

?>

<section class="page-content faq-page">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="row">

                    <div class="col-md-8">

                        <h2 class="faq-page-title"><?= Yii::t('main', 'faq-page-title') ?></h2>

                    </div>

                    <div class="col-md-4">
                        <a class="btn btn__yellow-2" data-izimodal-open="#faq-form-modal"><?=Yii::t('main','give-question')?></a>
                    </div>

                </div>

                <div class="panel-group faq-page-questions" id="accordion">

                    <?php

                    $i = 0;

                    foreach($models as $model):

                        $active = $i == 0 ? 'in' : '';
                        $activeAria = $i == 0 ? 'aria-expanded="true"' : '';

                        ?>

                        <div class="panel">

                            <a class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $i ?>" <?= $activeAria ?>>
                                <h4 class="panel-title"><?= $model->getLang('question') ?></h4>
                            </a>

                            <div id="collapse-<?= $i ?>" class="panel-collapse collapse <?= $active ?>">

                                <div class="panel-body">
                                    <span>Ответ:</span> <?= $model->getLang('answer') ?>
                                </div>

                            </div>

                        </div>

                        <?php

                        $i++;

                    endforEach;

                    ?>

                </div>

            </div>

            <div class="col-md-3">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

    </div>

</section>

<?= \frontend\widgets\SectionInterested::widget();?>

<div class="iziModal" id="faq-form-modal">

    <div class="modal__inner">

        <div class="modal__close" data-izimodal-close=""></div>

        <div class="modal__title"><?=Yii::t('main','give-question')?></div>

        <div class="row">

            <?php $form = ActiveForm::begin([
                'options'=>[
                    'id' => 'faq-form'
                ]
            ]); ?>

                <div class="col-md-6">

                    <?= $form->field($model, 'name',[
                        'template' => "{input}{label}"
                    ])->textInput([
                        'value' => ''
                    ]) ?>

                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'email',[
                        'template' => "{input}{label}"
                    ])->textInput([
                        'value' => ''
                    ]) ?>

                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'phone',[
                        'template' => "{input}{label}"
                    ])->textInput([
                        'class' => 'phone-mask form-control',
                        'value' => ''
                    ]) ?>

                </div>

                <div class="col-md-6">

                    <?= $form->field($model, 'category',[
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

                    <?= $form->field($model, 'question',[
                        'template' => "{input}{label}",
                    ])->textInput([
                            'value' => ''
                    ]) ?>

                </div>

                <div class="col-md-12">

                    <?= Html::submitButton('Отправить', ['class' => 'btn btn__yellow-2', 'id' => 'submit-btn']) ?>

                </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
