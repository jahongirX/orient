<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:22
 */
?>

<section class="logic">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center titler">Логистика ОТМ</h3>
                <div class="logic-text">
                    <p>
                        Идейные соображения высшего порядка, а также укрепление и развитие структуры позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Таким образом новая модель организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений. Товарищи! новая модель организационной деятельности играет важную роль в формировании модели развития.
                    </p>

                    <p>
                        Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа существенных финансовых и административных условий. Таким образом сложившаяся структура организации позволяет оценить значение существенных финансовых и административных условий. Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание соответствующий условий активизации.
                    </p>
                </div>
            </div>
        </div>
        <div class="towns-map">
            <div class="row">
                <div class="col-md-4">
                    <div class="search-input">
                        <!-- <datalist id="towns">
                            <option>Москва - Самара</option>
                            <option>Москва - Сочи</option>
                            <option>Москва - Краснодар</option>
                            <option>Москва - Петербург</option>
                            <option>Москва - Якутск</option>
                        </datalist> -->
                        <input id="logistic-search" type="text" name="search-town" placeholder="Поиска направления ">
                    </div>
                    <div class="search-list">
                        <div class="list-title">Популярные направления</div>
                        <ul>
                            <li class="list-item" data-town="1">
                                <span class="town-name">Москва - Москва</span> <span class="price">0 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="2">
                                <span class="town-name">Москва - Оренбург</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="3">
                                <span class="town-name">Москва - Якутск</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="4">
                                <span class="town-name">Москва - Краснодар</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="5">
                                <span class="town-name">Москва - Кубань</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="6">
                                <span class="town-name">Москва - Екатеринбург</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="7">
                                <span class="town-name">Москва - Пенза</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="8">
                                <span class="town-name">Москва - Казань</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="9">
                                <span class="town-name">Москва - Рублевка</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="10">
                                <span class="town-name">Москва - Оренбург</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="11">
                                <span class="town-name">Москва - Тюмень</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="12">
                                <span class="town-name">Москва - Волга</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                            <li class="list-item" data-town="13">
                                <span class="town-name">Москва - Казань</span> <span class="price">5 500 <i class="fas fa-ruble-sign"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="logistic-map">
                        <div class="town-item main" data-id="1" style="left: 85px; top: 165px;">
                            <div class="town-name">Москва</div>
                            <div class="marker" ></div>
                        </div>
                        <div class="town-item main" data-id="2" style="left: 160px; top: 277px;">
                            <div class="town-name">Оренбург</div>
                            <div class="marker"></div>
                        </div>
                        <div class="town-item" data-id="3" style="left: 485px; top: 180px;">
                            <div class="town-name">Якутск</div>
                            <div class="marker"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
