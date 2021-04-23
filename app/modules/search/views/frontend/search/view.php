<main class="catalogues catalogues_blog">
    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner10'] ?>" alt="Kết quả tìm kiếm: <?php echo  $this->input->get('keyword')?>"
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
                    <li><a href="javascript:void(0)">Kết quả tìm kiếm: <?php echo  $this->input->get('keyword')?></a></li>

                </ul>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">

                    <h2 class="w_100 text-center title-home">Kết quả tìm kiếm: <?php echo  $this->input->get('keyword')?></h2>
                    <div class="clearfix"></div>
                    <div class="section_6 wow fadeInUp">
                        <div class="row">
                            <?php if (isset($productList) && is_array($productList) && count($productList)) { ?>
                                <?php foreach ($productList as $key => $val) { ?>
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