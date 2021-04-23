<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public $module;
	public function __construct(){
		parent::__construct();
		$this->load->helper(array("form", "url", "captcha"));
        $this->fc_lang = $this->config->item('fc_lang');

    }

	public function view(){

		$data['header'] = FALSE;
		$data['meta_title'] = 'Liên hệ';
		$data['meta_keyword'] = '';
		$data['meta_description'] = '';
		$data['template'] = 'contact/frontend/contact/view';
		$this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);
	}
    public function ajaxSendcontact(){
        $alert = array(
            'error' => '',
            'message' => 'Gửi thông tin liên hệ thành công!',
            'result' => ''
        );
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', ' / ');
        $this->form_validation->set_rules('fullname', 'Họ và tên', 'trim|required');
        $this->form_validation->set_rules('phone','Số điện thoại', 'trim|required|max_length[10]|min_length[10]');

        if ($this->form_validation->run()) {

            $insert = array(
                'fullname' => $this->input->post('fullname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'title' => 'Gửi thông tin liên hệ',
                'message' => $this->input->post('message'),
                'type' => 0,
                'created' => $this->currentTime,
            );
            $this->Autoload_Model->_create(array(
                'table' => 'contact',
                'data' => $insert
            ));
        } else {
            $alert['error'] = validation_errors();
        }
        echo json_encode($alert);
        die();
    }
	public function create(){
		$alert = array(
			'error' => '',
			'message' => '',
			'result' => ''
		);
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', ' / ');
		$this->form_validation->set_rules('fullname', 'Họ và tên', 'trim|required');
        $this->form_validation->set_rules('phone', $this->lang->line('Phone'), 'trim|required|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('message', 'Khóa học quan tâm', 'trim|required');
		if ($this->form_validation->run()){
			$insert = array(
				'fullname' => $this->input->post('fullname'),
				'phone' => $this->input->post('phone'),
				'message' => $this->input->post('message'),
				'title' => 'Đăng ký nhận tư vấn',
				'type' => 1,
				'created' => $this->currentTime,
			);
			$this->Autoload_Model->_create(array(
				'table' => 'contact',
				'data' => $insert
			));
            $this->load->helper('mymail');
            $this->load->library(array('mailbie'));
            $this->mailbie->sent(array(
                    'to' => $this->fcSystem['contact_email_1'],
                    'cc' => $this->fcSystem['contact_email_1'],
                    'subject' => 'Thông tin liên hệ: '.$this->fcSystem['contact_website'],
                    'message' => '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><div id="ht-order-email" style="max-width: 600px;margin: 0 auto;background: #fff;color: #444;font-size: 12px;font-family: Arial;line-height: 18px;"><div class="panel"><div class="panel-head" style="margin: 0 0 15px 0;padding: 35px 20px 10px 20px;border-bottom: 3px solid #00b7f1;"><table width="100%" cellpadding="0" cellspacing="0"><tbody></tbody></table></div><div class="panel-body"><div class="infor"><div class="title"><h3 style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;">Thông tin liên hệ</h3></div><table cellspacing="0" cellpadding="0" border="0" width="100%"><thead><tr></tr></thead><tbody><tr><td valign="top" style="padding:0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><span style="text-transform:capitalize">Họ và tên: '.$this->input->post('fullname').'</span><br>SĐT: '.$this->input->post('phone').'<br>Khóa học quan tâm: '.$this->input->post('message').'</td></tr></tbody></table></div><div class="detail"></div></div></div></div>'
                )
            );

		}else{
			$alert['error'] = validation_errors();
		}
		echo json_encode($alert); die();
	}



}
