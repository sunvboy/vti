<main class="catalogues catalogues_aboutus">
    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner6'] ?>" alt="về chúng tôi" class="w_100">
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
                    <li><a href="javascript:void(0)">Về chúng tôi</a></li>
                </ul>
            </div>
        </div>

    </section>
    <div class="clearfix"></div>
    <section class="ab_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="w_100 text-center">
                        <h1 class="title_page_aboutus"
                            style="background: url(<?php echo $this->fcSystem['a_i'] ?>) no-repeat;background-size: 100%;"><?php echo $this->fcSystem['a_i_2'] ?>
                            <br>
                            <p><?php echo $this->fcSystem['a_i_3'] ?></p></h1>
                    </div>

                    <div class="clearfix"></div>
                    <div class="box_catalogues_aboutus_d">
                        <?php echo $this->fcSystem['a_i_4'] ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="main-chitietkhoahoc-3">

        <div class="container">

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">


                    <div class="clearfix"></div>


                    <div class="box-noidungkhoahoc">


                        <?php if (isset($vechungtoi) && is_array($vechungtoi) && count($vechungtoi)) { ?>
                            <?php $i = 0;
                            foreach ($vechungtoi as $k => $v) {
                                $i++; ?>
                                <?php if ($i % 2 == 0) { ?>
                                    <div class="item-noidungkhoahoc">

                                        <div class="row">
                                            <div class="col-md-7 col-xs-12 col-sm-8">

                                                <div class="bandanggapvande widthC"
                                                     style="text-align: right;padding-left: 0px;padding-right: 20px">

                                                    <div class="bandanggapvande-1 ">

                                                        <h2><?php echo $v['title']?></h2>


                                                        <div class="bandanggapvande-2 banmuon right">


                                                            <p><?php echo $v['description']?></p>


                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="stt-item-noidungkhoahoc"><span><?php echo $i?></span></div>


                                            </div>


                                            <div class="clearfix-20 visible-xs"></div>


                                            <div class="col-md-5 col-xs-12 col-sm-4">

                                                <img src="<?php echo $v['src']?>" alt="<?php echo $v['title']?>">


                                            </div>

                                        </div>


                                    </div>

                                <?php } else { ?>
                                    <div class="item-noidungkhoahoc">

                                        <div class="row">


                                            <div class="col-md-5 col-xs-12 col-sm-4">

                                                <img src="<?php echo $v['src']?>"
                                                     alt="<?php echo $v['title']?>">


                                            </div>

                                            <div class="clearfix-20 visible-xs"></div>

                                            <div class="col-md-7 col-xs-12 col-sm-8">

                                                <div class="stt-item-noidungkhoahoc"><span><?php echo $i?></span></div>

                                                <div class="bandanggapvande widthC">

                                                    <div class="bandanggapvande-1 ">

                                                        <h2><?php echo $v['title']?></h2>


                                                        <div class="bandanggapvande-2 banmuon ">


                                                            <p><?php echo $v['description']?></p>


                                                        </div>


                                                    </div>

                                                </div>


                                            </div>


                                        </div>


                                    </div>

                                <?php } ?>


                            <?php } ?>
                        <?php } ?>


                    </div>

                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <section class="a_2">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="a_2_1">
                        <?php echo $this->fcSystem['a_i_5']?>
                    </div>


                </div>
                <div class="clearfix-10 visible-xs"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="a_2_2">

                        <a href="<?php echo $this->fcSystem['a_i_7']?>" data-fancybox="gallery">

                            <img src="<?php echo $this->fcSystem['a_i_6']?>" alt="ảnh giới thiệu" class="w_100" style="height: 300px;
    object-fit: cover;">
                        </a>

                        <a href="<?php echo $this->fcSystem['a_i_7']?>" data-fancybox="gallery"><img
                                    src="template/frontend/images/icon_video.png" alt="icon video" class="i_ab_2"></a>



                    </div>


                </div>
            </div>
            <link rel="stylesheet"
                  href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
            <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        </div>
    </section>


</main>
