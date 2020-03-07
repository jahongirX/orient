<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.03.2020
 * Time: 9:08
 */

    $this->title =\common\components\StaticFunctions::getSettings('title'). ' - ' . \common\models\FilialRegion::findOne($model->region_id)->name . " - " . $model->title;
?>
<?php if (!empty($model)): ?>
<section class="page-title  chosen-filial-title">
    <div class="chosen-filial-title-bg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center ">
                    <p>
                        Представительство компании  «ОТМ» <br>по Красноярскому краю
                    </p>

                    <div class="btnch">
                        <a class="more sweep-to-right text-center" href="#">Посмотреть каталог</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="chosen-filial-about">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="titler littler"><?=$model->title?></h3>
            </div>


            <div class="col-md-12 about-text">

                <div class="img">
                    <img src="/images/mini-about-text-img.png" alt="img">
                </div>

                <div class="text">

                    <p><?=$model->description?></p>

                </div>

            </div>


        </div>
    </div>
</section>

<section class="uslugi">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-12">
                <!-- Empty place -->
            </div>
            <div class="col-md-6 col-12 p-0">
                <div class="uslugi-text-block">
                    <img class="hidden-block-for-mobile img" src="/images/responsive/chosen-filial-text-img.png" alt="">
                    <div class="text">
                        <h3 class="titler littler"><?=$model->title_uslugi?></h3>

                        <ul><?=$model->description_uslugi?></ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php endif; ?>
