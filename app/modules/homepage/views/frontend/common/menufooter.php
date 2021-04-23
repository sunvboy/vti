<?php $main_nav = navigation(array('keyword' => 'footer', 'output' => 'array'), $this->fc_lang); ?>
<?php if (isset($main_nav) && is_array($main_nav) && count($main_nav)) { ?>
    <?php foreach ($main_nav as $key => $val) { ?>
        <?php if (isset($val['children']) && is_array($val['children']) && count($val['children'])) { ?>
            <?php if ($key == 0) { ?>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="wp-ft">
                        <h3 class="h3-title-ft"><?php echo $val['title']; ?></h3>
                        <ul class="ul-b list-ft list-ft1">
                            <?php foreach ($val['children'] as $keyItem => $valItem) { ?>
                                <li><a href="<?php echo $valItem['link'] ?>"><?php echo $valItem['title'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } else { ?>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="wp-ft">
                        <h3 class="h3-title-ft"><?php echo $val['title']; ?></h3>
                        <ul class="ul-b list-ft">
                            <?php foreach ($val['children'] as $keyItem => $valItem) { ?>
                                <li><a href="<?php echo $valItem['link'] ?>"><?php echo $valItem['title'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="social-link">
                            <h3 class="title"><?php echo $this->lang->line('Social_Links')?>:</h3>
                            <a href="<?php echo $this->fcSystem['social_facebook'] ?>" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo $this->fcSystem['social_twitter'] ?>" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                            <a href="<?php echo $this->fcSystem['social_instagram'] ?>" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            <a href="<?php echo $this->fcSystem['social_youtube'] ?>" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    <?php } ?>
<?php } ?>

