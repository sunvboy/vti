<main class="catalogues catalogues_khoahoc_nmbd" style="padding-bottom: 20px">

    <section class="banner-catalogues">
        <img src="<?php echo $detailArticle['banner'] ?>" alt="<?php echo $detailArticle['title'] ?>"
             class="w_100">
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
                    <li><a href="javascript:void(0)"><?php echo $detailArticle['title'] ?></a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="s_nm_1">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12 col-sm-7">
                    <div class="s_nm_1_1">
                        <?php echo $detailArticle['description'] ?>
                    </div>

                </div>
                <div class="col-md-5 col-xs-12 col-sm-5">
                    <div class="s_nm_1_2">
                        <img src="<?php echo $detailArticle['image'] ?>" alt="<?php echo $detailArticle['title'] ?>"
                             style="    border: 1px solid #dddddd;
    padding: 15px;
    border-radius: 100%;width: 326px;height: 326px;object-fit: cover">


                    </div>

                </div>

            </div>

        </div>

    </section>
    <div class="clearfix"></div>
    <div class="clearfix"></div>

    <section class="s_nm_2">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-xs-12 col-sm-12 w_100 text-center">
                    <h2 class="title-home title_s_nm_2"><?php echo $detailArticle['b_1'] ?></h2>
                    <div class="s_nm_2_1"><?php echo $detailArticle['b_2'] ?></div>

                </div>
                <div class="clearfix"></div>
                <div class="s_nm_2_2">
                    <?php $list = json_decode($detailArticle['b_3'], TRUE); ?>
                    <?php foreach ($list as $k => $v) { ?>
                        <div class="col-md-4 col-xs-12 col-sm-4 text-center">
                            <div class="item">
                                <img src="<?php echo $v['images'] ?>" alt="<?php echo $v['title'] ?>">
                                <h3><?php echo $v['title'] ?></h3>
                                <div class="item_description_k"><?php echo strip_tags($v['description']) ?></div>


                            </div>


                        </div>
                    <?php } ?>


                </div>

            </div>

        </div>

    </section>
    <div class="clearfix"></div>
    <section class="s_nm_3">
        <div class="container">
            <div class="row">

                <div class="col-md-5 col-xs-12 col-sm-5">
                    <div class="s_nm_3_1">
                        <div class="s_nm_3_1_1"></div>
                        <div class="s_nm_3_1_3"></div>
                        <div class="s_nm_3_1_2">
                            <img src="<?php echo $detailArticle['c_2'] ?>" alt="<?php echo $detailArticle['c_1'] ?>"
                                 style="height: 320px;object-fit: cover">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12 col-sm-7">
                    <h2 class="title_s_nm_2 title-home"
                        style="color: #fff;font-size: 34px"><?php echo $detailArticle['c_1'] ?></h2>
                    <div class="s_nm_3_2">
                        <?php echo $detailArticle['c_3'] ?>
                    </div>


                </div>
            </div>

        </div>

    </section>
    <div class="clearfix"></div>

    <?php
    $listvideo = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical,description',
        'table' => 'media_catalogue',
        'where' => array('id' => $detailArticle['catalogueid'], 'publish' => 0, 'alanguage' => $this->fc_lang)));
    if (isset($listvideo) && is_array($listvideo) && count($listvideo)) {
        $listvideo['post'] = $this->Autoload_Model->_condition(array(
            'module' => 'media',
            'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`video_iframe`',
            'where' => ' `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
            'catalogueid' => $listvideo['id'],
            'limit' => 5,
            'order_by' => '`object`.`order` asc, `object`.`id` desc',
        ));
    }
    if (isset($listvideo) && is_array($listvideo) && count($listvideo)) {
        if (isset($listvideo['post']) && is_array($listvideo['post']) && count($listvideo['post'])) {
            ?>
            <section class="s_nm_4">
                <div class="container">
                    <div class="row">


                        <div class="col-md-12 col-xs-12 col-sm-12 ">
                            <div class="w_100 text-center">
                                <h2 class="title-home title_s_nm_3"><?php echo $listvideo['title'] ?></h2>
                                <div class="s_nm_4_1"><?php echo strip_tags($listvideo['description']) ?></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="s_nm_4_2 row">

                                <?php if (svl_ismobile() == 'is mobile') { ?>
                                    <div class="col-md-3 col-sm-3 col-xs-12">

                                        <div class="s_nm_4_2_2">

                                            <?php foreach ($listvideo['post'] as $k => $v) { ?>

                                                <div class="item w_100">
                                                    <div class="a_2_2">
                                                        <a href="<?php echo $v['video_iframe'] ?>"
                                                           data-fancybox="gallery">

                                                            <img src="<?php echo $v['image'] ?>"
                                                                 alt="<?php echo $v['title'] ?>"
                                                                 class="w_100">
                                                        </a>
                                                        <a href="<?php echo $v['video_iframe'] ?>"
                                                           data-fancybox="gallery"><img
                                                                    src="template/frontend/images/icon_video.png"
                                                                    alt="icon video" class="i_ab_2"></a>


                                                    </div>
                                                </div>

                                            <?php } ?>

                                        </div>


                                    </div>
                                <?php } else { ?>
                                    <?php foreach ($listvideo['post'] as $k => $v) {
                                        if ($k == 0) { ?>
                                            <div class="col-md-9 col-sm-9 col-xs-12 hidden-xs">

                                                <div class="s_nm_4_2_1">
                                                    <div class="a_2_2">
                                                        <a href="<?php echo $v['video_iframe'] ?>"
                                                           data-fancybox="gallery">

                                                            <img src="<?php echo $v['image'] ?>"
                                                                 alt="<?php echo $v['title'] ?>"
                                                                 class="w_100">
                                                        </a>
                                                        <a href="<?php echo $v['video_iframe'] ?>"
                                                           data-fancybox="gallery"><img
                                                                    src="template/frontend/images/icon_video.png"
                                                                    alt="icon video" class="i_ab_2"></a>


                                                    </div>
                                                </div>


                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="col-md-3 col-sm-3 col-xs-12">

                                        <div class="s_nm_4_2_2">

                                            <?php foreach ($listvideo['post'] as $k => $v) {
                                                if ($k > 0) { ?>

                                                    <div class="item w_100">
                                                        <div class="a_2_2">
                                                            <a href="<?php echo $v['video_iframe'] ?>"
                                                               data-fancybox="gallery">

                                                                <img src="<?php echo $v['image'] ?>"
                                                                     alt="<?php echo $v['title'] ?>"
                                                                     class="w_100">
                                                            </a>
                                                            <a href="<?php echo $v['video_iframe'] ?>"
                                                               data-fancybox="gallery"><img
                                                                        src="template/frontend/images/icon_video.png"
                                                                        alt="icon video" class="i_ab_2"></a>


                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            <?php } ?>

                                        </div>


                                    </div>
                                <?php } ?>


                            </div>
                            <div class="clearfix"></div>
                            <div class="more_sanphamhovien w_100 text-center">
                                <a href="<?php echo $listvideo['canonical'] ?>.html"><img
                                            src="template/frontend/images/more_sanphamhocvien.png"
                                            alt="xem thêm sản phẩm của học viên"></a>
                            </div>
                        </div>

                    </div>

                </div>

            </section>
        <?php } ?>
    <?php } ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <?php echo $this->load->view('homepage/frontend/common/hocvien'); ?>


</main>
