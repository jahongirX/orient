<?php

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\file\FileInput;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('main','ttj');
$js = <<<JS
    window.onscroll = function() {myFunction()};

	// Get the header
	var header = document.getElementById("lower-menu");

	// Get the offset position of the navbar
	var sticky = header.offsetTop;

	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
	  if (window.pageYOffset > sticky) {
	    header.classList.add("sticky");
	    $('section.main-block').css('padding-top','66px');
	  } else {
	    header.classList.remove("sticky");
	    $('section.main-block').css('padding-top','0');
	  }
	}
JS;

$this->registerJs($js);

?>

<section class="main-block">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="news-block single-news row">

                    <h2 class="single__news-page-title">Talabalar turar joyiga ariza berish</h2>

                    <div class="single__news-page-info">


                    </div>

                    <div class="single__news-page-content">

                        <div class="row dormitory-status">
                            <div class="col-md-6 dormitory-status">
                                <div class="progress-title">Kelib tushgan arizalar soni : 100ta</div>
                                <div class="progress-title">Shulardan : </div>
                                <div class="progress-item">
                                    Javob qaytarildi:
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 96%;" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100">96ta</div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    Ijobiy yechim:
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">66ta</div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    Rad javobi:
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30ta</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 check-status">
                                <div class="check-title"> Yuborilgan ariza holatini tekshirish</div>
                                <?= Html::beginForm(['/interactive/dormitory-check', ], 'post', ['enctype' => 'multipart/form-data','id'=>'check-form']) ?>
<!--                                <form id="dormitory-check">-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="unique" placeholder="Unikal identifikatorni kiriting">
                                            <button type="submit">Yuborish</button>
                                        </div>
                                    </div>
<!--                                </form>-->
                                <?= Html::endForm() ?>
                                <div class="check-result">

                                </div>
<!--                                <div class="reply">-->
<!--                                    <div class="reply-from">Javob yo`llovchi: <span class="reply-from-author"></span></div>-->
<!--                                    <div class="reply-text">Javob mazmuni:-->
<!--                                        <p class="reply-text-body"></p>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>


                            <?php
                                $form = ActiveForm::begin([
                                    'id' => 'dormitory-form',
                                    'enableAjaxValidation' => true,
                                    'enableClientValidation' => true,
                                    'options' => ['role' => 'form','enctype' => 'multipart/form-data'],
                                    'action' => '/interactive/dormitory'
                                ]);
                            ?>

                        <div class="row dormitory-form">

                            <div class="col-md-6">
                                <?= $form->field($model, 'name')->textInput()?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 's_name')->textInput()?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'f_name')->textInput()?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'course')->dropDownList(Yii::$app->params['courses'])?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'guruh')->dropDownList(Yii::$app->params['groups'])?>
                            </div>

                            <div class="col-md-6">
<!--                                --><?//= $form->field($model, 'birth_date')->textInput()?>
                                <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                                    'options' => ['placeholder' => 'Tugilgan yilingizni tanlang'],
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'yyyy-mm-dd',
                                    ]
                                ]);
                                ?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(),'id','name'),[
                                        'id'=>'region'
                                ])?>
                            </div>

                            <div class="col-md-6">
                                <?php
                                echo $form->field($model, 'district_id')->widget(DepDrop::classname(), [
                                    'options'=>['id'=>'district'],
                                    'pluginOptions'=>[
                                        'depends'=>['region'],
                                        'placeholder'=>'Tanlang',
                                        'url'=>Url::to(['/interactive/subcat'])
                                    ]
                                ]);
                                ?>
                            </div>

                            <div class="col-md-6">
                                <label class="male">Jinsi</label>
                                <?= $form->field($model, 'male')->radio(['value'=>0,'label'=>'Erkak'])?>
                                <?= $form->field($model, 'male')->radio(['value'=>1,'label'=>'Ayol'])?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'passport_serial')->textInput()?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'address')->textInput()?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'passport_number')->textInput()?>
                            </div>

                            <div class="col-md-6">
                                <?php

                                echo '<label class="control-label">INN</label>';
                                echo FileInput::widget([
                                    'model' => $model,
                                    'attribute' => 'inn',
                                    'pluginOptions' => [
                                        'allowedFileExtensions'=>['pdf','doc','docx'],
                                        'showPreview' => false,
                                        'showCaption' => true,
                                        'showRemove' => true,
                                        'showUpload' => false,
                                        'showCancel' => false
                                    ]
                                ]);

                                ?>
                            </div>

                            <div class="col-md-6">
                                <?php

                                echo '<label class="control-label">Talabalik guvohnomasi</label>';
                                echo FileInput::widget([
                                    'model' => $model,
                                    'attribute' => 'student_doc',
                                    'pluginOptions' => [
                                        'allowedFileExtensions'=>['jpg','jpeg','png','bmp'],
                                        'showPreview' => false,
                                        'showCaption' => true,
                                        'showRemove' => true,
                                        'showUpload' => false,
                                        'showCancel' => false
                                    ]
                                ]);

                                ?>
                            </div>

                            <div class="col-md-12">
<!--                                <div type="submit" class="">Yuborish</div>-->
                                <?= Html::submitButton('Yuborish', ['class' => 'btn btn-primary send-dormitory']) ?>
                            </div>

                        </div>
                        <?php ActiveForm::end()?>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 right-sidebar">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

    </div>

</section>
