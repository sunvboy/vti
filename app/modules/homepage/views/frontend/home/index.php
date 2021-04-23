<main>
    <?php if (isset($slide) && is_array($slide) && count($slide)) { ?>

        <section class="wow fadeInUp">
            <div id="slider-home" class="owl-carousel owl-theme">

                <?php foreach ($slide as $key => $val) { ?>
                    <div class="item">
                        <a href="#mailsubricre">
                            <img src="<?php echo $val['src'] ?>" alt="slider trang chủ" class="w_100">
                        </a>
                        <?php if ($val['title'] != '' || $val['description'] != '') { ?>

                            <div class="sub_slide_home">
                                <p><?php echo $val['title'] ?></p>
                                <h2><?php echo $val['description'] ?></h2>
                                <a href="#mailsubricre" class="btn btn-primary">Tìm hiểu thêm</a>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>

            </div>
        </section>
    <?php } ?>

    <div class="clearfix"></div>
    <section class="section_1 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo $this->fcSystem['lydo_i'] ?>" alt="lý do lựa chọn chúng tôi" class="w_100">

                    <div class="clearfix"></div>
                    <div class="box_section_1">
                        <a href="<?php echo $this->fcSystem['lydo_l_2'] ?>"><?php echo $this->fcSystem['lydo_i_2'] ?></a>

                    </div>
                    <div class="clearfix"></div>

                    <?php if (isset($page_thanhtich) && is_array($page_thanhtich) && count($page_thanhtich)) {
                        $list = json_decode($page_thanhtich['page_1'], TRUE);
                        if (isset($list) && is_array($list) && count($list)) { ?>
                            <div class="box_section_2 flex_vti">

                                <?php foreach ($list as $k => $v) { ?>
                                    <div class="col-1">
                                        <div class="box_section_2_1"><?php echo $v['title'] ?></div>
                                        <div class="clearfix"></div>
                                        <div class="box_section_2_2"><?php echo $v['description'] ?></div>
                                    </div>
                                <?php } ?>


                            </div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <?php if (isset($chuongtrinhdaotao) && is_array($chuongtrinhdaotao) && count($chuongtrinhdaotao)) { ?>
        <?php if (isset($chuongtrinhdaotao['post']) && is_array($chuongtrinhdaotao['post']) && count($chuongtrinhdaotao['post'])) { ?>
            <section class="section_2 wow fadeInUp">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <h2 class="title-home w_100 text-center"><a style="color: #0573b1"
                                                                        href="<?php echo $chuongtrinhdaotao['canonical'] ?>.html"><?php echo $chuongtrinhdaotao['title'] ?></a>
                            </h2>
                            <div class="clearfix-30 visible-md visible-sm visible-lg"></div>
                            <div class="clearfix-10 visible-xs"></div>
                            <div class="owl-chuongtrinhdaotao owl-theme owl-carousel">
                                <?php foreach ($chuongtrinhdaotao['post'] as $k => $v) { ?>
                                    <div class="item">
                                        <div class="box_section_khoahoc">
                                            <a href="<?php echo $v['canonical'] ?>.html"><img class="w_100 owl-lazy"
                                                                                              data-src="<?php echo $v['image'] ?>"
                                                                                              alt="<?php echo $v['title'] ?>"></a>
                                            <div class="clearfix-20"></div>
                                            <h3>
                                                <a href="<?php echo $v['canonical'] ?>.html"><?php echo $v['title'] ?></a>
                                            </h3>

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
    <div class="clearfix"></div>
    <?php if (isset($giaovien) && is_array($giaovien) && count($giaovien)) { ?>
        <?php if (isset($giaovien['post']) && is_array($giaovien['post']) && count($giaovien['post'])) { ?>
            <section class="section_3 wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="w_100 text-center">
                                <h2 class="title-home w_100 text-center" style="color: #fff"><a style="color: #fff"
                                                                                                href="<?php echo $giaovien['canonical'] ?>.html"><?php echo $giaovien['title'] ?></a>
                                </h2>
                                <div class="clearfix-15"></div>
                                <div class="des_section_3"
                                     style="color: #fff"><?php echo strip_tags($giaovien['description']) ?>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="owl-giaovien owl-carousel owl-theme">
                                <?php foreach ($giaovien['post'] as $k => $v) {
                                    $list_page_2 = json_decode($v['page_2'], TRUE); ?>
                                    <div class="item">
                                        <div class="box_section_giaovien">
                                            <a href="javascript:void(0)"><img class="w_100 owl-lazy"
                                                                              data-src="<?php echo $v['image'] ?>"
                                                                              alt="<?php echo $v['title'] ?>"></a>
                                            <div class="clearfix-10"></div>
                                            <div class="w_100 pull-left" style="height: 68px">
                                                <div class="box_gv_show ">
                                                    <h3><a href="javascript:void(0)"><?php echo $v['title'] ?></a></h3>
                                                    <div class="des_box_giaovien"><?php echo strip_tags($v['description']) ?></div>
                                                    <div class="clearfix"></div>
                                                    <div class="more_box_gv w_100 pull-left"><a href=""></a></div>
                                                </div>
                                            </div>
                                            <div class="box_gv_hidden">
                                                <h3><a href="javascript:void(0)"><?php echo $v['title'] ?></a></h3>
                                                <div class="des_box_giaovien"><?php echo strip_tags($v['description']) ?></div>
                                                <div class="clearfix-10"></div>
                                                <?php if (isset($list_page_2) && is_array($list_page_2) && count($list_page_2)) { ?>
                                                    <ul>
                                                        <?php foreach ($list_page_2 as $k2 => $v2) { ?>

                                                            <li>
                                                                <?php echo $v2['description'] ?>
                                                            </li>
                                                        <?php } ?>

                                                    </ul>
                                                    <div class="clearfix-10"></div>
                                                <?php } ?>
                                                <div class="more_box_gv_hidden">
                                                    <a href="<?php echo $v['facebook'] ?>" class="btn"
                                                       target="_blank"><i class="fa fa-facebook"></i></a>
                                                    <a href="<?php echo $v['twitter'] ?>" class="btn" target="_blank"><i
                                                                class="fa fa-twitter"></i></a>
                                                    <a href="<?php echo $v['instagram'] ?>" class="btn" target=""><i
                                                                class="fa fa-instagram"></i></a>
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

    <div class="clearfix"></div>
    <?php if (isset($doanhnghiep) && is_array($doanhnghiep) && count($doanhnghiep)) { ?>

        <?php if (isset($doanhnghiep['post']) && is_array($doanhnghiep['post']) && count($doanhnghiep['post'])) { ?>
            <?php if (svl_ismobile() != 'is mobile') { ?>
                <section class="section_4 wow fadeInUp hidden-xs">
                    <div class="container">
                        <div class="row row_dn">
                            <div class="col-sm-12">
                                <h2 class="title-home text-center w_100 visible-sm" style="margin-bottom: 40px"><a
                                            href="doi-tac.html"
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
                                            href="doi-tac.html"
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
                                <a href="doi-tac.html" class="more_dn"><img src="template/frontend/images/more_doitac.png" alt=""></a>

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
                                            href="doi-tac.html"
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
                                <a href="doi-tac.html" class="more_dn"><img
                                            src="template/frontend/images/more_doitac.png" alt="xem thêm"></a>

                            </div>


                        </div>

                    </div>

                </section>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <div class="clearfix"></div>



    <?php echo $this->load->view('homepage/frontend/common/hocvien'); ?>

    <div class="clearfix"></div>


    <?php echo $this->load->view('homepage/frontend/common/tintuc'); ?>

</main>
