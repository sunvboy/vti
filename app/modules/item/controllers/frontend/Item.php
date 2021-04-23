<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Item extends MY_Controller {



	public $module;

	function __construct() {

		parent::__construct();


		$this->module = 'item';

		$this->fc_lang = $this->config->item('fc_lang');

	}

	

	public function view($id = 0){


		$id = (int)$id;
		$publish_time = gmdate('Y-m-d H:i:s', time() + 7*3600);
        $detailArticle = $this->Autoload_Model->_get_where(array(

            'select' => '*',

            'table' => 'item',

            'where' => array('id' => $id,'publish' => 0),
        ));






		$data['moduleid'] = $detailArticle['id'];

		$data['meta_title'] = !empty($detailArticle['meta_title'])?$detailArticle['meta_title']:$detailArticle['title'];

		$data['meta_description'] = html_entity_decode(htmlspecialchars_decode(!empty($detailArticle['meta_description'])?$detailArticle['meta_description']:cutnchar(strip_tags($detailArticle['description']), 300)));

		$data['meta_image'] = !empty($detailArticle['image'])?base_url($detailArticle['image']):'';

		$data['detailArticle'] = $detailArticle;

		$data['canonical'] = rewrite_url($detailArticle['canonical'], TRUE, TRUE);

		$data['og_type'] = 'article';

        $data['template'] = 'item/frontend/item/view';

        $this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);

	}

	

	

}

