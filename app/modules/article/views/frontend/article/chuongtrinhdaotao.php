<main class="catalogues">





    <section class="banner-catalogues">

        <img src="<?php echo $this->fcSystem['banner_banner3'] ?>" alt="<?php echo $detailCatalogue['title'] ?>"

             class="w_100">

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

                    <?php echo $this->load->view('homepage/frontend/common/chuongtrinhdaotao_aside') ?>

                    <div class="visible-xs clearfix-30"></div>

                <?php } ?>





                <div class="col-md-9 col-sm-8 col-xs-12">

                    <div class="box_thongdiep">

                        <h1><?php echo $detailArticle['title']; ?></h1>

                        <div class="detail-content">

                            <div class="list_date_viewed">

                                <div class="flex_vti">

                                    <p>Ngày đăng: <?php echo $detailArticle['created']; ?></p>&nbsp;&nbsp;&nbsp;

                                    <p>Lượt xem: <?php echo $detailArticle['viewed']; ?></p>



                                </div>



                            </div>

                            <div class="clearfix"></div>



                            <div class="content-new-detail">

                                <?php echo $detailArticle['description']; ?>

                            </div>



                            <div style="clear: both;height: 20px;"></div>

                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">

                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>

                                <a class="a2a_button_facebook"></a>

                                <a class="a2a_button_twitter"></a>

                                <a class="a2a_button_google_plus"></a>

                                <a class="a2a_button_skype"></a>

                            </div>

                            <script async src="https://static.addtoany.com/menu/page.js"></script>



                            <style>

                                .content-new-detail img {

                                    max-width: 100% !important;

                                    height: auto !important;

                                }

                            </style>

                            <div class="clearfix"></div>

                        </div>

                        <div class="clearfix-20"></div>

                        <h2>Bình luận của bạn</h2>

                        <div style="clear: both;height: 20px;"></div>

                        <div style="margin: 0px -8px">

                            <div class="fb-comments" data-href="<?php echo $canonical?>" data-numposts="20" data-width="847"></div>

                        </div>

                        <?php if (isset($articles_same) && is_array($articles_same) && count($articles_same)) { ?>



                        <div class="clearfix-20"></div>

                        <h2>Các <?php echo $detailCatalogue['title'] ?> khác</h2>

                        <div  class="box_same_article">

                            <div class="row">

                                <?php foreach ($articles_same as $keyP => $valP) {

                                $href = rewrite_url($valP['canonical'], true, true); ?>

                                <div class="col-md-4 co-xs-12 col-sm-4" style="margin-bottom: 30px">

                                    <a href="<?php echo $href ?>"><img src="<?php echo $valP['image'] ?>" alt="<?php echo $valP['title'] ?>" class="w_100"></a>

                                    <div class="clearfix-10"></div>

                                    <div class="i_box_same_article">

                                        <a style="overflow: hidden;

    word-break: break-word;

    display: -webkit-box;

    text-overflow: ellipsis;

    -webkit-box-orient: vertical;

    -webkit-line-clamp: 2;" href="<?php echo $href ?>"><?php echo $valP['title'] ?></a>



                                    </div>



                                </div>

                                <?php } ?>





                            </div>



                        </div>

                        <?php } ?>





                    </div>



                </div>

                <?php if (svl_ismobile() == 'is mobile') { ?>

                    <div class="visible-xs clearfix-30"></div>

                    <?php echo $this->load->view('homepage/frontend/common/chuongtrinhdaotao_aside') ?>

                <?php } ?>

            </div>

        </div>

    </section>





</main>

<style>

    .ul_childaside li.active{

        background: #3056a1 !important;

    }

    .ul_childaside li.active a{

        color: #fff !important;

        border: 1px solid #FFFFFF !important;

        background: #3056a1 !important;



    }

</style>

