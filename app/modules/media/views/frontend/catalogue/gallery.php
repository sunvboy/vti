<main class="catalogues">

    <section class="banner-catalogues">

        <img src="<?php echo $this->fcSystem['banner_banner5'] ?>" alt="<?php echo $detailCatalogue['title'] ?>"
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
                    <?php echo $this->load->view('homepage/frontend/common/thuvien_aside') ?>
                    <div class="visible-xs clearfix-30"></div>
                <?php } ?>


                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="box_thongdiep">

                        <h2><?php echo $detailCatalogue['title']; ?></h2>
                        <div class="box_same_article">
                            <div class="row">

                                <?php if (isset($mediaList) && is_array($mediaList) && count($mediaList)) { ?>
                                    <?php foreach ($mediaList as $key => $val) { ?>

                                        <?php
                                        $href = rewrite_url($val['canonical'], true, true);
                                        $title = $val['title'];
                                        ?>
                                        <div class="col-md-4 co-xs-12 col-sm-4">
                                            <div class="item_b_tv">
                                                <div class="img_box_same_article">
                                                    <a href="<?php echo $href; ?>"><img
                                                                src="<?php echo $val['image']; ?>"
                                                                alt="<?php echo $title; ?>" class="w_100"></a>
                                                    <div class="icon-images"></div>
                                                    <div class="more_tv_ha"><a href="<?php echo $href; ?>"
                                                                               class="btn btn-default">XEM CHI
                                                            TIẾT</a></div>

                                                </div>
                                                <div class="clearfix-10"></div>
                                                <div class="i_box_same_article">
                                                    <a href="<?php echo $href; ?>"><?php echo $title; ?></a>

                                                </div>
                                            </div>

                                        </div>

                                    <?php } ?>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <?php echo  (isset($PaginationList)) ? $PaginationList : ''; ?>


                                    </div>

                                <?php } ?>


                            </div>

                        </div>


                    </div>

                </div>

                <?php if (svl_ismobile() == 'is mobile') { ?>
                    <div class="visible-xs clearfix"></div>
                    <?php echo $this->load->view('homepage/frontend/common/thuvien_aside') ?>
                <?php } ?>

            </div>
        </div>
    </section>


</main>
