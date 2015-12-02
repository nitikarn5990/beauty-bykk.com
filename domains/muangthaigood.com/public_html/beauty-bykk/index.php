<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');
// echo ($_SERVER["DOCUMENT_ROOT"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Beauty Science</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Beauty Science" />
        <meta name="keywords" content="Beauty Science" />

        <link rel="shortcut icon" href="<?= ADDRESS ?>images/icon.png">
            <link href="<?= ADDRESS ?>style.css" rel="stylesheet" type="text/css" />
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
            <script src="<?= ADDRESS ?>dist/slippry.min.js"></script>
            <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
            <meta name="viewport" content="width=device-width">
                <link rel="stylesheet" href="<?= ADDRESS ?>slide.css"> 
                    <link rel="stylesheet" href="<?= ADDRESS ?>dist/slippry.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

                            </head>
                            <body>
                                <style>
                                    .cssmenu ul li:first-child a {
                                        border-top-left-radius: 10px;
                                        border-top-right-radius:  10px;
                                    }
                                    .cssmenu ul li:last-child a {
                                        border-bottom-left-radius: 10px;
                                        border-bottom-right-radius:  10px;
                                    }
                                    .cssmenu ul,
                                    .cssmenu li,
                                    .cssmenu a {
                                        list-style: none;
                                        padding: 0;
                                        margin: 0 auto;
                                        text-align: center;
                                        font: normal 16px Arial, Helvetica, sans-serif;
                                        font-size: 16px;
                                    }
                                    .cssmenu span{
                                        list-style: none;
                                        padding: 0;
                                        margin: 0 auto;
                                        text-align: center;
                                        font: normal 14px Arial, Helvetica, sans-serif;
                                        color: black;
                                    }
                                    .csscssmenu ul{
                                        -webkit-border-radius: 0 0 5px 5px;
                                        -moz-border-radius: 0 0 5px 5px;
                                        border-radius: 0 0 5px 5px;
                                    }
                                    .cssmenu {
                                        clear: both;
                                        margin: 52px auto 10px auto;
                                        padding: 0;
                                        background: url(<?= ADDRESS ?>images/bgmenu.png) center top no-repeat;
                                        width: 539px;
                                        height: 54px;
                                        text-align: center;
                                    }
                                    .cssmenu:after,
                                    .cssmenu ul:after {
                                        content: '';
                                        display: block;
                                        clear: both;
                                    }
                                    .cssmenu a {

                                        color: #ffffff;
                                        display: block;
                                        font: normal 16px Arial, Helvetica, sans-serif;
                                        padding: 16px 20px;
                                        text-decoration: none;

                                    }
                                    .cssmenu ul {
                                        list-style: none;

                                    }
                                    .cssmenu > ul > li {
                                        display: inline-block;
                                        float: left;
                                        margin: 0;
                                    }
                                    .cssmenu.align-center {
                                        text-align: center;
                                    }
                                    .cssmenu.align-center > ul > li {
                                        float: none;
                                    }
                                    .cssmenu.align-center ul ul {
                                        text-align: left;
                                    }
                                    .cssmenu.align-right > ul {
                                        float: right;
                                    }
                                    .cssmenu.align-right ul ul {
                                        text-align: right;
                                    }
                                    .cssmenu > ul > li > a {
                                        color: #000000;
                                        font-size: 16px;
                                    }
                                    .cssmenu > ul > li:hover:after {
                                        content: '';
                                        display: block;
                                        width: 0;
                                        height: 0;
                                        position: absolute;
                                        left: 50%;
                                        bottom: 0;
                                        border-left: 10px solid transparent;
                                        border-right: 10px solid transparent;

                                        margin-left: -10px;
                                    }
                                    .cssmenu > ul > li:first-child > a {
                                        border-radius: 5px 0 0 0;
                                        -moz-border-radius: 5px 0 0 0;
                                        -webkit-border-radius: 5px 0 0 0;
                                    }
                                    .cssmenu.align-right > ul > li:first-child > a,
                                    .cssmenu.align-center > ul > li:first-child > a {
                                        border-radius: 0;
                                        -moz-border-radius: 0;
                                        -webkit-border-radius: 0;
                                    }
                                    .cssmenu.align-right > ul > li:last-child > a {
                                        border-radius: 0 5px 0 0;
                                        -moz-border-radius: 0 5px 0 0;
                                        -webkit-border-radius: 0 5px 0 0;
                                    }
                                    .cssmenu > ul > li.active > a,
                                    .cssmenu > ul > li:hover > a {
                                        color: #000000;

                                    }
                                    .cssmenu .has-sub {
                                        z-index: 1;

                                    }
                                    .cssmenu .has-sub:hover > ul {
                                        display: block;
                                    }
                                    .cssmenu .has-sub ul {
                                        display: none;
                                        position: absolute;
                                        width: 200px;

                                    }
                                    .cssmenu.align-right .has-sub ul {
                                        left: auto;
                                        right: 0;
                                    }
                                    .cssmenu .has-sub ul li {
                                        *margin-bottom: -1px;
                                    }
                                    .cssmenu .has-sub ul li a {
                                        background: #CD426C;
                                        border-bottom: 1px solid rgba(255, 183, 206, 0.16);
                                        font-size: 11px;
                                        filter: none;
                                        display: block;
                                        line-height: 120%;
                                        padding: 10px;
                                        color: #ffffff;
                                    }
                                    .cssmenu .has-sub ul li:hover a {
                                        background: #a80008;
                                    }
                                    .cssmenu ul ul li:hover > a {
                                        color: #ffffff;
                                    }
                                    .cssmenu .has-sub .has-sub:hover > ul {
                                        display: block;
                                    }
                                    .cssmenu .has-sub .has-sub ul {
                                        display: none;
                                        position: absolute;
                                        left: 100%;
                                        top: 0;
                                    }
                                    .cssmenu.align-right .has-sub .has-sub ul,
                                    .cssmenu.align-right ul ul ul {
                                        left: auto;
                                        right: 100%;
                                    }
                                    .cssmenu .has-sub .has-sub ul li a {
                                        background: #a80008;
                                        border-bottom: 1px dotted #ff0f1b;
                                    }
                                    .cssmenu .has-sub .has-sub ul li a:hover {
                                        background: #8f0007;
                                    }
                                    .cssmenu ul ul li.last > a,
                                    .cssmenu ul ul li:last-child > a,
                                    .cssmenu ul ul ul li.last > a,
                                    .cssmenu ul ul ul li:last-child > a,
                                    .cssmenu .has-sub ul li:last-child > a,
                                    .cssmenu .has-sub ul li.last > a {
                                        border-bottom: 0;
                                    }

                                </style>
                                <script>



                                </script>

                                <div id="container">
                                    <div id="imgslide">
                                        <div class="logo"><a href="<?= ADDRESS ?>" title="Beauty Science"><img src="<?= ADDRESS ?>images/logo.png" width="288" height="199" alt="Beauty Science" title="Beauty Science" /></a></div>
                                        <div class="shoppingcart">
                                            <a href="<?=ADDRESS?>cart"><img src="<?= ADDRESS ?>images/shopping-Cart.png" /></a>
                                            <div class="count-cart" style="font-weight: bold;">[<?=$_SESSION['count_cart'] == '' ?0:$_SESSION['count_cart']?>]</div>
                                        </div>

                                        <div class="slide">
                                            <article class="demo_block">
                                                <ul id="demo1" style="list-style:none; position:0; margin:0;">

                                                    <?php
                                                    $sql = "SELECT * FROM " . $slides->getTbl() . " WHERE status = 'ใช้งาน' ORDER BY sort ASC";
                                                    $query = $db->Query($sql);
                                                    $numRow = $db->NumRows($query);
                                                    if ($numRow > 0) {
                                                        while ($row = $db->FetchArray($query)) {
                                                            ?>

                                                            <li><a href="javascript:;"><img src="<?= ADDRESS ?>img/<?= $slides_file->getDataDesc("file_name", "slides_id = " . $row['id']) ?>" width="935" height="455" alt="<?= $slides_file->getDataDesc("alt_tag", "slides_id = " . $row['id']) ?>" ></a></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>


                                                </ul>
                                            </article>

                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="cssmenu">
                                        <ul>
                                            <li><a href="<?= ADDRESS ?>" title="หน้าหลัก">หน้าหลัก</a></li>
                                            <li class='active has-sub'><a href='<?= ADDRESS ?>product'>สินค้า <i class="fa fa-caret-down"></i></a>
                                                <ul>
                                                    <?php
                                                    $sql = "SELECT * FROM " . $category->getTbl() . " WHERE status = 'ใช้งาน' ORDER BY sort ASC";


                                                    $query = $db->Query($sql);


                                                    while ($row = $db->FetchArray($query)) {
                                                        ?>
                                                        <li class='has-sub'><a href='<?= ADDRESS ?>product/<?= $row['id'] ?>_<?= $row['category_name_ref'] ?>'><span><?= $row['category_name'] ?></span></a>
                                                        </li>


                                                    <?php }
                                                    ?>


                                                </ul>
                                            </li>
                                            <li><a href="<?= ADDRESS ?>order-pay" title="วิธีสั่งซื้อ">วิธีสั่งซื้อ</a></li>
                                            <li><a href="<?= ADDRESS ?>payment-confirm" title="แจ้งชำระเงิน">แจ้งชำระเงิน</a></li>
                                            <li><a href="<?= ADDRESS ?>contact-us" title="ติดต่อเรา">ติดต่อเรา</a></li>
                                        </ul>
                                    </div>
                                    <div id="content">
                                        <div class="contentleft">
                                            <?php
                                            if (PAGE_CONTROLLERS == '') {
                                                include 'controllers/home.php';
                                            } else if (PAGE_CONTROLLERS == 'product') {
                                                include 'controllers/product.php';
                                            } else if (PAGE_CONTROLLERS == 'order-pay') {
                                                include 'controllers/order-pay.php';
                                            } else if (PAGE_CONTROLLERS == 'payment-confirm') {
                                                include 'controllers/payment-confirm.php';
                                            } else if (PAGE_CONTROLLERS == 'contact-us') {
                                                include 'controllers/contact-us.php';
                                            } else if (PAGE_CONTROLLERS == 'cart') {
                                                include 'controllers/cart.php';
                                            } else if (PAGE_CONTROLLERS == 'verify') {
                                                include 'controllers/verify.php';
                                            } else if (PAGE_CONTROLLERS == 'shipping') {
                                                include 'controllers/shipping.php';
                                            } else if (PAGE_CONTROLLERS == 'success') {
                                                include 'controllers/success.php';
                                            }
                                            ?> 
                                        </div>
                                        <div class="contentright">
                                            <table width="188" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="<?= ADDRESS ?>images/box-right_01.jpg" width="188" height="18" /></td>
                                                </tr>
                                                <tr>
                                                    <td class="bgboxmiddle">
                                                        <p>
                                                            <div id="fb-root"></div>

                                                            <div class="fb-page" data-href="https://www.facebook.com/beautyscience.bykungking/" data-width="170" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/beautyscience.bykungking/"><a href="https://www.facebook.com/beautyscience.bykungking/">Beauty Science</a></blockquote></div></div>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?= ADDRESS ?>images/box-right_05.jpg"  width="188" height="18"/></td>
                                                </tr>
                                            </table><br />
                                            <table width="188" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="<?= ADDRESS ?>images/box-right_01.jpg" width="188" height="18" /></td>
                                                </tr>
                                                <tr>
                                                    <td class="bgboxmiddle">
                                                        <p><a href="http://track.thailandpost.co.th/tracking/default.aspx"><img src="<?= ADDRESS ?>images/banner5989.gif" width="160" height="100" /></a></p>
                                                        <p align="center"><a href=""><img src="<?= ADDRESS ?>images/iconf.jpg" /></a>&nbsp;&nbsp;&nbsp;<a href=""><img src="<?= ADDRESS ?>images/iconi.jpg" /></a>&nbsp;&nbsp;&nbsp;<a href=""><img src="<?= ADDRESS ?>images/iconl.jpg" /></a></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?= ADDRESS ?>images/box-right_05.jpg"  width="188" height="18"/></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div id="footer">
                                    <p>Copyright 2015 www.beauty-bykk.com.   All rights reserved.</p>
                                </div>
                                <style>
                                    .count-cart{
                                        font-weight: bold;
                                        position: absolute;
                                        letter-spacing: 3px;
                                        color: #57A742;
                                        top: 20px;
                                        left: 141px;
                                    }
                                </style>
                                <script>(function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id))
                                            return;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                <script>
                                    $(function () {
                                        var demo1 = $("#demo1").slippry({
                                            transition: 'fade',
                                            useCSS: true,
                                            speed: 1000,
                                            pause: 3000,
                                            auto: true,
                                            preload: 'visible'
                                        });

                                        $('.stop').click(function () {
                                            demo1.stopAuto();
                                        });

                                        $('.start').click(function () {
                                            demo1.startAuto();
                                        });

                                        $('.prev').click(function () {
                                            demo1.goToPrevSlide();
                                            return false;
                                        });
                                        $('.next').click(function () {
                                            demo1.goToNextSlide();
                                            return false;
                                        });
                                        $('.reset').click(function () {
                                            demo1.destroySlider();
                                            return false;
                                        });
                                        $('.reload').click(function () {
                                            demo1.reloadSlider();
                                            return false;
                                        });
                                        $('.init').click(function () {
                                            demo1 = $("#demo1").slippry();
                                            return false;
                                        });
                                    });
                                </script>
                            </body>
                            </html>

