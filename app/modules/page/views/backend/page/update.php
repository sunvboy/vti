<div id="page-wrapper" class="gray-bg dashbard-1 fix-wrapper">
	<div class="row border-bottom">
		<?php $this->load->view('dashboard/backend/common/navbar'); ?>
	</div>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>cập nhật nội dung tĩnh</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo site_url('admin'); ?>">Home</a>
				</li>
				<li class="active"><strong>cập nhật nội dung tĩnh</strong></li>
			</ol>
		</div>
	</div>
	<form method="post" action="" class="form-horizontal box" >
		<script type="text/javascript">
			var submit = '<?php echo $this->input->post('update'); ?>';
			var catalogueid = '<?php
					if($this->input->post('update')){
						echo json_encode($this->input->post('catalogue')); 
					}else{
						echo $detailpage['catalogue'];
					}
				?>';
		</script>
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="box-body">
					<?php $error = validation_errors(); echo !empty($error)?'<div class="alert alert-danger">'.$error.'</div>':'';?>
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
                                        <button type="submit" name="update" value="update" class="btn btn-success block full-width m-b">Lưu</button>
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
                                                <?php echo form_input('title', htmlspecialchars_decode(html_entity_decode(set_value('title', $detailpage['title']))), 'class="form-control title" placeholder="" id="title" autocomplete="off"');?>
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
                                                    <a href="" title="" class="uploadMultiImage" onclick="openKCFinderMulti(this);return false;">Upload hình ảnh</a>
                                                </div>
                                                <?php echo form_textarea('description', htmlspecialchars_decode(html_entity_decode(set_value('description', $detailpage['description']))), 'class="form-control ck-editor" id="ckDescription" placeholder="" autocomplete="off"');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb15 ">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                    <label class="control-label text-left">
                                                        <span>Nội dung</span>
                                                    </label>
                                                </div>
                                                <?php echo form_textarea('content', htmlspecialchars_decode(html_entity_decode(set_value('content', $detailpage['content']))), 'class="form-control ck-editor" id="ckContent" placeholder="" autocomplete="off"');?>
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
                                                    <?php echo form_dropdown('catalogueid', $this->nestedsetbie->dropdown(), set_value('catalogueid', $detailpage['catalogueid']), 'class="form-control m-b select3"');?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    <span>Danh mục phụ</span>
                                                </label>
                                                <div class="form-row">
                                                    <?php echo form_dropdown('catalogue[]', '', (isset($catalogue)?$catalogue:NULL), 'class="form-control selectMultipe" data-module="page_catalogue" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm.."  style="width: 100%;" id="page_catalogue"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="ibox mb20">
                                <div class="ibox-title">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <h5>Tối ưu SEO <small class="text-danger">Thiết lập các thẻ mô tả giúp khách hàng dễ
                                                dàng tìm thấy bạn.</small></h5>

                                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                            <div class="edit">
                                                <a href="#" class="edit-seo">Chỉnh sửa SEO</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="google">
                                                <div class="g-title"><?php echo ($this->input->post('meta_title')) ? $this->input->post('meta_title') : (($this->input->post('title')) ? $this->input->post('title') : (($detailpage['meta_title'] != '') ? $detailpage['meta_title'] : $detailpage['title'])); ?></div>
                                                <div class="g-description" id="metaDescription">
                                                    <?php echo cutnchar(($this->input->post('meta_description')) ? $this->input->post('meta_description') : (($this->input->post('description')) ? strip_tags($this->input->post('description')) : ((!empty($detailpage['meta_description'])) ? strip_tags($detailpage['meta_description']) : ((!empty($detailpage['description'])) ? strip_tags($detailpage['description']) : 'List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.'))), 360); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="seo-group hidden">
                                        <hr>
                                        <div class="row mb15">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                        <label class="control-label ">
                                                            <span>Tiêu đề SEO</span>
                                                        </label>
                                                        <span style="color:#9fafba;"><span
                                                                    id="titleCount"><?php echo strlen($detailpage['meta_title']) ?></span> trên 70 ký tự</span>
                                                    </div>
                                                    <?php echo form_input('meta_title', htmlspecialchars_decode(html_entity_decode(set_value('meta_title', $detailpage['meta_title']))), 'class="form-control meta-title" placeholder="" autocomplete="off"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb15">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                        <label class="control-label ">
                                                            <span>Mô tả SEO</span>
                                                        </label>
                                                        <span style="color:#9fafba;"><span
                                                                    id="descriptionCount"><?php echo strlen($detailpage['meta_description']) ?></span> trên 320 ký tự</span>
                                                    </div>
                                                    <?php echo form_textarea('meta_description', htmlspecialchars_decode(html_entity_decode(set_value('meta_description', $detailpage['meta_description']))), 'class="form-control meta-description" id="seoDescription" placeholder="" autocomplete="off"'); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="box-body">
                                <div class="form-group" id="fromSlide">
                                    <?php
                                    $slide = $this->input->post('albumC');
                                    $albumC = '';
                                    if (isset($slide) && is_array($slide) && count($slide)) {
                                        foreach ($slide['title'] as $key => $val) {
                                            $albumC[$key]['title'] = $val;
                                            $albumC[$key]['description'] = $slide['description'][$key];
                                        }
                                    } else {
                                        $albumC = json_decode($detailpage['page_1'], TRUE);
                                    }
                                    ?>
                                    <?php if (isset($albumC) && is_array($albumC) && count($albumC)) { ?>
                                        <?php foreach ($albumC as $key => $val) {
                                            if (empty($albumC[$key]['title'])) continue; ?>
                                            <div class="col-sm-4 slideItem" style="height: auto;">

                                                <input type="text" name="albumC[title][]"
                                                       value="<?php echo $albumC[$key]['title']; ?>"
                                                       class="form-control  " placeholder="Tên "/>
                                                <textarea name="albumC[description][]" cols="40" rows="10"
                                                          class="form-control "
                                                          placeholder="Nội dung"><?php echo $albumC[$key]['description']; ?></textarea>
                                                <button type="button" class="btn btnRemove btn-danger pull-right">Xóa
                                                    bỏ
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <div class="col-sm-4 slideItem">
                                            <button type="button" class="btn btnAddItem pull-left">+</button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>




					<button type="submit" name="update" value="update" class="btn btn-success block m-b pull-right">Lưu</button>
					<a href="<?php echo site_url('page/backend/page/view'); ?>"  class="btn btn-danger block m-b pull-right" style="margin-right:10px;">Hủy bỏ</a>
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
										<div class="avatar" style="cursor: pointer;"><img src="<?php echo ($this->input->post('image')) ? $this->input->post('image') : ((!empty($detailpage['image'])) ? $detailpage['image'] : 'template/not-found.png'); ?>" class="img-thumbnail" alt=""></div>
										<?php echo form_hidden('image', htmlspecialchars_decode(html_entity_decode(set_value('image', $detailpage['image']))), 'class="form-control " placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"');?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</form>
	
	<div class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true" >
		<form class="" method="POST" action="" id="create-tag">
			<div class="modal-dialog modal-lg" style ="max-width: 400px ; margin : 50px auto">
				<div class="modal-content fadeInRight animated">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Thêm từ khóa</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-danger" style = "display: none"></div>
						<div class="form-group">
							<label>Tiêu đề tag</label>
							<input type="text" name="popup-tag" value="" class="form-control popup-tag" placeholder="" autocomplete="off">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</div>
				</div>
			</div>
		</form>
	</div>
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