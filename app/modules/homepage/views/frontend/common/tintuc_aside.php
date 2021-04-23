<div class="col-md-3 col-sm-4 col-xs-12">
    <h2 class="h2_page"><?php echo $detailCatalogue['title']?></h2>


    <?php
    $tintuc_aside = $this->Autoload_Model->_get_where(array(
        'select' => 'id, title,canonical,description',
        'table' => 'article_catalogue',
        'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
    if (isset($tintuc_aside) && is_array($tintuc_aside) && count($tintuc_aside)) {
        $tintuc_aside['child'] = $this->Autoload_Model->_get_where(array(
            'select' => 'id, title,canonical',
            'table' => 'article_catalogue',
            'where' => array('parentid' => $tintuc_aside['id'], 'publish' => 0, 'alanguage' => $this->fc_lang)), true);
        $tintuc_aside['post'] = $this->Autoload_Model->_condition(array(
            'module' => 'article',
            'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`created`, `object`.`catalogueid`',
            'where' => '`object`.`publish_time` <= \'' . gmdate('Y-m-d H:i:s', time() + 7*3600) . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
            'catalogueid' => $tintuc_aside['id'],
            'limit' => 5,
            'order_by' => '`object`.`order` asc, `object`.`id` asc',
        ));
    }
    ?>

    <div class="clearfix"></div>
    <?php if (isset($tintuc_aside['child']) && is_array($tintuc_aside['child']) && count($tintuc_aside['child'])) { ?>
        <aside class="aside_menu">
            <ul>
                <?php foreach ($tintuc_aside['child'] as $k => $v) {
                    $href = rewrite_url($v['canonical'], TRUE, TRUE); ?>
                    <li class="menu-item"><a href="<?php echo $href ?>"><?php echo $v['title'] ?></a></li>
                <?php } ?>
            </ul>
        </aside>
    <?php } ?>

    <div class="clearfix-20"></div>

    <?php if (isset($tintuc_aside) && is_array($tintuc_aside) && count($tintuc_aside)) { ?>
        <?php if (isset($tintuc_aside['post']) && is_array($tintuc_aside['post']) && count($tintuc_aside['post'])) { ?>
            <h2 class="h2_page"><?php echo $tintuc_aside['title'] ?> nổi bật</h2>
            <aside class="aside_blog">
                <ul>
                    <?php $i = 0;
                    foreach ($tintuc_aside['post'] as $keyP => $valP) {
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