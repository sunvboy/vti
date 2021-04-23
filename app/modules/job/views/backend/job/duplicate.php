<div id="page-wrapper" class="gray-bg dashbard-1 fix-wrapper">
	<div class="row border-bottom">
		<?php $this->load->view('dashboard/backend/common/navbar'); ?>
	</div>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Sao chép bài viết bài viết</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo site_url('admin'); ?>">Home</a>
				</li>
				<li class="active"><strong>Sao chép bài viết</strong></li>
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
						echo $detailArticle['catalogue'];
					}
				?>';
			var tag = '<?php
				if($this->input->post('update')){
					echo json_encode($this->input->post('tag'));
				}else{
					echo $detailArticle['tag'];
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
                        <li><a data-toggle="tab" href="#home1">Chương trình đào tạo</a></li>
                        <li><a data-toggle="tab" href="#home4">Giáo viên hướng dẫn</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="ibox mb20">
                            <div class="ibox-title" style="padding: 9px 15px 0px;">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <h5>Thông tin cơ bản <small class="text-danger">Điền đầy đủ các thông tin được mô tả dưới đây</small></h5>
                                    <div class="ibox-tools">
                                        <button type="submit" name="create" value="create" class="btn btn-success block full-width m-b">Lưu</button>
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
                                                    <span>Tiêu đề bài viết <b class="text-danger">(*)</b></span>
                                                </label>
                                                <?php echo form_input('title', htmlspecialchars_decode(html_entity_decode(set_value('title', $detailArticle['title']))), 'class="form-control title" placeholder="" id="title" autocomplete="off"');?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb15">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                    <label class="control-label ">
                                                        <span>Đường dẫn <b class="text-danger">(*)</b></span>
                                                    </label>
                                                </div>
                                                <div class="outer">
                                                    <div class="uk-flex uk-flex-middle">
                                                        <div class="base-url"><?php echo base_url(); ?></div>
                                                        <?php echo form_input('canonical', htmlspecialchars_decode(html_entity_decode(set_value('canonical', $detailArticle['canonical']))), 'class="form-control canonical" placeholder="" autocomplete="off" data-flag="0" ');?>

                                                    </div>
                                                </div>
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
                                                <?php echo form_textarea('description', htmlspecialchars_decode(html_entity_decode(set_value('description', $detailArticle['description']))), 'class="form-control ck-editor" id="ckDescription" placeholder="" autocomplete="off"');?>
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
                                                </div>
                                                <?php echo form_textarea('content', htmlspecialchars_decode(html_entity_decode(set_value('content', $detailArticle['content']))), 'class="form-control ck-editor" id="ckContent" placeholder="" autocomplete="off"');?>
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
                                                    <?php echo form_dropdown('catalogueid', $this->nestedsetbie->dropdown(), set_value('catalogueid', $detailArticle['catalogueid']), 'class="form-control m-b select3"');?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    <span>Danh mục phụ</span>
                                                </label>
                                                <div class="form-row">
                                                    <?php echo form_dropdown('catalogue[]', '', (isset($catalogue)?$catalogue:NULL), 'class="form-control selectMultipe" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm.."  style="width: 100%;" id="article_catalogue"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="ibox mb20">
                                <div class="ibox-title">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <h5>Tối ưu SEO <small class="text-danger">Thiết lập các thẻ mô tả giúp khách hàng dễ dàng tìm thấy bạn.</small></h5>

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
                                                <div class="g-title"><?php echo ($this->input->post('meta_title')) ? $this->input->post('meta_title') : (($this->input->post('title')) ? $this->input->post('title') : (($detailArticle['meta_title'] != '') ? $detailArticle['meta_title'] : $detailArticle['title'])); ?></div>
                                                <div class="g-link"><?php echo ($this->input->post('canonical')) ? site_url($this->input->post('canonical')) : site_url($detailArticle['canonical']); ?></div>
                                                <div class="g-description" id="metaDescription">
                                                    <?php echo cutnchar(($this->input->post('meta_description')) ? $this->input->post('meta_description') : (($this->input->post('description')) ? strip_tags($this->input->post('description')) : ((!empty($detailArticle['meta_description'])) ? strip_tags($detailArticle['meta_description']) :((!empty($detailArticle['description'])) ? strip_tags($detailArticle['description']): 'List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.List of all combinations of words containing CKEDT. Words that contain ckedt letters in them. Anagrams made from C K E D T letters.'))), 360); ?>

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
                                                        <span style="color:#9fafba;"><span id="titleCount"><?php echo strlen($detailArticle['meta_title']) ?></span> trên 70 ký tự</span>
                                                    </div>
                                                    <?php echo form_input('meta_title', htmlspecialchars_decode(html_entity_decode(set_value('meta_title', $detailArticle['meta_title']))), 'class="form-control meta-title" placeholder="" autocomplete="off"');?>
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
                                                        <span style="color:#9fafba;"><span id="descriptionCount"><?php echo strlen($detailArticle['meta_description']) ?></span> trên 320 ký tự</span>
                                                    </div>
                                                    <?php echo form_textarea('meta_description', htmlspecialchars_decode(html_entity_decode(set_value('meta_description', $detailArticle['meta_description']))), 'class="form-control meta-description" id="seoDescription" placeholder="" autocomplete="off"');?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="home1" class="tab-pane fade">

                            <div class="ibox mb20">
                                <div class="form-row">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <label class="control-label text-left">
                                            <span>Giới thiệu về chương trình</span>
                                        </label>
                                    </div>
                                    <?php echo form_textarea('gioithieuvechuongtrinh', htmlspecialchars_decode(html_entity_decode(set_value('gioithieuvechuongtrinh', $detailArticle['gioithieuvechuongtrinh']))), 'class="form-control ck-editor" id="ckDescription2" placeholder="" autocomplete="off"');?>
                                </div>
                            </div>
                            <div class="ibox mb20">
                                <div class="ibox-title">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <h5>Khung chương trình</h5>

                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-row">
                                                <div class="avatar " style="cursor: pointer;"><img src="<?php echo ($this->input->post('khungchuongtrinh')) ? $this->input->post('khungchuongtrinh') : ((!empty($detailArticle['khungchuongtrinh'])) ? $detailArticle['khungchuongtrinh'] : 'template/not-found.png'); ?>"
                                                                                                   class="js_img_result img-thumbnail" alt=""></div>
                                                <?php echo form_input('khungchuongtrinh', htmlspecialchars_decode(html_entity_decode(set_value('khungchuongtrinh', $detailArticle['khungchuongtrinh']))), 'class=" form-control js_input_result" placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"'); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox mb20">
                                <div class="form-group row" id="fromSlide">
                                    <?php
                                    $slide = $this->input->post('albumC');
                                    $albumC = '';
                                    if (isset($slide) && is_array($slide) && count($slide)) {
                                        foreach ($slide['description'] as $key => $val) {
                                            $albumC[$key]['description'] = $val;
                                        }
                                    } else {
                                        $albumC = json_decode($detailArticle['page_1'], TRUE);
                                    }
                                    ?>
                                    <?php if (isset($albumC) && is_array($albumC) && count($albumC)) { ?>
                                        <?php foreach ($albumC as $key => $val) {
                                            if (empty($albumC[$key]['description'])) continue; ?>
                                            <div class="col-sm-4 slideItem" style="height: auto;">
                                                <textarea name="albumC[description][]" cols="40" rows="10"
                                                          class="form-control "
                                                          placeholder="Nội dung"><?php echo $albumC[$key]['description']; ?></textarea>
                                                <button type="button" class="btn btnRemove btnRemove_1 btn-danger pull-right">Xóa
                                                    bỏ
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <div class="col-sm-4 slideItem">
                                            <button type="button" class="btn btnAddItem btnAddItem_1 pull-left">+</button>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>
                        <div id="home4" class="tab-pane fade">


                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label class="control-label text-left">
                                            <span>Facebook</span>
                                        </label>
                                        <?php echo form_input('facebook', htmlspecialchars_decode(html_entity_decode(set_value('facebook', $detailArticle['facebook']))), 'class="form-control " placeholder="" autocomplete="off"');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label class="control-label text-left">
                                            <span>Twitter</span>
                                        </label>
                                        <?php echo form_input('twitter', htmlspecialchars_decode(html_entity_decode(set_value('twitter', $detailArticle['twitter']))), 'class="form-control " placeholder="" autocomplete="off"');?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label class="control-label text-left">
                                            <span>Instagram</span>
                                        </label>
                                        <?php echo form_input('instagram', htmlspecialchars_decode(html_entity_decode(set_value('instagram', $detailArticle['instagram']))), 'class="form-control " placeholder="" autocomplete="off"');?>
                                    </div>
                                </div>
                            </div>

                            <div class="ibox mb20">
                                <div class="form-group row" id="fromSlide2">
                                    <?php
                                    $slide_2 = $this->input->post('albumC_2');
                                    $albumC_2 = '';
                                    if (isset($slide_2) && is_array($slide_2) && count($slide_2)) {
                                        foreach ($slide_2['description'] as $key => $val) {
                                            $albumC_2[$key]['description'] = $val;
                                        }
                                    } else {
                                        $albumC_2 = json_decode($detailArticle['page_2'], TRUE);
                                    }
                                    ?>
                                    <?php if (isset($albumC_2) && is_array($albumC_2) && count($albumC_2)) { ?>
                                        <?php foreach ($albumC_2 as $key => $val) {
                                            if (empty($albumC_2[$key]['description'])) continue; ?>
                                            <div class="col-sm-4 slide_2Item" style="height: auto;">
                                                <textarea name="albumC_2[description][]" cols="40" rows="10"
                                                          class="form-control "
                                                          placeholder="Nội dung"><?php echo $albumC_2[$key]['description']; ?></textarea>
                                                <button type="button" class="btn btnRemove btnRemove_2 btn-danger pull-right">Xóa
                                                    bỏ
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <div class="col-sm-4 slide_2Item">
                                            <button type="button" class="btn btnAddItem btnAddItem_2 pull-left">+</button>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>
                    </div>


					<button type="submit" name="create" value="create" class="btn btn-success block m-b pull-right">Lưu</button>
					<a href="<?php echo site_url('article/backend/article/view'); ?>"  class="btn btn-danger block m-b pull-right" style="margin-right:10px;">Hủy bỏ</a>
				</div>
				<div class="col-lg-4">
					<div class="ibox mb20">
						<div class="ibox-title">
							<h5>Hiển thị </h5>
						</div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<span class="text-black mb15">Quản lý thiết lập hiển thị cho blog này.</span>
										<div class="block clearfix">
											<div class="i-checks mr30" style="width:100%;"><span style="color:#000;"> <input <?php echo ($this->input->post('publish') == 0) ? 'checked' : (($detailArticle['publish'] == 0) ? 'checked' : '') ?>  class="popup_gender_1 gender" type="radio" value="0"  name="publish"> <i></i>Cho phép hiển thị trên website</span></div>
										</div>
										<div class="block clearfix">
											<div class="i-checks" style="width:100%;"><span style="color:#000;"> <input type="radio" <?php echo ($this->input->post('publish') == 1) ? 'checked' : (($detailArticle['publish'] == 1) ? 'checked' : '') ?>  class="popup_gender_0 gender" required value="1" name="publish"> <i></i> Tắt chức năng hiển thị trên website. </span></div>
										</div>
									</div>
									<?php
										$publish_time = gettime($detailArticle['publish_time'],'d/m/Y H:i');
										$publish_time = explode(' ', $publish_time);
									?>
									<div class="post-setting">
										<a href="" title="" class="setting-button mb5" data-flag="1">Xóa thiết lập</a>
										<div class="setting-group">
											<div class="uk-flex uk-flex-middle uk-flex-space-between">
												<?php echo form_input('post_date', htmlspecialchars_decode(html_entity_decode(set_value('post_date', $publish_time[0]))), 'class="form-control datetimepicker" placeholder=""  autocomplete="off"');?>
												<span style="margin-right:5px;color:#141414;">lúc</span>
												<?php echo form_input('post_time', htmlspecialchars_decode(html_entity_decode(set_value('post_time', $publish_time[1]))), 'class="form-control" placeholder="" id="input-clock" autocomplete="off" data-default="20:48"');?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="ibox mb20">
						<div class="ibox-title">
							<div class="uk-flex uk-flex-middle uk-flex-space-between">
								<h5>Ảnh đại diện </h5>
								<div class="edit">
									<a onclick="openKCFinderNdImage(this);return false;" href="" title="" class="upload-picture">Chọn hình</a>
								</div>
							</div>
						</div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<div class="avatar " style="cursor: pointer;"><img src="<?php echo ($this->input->post('image')) ? $this->input->post('image') : ((!empty($detailArticle['image'])) ? $detailArticle['image'] : 'template/not-found.png'); ?>" class="js_img_result img-thumbnail" alt=""></div>
										<?php echo form_input('image', htmlspecialchars_decode(html_entity_decode(set_value('image', $detailArticle['image']))), 'class="hidden form-control js_input_result" placeholder="Đường dẫn của ảnh" onclick="openKCFinder(this)"  autocomplete="off"');?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="ibox mb20 hidden">
						<div class="ibox-title uk-flex uk-flex-middle uk-flex-space-between">
							<h5>Tags </h5>
							<a type="button" data-toggle="modal" data-target="#myModal6">+ Thêm mới tag</a>
						</div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<?php echo form_dropdown('tag[]', '', (isset($tag)?$tag:NULL), 'class="form-control selectMultipe" multiple="multiple" data-title="Nhập 2 kí tự để tìm kiếm.."  style="width: 100%;" id="tag"'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="ibox mb20 hidden">
                        <div class="ibox-title">
                            <h5>Video <small>Nhập mã nhúng video</small> </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <?php echo form_textarea('video', set_value('video', $detailArticle['video']), 'class="form-control"  rows="4"  placeholder="" autocomplete="off" ');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox mb20 hidden">
                        <div class="ibox-title">

                            <h5>Icon </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row uk-flex uk-flex-middle">
                                        <div class="icon_hot m-r" style="cursor: pointer;"><img src="<?php echo ($this->input->post('icon')) ? $this->input->post('icon') : ( (!empty($detailArticle['icon']))? $detailArticle['icon'] :'template/not-found.png' )	 ?>" class="img-thumbnail" alt=""></div>
                                        <?php echo form_hidden('icon', htmlspecialchars_decode(html_entity_decode(set_value('icon', $detailArticle['icon']))), 'class="form-control " placeholder="" onclick="openKCFinder(this)"  autocomplete="off"');?>
                                        <span>Ấn vào hình để chọn</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="ibox mb20 hidden">
						<div class="ibox-title">
							<h5>Giao diện </h5>
						</div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<?php echo form_dropdown('amp', $this->configbie->data('amp'), set_value('amp', $detailArticle['amp']), 'class="form-control m-b select3"');?>
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