<main class="catalogues catalogues_blog detail_blog">

    <section class="banner-catalogues">
        <img src="<?php echo !empty($detailCatalogue['id'] == 17)?$this->fcSystem['banner_banner11']:$this->fcSystem['banner_banner2'] ?>" alt="Blog"
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
                                    title="<?php echo $title; ?>"><?php echo $title; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </section>
    <div class="clearfix"></div>


    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <h1 class="title-home title-detail-blog"><?php echo $detailArticle['title']; ?></h1>
                    <div class="clearfix-10"></div>
                    <div class="description_detail_block">
                        <?php echo $detailArticle['description']; ?>
                        <div style="clear: both;height: 20px;"></div>
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_google_plus"></a>
                            <a class="a2a_button_skype"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <div style="clear: both;height: 20px;"></div>
                        <div style="margin: 0px -8px">
                            <div class="fb-comments" data-href="<?php echo $canonical ?>" data-numposts="20"
                                 data-width="1140"></div>
                        </div>
                        <style>
                            .description_detail_block img {
                                max-width: 100% !important;
                                height: auto !important;
                            }
                        </style>
                    </div>
                    <div class="clearfix-10"></div>

                    <?php if (isset($articles_same) && is_array($articles_same) && count($articles_same)) { ?>

                        <h2 class="title-home title-detail-blog" style="font-size: 20px">Các tin tức khác:</h2>
                        <div class="clearfix"></div>
                        <div class="section_6 wow fadeInUp" style="padding-top: 10px">
                            <div class="row">
                                <?php foreach ($articles_same as $keyP => $valP) {
                                    $href = rewrite_url($valP['canonical'], true, true); ?>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="item">
                                            <div class="item_new_img">
                                                <a href="<?php echo $href; ?>"><img class="w_100"
                                                                                    src="<?php echo $valP['image']; ?>"
                                                                                    alt="<?php echo $valP['title']; ?>"></a>
                                            </div>
                                            <div class="item_new_info">
                                                <h3><a href="<?php echo $href; ?>"><?php echo $valP['title']; ?></a>
                                                </h3>
                                                <div class="line-new"></div>
                                                <div class="clearfix"></div>
                                                <a href="<?php echo $href; ?>">
                                                    <div class="date_new">
                                                        <p>Ngày đăng: <?php echo $valP['created'] ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    <?php } ?>


                </div>

            </div>

        </div>

    </section>


</main>
