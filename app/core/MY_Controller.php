<?php

(defined('BASEPATH')) or exit('No direct script access allowed');



class MY_Controller extends MX_Controller {



    public $auth;

    public $fcSystem;

    public $currentTime;

    public $search;

    public $replace;

    public $FT_auth;

    public $fclang;

    public $fc_lang;

    public function __construct(){



        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        $this->search = array('/\n/', // replace end of line by a space

            '/\>[^\S ]+/s', // strip whitespaces after tags, except space

            '/[^\S ]+\</s', // strip whitespaces before tags, except space

            '/(\s)+/s' // shorten multiple whitespace sequences

        );

        $this->replace = array(

            ' ',

            '>',

            '<',

            '\\1'

        );

        parent::__construct();

        $this->load->library(array(

            'commonbie','cart'

        ));

        $this->load->model(array(

            'dashboard/Autoload_Model'

        ));

        //kiểm tra tài khoản admin

        $this->auth = $this->commonbie->CheckBackendAuthentication();

        $this->currentTime =  gmdate('Y-m-d H:i:s', time() + 7*3600);

        //kiểm tra tài khoản ngoài frontend

        if(isset($_COOKIE[CODE.'customer'])){

            $this->FT_auth = $this->commonbie->CheckCustomerAuth();

        }





        //check language

        $fclang = $this->commonbie->CheckLang();

        if(!isset($fclang) || !empty($fclang)){

            $this->config->set_item('fclang', $fclang);

        }

        else{

            $this->config->set_item('fclang', 'vietnamese');

        }

        $this->fclang = $this->config->item('fclang');







        $language = $this->input->get('lang');

        if(isset($language) && !empty($language)){

            $fc_lang = isset($_COOKIE['fc_lang'])?$_COOKIE['fc_lang']:NULL;

            if(isset($fc_lang) && !empty($fc_lang)){

                setcookie('fc_lang', $language, time() + 3600, '/');

                $this->config->set_item('fc_lang', $language);

                if ($language == $_COOKIE['fc_lang']) {

                }

                else{

                    $this->cart->destroy();

                }

            }

            else

            {

                setcookie('fc_lang', 'vietnamese', time() + 3600, '/');

                $this->config->set_item('fc_lang', 'vietnamese');

            }

            redirect(BASE_URL);

        }

        else

        {

            $fc_lang = isset($_COOKIE['fc_lang'])?$_COOKIE['fc_lang']:NULL;

            if(isset($fc_lang) && !empty($fc_lang)){

                setcookie('fc_lang', $_COOKIE['fc_lang'], time() + 3600, '/');

                $this->config->set_item('fc_lang', $_COOKIE['fc_lang']);

            }

            else

            {

                setcookie('fc_lang', 'vietnamese', time() + 3600, '/');

                $this->config->set_item('fc_lang', 'vietnamese');

            }

        }

        $fc_lang = isset($_COOKIE['fc_lang'])?$_COOKIE['fc_lang']:NULL;

        if(isset($fc_lang) && !empty($fc_lang)){

            $this->lang->load('main_lang', $fc_lang);

        }

        else

        {

            $this->lang->load('main_lang', 'vietnamese');

        }





        /* LOAD TOÀN BỘ PHẦN CẤU HÌNH HỆ THỐNG RA */

        $system = $this->Autoload_Model->_get_where(array(

            'select' => 'keyword, content,content_lang,content_lang_korea',

            'table' => 'general',

            'where' => 'general',

            'order_by' => 'keyword asc',

        ), TRUE);

        if(isset($system) && is_array($system) && count($system)){

            foreach($system as $key => $val){
                if($this->config->item('fc_lang') == 'vietnamese'){
                    $language = $val['content'] ;
                }else if($this->config->item('fc_lang') == 'japan'){
                    $language = $val['content_lang'] ;
                }else if($this->config->item('fc_lang') == 'korea'){
                    $language = $val['content_lang_korea'] ;
                }
                $this->fcSystem[$val['keyword']] = $language;

            }

        }

        //end lang






    }





    public function load_extend_script(){

        return true;

    }

}