<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupons</h1><small>Register All</small>
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
              <div class="card-header">
                <a href="<?=base_url('admin/welcome/add_coupon')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Coupon New</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Coupon Code</th>
                    <?php if($this->session->userdata('branch_id')==null) {?>
                    <th>Branch Name</th>
                    <?php }?>
                    <th>Description</th>
                    <th>Banner Icon</th>
                    <th>Discount</th>
                    <th>Loyalty Points</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($coupon as $coupons): ?>
                      <tr>
                        <td><?= $coupons['coupon_code']?></td>
                        <?php if($this->session->userdata('branch_id')==null) {?>
                        <td><?= $coupons['branch_name']?></td>
                        <?php }?>    
                        <td><?= $coupons['description']?></td>
                        <td><img src="<?= base_url('uploads/'.$coupons['banner_icon'])?>" width="40" height="40"></td>
                        <td><?= $coupons['discount']?></td>
                        <td><?= $coupons['coupon_loyalty_points']?></td>
                        <td><?= $coupons['expiry_date']?></td>
                        <td><?= $coupons['status']?></td>
                        <td><?= $coupons['created_at']?></td>
                        <td><?= $coupons['updated_at']?></td>
                        <td><a href="<?= base_url('admin/welcome/editCoupon/'.$coupons['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#541728"><i class="fa fa-edit"></i></a> <a href="<?= base_url('admin/welcome/deleteCoupon/'.$coupons['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
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