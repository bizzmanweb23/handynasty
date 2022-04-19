
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Therapists</h1><small>New Therapists</small>
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
                <form id="add_promotion" action="<?= base_url('admin/welcome/post_add_therapist')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="name" class="col-sm-6 control-label">Name <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="">
                        <small class="info help-block">
                        <b>Input Name</b> Max Length : 200.</small>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="age" class="col-sm-6 control-label">Age 
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="">
                          <small class="info help-block">
                            <b>Input Name</b> Max Length : 3.
                          </small>
                      </div>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group ">
                    <label for="gender" class="col-sm-6 control-label">Gender
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="">
                          <small class="info help-block">
                            <b>Input Name</b> Max Length : 20.
                          </small>
                      </div>
                  </div>
                  </div>
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
                  </div>
                <?php } ?> 
                <div class="row">
                  <div class="col-md-4">     
                <div class="form-group ">
                    <label for="services" class="col-sm-6 control-label">Services 
                    </label>
                      <div class="col-sm-12">
                          <select  class="form-control chosen chosen-select-deselect" name="service" id="services" data-placeholder="Select Services" >
                            <option>Select Services</option>
                        <?php foreach($service as $services): ?>
                        <option value="<?= $services['service_name']?>"><?= $services['service_name']?></option>
                      <?php endforeach; ?> 
                                
                          </select>
                      </div>
                </div>  
                </div> 
                <div class="col-md-4">                              
                <div class="form-group ">
                    <label for="checkin" class="col-sm-6 control-label">Checkin
                    </label>
                    <div class="col-sm-12">
                        <input type="radio" class="" name="checkin" id="checkin" placeholder="Name" value="yes">Yes
                        <input type="radio" class="" name="checkin" id="checkin" placeholder="Name" value="no">No<br>
                    </div>
                </div>
                </div>    
                <div class="col-md-4">                              
                 <div class="form-group ">
                    <label for="mobile" class="col-sm-6 control-label">Mobile
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="">
                        <small class="info help-block">
                        <b>Input Mobile</b> Max Length : 20.</small>
                    </div>
                </div>
                </div>      
                </div>                        
                <div class="form-group ">
                    <label for="image" class="col-sm-2 control-label">Image 
                    </label>
                      <div class="col-sm-8">
                          <div id="image"></div>
                          <input type="file" name="files[]" multiple required="">
                          <small class="info help-block">
                          </small>
                      </div>
                </div>
                                                 
                      <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
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