<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->fc_lang = $this->config->item('fc_lang');
        $this->fcDevice = $this->config->item('fcDevice');
        $this->load->library('session');
    }

    public function index()
    {
        $this->cache->clean();
        $publish_time = gmdate('Y-m-d H:i:s', time() + 7*3600);

        if (!$slide = $this->cache->get('slide')) {
            $slide = slide(array('keyword' => 'main-banner'), $this->fc_lang);
            $data['slide'] = $slide;
            $this->cache->save('slide', $slide, 200);
        } else {
            $data['slide'] = $slide;
        }

        /*
 if (!$icon = $this->cache->get('icon')) {
            $icon = slide(array('keyword' => 'partner'), $this->fc_lang);
            $data['icon'] = $icon;
            $this->cache->save('icon', $icon, 200);
        } else {
            $data['icon'] = $icon;
        }
       if (!$bannerhome = $this->cache->get('bannerhome')) {
           $bannerhome = slide(array('keyword' => 'banner-home'), $this->fc_lang);
           $data['bannerhome'] = $bannerhome;
           $this->cache->save('bannerhome', $bannerhome, 200);
       } else {
           $data['bannerhome'] = $bannerhome;
       }

       if (!$ykienkhachhang = $this->cache->get('ykienkhachhang')) {
           $ykienkhachhang = $this->Autoload_Model->_get_where(array(
               'select' => 'id, title',
               'table' => 'page_catalogue',
               'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)), true);
           if (isset($ykienkhachhang) && is_array($ykienkhachhang) && count($ykienkhachhang)) {
               foreach ($ykienkhachhang as $key => $val) {
                   $ykienkhachhang[$key]['post'] = $this->Autoload_Model->_condition(array(
                       'module' => 'page',
                       'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`description`, `object`.`content`',
                       'where' => '`object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
                       'catalogueid' => $val['id'],
                       'limit' => 1000,
                       'order_by' => '`object`.`order` asc, `object`.`id` asc',
                   ));
               }
           }
           $data['ykienkhachhang'] = $ykienkhachhang;
           $this->cache->save('ykienkhachhang', $ykienkhachhang, 200);
       } else {
           $data['ykienkhachhang'] = $ykienkhachhang;
       }
       */
        $data['page_thanhtich'] = $this->Autoload_Model->_get_where(array(
            'select' => 'page_1',
            'table' => 'page',
            'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));

        if (!$chuongtrinhdaotao = $this->cache->get('chuongtrinhdaotao')) {
            $chuongtrinhdaotao = $this->Autoload_Model->_get_where(array(
                'select' => 'id, title,canonical',
                'table' => 'job_catalogue',
                'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
            if (isset($chuongtrinhdaotao) && is_array($chuongtrinhdaotao) && count($chuongtrinhdaotao)) {
                $chuongtrinhdaotao['post'] = $this->Autoload_Model->_condition(array(
                    'module' => 'job',
                    'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`',
                    'where' => '`object`.`publish_time` <= \'' . $publish_time . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
                    'catalogueid' => $chuongtrinhdaotao['id'],
                    'order_by' => '`object`.`order` asc, `object`.`id` desc',
                ));
            }
            $data['chuongtrinhdaotao'] = $chuongtrinhdaotao;
            $this->cache->save('chuongtrinhdaotao', $chuongtrinhdaotao, 200);
        } else {
            $data['chuongtrinhdaotao'] = $chuongtrinhdaotao;
        }
        if (!$giaovien = $this->cache->get('giaovien')) {
            $giaovien = $this->Autoload_Model->_get_where(array(
                'select' => 'id, title,canonical,description',
                'table' => 'job_catalogue',
                'where' => array('isfooter' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
            if (isset($giaovien) && is_array($giaovien) && count($giaovien)) {
                $giaovien['post'] = $this->Autoload_Model->_condition(array(
                    'module' => 'job',
                    'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`facebook`, `object`.`twitter`, `object`.`instagram`, `object`.`page_2`',
                    'where' => '`object`.`publish_time` <= \'' . $publish_time . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
                    'catalogueid' => $giaovien['id'],
                    'order_by' => '`object`.`order` asc, `object`.`id` desc',
                ));
            }
            $data['giaovien'] = $giaovien;
            $this->cache->save('giaovien', $giaovien, 200);
        } else {
            $data['giaovien'] = $giaovien;
        }
        if (!$doanhnghiep = $this->cache->get('doanhnghiep')) {
            $doanhnghiep = $this->Autoload_Model->_get_where(array(
                'select' => 'id, title,canonical,description',
                'table' => 'job_catalogue',
                'where' => array('isaside' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
            if (isset($doanhnghiep) && is_array($doanhnghiep) && count($doanhnghiep)) {
                $doanhnghiep['post'] = $this->Autoload_Model->_condition(array(
                    'module' => 'job',
                    'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`content`',
                    'where' => '`object`.`publish_time` <= \'' . $publish_time . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
                    'catalogueid' => $doanhnghiep['id'],
                    'limit' => 8,
                    'order_by' => '`object`.`order` asc, `object`.`id` desc',
                ));
            }
            $data['doanhnghiep'] = $doanhnghiep;
            $this->cache->save('doanhnghiep', $doanhnghiep, 200);
        } else {
            $data['doanhnghiep'] = $doanhnghiep;
        }
        //danh mục sản phẩm
//        if (!$product_catalog_ishome = $this->cache->get('product_catalog_ishome')) {
//            $product_catalog_ishome = $this->Autoload_Model->_get_where(array(
//                'select' => 'id, title, canonical',
//                'table' => 'product_catalogue',
//                'limit' => 1,
//                'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)), true);
//
//            if (isset($product_catalog_ishome) && is_array($product_catalog_ishome) && count($product_catalog_ishome)) {
//                foreach ($product_catalog_ishome as $key => $val) {
//                    // Danh mục con
////                     $product_catalog_ishome[$key]['child'] = $this->Autoload_Model->_get_where(array(
////                         'select' => 'id, title, slug, canonical, lft, rgt',
////                         'table' => 'product_catalogue',
////                         'limit' => 5,
////                         'where' => array('publish' => 0, 'parentid' => $val['id'])), true);
//                    // Sản phẩm thuộc danh mục lớn
//                    $product_catalog_ishome[$key]['post'] = $this->Autoload_Model->_condition(array(
//                        'module' => 'product',
//                        'select' => '`object`.`id`, `object`.`title`, `object`.`slug`, `object`.`canonical`, `object`.`image`, `object`.`price`, `object`.`price_sale`, `object`.`price_contact`,`object`.`description`,`object`.`donvi`,`object`.`supportID`,`object`.`productAreaID`',
//                        'where' => '`object`.`publish_time` <= \'' . $publish_time . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\'',
//                        'catalogueid' => $val['id'],
//                        'limit' => 20,
//                        'order_by' => '`object`.`order` asc, `object`.`id` asc',
//                    ));
//                }
//            }
//
//            $data['product_catalog_ishome'] = $product_catalog_ishome;
//            $this->cache->save('product_catalog_ishome', $product_catalog_ishome, 200);
//        } else {
//            $data['product_catalog_ishome'] = $product_catalog_ishome;
//        }

        /*
                if (!$product_catalog_highlight = $this->cache->get('product_catalog_highlight')) {
                    $product_catalog_highlight = $this->Autoload_Model->_get_where(array(
                        'select' => 'id, title, slug, canonical, lft, rgt',
                        'table' => 'product_catalogue',
                        'limit' => 10,
                        'where' => array('highlight' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)), true);

                    if (isset($product_catalog_highlight) && is_array($product_catalog_highlight) && count($product_catalog_highlight)) {
                        foreach ($product_catalog_highlight as $key => $val) {
                            // Danh mục con
                            $product_catalog_highlight[$key]['child'] = $this->Autoload_Model->_get_where(array(
                                'select' => 'id, title, slug, canonical, lft, rgt',
                                'table' => 'product_catalogue',
                                'limit' => 5,
                                'where' => array('publish' => 0, 'parentid' => $val['id'])), true);

                    // Sản phẩm thuộc danh mục lớn
                    $product_catalog_highlight[$key]['post'] = $this->Autoload_Model->_condition(array(
                        'module' => 'product',
                        'select' => '`object`.`id`, `object`.`title`, `object`.`slug`, `object`.`canonical`, `object`.`image`, `object`.`price`, `object`.`price_sale`, `object`.`price_contact`,`object`.`customerid`',
                        'where' => '`object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\'',
                        'catalogueid' => $val['id'],
                        'limit' => 4,
                        'order_by' => '`object`.`order` asc, `object`.`id` asc',
                    ));
                }
            }

            $data['product_catalog_highlight'] = $product_catalog_highlight;
            $this->cache->save('product_catalog_highlight', $product_catalog_highlight, 200);
        } else {
            $data['product_catalog_highlight'] = $product_catalog_highlight;
        }
        */
        $data['canonical'] = base_url();
        $data['meta_title'] = $this->fcSystem['seo_meta_title'];
        $data['meta_description'] = $this->fcSystem['seo_meta_description'];
        $data['meta_image'] = $this->fcSystem['seo_meta_images'];
        $data['og_type'] = 'product';

        //check hiển thị view
        $data['template'] = 'homepage/frontend/home/index';

        $this->load->view('homepage/frontend/layout/home', isset($data) ? $data : NULL);
    }


    public function doitac()
    {
        $publish_time = gmdate('Y-m-d H:i:s', time() + 7*3600);
        if (!$doanhnghiep = $this->cache->get('doanhnghiep')) {
            $doanhnghiep = $this->Autoload_Model->_get_where(array(
                'select' => 'id, title,canonical,description',
                'table' => 'job_catalogue',
                'where' => array('isaside' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
            if (isset($doanhnghiep) && is_array($doanhnghiep) && count($doanhnghiep)) {
                $doanhnghiep['post'] = $this->Autoload_Model->_condition(array(
                    'module' => 'job',
                    'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`content`',
                    'where' => '`object`.`publish_time` <= \'' . $publish_time . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
                    'catalogueid' => $doanhnghiep['id'],
                    'limit' => 16,
                    'order_by' => '`object`.`order` asc, `object`.`id` desc',
                ));
            }
            $data['doanhnghiep'] = $doanhnghiep;
            $this->cache->save('doanhnghiep', $doanhnghiep, 200);
        } else {
            $data['doanhnghiep'] = $doanhnghiep;
        }

        if (!$partner = $this->cache->get('partner')) {
            $partner = slide(array('keyword' => 'partner'), $this->fc_lang);
            $data['partner'] = $partner;
            $this->cache->save('partner', $partner, 200);
        } else {
            $data['partner'] = $partner;
        }
        $data['canonical'] = 'doi-tac';
        $data['meta_title'] = 'Đối tác';
        $data['meta_description'] = $this->fcSystem['seo_meta_description'];
        $data['meta_image'] = $this->fcSystem['seo_meta_images'];
        $data['og_type'] = 'product';
        $data['template'] = 'homepage/frontend/home/doitac';
        $this->load->view('homepage/frontend/layout/home', isset($data) ? $data : NULL);
    }
    public function gioithieu()
    {

        if (!$vechungtoi = $this->cache->get('vechungtoi')) {
            $vechungtoi = slide(array('keyword' => 've-chung-toi'), $this->fc_lang);
            $data['vechungtoi'] = $vechungtoi;
            $this->cache->save('vechungtoi', $vechungtoi, 200);
        } else {
            $data['vechungtoi'] = $vechungtoi;
        }
        $data['canonical'] = 'doi-tac';
        $data['meta_title'] = 'Về chúng tôi';
        $data['meta_description'] = $this->fcSystem['seo_meta_description'];
        $data['meta_image'] = $this->fcSystem['seo_meta_images'];
        $data['og_type'] = 'product';
        $data['template'] = 'homepage/frontend/home/gioithieu';
        $this->load->view('homepage/frontend/layout/home', isset($data) ? $data : NULL);
    }
}

