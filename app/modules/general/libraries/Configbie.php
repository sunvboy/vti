<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class ConfigBie{



    function __construct($params = NULL){

        $this->params = $params;

    }



    // meta_title là 1 row -> seo_meta_title

    // contact_address

    // chưa có thì insert

    // có thì update
    public function system(){
        $data['homepage'] =  array(
            'label' => 'Thông tin chung',
            'description' => 'Cài đặt đầy đủ thông tin chung của website. Tên thương hiệu website. Logo của website và icon website trên tab trình duyệt',
            'value' => array(
                'brandname' => array('type' => 'text', 'label' => 'Tên thương hiệu'),
                'company' => array('type' => 'text', 'label' => 'Tên công ty'),
                'logo' => array('type' => 'images', 'label' => 'Logo'),
                'logo_2' => array('type' => 'images', 'label' => 'Logo footer'),
                'favicon' => array('type' => 'images', 'label' => 'Favicon'),
//                'aboutus' => array('type' => 'textarea', 'label' => 'Giới thiệu'),
                'copyright' => array('type' => 'text', 'label' => 'Copyright'),


            ),

        );

        $data['contact'] =  array(
            'label' => 'Thông tin liên lạc',
            'description' => 'Cấu hình đầy đủ thông tin liên hệ giúp khách hàng dễ dàng tiếp cận với dịch vụ của bạn',
            'value' => array(
                'address' => array('type' => 'text', 'label' => 'Địa chỉ'),
                'tglv' => array('type' => 'text', 'label' => 'Thời gian làm việc'),
                'hotline' => array('type' => 'text', 'label' => 'Hotline'),
                'phone' => array('type' => 'text', 'label' => 'Phone'),
                'email' => array('type' => 'text', 'label' => 'Email'),
                'email_1' => array('type' => 'text', 'label' => 'Email gửi thông tin tuyển sinh'),

                'website' => array('type' => 'text', 'label' => 'Website'),
                'map' => array('type' => 'textarea', 'label' => 'Bản đồ'),
            ),
        );
        $data['seo'] =  array(

            'label' => 'SEO',

            'description' => 'Cài đặt đầy đủ Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.',

            'value' => array(

                'meta_title' => array('type' => 'text', 'label' => 'Tiêu đề trang','extend' => ' trên 70 kí tự', 'class' => 'meta-title', 'id' => 'titleCount'),

                'meta_description' => array('type' => 'textarea', 'label' => 'Mô tả trang','extend' => ' trên 320 kí tự', 'class' => 'meta-description', 'id' => 'descriptionCount'),
                'meta_images' => array('type' => 'images', 'label' => 'Ảnh'),

            ),

        );

        $data['social'] =  array(
            'label' => 'SOCIAL',
            'description' => 'Cài đặt đầy đủ Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.',
            'value' => array(
                'facebook' => array('type' => 'text', 'label' => 'Facebook'),
                'instagram' => array('type' => 'text', 'label' => 'Instagram'),
                'twitter' => array('type' => 'text', 'label' => 'Twitter'),
                'google_plus' => array('type' => 'text', 'label' => 'Google plus'),
//                'pinterest' => array('type' => 'text', 'label' => 'Pinterest'),
                'youtube' => array('type' => 'text', 'label' => 'Youtube'),
//                'linkedin' => array('type' => 'text', 'label' => 'Linkedin'),
//                'skype' => array('type' => 'text', 'label' => 'Skype'),
                'zalo' => array('type' => 'text', 'label' => 'Số zalo'),
            ),
        );

       $data['script'] =  array(
           'label' => 'SCRIPT',
           'description' => '',
           'value' => array(
               'header' => array('type' => 'textarea', 'label' => 'Script header'),
               'footer' => array('type' => 'textarea', 'label' => 'Script footer'),

           ),
       );
        $data['banner'] =  array(

            'label' => 'Banner',

            'description' => '',

            'value' => array(


                'banner1' => array('type' => 'images', 'label' => 'Banner liên hệ'),
                'banner2' => array('type' => 'images', 'label' => 'Banner blog'),
                'banner3' => array('type' => 'images', 'label' => 'Banner đối tác'),
                'banner4' => array('type' => 'images', 'label' => 'Banner học viên'),
                'banner5' => array('type' => 'images', 'label' => 'Banner chuyên gia'),
                'banner6' => array('type' => 'images', 'label' => 'Banner về chúng tôi'),
                'banner7' => array('type' => 'images', 'label' => 'Banner khóa học'),
                'banner8' => array('type' => 'images', 'label' => 'Banner khóa học cho người mới bắt đầu - đã biết'),
                'banner9' => array('type' => 'images', 'label' => 'Banner thư viện video'),
                'banner10' => array('type' => 'images', 'label' => 'Banner tìm kiếm'),
                'banner11' => array('type' => 'images', 'label' => 'Banner Đào tạo doanh nghiệp'),


            ),

        );
        $data['lydo'] =  array(
            'label' => 'Lý do lựa chọn chúng tôi',
            'description' => '',
            'value' => array(
                'i' => array('type' => 'images', 'label' => 'image'),
                'i_2' => array('type' => 'text', 'label' => 'title xem thêm'),
                'l_2' => array('type' => 'text', 'label' => 'link icon xem thêm'),
            ),

        );
        $data['a'] =  array(
            'label' => 'Về chúng tôi',
            'description' => '',
            'value' => array(
                'i' => array('type' => 'images', 'label' => 'image welcome'),
                'i_2' => array('type' => 'text', 'label' => 'title giới thiệu chung'),
                'i_3' => array('type' => 'text', 'label' => 'VTI Academy'),
                'i_4' => array('type' => 'editor', 'label' => 'Mô tả VTI Academy'),
                'i_5' => array('type' => 'editor', 'label' => 'Mô tả video'),
                'i_6' => array('type' => 'images', 'label' => 'image video'),
                'i_7' => array('type' => 'text', 'label' => 'icon video'),
            ),

        );
        $data['t'] =  array(
            'label' => 'Tiêu đề',
            'description' => '',
            'value' => array(
                't_1' => array('type' => 'text', 'label' => 'Giá trị nhận được sau khóa học'),
                't_2' => array('type' => 'text', 'label' => 'Giới thiệu về chương trình'),
                't_3' => array('type' => 'text', 'label' => 'Khung chương trình'),

            ),

        );
        $data['li'] =  array(
            'label' => 'Link',
            'description' => '',
            'value' => array(
                'li1' => array('type' => 'images', 'label' => 'Ảnh youtube'),
                'li1_l' => array('type' => 'text', 'label' => 'LINK Ảnh youtube'),
                'li2' => array('type' => 'images', 'label' => 'Ảnh cộng động học viên'),
                'li2_l' => array('type' => 'text', 'label' => 'LINK Ảnh cộng động học viên'),
                'li3' => array('type' => 'images', 'label' => 'Ảnh cộng đồng việc làm CNTT'),
                'li3_l' => array('type' => 'text', 'label' => 'LINK Ảnh cộng đồng việc làm CNTT'),

            ),

        );
        return $data;

    }

}

