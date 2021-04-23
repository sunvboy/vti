<div id="page-wrapper" class="gray-bg dashbard-1 fix-wrapper">
    <div class="row border-bottom">        <?php $this->load->view('dashboard/backend/common/navbar'); ?>    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10"><h2>cập nhật bài viết</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('admin'); ?>">Home</a></li>
                <li class="active"><strong>cập nhật bài viết</strong></li>
            </ol>
        </div>
    </div>
    <form method="post" action="" class="form-horizontal box">
        <script type="text/javascript">            var submit = '<?php echo $this->input->post('update'); ?>';        </script>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="box-body">                    <?php $error = validation_errors();
                    echo !empty($error) ? '<div class="alert alert-danger">' . $error . '</div>' : ''; ?>                </div>
                <!-- /.box-body -->            </div>
            <div class="row">
                <div class="col-lg-8 clearfix">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="tab" href="#home">Thông tin</a></li>
                        <li><a data-toggle="tab" href="#menu1">Bắt đầu không khó</a></li>
                        <li><a data-toggle="tab" href="#menu2">Nội dung</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="ibox mb20">
                                <div class="ibox mb20">
                                    <div class="ibox-title" style="padding: 9px 15px 0px;">
                                        <div class="uk-flex uk-flex-middle uk-flex-space-between"><h5>Thông tin cơ bản
                                                <small class="text-danger">Điền đầy đủ các thông tin được mô tả dưới
                                                    đây</small></h5></div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="row mb15">
                                            <div class="col-lg-12">
                                                <div class="form-row"><label class="control-label text-left"> <span>Tiêu đề bài viết <b
                                                                    class="text-danger">(*)</b></span>
                                                    </label> <?php echo form_input('title', htmlspecialchars_decode(html_entity_decode(set_value('title', $detailitem['title']))), 'class="form-control title" placeholder="" id="title" autocomplete="off"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb15">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="uk-flex uk-flex-middle uk-flex-space-between"><label
                                                                class="control-label "> <span>Đường dẫn <b
                                                                        class="text-danger">(*)</b></span> </label>
                                                    </div>
                                                    <div class="outer">
                                                        <div class="uk-flex uk-flex-middle">
                                                            <div class="base-url"><?php echo base_url(); ?></div> <?php echo form_input('canonical', htmlspecialchars_decode(html_entity_decode(set_value('canonical', $detailitem['canonical']))), 'class="form-control canonical" placeholder="" autocomplete="off" data-flag="0" '); ?>                                                            <?php echo form_input('original_canonical', htmlspecialchars_decode(html_entity_decode(set_value('canonical', $detailitem['canonical']))), 'class="form-control" placeholder="" style="display:none;" autocomplete="off"'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb15">
                                            <div class="col-lg-12">
                                                <div class="form-row"><label class="control-label text-left"> <span>Nội dung</span>
                                                    </label> <?php echo form_textarea('description', htmlspecialchars_decode(html_entity_decode(set_value('description', $detailitem['description']))), 'class="form-control ck-editor" id="CKDescriptio" placeholder="" autocomplete="off"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox mb20">
                                    <div class="ibox-title">
                                        <div class="uk-flex uk-flex-middle uk-flex-space-between"><h5>Tối ưu SEO <small
                                                        class="text-danger">Thiết lập các thẻ mô tả giúp khách hàng dễ
                                                    dàng tìm thấy bạn.</small></h5>
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <div class="edit"><a href="#" class="edit-seo">Chỉnh sửa SEO</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="google">
                                                    <div class="g-title"><?php echo ($this->input->post('meta_title')) ? $this->input->post('meta_title') : (($this->input->post('title')) ? $this->input->post('title') : (($detailitem['meta_title'] != '') ? $detailitem['meta_title'] : $detailitem['title'])); ?></div>
                                                    <div class="g-link"><?php echo ($this->input->post('canonical')) ? site_url($this->input->post('canonical')) : site_url($detailitem['canonical']); ?></div>
                                                    <div class="g-description"
                                                         id="metaDescription">                                                        <?php echo cutnchar(($this->input->post('meta_description')) ? $this->input->post('meta_description') : (($this->input->post('description')) ? strip_tags($this->input->post('description')) : ((!empty($detailitem['meta_description'])) ? strip_tags($detailitem['meta_description']) : ((!empty($detailitem['description'])) ? strip_tags($detailitem['description']) : 'List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.'))), 360); ?>                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="seo-group hidden">
                                            <hr>
                                            <div class="row mb15">
                                                <div class="col-lg-12">
                                                    <div class="form-row">
                                                        <div class="uk-flex uk-flex-middle uk-flex-space-between"><label
                                                                    class="control-label "> <span>Tiêu đề SEO</span>
                                                            </label> <span style="color:#9fafba;"><span
                                                                        id="titleCount"><?php echo strlen($detailitem['meta_title']) ?></span> trên 70 ký tự</span>
                                                        </div> <?php echo form_input('meta_title', htmlspecialchars_decode(html_entity_decode(set_value('meta_title', $detailitem['meta_title']))), 'class="form-control meta-title" placeholder="" autocomplete="off"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb15">
                                                <div class="col-lg-12">
                                                    <div class="form-row">
                                                        <div class="uk-flex uk-flex-middle uk-flex-space-between"><label
                                                                    class="control-label "> <span>Mô tả SEO</span>
                                                            </label> <span style="color:#9fafba;"><span
                                                                        id="descriptionCount"><?php echo strlen($detailitem['meta_description']) ?></span> trên 320 ký tự</span>
                                                        </div> <?php echo form_textarea('meta_description', htmlspecialchars_decode(html_entity_decode(set_value('meta_description', $detailitem['meta_description']))), 'class="form-control meta-description" id="seoDescription" placeholder="" autocomplete="off"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="ibox mb20">
                                <div class="ibox-content">
                                    <div class="row mb15">
                                        <div class="col-lg-12 mb15">
                                            <div class="form-row"><label class="control-label text-left">
                                                    <span>Tiêu đề</span>
                                                </label> <?php echo form_input('b_1', htmlspecialchars_decode(html_entity_decode(set_value('b_1', $detailitem['b_1']))), 'class="form-control" placeholder="" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-row"><label class="control-label text-left">
                                                    <span>Mô tả</span>
                                                </label> <?php echo form_input('b_2', htmlspecialchars_decode(html_entity_decode(set_value('b_2', $detailitem['b_2']))), 'class="form-control" placeholder="" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mb20">
                                <div class="form-group"
                                     id="fromSlide4">                                    <?php $slideCH = $this->input->post('albumCH');
                                    $albumCH = '';
                                    if (isset($slideCH) && is_array($slideCH) && count($slideCH)) {
                                        foreach ($slideCH['title'] as $key => $val) {
                                            $albumCH[$key]['title'] = $val;
                                            $albumCH[$key]['images'] = $slideCH['images'][$key];
                                            $albumCH[$key]['description'] = $slideCH['description'][$key];
                                        }
                                    } else {
                                        $albumCH = json_decode($detailitem['b_3'], TRUE);
                                    } ?>                                    <?php if (isset($albumCH) && is_array($albumCH) && count($albumCH)) { ?><?php foreach ($albumCH as $key => $val) {
                                        if (empty($albumCH[$key]['title'])) continue; ?>
                                        <div class="col-sm-6 slideItem" style="height: auto;">
                                            <div class="thumb"><img src="<?php echo $albumCH[$key]['images']; ?>"
                                                                    class="img-thumbnail img-responsive"/></div>
                                            <input type="hidden" name="albumCH[images][]"
                                                   value="<?php echo $albumCH[$key]['images']; ?>"/> <input
                                                    name="albumCH[title][]" class="form-control  " placeholder="Tiêu đề"
                                                    value="<?php echo $albumCH[$key]['title']; ?>"> <textarea
                                                    name="albumCH[description][]" class="form-control"
                                                    placeholder="Tiêu đề"><?php echo $albumCH[$key]['description']; ?></textarea>
                                            <button type="button" class="btn btnRemove4 btn-danger pull-right">Xóa bỏ
                                            </button>
                                        </div>                                        <?php } ?>
                                        <div class="col-sm-4 slideItem">
                                            <button type="button" class="btn btnAdditem4 pull-left">+</button>
                                        </div>                                    <?php } ?></div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="ibox mb20">
                                <div class="ibox-content">
                                    <div class="row mb15">
                                        <div class="col-lg-12 mb20">
                                            <div class="form-row"><label class="control-label text-left">
                                                    <span>Tiêu đề</span>
                                                </label> <?php echo form_input('c_1', htmlspecialchars_decode(html_entity_decode(set_value('c_1', $detailitem['c_1']))), 'class="form-control" placeholder="" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb20">
                                            <div class="form-row"><label class="control-label text-left">
                                                    <span>Nội dung</span>
                                                </label> <?php echo form_textarea('c_3', htmlspecialchars_decode(html_entity_decode(set_value('c_3', $detailitem['c_3']))), 'class="form-control ckeditor" id="CKDescriptio2" placeholder="" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="ibox mb20">
                                                <div class="ibox-title">
                                                    <div class="uk-flex uk-flex-middle uk-flex-space-between"><h5>Ảnh
                                                            background </h5></div>
                                                </div>
                                                <div class="ibox-content">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-row">
                                                                <div class="avatar " style="cursor: pointer;"><img
                                                                            src="<?php echo ($this->input->post('c_2')) ? $this->input->post('c_2') : ((!empty($detailitem['c_2'])) ? $detailitem['c_2'] : 'template/not-found.png'); ?>"
                                                                            class="js_img_result img-thumbnail" alt="">
                                                                </div> <?php echo form_input('c_2', htmlspecialchars_decode(html_entity_decode(set_value('c_2', $detailitem['c_2']))), 'class=" form-control js_input_result" placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update" value="update" class="btn btn-success block m-b pull-right">
                        Lưu
                    </button>
                    <a href="<?php echo site_url('item/backend/item/view'); ?>"
                       class="btn btn-danger block m-b pull-right" style="margin-right:10px;">Hủy bỏ</a></div>
                <div class="col-lg-4">
                    <div class="ibox mb20"><label class="control-label text-left"> <span>Thư viện video</span> </label>
                        <div class="form-row">                            <?php echo form_dropdown('catalogueid', dropdown(array('text' => 'Chọn', 'select' => 'id, title', 'table' => 'media_catalogue', 'field' => 'id', 'value' => 'title', 'order_by' => 'id DESC')), set_value('catalogueid', $detailitem['catalogueid']), 'class="form-control m-b select3"'); ?>                        </div>
                    </div>
                    <div class="ibox mb20">
                        <div class="ibox-title"><h5>Hiển thị </h5></div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row"><span class="text-black mb15">Quản lý thiết lập hiển thị cho blog này.</span>
                                        <div class="block clearfix">
                                            <div class="i-checks mr30" style="width:100%;"><span
                                                        style="color:#000;"> <input <?php echo ($this->input->post('publish') == 0) ? 'checked' : (($detailitem['publish'] == 0) ? 'checked' : '') ?>  class="popup_gender_1 gender"
                                                                                                                                                                                                       type="radio"
                                                                                                                                                                                                       value="0"
                                                                                                                                                                                                       name="publish"> <i></i>Cho phép hiển thị trên website</span>
                                            </div>
                                        </div>
                                        <div class="block clearfix">
                                            <div class="i-checks" style="width:100%;"><span style="color:#000;"> <input
                                                            type="radio" <?php echo ($this->input->post('publish') == 1) ? 'checked' : (($detailitem['publish'] == 1) ? 'checked' : '') ?>  class="popup_gender_0 gender"
                                                            required value="1" name="publish"> <i></i> Tắt chức năng hiển thị trên website. </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between"><h5>Ảnh đại diện </h5>
                                <div class="edit"><a onclick="openKCFinderNdImage(this);return false;" href="" title=""
                                                     class="upload-picture">Chọn hình</a></div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="avatar " style="cursor: pointer;"><img
                                                    src="<?php echo ($this->input->post('image')) ? $this->input->post('image') : ((!empty($detailitem['image'])) ? $detailitem['image'] : 'template/not-found.png'); ?>"
                                                    class="js_img_result img-thumbnail" alt="">
                                        </div> <?php echo form_input('image', htmlspecialchars_decode(html_entity_decode(set_value('image', $detailitem['image']))), 'class="hidden form-control js_input_result" placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between"><h5>Ảnh banner </h5>

                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="avatar " style="cursor: pointer;"><img
                                                    src="<?php echo ($this->input->post('banner')) ? $this->input->post('banner') : ((!empty($detailitem['banner'])) ? $detailitem['banner'] : 'template/not-found.png'); ?>"
                                                    class="js_img_result img-thumbnail" alt="">
                                        </div> <?php echo form_input('banner', htmlspecialchars_decode(html_entity_decode(set_value('banner', $detailitem['banner']))), 'class=" form-control js_input_result" placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form> <?php $this->load->view('dashboard/backend/common/footer'); ?></div>
<script>    var item4;
    item4 = '<div class="col-sm-6 slideItem"  style="height: auto;">';
    item4 = item4 + '<div class="thumb"><img src="template/not-found.png" class="img-thumbnail img-responsive"/></div>';
    item4 = item4 + '<input type="hidden" name="albumCH[images][]" value="" />';
    item4 = item4 + '<input name="albumCH[title][]" class="form-control  " placeholder="Tiêu đề">';
    item4 = item4 + '<textarea name="albumCH[description][]" class="form-control  " placeholder="Mô tả"></textarea>';
    item4 = item4 + '<button type="button" class="btn btnRemove4 btn-danger pull-right">Xóa bỏ</button>';
    item4 = item4 + '</div>';
    item4 = item4 + '<div class="col-sm-3 slideItem"><button type="button" class="btn btnAdditem4 pull-left">+</button></div>';
    if ($('#fromSlide4').html().trim() == '') {
        $('#fromSlide4').append(item4);
    }    /* Thêm phần tử đầu tiên */
    $(document).on('click', '.btnAddFrist', function () {
        $('#fromSlide3').html(item4);
    });    /* Thêm phần tử tiếp theo */
    $(document).on('click', '.btnAdditem4', function () {
        $('.btnAdditem4').parent().remove();
        $('#fromSlide4').append(item4);
    });    /* Xóa phần tử */
    $(document).on('click', '.btnRemove4', function () {
        $(this).parent().remove();
    });</script>
<style>    .btnRemove, .btnRemove4, .btnRemove3 {
        position: absolute;
        top: 10px;
        right: 25px;
        color: #d73925;
        background: none;
        border-radius: 0;
        border: 1px solid transparent;
    }

    .btnRemove:hover, .btnRemove4:hover, .btnRemove3:hover {
        border: 1px solid #FFF;
        color: #FFF;
    }

    .btnAddItem, .btnAdditem4, .btnAdditem3 {
        height: 300px;
        border: 1px solid #dddddd;
        background: none;
        width: 100%;
        font-size: 75px;
        color: rgba(162, 162, 162, 0.3);
        border-radius: 0;
    }

    .slideItem {
        position: relative;
        margin-bottom: 20px;
        height: 300px;
    }

    .slideItem .thumb {
        height: 152px;
        border: 1px solid #ddd;
        width: 100%;
        text-align: center;
    }

    .slideItem .thumb img {
        border-radius: 0;
        border: none;
        max-height: 150px;
        padding: 0px;
    }

    .slideItem .title {
        border-top: none;
    }

    .slideItem .description {
        width: 100%;
        height: 105px;
        font-size: 14px;
        line-height: 18px;
        border: 1px solid #dddddd;
        border-top: none;
        padding: 10px;
    }

    .slideItem .description-video {
        height: 80px;
    }</style>