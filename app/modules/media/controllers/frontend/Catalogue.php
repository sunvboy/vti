<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends MY_Controller {

	public $module;
	function __construct() {
		parent::__construct();
		$this->load->library('nestedsetbie', array('table' => 'media_catalogue'));
        $this->fc_lang = $this->config->item('fc_lang');

    }
	
	public function View($id = 0, $page = 1){
		$id = (int)$id;
		$page = (int)$page;
		$seoPage = '';
		$detailCatalogue = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title, canonical, image, lft, rgt, meta_keyword, meta_title, meta_description, description, layoutid',
			'table' => 'media_catalogue',
			'where' => array('id' => $id),
		));
		
		
		if(!isset($detailCatalogue) && !is_array($detailCatalogue) && count($detailCatalogue) == 0){
			$this->session->set_flashdata('message-danger', 'Danh mục thư viện không tồn tại');
			redirect(BASE_URL);
		}
		$data['breadcrumb'] = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title, slug, canonical, lft, rgt',
			'table' => 'media_catalogue',
			'where' => array('lft <=' => $detailCatalogue['lft'],'rgt >=' => $detailCatalogue['lft']),
			'limit' => 1,
			'order_by' => 'lft ASC, order ASC'
		), TRUE);
		
		$config['total_rows'] = $this->Autoload_Model->_condition(array(
			'module' => 'media',
			'select' => '`object`.`id`',
			'where' => '`object`.`publish_time` <= "'.$this->currentTime.'" AND `object`.`publish` = 0',
			'catalogueid' => $id,
			'count' => TRUE
		));
		
		
		$config['base_url'] = rewrite_url($detailCatalogue['canonical'], FALSE, TRUE);
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['prefix'] = 'trang-';
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = 18;
			$config['uri_segment'] = 2;
			$config['use_page_numbers'] = TRUE;

            $config['full_tag_open'] = ' <div class="pagination">';
            $config['full_tag_close'] = '</div>';
            $config['first_tag_open'] = '';
            $config['first_tag_close'] = '';
            $config['last_tag_open'] = '';
            $config['last_tag_close'] = '';
            $config['cur_tag_open'] = '<a class="active">';
            $config['cur_tag_close'] = '</a>';
            $config['next_tag_open'] = '';
            $config['next_tag_close'] = '';
            $config['prev_tag_open'] = '';
            $config['prev_tag_close'] = '';
            $config['num_tag_open'] = '';
            $config['num_tag_close'] = '';

			$this->pagination->initialize($config);
			$data['PaginationList'] = $this->pagination->create_links();
			$totalPage = ceil($config['total_rows']/$config['per_page']);
			$page = ($page <= 0)?1:$page;
			$page = ($page > $totalPage)?$totalPage:$page;
			$seoPage = ($page >= 2)?(' - Trang '.$page):'';
			if($page >= 2){
				$data['canonical'] = $config['base_url'].'/trang-'.$page.$this->config->item('url_suffix');
			}
			$page = $page - 1;
			$data['mediaList'] = $this->Autoload_Model->_condition(array(
				'module' => 'media',
				'select' => '`object`.`id`, `object`.`title`,`object`.`canonical`, `object`.`image`, `object`.`video_link`, `object`.`video_iframe`, `object`.`created`, `object`.`viewed`, `object`.`description`, (SELECT fullname FROM user WHERE user.id = object.userid_created) as user_created ',
				'where' => '`object`.`publish_time` <= "'.$this->currentTime.'" AND `object`.`publish` = 0',
				'catalogueid' => $id,
				'limit' => $config['per_page'],
				'start' => ($page * $config['per_page']),
				'order_by' => '`object`.`order` desc, `object`.`title` asc, `object`.`id` desc',
			));
			
		}
		
		
		
		$data['module'] = 'media_catalogue';
		$data['meta_title'] = (!empty($detailCatalogue['meta_title'])?$detailCatalogue['meta_title']:$detailCatalogue['title']).$seoPage;
		$data['meta_description'] = (!empty($detailCatalogue['meta_description'])?$detailCatalogue['meta_description']:cutnchar(strip_tags($detailCatalogue['description']), 255)).$seoPage;
		$data['meta_image'] = !empty($detailCatalogue['image'])?base_url($detailCatalogue['image']):'';
		$data['detailCatalogue'] = $detailCatalogue;
		if(!isset($data['canonical']) || empty($data['canonical'])){
			$data['canonical'] = $config['base_url'].$this->config->item('url_suffix');
		}
		if($detailCatalogue['layoutid'] == 2){
			$data['template'] = 'media/frontend/catalogue/gallery';
            redirect(BASE_URL);
		}else{
			$data['template'] = 'media/frontend/catalogue/video';
		}

		if($detailCatalogue['canonical'] == 'hinh-anh-video'){
			$data['template'] = 'media/frontend/catalogue/general';
		}


		$this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);
	}
}
