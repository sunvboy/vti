<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends MY_Controller {

	public $module;
	function __construct() {
		parent::__construct();
		if(!isset($this->auth) || is_array($this->auth) == FALSE || count($this->auth) == 0 ) redirect(BACKEND_DIRECTORY);
		$this->load->library(array('configbie'));
		$this->load->library('nestedsetbie', array('table' => 'job_catalogue'));
		$this->module = 'job';
	}
	
	public function view($page = 1){
		$this->commonbie->permission("job/backend/job/view", $this->auth['permission']);
		$page = (int)$page;
		$data['from'] = 0;
		$data['to'] = 0;
		
		$extend = (!in_array('job/backend/job/viewall', json_decode($this->auth['permission'], TRUE))) ? 'userid_created = '.$this->auth['id'].'' : '';
		
		
		$perpage = ($this->input->get('perpage')) ? $this->input->get('perpage') : 20;
		$keyword = $this->db->escape_like_str($this->input->get('keyword'));
		$catalogueid = (int)$this->input->get('cataloguesid');
		if($catalogueid > 0){
			$config['total_rows'] = $this->Autoload_Model->_condition(array(
				'module' => 'job',
				'select' => '`object`.`id`',
				'where' => ((!empty($extend)) ? '`object`.`userid_created` = '.$this->auth['id'].' AND `alanguage` = \''.$this->fclang.'\'' : '`alanguage` = \''.$this->fclang.'\'' ),
				'keyword' => '(`object`.`title` LIKE \'%'.$keyword.'%\' AND `object`.`description` LIKE \'%'.$keyword.'%\')',
				'catalogueid' => $catalogueid,
				'count' => TRUE
			));
		}else{
			$config['total_rows'] = $this->Autoload_Model->_get_where(array(
				'select' => 'id',
				'table' => 'job',
				'where' => array( 'alanguage' => $this->fclang),

				'where_extend' => $extend,
				'keyword' => '(title LIKE \'%'.$keyword.'%\' OR description LIKE \'%'.$keyword.'%\')',
				'count' => TRUE,
			));
		}
		
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['base_url'] = base_url('job/backend/job/view');
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 5;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination no-margin">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a class="btn-primary">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['PaginationList'] = $this->pagination->create_links();
			$totalPage = ceil($config['total_rows']/$config['per_page']);
			$page = ($page <= 0)?1:$page;
			$page = ($page > $totalPage)?$totalPage:$page;
			$page = $page - 1;
			$data['from'] = ($page * $config['per_page']) + 1;
			$data['to'] = ($config['per_page']*($page+1) > $config['total_rows']) ? $config['total_rows']  : $config['per_page']*($page+1);
			if($catalogueid > 0){
				$data['listjob'] = $this->Autoload_Model->_condition(array(
					'module' => 'job',
					'select' => '`object`.`id`,`object`.`ishome`, `object`.`title`, `object`.`slug`,`object`.`canonical`, `object`.`catalogueid`, `object`.`catalogue`, `object`.`publish`, `object`.`image`, `object`.`created`, `object`.`order`, `object`.`viewed`, (SELECT fullname FROM user WHERE user.id = object.userid_created) as user_created, (SELECT title FROM job_catalogue WHERE job_catalogue.id = object.catalogueid) as catalogue_title',
					'where' => ((!empty($extend)) ? '`object`.`userid_created` = '.$this->auth['id'].' AND `alanguage` = \''.$this->fclang.'\'' : '`alanguage` = \''.$this->fclang.'\'' ),
					'keyword' => '(`object`.`title` LIKE \'%'.$keyword.'%\' AND `object`.`description` LIKE \'%'.$keyword.'%\')',
					'catalogueid' => $catalogueid,
					'limit' => $perpage,
					'order_by' => '`object`.`order` asc,`object`.`created` desc',
				));
			}else{
				$data['listjob'] = $this->Autoload_Model->_get_where(array(
					'select' => 'id,ishome, catalogueid, catalogue, title, canonical, publish,ishome,highlight,isaside,isfooter, created, order, viewed, image, (SELECT fullname FROM user WHERE user.id = job.userid_created) as user_created, (SELECT title FROM job_catalogue WHERE job_catalogue.id = job.catalogueid) as catalogue_title',
					'table' => 'job',
					'where_extend' => $extend,
					'where' => array( 'alanguage' => $this->fclang),
					'limit' => $config['per_page'],
					'start' => $page * $config['per_page'],
					'keyword' => '(title LIKE \'%'.$keyword.'%\' OR description LIKE \'%'.$keyword.'%\')',
					'order_by' => 'order asc,created desc',
				), TRUE);	
			}
		}
		$data['script'] = 'job';
		$data['config'] = $config;
		$data['template'] = 'job/backend/job/view';
		$this->load->view('dashboard/backend/layout/dashboard', isset($data)?$data:NULL);
	}
	
	public function Create(){
		$this->commonbie->permission("job/backend/job/create", $this->auth['permission']);
		if($this->input->post('create')){
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;
			$this->form_validation->set_error_delimiters('','/');
			$this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'trim|required');
			$this->form_validation->set_rules('catalogueid', 'Danh mục chính', 'trim|is_natural_no_zero');
			$this->form_validation->set_rules('canonical', 'Đường dẫn bài viết', 'trim|required|callback__CheckCanonical');
			if($this->form_validation->run($this)){
				$image = $this->input->post('image');
                $albumC = $this->input->post('albumC');
                $album_dataC = [];
                if (isset($albumC['description']) && is_array($albumC['description']) && count($albumC['description'])) {
                    foreach ($albumC['description'] as $key => $val) {
                        $album_dataC[] = array('description' => $val);
                    }
                }
                $albumC_2 = $this->input->post('albumC_2');
                $album_dataC_2 = [];
                if (isset($albumC_2['description']) && is_array($albumC_2['description']) && count($albumC_2['description'])) {
                    foreach ($albumC_2['description'] as $key => $val) {
                        $album_dataC_2[] = array('description' => $val);
                    }
                }
				$_insert = array(
					'title' => htmlspecialchars_decode(html_entity_decode($this->input->post('title'))),
					'slug' => slug(htmlspecialchars_decode(html_entity_decode($this->input->post('title')))),
					'canonical' => slug($this->input->post('canonical')),
					'description' => $this->input->post('description'),
					'catalogueid' => $this->input->post('catalogueid'),
					'catalogue' => json_encode($this->input->post('catalogue')),
					'tag' => json_encode($this->input->post('tag')),
					'meta_title' => $this->input->post('meta_title'),
					'meta_description' => $this->input->post('meta_description'),
					'publish' => $this->input->post('publish'),
					'publish_time' => merge_time($this->input->post('post_date'), $this->input->post('post_time')),
					'image' => $image,
                    'userid_created' => $this->auth['id'],
					'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
					'alanguage' => $this->fclang,
                    //chương trình đào tạo
                    'page_1' => json_encode($album_dataC),
                    'khungchuongtrinh' => $this->input->post('khungchuongtrinh'),
                    'gioithieuvechuongtrinh' => $this->input->post('gioithieuvechuongtrinh'),
                    //giảng viên
                    'page_2' => json_encode($album_dataC_2),
                    'facebook' => $this->input->post('facebook'),
                    'twitter' => $this->input->post('twitter'),
                    'instagram' => $this->input->post('instagram'),
                    'content' => $this->input->post('content'),
                    'khungchuongtrinh_b' => $this->input->post('khungchuongtrinh_b'),

                );
				
					
				$resultid = $this->Autoload_Model->_create(array(
					'table' => 'job',
					'data' => $_insert,
				));
				if($resultid > 0){
					$canonical = slug($this->input->post('canonical'));
					if(!empty($canonical)){
						$router = array(
							'canonical' => $canonical,
							'crc32' => sprintf("%u", crc32($canonical)),
							'uri' => 'job/frontend/job/view',
							'param' => $resultid,
							'type' => 'number',
							'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
						);
						$routerid = $this->Autoload_Model->_create(array(
							'table' => 'router',
							'data' => $router,
						));
					}
					$catalogue = $this->input->post('catalogue');
					$_catalogue_relation_ship[] = array(
						'module' => 'job',
						'moduleid' => $resultid,
						'catalogueid' => $this->input->post('catalogueid'),
					);
					if(isset($catalogue) && is_array($catalogue) && count($catalogue)){
						foreach($catalogue as $key => $val){
							if($val == $this->input->post('catalogueid')) continue;
							$_catalogue_relation_ship[] = array(
								'module' => 'job',
								'moduleid' => $resultid,
								'catalogueid' => $val
							);
						}
					}
					
					$this->Autoload_Model->_create_batch(array(
						'table' => 'catalogue_relationship',
						'data' => $_catalogue_relation_ship,
					));
					
					
					/*$tag = $this->input->post('tag');
					if(isset($tag) && is_array($tag) && count($tag)){
						foreach($tag as $key => $val){
							$_tag_relation_ship[] = array(
								'module' => 'job',
								'moduleid' => $resultid,
								'tagid' => $val
							);
						}
						$this->Autoload_Model->_create_batch(array(
							'table' => 'tag_relationship',
							'data' => $_tag_relation_ship,
						));
					}*/
					
					$this->session->set_flashdata('message-success', 'Thêm bài viết mới thành công');
					redirect('job/backend/job/view');
				}
			}
		}
		$data['script'] = 'job';
		$data['template'] = 'job/backend/job/create';
		$this->load->view('dashboard/backend/layout/dashboard', isset($data)?$data:NULL);
	}
	
	public function Update($id = 0){

		
		
		$this->commonbie->permission("job/backend/job/update", $this->auth['permission']);
		$id = (int)$id;
		$detailjob = $this->Autoload_Model->_get_where(array(
			'select' => '*',
			'table' => 'job',
			'where' => array('id' => $id,'alanguage' => $this->fclang),
		));
		if(!isset($detailjob) || is_array($detailjob) == false || count($detailjob) == 0){
			$this->session->set_flashdata('message-danger', 'bài viết không tồn tại');
			redirect('job/backend/job/view');
		}
		if($this->input->post('update')){
			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;
			$this->form_validation->set_error_delimiters('','/');
			$this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'trim|required');
			$this->form_validation->set_rules('canonical', 'Đường dẫn bài viết', 'trim|required|callback__CheckCanonical');
            $this->form_validation->set_rules('catalogueid', 'Danh mục chính', 'trim|is_natural_no_zero');

            if($this->form_validation->run($this)){
                $albumC = $this->input->post('albumC');
                $album_dataC = [];
                if (isset($albumC['description']) && is_array($albumC['description']) && count($albumC['description'])) {
                    foreach ($albumC['description'] as $key => $val) {
                        $album_dataC[] = array('description' => $val);
                    }
                }
                $albumC_2 = $this->input->post('albumC_2');
                $album_dataC_2 = [];
                if (isset($albumC_2['description']) && is_array($albumC_2['description']) && count($albumC_2['description'])) {
                    foreach ($albumC_2['description'] as $key => $val) {
                        $album_dataC_2[] = array('description' => $val);
                    }
                }
				$_update = array(
					'title' => htmlspecialchars_decode(html_entity_decode($this->input->post('title'))),
					'slug' => slug(htmlspecialchars_decode(html_entity_decode($this->input->post('title')))),
					'canonical' => slug($this->input->post('canonical')),
					'description' => $this->input->post('description'),
					'catalogueid' => $this->input->post('catalogueid'),
					'catalogue' => json_encode($this->input->post('catalogue')),
					'tag' => json_encode($this->input->post('tag')),
					'meta_title' => $this->input->post('meta_title'),
					'meta_description' => $this->input->post('meta_description'),
					'publish' => $this->input->post('publish'),
					'publish_time' => merge_time($this->input->post('post_date'), $this->input->post('post_time')),
					'image' => $this->input->post('image'),
                    'userid_created' => $this->auth['id'],
					'updated' => gmdate('Y-m-d H:i:s', time() + 7*3600),
					'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
                    //chương trình đào tạo
                    'page_1' => json_encode($album_dataC),
                    'khungchuongtrinh' => $this->input->post('khungchuongtrinh'),
                    'gioithieuvechuongtrinh' => $this->input->post('gioithieuvechuongtrinh'),
                    //giảng viên
                    'page_2' => json_encode($album_dataC_2),
                    'facebook' => $this->input->post('facebook'),
                    'twitter' => $this->input->post('twitter'),
                    'instagram' => $this->input->post('instagram'),
                    'content' => $this->input->post('content'),
                    'khungchuongtrinh_b' => $this->input->post('khungchuongtrinh_b'),


                );

				$flag = $this->Autoload_Model->_update(array(
					'where' => array('id' => $id),
					'table' => 'job',
					'data' => $_update,
				));
				if($flag > 0){
					$canonical = slug($this->input->post('canonical'));
					if(!empty($canonical)){
						$this->Autoload_Model->_delete(array(
							'where' => array('canonical' => $detailjob['canonical'],'uri' => 'job/frontend/job/view','param' => $id),
							'table' => 'router',
						));
						$router = array(
							'canonical' => $canonical,
							'crc32' => sprintf("%u", crc32($canonical)),
							'uri' => 'job/frontend/job/view',
							'param' => $id,
							'type' => 'number',
							'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
						);
						$routerid = $this->Autoload_Model->_create(array(
							'table' => 'router',
							'data' => $router,
						));
					}
					
					$this->Autoload_Model->_delete(array(
						'where' => array('module' => 'job','moduleid' => $id),
						'table' => 'catalogue_relationship',
					));
					
					$catalogue = $this->input->post('catalogue');
					$_catalogue_relation_ship[] = array(
						'module' => 'job',
						'moduleid' => $id,
						'catalogueid' => $this->input->post('catalogueid'),
					);
					if(isset($catalogue) && is_array($catalogue) && count($catalogue)){
						foreach($catalogue as $key => $val){
							if($val == $this->input->post('catalogueid')) continue;
							$_catalogue_relation_ship[] = array(
								'module' => 'job',
								'moduleid' => $id,
								'catalogueid' => $val
							);
						}
					}
					$this->Autoload_Model->_create_batch(array(
						'table' => 'catalogue_relationship',
						'data' => $_catalogue_relation_ship,
					));
					
					
					/*$tag = $this->input->post('tag');
					$this->Autoload_Model->_delete(array(
						'where' => array('module' => 'job','moduleid' => $id),
						'table' => 'tag_relationship',
					));
					if(isset($tag) && is_array($tag) && count($tag)){
						foreach($tag as $key => $val){
							$_tag_relation_ship[] = array(
								'module' => 'job',
								'moduleid' => $id,
								'tagid' => $val
							);
						}
						$this->Autoload_Model->_create_batch(array(
							'table' => 'tag_relationship',
							'data' => $_tag_relation_ship,
						));

					}*/
					
					$this->session->set_flashdata('message-success', 'Cập nhật bài viết thành công');
					redirect('job/backend/job/view');
				}
			}
		}
		
		
		$data['script'] = 'job';
		$data['detailjob'] = $detailjob;
		$data['template'] = 'job/backend/job/update';
		$this->load->view('dashboard/backend/layout/dashboard', isset($data)?$data:NULL);
	}
	
	public function duplicate($id = 0){
		$page = ($this->input->get('page')) ? $this->input->get('page') : 1;
		$this->commonbie->permission("job/backend/job/duplicate", $this->auth['permission']);
		
		$id = (int)$id;
		$detailArticle = $this->Autoload_Model->_get_where(array(
			'select' => '*',
			'table' => 'job',
			'where' => array('id' => $id),
		));
		if(!isset($detailArticle) || is_array($detailArticle) == false || count($detailArticle) == 0){
			$this->session->set_flashdata('message-danger', 'Bài viết không tồn tại');
			redirect('job/backend/job/view');
		}
//		$detailArticle['title'] = str_duplicate(array('value' => $detailArticle['title']));
//		$detailArticle['canonical'] = str_duplicate(array('value' => $detailArticle['canonical'], 'field' => 'canonical'));
		$data['detailArticle'] = $detailArticle;

		
		//Kiểm tra xem sản phẩm có nằm trong chương trình khuyến mại nào không
		$current = gmdate('Y-m-d H:i:s', time() + 7*3600);
		if($this->input->post('create')){

			$album = $this->input->post('album');

			$this->load->library('form_validation');
			$this->form_validation->CI =& $this;
			$this->form_validation->set_error_delimiters('','/');
			$this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'trim|required');
			$this->form_validation->set_rules('catalogueid', 'Danh mục chính', 'trim|is_natural_no_zero');
			$this->form_validation->set_rules('canonical', 'Đường dẫn bài viết', 'trim|required|callback__CheckCanonical');
			
			if($this->form_validation->run($this)){
                $albumC = $this->input->post('albumC');
                $album_dataC = [];
                if (isset($albumC['description']) && is_array($albumC['description']) && count($albumC['description'])) {
                    foreach ($albumC['description'] as $key => $val) {
                        $album_dataC[] = array('description' => $val);
                    }
                }
                $albumC_2 = $this->input->post('albumC_2');
                $album_dataC_2 = [];
                if (isset($albumC_2['description']) && is_array($albumC_2['description']) && count($albumC_2['description'])) {
                    foreach ($albumC_2['description'] as $key => $val) {
                        $album_dataC_2[] = array('description' => $val);
                    }
                }
				$_insert = array(
					'title' => htmlspecialchars_decode(html_entity_decode($this->input->post('title'))),
					'slug' => slug(htmlspecialchars_decode(html_entity_decode($this->input->post('title')))),
					'canonical' => slug($this->input->post('canonical')),
					'description' => $this->input->post('description'),
					'catalogueid' => $this->input->post('catalogueid'),
					'catalogue' => json_encode($this->input->post('catalogue')),
					'tag' => json_encode($this->input->post('tag')),
					'meta_title' => $this->input->post('meta_title'),
					'meta_description' => $this->input->post('meta_description'),
					'publish' => $this->input->post('publish'),
					'publish_time' => merge_time($this->input->post('post_date'), $this->input->post('post_time')),
					'image' => $this->input->post('image'),
					'amp' => $this->input->post('amp'),
					'userid_created' => $this->auth['id'],
					'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
					'alanguage' => $this->fclang,
                    //chương trình đào tạo
                    'page_1' => json_encode($album_dataC),
                    'khungchuongtrinh' => $this->input->post('khungchuongtrinh'),
                    'gioithieuvechuongtrinh' => $this->input->post('gioithieuvechuongtrinh'),
                    //giảng viên
                    'page_2' => json_encode($album_dataC_2),
                    'facebook' => $this->input->post('facebook'),
                    'twitter' => $this->input->post('twitter'),
                    'instagram' => $this->input->post('instagram'),
                    'content' => $this->input->post('content'),
                    'khungchuongtrinh_b' => $this->input->post('khungchuongtrinh_b'),



                );
				$resultid = $this->Autoload_Model->_create(array(
					'table' => 'job',
					'data' => $_insert,
				));

				if($resultid > 0){
					$canonical = slug($this->input->post('canonical'));
					if(!empty($canonical)){
						$router = array(
							'canonical' => $canonical,
							'crc32' => sprintf("%u", crc32($canonical)),
							'uri' => 'job/frontend/job/view',
							'param' => $resultid,
							'type' => 'number',
							'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
						);
						$routerid = $this->Autoload_Model->_create(array(
							'table' => 'router',
							'data' => $router,
						));
					}
					$catalogue = $this->input->post('catalogue');
					$_catalogue_relation_ship[] = array(
						'module' => 'job',
						'moduleid' => $resultid,
						'catalogueid' => $this->input->post('catalogueid'),
					);
					if(isset($catalogue) && is_array($catalogue) && count($catalogue)){
						foreach($catalogue as $key => $val){
							if($val == $this->input->post('catalogueid')) continue;
							$_catalogue_relation_ship[] = array(
								'module' => 'job',
								'moduleid' => $resultid,
								'catalogueid' => $val
							);
						}
					}
					
					$this->Autoload_Model->_create_batch(array(
						'table' => 'catalogue_relationship',
						'data' => $_catalogue_relation_ship,
					));
					
					
					/*$tag = $this->input->post('tag');
					if(isset($tag) && is_array($tag) && count($tag)){
						foreach($tag as $key => $val){
							$_tag_relation_ship[] = array(
								'module' => 'job',
								'moduleid' => $resultid,
								'tagid' => $val
							);
						}
						$this->Autoload_Model->_create_batch(array(
							'table' => 'tag_relationship',
							'data' => $_tag_relation_ship,
						));
					}*/
					
					$this->session->set_flashdata('message-success', 'Thêm bài viết mới thành công');
					redirect('job/backend/job/view');
				}
			}
		}
		$data['script'] = 'job';
		$data['template'] = 'job/backend/job/duplicate';
		$this->load->view('dashboard/backend/layout/dashboard', isset($data)?$data:NULL);
	}
	public function _CheckCanonical($canonical = ''){
		
		$originalCanonical = $this->input->post('original_canonical');
		if($canonical != $originalCanonical){
			$crc32 = sprintf("%u", crc32(slug($canonical)));
			$router = $this->Autoload_Model->_get_where(array(
				'select' => 'id',
				'table' => 'router',
				'where' => array('crc32' => $crc32),
				'count' => TRUE
			));
			if($router > 0){
				$this->form_validation->set_message('_CheckCanonical','Đường dẫn đã tồn tại, hãy chọn một đường dẫn khác');
				return false;
			}
		}
		return true;
	}
	
	
}
