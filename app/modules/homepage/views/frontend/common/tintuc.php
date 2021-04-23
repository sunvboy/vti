<?php
$tintuc = $this->Autoload_Model->_get_where(array(
    'select' => 'id, title,canonical',
    'table' => 'article_catalogue',
    'where' => array('ishome' => 1, 'publish' => 0, 'alanguage' => $this->fc_lang)));
if (isset($tintuc) && is_array($tintuc) && count($tintuc)) {
    $tintuc['post'] = $this->Autoload_Model->_condition(array(
        'module' => 'article',
        'select' => '`object`.`id`, `object`.`title`, `object`.`image`, `object`.`canonical`, `object`.`description`, `object`.`created`, `object`.`catalogueid`',
        'where' => '`object`.`publish_time` <= \'' . gmdate('Y-m-d H:i:s', time() + 7 * 3600) . '\' AND `object`.`publish` = 0 AND `object`.`alanguage` = \'' . $this->fc_lang . '\' ',
        'catalogueid' => $tintuc['id'],
        'limit' => 8,
        'order_by' => '`object`.`order` asc, `object`.`id` desc',
    ));
}
if (isset($tintuc) && is_array($tintuc) && count($tintuc)) { ?>


    <?php if (isset($tintuc['post']) && is_array($tintuc['post']) && count($tintuc['post'])) { ?>
        <section class="section_6 wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-home w_100 text-center"><?php echo $tintuc['title'] ?></h2>
                        <div class="clearfix-40 visible-lg visible-md visible-sm"></div>
                        <div class="clearfix-10 visible-xs"></div>
                        <div class="owl-tintuc owl-carousel owl-theme">
                            <?php foreach ($tintuc['post'] as $keyC => $valC) {
                                $hrefC = rewrite_url($valC['canonical'], true, true); ?>


                                <div class="item">
                                    <div class="item_new_img">
                                        <a href="<?php echo $hrefC ?>"><img src="<?php echo $valC['image'] ?>"
                                                                            alt="<?php echo $valC['title'] ?>"></a>

                                    </div>
                                    <div class="item_new_info">
                                        <h3><a href="<?php echo $hrefC ?>"><?php echo $valC['title'] ?></a></h3>

                                        <div class="line-new"></div>
                                        <div class="clearfix"></div>
                                        <a href="<?php echo $hrefC ?>">
                                            <div class="date_new">
                                                <p>Ngày đăng: <?php echo $valC['created'] ?></p>

                                            </div>
                                        </a>

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