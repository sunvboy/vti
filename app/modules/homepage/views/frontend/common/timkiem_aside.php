<div class="col-md-3 col-sm-4 col-xs-12">
    <h2 class="h2_page">Kết quả tìm kiếm</h2>


    <?php
    $tintuc_timkiem = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical,description',
        'table' => 'article_catalogue',
        'order_by' => 'order asc,id desc',
        'where' => array('parentid' => 0, 'publish' => 0, 'alanguage' => $this->fc_lang)),TRUE);
 
    ?>

    <div class="clearfix"></div>
    <?php if (isset($tintuc_timkiem) && is_array($tintuc_timkiem) && count($tintuc_timkiem)) { ?>
        <aside class="aside_menu">
            <ul>
                <?php foreach ($tintuc_timkiem as $k => $v) {
                    $href = rewrite_url($v['canonical'], TRUE, TRUE); ?>
                    <li class="menu-item"><a href="<?php echo $href ?>"><?php echo $v['title'] ?></a></li>
                <?php } ?>
            </ul>
        </aside>
    <?php } ?>



</div>