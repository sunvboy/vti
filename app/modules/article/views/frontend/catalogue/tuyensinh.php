<main class="catalogues">

    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner4'] ?>" alt="<?php echo $detailCatalogue['title'] ?>"
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
    <section class="ab_1">
        <div class="container">
            <div class="row">
                <?php if (svl_ismobile() != 'is mobile') { ?>
                    <?php echo $this->load->view('homepage/frontend/common/tuyensinh_aside') ?>
                    <div class="visible-xs clearfix-30"></div>
                <?php } ?>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <?php if (isset($ct_baiviet) && is_array($ct_baiviet) && count($ct_baiviet)) { ?>

                        <div class="list_ab_1">
                            <div class="row">
                                <?php foreach ($ct_baiviet as $k => $v) {
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
                    <?php echo $this->load->view('homepage/frontend/common/tuyensinh_aside') ?>
                <?php } ?>
            </div>
        </div>
    </section>



</main>
