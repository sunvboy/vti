<main class="catalogues">



    <section class="banner-catalogues">



        <img src="<?php echo $this->fcSystem['banner_banner1']?>" alt="<?php echo $detailCatalogue['title'] ?>" class="w_100">



        <div class="info-banner-home">

            <h2 class="title-catalogues"><?php echo $detailCatalogue['title'] ?></h2>

            <ul class="breadcrumb">

                <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>

                <?php foreach ($breadcrumb as $key => $val) { ?>

                    <?php

                    $title = $val['title'];

                    $href = rewrite_url($val['canonical'], true, true);

                    ?>

                    <li class="<?php if ($key == count($breadcrumb) - 1) echo 'uk-active'; ?>"><a

                                href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>

                    </li>

                <?php } ?>

            </ul>



        </div>



    </section>





    <div class="clearfix"></div>



    <section class="ab_1">

        <div class="container">

            <div class="row">



                <?php if (svl_ismobile() != 'is mobile') { ?>

                    <?php echo $this->load->view('homepage/frontend/common/gioithieu_aside') ?>

                    <div class="visible-xs clearfix-30"></div>

                <?php } ?>

                <div class="col-md-9 col-sm-8 col-xs-12">

                    <div class="box_thongdiep">



                        <h1><?php echo $detailArticle['title'] ?></h1>

                        <div class="detail-content">

                            <?php echo $detailArticle['description'] ?>

                        </div>

                        <?php if ($detailArticle['id'] == 24) { ?>

                            <?php

                            $gv = $this->Autoload_Model->_get_where(array(

                                'select' => 'id, title',

                                'table' => 'page_catalogue',

                                'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));

                            if (isset($gv) && is_array($gv) && count($gv)) {

                                $gv['post'] = $this->Autoload_Model->_condition(array(

                                    'module' => 'page',

                                    'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`description`, `object`.`content`',

                                    'where' => '`object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',

                                    'catalogueid' => $gv['id'],

                                    'limit' => 1000,

                                    'order_by' => '`object`.`order` asc, `object`.`id` asc',

                                ));

                            }

                            ?>

                            <?php

                            if (isset($gv) && is_array($gv) && count($gv)) {

                                if (isset($gv['post']) && is_array($gv['post']) && count($gv['post'])) {

                                    ?>

                                    <div class="clearfix-30"></div>

                                    <h2><?php echo $gv['title'] ?></h2>

                                    <div class="row">



                                        <?php foreach ($gv['post'] as $k => $v) { ?>

                                            <div class="col-md-4 col-sm-6 col-xs-12">

                                                <div class="box_s_5">

                                                    <div class="info_s_5">

                                                        <a data-toggle="modal" href="#myModal<?php echo $v['id'] ?>">

                                                            <img src="<?php echo $v['image'] ?>"

                                                                 alt="<?php echo $v['title'] ?>" class="w_100">

                                                            <h5><?php echo $v['title'] ?></h5>

                                                            <p><?php echo strip_tags($v['description']) ?></p>

                                                        </a>



                                                    </div>



                                                </div>



                                            </div>

                                            <!-- Modal -->

                                            <div class="modal fade" id="myModal<?php echo $v['id'] ?>" role="dialog">

                                                <div class="modal-dialog">



                                                    <!-- Modal content-->

                                                    <div class="modal-content">

                                                        <div class="modal-header" style="text-transform: uppercase">

                                                            <button type="button" class="close" data-dismiss="modal">

                                                                &times;

                                                            </button>

                                                            <h4 style="color:red;"><?php echo $v['title'] ?> / <span

                                                                        style="color: #000"><?php echo strip_tags($v['description']) ?></span>

                                                            </h4>

                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="col-md-3 col-xs-12 col-sm-3">

                                                                <img src="<?php echo $v['image'] ?>"

                                                                     alt="<?php echo $v['title'] ?>" class="w_100">

                                                            </div>

                                                            <div class="clearfix-30 visible-xs"></div>

                                                            <div class="col-md-9 col-xs-12 col-sm-9">



                                                                <?php echo $v['content'] ?>



                                                            </div>

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                        <?php } ?>

                                    </div>

                                <?php } ?>

                            <?php } ?>

                            <style>

                                .modal-content {

                                    float: left;

                                    width: 100%;

                                }



                                .box_s_5 {

                                    background: url(template/frontend/images/ho-so-gv.png) no-repeat;

                                    position: relative;

                                    width: 100%;

                                    background-size: 100% 100%;

                                    text-align: center;

                                }



                                .info_s_5 {

                                    padding: 50px;

                                }



                                .box_s_5 img {

                                    height: 162px;

                                    object-fit: cover;

                                    border-radius: 100%;

                                    width: 162px;

                                }



                                @media (min-width: 768px) {

                                    .modal-dialog {

                                        width: 90%;

                                        margin: 30px auto;

                                    }



                                }



                                .modal-content {

                                    border-radius: 0px;

                                    padding-bottom: 50px;

                                }



                            </style>





                        <?php } ?>



                        <?php if ($detailArticle['id'] == 23) {

                            $doitactuyendung = slide(array('keyword' => 'doi-tac-tuyen-dung'), $this->fc_lang);

                            ?>

                            <?php if (is_array($doitactuyendung) && count($doitactuyendung) && isset($doitactuyendung)) { ?>

                                <div class="clearfix-30"></div>



                                <div class="row">






                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="box_doitac_tuyendung">





                                            <?php foreach ($doitactuyendung as $k => $v) { ?>

                                                <div class="item">

                                                    <a href="<?php echo $v['link'] ?>">

                                                        <img src="<?php echo $v['src'] ?>"

                                                             alt="<?php echo $v['title'] ?>"

                                                             class="w_100">

                                                    </a>

                                                </div>

                                            <?php } ?>





                                        </div>

                                    </div>






                                </div>

                            <?php } ?>

                        <?php } ?>



                        <?php if ($detailArticle['id'] == 26) { ?>

                            <?php

                            $thongdiep = $this->Autoload_Model->_get_where(array(

                                'select' => 'id, title',

                                'table' => 'page_catalogue',

                                'where' => array('highlight' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));

                            if (isset($thongdiep) && is_array($thongdiep) && count($thongdiep)) {

                                $thongdiep['post'] = $this->Autoload_Model->_condition(array(

                                    'module' => 'page',

                                    'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`description`, `object`.`content`',

                                    'where' => '`object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',

                                    'catalogueid' => $thongdiep['id'],

                                    'order_by' => '`object`.`order` asc, `object`.`id` asc',

                                ));

                            }

                            ?>

                            <?php if (isset($thongdiep) && is_array($thongdiep) && count($thongdiep)) { ?>

                                <?php if (isset($thongdiep['post']) && is_array($thongdiep['post']) && count($thongdiep['post'])) { ?>

                                    <div class="row">





                                        <?php $i = 0;

                                        foreach ($thongdiep['post'] as $k => $v) {

                                            $i++; ?>



                                            <?php if (svl_ismobile() != 'is mobile') { ?>

                                                <?php if ($i % 2 == 0) { ?>

                                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                                        <div class="detail-content">



                                                            <?php echo $v['content'] ?>





                                                        </div>

                                                    </div>

                                                    <div class="col-md-4 col-sm-4 col-xs-12">

                                                        <img src="<?php echo $v['image'] ?>" class="w_100"

                                                             alt="<?php echo $v['title'] ?>">

                                                        <div class="clearfix-20"></div>

                                                        <div class="b_box_thongdiep">

                                                            <h3> <?php echo $v['title'] ?></h3>

                                                            <p> <?php echo $v['description'] ?></p>



                                                        </div>

                                                    </div>

                                                <?php } else { ?>

                                                    <div class="col-md-4 col-sm-4 col-xs-12">

                                                        <img src="<?php echo $v['image'] ?>" class="w_100"

                                                             alt="<?php echo $v['title'] ?>">

                                                        <div class="clearfix-20"></div>

                                                        <div class="b_box_thongdiep">

                                                            <h3> <?php echo $v['title'] ?></h3>

                                                            <p> <?php echo $v['description'] ?></p>



                                                        </div>

                                                    </div>

                                                    <div class="col-md-8 col-sm-8 col-xs-12">



                                                        <div class="detail-content">

                                                            <?php echo $v['content'] ?>





                                                        </div>

                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div class="col-md-12">

                                                        <hr>

                                                    </div>





                                                <?php } ?>

                                            <?php } else { ?>

                                                <div class="col-md-4 col-sm-4 col-xs-12">

                                                    <img src="<?php echo $v['image'] ?>" class="w_100"

                                                         alt="<?php echo $v['title'] ?>">

                                                    <div class="clearfix-20"></div>

                                                    <div class="b_box_thongdiep">

                                                        <h3> <?php echo $v['title'] ?></h3>

                                                        <p> <?php echo $v['description'] ?></p>



                                                    </div>

                                                </div>

                                                <div class="col-md-8 col-sm-8 col-xs-12">



                                                    <div class="detail-content">

                                                        <?php echo $v['content'] ?>





                                                    </div>

                                                </div>

                                                <div class="clearfix"></div>

                                                <div class="col-md-12">

                                                    <hr>

                                                </div>





                                            <?php } ?>

                                        <?php } ?>





                                    </div>

                                <?php } ?>

                            <?php } ?>

                        <?php } ?>



                    </div>





                </div>

                <?php if (svl_ismobile() == 'is mobile') { ?>

                    <div class="visible-xs clearfix"></div>

                    <?php echo $this->load->view('homepage/frontend/common/gioithieu_aside') ?>

                <?php } ?>

            </div>

        </div>

    </section>





</main>

