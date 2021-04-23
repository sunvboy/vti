<?php
if (!$hocvien = $this->cache->get('hocvien')) {
    $hocvien = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical,description',
        'table' => 'job_catalogue',
        'where' => array('highlight' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
    if (isset($hocvien) && is_array($hocvien) && count($hocvien)) {
        $hocvien['post'] = $this->Autoload_Model->_condition(array(
            'module' => 'job',
            'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`content`',
            'where' => '`object`.`publish_time` <= \'' . gmdate('Y-m-d H:i:s', time() + 7*3600) . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
            'catalogueid' => $hocvien['id'],
            'limit' => 20,
            'order_by' => '`object`.`order` asc, `object`.`id` desc',
        ));
    }
    $this->cache->save('hocvien', $hocvien, 200);
}
?>
<?php if (isset($hocvien) && is_array($hocvien) && count($hocvien)) { ?>
    <?php if (isset($hocvien['post']) && is_array($hocvien['post']) && count($hocvien['post'])) { ?>
        <section class="section_5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5 wow fadeInLeft">
                        <h2 class="title-home"><?php echo $hocvien['title']?></h2>
                        <div class="clearfix"></div>
                        <div class="des_box_hocvien">
                            <?php echo $hocvien['description']?>
                        </div>
                        <div class="clearfix"></div>

                        <a href="<?php echo $hocvien['canonical']?>.html"><img src="template/frontend/images/xemtatca.png" alt="xem tất cả"></a>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="box_list_hocvien term wow fadeInRight">
                            <?php foreach ($hocvien['post'] as $v=>$k){?>
                                <div class="item">

                                    <div class="flex_vti_mobile">
                                        <div class="img_hv">
                                            <img src="<?php echo $k['image']?>" alt="<?php echo $k['title']?>">
                                            <img src="template/frontend/images/i-s-2.png" alt="đánh giá" style="width: auto;height: auto;border-radius: 0px;margin-top: 5px">

                                        </div>
                                        <div class="info_hv info_hv_pc">
                                            <div class="des_hv">
                                                <div class="hidden-xs"><?php echo $k['content']?></div>
                                                <div class="clearfix"></div>
                                                <h3><?php echo $k['title']?></h3>
                                                <p><?php echo strip_tags($k['description'])?></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="info_hv info_hv_mobile visible-xs">
                                        <div class="des_hv">
                                            <div class="des_hv_1"><?php echo $k['content']?></div>


                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                    </div>

                </div>

            </div>

        </section>
    <?php } ?>
<?php } ?>