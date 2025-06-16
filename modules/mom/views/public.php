<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php get_template_part('header'); ?>
<div class="container">
    <h3 class="tw-mt-4"><?php echo _d($mom->meeting_date); ?></h3>
    <div class="panel_s">
        <div class="panel-body">
            <?php echo $mom->description; ?>
        </div>
    </div>
</div>
<?php get_template_part('footer'); ?>
