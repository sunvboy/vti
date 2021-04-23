<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Catalogue extends MY_Controller {



	public $module;

	function __construct() {

		parent::__construct();

		$this->load->library('nestedsetbie', array('table' => 'job_catalogue'));

		$this->fc_lang = $this->config->item('fc_lang');

	}



	public function View($id = 0, $page = 1){

		$id = (int)$id;

		$page = (int)$page;



		$seoPage = '';

		$detailCatalogue = $this->Autoload_Model->_get_where(array(

			'select' => 'id, title, canonical, image, lft, rgt, meta_keyword, meta_title, meta_description, description',

			'table' => 'job_catalogue',

			'where' => array('id' => $id,'alanguage' => $this->fc_lang),

		));
		if($detailCatalogue['id'] == 9){
            $perpage = 18;

        }else{
            $perpage = 16;

        }


		if(!isset($detailCatalogue) && !is_array($detailCatalogue) && count($detailCatalogue) == 0){

			$this->session->set_flashdata('message-danger', 'Danh mục bài viết không tồn tại');

			redirect(BASE_URL);

		}

		$data['breadcrumb'] = $this->Autoload_Model->_get_where(array(

			'select' => 'id, title, slug, canonical, lft, rgt',

			'table' => 'job_catalogue',

			'where' => array('lft <=' => $detailCatalogue['lft'],'rgt >=' => $detailCatalogue['lft'],'alanguage' => $this->fc_lang),

			'order_by' => 'lft ASC, order ASC'

		), TRUE);



		$config['total_rows'] = $this->Autoload_Model->_condition(array(

			'module' => 'job',

			'select' => '`object`.`id`',

			'where' => '`object`.`publish_time` <= "'.$this->currentTime.'" AND `object`.`publish` = 0 AND `object`.`alanguage` = \''.$this->fc_lang.'\'',

			'catalogueid' => $id,

			'count' => TRUE

		));







		$config['base_url'] = rewrite_url($detailCatalogue['canonical'], FALSE, TRUE);

		if($config['total_rows'] > 0){

			$this->load->library('pagination');

			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');

			$config['prefix'] = 'trang-';

			$config['first_url'] = $config['base_url'].$config['suffix'];

			$config['per_page'] = $perpage;

			$config['uri_segment'] = 2;

			$config['use_page_numbers'] = TRUE;

			$config['full_tag_open'] = '<div class="pagination">';

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

			$data['articleList'] = $this->Autoload_Model->_condition(array(

				'module' => 'job',

				'select' => '`object`.`id`, `object`.`gioithieuvechuongtrinh`,`object`.`title`,`object`.`canonical`, `object`.`image`,`object`.`content`, `object`.`description`, `object`.`facebook`, `object`.`twitter`, `object`.`instagram`, `object`.`page_2`',

				'where' => '`object`.`publish_time` <= "'.$this->currentTime.'" AND `object`.`publish` = 0 AND `object`.`alanguage` = \''.$this->fc_lang.'\'',

				'catalogueid' => $id,

				'limit' => $config['per_page'],

				'start' => ($page * $config['per_page']),

				'order_by' => '`object`.`order` asc,`object`.`created` desc',

			));



		}



		$data['id'] = $id;

		$data['module'] = 'job_catalogue';

		$data['meta_title'] = strip_tags((!empty($detailCatalogue['meta_title'])?$detailCatalogue['meta_title']:$detailCatalogue['title']).$seoPage);

		$data['meta_description'] = (!empty($detailCatalogue['meta_description'])?$detailCatalogue['meta_description']:cutnchar(strip_tags($detailCatalogue['description']), 255)).$seoPage;

		$data['meta_image'] = !empty($detailCatalogue['image'])?base_url($detailCatalogue['image']):'';

		$data['detailCatalogue'] = $detailCatalogue;

		if(!isset($data['canonical']) || empty($data['canonical'])){

			$data['canonical'] = $config['base_url'].$this->config->item('url_suffix');

		}



		if($detailCatalogue['id']==6){
			$data['template'] = 'job/frontend/catalogue/hocvien';
		}else if($detailCatalogue['id']==8){
			$data['template'] = 'job/frontend/catalogue/giaovien';
		}else if ($detailCatalogue['id']==9 ){
            $data['template'] = 'job/frontend/catalogue/view';
        }

        $this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);

	}
	public function load_more(){
        $limit = $this->input->get('limit');
        $offset = $this->input->get('offset');
        $catalogueid = $this->input->get('catalogueid');
        $listTagCount = $this->Autoload_Model->_get_where(array(
            'table' => 'job',
            'where' => array('catalogueid' => 10, 'publish' => 0, 'alanguage' => $this->fc_lang),
            'count' => TRUE,
        ), TRUE);

        $listTag = $this->Autoload_Model->_get_where(array(
            'select' => 'id, title,description,image',
            'table' => 'job',
            'where' => array('catalogueid' => 10, 'publish' => 0, 'alanguage' => $this->fc_lang),
            'limit' => $limit,
            'start' => $offset,
            'order_by' => 'order asc, id desc',
        ), TRUE);

        $html = '';

        if (is_array($listTag) && count($listTag) && isset($listTag)) {
            $i=0;foreach ($listTag as $key => $val) { $i++;
                $html = $html . '<div class="col-md-3 col-xs-6 col-sm-3">
                            <div class="item_cuuhv">
                                <div class="img_cuuhv">
                                    <img src="'.$val['image'].'" alt="'.$val['title'].'">
                                </div>
                                <div class="clearfix"></div>
                                <div class="info_cuuhv text-center w_100">
                                    <h3>'.$val['title'].'</h3>
                                    <div class="des_cuuhv">
                                        '.$val['description'].'
                                    </div>
                                </div>
                            </div>
                        </div>';
                        if(svl_ismobile() != 'is mobile'){
                        	if($i%4==0){
                    $html = $html . '<div class="clearfix"></div>';

                }
            }else{
            	   	if($i%2==0){
                    $html = $html . '<div class="clearfix"></div>';

                }
                
            }
            }
        }

        $data['view'] = $html;
        $data['offset'] = $offset;
        $data['limit'] = $limit + 16;
        $data['count'] = $listTagCount;
        echo json_encode($data);
    }

}

