<main class="catalogues">

    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner3'] ?>" alt="<?php echo $detailCatalogue['title'] ?>"
             class="w_100">
        <div class="info-banner-home">
            <h1 class="title-catalogues"><?php echo $detailCatalogue['title'] ?></h1>
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
    <?php if (isset($detailCatalogue['child']) && is_array($detailCatalogue['child']) && count($detailCatalogue['child'])) { ?>
        <section class="ab_1">
            <div class="container">
                <div class="row">
                    <?php if (svl_ismobile() != 'is mobile') { ?>
                        <?php echo $this->load->view('homepage/frontend/common/chuongtrinhdaotao_aside') ?>
                        <div class="visible-xs clearfix-30"></div>
                    <?php } ?>
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <?php if (isset($ct_isfooter['child']) && is_array($ct_isfooter['child']) && count($ct_isfooter['child'])) { ?>

                            <div class="list_ab_1">
                                <div class="row">
                                    <?php foreach ($ct_isfooter['child'] as $k => $v) {
                                        $href = rewrite_url($v['canonical'], TRUE, TRUE); ?>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="i_list_ab_1">
                                                <a href="<?php echo $href ?>"><img src="<?php echo $v['image'] ?>"
                                                                                   alt="<?php echo $v['title'] ?>"
                                                                                   class="w_100"></a>
                                                <div class="flex_vti">
                                                    <div class="stt_list_ab_1">0<?php echo($k + 1) ?></div>
                                                    <div class="title_list_ab_1"><a href="<?php echo $href ?>"><?php echo $v['title'] ?></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <?php if (svl_ismobile() == 'is mobile') { ?>
                        <div class="visible-xs clearfix"></div>
                        <?php echo $this->load->view('homepage/frontend/common/chuongtrinhdaotao_aside') ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="ab_1">
            <div class="container">
                <div class="row">
                    <?php if (svl_ismobile() != 'is mobile') { ?>
                        <?php echo $this->load->view('homepage/frontend/common/chuongtrinhdaotao_aside') ?>
                        <div class="visible-xs clearfix-30"></div>
                    <?php } ?>
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="box_thongdiep">
                            <h2><?php echo $detailCatalogue['title'] ?></h2>
                            <div class="detail-content">
                                <?php echo $detailCatalogue['description'] ?>
                                <div class="clearfix-20"></div>
                                <h2>Bình luận của bạn</h2>
                                <div style="clear: both;height: 20px;"></div>
                                <div style="margin: 0px -8px">
                                    <div class="fb-comments" data-href="<?php echo $canonical ?>" data-numposts="20"
                                         data-width="847"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (svl_ismobile() == 'is mobile') { ?>
                        <div class="visible-xs clearfix-30"></div>
                        <?php echo $this->load->view('homepage/frontend/common/chuongtrinhdaotao_aside') ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>


</main>
