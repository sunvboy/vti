<?php
$attribute_catalogues_aside = $this->Autoload_Model->_get_where(array(
    'select' => 'id, title,ishome,highlight',
    'table' => 'attribute_catalogue',
    'order_by' => 'order asc,id desc',
    'where' => array('room' => 1, 'issearch' => 1, 'publish' => 0, 'parentid' => 0, 'alanguage' => $this->fclang)), TRUE);
if (isset($attribute_catalogues_aside) && is_array($attribute_catalogues_aside) && count($attribute_catalogues_aside)) {
    foreach ($attribute_catalogues_aside as $key => $val) {
        $attribute_catalogues_aside[$key]['post'] = $this->Autoload_Model->_get_where(array(
            'select' => 'id, title',
            'table' => 'attribute',
            'order_by' => 'order asc,title asc',
            'where' => array('publish' => 0, 'catalogueid' => $val['id'], 'alanguage' => $this->fclang)), TRUE);
    }
}

?>

<section class="top-content">
    <div class="container">
        <div class="nav-top-content">
            <h2 class="title"><?php echo $this->lang->line('Advancesearch')?></h2>
            <form action="search-filter.html" method="get">
                <div class="item">
                    <?php echo form_dropdown('catalogueid', dropdown(array(
                        'text' => $this->lang->line('AllTypes'),
                        'select' => 'id, title',
                        'table' => 'product_catalogue',
                        'query' => array('alanguage' => $this->fc_lang),
                        'field' => 'id',
                        'value' => 'title',
                        'order_by' => 'title asc'
                    )), set_value('catalogueid'), 'class=""'); ?>

                </div>
                <div class="item">
                    <?php echo form_dropdown('productAreaID', dropdown(array(
                        'text' => $this->lang->line('AllPlace'),
                        'select' => 'id, title',
                        'table' => 'product_area',
                        'field' => 'id',
                        'query' => array('alanguage' => $this->fc_lang),
                        'value' => 'title',
                        'order_by' => 'title asc'
                    )), set_value('productAreaID'), 'class=""'); ?>
                </div>
                <?php
                if (isset($attribute_catalogues_aside) && is_array($attribute_catalogues_aside) && count($attribute_catalogues_aside)) {
                    foreach ($attribute_catalogues_aside as $key => $val) {
                        if (isset($val['post']) && is_array($val['post']) && count($val['post'])) {

                            ?>
                            <div class="item">
                                <select class="filter">
                                    <option value=""><?php echo $val['title'] ?></option>
                                    <?php foreach ($val['post'] as $keyP => $valP) { ?>
                                        <option value="<?php echo $valP['id'] ?>"><?php echo $valP['title'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>


                <div class="item">
                    <input type="hidden" id="attr" class="form-control" name="attr" >
                    <input type="text" name="minPrice" placeholder="<?php echo $this->lang->line('MaxPrice') ?> (USD)">

                </div>
                <div class="item">

                    <input type="text" name="maxPrice" placeholder="<?php echo $this->lang->line('MaxPrice') ?> (USD)">
                </div>
                <div class="item">

                    <input type="text" name="code" placeholder="<?php echo $this->lang->line('FavoriteID') ?>">
                </div>
                <div class="item1">
                    <button type="submit"><?php echo $this->lang->line('searchProperties') ?></button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</section>
<style>
    @media (min-width: 767px) {
        .item1{
            position: absolute;
        }

    }
</style>
<script>
    $('.filter').change(function(e){
        var str = '';
        $('.filter').each(function(){
            if($(this).val() != 0 ){
                str = str + $(this).val() + '-';
            }
        });
        if(str.length > 0){
            str = str.substr(0, str.length - 1);
            $('#attr').val(str);
        }else{
            $('#attr').val('');
        }
    });
</script>
