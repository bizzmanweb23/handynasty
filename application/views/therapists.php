<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Therapists</h1><small>Register All</small>
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
                <a href="<?=base_url('admin/welcome/add_therapists')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Therapists New</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="site-table" style="overflow: auto; height: 250px ">
                <table  class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <?php if($this->session->userdata('branch_id')==null){?>
                    <th>Branch Name</th>
                    <?php }?>
                    <th>Services</th>
                    <th>Check in</th>
                    <th>Earning From Service</th>
                    <th>Earning From Add-ons</th>
                    <th>Mobile</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <!-- <th>Updated At</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($therapist as $therapists): ?>
                      <tr>
                        <td><?= $therapists['name']?></td>
                        <td><?= $therapists['age']?></td>
                        <td><?= $therapists['gender']?></td>
                        <?php if($this->session->userdata('branch_id')==null){?>
                        <td><?= $therapists['branch_name']?></td>
                        <?php }?>
                        <td><?= $therapists['services']?></td>
                        <td><?= $therapists['checkin']?></td>
                        <td><?= $therapists['service_earning']?></td>
                        <td><?= $therapists['add_ons_earning']?></td>
                        <td><?= $therapists['mobile']?></td>
                        <td><img src="<?= base_url('uploads/'.$therapists['image'])?>" width="40" height="40"></td>
                        <td><?= $therapists['created_at']?></td>
                        <!-- <td><?= $therapists['updated_at']?></td> -->
                        <td><a href="<?= base_url('admin/welcome/deleteTherapist/'.$therapists['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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