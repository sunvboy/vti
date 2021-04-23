<main class="catalogues">
    <section class="banner-catalogues">
        <img src="<?php echo $this->fcSystem['banner_banner1']?>" alt="banner liên hệ" class="w_100">
        <?php /*<div class="info-banner-home">
            <div class="sub_slide_home">
                <p>VTI EDUCATION</p>
                <h2>Chuyên nghiệp - tin cậy - tốc độ</h2>
            </div>
        </div>*/?>
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
                    <li><a href="javascript:void(0)">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <h1 class="title-home"><?php echo $this->fcSystem['homepage_company']?></h1>
                    <div class="clearfix-10"></div>
                    <ul class="ul_f_c">
                        <?php
                        $listSupport = $this->Autoload_Model->_get_where(array(
                            'select' => 'id, fullname, email, phone, zalo, skype',
                            'table' => 'support',
                            'where' => array('publish' => 0),
                            'order_by' => 'order asc',
                        ), TRUE);
                        ?>
                        <?php if (isset($listSupport) && count($listSupport) && is_array($listSupport)) { ?>
                            <?php foreach ($listSupport as $k => $v) { ?>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $v['fullname']?>: <?php echo $v['skype']?><a target="_blank" href="https://www.google.com/maps/place/<?php echo $v['skype']?>">[Bản đồ]</a> </li>
                                <li><i class="fa fa-phone-square" aria-hidden="true"></i> Hotline: <?php echo $v['zalo']?> </li>
                                <div class="clearfix-5"></div>
                            <?php } ?>
                        <?php } ?>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> Email: <?php echo $this->fcSystem['contact_email']?></li>
                        <div class="clearfix-5"></div>
                        <li><i class="fa fa-globe" aria-hidden="true"></i> Website: <?php echo $this->fcSystem['contact_website']?></li>
                        <div class="clearfix-5"></div>
                        <li><i class="fa fa-globe" aria-hidden="true"></i> Giờ làm việc: <?php echo $this->fcSystem['contact_tglv']?></li>
                    </ul>
                </div>
                <div class="clearfix-20 visible-xs"></div>
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <?php echo $this->fcSystem['contact_map']; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<style>

    iframe{
        height: 251px;
    }
    @media (min-width: 768px) and (max-width: 1023px) {
        iframe{
            height: 451px;
        }

    }

</style>
<?php /*<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="content-contact">
        <p class="thank-you"><?php echo $this->lang->line('Thankyoufor')?></p>
        <h1 class="title-contact"><?php echo $this->fcSystem['homepage_company']; ?></h1>
        <ul class="adress-contact" style="l">
            <li><span>Địa chỉ: </span><?php echo $this->fcSystem['contact_address']; ?></li>
            <li><span>Số điện thoại: </span><?php echo $this->fcSystem['contact_phone']; ?></li>
            <li><span>Hotline: </span><?php echo $this->fcSystem['contact_hotline']; ?></li>
            <li><span>Email:</span><?php echo $this->fcSystem['contact_email']; ?></li>
            <li><span>Website: </span><?php echo base_url()?></li>
        </ul>

    </div>
    <div class="map-contact">
        <?php echo $this->fcSystem['contact_map']; ?>
    </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="form-contat">
        <p class="desc"><?php echo $this->lang->line('Pleasefillup')?><br>
            <?php echo $this->lang->line('Thanksyou')?>
        </p>
        <form action="ajaxSendcontact.html" method="post" id="formAdmission">
            <div class="error" ></div>
            <input type="text" placeholder="Họ và tên" name="fullname" class="fullname form-control">
            <input type="text" placeholder="Email" name="email" class="email form-control">
            <input type="text" placeholder="Số điện thoại" name="phone" class="phone form-control">
            <input type="text" placeholder="Địa chỉ" name="address" class="address form-control">
            <textarea name="message" cols="40" rows="10" placeholder="Nội dung" class="message form-control"></textarea>
            <div class="send-contact">

                <div class="item">
                    <input type="submit" value="Gửi liên hệ" class="btn btn-danger">
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>
<style>
    .adress-contact{
        list-style: none;padding: 0px;margin: 0px
    }
    .title-contact{
        font-size: 20px;
        font-weight: bold;
        line-height: 25px;
    }
    .map-contact{
        margin-top: 20px;
    }
    #formAdmission input,#formAdmission textarea{
        margin-bottom: 10px;
    }
    @media (max-width: 767px) {
        .form-contat{
            margin-top: 20px;
        }

    }
</style>
<script>

    $(document).ready(function () {

        $('#formAdmission .error').hide();

        var uri = $('#formAdmission').attr('action');

        $('#formAdmission').on('submit', function () {

            var postData = $(this).serializeArray();

            $.post(uri, {

                post: postData,

                fullname: $('#formAdmission .fullname').val(),
                phone: $('#formAdmission .phone').val(),
                email: $('#formAdmission .email').val(),
                address: $('#formAdmission .address').val(),
                message: $('#formAdmission .message').val(),
            }, function (data) {
                var json = JSON.parse(data);
                $('#formAdmission .error').show();
                if (json.error.length) {
                    $('#formAdmission .error').removeClass('alert alert-success').addClass('alert alert-danger');
                    $('#formAdmission .error').html('').html(json.error);
                } else {
                    $('#formAdmission .error').removeClass('alert alert-danger').addClass('alert alert-success');

                    $('#formAdmission .error').html('').html(json.message);

                    $('#formAdmission').trigger("reset");

                    setTimeout(function () {

                        location.reload();

                    },3000);

                }

            });

            return false;

        });

    });

</script>*/?>