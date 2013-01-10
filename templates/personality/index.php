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

    <!-- The following five lines load the Blueprint CSS Framework (http://blueprintcss.org). If you don't want to use this framework, delete these lines. -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
    <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/joomla-nav/screen.css" type="text/css" media="screen" />

<!--<<<<<<< Updated upstream-->
		<!-- The following line loads the template JavaScript file located in the template folder. It's blank by default. -->
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

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
                $(".panel").css({'width':$(window).width(), 'height':$(window).height()});
                $(".pwrap").css('right',function(){return (($(window).width()-920)/2)});
                if ($(window).height()>'700'){$(".pwrap").css('top',function(){return (($(window).height()-700)/2)})};
                window.onresize = function() {
                    $(".panel").css({'width':$(window).width(), 'height':$(window).height()});
                    $(".pwrap").css('right',function(){return (($(window).width()-920)/2)});
                    if ($(window).height()>'700'){$(".pwrap").css('top',function(){return (($(window).height()-700)/2)})};
                };
                return false;
            });
        </script>
        <!-- Reading browser's window width & height and applying them for sheduler -->

    </head>
	<body>
		<div class="container">


            <!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER-->
            <!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER-->
            <!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER--><!--SHEDULER SHEDULER SHEDULER-->
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
            <!--END SHEDULER END SHEDULER END SHEDULER--><!--END SHEDULER END SHEDULER END SHEDULER-->
            <!--END SHEDULER END SHEDULER END SHEDULER--><!--END SHEDULER END SHEDULER END SHEDULER-->
            <!--END SHEDULER END SHEDULER END SHEDULER--><!--END SHEDULER END SHEDULER END SHEDULER-->

        </div>
	</body>
</html>
<!--=======-->
    <!-- The following line loads the template CSS file located in the template folder. -->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

    <!-- The following four lines load the Blueprint CSS Framework and the template CSS file for right-to-left languages. If you don't want to use these, delete these lines. -->
    <?php if($this->direction == 'rtl') : ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/plugins/rtl/screen.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_rtl.css" type="text/css" />
    <?php endif; ?>

    <!-- The following line loads the template JavaScript file located in the template folder. It's blank by default. -->
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="wrap_logo">
            <a href="index.php/news">
                <h1>Personality</h1>
                <span>LOGO</span>
            </a>
        </div>
        <jdoc:include type="modules" name="personality-topmenu" />
    </div>
    <div class="content">
        <jdoc:include type="modules" name="before-content" />
        <jdoc:include type="component" />
        <jdoc:include type="modules" name="personality-map" />
        <jdoc:include type="modules" name="personality-lightbox" />
    </div>
</div>
</body>
</html>
<!-->>>>>>> Stashed changes
