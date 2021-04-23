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
                        <link rel='stylesheet' href='https://cdn.jsdelivr.net/combine/npm/slick-carousel@1.7.1/slick/slick.css,npm/slick-carousel@1.7.1/slick/slick-theme.css'>
                        <script src='https://cdn.jsdelivr.net/npm/slick-carousel@1.7.1/slick/slick.js'></script>

                        <div class="">
                            <div class="sld-wrp">
                                <?php $album = json_decode($detailMedia['image_json'], TRUE); ?>
                                <?php if(isset($album) && is_array($album)  && count($album)){ ?>
                                    <div class="slider-for">
                                        <?php foreach($album as $key => $val){ ?>
                                            <div class="slide-container"><img src="<?php echo $val; ?>" alt=""></div>
                                        <?php }?>

                                    </div>
                                    <div class="slider-nav">
                                        <?php foreach($album as $key => $val){ ?>
                                            <div class="slide-btnr"><img src="<?php echo $val; ?>" alt=""></div>
                                        <?php }?>
                                    </div>
                                <?php }?>

                            </div>
                        </div>
                        <div class="box_same_article">
                            <div class="">


                                <script>
                                    $('.slider-for').slick({
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        arrows: false,
                                        // fade: true,
                                        asNavFor: '.slider-nav'
                                    });
                                    $('.slider-nav').slick({
                                        slidesToShow: 8,
                                        slidesToScroll: 1,
                                        asNavFor: '.slider-for',
                                        dots: true,
                                        centerMode: true,
                                        focusOnSelect: true,
                                        centerPadding: '5px',
                                        responsive: [
                                            {
                                                breakpoint: 1023,
                                                settings: {
                                                    arrows: false,
                                                    centerMode: true,
                                                    slidesToShow: 5
                                                }
                                            },
                                            {
                                                breakpoint: 480,
                                                settings: {
                                                    arrows: false,
                                                    centerMode: true,
                                                    slidesToShow: 3
                                                }
                                            }
                                        ]
                                    });
                                </script>
                                <style>
                                    .slick-slide img {
                                        display: block;
                                        width: 100%;
                                    }
                                </style>



                                <?php if (isset($relatedmedia) && is_array($relatedmedia) && count($relatedmedia)) { ?>

                                    <div class="clearfix-20"></div>
                                    <h2>Các <?php echo $detailCatalogue['title']; ?> khác</h2>
                                    <div  class="box_same_article">
                                        <div class="row">
                                            <?php foreach ($relatedmedia as $keyP => $valP) {
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
