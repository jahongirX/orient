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
                            <div class="col-md-12">
                                <div class="cart bg-info" style="padding: 15px;margin-bottom: 30px;">
                                    <h3 style="color: #fff;font-size: 20px;">Sizning unikal identifikatoringiz: <span class="bg-warning"><?=$unique?></span></h3>
                                    <p style="color: #fff; font-size: 16px;">Yuborgan arizangizning holatini tekshirish uchun holatni tekshirish xizmatidan foydalaning</p>
                                </div>
                            </div>
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
                            </div>
                        </div>


                    </div>

                </div>

            </div>

            <div class="col-lg-3 right-sidebar">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

    </div>

</section>
