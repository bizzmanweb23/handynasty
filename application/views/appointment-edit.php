<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appointments</h1>
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
                <form id="add_promotion" action="<?= base_url('admin/welcome/post_edit_appointment/'.$appointmentId)?>" method="post">
                <div class="form-group ">
                    <label for="customer_number" class="col-sm-2 control-label">Customer Number <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="customer_number" id="customer_number" placeholder="Customer Number" value="">
                        <small class="info help-block">
                        <b>Input Customer number</b> Max Length : 50.</small>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="customer_name" class="col-sm-2 control-label">Customer Name
                    </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name" value="">
                          <small class="info help-block">
                          </small>
                      </div>
                </div>
                                                 
                                 
                  <div class="form-group ">
                      <label for="instructions" class="col-sm-2 control-label">Instructions 
                      </label>
                      <div class="col-sm-8">
                          <textarea id="instructions" name="instructions" rows="5" cols="80" class=""></textarea>
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                                                 
                  <div class="form-group ">
                    <label for="feedback" class="col-sm-2 control-label">Feedback
                    </label>
                      <div class="col-sm-8">
                          <textarea id="feedback" name="feedback" rows="5" cols="80"></textarea>
                          <small class="info help-block">
                          </small>
                      </div>
                    </div>
                                                 
                      <input type="submit" class="btn btn-primary btn-custom" value="submit">
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