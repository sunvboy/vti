<div class="col-md-3 col-sm-4 col-xs-12">
    <h2 class="h2_page"><?php echo $detailCatalogue['title'] ?></h2>

    <div class="clearfix"></div>
    <?php if (isset($detailCatalogue['post']) && is_array($detailCatalogue['post']) && count($detailCatalogue['post'])) { ?>
        <aside class="aside_menu">
            <ul>


                <?php foreach ($detailCatalogue['post'] as $k => $v) {
                    $href = rewrite_url($v['canonical'], TRUE, TRUE); ?>
                    <li class="menu-item"><a href="<?php echo $href ?>"><?php echo $v['title'] ?></a></li>
                <?php } ?>

            </ul>

        </aside>
    <?php } ?>

</div>