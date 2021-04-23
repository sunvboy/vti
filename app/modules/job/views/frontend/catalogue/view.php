<main class="catalogues catalogues_khoahoc">

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


    <section class="section_2 wow fadeInUp" style="background: #fff">
        <div class="container">
            <div class="row">
                <h1 class="hidden"><?php echo $detailCatalogue['title']?></h1>
                <?php if (isset($articleList) && is_array($articleList) && count($articleList)) { ?>
                <?php foreach ($articleList as $k => $v) { ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="item">
                            <div class="box_section_khoahoc">
                                <div class="img_hover">
                                    <a href="<?php echo $v['canonical'] ?>.html"><img class="w_100 " src="<?php echo $v['image'] ?>" alt="<?php echo $v['title'] ?>"></a>

                                </div>
                                <div class="clearfix-20"></div>
                                <h3 style="height: 38px"><a style="height: 38px" href="<?php echo $v['canonical'] ?>.html"><?php echo $v['title'] ?></a></h3>
                                <div class="clearfix-5"></div>
                                <div class="description_kh_ds" style="overflow: hidden;
    display: -webkit-box !important;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;">
                                    <?php echo strip_tags($v['gioithieuvechuongtrinh'])?>

                                </div>
                                <div class="clearfix-5"></div>
                                <a href="<?php echo $v['canonical'] ?>.html"><img src="template/frontend/images/icon_xemthem.png" alt="<?php echo $v['title'] ?>"></a>

                            </div>

                        </div>

                    </div>
                <?php } ?>
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
