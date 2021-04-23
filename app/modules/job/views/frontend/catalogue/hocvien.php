<main class="catalogues catalogues_hocvien">



    <section class="banner-catalogues">

        <img src="<?php echo $this->fcSystem['banner_banner4'] ?>" alt="Blog"

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



    <section class="section_5 ">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-5 wow fadeInLeft">

                    <h2 class="title-home"><?php echo $detailCatalogue['title']?></h2>

                    <div class="clearfix"></div>

                    <div class="des_box_hocvien">

                        <?php echo $detailCatalogue['description']?>

                    </div>

                    <div class="clearfix"></div>

                    <a href="javascript:void(0)" class="customPrevBtn"><img src="template/frontend/images/p-hv.png" alt="prev"></a>



                    <a href="javascript:void(0)" class="customNextBtn"><img src="template/frontend/images/n-hv.png" alt="next"></a>



                </div>

                <div class="col-md-8 col-sm-7">

                    <?php if (isset($articleList) && is_array($articleList) && count($articleList)) { ?>



                    <div class="box_list_hocvien wow fadeInRight">

                        <div class="owl-hocvien owl-theme owl-carousel">



                            <div class="item-hv">



                                <?php $i = 0; foreach ($articleList as $v=>$k){ $i++?>

                                    <div class="item">



                                        <div class="flex_vti_mobile">

                                            <div class="img_hv">

                                                <img src="<?php echo $k['image']?>" alt="<?php echo $k['title']?>">

                                                <img src="template/frontend/images/i-s-2.png" alt="đánh giá" style="width: auto;height: auto;border-radius: 0px;margin: 0px auto;margin-top: 5px;">



                                            </div>

                                            <div class="info_hv info_hv_pc">

                                                <div class="des_hv">

                                                    <div class="hidden-xs"><?php echo $k['content']?></div>

                                                    <div class="clearfix"></div>

                                                    <h3><?php echo $k['title']?></h3>

                                                    <p><?php echo strip_tags($k['description'])?></p>



                                                </div>

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="info_hv info_hv_mobile visible-xs">

                                            <div class="des_hv">

                                                <div class="des_hv_1"><?php echo $k['content']?></div>





                                            </div>

                                        </div>

                                    </div>

                                <?php if ($i % 3 == 0){ ?>  </div>

                            <div class="item-hv"><?php } ?>

                                <?php } ?>

                            </div>



                        </div>





                    </div>

                    <?php } ?>



                </div>



            </div>



        </div>



    </section>

    <div class="clearfix"></div>







    <?php

    $listTag = $this->Autoload_Model->_get_where(array(

        'select' => 'id, title',

        'table' => 'job_catalogue',

        'where' => array('id' => 10, 'publish' => 0, 'alanguage' => $this->fc_lang),

        'order_by' => 'order asc, id desc',

    ));

    ?>



    <?php if(is_array($listTag) && count($listTag) && isset($listTag)){?>

    <section class="section_cuuhv">

        <div class="container">

            <div class="row">



                <div class="col-md-12">

                    <h2 class="title-home w_100 text-center"><?php echo $listTag['title']?></h2>

                </div>

                <div class="clearfix"></div>

                <div class="list_cuuhocvien" >

                    <div id="load-more-data">



                    </div>



                    <div class="clearfix"></div>

                    <div class="col-md-12 w_100 text-center">

                        <a href="javascript:void(0)" onclick="loadmore_hv()" id="xemthemQ" class="btn btn-default btn-a-more-hv">Hiển thị thêm</a>

                        <input type="hidden" name="limit" id="limit" value="16"/>

                        <input type="hidden" name="offset" id="offset" value="0"/>

                        <script>

                            loadmore_hv();

                            $('#rutgonQ').hide();

                            function loadmore_hv(){

                                var offset = parseInt($('#offset').val());

                                var limit = parseInt($('#limit').val());

                                $.ajax({

                                    url:'load-more.html',

                                    data:{

                                        offset : offset,

                                        limit : limit,

                                    },

                                    success :function(data){

                                        var json = JSON.parse(data);

                                        $('#load-more-data').html(json.view);

                                        $('#offset').val(json.offset);

                                        $('#limit').val(json.limit);



                                    }

                                })

                            }



                        </script>

                    </div>

                </div>

            </div>



        </div>

    </section>

    <?php }?>









</main>

<style type="text/css">
    @media (max-width: 767px){
        .img_cuuhv img {
            width: 120px;
            height: 120px;
        }
    }

</style>