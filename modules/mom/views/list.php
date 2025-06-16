<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h4 class="tw-mb-4">
                    <?php echo _l('mom_list'); ?>
                    <?php if($project_id){ ?>
                        <a href="<?php echo admin_url('mom/add/'.$project_id); ?>" class="btn btn-primary pull-right">
                            <?php echo _l('new_mom'); ?>
                        </a>
                    <?php } ?>
                </h4>
                <table class="table table-mom">
                    <thead>
                        <tr>
                            <th><?php echo _l('meeting_date'); ?></th>
                            <th><?php echo _l('description'); ?></th>
                            <th><?php echo _l('options'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mom_notes as $mom){ ?>
                            <tr>
                                <td><?php echo _d($mom->meeting_date); ?></td>
                                <td><?php echo $mom->description; ?></td>
                                <td>
                                    <a href="<?php echo admin_url('mom/edit/'.$mom->id); ?>" class="btn btn-default btn-icon"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo admin_url('mom/delete/'.$mom->id); ?>" class="btn btn-danger btn-icon _delete"><i class="fa fa-remove"></i></a>
                                    <a href="<?php echo site_url('mom/public_view/'.$mom->hash); ?>" target="_blank" class="btn btn-info btn-icon"><i class="fa fa-link"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
