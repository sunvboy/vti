<footer>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <a href="<?php echo base_url()?>"><img src="<?php echo $this->fcSystem['homepage_logo_2']?>" alt="logo footer"></a>
                    <div class="clearfix-20"></div>
                    <ul class="ul_f_c">
                        <?php

                        $listSupport = $this->Autoload_Model->_get_where(array(

                            'select' => ' fullname, zalo,skype',

                            'table' => 'support',

                            'where' => array('publish' => 0),

                            'order_by' => 'order asc',

                        ), TRUE);

                        ?>
                        <?php if (isset($listSupport) && count($listSupport) && is_array($listSupport)) { ?>

                        <?php foreach ($listSupport as $k => $v) { ?>

                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $v['fullname']?>: <?php echo $v['skype']?><a target="_blank" href="https://www.google.com/maps/place/<?php echo $v['skype']?>" >[Bản đồ]</a> </li>
                        <li><i class="fa fa-phone-square" aria-hidden="true"></i> Hotline: <?php echo $v['zalo']?></li>
                        <div class="clearfix-10"></div>

                            <?php } ?>

                        <?php } ?>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> Email: <?php echo $this->fcSystem['contact_email']?></li>
                        <div class="clearfix-10"></div>
                        <li><i class="fa fa-globe" aria-hidden="true"></i> Website: <?php echo $this->fcSystem['contact_website']?></li>
                    </ul>
                </div>
                <div class="visible-xs clearfix-20"></div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="fb-page" data-href="<?php echo $this->fcSystem['social_facebook'] ?>"

                         data-tabs="timeline" data-width="360" data-height="200" data-small-header="false"

                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">

                        <blockquote cite="<?php echo $this->fcSystem['social_facebook'] ?>"

                                    class="fb-xfbml-parse-ignore"><a

                                    href="<?php echo $this->fcSystem['social_facebook'] ?>"></a></blockquote>

                    </div>
                    <div class="clearfix-10"></div>
                    <div class="w_100">
                        <a href="<?php echo $this->fcSystem['li_li1_l']?>" target="_blank"><img src="<?php echo $this->fcSystem['li_li1']?>" alt="ảnh 1" class="w_100"> </a>
                    </div>
                    <div class="clearfix" style="height: 5px"></div>
                    <div class="row" style="margin: 0px -2.5px">
                        <div class="col-md-6 col-xs-6 col-sm-6" style="padding: 0px 2.5px"><a target="_blank" href="<?php echo $this->fcSystem['li_li2_l']?>"><img src="<?php echo $this->fcSystem['li_li2']?>" alt="ảnh 2" class="w_100"></a> </div>
                        <div class="col-md-6 col-xs-6 col-sm-6" style="padding: 0px 2.5px"><a target="_blank" href="<?php echo $this->fcSystem['li_li3_l']?>"><img src="<?php echo $this->fcSystem['li_li3']?>" alt="ảnh 3" class="w_100"></a> </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="form_footer">
                        <form class="text-center" method="post" action="mailsubricre.html" id="mailsubricre">
                            <label style="font-size: 18px;color: #fff">Vui lòng để lại thông tin<br> để được tư vấn</label>
                            <div class="error"></div>
                            <input class="form-control fullname " name="fullname" placeholder="Họ và tên" required>
                            <input class="form-control phone" name="phone" placeholder="Số điện thoại" required>
                            <input class="form-control message" name="message" placeholder="Khóa học quan tâm" required>
                            <div class="clearfix-30"></div>
                            <button class="btn btn-default" type="submit" id="btn-submit">Gửi đi</button>
                            <button class="btn btn-default" type="submit" id="loading-image">Loading...</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->fcSystem['homepage_copyright'] ?>
                </div>

            </div>
        </div>

    </div>
</footer>
<script type="text/javascript" src="template/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="template/frontend/js/wow.min.js"></script>
<script type="text/javascript" src="template/frontend/js/owl.carousel.min.js"></script>
<script src="template/frontend/js/hc-offcanvas-nav.js?ver=3.3.0"></script>
<script type="text/javascript" src="template/frontend/js/main.js"></script>
<a id="scrollUp"><img src="template/frontend/images/top.png" alt="back to top"></a>

<script>
    $(document).ready(function () {
        $('#mailsubricre .error').hide();
        var uri = $('#mailsubricre').attr('action');
        $('#mailsubricre').on('submit', function () {
            var postData = $(this).serializeArray();
            $.post(uri, {post: postData, fullname: $('#mailsubricre .fullname').val(), phone: $('#mailsubricre .phone').val(), message: $('#mailsubricre .message').val()}, function (data) {
                var json = JSON.parse(data);
                $('#mailsubricre .error').show();
                if (json.error.length) {
                    $('#mailsubricre .error').removeClass('alert alert-success').addClass('alert alert-danger');
                    $('#mailsubricre .error').html('').html(json.error);
                } else {

                    $('#mailsubricre .error').removeClass('alert alert-danger').addClass('alert alert-success');
                    $('#mailsubricre .error').html('').html('Đăng ký nhận tư vấn thành công.');
                    $('#mailsubricre').trigger("reset");
                    setTimeout(function () {
                        location.reload();
                    }, 5000);
                }
            });
            return false;
        });
    });
    $("#loading-image").hide();
    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $("#btn-submit").hide();
            $("#loading-image").show();
        }).ajaxStop(function () {
            $("#btn-submit").show();
            $("#loading-image").hide();
        });
    });


</script>
<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $('#scrollUp').fadeIn();
            }
            else {
                $('#scrollUp').fadeOut();
            }
        });
        $('#scrollUp').click(function () {
            $('body,html').animate({scrollTop: 0}, 800);
        })
    });


</script>

