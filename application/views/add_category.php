<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Category</h1><small>New Service Category</small>
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
                <form id="add_category" action="<?= base_url('admin/welcome/post_add_category')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">             
                <div class="form-group ">
                    <label for="name" class="col-sm-6 control-label">Category Name <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name Max Length : 100." value="">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="name_mandarin" class="col-sm-6 control-label">Category Mandarin Name
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="name_mandarin" id="name_mandarin" placeholder="Name Mandarin" value="">
                          <small class="info help-block">
                          </small>
                      </div>
                </div>
                </div>
                </div>
                  <div class="form-group ">
                    <label for="category" class="col-sm-6 control-label">Category Detail
                    <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                            <textarea id="details" name="details" rows="5" cols="80" class=""></textarea>
                            <small class="info help-block">
                            <b>Input Details</b> Max Length : 250.</small>
                        </div>
                  </div>
                  <div class="form-group ">
                    <label for="Mandarin_details" class="col-sm-6 control-label">Category Mandarin Detail
                    <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                            <textarea id="mandarin_details" name="mandarin_details" rows="5" cols="80" class=""></textarea>
                            <small class="info help-block">
                            <b>Input Details</b> Max Length : 250.</small>
                        </div>
                  </div>
                  <div class="row">
                  <?php if($this->session->userdata('branch_id')==null){?>
                    <div class="col-md-6">
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
                  <div class="col-md-6">
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
                     <div class="col-md-6">                    
                  <div class="form-group ">
                    <label for="image" class="col-sm-6 control-label">Image 
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <div id="promotions_image_galery"></div>
                          <input type="file" name="files[]" multiple required="">
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                  </div>      
                  </div>                                      
                       <div class="row">     
                         <div class="col-md-6">                       
                      <div class="form-group ">
                        <label for="status" class="col-sm-6 control-label">Status 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-12">
                              <select  class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status" >
                                <option value=""></option>
                                <option value="inactive">Inactive</option>
                                <option value="active">Active</option>
                              </select>
                            <small class="info help-block">
                            </small>
                        </div>
                      </div>
                      </div> 
                      <div class="col-md-6">                        
                      <div class="form-group ">
                        <label for="priority" class="col-sm-6 control-label">Priority 
                        </label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" name="priority" id="priority" placeholder="Priority" value="">
                              <small class="info help-block">
                              </small>
                          </div>
                      </div>
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