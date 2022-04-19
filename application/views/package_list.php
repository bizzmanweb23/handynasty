<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Package List</h1><small>Register All</small>
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
                <a href="<?=base_url('admin/welcome/add_package')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Package List New</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Package Name</th>
                    <th>Package Name Mandarin</th>
                    <?php if($this->session->userdata('branch_id')==null){?>
                    <th>Branch Name</th>
                    <?php }?>
                    <th>Package Detail</th>
                    <th>Package Detail Mandarin</th>
                    <th>Package Price</th>
                    <th>Package Credits</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($package as $packages): ?>
                      <tr>
                        <td><?= $packages['package_name']?></td>
                        <td><?= $packages['package_name_mandarin']?></td>
                        <?php if($this->session->userdata('branch_id')==null){?>
                        <td><?= $packages['branch_name']?></td>
                        <?php } ?>
                        <td><?= $packages['package_detail']?></td>
                        <td><?= $packages['package_detail_mandarin']?></td>
                        <td><?= $packages['package_price']?></td>
                        <td><?= $packages['package_credits']?></td>
                        <td><a href="<?= base_url('admin/welcome/deletePackage'.$packages['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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