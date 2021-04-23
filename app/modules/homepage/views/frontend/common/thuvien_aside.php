<div class="col-md-3 col-sm-4 col-xs-12">
    <h2 class="h2_page"><?php echo $detailCatalogue['title']?></h2>

    <?php
    $c_thuvien = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical',
        'table' => 'media_catalogue',
        'where' => array( 'publish' => 0, 'alanguage' => $this->fc_lang)),TRUE);
    ?>
    <div class="clearfix"></div>
    <?php if (isset($c_thuvien) && is_array($c_thuvien) && count($c_thuvien)) { ?>
    <aside class="aside_menu">
        <ul>

            <?php foreach ($c_thuvien as $k => $v) {
                $href = rewrite_url($v['canonical'], TRUE, TRUE); ?>
                <li class="menu-item"><a href="<?php echo $href ?>"><?php echo $v['title'] ?></a></li>
            <?php } ?>
        </ul>

    </aside>
    <?php }?>
    <?php
    $tintuc_thuvien = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical,description',
        'table' => 'article_catalogue',
        'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
    if (isset($tintuc_thuvien) && is_array($tintuc_thuvien) && count($tintuc_thuvien)) {
        $tintuc_thuvien['post'] = $this->Autoload_Model->_condition(array(
            'module' => 'article',
            'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`created`, `object`.`catalogueid`',
            'where' => '`object`.`publish_time` <= \'' . gmdate('Y-m-d H:i:s', time() + 7*3600) . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
            'catalogueid' => $tintuc_thuvien['id'],
            'limit' => 5,
            'order_by' => '`object`.`order` asc, `object`.`id` asc',
        ));
    }
    ?>
    <div class="clearfix-20"></div>

    <?php if (isset($tintuc_thuvien) && is_array($tintuc_thuvien) && count($tintuc_thuvien)) { ?>
        <?php if (isset($tintuc_thuvien['post']) && is_array($tintuc_thuvien['post']) && count($tintuc_thuvien['post'])) { ?>
            <h2 class="h2_page"><?php echo $tintuc_thuvien['title'] ?> nổi bật</h2>
            <aside class="aside_blog">
                <ul>
                    <?php $i = 0;
                    foreach ($tintuc_thuvien['post'] as $keyP => $valP) {
                        $i++;
                        $href = rewrite_url($valP['canonical'], true, true);
                        ?>
                        <li>

                            <div class="img_aside_blog">
                                <a href="<?php echo $href ?>"><img src="<?php echo $valP['image'] ?>"
                                                                   alt="<?php echo $valP['title'] ?>"></a>
                            </div>
                            <div class="title_aside_blog">
                                <a href="<?php echo $href ?>"><?php echo $valP['title'] ?>
                                </a>

                            </div>

                        </li>
                    <?php } ?>

                </ul>

            </aside>
        <?php } ?>
    <?php } ?>

</div>
