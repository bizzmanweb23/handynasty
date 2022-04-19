<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupons</h1><small>Edit Coupons</small>
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
                <form id="add_coupon" action="<?= base_url('admin/welcome/post_edit_coupon/'.$couponId)?>" method="post" enctype="multipart/form-data">
                <div class="form-group ">
                    <label for="coupon_code" class="col-sm-2 control-label">Coupon Code <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Coupon Code" value="">
                        <small class="info help-block">
                        <b>Input Coupon Code</b> Max Length : 15.</small>
                    </div>
                </div>
                <div class="form-group ">
                      <label for="description" class="col-sm-2 control-label">Description 
                      <i class="required">*</i>
                      </label>
                        <div class="col-sm-8">
                            <textarea id="description" name="description" rows="5" cols="80" class=""></textarea>
                        </div>
                  </div>                         
                  <div class="form-group ">
                    <label for="discount" class="col-sm-2 control-label">Discount <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="discount" id="discount" placeholder="Discount" value="">
                        <small class="info help-block">
                        <b>Input Discount</b> Max Length : 5.</small>
                    </div>
                 </div>
                 <div class="form-group ">
                    <label for="loyalty_points" class="col-sm-2 control-label">Loyalty Points <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="loyalty_points" id="loyalty_points" placeholder="Loyalty Points" value="">
                    </div>
                 </div>
                 <div class="form-group ">
                    <label for="status" class="col-sm-2 control-label">Status <i class="required">*</i>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="">
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