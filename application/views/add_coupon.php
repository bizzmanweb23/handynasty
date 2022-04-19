<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupons</h1><small>New Coupons</small>
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
                <form id="add_coupon" action="<?= base_url('admin/welcome/post_add_coupon')?>" method="post" enctype="multipart/form-data">
                <div class="row">  
                <div class="col-md-6"> 
                <div class="form-group ">
                    <label for="coupon_code" class="col-sm-6 control-label">Coupon Code <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Coupon Code" value="">
                        <small class="info help-block">
                        <b>Input Coupon Code</b> Max Length : 15.</small>
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
                  <div class="form-group ">
                      <label for="description" class="col-sm-2 control-label">Description 
                      <i class="required">*</i>
                      </label>
                        <div class="col-sm-8">
                            <textarea id="description" name="description" rows="5" cols="80" class=""></textarea>
                        </div>
                  </div>     
                  <div class="row">    
                    <div class="col-md-6">                
                  <div class="form-group ">
                    <label for="image" class="col-sm-6 control-label">Banner Icon 
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <div id="image"></div>
                          <input type="file" name="files[]" multiple required="">
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group ">
                    <label for="discount" class="col-sm-6 control-label">Discount <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="discount" id="discount" placeholder="Discount" value="">
                        <small class="info help-block">
                        <b>Input Discount</b> Max Length : 5.</small>
                    </div>
                 </div>
                 </div> 
                 </div>  
                 <div class="row">
                   <div class="col-md-6">    
                 <div class="form-group ">
                    <label for="loyalty_points" class="col-sm-6 control-label">Loyalty Points <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="loyalty_points" id="loyalty_points" placeholder="Loyalty Points" value="">
                    </div>
                 </div>
                 </div>
                 <div class="col-md-6">
                 <div class="form-group ">
                    <label for="status" class="col-sm-6 control-label">Status <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="">
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