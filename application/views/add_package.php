<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Package List</h1><small>New Package List</small>
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
                <form id="add_package" action="<?= base_url('admin/welcome/post_add_package')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="package_name" class="col-sm-6 control-label">Package Name <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="package_name" id="package_name" placeholder="Package Name Max Length : 100." value="">
                    </div>
                </div>      
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="package_name_mandarin" class="col-sm-6 control-label">Package Name Mandarin<i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="package_name_mandarin" id="package_name_mandarin" placeholder="Package Name Mandarin Max Length : 200." value="">
                    </div>
                </div>  
                </div>
                </div>  
                <?php if($this->session->userdata('branch_id')==null){?>
                <div class="form-group ">
                    <label for="branch" class="col-sm-2 control-label">Branch Name
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-8">
                          <select  class="form-control chosen chosen-select-deselect" name="branch" id="branch" data-placeholder="Select Branch">
                            <option>Select Branch</option>
                        <?php foreach($branch as $branches): ?>
                        <option value="<?= $branches['id']?>"><?= $branches['branch_name']?></option>
                      <?php endforeach; ?>         
                          </select>
                      </div>
                </div>   
                 <?php } else { ?>
                  <div class="form-group ">
                    <label for="branch" class="col-sm-2 control-label">Branch Name
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-8">
                          <input type="text" name="branch" class="form-control" value="<?= $name; ?>" readonly>
                          <input type="hidden" name="branch" value="<?php echo $this->session->userdata('branch_id')?>">
                      </div>
                </div>  
                <?php } ?> 
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="package_detail" class="col-sm-6 control-label">Package Detail <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="package_detail" id="package_detail" placeholder="Package Detail Max Length : 100." value="">
                    </div>
                </div>     
                </div> 
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="package_detail_mandarin" class="col-sm-6 control-label">Package Detail Mandarin<i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="package_detail_mandarin" id="package_detail_mandarin" placeholder="Package Detail Mandarin Max Length : 250." value="">
                    </div>
                </div>  
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                 <div class="form-group ">
                    <label for="package_price" class="col-sm-6 control-label">Package Price <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="package_price" id="package_price" placeholder="Package Detail Max Length : 100." value="">
                    </div>
                </div> 
                </div>
                <div class="col-md-6">
                 <div class="form-group ">
                    <label for="package_credits" class="col-sm-6 control-label">Package Credits<i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="package_credits" id="package_credits" placeholder="Package Credits Max Length : 11." value="">
                    </div>
                </div>  
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