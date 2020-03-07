<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.03.2020
 * Time: 9:18
 */

$this->title =\common\components\StaticFunctions::getSettings('title'). ' - ' . \common\models\FilialRegion::findOne($model->region_id)->name . " - " . $model->title;
?>
<section class="page-title pyatno filials-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <p>
                    Филиалы «ОТМ»
                </p>

                <div class="btnch">
                    <a class="more sweep-to-right text-center" href="#">Посмотреть каталог</a>
                </div>
            </div>
        </div>
    </div>
</section>





<div class="filials-map">
    <div class="container">
        <div class="row">
            <div class="col-md-6 titling">
                <h3 class="titler littler">Филиалы</h3>
            </div>

            <div class="col-md-3"></div>

            <div class="col-md-3 map-switcher">

                <div class="list-group" id="list-tab" role="tablist">


                    <a class="list-group-item list-group-item-action active" id="list-about-tab-1" data-toggle="list" data-id="1" href="#list-pane-tab-1" role="tab" aria-controls="Map">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="item">
                                    <p>На карте</p>
                                </div>
                            </div>
                        </div>

                    </a>




                    <a class="list-group-item list-group-item-action" id="list-about-tab-2" data-toggle="list" data-id="2" href="#list-pane-tab-2" role="tab" aria-controls="List">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="item">
                                    <p>Списком</p>
                                </div>
                            </div>
                        </div>
                    </a>


                </div>

            </div>


            <div class="col-md-12">

                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="list-pane-tab-1" role="tabpanel" aria-labelledby="list-techniuqe-question">
                        <div class="pane-item">
                            <img src="/images/russian-map.png" alt="map">
                        </div>
                    </div>


                    <div class="tab-pane fade" id="list-pane-tab-2" role="tabpanel" aria-labelledby="list-shipping-question">
                        <div class="pane-item">
                            Here is ul li tags that not given
                        </div>
                    </div>





                </div>


                <!-- Here Map code -->
            </div>
        </div>
    </div>
</div>

