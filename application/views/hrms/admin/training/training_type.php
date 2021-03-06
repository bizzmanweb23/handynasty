<?php
/* Training Type view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<div class="row m-b-1 <?php echo $get_animate;?>">
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<?php if(in_array('345',$role_resources_ids)) {?>
  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_type');?> </h3>
      </div>
      <div class="box-body">
        <?php $attributes = array('name' => 'add_type', 'id' => 'xin-form', 'autocomplete' => 'off', 'class' => 'm-b-1 add');?>
        <?php $hidden = array('user_id' => $session['user_id']);?>
        <?php echo form_open('hrms/admin/training_type/add_type', $attributes, $hidden);?>
        <div class="form-group">
          <label for="type_name"><?php echo $this->lang->line('left_training_type');?></label>
          <input type="text" class="form-control" name="type_name" placeholder="<?php echo $this->lang->line('left_training_type');?>">
        </div>
        <div class="form-actions box-footer">
          <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
  <?php $colmdval = 'col-md-8';?>
  <?php } else {?>
  <?php $colmdval = 'col-md-12';?>
  <?php } ?>
  <div class="<?php echo $colmdval;?>">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_training_types');?> </h3>
      </div>
      <div class="box-body">
        <div class="box-datatable table-responsive">
          <table class="datatables-demo table table-striped table-bordered" id="xin_table">
            <thead>
              <tr>
                <th><?php echo $this->lang->line('xin_action');?></th>
                <th><?php echo $this->lang->line('xin_type');?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
