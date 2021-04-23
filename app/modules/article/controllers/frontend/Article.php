<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	public $module;
	function __construct() {
		parent::__construct();
		$this->load->library('nestedsetbie', array('table' => 'article_catalogue'));
		$this->module = 'article';
		$this->fc_lang = $this->config->item('fc_lang');
	}
	
	public function view($id = 0){
		$id = (int)$id;
		$detailArticle = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title, slug, canonical, catalogueid, description, image, viewed, (SELECT fullname FROM user WHERE user.id = article.userid_created) as fullname, created',
			'table' => 'article',
			'where' => array('id' => $id,'publish' => 0,'alanguage' => $this->fc_lang),
		));
		if(!isset($detailArticle) || is_array($detailArticle) == false || count($detailArticle) == 0){
			$this->session->set_flashdata('message-danger', 'Bài viết không tồn tại');
			redirect(BASE_URL);
		}
		/*$data = comment(array('id' => $id, 'module' => $this->module));*/
		$detailCatalogue = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title, canonical, image, lft, rgt,ishot,isfooter,isaside',
			'table' => 'article_catalogue',
			'where' => array('id' => $detailArticle['catalogueid'],'alanguage' => $this->fc_lang),
		));
		$data['breadcrumb'] = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title, slug, canonical, lft, rgt',
			'table' => 'article_catalogue',
			'limit' => '100',
			'where' => array('lft <=' => $detailCatalogue['lft'],'rgt >=' => $detailCatalogue['lft'],'alanguage' => $this->fc_lang),
			'order_by' => 'lft ASC, order ASC'
		), TRUE);

		/* CẬP NHẬT LƯỢT XEM TỰ NHIÊN */
		$this->Autoload_Model->_update(array(
			'table' => 'article',
			'where' => array('id' => $id),
			'data' => array('viewed'=>$detailArticle['viewed'] + 1),
		));
		
		/* OBJECT đã xem */
		$objectSee = isset($_COOKIE[CODE.'articleCookie'])?$_COOKIE[CODE.'articleCookie']:NULL;
		$objectid = json_decode($objectSee, TRUE);
		if (!isset($objectSee) || empty($objectSee)) {
			setcookie(CODE.'articleCookie', json_encode(array(
				0 => $id
			)), time() + (86400 * 30), '/');
		}else{
			foreach ($objectid as $key) {
				$objectid[] = $id;
			}
			$objectid = array_values(array_unique($objectid));
			setcookie(CODE.'articleCookie', json_encode($objectid), time() + (86400 * 30), '/');
		}
		
		$data['articles_same'] = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title, slug, canonical, image, description, created',
			'table' => 'article',
			'where' => array('id!= ' => $detailArticle['id'], 'catalogueid' => $detailCatalogue['id'],'alanguage' => $this->fc_lang),
			'order_by' => 'order desc, id desc',
			'limit' => 6,
		), TRUE);
		
		/*$data['tag'] = $this->Autoload_Model->_get_where(array(
			'select' => 'tb1.id , tb1.title, tb1.canonical',
			'table' => 'tag as tb1',
			'join' => array(
				array('tag_relationship as tb2' , 'tb2.tagid = tb1.id', 'inner'),
			),
			'where' => array(
				'publish' => 0,
				'tb2.module' => 'article',
				'tb2.moduleid' => $id,'tb1.alanguage' => $this->fc_lang
			),
		), true);*/

		$data['module'] = 'article';
		$data['moduleid'] = $detailArticle['id'];
		$data['meta_title'] = !empty($detailArticle['meta_title'])?$detailArticle['meta_title']:$detailArticle['title'];
		$data['meta_description'] = html_entity_decode(htmlspecialchars_decode(!empty($detailArticle['meta_description'])?$detailArticle['meta_description']:cutnchar(strip_tags($detailArticle['description']), 300)));
		$data['meta_image'] = !empty($detailArticle['image'])?base_url($detailArticle['image']):'';
		$data['detailArticle'] = $detailArticle;
		$data['detailCatalogue'] = $detailCatalogue;
		$data['canonical'] = rewrite_url($detailArticle['canonical'], TRUE, TRUE);
		$data['og_type'] = 'article';


        $data['template'] = 'article/frontend/article/view';

		$this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);
	}



    public function listFAQ()
    {
        $page = (int)$this->input->post('page');
        $page_catalogue = $this->Autoload_Model->_get_where(array( //trả lại all số bản ghi
            'select' => 'id',
            'table' => 'page_catalogue',
            'where' => array('publish' => 0,'isaside' => 1),
        ));


        //Tính tổng số bản ghi của trang danh mục
        $config['total_rows'] = $this->Autoload_Model->_get_where(array( //trả lại all số bản ghi
            'select' => 'id',
            'table' => 'page',
            'where' => array('publish' => 0,'catalogueid' => $page_catalogue['id']),
            'count' => TRUE,
        ));
        $listComment = '';
        if ($config['total_rows'] > 0) {
            $this->load->library('pagination');
            $config['base_url'] = '#" data-page="';
            $config['suffix'] = $this->config->item('url_suffix') . (!empty($_SERVER['QUERY_STRING']) ? ('?' . $_SERVER['QUERY_STRING']) : '');
            $config['first_url'] = $config['base_url'] . $config['suffix'];
            $config['per_page'] = 20;
            $config['cur_page'] = $page;
            $config['page'] = $page;
            $config['uri_segment'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            $config['full_tag_open'] = '<div class="ajax-pagination pagination">';
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
            $data['listPagination'] = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows'] / $config['per_page']);
            //print_r($data['listPagination']);
            $page = ($page <= 0) ? 1 : $page;
            $page = ($page > $totalPage) ? $totalPage : $page;
            $page = $page - 1;
            $data['listComment'] = $this->Autoload_Model->_get_where(array(
                'select' => '*',
                'table' => 'page',
                'where' => array('publish' => 0,'catalogueid' => $page_catalogue['id']),
                'limit' => $config['per_page'],
                'start' => $page * $config['per_page'],
                'order_by' => 'order asc,id desc',
            ), TRUE);

            if (isset($data['listComment']) && is_array($data['listComment']) && count($data['listComment'])) {
                foreach ($data['listComment'] as $key => $val) {

                    $listComment .= '<div class="item_faq_ts">
                                        <div class="stt_item_faq_ts">'.($key+1).'</div>
                                        <div class="title_item_faq_ts">

                                            <p class="title">'.$val['title'].'
                                            </p>

                                            <div class="box_reply box_reply'.$val['id'].'">
                                                <p>'.$val['description'].'</p>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="changeReply">
                                                <a href="javascript:void(0)" onclick="view_reply('.$val['id'].')"
                                                   class="view_reply view_reply'.$val['id'].'">Xem trả lời</a>
                                                <a href="javascript:void(0)" onclick="hide_reply('.$val['id'].')"
                                                   class="hide_reply hide_reply'.$val['id'].'">Ẩn câu trả lời</a>
                                            </div>

                                        </div>

                                    </div>
                                    <hr>
                                    <div class="clearfix"></div>';




                }
            }
        }
        echo json_encode(array(
            'listComment' => $listComment,
            'paginationList' => isset($data['listPagination']) ? $data['listPagination'] : '',
        ));
        die;
    }
	
}
