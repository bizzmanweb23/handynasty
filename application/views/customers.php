<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1><small>Register All</small>
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
              <!-- <div class="card-header">
                <a href="<?=base_url('admin/welcome/add_customer')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Customer</button></a>         
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="site-table" style="overflow: auto; height: 250px ">            
                      <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                    <thead style="background-color: #fff; color:#541728">
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <?php if($this->session->userdata('branch_id')==null){ ?>
                            <th>Branch Name</th>
                            <?php } ?>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                     <tbody>
                    <?php foreach($customer as $customers): ?>
                      <tr>
                        <td><?= $customers['first_name']?></td>
                        <td><?= $customers['last_name']?></td>
                        <td><?= $customers['dob']?></td>
                        <td><?= $customers['age']?></td>
                        <td><?= $customers['email']?></td>
                        <td><?= $customers['contact']?></td>
                        <?php if($this->session->userdata('branch_id')==null){ ?>
                        <td><?= $customers['branch_name']?></td>
                        <?php } ?>
                        <td><?= $customers['address']?></td>
                        <td><?= $customers['created_at']?></td>
                        <td><a href="<?= base_url('admin/welcome/editCustomer/'. $customers['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#541728"><i class="fa fa-edit"></i></a>
                         <a href="<?= base_url('admin/welcome/deleteCustomer/'. $customers['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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