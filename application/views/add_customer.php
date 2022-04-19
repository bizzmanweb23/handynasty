<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1><small>New Customer</small>
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
                <form id="add_promotion" action="<?= base_url('admin/welcome/post_add_customer')?>" method="post">
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="first_name" class="col-sm-6 control-label">First Name 
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name Max Length : 100." value="">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="last_name" class="col-sm-6 control-label">Last Name
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name Max Length : 100." value="">
                      </div>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">   
                <div class="form-group ">
                    <label for="dob" class="col-sm-6 control-label">Date Of Birth 
                    </label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Input Date of Birth" value="">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="age" class="col-sm-6 control-label">Age
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="age" id="age"  value="" readonly>
                      </div>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-4">   
                <div class="form-group ">
                    <label for="email" class="col-sm-6 control-label">Email
                    </label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" id="email"  value="">
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group ">
                    <label for="contact" class="col-sm-6 control-label">Contact Number
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact number" value="">
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
                </div>
               
                 <div class="form-group ">
                      <label for="address" class="col-sm-2 control-label">Address
                      </label>
                        <div class="col-sm-8">
                            <textarea id="address" name="address" rows="5" cols="80" class=""></textarea>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#dob").change(function() {
    var dob = $('#dob').val();
    //console.log(dob);
    if(dob != ''){
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#age').val(age);
}
    
  })
  </script>
