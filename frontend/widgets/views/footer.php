<?php
use common\models\Menu;

function renderFooterMenu($id)
{

    $out = '';

    //$menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $menus = Menu::find()->where('status=1')->andWhere(['type'=>1])->andWhere(['id' => $id])->all();

    foreach ($menus as $menu) {
        $out .= '<li>';
        $out .= '<a href="' . $menu->url . '">' . $menu->title . '</a>';

        if ($menu->type)

            $out .= '</li>';
    }

    return $out;
}

 ?>

<footer>
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-logo">
                        <a href="#"><img src="/images/footer-logo.png" alt="Logo"></a>
                    </div>
                    <div class="company-direction">
                        Изготовление емкостного оборудования и металлоконструкций. <br>
                        Доставка оборудования осуществляется по территории Российской Федирации.
                    </div>
                    <div class="footer-contacts">
                        <h3>Конакты</h3>
                        <div class="contact-info">
                            <div class="phone-info">
                                <p>8 800 505-27-28</p>
                            </div>
                            <div class="phone-title">
                                <a href="#">
                                    <img src="/images/phone-marker.png" alt="Place-Marker">
                                    <p>Бесплатный звонок</p>
                                </a>
                            </div>
                            <div class="email-info">
                                <a href="#">
                                    <img src="/images/email-marker.png" alt="Place-Marker">
                                    <p>info@otm.ru</p>
                                </a>
                            </div>
                            <div class="copyright">
                                © «ОТМ» 2020 г.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 urls">

                    <ul>Изготовление
                        <li><a href="#"><p>Ассенизаторские цистерны</p></a></li>
                        <li><a href="#"><p>Мусорные контейнира</p></a></li>
                        <li><a href="#"><p>Бункерное оборудование</p></a></li>
                        <li><a href="#"><p>Противопожарные двери</p></a></li>
                        <li><a href="#"><p>Металлические двери</p></a></li>
                        <li><a href="#"><p>Металлоконструкции</p></a></li>
                    </ul>

                    <ul>Услуги
                        <li><a href="#"><p>Справочные работы</p></a></li>
                        <li><a href="#"><p>Изготоление и монтаж металлоконструкций</p></a></li>
                        <li><a href="#"><p>Строительно-монтажные работы</p></a></li>
                    </ul>


                </div>

                <div class="col-md-4">
                    <div class="company-news">
                        <h3>Новости компании</h3>

                        <div class="news news1">
                            <div class="news-date">
                                <p>Новости</p>
                                <p class="date">20.01.2020</p>
                            </div>

                            <div class="news-info">
                                <h4>Условное название, которое придумал дизайнер на несколько строк</h4>
                                <h5>Идейные соображения высшего порядка ...</h5>
                            </div>

                            <div class="news-url">
                                <a href="#">
                                    <p>Читать статью</p>
                                    <img src="/images/news-url-icon.png" alt="news-url">
                                </a>
                            </div>
                        </div>

                        <div class="news news2">
                            <div class="news-date">
                                <p>Новости</p>
                                <p class="date">20.01.2020</p>
                            </div>

                            <div class="news-info">
                                <h4>Условное название, которое придумал дизайнер на несколько строк</h4>
                                <h5>Идейные соображения высшего порядка ...</h5>
                            </div>

                            <div class="news-url">
                                <a href="#">
                                    <p>Читать статью</p>
                                    <img src="/images/news-url-icon.png" alt="news-url">
                                </a>
                            </div>
                        </div>

                        <a href="#" class="hidden-button-for-mobile">Все новости</a>

                        <div class="footer-contacts hidden-block-for-mobile">
                            <h3>Конакты</h3>
                            <div class="contact-info">
                                <div class="phone-info">
                                    <p>8 800 505-27-28</p>
                                </div>
                                <div class="phone-title">
                                    <a href="#">
                                        <img src="/images/phone-marker.png" alt="Place-Marker">
                                        <p>Бесплатный звонок</p>
                                    </a>
                                </div>
                                <div class="email-info">
                                    <a href="#">
                                        <img src="/images/email-marker.png" alt="Place-Marker">
                                        <p>info@otm.ru</p>
                                    </a>
                                </div>
                                <div class="copyright">
                                    © «ОТМ» 2020 г.
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-notice">
        <div class="container text-center">
            <p>
                Задача организации, в особенности же постоянный количественный рост и сфера нашей активности требуют от нас анализа существенных финансовых и <span>административных условий.</span>
            </p>
        </div>
    </div>


</footer>