<p class="form-title"><?=Yii::t('main','historynews')?></p>

<form action="">

    <div class="sort-by-year">
        <div class="select-box">
            <div class="select-box__current" tabindex="1">
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2019" value="2019" name="year" checked="checked"/>
                    <p class="select-box__input-text">2019</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2018" value="2018" name="year" checked="checked"/>
                    <p class="select-box__input-text">2018</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2017" value="2017" name="year" checked="checked"/>
                    <p class="select-box__input-text">2017</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2016" value="2016" name="year" checked="checked"/>
                    <p class="select-box__input-text">2016</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2020" value="2020" name="year" checked="checked"/>
                    <p class="select-box__input-text">2020</p>
                </div>
                <img class="select-box__icon" src="/images/catalog-radio-group-icon.png" alt="Arrow Icon" aria-hidden="true"/>
            </div>
            <ul class="select-box__list">
                <li>
                    <label class="select-box__option" for="2020" aria-hidden="aria-hidden">2020</label>
                </li>
                <li>
                    <label class="select-box__option" for="2019" aria-hidden="aria-hidden">2019</label>
                </li>
                <li>
                    <label class="select-box__option" for="2018" aria-hidden="aria-hidden">2018</label>
                </li>
                <li>
                    <label class="select-box__option" for="2017" aria-hidden="aria-hidden">2017</label>
                </li>
                <li>
                    <label class="select-box__option" for="2016" aria-hidden="aria-hidden">2016</label>
                </li>
            </ul>
        </div>
    </div>

    <div class="sort-by-radio">
        <div class="item">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-1" aria-expanded="false" aria-controls="radioGroup">
                <span><?=Yii::t('main','month')?></span>
                <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
            </button>

            <div class="collapse show" id="radio-group-1">
                <div class="card card-body">
                    <div class="radios">
                        <div class="radio">
                            <input id="radio-01" name="month" type="radio" value="1">
                            <label for="radio-01" class="radio-label">Январь</label>
                        </div>

                        <div class="radio">
                            <input id="radio-02" name="month" type="radio" value="2">
                            <label  for="radio-02" class="radio-label">Февраль</label>
                        </div>

                        <div class="radio">
                            <input id="radio-03" name="month" type="radio" value="3">
                            <label for="radio-03" class="radio-label">Март</label>
                        </div>
                        <div class="radio">
                            <input id="radio-04" name="month" type="radio" value="4">
                            <label for="radio-04" class="radio-label">Апрель</label>
                        </div>

                        <div class="radio">
                            <input id="radio-05" name="month" type="radio" value="5">
                            <label  for="radio-05" class="radio-label">Май</label>
                        </div>

                        <div class="radio">
                            <input id="radio-06" name="month" type="radio" value="6">
                            <label for="radio-06" class="radio-label">Июнь</label>
                        </div>

                        <div class="radio">
                            <input id="radio-07" name="month" type="radio" value="7">
                            <label for="radio-07" class="radio-label">Июль</label>
                        </div>

                        <div class="radio">
                            <input id="radio-08" name="month" type="radio" value="8">
                            <label  for="radio-08" class="radio-label">Август</label>
                        </div>

                        <div class="radio">
                            <input id="radio-09" name="month" type="radio" value="9">
                            <label for="radio-09" class="radio-label">Сентябрь</label>
                        </div>
                        <div class="radio">
                            <input id="radio-10" name="month" type="radio" value="10">
                            <label for="radio-10" class="radio-label">Октябрь</label>
                        </div>

                        <div class="radio">
                            <input id="radio-11" name="month" type="radio" value="11">
                            <label  for="radio-11" class="radio-label">Ноябрь</label>
                        </div>

                        <div class="radio">
                            <input id="radio-12" name="month" type="radio" value="12">
                            <label for="radio-12" class="radio-label">Декабрь</label>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="item">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#radio-group-2" aria-expanded="false" aria-controls="radioGroup">
                <span><?=Yii::t('main','less')?></span>
                <img src="/images/catalog-radio-group-icon.png" alt="downarrow">
            </button>

            <div class="collapse show" id="radio-group-2">
                <div class="card card-body">
                    <div class="radios">
                        <div class="radio">
                            <input id="radio-21" name="news-type" type="radio" value="1">
                            <label for="radio-21" class="radio-label">Новости</label>
                        </div>

                        <div class="radio">
                            <input id="radio-22" name="news-type" type="radio" value="2">
                            <label  for="radio-22" class="radio-label">Акции</label>
                        </div>

                        <div class="radio">
                            <input id="radio-23" name="news-type" type="radio" value="3">
                            <label for="radio-23" class="radio-label">Интересное</label>
                        </div>
                        <div class="radio">
                            <input id="radio-24" name="news-type" type="radio" value="4">
                            <label for="radio-24" class="radio-label">Отгрузки</label>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</form>