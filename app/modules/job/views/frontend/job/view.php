<main class="catalogues catalogues_khoahoc_nmbd" style="padding-bottom: 20px">

    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner7'] ?>" alt="Blog"
             class="w_100">
        <?php /*<div class="info-banner-home">
            <div class="sub_slide_home">
                <p>VTI EDUCATION</p>
                <h2>Chuyên nghiệp - tin cậy - tốc độ</h2>

            </div>

        </div>*/ ?>

        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
                    <?php foreach ($breadcrumb as $key => $val) { ?>
                        <?php
                        $title = $val['title'];
                        $href = rewrite_url($val['canonical'], true, true);
                        ?>
                        <li class="<?php if ($key == count($breadcrumb) - 1) echo 'uk-active'; ?>"><a
                                    href="<?php echo $href; ?>"
                                    title="<?php echo $title; ?>"><?php echo strip_tags($title); ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </section>
    <div class="clearfix"></div>

    <?php
    $list = json_decode($detailArticle['page_1'], TRUE);
    ?>
    <?php if (isset($list) && is_array($list) && count($list)) { ?>
        <section class="l_1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h2 class="title-home text-center w_100"><?php echo $this->fcSystem['t_t_1']?></h2>
                        <div class="clearfix"></div>
                        <div class="l_1_1 ">
                            <ul>
                                <?php foreach ($list as $k => $v) { ?>
                                    <li>
                                        <span>0<?php echo $k+1?></span>
                                        <p><?php echo $v['description'] ?></p>

                                    </li>
                                <?php } ?>
                            </ul>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    <?php } ?>
    <div class="clearfix"></div>
    <section class="l_2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-5">
                    <h2 class="title-home" style="color: #1c3367"><?php echo $this->fcSystem['t_t_2']?></h2>

                </div>
                <div class="col-md-9 col-xs-12 col-sm-7">
                    <div class="l_2_1">

                        <?php echo $detailArticle['gioithieuvechuongtrinh'] ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="l_3" style="background: url(<?php echo $detailArticle['khungchuongtrinh_b'] ?>);background-size: cover">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 w_100 text-center">
                    <h2 class="title-home title_l_3" style="color: #fff"><?php echo $this->fcSystem['t_t_3']?></h2>

                    <div class="l_3_1">
                        <a href="<?php echo $detailArticle['khungchuongtrinh'] ?>" data-fancybox="gallery"><img src="<?php echo $detailArticle['khungchuongtrinh'] ?>" alt="khung chương trình" class="w_100"></a>
                    </div>
                </div>
                <link rel="stylesheet"
                      href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
                <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
            </div>
        </div>
    </section>
</main>
