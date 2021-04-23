<main class="catalogues">

    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner3']?>" alt="Đối tác" class="w_100">


        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
                    <li><a href="javascript:void(0)">Đối tác</a></li>
                </ul>
            </div>
        </div>

    </section>
    <div class="clearfix"></div>


    <?php if (isset($partner) && is_array($partner) && count($partner)) {?>
    <section class="section_doitac">
        <div class="container">
            <div class="row">
                <h1 class="title-home w_100 text-center">Đối tác của VTI</h1>
                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <div class="owl-doitact-page owl-carousel owl-theme">
                        <div class="item">
                            <?php $i=0; foreach ($partner as $k=>$v){ $i++;?>
                            <div class="col-md-2 col-sm-2 col-xs-6 col">
                                <a href="<?php echo $v['link']?>"><img src="<?php echo $v['src']?>" alt="<?php echo $v['title']?>"></a>
                            </div>
                            <?php if(count($partner) > 12){?><?php if($i % 12 == 0){?></div><div class="item"><?php }?><?php }?>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>
    <?php }?>


    <div class="clearfix"></div>

    <?php if (isset($doanhnghiep) && is_array($doanhnghiep) && count($doanhnghiep)) { ?>

        <?php if (isset($doanhnghiep['post']) && is_array($doanhnghiep['post']) && count($doanhnghiep['post'])) { ?>
            <?php if (svl_ismobile() != 'is mobile') { ?>
                <section class="section_4 wow fadeInUp hidden-xs">
                    <div class="container">
                        <div class="row row_dn">
                            <div class="col-sm-12">
                                <h2 class="title-home text-center w_100 visible-sm" style="margin-bottom: 40px"><a
                                            href="<?php echo $doanhnghiep['canonical'] ?>.html"
                                            style="color: #0573b1"><?php echo $doanhnghiep['title'] ?></a></h2>

                            </div>
                            <div class="col-md-2">
                                <ul class="elenco-articoli">
                                    <?php foreach ($doanhnghiep['post'] as $k => $v) { ?>
                                        <li><img src="<?php echo $v['image'] ?>" alt="<?php echo $v['title'] ?>"></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <h2 class="title-home title-dn hidden-xs"><a
                                            href="<?php echo $doanhnghiep['canonical'] ?>.html"
                                            style="color: #0573b1"><?php echo $doanhnghiep['title'] ?></a></h2>
                                <div class=" owl-doanhnghiep owl-carousel slide-cnt">
                                    <?php foreach ($doanhnghiep['post'] as $k => $v) { ?>
                                        <div class="item">
                                            <div class="flex_vti">
                                                <div class="col-md-390">
                                                    <img data-src="<?php echo $v['image'] ?>"
                                                         alt="<?php echo $v['title'] ?>"
                                                         class="i_dn_i owl-lazy">
                                                </div>
                                                <div class="col-md-390_">
                                                    <div class="box_doanhnghiep_des">
                                                        <div class="box_doanhnghiep_des_1">
                                                            <?php echo $v['content'] ?>
                                                        </div>
                                                        <div class="clearfix-30"></div>
                                                        <div class="info_box_doanhnghiep_des">
                                                            <div class="info_box_doanhnghiep_des_1 pull-left">
                                                                <h3><?php echo $v['title'] ?></h3>
                                                                <p><?php echo strip_tags($v['description']) ?></p>
                                                            </div>
                                                            <div class="info_box_doanhnghiep_des_2 pull-right">
                                                                <img class="owl-lazy"
                                                                     data-src="template/frontend/images/i-s.png"
                                                                     alt="đánh giá"
                                                                     style="width: auto">

                                                            </div>

                                                        </div>


                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    <?php } ?>

                                </div>


                            </div>


                        </div>

                    </div>

                </section>
            <?php } else { ?>

                <section class="section_4 wow fadeInUp visible-xs">
                    <div class="container">
                        <div class="row row_dn">

                            <div class="col-xs-12">
                                <h2 class="title-home title-home-dn"><a
                                            href="<?php echo $doanhnghiep['canonical'] ?>.html"
                                            style="color: #0573b1"><?php echo $doanhnghiep['title'] ?></a>
                                </h2>
                                <div class="clearfix-10"></div>
                                <div class=" owl-doanhnghiep owl-carousel slide-cnt">
                                    <?php foreach ($doanhnghiep['post'] as $k => $v) { ?>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <img data-src="<?php echo $v['image'] ?>"
                                                         alt="<?php echo $v['title'] ?>"
                                                         class="i_dn_i owl-lazy">
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="box_doanhnghiep_des">
                                                        <div class="box_doanhnghiep_des_1">
                                                            <?php echo $v['content'] ?>
                                                        </div>
                                                        <div class="clearfix-30"></div>
                                                        <div class="info_box_doanhnghiep_des">
                                                            <div class="info_box_doanhnghiep_des_1 pull-left">
                                                                <h3><?php echo $v['title'] ?></h3>
                                                                <p><?php echo strip_tags($v['description']) ?></p>
                                                            </div>
                                                            <div class="info_box_doanhnghiep_des_2 pull-right">
                                                                <img class="owl-lazy"
                                                                     data-src="template/frontend/images/i-s.png"
                                                                     alt="đánh giá"
                                                                     style="width: auto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php } ?>
    <?php } ?>



    <?php
    $tintucdn = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical',
        'table' => 'article_catalogue',
        'where' => array('isaside' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
    if (isset($tintucdn) && is_array($tintucdn) && count($tintucdn)) {
        $tintucdn['post'] = $this->Autoload_Model->_condition(array(
            'module' => 'article',
            'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`created`, `object`.`catalogueid`',
            'where' => '`object`.`publish_time` <= \'' . gmdate('Y-m-d H:i:s', time() + 7 * 3600) . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
            'catalogueid' => $tintucdn['id'],
            'limit' => 8,
            'order_by' => '`object`.`order` asc, `object`.`id` desc',
        ));
    }
    if (isset($tintucdn) && is_array($tintucdn) && count($tintucdn)) { ?>


        <?php if (isset($tintucdn['post']) && is_array($tintucdn['post']) && count($tintucdn['post'])) { ?>
            <section class="section_6 wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title-home w_100 text-center"><?php echo $tintucdn['title'] ?></h2>
                            <div class="clearfix-40 visible-lg visible-md visible-sm"></div>
                            <div class="clearfix-10 visible-xs"></div>
                            <div class="owl-tintuc owl-carousel owl-theme">
                                <?php foreach ($tintucdn['post'] as $keyC => $valC) {
                                    $hrefC = rewrite_url($valC['canonical'], true, true); ?>


                                    <div class="item">
                                        <div class="item_new_img">
                                            <a href="<?php echo $hrefC ?>"><img src="<?php echo $valC['image'] ?>"
                                                                                alt="<?php echo $valC['title'] ?>"></a>

                                        </div>
                                        <div class="item_new_info">
                                            <h3><a href="<?php echo $hrefC ?>"><?php echo $valC['title'] ?></a></h3>

                                            <div class="line-new"></div>
                                            <div class="clearfix"></div>
                                            <a href="<?php echo $hrefC ?>">
                                                <div class="date_new">
                                                    <p>Ngày đăng: <?php echo $valC['created'] ?></p>

                                                </div>
                                            </a>

                                        </div>

                                    </div>
                                <?php } ?>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        <?php } ?>

    <?php } ?>



    <style>
        .section_4 {
            background: #fafafa;
            padding-top: 100px;
        }

        @media (max-width: 767px) {
            .section_4 {
                padding-top: 20px;
            }

        }
    </style>

</main>
