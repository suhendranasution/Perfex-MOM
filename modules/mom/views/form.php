<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open(); ?>
            <?php $value = (isset($mom) ? _d($mom->meeting_date) : ''); ?>
            <?php echo render_date_input('meeting_date','meeting_date',$value); ?>
            <?php $content = (isset($mom) ? $mom->description : ''); ?>
            <?php echo render_textarea('description','mom_description',$content,['class'=>'tinymce']); ?>
            <button type="submit" class="btn btn-primary"><?php echo _l('submit'); ?></button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
<?php init_tail(); ?>
<?php require 'modules/mom/assets/mom_js.php'; ?>
