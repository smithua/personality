<?php
/**
 * @package    Joomla.Site
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHtml::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
    <!-- The following JDOC Head tag loads all the header and meta information from your site config and content. -->
    <jdoc:include type="head" />
     <!--FONT-->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <!-- The following five lines load the Blueprint CSS Framework (http://blueprintcss.org). If you don't want to use this framework, delete these lines. -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
    <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/joomla-nav/screen.css" type="text/css" media="screen" />


		<!-- The following line loads the template JavaScript file located in the template folder. It's blank by default. -->
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>


    <script type="text/javascript">
        jQuery(document).ready(function(){
            function htmSlider(){
                /* Зададим следующие параметры */
                /* обертка слайдера */
                var slideWrap = jQuery('.slide-wrap');
                /* кнопки вперед/назад и старт/пауза */
                var nextLink = jQuery('.next-slide');
                var prevLink = jQuery('.prev-slide');
                var playLink = jQuery('.auto');
                /* Проверка на анимацию */
                var is_animate = false;
                /* ширина слайда с отступами */
                var slideWidth = jQuery('.slide-item').outerWidth();
                /* смещение слайдера */
                var scrollSlider = slideWrap.position().left - slideWidth;

                /* Клик по ссылке на следующий слайд */
                nextLink.click(function(){
                    if(!slideWrap.is(':animated')) {
                        slideWrap.animate({left: scrollSlider}, 500, function(){
                            slideWrap
                                    .find('.slide-item:first')
                                    .appendTo(slideWrap)
                                    .parent()
                                    .css({'left': 0});
                        });
                    }
                });

                /* Клик по ссылке на предыдующий слайд */
                prevLink.click(function(){
                    if(!slideWrap.is(':animated')) {
                        slideWrap
                                .css({'left': scrollSlider})
                                .find('.slide-item:last')
                                .prependTo(slideWrap)
                                .parent()
                                .animate({left: 0}, 500);
                    }
                });

                /* Функция автоматической прокрутки слайдера */
                function autoplay(){
                    if(!is_animate){
                        is_animate = true;
                        slideWrap.animate({left: scrollSlider}, 500, function(){
                            slideWrap
                                    .find('.slide-item:first')
                                    .appendTo(slideWrap)
                                    .parent()
                                    .css({'left': 0});
                            is_animate = false;
                        });
                    }
                }

                /* Клики по ссылкам старт/пауза */
                playLink.click(function(){
                    if(playLink.hasClass('play')){
                        /* Изменяем клас у кнопки на клас паузы */
                        playLink.removeClass('play').addClass('pause');
                        /* Добавляем кнопкам вперед/назад клас который их скрывает */
                        jQuery('.navy').addClass('disable');
                        /* Инициализируем функцию autoplay() через переменную
                           чтобы потом можно было ее отключить
                        */
                        timer = setInterval(autoplay, 1000);
                    } else {
                        playLink.removeClass('pause').addClass('play');
                        /* показываем кнопки вперед/назад */
                        jQuery('.navy').removeClass('disable');
                        /* Отключаем функцию autoplay() */
                        clearInterval(timer);
                    }
                });

            }

            /* иницилизируем функцию слайдера */
            htmSlider();
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function(){

            $(".trigger").click(function(){
                $(".panel").toggle("slow");
                $(this).toggleClass("active");
                return false;
            });
        });
    </script>
    <!-- Reading browser's window width & height and applying them for sheduler -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".panel").css({'width':$(window).width(), 'height':768});
            $(".pwrap").css('right',function(){return (($(window).width()-920)/2)});
            if ($(window).height()>'768'){$(".pwrap").css('top',function(){return (($(window).height()-768)/2)})};
            window.onresize = function() {
                $(".panel").css({'width':$(window).width()});
                $(".pwrap").css('right',function(){return (($(window).width()-920)/2)});
                if ($(window).height()>'768'){$(".pwrap").css('top',function(){return (($(window).height()-768)/2)})};
            };
            return false;
        });
    </script>
    <!-- Reading browser's window width & height and applying them for sheduler -->
    <!-- Footer sllide -->
    <script type="text/javascript">
        jQuery(function($) {
            var open = false;
            $('#footer_button').click(function () {
                if(open === false) {
                    $('#footer_content').animate({ height: '120px' });
                    $(this).css('backgroundPosition', 'bottom left');
                    open = true;
                } else {
                    $('#footer_content').animate({ height: '0px' });
                    $(this).css('backgroundPosition', 'top left');
                    open = false;
                }
            });
        });
    </script>

    </head>
	<body>
	<div class="container">
        <div class="header">
            <div class="wrap_logo">
                <a href="#">
                    <h1>Personality</h1>
                    <span>LOGO</span>
                </a>
            </div>
            <jdoc:include type="modules" name="personality-topmenu" />
        </div>


        <?php $currentMenuId = JSite::getMenu()->getActive()->id; ?>
        <?php if($currentMenuId == 108):?>
            <style type="text/css">
                .content {
                    background: #fcfcfe;
                    padding: 0 20px 0 0;
                }
                .honors_board {
                    background: #fff;
                    padding: 30px 40px 10px 20px !important;
                }
            </style>
        <?php endif;?>

        <div class="content">
            <jdoc:include type="modules" name="before-content" />
            <jdoc:include type="component" />
            <?php if($currentMenuId == 109):?>
                <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/placeholder.js"></script>
            <?php endif;?>
            <jdoc:include type="modules" name="personality-map" />
        </div>
        <div class="panel">
            <div class="bg"></div>
            <div class="pwrap">

                <h4>Розклад занять</h4>
                <ul>
                    <li>
                        <jdoc:include type="modules" name="Rozklad_pn" />
                    </li>

                    <li class="blue">
                        <jdoc:include type="modules" name="Rozklad_vt" />
                    </li>

                    <li class="red">
                        <jdoc:include type="modules" name="Rozklad_sr" />
                    </li>

                    <li class="blue panel_new_row">
                        <jdoc:include type="modules" name="Rozklad_4t" />
                    </li>
                    <li>
                        <jdoc:include type="modules" name="Rozklad_pt" />
                    </li>
                </ul>
            </div>
            <a class="trigger" href="#"></a>
        </div>
        <a class="trigger" href="#"></a>

            <!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER-->
            <!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER-->
            <!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER-->


        <div id="footer_container">
            <div class="footer">
                <!-- SLIDER-->

                <a href="&link">Усі новини</a>
                <div class="slider">
                    <div class="slide-list">
                        <div class="slide-wrap">

                            <div class="slide-item">
                                <a href="http://localhost/joomla2/index.php?option=com_content&view=article&id=1">
                                    <img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/img-1.jpg" alt="" />
                                    <span class="slide-title">Первaya new</span>
                                </a>
                            </div>
                            <div class="slide-item">
                                <a href="&link">
                                    <img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/img-1.jpg" alt="" />
                                    <span class="slide-title">Ну просто очень длинное название второго слайда</span>
                                </a>
                            </div>
                            <div class="slide-item">
                                <a href="&link">
                                    <img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/img-3.jpg" alt="" />
                                    <span class="slide-title">Третий слайд</span>
                                </a>
                            </div>
                            <div class="slide-item">
                                <a href="&link">
                                    <img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/img-4.jpg" alt="" />
                                    <span class="slide-title">Четвертый слайд</span>
                                </a>
                            </div>
                            <div class="slide-item">
                                <a href="&link">
                                    <img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/img-5.jpg" alt="" />
                                    <span class="slide-title">Пятый слайд</span>
                                </a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div name="prev" class="navy prev-slide"></div>
                    <div name="next" class="navy next-slide"></div>
                    <div class="auto play"></div>
                </div><!-- SLIDER END-->
            </div><!-- footer end-->


            <!--END SHEDULER END SHEDULER END SHEDULER--><!--END SHEDULER END SHEDULER END SHEDULER-->
            <!--END SHEDULER END SHEDULER END SHEDULER--><!--END SHEDULER END SHEDULER END SHEDULER-->
            <!--END SHEDULER END SHEDULER END SHEDULER--><!--END SHEDULER END SHEDULER END SHEDULER-->

    </div>
	</body>
</html>
