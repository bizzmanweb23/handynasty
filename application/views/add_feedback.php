<div class="content-wrapper">
    <!-- Content Header (Page header) --> 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Feedback</h1><small>New Feedback</small>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px">
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/welcome/post_add_feedback')?>" method="post" enctype="multipart/form-data">
                 <div class="row">
                   <div class="col-md-4">    
                <div class="form-group ">
                    <label for="user_id" class="col-sm-6 control-label">User Id
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <select  class="form-control chosen chosen-select-deselect" name="user_id" id="user_id" data-placeholder="Select User Id" >
                            <option>Select User Id</option>
                        <?php foreach($user as $users): ?>
                        <option value="<?= $users['first_name']?>"><?= $users['first_name']?></option>
                      <?php endforeach; ?> 
                                
                          </select>
                      </div>
                </div>      
                </div>               
                <?php if($this->session->userdata('branch_id')==null){?>
                  <div class="col-md-4">
                <div class="form-group ">
                    <label for="branch" class="col-sm-6 control-label">Branch Name
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <select  class="form-control chosen chosen-select-deselect" name="branch" id="branch" data-placeholder="Select Branch">
                            <option>Select Branch</option>
                        <?php foreach($branch as $branches): ?>
                        <option value="<?= $branches['id']?>"><?= $branches['branch_name']?></option>
                      <?php endforeach; ?>         
                          </select>
                      </div>
                </div>  
                </div> 
                 <?php } else { ?>
                  <div class="col-md-4">
                  <div class="form-group ">
                    <label for="branch" class="col-sm-6 control-label">Branch Name
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <input type="text" name="branch" class="form-control" value="<?= $name; ?>" readonly>
                          <input type="hidden" name="branch" value="<?php echo $this->session->userdata('branch_id')?>">
                      </div>
                </div>  
                </div>
                <?php } ?> 
                <div class="col-md-4">             
                 <div class="form-group ">
                    <label for="rate" class="col-sm-6 control-label">Rate <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="rate" id="rate" placeholder="Rate" value="">
                        <small class="info help-block">
                        <b>Input Discount</b> Max Length : 11.</small>
                    </div>
                 </div>
                 </div>  
                 </div>
                 <div class="form-group ">
                      <label for="comment" class="col-sm-2 control-label">Comment
                      <i class="required">*</i>
                      </label>
                        <div class="col-sm-8">
                            <textarea id="comment" name="comment" rows="5" cols="80" class=""></textarea>
                        </div>
                  </div>     
                                                 
                      <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
 </div> 