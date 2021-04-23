<header>
    <div class="top_header hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-xs-12 col-sm-9">
                    <ul class="contact_ul_header">
                        <?php

                        $listSupport = $this->Autoload_Model->_get_where(array(

                            'select' => ' fullname, zalo',

                            'table' => 'support',

                            'where' => array('publish' => 0),

                            'order_by' => 'order asc',

                        ), TRUE);

                        ?>
                        <?php if (isset($listSupport) && count($listSupport) && is_array($listSupport)) { ?>

                        <?php foreach ($listSupport as $k => $v) { ?>
                        <li><a href="tel:<?php echo $v['zalo']?>"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp<?php echo $v['fullname']?>: <span><?php echo $v['zalo']?></span></a> </li>

                            <?php } ?>

                        <?php } ?>
                        <li><a href="mailto:<?php echo $this->fcSystem['contact_email']?>"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;<?php echo $this->fcSystem['contact_email']?></a> </li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-3">
                    <ul class="social_ul_header">
                        <li><a href="<?php echo $this->fcSystem['social_facebook']?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                        <li><a href="<?php echo $this->fcSystem['social_twitter']?>" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                        <li><a href="<?php echo $this->fcSystem['social_instagram']?>" target="_blank"><i class="fa fa-instagram"></i></a> </li>
                        <li><a href="<?php echo $this->fcSystem['social_google_plus']?>" target="_blank"><i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="<?php echo $this->fcSystem['social_youtube']?>" target="_blank"><i class="fa fa-youtube"></i></a> </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="bottom_header">
        <div class="container">
            <div class="row flex">
                <div class="col-md-2 col-xs-6 col-sm-3">
                    <div class="logo-web">
                        <a href="<?php echo base_url()?>"><img src="<?php echo $this->fcSystem['homepage_logo']?>" alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-10 col-xs-6 col-sm-9">
                    <div class="menu-pc hidden-xs hidden-sm">
                        <ul>
                            <?php $main_nav = navigation(array('keyword' => 'main', 'output' => 'array'), $this->fc_lang); ?>

                            <?php if (isset($main_nav) && is_array($main_nav) && count($main_nav)) { ?>

                                <?php foreach ($main_nav as $key => $val) { ?>

                                    <li class="menu-pc-vti"><a href="<?php echo base_url($val['link']); ?>"><?php echo $val['title']; ?></a>

                                        <?php if (isset($val['children']) && is_array($val['children']) && count($val['children'])) { ?>



                                            <ul class="submenu">



                                                <?php foreach ($val['children'] as $keyItem => $valItem) { ?>



                                                    <li>



                                                        <a href="<?php echo $valItem['link'] ?>"><?php echo $valItem['title'] ?></a>



                                                    </li>



                                                <?php } ?>



                                            </ul>



                                        <?php } ?>



                                    </li>

                                <?php } ?>

                            <?php } ?>

                            <li>
                                <a href="javascript:void(0)" class="click-search">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="nav-search " style="display: none">
                            <form method="get" action="tim-kiem.html">
                                <div style="position: relative">
                                    <input placeholder="Nhập từ khóa cần tìm kiếm" name="keyword" class="form-control">
                                    <button type="submit" style="position: absolute;right: 5px;top: 50%;transform: translateY(-50%);border: 0px;background: transparent"><i class="fa fa-search"></i></button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- begin mobile -->
                    <div class="wrapper cf visible-xs visible-sm">
                        <nav id="main-nav">
                            <style>
                                #main-nav{
                                    display: none;
                                }
                            </style>
                            <ul class="second-nav">
                                <?php if (isset($main_nav) && is_array($main_nav) && count($main_nav)) { ?>

                                    <?php foreach ($main_nav as $key => $val) { ?>

                                        <li><a href="<?php echo $val['link']; ?>"><?php echo $val['title']; ?></a>

                                            <?php if (isset($val['children']) && is_array($val['children']) && count($val['children'])) { ?>



                                                <ul class="submenu">



                                                    <?php foreach ($val['children'] as $keyItem => $valItem) { ?>



                                                        <li>



                                                            <a href="<?php echo $valItem['link'] ?>"><?php echo $valItem['title'] ?></a>



                                                        </li>



                                                    <?php } ?>



                                                </ul>



                                            <?php } ?>



                                        </li>

                                    <?php } ?>

                                <?php } ?>


                            </ul>
                        </nav>
                        <a class="toggle">
                            <span></span>
                        </a>
                        <div class="searchMobile">
                            <a href="javascript:void(0)" class="click-search"><i class="fa fa-search"></i></a>
                        </div>
                        <div class="nav-search" style="display: none">
                            <form method="get" action="tim-kiem.html">

                                <div style="position: relative">

                                    <input name="keyword" placeholder="Tìm kiếm" class="form-control">

                                    <button type="submit" style="position: absolute;right: 5px;top: 50%;transform: translateY(-50%);border: 0px;background: transparent"><i class="fa fa-search"></i></button>



                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>