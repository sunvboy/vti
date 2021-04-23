<div id="page-wrapper" class="gray-bg dashbard-1 fix-wrapper">
    <div class="row border-bottom">
        <?php $this->load->view('dashboard/backend/common/navbar'); ?>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm mới nội dung tĩnh</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo site_url('admin'); ?>">Home</a>
                </li>
                <li class="active"><strong>Thêm mới nội dung tĩnh</strong></li>
            </ol>
        </div>
    </div>
    <form method="post" action="" class="form-horizontal box">
        <script type="text/javascript">
            var submit = '<?php echo $this->input->post('create'); ?>';
            var catalogueid = '<?php echo json_encode($this->input->post('catalogue')); ?>';
        </script>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="box-body">
                    <?php $error = validation_errors();
                    echo !empty($error) ? '<div class="alert alert-danger">' . $error . '</div>' : ''; ?>
                </div><!-- /.box-body -->
            </div>
            <div class="row">
                <div class="col-lg-8 clearfix">

                    <ul class="nav nav-pills ">
                        <li class="active"><a data-toggle="tab" href="#home">Thông tin</a></li>
                        <li><a data-toggle="tab" href="#menu1">Thành tích</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="ibox mb20">
                            <div class="ibox-title" style="padding: 9px 15px 0px;">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <h5>Thông tin cơ bản <small class="text-danger">Điền đầy đủ các thông tin được mô tả dưới đây</small></h5>
                                    <div class="ibox-tools">
                                        <button type="submit" name="create" value="create" class="btn btn-success  full-width">Tạo mới</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="home" class="tab-pane fade in active">
                            <div class="ibox mb20">

                                <div class="ibox-content">
                                    <div class="row mb15">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    <span>Tiêu đề nội dung tĩnh <b class="text-danger">(*)</b></span>
                                                </label>
                                                <?php echo form_input('title', htmlspecialchars_decode(html_entity_decode(set_value('title'))), 'class="form-control title" placeholder="" id="title" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb15">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                    <label class="control-label text-left">
                                                        <span>Mô tả</span>
                                                    </label>
                                                    <a href="" title="" class="uploadMultiImage"
                                                       onclick="openKCFinderMulti(this);return false;">Upload hình
                                                        ảnh</a>
                                                </div>
                                                <?php echo form_textarea('description', htmlspecialchars_decode(html_entity_decode(set_value('description'))), 'class="form-control ck-editor" id="ckDescription" placeholder="" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb15">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                    <label class="control-label text-left">
                                                        <span>Nội dung</span>
                                                    </label>
                                                    <a href="" title="" class="uploadMultiImage"
                                                       onclick="openKCFinderMulti(this);return false;">Upload hình
                                                        ảnh</a>
                                                </div>
                                                <?php echo form_textarea('content', htmlspecialchars_decode(html_entity_decode(set_value('content'))), 'class="form-control ck-editor" id="ckContent" placeholder="" autocomplete="off"'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb15">
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    <span>Danh mục chính <b class="text-danger">(*)</b></span>
                                                </label>
                                                <div class="form-row">
                                                    <?php echo form_dropdown('catalogueid', $this->nestedsetbie->dropdown(), set_value('catalogueid'), 'class="form-control m-b select3"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    <span>Danh mục phụ</span>
                                                </label>
                                                <div class="form-row">
                                                    <?php echo form_dropdown('catalogue[]', '', (isset($catalogue) ? $catalogue : NULL), 'class="form-control selectMultipe" data-module="page_catalogue" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm.."  style="width: 100%;" id="payment_catalogue"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class=" mb20">
                                <div class="form-group" id="fromSlide">
                                    <?php $albumC = $this->input->post('albumC');
                                    if (isset($albumC) && is_array($albumC) && count($albumC)) { ?>
                                        <?php foreach ($albumC['title'] as $key => $val) {
                                            if (empty($albumC['title'][$key])) continue; ?>
                                            <div class="col-sm-4 slideItem" style="height: auto;">
                                                <input type="text" name="albumC[title][]" value="<?php echo $albumC['title'][$key]; ?>" class="form-control " placeholder="Tên "/>
                                                <textarea name="albumC[description][]" cols="40" rows="10"  class="form-control "  placeholder="Nội dung"><?php echo $albumC['description'][$key]; ?></textarea>
                                                <button type="button" class="btn btnRemove btn-danger pull-right">Xóa
                                                    bỏ
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <div class="col-sm-3 slideItem">
                                            <button type="button" class="btn btnAddItem pull-left">+</button>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                    </div>


                    <button type="submit" name="create" value="create" class="btn btn-success block m-b pull-right">Tạo
                        mới
                    </button>
                </div>
                <div class="col-lg-4">


                    <div class="ibox mb20">
                        <div class="ibox-title">
                            <h5>Ảnh đại diện </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <div class="avatar" style="cursor: pointer;"><img
                                                    src="<?php echo ($this->input->post('image')) ? $this->input->post('image') : 'template/not-found.png' ?>"
                                                    class="img-thumbnail" alt=""></div>
                                        <?php echo form_hidden('image', htmlspecialchars_decode(html_entity_decode(set_value('image'))), 'class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php $this->load->view('dashboard/backend/common/footer'); ?>
</div>
<script>
    var item;
    item = '<div class="col-sm-4 slideItem"  style="height: auto;">';
    item = item + '<input type="text" name="albumC[title][]" value="" class="form-control title " placeholder="Tên "/>';
    item = item + '<textarea name="albumC[description][]" cols="40" rows="10" class="form-control " placeholder="Mô tả "></textarea>';
    item = item + '<button type="button" class="btn btnRemove btn-danger pull-right">Xóa bỏ</button>';
    item = item + '</div>';
    item = item + '<div class="col-sm-3 slideItem"><button type="button" class="btn btnAddItem pull-left">+</button></div>';
    if ($('#fromSlide').html().trim() == '') {
        $('#fromSlide').append(item);
    }
    /* Thêm phần tử đầu tiên */
    $(document).on('click', '.btnAddFrist', function () {
        $('#fromSlide').html(item);
    });

    /* Thêm phần tử tiếp theo */
    $(document).on('click', '.btnAddItem', function () {
        $('.btnAddItem').parent().remove();
        $('#fromSlide').append(item);
    });

    /* Xóa phần tử */
    $(document).on('click', '.btnRemove', function () {
        $(this).parent().remove();
    });

    /* Xóa phần tử */
    $(document).on('click', '.img-thumbnail', function () {
        openKCFinderAlbum($(this));
    });
</script>
<style>
    .btnRemove { position: absolute; top: 10px; right: 25px; color: #d73925; background: none; border-radius: 0; border:1px solid transparent; }
    .btnRemove:hover { border:1px solid #FFF; color: #FFF; }
    .btnAddItem { height:300px; border: 1px solid #dddddd; background:none; width:100%; font-size: 75px; color: rgba(162, 162, 162, 0.3); border-radius: 0; }

    .slideItem { position: relative;margin-bottom:20px;height:300px; }
    .slideItem .thumb { height: 152px;border: 1px solid #ddd;width: 100%;text-align:center; }
    .slideItem .thumb img { border-radius: 0;border:none; max-height:150px;padding: 0px; }
    .slideItem .title { border-top:none; }
    .slideItem .description { width: 100%; height: 105px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; border-top:none;padding: 10px; }
    .slideItem .description-video { height: 80px; }

</style>