<div class="col-md-3 catalog-form">
    <p class="form-title"><?=Yii::t('main','Фильтр_товаров')?></p>

    <form action="">

        <div class="search">
            <input type="search" class="form-control" placeholder="Поиск">
            <div class="input-group-append">
                <button class="btn" type="button">
                    <img src="/images/catalog-search-icon.png" alt="search">
                </button>
            </div>
        </div>

        <div class="sort-by-radio">
            <div class="item">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-1" aria-expanded="false" aria-controls="radioGroup">
                    <span><?=Yii::t('main','Тип_оборудоания')?></span>
                    <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
                </button>

                <div class="collapse show" id="radio-group-1">
                    <div class="card card-body">
                        <div class="radios">
                            <div class="radio">
                                <input id="radio-11" name="tip" type="radio" value="1">
                                <label for="radio-11" class="radio-label">Ассенизаторские цистерны</label>
                            </div>

                            <div class="radio">
                                <input id="radio-12" name="tip" type="radio" value="2">
                                <label  for="radio-12" class="radio-label">Противопожарные двери</label>
                            </div>

                            <div class="radio">
                                <input id="radio-13" name="tip" type="radio" value="3">
                                <label for="radio-13" class="radio-label">Металлические двери</label>
                            </div>
                            <div class="radio">
                                <input id="radio-14" name="tip" type="radio" value="4">
                                <label for="radio-14" class="radio-label">Мусорные контейнера</label>
                            </div>

                            <div class="radio">
                                <input id="radio-15" name="tip" type="radio" value="5">
                                <label  for="radio-15" class="radio-label">Бункерное оборудование</label>
                            </div>

                            <div class="radio">
                                <input id="radio-16" name="tip" type="radio" value="0">
                                <label for="radio-16" class="radio-label">Все</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="item">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-2" aria-expanded="false" aria-controls="radioGroup">
                    <span><?=Yii::t('main','Марка_автомобиля')?></span>
                    <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
                </button>

                <div class="collapse show" id="radio-group-2">
                    <div class="card card-body">
                        <div class="radios">
                            <div class="radio">
                                <input id="radio-21" name="marka" type="radio" value="1">
                                <label for="radio-21" class="radio-label">МАЗ</label>
                            </div>

                            <div class="radio">
                                <input id="radio-22" name="marka" type="radio" value="2">
                                <label  for="radio-22" class="radio-label">КАМАЗ</label>
                            </div>

                            <div class="radio">
                                <input id="radio-23" name="marka" type="radio" value="3">
                                <label for="radio-23" class="radio-label">ЗИЛ</label>
                            </div>
                            <div class="radio">
                                <input id="radio-24" name="marka" type="radio" value="4">
                                <label for="radio-24" class="radio-label">ГАЗ</label>
                            </div>

                            <div class="radio">
                                <input id="radio-25" name="marka" type="radio" value="0">
                                <label for="radio-25" class="radio-label">Все</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="item">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-3" aria-expanded="false" aria-controls="radioGroup">
                    <span><?=Yii::t('main','Объем')?></span>
                    <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
                </button>

                <div class="collapse show" id="radio-group-3">
                    <div class="card card-body">
                        <div class="radios">
                            <div class="radio">
                                <input id="radio-31" name="obyom" type="radio" value="1">
                                <label for="radio-31" class="radio-label">3,75</label>
                            </div>

                            <div class="radio">
                                <input id="radio-32" name="obyom" type="radio" value="2">
                                <label  for="radio-32" class="radio-label">10</label>
                            </div>

                            <div class="radio">
                                <input id="radio-33" name="obyom" type="radio" value="3">
                                <label for="radio-33" class="radio-label">5</label>
                            </div>
                            <div class="radio">
                                <input id="radio-34" name="obyom" type="radio" value="4">
                                <label for="radio-34" class="radio-label">6</label>
                            </div>

                            <div class="radio">
                                <input id="radio-35" name="obyom" type="radio" value="0">
                                <label for="radio-35" class="radio-label">Все</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="item">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-4" aria-expanded="false" aria-controls="radioGroup">
                    <span><?=Yii::t('main','Размер_изделия')?></span>
                    <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
                </button>

                <div class="collapse show" id="radio-group-4">
                    <div class="card card-body">
                        <div class="radios">
                            <div class="radio">
                                <input id="radio-41" name="razmer" type="radio" value="1">
                                <label for="radio-41" class="radio-label">2000x900</label>
                            </div>

                            <div class="radio">
                                <input id="radio-42" name="razmer" type="radio" value="2">
                                <label  for="radio-42" class="radio-label">2100x800</label>
                            </div>

                            <div class="radio">
                                <input id="radio-43" name="razmer" type="radio" value="3">
                                <label for="radio-43" class="radio-label">2200x1400</label>
                            </div>
                            <div class="radio">
                                <input id="radio-44" name="razmer" type="radio" value="4">
                                <label for="radio-44" class="radio-label">2000x600</label>
                            </div>

                            <div class="radio">
                                <input id="radio-45" name="razmer" type="radio" value="0">
                                <label for="radio-45" class="radio-label">Все</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="item">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-5" aria-expanded="false" aria-controls="radioGroup">
                    <span><?=Yii::t('main','Наличие_складе')?></span>
                    <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
                </button>

                <div class="collapse show" id="radio-group-5">
                    <div class="card card-body">
                        <div class="radios">
                            <div class="radio">
                                <input id="radio-51" name="sklad" type="radio" value="1">
                                <label for="radio-51" class="radio-label">В наличии</label>
                            </div>

                            <div class="radio">
                                <input id="radio-52" name="sklad" type="radio" value="2">
                                <label  for="radio-52" class="radio-label">Под заказ</label>
                            </div>

                            <div class="radio">
                                <input id="radio-53" name="razmer" type="radio" value="0">
                                <label for="radio-53" class="radio-label">Все</label>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

</div>