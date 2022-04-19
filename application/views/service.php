<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service</h1><small>Register All</small>
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
                <a href="<?=base_url('admin/welcome/add_service')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Service New</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Service Name</th>
                    <th>Service Mandarin Name</th>
                    <?php if($this->session->userdata('branch_id')==null){?>
                    <th>Branch Name</th>
                    <?php }?>
                    <th>Service Icon</th>
                    <th>Service Category</th>
                    <th>Description</th>
                    <th>Mandarin Description</th>
                    <th>Service price</th>
                    <th>Therapist Commission</th>
                    <th>Commission Type</th>
                    <th>Duration</th>
                    <th>Priority</th>
                    <th>Loyalty points</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($service as $services): ?>
                      <tr>
                        <td><?= $services['service_name']?></td>
                        <td><?= $services['service_mandarin_name']?></td>
                        <?php if($this->session->userdata('branch_id')==null){?>
                        <td><?= $services['branch_name']?></td>
                        <?php }?>
                        <td><img src="<?= base_url('uploads/'.$services['service_icon'])?>" width="40" height="40"></td>
                        <td><?= $services['service_category']?></td>
                        <td><?= $services['description']?></td>
                        <td><?= $services['mandarin_description']?></td>
                        <td><?= $services['service_price']?></td>
                        <td><?= $services['commission_amount']?></td>
                        <td><?= $services['commission_type']?></td>
                        <td><?= $services['duration']?></td>
                        <td><?= $services['priority']?></td>
                        <td><?= $services['loyalty_point']?></td>
                        <td><?= $services['status']?></td>
                        <td><a href="<?= base_url('admin/welcome/deleteService/'.$services['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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