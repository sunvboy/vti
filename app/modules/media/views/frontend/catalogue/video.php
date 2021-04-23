<main class="catalogues catalogues_khoahoc">

    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner9'] ?>" alt="banner video" class="w_100">
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
    <section class="section_2 wow fadeInUp" style="background: #fff">
        <div class="container">
            <div class="row">
                <h1 class="hidden"><?php echo $detailCatalogue['title']?></h1>
                <?php if (isset($mediaList) && is_array($mediaList) && count($mediaList)) { ?>
                    <?php foreach ($mediaList as $k => $v) { ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="item">
                                <div class="box_section_khoahoc">
                                    <div class="img_hover " style="position: relative">
                                        <a href="<?php echo $v['video_iframe']?>" data-fancybox><img class="w_100" style="height: 240px;object-fit: cover" src="<?php echo $v['image'] ?>" alt="<?php echo $v['title'] ?>"></a>
                                        <a href="<?php echo $v['video_iframe'] ?>" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%)"
                                           data-fancybox="gallery"><img
                                                    src="template/frontend/images/icon_video.png"
                                                    alt="icon video" class="i_ab_2"></a>
                                    </div>
                                    <div class="clearfix-20"></div>
                                    <h3 style="height: 38px"><a style="height: 38px" href="<?php echo $v['video_iframe']?>" data-fancybox><?php echo $v['title'] ?><?php echo $v['title'] ?></a></h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="w_100 text-center">
                        <div class="col-md-12">
                            <?php echo  (isset($PaginationList)) ? $PaginationList : ''; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <style>
        .catalogues_khoahoc .section_2 .item{
            margin-bottom: 30px;

        }
        .box_section_khoahoc h3{
            text-align: left;
        }
        .description_kh_ds p{
            margin-bottom: 0px;
        }
    </style>
</main>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
