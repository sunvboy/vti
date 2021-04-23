<main class="catalogues catalogues_blog">
    <section class="banner-catalogues">
        <img src="<?php echo !empty($detailCatalogue['id'] == 17)?$this->fcSystem['banner_banner11']:$this->fcSystem['banner_banner2'] ?>" alt="<?php echo $detailCatalogue['title'] ?>"
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

                    <h2 class="w_100 text-center title-home"><?php echo $detailCatalogue['title'] ?></h2>
                    <div class="clearfix"></div>
                    <div class="listmenu_blog hidden-xs">
                        <ul class="nav flex_vti">
                            <li class="menuitem_blog"><a href="<?php echo base_url() ?>blog.html">Tất cả</a></li>
                            <?php
                            $detailCatalogue_0 = $this->Autoload_Model->_get_where(array(
                                'select' => 'title,canonical',
                                'table' => 'article_catalogue',
                                'where' => array('highlight' => 1, 'alanguage' => $this->fc_lang),
                            ), TRUE);
                            ?>
                            <?php if (isset($detailCatalogue_0) && is_array($detailCatalogue_0) && count($detailCatalogue_0)) { ?>
                                <?php foreach ($detailCatalogue_0 as $k => $v) { ?>
                                    <li class="menuitem_blog">
                                        <a href="<?php echo base_url() ?><?php echo $v['canonical'] ?>.html"><?php echo $v['title'] ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="section_6 wow fadeInUp">
                        <div class="row">
                            <?php if (isset($articleList) && is_array($articleList) && count($articleList)) { ?>
                                <?php foreach ($articleList as $key => $val) { ?>
                                    <?php
                                    $title = $val['title'];
                                    $image = $val['image'];
                                    $href = rewrite_url($val['canonical'], TRUE, TRUE);
                                    $description = cutnchar(strip_tags($val['description']), 100);
                                    ?>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                        <div class="item">
                                            <div class="item_new_img">
                                                <a href="<?php echo $href; ?>"><img class="w_100" src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
                                            </div>
                                            <div class="item_new_info">
                                                <h3><a href="<?php echo $href; ?>"><?php echo $title; ?></a>
                                                </h3>
                                                <div class="line-new"></div>
                                                <div class="clearfix"></div>
                                                <a href="<?php echo $href; ?>">
                                                    <div class="date_new">
                                                        <p>Ngày đăng: <?php echo $val['created']?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="clearfix-20"></div>
                            <div class="w_100  text-center">
                                <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(function() {

        var url = window.location.href;

        $('.menuitem_blog  a[href="' + url + '"]').parent().addClass('active');

    });
</script>