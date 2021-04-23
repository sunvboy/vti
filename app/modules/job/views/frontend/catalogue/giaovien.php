<main class="catalogues catalogues_chuyengia">

    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner5'] ?>" alt="Blog"
             class="w_100">

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


    <section class="section_3 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="w_100 text-center">
                        <h2 class="title-home w_100 text-center"><?php echo $detailCatalogue['title'] ?>
                        </h2>
                        <div class="clearfix-5"></div>
                        <div class="des_section_3"><?php echo strip_tags($detailCatalogue['description']) ?>
                        </div>

                    </div>

                </div>
                <div class="clearfix-15"></div>
                <?php if (isset($articleList) && is_array($articleList) && count($articleList)) { ?>
                <?php foreach ($articleList as $k => $v) {
                    $list_page_2 = json_decode($v['page_2'], TRUE); ?>
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="item">
                            <div class="box_section_giaovien">
                                <a href="javascript:void(0)"><img class="w_100 "
                                                                  src="<?php echo $v['image'] ?>"
                                                                  alt="<?php echo $v['title'] ?>"></a>
                                <div class="clearfix-10"></div>
                                <div class="w_100 pull-left" style="height: 68px">
                                    <div class="box_gv_show ">
                                        <h3><a href="javascript:void(0)"><?php echo $v['title'] ?></a></h3>
                                        <div class="des_box_giaovien"><?php echo strip_tags($v['description']) ?></div>
                                        <div class="clearfix"></div>
                                        <div class="more_box_gv w_100 pull-left"><a href=""></a></div>
                                    </div>
                                </div>
                                <div class="box_gv_hidden">
                                    <h3><a href="javascript:void(0)"><?php echo $v['title'] ?></a></h3>
                                    <div class="des_box_giaovien"><?php echo strip_tags($v['description']) ?></div>
                                    <div class="clearfix-10"></div>
                                    <?php if (isset($list_page_2) && is_array($list_page_2) && count($list_page_2)) { ?>
                                        <ul>
                                            <?php foreach ($list_page_2 as $k2 => $v2) { ?>

                                                <li>
                                                    <?php echo $v2['description'] ?>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                        <div class="clearfix-10"></div>
                                    <?php } ?>
                                    <div class="more_box_gv_hidden">
                                        <a href="<?php echo $v['facebook'] ?>" class="btn"
                                           target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="<?php echo $v['twitter'] ?>" class="btn" target="_blank"><i
                                                class="fa fa-twitter"></i></a>
                                        <a href="<?php echo $v['instagram'] ?>" class="btn" target=""><i
                                                class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php } ?>
                    <div class="col-md-12">
                        <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>


                    </div>
                <?php } ?>


            </div>

        </div>

    </section>


</main>
